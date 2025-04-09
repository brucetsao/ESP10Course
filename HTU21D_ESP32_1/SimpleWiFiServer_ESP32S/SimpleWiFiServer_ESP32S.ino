/*
 這段程式碼已經加上了詳細的註解，
 解釋了每個部分的功能以及如何使用。
 程式可以通過網頁控制連接到ESP32的LED燈的開關狀態
*/
/*
 WiFi Web Server LED Blink

 A simple web server that lets you blink an LED via the web.
 This sketch will print the IP address of your WiFi Shield (once connected)
 to the Serial monitor. From there, you can open that address in a web browser
 to turn on and off the LED on pin 5.

 If the IP address of your shield is yourAddress:
 http://yourAddress/H turns the LED on
 http://yourAddress/L turns it off

 This example is written for a network using WPA encryption. For
 WEP or WPA, change the Wifi.begin() call accordingly.

 Circuit:
 * WiFi shield attached
 * LED attached to pin 2 (adjust ledpin if different)

 created for Arduino 25 Nov 2012
 by Tom Igoe

 ported for SparkFun ESP32
 31 Jan 2017 by Jan Hendrik Berlin
 */

#include <WiFi.h> // Include the WiFi library
#define ledpin 2 // Define the pin for the LED
const char* ssid = "NUKIOT"; // WiFi network name (SSID)
const char* password = "iot12345"; // WiFi password

WiFiServer server(80); // Create a server at port 80 (HTTP)

void setup() {
    Serial.begin(9600); // Start serial communication at 9600 baud rate
    pinMode(ledpin, OUTPUT); // Set the LED pin mode as output

    delay(10);

    // Connect to WiFi network
    Serial.println();
    Serial.println();
    Serial.print("Connecting to ");
    Serial.println(ssid);

    WiFi.begin(ssid, password); // Connect to WiFi network using provided SSID and password

    while (WiFi.status() != WL_CONNECTED) { // Wait until connected
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected."); // WiFi connected successfully
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP()); // Print IP address assigned to the ESP32

    server.begin(); // Start the server
}

void loop() {
    WiFiClient client = server.available(); // Check if a client has connected

    if (client) { // If a client has connected
        Serial.println("New Client."); // Print a message indicating a new client connection
        String currentLine = ""; // String to hold incoming data from the client

        while (client.connected()) 
        { // Loop while the client is connected
            if (client.available()) 
            { // If there's data available from the client
                char c = client.read(); // Read a byte from the client
                Serial.write(c); // Print the byte to the serial monitor

                if (c == '\n') 
                { // If the byte is a newline character
                    // Check if the current line is blank, indicating end of HTTP request
                    if (currentLine.length() == 0) 
                    {
                        // HTTP headers start with response code and content type
                        client.println("HTTP/1.1 200 OK");
                        client.println("Content-type:text/html");
                        client.println();

                        // HTML content for controlling the LED
                        client.print("Click <a href=\"/H\">here</a> to turn the LED on pin 5 on.<br>");
                        client.print("Click <a href=\"/L\">here</a> to turn the LED on pin 5 off.<br>");

                        // Blank line to end the HTTP response
                        client.println();
                        break; // Exit the while loop
                    } else {
                        currentLine = ""; // Clear the current line
                    }
                } else if (c != '\r') { // If the byte is not a carriage return
                    currentLine += c; // Append the byte to the current line
                }

                // Check if the client request is "GET /H" or "GET /L"
                if (currentLine.endsWith("GET /H")) {
                    digitalWrite(ledpin, HIGH); // Turn the LED on
                }
                if (currentLine.endsWith("GET /L")) {
                    digitalWrite(ledpin, LOW); // Turn the LED off
                }
            }
        }
        client.stop(); // Close the connection with the client
        Serial.println("Client Disconnected."); // Print a message indicating client disconnection
    }
}
