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
                echo '<div class="notification failure canhide">

                <p><strong>FALHA: </strong>
                ' . $_SESSION['erro_mensagem'] . '</p>
         </div>';

                $_SESSION['erro_mensagem'] = '';
            } else {
                echo '<div class="notification success canhide">

                   <p><strong>SUCESSO: </strong>';

                if(isset($_REQUEST['id'])) {

                 echo 'Dados atualizados com sucesso!';

                } else {

                    echo 'Dados cadastrados com sucesso!';
                }

                echo   '</p>
          


                    </div>  ';
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
