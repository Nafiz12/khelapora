<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$location_data=$this->session->userdata('system.branch');


$designation_options = array('-1' => "-- ALL --");
foreach ($designation_list as $row1) {
    $designation_options[$row1->DesignationId] = ($row1->DesignationName);
}
?>
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('report_employee_registers/ajax_get_employee_registers_report'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <table class="input_table" style="width:100%; margin-left:1%;">
                            <tr>
                                <td><label class="control-label" for="firstName">Branch</label></td>
                                <td><label class="control-label" for="firstName">Designation</label></td>
                            </tr>
                            <tr>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php
                                            if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                                echo form_dropdown('cbo_branch', $branch_options, set_value('cbo_branch', (isset($row->BranchId) ? $row->BranchId : "")), 'id="cbo_branch" required="required" class="form-control"');
                                                ?>
                                                <i class="arrow double"></i>
                                                <?php
                                                echo form_error('cbo_branch');
                                            }else {
                                                echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId_1', isset($result->BranchId)?$result->BranchId:$location_data['BranchId']),' disabled="disabled" id="BranchId" class="form-control"');
                                                echo form_input(array('name' => 'cbo_branch', 'id' => 'cbo_branch', 'maxlength' => '4', 'type' => 'hidden'), set_value('cbo_branch', (isset($result->BranchId) ? $result->BranchId : $location_data['BranchId'])));
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="16%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('DesignationId', $designation_options, set_value('DesignationId', (isset($row['DesignationId']) ? $row['DesignationId'] :'')), 'id="DesignationId", required="required" class="form-control" '); ?>
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