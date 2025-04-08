//----------- 引入WiFi函式庫
/*
這段程式碼引入了WiFi和字串處理函式庫，
並提供了一些用於數值運算、
字串處理、
WiFi資訊取得的函式和程式邏輯。
這些函式可用於處理WiFi連接、
數字轉換、字串處理等情況。

*/
#include "commlib.h"     // 共用函式模組
#include "esp_mac.h"  // required - exposes esp_mac_type_t values
#include <WiFi.h>   // 用於WiFi連接
#include <WiFiMulti.h>    // 用於多個WiFi熱點連接

WiFiMulti wifiMulti;    // 建立一個多熱點連接的物件

//--------------------
#include <String.h>  // 引入字串處理函式庫

// 變數宣告
IPAddress ip;    // 用於儲存IP地址的變數
String IPdata;   // 用於儲存IP地址的字串
String APname;   // 用於儲存WiFi熱點名稱
String MacData;   // 用於儲存MAC地址
long rssi;   // 用於儲存WiFi訊號強度
int status = WL_IDLE_STATUS;  // 用於儲存WiFi連接狀態

//---------- 通用函式

String GetInterfaceMacAddress() // 取得WiFi卡的MAC地址(新版)
{
  String mac = "";
  unsigned char mac_base[6] = {0};

  if (esp_read_mac(mac_base, ESP_MAC_WIFI_STA) == ESP_OK) 
  {
    char buffer[12];  // 6*2 characters for hex + 5 characters for colons + 1 character for null terminator
    sprintf(buffer, "%02X%02X%02X%02X%02X%02X", mac_base[0], mac_base[1], mac_base[2], mac_base[3], mac_base[4], mac_base[5]);
    mac = buffer;
  }

  return mac;
}
String GetMacAddress() // 取得WiFi卡的MAC地址
{  // 取得WiFi卡的MAC地址
  byte mac[6];  // 用於儲存MAC地址
  String Tmp = "";  // 結果字串
  
  WiFi.macAddress(mac);  // 取得MAC地址
  
  for (int i = 0; i < 6; i++) 
  {
    Tmp.concat(print2HEX(mac[i]));  // 將每個位元組轉為十六進制並拼接
  }

  Tmp.toUpperCase();  // 轉為大寫
  return Tmp;  // 返回MAC地址
}

void ShowMAC() {  // 在串列埠中印出MAC地址
  Serial.print("MAC Address:(");  // 印出標題
  Serial.print(MacData);  // 印出MAC地址
  Serial.print(")\n");  // 換行
}

String IpAddress2String(const IPAddress& ipAddress) {  // 將IP地址轉為字串
  return String(ipAddress[0]) + "." + 
         String(ipAddress[1]) + "." + 
         String(ipAddress[2]) + "." + 
         String(ipAddress[3]);  // 轉換為點分十進制
}
