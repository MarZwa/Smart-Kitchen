//#include "SPI.h" // SPI library
//#include "MFRC522.h" // RFID library (https://github.com/miguelbalboa/rfid)
//
//const int pinRST = 9;
//const int pinSDA = 10;
//
//MFRC522 mfrc522(pinSDA, pinRST); // Set up mfrc522 on the Arduino
//
//void setup() {
//  SPI.begin(); // open SPI connection
//  mfrc522.PCD_Init(); // Initialize Proximity Coupling Device (PCD)
//  Serial.begin(9600); // open serial connection
//  Serial.println("RFID reading UID");
//}
//
//void loop() {
//  if (mfrc522.PICC_IsNewCardPresent()) { // (true, if RFID tag/card is present ) PICC = Proximity Integrated Circuit Card
//    if(mfrc522.PICC_ReadCardSerial()) { // true, if RFID tag/card was read
//      Serial.print("RFID TAG ID:");
//      for (byte i = 0; i < mfrc522.uid.size; ++i) { // read id (in parts)
//        Serial.print(mfrc522.uid.uidByte[i], HEX); // print id as hex values
//        Serial.print(" "); // add space between hex blocks to increase readability
//      }
//      Serial.println(); // Print out of id is complete.
//    }
//  }
//
//  if (!mfrc522.PICC_IsNewCardPresent()) {
//      return; 
//    }
//  
//    if(!mfrc522.PICC_ReadCardSerial()) {
//        return;
//    };
//  
//    Serial.print("UID tag :");
//    String content= "";
//    byte letter;
//    for (byte i = 0; i < mfrc522.uid.size; i++) 
//    {
//       Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
//       Serial.print(mfrc522.uid.uidByte[i], HEX);
//       content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
//       content.concat(String(mfrc522.uid.uidByte[i], HEX));
//    }
//  
//    mfrc522.PICC_HaltA();
//}


#include "SPI.h" // SPI library
#include "MFRC522.h" // RFID library (https://github.com/miguelbalboa/rfid)

const int pinRST = 9;
const int pinSDA = 10;

MFRC522 mfrc522(pinSDA, pinRST); // Set up mfrc522 on the Arduino

void setup() {
  SPI.begin(); // open SPI connection
  mfrc522.PCD_Init(); // Initialize Proximity Coupling Device (PCD)
  Serial.begin(9600); // open serial connection
  Serial.println("RFID reading UID");
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent()) { // (true, if RFID tag/card is present ) PICC = Proximity Integrated Circuit Card
    if(mfrc522.PICC_ReadCardSerial()) { // true, if RFID tag/card was read
      Serial.print("RFID TAG ID:");
      for (byte i = 0; i < mfrc522.uid.size; ++i) { // read id (in parts)
        Serial.print(mfrc522.uid.uidByte[i], HEX); // print id as hex values
        Serial.print(" "); // add space between hex blocks to increase readability
      }
      Serial.println(); // Print out of id is complete.
    }
  }
}
