from datetime import datetime
import os
import signal
import time
import mysql.connector
import serial

try:
    mydb = mysql.connector.connect(
        host="localhost",
        user="jamal",
        passwd="laraveljr",
        database="SmartKitchenDb"
    )
    mycursor = mydb.cursor()
except:
    print("Exception: DB connection unsuccesful.")

try:
    if os.path.exists('/dev/ttyACM0') == True:
        port = serial.Serial('/dev/ttyACM0', baudrate=115200, timeout=3.0)
    if os.path.exists('/dev/ttyACM1') == True:
        port = serial.Serial('/dev/ttyACM1', baudrate=115200, timeout=3.0)
    port.flush()
except:
    print("Exception: No device found on the provided USB ports. Check Arduino.")


# Script to run when exiting with Ctrl+C, closes serial and DB connections.
def keyboardInterruptHandler(signal, frame):
    print()
    print("KeyboardInterrupt (ID: {}) has been caught. Cleaning up and closing database connection.".format(signal))
    mydb.close()
    port.close()
    exit(0)


def checkIfContainsCleaningTag(rcv):
    if (">>" in rcv):
        print("Geen sensorwaarde:", rcv[2:])
        rcvTrimmed = rcv[2:]
        return rcvTrimmed
    elif ("0x" in rcv):
        return rcv
    else:
        return "Niks ontvangen."


signal.signal(signal.SIGINT, keyboardInterruptHandler)


def getUserByTagID(tagID):  # Returns the row in the database the user was found in
    # tagIDhexstring = port.readline().strip()
    print(tagID)
    mycursor.execute("SELECT * FROM users WHERE rfid = %s;", (tagID,))
    row = mycursor.fetchone()
    if mycursor.with_rows:
        currentUser = row[2]
        welcomeMessage = "Welkom, " + row[2] + "."
        print(welcomeMessage)
        port.write(welcomeMessage.encode())
        print("DEBUG--Geselecteerde user:" + currentUser)
        return currentUser
    else:
        print()
        port.write(
            "Geen gebruiker gevonden bij deze tag. Controleer de tag.".encode())


if __name__ == "__main__":
    while True:
        rcv = port.readline().strip().decode()
        print("DEBUG--Arduino output is:", rcv)
        received = checkIfContainsCleaningTag(rcv)
        print("DEBUG--Sensor tag in ARDOUT ontvangen:", received)
        if(received == 'NFC'):
            try:
                tagID = port.readline().strip().decode()
                currentUser = getUserByTagID(tagID)
            except:
                print(
                    "Exception: NFC tag could not be processed by handler. Check functions or Tag ID output.")
        if(received == 'stofzuigen'):
            addLogValues = (currentUser, 'stofzuigen', 0)
            addLogEntry = '''INSERT INTO cleaning_log (user_name, task_name, finished) 
            VALUES (%s, %s, %s) '''
            mycursor.execute(addLogEntry, addLogValues)
            while(True):
                time.sleep(1)
                received = checkIfContainsCleaningTag(port.readline().strip().decode())
                if(received == 'voltooid'):
                    print('DEBUG-----voltooid')
                    updateLastLogEntry = '''UPDATE cleaning_log SET finished=%s, finished_at=%s 
                             WHERE id = %s '''
                    finishedAt = datetime.today()
                    print(finishedAt)
                    finishedTaskUpdateValues = (1, finishedAt, mycursor.lastrowid)
                    mycursor.execute(updateLastLogEntry, finishedTaskUpdateValues)
                    mydb.commit()
                    break
    # x += 1
    port.flushInput()
    time.sleep(1)

mydb.close()
