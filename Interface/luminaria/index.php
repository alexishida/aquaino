<?php require_once '../header.php'; ?>



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
                                            <button id="btn_modo_automatico" type="button" class="btn btn-default" onclick="javascript:modoIluminacao('automatico',true);">Automático</button>
                                            <button id="btn_modo_manual" type="button" class="btn btn-primary" onclick="javascript:modoIluminacao('manual',true);" disabled="">Manual</button>
                                        </div>
                                    </div>


                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="80" data-height="80" data-fgColor="#ea80fc"/>
                                        <div class="knob-label">Violeta</div>
                                    </div><!-- ./col -->

                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="80" data-height="80" data-fgColor="#9e9e9e"/>
                                        <div class="knob-label">Branco</div>
                                    </div><!-- ./col -->


                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="80" data-height="80" data-fgColor="#e51c23"/>
                                        <div class="knob-label">Vermelho</div>
                                    </div><!-- ./col -->



                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="80" data-height="80" data-fgColor="#5677fc"/>
                                        <div class="knob-label">Azul</div>
                                    </div><!-- ./col -->



                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="80" data-height="80" data-fgColor="#ab47bc"/>
                                        <div class="knob-label">Ultra Violeta</div>
                                    </div><!-- ./col -->

                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="80" data-height="80" data-fgColor="#9fa8da"/>
                                        <div class="knob-label">Actínio</div>
                                    </div><!-- ./col -->


                                    <div class="col-xs-6 col-md-3 mt_20">
                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="80" data-height="80" data-fgColor="#64dd17"/>
                                        <div class="knob-label">Verde</div>
                                    </div>

                                </div>  


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
                                
                                <p style="margin-bottom: 0;">Modo Tempestade</p>
                                <p style="color: #A9A9A9;">(Obtem dados meteorológicos)</p>
                                    <div class="btn-group btn_switch mb_20">
                                        <button id="btn_mtempestade_on" type="button" class="btn btn-sm btn-success" disabled="" onclick="javascript:modoTempestade(true);">ON</button>
                                        <button id="btn_mtempestade_off" type="button" class="btn btn-sm btn-danger"  onclick="javascript:modoTempestade(false);">OFF</button>
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

                                <div class="margin">
                                    <p>Forçar Modo Tempestade</p>
                                    <div class="btn-group btn_switch mb_20">
                                        <button id="btn_ftempestade_on" type="button" class="btn btn-sm btn-success" disabled="" onclick="javascript:forcarTempestade(true);">ON</button>
                                        <button id="btn_ftempestade_off" type="button" class="btn btn-sm btn-danger"  onclick="javascript:forcarTempestade(false);">OFF</button>
                                    </div>
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Violeta</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="violeta" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Branco</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="branco" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Vermelho</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="vermelho" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Azul</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="azul" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Ultra Violeta</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="ultravioleta" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Actínio</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="actinio" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                    <p><i class="fa fa-lightbulb-o mr_3"></i> Verde</p>
                                    <input type="text" value="" class="slider form-control" data-slider-id="verde" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="40" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                
                
                

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->


    <?php require_once '../javascript.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.slider').slider();
            /* jQueryKnob */
            $(".knob").knob();
            
            modoIluminacao('manual',false);
            forcarTempestade(true);
            modoTempestade(true);
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