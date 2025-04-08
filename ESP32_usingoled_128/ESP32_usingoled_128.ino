#include "OledLib.h"  // 引入Oled LCD 128x32函式庫，用於控制OLED顯示器
/*
這段程式碼使用自定義的 OledLib.h 函式庫控制128x32 OLED顯示模組。
在 setup() 函式中，
進行了系統初始化和OLED顯示器的啟動。
在 loop() 函式中，程式先清除緩衝區，
設定字體，
然後在OLED上特定位置顯示字串 "Hi Bruce"。
接著更新緩衝區以反映變更，並延遲3秒。
initALL() 函式用於初始化系統並顯示系統啟動訊息。


*/
void setup(void) {
  initALL();  // 系統硬體和軟體初始化
  initOLED();  // 啟動OLED 128x32顯示模組
}

void loop(void) {
  _clearBuffer();  // 清除內部緩衝區，準備繪製新內容
  _setFont(u8g2_font_logisoso16_tf);  // 設定字體
  _TPrint(8, 29, "Hi Bruce");  // 在指定位置輸出字串"Hi Bruce"
  _updateBuffer();  // 更新緩衝區，將內容發送到OLED顯示器
  delay(3000);  // 延遲3秒
}

void initALL() {
  Serial.begin(9600);  // 初始化串列通訊，設定波特率為9600
  Serial.println("System Start");  // 輸出"System Start"表示系統啟動
}
