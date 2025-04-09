#include <Wire.h>
#include "Adafruit_HTU21DF.h"

// Connect Vin to 3-5VDC
// Connect GND to ground
// Connect SCL to I2C clock pin (A5 on UNO)
// Connect SDA to I2C data pin (A4 on UNO)
char tmpvalue[100] ;
Adafruit_HTU21DF htu = Adafruit_HTU21DF();

//先建立啟動HTU21D感測物件的啟動函式
// -------------Function Declare-----------
void initHTU21D() ; // 初始化HTU21D Sensor
float ReadTemperature() ;//建立讀取HTU21D 溫溼度感測器之溫度函式
float ReadHumidity() ;//建立讀取HTU21D 溫溼度感測器之溼度函式
void printTemperatureonOled(float t); //列印HTU21D 溫溼度感測器之溫度於OLED上
void printHumidityonOled(float h) ;//列印HTU21D 溫溼度感測器之濕度於OLED上
// -------------Function Declare-----------
初始化HTU21D Sensor
{
    if (!htu.begin()) 
    {
      Serial.println("Couldn't find sensor!");
      while (1);
    }
}

float ReadTemperature() //建立讀取HTU21D 溫溼度感測器之溫度函式
{
  return htu.readTemperature();
}

float ReadHumidity() //建立讀取HTU21D 溫溼度感測器之溼度函式
{
  return readHumidity();   
}


void printTemperatureonOled(float t) //列印HTU21D 溫溼度感測器之溫度於OLED上
{
      sprintf(tmpvalue,"%5.1f",t) ;   //格式化列印
      Serial.print("Data:");
      Serial.print(tmpvalue);
      Serial.print("\n");
      
      _TPrint(1,15,"Temp:");
      _TPrint(50,15,tmpvalue);
      _TPrint(100,15,".C");
}
void printHumidityonOled(float h) //列印HTU21D 溫溼度感測器之濕度於OLED上
{
  
      sprintf(tmpvalue,"%5.1f",h) ;
      Serial.print("Data:");
      Serial.print(tmpvalue);
      Serial.print("\n");
      
      _TPrint(1,31,"Humid:");
      _TPrint(60,31,tmpvalue);
      _TPrint(110,31,"%");
}
