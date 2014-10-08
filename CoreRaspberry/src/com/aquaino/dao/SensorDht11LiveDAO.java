/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.aquaino.dao;

import com.aquaino.conexao.ConexaoMysql;
import com.aquaino.config.ConfigGeral;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

/**
 *
 * @author Alex
 */
public class SensorDht11LiveDAO {



//    public void removeDadosAntigos() throws SQLException {
//        long tempoExpiracao = System.currentTimeMillis()-ConfigGeral.tempoExpiracaoDados;
//        
//        Connection conn;
//        ConexaoMysql conexao = new ConexaoMysql();
//
//        conn = conexao.obterConexao();
//
//        String sql = "DELETE FROM sensor_dht11_live where tempo < ?";
//        PreparedStatement stmt = conn.prepareStatement(sql);
//        stmt.setLong(1, tempoExpiracao);
//        stmt.execute();
//        stmt.close();
//        conn.close();
//    }

    public void atualizaDados(String porta,String humidade,String temperatura) throws SQLException {
        
        long tempoAtual = System.currentTimeMillis();
        Connection conn;
        ConexaoMysql conexao = new ConexaoMysql();

        conn = conexao.obterConexao();

        String sql = "INSERT INTO `sensor_dht11_live` (`porta`,`tempo`,`humidade`,`temperatura`) "
                    + "VALUES (?,?,?,?);";
        PreparedStatement stmt = conn.prepareStatement(sql);
        stmt.setString(1, porta);
        stmt.setLong(2, tempoAtual);
        stmt.setString(3, humidade);
        stmt.setString(4, temperatura);
        stmt.execute();
        stmt.close();
        conn.close();
        
    }

}
