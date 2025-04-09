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
  // put your main code here, to run repeatedly:
  Serial.print("Temperature:") ;
  Serial.print( ReadTemperature()) ;
  Serial.print(".C and ") ;
  Serial.print(ReadHumidity()) ;
   Serial.print(" % \n") ;
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
