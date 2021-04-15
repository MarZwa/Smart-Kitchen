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

# com = serial.Serial('/dev/ttyUSB1', baudrate=9600, timeout=3.0)

# mycursor = mydb.cursor()

# while True:

#     rsc = com.readline()

#     if "Add" in rsc:
#         mycursor.execute("INSERT INTO grocery (add_product_name, add_user_name) VALUES (%s, %s)", (product_name, user))
#     elif "Delete" in rsc:
#         mycursor.execute("INSERT INTO grocery (empty_product_name, empty_user_name) VALUES (%s, %s)", (product_name, user))
    
#     time.sleep(1)
#     mydb.commit()