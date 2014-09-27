<?php
/*
    Classe para Paginação simples de dados
 
    Versão: 0.2
     Data: 26/04/2012
     Autor: Alex Ishida
     E-mail: alexishida@gmail.com
 
 */

Class Paginacao
{
    //-------------------------------------

    public $limite; // Limite para ordenaçao
    public $tabela; // Nome da Tabela para busca
    public $campos_busca; // Campos para a pesquisa separados por ,
    public $campo_ordenar = 'id'; // Campo para ordernar
    public $tipo_ordenacao = 'DESC'; // Tipo de ordenacao
    public $fk_campo; // Fk do tabela pai

    //-------------------------------------

    public $ultima;
    public $pagina_atual;
    public $pagina_total;
    public $total_registros;
    public $fk_dado;
    public $link_pagina;
    public $query_busca;
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

        if(isset($_GET['fk']))
        {
            $this->fk_dado = $_GET['fk'];
        }



        if($opcao == 'resultado')
        {

                if(isset($_REQUEST["busca"]))
                {
                    $this->busca = AntiInjection::proteger($_REQUEST["busca"]);
                    $this->busca_link = '&busca='.AntiInjection::remover($this->busca);

                    $inicio_query = "SELECT * FROM `".$this->tabela.'` WHERE ';

                    $campos = explode(',', $this->campos_busca);
                    $total_campos = count($campos);

                    for($posicao=0;$posicao<=$total_campos-1;$posicao++)
                    {
                        $busca_query = $busca_query.' `'.$campos[$posicao]."` LIKE '%".$this->busca."%' ";
                        if(($total_campos > 1) && ($posicao != $total_campos-1) )
                        {
                            $busca_query = $busca_query.' OR';
                        }
                    }

                    $ordenacao_query = " ORDER BY ".$this->campo_ordenar." ".$this->tipo_ordenacao;
                    $limit_query = " LIMIT ".$this->ultima." , ".$this->limite;


                    if($this->fk_campo != '')
                    {
                        $fk_query = " AND ".$this->fk_campo." = '".$this->fk_dado."'";
                    }
                    
                    return $inicio_query.$busca_query.$fk_query.$ordenacao_query.$limit_query;


                }
                else
                {
                    if($this->fk_campo != '')
                    {
                        $fk_query = " WHERE ".$this->fk_campo." = '".$this->fk_dado."'";
                    }
                    
                    return "SELECT * FROM `".$this->tabela."`".$fk_query." ORDER BY ".$this->campo_ordenar." ".$this->tipo_ordenacao." LIMIT ".$this->ultima." , ".$this->limite;
                }

        }

        if($opcao == 'total')
        {

            if(isset($_REQUEST["busca"]))
                {
                    $this->busca = AntiInjection::proteger($_REQUEST["busca"]);


                    $inicio_query = "SELECT COUNT(*) as TOTAL FROM `".$this->tabela.'` WHERE ';

                    $campos = explode(',', $this->campos_busca);
                    $total_campos = count($campos);

                    for($posicao=0;$posicao<=$total_campos-1;$posicao++)
                    {
                        $busca_query = $busca_query.' `'.$campos[$posicao]."` LIKE '%".$this->busca."%' ";
                        if(($total_campos > 1) && ($posicao != $total_campos-1) )
                        {
                            $busca_query = $busca_query.' OR';
                        }
                    }

                    if($this->fk_campo != '')
                    {
                        $fk_query = " AND ".$this->fk_campo." = '".$this->fk_dado."'";
                    }


                    return $inicio_query.$busca_query.$fk_query;


                }
                else
                {
                    if($this->fk_campo != '')
                    {
                        $fk_query = " WHERE ".$this->fk_campo." = '".$this->fk_dado."'";
                    }

                    return "SELECT COUNT(*) as TOTAL FROM ".$this->tabela.$fk_query;
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



     

     function paginacaoBusca()
     {

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

             if($this->fk_campo != '')
             {
                $fk_link = "&fk=".$this->fk_dado;
             }

            $link = $this->link_pagina.'?pagina=1'.$fk_link.$this->busca_link;
            echo "<li class=\"previous\"><a href=\"$link\" title=\"Vá para a primeira página\">&laquo; Primeira</a></li>";
            
        //    $link = $this->link_pagina.'?pagina='.(($this->pagina_atual)-1);
         //   echo "<a href=\"$link\" >&laquo;</a>";
        }

    }


    
    function botaoUltima()
    {
        
        if($this->pagina_atual != $this->pagina_total)
        {
          //  $link = $this->link_pagina.'?pagina='.(($this->pagina_atual)+1);
          //  echo "<a href=\"$link\" >&raquo;</a>";

            if($this->fk_campo != '')
             {
                $fk_link = "&fk=".$this->fk_dado;
             }
            $link = $this->link_pagina.'?pagina='.$this->pagina_total.$fk_link.$this->busca_link;
            echo  "<li class=\"next\"><a href=\"$link\" title=\"Vá para a última página\">Último &raquo;</a></li>";
             

        }
    }


    

    function botaoProximo()
    {
        if($this->fk_campo != '')
        {
                $fk_link = "&fk=".$this->fk_dado;
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
        if($this->fk_campo != '')
        {
            $fk_link = "&fk=".$this->fk_dado;
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
        if($this->fk_campo != '')
        {
            $fk_link = "&fk=".$this->fk_dado;
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
                    if($this->fk_campo != '')
                     {
                        $fk_link = "&fk=".$this->fk_dado;
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
               
                 if($this->fk_campo != '')
                 {
                    $fk_link = "&fk=".$this->fk_dado;
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
                 if($this->fk_campo != '')
                     {
                        $fk_link = "&fk=".$this->fk_dado;
                     }

                 $link = $this->link_pagina.'?pagina='.$total.$fk_link.$this->busca_link;
                 echo "<li><a href=\"$link\" title=\"Vá para a página $total\">$total</a></li>";
               }

            }
            



       }

    }


}
