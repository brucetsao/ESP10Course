#define _Debug 1    // 用於輸出偵錯訊息
#define _debug 1    // 用於輸出偵錯訊息
#define initDelay   6000    // 初始化延遲時間為6秒
#define loopdelay 500   // 主循環延遲時間為500毫秒

#include <WiFi.h>   // 引入WiFi函式庫，用於WiFi功能
#include <WiFiClient.h>   // 引入WiFi客戶端函式庫
#include <WiFiMulti.h>    // 引入WiFi多熱點函式庫

WiFiMulti wifiMulti;    // 建立多熱點連線物件

// 函式宣告，將IP地址轉為字串
String IpAddress2String(const IPAddress& ipAddress);

// 全域變數宣告
IPAddress ip;    // 用於儲存網卡取得的IP地址
String IPData;   // 用於儲存IP地址的字串
String APname;   // 用於儲存熱點名稱
String MacData;   // 用於儲存網卡的MAC地址
long rssi;   // 用於儲存網路訊號強度
int status = WL_IDLE_STATUS;  // 用於儲存網路狀態

#define LEDPin 2  // 定義LED引腳號碼
WiFiServer server(80);  // 建立伺服器物件，設定監聽埠號為80

// 網路初始化函式
void initWiFi() {
  // 加入連線的熱點資料
  wifiMulti.addAP("NCNUIOT", "12345678");  // 加入一個熱點
  wifiMulti.addAP("NCNUIOT2", "12345678");  // 加入第二個熱點
  wifiMulti.addAP("ABC", "12345678");  // 加入第三個熱點

  Serial.println();  // 換行
  Serial.print("Connecting to ");  // 輸出連線訊息
  wifiMulti.run();  // 嘗試連接熱點

  // 等待連線成功
  while (WiFi.status() != WL_CONNECTED) {  // 檢查連線狀態
    Serial.print(".");   // 輸出進度
    delay(500);  // 每隔500毫秒檢查一次
    wifiMulti.run();  // 重試連線
  }

  // 連線成功後輸出相關資訊
  Serial.println("WiFi connected");  // 輸出成功訊息
  Serial.print("AP Name: ");  // 輸出AP名稱
  APname = WiFi.SSID();  // 取得AP名稱
  Serial.println(APname);  // 輸出AP名稱
  Serial.print("IP address: ");  // 輸出IP地址
  ip = WiFi.localIP();  // 取得IP地址
  IPData = IpAddress2String(ip);  // 將IP轉為字串
  Serial.println(IPData);  // 輸出IP地址
}

// 函式用於顯示網路連線資訊
void ShowInternet() {
  Serial.print("MAC:");  // 輸出MAC地址標籤
  Serial.print(MacData);  // 輸出MAC地址
  Serial.print("\n");  // 換行
  Serial.print("SSID:");  // 輸出SSID標籤
  Serial.print(APname);  // 輸出SSID
  Serial.print("\n");  // 換行
  Serial.print("IP:");  // 輸出IP標籤
  Serial.print(IPData);  // 輸出IP地址
  Serial.print("\n");  // 換行
}

// 數學函式，計算num的expo次方
long POW(long num, int expo) {
  long tmp = 1;
  if (expo > 0) { 
    for (int i = 0; i < expo; i++) {
      tmp = tmp * num;  // 不斷乘以num
    }
    return tmp;
  } else {
    return tmp;  // 若expo小於或等於0，返回1
  }
}

// 生成指定長度的空格字串
String SPACE(int sp) {
  String tmp = "";
  for (int i = 0; i < sp; i++) {
    tmp.concat(' ');  // 加入空格
  }
  return tmp;
}

// 生成指定長度、指定進制的字串，補零至固定長度
String strzero(long num, int len, int base) {
  String retstring = String("");
  int ln = 1;
  int i = 0; 
  char tmp[10];
  long tmpnum = num;
  char hexcode[] = {'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'};
  
  while (ln <= len) {
    int tmpchr = (int)(tmpnum % base);  // 取餘數
    tmp[ln - 1] = hexcode[tmpchr];  // 取得對應的字元
    ln++;
    tmpnum = (long)(tmpnum / base);  // 取整數部分
  }
  
  for (i = len - 1; i >= 0; i--) {
    retstring.concat(tmp[i]);  // 反序字元並拼接
  }
  
  return retstring;
}

// 將十六進制字串轉換為無符號整數
unsigned long unstrzero(String hexstr, int base) {
  int len = hexstr.length();
  unsigned int tmp = 0;
  unsigned long tmpnum = 0;
  String hexcode = String("0123456789ABCDEF");
  
  for (int i = 0; i < len; i++) {
    hexstr.toUpperCase();  // 轉換為大寫
    tmp = hexstr.charAt(i);  // 取得字元
    unsigned int tmp1 = hexcode.indexOf(tmp);  // 取得字元在進制內的索引
    tmpnum += tmp1 * POW(base, (len - i - 1));  // 計算進制值
  }
  
  return tmpnum;
}

// 輸出十六進制字串，若數字小於16則前面補0
String print2HEX(int number) {
  String ttt;
  if (number >= 0 && number < 16) { 
    ttt = String("0") + String(number, HEX);
  } else {
    ttt = String(number, HEX);
  }
  return ttt;
}

// 取得網路卡MAC地址
String GetMacAddress() {
  String Tmp = "";
  byte mac[6];
  WiFi.macAddress(mac);  // 取得MAC地址
  
  for (int i = 0; i < 6; i++) {
    Tmp.concat(print2HEX(mac[i]));  // 將每個MAC位元組轉為十六進制
  }
  
  Tmp.toUpperCase();  // 轉換為大寫
  return Tmp;
}

// 在串列埠顯示MAC地址
void ShowMAC() {
  Serial.print("MAC Address:(");  // 印出標籤
  Serial.print(MacData);   // 印出MAC地址
  Serial.print(")\n");  // 換行
}

// IP地址轉換函式，將4個字節的IP轉為字串
String IpAddress2String(const IPAddress& ipAddress) {
  return String(ipAddress[0]) + "." +
         String(ipAddress[1]) + "." +
         String(ipAddress[2]) + "." +
         String(ipAddress[3]);
}

// 將字元指標轉換為字串
String chrtoString(char *p)   // 將字元指標轉為字串
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