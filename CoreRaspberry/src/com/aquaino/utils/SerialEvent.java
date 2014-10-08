/*
 Autor: Alex Ishida 
 Descrição: Classe para criada para comunicao do arduino via porta 
 serial utilizando o jssc 
 Versão: 1.0 (beta)
 Data: 08/10/2014

 */

package com.aquaino.utils;

import jssc.SerialPort;
import jssc.SerialPortEvent;
import jssc.SerialPortEventListener;
import jssc.SerialPortException;

/**
 *
 * @author Alex
 */
public class SerialEvent implements SerialPortEventListener {
    
    private SerialPort serialAtiva;
    private String retorno = "";
    
    
    public SerialEvent(SerialPort conexSerial) {
         this.serialAtiva = conexSerial;
     }
    
      public void serialEvent(SerialPortEvent event) {

            if(event.isRXCHAR()){//If data is available
                
                if(event.getEventValue() > 0){//Check bytes count in the input buffer
                    //Read data, if 10 bytes available 
                    try {
                      
                       String buffer = serialAtiva.readString();
                       retorno = retorno + buffer;
                                         
                    }
                    catch (SerialPortException ex) {
                        System.out.println(ex);
                    }
                    
                    
                }
                
            }
            else if(event.isCTS()){//If CTS line has changed state
                if(event.getEventValue() == 1){//If line is ON
                    System.out.println("CTS - ON");
                }
                else {
                    System.out.println("CTS - OFF");
                }
            }
            else if(event.isDSR()){///If DSR line has changed state
                if(event.getEventValue() == 1){//If line is ON
                    System.out.println("DSR - ON");
                }
                else {
                    System.out.println("DSR - OFF");
                }
            }
            

        }

    public String getRetorno() {
        
        String retorno_final = retorno;
        retorno = "";
       // retorno_final=retorno_final.replace("\r","").replace("\n","");
        return retorno_final;
   

    }

      
      
   
   
}
