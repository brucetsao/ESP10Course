#define LINE_TOKEN "XBiWyNPEA0xxZbCefGkbkIvuBZGANP5s1TxW13Kljpw"
// 啟動LINE機器人金鑰，請到https://notify-bot.line.me/zh_TW/ 增加

#include <ESP_Line_Notify.h>    // 引入LINE Notify的函式庫
LineNotifyClient line;    // 建立LINE Notify客戶端物件：line

char linemsg[250];       // 定義儲存LINE訊息的字元陣列
void initLine();    // 宣告初始化LINE連線的函式
void printRessult(LineNotifySendingResult result);  // 宣告印出LINE傳送結果的函式
void sendingCallback(LineNotifySendingResult result);  // 宣告傳送回呼函式
void SendMsgtoLine(String msgtxt); // 宣告傳送訊息到LINE的函式

void initLine()  // 初始化LINE連線
{
  // 設定LINE Notify的連線參數
  line.reconnect_wifi = true;    // 設定自動重新連接WiFi

  Serial.println("Sending Line Notify message...");
  line.token = LINE_TOKEN;   // 設定LINE Notify的金鑰
}

void SendMsgtoLine(String msgtxt)  // 傳送訊息到LINE Notify
{
  line.message = msgtxt;  // 設定要傳送的訊息
  LineNotifySendingResult result = LineNotify.send(line);   // 傳送訊息到LINE Notify
  // 印出傳送結果
  printRessult(result);
}

void printRessult(LineNotifySendingResult result)   // 印出LINE傳送結果
{
  if (result.status == LineNotify_Sending_Success)  // 如果傳送成功
  {
    Serial.printf("Status: %s\n", "success");
    Serial.printf("Text limit: %d\n", result.quota.text.limit);
    Serial.printf("Text remaining: %d\n", result.quota.text.remaining);
    Serial.printf("Image limit: %d\n", result.quota.image.limit);
    Serial.printf("Image remaining: %d\n", result.quota.image.remaining);
    Serial.printf("Reset: %d\n", result.quota.reset);
  }
  else if (result.status == LineNotify_Sending_Error)  // 如果傳送失敗
  {
    Serial.printf("Status: %s\n", "error");
    Serial.printf("error code: %d\n", result.error.code);
    Serial.printf("error msg: %s\n", result.error.message.c_str());
  }
}

/* 傳送回呼函式 (可選) */
void sendingCallback(LineNotifySendingResult result)
{
  if (result.status == LineNotify_Sending_Begin)  // 傳送開始
  {
    Serial.println("Sending begin");
  }
  else if (result.status == LineNotify_Sending_Upload)  // 上傳中
  {
    Serial.printf("Uploaded %s, %d%s\n", result.file_name.c_str(), (int)result.progress, "%");
  }
  else if (result.status == LineNotify_Sending_Success)  // 傳送成功
  {
    Serial.println("Sending success\n\n");
    Serial.printf("Text limit: %d\n", result.quota.text.limit);
    Serial.printf("Text remaining: %d\n", result.quota.text.remaining);
    Serial.printf("Image limit: %d\n", result.quota.image.limit);
    Serial.printf("Image remaining: %d\n", result.quota.image.remaining);
    Serial.printf("Reset: %d\n", result.quota.reset);
  }
  else if (result.status == LineNotify_Sending_Error)  // 傳送失敗
  {
    Serial.println("Sending failed\n\n");
    Serial.printf("error code: %d\n", result.error.code);
    Serial.printf("error msg: %s\n", result.error.message.c_str());
  }
}
