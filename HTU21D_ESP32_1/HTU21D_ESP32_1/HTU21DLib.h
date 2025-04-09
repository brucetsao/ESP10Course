#include <Wire.h>
#include "Adafruit_HTU21DF.h"

// Connect Vin to 3-5VDC
// Connect GND to ground
// Connect SCL to I2C clock pin (A5 on UNO)
// Connect SDA to I2C data pin (A4 on UNO)

Adafruit_HTU21DF htu = Adafruit_HTU21DF();

//先建立啟動HTU21D感測物件的啟動函式
void initHTU21D()
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
  return htu.readHumidity();   
}
