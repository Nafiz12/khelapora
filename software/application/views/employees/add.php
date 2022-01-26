<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() {
        $('#txt_date_of_birth').glDatePicker({ dateFormat: 'yy-mm-dd' });
        $('#txt_date_of_joining').glDatePicker({ dateFormat: 'yy-mm-dd' });
    }); </script>
<script>
    $(document).ready(function () {
        $("#reason").hide();

        var em_status = $("#Status").val();
        if(em_status =='T' || em_status=='R'){
            $("#reason").show();
        }else {
            $("#reason").hide();
        }

        $(".dormitory_area").hide();
        $("#datepicker").datepicker();
        $('#SameAsPresent').change(function() {
            if(this.checked) {
                var presentAddress = $("#PresentAddress").val();
                $("#PermanentAddress").val(presentAddress);
            }
            if(this.checked == false) {
                $("#PermanentAddress").val('');
            }
        });
        $("#Status").change(function () {
            var em_status = $("#Status").val();
            if(em_status =='T' || em_status=='R'){
                $("#reason").show();
            }else {
                $("#reason").hide();
            }
        });
    });
</script>
<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$designation_options = array('' => "Select Designation");

foreach ($designation_list as $row2) {
    $designation_options[$row2->DesignationId] = $row2->DesignationName;
}
$section_options = array('' => 'Select Section');

$location_data=$this->session->userdata('system.branch');
?>
<div class="panel mb25 mt5">
    <div class="panel-heading">
        <span class="panel-title"><?php echo $title; ?></span>
        <!--        <ul class="nav panel-tabs-border panel-tabs">-->
        <!--            <li class="active">-->
        <!--                <a href="#tab1_1" data-toggle="tab">General Information</a>-->
        <!--            </li>-->
        <!--        </ul>-->
    </div>
    <div class="panel-body p20 pb10">
        <form class="form-horizontal" action="<?php echo site_url('employees/' . $action); ?>" role="form" method="POST"
              enctype="multipart/form-data">
            <?php
            if ($action == "edit") {
                ?>
                <input type="hidden" name="EmployeeId"
                       value="<?php echo isset($row->EmployeeId) ? $row->EmployeeId : "" ?>">
                <?php
            }
            ?>
            <div class="tab-content pn br-n admin-form">
                <div id="tab1_1" class="tab-pane active">
                    <div class="section row mbn">
                        <div class="col-md-9 pl15">
                            <div class="section-divider mb40 mt20"><span> <?php echo 'Basic Information';?> </span></div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
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
                                <div class="col-xs-6">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_name" id="txt_name"
                                               class="event-name gui-input br-light light" required="required"
                                               value="<?php echo isset($row->EmployeeName) ? $row->EmployeeName : ''; ?>"
                                               placeholder="Emplyee Name*">
                                        <?php echo form_error('txt_name'); ?>
                                        <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="txt_code" class="field prepend-icon">
                                        <input type="text" name="txt_code" id="txt_code"
                                               class="event-name gui-input br-light light" readonly="readonly" required="required"
                                               value="<?php echo isset($row->EmployeeCode) ? $row->EmployeeCode : $employee_code; ?>"
                                               placeholder="Employee Code">
                                        <?php echo form_error('txt_code'); ?>
                                        <label for="txt_code" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_of_birth','id' => 'txt_date_of_birth','type'=>'text','maxlength'=>'100','required'=>'required','placeholder'=>'Date Of Birth','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_birth',isset($row->DateOfBirth)?$row->DateOfBirth:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_of_birth'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_email" id="txt_email"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->Email) ? $row->Email : ''; ?>"
                                               placeholder="Employee Email">
                                        <?php echo form_error('txt_email'); ?>
                                        <label for="txt_code" class="field-icon"><i class="fa fa-envelope"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label for="txt_code" class="field prepend-icon">
                                        <input type="text" name="txt_nid" id="txt_nid"
                                               class="event-name gui-input br-light light" required="required"
                                               value="<?php echo isset($row->Nid) ? $row->Nid : ''; ?>"
                                               placeholder="National Id">
                                        <?php echo form_error('txt_nid'); ?>
                                        <label for="txt_code" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label class="field select">
                                        <?php echo form_dropdown('cbo_gender', array('M' => "Male", 'F' => "Female"), isset($row->Gender) ? $row->Gender : 'M', 'id="cbo_gender" '); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('cbo_gender'); ?>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label class="field select">
                                        <?php echo form_dropdown('BloodGroup', $blood_group_list, set_value('BloodGroup', (isset($row->BloodGroup) ? $row->BloodGroup : "")), 'id="BloodGroup"'); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('BloodGroup'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="txt_code" class="field prepend-icon">
                                        <input type="text" name="txt_number" id="txt_number"
                                               class="event-name gui-input br-light light" required="required"
                                               value="<?php echo isset($row->ContactNumber) ? $row->ContactNumber : ''; ?>"
                                               placeholder="Contact Number">
                                        <?php echo form_error('txt_number'); ?>
                                        <label for="txt_code" class="field-icon"><i class="fa fa-phone"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label for="txt_code" class="field prepend-icon">
                                        <input type="text" name="txt_alt_number" id="txt_alt_number"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->AltContactNumber) ? $row->AltContactNumber : ''; ?>"
                                               placeholder="Alternate Contact Number">
                                        <?php echo form_error('txt_alt_number'); ?>
                                        <label for="txt_alt_number" class="field-icon"><i class="fa fa-phone"></i></label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail mb15">
                                    <img height="200" width="200" <?php if (isset($row->Image)) { ?> src="<?php echo base_url() . 'media/employee_pictures/' . $row->Image ?>" <?php } else { ?> data-src="holder.js/100%x147" <?php } ?>
                                         alt="holder"/>
                                </div>
                                <span class="button btn-system btn-file btn-block ph5">
                                    <span class="fileupload-new">Picture</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" name="image">
                                    <?php echo form_error('image', '<div class="error">', '</div>'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="section-divider mb40 mt20"><span> <?php echo 'Personal Information';?> </span></div>
                    <div class="section row mbn">
                        <div class="col-md-12 pl15">
                            <div class="section row mb15">
                                <div class="col-xs-4">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_fathers_name" id="txt_fathers_name"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->FathersName) ? $row->FathersName : ''; ?>"
                                               placeholder="Father's Name">
                                        <?php echo form_error('txt_fathers_name'); ?>
                                        <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-4">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_mothers_name" id="txt_mothers_name"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->MothersName) ? $row->MothersName : ''; ?>"
                                               placeholder="Mother's Name">
                                        <?php echo form_error('txt_mothers_name'); ?>
                                        <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>

                                    </label>
                                </div>
                                <div class="col-xs-4">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_spouse_name" id="txt_spouse_name"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->SpouseName) ? $row->SpouseName : ''; ?>"
                                               placeholder="Spouse Name">
                                        <?php echo form_error('txt_spouse_name'); ?>
                                        <label for="txt_spouse_name" class="field-icon"><i class="fa fa-user"></i></label>

                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label class="field prepend-icon">
                                        <textarea style="height: 67px" class="gui-textarea" required="required" id="PresentAddress" name="PresentAddress" placeholder="Present Address"><?php echo isset($row->PresentAddress) ? $row->PresentAddress : ""; ?></textarea>
                                        <label for="comment" class="field-icon"><i class="fa fa-comments"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label class="field prepend-icon">
                                        <textarea class="gui-textarea" id="PermanentAddress" name="PermanentAddress" placeholder="Permanent Address"><?php echo isset($row->PermanentAddress) ? $row->PermanentAddress : ""; ?></textarea>
                                        <label for="comment" class="field-icon"><i class="fa fa-comments"></i></label>
                                        <span class="input-footer">
                                            <input type="checkbox" id="SameAsPresent" name="SameAsPresent" >
                                            Same As Present Address
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-divider mb40 mt20"><span> <?php echo 'Official Information';?> </span></div>
                    <div class="section row mbn">
                        <div class="col-md-12 pl15">
                            <div class="section row mb15">
                                <div class="col-xs-4">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_of_joining','id' => 'txt_date_of_joining','required'=>'required','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Joining','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_joining',isset($row->DateOfJoining)?$row->DateOfJoining:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_of_joining'); ?>
                                    </label>
                                </div>
                                <div class="col-xs-4">
                                    <label class="field select">
                                        <?php echo form_dropdown('DesignationId', $designation_options, set_value('DesignationId', (isset($row->DesignationId) ? $row->DesignationId : "")), 'id="DesignationId" required="required"'); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('DesignationId'); ?>
                                    </label>
                                </div>
                                <div class="col-xs-4">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_current_salary" id="txt_current_salary"
                                               class="event-name gui-input br-light light" required="required"
                                               value="<?php echo isset($row->CurrentSalary) ? $row->CurrentSalary : ''; ?>"
                                               placeholder="Current Salary">
                                        <?php echo form_error('txt_current_salary'); ?>
                                        <label for="txt_spouse_name" class="field-icon"><i class="fa fa-user"></i></label>

                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-4">
                                    <label class="field select">
                                        <?php echo form_dropdown('DegreeId', $degree_list, set_value('DegreeId', (isset($row->DegreeId) ? $row->DegreeId : "")), 'id="DegreeId"'); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('DegreeId'); ?>
                                    </label>
                                </div>
                                <div class="col-xs-4">
                                    <label class="field select">
                                        <?php echo form_dropdown('IsTeacher', array('' => "Is Teacher?",'1' => "Yes", '0' => "No"), isset($row->IsTeacher) ? $row->IsTeacher : '', 'id="IsTeacher" required="required" '); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('IsTeacher'); ?>
                                    </label>
                                </div>
                                <div class="col-xs-4">
                                    <label class="field select">
                                        <?php echo form_dropdown('cbo_status', array('A' => "Active", 'I' => "Inactive",'T' => "Terminate",'R' => "Resigned"), isset($row->Status) ? $row->Status : 'A', 'id="Status" '); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('cbo_status'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div id="reason" class="col-xs-4">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_reason" id="txt_reason"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->Reason) ? $row->Reason : ''; ?>"
                                               placeholder="Reason">
                                        <?php echo form_error('txt_reason'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-divider mb40 mt20"><span> <?php echo 'Reference Information';?> </span></div>
                    <div class="section row mbn">
                        <div class="col-md-12 pl15">
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_ref1" id="txt_ref1"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->Ref1) ? $row->Ref1 : ''; ?>"
                                               placeholder="Ref#1 Name 001">
                                        <?php echo form_error('txt_ref1'); ?>
                                        <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label for="txt_ref_number" class="field prepend-icon">
                                        <input type="text" name="txt_ref_number" id="txt_ref_number"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->RefContactNumber) ? $row->RefContactNumber : ''; ?>"
                                               placeholder="Ref#1  Contact Number">
                                        <?php echo form_error('txt_ref_number'); ?>
                                        <label for="txt_ref_number" class="field-icon"><i class="fa fa-phone"></i></label>
                                    </label>
                                </div>
                            </div>
                            <div class="section row mb15">
                                <div class="col-xs-6">
                                    <label for="name" class="field prepend-icon">
                                        <input type="text" name="txt_ref2" id="txt_ref2"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->Ref2) ? $row->Ref2 : ''; ?>"
                                               placeholder="Ref#2 Name 002">
                                        <?php echo form_error('txt_ref2'); ?>
                                        <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <label for="txt_ref2_number" class="field prepend-icon">
                                        <input type="text" name="txt_ref2_number" id="txt_ref2_number"
                                               class="event-name gui-input br-light light"
                                               value="<?php echo isset($row->Ref2ContactNumber) ? $row->Ref2ContactNumber : ''; ?>"
                                               placeholder="Ref#2  Contact Number">
                                        <?php echo form_error('txt_ref2_number'); ?>
                                        <label for="txt_ref_number" class="field-icon"><i class="fa fa-phone"></i></label>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 pl15">
                                <div class="section row mbn">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <p class="text-right">
                                            <input class="btn btn-primary" value="Save Information" type="submit">
                                        </p>
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