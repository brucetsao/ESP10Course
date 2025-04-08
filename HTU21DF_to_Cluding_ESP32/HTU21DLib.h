/***************************************************
  This is an example for the HTU21D-F Humidity & Temp Sensor

  Designed specifically to work with the HTU21D-F sensor from Adafruit
  ----> https://www.adafruit.com/products/1899

  These displays use I2C to communicate, 2 pins are required to
  interface
  這是一段程式註解，
  說明此程式是用來操作 HTU21D-F 溫溼度感測器的範例。
  該感測器由 Adafruit 公司設計，
  產品頁面連結為
https://www.adafruit.com/products/1899。
它使用 I2C 通訊協定與微控制器（如 ESP32）進行資料傳輸，
只需兩根腳位（SCL 和 SDA）即可連接
  
這段程式是用來操作 HTU21D-F 溫溼度感測器的範例程式，主要功能包括：

初始化感測器並檢查是否正常工作。
提供函數讀取溫度和濕度。
將溫度和濕度值格式化後，顯示在 OLED 螢幕上，並透過序列埠輸出。
 ****************************************************/


#include <Wire.h>   // I2C 基礎通訊函式庫，引入 I2C 通訊的基礎函式庫，讓程式能透過 I2C 協定與感測器通訊。
#include "Adafruit_HTU21DF.h"   // HTU21D 溫溼度感測器函式庫，引入專為 HTU21D-F 感測器設計的函式庫，內含操作該感測器的功能。
  
// Connect Vin to 3-5VDC
//Vin 接 3-5V 電源。
// Connect GND to ground
//GND 接地。
// Connect SCL to I2C clock pin (GPIO21 on ESP32，A5 on UNO)
//SCL 接 I2C 的時鐘腳位（在 GPIO21 on ESP32，Arduino UNO 上是 A5）。
// Connect SDA to I2C data pin (GPIO22 on ESP32，A4 on UNO)
//SDA 接 I2C 的資料腳位（在GPIO22 on ESP32， Arduino UNO 上是 A4）

char tmpvalue[100] ;    //顯示OLED 文字暫存字元陣列，定義一個容量為 100 字元的陣列，用來暫存要顯示在 OLED 螢幕上的文字。 
double Tvalue , Hvalue ;    //溫定義兩個雙精度浮點數變數，分別用來儲存溫度（Tvalue）和濕度（Hvalue）。
Adafruit_HTU21DF htu = Adafruit_HTU21DF();  //創建一個名為 htu 的 HTU21D-F 感測器物件，用來操作感測器。
 //產生HTU21D 溫溼度感測器運作物件
void initHTU21D()   //啟動HTU21D 溫溼度感測器，定義一個函數，用來初始化 HTU21D-F 感測器。
{
    if (!htu.begin())   //檢查感測器是否成功啟動。如果 htu.begin() 回傳 false，表示啟動失敗。
    {
      Serial.println("Couldn't find sensor!");    //印出 "Couldn't find sensor!"，若啟動失敗，透過序列埠印出「找不到感測器！」的訊息。
      //找不到 HTU21D 溫溼度感測器
      while (1);  //永遠死在這，進入無限迴圈，程式卡死，表示硬體連線可能有問題，需檢查。
    }
}

float ReadTemperature() //讀取HTU21D 溫溼度感測器之溫度
{
  //定義一個函數，用來讀取感測器的溫度值
    return htu.readTemperature();   //回傳溫溼度感測器之溫度
    //呼叫 htu 物件的 readTemperature() 方法，讀取溫度並回傳（單位為攝氏度）。
}
float ReadHumidity() //讀取HTU21D 溫溼度感測器之溼度
{
  //定義一個函數，用來讀取感測器的濕度值。
    return htu.readHumidity();  //回傳溫溼度感測器之溼度
    //呼叫 htu 物件的 readHumidity() 方法，讀取濕度並回傳（單位為百分比 %）。
}

void printTemperatureonOled(float t) //讀取HTU21D 溫溼度感測器之溫度
{
  //定義一個函數，用來將溫度值顯示在 OLED 螢幕上，參數 t 是溫度值。
      sprintf(tmpvalue,"%5.1f",t) ; //將浮點數溫度值 t 格式化為字串，保留 1 位小數，存入 tmpvalue。
      Serial.print("Data:");  //透過序列埠輸出「Data:」加上格式化後的溫度值，並換行。
      Serial.print(tmpvalue);
      Serial.print("\n");

      //自訂函數，用來在 OLED 的指定座標 (x, y) 顯示文字
      _TPrint(1,15,"Temp:");  //(1, 15) 顯示「Temp:」
      _TPrint(50,15,tmpvalue);  //(50, 15) 顯示溫度值。
      _TPrint(100,15,".C"); //(100, 15) 顯示單位「.C」（攝氏）。
}

void printHumidityonOled(float h) //讀取HTU21D 溫溼度感測器之溫度
{
    //定義一個函數，用來將濕度值顯示在 OLED 螢幕上，參數 h 是濕度值。
      sprintf(tmpvalue,"%5.1f",h) ;//將浮點數濕度值 h 格式化為字串，保留 1 位小數，存入 tmpvalue。
//      Serial.print("Data:");//透過序列埠輸出「Data:」加上格式化後的濕度值，並換行
      Serial.print(tmpvalue);
      Serial.print("\n");

      //自訂函數，用來在 OLED 的指定座標 (x, y) 顯示文字
      _TPrint(1,31,"Humid:"); //(1, 31) 顯示「Humid:」。
      _TPrint(60,31,tmpvalue);  //(60, 31) 顯示濕度值。
      _TPrint(110,31,"%");  //(110, 31) 顯示單位「%」。
}
