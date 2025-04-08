#include "initPins.h" //自訂系統腳位函式庫
#include "comonLib.h" //自訂系統腳位函式庫

void setup()
{
    initAll(); //系統設定

    // 設定 WiFi 模式為 station 並斷開任何先前連線的 AP
   // WiFi.mode(WIFI_STA);    //啟動wifi標準模式
    WiFi.disconnect();  //wifi斷線
    delay(100);   // 延遲100毫秒

    Serial.println("Setup done");
    //通訊埠印出 "Setup done"

}

void loop()
{
    Serial.println("scan start"); 
    //通訊埠印出 "scan start"

    // WiFi.scanNetworks 會返回找到的網路數量
    int n = WiFi.scanNetworks();
    // WiFi.scanNetworks() 掃描wifi基地台
    Serial.println("scan done");
    //通訊埠印出 "scan done"
    if (n == 0)   //檢查掃描到的熱點數量(n)
    {
        Serial.println("no networks found");  //通訊埠印出 "no networks found"
    } 
    else 
    {
         Serial.print("ESP32 DEVICE:MAC(");
         Serial.print(MacData);
         Serial.print(")\n\n");
        Serial.print(n);
        Serial.println(" networks found");    //通訊埠印出 " networks found"
        
        for (int i = 0; i < n; ++i)   //for 迴圈依次列出每個基地台
        {
            // 列印找到的每個網路的 SSID 和 RSSI
            Serial.print(i + 1);
            Serial.print(": ");
            Serial.print(WiFi.SSID(i));   //通訊埠印出第n個基地台名稱
            Serial.print(" (");
            Serial.print(WiFi.RSSI(i));   //通訊埠印出第n個基地台信號強度
            Serial.print(")\n");
          //  Serial.println((WiFi.encryptionType(i) == WIFI_AUTH_OPEN) ? " " : "*");
            // 通訊埠印出第n個基地台的 WiFi 加密型態 (WIFI_AUTH_OPEN 為無密碼)
            delay(10);  // 延遲10毫秒
        }
    }
    Serial.println("");   //印出換行符號

    // 掃描後稍作等待再重複執行
    delay(5000);    // 延遲5000毫秒
    
}

void initAll()
{

  Serial.begin(9600); //初始化通訊控制埠並設為9600 bps
  Serial.println();
  Serial.println("System Start"); //印出 "System Start"
   MacData = GetInterfaceMacAddress();    //取得網路卡的MAC位址

}
