#include "initPins.h"     // 腳位與系統模組
#include "JSONLIB.h"   // MQTT Broker自訂模組


void setup() 
{

    initALL() ; //系統硬體/軟體初始化

   
  
}

void loop() 
{
    double Temp_Value = 25+(double)(random(-300, 300)/50);
    double Humid_Value= 70 +(double)(random(-300, 300)/10);
    String msg ="目前溫度:"+String(Temp_Value)+"°C, 目前濕度："+String(Humid_Value);
    Serial.print("Temp: "); Serial.print(Temp_Value); Serial.print(" C");
    Serial.print("\t\t");
    Serial.print("Humidity: "); Serial.print(Humid_Value); Serial.println(" \%");
    setjsondate(MacData,Temp_Value,Humid_Value) ;
    Serial.println(json_data) ;
           delay(loopdelay) ;
}

void initALL()  //系統硬體/軟體初始化
{
    Serial.begin(9600);
    Serial.println("System Start");

    MacData = GetMacAddress() ;   //取得網路卡編號
    initWiFi() ;  //網路連線，連上熱點
    ShowInternet();  //秀出網路連線資訊
}
