// 引入 Arduino 函式庫
#include <Arduino.h>

// 引入 OLED 顯示器的 U8g2 函式庫
#include <U8g2lib.h>    

// 引入 SPI 函式庫，用於 SPI 通訊
#include <SPI.h>    

// 引入 I2C 函式庫，用於 I2C 通訊
#include <Wire.h>   
/*
這個程式片段展示了許多 OLED 顯示器的常用函式，
包含初始化顯示器、
設定游標位置、
繪製不同的圖形、
設定字體等功能。
並且添加了註解，
方便理解每個函式的用途和功能。

*/
// 函式宣告
void _update();              // 更新顯示器畫面
void _updateBuffer();        // 將緩衝區內容更新到顯示器
void _setI2CAddress(int adr); // 設定顯示器的 I2C 地址
void _initDisplay();         // 初始化顯示器
void initOLED();             // 啟動 OLED 顯示器
void _setCursor(int x, int y); // 設定游標位置
void _setDrawColor(int color); // 設定繪圖顏色
int _getWidth();             // 取得顯示器的寬度
int _getHeight();            // 取得顯示器的高度
int _getMaxCharWidth();      // 取得字形的最大寬度
int _getMaxCharHeight();     // 取得字形的最大高度
int _getCharWidth();         // 取得字形的寬度
int _getUTF8Width();         // 取得 UTF-8 字符的寬度
void _clearDisplay();        // 清除顯示器的畫面
void _setContrast(int t);    // 設定顯示器對比度
void _clearOled();           // 清除 OLED 顯示器
void _clearBuffer();         // 清除繪圖緩衝區
void _Box(int x, int y, int w, int h);  // 繪製矩形
void _Circle(int x, int y, int r);   // 繪製圓形
void _Ellipse(int x, int y, int rx, int ry); // 繪製橢圓形
void _FilledEllipse(int x, int y, int rx, int ry); // 繪製填滿的橢圓形
void _Triangle(int x1, int y1, int x2, int y2, int x3, int y3); // 繪製三角形
void _HLine(int x, int y, int l);  // 繪製水平線
void _VLine(int x, int y, int l);  // 繪製垂直線
void _Line(int x1, int y1, int x2, int y2); // 繪製直線
void _Point(int x, int y);   // 繪製點
void _setFont(const uint8_t *font_8x8); // 設定字體
void _setFontDirection(int dir); // 設定字體方向
void _setFontMode(int is_transparent); // 設定字體透明模式
void _TPrint(int x, int y, const char *ss); // 在指定位置輸出文字
void _TextPrint(int x, int y, const char *ss, const uint8_t *font_8x8); // 在指定位置用特定字體輸出文字
void _UTF8Print(int x, int y, const char *ss, const uint8_t *font_8x8); // 在指定位置用特定字體輸出 UTF-8 文字
void _Print(const char *ss); // 在當前游標位置輸出文字

// 建立一個 U8G2_SSD1306 顯示器實例，解析度為 128x32，使用 I2C 通訊
U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0);

// 更新顯示器的畫面
void _update() {
  u8g2.updateDisplay();
}

// 將緩衝區的內容更新到顯示器
void _updateBuffer() {
  u8g2.sendBuffer();
}

// 設定 I2C 地址
void _setI2CAddress(int adr) {
  u8g2.setI2CAddress(adr);
}

// 初始化顯示器
void _initDisplay() {
  u8g2.initDisplay();
}

// 初始化 OLED 顯示器
void initOLED() {
  // 如果無法啟動 OLED 顯示器
  if (!u8g2.begin()) {
    Serial.println("Couldn't find OLED!"); // 顯示找不到顯示器的錯誤信息
    while (1); // 進入無窮迴圈，避免進一步執行
  }
  Serial.println("init OLED successful!"); // 顯示初始化成功
}

// 設定游標位置
void _setCursor(int x, int y) {
  u8g2.setCursor(x, y);
}

// 設定繪圖顏色
void _setDrawColor(int color) {
  // color 可以根據不同的值來決定繪圖方式，例如 0 為實心、1 為透明、2 為 XOR 等
  u8g2.setDrawColor(color);
}

// 取得顯示器的寬度
int _getWidth() {
  return u8g2.getDisplayWidth();
}

// 取得顯示器的高度
int _getHeight() {
  return u8g2.getDisplayHeight();
}

// 取得字體的最大寬度
int _getMaxCharWidth() {
  return u8g2.getMaxCharWidth();
}

// 取得字體的最大高度
int _getMaxCharHeight() {
  return u8g2.getMaxCharHeight();
}

// 取得字符的寬度
int _getCharWidth() {
  return u8g2.getStrWidth(" ");
}

// 取得 UTF-8 字符的寬度
int _getUTF8Width() {
  return u8g2.getUTF8Width(" ");
}

// 清除顯示器的畫面
void _clearDisplay() {
  u8g2.clearDisplay(); // 清除顯示器內容
  u8g2.sendBuffer();  // 將緩衝區內容傳送到顯示器
}

// 設定顯示器的對比度
void _setContrast(int t) {
  u8g2.setContrast(t); // 設定對比度
}

// 清除 OLED 顯示器
void _clearOled() {
  u8g2.clear(); // 清除所有內容
  u8g2.sendBuffer(); // 將緩衝區內容傳送到顯示器
}

// 清除緩衝區
void _clearBuffer() {
  u8g2.clearBuffer(); // 清除緩衝區
  u8g2.sendBuffer(); // 將緩衝區內容傳送到顯示器
}

// 繪製矩形
void _Box(int x, int y, int w, int h) {
  u8g2.drawBox(x, y, w, h); 
}

// 繪製圓形
void _Circle(int x, int y, int r) {
  u8g2.drawCircle(x, y, r, U8G2_DRAW_ALL); 
}

// 繪製橢圓形
void _Ellipse(int x, int y, int rx, int ry) {
  u8g2.drawEllipse(x, y, rx, ry, U8G2_DRAW_ALL); 
}

// 繪製填滿的橢圓形
void _FilledEllipse(int x, int y, int rx, int ry) {
  u8g2.drawFilledEllipse(x, y, rx, ry, U8G2_DRAW_ALL); 
}

// 繪製三角形
void _Triangle(int x1, int y1, int x2, int y2, int x3, int y3) {
  u8g2.drawTriangle(x1, y1, x2, y2, x3, y3); 
}

// 繪製水平線
void _HLine(int x, int y, int l) {
  u8g2.drawHLine(x, y, l); 
}

// 繪製垂直線
void _VLine(int x, int y, int l) {
  u8g2.drawVLine(x, y, l); 
}

// 繪製直線
void _Line(int x1, int y1, int x2, int y2) {
  u8g2.drawLine(x1, y1, x2, y2); 
}

// 繪製點
void _Point(int x, int y) {
  u8g2.drawPixel(x, y); 
}

// 設定字體
void _setFont(const uint8_t *font_8x8) {
  u8g2.setFont(font_8x8); 
}

// 設定字體方向
void _setFontDirection(int dir) {
  u8g2.setFontDirection(dir); 
}

// 設定字體的透明模式
void _setFontMode(int is_transparent) {
  u8g2.setFontMode(is_transparent); 
}

// 在指定位置輸出文字
void _TPrint(int x, int y, const char *ss) {
  u8g2.drawStr(x, y, ss); 
}

// 在指定位置用特定字體輸出文字
void _TextPrint(int x, int y, const char *ss, const uint8_t *font_8x8) {
  u8g2.setFont(font_8x8); 
  u8g2.drawStr(x, y, ss); 
}

// 在指定位置用特定字體輸出 UTF-8 文字
void _UTF8Print(int x, int y, const char *ss, const uint8_t *font_8x8) {
  u8g2.setFont(font_8x8); 
  u8g2.drawStr(x, y, ss); 
}

// 在當前游標位置輸出文字
void _Print(const char *ss) {
  u8g2.print(ss); 
}
