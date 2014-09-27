<section class="col-lg-7 connectedSortable">  


    
      <!-- Luminária -->
    <div class="box box-solid">
        <div class="box-header">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-flat btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->

            <i class="fa fa-lightbulb-o"></i><h3 class="box-title">Luminária</h3>
        </div>
        <div class="box-body">
            
            
            
             <div class="row margin">
                
                <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="80" data-height="80" data-fgColor="#ea80fc"/>
                    <div class="knob-label">Violeta</div>
                </div><!-- ./col -->
                
                <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="80" data-height="80" data-fgColor="#9e9e9e"/>
                    <div class="knob-label">Branco</div>
                </div><!-- ./col -->
      
                 
                <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="80" data-height="80" data-fgColor="#e51c23"/>
                    <div class="knob-label">Vermelho</div>
                </div><!-- ./col -->
                
                
                  <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="80" data-height="80" data-fgColor="#5677fc"/>
                    <div class="knob-label">Azul</div>
                </div><!-- ./col -->
             
             </div>
            
            
             <div class="row margin">
                
                <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="80" data-height="80" data-fgColor="#ab47bc"/>
                    <div class="knob-label">Ultra Violeta</div>
                </div><!-- ./col -->
                
                <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="80" data-height="80" data-fgColor="#9fa8da"/>
                    <div class="knob-label">Actínio</div>
                </div><!-- ./col -->
       
            
                 <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="80" data-height="80" data-fgColor="#64dd17"/>
                    <div class="knob-label">Verde</div>
                </div>
                
                 <div class="col-xs-6 col-md-3 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="80" data-height="80" data-fgColor="#f39c12"/>
                    <div class="knob-label">Potência Máxima</div>
                </div>
                
             </div>  
             
               <div class="row margin esconder">
                <div class="col-xs-12 text-center">
                    <div class="row">
                        <div class="col-xs-4">
                            <span class="ion ion-ios7-thunderstorm pull-left"></span>
                            <h3 class="pull-left"> Modo Manual</h3>
                        </div>
                    </div>
                    <div class="row"><span class="ion ion-ios7-thunderstorm pull-left" style="font-size: 55px;"></span><h3 class="pull-left">Tempestade Ativada</h3></div>
                </div><!-- ./col -->
            </div>

    </div>
    <!-- /.Luminária -->
    
    
    
    
    
    
    
    <!-- Raspberry Pi info --> 
    <div class="box box-danger esconder" id="loading-example">


        <div class="box-header">


            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->


            <img src="../assets/img/rasp-logo-mini.png" class="rasp-mini-logo"/>

            <h3 class="box-title">Raspberry Pi</h3>
        </div><!-- /.box-header -->



        <div class="box-body no-padding">
            <div class="row">
                <div class="col-sm-7">
                    <!-- bar chart -->
                    <div class="chart" id="bar-chart" style="height: 250px;"></div>
                </div>
                <div class="col-sm-5">
                    <div class="pad">
                        <!-- Progress bars -->
                        <div class="clearfix">
                            <span class="pull-left">Bandwidth</span>
                            <small class="pull-right">10/200 GB</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">Transfered</span>
                            <small class="pull-right">10 GB</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 70%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">Activity</span>
                            <small class="pull-right">73%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-light-blue" style="width: 70%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">FTP</span>
                            <small class="pull-right">30 GB</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 70%;"></div>
                        </div>
                        <!-- Buttons -->
                        <p>
                            <button class="btn btn-default btn-sm"><i class="fa fa-cloud-download"></i> Generate PDF</button>
                        </p>
                    </div><!-- /.pad -->
                </div><!-- /.col -->
            </div><!-- /.row - inside box -->
        </div><!-- /.box-body -->
        <div class="box-footer">
            <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="text" class="knob" data-readonly="true" value="80" data-width="60" data-height="60" data-fgColor="#f56954"/>
                    <div class="knob-label">CPU</div>
                </div><!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                    <div class="knob-label">Disk</div>
                </div><!-- ./col -->
                <div class="col-xs-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                    <div class="knob-label">RAM</div>
                </div><!-- ./col -->
            </div><!-- /.row -->
        </div><!-- /.box-footer -->
    </div>
    <!-- /.Raspberry Pi info -->   






    <!-- Chat box -->
    <div class="box box-success esconder">
        <div class="box-header">
            <i class="fa fa-comments-o"></i>
            <h3 class="box-title">Chat</h3>
            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle" >
                    <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
            </div>
        </div>
        <div class="box-body chat" id="chat-box">
            <!-- chat item -->
            <div class="item">
                <img src="../assets/img/avatar.png" alt="user image" class="online"/>
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                        Mike Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
                <div class="attachment">
                    <h4>Attachments:</h4>
                    <p class="filename">
                        Theme-thumbnail-image.jpg
                    </p>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-sm btn-flat">Open</button>
                    </div>
                </div><!-- /.attachment -->
            </div><!-- /.item -->
            <!-- chat item -->
            <div class="item">
                <img src="../assets/img/avatar2.png" alt="user image" class="offline"/>
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                        Jane Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div><!-- /.item -->
            <!-- chat item -->
            <div class="item">
                <img src="../assets/img/avatar3.png" alt="user image" class="offline"/>
                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                        Susan Doe
                    </a>
                    I would like to meet you to discuss the latest news about
                    the arrival of the new theme. They say it is going to be one the
                    best themes on the market
                </p>
            </div><!-- /.item -->
        </div><!-- /.chat -->
        <div class="box-footer">
            <div class="input-group">
                <input class="form-control" placeholder="Type message..."/>
                <div class="input-group-btn">
                    <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box (chat box) -->                                                        





    <!-- TO DO List -->
    <div class="box box-primary esconder">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">To Do List</h3>
            <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <ul class="todo-list">
                <li>
                    <!-- drag handle -->
                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <input type="checkbox" value="" name=""/>
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name=""/>
                    <span class="text">Make the theme responsive</span>
                    <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name=""/>
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name=""/>
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name=""/>
                    <span class="text">Check your messages and notifications</span>
                    <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
                <li>
                    <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <input type="checkbox" value="" name=""/>
                    <span class="text">Let theme shine like a star</span>
                    <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>
            </ul>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
        </div>
    </div>
    <!-- /.box -->

    <!-- quick email widget -->
    <div class="box box-info esconder">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Quick Email</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div>
        <div class="box-body">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                </div>
                <div>
                    <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </form>
        </div>
        <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>




</section>