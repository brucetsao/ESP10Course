#include <Wire.h>                  // 引用 I2C 基礎通訊函式庫
#include "Adafruit_HTU21DF.h"      // 引用 HTU21D 溫溼度感測器函式庫

// 以下是進行感測器連接的設置
// Vin 連接 3-5VDC
// GND 連接 GND
// SCL 連接 I2C clock pin(GPIO 22)
// SDA 連接 I2C data pin(GPIO 21)

Adafruit_HTU21DF htu = Adafruit_HTU21DF(); // 宣告 htu 物件，用來對 HTU21D 溫溼度感測器進行操作

void setup() 
{
  Serial.begin(9600);     // 初始化序列通訊控制埠，波特率設置為 9600bps
  Serial.println("HTU21D-F test");  // 輸出 "HTU21D-F test" 以表示測試開始

  if (!htu.begin())   // 如果 htu 物件初始化失敗
  {
    Serial.println("Couldn't find sensor!");  // 輸出 "Couldn't find sensor!"
    while (1);  // 進入無窮迴圈以停止程式執行
  }
}

void loop() 
{
  float temp = htu.readTemperature();    // 讀取感測器的溫度，並將其存儲到 temp 變數中
  float rel_hum = htu.readHumidity();    // 讀取感測器的濕度，並將其存儲到 rel_hum 變數中
  Serial.print("Temperature: ");        // 輸出 "Temperature: "，用來表示以下輸出的是溫度
  Serial.print(temp);                   // 輸出 temp 變數的值，即感測器測量的溫度
  Serial.print(" C");                   // 輸出 " C"，用來表示溫度的單位是攝氏度
  Serial.print("\t\t");                 // 輸出兩個水平定位符號，用來分隔溫度和濕度的輸出
  Serial.print("Humidity: ");           // 輸出 "Humidity: "，用來表示以下輸出的是濕度
  Serial.print(rel_hum);                // 輸出 rel_hum 變數的值，即感測器測量的濕度
    Serial.println(" \%");                //印出 " \%"
    delay(2000);     // 延遲 2 秒，避免感測器過於頻繁地進行測量
}
