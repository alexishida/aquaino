<?php
Class ConverteDataHora {



    public static function americana_brasileira($data_original)
    {
     
        $data_pedaco = explode('-', $data_original);
        return $data_pedaco[2].'/'.$data_pedaco[1].'/'.$data_pedaco[0];

    }

    public static function brasileira_americana($data_original)
    {

        $data_pedaco = explode('/', $data_original);
        return $data_pedaco[2].'-'.$data_pedaco[1].'-'.$data_pedaco[0];

    }

    // Data no formato brasileiro
    public static function somar_data_brasileira($data, $dias, $meses, $ano)
   {
        $data = explode("/", $data);
        $novaData = date("Y-m-d", mktime(0, 0, 0, $data[1] + $meses,
        $data[0] + $dias, $data[2] + $ano) );
        return self::americana_brasileira($novaData);
   }


   // Data no formato americano
    public static function somar_data_americana($data, $dias, $meses, $ano)
   {
        $data = self::americana_brasileira($data);
        $data = explode("/", $data);
        $novaData = date("Y-m-d", mktime(0, 0, 0, $data[1] + $meses,
        $data[0] + $dias, $data[2] + $ano) );
        return $novaData;
   }

   public static function americana_brasileira_completa($data_hora)
   {
       $data_hora = explode(" ",$data_hora);
       return self::americana_brasileira($data_hora[0])." ".$data_hora[1];
   }

   public static function dias_restantes_americana($data_inicial,$data_final)
   {
        $data_ini = strtotime($data_inicial); // 01 de setembro de 2003
        $data_fim = strtotime($data_final); // 31 de outubro de 2003
        $dias = ($data_fim - $data_ini)/86400;

        return $dias;
   }

   public static function dias_restantes_brasileira($data_inicial,$data_final)
   {
        $data_ini = strtotime(self::brasileira_americana($data_inicial)); // 01 de setembro de 2003
        $data_fim = strtotime(self::brasileira_americana($data_final)); // 31 de outubro de 2003
        $dias = ($data_fim - $data_ini)/86400;

        return $dias;
   }
}
?>
