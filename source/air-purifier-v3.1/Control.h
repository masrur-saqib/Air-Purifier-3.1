/*
 * Author: Md. Masrur Saqib, CSE-18, RUET
 * Organization: Gizan-Tech
 * Date of creation: 05-Nov-20
 * Project Name: Low Cost Air Purifier
 * Last Modification: 13-Dec-20
 * Modified by: Md. Masrur Saqib
 */

#ifndef __CONTROL_H__
#define __CONTROL_H__
#include <Arduino.h>

class Control {
  uint8_t fanPin, fanChannel;
  uint8_t volt;
  const int freq = 5000;
  const int resolution = 8;
public:
  Control(uint8_t Pin, uint8_t Channel);
  void begin();
  void on();
  void highSpd();
  void midSpd();
  void lowSpd();
  void off();
};

#endif
