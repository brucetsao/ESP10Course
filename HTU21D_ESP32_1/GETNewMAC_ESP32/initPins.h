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

// 取得WiFi卡的MAC地址（新版ESP32方式）
String GetInterfaceMacAddress() 
{
  /*
    為何不使用 WiFi.macAddress()？
    WiFi.macAddress() 是Arduino的WiFi庫提供的方法，適用於ESP32的Arduino環境。
    esp_read_mac() 是ESP-IDF原生API，更適合需要低階控制的應用，適用於 專案開發 或 ESP-IDF環境
   */
  
  /*
    esp_read_mac(mac_base, ESP_MAC_WIFI_STA)
    esp_read_mac() 是ESP-IDF框架內建的函式，用於讀取ESP32的MAC地址。
    第一個參數 mac_base 是一個指標，用來存放讀取到的MAC地址（6個字節）。
    第二個參數 ESP_MAC_WIFI_STA 指定要讀取的MAC地址類型，這裡使用 WiFi Station（STA）模式。
   */
  String mac = "";  // 用於存儲MAC地址的字串
  unsigned char mac_base[6] = {0};  // 建立一個陣列來存儲MAC地址（6個字節）

  // 使用ESP32官方函式 `esp_read_mac` 來讀取WiFi的MAC地址
  // `ESP_MAC_WIFI_STA` 代表讀取 WiFi Station (STA) 模式的MAC地址
  if (esp_read_mac(mac_base, ESP_MAC_WIFI_STA) == ESP_OK) 
  {
    char buffer[12];  // 建立一個字元陣列來存放格式化後的MAC地址（無冒號）
    
    // 使用 `sprintf` 格式化MAC地址為十六進位格式，沒有冒號（XXYYZZAABBCC）
    sprintf(buffer, "%02X%02X%02X%02X%02X%02X", 
            mac_base[0], mac_base[1], mac_base[2], 
            mac_base[3], mac_base[4], mac_base[5]);
    /*
      sprintf(buffer, "%02X%02X%02X%02X%02X%02X", ...)
      sprintf() 用來將 mac_base 陣列中的六個字節轉換成 十六進位字串。
      %02X 代表 將一個字節轉換為兩位數的十六進位格式，例如 0A、FF。
      這裡的格式是 不含冒號的純HEX格式，如：AABBCCDDEEFF。 
     */

    mac = buffer;  // 將格式化後的字串存入 `mac`
  }
  mac.toUpperCase();  // 轉為大寫
  return mac;  // 返回MAC地址字串
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
