/******************************************************************************
*                                                                             *
*    Comunicação Serial para Envio e Recebimento de infomações                *
*    pela porta Serial                                                        *
*                                                                             *
*    Versão: 0.2.0                                                            *
*    Data: 19/09/2014                                                         *
*    Autor: Alex Ishida                                                       *
*    Site: http://alexishida.com  | http://aquaino.com                        *
*    E-mail: alexishida@gmail.com                                             *
*                                                                             *
******************************************************************************/

/******************************************************************/
/* Definição de Bibliotecas                                       */
/******************************************************************/

#include <OneWire.h>
#include <DallasTemperature.h>
#include <dht.h>


/******************************************************************/
/* Definição de Constantes e Pinos                                */
/******************************************************************/

dht DHT; //Inicializa o sensor
#define dht_dpin A1 //Pino DATA do Sensor ligado na porta Analogica A1


/* Define as portas do DS18B20 */
#define DS18B20_PORTA 5

OneWire oneWire(DS18B20_PORTA);
DallasTemperature sensors(&oneWire);

/* Endereço dos sensores DS18B20 - Para saber mais acesse http://www.hacktronics.com/Tutorials/arduino-1-wire-address-finder.html */
DeviceAddress DS18B20_01 = { 0x28, 0x05, 0xE4, 0x8C, 0x05, 0x00, 0x00, 0xCE };
DeviceAddress DS18B20_02 = { 0x28, 0x43, 0xF8, 0x8D, 0x05, 0x00, 0x00, 0xDB };


/* Definição dos canais de luzes */ 
int canal_01 = 12;
int canal_02 = 11;
int canal_03 = 10;
int canal_04 = 9;
int canal_05 = 8;
int canal_06 = 7;
int canal_07 = 6;

int canal_01_valor = 0;
int canal_02_valor = 0;
int canal_03_valor = 0;
int canal_04_valor = 0;
int canal_05_valor = 0;
int canal_06_valor = 0;
int canal_07_valor = 0;

/* Seta o valor máximo do pwm*/
int pwm_maximo = 200;

/* Define o led de status */
int led_stautus_pin = 13;
bool led_status = false;

/* Variaveis dos modo tempestade */
bool tempestade = false;
int temp_led_raio = 200;
int temp_leds = 15;
unsigned long temp_tempo_espera = 0L;

/******************************************************************/
/* Definição de Variáveis                                         */
/******************************************************************/


String comando;


void setup()
{
    Serial.begin(9600);
    
   /* 
     Aqui eu altero a frequência dos timer 1,2,3,4  
     Se alterar o timer 0 irá influenciar nas funções de controle de tempo do Arduino ex.: delay();
    */   
 
    TCCR1B = (TCCR1B & 0xF8) | 0x01; // 31.374 KHz
    TCCR2B = (TCCR2B & 0xF8) | 0x01; // 31.374 KHz
    TCCR3B = (TCCR3B & 0xF8) | 0x01; // 31.374 KHz
    TCCR4B = (TCCR4B & 0xF8) | 0x01; // 31.374 KHz
  
    /* Inicializa DS18B20 */
    sensors.begin();
    
   // Setando as resoluções 10 bits dos sensores
   sensors.setResolution(DS18B20_01, 10);
   sensors.setResolution(DS18B20_02, 10);
   
   
    /* Seta as portas dos canais das luzes */
    pinMode(canal_01, OUTPUT);
    pinMode(canal_02, OUTPUT);
    pinMode(canal_03, OUTPUT);
    pinMode(canal_04, OUTPUT);
    pinMode(canal_05, OUTPUT);
    pinMode(canal_06, OUTPUT);
    pinMode(canal_07, OUTPUT);
    
    pinMode(led_stautus_pin, OUTPUT);
  
   Serial.println("conectado;");
 
}



/******************************************************************/
/* Loop Principal do Arduino                                      */
/******************************************************************/

void loop()
{


  /*Obtem os comandos da porta serial*/
  if(obtemDados())
  {
     
     if(comando == "dht11") {
       obtemDHT11();
     }
      else if(comando.startsWith("DS18B20")) {
        sensors.requestTemperatures();
        obtemDadosDS18B20();
     }
     else if(comando.startsWith("luzes")) {
       
      obtemLuzes(comando);
      Serial.println("luzes;true");
      
     }
     else if(comando.startsWith("tempestade;ON")) {
        tempestade = true;
       Serial.println("tempestade;ON");
      
     }
     else if(comando.startsWith("tempestade;OFF")) {
        tempestade = false;
       Serial.println("tempestade;OFF");
      
     }
    
    

  }
   else {
       
       /* Led de aguardo*/
       ledStatus();
       
     }
    
    if(tempestade)
    {
      modoTempestade();
    }
    else {
     atualizaLuzes();
    }
}







/*

1 - Violeta
2 - Branco
3 - Vermelho
4 - Azul
5 - Violeta
6 - Aquitinium
7 - Verde

tempestade;ON
tempestade;OFF
*/



/******************************************************************/
/* Funções dos canais de luzes                                    */
/******************************************************************/

void modoTempestade() {
  
  if(comparaTempo(temp_tempo_espera)) {
    
  temp_tempo_espera = random(7,15);
  Serial.println(temp_tempo_espera);
  temp_tempo_espera = (temp_tempo_espera * 1000);
  temp_tempo_espera = temp_tempo_espera + millis();
  
  int modo = random(1,10);
  
  atualizaLuzesTempestade(temp_leds);
  
  if(modo <= 5) {
   analogWrite(canal_01,temp_led_raio);
   analogWrite(canal_02,temp_led_raio);
   analogWrite(canal_06,temp_led_raio);
   delay(40);
   atualizaLuzesTempestade(temp_leds);
   delay(40);
   analogWrite(canal_01,temp_led_raio);
   analogWrite(canal_02,temp_led_raio);
   analogWrite(canal_06,temp_led_raio);
   delay(40);
  atualizaLuzesTempestade(temp_leds);
   delay(40);
     analogWrite(canal_01,temp_led_raio);
   analogWrite(canal_02,temp_led_raio);
   analogWrite(canal_06,temp_led_raio);
   delay(40);
  atualizaLuzesTempestade(temp_leds);
   delay(100);
   analogWrite(canal_01,temp_led_raio);
   analogWrite(canal_02,temp_led_raio);
   analogWrite(canal_06,temp_led_raio);
   delay(100);
atualizaLuzesTempestade(temp_leds);


      Serial.println("modo1");
      Serial.println("----------");

  } else {
    
   analogWrite(canal_01,temp_led_raio);
   analogWrite(canal_02,temp_led_raio);
   analogWrite(canal_06,temp_led_raio);
   delay(80);
atualizaLuzesTempestade(temp_leds);
   delay(80);
   analogWrite(canal_01,temp_led_raio);
   analogWrite(canal_02,temp_led_raio);
   analogWrite(canal_06,temp_led_raio);
   delay(80);
atualizaLuzesTempestade(temp_leds);
   

       Serial.println("modo2");
      Serial.println("----------");
   
  }
  }
  
   
}

/******************************************************************/

void atualizaLuzesTempestade(int valor) {
  
  if(canal_01_valor >= valor) {
    analogWrite(canal_01, valor);
  }
  else {
    analogWrite(canal_01, valorMaximo(canal_01_valor));
  }
  
  if(canal_02_valor >= valor) {
    analogWrite(canal_02, valor);
  }
  else {
    analogWrite(canal_02, valorMaximo(canal_02_valor));
  }
  
  if(canal_03_valor >= valor) {
    analogWrite(canal_03, valor);
  }
  else {
    analogWrite(canal_03, valorMaximo(canal_03_valor));
  }
  
  
   if(canal_04_valor >= valor) {
    analogWrite(canal_04, valor);
  }
  else {
    analogWrite(canal_04, valorMaximo(canal_04_valor));
  }
  
  
     if(canal_05_valor >= valor) {
    analogWrite(canal_05, valor);
  }
  else {
    analogWrite(canal_05, valorMaximo(canal_05_valor));
  }
  
  
    
  if(canal_06_valor >= valor) {
    analogWrite(canal_06, valor);
  }
  else {
    analogWrite(canal_06, valorMaximo(canal_06_valor));
  }
  
  
 if(canal_07_valor >= valor) {
    analogWrite(canal_07, valor);
  }
  else {
    analogWrite(canal_07, valorMaximo(canal_07_valor));
  }

   
}

/******************************************************************/

void atualizaLuzes() {
  
   analogWrite(canal_01, valorMaximo(canal_01_valor));
   analogWrite(canal_02, valorMaximo(canal_02_valor));
   analogWrite(canal_03, valorMaximo(canal_03_valor));
   analogWrite(canal_04, valorMaximo(canal_04_valor));
   analogWrite(canal_05, valorMaximo(canal_05_valor));
   analogWrite(canal_06, valorMaximo(canal_06_valor));
   analogWrite(canal_07, valorMaximo(canal_07_valor));
   
}


/******************************************************************/

int valorMaximo(int canal_valor) {

  if(canal_valor > pwm_maximo ) {
    return pwm_maximo;
  }
  else {
    return canal_valor;
  }
}

/******************************************************************/

void obtemLuzes(String dados) {
  
   //luzes;100;210;160;200;150;100;50
   canal_01_valor = dados.substring(6,9).toInt();
   canal_02_valor = dados.substring(10,13).toInt();
   canal_03_valor = dados.substring(14,17).toInt();
   canal_04_valor = dados.substring(18,21).toInt();
   canal_05_valor = dados.substring(22,25).toInt();
   canal_06_valor = dados.substring(26,29).toInt();
   canal_07_valor = dados.substring(30,33).toInt();
   
   
   /* Debugar 
   Serial.println(canal_01_valor);
   Serial.println(canal_02_valor);
   Serial.println(canal_03_valor);
   Serial.println(canal_04_valor);
   Serial.println(canal_05_valor);
   Serial.println(canal_06_valor);
   Serial.println(canal_07_valor);
   */
 
   
}


/******************************************************************/
/* Funções dos Sensores                                           */
/******************************************************************/


void obtemDHT11() {
  
    DHT.read11(dht_dpin); //Lê as informações do sensor
    
    Serial.print(DHT.temperature); 
    Serial.print(";");
    Serial.print(DHT.humidity);
    Serial.print("\n");
}

/******************************************************************/

void obtemDadosDS18B20()
{
  
  //2805E48C050000CE;26.25|2843F88D050000DB;25.50

  obtemEnderecoDS18B20(DS18B20_01);
  Serial.print(";");
  obtemTemperaturaDS18B20(DS18B20_01);
  
  Serial.print("|");
  
  obtemEnderecoDS18B20(DS18B20_02);
  Serial.print(";");
  obtemTemperaturaDS18B20(DS18B20_02);
  
  Serial.println();
}

/******************************************************************/

void obtemEnderecoDS18B20(DeviceAddress deviceAddress)
{
  for (uint8_t i = 0; i < 8; i++)
  {
    // zero pad the address if necessary
    if (deviceAddress[i] < 16) Serial.print("0");
    Serial.print(deviceAddress[i], HEX);
  }
}

/******************************************************************/

void obtemTemperaturaDS18B20(DeviceAddress deviceAddress)
{
  float tempC = sensors.getTempC(deviceAddress);
  Serial.print(tempC);
}


/******************************************************************/
/* Funções Auxiliares                                             */
/******************************************************************/


boolean obtemDados() {
  
  /* Reseta os dados String */
  comando = "";

  if(Serial.available() > 0)
  {
    while(Serial.available() > 0)
    {
      comando += char(Serial.read());
      
      /* Da uma pausa para obter os dados */
      delay(3);
    }
    //Serial.write("sucesso");
    return(true);

  }
  else {
    return(false);
  }

}

/******************************************************************/

void ledStatus() {
 /* delay(500);
  if(led_status) {
    digitalWrite(led_stautus_pin, HIGH); 
    led_status = false;
  } else {
    digitalWrite(led_stautus_pin, LOW);
    led_status = true;
  }
*/
}

/******************************************************************/

bool comparaTempo(unsigned long antigo) {
  unsigned long atual = millis(); 
  
  if(atual>=antigo) {
    return true; 
  }
  else {
    return false;
  }
  
}

/******************************************************************/

