#include "initPins.h"     // 腳位與系統模組
#include "HTU21DLib.h"    // 溫溼度專用模組
#include "LineLib.h"    // 溫溼度專用模組


void setup() 
{
    initALL() ; //系統硬體/軟體初始化
    initWiFi() ;  //網路連線，連上熱點
    ShowInternet();  //秀出網路連線資訊
    initLine() ;    //起始Line Notifier連線
    delay(1000) ;
     Serial.println("Home System Start");
}

void loop() 
{

    ReadSensor()  ;
    String msg ="目前溫度:"+String(Temp_Value)+"°C, 目前濕度："+String(Humid_Value);
    Serial.print("Temp: "); Serial.print(Temp_Value); Serial.print(" C");
    Serial.print("\t\t");
    Serial.print("Humidity: "); Serial.print(Humid_Value); Serial.println(" \%");
    SendMsgtoLine( msg) ;  //傳送資訊到Line Notifier
    delay(30000) ;
}

void initALL()  //系統硬體/軟體初始化
{
    Serial.begin(9600);
    Serial.println("System Start");
    initHTU21D();   //啟動HTU21D 溫溼度感測器
    MacData = GetMacAddress() ;   //取得網路卡編號
}
