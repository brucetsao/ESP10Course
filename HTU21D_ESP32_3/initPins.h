#define wifiLedPin 2  //wifi Led Indicator
#define accessLedPin 15 //Access Led Indicator
#define beepPin 4   //Beep Buzzer
#define Ledon HIGH    //Led 開啟狀態變數
#define Ledoff  LOW    //Led 關閉狀態變數  
#define debug 1     //0->不顯示debug，1->顯示debug
#define debugmsgbaud 9600   //debug 訊息傳送速率


//主板燈號腳位設定


//-----------函數宣告區
void initDebugmsg() ; //啟動debug訊息輸出 
void TurnonWifiLed() ; //開啟WIFI燈號
void TurnoffWifiLed() ; //關閉WIFI燈號
void TurnonAccessLed() ; //開啟access燈號
void TurnoffAccessLed() ; //關閉access燈號
void TurnonBeep() ; //開啟Beep Buzzer 聲音 
void TurnoffBeep() ; //關閉Beep Buzzer 聲音
//-----------函數宣告區

void initDebugmsg() //啟動debug訊息輸出 
{
    Serial.begin(debugmsgbaud) ;
    //啟動debug訊息輸出 
}


void initIndicator()  //宣告指示燈號腳位狀態
{
    pinMode(wifiLedPin,OUTPUT) ;  //wifi LED 為輸出燈號
    pinMode(accessLedPin,OUTPUT) ;  //Access Led Indicator 為輸出燈號
    pinMode(beepPin,OUTPUT) ;  //Beep Buzzer 為輸出訊號
}

void TurnonWifiLed()  //開啟WIFI燈號
{
    digitalWrite(wifiLedPin,Ledon) ;
    //開啟燈號
}
void TurnoffWifiLed()  //關閉WIFI燈號
{
    digitalWrite(wifiLedPin,Ledoff) ;
    //關閉燈號
}


void TurnonAccessLed()  //開啟access燈號
{
    digitalWrite(accessLedPin,Ledoff) ;
    //開啟燈號
}
void TurnoffAccessLed()  //關閉access燈號
{
    digitalWrite(accessLedPin,Ledon) ;
    //關閉燈號
}

void TurnonBeep()  //開啟Beep Buzzer 聲音
{
    digitalWrite(beepPin,Ledoff) ;
    //開啟Beep Buzzer 聲音
}
void TurnoffBeep()  //關閉Beep Buzzer 聲音
{
    digitalWrite(beepPin,Ledon) ;
    //關閉Beep Buzzer 聲音
}
