<?php

Class UsuariosModelo {

    public $id;
    public $nome;
    public $senha;
    public $login;
    public $email;
    public $status_ativo;

    function inserir() {

        Conexao::conectar();
        mysql_query("INSERT INTO `usuarios` ( `id` , `nome`  , `senha` , `login` , `status_ativo`  ) VALUES (NULL, '" . AntiInjection::proteger($this->nome) . "', '" . AntiInjection::proteger($this->senha) . "', '" . AntiInjection::proteger($this->login) . "', '" . AntiInjection::proteger($this->status_ativo) . "');");
        $this->id = mysql_insert_id();
        if (mysql_error() != '') {
            return mysql_errno() . ' - ' . mysql_error();
        }
    }

    function atualizar() {
        Conexao::conectar();
        mysql_query("UPDATE  `usuarios` SET `nome` =  '" . AntiInjection::proteger($this->nome) . "',  `login` =  '" . AntiInjection::proteger($this->login) . "', `status_ativo` =  '" . AntiInjection::proteger($this->status_ativo) . "' WHERE  `id` = " . AntiInjection::proteger($this->id) . ";");
        if (mysql_error() != '') {
            return mysql_errno() . ' - ' . mysql_error();
        }
    }

    function atualizarSenha() {
        Conexao::conectar();
        mysql_query("UPDATE  `usuarios` SET `nome` =  '" . AntiInjection::proteger($this->nome) . "', `senha` =  '" . AntiInjection::proteger($this->senha) . "', `login` =  '" . AntiInjection::proteger($this->login) . "', `status_ativo` =  '" . AntiInjection::proteger($this->status_ativo) . "' WHERE  `id` = " . AntiInjection::proteger($this->id) . ";");
        if (mysql_error() != '') {
            return mysql_errno() . ' - ' . mysql_error();
        }
    }

    function deletar() {
        Conexao::conectar();
        mysql_query("DELETE FROM `usuarios` WHERE `usuarios`.`id` = " . AntiInjection::proteger($this->id));
        if (mysql_error() != '') {
            return mysql_errno() . ' - ' . mysql_error();
        }
    }

    function unicoResultado() {
        Conexao::conectar();
        $sql = mysql_query("SELECT * FROM `usuarios` WHERE `usuarios`.`id` = " . AntiInjection::proteger($this->id));
        $retorno = mysql_fetch_object($sql);
        return $retorno;
    }

    function totalRegistros() {
        Conexao::conectar();
        $sql = mysql_query("SELECT id from `usuarios`");
        $retorno = mysql_num_rows($sql);
        return $retorno;
    }

    function buscaUsuario() {
        Conexao::conectar();
        $sql = mysql_query("SELECT * FROM `usuarios` WHERE `login` = '" . AntiInjection::proteger($this->login) . "'");
        $retorno = mysql_fetch_object($sql);
        return $retorno;
    }

}

?>
