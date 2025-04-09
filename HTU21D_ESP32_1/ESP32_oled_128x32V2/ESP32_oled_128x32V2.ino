#include <Arduino.h>  // 引入Arduino核心函式庫
#include <U8g2lib.h>  // 引入U8g2函式庫，用於OLED顯示屏
#include <SPI.h>  // 引入SPI通訊函式庫
#include <Wire.h>  // 引入I2C通訊函式庫

// 定義U8G2物件，使用硬體I2C方式控制SSD1306 128x32 OLED顯示器
U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0);
/*
這段程式碼示範了如何使用U8G2函式庫在SSD1306 128x32的OLED顯示器上顯示文字。
setup()函式初始化顯示器，
loop()函式通過不同的延遲和字串來顯示一些資訊。
最後定義了一個函式 printonOLDE()，
用來在指定位置顯示文字，
但目前沒有具體實現任何功能。


*/
void setup(void) {
  u8g2.begin();  // 初始化U8G2，啟動OLED顯示器
}

void loop(void) {
  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定字體，參考U8G2字體列表
  u8g2.drawStr(8, 29, "MYBOTIC");  // 在內部緩衝區寫入字串
  u8g2.sendBuffer();  // 將緩衝區的內容發送到顯示器
  delay(3000);  // 延遲3秒
  
  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定相同字體
  u8g2.drawStr(31, 24, "your");  // 在緩衝區寫入字串 "your"
  u8g2.sendBuffer();  // 將緩衝區的內容發送到顯示器
  delay(800);  // 延遲800毫秒

  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定字體
  u8g2.drawStr(10, 29, "robotic");  // 在緩衝區寫入字串 "robotic"
  u8g2.sendBuffer();  // 將內容發送到顯示器
  delay(800);  // 延遲800毫秒

  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定字體
  u8g2.drawStr(4, 29, "solution");  // 在緩衝區寫入字串 "solution"
  u8g2.sendBuffer();  // 將內容發送到顯示器
  delay(2000);  // 延遲2秒
}

// 定義一個函式，用於在OLED顯示器上顯示文字
void printonOLDE(int x, int y, String ss) {
  // 這個函式目前沒有實作任何功能
}
