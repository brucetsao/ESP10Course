// int LedPin = 15;
#define LedPin 15
//  define宣告  LedPin  接為 15

// the setup function runs once when you press reset or power the board
void setup() //程式 起始區
{
  // initialize digital pin LED_BUILTIN as an output.
  pinMode(LedPin, OUTPUT);    
  //宣告腳位模式：pinMode（腳位 , 模式）;
  // 設計腳位狀態，設定LedPin(15)為輸出狀態(OUTPUT)
  //設定腳位預設值
    digitalWrite(LedPin, LOW);    // turn the LED off by making the voltage LOW
     //數位寫入：digitalWrite（腳位 , 電位）
}

// the loop function runs over and over again forever
void loop()     //程式 重複區
{
  digitalWrite(LedPin, HIGH);   // turn the LED on (HIGH is the voltage level)
  //數位寫入：digitalWrite（腳位 , 電位）
  //設定LedPin(15) 腳位狀態 為高電位==>電量燈泡
  delay(5000);                       // wait for a second
  //延遲5000單位==>1000單位==1秒鐘，所以延遲5秒鐘
  digitalWrite(LedPin, LOW);    // turn the LED off by making the voltage LOW
     //數位寫入：digitalWrite（腳位 , 電位）
   //設定LedPin(15) 腳位狀態 為低電位==>關閉電量燈泡
  delay(5000);                       // wait for a second
   //延遲5000單位==>1000單位==1秒鐘，所以延遲5秒鐘
}
