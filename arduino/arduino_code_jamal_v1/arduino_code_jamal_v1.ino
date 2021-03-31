#include <PN532_HSU.h>

#include <PN532.h>

PN532_HSU pn532hsu(Serial1);
PN532 nfc(pn532hsu);

int readNFCTagDec = 0;
unsigned int hex_num;
int NFC_id;

void setup(void) {

  Serial.begin(115200);

  nfc.begin();

  uint32_t versiondata = nfc.getFirmwareVersion();

  if (! versiondata) {
    
    while (1); // Halt
  }

  // Configure board to read RFID tags

  nfc.SAMConfig();

  Serial.println("Waiting for an ISO14443A Card ...");

}

void loop(void) {

  boolean success;

  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID

  uint8_t uidLength;                       // Length of the UID (4 or 7 bytes depending on ISO14443A card type)

  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);

  if (success) {
    
    Serial.print("NFC");
    Serial.println("");
  
    hex_num =  uid[0] << 24;
    hex_num += uid[1] << 16;
    hex_num += uid[2] <<  8;
    hex_num += uid[3];

    NFC_id= (int)hex_num;
//    Serial.println(hex_num);
    
    String rfid_uid = "";

    Serial.println();

    for (uint8_t i=0; i < uidLength; i++)

    { 
   
      Serial.print(" 0x");Serial.print(uid[i], HEX);
      String uid_part = String(uid[i], HEX); 
      rfid_uid += uid_part;

    }
    Serial.println();
    Serial.println(rfid_uid);

    // 1 second halt

    delay(1000);

  }
}
