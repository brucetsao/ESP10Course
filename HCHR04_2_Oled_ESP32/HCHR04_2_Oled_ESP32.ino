// 引入必要的函式庫
#include "OledLib.h"  // OLED 顯示器的函式庫，用於 128x32 像素的 OLED
#include "HCHR04Lib.h"  // 超音波感測器的函式庫
/*
這個程式片段展示了如何用 Arduino 建立一個完整的系統，
使用超音波感測器來讀取距離，
並將結果顯示在 OLED 上。
setup() 函式進行了初始設定，
loop() 函式則包含主要的邏輯，
包括讀取距離、印在序列埠、
顯示在 OLED 上，以及更新緩衝區。
註解提供了每個部分的目的和使用方法。


*/
// 函式宣告
void initALL(); // 系統硬體和軟體的初始化函式

// Arduino 設定函式
void setup() 
{
    initALL();  // 執行系統初始化，包括硬體和軟體設定
   _clearBuffer();  // 清除 OLED 的緩衝區
   _setFont(u8g2_font_logisoso16_tf);  // 設定顯示器的字體為 Logisoso16
}

// Arduino 主循環函式
void loop() 
{
    // 讀取距離並儲存到變數
    distancevalue = ReadDistance();  // 使用超音波感測器讀取距離，並儲存到變數

    // 將距離資訊印到序列埠
    Serial.print("Distance: ");  // 在序列埠印出 "Distance: "
    Serial.print(distancevalue);  // 印出讀取到的距離
    Serial.print(" cm\n");  // 印出單位 " cm"，並換行

    // 清除 OLED 螢幕
    _clearOled();  // 清除 OLED 的畫面

    // 在 OLED 顯示器上顯示距離
    printDistanceonOled(distancevalue);  // 在 OLED 上顯示距離值

    // 更新 OLED 顯示器的內容
    _updateBuffer();  // 將緩衝區的內容傳送到 OLED 顯示器

    // 延遲 2 秒，避免太頻繁的更新
    delay(2000);  // 延遲 2 秒
}

// 系統硬體和軟體的初始化函式
void initALL() 
{
    // 初始化序列埠，用於與電腦通訊
    Serial.begin(9600);  // 設定序列埠傳輸速率為 9600 bps
    Serial.println("System Start");  // 在序列埠印出 "System Start"，表示系統啟動

    // 初始化超音波感測器
    initHCHR04();  // 設定超音波感測器的腳位和模式
    
    // 初始化 OLED 顯示器
    initOLED();  // 啟動 OLED 128x32 顯示模組
}
