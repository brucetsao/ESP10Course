#include <Arduino.h>  // 引入Arduino基礎函式庫
#include <U8g2lib.h>  // 引入U8g2顯示函式庫，用於OLED顯示屏
#include <SPI.h>  // 引入SPI通訊函式庫
#include <Wire.h>  // 引入I2C通訊函式庫

// 建立U8G2物件，用於控制SSD1306 128x32的OLED顯示器，使用硬體I2C
U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0); 
/*
這段程式碼使用U8G2函式庫控制一個SSD1306 128x32的OLED顯示器。
setup()函式初始化顯示器，
並在loop()函式中繪製字串並在顯示器上顯示。
這個範例程式展示了簡單的文字顯示和延遲，
通過逐步顯示字串來呈現不同的文字效果


*/
// setup函式，在按下重置或通電時執行一次
void setup(void) {
  u8g2.begin();  // 初始化U8G2，啟動OLED顯示器
}

// loop函式，會不斷重複執行
void loop(void) {
  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定使用的字體
  u8g2.drawStr(8, 29, "MYBOTIC");  // 在內部緩衝區繪製字串
  u8g2.sendBuffer();  // 將內部緩衝區的內容發送到顯示器
  delay(3000);  // 暫停3秒

  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定使用的字體
  u8g2.drawStr(31, 24, "your");  // 繪製字串"your"
  u8g2.sendBuffer();  // 將內容發送到顯示器
  delay(800);  // 暫停800毫秒

  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定使用的字體
  u8g2.drawStr(10, 29, "robotic");  // 繪製字串"robotic"
  u8g2.sendBuffer();  // 將內容發送到顯示器
  delay(800);  // 暫停800毫秒

  u8g2.clearBuffer();  // 清除內部緩衝區
  u8g2.setFont(u8g2_font_logisoso28_tr);  // 設定使用的字體
  u8g2.drawStr(4, 29, "solution");  // 繪製字串"solution"
  u8g2.sendBuffer();  // 將內容發送到顯示器
  delay(2000);  // 暫停2秒
}
