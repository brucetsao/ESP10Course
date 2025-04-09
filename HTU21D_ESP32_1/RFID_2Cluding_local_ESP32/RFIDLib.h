#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN  5  // ESP32 pin GIOP5
#define RST_PIN 27 // ESP32 pin GIOP27

MFRC522 rfid(SS_PIN, RST_PIN); // 產生RFID感測器運作物件
char tmpvalue[100];    // 顯示OLED 文字暫存字元陣列
String RKey;    // 溫度儲存變數，濕度儲存變數

String CombineKey()
{
    String tmp;
    
    for (int i = 0; i < rfid.uid.size; i++) 
    {
        tmp.concat(print2HEX((int)rfid.uid.uidByte[i]));
    }
    tmp.toUpperCase();
    return tmp;
}

void initRFID()   // 啟動RFID感測器
{
    SPI.begin(); // 初始化 SPI 介面
    rfid.PCD_Init(); // 初始化 MFRC522

    Serial.println("Tap an RFID/NFC tag on the RFID-RC522 reader");
}

String ReadRFID() // 讀取RFID感測器之卡號
{
    String rkey;
    if (rfid.PICC_IsNewCardPresent())     // 判斷是否新卡
    { // new tag is available
        if (rfid.PICC_ReadCardSerial())     // 去讀卡
        { // NUID has been read
            MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);
            Serial.print("RFID/NFC Tag Type: ");
            Serial.println(rfid.PICC_GetTypeName(piccType));

            // print UID in Serial Monitor in the hex format
            Serial.print("UID:");
            rkey = CombineKey();
            Serial.print(rkey);
          
            Serial.println();

            rfid.PICC_HaltA(); // halt PICC
            rfid.PCD_StopCrypto1(); // stop encryption on PCD
        }
    }
}

void printRFIDonOled(String t) // 在OLED上顯示RFID資料
{
    sprintf(tmpvalue, "%s", t);
    Serial.print("Data:");
    Serial.print(tmpvalue);
    Serial.print("\n");
      
    _TPrint(1, 15, "Temp:");
    _TPrint(50, 15, tmpvalue);
}
