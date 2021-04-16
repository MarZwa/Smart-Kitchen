import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="marc",
    passwd="password",
    database="SmartKitchenDb"
)
port = serial.Serial("/dev/ttyUSB0", baudrate=115200, timeout=3.0)

mycursor = mydb.cursor()

while True:
    rfid = port.readline()
    if(rfid):
        updateQuery = "UPDATE cutlery SET scanned = true WHERE rfid = '" + rfid + "';"
        print(updateQuery)
        mycursor.execute(updateQuery)

    time.sleep(1)
    mydb.commit()

mydb.close()