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
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mycursor = mydb.cursor

while True:
    weigth = port.readline().split()
    print(weight)

    time.sleep(1)
    mydb.commit()

mydb.close()