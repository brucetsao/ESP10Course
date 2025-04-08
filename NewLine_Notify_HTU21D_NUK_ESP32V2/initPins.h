#define _Debug 1    // 輸出偵錯訊息
#define _debug 1    // 輸出偵錯訊息
#define initDelay 6000    // 初始化延遲時間
#define loopdelay 500   // loop 延遲時間

#include <Arduino.h>
#include <WiFi.h>   // 使用網路函式庫
#include <WiFiClient.h>   // 使用網路用戶端函式庫
#include <WiFiMulti.h>    // 多熱點網路函式庫

WiFiMulti wifiMulti;    // 產生多熱點連線物件

String IpAddress2String(const IPAddress& ipAddress);

IPAddress ip;    // 網路卡取得IP位址之原始型態之儲存變數
String IPData;   // 網路卡取得IP位址之儲存變數
String APname;   // 網路熱點之儲存變數
String MacData;   // 網路卡取得網路卡編號之儲存變數 
long rssi;   // 網路連線之訊號強度之儲存變數
int status = WL_IDLE_STATUS;  // 取得網路狀態之變數

void initWiFi()   // 網路連線，連上熱點
{
    // 加入連線熱點資料
    wifiMulti.addAP("NUKIOT", "iot12345");  // 加入一組熱點
    wifiMulti.addAP("NCNUIOT", "12345678");  // 加入一組熱點
    wifiMulti.addAP("NCNUIOT2", "12345678");  // 加入一組熱點
    wifiMulti.addAP("ABC", "12345678");  // 加入一組熱點
    wifiMulti.addAP("lab309", "");  // 加入一組熱點  
    
    // 開始連接到WiFi網路
    Serial.println();
    Serial.println();
    Serial.print("Connecting to ");  // 通訊埠印出 "Connecting to "
    wifiMulti.run();  // 多網路熱點設定連線
    while (WiFi.status() != WL_CONNECTED)     // 還沒連線成功
    {
        // wifiMulti.run() 啟動多熱點連線物件，進行已經紀錄的熱點進行連線，
        // 一個一個連線，連到成功為止，或者是全部連不上
        // WL_CONNECTED 連接熱點成功
        Serial.print(".");   // 通訊埠印出 "."
        delay(500);  // 停500 ms
        wifiMulti.run();   // 多網路熱點設定連線
    }
    Serial.println("WiFi connected");   // 通訊埠印出 "WiFi connected"
    Serial.print("AP Name: ");   // 通訊埠印出 "AP Name: "
    APname = WiFi.SSID();  // 獲取當前連接的SSID名稱
    Serial.println(APname);   // 通訊埠印出 APname
    Serial.print("IP address: ");   // 通訊埠印出 "IP address: "
    ip = WiFi.localIP();  // 獲取本地IP地址
    IPData = IpAddress2String(ip);  // 將IP地址轉換為字串
    Serial.println(IPData);   // 通訊埠印出 IPData
    // 通訊埠印出連接熱點取得的IP位址
}

void ShowInternet()   // 顯示網路連線資訊
{
    Serial.print("MAC:");  // 印出 "MAC:"
    Serial.print(MacData);  // 印出 MacData
    Serial.print("\n");  // 換行
    Serial.print("SSID:");  // 印出 "SSID:"
    Serial.print(APname);  // 印出 APname
    Serial.print("\n");  // 換行
    Serial.print("IP:");  // 印出 "IP:"
    Serial.print(IPData);  // 印出 IPData
    Serial.print("\n");  // 換行
    // OledLineText(1,"MAC:"+MacData) ;
    // OledLineText(2,"IP:"+IPData);
    // ShowMAC() ;
    // ShowIP()  ;
}

//--------------------
//----------Common Lib
long POW(long num, int expo)  // 計算 num 的 expo 次方
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
        return tmp; 
    }
}

String SPACE(int sp)  // 回傳包含 sp 個空格的字串
{
    String tmp = "";
    for (int i = 0; i < sp; i++)
    {
        tmp.concat(' ');
    }
    return tmp;
}

String strzero(long num, int len, int base)  // 回傳補零後的字串
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
        tmp[ln-1] = hexcode[tmpchr];
        ln++;
        tmpnum = (long)(tmpnum / base);
    }
    for (i = len-1; i >= 0; i--)
    {
        retstring.concat(tmp[i]);
    }
    return retstring;
}

unsigned long unstrzero(String hexstr, int base)  // 將字串轉為無符號長整數
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
        tmp = hexstr.charAt(i);  // 取得第 i 個字元
        tmp1 = hexcode.indexOf(tmp);
        tmpnum = tmpnum + tmp1 * POW(base, (len - i - 1));
    }
    return tmpnum;
}

String print2HEX(int number)  // 回傳數字的16進位字串
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

String GetMacAddress()    // 取得網路卡編號
{
    String Tmp = "";
    byte mac[6];
    WiFi.macAddress(mac);
    for (int i = 0; i < 6; i++)
    {
        Tmp.concat(print2HEX(mac[i]));
    }
    Tmp.toUpperCase();
    return Tmp;
}

void ShowMAC()  // 於串列埠印出網路卡號碼
{
    Serial.print("MAC Address:(");  // 印出 "MAC Address:("
    Serial.print(MacData);   // 印出 MacData 變數內容
    Serial.print(")\n");    // 印出 ")\n"
}

String IpAddress2String(const IPAddress& ipAddress)  // 回傳 IPAddress 的字串
{
    return String(ipAddress[0]) + String(".") +
           String(ipAddress[1]) + String(".") +
           String(ipAddress[2]) + String(".") +
           String(ipAddress[3]);
}

String chrtoString(char *p)  // 將字元指標轉為字串
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

void CopyString2Char(String ss, char *p)  // 將字串複製到字元陣列
{
    if (ss.length() <= 0)
    {
        *p = 0x00;
        return;
    }
    ss.toCharArray(p, ss.length() + 1);
}

boolean CharCompare(char *p, char *q)  // 比較兩個字元指標內容是否相同
{
    boolean flag = false;
    int count = 0;
    int nomatch = 0;
    while (count < 100)
    {
        if (*(p + count) == 0x00 || *(q + count) == 0x00)
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

String Double2Str(double dd, int decn)  // 將 double 轉換為字串
{
    int a1 = (int)dd;
    int a3;
    if (decn > 0)
    {    
        double a2 = dd - a1;
        a3 = (int)(a2 * (10^decn));
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
