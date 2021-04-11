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
            time.sleep(1)
        
        rcv = port.readline().strip()
        if(rcv == 'B1V'):
            mycursor.execute("UPDATE volhied_bakken SET vol = true WHERE bak = 'Rest'")
        elif(rcv == 'B2V'):
             mycursor.execute("UPDATE volhied_bakken SET vol = true WHERE bak = 'Plastic'")
        elif(rcv == 'B3V'):
             mycursor.execute("UPDATE volhied_bakken SET vol = true WHERE bak = 'Gft'")
        elif(rcv == 'B1L'):
             mycursor.execute("UPDATE volhied_bakken SET vol = false WHERE bak = 'Rest'")
             mycursor.execute("UPDATE users SET rest = 0")
        elif(rcv == 'B2L'):
             mycursor.execute("UPDATE volhied_bakken SET vol = false WHERE bak = 'Plastic'")
             mycursor.execute("UPDATE users SET plastic = 0")
        elif(rcv == 'B3L'):
             mycursor.execute("UPDATE volhied_bakken SET vol = false WHERE bak = 'Gft'")
             mycursor.execute("UPDATE users SET gft = 0")
        else:
            y = rcv.split()
            if(len(y) >= 3):
                rfid = y[0]
                bak = y[1]
                hvl = int(y[2])
                if(bak == 'rest'):
                    sql = "UPDATE users SET rest = rest + %s WHERE rfid = %s"
                elif(bak == 'plastic'):
                    sql = "UPDATE users SET plastic = plastic + %s WHERE rfid = %s"
                elif(bak == 'gft'):
                     sql = "UPDATE users SET gft = gft + %s WHERE rfid = %s"
                val = (hvl, rfid)
                mycursor.execute(sql, val)

    time.sleep(1)
    mydb.commit()

mydb.close()