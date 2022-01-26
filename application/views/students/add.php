<?php $this->load->view('Layouts/admin_header'); ?>
<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
        $("#cbo_residential").change(function(){
            set_dormitory();
        });
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
$dormitory_options = array('' => "- Select Dormitory -");
foreach ($dormitory_list as $row1) {
    $dormitory_options[$row1['DormitoryId']] = ($row1['DormitoryName']);
}
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
                            <label for="inputStandard" class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-5">
                                <textarea id="textArea2" required="required" class="form-control" rows="2" name="txt_address"><?php echo isset($row->Address)?$row->Address:""; ?></textarea>
                                <?php echo form_error('txt_address'); ?>
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
                            <label for="inputStandard" class="col-lg-3 control-label">Mother's Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_mothers_name" id="txt_mothers_name" class="form-control" required="required" value="<?php echo isset($row->MothersName)?$row->MothersName:''; ?>" placeholder="Mothers Name">
                                <?php echo form_error('txt_mothers_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Contact Number</label>
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
                            <label for="inputStandard" class="col-lg-3 control-label">Is Residential</label>
                            <div class="col-lg-5">
                                <?php echo form_dropdown('cbo_residential',array(0=>"Non Residential",1=>"Residential"),isset($row->IsResidential)?$row->IsResidential:0,'id="cbo_residential" required="required" class="form-control"');
                                echo form_error('cbo_residential'); ?>
                            </div>
                        </div>
                        <div class="form-group dormitory_area">
                            <label for="inputStandard" class="col-lg-3 control-label">Dormitory</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_dormitory', $dormitory_options, set_value('cbo_section', (isset($row->DormitoryId)? $row->DormitoryId : "")), 'id="cbo_dormitory", class="form-control" '); ?>
                                <?php echo form_error('cbo_dormitory'); ?>
                            </div>
                        </div>
                        <div class="form-group dormitory_area">
                            <label for="inputStandard" class="col-lg-3 control-label">Room Number</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_room_number" id="txt_room_number" class="form-control" value="<?php echo isset($row->RoomNo)?$row->RoomNo:''; ?>" placeholder="Dormitory Room">
                                <?php echo form_error('txt_room_number'); ?>
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
<?php $this->load->view('Layouts/admin_footer'); ?>