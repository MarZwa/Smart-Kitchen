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
    weight = port.readline().split()
    if(len(weight) == 3):
        mycursor.execute("UPDATE user_foods WHERE name == " + weight[0] + " SET " + weight[2] + " = " + weight[2] + " + " + weight[3])

    time.sleep(1)
    mydb.commit()

mydb.close()