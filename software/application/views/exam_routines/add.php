<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() {
        $('#ExamDate').glDatePicker({ dateFormat: 'yy-mm-dd' });
    }); </script>
<script>
    $(document).ready(function(){
        $("#ClassId").change(function(){
            var selected_class_id=$("#ClassId").val();
            $.post("<?php echo site_url('config_classes/ajax_get_class_details') ?>", {class_id: selected_class_id},
                function(data){
                    $('#status').html("");
                    $('#cbo_section').empty();
                    if( data.status == 'failure' ){
                    }
                    else {
                        $("#ClassName").val(data.ClassName);
                    }
                }, "json");
        });
        $("#SubjectId").change(function(){
            var selected_subject_id=$("#SubjectId").val();
            $.post("<?php echo site_url('config_subjects/ajax_get_subject_details') ?>", {subject_id: selected_subject_id},
                function(data){
                    $('#status').html("");
                    $('#cbo_section').empty();
                    if( data.status == 'failure' ){
                    }
                    else {
                        $("#SubjectName").val(data.SubjectName);
                    }
                }, "json");
        });
        $("#add_new_routine").click(function(){
            var index = $("#counter").val();
            var Year = $("#Year").val();
            var Shift = $("#Shift").val();
            var Medium = $("#Medium").val();
            var ClassId = $("#ClassId").val();
            var ClassName = $("#ClassName").val();
            var Emam = $("#Emam").val();
            var ExamDate = $("#ExamDate").val();
            var SubjectId = $("#SubjectId").val();
            var SubjectName = $("#SubjectName").val();
            var RoomNumber = $("#RoomNumber").val();

            var table_data = '<tr id="table_row'+index+'">'+
                '<td>' + index +' .</td>'+
                '<td><label>' + ClassName + '</label></td>'+
                '<td><input type="hidden" name="txt_subject_id['+index+']" id="txt_subject_id'+index+'" value='+ SubjectId +' /><label>' + SubjectName + '</label></td>'+
                '<td><input type="hidden" name="txt_exam_date['+index+']" id="txt_exam_date'+index+'" value='+ ExamDate +' /><label>' + ExamDate + '</label></td>'+
                '<td><input type="hidden" name="txt_room_no['+index+']" id="txt_room_no'+index+'" value='+ RoomNumber +' /><label>' + RoomNumber + '</label></td>'+
                '</tr>';
            $("#routine_details_info").append(table_data);
            index++;
            $("#counter").val(index);
        });
    });
</script>
<style>
    .customized_input_box {
        display: block;
        width: 100%;
        height: 33px;
        padding: 9px 12px;
        font-size: 13px;
        line-height: 1.5;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dddddd;
        border-radius: 0px;
        -webkit-transition: border-color ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s;
        transition: border-color ease-in-out .15s;
    }
</style>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "Select Class");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}

$exam_options = array('' => "Select Exam");
foreach ($exam_list as $row1) {
    $exam_options[$row1->ExamId] = ($row1->ExamName);
}

$subject_options = array('' => "Select Subject");
foreach ($subject_list as $row1) {
    $subject_options[$row1->SubjectId] = ($row1->SubjectName);
}

$location_data=$this->session->userdata('system.branch');
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
                    <form class="form-horizontal" action="<?php echo site_url('exam_routines/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="ClassName" id="ClassName" value="">
                        <input type="hidden" name="SubjectName" id="SubjectName" value="">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <div class="col-md-12 pl15">
                                        <div class="section row mb15">
                                            <div class="col-xs-4">
                                                <input type="hidden" id="counter" value="<?php echo '1';?>"/>
                                                <label class="field select">
                                                    <?php
                                                    if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                                        echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" required="required"');
                                                        ?>
                                                        <i class="arrow double"></i>
                                                        <?php
                                                        echo form_error('BranchId');
                                                    }else {
                                                        echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId"');
                                                        echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-4">
                                                <label class="field select">
                                                    <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : "")), 'id="Year" required="required" '); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('Year'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-4">
                                                <label class="field select">
                                                    <?php echo form_dropdown('Shift', $shift_list, set_value('Shift', (isset($row->Shift) ? $row->Shift : "")), 'id="Shift" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('Shift'); ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-4">
                                                <label class="field select">
                                                    <?php echo form_dropdown('Medium', $medium_list, set_value('Medium', (isset($row->Medium) ? $row->Medium : "")), 'id="Medium" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('Medium'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-4">
                                                <label class="field select">
                                                    <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($row->ClassId) ? $row->ClassId : "")), 'id="ClassId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('ClassId'); ?>

                                                </label>
                                            </div>
                                            <div class="col-xs-4">
                                                <label class="field select">
                                                    <?php echo form_dropdown('ExamId', $exam_options, set_value('ExamId', (isset($row->ExamId) ? $row->ExamId : "")), 'id="ExamId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('ExamId'); ?>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-4">
                                                <label for="filter-datepicker" class="field prepend-picker-icon">
                                                    <?php echo form_input(array('name' => 'ExamDate','required' => 'required','id' => 'ExamDate','type'=>'text','maxlength'=>'100','placeholder'=>'ExamDate','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_birth',isset($row->AdmissionDate)?$row->AdmissionDate:''));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                                    <?php echo form_error('ExamDate'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-3">
                                                <label class="field select">
                                                    <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', (isset($row->SubjectId) ? $row->SubjectId : "")), 'id="SubjectId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('SubjectId'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-3">
                                                <label class="field select">
                                                    <input type="text" id="RoomNumber" class="event-name gui-input br-light light" required="required" name="RoomNumber" placeholder="Class Room" value="<?php echo isset($row->RoomNumber) ? $row->RoomNumber:''; ?>">
                                                    <?php echo form_error('RoomNumber'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <button style="align: center" class="btn active btn-alert btn-block" id="add_new_routine" type="button">Add &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table align="center" class="table table-bordered mbn" style="width: 90%" id="routine_details_info">
                                    <thead>
                                    <tr>
                                        <th width="5%"><b>#</b></th>
                                        <th width="15%"><b>Class</b></th>
                                        <th width="15%"><b>Exam Date</b></th>
                                        <th width="15%"><b>Subject</b></th>
                                        <th width="15%"><b>Class Room</b></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                </div>
                </form>
            </div>
        </div>