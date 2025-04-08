#define Led_Green_Pin 2   // 定義綠色LED的接腳號碼
#define Led_Red_Pin 4     // 定義紅色LED的接腳號碼
/*
這個程式碼使用了兩個LED接腳，
分別是綠色和紅色。
setup()函式用於初始化LED接腳為輸出模式並將它們設定為低電位（關閉）。
loop()函式在每個循環中執行一個預定的LED點亮和熄滅序列，
模擬一種簡單的LED閃爍模式。
程式包含了相應的延遲，
以確保LED在高低電位之間的切換間隔。

*/
// setup函式在按下重置或通電時執行一次
void setup() {
  // 初始化接腳模式為輸出
  pinMode(Led_Red_Pin, OUTPUT);  // 將紅色LED設為輸出模式
  pinMode(Led_Green_Pin, OUTPUT);  // 將綠色LED設為輸出模式
  
  // 初始化LED為關閉狀態（低電位）
  digitalWrite(Led_Red_Pin, LOW);  // 關閉紅色LED
  digitalWrite(Led_Green_Pin, LOW);  // 關閉綠色LED
}

// loop函式會無限循環執行
void loop() {
  // 開啟綠色LED
  digitalWrite(Led_Green_Pin, HIGH);  // 設定綠色LED為高電位，LED亮起
  delay(3000);  // 暫停3秒
  
  // 關閉綠色LED
  digitalWrite(Led_Green_Pin, LOW);  // 設定綠色LED為低電位，LED熄滅
  delay(3000);  // 暫停3秒
  
  // 開啟紅色LED
  digitalWrite(Led_Red_Pin, HIGH);  // 設定紅色LED為高電位，LED亮起
  delay(3000);  // 暫停3秒
  
  // 關閉紅色LED
  digitalWrite(Led_Red_Pin, LOW);  // 設定紅色LED為低電位，LED熄滅
  delay(3000);  // 暫停3秒
  
  // 同時開啟紅色和綠色LED
  digitalWrite(Led_Green_Pin, HIGH);  // 開啟綠色LED
  digitalWrite(Led_Red_Pin, HIGH);  // 開啟紅色LED
  delay(3000);  // 暫停3秒
  
  // 關閉所有LED
  digitalWrite(Led_Green_Pin, LOW);  // 關閉綠色LED
  digitalWrite(Led_Red_Pin, LOW);  // 關閉紅色LED
  delay(3000);  // 暫停3秒
}
