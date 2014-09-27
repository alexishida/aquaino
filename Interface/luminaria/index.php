<?php
require_once('../classes/config.php');
require_once('../classes/autoload.php');

require_once '../header.php';


$atual_luminaria = new AtualLuminaria();
$dados_atual = $atual_luminaria->obterDados();

$luminaria_horarios = new LuminariaHorarios();
$resultado_horarios = $luminaria_horarios->obtemTodos();
?>



<!-- bootstrap slider -->
<link href="../assets/css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />

<!-- Css da pagina -->
<link href="assets/css/index.css" rel="stylesheet" type="text/css" />


</head>

<body class="skin-aquaino">




    <?php require_once '../topo.php'; ?>




    <div class="wrapper row-offcanvas row-offcanvas-left">


        <?php require_once '../menu.php'; ?>


        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">


            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1> <span class="fa fa-lightbulb-o mr_3"></span> Luminária</h1>
            </section>



            <!-- Main content -->
            <section class="content">


                <div class="row">
                    <div class="col-sm-12">
                        <div class="box box-solid">
                            <div class="box-header"></div>

                            <div class="box-body">
                                <h3 class="page-header mt_0 mb_10"><i class="fa fa-cog mr_3"></i> Configurações Gerais</h3>

                                <div class="row margin text-center">

                                    <div class="col-xs-12 col-md-3">
                                        <div class="mt_20 hidden-xs"></div>
                                        <p>Modo de Iluminação</p>
                                        <div class="btn-group btn_switch">
                                            <button id="btn_modo_automatico" type="button" class="btn btn-default" onclick="javascript:modoIluminacao('automatico', true, true);">Automático</button>
                                            <button id="btn_modo_manual" type="button" class="btn btn-primary" onclick="javascript:modoIluminacao('manual', true, true);" disabled="">Manual</button>
                                            <input type="hidden" id="modo_luminaria" name="modo_luminaria" value="">
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_01" name="knob_canal_01" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#ea80fc"/>
                                        <div class="knob-label">Violeta</div>
                                    </div><!-- ./col -->

                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_02" name="knob_canal_02" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#9e9e9e"/>
                                        <div class="knob-label">Branco</div>
                                    </div><!-- ./col -->


                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_03" name="knob_canal_03" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#e51c23"/>
                                        <div class="knob-label">Vermelho</div>
                                    </div><!-- ./col -->



                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_04" name="knob_canal_04" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#5677fc"/>
                                        <div class="knob-label">Azul</div>
                                    </div><!-- ./col -->



                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_05" name="knob_canal_05" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#ab47bc"/>
                                        <div class="knob-label">Ultra Violeta</div>
                                    </div><!-- ./col -->

                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_06" name="knob_canal_06" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#9fa8da"/>
                                        <div class="knob-label">Actínio</div>
                                    </div><!-- ./col -->


                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input id="knob_canal_07" name="knob_canal_07" type="text" class="knob" data-readonly="true" value="0" data-width="80" data-height="80" data-fgColor="#64dd17"/>
                                        <div class="knob-label">Verde</div>
                                    </div>

                                </div>  


                            </div>
                        </div>
                    </div>
                </div>    


                <div id="potencia_maxima" class="row">
                    <div class="col-sm-12">

                        <div class="box box-solid">
                            <div class="box-header"></div>

                            <div class="box-body">


                                <h3 class="page-header mt_0"><i class="fa fa-sliders mr_3"></i> Potência Máxima</h3>

                                <form id="frm_modo_manual" action="" method="">
                                    <div class="margin">

                                        <input id="slider_potencia_maxima" name="slider_potencia_maxima" type="text" value="" class="slider form-control" data-slider-id="yellow" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>




                <div id="modo_automatico" class="row">
                    <div class="col-sm-12">

                        <div class="box box-solid">
                            <div class="box-header"></div>

                            <div class="box-body">


                                <h3 class="page-header mt_0"><i class="fa fa-sliders mr_3"></i> Modo Automático</h3>
                                <div class="margin">
                                    <p style="margin-bottom: 0;">Modo Tempestade</p>
                                    <p style="color: #A9A9A9;">(Obtem dados meteorológicos)</p>
                                    <div class="btn-group btn_switch mb_20">
                                        <button id="btn_mtempestade_on" type="button" class="btn btn-sm btn-success" disabled="" onclick="javascript:modoTempestade(true, true);">ON</button>
                                        <button id="btn_mtempestade_off" type="button" class="btn btn-sm btn-danger"  onclick="javascript:modoTempestade(false, true);">OFF</button>
                                        <input id="modo_tempestade" name="modo_tempestade" value="" type="hidden">
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-condensed table-striped tb_titulo_center">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Horário</th>
                                                    <th class="violeta">Violeta</th>
                                                    <th class="branco">Branco</th>
                                                    <th class="vermelho">Vermelho</th>
                                                    <th class="azul">Azul</th>
                                                    <th class="ultravioleta">Ultra Violeta</th>
                                                    <th class="actinio">Actínio</th>
                                                    <th class="verde">Verde</th>
                                                    
                                                </tr>

                                            </thead>
                                            <tbody class="text-center">
                                                
                                                <?php foreach ($resultado_horarios as $dados_horarios) { ?>
                                                <tr>
                                                    <td><?= $dados_horarios['tempo_inicial'] ?> - <?= $dados_horarios['tempo_final'] ?></td>
                                                    <td><a href="editarHorario.php?id=<?= $dados_horarios['id'] ?>" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> Alterar</a></td>
                                                    <td><?= $dados_horarios['canal_01'] ?></td>
                                                    <td><?= $dados_horarios['canal_02'] ?></td>
                                                    <td><?= $dados_horarios['canal_03'] ?></td>
                                                    <td><?= $dados_horarios['canal_04'] ?></td>
                                                    <td><?= $dados_horarios['canal_05'] ?></td>
                                                    <td><?= $dados_horarios['canal_06'] ?></td>
                                                    <td><?= $dados_horarios['canal_07'] ?></td>
                                                </tr>
                                                <?php } ?>

                                            </tbody>

                                        </table>
                                    </div>


                                </div>
                            </div>

                        </div>   

                    </div>
                </div>



                <div id="modo_manual" class="row">
                    <div class="col-sm-12">

                        <div class="box box-solid">
                            <div class="box-header"></div>

                            <div class="box-body">


                                <h3 class="page-header mt_0"><i class="fa fa-sliders mr_3"></i> Modo Manual</h3>

                                <form id="frm_modo_manual" action="" method="">
                                    <div class="margin">
                                        <p>Forçar Modo Tempestade</p>
                                        <div class="btn-group btn_switch mb_20">
                                            <button id="btn_ftempestade_on" type="button" class="btn btn-sm btn-success" disabled="" onclick="javascript:forcarTempestade(true, true);">ON</button>
                                            <button id="btn_ftempestade_off" type="button" class="btn btn-sm btn-danger"  onclick="javascript:forcarTempestade(false, true);">OFF</button>
                                            <input type="hidden" id="tempestade_forcar" name="tempestade_forcar" value="">
                                        </div>
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Violeta</p>
                                        <input id="slider_canal_01" name="slider_canal_01" type="text" value="" class="slider form-control" data-slider-id="slider_violeta" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Branco</p>
                                        <input id="slider_canal_02" name="slider_canal_02" type="text" value="" class="slider form-control" data-slider-id="slider_branco" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Vermelho</p>
                                        <input id="slider_canal_03" name="slider_canal_03" type="text" value="" class="slider form-control" data-slider-id="slider_vermelho" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Azul</p>
                                        <input id="slider_canal_04" name="slider_canal_04" type="text" value="" class="slider form-control" data-slider-id="slider_azul" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Ultra Violeta</p>
                                        <input id="slider_canal_05" name="slider_canal_05" type="text" value="" class="slider form-control" data-slider-id="slider_ultravioleta" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Actínio</p>
                                        <input id="slider_canal_06" name="slider_canal_06" type="text" value="" class="slider form-control" data-slider-id="slider_actinio" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Verde</p>
                                        <input id="slider_canal_07" name="slider_canal_07" type="text" value="" class="slider form-control" data-slider-id="slider_verde" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>




            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->


    <?php require_once '../javascript.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {

            $('.slider').slider();
            callBackSliders();
            /* jQueryKnob */
            $(".knob").knob();


            /* Configuracao inicial */
            modoIluminacao('<?= $dados_atual->modo ?>', false, false);
            forcarTempestade(<?= $dados_atual->tempestade_manual ?>, false);
            modoTempestade(<?= $dados_atual->tempestade ?>, false);
            alterarTodosKnobs(<?= $dados_atual->canal_01 . "," . $dados_atual->canal_02 . "," . $dados_atual->canal_03 . "," . $dados_atual->canal_04 . "," . $dados_atual->canal_05 . "," . $dados_atual->canal_06 . "," . $dados_atual->canal_07 ?>);
            alteraTodosSliders(<?= $dados_atual->canal_01 . "," . $dados_atual->canal_02 . "," . $dados_atual->canal_03 . "," . $dados_atual->canal_04 . "," . $dados_atual->canal_05 . "," . $dados_atual->canal_06 . "," . $dados_atual->canal_07 ?>);

            alteraSliderPotencia(<?= $dados_atual->potencia_maxima ?>);

        });

    </script>
    <!-- Bootstrap slider -->
    <script src="../assets/js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- Funções Javascript da página -->
    <script src="assets/js/index.js" type="text/javascript"></script>
</body>
</html>