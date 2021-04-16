#include "HX711.h"
#include "SevenSegmentTM1637.h"
#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>

#define calibration_factor 455000

#define LOADCELL_DOUT_PIN 8
#define LOADCELL_SCK_PIN 9

#define DISPLAY_CLK 10
#define DISPLAY_DIO 11

const int BUTTON_1 = 2;
const int BUTTON_2 = 3;
const int BUTTON_3 = 4;
const int BUTTON_4 = 5;
const int BUTTON_5 = 6;
const int BUTTON_6 = 7;
const int BUTTON_7 = 12;
#define BUTTON_8 A0
#define BUTTON_9 A1
#define BUTTON_10 A2

bool pressed_1 = false;
bool pressed_2 = false;
bool pressed_3 = false;
bool pressed_4 = false;
bool pressed_5 = false;
bool pressed_6 = false;
bool pressed_7 = false;
bool pressed_8 = false;
bool pressed_9 = false;
bool pressed_10 = false;

String output;
int n = 0;

HX711 scale;
SevenSegmentTM1637 display(DISPLAY_CLK, DISPLAY_DIO);
PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);

#define weight scale.get_units()*1000

void setup() {
  Serial.begin(115200);

  nfc.begin();  
  nfc.setPassiveActivationRetries(0xFF);
  nfc.SAMConfig();

  display.begin();
  display.setBacklight(100);
  display.clear();

  scale.begin(LOADCELL_DOUT_PIN, LOADCELL_SCK_PIN);
  scale.set_scale(calibration_factor);
  scale.tare();

  pinMode(BUTTON_1, INPUT_PULLUP);
  pinMode(BUTTON_2, INPUT_PULLUP);
  pinMode(BUTTON_3, INPUT_PULLUP);
  pinMode(BUTTON_4, INPUT_PULLUP);
  pinMode(BUTTON_5, INPUT_PULLUP);
  pinMode(BUTTON_6, INPUT_PULLUP);
  pinMode(BUTTON_7, INPUT_PULLUP);
  pinMode(BUTTON_8, INPUT_PULLUP);
  pinMode(BUTTON_9, INPUT_PULLUP);
  pinMode(BUTTON_10, INPUT_PULLUP);

  Serial.println("start");
}

void loop() {
  boolean success;
  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };
  uint8_t uidLength;

  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);
   
  if(!digitalRead(BUTTON_1)){
      delay(10);
      if (!digitalRead(BUTTON_1)){
          if (!pressed_1){
              pressed_1 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" groente ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_1 = false;
      }
  }

  if(!digitalRead(BUTTON_2)){
      delay(10);
      if (!digitalRead(BUTTON_2)){
          if (!pressed_2){
              pressed_2 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" fruit ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_2 = false;
      }
  }

  if(!digitalRead(BUTTON_3)){
      delay(10);
      if (!digitalRead(BUTTON_3)){
          if (!pressed_3){
              pressed_3 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" aardappelen ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_3 = false;
      }
  }

  if(!digitalRead(BUTTON_4)){
      delay(10);
      if (!digitalRead(BUTTON_4)){
          if (!pressed_4){
              pressed_4 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" vis ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_4 = false;
      }
  }

  if(!digitalRead(BUTTON_5)){
      delay(10);
      if (!digitalRead(BUTTON_5)){
          if (!pressed_5){
              pressed_5 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" peulvruchten ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_5 = false;
      }
  }

  if(!digitalRead(BUTTON_6)){
      delay(10);
      if (!digitalRead(BUTTON_6)){
          if (!pressed_6){
              pressed_6 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" vlees ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_6 = false;
      }
  }

  if(!digitalRead(BUTTON_7)){
      delay(10);
      if (!digitalRead(BUTTON_7)){
          if (!pressed_7){
              pressed_7 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" noten ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_7 = false;
      }
  }

  if(!digitalRead(BUTTON_8)){
      delay(10);
      if (!digitalRead(BUTTON_8)){
          if (!pressed_8){
              pressed_8 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" melk ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_8 = false;
      }
  }

  if(!digitalRead(BUTTON_9)){
      delay(10);
      if (!digitalRead(BUTTON_9)){
          if (!pressed_9){
              pressed_9 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" kaas ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_9 = false;
      }
  }

  if(!digitalRead(BUTTON_10)){
      delay(10);
      if (!digitalRead(BUTTON_10)){
          if (!pressed_10){
              pressed_10 = true;

              if(success) {
                String hex_value = "";
                for (uint8_t i=0; i < uidLength; i++) 
                {       
                  hex_value += (String)uid[i];
                }
                Serial.print(hex_value);
                Serial.print(" vetten ");
                Serial.print(weight, 0);
                Serial.println();
                display.clear();
                display.print(round(weight));
              }
          }
      }
      else{
          pressed_10 = false;
      }
  }
}
