<?php

Class AtualLuminaria extends AtualLuminariaModelo {

    
    function atualizar() {


        $this->modo = $_REQUEST['modo'];
        $this->tempestade = $_REQUEST['tempestade'];
        $this->tempestade_manual = $_REQUEST['tempestade_manual'];
        $this->canal_01 = $_REQUEST['canal_01'];
        $this->canal_02 = $_REQUEST['canal_02'];
        $this->canal_03 = $_REQUEST['canal_03'];
        $this->canal_04 = $_REQUEST['canal_04'];
        $this->canal_05 = $_REQUEST['canal_05'];
        $this->canal_06 = $_REQUEST['canal_06'];
        $this->canal_07 = $_REQUEST['canal_07'];
        $this->potencia_maxima = $_REQUEST['potencia_maxima'];
        Erro::cadastra(parent::atualizar());
    }

    function obterDados() {
        
        $dados_consulta = parent::obterDados();
        
        //[modo] => 1 [tempestade] => 1 [tempestade_manual] => 1 [canal_01] => 40 [canal_02] => 40 [canal_03] => 40 [canal_04] => 40 [canal_05] => 40 [canal_06] => 40 [canal_07] => 40 [potencia_maxima] => 40 ) 

        if($dados_consulta->tempestade == "1") {
            $dados_consulta->tempestade = "true";
        }
        else {
             $dados_consulta->tempestade = "false";
        }
        
        
        if($dados_consulta->tempestade_manual == "1") {
            $dados_consulta->tempestade_manual = "true";
        }
        else {
             $dados_consulta->tempestade_manual = "false";
        }
        

        if($dados_consulta->modo == "1") {
            $dados_consulta->modo = "manual";
        }
        if($dados_consulta->modo == "2") {
             $dados_consulta->modo = "automatico";
        }

        return $dados_consulta;
    }
    
}

?>
