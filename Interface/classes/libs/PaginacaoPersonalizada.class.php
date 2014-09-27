<?php
/*
     Classe para Paginação avançada de dados
 
     Versão: 0.2
     Data: 26/04/2012
     Autor: Alex Ishida
     E-mail: alexishida@gmail.com
 
 */

Class PaginacaoPersonalizada
{
    //-------------------------------------

    public $limite; // Limite para ordenaçao

    /*
        Escrever dados ate a clausa WHERE

        IMPORTANTE! obrigatorio de um id ( cidade.id as id )
    */

    public $query_original;
    
    /* Escrever dados que vem depois do WHERE e nos campos para busca
       digitar @BUSCA
      ex.: WHERE estado.uf LIKE '@BUSCA' OR cidade.nome LIKE '@BUSCA' */

    public $query_busca;

    public $query_order; // Escrever o que esta no order;

    /*
       Exemplo de Utilizacao

         $paginacao = new PaginacaoPersonalizada();
        $paginacao->limite = 15;
        $paginacao->query_original = "SELECT cidade.id as id, estado.nome as estado_nome,estado.id as estado_id, cidade.nome as cidade_nome FROM cidade INNER JOIN estado ON cidade.id_estado = estado.id";
        $paginacao->query_busca = "WHERE estado.id = ".AntiInjection::proteger($_GET['estado'])." AND (estado.nome LIKE '%@BUSCA%' OR cidade.nome LIKE '%@BUSCA%')";
        $paginacao->query_order = "ORDER BY cidade.id ASC";
        $paginacao->link_fk = "estado=".$_GET['estado'];
        $resultados = $paginacao->gerar();
     
     */

    //-------------------------------------
    
    public $link_fk;
    /*
         $paginacao->link_fk = "estado=".$_GET['estado'];

         Quando utilizar mais de um GET não esquecer de colocar os parametros de input hidden na busca do index.php

        <form id="pesquisaTabela" action="index.php" method="get" >

                           <input type="text"class="campoPesquisaTabela" name="busca" value="<?=$paginacao->busca; ?>"/>
          Assim   --->     <input name="estado" type="hidden" value="<?=$_GET['estado'] ?>" />
                           <input type="submit" class="submit" value="Pesquisar" />

         </form>

     */



    public $ultima;
    public $pagina_atual;
    public $pagina_total;
    public $total_registros;
    public $link_pagina;
    public $busca;
    public $busca_link;



    function totalRegistros()
    {
        Conexao::conectar();
        $sql = mysql_query($this->montaQuery('total'));
        return mysql_result($sql, 0, "TOTAL");

    }
    

    function resultado() 
    {
        Conexao::conectar();
        $retorno = array();
        $sql = mysql_query($this->montaQuery('resultado'));
        while($dados = mysql_fetch_array($sql))
        {
            array_push($retorno, $dados);
        }

         //Remove o SQL injection
        $this->busca = AntiInjection::remover($this->busca);
        
        return $retorno;

    }



    function montaQuery($opcao)
    {


        if($opcao == 'resultado')
        {

                if(isset($_REQUEST["busca"]))
                {
                    $this->busca = AntiInjection::proteger($_REQUEST["busca"]);
                    $this->busca_link = '&busca='.  AntiInjection::remover($this->busca);

                

                   $this->query_busca = str_replace("@BUSCA", $this->busca, $this->query_busca);

                   return $this->query_original.' '.$this->query_busca.' '.$this->query_order." LIMIT ".$this->ultima." , ".$this->limite;


                }
                else
                {
                    if($this->link_fk != '')
                    {
                         $this->query_busca = str_replace("@BUSCA", "", $this->query_busca);

                         return $this->query_original.' '.$this->query_busca.' '.$this->query_order." LIMIT ".$this->ultima." , ".$this->limite;
                    }
                     else {
                               return $this->query_original.' '.$this->query_order." LIMIT ".$this->ultima." , ".$this->limite;
                     }

                }

        }

        if($opcao == 'total')
        {

            if(isset($_REQUEST["busca"]))
                {
                    $this->busca = AntiInjection::proteger($_REQUEST["busca"]);
                     $this->query_busca = str_replace("@BUSCA", $this->busca, $this->query_busca);

                    return "SELECT COUNT(*) as TOTAL FROM ".$this->separaQuery($this->query_original).' '.$this->query_busca;
                    
                }
                else
                {
                     if($this->link_fk != '')
                    {
                         $this->query_busca = str_replace("@BUSCA", "", $this->query_busca);

                          return "SELECT COUNT(*) as TOTAL FROM ".$this->separaQuery($this->query_original).' '.$this->query_busca;
                    }
                    else {
                        return "SELECT COUNT(*) as TOTAL FROM ".$this->separaQuery($this->query_original);
                    }
                }
                
        }







    }

    function gerar($teste=0)
    {

        
        $this->pagina_atual = 1;
        $this->total_registros = $this->totalRegistros();
       
        // Seta o total de paginas
        $this->pagina_total = ceil($this->total_registros/$this->limite);

        if(isset($_GET["pagina"]))
        {
            $this->pagina_atual = AntiInjection::proteger($_GET["pagina"]);

            if($this->pagina_atual > $this->pagina_total)
            {
                 $this->pagina_atual = $this->pagina_total;
            }
        }


        // Seta o ultimo registro da busca
        $this->ultima = ($this->pagina_atual-1) * $this->limite;

        // Chamo a busca
        return $this->resultado();
    }



    

     function paginacaoNumerica()
    {

        if($this->total_registros != 0)
        {
             $this->link_pagina = $_SERVER[PHP_SELF];

            if($this->pagina_total != 1)
            {

                echo  "
                 <div class=\"grid_12\">

                <div class=\"clearfix\">&nbsp;</div>

                <ul id=\"pagination\">";

                $this->botaoPrimeira();
                $this->botaoNumeros();
                $this->botaoUltima();

                echo  "</ul>
                       </div>";

            }
        }

     }


    function separaQuery($query)
    {

        $query_separada = explode("FROM", $query);

        if($query_separada[0] != "")
        {
            return $query_separada[1];
        }
        else
        {
            $query_separada = explode("from", $query);
        
            return $query_separada[1];
        }


    }





     

     function NaoImplementadapaginacaoBusca()
     {
        /*
         *      Não implementada ainda
         *
         */
         if($this->total_registros != 0)
        {
             $this->link_pagina = $_SERVER[PHP_SELF];

             echo  "<div class=\"paginacao\">";
             echo	"<div class=\"paginacao_indice\">";

             $this->botaoAnterior();
             $this->botaoBusca();
             $this->botaoProximo();

             echo "</div>";
             echo "</div>";
        }
     }




    function botaoPrimeira()
    {
        

        if($this->pagina_atual != 1)
        {

             if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }

            $link = $this->link_pagina.'?pagina=1'.$fk_link.$this->busca_link;
            echo "<li class=\"previous\"><a href=\"$link\" title=\"Vá para a primeira página\">&laquo; Primeira</a></li>";
            
  
        }

    }


    
    function botaoUltima()
    {
        
        if($this->pagina_atual != $this->pagina_total)
        {
          
             if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }
            $link = $this->link_pagina.'?pagina='.$this->pagina_total.$fk_link.$this->busca_link;
            echo  "<li class=\"next\"><a href=\"$link\" title=\"Vá para a última página\">Último &raquo;</a></li>";
             

        }
    }


    

    function botaoProximo()
    {
         if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }
        $link = $this->link_pagina.'?pagina='.(($this->pagina_atual)+1).$fk_link.$this->busca_link;

        if($this->pagina_atual != $this->pagina_total)
        {
            echo "<div class=\"paginacao_proxima\">";
            echo "<a title=\"Próxima\" class=\"botoes\" href=\"$link\">Pr&oacute;xima &raquo;</a>";
            echo "</div>";
        }
    }


    

    function botaoAnterior()
    {
         if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }
        $link = $this->link_pagina.'?pagina='.(($this->pagina_atual)-1).$fk_link.$this->busca_link;

        if($this->pagina_atual != 1)
        {
            echo "<div class=\"paginacao_anterior\">";
            echo "<a title=\"Anterior\" class=\"botoes\" href=\"$link\">&laquo; Anterior</a>";
            echo "</div>";
        }

    }


    
    
    function botaoBusca()
    {
         if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }
        $link = $this->link_pagina.$fk_link.$this->busca_link;
        echo "<div class=\"paginacao_numeros\">";
        echo "<form id=\"paginacao_form\" name=\"paginacao_form\" method=\"get\" action=\"\">";
        echo "<input name=\"pagina\" type=\"text\" id=\"pagina\" size=\"3\" onchange=\"javascript: document.paginacao_form.submit();\" value=\"".$this->pagina_atual."\"  onclick=\"javascript: document.paginacao_form.pagina.value='';\" />&nbsp;de&nbsp;<span id=\"spanTotalPaginas\">".$this->pagina_total."</span>";
        if(isset($_REQUEST["busca"])) {
            echo "<input name=\"busca\" type=\"hidden\" value=\"".$_REQUEST["busca"]."\" />";
        }
        echo "</form>";
        echo "</div>";

    }

    
    function botaoNumeros()
    {


       if($this->pagina_total <= 10)
       {
            for($total=1;$total<=($this->pagina_total);$total++)
            {

                if($total == $this->pagina_atual)
                {
                    
                    echo "<li class=\"active\">$total</li>";

                }
                else
                {
                     if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }
                    $link = $this->link_pagina.'?pagina='.$total.$fk_link.$this->busca_link;

                     echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
                }

            }
       }
       else
       {

           $sobra_frente = 0;
           $sobra_atras = 0;

           for($total=(($this->pagina_atual)-4);$total<=(($this->pagina_atual)-1);$total++)
            {
              if(!($total>=1))
              {
                    $sobra_frente++;
              }

            }


            for($total=(($this->pagina_atual)+1);$total<=(($this->pagina_atual)+4);$total++)
            {
               if(!($total<=$this->pagina_total))
               {
                  $sobra_atras++;
               }

            }

          

            for($total=(($this->pagina_atual)-4)-$sobra_atras;$total<=(($this->pagina_atual)-1);$total++)
            {
              if($total>=1)
              {
               
                  if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }
                  $link = $this->link_pagina.'?pagina='.$total.$fk_link.$this->busca_link;
                    echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
              }
              
            }
    
            echo "<li class=\"active\">$this->pagina_atual</li>";

            for($total=(($this->pagina_atual)+1);$total<=(($this->pagina_atual)+4)+$sobra_frente;$total++)
            {
               if($total<=$this->pagina_total)
               {
                if($this->link_fk != '')
             {
                $fk_link = "&".$this->link_fk;
             }

                 $link = $this->link_pagina.'?pagina='.$total.$fk_link.$this->busca_link;
                 echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
               }

            }
            



       }

    }


}
