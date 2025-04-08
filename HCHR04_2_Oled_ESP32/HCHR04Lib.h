// 超音波專用模組
#define trigPin 17  //發出聲波腳位(ESP32 GPIO17)
#define echoPin 16  //接收聲波腳位(ESP32 GPIO16)
unsigned long distancevalue =0 ;  //讀取距離的全域變數
char tmpvalue[100] ;
void printDistanceonOled(unsigned long h) ; //列印超音波感射器之距離度於OLED上

void initHCHR04() //初始化超音波感射器
{
      pinMode(trigPin, OUTPUT); 
}

unsigned long ReadDistance()  //讀取超音波感射器之距離
{ 
  digitalWrite(trigPin, HIGH); //啟動超音波
  delayMicroseconds(10);  //sustain at least 10us HIGH pulse
  digitalWrite(trigPin, LOW);  //關閉超音波
  return pulseIn(echoPin, HIGH); //計算傳回時間
 }

void printDistanceonOled(unsigned long h) //列印超音波感射器之距離度於OLED上
{
      sprintf(tmpvalue,"%d",h) ;
      Serial.print("Distance:");
      Serial.print(tmpvalue);
      Serial.print(" cm\n");
      
      _TPrint(1,31,"D:");
      _TPrint(45,31,tmpvalue);
      _TPrint(10,31,"cm");
}
