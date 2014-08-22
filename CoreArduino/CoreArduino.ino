/******************************************************************************
*                                                                             *
*    Comunicação Serial para Envio e Recebimento de infomações                *
*    pela porta Serial                                                        *
*                                                                             *
*    Versão: 0.0.2                                                            *
*    Data: 21/08/2014                                                         *
*    Autor: Alex Ishida                                                       *
*    Site: http://alexishida.com                                              *
*    E-mail: alexishida@gmail.com                                             *
*                                                                             *
******************************************************************************/

/******************************************************************/
/* Definição de Bibliotecas                                       */
/******************************************************************/
#include <dht.h>



/******************************************************************/
/* Definição de Constantes e Pinos                                */
/******************************************************************/

#define dht_dpin A15 //Pino DATA do Sensor ligado na porta Analogica A1

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


/* Define o led de status */
int led_stautus_pin = 13;
bool led_status = false;

/******************************************************************/
/* Definição de Variáveis                                         */
/******************************************************************/

dht DHT; //Inicializa o sensor
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
  
  
  pinMode(canal_01, OUTPUT);
  pinMode(canal_02, OUTPUT);
  pinMode(canal_03, OUTPUT);
  pinMode(canal_04, OUTPUT);
  pinMode(canal_05, OUTPUT);
  pinMode(canal_06, OUTPUT);
  pinMode(canal_07, OUTPUT);
  
  pinMode(led_stautus_pin, OUTPUT);

  
/*  delay(1000);//Aguarda 1 seg antes de acessar as informações do sensor */
 Serial.println("conectado;");
}

void loop()
{


  if(obtemDados())
  {
     
     if(comando == "dht11") {
       obtemDHT11();
     }
     else if(comando.startsWith("luzes")) {
       
      obtemLuzes(comando);
       Serial.println("luzes;true");
      
     }
    

  }
   else {
       
       /* Led de aguardo*/
       ledStatus();
       
     }
    
  atualizaLuzes();
  
}


void ledStatus() {
  delay(500);
  if(led_status) {
    digitalWrite(led_stautus_pin, HIGH); 
    led_status = false;
  } else {
    digitalWrite(led_stautus_pin, LOW);
    led_status = true;
  }

}



void atualizaLuzes() {
  
   analogWrite(canal_01, canal_01_valor);
   analogWrite(canal_02, canal_02_valor);
   analogWrite(canal_03, canal_03_valor);
   analogWrite(canal_04, canal_04_valor);
   analogWrite(canal_05, canal_05_valor);
   analogWrite(canal_06, canal_06_valor);
   analogWrite(canal_07, canal_07_valor);

   
}


void obtemLuzes(String dados) {
  
   //luzes;100;210;160;200;150;100;50
   canal_01_valor = dados.substring(6,9).toInt();
   canal_02_valor = dados.substring(10,13).toInt();
   canal_03_valor = dados.substring(14,17).toInt();
   canal_04_valor = dados.substring(18,21).toInt();
   canal_05_valor = dados.substring(22,25).toInt();
   canal_06_valor = dados.substring(26,29).toInt();
   canal_07_valor = dados.substring(30,33).toInt();
   
   
   /* Debugar */
   Serial.println(canal_01_valor);
   Serial.println(canal_02_valor);
   Serial.println(canal_03_valor);
   Serial.println(canal_04_valor);
   Serial.println(canal_05_valor);
   Serial.println(canal_06_valor);
   Serial.println(canal_07_valor);
 
   
}



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




void obtemDHT11() {
  
  DHT.read11(dht_dpin); //Lê as informações do sensor

    Serial.print(DHT.humidity);
    Serial.print(";");
    Serial.print(DHT.temperature); 
    /*delay(2000);  //Não diminuir muito este valor. O ideal é a leitura a cada 2 segundo */
}




