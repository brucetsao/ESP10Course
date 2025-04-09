#define Led_Green_Pin 2   // 定義綠色LED的接腳
#define Led_Red_Pin 4     // 定義紅色LED的接腳
/*
這段程式碼利用Arduino控制兩個LED的點亮和熄滅。
setup()函式設定LED的接腳模式為輸出，
並將它們初始化為關閉狀態。
loop()函式在一個循環中按順序控制LED的點亮和熄滅，
並在不同階段加入延遲，以創建預定的點燈模式。
這個模式的操作順序是綠色LED亮3秒、
熄滅3秒，紅色LED亮3秒、熄滅3秒，
然後兩個LED一起亮3秒、一起熄滅3秒。


*/
// setup函式在按下重置或通電時執行一次
void setup() {
  // 初始化接腳模式為輸出
  pinMode(Led_Red_Pin, OUTPUT);  // 將紅色LED接腳設定為輸出
  pinMode(Led_Green_Pin, OUTPUT);  // 將綠色LED接腳設定為輸出

  // 設定LED的初始狀態為關閉
  digitalWrite(Led_Red_Pin, LOW);  // 將紅色LED設定為低電位，關閉LED
  digitalWrite(Led_Green_Pin, LOW);  // 將綠色LED設定為低電位，關閉LED
}

// loop函式會不斷重複執行
void loop() {
  // 開啟綠色LED
  digitalWrite(Led_Green_Pin, HIGH);  // 設定綠色LED為高電位，LED亮起
  delay(3000);  // 暫停3秒
  
  // 關閉綠色LED
  digitalWrite(Led_Green_Pin, LOW);  // 設定綠色LED為低電位，LED熄滅
  delay(3000);  // 再次暫停3秒
  
  // 開啟紅色LED
  digitalWrite(Led_Red_Pin, HIGH);  // 設定紅色LED為高電位，LED亮起
  delay(3000);  // 暫停3秒
  
  // 關閉紅色LED
  digitalWrite(Led_Red_Pin, LOW);  // 設定紅色LED為低電位，LED熄滅
  delay(3000);  // 再次暫停3秒
  
  // 同時開啟紅色和綠色LED
  digitalWrite(Led_Green_Pin, HIGH);  // 開啟綠色LED
  digitalWrite(Led_Red_Pin, HIGH);  // 開啟紅色LED
  delay(3000);  // 暫停3秒
  
  // 關閉紅色和綠色LED
  digitalWrite(Led_Green_Pin, LOW);  // 關閉綠色LED
  digitalWrite(Led_Red_Pin, LOW);  // 關閉紅色LED
  delay(3000);  // 再次暫停3秒
}
