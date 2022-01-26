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
                    <form class="form-horizontal" action="<?php echo site_url('exams/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="ExamId" value="<?php echo isset($row->ExamId)?$row->ExamId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                            <div class="col-md-3">
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

                             <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Course<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('CourseId', $course_options, set_value('CourseId', (isset($row->CourseId) ? $row->CourseId : "")), 'id="CourseId" class="form-control"'); ?>
                                <?php echo form_error('CourseId'); ?>
                            </div>
                        </div>
                            </div>

                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Exam Name<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <input type="text" name="txt_name" id="txt_name" class="form-control" required="required" value="<?php echo isset($row->ExamName)?$row->ExamName:''; ?>" placeholder="Exam Name">
                                <?php echo form_error('txt_name'); ?>
                            </div>
                        </div>
                            </div>

                           


                             <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Exam Date<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_input(array('name' => 'txt_date','required'=>'required','id' => 'txt_date','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Exam','class'=>'event-name gui-input br-light light form-control'),set_value('txt_date_of_transaction',isset($row->ExamDate)?$row->ExamDate:""));?>
                                            <?php echo form_error('txt_date'); ?>
                            </div>
                        </div>
                            </div>

                            
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                            <div class="col-md-12" >
                                <div class="row">
                                    <div class="col-md-12">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Description</label><br>
                            <div class="col-lg-12">
                                <textarea id="textArea2" class="form-control" rows="2" name="txt_description"><?php echo isset($row->ExamDescription)?$row->ExamDescription:""; ?></textarea>
                                <?php echo form_error('txt_description'); ?>
                            </div>
                        </div>
                            </div>
                        </div>

                       
                    </div>
                    </div>
                     <div class="row" >
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                <input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" >
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-4"></div>
                            
                        </div>


                </div>
                </form>
            </div>
        </div>