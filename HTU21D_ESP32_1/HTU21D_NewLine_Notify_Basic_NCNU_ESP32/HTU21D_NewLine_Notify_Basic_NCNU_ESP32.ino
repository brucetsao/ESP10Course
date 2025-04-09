#include "initPins.h"     // 腳位與系統模組
#include "LineLib.h"     // Line Notify自訂模組
#include "OledLib.h"  // Oled LCD 12832
#include "HTU21DLib.h"  // 溫溼度專用模組


void setup()
{

    initALL() ; //系統硬體/軟體初始化
   _clearBuffer();   //清除之前畫圖等記憶體
   _setFont(u8g2_font_logisoso16_tf);  //設定字形
       
    initWiFi() ;  //網路連線，連上熱點
    ShowInternet();  //秀出網路連線資訊
   
    initLine() ;    //起始Line Notifier連線
    delay(1000) ;
}

void loop()
{
    float Temp_Value = ReadTemperature(); //讀取HTU21D 溫溼度感測器之溫度
    float Humid_Value= ReadHumidity(); //讀取HTU21D 溫溼度感測器之溼度
    String msg ="目前溫度:"+String(Temp_Value)+"°C, 目前濕度："+String(Humid_Value);
    Serial.print("Temp: "); Serial.print(Temp_Value); Serial.print(" C");
    Serial.print("\t\t");
    Serial.print("Humidity: "); Serial.print(Humid_Value); Serial.println(" \%");
    SendMsgtoLine( msg) ;  //傳送資訊到Line Notifier
    _clearOled(); //清除螢幕
    //把溫溼度資訊送到OLED 畫面站存記憶體
    printTemperatureonOled(Temp_Value) ;  //列印溫度到Oled 12832顯示模組
    printHumidityonOled(Humid_Value) ;   //列印濕度到Oled 12832顯示模組
    _updateBuffer();    //更新圖型記憶體內容到畫面
    

    
    delay(20000) ;
}

/* Function to print the sending result via Serial */

void initALL()  //系統硬體/軟體初始化
{
    Serial.begin(9600);
    Serial.println("System Start");

    MacData = GetMacAddress() ;   //取得網路卡編號
        initHTU21D();   //啟動HTU21D 溫溼度感測器
    initOLED();   //啟動OLED 12832顯示模組
    
}
