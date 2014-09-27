<?php

Class AtualLuminariaModelo {

    public $id;
    public $modo;
    public $tempestade;
    public $tempestade_manual;
    public $canal_01;
    public $canal_02;
    public $canal_03;
    public $canal_04;
    public $canal_05;
    public $canal_06;
    public $canal_07;
    public $potencia_maxima;

    function atualizar() {
        Conexao::conectar();
        mysql_query("UPDATE  `atual_luminaria` SET `modo` =  '" . AntiInjection::proteger($this->modo) . "', `tempestade` =  '" . AntiInjection::proteger($this->tempestade) . "', `tempestade_manual` =  '" . AntiInjection::proteger($this->tempestade_manual) . "', `canal_01` =  '" . AntiInjection::proteger($this->canal_01) . "', `canal_02` =  '" . AntiInjection::proteger($this->canal_02) . "', `canal_03` =  '" . AntiInjection::proteger($this->canal_03) . "', `canal_04` =  '" . AntiInjection::proteger($this->canal_04) . "', `canal_05` =  '" . AntiInjection::proteger($this->canal_05) . "', `canal_06` =  '" . AntiInjection::proteger($this->canal_06) . "', `canal_07` =  '" . AntiInjection::proteger($this->canal_07) . "', `potencia_maxima` =  '" . AntiInjection::proteger($this->potencia_maxima) . "' WHERE  `id` = 1;");
        if (mysql_error() != '') {
            return mysql_errno() . ' - ' . mysql_error();
        }
    }

    function obterDados() {
        Conexao::conectar();
        $sql = mysql_query("SELECT * FROM `atual_luminaria` WHERE `atual_luminaria`.`id` = 1");
        $retorno = mysql_fetch_object($sql);
        return $retorno;
    }

}

?>
