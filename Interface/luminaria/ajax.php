<?php

require_once('../classes/config.php');
require_once('../classes/autoload.php');

$json_retorno = array();



if (isset($_REQUEST['acao'])) {

    
    if($_REQUEST['acao'] == "atualizarLuzes") {
          $atual_luminaria = new AtualLuminaria();
         $atual_luminaria->atualizar();
    }
    
  
    
    
} else {
    $json_retorno['erro'] = "Nenhuma ação selecionada!";
}



if(count($json_retorno) > 0) {
    // Para aceitar utf-8
    $json_retorno = array_map('htmlentities',$json_retorno); 
    $json_retorno = html_entity_decode(json_encode($json_retorno));
    echo $json_retorno;
}
?>