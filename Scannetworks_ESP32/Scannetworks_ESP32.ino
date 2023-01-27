#include "initPins.h" //自訂系統腳位函式庫


void setup()
{
    initAll() ; //系統設定

    // Set WiFi to station mode and disconnect from an AP if it was previously connected
   // WiFi.mode(WIFI_STA);    //啟動wifi標準模式
    WiFi.disconnect();  //wifi斷線
    delay(100);   // 延遲100單位

    Serial.println("Setup done");
    //通訊埠印出 "Setup done"
}

void loop()
{
    Serial.println("scan start"); 
    //通訊埠印出 "scan start"

    // WiFi.scanNetworks will return the number of networks found
    int n = WiFi.scanNetworks();
    // Wifi.scanNetworks() 掃描wifi基地台
    Serial.println("scan done");
    //通訊埠印出 "scan done"
    if (n == 0)   //掃描到的熱點數目(n)
    {
        Serial.println("no networks found");  //通訊埠印出 "no networks found"
    } 
    else 
    {
        Serial.print(n);
        Serial.println(" networks found");    //通訊埠印出 " networks found"
        for (int i = 0; i < n; ++i)   //for迴圈
        {
            // Print SSID and RSSI for each network found
            Serial.print(i + 1);
            Serial.print(": ");
            Serial.print(WiFi.SSID(i));   //通訊埠印出第n個基地台名稱
            Serial.print(" (");
            Serial.print(WiFi.RSSI(i));   //通訊埠印出第n個基地台強弱
            Serial.print(")");
          //  Serial.println((WiFi.encryptionType(i) == WIFI_AUTH_OPEN)?" ":"*");
            //通訊埠印出第n個基地台  WiFi.encryptionType(i) 加密型態
            // WIFI_AUTH_OPEN ==沒有密碼
            delay(10);  // 延遲10單位  0.01 sec
        }
    }
    Serial.println("");   //印出換行鍵

    // Wait a bit before scanning again
    delay(5000);    // 延遲5000單位  5 sec
    
}

void initAll()
{

  Serial.begin(9600); //通訊控制埠 初始化，並設為9600 bps
  Serial.println();
  Serial.println("System Start"); //印出 "System Start"
   MacData = GetMacAddress() ;    //取得網路卡編號

}
