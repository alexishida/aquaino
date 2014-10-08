<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        
 
            <div class="text-center" style="border-top: 1px solid #dbdbdb; padding-top: 14px; padding-bottom: 14px;">
                <p style="font-size: 16px; margin: 0;"><i class="fa fa-user mr_3"></i> <?=  $_SESSION['nome_usuario'] ?></p>
             </div>


        
        <!-- Menu -->
        <ul class="sidebar-menu">
            
            <li class="active">
                <a href="../home/index.php">
                    <i class="fa fa-dashboard"></i> <span>Painel</span>
                </a>
            </li>
            
            <li class="esconder">
                <a href="index.html">
                    <i class="fa fa-exclamation-triangle"></i> <span>Alertas</span>
                </a>
            </li>
            
            <li>
                <a href="../luminaria/index.php">
                    <i class="fa fa-lightbulb-o"></i><span> Luminária</span>
                </a>
            </li>
            
            <li class="treeview esconder">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Sensores</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Item</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Item</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Item</a></li>
                    
                </ul>
            </li>
            
            
            
            <li class="esconder">
                <a href="index.html">
                    <i class="fa fa-cog"></i> <span>Configurações</span>
                </a>
            </li>
           
        </ul>

     
            <div class="text-center">
                <a class="btn btn-danger" style="font-size: 12px; padding-right: 12px; color: #fff; margin-top: 20px;" href="../home/login.php?sair"><i class="fa fa-sign-out"></i> Sair</a>
            </div>
     


        <a class="logo-menu">
            <img src="../assets/img/aquaino-logo-relevo.png" />
        </a>   
    </section>

</aside>