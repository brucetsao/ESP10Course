#include "Arduino.h"
#include <AverageValue.h>

// Number of values to calculate with. Prevents memory problems
const long MAX_VALUES_NUM = 40;

AverageValue<long> averageValue(MAX_VALUES_NUM);

void setup() {
	Serial.begin(9600);
}

void loop() {
    //
    // Here we are adding random values vom 0..300 to the calculation
    // So on long run it should return values near to 150
    //
    averageValue.push((double)random(30000)/100);
    Serial.println(averageValue.average());
    delay(2000);
}
