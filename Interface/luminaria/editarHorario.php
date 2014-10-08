<?php 
require_once('../classes/config.php');
require_once('../classes/autoload.php');
require_once('../classes/Seguranca.session.php');

require_once '../header.php';

$luminaria_horarios = new LuminariaHorarios();

if (isset($_GET['id'])) {
    if (isset($_GET['acao']) && $_GET['acao'] == 'atualizar') {
        if (isset($_POST['canal_01'])) {
            $luminaria_horarios->atualizar();
            header("Location: index.php");
            exit;
        }
    }
    $luminaria_horarios_dados = $luminaria_horarios->unicoResultado();
} else {
    header("Location: index.php");
    exit;
}
?>



<!-- bootstrap slider -->
<link href="../assets/css/bootstrap-slider/slider.css" rel="stylesheet" type="text/css" />



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


                <div id="modo_manual" class="row">
                    <div class="col-sm-12">
                        <form id="frm_horarios" action="editarHorario.php?acao=atualizar&id=<?= $_GET['id'] ?>" method="POST">
                            <div class="box box-solid">
                                <div class="box-header"></div>

                                <div class="box-body">


                                    <h3 class="page-header mt_0"><i class="fa fa-pencil-square-o mr_3"></i> Editar</h3>


                                    <h3 class="mb_20"><?= $luminaria_horarios_dados->tempo_inicial ?> - <?= $luminaria_horarios_dados->tempo_final ?></h3>


                                    <div class="margin">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Violeta</p>
                                        <input id="slider_canal_01" name="canal_01" type="text" value="" class="slider form-control" data-slider-id="slider_violeta" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Branco</p>
                                        <input id="slider_canal_02" name="canal_02" type="text" value="" class="slider form-control" data-slider-id="slider_branco" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Vermelho</p>
                                        <input id="slider_canal_03" name="canal_03" type="text" value="" class="slider form-control" data-slider-id="slider_vermelho" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Azul</p>
                                        <input id="slider_canal_04" name="canal_04" type="text" value="" class="slider form-control" data-slider-id="slider_azul" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Ultra Violeta</p>
                                        <input id="slider_canal_05" name="canal_05" type="text" value="" class="slider form-control" data-slider-id="slider_ultravioleta" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Actínio</p>
                                        <input id="slider_canal_06" name="canal_06" type="text" value="" class="slider form-control" data-slider-id="slider_actinio" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">
                                        <p><i class="fa fa-lightbulb-o mr_3"></i> Verde</p>
                                        <input id="slider_canal_07" name="canal_07" type="text" value="" class="slider form-control" data-slider-id="slider_verde" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="hide">



                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button class="btn btn-success" type="submit">Salvar</button>
                                    <a class="btn btn-danger" href="index.php">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->


<?php require_once '../javascript.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {

            $('.slider').slider();
            
            /* jQueryKnob */
            $(".knob").knob();

            alteraTodosSliders(<?= $luminaria_horarios_dados->canal_01 ?>, <?= $luminaria_horarios_dados->canal_02 ?>, <?= $luminaria_horarios_dados->canal_03 ?>, <?= $luminaria_horarios_dados->canal_04 ?>, <?= $luminaria_horarios_dados->canal_05 ?>, <?= $luminaria_horarios_dados->canal_06 ?>, <?= $luminaria_horarios_dados->canal_07 ?>);
            callBackSliders();
        });

    </script>
    <!-- Bootstrap slider -->
    <script src="../assets/js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>

    <!-- jQuery Knob Chart -->
    <script src="assets/js/editarHorario.js" type="text/javascript"></script>

</body>
</html>