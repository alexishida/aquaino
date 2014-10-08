<?php

/*
 * Obrigatorio o uso do ob_start antes de chamar a funcao
 *
 */

Class Erro {

    static function redirecionar($link) {

        if ($_SESSION['erro_inicializado'] == true) {

            if ($_SESSION['erro_mensagem'] == '') {
                header('Location:' . $link);
            }
        }
    }

    static function cadastra($msg_erro) {
        $_SESSION['erro_inicializado'] = true;

        if ($msg_erro != '') {

            if ($_SESSION['erro_mensagem'] == '') {
                $_SESSION['erro_mensagem'] = $msg_erro;
            }
        } else {
            $_SESSION['erro_mensagem'] = '';
        }
    }

    static function visualiza() {
        if ($_SESSION['erro_inicializado'] == true) {

            if ($_SESSION['erro_mensagem'] != '') {
                
                
                echo '<div class="alert alert-danger alert-dismissable">
                                <i class="fa fa-ban"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                          echo  $_SESSION['erro_mensagem'];
                            echo   '</div>';
  

                $_SESSION['erro_mensagem'] = '';
            } else {
                echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';

                if(isset($_REQUEST['id'])) {

                 echo 'Dados atualizados com sucesso!';

                } else {

                    echo 'Dados cadastrados com sucesso!';
                }

                echo '</div>';
            }

            $_SESSION['erro_inicializado'] = '';
        }
    }

    static function limpaErro() {
        $_SESSION['erro_mensagem'] = '';
        $_SESSION['erro_inicializado'] = '';
    }

}

?>
