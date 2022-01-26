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
                            <form class="form-horizontal" action="<?php echo site_url('leave_calculations/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">

                           <?php if ($action == "edit") { ?>

                            <input type="hidden" name="LeaveCalculationId" value="<?php echo isset($row->LeaveCalculationId)?$row->LeaveCalculationId:""?>">
                            <?php } ?>

                            <div class="tab-content pn br-n admin-form">
                                <div id="tab1_1" class="tab-pane active">
                                    <div class="section row mbn">
                                        <div class="col-md-9 pl15">
                                            <div class="section row mb15">
                                                <div class="col-xs-6">
                                                    <label for="year" class="field prepend-icon">

                                                         <?php echo form_input(array('name' => 'Year','id' => 'Year','maxlength'=>'100','placeholder'=>'Year Of Experience','class'=>'event-name gui-input br-light light'),set_value('Year',isset($row->Year)?$row->Year:""));?>
                                                        <?php echo form_error('Year','<div class="error">', '</div>'); ?>

                                                       
                                                        <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="section row mb15">
                                                <div class="col-xs-6">
                                                    <label for="leave_number" class="field prepend-icon">

                                                         <?php echo form_input(array('name' => 'SickLeave','id' => 'SickLeave','maxlength'=>'100','placeholder'=>'Number Of Sick Leave','class'=>'event-name gui-input br-light light'),set_value('SickLeave',isset($row->SickLeave)?$row->SickLeave:""));?>
                                                        <?php echo form_error('SickLeave','<div class="error">', '</div>'); ?>

                                                       
                                                        <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="section row mb15">
                                                <div class="col-xs-6">
                                                    <label for="leave_number" class="field prepend-icon">

                                                         <?php echo form_input(array('name' => 'EarnLeave','id' => 'EarnLeave','maxlength'=>'100','placeholder'=>'Number Of Earn Leave','class'=>'event-name gui-input br-light light'),set_value('EarnLeave',isset($row->EarnLeave)?$row->EarnLeave:""));?>
                                                        <?php echo form_error('EarnLeave','<div class="error">', '</div>'); ?>

                                                       
                                                        <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="section row mb15">
                                               <div class="col-xs-6">
                                            <p class="text-left">
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


                    