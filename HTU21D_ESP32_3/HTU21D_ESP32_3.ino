#include "initPins.h"  // 使用系統設定與環境設定等模組
#include "OledLib.h"  // Oled LCD 12832專用模組
#include "HTU21DLib.h"  // 溫溼度專用模組
void initAll() ; //寫一隻設定整個專案系統的初始化設定
void initAllSensor() ;  //初始化所有會用到的感測器

void setup() 
{
  // put your setup code here, to run once:
  initAll() ; //寫一隻設定整個專案系統的初始化設
  initAllSensor() ;  //初始化所有會用到的感測器
}
void loop() 
{
    //讀出溫溼度放到變數
    float temp = ReadTemperature(); //讀取HTU21D 溫溼度感測器之溫度
    float rel_hum = ReadHumidity(); //讀取HTU21D 溫溼度感測器之溼度
    //印變數內容
    Serial.print("Temp: ");               //印出 "Temp: "
    Serial.print(temp);                   //印出 temp變數內容
    Serial.print(" C");                   //印出 " C"  
    Serial.print("\t\t");                 //印出 "\t\t"
    Serial.print("Humidity: ");           //印出 "Humidity: "
    Serial.print(rel_hum);                //印出 rel_hum變數內容
    Serial.println(" \%");                //印出 " \%"
    _clearOled(); //清除螢幕
    //把溫溼度資訊送到OLED 畫面站存記憶體
    printTemperatureonOled(temp) ;  //列印溫度到Oled 12832顯示模組
    printHumidityonOled(rel_hum) ;   //列印濕度到Oled 12832顯示模組
    _updateBuffer();    //更新圖型記憶體內容到畫面
   delay(5000) ;  //delay 5 secs
   
}
void initAll()  //寫一隻設定整個專案系統的初始化設定
{
    Serial.begin(9600) ;
    Serial.println("System Star...") ;
    
}
void initAllSensor() //初始化所有會用到的感測器
{
    initHTU21D() ;  //先建立啟動HTU21D感測物件的啟動函式
    initOLED();   //啟動OLED 12832顯示模組
      _clearBuffer();   //清除之前畫圖等記憶體
     _setFont(u8g2_font_logisoso16_tf);  //設定字形
     _clearOled(); //清除螢幕
     _updateBuffer();    //更新圖型記憶體內容到畫面

   
}
