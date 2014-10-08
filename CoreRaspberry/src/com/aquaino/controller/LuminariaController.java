/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.aquaino.controller;

import com.aquaino.bean.AtualLuminaria;
import com.aquaino.config.ConfigGeral;
import com.aquaino.dao.AtualLuminariaDAO;
import com.aquaino.utils.SerialCom;
import java.sql.SQLException;
import jssc.SerialPortException;

/**
 *
 * @author Alex
 */
public class LuminariaController extends AquainoController {

    private String ultimo_canal_01 = "";
    private String ultimo_canal_02 = "";
    private String ultimo_canal_03 = "";
    private String ultimo_canal_04 = "";
    private String ultimo_canal_05 = "";
    private String ultimo_canal_06 = "";
    private String ultimo_canal_07 = "";

    private String ultimo_potencia_maxima = "";
    
    private String ultimo_status_tempestade = "";
    
    

    public void inicializar(SerialCom serial) throws SQLException, SerialPortException {

        if (controlaTempo(500)) {

            AtualLuminariaDAO luminaria_atual = new AtualLuminariaDAO();
            AtualLuminaria dados_atuais = new AtualLuminaria();

            dados_atuais = luminaria_atual.obtemDados();

            comandoLuzes(serial, dados_atuais);

            if (dados_atuais.getTempestade_manual().equals("1")) {
                comandoTempestade(serial, "ON");
            } else {
                comandoTempestade(serial, "OFF");
            }
        }

    }

    private void comandoLuzes(SerialCom serial, AtualLuminaria dados) throws SerialPortException {

        if (comparaValoresLuzes(dados)) {
            serial.enviarDados("luzes;" + calculaPorcentagemIluminacao(dados.getCanal_01(),dados.getPotencia_maxima()) + ";" + calculaPorcentagemIluminacao(dados.getCanal_02(),dados.getPotencia_maxima()) + ";" + calculaPorcentagemIluminacao(dados.getCanal_03(),dados.getPotencia_maxima()) + ";" + calculaPorcentagemIluminacao(dados.getCanal_04(),dados.getPotencia_maxima()) + ";" + calculaPorcentagemIluminacao(dados.getCanal_05(),dados.getPotencia_maxima()) + ";" + calculaPorcentagemIluminacao(dados.getCanal_06(),dados.getPotencia_maxima()) + ";" + calculaPorcentagemIluminacao(dados.getCanal_07(),dados.getPotencia_maxima()) + ";");
        }
    }

    private void comandoTempestade(SerialCom serial, String status) throws SerialPortException {

        if (!ultimo_status_tempestade.equals(status)) {
           if(ultimo_status_tempestade.equals("")) {
               esperar(100);
           }
            serial.enviarDados("tempestade;" + status);
            ultimo_status_tempestade = status;
        }
    }

    private String calculaPorcentagemIluminacao(String valor_inicial, String potencia_maxima_inicial) {

        int valor = Integer.parseInt(valor_inicial);
        int potencia_maxima = Integer.parseInt(potencia_maxima_inicial);
        
        int resultado_01 = (ConfigGeral.valorMaximoPWMLuminaria * valor) / 100;
        
        int resultado_potencia = (resultado_01 * potencia_maxima) / 100;

        return String.format("%03d", resultado_potencia);
    }

    private boolean comparaValoresLuzes(AtualLuminaria dados) {

        if ((!dados.getCanal_01().equals(ultimo_canal_01)) || (!dados.getCanal_02().equals(ultimo_canal_02)) || (!dados.getCanal_03().equals(ultimo_canal_03)) || (!dados.getCanal_04().equals(ultimo_canal_04)) || (!dados.getCanal_05().equals(ultimo_canal_05)) || (!dados.getCanal_06().equals(ultimo_canal_06)) || (!dados.getCanal_07().equals(ultimo_canal_07)) || (!dados.getPotencia_maxima().equals(ultimo_potencia_maxima))) {
            ultimo_canal_01 = dados.getCanal_01();
            ultimo_canal_02 = dados.getCanal_02();
            ultimo_canal_03 = dados.getCanal_03();
            ultimo_canal_04 = dados.getCanal_04();
            ultimo_canal_05 = dados.getCanal_05();
            ultimo_canal_06 = dados.getCanal_06();;
            ultimo_canal_07 = dados.getCanal_07();

            ultimo_potencia_maxima = dados.getPotencia_maxima();
            return true;

        } else {
            return false;
        }

    }

}
