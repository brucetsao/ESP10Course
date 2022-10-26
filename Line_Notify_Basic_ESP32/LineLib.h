#define LINE_TOKEN "LLrWcTrJEuJxKsLTBzcFEWI9j736aeDyoWulhIHinB4" 

#include <TridentTD_LineNotify.h>


char linemsg[250] ; 
/* Define the LineNotifyClient object */

void initLine()    //起始Line Notifier連線
{
      //------------line work
    LINE.setToken(LINE_TOKEN);
   
   //  client.token = LINE_TOKEN ;
      // 設定Line啟動，並給她我的Line金鑰
}
void SendMsgtoLine(String msgtxt)  //傳送資訊到Line Notifier
{
  // 請 Line版本 傳送資訊
  LINE.notify(msgtxt) ;
}

void SendURLtoLine(String msgtxt)  //傳送資訊到Line Notifier
{
  // 請 Line版本 傳送資訊
  LINE.notifyPicture(msgtxt) ;
}

void SendStickertoLine(String msgtxt,int PackageID, int StickerID )  //傳送資訊到Line Notifier
{
  //PackageID 3 , StickerID 240
  // 請 Line版本 傳送資訊
  LINE.notifySticker(msgtxt,PackageID,StickerID) ;
}
