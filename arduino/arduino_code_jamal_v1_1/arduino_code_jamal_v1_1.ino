#include <PN532.h>
#include <PN532_HSU.h>
#include <Wire.h>
#include <hd44780.h>                       // main hd44780 header
#include <hd44780ioClass/hd44780_I2Cexp.h> // i2c expander i/o class header

// All LCD variables
hd44780_I2Cexp lcd;
const int LCD_COLS = 20;
const int LCD_ROWS = 4;

// All button/led pins
const int RED_BTN = 52;
const int WHITE_BTN = 53;
const int NFC_LED = A0;

// Variable to save current user
String CURRENT_USER;

const long BAUDRATE = 115200;

PN532_HSU pn532hsu(Serial1);
PN532 nfc(pn532hsu);

int readNFCTagDec = 0;

void setup(void)
{
  pinMode(NFC_LED, OUTPUT);
  pinMode(RED_BTN, INPUT);
  pinMode(WHITE_BTN, INPUT);
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
    lcd.print(versiondata);
    while (1);
  }

  // Configure board to read RFID tags
  nfc.SAMConfig();
  LCDReset();
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

    String rfid_uid = "";

    Serial.println();

    for (uint8_t i = 0; i < uidLength; i++)
    {
      Serial.print(" 0x");
      Serial.print(uid[i], HEX);
      String uid_part = String(uid[i], HEX);
      rfid_uid += uid_part;
    }
    Serial.println();
    Serial.println(rfid_uid);
    delay(1000);
    digitalWrite(NFC_LED, LOW);
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
    delay(1000);
    TaskAssignment(CURRENT_USER);
    LCDReset();
    // LCDPiInput();
  }

  // check to see if characters available
  // indicating a message is coming in

  // Tijdelijke line om de reset uit te voeren

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

void serialInputToString()
{
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
      }
    }
  }
}

void LCDPiInput(void)
{
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
}

void TaskAssignment(String USERNAME)
{
  String taak;
  lcd.clear();
  lcd.print("Druk een knop om je taak te kiezen.");
  lcd.setCursor(0, 2);
  lcd.print("Rood: Stofzuigen");
  lcd.setCursor(0, 3);
  lcd.print("Wit:  Afwas");
  while (true)
  {
    if (digitalRead(WHITE_BTN))
    {
      lcd.write("Start: Afwas. De sensoren gaan nu aan.");
      Serial.println(USERNAME);
      Serial.println("Afwas.");
      if (digitalRead(RED_BTN)) {
            break;
          };
    }
    if (digitalRead(RED_BTN))
    {
      lcd.write("Start: Stofzuigen. De sensoren gaan nu aan.");
      Serial.println(USERNAME);
      Serial.println("Stofzuigen.");
      if (digitalRead(WHITE_BTN)) {
            break;
          };
    }
  }
  Serial.println("Voltooid");
  lcd.clear();
  lcd.print("Taak voltooid! Systeem keert terug naar het startscherm.");
  delay(2000);
}
