#include <Wire.h>   // I2C 基礎通訊函式庫
#include "Adafruit_HTU21DF.h"   // HTU21D 溫溼度感測器美國 Adafruit 原廠函式庫

// Connect Vin to 3-5VDC
// Connect GND to ground
// Connect SCL to I2C clock pin (A5 on UNO)
// Connect SDA to I2C data pin (A4 on UNO)

char tmpvalue[100];  // 定義一個字元陣列來儲存溫溼度數值
Adafruit_HTU21DF htu = Adafruit_HTU21DF();  // 產生 HTU21D 溫溼度感測器運作物件

void initHTU21D();   // 宣告啟動 HTU21D 溫溼度感測器的函式
float ReadTemperature();  // 宣告讀取 HTU21D 溫溼度感測器溫度的函式
float ReadHumidity();  // 宣告讀取 HTU21D 溫溼度感測器濕度的函式
void printTemperatureonOled(float t); // 宣告列印溫度到 OLED 的函式
void printHumidityonOled(float h); // 宣告列印濕度到 OLED 的函式

// ------------------
void initHTU21D()   // 啟動 HTU21D 溫溼度感測器
{
    if (!htu.begin())   // 如果 HTU21D 溫溼度感測器沒有啟動成功
    {
      Serial.println("Couldn't find sensor!");    // 印出 "Couldn't find sensor!"
      while (1);  // 永遠停在這裡
    }
}

float ReadTemperature() // 讀取 HTU21D 溫溼度感測器之溫度
{
    return htu.readTemperature();   // 回傳溫溼度感測器之溫度
}

float ReadHumidity() // 讀取 HTU21D 溫溼度感測器之濕度
{
    return htu.readHumidity();  // 回傳溫溼度感測器之濕度
}

void printTemperatureonOled(float t) // 列印 HTU21D 溫溼度感測器之溫度於 OLED 上
{
    sprintf(tmpvalue, "%5.1f", t);   // 格式化溫度數值並儲存到 tmpvalue
    Serial.print("Data:");  // 印出字串 "Data:"
    Serial.print(tmpvalue);  // 印出溫度數值
    Serial.print("\n");  // 換行

    _TPrint(1, 15, "Temp:");  // 在 OLED 的指定位置列印 "Temp:"
    _TPrint(50, 15, tmpvalue);  // 在 OLED 的指定位置列印溫度數值
    _TPrint(100, 15, ".C");  // 在 OLED 的指定位置列印 ".C"
}

void printHumidityonOled(float h) // 列印 HTU21D 溫溼度感測器之濕度於 OLED 上
{
    sprintf(tmpvalue, "%5.1f", h);  // 格式化濕度數值並儲存到 tmpvalue
    Serial.print("Data:");  // 印出字串 "Data:"
    Serial.print(tmpvalue);  // 印出濕度數值
    Serial.print("\n");  // 換行

    _TPrint(1, 31, "Humid:");  // 在 OLED 的指定位置列印 "Humid:"
    _TPrint(60, 31, tmpvalue);  // 在 OLED 的指定位置列印濕度數值
    _TPrint(110, 31, "%");  // 在 OLED 的指定位置列印 "%"
}
