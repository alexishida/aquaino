/******************************************************************************
*                                                                             *
*    Comunicação Serial para Envio e Recebimento de infomações                *
*    pela porta Serial                                                        *
*                                                                             *
*    Versão: 0.0.1                                                            *
*    Data: 17/03/2014                                                         *
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
/* Definição de Constantes                                        */
/******************************************************************/

#define dht_dpin A15 //Pino DATA do Sensor ligado na porta Analogica A1

int CANAL_UV = 12;
int CANAL_AZUL = 11;
int CANAL_VERDE = 10;
int CANAL_VERMELHO = 9;
int CANAL_BRANCO = 8;

int VALOR_UV = 0;
int VALOR_AZUL = 0;
int VALOR_VERDE = 0;
int VALOR_VERMELHO = 0;
int VALOR_BRANCO = 0;



/******************************************************************/
/* Definição de Variáveis                                         */
/******************************************************************/

dht DHT; //Inicializa o sensor
String comando;

void setup()
{
  Serial.begin(9600);
  
  pinMode(CANAL_UV, OUTPUT);
  pinMode(CANAL_AZUL, OUTPUT);
  pinMode(CANAL_VERDE, OUTPUT);
  pinMode(CANAL_VERMELHO, OUTPUT);
  pinMode(CANAL_BRANCO, OUTPUT);
  
/*  delay(1000);//Aguarda 1 seg antes de acessar as informações do sensor */
 //Serial.write("conectado;");
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
     }
  
  

  }
    
  atualizaLuzes();
  
}

void atualizaLuzes() {
  
   analogWrite(CANAL_UV, VALOR_UV);
   analogWrite(CANAL_AZUL, VALOR_AZUL);
   analogWrite(CANAL_VERDE, VALOR_VERDE);
   analogWrite(CANAL_VERMELHO, VALOR_VERMELHO);
   analogWrite(CANAL_BRANCO, VALOR_BRANCO);
   
}

void obtemLuzes(String dados) {
  
   //luzes;100;210;160;200;150
   VALOR_UV = dados.substring(6,9).toInt();
   VALOR_AZUL = dados.substring(10,13).toInt();
   VALOR_VERDE = dados.substring(14,17).toInt();
   VALOR_VERMELHO = dados.substring(18,21).toInt();
   VALOR_BRANCO = dados.substring(22,25).toInt();
   
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




