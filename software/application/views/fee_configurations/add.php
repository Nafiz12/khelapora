<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $("#waiver_area").hide();
        get_type_details();
        $("#cbo_feetype").change(function(){
            get_type_details();
        });
    });
    function get_type_details() {
        var selected_fee_type = $("#cbo_feetype").val();
        $.post("<?php echo site_url('fee_types/ajax_for_get_type_details') ?>", {fee_type: selected_fee_type},
            function (data) {
                $('#status').html("");
                if (data.status == 'failure') {
                }
                else {
                    if(data.IsMonthlyFee == 0 && data.IsWaiverApplicable == 1){
                        $("#IsWaiverApplicable").val(1);
                        $("#waiver_area").show();
                    }else{
                        $("#IsWaiverApplicable").val(0);
                        $("#waiver_area").hide();
                    }
                }
            }, "json");
    }
</script>

<?php
$action = $this->uri->segment(2);
$course_options = array('' => "- Select Course -");
foreach ($class_list as $row1) {
    //echo "<pre>";print_r($row1);
    $course_options[$row1->ClassId] = ($row1->ClassName);
}
$fee_options = array('' => "- Select Fee Type -");
foreach ($type_list as $row) {
    $fee_options[$row->TypeId] = ($row->TypeName);
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
                    <form class="form-horizontal" action="<?php echo site_url('fee_configurations/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="FeeConfigId" value="<?php echo isset($result->FeeConfigId)?$result->FeeConfigId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Branch</label> <br>
                            <div class="col-lg-12">
                                <?php
                                if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                    echo form_dropdown('cbo_branch', $branch_options, set_value('cbo_branch', isset($result->BranchId)?$result->BranchId:""),'id="cbo_branch" required="required" class="custom_checkbox" ');
                                }else {
                                    echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId_1', isset($result->BranchId)?$result->BranchId:$location_data['BranchId']),' disabled="disabled" id="BranchId_1" class="custom_checkbox"');
                                    echo form_input(array('name' => 'cbo_branch', 'id' => 'cbo_branch', 'maxlength' => '4', 'type' => 'hidden'), set_value('cbo_branch', (isset($result->BranchId) ? $result->BranchId : $location_data['BranchId'])));
                                }
                                ?>
                            </div>
                        </div>
                            </div>
                            
                            <div class="col-md-4">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Batch</label> <br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('CourseId', $course_options, set_value('CourseId', (isset($result->CourseId) ? $result->CourseId : "")), 'id="CourseId", class="custom_checkbox" '); ?>
                                <?php echo form_error('CourseId'); ?>
                            </div>
                        </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Fee Type</label> <br>
                            <div class="col-lg-12">
                                  <?php echo form_dropdown('cbo_feetype', $fee_options, set_value('cbo_feetype', (isset($result->TypeId) ? $result->TypeId : "")), 'id="cbo_feetype", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_feetype'); ?>
                            </div>
                         </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Amount</label> <br>
                            <div class="col-lg-12">

                                <input type="text" name="txt_amount" id="txt_amount" class="form-control" required="required" value="<?php echo isset($result->Amount)?$result->Amount:''; ?>" placeholder="Amount">
                                <?php echo form_error('txt_amount'); ?>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style = "border-left:1px solid black; ">
                        <div class="row" style="min-height:100px; height:70px;">
                            <div class="col-md-12">
                                <div id="waiver_area" class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Waiver Amount</label> 
                            <div class="col-lg-12">
                                <input type="hidden" name="IsWaiverApplicable" id="IsWaiverApplicable" value="<?php echo isset($result->IsWaiverApplicable)?$result->IsWaiverApplicable:0?>">
                                <input type="text" name="txt_waiver_amount" id="txt_waiver_amount" class="form-control" value="<?php echo isset($result->WaiverAmount)?$result->WaiverAmount:''; ?>" placeholder="Waiver Amount">
                                <?php echo form_error('txt_waiver_amount'); ?>
                            </div>
                        </div>
                            </div>

                            
                        </div>
                        <div class="row" style="margin-top:5%;">
                            <div class="col-md-6 col-xs-6">
                                <input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" >
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button>
                            </div>
                        </div>
                    </div>
                        </div>
                  

                </div>
                </form>
            </div>
        </div>