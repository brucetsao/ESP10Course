#include <U8g2lib.h>
#include <SPI.h>
#include <Wire.h>

U8G2_SSD1306_128X32_UNIVISION_F_HW_I2C u8g2(U8G2_R0); 


void initOLED()   //啟動OLED  顯示器
{
    if (!u8g2.begin())   //如果 OLED  顯示器沒有啟動成功
    {
      Serial.println("Couldn't find OLED!");    //印出 "Couldn't find sensor!"
      //找不到 OLED  顯示器
      while (1);  //永遠死在這
    }
}

void clearOled()
{
  u8g2.clearBuffer();         // clear the internal memory
  u8g2.sendBuffer();         // transfer internal memory to the display
}
