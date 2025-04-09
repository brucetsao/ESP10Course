#include <Wire.h>
#include "Adafruit_HTU21DF.h"

// Connect Vin to 3-5VDC
// Connect GND to ground
// Connect SCL to I2C clock pin (A5 on UNO)
// Connect SDA to I2C data pin (A4 on UNO)

Adafruit_HTU21DF htu = Adafruit_HTU21DF();

//-----------
void initHTU21D() ;  //初始化htu21D感測器
float readTemperature();   //讀取溫度
float readHumidity() ;  //讀取濕度


void initHTU21D()   //初始化htu21D感測器
{
    htu.begin() ;
}

float readTemperature()   //讀取溫度
{
  return htu.readTemperature();
}

float readHumidity()   //讀取濕度
{
  return htu.readHumidity();
}
