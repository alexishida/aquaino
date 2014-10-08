/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.aquaino.config;

/**
 *
 * @author Alex
 */
public class ConfigGeral {
    
   
        
// CONFIGURACOES GERAIS DA APLICACAO
    
   static public String programaVersao = "v0.0.1(em desenvolvimento)";
   static public int valorMaximoPWMLuminaria = 200;  
   static public int tempoAtualizacaoLuzes = 50000;
  

    
// PORTA SERIAL
    
   static public String serialPorta = "COM3";   // Windows
   // static public String serialPorta = "/dev/ttyACM0"; // Linux
    static public int serialBaudRate = 9600;
    
    
    
 // BANCO MYSQL
    
    //static public String mysqlDb = "jdbc:mysql://192.168.0.12/aquaino"; // Remoto
    static public String mysqlDb = "jdbc:mysql://localhost/aquaino";  // Local
    static public String mysqlUsuario = "root";
    static public String mysqlSenha = "";
    
    
   
    

    
}
