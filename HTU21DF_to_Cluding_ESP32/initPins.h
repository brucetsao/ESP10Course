//-------wifi declare
#include "commlib.h"     // 共用函式模組
#include "esp_mac.h"  // required - exposes esp_mac_type_t values
#define WiFiPin 2   //控制板上WIFI指示燈腳位
#define AccessPin 15 //控制板上連線指示燈腳位
#define Ledon 1   //LED燈亮燈控制碼
#define Ledoff 0  //LED燈滅燈控制碼


#define initDelay   6000    //初始化延遲時間
#define loopdelay 10000   //loop 延遲時間

#include <String.h>
#include <WiFi.h>   //使用網路函式庫
#include <WiFiClient.h>   //使用網路用戶端函式庫
#include <WiFiMulti.h>    //多熱點網路函式庫
WiFiMulti wifiMulti;    //產生多熱點連線物件

 WiFiClient client;   //產生網路連線物件
  IPAddress ip ;    //網路卡取得IP位址之原始型態之儲存變數
  String IPData ;   //網路卡取得IP位址之儲存變數
  String APname ;   //網路熱點之儲存變數
  String MacData ;   //網路卡取得網路卡編號之儲存變數 
  String BTMacData;   // 用於儲存BlueToothMAC地址
  long rssi ;   //網路連線之訊號強度'之儲存變數
  int status = WL_IDLE_STATUS;  //取得網路狀態之變數
  
void WiFion();//控制板上Wifi 指示燈打開
void WiFioff();//控制板上Wifi 指示燈關閉
void ACCESSon(); //控制板上連線指示燈打開
void ACCESSoff();//控制板上連線指示燈關閉
void initGPIO(); //設定使用之所有GPIO腳位
String IpAddress2String(const IPAddress& ipAddress) ;  //轉換ipaddress變數形態到字串型態
String GetMacAddress() ;   //取得網路卡編號
void ShowInternet() ;  //秀出網路連線資訊
String getDefaultMacAddress() ;// 取得實體WiFi卡的MAC地址（新版ESP32方式）
String getInterfaceMacAddress(esp_mac_type_t interface);// 取得WiFi卡的MAC地址（新版ESP32方式）
String GetESPBlueToothMac();  // 取得Bluetooth卡的MAC地址（新版ESP32方式）
String GetESPMac();  // 取得WiFi卡的MAC地址
void ShowMAC() ;// 在串列埠顯示MAC地址
void ShowBTMAC(); // 在串列埠中印出藍芽MAC地址
void initAll() ;   //初始化系統




void initAll()    //初始化系統
{
  Serial.begin(9600);
  //啟動通訊埠，用9600 bps速率進行通訊
  Serial.println();
   //通訊埠印出  換行

    Serial.println("System Start"); //印出 "System Start"
   //通訊埠印出 "System Start"
   //-----------------------------------------
  initGPIO(); //設定使用之所有GPIO腳位
}


void initWiFi()   //網路連線，連上熱點
{ 
  

  //加入連線熱點資料
  wifiMulti.addAP("lab309", "");  //加入一組熱點
  wifiMulti.addAP("NCNUIOT", "0123456789");  //加入一組熱點
  wifiMulti.addAP("NUKIOT", "iot12345");  //加入一組熱點
 // wifiMulti.addAP("NUKIOT", "iot12345");  //加入一組熱點


  // We start by connecting to a WiFi network

  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  //通訊埠印出 "Connecting to "
  wifiMulti.run();  //多網路熱點設定連線
 while (WiFi.status() != WL_CONNECTED)     //還沒連線成功
  {
    // wifiMulti.run() 啟動多熱點連線物件，進行已經紀錄的熱點進行連線，
    // 一個一個連線，連到成功為主，或者是全部連不上
    // WL_CONNECTED 連接熱點成功
    Serial.print(".");   //通訊埠印出
    delay(500) ;  //停500 ms
     wifiMulti.run();   //多網路熱點設定連線
  }
    Serial.println("WiFi connected");   //通訊埠印出 WiFi connected
    Serial.print("AP Name: ");   //通訊埠印出 AP Name:
    APname = WiFi.SSID();
    Serial.println(APname);   //通訊埠印出 WiFi.SSID()==>從熱點名稱
    Serial.print("IP address: ");   //通訊埠印出 IP address:
    ip = WiFi.localIP();    //取出IP address
    IPData = IpAddress2String(ip) ;
    Serial.println(IPData);   //通訊埠印出 WiFi.localIP()==>從熱點取得IP位址
    //通訊埠印出連接熱點取得的IP位址
    WiFion(); //控制板上Wifi 指示燈打開
    ShowInternet() ;  //秀出網路連線資訊
    
 
}
void ShowInternet()   //秀出網路連線資訊
{
  //印出MAC Address
  Serial.print("MAC:") ;
  Serial.print(MacData) ;
  Serial.print("\n") ;
  //印出SSID名字
  Serial.print("SSID:") ;
  Serial.print(APname) ;
  Serial.print("\n") ;
  //印出取得的IP 名字
  Serial.print("IP:") ;
  Serial.print(IPData) ;
  Serial.print("\n") ;    

}
//--------------------
//--------------------
//---------- 通用函式

// 取得實體WiFi卡的MAC地址（新版ESP32方式）
String getDefaultMacAddress() 
{
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
    
//      sprintf(buffer, "%02X%02X%02X%02X%02X%02X", ...)
//      sprintf() 用來將 mac_base 陣列中的六個字節轉換成 十六進位字串。
//      %02X 代表 將一個字節轉換為兩位數的十六進位格式，例如 0A、FF。
//      這裡的格式是 不含冒號的純HEX格式，如：AABBCCDDEEFF。 
     

    mac = buffer;  // 將格式化後的字串存入 `mac`
  }
  mac.toUpperCase();  // 轉為大寫
  return mac;  // 返回MAC地址字串
}



String getInterfaceMacAddress(esp_mac_type_t interface)// 取得WiFi卡的MAC地址（新版ESP32方式）
{
  
//    為何不使用 WiFi.macAddress()？
//    WiFi.macAddress() 是Arduino的WiFi庫提供的方法，適用於ESP32的Arduino環境。
//    esp_read_mac() 是ESP-IDF原生API，更適合需要低階控制的應用，適用於 專案開發 或 ESP-IDF環境
//
//    esp_read_mac(mac_base, ESP_MAC_WIFI_STA)
//    esp_read_mac() 是ESP-IDF框架內建的函式，用於讀取ESP32的MAC地址。
//    第一個參數 mac_base 是一個指標，用來存放讀取到的MAC地址（6個字節）。
//    第二個參數 ESP_MAC_WIFI_STA 指定要讀取的MAC地址類型，這裡使用 WiFi Station（STA）模式。
  
   
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
    
//      sprintf(buffer, "%02X%02X%02X%02X%02X%02X", ...)
//      sprintf() 用來將 mac_base 陣列中的六個字節轉換成 十六進位字串。
//      %02X 代表 將一個字節轉換為兩位數的十六進位格式，例如 0A、FF。
//      這裡的格式是 不含冒號的純HEX格式，如：AABBCCDDEEFF。 
     

    mac = buffer;  // 將格式化後的字串存入 `mac`
  }
  mac.toUpperCase();  // 轉為大寫
  return mac;  // 返回MAC地址字串
}


// 取得Bluetooth卡的MAC地址（新版ESP32方式）

String GetESPBlueToothMac()  // 取得Bluetooth卡的MAC地址（新版ESP32方式）
{ 
    return getInterfaceMacAddress(ESP_MAC_BT);
}

String GetESPMac()  // 取得WiFi卡的MAC地址
{  // 取得WiFi卡的MAC地址
   //String mac = "";  // 用於存儲MAC地址的字串
  uint8_t baseMac[6];  // 建立一個陣列來存儲MAC地址（6個字節）

  // 使用ESP32官方函式 `esp_read_mac` 來讀取WiFi的MAC地址
  // `ESP_MAC_WIFI_STA` 代表讀取 WiFi Station (STA) 模式的MAC地址
  esp_read_mac(baseMac, ESP_MAC_WIFI_STA);   // 讀取WiFi Station的基底MAC地址
    char buffer[12];  // 建立一個字元陣列來存放格式化後的MAC地址（無冒號）
    
    // 使用 `sprintf` 格式化MAC地址為十六進位格式，沒有冒號（XXYYZZAABBCC）
    sprintf(buffer, "%02X%02X%02X%02X%02X%02X", 
            baseMac[0], baseMac[1], baseMac[2], 
            baseMac[3], baseMac[4], baseMac[5]);
    
//      sprintf(buffer, "%02X%02X%02X%02X%02X%02X", ...)
//      sprintf() 用來將 mac_base 陣列中的六個字節轉換成 十六進位字串。
//      %02X 代表 將一個字節轉換為兩位數的十六進位格式，例如 0A、FF。
//      這裡的格式是 不含冒號的純HEX格式，如：AABBCCDDEEFF。 
     
    
    String mac(buffer); // 將格式化後的字串存入 `mac`
  mac.toUpperCase();  // 轉為大寫
  return mac;  // 返回MAC地址字串
}



// 取得網路卡MAC地址
String GetMacAddress() 
{
  String Tmp = "";  //暫存字串
  byte mac[6];  //取得網路卡MAC地址之暫存字串
  WiFi.macAddress(mac);  // 取得MAC地址
  
  for (int i = 0; i < 6; i++)   // 迴圈取得網路卡MAC地址每一個BYTE
  {
    Tmp.concat(print2HEX(mac[i]));  // 將每個MAC位元組轉為十六進制
  }
  
  Tmp.toUpperCase();  // 轉換為大寫
  return Tmp; //回傳內容
}
void ShowBTMAC() 
{  // 在串列埠中印出藍芽MAC地址
  Serial.print("BlueTooth MAC Address:(");  // 印出標題
  Serial.print(BTMacData);  // 印出MAC地址
  Serial.print(")\n");  // 換行
}
// 在串列埠顯示MAC地址
void ShowMAC() 
{
Serial.print("MAC Address:(");  // 印出標籤
Serial.print(MacData);   // 印出MAC地址
Serial.print(")\n");  // 換行
}


// IP地址轉換函式，將4個字節的IP轉為字串
String IpAddress2String(const IPAddress& ipAddress) 
{
  return String(ipAddress[0]) + "." +
         String(ipAddress[1]) + "." +
         String(ipAddress[2]) + "." +
         String(ipAddress[3]);  //回傳內容
}

void initGPIO() //設定使用之所有GPIO腳位
{
  pinMode(WiFiPin,OUTPUT) ; //設定WIFI 指示燈為輸出高低電位
  pinMode(AccessPin,OUTPUT) ; //設定動作指示燈為輸出高低電位
  WiFioff();//控制板上Wifi 指示燈關閉
  ACCESSoff();//控制板上連線指示燈關閉
}

void WiFion()//控制板上Wifi 指示燈打開
{
  //透過GPIPControl控制函式去設定GPIO XX高電位/低電位
  GPIOControl(WiFiPin,Ledon) ;
}  


void WiFioff()//控制板上Wifi 指示燈關閉
{
  //透過GPIPControl控制函式去設定GPIO XX高電位/低電位
  GPIOControl(WiFiPin,Ledoff) ;
}
void ACCESSon() //控制板上連線指示燈打開
{
  //透過GPIPControl控制函式去設定GPIO XX高電位/低電位
  GPIOControl(AccessPin,Ledon) ;
}  


void ACCESSoff()//控制板上連線指示燈關閉
{
  //透過GPIPControl控制函式去設定GPIO XX高電位/低電位
  GPIOControl(AccessPin,Ledoff) ;
}
