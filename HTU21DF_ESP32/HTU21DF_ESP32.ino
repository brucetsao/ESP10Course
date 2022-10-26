#include <Wire.h> //I2C 基礎通訊函式庫
#include "Adafruit_HTU21DF.h" // HTU21D 溫溼度感測器函式庫

// Connect Vin to 3-5VDC
// Connect GND to ground
// Connect SCL to I2C clock pin GPIO 22
// Connect SDA to I2C data pin GPIO 21

Adafruit_HTU21DF htu = Adafruit_HTU21DF();   //產生HTU21D 溫溼度感測器運作物件
 //產生HTU21D 溫溼度感測器運作物件
void setup() 
{
  Serial.begin(9600);     //通訊控制埠 初始化，並設為9600 bps
  Serial.println("HTU21D-F test");  //印出 "HTU21D-F test"

  if (!htu.begin()) 
  {
    Serial.println("Couldn't find sensor!");      //印出 "Couldn't find sensor!"
    while (1);
  }
}

void loop() 
{
    float temp = htu.readTemperature();   //利用函式庫讀取感測模組之溫度
    float rel_hum = htu.readHumidity();   //利用函式庫讀取感測模組之濕度
    Serial.print("Temp: ");               //印出 "Temp: "
    Serial.print(temp);                   //印出 temp變數內容
    Serial.print(" C");                   //印出 " C"  
    Serial.print("\t\t");                 //印出 "\t\t"
    Serial.print("Humidity: ");           //印出 "Humidity: "
    Serial.print(rel_hum);                //印出 rel_hum變數內容
    Serial.println(" \%");                //印出 " \%"
    delay(2000);      //延遲2秒鐘
}
