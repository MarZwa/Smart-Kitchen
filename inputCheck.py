import serial
import os
import requests
import json
from pprint import pprint
import time

arduino = serial.Serial('/dev/ttyUSB1', baudrate=9600, timeout=3.0)

barcode_scanned = False

while True:
    rsc = arduino.readline().strip()
    if rsc != b'':
        barcode_scanned = True
        if barcode_scanned == True and rsc != b'':
            barcode = str(rsc, 'utf-8')
            r = requests.get(f'https://world.openfoodfacts.org/api/v0/product/{barcode}.json')
            resp = json.loads(r.text)
            pprint(resp["product"]["product_name"])
            barcode_scanned = False
    else:
        print("Die barcode ken ik nie maat!@#$%")
        time.sleep(1)