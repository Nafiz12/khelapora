<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() {
        $('#txt_date_of_collection').glDatePicker({ dateFormat: 'yy-mm-dd' });
    }); </script>
<script>
    $(document).ready(function(){
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
$class_options[''] = "Select Class";
$class_options['-1'] = "ALL Class";
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
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
                    <form class="form-horizontal" action="<?php echo site_url('report_daily_collection_registers/ajax_get_attendance_report'); ?>" role="form" target="_blank" method="POST" enctype="multipart/form-data">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <div class="col-md-12 pl15">
                                        <div class="section row mb15">
                                            <div class="col-xs-2">
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
                                            <div class="col-xs-2">
                                                <label class="field select">
                                                    <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : "")), 'id="Year" required="required" '); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('Year'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <label class="field select">
                                                    <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('cbo_class'); ?>

                                                </label>
                                            </div>
                                            <div class="col-xs-3">
                                                <label for="filter-datepicker" class="field prepend-picker-icon">
                                                    <?php echo form_input(array('name' => 'txt_date_of_collection','required' => 'required','id' => 'txt_date_of_collection','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Collection','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_birth',isset($row->AdmissionDate)?$row->AdmissionDate:''));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                                    <?php echo form_error('txt_date_of_collection'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <p class="text-right" style="width: 100%">
                                                    <input style="width: 100%" class="btn btn-primary" value="Submit" type="submit">
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