/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.aquaino.threads;

import com.aquaino.controller.LuminariaController;
import com.aquaino.utils.SerialCom;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import jssc.SerialPortException;

public class Iniciar {

    public static void main(String[] args) {

        SerialCom serial = new SerialCom();
        LuminariaController luminaria = new LuminariaController();
        
        
        while (true) {
 
            
            
            try {

                if (!serial.isConexaoAtiva()) {
                    serial.conectar();
                } 
                
                try {
                    luminaria.inicializar(serial);
                    
                    
                    
                    //serial.enviarDados("dht11");
                    
                    //String retorno = serial.obtemDados();
                    //serial.removerEvento();
                    //System.out.println(retorno);
                    //Geral.dormir(5000);
                } catch (SQLException ex) {
                    Logger.getLogger(Iniciar.class.getName()).log(Level.SEVERE, null, ex);
                }
                
        
                
                

            } catch (SerialPortException ex) {
                Logger.getLogger(Iniciar.class.getName()).log(Level.SEVERE, null, ex);
                try {
                    serial.fechar();
                } catch (SerialPortException ex1) {
                    Logger.getLogger(Iniciar.class.getName()).log(Level.SEVERE, null, ex1);
                }
            }
            


        }

    }
}
