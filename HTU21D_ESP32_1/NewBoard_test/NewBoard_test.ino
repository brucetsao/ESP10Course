#include <String.h>   //String 使用必備函示庫
#include "initPins.h"     //系統共用函數
#include "OledLib.h"  // Oled LCD 12832
void initALL() ; //系統硬體/軟體初始化
void printHumidityonOled(float h) ;//讀取HTU21D 溫溼度感測器之溫度


void setup() 
{
    initALL() ; //系統硬體/軟體初始化

   _clearBuffer();   //清除之前畫圖等記憶體
   _setFont(u8g2_font_7x13_m_symbols);  //設定字形
    TurnonWifiLed();    //打開Wifi連接燈號
    AccessOn();   //打開動作燈號
    ShowInternetonLCD() ;//顯示網際網路連接基本資訊
    Serial.println("ShowInternetonLCD() ;//顯示網際網路連接基本資訊") ;
}

void loop() 
{
      
    ShowTestLongonLCD(millis()) ;
    //printHumidityonOled(33) ;   //列印濕度到Oled 12832顯示模組
    _updateBuffer();    //更新圖型記憶體內容到畫面
    delay(2000);      //延遲2秒鐘
   
}

void initALL()  //系統硬體/軟體初始化
{
    initGPIO() ;    //初始化ALL GPIO Mode
    Serial.begin(9600);   //通訊控制埠 初始化，並設為9600 bps
  Serial.println("System Start");
  MacData = GetMacAddress() ; //取得網路卡編號
  Serial.print("MAC:(");
  Serial.print(MacData);
  Serial.print(")\n");

    initOLED();   //啟動OLED 12832顯示模組
    // 初始化LCD螢幕
  //ShowMAConLCD(MacData)  ; //顯示MAC Address基本資訊
  // 顯示網際網路連接基本資訊
}

void printHumidityonOled(float h) //讀取HTU21D 溫溼度感測器之溫度
{
  
      sprintf(tmpvalue,"%5.1f",h) ;
      Serial.print("Humidity:");
      Serial.print(tmpvalue);
      Serial.print("\n");
      
      _TPrint(1,31,"Humid:");
      _TPrint(60,31,tmpvalue);
      _TPrint(110,31,"%");
}
