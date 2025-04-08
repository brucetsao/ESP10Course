#include "BMPLib.h"

void setup() 
{
  initALl() ;
  

}
  
void loop() {
    Serial.print("Temperature = ");
    Serial.print(readBMPTemperature());
    Serial.println(" *C");
    
    Serial.print("Pressure = ");
    Serial.print(readBMPPressure());
    Serial.println(" Pa");

   // Serial.print("Approx altitude = ");
   // Serial.print(bme.readAltitude(1013.25)); // this should be adjusted to your local forcase
   // Serial.println(" m");
    
    Serial.println();
    delay(2000);
}

void initALL()
{
    Serial.begin(9600);
  Serial.println(F("BMP280 test"));
  initBMP280() ;  //起始BMP280壓力計
}
