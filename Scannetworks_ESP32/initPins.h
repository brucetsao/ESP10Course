#include "esp_mac.h"  // required - exposes esp_mac_type_t values
#include <WiFi.h>   // 使用網路函式庫
IPAddress ip;    // 儲存網路卡取得的 IP 位址的變數
String Ipdata;   // 儲存網路卡取得的 IP 位址的字串變數
String Apname;   // 儲存網路熱點名稱的變數
String MacData;   // 儲存網路卡編號 (MAC 地址) 的變數
long rssi;   // 儲存網路連線的訊號強度變數
int status = WL_IDLE_STATUS;  // 儲存網路狀態的變數

//----------通用函式庫
long POW(long num, int expo)   //計算 num 的 expo 次方
{
  long tmp = 1;
  if (expo > 0)
  { 
        for(int i = 0; i < expo; i++)
          tmp = tmp * num;
         return tmp; 
  } 
  else
  {
   return tmp; 
  }
}

String SPACE(int sp)   // 回傳指定數量的空格字串
{
    String tmp = "";
    for (int i = 0; i < sp; i++)
      {
          tmp.concat(' ');  // 在字串後加入一個空格
      }
    return tmp;
}

String strzero(long num, int len, int base)  // 將數字轉成指定長度的字串，並補零
{
  String retstring = String("");
  int ln = 1;
  int i = 0; 
  char tmp[10];
  long tmpnum = num;
  int tmpchr = 0;
  char hexcode[] = {'0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'};
  while (ln <= len)
  {
        tmpchr = (int)(tmpnum % base);
        tmp[ln - 1] = hexcode[tmpchr];
        ln++;
        tmpnum = (long)(tmpnum / base);
    }
    for (i = len - 1; i >= 0; i--)
      {
          retstring.concat(tmp[i]);  // 將轉換結果儲存於 retstring
      }
  return retstring;
}

unsigned long unstrzero(String hexstr, int base)  // 將 16 進位字串轉換成數值
{
  String chkstring;
  int len = hexstr.length();
  unsigned int i = 0;
  unsigned int tmp = 0;
  unsigned int tmp1 = 0;
  unsigned long tmpnum = 0;
  String hexcode = String("0123456789ABCDEF");
  for (i = 0; i < len; i++)
  {
      hexstr.toUpperCase();
      tmp = hexstr.charAt(i);   // 取得字串中的第 i 個字元
      tmp1 = hexcode.indexOf(tmp);
      tmpnum = tmpnum + tmp1 * POW(base, (len - i - 1));
    }
  return tmpnum;
}

String print2HEX(int number)  // 將數字轉成 2 位數的 16 進位字串
{
  String ttt;
  if (number >= 0 && number < 16)
  {
    ttt = String("0") + String(number, HEX);
  }
  else
  {
      ttt = String(number, HEX);
  }
  return ttt;
} 
// 取得WiFi卡的MAC地址（新版ESP32方式）
String GetInterfaceMacAddress() // 取得WiFi卡的MAC地址（新版ESP32方式）
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
String GetMacAddress()    // 取得網路卡編號 (MAC 地址)
{
  String Tmp = "";
  byte mac[6];
  WiFi.macAddress(mac);  // 透過 WiFi 物件取得 MAC 地址
  
  for (int i = 0; i < 6; i++)
    {
        Tmp.concat(print2HEX(mac[i]));  // 轉換為 16 進位格式並存入 Tmp
    }
    Tmp.toUpperCase();
  return Tmp;
}

void ShowMAC()  // 在串列埠印出 MAC 地址
{
  Serial.print("MAC Address:(");  // 印出 "MAC Address:("
  Serial.print(MacData);   // 印出 MacData 變數內容
  Serial.print(")\n");    // 印出 ")\n"
}

String IpAddress2String(const IPAddress& ipAddress)  // 轉換 IP 地址為字串
{
  // 回傳 ipAddress[0-3] 的內容，以點分格式
  return String(ipAddress[0]) + String(".") +
         String(ipAddress[1]) + String(".") +
         String(ipAddress[2]) + String(".") +
         String(ipAddress[3]); 
}

String chrtoString(char *p)  // 將 char 陣列轉換成 String 字串
{
    String tmp;
    char c;
    int count = 0;
    while (count < 100)
    {
        c = *p;
        if (c != 0x00)
          {
            tmp.concat(String(c));
          }
          else
          {
              return tmp;
          }
       count++;
       p++;
    }
}

void CopyString2Char(String ss, char *p)  // 將 String 字串轉換成 char 陣列
{
  if (ss.length() <= 0)
      {
           *p =  0x00;
          return;
      }
    ss.toCharArray(p, ss.length() + 1);  // 將 String 內容複製到 char 陣列
}

boolean CharCompare(char *p, char *q)  // 比較兩個 char 陣列是否相同
{
    boolean flag = false;
    int count = 0;
    int nomatch = 0;
    while (count < 100)
    {
        if (*(p + count) == 0x00 or *(q + count) == 0x00)
          break;
        if (*(p + count) != *(q + count))
          {
             nomatch++; 
          }
         count++; 
    }
   if (nomatch > 0)
    {
      return false;
    }
    else
    {
      return true;
    }
}

String Double2Str(double dd, int decn)  // 將 double 數值轉換成字串
{
    int a1 = (int)dd;
    int a3;
    if (decn > 0)
    {    
        double a2 = dd - a1;
        a3 = (int)(a2 * POW(10, decn));
    }
    if (decn > 0)
    {
        return String(a1) + "." + String(a3);
    }
    else
    {
      return String(a1);
    }
}
