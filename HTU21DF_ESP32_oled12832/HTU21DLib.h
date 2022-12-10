/***************************************************
  This is an example for the HTU21D-F Humidity & Temp Sensor

  Designed specifically to work with the HTU21D-F sensor from Adafruit
  ----> https://www.adafruit.com/products/1899

  These displays use I2C to communicate, 2 pins are required to
  interface
 ****************************************************/


#include <Wire.h>   //I2C 基礎通訊函式庫
#include "Adafruit_HTU21DF.h"   // HTU21D 溫溼度感測器函式庫
  
// Connect Vin to 3-5VDC
// Connect GND to ground
// Connect SCL to I2C clock pin (A5 on UNO)
// Connect SDA to I2C data pin (A4 on UNO)

Adafruit_HTU21DF htu = Adafruit_HTU21DF();  //產生HTU21D 溫溼度感測器運作物件
 //產生HTU21D 溫溼度感測器運作物件
void initHTU21D()   //啟動HTU21D 溫溼度感測器
{
    if (!htu.begin())   //如果 HTU21D 溫溼度感測器沒有啟動成功
    {
      Serial.println("Couldn't find sensor!");    //印出 "Couldn't find sensor!"
      //找不到 HTU21D 溫溼度感測器
      while (1);  //永遠死在這
    }
}

float ReadTemperature() //讀取HTU21D 溫溼度感測器之溫度
{
    return htu.readTemperature();   //回傳溫溼度感測器之溫度
}
float ReadHumidity() //讀取HTU21D 溫溼度感測器之溼度
{
    return htu.readHumidity();  //回傳溫溼度感測器之溼度
}
