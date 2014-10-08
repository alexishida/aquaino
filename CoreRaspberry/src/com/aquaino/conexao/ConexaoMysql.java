package com.aquaino.conexao;

import com.aquaino.config.ConfigGeral;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class ConexaoMysql {

    private Connection conn;

    public Connection obterConexao() throws SQLException {
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection(ConfigGeral.mysqlDb, ConfigGeral.mysqlUsuario, ConfigGeral.mysqlSenha);
            conn.setAutoCommit(false);
            return conn;
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(ConexaoMysql.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
          

        

        //    System.out.println("Nao foi possivel conectar ao banco");
           // return null;
        
    }
}
