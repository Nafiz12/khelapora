<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker1" ).datepicker();
    });
</script>
<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$location_data=$this->session->userdata('system.branch');
?>
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" target="_blank" action="<?php echo site_url('ac_income_statements/ajax_get_income_statement'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <table class="input_table" style="width:100%; margin-left:1%;">
                            <tr>
                                <td colspan="2"><label class="control-label" for="firstName">As On Date</label></td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="form-group" >
                                        <div class="col-xs-11">
                                            <?php
                                            if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                                echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" required="required"');
                                                ?>
                                                <i class="arrow double"></i>
                                                <?php
                                                echo form_error('BranchId');
                                            }else {
                                                echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" class="form-control" id="BranchId"');
                                                echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <input type="text" id="datepicker" required="required" placeholder="" class="form-control" name="txt_date" value="<?php echo isset($row->PaymentDate)?$row->PaymentDate:date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                </td>
                                <td width="20%">
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