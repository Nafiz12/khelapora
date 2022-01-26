<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/css/jquery.autocomplete.css"/>
<script type="text/javascript"> $(window).load(function() { $('#txt_date').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$course_options = array('' => "Select Course");
foreach ($class_list as $row1) {
  $course_options[$row1->ClassId] = $row1->ClassName;
}

$exam_options = array(''=>'--- Select Exam');
foreach($exam_list as $row){
    $exam_options[$row->ExamId] = $row->ExamName;
}
$location_data=$this->session->userdata('system.branch');

$yes_no_option = array(1=>"Yes",0=>"No");
?>
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('exam_wise_attendance_reports/view'); ?>" role="form" method="POST" enctype="multipart/form-data">
                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                            <div class="col-md-3" >
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Branch<span style="color: red;">*</span></label><br>
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
                             <div class="col-md-3" >
                                                         <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-12 text-left control-label">Course<span style="color: red;">*</span></label><br>
                                                    <div class="col-lg-12">
                                                       <?php echo form_dropdown('CourseId', $course_options, set_value('CourseId', (isset($row->CourseId) ? $row->CourseId : "")), 'id="CourseId" class="form-control"'); ?>
                                <?php echo form_error('CourseId'); ?>
                                                    </div>
                                                </div>
                                                    </div>
                            <div class="col-md-3" >
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Exam Name<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                               <?php 
                               echo form_dropdown('ExamId', $exam_options, set_value('ExamId', isset($row->ExamId)?$row->ExamId:''),'  id="ExamId" class="custom_checkbox "');?>
                                <?php echo form_error('ExamId'); ?>
                            </div>
                        </div>
                            </div>
                       


                             <div class="col-md-3" style="margin-top:10px;" >
                                 <div class="form-group">
                            <br>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" >
                            </div>
                        </div>
                            </div>

                            
                           
                        </div>
                    </div>
                </div>
                
                    


                </div>
                </form>
            </div>
        </div>