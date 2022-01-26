<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript"> $(window).load(function() {
        //$('#mydate').glDatePicker({ dateFormat: 'yy-mm-dd' });
        $('#mydate1').glDatePicker({ dateFormat: 'yy-mm-dd' });
        $('#mydate2').glDatePicker({ dateFormat: 'yy-mm-dd' });
    }); </script>
<?php
$user_session=$this->session->userdata('system.user'); 
?>

<?php
$action = $this->uri->segment(2);


$leave_categories = array('' => "---- Select Category ----");
foreach ($leave_category as $a) {
    $leave_categories[$a['LeaveCategoryId']] = $a['Name'];
}
?>


 <div class="panel mb25 mt5">
                        <div class="panel-heading">
                            <span class="panel-title"> Add Leave Information</span>
                            <ul class="nav panel-tabs-border panel-tabs">
                                <li class="active">
                                    <a href="#tab1_1" data-toggle="tab"></a>
                                </li>
                                
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body p20 pb10">
                            <form class="form-horizontal" action="<?php echo site_url('leave_applies/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">

                           <?php if ($action == "edit") { ?>

                            <input type="hidden" name="LeaveApplicationId" value="<?php echo isset($row->LeaveApplicationId)?$row->LeaveApplicationId:""?>">
                            <?php } ?>

                            <div class="tab-content pn br-n admin-form">

                               

                                <div id="tab1_1" class="tab-pane active">

                                    <div class="section row mbn">
                                        <div class="col-md-6 pl15">
                                            <div class="section row mb15">
                                                <div class="col-xs-10">
                                                    <label for="name" class="field prepend-icon">

                                                         <?php echo form_input(array('name' => 'Name','id' => 'Name','readonly'=>'readonly', 'maxlength'=>'100','placeholder'=>'Name','class'=>'event-name gui-input br-light light'),set_value('Name',$user_session['login']));?>
                                                        <?php echo form_error('Name','<div class="error">', '</div>'); ?>

                                                       <label for="name" class="field-icon"><i class="fa fa-user"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>
                                           
                                            <div class="section row mb15">
                                                <div class="col-xs-10">
                                                <label class="field select">

                                                     <?php echo form_dropdown('LeaveCategoriesId',$leave_categories,set_value('LeaveCategoriesId',isset($row->LeaveCategoriesId)?$row->LeaveCategoriesId:""),'id="LeaveCategoriesId"');?>
                                                     <i class="arrow double"></i>
                
                                                 <?php echo form_error('LeaveCategoriesId','<div class="error">', '</div>'); ?>
                                                 <i class="arrow double"></i>
                                                </label>
                                                </div>
                                            </div>
                                            <div class="section row mb15">
                                                <div class="col-xs-10">
                                                    <label for="filter-datepicker" class="field prepend-picker-icon">

                                                     <?php echo form_input(array('name' => 'Date','id' => 'mydate3','type'=>'text','readonly'=>'readonly','maxlength'=>'100','placeholder'=>'Date','class'=>'event-name gui-input br-light light'),set_value('Date',date("Y-m-d")));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                                      <?php echo form_error('Date','<div class="error">', '</div>'); ?>
                                              
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="section row mb15">
                                                <div class="col-xs-10">
                                                      <label for="filter-datepicker" class="field prepend-picker-icon">
                                                         <?php echo form_input(array('name' => 'FromDate','id' => 'mydate1','type'=>'text','maxlength'=>'100','placeholder'=>'From Date','class'=>'event-name gui-input br-light light'),set_value('FromDate',isset($row->FromDate)?$row->FromDate:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                                            <?php echo form_error('FromDate','<div class="error">', '</div>'); ?>
                                              
                                                       </label>
                                                </div>
                                            </div>
                                            <div class="section row mb15">
                                                <div class="col-xs-10">
                                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                                         <?php echo form_input(array('name' => 'ToDate','id' => 'mydate2','type'=>'text','maxlength'=>'100','placeholder'=>'To Date','class'=>'event-name gui-input br-light light'),set_value('ToDate',isset($row->Todate)?$row->Todate:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                                            <?php echo form_error('ToDate','<div class="error">', '</div>'); ?>
                                              
                                                 </label>

                                                </div>
                                            </div>
                                             <div class="section row mb15">
                                                <div class="col-xs-10">
                                                     <label for="lastaddr" class="field prepend-icon">

                                            <?php echo form_input(array('name' => 'Reason','id' => 'Reason','maxlength'=>'100','placeholder'=>'Reason','class'=>'event-name gui-input br-light light'),set_value('Reason',isset($row->Reason)?$row->Reason:""));?>
                                                        <?php echo form_error('Reason','<div class="error">', '</div>'); ?>
                                                   <label for="reason" class="field-icon"><i class="fa fa-map-marker"></i>
                                            </label>
                                        </label>
                                                </div>
                                                
                                            </div>
                                       <div class="col-xs-6">
                                            <p class="text-left">
                                                <input class="btn btn-primary" value="Save " type="submit"></input>
                                            </p>
                                        </div>
                                            
                                        </div>
                                        <div class="col-md-6 pl15">
                                            <table border="2 px">
                                                <tr>
                                                    <th style="width: 120px; height: 30px; text-align: center">
                                                    Name
                                                    </th>
                                                    <td style="width: 120px; height: 30px; text-align: center">
                                                    <?php echo $user_session['login']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 120px; height: 30px; text-align: center">
                                                    Sick Leave
                                                    </th>
                                                    <td style="width: 120px; height: 30px; text-align: center">
                                                    <?php echo $leave_info['SickLeave']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 120px; height: 30px; text-align: center">
                                                    Earned Leave
                                                    </th>
                                                    <td style="width: 120px; height: 30px; text-align: center">
                                                    <?php echo $leave_info['EarnLeave']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 120px; height: 30px; text-align: center">
                                                    total Leave
                                                    </th>
                                                    <td style="width: 120px; text-align: center">
                                                    <?php echo $leave_info['SickLeave']+$leave_info['EarnLeave']; ?>
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <th style="width: 120px; height: 30px; text-align: center">
                                                    Leave Used
                                                    </th>
                                                    <td style="width: 120px; text-align: center">
                                                    <?php echo $leave_info['approved_leave']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="width: 120px; height: 30px; text-align: center">
                                                    Remaining Leave
                                                    </th>
                                                    <td style="width: 120px; text-align: center">
                                                    <?php echo $leave_info['SickLeave']+$leave_info['EarnLeave']-$leave_info['approved_leave']; ?>
                                                    </td>
                                                </tr>
                                            
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end section row -->

                                </div>
                           
                            </div>
                        </div>
                    </div>
                    </div>

