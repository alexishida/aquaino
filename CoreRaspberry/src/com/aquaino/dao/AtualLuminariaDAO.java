/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.aquaino.dao;

import com.aquaino.bean.AtualLuminaria;
import com.aquaino.conexao.ConexaoMysql;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author Alex
 */
public class AtualLuminariaDAO {
    
    public AtualLuminaria obtemDados() throws SQLException {
        Connection conn;
         ConexaoMysql conexao = new ConexaoMysql();

        conn = conexao.obterConexao();
        String sql = "SELECT * FROM `atual_luminaria` WHERE `atual_luminaria`.`id` = 1";

        PreparedStatement stmt = conn.prepareStatement(sql);


        ResultSet rs = stmt.executeQuery();

        AtualLuminaria retorno = new AtualLuminaria();

        if (rs.next()) {

            retorno.setModo(rs.getString("modo"));
            retorno.setTempestade(rs.getString("tempestade"));
            retorno.setTempestade_manual(rs.getString("tempestade_manual"));
            retorno.setPotencia_maxima(rs.getString("potencia_maxima"));
            retorno.setCanal_01(rs.getString("canal_01"));
            retorno.setCanal_02(rs.getString("canal_02"));
            retorno.setCanal_03(rs.getString("canal_03"));
            retorno.setCanal_04(rs.getString("canal_04"));
            retorno.setCanal_05(rs.getString("canal_05"));
            retorno.setCanal_06(rs.getString("canal_06"));
            retorno.setCanal_07(rs.getString("canal_07"));
            

        }


        stmt.close();
        rs.close();
        conn.close();
        return retorno;
    }
    
}
