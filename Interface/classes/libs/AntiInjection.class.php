<?php
/*
 *   Classe para previnir o SQL INJECTION independente do Magic Quotes estar ativo;
 *  mais informações em http://php.net/manual/pt_BR/security.magicquotes.whynot.php
 *
 *
 *  Autor: Alex Ishida v0.1
 */


class AntiInjection {


    public static function proteger($variavel) {
         return addslashes(stripslashes($variavel));
    }

    public static function remover($variavel) {
        return stripslashes($variavel);
    }

}
?>
