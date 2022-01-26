<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() {
        $('#txt_date_of_admission').glDatePicker({ dateFormat: 'yy-mm-dd' });
    }); </script>
<script>
    $(document).ready(function(){
        get_section_list();
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $("#cbo_section").change(function(){
            get_roll_code_for_first_row(1);
        });
        $("#addRow").click(function(){
            add_another_row();
        });
    });
    function get_roll_code_for_first_row(index) {
        var selected_class_id = $("#cbo_class").val();
        var selected_section_id = $("#cbo_section").val();
        var selected_branch_id = $("#BranchId").val();
        var Shift = $("#Shift").val();
        var Medium = $("#Medium").val();
        if(index == 1){
            $.post('<?php echo site_url("students/ajax_for_get_student_code_version2/")?>', {
                    class_id: selected_class_id,
                    section_id: selected_section_id,
                    BranchId: selected_branch_id,
                    Shift: Shift,
                    Medium: Medium
                },
                function (data) {
                    if (data.status == 'failure') {

                    } else {
                        $("#StudentRoll"+index).val(data.StudentRoll);
                        $("#StudentCode"+index).val(data.StudentCode);
                        $("#nextRoll").val(data.NextRoll);
                        $("#nextCode").val(data.NextCode);
                    }
                }, "json");
        }else{

        }
    }
    function get_roll_code_for_next(roll) {
        var selected_class_id = $("#cbo_class").val();
        var selected_section_id = $("#cbo_section").val();
        var selected_branch_id = $("#BranchId").val();
        $.post('<?php echo site_url("students/ajax_for_get_student_code_by_roll/")?>', {
                roll: roll,
                class_id: selected_class_id,
                section_id: selected_section_id,
                BranchId: selected_branch_id
            },
            function (data) {
                if (data.status == 'failure') {

                } else {
                    $("#nextRoll").val(data.StudentRoll);
                    $("#nextCode").val(data.StudentCode);
                }
            }, "json");
    }
    function add_another_row(){
        var index = parseFloat($("#counter").val());
        var nextRoll = parseFloat($("#nextRoll").val());
        var nextCode = $("#nextCode").val();
        var table_data = "";
        table_data += '<tr>';
        table_data += '<td><input type="checkbox" name="chk[]" style="width:auto;"/></td>';
        table_data += '<td><input type="text" required="required" class="customized_input_box" name="StudentName['+index+']" value="" autocomplete="off"/></td>';
        table_data += '<td><input type="text" class="customized_input_box" readonly="readonly" name="StudentRoll['+index+']" id="StudentRoll'+index+'" value="'+nextRoll+'" autocomplete="off"/></td>'
        table_data += '<td><input type="text" class="customized_input_box" readonly="readonly" name="StudentCode['+index+']" id="StudentCode'+index+'" value="'+nextCode+'" autocomplete="off"/></td>'
        table_data += '<td><input type="text" class="customized_input_box" name="FathersName['+index+']" value="" autocomplete="off"/></td>'
        table_data += '<td><input type="text" class="customized_input_box" name="MothersName['+index+']" id="MothersName'+index+'" value="" autocomplete="off"/></td>'
        table_data += '<td><input type="text" class="customized_input_box" name="ContactNumber['+index+']" value="" autocomplete="off"/></td>'
        table_data += '<td><select class="form-control" name="cbo_gender['+index+']"><option value="F">Female</option><option value="M">Male</option></select></td>'
        $("#dataTable").append(table_data);
        get_roll_code_for_next(nextRoll+1)

        index = index+1;
        $("#counter").val(index);
    }
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        }catch(e) {
            alert(e);
        }
    }
    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + 'Select Section/Batch' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + 'Select Section/Batch' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                    }
                }
            }, "json");
    }
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
$section_options = array('' => 'Select Section/Batch');

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
                    <form class="form-horizontal" action="<?php echo site_url('batch_students/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <div class="col-md-12 pl15">
                                        <div class="section row mb15">
                                            <div class="col-xs-4">
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
                                                    <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('cbo_class'); ?>

                                                </label>
                                            </div>
                                            <div class="col-xs-4">
                                                <label class="field select">
                                                    <?php echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', (isset($row->SectionId) ? $row->SectionId : "")), 'id="cbo_section" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('cbo_section'); ?>
                                                    <input type="hidden" id="counter" value="2" >

                                                    <input type="hidden" id="nextRoll" value="">
                                                    <input type="hidden" id="nextCode" value="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="section row mb15">
                                            <div class="col-xs-6">
                                                <label for="filter-datepicker" class="field prepend-picker-icon">
                                                    <?php echo form_input(array('name' => 'txt_date_of_admission','required' => 'required','id' => 'txt_date_of_admission','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Admission*','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_birth',isset($row->AdmissionDate)?$row->AdmissionDate:''));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                                    <?php echo form_error('txt_date_of_admission'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table align="center" class="table table-bordered mbn" style="width: 95%" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th width="1%"><b>#</b></th>
                                        <th width="10%"><b>Name</b></th>
                                        <th width="10%"><b>Roll</b></th>
                                        <th width="10%"><b>Code</b></th>
                                        <th width="10%"><b>Father's Name</b></th>
                                        <th width="10%"><b>Mother's Name</b></th>
                                        <th width="10%"><b>Contact Number</b></th>
                                        <th width="10%"><b>Gender</b></th>
                                    </tr>
                                    <tbody>
                                    <tr id="table_row">

                                        <td><input type="checkbox" name="chk[]" style="width:auto;"/></td>
                                        <td><input type="text" required="required" class="customized_input_box" name="StudentName[1]" value="" autocomplete="off"/></td>
                                        <td><input type="text" class="customized_input_box" name="StudentRoll[1]"  id="StudentRoll1" value="" autocomplete="off"/></td>
                                        <td><input type="text" required="required" class="customized_input_box" name="StudentCode[1]" id="StudentCode1" value="" autocomplete="off"/></td>

                                        <td><input type="text" class="customized_input_box" name="FathersName[1]" id="FathersName" value="" autocomplete="off"/></td>
                                        <td><input type="text" class="customized_input_box" name="MothersName[1]" id="MothersName" value="" autocomplete="off"/></td>
                                        <td><input type="text" class="customized_input_box" name="ContactNumber[1]" id="ContactNumber" value="" autocomplete="off"/></td>
                                        <td><?php echo form_dropdown('cbo_gender[1]',array('M'=>"Male",'F'=>"Female"),isset($row->Gender)?$row->Gender:'F','required="required" class="form-control"'); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2">
                                <button style="align: center" class="btn active btn-system btn-block" id="addRow" type="button">Add Row &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
                            </div>
                            <div class="col-lg-2">
                                <button style="align: center" class="btn active btn-danger btn-block" onClick="deleteRow('dataTable')" type="button">Delete Row &nbsp; <span class="glyphicons glyphicons-circle_minus"></span></button>
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