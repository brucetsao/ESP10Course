#define _Debug 1    //輸出偵錯訊息
#define _debug 1    //輸出偵錯訊息
#define initDelay   6000    //初始化延遲時間
#define loopdelay 60000   //loop 延遲時間

  
  #include <WiFi.h>   //使用網路函式庫
  #include <WiFiClient.h>   //使用網路用戶端函式庫
  #include <WiFiMulti.h>    //多熱點網路函式庫
  
  WiFiMulti wifiMulti;    //產生多熱點連線物件
  
  
  
  String IpAddress2String(const IPAddress& ipAddress) ;
  
  
 
  
    IPAddress ip ;    //網路卡取得IP位址之原始型態之儲存變數
    String IPData ;   //網路卡取得IP位址之儲存變數
    String APname ;   //網路熱點之儲存變數
    String MacData ;   //網路卡取得網路卡編號之儲存變數 
    long rssi ;   //網路連線之訊號強度'之儲存變數
    int status = WL_IDLE_STATUS;  //取得網路狀態之變數
  // randomSeed((unsigned long)millis());
  void initWiFi()   //網路連線，連上熱點
  {
    //加入連線熱點資料
    wifiMulti.addAP("NCNUIOT", "12345678");  //加入一組熱點
    wifiMulti.addAP("NCNUIOT2", "12345678");  //加入一組熱點
    wifiMulti.addAP("ABC", "12345678");  //加入一組熱點
  
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
      ip = WiFi.localIP();
      IPData = IpAddress2String(ip) ;
      Serial.println(IPData);   //通訊埠印出 WiFi.localIP()==>從熱點取得IP位址
      //通訊埠印出連接熱點取得的IP位址
    
  
   
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
    //OledLineText(1,"MAC:"+MacData) ;
    //OledLineText(2,"IP:"+IPData);
    
    //ShowMAC() ;
    //ShowIP()  ;
  }
  //--------------------
//----------Common Lib
// 計算 num 的 expo 次方
long POW(long num, int expo)
{
  long tmp = 1;  //暫存變數

  if (expo > 0) //次方大於零
  { 
    for (int i = 0; i < expo; i++)  //利用迴圈累乘
  {
      tmp = tmp * num;  // 不斷乘以num
    }
    return tmp;   //回傳產生變數
  } 
  else 
  {
    return tmp;  // 若expo小於或等於0，返回1
  }
}

// 生成指定長度的空格字串
String SPACE(int sp)  //sp為傳入產生空白字串長度
{
  String tmp = "";  //產生空字串
  for (int i = 0; i < sp; i++)  //利用迴圈累加空白字元
  {
    tmp.concat(' ');  // 加入空格
  }
  return tmp; //回傳產生空白字串
}


// 轉換數字為指定長度與進位制的字串，並補零
String strzero(long num, int len, int base)
{
  //num 為傳入的數字
  //len為傳入的要回傳字串長度之數字
  // base 幾進位
  String retstring = String("");  //產生空白字串
  int ln = 1; //暫存變數
  int i = 0;  //計數器
  char tmp[10]; //暫存回傳內容變數
  long tmpnum = num;  //目前數字
  int tmpchr = 0; //字元計數器
  char hexcode[] = {'0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'};
  //產生字元的對應字串內容陣列
  while (ln <= len) //開始取數字
  {
    tmpchr = (int)(tmpnum % base);  //取得第n個字串的數字內容，如1='1'、15='F'
    tmp[ln - 1] = hexcode[tmpchr];  //根據數字換算對應字串
    ln++;
    tmpnum = (long)(tmpnum / base); // 求剩下數字
  }
  for (i = len - 1; i >= 0; i--)
  {
    retstring.concat(tmp[i]);//連接字串
  }
  return retstring; //回傳內容
}

// 轉換指定進位制的字串為數值
unsigned long unstrzero(String hexstr, int base) 
{
  String chkstring; //暫存字串
  int len = hexstr.length();  // 取得長度
  unsigned int i = 0;
  unsigned int tmp = 0; //取得文字之字串位置變數
  unsigned int tmp1 = 0;  //取得文字之對應字串位置變數
  unsigned long tmpnum = 0; //目前數字
  String hexcode = String("0123456789ABCDEF");   //產生字元的對應字串內容陣列
  for (i = 0; i < len; i++)
  {
    hexstr.toUpperCase(); //先轉成大寫文字
    tmp = hexstr.charAt(i); //取第i個字元
    tmp1 = hexcode.indexOf(tmp);  //根據字元，判斷十進位數字
    tmpnum = tmpnum + tmp1 * POW(base, (len - i - 1));  //計算數字
  }
  return tmpnum;  //回傳內容
} 

// 轉換數字為 16 進位字串，若小於 16 則補 0
String print2HEX(int number) {
  String ttt;   //暫存字串
  if (number >= 0 && number < 16) //判斷是否在區間
  {
    ttt = String("0") + String(number, HEX);  //產生前補零之字串
  }
  else
  {
    ttt = String(number, HEX);//產生字串
  }
  return ttt; //回傳內容
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

// 在串列埠顯示MAC地址
void ShowMAC() {
  Serial.print("MAC Address:(");  // 印出標籤
  Serial.print(MacData);   // 印出MAC地址
  Serial.print(")\n");  // 換行
}


// 轉換 IPAddress 物件為字串
String IpAddress2String(const IPAddress& ipAddress)
{
  return String(ipAddress[0]) + String(".") +
         String(ipAddress[1]) + String(".") +
         String(ipAddress[2]) + String(".") +
         String(ipAddress[3]);  //回傳內容
}

// 將 char 陣列轉為字串
String chrtoString(char *p)
{
    String tmp; //暫存字串
    char c; //暫存字元
    int count = 0;  //計數器
    while (count < 100) //100個字元以內
    {
        c = *p; //取得字串之每一個字元內容
        if (c != 0x00)  //是否未結束
        {
            tmp.concat(String(c));  //字元累積到字串
        }
        else
        {
            return tmp;
        }
        count++;
        p++;
    }
}

// 複製 String 到 char 陣列
void CopyString2Char(String ss, char *p)
{
  if (ss.length() <= 0)
  {
    *p = 0x00;
    return;
  }
  ss.toCharArray(p, ss.length() + 1);
}

// 比較兩個 char 陣列是否相同
boolean CharCompare(char *p, char *q)
{
    boolean flag = false;
    int count = 0;
    int nomatch = 0;
    while (flag < 100)
    {
        if (*(p + count) == 0x00 || *(q + count) == 0x00)
            break;
        if (*(p + count) != *(q + count))
        {
            nomatch++;
        }
        count++;
    }
    return nomatch == 0;
}

// 將 double 轉為字串，保留指定小數位數
String Double2Str(double dd, int decn)
{
    int a1 = (int)dd;
    int a3;
    if (decn > 0)
    {
        double a2 = dd - a1;
        a3 = (int)(a2 * pow(10, decn));
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
