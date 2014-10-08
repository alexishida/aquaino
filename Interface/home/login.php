<?php
require_once '../header.php';

require_once('../classes/config.php');
require_once('../classes/autoload.php');

  if(isset($_GET['sair']))
    {
        session_destroy();
        
    }


if (isset($_POST['login'])) {
    $usuarios = new Usuarios();
    $usuarios->autenticaUsuario();
}



$ip_usuario = $_SERVER['REMOTE_ADDR'];

$ip_arr = explode('.', $ip_usuario);

if ($ip_arr[0] == "192" && $ip_arr[1] == "168") {
    $url_background = "http://192.168.0.12:8181";
} else {
    $url_background = "http://alexishida.sytes.net:8181";
}
?>

<!-- Css da pagina -->
<link href="assets/css/login.css" rel="stylesheet" type="text/css" />

</head>
<body class="skin-aquaino">

    <div class="fullscreen background" style="background-image:url('<?= $url_background ?>');" data-img-width="800" data-img-height="600">
        <div class="content-a">
            <div class="content-b">





                <div class="form-box" id="login-box">
                    <div class="header"><img src="../assets/img/aquaino-logo.png" /></div>
                    <form action="login.php" method="post">
                        <div class="body bg-gray">

                            <?php Erro::visualiza(); ?>

                            <div class="form-group">
                                <input type="text" name="login" class="form-control" placeholder="Usuário"/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha"/>
                            </div>          
                        </div>
                        <div class="footer">                                                               
                            <button type="submit" class="btn bg-login btn-block">Entrar</button>  

                            <p class="esconder"><a href="#">I forgot my password</a></p>

                            <a href="register.html" class="text-center esconder">Register a new membership</a>
                        </div>
                    </form>

                    <div class="margin text-center esconder">
                        <br/>
                        <a class="btn bg-light-blue btn-circle" href="https://www.facebook.com/aquaino" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a class="btn bg-aqua btn-circle" href="http://www.twitter.com/aquainobr" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>



            </div>
        </div>
    </div>



<?php require_once '../javascript.php'; ?>
    <!-- Javascript da página -->
    <script src="assets/js/login.js" type="text/javascript"></script>
</body>
</html>