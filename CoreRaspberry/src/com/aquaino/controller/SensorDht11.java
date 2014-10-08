/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.aquaino.controller;

import com.aquaino.dao.SensorDht11LiveDAO;
import com.aquaino.utils.SerialCom;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import jssc.SerialPortException;

/**
 *
 * @author Alex
 */
public class SensorDht11 {
    
//    public void atualizaDadosTempoReal(SerialCom serial) throws SerialPortException{
//        SensorDht11LiveDAO dht11DAO = new SensorDht11LiveDAO();
//      
//        String retorno = obtemDados(serial);
//        
//         String[] separar = retorno.split(";");
//         if (separar.length > 1) {
//            try { 
//                
//                dht11DAO.removeDadosAntigos();    
//                dht11DAO.atualizaDados("A15", separar[0], separar[1]);
//            } catch (SQLException ex) {
//                Logger.getLogger(SensorDht11.class.getName()).log(Level.SEVERE, null, ex);
//            }
//         }
//        
//        
//    }
    
    public String obtemDados(SerialCom serial) throws SerialPortException {
        
        serial.enviarDados("dht11");
        String retorno = serial.obtemDados();
        serial.removerEvento();
        return retorno;
    }
    
    
}
