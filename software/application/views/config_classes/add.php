<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
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
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-tasks"></span><span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('config_classes/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="text_class_id" value="<?php echo isset($row->ClassId)?$row->ClassId:""?>">
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Branch</label>
                            <div class="col-lg-5">
                                <?php
                                if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                    echo form_dropdown('cbo_branch', $branch_options, set_value('cbo_branch', isset($row->BranchId)?$row->BranchId:""),'id="cbo_branch" required="required" class="custom_checkbox" ');
                                }else {
                                    echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId_1', isset($row->BranchId)?$row->BranchId:$location_data['BranchId']),' disabled="disabled" id="BranchId_1" class="custom_checkbox"');
                                    echo form_input(array('name' => 'cbo_branch', 'id' => 'cbo_branch', 'maxlength' => '4', 'type' => 'hidden'), set_value('cbo_branch', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])));
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Course Name<span style="color: red;">*</span></label>
                            <div class="col-lg-5">
                                <input type="text" required="required" name="txt_class_name" id="" class="form-control" value="<?php echo isset($row->ClassName)?$row->ClassName:""; ?>" placeholder="Name">
                                <?php echo form_error('txt_class_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Course Code<span style="color: red;">*</span></label>
                            <div class="col-lg-5">
                                <input type="text" required="required" name="txt_class_code" id="" class="form-control" value="<?php echo isset($row->ClassCode)?$row->ClassCode:""; ?>" placeholder="Code">
                                <?php echo form_error('txt_class_code'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-5">
                                <textarea id="textArea2" class="form-control" rows="2" name="txt_description"><?php echo isset($row->ClassDescription)?$row->ClassDescription:""; ?></textarea>
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
