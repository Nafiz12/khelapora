<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        get_section_list();
        get_student_list()
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });

        $("#ClassId").change(function(){
            get_section_list();
        });
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
        var selected_section_id=<?php echo $row['SectionId']; ?>;
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
                    <form class="form-horizontal" action="<?php echo site_url('report_mark_sheets/ajax_get_mark_sheet'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <table class="input_table" style="width:100%; margin-left:1%;">
                            <tr>
                                <td><label class="control-label" for="firstName">Class</label></td>
                                <td><label class="control-label" for="firstName">Section</label></td>
                                <td><label class="control-label" for="firstName">Student</label></td>
                            </tr>
                            <tr>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <input type="hidden" name="ClassId" value="<?php echo isset($row['ClassId']) ? $row['ClassId'] :''?>"/>
                                            <input type="hidden" name="SectionId" value="<?php echo isset($row['SectionId']) ? $row['SectionId'] :''?>"/>
                                            <input type="hidden" name="StudentId" value="<?php echo isset($row['StudentId']) ? $row['StudentId'] :''?>"/>
                                            <?php echo form_dropdown('ClassId1', $class_options, set_value('ClassId1', (isset($row['ClassId']) ? $row['ClassId'] :'')), 'id="ClassId", required="required" disabled class="form-control" '); ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('SectionId1', $section_options, set_value('SectionId1', (isset($row['SectionId']) ? $row['SectionId'] :'')), 'id="SectionId", required="required" disabled class="form-control" '); ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="28%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('StudentId1', $student_options, set_value('StudentId1', (isset($row['StudentId']) ? $row['StudentId'] :'')), 'id="StudentId", required="required" disabled class="form-control" '); ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('Year', $year_list, set_value('Year', (isset($row->Year) ? $row->Year :'')), 'id="Year", required="required" class="form-control" '); ?>
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