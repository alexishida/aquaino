<?php
require_once('config.php');

class Conexao
{
    public static $status_conectado;
    
    public static function conectar()
    {
          if(!isset(self::$status_conectado))
          {
           self::$status_conectado = mysql_connect(DB_HOST,DB_USUARIO,DB_SENHA);
            mysql_select_db(DB_BANCO,self::$status_conectado);
            mysql_set_charset(DB_CHARSET,self::$status_conectado);
          }
          return self::$status_conectado;
    }

}
?>