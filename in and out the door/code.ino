//Ultrasonic 1
//int trigPin = PIN_PB3;
//int echoPin = PIN_PB4;
#include <Wire.h> 
#include<LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,16,2);

int count_enter = 0;  //นับคนเข้า
int count_exit = 0;   //นับคนออก
//int buzzer = PIN_PB5;

long time;
//int distance1;
void setup() {
  //Ultrasonic1
  pinMode(PIN_PC0, OUTPUT);
  pinMode(PIN_PC1, INPUT);
  //pinMode(buzzer, OUTPUT);

  //pinMode(9, OUTPUT);
  //beep(50);
  //beep(50);
  //beep(50);
 // delay(1000);


  //Ultrasonic2
  pinMode(PIN_PC2, OUTPUT);
  pinMode(PIN_PC3, INPUT);  

  lcd.init();
  lcd.backlight();
  lcd.begin(16,2);
  //lcd.clear();
  lcd.setCursor(0,0);
  lcd.print(" WELCOME");
  lcd.setCursor(0,1);
  //lcd.print("");
  delay(1000);
  lcd.clear();
  Serial.begin(9600);
}
void loop() {
  int sensorValue1 = readSensor1();
  int sensorValue2 = readSensor2();

  //แสดงค่าที่อ่านได้
  //Serial.print("sensor1: ");
  //Serial.print(sensorValue1);
  //Serial.print('\t');
  //Serial.print("sensor2: ");
  //Serial.println(sensorValue2);

//นับคนเข้า
if(sensorValue1<10){
  count_enter += 1;
  delay(500);
//  beep(200);
}
//นับคนออก
if(sensorValue2<10){
  count_exit += 1;
   delay(500);
   //beep(200);
   //lcd.setCursor(5,4); 
   //lcd.print(count_exit += 1);
}

  Serial.print("Enter: ");
  Serial.print(count_enter);
  Serial.print('\t');
  Serial.print("Exit: ");
  Serial.println(count_exit);
  //lcd.clear(); 
  
//  lcd.print(speed,1);
  lcd.setCursor(0,4); 
  lcd.print("OUT =");
  lcd.setCursor(0,0); 
  lcd.print("IN =");
  
  //lcd.setCursor(3,0); 

  
}

int readSensor1(){
  digitalWrite(PIN_PC0, HIGH);
  delayMicroseconds(2);
  digitalWrite(PIN_PC0, LOW);
  delayMicroseconds(10);
  digitalWrite(PIN_PC0, HIGH);
  time = pulseIn(PIN_PC1, HIGH);
  int distance1 = (time * 0.034) / 2;
  lcd.setCursor(5, 0); 
  //lcd.print(distance1);
  lcd.print(count_enter);
  delay(500);
  return distance1;
}
int readSensor2(){
  digitalWrite(PIN_PC2, HIGH);
  delayMicroseconds(2);
  digitalWrite(PIN_PC2, LOW);
  delayMicroseconds(10);
  digitalWrite(PIN_PC2, HIGH);
  time = pulseIn(PIN_PC3, HIGH);
  int distance2 = (time * 0.034) / 2;
  lcd.setCursor(5,4); 
  lcd.println(count_exit);
  delay(500);
 
  //lcd.print(distance2);
  return distance2;
  
}

//void beep(unsigned char delayms){
//analogWrite(9, 20); // Almost any value can be used except 0 and 255
// experiment to get the best tone
//delay(delayms); // wait for a delayms ms
//analogWrite(9, 0); // 0 turns it off
//delay(delayms); // wait for a delayms ms 


 
