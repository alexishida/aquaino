/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package com.aquaino.dao;

import com.aquaino.conexao.ConexaoMysql;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

/**
 *
 * @author Alex
 */
public class HistoricoClimaDAO {
    
    public void insereLog(float humidade, float temperatura) throws SQLException {
        Connection conn;
        ConexaoMysql conexao = new ConexaoMysql();

        conn = conexao.obterConexao();
        String sql = "INSERT INTO historico_clima (temperatura,humidade) VALUES (?,?)";
        PreparedStatement stmt = conn.prepareStatement(sql);

       
            stmt.setFloat(1, temperatura);
            stmt.setFloat(2, humidade);
            stmt.execute();
 



        stmt.close();
        conn.commit();

        //Fechar conexão
        conn.close();
    }
}

