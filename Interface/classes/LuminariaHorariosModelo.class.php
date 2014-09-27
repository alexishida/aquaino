<?php
             Class LuminariaHorariosModelo {


                public $id;
                public $tempo_inicial;
                public $tempo_final;
                public $canal_01;
                public $canal_02;
                public $canal_03;
                public $canal_04;
                public $canal_05;
                public $canal_06;
                public $canal_07;


  

    function atualizar()
    {
       Conexao::conectar();
       mysql_query("UPDATE  `luminaria_horarios` SET  `canal_01` =  '".AntiInjection::proteger($this->canal_01)."', `canal_02` =  '".AntiInjection::proteger($this->canal_02)."', `canal_03` =  '".AntiInjection::proteger($this->canal_03)."', `canal_04` =  '".AntiInjection::proteger($this->canal_04)."', `canal_05` =  '".AntiInjection::proteger($this->canal_05)."', `canal_06` =  '".AntiInjection::proteger($this->canal_06)."', `canal_07` =  '".AntiInjection::proteger($this->canal_07)."' WHERE  `id` = ".AntiInjection::proteger($this->id).";");
       if(mysql_error() != '')
       {
           echo  mysql_errno().' - '.mysql_error();
            return mysql_errno().' - '.mysql_error();
       }
    }

 
       function obtemTodos()
       {
            Conexao::conectar();
            $retorno = array();
            $sql = mysql_query("SELECT * FROM `luminaria_horarios` ORDER BY tempo_inicial ASC");
            while($dados = mysql_fetch_array($sql))
            {
                array_push($retorno, $dados);
            }

            return $retorno;


      }
      
      
        function unicoResultado()
    {
        Conexao::conectar();
        $sql = mysql_query("SELECT * FROM `luminaria_horarios` WHERE `luminaria_horarios`.`id` = ".AntiInjection::proteger($this->id));
        $retorno = mysql_fetch_object($sql);
        return $retorno;
    }
      
}
?>
