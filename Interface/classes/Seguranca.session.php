<?php

if((!isset($_SESSION['status_usuario'])) || ($_SESSION['status_usuario'] != "ATIVO"))
{
    header("Location: ../home/login.php?sair");
    exit;
}

if((!isset($_SESSION['token_sistema'])) || ($_SESSION['token_sistema'] != TOKEN_SISTEMA))
{
    header("Location: ../home/login.php?sair");
       exit;
}


/*
$usuarios = new Usuarios();
if(!$usuarios->usuarioAtivo())
{
    Erro::cadastra("USUÁRIO INATIVO!");
    header("Location: ../home/login.php?sair");
    exit;
}

*/

?>
