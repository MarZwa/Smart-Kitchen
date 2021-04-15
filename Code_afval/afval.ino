#include "NewPing.h"

#include "HX711.h"

#include "SevenSegmentTM1637.h"

#include <Wire.h>
#include <PN532_I2C.h>
#include <PN532.h>
#include <NfcAdapter.h>

#define TRIGGER_PIN 9
#define ECHO_PIN 8

#define TRIGGER_PIN_2 6
#define ECHO_PIN_2 7

#define TRIGGER_PIN_3 5
#define ECHO_PIN_3 4

#define MAX_DISTANCE 50

#define calibration_factor 435
#define calibration_factor_2 452
#define calibration_factor_3 440  

#define LOADCELL_DOUT_PIN  3
#define LOADCELL_SCK_PIN  2

#define LOADCELL_DOUT_PIN_2  A0
#define LOADCELL_SCK_PIN_2  13

#define LOADCELL_DOUT_PIN_3  A2
#define LOADCELL_SCK_PIN_3  A1                        

#define CLK  12
#define DIO  11

#define LED1 12
#define LED2 A6
#define LED3 10
int data = 0;
char object = ' '; 

PN532_I2C pn532i2c(Wire);
PN532 nfc(pn532i2c);

HX711 scale;
HX711 scale_2;
HX711 scale_3;

NewPing sonar(TRIGGER_PIN, ECHO_PIN, MAX_DISTANCE);
NewPing sonar_2(TRIGGER_PIN_2, ECHO_PIN_2, MAX_DISTANCE);
NewPing sonar_3(TRIGGER_PIN_3, ECHO_PIN_3, MAX_DISTANCE);
float duration, distance, distance_2, distance_3;

int tijd_1 = 0;
int tijd_2 = 0;
int tijd_3 = 0;
int tijd_12 = 0;
int tijd_22 = 0;
int tijd_32 = 0;

int inhoud = 212;
int inhoud_2 = 212;
int inhoud_3 = 212;

int verschil;
int verschil_2;
int verschil_3;

String ingelogde_user;

SevenSegmentTM1637 display(CLK, DIO);

void setup(){
    Serial.begin(9600);
    
    display.on();
    display.begin();
    display.setBacklight(100);
    display.clear();
  
    pinMode(LED1, OUTPUT);
    pinMode(LED2, OUTPUT);
    pinMode(LED3, OUTPUT);

    scale.begin(LOADCELL_DOUT_PIN, LOADCELL_SCK_PIN);
    scale.set_scale(calibration_factor);
    scale.tare();

    scale_2.begin(LOADCELL_DOUT_PIN_2, LOADCELL_SCK_PIN_2);
    scale_2.set_scale(calibration_factor_2);
    scale_2.tare();

    scale_3.begin(LOADCELL_DOUT_PIN_3, LOADCELL_SCK_PIN_3);
    scale_3.set_scale(calibration_factor_3);
    scale_3.tare();

    nfc.begin();

    uint32_t versiondata = nfc.getFirmwareVersion();
    if (! versiondata) {
      Serial.println("Didn't find PN53x board");
      while (1); // halt
    }

    nfc.setPassiveActivationRetries(0xFF);
    nfc.SAMConfig();
}

void loop(){  

    digitalWrite(LED1, HIGH);
    digitalWrite(LED2, HIGH);
     digitalWrite(LED3, HIGH);                                                                                          
    
    while(Serial.available()> 0){
      data = Serial.read(); 
    } 

    switch (data){
      Serial.println(data);
      case 'l':
        object = 'l';
        break;
      case '1':
        if (object == 'l'){
          digitalWrite(LED1, HIGH);
        }
        break;
      case '0':
        if (object == 'l'){
          digitalWrite(LED2, HIGH);
        }                                                                                                               
        break;
      case '2':
        if (object == 'l'){
          digitalWrite(LED3, HIGH);
        }
        break;
      case '3':
        if (object == 'l'){
          digitalWrite(LED1, LOW);
          digitalWrite(LED2, LOW);
          digitalWrite(LED3, LOW);
        }
        break;
    }
                                       
    
    boolean success;
    uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  
    uint8_t uidLength;
    success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, &uid[0], &uidLength);

    if (success){
      String hex_value = "";
      for (uint8_t i=0; i < uidLength; i++) {
        hex_value += (String)uid[i];
      }
      ingelogde_user = hex_value;
      delay(500);
    }
    
    
    if(scale.get_units() > inhoud){
      delay(500);
      verschil = scale.get_units() - inhoud;
      Serial.print(ingelogde_user);
      Serial.print(" rest ");
      Serial.print(verschil);
      Serial.println();
      inhoud = scale.get_units() + 2;
    }
    
    if(scale_2.get_units() > inhoud_2){
      delay(500);
      verschil_2 = scale_2.get_units() - inhoud_2;
      Serial.print(ingelogde_user);
      Serial.print(" plastic ");
      Serial.print(verschil_2);
      Serial.println();
      inhoud_2 = scale_2.get_units() + 2;
    }

     if(scale_3.get_units() > inhoud_3){
      delay(500);
      verschil_3 = scale_3.get_units() - inhoud_3;
      Serial.print(ingelogde_user);
      Serial.print(" gft ");
      Serial.print(verschil_3);
      Serial.println();
      inhoud_3 = scale_3.get_units() + 3;
    }


    distance = sonar.ping_cm();
    distance_2 = sonar_2.ping_cm();
    distance_3 = sonar_3.ping_cm();

    if(distance <= 7 && distance >= 1){ 
      tijd_1 = tijd_1 + 1;
      delay(500);
    }

    if(tijd_1 == 5){
      tijd_12 = 0;
      Serial.println("B1V");
    }
    
    if(distance > 7){
      tijd_12 = tijd_12 + 1;
      delay(500);
    }

    if(tijd_12 == 5){
      tijd_1 = 0;
      Serial.println("B1L");
    }

    if(distance_2 <= 7 && distance_2 >= 1){
      tijd_2 = tijd_2 + 1;
      delay(500);
    }

    if(tijd_2 == 5){
      tijd_22 = 0;
      Serial.println("B2V");
    }

    if(distance_2 > 7){
      tijd_22 = tijd_22 + 1;
      delay(500);
    }

    if(tijd_22 == 5){
       tijd_2 = 0;
      Serial.println("B2L");
    }

    if(distance_3 <= 10 && distance_3 >=1){
      tijd_3 = tijd_3 + 1;
      delay(500);
    }

    if(tijd_3 == 5){
      tijd_32 = 0;
      Serial.println("B3V");
    }

    if(distance_3 > 7){
      tijd_3 = 0;
      tijd_32 = tijd_32 + 1;
      delay(500);
    }

    if(tijd_32 == 5){
      tijd_3 = 0;
      Serial.println("B3L");
    }

    if(tijd_1 >= 5){
      display.clear();
      display.print("Vol");
      delay(1000);
      display.print("Rest");
      delay(1000);
    }

    if(tijd_2 >= 5){
      display.clear();
      display.print("Vol");
      delay(1000);
      display.print("Plas");
      delay(1000);
    }

    if(tijd_3 >= 5){
      display.clear();                                                       
      display.print("Vol");
      delay(500);
      display.print("Gft");  
      delay(1000);
    }

    if(tijd_1 < 5 && tijd_2 < 5 && tijd_3 < 5){
      display.clear();
    }


}
