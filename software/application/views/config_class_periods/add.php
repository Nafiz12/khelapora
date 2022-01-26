<title><?php echo $title;?></title>

<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}

$course_options = array('' => "Select Course");

$day_options = array('saturday'=>'Saturday','sunday'=>'Sunday','monday'=>'Monday','tuesday'=>'Tuesday','thursday'=>'Thursday','friday'=>'Friday');
foreach ($class_list as $row1) {

    // echo "<pre>";print_r($row1);
    $course_options[$row1->ClassId] = $row1->ClassName;
}
$location_data=$this->session->userdata('system.branch');
?>
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-tasks"></span><span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('config_class_periods/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="BatchId" value="<?php echo isset($row->BatchId)?$row->BatchId:""?>">
                            <?php
                        }
                        ?>


                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-12 text-left control-label">Branch</label><br>
                                    <div class="col-lg-12">
                                        <?php
                                        if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                            echo form_dropdown('cbo_branch', $branch_options, set_value('cbo_branch', isset($row->BranchId)?$row->BranchId:""),'id="cbo_branch" required="required" class="custom_checkbox" ');
                                        }else {
                                            echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId_1', isset($row->BranchId)?$row->BranchId:$location_data['BranchId']),' disabled="disabled" id="BranchId_1" class="custom_checkbox"');
                                            echo form_input(array('name' => 'cbo_branch', 'id' => 'cbo_branch', 'maxlength' => '4', 'type' => 'hidden'), set_value('cbo_branch', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])));
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                           
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 text-left control-label">Course Name</label><br>
                                <div class="col-lg-12">
                                    <?php echo form_dropdown('CourseId', $course_options, set_value('CourseId', (isset($row->CourseId) ? $row->CourseId : "")), 'id="CourseId" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('CourseId'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 text-left control-label">Batch Name</label><br>
                                <div class="col-lg-12">
                                    <input type="text" required="required" name="BatchName" id="BatchName" class="form-control" value="<?php echo isset($row->BatchName)?$row->BatchName:""; ?>" placeholder="Name">
                                    <?php echo form_error('BatchName'); ?>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-2">
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 text-left control-label">Day</label><br>
                                <div class="col-lg-12">
                                    <?php echo form_dropdown('Day', $day_options, set_value('Day', (isset($row->Day) ? $row->Day : "")), 'id="Day" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('Day'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-2">
                           <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label"> Start Time</label><br>


                            <div class="col-lg-12">
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control" required="required" name="StartTime" id="StartTime" value="<?php echo isset($row->StartTime)?$row->StartTime:"00:00"; ?>" >
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                               
                                <?php echo form_error('StartTime'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label"> End Time</label><br>
                             <div class="col-lg-12">
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control" required="required" name="EndTime" id="EndTime" value="<?php echo isset($row->EndTime)?$row->EndTime:"00:00"; ?>" >
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                               
                                <?php echo form_error('EndTime'); ?>
                            </div>
                            
                        </div>
                    </div>
                </div>



                <div class="row" style="float:center">
                    <div class="col-md-2"></div>

                    <div class="col-md-2">
                     <input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" >
                 </div>
                 <div class="col-md-2">
                     <button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button>
                 </div>
                 <div class="col-md-2"></div>
                 <div class="col-md-2"></div>
             </div>


         </div>
     </form>
 </div>
</div>
