<?php

Class LuminariaHorarios extends LuminariaHorariosModelo {

    function atualizar() {
        $this->id = $_GET['id'];
        $this->canal_01 = $_POST['canal_01'];
        $this->canal_02 = $_POST['canal_02'];
        $this->canal_03 = $_POST['canal_03'];
        $this->canal_04 = $_POST['canal_04'];
        $this->canal_05 = $_POST['canal_05'];
        $this->canal_06 = $_POST['canal_06'];
        $this->canal_07 = $_POST['canal_07'];
        Erro::cadastra(parent::atualizar());
    }

    function unicoResultado() {
        $this->id = $_GET['id'];
        return parent::unicoResultado();
    }

}

?>
