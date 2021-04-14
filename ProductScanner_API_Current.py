__author__ = "Bas Barg"
__copyright__ = "Copyright 2021, Bas Barg"
__version__ = "2.0"
__email__ = "basbarg@gmail.com"
# This code needs to be run in python3
# Use python3 {name}.py to execute


import serial
import os
import requests
import json

import time
from datetime import date

arduino = serial.Serial('/dev/ttyACM0', baudrate=9600, timeout=3.0)
scanner = serial.Serial('/dev/ttyUSB0', baudrate=9600, timeout=3.0)

data = ""
user = ''

# Enter your Host IP + Port by typing in the console
# format xxx.xxx.xxx.xxx:yyy
ip = input('Enter your hosts IP + Port: ')
url = f"http://{ip}/api/rfid"

# Uncomment the line below to keep the host static
# and enter your IP + Port on the {ip}
#url = f"http://{ip}/api/rfid/"

while True:
    arduino_rcv = arduino.readline().strip()
    scanner_rcv = scanner.readline()
    arduino_rcv = arduino_rcv.decode('utf-8')

    # Checking if a UID is received
    # Followed by stripping the string to only the ID
    # Eventually requesting the data that belongs to the rfid
    # Then storing the data in a string (own protocol + syntax, selfmade for Arduino -> See bottom of .py file) to eventually
    # be send as a byte to the Arduino.
    if "UID tag: " in arduino_rcv:
        rfid = arduino_rcv.lstrip("UID tag: ")
        try:
                # Sending a get request to subsystem using Larave Api database
                r = requests.get(f"{url}/{rfid}")
                r_text = str(r)
                print("Get App API: " + r_text)
                r.raise_for_status()

                # Loading the received JSON and parsing it in to indiviual values (only extracting those needed)
                # eventually storing them in variables and turning them in to a string (own protocol + syntax, selfmade for Arduino -> See bottom of .py file)
                resp = json.loads(r.text)
                rfid = resp[0]["rfid"]
                name = resp[0]["name"]
                calories = resp[0]["calories"]
                alcohol = resp[0]["alcohol"]
                cur_calories = resp[0]["current_calories"]
                cur_alcohol = resp[0]["current_alcohol"]
                data = f"<;{name};{calories};{alcohol};{cur_calories};{cur_alcohol};>"
                data = data.encode('utf-8')
                arduino.write(data)
                data = ""
        except requests.HTTPError as e:
            print(e.response.text)


    # Check is the scanner rcv is not an empty byte and checking if the username is set
    # After that check if barcode scanner is true with an second check if the byte is empty
    if scanner_rcv != b'' and name != '':
        barcode_scanned = True
        if barcode_scanned == True and scanner_rcv != b'':
            barcode = str(scanner_rcv, 'utf-8')
            try:
                # Sending a get request to the OpenFoodFacts database
                r = requests.get(f'https://world.openfoodfacts.org/api/v0/product/{barcode}.json')
                r_text = str(r)
                print("Get OpenFoodFacts API: " + r_text)
                r.raise_for_status()
                
                # Loading the received JSON and parsing it in to indiviual values (only extracting those needed)
                # eventually storing them in variables and turning them in to a string (own protocol + syntax, selfmade for Arduino -> See bottom of .py file)
                resp = json.loads(r.text)
                if resp["status_verbose"] != "product not found":
                    product_name = str(resp["product"]["product_name"])
                    if "energy-kcal_serving" in resp["product"]["nutriments"]:
                        calories = resp["product"]["nutriments"]["energy-kcal_serving"]
                    else:
                        if "energy-kcal" in resp["product"]["nutriments"]:
                            if resp["product"]["nutriments"]["energy-kcal"] < 100:
                                calories = resp["product"]["nutriments"]["energy-kcal"]
                            else:
                                calories = (resp["product"]["nutriments"]["energy-kcal"] / 10)
                        elif "energy_prepared_value" in resp["product"]["nutriments"]:
                            if (resp["product"]["nutriments"]["energy_prepared_value"] * 0.239006) < 100:
                                calories = int((resp["product"]["nutriments"]["energy_prepared_value"] * 0.239006))
                            else: 
                                calories = int((resp["product"]["nutriments"]["energy_prepared_value"] * 0.239006) / 10)
                    if "alcohol" in resp["product"]["nutriments"]:
                        alcohol = int(resp["product"]["nutriments"]["alcohol"] / 5)
                    else:
                        alcohol = 0

                    # Creating the string in own protocol syntax
                    # After encoding the string to a byte and sending it over the serial connection
                    # setting the data string to an empty string
                    data = f"[;{product_name};{calories};{alcohol};]"
                    data = data.encode('utf-8')
                    arduino.write(data)
                    data = ""

                    # Resetting scanned to stop unnecessairy repetition of get requests
                    # (Also stopping the possibility of getting my IP-adress blocked)
                    # Followed by getting the date to post to the database
                    barcode_scanned = False
                    today = date.today()
                    today = today.strftime('%d-%m-%Y')

                    # Creating a JSON and sending it by using a POST request to the Laravel Api
                    # This request will trigger an insert and update on the database behind the Laravel app
                    post_data = {'rfid':f'{rfid}', 'name':f'{product_name}', 'user_name':f'{name}', 'calories':f'{calories}', 'alcohol':f'{alcohol}', 'date':f'{today}'}
                    post_date = json.dumps(post_data)
                    s = requests.post(f'{url}/{rfid}/create', data=post_data)
                    s_text = str(s)
                    print("Post to App API: " + s_text)
                else:
                    print(resp["status_verbose"])
            except requests.HTTPError as e:
                print(e.response.text)
        

    time.sleep(1)



# Protocol Syntax
# The syntax consists of a starting character in this case "<" and "["
# When the Arduino receives a byte on the Serial port it's checks if it contains the before stated syntax
# After than it starts to read the string and eventually splits it into multiple substrings on a seperator ";"
# Which in turn are stored in the variables that can be used in the Arduino code