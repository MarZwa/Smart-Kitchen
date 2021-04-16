import serial
import os
import json
from pprint import pprint
import mysql.connector
import time
import requests

mydb = mysql.connector.connect(
    host="localhost",
    user="max",
    passwd="maximum123",
    database="SmartKitchenDb"
)

com = serial.Serial('/dev/ttyUSB1', baudrate=9600, timeout=3.0)
com2 = serial.Serial('/dev/ttyUSB0', baudrate=9600, timeout=3.0)

barcode_scanned = False

user = ""
product_name = ""
rfid = ""

while True:
    # Declaring the remote serial connection:
    rsc = com.readline().strip()
    rsc2 = com2.readline().strip()
    rsc = rsc.decode('utf-8')

    # In my arduino code I first print 'UID tag :' before I print the RFID code. I did this for readablility when writing the arduino  code
    # After reading this it strips away that string in front of the RFID code
    # After this it requests the name of the user from the database:
    if "UID tag :" in rsc:
        rfid = rsc.lstrip("UID tag :")
        try:
            # This sends a GET request to the system with the Laravel Database
            r = requests.get(f"http://192.168.1.243:8000/api/rfid/{rfid}")
            r_text = str(r)
            print("RFID lezen: " + r_text)
            r.raise_for_status()
            resp = json.loads(r.text)
            rfid = resp[0]["rfid"]
            user = resp[0]["name"]
        except requests.HTTPError as e:
            print(e.response.text)
    
    # This code first checks if the remote serial connection is not an empty byte and follows this check by checking if there is a username:
    if rsc2 != b'' and user != '':
        barcode_scanned = True
        # This sets the variable barcode_scanned to True and checks if the byte is not empty:
        if barcode_scanned == True and rsc2 != b'':
            barcode = str(rsc2, 'utf-8')
            try:
                # Here I use a GET request to the OpenFoodFacts database:
                r = requests.get(f'https://world.openfoodfacts.org/api/v0/product/{barcode}.json')
                r_text = str(r)
                print("Gegevens uit OpenFoodFacts API opvragen: " + r_text)
                r.raise_for_status()
                resp = json.loads(r.text)
                # Here I do a check if the product is in the database, if not it print the status_verbose which is just 'product not found'
                # If the product is in the database it gets the productname of the product and stores it in a variable:
                if resp["status_verbose"] != "product not found":
                    product_name = str(resp["product"]["product_name"])
                    barcode_scanned = False 
                else:
                    print(resp["status_verbose"])
            except requests.HTTPError as e:
                print(e.response.text)

    # Here I do a check if the the serial connection reads an 'A' or a 'D', after this it checks if the productname is not empty.
    # Reading an 'S' means add to storagelist.
    # Reading a 'G' means add to grocerylist.
    if "S" in rsc and product_name != "":
        # Here I create a JSON with the data I need and send it to the Laravel API using a POST request
        # This POST request triggers an database insert with that data
        gooi_data = {'product_name':f'{product_name}', 'user_name':f'{user}'}
        d = requests.post(f"http://192.168.1.243:8000/api/rfid/{rfid}/create-storage", data=gooi_data)
        d_text = str(d)
        print("POST request naar de API: " + d_text)

    if "G" in rsc and product_name != "":
        # Here I create a JSON with the info I need and send it to the Laravel API using a POST request
        # This POST request triggers an database insert with that data
        gooi_data = {'product_name':f'{product_name}', 'user_name':f'{user}'}
        d = requests.post(f"http://192.168.1.243:8000/api/rfid/{rfid}/create-grocery", data=gooi_data)
        d_text = str(d)
        print("POST request naar de API: " + d_text)

    time.sleep(1)
    mydb.commit()



mydb.close()
