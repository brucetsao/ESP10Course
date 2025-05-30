#define LINE_TOKEN "yj5E7IgCf62m4D0mkzwus864jbHAU39LB4A9b6VIjn6" 

#include <ESP_Line_Notify.h>
LineNotifyClient line;

char linemsg[250] ; 
void initLine();    //起始Line Notifier連線 ;
/* Define the LineNotifyClient object */
void printRessult(LineNotifySendingResult result);
void sendingCallback(LineNotifySendingResult result);
void SendMsgtoLine(String msgtxt) ; //傳送資訊到Line Notifier ;

void initLine()  //起始Line Notifier連線
{
      //------------line work
     line.reconnect_wifi = true;

  Serial.println("Sending Line Notify message...");
  line.token = LINE_TOKEN;   
      // 設定Line啟動，並給她我的Line金鑰
}
void SendMsgtoLine(String msgtxt)  //傳送資訊到Line Notifier
{
  // 請 Line版本 傳送資訊
  line.message = msgtxt;
    LineNotifySendingResult result = LineNotify.send(line);

  // Print the sending result
  printRessult(result);
}
void printRessult(LineNotifySendingResult result)
{
  if (result.status == LineNotify_Sending_Success)
  {
    Serial.printf("Status: %s\n", "success");
    Serial.printf("Text limit: %d\n", result.quota.text.limit);
    Serial.printf("Text remaining: %d\n", result.quota.text.remaining);
    Serial.printf("Image limit: %d\n", result.quota.image.limit);
    Serial.printf("Image remaining: %d\n", result.quota.image.remaining);
    Serial.printf("Reset: %d\n", result.quota.reset);
  }
  else if (result.status == LineNotify_Sending_Error)
  {
    Serial.printf("Status: %s\n", "error");
    Serial.printf("error code: %d\n", result.error.code);
    Serial.printf("error msg: %s\n", result.error.message.c_str());
  }
}

/* The sending callback function (optional) */
void sendingCallback(LineNotifySendingResult result)
{
  if (result.status == LineNotify_Sending_Begin)
  {
    Serial.println("Sending begin");
  }
  else if (result.status == LineNotify_Sending_Upload)
  {
    Serial.printf("Uploaded %s, %d%s\n", result.file_name.c_str(), (int)result.progress, "%");
  }
  else if (result.status == LineNotify_Sending_Success)
  {
    Serial.println("Sending success\n\n");
    Serial.printf("Text limit: %d\n", result.quota.text.limit);
    Serial.printf("Text remaining: %d\n", result.quota.text.remaining);
    Serial.printf("Image limit: %d\n", result.quota.image.limit);
    Serial.printf("Image remaining: %d\n", result.quota.image.remaining);
    Serial.printf("Reset: %d\n", result.quota.reset);
  }
  else if (result.status == LineNotify_Sending_Error)
  {
    Serial.println("Sending failed\n\n");
    Serial.printf("error code: %d\n", result.error.code);
    Serial.printf("error msg: %s\n", result.error.message.c_str());
  }
}
