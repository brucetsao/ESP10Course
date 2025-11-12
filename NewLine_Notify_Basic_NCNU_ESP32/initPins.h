#define _Debug 1    // 輸出偵錯訊息（1=開啟, 0=關閉）
#define _debug 1    // 同上（重複的旗標，通常只保留一個即可）
#define initDelay   6000    // 初始化延遲時間（毫秒）
#define loopdelay   500     // loop() 內每輪延遲時間（毫秒）

#include <Arduino.h>
#include <WiFi.h>           // ESP32 Wi-Fi 主要功能
#include <WiFiClient.h>     // TCP/UDP 等網路用戶端功能
#include <WiFiMulti.h>      // 多熱點自動連線工具

WiFiMulti wifiMulti;        // 產生多熱點連線的物件

// 將 IPAddress 類型轉為「a.b.c.d」樣式的字串
String IpAddress2String(const IPAddress& ipAddress);

// ---- 網路狀態相關全域變數 ----
IPAddress ip;      // 原生 IPAddress 類型（a,b,c,d）
String   IPData;   // 轉成字串後的 IP 位址
String   APname;   // 目前連線的 SSID 名稱
String   MacData;  // 目前裝置的 MAC 位址（字串形式）
long     rssi;     // Wi-Fi 訊號強度（dBm）
int      status = WL_IDLE_STATUS;  // Wi-Fi 狀態（預設為閒置）

// ============================
//  Wi-Fi 連線主流程
// ============================
void initWiFi()   // 連上可用的熱點（多熱點自動嘗試）
{
  // 1) 加入候選熱點清單（會按順序嘗試連線）
  wifiMulti.addAP("lab309", "");           // 無密碼的 AP 範例（如果實際是有密碼，請補上）
  wifiMulti.addAP("NCNUIOT",  "12345678");
  wifiMulti.addAP("NCNUIOT2", "12345678");
  wifiMulti.addAP("ABC",      "12345678");

  // 2) 嘗試連線
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");  // 僅印提示字樣
  wifiMulti.run();                 // 觸發一次多熱點嘗試

  // 持續等待，直到連線成功
  while (WiFi.status() != WL_CONNECTED)
  {
    // 說明：
    // - wifiMulti.run() 會對已加入的 AP 逐一嘗試連線
    // - 若連線成功，WiFi.status() 會變成 WL_CONNECTED
    Serial.print(".");   // 進度點
    delay(500);
    wifiMulti.run();     // 繼續嘗試
  }

  // 3) 連線成功後，顯示基本資訊
  Serial.println("WiFi connected");
  Serial.print("AP Name: ");
  APname = WiFi.SSID();          // 取得目前連線的熱點名稱
  Serial.println(APname);

  Serial.print("IP address: ");
  ip     = WiFi.localIP();       // 取得本機 IP（IPAddress 類型）
  IPData = IpAddress2String(ip); // 轉成「a.b.c.d」字串
  Serial.println(IPData);        // 印出 IP
}

// ============================
//  顯示網路資訊（序列埠）
// ============================
void ShowInternet()
{
  Serial.print("MAC:");  Serial.print(MacData);  Serial.print("\n");
  Serial.print("SSID:"); Serial.print(APname);   Serial.print("\n");
  Serial.print("IP:");   Serial.print(IPData);   Serial.print("\n");

  // 若有 OLED 或其他顯示器，可把上述資訊一併輸出
  // OledLineText(1,"MAC:"+MacData);
  // OledLineText(2,"IP:"+IPData);
}

// ============================
//  Common Lib：數學/字串工具
// ============================

// 計算 num 的 expo 次方（整數相乘版）
long POW(long num, int expo)
{
  long tmp = 1;
  if (expo > 0)
  {
    for (int i = 0; i < expo; i++)
      tmp = tmp * num;
    return tmp;
  }
  else
  {
    return tmp;  // expo <= 0 時，回傳 1
  }
}

// 產生由空白所組成、長度為 sp 的字串
String SPACE(int sp)
{
  String tmp = "";
  for (int i = 0; i < sp; i++)
  {
    tmp.concat(' ');
  }
  return tmp;
}

// 將數字以指定進位（base）轉成固定長度（len）的字串，不足前面補 0
// 例如：strzero(10, 4, 16) => "000A"
String strzero(long num, int len, int base)
{
  String retstring = String("");
  int   ln = 1;
  char  tmp[10];                 // 暫存每一位對應的字元（由低位開始）
  long  tmpnum = num;
  int   tmpchr = 0;
  char  hexcode[] = {'0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'};

  // 由低位數開始，逐位轉成對應字元
  while (ln <= len)
  {
    tmpchr = (int)(tmpnum % base);  // 取餘數（該位的值）
    tmp[ln - 1] = hexcode[tmpchr];  // 轉成字元
    ln++;
    tmpnum = (long)(tmpnum / base); // 去掉最低位，繼續下一位
  }

  // 反向串接，得到由高位到低位的最終字串
  for (int i = len - 1; i >= 0; i--)
  {
    retstring.concat(tmp[i]);
  }
  return retstring;
}

// 將指定進位（base）的字串轉回無號整數
unsigned long unstrzero(String hexstr, int base)
{
  int len = hexstr.length();
  unsigned long tmpnum = 0;
  String hexcode = String("0123456789ABCDEF");

  for (unsigned int i = 0; i < (unsigned int)len; i++)
  {
    hexstr.toUpperCase();                 // 轉大寫
    unsigned int tmp  = hexstr.charAt(i); // 第 i 個字元
    unsigned int tmp1 = hexcode.indexOf(tmp); // 該字元的數值（0~15）
    tmpnum = tmpnum + tmp1 * POW(base, (len - i - 1)); // 加總
  }
  return tmpnum;
}

// 將整數轉為 2 位的 16 進位字串，小於 0x10 時前面補 0
String print2HEX(int number)
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

// 取得 ESP32 的 MAC Address（回傳 12 碼大寫十六進位字串）
String GetMacAddress()
{
  String Tmp = "";
  byte mac[6];
  WiFi.macAddress(mac);              // 讀取 6 個位元組的 MAC
  for (int i = 0; i < 6; i++)
  {
    Tmp.concat(print2HEX(mac[i]));   // 每個位元組都轉成 2 位 16 進位
  }
  Tmp.toUpperCase();
  return Tmp;
}

// 序列埠印出 MAC Address
void ShowMAC()
{
  Serial.print("MAC Address:(");
  Serial.print(MacData);   // MacData 須先由 GetMacAddress() 取得
  Serial.print(")\n");
}

// 將 IPAddress 轉成「a.b.c.d」的 String
String IpAddress2String(const IPAddress& ipAddress)
{
  return String(ipAddress[0]) + String(".") +
         String(ipAddress[1]) + String(".") +
         String(ipAddress[2]) + String(".") +
         String(ipAddress[3]);
}

// 將 C 字串（char*）轉為 Arduino String
String chrtoString(char *p)
{
  String tmp;
  char c;
  int count = 0;
  while (count < 100)        // 最多讀 100 個字元，避免無限迴圈
  {
    c = *p;                  // 取當前字元
    if (c != 0x00)           // 非結尾字元
    {
      tmp.concat(String(c)); // 累加到字串
    }
    else
    {
      return tmp;            // 碰到 '\0' 就回傳
    }
    count++;
    p++;                     // 指標往下一個字元
  }
  return tmp;                // 若超過 100 仍未遇 '\0'，也回傳目前累積
}

// 將 Arduino String 複製到 char 陣列（帶結尾 '\0'）
void CopyString2Char(String ss, char *p)
{
  if (ss.length() <= 0)      // 空字串
  {
    *p = 0x00;               // 直接寫入結尾字元
    return;
  }
  ss.toCharArray(p, ss.length() + 1); // 轉成 C 字串（自動補 '\0'）
}

// 比較兩個 C 字串是否相同（最多比 100 個字元或遇結尾）
boolean CharCompare(char *p, char *q)
{
  int count = 0;
  int nomatch = 0;

  // ⚠️ 原本寫 while (flag < 100) 並使用布林變數不合理，改用計數器
  while (count < 100)
  {
    if (*(p + count) == 0x00 || *(q + count) == 0x00) // 任一遇到結尾就停止
      break;

    if (*(p + count) != *(q + count))  // 只要有任一字元不同
      nomatch++;

    count++;
  }

  return (nomatch == 0);  // 全部相同回傳 true，否則 false
}

// 將 double 轉字串，保留 decn 位小數
String Double2Str(double dd, int decn)
{
  int a1 = (int)dd;  // 整數部分
  int a3;            // 小數部分（轉為整數儲存）

  if (decn > 0)
  {
    double a2 = dd - a1;             // 純小數
    // ⚠️ C/C++ 的 ^ 是 XOR，不是次方！應使用 pow(10, decn)
    a3 = (int)(a2 * pow(10, decn));  // 建議：#include <math.h>
  }

  if (decn > 0)
  {
    return String(a1) + "." + String(a3); // e.g., 12 + "." + 34
  }
  else
  {
    return String(a1);                     // 不保留小數
  }
}

