#include "HTU21DLib.h"  // 溫溼度專用模組
#include "OledLib.h"  // 溫溼度專用模組


void setup() 
{
    initALL() ; //系統硬體/軟體初始化


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
    delay(2000);      //延遲2秒鐘
}

void initALL()  //系統硬體/軟體初始化
{
    Serial.begin(9600);   //通訊控制埠 初始化，並設為9600 bps
    Serial.println("System Start"); //印出 "System Start"
    initHTU21D();   //啟動HTU21D 溫溼度感測器
}
