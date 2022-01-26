<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $(".dormitory_area").hide();
        $( "#datepicker" ).datepicker();
        get_section_list();
        set_dormitory();
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $("#cbo_section").change(function(){
            get_student_code();
        });
        // $("#cbo_residential").change(function(){
        //     set_dormitory();
        // });
    });

    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                var selected_SectionId = "<?php echo isset($row->SectionId)?$row->SectionId:''?>";
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
    function get_student_code(){
        var selected_class_id=$("#cbo_class").val();
        var selected_section_id=$("#cbo_section").val();
        $.post("<?php echo site_url('students/ajax_for_get_student_code') ?>", {class_id: selected_class_id,section_id: selected_section_id},
            function(data){
                $('#status').html("");
                $('#txt_code').empty();
                $('#txt_roll').empty();
                if( data.status == 'failure' ){
                    $('#txt_code').empty();
                    $('#txt_roll').empty();
                }
                else{
                    $('#txt_code').val(data.StudentCode);
                    $('#txt_roll').val(data.StudentRoll);
                }
            }, "json");
    }
    function set_dormitory(){
        var is_residential = $("#cbo_residential").val();
        if(is_residential == 0){
            $(".dormitory_area").hide();
        }
        if(is_residential == 1){
            $(".dormitory_area").show();
        }
    }
</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "- Select Class -");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
//$dormitory_options = array('' => "- Select Dormitory -");
//foreach ($dormitory_list as $row1) {
//    $dormitory_options[$row1['DormitoryId']] = ($row1['DormitoryName']);
//}
$section_options= array(''=>'------Select Section------');
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
                    <form class="form-horizontal" action="<?php echo site_url('students/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="StudentId" value="<?php echo isset($row->StudentId)?$row->StudentId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Branch</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('BranchId', $branch_list, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : "")), 'id="BranchId", class="custom_checkbox" '); ?>
                                <?php echo form_error('BranchId'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Academic Year</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : "")), 'id="Year", class="custom_checkbox" '); ?>
                                <?php echo form_error('Year'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Shift</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Shift', $shift_list, set_value('Shift', (isset($row->Shift) ? $row->Shift : "")), 'id="Shift", class="custom_checkbox" '); ?>
                                <?php echo form_error('Shift'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Medium</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Medium', $medium_list, set_value('Medium', (isset($row->Medium) ? $row->Medium : "")), 'id="Medium", class="custom_checkbox" '); ?>
                                <?php echo form_error('Medium'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_name" id="txt_name" class="form-control" required="required" value="<?php echo isset($row->StudentName)?$row->StudentName:''; ?>" placeholder="Student Name">
                                <?php echo form_error('txt_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Class</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_class'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Section</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', (isset($row->SectionId)?         $row->SectionId : "")), 'id="cbo_section", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_section'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Student Code</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_code" id="txt_code" class="form-control" required="required" value="<?php echo isset($row->StudentCode)?$row->StudentCode:''; ?>" placeholder="Student Code">
                                <?php echo form_error('txt_code'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Roll No</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_roll" id="txt_roll" class="form-control" required="required" value="<?php echo isset($row->RollNo)?$row->RollNo:''; ?>" placeholder="Student Roll">
                                <?php echo form_error('txt_roll'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Present Address</label>
                            <div class="col-lg-5">
                                <textarea id="textArea2" required="required" class="form-control" rows="2" name="PresentAddress"><?php echo isset($row->PresentAddress)?$row->PresentAddress:""; ?></textarea>
                                <?php echo form_error('PresentAddress'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Permanent Address</label>
                            <div class="col-lg-5">
                                <textarea id="textArea2" required="required" class="form-control" rows="2" name="PermanentAddress"><?php echo isset($row->PermanentAddress)?$row->PermanentAddress:""; ?></textarea>
                                <?php echo form_error('PermanentAddress'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="maskedDate" class="col-lg-3 control-label">Date Of Birth</label>
                            <div class="col-lg-5">
                                <input type="text" id="datepicker" required="required" class="form-control" name="txt_date_of_birth" value="<?php echo isset($row->DateOfBirth)?$row->DateOfBirth:""; ?>">
                                <?php echo form_error('txt_date_of_birth'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Father's Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_fathers_name" id="txt_fathers_name" class="form-control" required="required" value="<?php echo isset($row->FathersName)?$row->FathersName:''; ?>" placeholder="Father Name">
                                <?php echo form_error('txt_fathers_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Father's Occupation</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('FathersOccupation', $father_occupation_list, set_value('FathersOccupation', (isset($row->FathersOccupation) ? $row->FathersOccupation : "")), 'id="FathersOccupation", class="custom_checkbox" '); ?>
                                <?php echo form_error('FathersOccupation'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Mother's Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_mothers_name" id="txt_mothers_name" class="form-control" required="required" value="<?php echo isset($row->MothersName)?$row->MothersName:''; ?>" placeholder="Mothers Name">
                                <?php echo form_error('txt_mothers_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Mother's Occupation</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('MothersOccupation', $mother_occupation_list, set_value('MothersOccupation', (isset($row->MothersOccupation) ? $row->MothersOccupation : "")), 'id="MothersOccupation", class="custom_checkbox" '); ?>
                                <?php echo form_error('MothersOccupation'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Contact Number(SMS Sending Number)</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_number" id="txt_number" class="form-control" required="required" value="<?php echo isset($row->ContactNumber)?$row->ContactNumber:''; ?>" placeholder="Contact Number">
                                <?php echo form_error('txt_number'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Email (Optional)</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_email" id="txt_email" class="form-control" value="<?php echo isset($row->StudentEmail)?$row->StudentEmail:''; ?>" placeholder="Student Email">
                                <?php echo form_error('txt_email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Gender</label>
                            <div class="col-lg-5">
                                <?php echo form_dropdown('cbo_gender',array('M'=>"Male",'F'=>"Female"),isset($row->Gender)?$row->Gender:'M','id="cbo_gender" required="required" class="form-control"');
                                echo form_error('cbo_gender'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Blood Group</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('BloodGroup', $blood_group_list, set_value('BloodGroup', (isset($row->BloodGroup) ? $row->BloodGroup : "")), 'id="BloodGroup", class="custom_checkbox" '); ?>
                                <?php echo form_error('BloodGroup'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Religion</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Religion', $religion_list, set_value('Religion', (isset($row->Religion) ? $row->Religion : "")), 'id="Religion", class="custom_checkbox" '); ?>
                                <?php echo form_error('Religion'); ?>
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