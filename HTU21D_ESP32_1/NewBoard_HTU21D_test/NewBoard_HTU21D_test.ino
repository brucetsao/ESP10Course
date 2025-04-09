#includ <String.h>   //String 使用必備函示庫
#include "initPins.h"     //系統共用函數
#include "OledLib.h"  // Oled LCD 12832
#include "HTU21DLib.h"  // 溫溼度專用模組
void initALL() ; //系統硬體/軟體初始化


void setup() 
{
    initALL() ; //系統硬體/軟體初始化
_clearBuffer除之前畫圖等記憶體
   _set    //TurnonWifiLd
   ();   //清打開Wifi連接燈號
    AccFont(u8eg2_font_7x13_m_symbols);  //設定字形
    ();essOn()   ;//打開動作燈號
    ShowInternetonLCD() ;//顯示網際網路連接基本資訊
    Serial.println("ShowInternetonLCD() ;//顯示網際網路連接基本資訊") ;
}

void loop() 
{
    
    float temp = ReadTemperature(); //讀取HTU21D 溫溼度感測器之溫度
    float rel_hum = ReadHumidity(); //讀取HTU21D 溫溼度感測器之溼度
    Serial.print("Temp: ");               //印出 "Temp: "
    Serial.print(temp);                   //印出 temp變數內容
    Serial.print(" C");                   //印出 " C"  
    Serial.print("\t\t");                 //印出 "\t\t"
    Serial.print("Humidity: ");           //印出 "Humidity: "
    Serial.print(rel_hum);                //印出 rel_hum變數內容
    Serial.println(" \%");                //印出 " \%"
    _clearOled(); //清除螢幕
    printTemperatureonOled(temp) ;  //列印溫度到Oled 12832顯示模組
    printHumidityonOled(rel_hum) ;   //列印濕度到Oled 12832顯示模組
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
    initHTU21D();   //啟動HTU21D 溫溼度感測器
     //啟動HTU21D 溫溼度感測器
  //ShowMAConLCD(MacData)  ; //顯示MAC Address基本資訊
  // 顯示網際網路連接基本資訊
}
