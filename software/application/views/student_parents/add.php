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
                    <form class="form-horizontal" action="<?php echo site_url('student_parents/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="id" value="<?php echo isset($row->id)?$row->id:""?>">
                            <input type="hidden" name="role_id" value="<?php echo isset($row->role_id)?$row->role_id:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-8">
                                <input type="text" id="txt_name" class="form-control" readonly="readonly" value="<?php echo isset($row->name)?$row->name:''; ?>" placeholder="Name">
                                <?php echo form_error('txt_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Branch</label>
                            <div class="col-lg-8">
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
                            <label for="maskedDate" class="col-lg-3 control-label">Registration Date</label>
                            <div class="col-lg-8">
                                <input type="text" id="datepicker" class="form-control" readonly="readonly" value="<?php echo isset($row->reg_date)?$row->reg_date:""; ?>">
                                <?php echo form_error('reg_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">User Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="user_name" id="user_name" class="form-control" required="required" value="<?php echo isset($row->user_name)?$row->user_name:''; ?>" placeholder="User Name">
                                <?php echo form_error('user_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Status</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('status',array('1'=>"Active",'0'=>"InActive"),isset($row->status)?$row->status:'1','id="status" required="required" class="form-control"');
                                echo form_error('status'); ?>
                            </div>
                        </div>
                        <?php
                        if ($action == "edit") {
                            ?>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-8">
                                    <input type="password" name="password" class="form-control" required="required" value="<?php echo isset($row->password)?$row->password:''; ?>" placeholder="Passowrd">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                        <?php } ?>


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
