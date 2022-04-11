#include <usbdrv.h>
#include "Adafruit_Sensor.h"
#include "Adafruit_AM2320.h"
#include "usbdrv.h"
#include <avr/io.h>
#include "peri.h"
#define RQ_SET_LED          0
#define RQ_SET_LED_VALUE    1
#define RQ_GET_SWITCH       2
#define RQ_GET_LIGHT        3
#define RQ_GET_TEMP         5
#define RQ_GET_HUMID        6

Adafruit_AM2320 am2320 = Adafruit_AM2320(); 

void init_peri()
{
    
    DDRC |= (1<<PC2)|(1<<PC1)|(1<<PC0);

    
    DDRC &= ~((1<<PC3)|(1<<PC4));

    
    PORTC |= (1<<PC3);

    
    set_led_value(0);
}
void set_led(uint8_t pin, uint8_t state)
{
    if (pin > 2) return;
    if (state)
        PORTC |= (1<<pin);
    else
        PORTC &= ~(1<<pin);
}
void set_led_value(uint8_t value)
{
    PORTC &= ~(0b111);
    PORTC |= (value & 0b111);
}
uint16_t read_adc(uint8_t channel)
{
    ADMUX = (0<<REFS1)|(1<<REFS0) 
          | (0<<ADLAR)            
          | (channel & 0b1111);   
 
    ADCSRA = (1<<ADEN)            
           | (1<<ADPS2)|(1<<ADPS1)|(1<<ADPS0) 
           | (1<<ADSC);         
 
   
    while ((ADCSRA & (1<<ADSC)))
       ;
 
    return ADCL + ADCH*256;
}
usbMsgLen_t usbFunctionSetup(uint8_t data[8])
{
  usbRequest_t *rq = (usbRequest_t*)data;
  static uint8_t switch_state;
  static uint16_t temp; 
  static uint16_t humid;
  static uint16_t light_value;

  if (rq->bRequest == RQ_SET_LED)
  {
    uint8_t led_state = rq->wValue.bytes[0]; 
    uint8_t led_no  = rq->wIndex.bytes[0]; 
    set_led(led_no, led_state);
    return 0;  
  }

  else if (rq->bRequest == RQ_SET_LED_VALUE)
  {
    uint8_t led_value = rq->wValue.bytes[0];
    set_led_value(led_value);
    return 0;
  }

  else if (rq->bRequest == RQ_GET_SWITCH)
  {
    switch_state = SWITCH_PRESSED();
    usbMsgPtr = (uint8_t*) &switch_state;
    return sizeof(switch_state);
  }



  else if (rq->bRequest == RQ_GET_TEMP)
  {
    temp = am2320.readTemperature()*10;
   
    usbMsgPtr = (uint8_t*) &temp;
   
    return sizeof(temp);
  }

  else if (rq->bRequest == RQ_GET_LIGHT)
  {
    light_value = read_adc(4);
    usbMsgPtr = (uint8_t*) &light_value;
    return sizeof(light_value);
  }
  return 0; 
}
int main(void)
{
    init_peri();
    usbInit();
    usbDeviceDisconnect();
    _delay_ms(300);
    usbDeviceConnect();

    sei();
    for(;;)
    {
        usbPoll();
    }
    return 0;
}
