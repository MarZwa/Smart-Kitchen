#include <Wire.h>
#include <Adafruit_PN532.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>
#include "LCD.h"
#include "LiquidCrystal_I2C.h"

PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);
LiquidCrystal_I2C lcd(0x27,2,1,0,4,5,6,7);

void setup() {
  Serial.begin(115200);

  nfc.begin();
  nfc.setPassiveActivationRetries(0xFF);
  nfc.SAMConfig();

  lcd.begin(20,4);
  lcd.setBacklightPin(3,POSITIVE); // BL, BL_POL
  lcd.setBacklight(HIGH);
}

void loop() {
  lcd.clear();
  boolean success;
  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };
  uint8_t uidLength;

  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);

  if(success) {
    lcd.print("Dit is een:");
    
    String hex_value = "";
    for (uint8_t i=0; i < uidLength; i++) 
    {       
      hex_value += (String)uid[i];
    }

    if(hex_value == "46212016223276129") {
      Serial.println(hex_value);
      lcd.setCursor(0,1);
      lcd.print("Diner vork");
    }
    else if(hex_value == "44111516223276129") {
      Serial.println(hex_value);
      lcd.setCursor(0,1);
      lcd.print("Diner mes");
    }
    else if(hex_value == "46211916223276129") {
      Serial.println(hex_value);
      lcd.setCursor(0,1);
      lcd.print("Salade mes");
    }
    else if(hex_value == "42610616223276129") {
      Serial.println(hex_value);
      lcd.setCursor(0,1);
      lcd.print("Diner lepel");
    }
    else if(hex_value == "4629316223276129") {
      Serial.println(hex_value);
      lcd.setCursor(0,1);
      lcd.print("Soep lepel");
    }
    else {
      lcd.setCursor(0,1);
      lcd.print("Geen geldige chip.");      
    }
    delay(5000);
  }
}
