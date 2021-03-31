#include <PN532.h>
#include <PN532_HSU.h>
#include <Wire.h>
#include <hd44780.h>                       // main hd44780 header
#include <hd44780ioClass/hd44780_I2Cexp.h> // i2c expander i/o class header

hd44780_I2Cexp lcd; // declare lcd object: auto locate & config exapander chip

// LCD geometry
// while 16x2 will work on most displays even if the geometry is different,
// for actual wrap testing of a particular LCD it is best to use the correct
// geometry.
const int LCD_COLS = 20;
const int LCD_ROWS = 4;

const int NFC_LED = A0;

const int BAUDRATE = 115200;

PN532_HSU pn532hsu(Serial1);
PN532 nfc(pn532hsu);

int readNFCTagDec = 0;
unsigned int hex_num;
int NFC_id;

void setup(void)
{
  pinMode(NFC_LED, OUTPUT);
  digitalWrite(NFC_LED, LOW);

  int status;
  status = lcd.begin(LCD_COLS, LCD_ROWS);
  Serial.begin(115200);
  lcd.clear();

  if (status) // non zero status means it was unsuccesful
  {
    // begin() failed

    Serial.print("LCD initalization failed: ");
    Serial.println(status);

    // blink error code using the onboard LED if possible
    hd44780::fatalError(status); // does not return
  }

  lcd.lineWrap();



  nfc.begin();

  uint32_t versiondata = nfc.getFirmwareVersion();

  if (!versiondata)
  {

    while (1); // Halt
  }

  // Configure board to read RFID tags
  nfc.SAMConfig();
}

void loop(void)
{

  boolean success; // Variable to indicate found card

  uint8_t uid[] = {0, 0, 0, 0, 0, 0, 0}; // Buffer to store the returned UID

  uint8_t uidLength; // Length of the UID (4 or 7 bytes depending on ISO14443A card type)

  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);

  if (success)
  {
    digitalWrite(NFC_LED, HIGH);
    Serial.print("NFC");
    Serial.println("");

    hex_num = uid[0] << 24;
    hex_num += uid[1] << 16;
    hex_num += uid[2] << 8;
    hex_num += uid[3];

    NFC_id = (int)hex_num;

    String rfid_uid = "";

    Serial.println();

    for (uint8_t i = 0; i < uidLength; i++) {
      Serial.print(" 0x");
      Serial.print(uid[i], HEX);
      String uid_part = String(uid[i], HEX);
      rfid_uid += uid_part;
    }

    Serial.println();
    Serial.println(rfid_uid);
    delay(2000);
    digitalWrite(NFC_LED, LOW);
  }

  // check to see if characters available
  // indicating a message is coming in
  if (Serial.available())
  {
    // wait some time for rest of message to arrive
    delay(100);
    // Clear the display before showing the new message
    lcd.clear();
    // print the message on the LCD
    while (Serial.available() > 0) 
    {
      char c;
      c = Serial.read();
      // drop CR and LF character
      if (c != '\r' && c != '\n') 
      { 
        lcd.write(c);
      }
    }
  }
  // Tijdelijke line om de reset uit te voeren
  delay(2000);
  LCDReset();
}

void LCDReset(void)
{
  lcd.clear();
  lcd.print("Smart Kitchen");
  if (LCD_ROWS > 1)
  {
    lcd.setCursor(0, 1);
    lcd.print("Houd je NFC Tag bij de scanner om je aan te melden.");
  }
}
