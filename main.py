import serial
import os

import mysql.connector
import time

mydb = mysql.connector.connect(
    host='localhost',
    user='bas',
    passwd='HotFire0301',
    database = 'SmartKitchenDB'
)

com = serial.Serial('/dev/ttyACM0', baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()

rfid = ['2C 51 4E 23', '12 28 6A 2D']
queries = ['SELECT * FROM profile WHERE rfid = "2C 51 4E 23"', 'SELECT * FROM profile WHERE rfid = "12 28 6A 2D"']
data = "<;"

while True:
    rsc = com.readline()

    if rfid[0] in rsc:
        mycursor.execute(queries[0])
        for x in mycursor:
            data += str(x[2])
            data += ";"
            data += str(x[3])
            data += ";"
            data += str(x[4])
            data += ";"
        data += ";>"
        print(data)
        com.write(data)
        data = "<;"
    elif rfid[1] in rsc:
        mycursor.execute(queries[1])
        for x in mycursor:
            data += str(x[2])
            data += ";"
            data += str(x[3])
            data += ";"
            data += str(x[4])
            data += ";"
        data += ";>"
        print(data)
        com.write(data)
        data = "<;"
        

    time.sleep(1)
    mydb.commit()

mydb.close()