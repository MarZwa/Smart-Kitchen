import mysql.connector
import time

import serial
import os

mydb = mysql.connector.connect(
    host="localhost",
    user="jamal",
    passwd="laraveljr",
    database="SmartKitchenDb"
)

if os.path.exists('/dev/ttyACM0') == True:
   ard_con = 0
   port = serial.Serial('/dev/ttyACM0',baudrate=115200, timeout=3.0)
if os.path.exists('/dev/ttyACM1') == True:
   ard_con = 1
   port = serial.Serial('/dev/ttyACM1',baudrate=115200, timeout=3.0)
print(ard_con)
port.flushInput()

mycursor = mydb.cursor()
x = 0

while True:
    print(f'next loop run {x}')
    time.sleep(1)
    rcv = port.readline().strip()
    print(rcv)
    if(rcv == b'NFC'):

        tagIDhexstring = port.readline().strip()
        tagID = port.readline().decode('utf-8').strip()
        print(tagID)
        mycursor.execute("SELECT * FROM users WHERE rfid = %s;", (tagID,))
        row = mycursor.fetchone()

        if mycursor.with_rows:
            print('Hallo ' + row[2] + '!')
            welcomeMessage = 'Hallo ' + row[2] + '!'
            port.write(welcomeMessage.encode())
            
        # if (tagID == '0x9C 0x5F 0x47 0x18'):
        #     print("Hoi, blauwe tag!")

        # if (tagID == '0xF9 0x25 0x88 0x9C'):
        #     print("Hoi, witte kaart!")

    port.flushInput()

    x += 1
 

    # for x in mycursor:
    #     print(x[1])
    # if x[1] == 'on':
    #     print(x[1])
    #     port.write("l1")
    # else:
    #     port.write("l0")

    # rcv = port.readline().strip()
    

    # if (rcv == 'b'):
    #     # Dit runned het tweede script.
    #     os.system("python update.py")
    time.sleep(1)

mydb.close()