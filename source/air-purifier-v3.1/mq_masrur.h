/*
   Author: Md. Masrur Saqib, CSE-18, RUET
   Organization: Team Abacus
   Date of creation: 14-Dec-20
   Project Name: Surokkha
   Last Modification: 01-Feb-21
   Modified by: Md. Masrur Saqib
*/
#ifndef __MQ_MASRUR_H__
#define __MQ_MASRUR_H__

class mq_masrur {
    int mq06_pin = 35;

    double mq06LPGx1 = 200;
    double mq06LPGy1 = 2.0;
    double mq06LPGx2 = 3000;
    double mq06LPGy2 = 0.75;
    double mq06LPGm;
    double mq06LPGc;

    double mq06Rk = 1893.0;
    double LPG = 0;
    double rs_r0, value, rs, Vs;

  public:
    mq_masrur() {

    }

    void begin() {
      mq06LPGm = log10(mq06LPGy1 / mq06LPGy2) / log10(mq06LPGx1 / mq06LPGx2);
      mq06LPGc = log10(mq06LPGy1) - mq06LPGm * log10(mq06LPGx1);
    }

    double get_val(double c, double m, double r0, int pin, double Rk){
      Vs = analogRead(pin) * (3.3 / 4095.0);
      rs = (3.3 * Rk - Vs * Rk) / Vs;
      rs_r0 = rs / r0;
      value = ((log10(rs_r0) - c) / m);
      return pow(10.0, value);
    }
    
    double get_LPG() {
      LPG = get_val(mq06LPGc, mq06LPGm, 333.92, mq06_pin, mq06Rk);
      delay(10);

      return LPG;
    }
};
#endif
