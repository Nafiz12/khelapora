<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<?php
$user_session=$this->session->userdata('system.user');

?>

<?php
$action = $this->uri->segment(2);

?>


 <div class="panel mb25 mt5">
                        <div class="panel-heading">
                            <span class="panel-title"> Add Leave Category</span>
                            <ul class="nav panel-tabs-border panel-tabs">
                                <li class="active">
                                    <a href="#tab1_1" data-toggle="tab"></a>
                                </li>
                                
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body p20 pb10">
                            <form class="form-horizontal" action="<?php echo site_url('leave_managements/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">

                           <?php if ($action == "edit") { ?>

                            <input type="hidden" name="LeaveCategoryId" value="<?php echo isset($row->LeaveCategoryId)?$row->LeaveCategoryId:""?>">
                            <?php } ?>

                            <div class="tab-content pn br-n admin-form">
                                <div id="tab1_1" class="tab-pane active">
                                    <div class="section row mbn">
                                        <div class="col-md-9 pl15">
                                            <div class="section row mb15">
                                                <div class="col-xs-4">
                                                    <label for="name" class="field prepend-icon">

                                                         <?php echo form_input(array('name' => 'Name','id' => 'Name','maxlength'=>'100','placeholder'=>'Name','class'=>'event-name gui-input br-light light'),set_value('Name',isset($row->Name)?$row->Name:""));?>
                                                        <?php echo form_error('Name','<div class="error">', '</div>'); ?>

                                                       
                                                        <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <div class="col-sm-8">
                                            <p class="text-center">
                                                <input class="btn btn-primary" value="Save " type="submit"></input>
                                            </p>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    </div>


                    