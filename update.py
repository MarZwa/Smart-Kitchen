# import serial
# import os

# import mysql.connector
# import time

# mydb = mysql.connector.connect(
#     host="localhost",
#     user="max",
#     passwd="maximum123",
#     database="SmartKitchenDb"
# )

# com = serial.Serial('/dev/ttyUSB0', baudrate=9600, timeout=3.0)

# mycursor = mydb.cursor()

# while True:
#     rsc = com.readline()
#     if(rsc in "8C E9 54 23"):
#         mycursor.execute("UPDATE users SET scanned='Yes' WHERE rfid='8C:E9:54:23'")
#     time.sleep(1)
#     mydb.commit()