<?php

/*
  Classe para Paginação via Arquivos da Pasta

  Versão: 0.1
  Data: 14/06/2012
  Autor: Alex Ishida
  E-mail: alexishida@gmail.com

 */

Class PaginacaoPasta {

    //-------------------------------------

    public $limite; // Limite para ordenaçao
    public $pasta; // Pasta    
    public $link_fk; // continuacao do get ex.: id=1

    /*


      $paginacao = new PaginacaoPasta();
      $paginacao->limite = 5;
      $paginacao->link_fk = "id=1";
      $paginacao->pasta = "galeria/fotos-formatura-fernanda-wanderley/";
      $paginacao_result = $paginacao->gerar();



     */
    //------------------
    private $ultima;
    private $pagina_atual;
    private $pagina_total;
    private $total_registros;
    private $link_pagina;
    private $busca;
    private $busca_link;







    function gerar() {

        $arquivos = array();

        $this->pagina_atual = 1;


        $ponteiro = opendir($this->pasta) or die("Erro: Diretorio inexistente");
        $total_itens = 0;
        while ($nome_itens = readdir($ponteiro)) {
            $itens[] = $nome_itens;
            $total_itens++;
        }
        sort($itens);
        $this->total_registros = $total_itens - 2;


        // Seta o total de paginas
        $this->pagina_total = ceil($this->total_registros / $this->limite);



        if (isset($_GET["pagina"])) {
            $this->pagina_atual = AntiInjection::proteger($_GET["pagina"]);

            if ($this->pagina_atual > $this->pagina_total) {
                $this->pagina_atual = $this->pagina_total;
            }
        }



        // Seta o ultimo registro da busca
        $fim = $this->pagina_atual * $this->limite;
        $inicio = ($fim - $this->limite) + 1;



        $contador = 1;
        foreach ($itens as $listar) {



            if ($listar != "." && $listar != "..") {
                if (!is_dir($listar)) {


                    if ($contador >= $inicio) {
                        if ($contador > $fim) {
                            break;
                        }
                        $arquivos[] = $this->pasta . $listar;
                    }



                    $contador++;
                }
            }
        }

        return $arquivos;
    }



    function mostraPrimeira() {
         $ponteiro = opendir($this->pasta) or die("Erro: Diretorio inexistente");
        $total_itens = 0;
        while ($nome_itens = readdir($ponteiro)) {

            if($nome_itens != "." && $nome_itens != "..")
            {
                return $this->pasta."/".$nome_itens;
            }

        }


    }







    function paginacaoNumerica() {

        if ($this->total_registros != 0) {
            $this->link_pagina = $_SERVER[PHP_SELF];

            if ($this->pagina_total != 1) {

                echo "
                 <div class=\"grid_12\">

                <div class=\"clearfix\">&nbsp;</div>

                <ul id=\"pagination\">";

                $this->botaoPrimeira();
                $this->botaoNumeros();
                $this->botaoUltima();

                echo "</ul>
                       </div>";
            }
        }
    }

    private function botaoPrimeira() {


        if ($this->pagina_atual != 1) {

            if ($this->link_fk != '') {
                $fk_link = "&" . $this->link_fk;
            }

            $link = $this->link_pagina . '?pagina=1' . $fk_link . $this->busca_link;
            echo "<li class=\"previous\"><a href=\"$link\" title=\"Vá para a primeira página\">&laquo; Primeira</a></li>";
        }
    }

    private function botaoUltima() {

        if ($this->pagina_atual != $this->pagina_total) {

            if ($this->link_fk != '') {
                $fk_link = "&" . $this->link_fk;
            }
            $link = $this->link_pagina . '?pagina=' . $this->pagina_total . $fk_link . $this->busca_link;
            echo "<li class=\"next\"><a href=\"$link\" title=\"Vá para a última página\">Último &raquo;</a></li>";
        }
    }

    private function botaoProximo() {
        if ($this->link_fk != '') {
            $fk_link = "&" . $this->link_fk;
        }
        $link = $this->link_pagina . '?pagina=' . (($this->pagina_atual) + 1) . $fk_link . $this->busca_link;

        if ($this->pagina_atual != $this->pagina_total) {
            echo "<div class=\"paginacao_proxima\">";
            echo "<a title=\"Próxima\" class=\"botoes\" href=\"$link\">Pr&oacute;xima &raquo;</a>";
            echo "</div>";
        }
    }

    private function botaoAnterior() {
        if ($this->link_fk != '') {
            $fk_link = "&" . $this->link_fk;
        }
        $link = $this->link_pagina . '?pagina=' . (($this->pagina_atual) - 1) . $fk_link . $this->busca_link;

        if ($this->pagina_atual != 1) {
            echo "<div class=\"paginacao_anterior\">";
            echo "<a title=\"Anterior\" class=\"botoes\" href=\"$link\">&laquo; Anterior</a>";
            echo "</div>";
        }
    }

    private function botaoNumeros() {


        if ($this->pagina_total <= 10) {
            for ($total = 1; $total <= ($this->pagina_total); $total++) {

                if ($total == $this->pagina_atual) {

                    echo "<li class=\"active\">$total</li>";
                } else {
                    if ($this->link_fk != '') {
                        $fk_link = "&" . $this->link_fk;
                    }
                    $link = $this->link_pagina . '?pagina=' . $total . $fk_link . $this->busca_link;

                    echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
                }
            }
        } else {

            $sobra_frente = 0;
            $sobra_atras = 0;

            for ($total = (($this->pagina_atual) - 4); $total <= (($this->pagina_atual) - 1); $total++) {
                if (!($total >= 1)) {
                    $sobra_frente++;
                }
            }


            for ($total = (($this->pagina_atual) + 1); $total <= (($this->pagina_atual) + 4); $total++) {
                if (!($total <= $this->pagina_total)) {
                    $sobra_atras++;
                }
            }



            for ($total = (($this->pagina_atual) - 4) - $sobra_atras; $total <= (($this->pagina_atual) - 1); $total++) {
                if ($total >= 1) {

                    if ($this->link_fk != '') {
                        $fk_link = "&" . $this->link_fk;
                    }
                    $link = $this->link_pagina . '?pagina=' . $total . $fk_link . $this->busca_link;
                    echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
                }
            }

            echo "<li class=\"active\">$this->pagina_atual</li>";

            for ($total = (($this->pagina_atual) + 1); $total <= (($this->pagina_atual) + 4) + $sobra_frente; $total++) {
                if ($total <= $this->pagina_total) {
                    if ($this->link_fk != '') {
                        $fk_link = "&" . $this->link_fk;
                    }

                    $link = $this->link_pagina . '?pagina=' . $total . $fk_link . $this->busca_link;
                    echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
                }
            }
        }
    }

}
