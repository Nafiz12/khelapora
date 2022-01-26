<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>

<script type="text/javascript"> $(window).load(function() { $('#PromotionDate').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<?php
$action = $this->uri->segment(2);
$designation_options = array('' => "Select Designation");

$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}


$employee_options = array('' => "Select Employee");
foreach ($employee_list as $row1) {
    $employee_options[$row1->EmployeeId] = $row1->EmployeeName;
}

foreach ($designation_list as $row2) {
    $designation_options[$row2->DesignationId] = $row2->DesignationName;
}
$location_data=$this->session->userdata('system.user');
$BranchId= $location_data['BranchId'];
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
                    <form class="form-horizontal" action="<?php echo site_url('employee_promotions/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="TransferId" value="<?php echo isset($row->PromotionId)?$row->PromotionId:""?>">
                            <?php
                        }
                        ?>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Employee</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_employee', $employee_options, set_value('cbo_employee', (isset($row->EmployeeId) ? $row->EmployeeId : '')), 'id="cbo_employee", class="custom_checkbox" '); ?>
                                <input type="hidden" name="BranchId" value="<?php echo isset($row->BranchId)?$row->BranchId:$BranchId?>">
                                <?php echo form_error('cbo_employee'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Designation From</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_designation_to', $designation_options, set_value('cbo_designation_to', (isset($row->OldDesignationId) ? $row->OldDesignationId : '')), 'id="cbo_designation_to", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_designation_to'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Designation To</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_designation_from', $designation_options, set_value('cbo_designation_from', (isset($row->NewDesignationId) ? $row->NewDesignationId : '')), 'id="cbo_designation_from", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_designation_from'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Date</label>
                            <div class="tab-content pn br-n admin-form">
                                <div class="col-xs-5">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'PromotionDate','id' => 'PromotionDate','type'=>'text','maxlength'=>'100','placeholder'=>'Date','class'=>'event-name gui-input br-light light'),set_value('PromotionDate',isset($row->PromotionDate)?$row->PromotionDate:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('PromotionDate'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Promotion/Demotion</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Type', array('P' => "Promotion", 'D' => "Demotion"), isset($row->Type) ? $row->Type : 'P', 'id="Type" class="custom_checkbox" '); ?>
                                <?php echo form_error('Type'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
