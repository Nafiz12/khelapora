<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
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
                    <form class="form-horizontal" target="_blank" action="<?php echo site_url('income_expense_reports/ajax_get_income_expense'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <table class="input_table" style="width:100%; margin-left:1%;">

                            <tr>
                                <td width="20%">
                                    <div class="form-group" >
                                        <label for="inputStandard" style="padding-left: 3%">Branch</label>
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
                                        <label for="inputStandard" style="padding-left: 3%">From date</label>
                                        <div class="col-lg-11">
                                            <input type="text" id="datepicker" required="required" placeholder=" Enter your date here.." class="form-control" name="txt_from_date"  >
                                        </div>
                                    </div>
                                </td>

                                <td width="20%">
                                    <div class="form-group" >
                                        <label for="inputStandard" style="padding-left: 3%">To date</label>
                                        <div class="col-lg-11">
                                            <input type="text" id="datepicker1" required="required" placeholder="Enter your date here.." class="form-control" name="txt_to_date" >
                                        </div>
                                    </div>
                                </td>
                                <td width="20%">
                                    <div class="form-group"  >
                                        <div class="col-lg-6" >
                                            <input type="submit"  style = "margin-top:28px;" class="btn btn-hover btn-alert btn-block" value="Submit " >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>