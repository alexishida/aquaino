<?php
/*
    Arquivo de Parametros usados no sistema

*/
session_start();
ob_start();

// Aumentando a memoria para processar a imagem
ini_set("memory_limit","64M");


// Alterando a hora do servidor
date_default_timezone_set('America/Porto_Velho');


//Configurações de envio de email
define('EMAIL_HOST','');
define('EMAIL_SMTP',false);
define('EMAIL_SMTP_USUARIO','');
define('EMAIL_SMTP_SENHA','');



/* Conexao com o banco de dados*/
define('DB_HOST','127.0.0.1');
define('DB_USUARIO','root');
define('DB_SENHA','');
define('DB_BANCO', 'aquaino');
define('DB_CHARSET','utf8');
define('TOKEN_SISTEMA','72be1b310f31b2e88f4c141faaa9eee0');
?>