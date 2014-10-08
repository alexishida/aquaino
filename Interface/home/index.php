<?php 
require_once('../classes/config.php');
require_once('../classes/autoload.php');
require_once('../classes/Seguranca.session.php');
require_once '../header.php';
?>




<!-- Css da pagina -->
<link href="assets/css/index.css" rel="stylesheet" type="text/css" />


</head>

    <body class="skin-aquaino">
        
        

        
        <?php require_once '../topo.php'; ?>
        
        
        
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
           
            
            <?php require_once '../menu.php';?>
          

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                
                

                <!-- Main content -->
                <section class="content">

                    
                    
                   <!-- Widgets mini -->
                   <?php include 'widgets_mini.php'; ?>
                   <!-- /.Widgets mini --> 
                    
                    
                    
                    
                    
                    <!-- Main row -->
                    <div class="row">
                        
                        
                        <!-- Widgets da Esquerda -->
                       <?php include 'widgets_esquerda.php'; ?>
                        <!-- /.Widgets da Esquerda -->

                        
                        <!-- Widgets da direita -->
                        <?php include 'widgets_direita.php'; ?>
                        <!-- /.Widgets da direita -->

                        
                    </div>
                    <!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <?php require_once '../javascript.php'; ?>
        <!-- jQuery Knob Chart -->
        <script src="../assets/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        
        <!-- Javascript da página -->
        <script src="assets/js/index.js" type="text/javascript"></script>
    </body>
</html>