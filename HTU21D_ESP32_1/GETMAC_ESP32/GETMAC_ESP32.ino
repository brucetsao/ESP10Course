#include "initPins.h"  // 引入自訂的系統腳位函式庫
/*
這段程式碼主要做了系統初始化、
串列通訊設定、
並在串列埠中印出系統啟動訊息和網路卡的MAC地址。
在 setup() 中，
調用了 initAll() 進行初始化，
然後調用了 ShowMAC() 來印出MAC地址。
loop() 函式是Arduino主循環函式，
目前沒有特定操作。initAll() 函式中，
設定了串列通訊的波特率，
並印出了系統啟動訊息，
同時使用 GetMacAddress() 取得了網路卡的MAC地址。
*/
void setup() 
{
  initAll();  // 系統初始化
  delay(2000);
 MacData = GetInterfaceMacAddress();  // 取得網路卡的MAC地址
 ShowMAC();  // 在串列埠中印出網路卡的MAC地址
  Serial.println("End of setup() ") ;
}

void loop() 
{
  MacData = GetInterfaceMacAddress();  // 取得網路卡的MAC地址
  ShowMAC();  // 在串列埠中印出網路卡的MAC地址
  delay(5000) ;
}

void initAll() 
{
  Serial.begin(9600);  // 初始化串列通訊，設定波特率為9600 bps
  Serial.println();  // 空行
  Serial.println("System Start");  // 在串列監視器中印出 "System Start"
}
