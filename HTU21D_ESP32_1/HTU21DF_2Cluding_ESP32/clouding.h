//http://iot.arduino.org.tw:8888/bigdata/dhtdata/dhDatatadd.php?MAC=112233445566&T=65.1&H=76
char iotserver[] = "iot.arduino.org.tw";    // name address for Google (using DNS)
  // NCNU Clouding Server DNS name
int iotport = 8888 ;
// nuk.arduino.org.tw Clouding Server port : 8888
// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):


String strGet="GET /bigdata/dhtdata/dhDatatadd.php";
//  DB Agent 程式
String strHttp=" HTTP/1.1";   // Web  Socketing Header 
String strHost="Host: iot.arduino.org.tw";  // Web  Socketing Header 
 String connectstr ;    //組成 Ｒｅｓｔｆｕｌ　Ｃｏｍｍｕｎｉｃａｔｉｏｎ　Ｓｔｒｉｎｇ變數
//http://iot.arduino.org.tw:8888/bigdata/dhtdata/dhDatatadd.php?MAC=112233445566&T=65.1&H=76
// host is  ==>nuk.arduino.org.tw:8888
//  app program is ==> bigdata/dhtdata/dhDatatadd.php
//  App parameters ==> ?MAC=AABBCCDDEEFF&T=34&H=34
//http://iot.arduino.org.tw:8888/bigdata/dhtdata/dhDatatadd.php?MAC=112233445566&T=65.1&H=76

void SendtoClouding()     //傳送感測資料到雲端
{
//http://iot.arduino.org.tw:8888/bigdata/dhtdata/dhDatatadd.php?MAC=AABBCCDDEEFF&T=34&H=34
// host is  ==>iot.arduino.org.tw:8888
//  app program is ==> bigdata/dhtdata/dhDatatadd.php
//  App parameters ==> ?MAC=AABBCCDDEEFF&T=34&H=34
          connectstr = "?MAC="+MacData+"&T="+String(Tvalue)+"&H="+String(Hvalue);
          //組成GET Format 的Resetful  的 Parameters 字串
         Serial.println(connectstr) ;
         if (client.connect(iotserver, iotport)) //  client.connect(iotserver, iotport)＝＝＞連線到雲端主機
         {
                 Serial.println("Make a HTTP request ... ");
                 //### Send to Server
                 String strHttpGet = strGet + connectstr + strHttp;
                 Serial.println(strHttpGet);    //　傳送通訊ｈｅａｄｅｒ
                  //傳送那段REST Ful API字串到雲端---start ----
                 client.println(strHttpGet);    //　傳送通訊ｈｅａｄｅｒ
                 client.println(strHost);       //　結尾
                 client.println();     //　通訊結束
                 //傳送那段REST Ful API字串到雲端---end---
               } 
    
if (client.connected()) 
{ 
  client.stop();  // DISCONNECT FROM THE SERVER
}

    
}
 
