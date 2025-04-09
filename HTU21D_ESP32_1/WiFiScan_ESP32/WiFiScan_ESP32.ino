
#include "WiFi.h"   //使用網路函式庫

void setup()
{
    initAll()  ;  //系統初始化
    initWiFi();  //網路初始化
    // Set WiFi to station mode and disconnect from an AP if it was previously connected

    delay(100); //等待  100ms

    Serial.println("Setup done"); //印出 "Setup done"
}

void loop()
{
    Serial.println("scan start");   //印出 "Setup done"

    // WiFi.scanNetworks will return the number of networks found
    int n = WiFi.scanNetworks();  //開始掃描網路  ，並把掃描完畢的熱點數，存入n
    Serial.println("scan done");  //印出 "scan done"
    if (n == 0)     //沒有熱點
    {
        Serial.println("no networks found");    //印出 "no networks found"
    }
    else 
    {
        Serial.print(n);     //印出 n變數
        Serial.println(" networks found");    //印出 "networks found"
        for (int i = 0; i < n; ++i)     //根據掃描到的熱點數，用迴圈進行處理
        {
            // Print SSID and RSSI for each network found
            Serial.print(i + 1);    //印出 i+1
            Serial.print(": ");   ////印出 ":"
            Serial.print(WiFi.SSID(i)); //用i做索引，印出掃描到熱點名稱，用SSID(第n個)
            Serial.print(" (");
            Serial.print(WiFi.RSSI(i)); //用i做索引，印出掃描到熱點名稱的電波強度，RSSI(第n個)
            Serial.print(")");
            Serial.println((WiFi.encryptionType(i) == WIFI_AUTH_OPEN)?" ":"*"); 
                //根據encryptionType(第n個)熱點加密方式，印出"*"或沒有
            delay(10);    //等10 ms
        }
    }
    Serial.println("");   //印出換行

    // Wait a bit before scanning again
    delay(5000);    //等5000 ms==>5秒鐘
}

void   initAll()    //系統初始化
{
        Serial.begin(9600) ;  //通訊控制埠 初始化，並設為9600 bps
    Serial.println("System Start"); //印出 "System Start"
  
}

void initWiFi()   //網路初始化
{
        WiFi.mode(WIFI_STA);  //設定網路為獨立模式
        WiFi.disconnect();  //先行網路斷線
}
