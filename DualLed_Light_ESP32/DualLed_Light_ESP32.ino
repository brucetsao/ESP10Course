#define Led_Green_Pin 2   //設定雙色燈綠燈腳位
#define Led_Red_Pin 4     //設定雙色燈紅燈腳位


// the setup function runs once when you press reset or power the board
void setup() {
  // initialize digital pin Blink_Led_Pin as an output.
  pinMode(Led_Red_Pin, OUTPUT);    //定義Led_Red_Pin為輸出腳位
  pinMode(Led_Green_Pin, OUTPUT);    //定義Led_Green_Pin為輸出腳位
  digitalWrite(Led_Red_Pin,LOW) ;   //設定Led_Red_Pin為輸出低電位
  digitalWrite(Led_Green_Pin,LOW) ;   //設定Led_Green_Pin為輸出低電位

}

// the loop function runs over and over again forever
void loop() {
  digitalWrite(Led_Green_Pin, HIGH);    //設定Led_Green_Pin為輸出高低電位
  delay(3000);              //休息1秒 wait for a second  
  digitalWrite(Led_Green_Pin, LOW);   //設定Led_Red_Pin為輸出低電位
  delay(3000);              // 休息1秒 wait for a second
  digitalWrite(Led_Red_Pin, HIGH);    //設定Led_Red_Pin為輸出高電位
  delay(3000);              //休息1秒 wait for a second  
  digitalWrite(Led_Red_Pin, LOW);  //設定Led_Red_Pin為輸出低電位
  delay(3000);              // 休息1秒 wait for a second
  digitalWrite(Led_Green_Pin, HIGH);    //設定Led_Green_Pin為輸出低電位
  digitalWrite(Led_Red_Pin, HIGH);    //設定Led_Red_Pin為輸出高電位
  delay(3000);              //休息1秒 wait for a second  
  digitalWrite(Led_Green_Pin, LOW);   //設定Led_Green_Pin為輸出低電位
  digitalWrite(Led_Red_Pin, LOW); 
  delay(3000);              // 休息3秒 wait for a second
}
