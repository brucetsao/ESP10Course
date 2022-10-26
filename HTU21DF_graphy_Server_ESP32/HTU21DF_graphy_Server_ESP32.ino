#include "initPins.h"     // 腳位與系統模組
#include "HTU21DLib.h"    // 溫溼度專用模組
#include "HTMLimage.h"    // 溫溼度專用模組


void setup() 
{
    initALL() ; //系統硬體/軟體初始化
    initWiFi() ;  //網路連線，連上熱點
    ShowInternet();  //秀出網路連線資訊
    server.begin(80); //啟動網頁伺服器
     delay(1000) ;    //停1秒
     Serial.println("Home System Start");
}

void loop() 
{
    

    //--------------------
  WiFiClient client = server.available();   // 網頁伺服器 listen Port 有人來連線嘞，for incoming clients
  //宣告一個網路連線socket: client，來接受網頁伺服器 listen Port 來連線的人
  if (client)   //有一個人(>0)
  { 
    // if you get a client,
    ReadSensor()  ;

    Serial.println("New Client.");           // 有人來嘞，print a message out the serial port
    String currentLine = "";                // make a String to hold incoming data from the client
    while (client.connected())
    { // loop while the client's connected
      if (client.available())
      { // if there's bytes to read from the client,
        char c = client.read();             // read a byte, then
        Serial.write(c);                    // print it out the serial monitor
        if (c == '\n')
        { // if the byte is a newline character

          // if the current line is blank, you got two newline characters in a row.
          // that's the end of the client HTTP request, so send a response:
          if (currentLine.length() == 0)
          {
            // HTTP headers always start with a response code (e.g. HTTP/1.1 200 OK)
            // and a content-type so the client knows what's coming, then a blank line:
            client.println("HTTP/1.1 200 OK");
            client.println("Content-type:text/html");
            client.println();
            /*
            // the content of the HTTP response follows the header:
            client.print("Temperature : ");
            client.print(String(Temp_Value));
            client.print("<br>");   
            client.print("Humidity : ");
            client.print(String(Humid_Value));
            client.print("<br>");                         
            */
            client.print(GetTempwithHTML()) ;
            client.print("<br>") ;
            client.print(GetHumidwithHTML()) ;
            Serial.println(GetTempwithHTML());
            Serial.println(GetHumidwithHTML());
                
        
            // The HTTP response ends with another blank line:
            client.println();
            // break out of the while loop:
            break;
          }   // end of if (currentLine.length() == 0)
          else
          { // if you got a newline, then clear currentLine:
            currentLine = "";
          }   // end of if (currentLine.length() == 0)
        } // end of if (c == '\n')
        else if (c != '\r')
        { // if you got anything else but a carriage return character,
          currentLine += c;      // add it to the end of the currentLine
        }   // end of else if (c != '\r')

        // Check to see if the client request was "GET /H" or "GET /L":

      } // end of  if (client.available())
    }   // end of while (client.connected())
    // close the connection:
    client.stop();
    Serial.println("Client Disconnected.");
  }   // end of  if (client)

    //------------------
   delay(100) ;
}

void initALL()  //系統硬體/軟體初始化
{
    Serial.begin(9600);
    Serial.println("System Start");
    initHTU21D();   //啟動HTU21D 溫溼度感測器
}

void ReadSensor()
{
      Temp_Value = ReadTemperature(); //讀取HTU21D 溫溼度感測器之溫度
    Humid_Value= ReadHumidity(); //讀取HTU21D 溫溼度感測器之溼度
    Serial.print("Temp: ");               //印出 "Temp: "
    Serial.print(Temp_Value);                   //印出 temp變數內容
    Serial.print(" C");                   //印出 " C"  
    Serial.print("\t\t");                 //印出 "\t\t"
    Serial.print("Humidity: ");           //印出 "Humidity: "
    Serial.print(Humid_Value);                //印出 rel_hum變數內容
    Serial.println(" \%");                //印出 " \%"


}
