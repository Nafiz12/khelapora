<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() { $('#txt_date_of_transfer').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}

$employee_options = array('' => "Select Employee");
foreach ($employee_list as $row1) {
    $employee_options[$row1->EmployeeId] = $row1->EmployeeName;
}

$branch_options_to = array('' => "Select Destination Branch");
foreach ($to_branch_list as $row1) {
    $branch_options_to[$row1['BranchId']] = $row1['BranchName'];
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
                    <form class="form-horizontal" action="<?php echo site_url('employee_branch_transfers/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="TransferId" value="<?php echo isset($row->TransferId)?$row->TransferId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Employee</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_employee', $employee_options, set_value('cbo_employee', (isset($row->EmployeeId) ? $row->EmployeeId : '')), 'id="cbo_employee", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_employee'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Branch From</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_branch', $branch_options, set_value('cbo_branch', (isset($row->OldBranchId) ? $row->OldBranchId : $BranchId)), 'id="cbo_branch", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_branch'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Branch To</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_branch_to', $branch_options_to, set_value('cbo_branch_to', (isset($row->NewBranchId) ? $row->NewBranchId : '')), 'id="cbo_branch_to", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_branch_to'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Transfer Date</label>
                            <div class="tab-content pn br-n admin-form">
                                <div class="col-xs-5">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_of_transfer','id' => 'txt_date_of_transfer','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Birth','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_transfer',isset($row->TransferDate)?$row->TransferDate:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_of_transfer'); ?>
                                    </label>
                                </div>
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
