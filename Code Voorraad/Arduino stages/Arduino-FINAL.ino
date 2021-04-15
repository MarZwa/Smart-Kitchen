#include "SPI.h" // SPI library
#include "MFRC522.h" // RFID library (https://github.com/miguelbalboa/rfid)
#include "Nextion.h"

const int pinRST = 9;
const int pinSDA = 10;

const int BUTTON = 4;
int oldButtonState = LOW;

MFRC522 mfrc522(pinSDA, pinRST); // Set up mfrc522 on the Arduino

int currentPage = 1;
NexButton b0 = NexButton(1,1,"b0");
NexButton b1 = NexButton(1,2,"b1");
NexText t0 = NexText(1,5,"t0");

NexTouch *nex_listen_list[] = {
&b0,
&b1,
NULL
};

void b0PushCallback(void *ptr) {
  Serial.print("page 1");
  Serial.print(0xff);
  Serial.print(0xff);
  Serial.print(0xff);

  Serial.print("t0.txt=");
  Serial.print("\"");
  Serial.print("Storage");
  Serial.print("\"");
  Serial.print(0xff);
  Serial.print(0xff);
  Serial.print(0xff);
  
  Serial.println("S");
}

void b1PushCallback(void *ptr) {
  Serial.print("page 1");
  Serial.print(0xff);
  Serial.print(0xff);
  Serial.print(0xff);

  Serial.print("t0.txt=");
  Serial.print("\"");
  Serial.print("Grocery");
  Serial.print("\"");
  Serial.print(0xff);
  Serial.print(0xff);
  Serial.print(0xff);
  
  Serial.println("G");
}

void setup() {
  pinMode(BUTTON, INPUT_PULLUP);
  SPI.begin(); // open SPI connection
  mfrc522.PCD_Init();
  Serial.begin(9600);
  Serial.println("RFID reading UID");
  b0.attachPush(b0PushCallback);
  b1.attachPush(b1PushCallback);
}

void loop() {
  nexLoop(nex_listen_list);

  if (!mfrc522.PICC_IsNewCardPresent()) {
  return; 
  }

  if(!mfrc522.PICC_ReadCardSerial()) {
      return;
  };

  Serial.print("UID tag :");
  String content= "";
  byte letter;
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : "");
     Serial.print(mfrc522.uid.uidByte[i], HEX);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : ""));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  } 
  mfrc522.PICC_HaltA();
