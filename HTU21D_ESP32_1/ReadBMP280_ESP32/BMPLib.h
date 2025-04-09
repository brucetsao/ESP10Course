
#include <Wire.h>
#include <SPI.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BMP280.h>

#define BMP_SCK 13
#define BMP_MISO 12
#define BMP_MOSI 11 
#define BMP_CS 10

Adafruit_BMP280 bme; // I2C
//Adafruit_BMP280 bme(BMP_CS); // hardware SPI
//Adafruit_BMP280 bme(BMP_CS, BMP_MOSI, BMP_MISO,  BMP_SCK);
#define SeaPressure 1024    //設定海平面

void initBMP280()    //起始BMP280壓力計
{ //起始BMP280壓力計
    if (!bme.begin()) 
  {  
    Serial.println("Could not find a valid BMP280 sensor, check wiring!");
    while (1);
  }
}

double readBMPTemperature()
{
  return bme.readTemperature() ;
}


double readBMPPressure()
{
  return  bme.readPressure() ;
}

double readBMPAltitude()
{
  return bme.readAltitude(SeaPressure) ;
}
