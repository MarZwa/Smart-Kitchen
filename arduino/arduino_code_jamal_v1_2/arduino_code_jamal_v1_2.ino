#include <PN532.h>
#include <PN532_HSU.h>
#include <Wire.h>
#include <hd44780.h>                       // main hd44780 header
#include <hd44780ioClass/hd44780_I2Cexp.h> // i2c expander i/o class header

// System variables
String currentUser;
const long BAUDRATE = 115200;
unsigned long startMillis;
unsigned long timeNow;
unsigned long period = 1000;

// Buttons and LEDs
const int RED_BTN = 52;
const int WHITE_BTN = 53;
const int NFC_LED = A0;

// Object Detectie Sensor
const int OBJ_1 = 2;

// NFC library init
PN532_HSU pn532hsu(Serial1);
PN532 nfc(pn532hsu);

// LCD
hd44780_I2Cexp lcd;
const int LCD_COLS = 20;
const int LCD_ROWS = 4;

/*
  All codes used:
  Transmit:
  NFC => Arduino ->  Pi => Used to signal NFC reading.
  LCD => Pi -> Arduino => Used to signal serial data meant to be printed on the LCD is following.
  OBJ1 up til OBJ4 => Arduino -> Pi => Used to signal object dectection sensor trigger. (0 = low, 1 = high, # in range of 1-4)
*/

void setup(void)
{
  Serial.begin(115200);
  Serial.flush();

  // Pin Assignments
  pinMode(NFC_LED, OUTPUT);
  pinMode(RED_BTN, INPUT);
  pinMode(WHITE_BTN, INPUT);
  pinMode(OBJ_1, INPUT);

  digitalWrite(NFC_LED, LOW);

  // Screen init
  int status;
  status = lcd.begin(LCD_COLS, LCD_ROWS);

  // lcd init
  lcd.clear();
  lcd.lineWrap();
  LCDHomescreen();

  // NFC init
  nfc.begin();
  nfc.SAMConfig();
}

void loop(void)
{
  // NFC variables, used for the RFID id
  boolean NFCReadSuccess = false;        // Variable to indicate found card
  uint8_t uid[] = {0, 0, 0, 0, 0, 0, 0}; // Buffer to store the returned UID
  uint8_t uidLength;                     // Length of the UID (4 or 7 bytes depending on ISO14443A card type)
  NFCReadSuccess = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);

  if (NFCReadSuccess)
  {
    digitalWrite(NFC_LED, HIGH);
    Serial.println("NFC");
    lcd.clear();
    lcd.print("Tag wordt");
    lcd.setCursor(0, 1);
    lcd.print(" gecontroleerd.")
        String rfid_uid = "";

    for (uint8_t i = 0; i < uidLength; i++)
    {
      // Serial.print("0x ");
      // Serial.print(uid[i], HEX);
      String uid_part = String(uid[i], HEX);
      String uid_part_added = String(" 0x") + uid_part;
      rfid_uid += uid_part_added;
    }
    Serial.println(rfid_uid);
    delay(1000);
    digitalWrite(NFC_LED, LOW);

    // After scanning the RFID, the welcome message (Welkom {{$user}}) is printed first.
    if (Serial.available()) // Prints welcome message to LCD
    {
      // wait some time for rest of message to arrive
      delay(500);
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
      //    Starts task selection with a small delay to read and confirm the scanned user on screen.
      delay(2000);
      TaskSelection();
    }
    else
    {
      lcd.clear();
      lcd.print("Geen gebruiker");
      lcd.setCursor(0, 1);
      lcd.print("gevonden.");
      delay(1000);
      LCDHomescreen();
    }
  }
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

// Taskselector, returns a
void TaskSelection(void)
{
  String taak;
  lcd.clear();
  lcd.print("Druk een knop om je taak te kiezen.");
  lcd.setCursor(0, 2);

  lcd.print("Rood: Stofzuigen");

  // lcd.setCursor(0, 3);     /
  // lcd.print("Wit:  Afwas");
  while (true)
  {
    if (digitalRead(RED_BTN))
    {
      delay(200);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.write("Start: Stofzuigen.");
      lcd.setCursor(0, 1);
      lcd.write("De sensoren zijn nu");
      lcd.setCursor(0, 2);
      lcd.write(" actief.");
      Serial.println("Stofzuigen"); // Task as present in DB.
      lcd.setCursor(0, 3);
      lcd.print(">Pak de stofzuiger.");
      // Checks if object reads low for an extended duration
      while (true)
      {
        if (digitalRead(OBJ_1) == 0)
        {
          delay(1000);
          if (digitalRead(OBJ_1) == 0)
          {
            int currentRow = 3;
            for (int i = 0; i < LCD_COLS; i++)
            {
              lcd.setCursor(i, currentRow);
              lcd.print(" ");
            }
            lcd.setCursor(0, 3);
            lcd.print("Stofzuiger gepakt.");
            break;
          }
        }
        if (digitalRead(OBJ_1) == 0)
        {
          delay(1000);
          if (digitalRead(OBJ_1) == 0)
          {
            int currentRow = 3;
            for (int i = 0; i < LCD_COLS; i++)
            {
              lcd.setCursor(i, currentRow);
              lcd.print(" ");
            }
            lcd.setCursor(0, 3);
            lcd.print("Stofzuiger gepakt.");
          }
          if (digitalRead(OBJ_1) == 1)
          {
            delay(1000);
            if (digitalRead(OBJ_1 == 1))
            {
              Serial.println("Voltooid"); // Print complete message to Python for task.
              lcd.clear();
              lcd.setCursor(0, 0);
              lcd.print("Taakregistratie");
              lcd.setCursor(0, 1);
              lcd.print("voltooid!");
              delay(2000);
              lcd.clear();
              lcd.print("Het systeem keert nu terug naar het");
              lcd.setCursor(0, 2);
              lcd.print(" inlogscherm.");
              delay(2000);
            }
          }
        }
        break;
      }
      // if (digitalRead(WHITE_BTN)) {     // For 2nd task: Dishwashing
      //   delay(200);
      //   lcd.clear();
      //   lcd.setCursor(0, 0);
      //   lcd.write("Start: Afwas.");
      //   lcd.setCursor(0, 2);
      //   lcd.write("De sensoren gaan nu aan.");
      //   Serial.println("Afwas");
      //   while (true) {
      //     if (digitalRead(RED_BTN)) {
      //       delay(100);
      //       break;
      //     };
      //   }
      //   break;
      // }
    }
    // After registering the complete condition for the task -->
  }

  // Task 1 loop

  // All function sused for the LCD screen
  void LCDHomescreen(void)
  {
    lcd.clear();
    lcd.print("Smart Kitchen");
    if (LCD_ROWS > 1)
    {
      lcd.setCursor(0, 1);
      lcd.print("Houd je NFC Tag bij de scanner om je aan te melden.");
    }
  }

  void LCDlineClear(int selectedLine)
  {
    lcd.setCursor(0, selectedLine);
    for (int i = 0; i < LCD_COLS; i++)
    {
      lcd.print(" ");
    }
  }