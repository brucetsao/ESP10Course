uint64_t chipid;  // 用於存放ESP32的芯片ID（實際上是MAC地址）
/*
這段程式碼用於在ESP32中取得並顯示芯片的ID。
ESP32的芯片ID本質上是其MAC地址。
在 setup() 函式中，程式初始化了串列通訊。
loop() 函式中，
使用 ESP.getEfuseMac() 取得ESP32的MAC地址，
並使用位元操作將其分為高2個位元組和低4個位元組。
接著使用 Serial.printf() 格式化輸出芯片ID，
然後延遲3秒，
以便程式在無限迴圈中反覆執行。

*/
void setup() {
	Serial.begin(9600);  // 初始化串列通訊，設定波特率為9600
}

void loop() {
	// 取得ESP32的熔絲MAC地址，作為芯片ID（長度為6個位元組）
	chipid = ESP.getEfuseMac(); 

	// 輸出ESP32的芯片ID的高2個位元組
	Serial.printf("ESP32 Chip ID = %04X", (uint16_t)(chipid >> 32));  // 移位32位，取得高2個位元組

	// 輸出ESP32的芯片ID的低4個位元組
	Serial.printf("%08X\n", (uint32_t)chipid);  // 取得低4個位元組，並換行

	delay(3000);  // 暫停3秒
}
