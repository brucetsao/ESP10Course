#include <String.h>
String HTMLStr ;
char HTMLbuffer[2000] ;
const char* fullHTML = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><meta http-equiv='refresh' content='%d' /><title>%s</title></head><body>%s</body></html>" ;
String PageTitle = "溫溼度家居系統" ;
int refreshtime = 1 ;

String TranHTML(String titlestr, String bodystr, int t)
{
      sprintf(HTMLbuffer,fullHTML,t,titlestr.c_str(),bodystr.c_str() );
    //  Serial.println(URLbuffer) ;
      return String(HTMLbuffer) ;
}
