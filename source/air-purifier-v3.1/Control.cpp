/*
 * Author: Md. Masrur Saqib, CSE-18, RUET
 * Organization: Gizan-Tech
 * Date of creation: 05-Nov-20
 * Project Name: Low Cost Air Purifier
 * Last Modification: 13-Dec-20
 * Modified by: Md. Masrur Saqib
 */

#include<Arduino.h>
#include "Control.h"

Control :: Control(uint8_t Pin, uint8_t Channel)
{
  fanPin = Pin;
  fanChannel = Channel;
}

void Control :: begin()
{
  ledcSetup(fanChannel, freq, resolution);
  ledcAttachPin(fanPin, fanChannel);
}

void Control :: on()
{
    digitalWrite(fanPin, HIGH);
}

void Control :: highSpd()
{
    ledcWrite(fanChannel, 255);
}

void Control :: midSpd()
{
    ledcWrite(fanChannel, 200);
}

void Control :: lowSpd()
{
    ledcWrite(fanChannel, 160);
}

void Control :: off()
{
  digitalWrite(fanPin, LOW);
  ledcWrite(fanChannel, 0);
}
