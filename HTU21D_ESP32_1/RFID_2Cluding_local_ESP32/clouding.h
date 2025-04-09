// URL examples for sending RFID data to a cloud server
// Replace MAC and RFID values with actual data in the URLs
// Example 1: http://localhost:8888/bigdata/rfiddata/rfidadd.php?MAC=AABBCCDDEEFF&rfid=0053775810
// Example 2: http://iot.arduino.org.tw:8888/bigdata/rfiddata/rfidadd.php?MAC=AABBCCDDEEFF&rfid=0053775810

// IP address or DNS name of the cloud server
// Uncomment one of the following lines based on your server configuration
// char iotserver[] = "iot.arduino.org.tw";    // DNS name address for the cloud server
char iotserver[] = "192.168.50.137";    // IP address of the cloud server

// Port number for communication with the cloud server
int iotport = 8888;

// HTTP GET request components for sending data to the server
String strGet = "GET /bigdata/rfiddata/rfidadd.php";
String strHttp = " HTTP/1.1";   // HTTP version in the header
String strHost = "Host: 192.168.50.137";  // Host header with the server IP address

String connectstr;    // Variable to hold the assembled RESTful communication string

void SendtoClouding()     // Function to send sensor data to the cloud
{
    // Example URL format: http://iot.arduino.org.tw:8888/bigdata/rfiddata/rfidadd.php?MAC=AABBCCDDEEFF&rfid=0053775810
    // Constructing the parameters for the RESTful communication string
    connectstr = "?MAC=" + MacData + "&rfid=" + RKey;
    Serial.println(connectstr);

    // Attempt to connect to the cloud server
    if (client.connect(iotserver, iotport))
    {
        Serial.println("Make a HTTP request ... ");
        
        // Construct the complete HTTP GET request string
        String strHttpGet = strGet + connectstr + strHttp;
        Serial.println(strHttpGet);    // Print the communication header

        // Send the constructed RESTful API string to the cloud server
        client.println(strHttpGet);
        client.println(strHost);       // End of headers
        client.println();              // End of communication
        
        // End of sending the RESTful API string to the cloud server
    }

    if (client.connected()) 
    { 
        client.stop();  // Disconnect from the server
    }
}
