#include "OledLib.h"  // Oled LCD 12832


void setup(void) {
  initALL();   //系統硬體/軟體初始化
  initOLED();  //啟動OLED 12832顯示模組
}

void loop(void) {

  _clearBuffer();                     //清除之前畫圖等記憶體
  _setFont(u8g2_font_logisoso16_tf);  //設定字形
  _TPrint(8, 29, "Hi Bruce");         // 指定位置輸出文字
  _updateBuffer();                    //更新圖型記憶體內容到畫面
  delay(3000);
}

void initALL() {
  Serial.begin(9600);
  Serial.println("System Start");
}
