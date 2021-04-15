#include  <M5Atom.h>

#define TRIG 23
#define DLED 33

byte data;
int i = 0;
char received_data[32] = "";
bool reading = false;

void setup() {
  M5.begin(false, false, true);
  Serial.begin(9600);
  Serial2.begin(9600, SERIAL_8N1, 22, 19);
  M5.dis.drawpix(0, 0x00f000);
  pinMode(TRIG, OUTPUT);
  pinMode(DLED, INPUT);
  digitalWrite(TRIG, HIGH);
}

// Writes the barcode as a string of characters to the Serial monitor
// this will be received and set as a request from the PI to the
// OpenFoodFacts API for the product data
void loop() {
  M5.update();
  if(digitalRead(39) == LOW){
    digitalWrite(TRIG, LOW);
  }else {
    digitalWrite(TRIG, HIGH);
  }
  if(digitalRead(DLED) == HIGH){
    if(Serial2.available() > 0){
      char received_data = Serial2.read();
      Serial.print(received_data);
    }
  }
}
