#define AccessLed 15
#define ledon HIGH    //定義燈亮狀態
#define ledoff LOW    //定義燈滅狀態


//---- 宣告函式區
void initPinMode() ;
void TurnOnAccessLed();
void TurnOffAccessLed() ;




void initPinMode()  //初始化腳位
{
  pinMode(AccessLed,OUTPUT) ;//設accessLed燈為輸出燈號
  TurnOffAccessLed() ;
  
}

void TurnOnAccessLed()  //打開accessLED燈
{
  digitalWrite(AccessLed,ledon) ;
}
void TurnOffAccessLed() //熄滅accessLED燈
{
  digitalWrite(AccessLed,ledoff)
}
