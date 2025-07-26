/*
 整體程式原理說明
步驟  說明
1. 格式化網址  使用 sprintf() 將感測資料填入 GET 請求 URL 中
2. 建立連線 透過 http.begin() 設定 WiFiClient 和網址
3. 傳送請求 使用 http.GET() 發送 HTTP GET 請求
4. 接收回應 檢查 HTTP 狀態碼並讀取伺服器回傳內容
5. 中斷連線 結束 HTTP 連線，釋放資源，避免占用 client
6. 清理工作 呼叫 http.end() 結束請求處理 
*/
#include <HTTPClient.h>    // 引入 HTTPClient 函式庫，用來發送 HTTP 請求

HTTPClient http;           // 建立 HTTP 請求的物件 http

// 建立一個格式化的 GET 網址模板，%s 代表 MAC 位址、%4.1f 代表一位小數的溫度與濕度
const char* httpgetstr = "http://iot.arduino.org.tw:8888/bigdata/dhtdata/dhDatatadd.php?MAC=%s&T=%4.1f&H=%4.1f" ;
// 範例網址：
// http://iot.arduino.org.tw:8888/bigdata/dhtdata/dhDatatadd.php?MAC=AABBCCDDEEFF&T=34&H=34

String sendURL;                // 用來儲存完整網址（備用用法）
char URLbuffer[500];           // 用來儲存格式化後的 URL 字串

char iotserver[] = "iot.arduino.org.tw";  // 雲端伺服器 DNS 網址（可透過 DNS 解析）
int iotport = 8888;                        // 伺服器所使用的通訊埠（port）

// ====== 下列變數應在主程式中宣告並初始化 ======
// WiFiClient client;      // ESP32 的網路連線物件，需於主程式建立
// String MacData;         // MAC 位址字串（例如："AABBCCDDEEFF"）
// float Tvalue, Hvalue;   // 感測器取得的溫度（Tvalue）與濕度（Hvalue）數值
// ============================================

// 定義一個函式：將感測資料傳送到雲端伺服器
void SendtoClouding() {
  // 使用 sprintf() 將溫濕度與 MAC 資料格式化插入到 URL 模板中
  sprintf(URLbuffer, httpgetstr, MacData.c_str(), Tvalue, Hvalue);
  
  // 將完整的 GET 請求 URL 印出到監控視窗上供除錯使用
  Serial.println(URLbuffer);

  // 初始化 HTTP 請求並指定使用 WiFiClient 連線物件與目標 URL
  http.begin(client, URLbuffer);

  // 發送 GET 請求給伺服器，並儲存回傳的 HTTP 狀態碼
  int httpCode = http.GET();

  if (httpCode > 0) {
    // HTTP 狀態碼大於 0 表示成功（例如 200 表示 OK）
    Serial.printf("HTTP 回應碼：%d\n", httpCode);

    // 取得伺服器回應的文字內容
    String payload = http.getString();
    
    // 顯示伺服器回應內容
    Serial.println("伺服器回應內容：");
    Serial.println(payload);
  } else {
    // HTTP 回應失敗時顯示錯誤代碼
    Serial.printf("HTTP 傳輸失敗，錯誤碼：%d\n", httpCode);
  }

  // 檢查連線是否仍開啟，如果是就關閉
  if (client.connected()) {
    client.stop();  // 中斷與伺服器的連線
  }

  // 結束這次 HTTP 請求（清理資源）
  http.end();
}
