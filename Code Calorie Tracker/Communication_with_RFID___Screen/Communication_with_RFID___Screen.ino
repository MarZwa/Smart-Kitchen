// Imports
#include "Nextion.h"
#include "SPI.h" // SPI library
#include "MFRC522.h" // RFID library (https://github.com/miguelbalboa/rfid)

// Nextion Display Variables
int CurrentPage = 0;
NexButton b0 = NexButton(0, 6, "b0");  // Page 0, id 0 and object_name page0
NexButton b1 = NexButton(1, 1, "b1");  // Page 1, id 0 and object_name page1

NexTouch *nex_listen_list[] = 
{
  &b0,  // Button 0 added
  &b1,  // Button 1 added
  NULL  // String terminated
};

// RFID Scanner Variables
const int pinRST = 49;
const int pinSDA = 53;

// Received Data Variables
byte data;
int i = 0;
char received_data[255] = ";";
bool user = false;
bool product = false;
bool done = false;

// User Variables
String Uname = "None";
int Ucalories = 0;
int Ualcohol = 0;
int Ucur_calories = 0;
int Ucur_alcohol = 0;

// Product Variables
String Pname = "Scan Product";
int Pcalories = 0;
int Palcohol = 0;

// Calculation Variables
int Cal_Progress = 50;
int Alc_Progress = 50;

// Set up mfrc522 on the Arduino
// This is needed to use the RFID scanner otherwise
// it wont read a tag
MFRC522 mfrc522(pinSDA, pinRST); 


// Casting received data to string data
// Found a code sample online, adjusted it a little bit to fit my approach
String getValue(String data, char separator, int index)
{
    int found = 0;
    int strIndex[] = { 0, -1 };
    int maxIndex = data.length() - 1;

    for (int i = 0; i <= maxIndex && found <= index; i++) {
        if (data.charAt(i) == separator || i == maxIndex) {
            found++;
            strIndex[0] = strIndex[1] + 1;
            strIndex[1] = (i == maxIndex) ? i+1 : i;
        }
    }
    return found > index ? data.substring(strIndex[0], strIndex[1]) : "";
}

// Button 0 event
// This event changes the current page and sends values to
// the elements on the display
void b0PushCallback(void *ptr){
  CurrentPage = 1;
  
  Serial2.print("n0.val=");
  Serial2.print(Ucur_calories);
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("n1.val=");
  Serial2.print(Ucalories);
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("n2.val=");
  Serial2.print(Ucur_alcohol);
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("n3.val=");
  Serial2.print(Ualcohol);
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("t4.txt=");
  Serial2.print("\"");
  Serial2.print(Uname);
  Serial2.print("\"");
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);
}

// Button 1 event
// This event changes the current page and sends values to
// the elements on the display
void b1PushCallback(void *ptr){
  CurrentPage = 0;

  Serial2.print("b0.txt=");
  Serial2.print("\"");
  Serial2.print(Uname);
  Serial2.print("\"");
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("t0.txt=");
  Serial2.print("\"");
  Serial2.print(Pname);
  Serial2.print("\"");
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("n0.val=");
  Serial2.print(Pcalories);
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);

  Serial2.print("n1.val=");
  Serial2.print(Palcohol);
  Serial2.write(0xff);
  Serial2.write(0xff);
  Serial2.write(0xff);
}


void setup() {
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.begin(9600);
  Serial2.begin(9600);

  // Registering touch events
  // This has to be done otherwise the buttons won't return an event
  // resulting in a non working display button
  b0.attachPush(b0PushCallback);
  b1.attachPush(b1PushCallback);
}


void loop() { 
    nexLoop(nex_listen_list);   

    if(Serial.available() > 0){
      data = Serial.read();
    }

    // Check which start char is received, when "<" a user is send, when "[" a product is send
    switch(data){
      case '<':
        user = true;
        break;
      case '[':
        product = true;
        break;
    }

    // Reading User info uses the seperator function
    // eventually stores the values in the variables
    if (user == true){
        if (data != '>'){
          received_data[i] = data;
          i++;
        } else {
          Serial.println(received_data);
          Uname = getValue(received_data, ';', 1);
          Ucalories = (getValue(received_data, ';', 2)).toInt();
          Ualcohol = (getValue(received_data, ';', 3)).toInt();
          Ucur_calories = (getValue(received_data, ';', 4)).toInt();
          Ucur_alcohol = (getValue(received_data, ';', 5)).toInt();


          // Resetting the scanned product
          Pname = "Scan Product";
          Pcalories = 0;
          Palcohol = 0;

          user = false;
          done = true;
          }
    }

    // Reading Product info uses the seperator function
    if (product == true){
        if (data != ']'){
          received_data[i] = data;
          i++;
        } else {
          Serial.println(received_data);
          Pname = getValue(received_data, ';', 1);
          Pcalories = (getValue(received_data, ';', 2)).toInt();
          Palcohol = (getValue(received_data, ';', 3)).toInt();

          Ucur_calories = Ucur_calories + Pcalories;
          Ucur_alcohol = Ucur_alcohol + Palcohol;

          product = false;
          done = true;
          }
    }

    // If the reading is done, sends the needed variables to the screen
    // 0xFF is needed otherwise it wont read the value as a call for update
    if(done == true){
        Serial2.print("b0.txt=");
        Serial2.print("\"");
        Serial2.print(Uname);
        Serial2.print("\"");
        Serial2.write(0xff);
        Serial2.write(0xff);
        Serial2.write(0xff);
    
        Serial2.print("t0.txt=");
        Serial2.print("\"");
        Serial2.print(Pname);
        Serial2.print("\"");
        Serial2.write(0xff);
        Serial2.write(0xff);
        Serial2.write(0xff);
      
        Serial2.print("n0.val=");
        Serial2.print(Pcalories);
        Serial2.write(0xff);
        Serial2.write(0xff);
        Serial2.write(0xff);
      
        Serial2.print("n1.val=");
        Serial2.print(Palcohol);
        Serial2.write(0xff);
        Serial2.write(0xff);
        Serial2.write(0xff);
      
      memset(received_data, "", sizeof(received_data));
      Serial.println("Resetting");
      done = false;
      i = 0;
    }

      // Reading RFID Cards/Tags
      if (!mfrc522.PICC_IsNewCardPresent()) {
        return; 
      }
      
      if(!mfrc522.PICC_ReadCardSerial()) {
          return;
      }
    
      // Printing RFID Card/Tag UID
      Serial.print("UID tag: ");
      String content= "";
      byte letter;
      for (byte i = 0; i < mfrc522.uid.size; i++) 
      {
         Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : "");
         Serial.print(mfrc522.uid.uidByte[i], HEX);
         content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : ""));
         content.concat(String(mfrc522.uid.uidByte[i], HEX));
      }
      Serial.println();
      
      mfrc522.PICC_HaltA();
}
