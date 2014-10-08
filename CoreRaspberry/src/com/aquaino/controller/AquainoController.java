/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.aquaino.controller;

import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Alex
 */
public class AquainoController {

    protected long tempo_ultima_execucao = 0;

    protected boolean controlaTempo(long tempo_espera) {

        boolean retorno = false;

        if (tempo_ultima_execucao == 0) {
            tempo_ultima_execucao = timestamp();
            retorno = true;
        } else {

            if (comparaTempo(tempo_ultima_execucao, tempo_espera)) {
                tempo_ultima_execucao = timestamp();
                retorno = true;
            }

        }

        return retorno;
    }

    protected boolean comparaTempo(long tempo_inicial, long tempo_espera) {

        long tempo_esperado = tempo_inicial + tempo_espera;
        long tempo_atual = System.currentTimeMillis();

        if (tempo_esperado <= tempo_atual) {
            return true;
        } else {
            return false;
        }

    }

    protected void esperar(int tempo_espera) {

        try {
            Thread.sleep(tempo_espera);
        } catch (InterruptedException ex) {
            Logger.getLogger(AquainoController.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    protected long timestamp() {
        return System.currentTimeMillis();
    }

}
