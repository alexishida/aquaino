<section class="col-lg-5 connectedSortable"> 




    <!-- Camera box -->
    <div class="box box-solid bg-black-gradient">
        <div class="box-header">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-flat btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->

            <i class="fa fa-video-camera"></i><h3 class="box-title">Câmera (Ao Vivo)</h3>
        </div>
        <div class="box-body">

            <iframe width="100%" height="400px"src="http://alexishida.sytes.net:8080/camera.php" class="center-block" style="border:none;"></iframe>


        </div><!-- /.box-body-->

    </div>
    <!-- /.Camera box -->

    
   
    



    <!-- solid sales graph -->
    <div class="box box-solid bg-teal-gradient esconder">
        <div class="box-header">
            <i class="fa fa-th"></i>
            <h3 class="box-title">Sales Graph</h3>
            <div class="box-tools pull-right">
                <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body border-radius-none">
            <div class="chart" id="line-chart" style="height: 250px;"></div>                                    
        </div><!-- /.box-body -->
        <div class="box-footer no-border">
            <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                    <div class="knob-label">Mail-Orders</div>
                </div><!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                    <div class="knob-label">Online</div>
                </div><!-- ./col -->
                <div class="col-xs-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                    <div class="knob-label">In-Store</div>
                </div><!-- ./col -->
            </div><!-- /.row -->
        </div><!-- /.box-footer -->
    </div>
    <!-- /.box -->                            

    <!-- Calendar -->
    <div class="box box-solid bg-green-gradient esconder">
        <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                    </ul>
                </div>
                <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                                        
            </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
        </div><!-- /.box-body -->  
        <div class="box-footer text-black">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Progress bars -->
                    <div class="clearfix">
                        <span class="pull-left">Task #1</span>
                        <small class="pull-right">90%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">Task #2</span>
                        <small class="pull-right">70%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="clearfix">
                        <span class="pull-left">Task #3</span>
                        <small class="pull-right">60%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">Task #4</span>
                        <small class="pull-right">40%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->                                                                        
        </div>
    </div>
    <!-- /.box -->                            

</section>