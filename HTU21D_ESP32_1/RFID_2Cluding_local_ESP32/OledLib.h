#include <Arduino.h>
#include <U8g2lib.h>
#include <SPI.h>
#include <Wire.h>

// Library documentation: https://www.arduinolibraries.info/libraries/u8g2

//--------------------
void _update();   // Update the display
void _updateBuffer();   // Update the graphical memory content to the screen
void _setI2CAddress(int adr);   // Set the I2C address of the display
void _initDisplay();   // Function required to begin the display
void initOLED();   // Activate the OLED display
void _setCursor(int x, int y);   // Set the current cursor position
void _setDrawColor(int color);   // Set the current drawing color
int _getWidth();   // Get the width of the screen
int _getHeight();  // Get the height of the screen
int _getMaxCharWidth();  // Get the maximum width of characters
int _getMaxCharHeight(); // Get the maximum height of characters
int _getCharWidth(); // Get the width of the current character
int _getUTF8Width(); // Get the width of the current UTF-8 character
void _clearDisplay();  // Clear the display
void _setContrast(int t);    // Set the contrast of the display
void _clearOled(); // Clear the OLED display
void _clearBuffer();   // Clear the previously drawn graphics
void _Box(int x, int y, int w,int h);  // Draw a rectangle
void _Circle(int x, int y, int r);   // Draw a circle
void _Ellipse(int x, int y, int rx,int ry);    // Draw an ellipse
void _FilledEllipse(int x, int y, int rx,int ry);    // Draw a filled ellipse
void _Triangle(int x1, int y1, int x2, int y2,int x3, int y3);   // Draw a triangle
void _HLine(int x, int y, int l);  // Draw a horizontal line
void _VLine(int x, int y, int l);    // Draw a vertical line
void _Line(int x1, int y1, int x2, int y2);    // Draw a line
void _Point(int x, int y);   // Draw a point
void _setFont(const uint8_t *font_8x8);    // Set the font
void _setFontDirection(int dir);     // Set the font direction
void _setFontMode(int is_transparent);   // Set the font transparency mode
void _TPrint(int x, int y,  const char *ss);   // Print text at a specified position
void _TextPrint(int x, int y,  const char *ss, const uint8_t *font_8x8);   // Print text at a specified position with a specified font
void _UTF8Print(int x, int y,  const char *ss, const uint8_t *font_8x8);   // Print UTF-8 encoded text at a specified position with a specified font
void _Print(const char *ss);   // Print text without specifying position

//--------------
// All font documentation reference URL: https://github.com/olikraus/u8g2/wiki/u8g2reference

U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0); 

void _update()
{
  u8g2.updateDisplay();
}

void _updateBuffer()
{
  u8g2.sendBuffer();
}

void _setI2CAddress(int adr)
{
  u8g2.setI2CAddress(adr);
}

void _initDisplay()
{
  u8g2.initDisplay();
}

void initOLED()   // Activate the OLED display
{
    if (!u8g2.begin())   // If the OLED display failed to initialize
    {
      Serial.println("Couldn't find OLED!");    // Print "Couldn't find sensor!"
      // Unable to find the OLED display
      while (1);  // Stay here forever
    }
     Serial.println("init OLED successful!");
}

void _setCursor(int x, int y)
{
   u8g2.setCursor(x,y);  
}

void _setDrawColor(int color)
{
   u8g2.setDrawColor(color);  
}

int _getWidth()
{
   return u8g2.getDisplayWidth();  
}

int _getHeight()
{
   return u8g2.getDisplayHeight();  
}

int _getMaxCharWidth()
{
   return u8g2.getMaxCharWidth();  
}

int _getMaxCharHeight()
{
   return u8g2.getMaxCharHeight();  
}

int _getCharWidth()
{
   return u8g2.getStrWidth(" ");  
}

int _getUTF8Width()
{
   return u8g2.getUTF8Width(" ");  
}

void _clearDisplay()
{
  u8g2.clearDisplay();        
  u8g2.sendBuffer();         // Transfer internal memory to the display
}

void _setContrast(int t)
{
  u8g2.setContrast(t);         // Adjust the contrast of the display
}

void _clearOled()
{
  u8g2.clear();         
  u8g2.sendBuffer();         // Transfer internal memory to the display
}

void _clearBuffer()
{
  u8g2.clearBuffer();         
  u8g2.sendBuffer();  // Use sendBuffer to transfer the cleared frame buffer to the display
}

void _Box(int x, int y, int w,int h)
{
  u8g2.drawBox(x,y,w,h);        
}

void _Circle(int x, int y, int r)
{
  u8g2.drawCircle(x,y,r,U8G2_DRAW_ALL);        
}

void _Ellipse(int x, int y, int rx,int ry)
{
  u8g2.drawEllipse(x,y,rx,ry,U8G2_DRAW_ALL);        
}

void _FilledEllipse(int x, int y, int rx,int ry)
{
  u8g2.drawFilledEllipse(x,y,rx,ry,U8G2_DRAW_ALL);  
}

void _Triangle(int x1, int y1, int x2, int y2,int x3, int y3)
{
  u8g2.drawTriangle(x1,y1,x2,y2,x3,y3);        
}

void _HLine(int x, int y, int l)
{
  u8g2.drawHLine(x,y,l);        
}

void _VLine(int x, int y, int l)
{
  u8g2.drawVLine(x,y,l);        
}

void _Line(int x1, int y1, int x2, int y2)
{
  u8g2.drawLine(x1,y1,x2,y2);        
}

void _Point(int x, int y)
{
  u8g2.drawPixel(x,y);        
}

void _setFont(const uint8_t *font_8x8)
{
   u8g2.setFont(font_8x8);  
}

void _setFontDirection(int dir)
{
   u8g2.setFontDirection(dir);  
}

void _setFontMode(int is_transparent)
{
   u8g2.setFontMode(is_transparent);  
}

void _TPrint(int x, int y,  const char *ss)
{
  u8g2.drawStr(x,y,ss);        
}

void _TextPrint(int x, int y,  const char *ss, const uint8_t *font_8x8)
{
   u8g2.setFont(font_8x8);  
  u8g2.drawStr(x,y,ss);        
}

void _UTF8Print(int x, int y,  const char *ss, const uint8_t *font_8x8)
{
   u8g2.setFont(font_8x8);  
  u8g2.drawStr(x,y,ss);        
}

void _Print(const char *ss)
{
  u8g2.print(ss);        
}
