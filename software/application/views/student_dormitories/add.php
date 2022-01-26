<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $( "#datepicker" ).datepicker();
        get_section_list();
        get_student_list();
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $("#cbo_section").change(function(){
            get_student_list();
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

    function get_student_list(){
        var selected_class_id=$("#cbo_class").val();
        var selected_SectionId = "<?php echo isset($row->SectionId)?$row->SectionId:''?>";
        $.post("<?php echo site_url('fees/ajax_for_get_student_list_by_class_and_section') ?>", {class_id: selected_class_id, section_id: selected_SectionId},
            function(data){

                $('#status').html("");
                $('#cbo_student').empty();
                var selected_StudentId = "<?php echo isset($row->StudentId)?$row->StudentId:''?>";
                //  alert(selected_StudentId);
                if( data.status == 'failure' ){
                    $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                }
                else	{
                    $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    for(var i = 0; i < data.StudentId.length; i++){
                        if(selected_StudentId==data.StudentId[i]){
                            $('#cbo_student').append('<option value = \"' + data.StudentId[i] + '\" selected="selected">' + data.StudentName[i] + '</option>');
                        }else {
                            $('#cbo_student').append('<option value = \"' + data.StudentId[i] + '\">' + data.StudentName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>
<?php
//echo "<pre>";print_r($row);die;
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
$student_options= array(''=>'------Select Student------');
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
                    <form class="form-horizontal" action="<?php echo site_url('student_dormitories/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="StudentDormitoryId" value="<?php echo isset($row->StudentDormitoryId)?$row->StudentDormitoryId:""?>">
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Class</label>
                            <div class="col-lg-8">
                                <input type="hidden" name="cbo_class" value="<?php echo isset($row->ClassId)?$row->ClassId : "";?>"/>
                                <input type="hidden" name="cbo_student" value="<?php echo isset($row->StudentId)?$row->StudentId : "";?>"/>
                                <input type="hidden" name="cbo_section" value="<?php echo isset($row->SectionId)?$row->SectionId : "";?>"/>
                                <?php echo form_dropdown('cbo_class1', $class_options, set_value('cbo_class1', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class", disabled class="form-control" '); ?>
                                <?php echo form_error('cbo_class'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Section</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_section1', $section_options, set_value('cbo_section1', (isset($row->SectionId)?$row->SectionId : "")), 'id="cbo_section", disabled class="form-control" '); ?>
                                <?php echo form_error('cbo_section'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_student1', $student_options, set_value('cbo_student1', (isset($row->StudentId)?$row->StudentId : "")), 'id="cbo_student", disabled class="form-control" '); ?>
                                <?php echo form_error('cbo_student'); ?>
                            </div>
                        </div>
                        <div class="form-group dormitory_area">
                            <label for="inputStandard" class="col-lg-3 control-label">Dormitory</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_dormitory', $dormitory_options, set_value('cbo_dormitory', (isset($row->DormitoryId)? $row->DormitoryId : "")), 'id="cbo_dormitory", class="form-control" '); ?>
                                <?php echo form_error('cbo_dormitory'); ?>
                            </div>
                        </div>
                        <div class="form-group dormitory_area">
                            <label for="inputStandard" class="col-lg-3 control-label">Room Number</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_room_number" id="txt_room_number" class="form-control" value="<?php echo isset($row->RoomNumber)?$row->RoomNumber:''; ?>" placeholder="Dormitory Room">
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