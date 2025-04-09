#include "initPins.h" //自訂系統腳位函式庫

void setup()
{
    initAll() ; //系統設定
    initWiFi()  ;  //網路連線
     ShowInternet() ; //秀出網路連線資訊
}

void loop()
{
    delay(50);
    Serial.print("connecting to ");  //通訊埠印出 "connecting to"
    Serial.println(host);    //通訊埠印出 "想要連線的主機：用host變數儲存 "

    // Use WiFiClient class to create TCP connections
    WiFiClient client;    //產生一個連線網站的socket 物件，用WiFiClient 宣告產生
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) // 連到測試網站，是否成功
    {
        //連線網站的socket 物件.connect()連到某一個網站
        //物件.connect(連線網站的域名或IP，連線網站的通訊埠)
        Serial.println("connection failed");
        return;
    }
 
//    while (client.available() == 0)   //網路連線有回應內容
//    {
//        if (millis() - timeout > 5000) // 超過五秒鐘
//        {
//            Serial.println(">>> Client Timeout !");
//            // TIME OUT， 好像斷線嘞
//            client.stop();  //連線停止
//            return;
//        }
//    }

    // Read all the lines of the reply from server and print them to Serial
    while(client.available())   //網站有回應
    {
        String line = client.readStringUntil('\r');
        Serial.print(line);
    }

    Serial.println();   //印出 換行鍵
    Serial.println("closing connection");   //印出 "closing connection"
    client.stop() ;    //連線關閉
}

void initAll()
{

  Serial.begin(9600); //通訊控制埠 初始化，並設為9600 bps
  Serial.println();
  Serial.println("System Start"); //印出 "System Start"
  MacData = GetMacAddress() ;    //取得網路卡編號

}
