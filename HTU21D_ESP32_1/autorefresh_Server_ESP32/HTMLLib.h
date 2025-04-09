#include <String.h>  // 引入字串操作函式庫
String HTMLStr;  // 宣告一個字串變數，用於存放HTML內容
char URLbuffer[1000];  // 宣告一個字元陣列，用於儲存格式化的HTML
const char* fullHTML = "<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><meta http-equiv='refresh' content='%d' /><title>%s</title></head><body>%s</body></html>";  
// 定義HTML模板，包含編碼、網頁標題、刷新時間和網頁內容
String PageTitle = "溫溼度家居系統";  // 預設的網頁標題
int refreshtime = 1;  // 預設的網頁自動刷新時間（秒）
/*
這段程式碼提供了一個函式 TranHTML，
該函式用來生成完整的HTML內容，使
用給定的網頁標題、網頁內容和刷新時間。
主要透過sprintf將這些資訊格式化到預定義的HTML模板中，
並將結果存儲在URLbuffer中。
生成的HTML可以用於回應網頁請求，
尤其是在Arduino構建的網頁伺服器中


*/


// 函式，用於生成完整的HTML內容
String TranHTML(String titlestr, String bodystr, int t)
{
  // 使用sprintf格式化HTML內容
  sprintf(URLbuffer, fullHTML, t, titlestr.c_str(), bodystr.c_str());
  // 將生成的HTML儲存在URLbuffer中
  // 返回格式化後的HTML字串
  return String(URLbuffer);
}
