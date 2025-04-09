#include "initPins.h"    //系統共用函數
#include "OledLib.h"  // Oled LCD 12832 共用函數
#include "HTU21DLib.h"  // 溫溼度專用模組 共用函數
#include "clouding.h"   //雲端模組 共用函數

void initAll();    //初始化系統 in initPins.h
void initDevice();  //系統硬體/軟體初始化  in main program


void setup() 
{
    initAll();       // 呼叫函數：執行系統硬體與軟體的初始化，包括串列通訊與 GPIO 設定
    delay(2000);
    initDevice() ;    //系統周邊/感測器 初始化
   _clearBuffer();   //清除之前畫圖等記憶體
   _setFont(u8g2_font_logisoso16_tf);  //設定字形
  
//----------- activate wifi
    initWiFi();      // 呼叫函數：初始化網路連線，連接到指定的 WiFi 熱點（如路由器）
    delay(2000) ;
    MacData = GetMacAddress() ; // 取得網路卡的MAC地址
    ShowMAC() ;// 在串列埠顯示MAC地址
    ShowInternet();  // 呼叫函數：顯示當前的網路連線資訊，例如 IP 地址，方便除錯
}

void loop() 
{
 
    Tvalue = ReadTemperature(); //讀取HTU21D 溫溼度感測器之溫度
    Hvalue = ReadHumidity(); //讀取HTU21D 溫溼度感測器之溼度
    Serial.print("Temp: ");               //印出 "Temp: "
    Serial.print(Tvalue);                   //印出 temp變數內容
    Serial.print(" C");                   //印出 " C"  
    Serial.print("\t\t");                 //印出 "\t\t"
    Serial.print("Humidity: ");           //印出 "Humidity: "
    Serial.print(Hvalue);                //印出 rel_hum變數內容
    Serial.println(" \%");                //印出 " %"
    _clearOled(); //清除螢幕
    printTemperatureonOled(Tvalue) ;
    printHumidityonOled(Hvalue) ;
    _updateBuffer();    //更新oled畫面
    SendtoClouding() ;    //傳送感測資料到雲端
    delay(60000);      //延遲2秒鐘
}

void initDevice()  //系統硬體/軟體初始化
{

  initHTU21D();   //啟動HTU21D 溫溼度感測器
  initOLED();   //啟動OLED 12832顯示模組

}
