/*
 Autor: Alex Ishida 
 Descrição: Classe para criada para comunicao do arduino via porta 
 serial utilizando o jssc
 Versão: 1.0 (beta)
 Data: 08/10/2014

 */
package com.aquaino.utils;

import com.aquaino.config.ConfigGeral;
import java.util.logging.Level;
import java.util.logging.Logger;
import jssc.SerialPort;
import jssc.SerialPortException;

/**
 *
 * @author Alex
 */
public class SerialCom {

    private boolean conexaoAtiva = false;
    private SerialPort serialPort;
    private SerialEvent EventoSerial;
    private boolean eventoAtivo = false;

    long start_time, end_time, difference;

    public void conectar() throws SerialPortException {

        serialPort = new SerialPort(ConfigGeral.serialPorta);
        serialPort.openPort();
        serialPort.setParams(ConfigGeral.serialBaudRate, 8, 1, 0);//Set params
        conexaoAtiva = true;
        espera(1000);
    }

    public void enviarDados(String comando) throws SerialPortException {
        criaEvento();
        serialPort.writeString(comando);
        espera(100);
    }

    public String obtemDados() throws SerialPortException {
        criaEvento();
        espera(100);
        return EventoSerial.getRetorno();
    }

    private void criaEvento() throws SerialPortException {
        if (!eventoAtivo) {
            int mask = SerialPort.MASK_RXCHAR + SerialPort.MASK_CTS + SerialPort.MASK_DSR;//Prepare mask
            serialPort.setEventsMask(mask);//Set mask
            EventoSerial = new SerialEvent(serialPort);
            serialPort.addEventListener(EventoSerial);
            eventoAtivo = true;
        }
    }

    public void removerEvento() throws SerialPortException {
        serialPort.removeEventListener();
        eventoAtivo = false;
    }

    public void fechar() throws SerialPortException {
        removerEvento();
        serialPort.closePort();
        conexaoAtiva = false;
    }

    public boolean isConexaoAtiva() {
        return conexaoAtiva;
    }

    public void setConexaoAtiva(boolean conexaoAtiva) {
        this.conexaoAtiva = conexaoAtiva;
    }

    private void espera(int tempo) {
        try {
            Thread.sleep(tempo);
        } catch (InterruptedException ex) {
            Logger.getLogger(SerialCom.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}
