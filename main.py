import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="jim",
    passwd="password",
    database="SmartKitchenDb"
)
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)

mycursor = mydb.cursor()

while True:
    mycursor.execute("SELECT * FROM status_bak")
    for x in mycursor:
        print(x[1])
        if x[1] == 'Rest':
            port.write("l1")
            time.sleep(5)
            mycursor.execute("UPDATE status_bak SET status = Null")
        elif x[1] == 'Plastic':
            port.write("l0")
            time.sleep(5)
            mycursor.execute("UPDATE status_bak SET status = Null")
        elif x[1] == 'Gft':
            port.write("l2")
            time.sleep(5)
            mycursor.execute("UPDATE status_bak SET status = Null")
        else:
            port.write("l3")
            time.sleep(5)

    time.sleep(1)
    mydb.commit()

mydb.close()