<?php

class ConverteDinheiro {

      public static function americana_brasileira($dinheiro)
    {

       //$dinheiro = str_replace(".", ",", $dinheiro);
        //  setlocale(LC_MONETARY, 'pt_BR');
         // $dinheiro =  money_format('%.2n', $dinheiro);

          $dinheiro = number_format($dinheiro, 2, ',', '.');
          return $dinheiro;
    }

    public static function brasileira_americana($dinheiro)
    {

       $dinheiro = str_replace(".", "", $dinheiro);
       $dinheiro = str_replace(",", ".", $dinheiro);
       return $dinheiro;
    }



    

}
?>
