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
mycursor = mydb.cursor()

rfid = ['8C E9 54 23', '23 54 EA 38']
sqlQueries = ['SELECT name FROM users WHERE rfid="8C:E9:54:23"', 'SELECT name FROM users WHERE rfid="23:54:EA:38"']

user = ''

while True:
    rsc = com.readline().decode('utf-8')
    
    rsc2 = com2.readline().strip()
    
    if rfid[0] in rsc:
        mycursor.execute(sqlQueries[0])
        for x in mycursor:
            print(x[0])
        user = str(x[0])
        # os.system("python update.py")

    elif rfid[1] in rsc:
        mycursor.execute(sqlQueries[1])
        for x in mycursor:
            print(x[0])
        user = str(x[0])
    
    if rsc2 != b'' and user != '':
        barcode_scanned = True
        if barcode_scanned == True and rsc2 != b'':
            barcode = str(rsc2, 'utf-8')
            try:
                r = requests.get(f'https://world.openfoodfacts.org/api/v0/product/{barcode}.json')
                r.raise_for_status()
                resp = json.loads(r.text)
                if resp["status_verbose"] != "product not found":
                    product_name = str(resp["product"]["product_name"])
                    print(str(resp["product"]["product_name"]))
                    barcode_scanned = False

                    mycursor.execute("INSERT INTO grocery (product_name, user_name) VALUES (%s, %s)", (product_name, user))
                else:
                    print(resp["status_verbose"])
            except requests.HTTPError as e:
                print(e.response.text)

    time.sleep(1)
    mydb.commit()



mydb.close()