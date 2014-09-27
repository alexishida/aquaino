<?php

function __autoload($classe) {

    $ds = DIRECTORY_SEPARATOR;

    $classe_nome = dirname(__FILE__) . $ds . $classe . '.class.php';
    if (file_exists($classe_nome)) {
        require_once $classe_nome;
        return;
    }

    $classe_nome = dirname(__FILE__) . $ds . 'libs' . $ds . $classe . '.class.php';
    if (file_exists($classe_nome)) {
        require_once $classe_nome;
        return;
    }
}

?>
