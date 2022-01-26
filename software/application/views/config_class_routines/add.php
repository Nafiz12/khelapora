<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        get_section_list();
        $( "#datepicker" ).datepicker();
        $("#ClassId").change(function(){
            get_section_list();
        });
    });

    function get_section_list(){
        var selected_class_id=$("#ClassId").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#SectionId').empty();
                if( data.status == 'failure' ){
                    $('#SectionId').append('<option value = \"' + '' + '\">' + 'Select Section/Batch' + '</option>');
                }
                else	{
                    // $('#SectionId').append('<option value = \"' + '' + '\">' + 'Select Section/Batch' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                    }
                }
            }, "json");
    }
</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "Select Class");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

$subject_options = array('' => "Select Subject");
foreach ($subject_list as $row1) {
    $subject_options[$row1->SubjectId] = ($row1->SubjectName);
}

$employee_options = array('' => "Select Teacher");
foreach ($employee_list as $row1) {
    $employee_options[$row1->EmployeeId] = ($row1->EmployeeName.' - '.$row1->DesignationName);
}

$period_options = array('' => "Select Class Period");
foreach ($period_list as $row1) {
    $period_options[$row1->PeriodId] = ($row1->PeriodName.'[ '.$row1->PeriodStartTime.' - '.$row1->PeriodEndTime.' ]');
}

$section_options= array(''=>'Select Section/Batch');

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
                    <form class="form-horizontal" action="<?php echo site_url('config_class_routines/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="RoutineId" value="<?php echo isset($row->RoutineId)?$row->RoutineId:""?>">
                        <?php
                        }
                        ?>
                        <input type="hidden" name="BranchId" value="<?php echo isset($row->BranchId)?$row->BranchId:$location_data['BranchId']; ?>">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Class</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($row->ClassId) ? $row->ClassId : "")), 'id="ClassId", class="custom_checkbox" '); ?>
                                <?php echo form_error('ClassId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Section/Batch</label><br>
                            <div class="col-lg-12">
                                <?php
                                //echo"<pre>";print_r($row->SectionId);die;
                                ?>
                                <?php echo form_dropdown('SectionId', $section_options, set_value('SectionId', (isset($row->SectionId)?$row->SectionId : 2)), 'id="SectionId", class="custom_checkbox" '); ?>
                                <?php echo form_error('SectionId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Shift<span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('Shift', $shift_list, set_value('Shift', (isset($row->Shift)?$row->Shift : "")), 'id="Shift", class="custom_checkbox" '); ?>
                                <?php echo form_error('Shift'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Medium<span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('Medium', $medium_list, set_value('Medium', (isset($row->Medium)?$row->Medium : "")), 'id="Medium", class="custom_checkbox" '); ?>
                                <?php echo form_error('Medium'); ?>
                            </div>
                        </div>
                            </div>

                            
                             <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Subject<span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', (isset($row->SubjectId)?$row->SubjectId : "")), 'id="SubjectId", class="custom_checkbox" '); ?>
                                <?php echo form_error('SubjectId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Teacher<span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('EmployeeId', $employee_options, set_value('EmployeeId', (isset($row->EmployeeId)?$row->EmployeeId : "")), 'id="EmployeeId", class="custom_checkbox" '); ?>
                                <?php echo form_error('EmployeeId'); ?>
                            </div>
                        </div>
                            </div>
                        </div>
                        
                        <div class="row">
                           
                            
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Day<span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('Day', $day_list, set_value('Day', (isset($row->Day)?$row->Day : "")), 'id="Day", class="custom_checkbox" '); ?>
                                <?php echo form_error('Day'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Class Period<span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('PeriodId', $period_options, set_value('PeriodId', (isset($row->PeriodId)?$row->PeriodId : "")), 'id="PeriodId", class="custom_checkbox" '); ?>
                                <?php echo form_error('PeriodId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Room Number <span style="color: red" >*</span></label><br>
                            <div class="col-lg-12">
                                <input type="text" id="txt_room_no" required="required" class="form-control" name="txt_room_no" value="<?php echo isset($row->RoomNumber) ? $row->RoomNumber:''; ?>">
                                <?php echo form_error('txt_room_no'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" style = "margin-top:16%;" class="btn btn-hover btn-alert btn-block" value="Save" >
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-hover btn-danger btn-block" style = "margin-top:16%;" type="button" onclick="javascript:history.go(-1)">Cancel</button>
                            </div>

                            
                        </div>
                      
                       
                </div>
                </form>
            </div>
        </div>