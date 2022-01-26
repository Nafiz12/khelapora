<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // get_section_list();
        get_student_list()
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });

        // $("#CourseId").change(function(){
        //      get_batch_list();
        // });
        $("#SectionId").change(function(){
            get_student_list();
        });
    });
    function get_section_list(){
        var selected_class_id=$("#ClassId").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($row['SectionId'])?$row['SectionId']:''?>";
                if( data.status == 'failure' ){
                    $('#SectionId').append('<option value = \"' + '' + '\">' + '--Select Section--' + '</option>');
                }
                else	{
                    $('#SectionId').append('<option value = \"' + '' + '\">' + '--Select Section--' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
    function get_student_list(){
        var selected_class_id=$("#ClassId").val();
        var selected_section_id=$("#SectionId").val();
        $.post("<?php echo site_url('students/ajax_for_get_student_list_by_class_and_section') ?>", {class_id: selected_class_id, section_id: selected_section_id},
            function(data){

                $('#status').html("");
                $('#StudentId').empty();
                var selected_StudentId = "<?php echo isset($row['StudentId'])?$row['StudentId']:''?>";
                //  alert(selected_StudentId);
                if( data.status == 'failure' ){
                    $('#StudentId').append('<option value = \"' + '' + '\">' + '--Select Student--' + '</option>');
                }
                else	{
                    $('#StudentId').append('<option value = \"' + '' + '\">' + '--Select Student--' + '</option>');
                    for(var i = 0; i < data.StudentId.length; i++){
                        if(selected_StudentId==data.StudentId[i]){
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\" selected="selected">' + data.StudentName[i] + '</option>');
                        }else {
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\">' + data.StudentName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>
<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$location_data=$this->session->userdata('system.branch');
$class_options = array('' => "-- Select Class --");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$section_options= array(''=>'-- Select Section --');
$student_options= array(''=>'-- Select Student --');
//echo "<pre>";print_r($LocationId);die;
?>
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" target="_blank" action="<?php echo site_url('report_student_registers/ajax_get_student_register_report'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <table class="input_table" style="width:100%; margin-left:1%;">
                            <tr>
                                <td><label class="control-label" for="firstName">Branch</label></td>
                                <td><label class="control-label" for="firstName">Course</label></td>
                                <td><label class="control-label" for="firstName">Batch</label></td>
                            </tr>
                            <tr>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                           <?php
                                            if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                                echo form_dropdown('cbo_branch', $branch_options, set_value('cbo_branch', (isset($row->BranchId) ? $row->BranchId : "")), 'id="BranchId" required="required" class="form-control"');
                                                ?>
                                                <i class="arrow double"></i>
                                                <?php
                                                echo form_error('cbo_branch');
                                                }else {
                                                echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId_1', isset($result->BranchId)?$result->BranchId:$location_data['BranchId']),' disabled="disabled" id="BranchId" class="form-control"');
                                                echo form_input(array('name' => 'cbo_branch', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('cbo_branch', (isset($result->BranchId) ? $result->BranchId : $location_data['BranchId'])));
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('CourseId', $class_options, set_value('CourseId', (isset($row['CourseId']) ? $row['CourseId'] :'')), 'id="CourseId", required="required" class="form-control" '); ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('BatchId', $section_options, set_value('BatchId', (isset($row['BatchId']) ? $row['BatchId'] :'')), 'id="BatchId",  class="form-control" '); ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-6">
                                            <input type="submit" class="btn btn-hover btn-alert btn-block" value="Submit " >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>