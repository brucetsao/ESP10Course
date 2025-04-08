#include <Arduino.h>  // Arduino核心函式庫
#include <U8g2lib.h>  // U8g2函式庫，用於控制OLED顯示器
#include <SPI.h>  // SPI通訊函式庫
#include <Wire.h>  // I2C通訊函式庫

// 定義一個U8G2物件，用於控制SSD1306 128x32的OLED顯示器，使用硬體I2C
U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0);
/*
這段程式碼包含許多函式，
用於操作SSD1306 128x32 OLED顯示器。
這些函式提供了廣泛的功能，
包括清除顯示、繪製形狀、設定字體、
設定對比度、繪製文字等。
這個函式庫是以U8g2為基礎的，
提供了豐富的操作OLED顯示器的功能。

*/
// 函式宣告
void _update();  // 更新顯示
void _updateBuffer();  // 將內部緩衝區的內容傳送到顯示器
void _setI2CAddress(int adr);  // 設定OLED顯示器的I2C地址
void _initDisplay();  // 初始化顯示器
void initOLED();  // 啟動OLED顯示器
void _setCursor(int x, int y);  // 設定顯示游標的位置
void _setDrawColor(int color);  // 設定繪製顏色
int _getWidth();  // 取得顯示器寬度
int _getHeight();  // 取得顯示器高度
int _getMaxCharWidth();  // 取得字形的最大寬度
int _getMaxCharHeight();  // 取得字形的最大高度
int _getCharWidth();  // 取得單個字元的寬度
int _getUTF8Width();  // 取得UTF-8字元的寬度
void _clearDisplay();  // 清除顯示器內容
void _setContrast(int t);  // 設定顯示器的對比度
void _clearOled();  // 清除OLED顯示器內容
void _clearBuffer();  // 清除內部緩衝區
void _Box(int x, int y, int w, int h);  // 繪製矩形
void _Circle(int x, int y, int r);  // 繪製圓形
void _Ellipse(int x, int y, int rx, int ry);  // 繪製橢圓
void _FilledEllipse(int x, int y, int rx, int ry);  // 繪製填充橢圓
void _Triangle(int x1, int y1, int x2, int y2, int x3, int y3);  // 繪製三角形
void _HLine(int x, int y, int l);  // 繪製水平線
void _VLine(int x, int y, int l);  // 繪製垂直線
void _Line(int x1, int y1, int x2, int y2);  // 繪製直線
void _Point(int x, int y);  // 繪製點
void _setFont(const uint8_t *font_8x8);  // 設定字體
void _setFontDirection(int dir);  // 設定字體方向
void _setFontMode(int is_transparent);  // 設定字體模式（透明或不透明）
void _TPrint(int x, int y, const char *ss);  // 在指定位置打印字串
void _TextPrint(int x, int y, const char *ss, const uint8_t *font_8x8);  // 在指定位置打印字串，並設定字體
void _UTF8Print(int x, int y, const char *ss, const uint8_t *font_8x8);  // 在指定位置打印UTF-8字串
void _Print(const char *ss);  // 打印字串

// 函式實作
void _update() {  // 更新顯示
  u8g2.updateDisplay();
}

void _updateBuffer() {  // 更新內部緩衝區到顯示器
  u8g2.sendBuffer();  // 傳送內部緩衝區到顯示器
}

void _setI2CAddress(int adr) {  // 設定I2C地址
  u8g2.setI2CAddress(adr);  // 設定I2C地址
}

void _initDisplay() {  // 初始化顯示器
  u8g2.initDisplay();  // 初始化顯示器
}

void initOLED() {  // 啟動OLED顯示器
  if (!u8g2.begin()) {  // 如果OLED顯示器無法啟動
    Serial.println("Couldn't find OLED!");  // 輸出錯誤訊息
    while (1);  // 永遠停在這裡
  }
  Serial.println("init OLED successful!");  // 啟動成功訊息
}

void _setCursor(int x, int y) {  // 設定游標位置
  u8g2.setCursor(x, y);  // 設定游標
}

void _setDrawColor(int color) {  // 設定繪製顏色
  /*
  0: 實心
  1: 透明
  2: XOR
  */
  u8g2.setDrawColor(color);  // 設定繪製顏色
}

int _getWidth() {  // 取得顯示器寬度
  return u8g2.getDisplayWidth();  // 取得寬度
}

int _getHeight() {  // 取得顯示器高度
  return u8g2.getDisplayHeight();  // 取得高度
}

int _getMaxCharWidth() {  // 取得最大字元寬度
  return u8g2.getMaxCharWidth();  // 取得最大字元寬度
}

int _getMaxCharHeight() {  // 取得最大字元高度
  return u8g2.getMaxCharHeight();  // 取得最大字元高度
}

int _getCharWidth() {  // 取得單個字元寬度
  return u8g2.getStrWidth(" ");  // 取得空白字元寬度
}

int _getUTF8Width() {  // 取得UTF-8字元寬度
  return u8g2.getUTF8Width(" ");  // 取得UTF-8寬度
}

void _clearDisplay() {  // 清除顯示器內容
  u8g2.clearDisplay();  // 清除顯示
  u8g2.sendBuffer();  // 將緩衝區發送到顯示器
}

void _setContrast(int t) {  // 設定對比度
  u8g2.setContrast(t);  // 設定對比度
}

void _clearOled() {  // 清除OLED顯示器
  u8g2.clear();  // 清除內容
  u8g2.sendBuffer();  // 傳送清除後的內容到顯示器
}

void _clearBuffer() {  // 清除內部緩衝區
  u8g2.clearBuffer();  // 清除緩衝區
  u8g2.sendBuffer();  // 將緩衝區傳送到顯示器
}

void _Box(int x, int y, int w, int h) {  // 繪製矩形
  u8g2.drawBox(x, y, w, h);  // 繪製矩形
}

void _Circle(int x, int y, int r) {  // 繪製圓形
  u8g2.drawCircle(x, y, r, U8G2_DRAW_ALL);  // 繪製圓形
}

void _Ellipse(int x, int y, int rx, int ry) {  // 繪製橢圓
  u8g2.drawEllipse(x, y, rx, ry, U8G2_DRAW_ALL);  // 繪製橢圓
}

void _FilledEllipse(int x, int y, int rx, int ry) {  // 繪製填色橢圓
  u8g2.drawFilledEllipse(x, y, rx, ry, U8G2_DRAW_ALL);  // 繪製填色橢圓
}

void _Triangle(int x1, int y1, int x2, int y2, int x3, int y3) {  // 繪製三角形
  u8g2.drawTriangle(x1, y1, x2, y2, x3, y3);  // 繪製三角形
}

void _HLine(int x, int y, int l) {  // 繪製水平線
  u8g2.drawHLine(x, y, l);  // 繪製水平線
}

void _VLine(int x, int y, int l) {  // 繪製垂直線
  u8g2.drawVLine(x, y, l);  // 繪製垂直線
}

void _Line(int x1, int y1, int x2, int y2) {  // 繪製直線
  u8g2.drawLine(x1, y1, x2, y2);  // 繪製直線
}

void _Point(int x, int y) {  // 繪製點
  u8g2.drawPixel(x, y);  // 繪製點
}

void _setFont(const uint8_t *font_8x8) {  // 設定字體
  u8g2.setFont(font_8x8);  // 設定字體
}

void _setFontDirection(int dir) {  // 設定字體方向
  u8g2.setFontDirection(dir);  // 設定字體方向
}

void _setFontMode(int is_transparent) {  // 設定字體模式
  u8g2.setFontMode(is_transparent);  // 設定是否透明
}

void _TPrint(int x, int y, const char *ss) {  // 在指定位置打印字串
  u8g2.drawStr(x, y, ss);  // 在指定位置繪製字串
}

void _TextPrint(int x, int y, const char *ss, const uint8_t *font_8x8) {  // 在指定位置打印字串，並設定字體
  u8g2.setFont(font_8x8);  // 設定字體
  u8g2.drawStr(x, y, ss);  // 在指定位置繪製字串
}

void _UTF8Print(int x, int y, const char *ss, const uint88t *font_8x8) {  // 在指定位置打印UTF-8字串
  u8g2.setFont(font_8x8);  // 設定字體
  u8g2.drawStr(x, y, ss);  // 在指定位置繪製字串
}

void _Print(const char *ss) {  // 不指定位置打印字串
  u8g2.print(ss);  // 打印字串
}
