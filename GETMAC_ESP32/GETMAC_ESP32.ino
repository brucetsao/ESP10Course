#include "initPins.h" //自訂系統腳位函式庫



void setup() 
{
  initAll() ;    //系統初始化
  ShowMAC() ; //於串列埠印出網路卡號

}

void loop() 
{

}

void initAll()
{

  Serial.begin(9600); //通訊控制埠 初始化，並設為9600 bps
  Serial.println();
  Serial.println("System Start"); //印出 "System Start"
  MacData = GetMacAddress() ;    //取得網路卡編號

}
