#include "initPins.h"     // 引入腳位初始化模組
#include "HTMLLib.h"    // 引入HTML生成模組，用於網頁介面和溫濕度傳感器等

/*
這段程式碼初始化了網路連接並啟動了一個網頁伺服器，
並在客戶端連接時處理HTTP請求。該程式碼主要用於建立一個簡單的網頁伺服器，
並處理來自客戶端的請求。
*/
void setup() 
{
    initALL(); // 系統硬體和軟體初始化
    initWiFi();  // 網路連接，連接到WiFi熱點
    ShowInternet();  // 顯示網路連接資訊
    server.begin(80); // 啟動網頁伺服器，監聽埠號80
    delay(1000);  // 等待1秒
    Serial.println("Home System Start");  // 串列監視器中輸出系統啟動訊息
}

void loop() 
{
   //--------------------
  WiFiClient client = server.available();   // 檢查是否有客戶端嘗試連接到伺服器
  if (client)   // 如果有客戶端連接
  { 
    // 當有客戶端連接時
    Serial.println("New Client.");  // 輸出新客戶端連接訊息
    String currentLine = "";  // 用於儲存從客戶端收到的資料
    while (client.connected())  // 當客戶端連接中
    {
      if (client.available())  // 如果有資料可讀
      {
        char c = client.read();  // 讀取一個字元
        Serial.write(c);  // 將字元寫到串列監視器中
        if (c == '\n')  // 如果是換行字元
        {
          // 如果當前行為空，表示收到連續兩個換行字元，意味著HTTP請求結束
          if (currentLine.length() == 0)
          {
            // HTTP標頭以狀態碼開始，例如 "HTTP/1.1 200 OK"
            // 然後是內容類型標頭，接著是一個空行
            String tmp = TranHTML(PageTitle, String(millis()), 3); // 生成HTML響應
            client.print(tmp);  // 發送HTML響應
            Serial.println(tmp);  // 在串列監視器中輸出響應內容
            // HTTP回應以另一個空行結束
            client.println();  // 加上空行
            // 結束循環
            break;
          }
          else
          { // 如果當前行非空，則清除當前行
            currentLine = "";
          }
        } 
        else if (c != '\r')  // 如果不是回車字元
        {
          currentLine += c;  // 將字元添加到當前行
        }
      }
    }
    // 關閉連接
    client.stop();  // 停止客戶端連接
    Serial.println("Client Disconnected.");  // 輸出客戶端斷開連接訊息
  }

   //------------------
   delay(100);  // 短暫延遲
}

void initALL()  // 系統硬體和軟體初始化
{
    Serial.begin(9600);  // 設置串列通訊波特率為9600
    Serial.println("System Start");  // 輸出系統啟動訊息
}
