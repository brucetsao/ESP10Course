#include <String.h>
String imgURL ;
char URLbuffer[200] ;

String WebURL = "http://ncnu.arduino.org.tw:9999/images/" ;
String tempimg = "temp.jpg" ;
String tempunitimg = "degree.jpg" ;
String humidimg = "humid.jpg" ;
String humidunitimg = "humid.jpg" ;
const char* img = "<img src='%s%s'>" ;
String num[] = {"0.jpg","1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg"}  ;
String point = "point.jpg" ;



String ImgURL(String cc)
{
      sprintf(URLbuffer,img,WebURL.c_str(),cc.c_str() );
      Serial.println(URLbuffer) ;
      return String(URLbuffer) ;
}

String Number2Image(String nn)
{
    String s1, tmp;
    int pos;
    tmp = "" ;
    int len = nn.length();
    Serial.print("Length:");
    Serial.print(len);
    Serial.print("\n");
    
    for (int i = 0 ; i < len; i++)
      {
          s1 = nn.substring(i,i+1) ;
          Serial.print("Char :");
          Serial.print(i);
          Serial.print("/");
          Serial.print(s1);
          Serial.print("\n");

          if (s1 != ".")
            {
             Serial.println("Is Number") ;
             pos = s1.toInt() ;
            Serial.print("POS :");
          Serial.print(pos);
          Serial.print("\n");
              tmp = tmp + ImgURL(num[s1.toInt()]) ;
             Serial.println(ImgURL(num[pos])) ;
            }
            else
            {
             Serial.println("Is DOT") ;
               tmp = tmp +  ImgURL(point) ; 
            }
      }
  return tmp ; 
}
