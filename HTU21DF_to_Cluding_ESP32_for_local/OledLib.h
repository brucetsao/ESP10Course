#include <Arduino.h>  //引入Arduino核心程式庫，提供基本的Arduino功能支援。
#include <U8g2lib.h>  //引入U8g2庫，用於控制OLED顯示器（如SSD1306）。
#include <SPI.h>  //引入SPI通訊程式庫，支援SPI介面的硬體通訊。
#include <Wire.h> //引入I2C通訊程式庫，支援I2C介面的硬體通訊。
//https://www.arduinolibraries.info/libraries/u8g2
//--------------------
void _update();   //更新螢幕，更新圖形記憶體內容到螢幕，將緩衝區的資料傳送到顯示器。
void _updateBuffer();   //更新圖型記憶體內容到畫面
void _setI2CAddress(int adr);   //設定螢幕的I2C位址，用於指定與哪個I2C設備通訊。
void _initDisplay();   //begin()起始螢幕必用函數,初始化OLED顯示器，是啟動螢幕時必須呼叫的函數。
void initOLED();   //啟動OLED顯示器，並檢查是否成功啟動。
void _setCursor(int x, int y);   //設定目前文字游標的位置，指定後續文字顯示的起點。
void _setDrawColor(int color);   //設定目前的繪圖顏色，影響後續繪製圖形或文字的顯示效果。
int _getWidth();   //取得螢幕的寬度（以像素為單位）。
int _getHeight();  //取得螢幕的高度（以像素為單位）。
int _getMaxCharWidth();  //取得目前字形（字體）的最大寬度
int _getMaxCharHeight(); //取得目前字形的最大高度。
int _getCharWidth(); //取得目前字形的寬度（以空格字符為基準）
int _getUTF8Width(); //取得目前UTF-8字元的寬度（以空格字符為基準）。
void _clearDisplay();  //清除螢幕上的所有顯示內容。
void _setContrast(int t);    //設定螢幕的對比度。
void _clearOled(); //清除OLED螢幕的顯示內容。
void _clearBuffer();   //清除圖形緩衝區中的內容（不影響當前顯示，直到更新）。
void _Box(int x, int y, int w,int h);  //在指定位置繪製一個方形。
void _Circle(int x, int y, int r);  //在指定位置繪製一個圓形。
void _Ellipse(int x, int y, int rx,int ry);    //在指定位置繪製一個橢圓形。
void _FilledEllipse(int x, int y, int rx,int ry);    //在指定位置繪製一個填充的橢圓形
void _Triangle(int x1, int y1, int x2, int y2,int x3, int y3);   //繪製一個三角形。
void _HLine(int x, int y, int l);  //繪製一條水平線。
void _VLine(int x, int y, int l);    //繪製一條垂直線。
void _Line(int x1, int y1, int x2, int y2);    //繪製一條任意方向的直線
void _Point(int x, int y);   //在指定位置繪製一個像素點
void _setFont(const uint8_t *font_8x8);    //設定顯示文字時使用的字形（字體）。
void _setFontDirection(int dir);     //設定文字顯示的方向。
void _setFontMode(int is_transparent);   //設定文字的透明模式。
void _TPrint(int x, int y,  const char *ss);   // 在指定位置輸出文字。
void _TextPrint(int x, int y,  const char *ss, const uint8_t *font_8x8);   // 在指定位置使用指定字形輸出文字。
void _UTF8Print(int x, int y,  const char *ss, const uint8_t *font_8x8);   // 在指定位置使用指定字形輸出UTF-8編碼的文字。
void _Print(const char *ss);   // 不指定位置直接輸出文字（從當前游標位置開始）。
//--------------
// all font document ref URL:https://github.com/olikraus/u8g2/wiki/u8g2reference
U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0); 
//宣告一個U8g2物件u8g2，用於控制128x32像素的SSD1306 OLED顯示器，採用硬體I2C通訊，螢幕方向為0度（不旋轉）


void _update()   //更新螢幕，將目前的顯示內容刷新到OLED螢幕上。
{
  u8g2.updateDisplay();
  //呼叫u8g2.updateDisplay()，將記憶體中的顯示資料同步到螢幕
}
void _updateBuffer()////更新螢幕，更新圖形記憶體內容到螢幕，將緩衝區的資料傳送到顯示器。    
{
  u8g2.sendBuffer();
  //呼叫u8g2.sendBuffer()，將緩衝區中的圖形資料顯示出來。
}
void _setI2CAddress(int adr)//設定螢幕的I2C位址，用於指定與哪個I2C設備通訊。
{
  u8g2.setI2CAddress(adr);
  //呼叫u8g2.setI2CAddress(adr)，參數adr為目標I2C位址。
}
void _initDisplay() //初始化OLED顯示器，是啟動螢幕時必須呼叫的函數。
{
  u8g2.initDisplay();
  //呼叫u8g2.initDisplay()，進行顯示器的基本初始化。
}
void initOLED()   //啟動OLED顯示器，並檢查是否成功啟動。
{
    if (!u8g2.begin())   //如果 OLED  顯示器沒有啟動成功
    {
      Serial.println("Couldn't find OLED!");    //印出 "Couldn't find sensor!"
      //找不到 OLED  顯示器
      while (1);  //永遠死在這
    }
     Serial.println("init OLED successful!");//如果成功，列印「init OLED successful!」。
   // _initDisplay() ;
}
void _setCursor(int x, int y) //設定目前文字游標的位置，指定後續文字顯示的起點。
{
   u8g2.setCursor(x,y); 
   //呼叫u8g2.setCursor(x, y)，參數x和y為螢幕上的座標。 
}
void _setDrawColor(int color) //設定目前的繪圖顏色，影響後續繪製圖形或文字的顯示效果。
{
/*
Font Mode  Draw Color  Glyph Foreground Color  Glyph Background Color
呼叫u8g2.setDrawColor(color)，color值可為：
0：黑色。
1：白色。
2：XOR模式（異或運算，用於反轉顯示）。
 */
  
   u8g2.setDrawColor(color);  
}

int _getWidth()//取得螢幕的寬度（以像素為單位）。
{
   return u8g2.getDisplayWidth();  
   //呼叫u8g2.getDisplayWidth()，回傳螢幕寬度。
}
int _getHeight()//取得螢幕的高度（以像素為單位）。
{
   return u8g2.getDisplayHeight();  
   //呼叫u8g2.getDisplayHeight()，回傳螢幕高度。
}
int _getMaxCharWidth()  //取得目前字形（字體）的最大寬度
{
   return u8g2.getMaxCharWidth();  
   //呼叫u8g2.getMaxCharWidth()，回傳字形最大寬度。
}
int _getMaxCharHeight()//取得目前字形的最大高度。
{
   return u8g2.getMaxCharHeight();  
}
int _getCharWidth()//取得目前字形的寬度（以空格字符為基準
{
   return u8g2.getStrWidth(" ");  
   //呼叫u8g2.getMaxCharHeight()，回傳字形最大高度。
}

int _getUTF8Width() //取得目前字形的寬度（以空格字符為基準）
{
   return u8g2.getUTF8Width(" ");  
   //呼叫u8g2.getUTF8Width(" ")，回傳UTF-8字符寬度。
}
void _clearDisplay()//清除螢幕上的所有顯示內容。
{
  u8g2.clearDisplay();        
  u8g2.sendBuffer();         // transfer internal memory to the display
  //呼叫u8g2.clearDisplay()並使用u8g2.sendBuffer()更新顯示
}
void _setContrast(int t)//設定螢幕的對比度。
{
  u8g2.setContrast(t);         // transfer internal memory to the display
  //呼叫u8g2.setContrast(t)，參數t範圍通常為0到255，數值越大對比度越高
}
void _clearOled()//清除OLED螢幕的顯示內容。
{
  u8g2.clear();         
  u8g2.sendBuffer();         // transfer internal memory to the display
  //呼叫u8g2.clear()並使用u8g2.sendBuffer()更新。
}

void _clearBuffer()//清除圖形緩衝區中的內容（不影響當前顯示，直到更新）
{
  u8g2.clearBuffer();         
  u8g2.sendBuffer();  // Use sendBuffer to transfer the cleared frame buffer to the display.
  //呼叫u8g2.clearBuffer()並使用u8g2.sendBuffer()更新顯示。
 }

/*
void drawBitMap(int x, int y, int cnt,int h, static unsigned char bitmap)
{
  
//   x: X-position (left position of the bitmap).
//  y: Y-position (upper position of the bitmap).
//  cnt: Number of bytes of the bitmap in horizontal direction. The width of the bitmap is cnt*8.
//  h: Height of the bitmap.
//  bitmap: Pointer to the start of the bitmap.
   
  u8g2.drawBox(x,y,cnt,h,bitmap);        
 }
*/
void _Box(int x, int y, int w,int h)//在指定位置繪製一個方形。
{
  /*
    功能：在指定位置繪製一個方形。
    參數：
    x：方形左上角的X座標。
    y：方形左上角的Y座標。
    w：方形的寬度。
    h：方形的高度。
    實現：呼叫u8g2.drawBox(x, y, w, h)。
   */
  u8g2.drawBox(x,y,w,h);        
 }
void _Circle(int x, int y, int r)//在指定位置繪製一個圓形。
{
  /*
    功能：在指定位置繪製一個圓形。
    參數：
    x：圓心X座標。
    y：圓心Y座標。
    r：圓的半徑。
    實現：呼叫u8g2.drawCircle(x, y, r, U8G2_DRAW_ALL)，繪製完整圓形。
    .
   */
  u8g2.drawCircle(x,y,r,U8G2_DRAW_ALL);
  //呼叫u8g2.drawCircle(x, y, r, U8G2_DRAW_ALL)，繪製完整圓形。        
 }

void _Ellipse(int x, int y, int rx,int ry)//在指定位置繪製一個橢圓形
{
  /*
    功能：在指定位置繪製一個橢圓形。
    參數：
    x：橢圓中心X座標。
    y：橢圓中心Y座標。
    rx：橢圓X方向的半徑。
    ry：橢圓Y方向的半徑。
    實現：呼叫u8g2.drawEllipse(x, y, rx, ry, U8G2_DRAW_ALL)，繪製完整橢圓。
    .
   */
  u8g2.drawEllipse(x,y,rx,ry,U8G2_DRAW_ALL);    
  //呼叫u8g2.drawEllipse(x, y, rx, ry, U8G2_DRAW_ALL)，繪製完整橢圓。    
 }

void _FilledEllipse(int x, int y, int rx,int ry)//在指定位置繪製一個填充的橢圓形。
{
  /*
    功能：在指定位置繪製一個填充的橢圓形。
    參數：
    x：橢圓中心X座標。
    y：橢圓中心Y座標。
    rx：橢圓X方向的半徑。
    ry：橢圓Y方向的半徑。
    實現：呼叫u8g2.drawFilledEllipse(x, y, rx, ry, U8G2_DRAW_ALL)。
   */
  u8g2.drawFilledEllipse(x,y,rx,ry,U8G2_DRAW_ALL);  
  //呼叫u8g2.drawFilledEllipse(x, y, rx, ry, U8G2_DRAW_ALL)。
}
void _Triangle(int x1, int y1, int x2, int y2,int x3, int y3)//繪製一個三角形。
{
  //繪製一個三角形。
  /*
  功能：繪製一個三角形。
  參數：
  x1, y1：第一個頂點座標。
  x2, y2：第二個頂點座標。
  x3, y3：第三個頂點座標。
  實現：呼叫u8g2.drawTriangle(x1, y1, x2, y2, x3, y3)。
     */
  u8g2.drawTriangle(x1,y1,x2,y2,x3,y3); 
  //呼叫u8g2.drawTriangle(x1, y1, x2, y2, x3, y3)。       
 }
void _HLine(int x, int y, int l)//繪製一條水平線。
{
  /*
  功能：繪製一條水平線。
  參數：
  x：起點X座標。
  y：起點Y座標。
  l：線的長度。
  實現：呼叫u8g2.drawHLine(x, y, l)。
     */
  u8g2.drawHLine(x,y,l);  
  //呼叫u8g2.drawHLine(x, y, l)。      
 }
void _VLine(int x, int y, int l)//繪製一條垂直線。
{
  /*
    功能：繪製一條垂直線。
    參數：同上，l為垂直長度。
    實現：呼叫u8g2.drawVLine(x, y, l)。
       */
  u8g2.drawVLine(x,y,l); 
  //呼叫u8g2.drawHLine(x, y, l)。       
 }
void _Line(int x1, int y1, int x2, int y2)//繪製一條任意方向的直線。
{
  /*
  功能：繪製一條任意方向的直線。
  參數：
  x1, y1：起點座標。
  x2, y2：終點座標。
  實現：呼叫u8g2.drawLine(x1, y1, x2, y2)。
   */
  u8g2.drawLine(x1,y1,x2,y2);  
  //呼叫u8g2.drawLine(x1, y1, x2, y2)。      
 }

void _Point(int x, int y)//在指定位置繪製一個像素點。
{
  /*
  功能：在指定位置繪製一個像素點。
  參數：
  x：X座標。
  y：Y座標。
  實現：呼叫u8g2.drawPixel(x, y)。

   */
  u8g2.drawPixel(x,y);  
  //呼叫u8g2.drawPixel(x, y)。      
 }
void _setFont(const uint8_t *font_8x8)//設定顯示文字時使用的字形（字體）。
{
   u8g2.setFont(font_8x8);  
   //呼叫u8g2.setFont(font_8x8)，參數為字形資料指標。
}
void _setFontDirection(int dir)//設定文字顯示的方向
{
  /*
  功能：設定文字顯示的方向。
  參數：
  0：0度（左到右）。
  1：90度（上到下）。
  2：180度（右到左）。
  3：270度（下到上）。
  實現：呼叫u8g2.setFontDirection(dir)
*/
   u8g2.setFontDirection(dir);  
   //呼叫u8g2.setFontDirection(dir)。
}
void _setFontMode(int is_transparent)//設定文字的透明模式。
{
  /*
   功能：設定文字的透明模式。
    參數：
    0：不透明（實心背景）。
    1：透明（背景不繪製）。
    實現：呼叫u8g2.setFontMode(is_transparent)。
    */
   u8g2.setFontMode(is_transparent);  
   //呼叫u8g2.setFontMode(is_transparent)。
}

void _TPrint(int x, int y,  const char *ss)//在指定位置輸出文字。
{
  /*
  功能：在指定位置輸出文字。
  參數：
  x, y：文字起點座標。
  ss：要顯示的文字字串。
  實現：呼叫u8g2.drawStr(x, y, ss)。

   */
  u8g2.drawStr(x,y,ss);  
  //呼叫u8g2.drawStr(x, y, ss)      
 }

void _TextPrint(int x, int y,  const char *ss, const uint8_t *font_8x8)//在指定位置使用指定字形輸出文字。
{
  /*
  功能：在指定位置使用指定字形輸出文字。
  參數：同上，額外指定font_8x8字形。
  實現：先呼叫u8g2.setFont(font_8x8)設定字形，再呼叫u8g2.drawStr(x, y, ss)。

   */
   u8g2.setFont(font_8x8);
   //指定font_8x8字形  
  u8g2.drawStr(x,y,ss); 
  //呼叫u8g2.drawStr(x, y, ss)。
       
 }
void _UTF8Print(int x, int y,  const char *ss, const uint8_t *font_8x8)//在指定位置使用指定字形輸出UTF-8編碼的文字。
{
  /*
  功能：在指定位置使用指定字形輸出UTF-8編碼的文字。
  參數：同上，ss為UTF-8編碼字串。
  實現：與_TextPrint相同，假設字形支援UTF-8。
   */
   u8g2.setFont(font_8x8);  
      //指定font_8x8字形 
  u8g2.drawStr(x,y,ss);
  //呼叫u8g2.drawStr(x, y, ss)。        
 }

void _Print(const char *ss)//不指定位置直接輸出文字（從當前游標位置開始）。
{
  /*
  功能：不指定位置直接輸出文字（從當前游標位置開始）。
  參數：
  ss：要顯示的文字字串。
  實現：呼叫u8g2.print(ss)
   */

  u8g2.print(ss);     
  //呼叫u8g2.print(ss)   
 }
