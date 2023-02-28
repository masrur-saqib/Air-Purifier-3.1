#include "dustSensor.h"
#include "mq_masrur.h"
#include "display.h"
#include "Control.h"
#include <DHT.h>
#include <WiFi.h>
#include <ESPmDNS.h>
#include <WiFiUdp.h>
#include <HTTPClient.h>
#include <ArduinoOTA.h>

#define dustLED 13
#define dustVo 2
#define dhtPin 4
#define dhtType DHT11
#define fan1Pin 25
#define fan2Pin 26
#define fan3Pin 14
#define fan4Pin 12
#define fan1Channel 0
#define fan2Channel 1
#define fan3Channel 2
#define fan4Channel 3

const char* serverName = "https://air.gizantech.com/api.php";
String apiKeyValue = "tPmAT5Ab3j7F9";
const char* ssid = "GizanTech";
const char* password = "GtechBD1234";

float humVal, tempVal, dustVal, lpgVal;
uint32_t prev, prev2;

Control fan1(fan1Pin, fan1Channel);
Control fan2(fan2Pin, fan2Channel);
Control fan3(fan3Pin, fan3Channel);
Control fan4(fan4Pin, fan4Channel);
dustSensor dust(dustLED, dustVo);
DHT dht(dhtPin, dhtType);
mq_masrur gas;
display dis;

void setup() {
  Serial.begin(115200);
  dis.begin();
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  dis.clear();
  dis.show(0, 1, "Connecting to Wifi..");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  dis.clear();
  dis.show(0, 2, "Connected!");
  delay(1000);
  ArduinoOTA.setPort(3232);
  ArduinoOTA.setHostname("masrur");
  ArduinoOTA.setPassword("1310");
  ArduinoOTA
  .onStart([]() {
    String type;
    if (ArduinoOTA.getCommand() == U_FLASH)
      type = "sketch";
    else  // U_SPIFFS
      type = "filesystem";

    // NOTE: if updating SPIFFS this would be the place to unmount SPIFFS using SPIFFS.end()
    Serial.println("Start updating " + type);
  })
  .onEnd([]() {
    Serial.println("\nEnd");
  })
  .onProgress([](unsigned int progress, unsigned int total) {
    Serial.printf("Progress: %u%%\r", (progress / (total / 100)));
  })
  .onError([](ota_error_t error) {
    Serial.printf("Error[%u]: ", error);
    if (error == OTA_AUTH_ERROR) Serial.println("Auth Failed");
    else if (error == OTA_BEGIN_ERROR) Serial.println("Begin Failed");
    else if (error == OTA_CONNECT_ERROR) Serial.println("Connect Failed");
    else if (error == OTA_RECEIVE_ERROR) Serial.println("Receive Failed");
    else if (error == OTA_END_ERROR) Serial.println("End Failed");
  });

  ArduinoOTA.begin();


  dust.begin();
  dht.begin();
  gas.begin();
  dis.clear();
  dis.legend();

  fan1.begin();
  fan2.begin();
  fan3.begin();
  fan4.begin();

  fan1.highSpd();
  fan2.highSpd();
  fan3.highSpd();
  fan4.highSpd();

  prev = millis();
  prev2 = millis();
}

void loop() {
  serverUpload();
  ArduinoOTA.handle();
  dustVal = dust.avgDensity();
  humVal = dht.readHumidity();
  tempVal = dht.readTemperature();
  lpgVal = gas.get_LPG();

  if (millis() - prev2 > 1000) {
    prev2 = millis();
    dis.show(8, 15, 0, dustVal);
    dis.show(9, 15, 1, humVal);
    dis.show(9, 15, 2, tempVal);
    dis.show(10, 15, 3, lpgVal);
  }
}

void serverUpload() {
  if (millis() - prev > 5000) {
    prev = millis();

    if (WiFi.status() == WL_CONNECTED) {

      WiFiClient client;
      HTTPClient http;

      http.begin(serverName);

      http.addHeader("Content-Type", "application/x-www-form-urlencoded");

      String httpRequestData =
        "api_key=" + apiKeyValue + "&humidity=" + humVal + "&temperature=" + tempVal + "&dustlvl=" + dustVal + "&lpglvl=" + lpgVal + "";

      Serial.print("httpRequestData: ");
      Serial.println(httpRequestData);

      int httpResponseCode = http.POST(httpRequestData);

      if (httpResponseCode > 0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      } else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
        dis.clear();
        dis.show(0, 1, "Http error: ");
        dis.show(0, 2, httpResponseCode);
        delay(1000);
        dis.legend();
      }
      http.end();
    } else {
      Serial.println("WiFi Disconnected");
    }
  }
}
