/***************************************************************************
  這是用於BMP280溫度、壓力和濕度感測器的函式庫

  特別設計用於Adafruit的BMEP280 Breakout
  ----> http://www.adafruit.com/products/2651

  這些感測器使用I2C或SPI通訊，介面需要2或4個接腳。

  Adafruit致力於提供開源程式碼，
  請支持Adafruit和開源硬體，購買Adafruit的產品！

  由Limor Fried和Kevin Townsend為Adafruit Industries所撰寫。
  BSD授權，以上所有文字必須包含在任何重新分發中。
 ***************************************************************************/

#include <Wire.h>  // 引入I2C通訊函式庫
#include <SPI.h>   // 引入SPI通訊函式庫
#include <Adafruit_Sensor.h>  // 引入Adafruit感測器函式庫
#include <Adafruit_BMP280.h>  // 引入Adafruit BMP280函式庫

// 定義SPI接腳
#define BMP_SCK 13   // SPI時鐘
#define BMP_MISO 12  // SPI輸入
#define BMP_MOSI 11  // SPI輸出
#define BMP_CS 10    // SPI片選接腳

Adafruit_BMP280 bme; // 宣告BMP280感測器物件，使用I2C
// 如果使用硬體SPI，將註解解除
//Adafruit_BMP280 bme(BMP_CS); // 使用硬體SPI
//Adafruit_BMP280 bme(BMP_CS, BMP_MOSI, BMP_MISO, BMP_SCK);  // 手動設定SPI接腳
 /*
 這段程式碼示範了如何使用Adafruit的BMP280感測器來讀取溫度和壓力。
 感測器可以通過I2C或SPI介面連接。
 在 setup 函式中，
 程式檢查感測器是否正確連接，
 如果未找到，程式將停止執行。
 在 loop 函式中，
 每2秒讀取一次溫度和壓力，
 並將結果輸出到串列監視器。
 
  
*/  
void setup() {
  Serial.begin(9600);  // 初始化串列通訊，設置波特率為9600
  Serial.println(F("BMP280 test"));  // 輸出測試訊息
  
  if (!bme.begin()) {  
    // 檢查感測器是否正確連接
    Serial.println("Could not find a valid BMP280 sensor, check wiring!");  
    while (1);  // 若感測器未找到，進入無窮迴圈停止程式執行
  }
}
  
void loop() {
    Serial.print("Temperature = ");  // 輸出溫度標籤
    Serial.print(bme.readTemperature());  // 讀取並輸出溫度
    Serial.println(" *C");  // 溫度單位為攝氏度
    
    Serial.print("Pressure = ");  // 輸出壓力標籤
    Serial.print(bme.readPressure());  // 讀取並輸出壓力
    Serial.println(" Pa");  // 壓力單位為帕斯卡

    // 如果需要，可以解除以下註解以測量近似高度
    //Serial.print("Approx altitude = ");  
    //Serial.print(bme.readAltitude(1013.25));  // 根據當地壓力預測高度
    //Serial.println(" m");  // 高度單位為公尺
    
    Serial.println();  // 輸出空行，方便閱讀
    delay(2000);  // 延遲2秒
}
