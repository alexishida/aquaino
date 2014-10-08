/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.aquaino.controller;


import com.aquaino.config.ConfigGeral;
import com.aquaino.utils.SerialCom;
import java.util.logging.Level;
import java.util.logging.Logger;
import jssc.SerialPortException;


/**
 *
 * @author Alex
 */
public class TempoReal {
    
    private int tempo;
    
    public TempoReal() {
        tempo = 0;
    }
    
//    public void atualizaSensores(SerialCom serial)
//    {
//        if(controlaTempo()) {
//        SensorDht11 sensor_dht11 = new SensorDht11();
//        
//        try {
//            sensor_dht11.atualizaDadosTempoReal(serial);
//        } catch (SerialPortException ex) {
//            Logger.getLogger(TempoReal.class.getName()).log(Level.SEVERE, null, ex);
//        }
//        }
//        
//    }
    
//    private Boolean controlaTempo() {
//
//       tempo++;
//     
//      int calculo_tempo = ConfigGeral.tempoBuscaDados/ConfigGeral.tempoDormir;
//
//      if(tempo>=calculo_tempo) {
//           tempo = 0;
//           return true;
//      }else {
//          return false;
//      }
//
//    }
    

    
}
