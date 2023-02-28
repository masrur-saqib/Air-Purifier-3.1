/*
 * Author: Md. Masrur Saqib, CSE-18, RUET
 * Organization: Gizan-Tech
 * Date of creation: 05-Nov-20
 * Project Name: Low Cost Air Purifier
 * Last Modification: 13-Dec-20
 * Modified by: Md. Masrur Saqib
 */

#include<Arduino.h>
#include "Controll.h"

Controll :: Controll(uint8_t Pin, uint8_t Volt)
{
  fanPin = Pin;
  volt = Volt;
}

Controll :: Controll(uint8_t Pin)
{
  fanPin = Pin;
  volt = 12;
}

void Controll :: begin()
{
  pinMode(fanPin, OUTPUT);
}

void Controll :: on()
{
  if(volt > 5)
    digitalWrite(fanPin, HIGH);
  else
    analogWrite(fanPin, 205);
}

void Controll :: highSpd()
{
  if(volt > 5)
    digitalWrite(fanPin, HIGH);
  else
    analogWrite(fanPin, 205);
}

void Controll :: midSpd()
{
  if(volt > 5)
    analogWrite(fanPin, 220);
  else
    analogWrite(fanPin, 180);
}


void Controll :: lowSpd()
{
  if(volt > 5)
    analogWrite(fanPin, 100);
  else
    analogWrite(fanPin, 80);
}

void Controll :: off()
{
  digitalWrite(fanPin, LOW);
}
