/*
 此程式會連接 WiFi 熱點，
 並嘗試連接指定伺服器，
 然後發送 HTTP 請求。
 伺服器回傳的資料會在串列監視器上顯示，
 若伺服器連線中斷，
 則程式會停止執行並顯示斷線訊息。 
*/
#include <WiFi.h>          // 引入 WiFi 函式庫
#include <WiFiClient.h>    // 引入 WiFiClient 函式庫

#define LED_BUILTIN 2      // 設定 GPIO 腳位，連接測試 LED，若開發板自帶 LED 可忽略此行

// 設定 WiFi 熱點名稱和密碼
const char *ssid = "NUKIOT";       // 熱點名稱
const char *password = "iot12345"; // 熱點密碼

const char* server = "www.hinet.net"; // 伺服器網址
int value = 0;                      // 數值變數初始化
WiFiClient client;                  // 建立 WiFi 客戶端物件

void setup() {
  pinMode(LED_BUILTIN, OUTPUT);     // 設定 LED 為輸出模式
  digitalWrite(LED_BUILTIN, LOW);   // 將 LED 設為低電位（關閉）
  Serial.begin(9600);               // 初始化串列通訊，波特率設為 9600
  delay(10);

  // 開始連接 WiFi 網路
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);            // 印出連接的 WiFi 名稱

  WiFi.begin(ssid, password);      // 連接 WiFi

  while (WiFi.status() != WL_CONNECTED)  // 檢查是否連接成功
  {
      delay(500);
      Serial.print(".");           // 若未連接成功，印出"."表示正在嘗試
  }

  Serial.println("");
  Serial.print("Successful Connecting to Access Point:");
  Serial.println("WiFi connected");  // 連接成功訊息
  Serial.println(WiFi.SSID());       // 印出連接的 SSID
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());    // 印出取得的 IP 位址

  //------------------
  Serial.println("\nStarting connection to server...");
  // 若成功連線至伺服器，則在串列埠顯示訊息
  if (client.connect(server, 80)) 
  {
    Serial.println("connected to server");  // 成功連接伺服器訊息
    // 發送 HTTP 請求
    client.println("GET /search?q=ESP32 HTTP/1.1");
    client.println("Host: www.google.com");
    client.println("Connection: close");
    client.println();
  }    
}

void loop() {
  // 若有來自伺服器的數據可讀取
  while (client.available()) {
    char c = client.read();   // 讀取一個字元
    Serial.write(c);          // 在串列監控視窗顯示該字元
  }

  // 若與伺服器的連線已中斷
  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting from server.");
    client.stop();           // 停止客戶端連線

    // 程式停止在此，進入無限迴圈
    while (true);
  }
}
