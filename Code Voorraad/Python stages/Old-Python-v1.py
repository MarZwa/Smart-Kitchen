import serial
import os
import json
import mysql.connector
import time

mydb = mysql.connector.connect(
    host="localhost",
    user="max",
    passwd="maximum123",
    database="SmartKitchenDb"
)

com = serial.Serial('/dev/ttyUSB0', baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()

rfid = ['8C E9 54 23', '23 54 EA 38']
sqlQueries = ['SELECT name FROM users WHERE rfid="8C:E9:54:23"', 'SELECT name FROM users WHERE rfid="23:54:EA:38"']

while True:
    rsc = com.readline().strip()

    if rfid[0].encode('utf-8') in rsc:
        mycursor.execute(sqlQueries[0])
        for x in mycursor:
            print(x[0]
        

    elif rfid[1].encode('utf-8') in rsc:
        mycursor.execute(sqlQueries[1])
        for x in mycursor:
            print(x[0])

    time.sleep(1)
    mydb.commit()



mydb.close()