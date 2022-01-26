<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<style type="text/css">
    .custom_input_style {
        background-color: #fff;
        background-image: none !important;
        border: 1px solid #dddddd;
        filter: none !important;
        height: 200px !important;
        line-height: 40px;
        outline: medium none;
        width: 60%;
    }
    .custom_input_style1 {
        background-color: #fff;
        background-image: none !important;
        border: 1px solid #dddddd;
        filter: none !important;
        height: 80px !important;
        line-height: 40px;
        outline: medium none;
        width: 60%;
    }
</style>
<?php
$action = $this->uri->segment(2);
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$location_data=$this->session->userdata('system.branch');
$class_options = array('' => "- Select Class -");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
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
                    <form class="form-horizontal" action="<?php echo site_url('config_subjects/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="text_subject_id" value="<?php echo isset($row->SubjectId)?$row->SubjectId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" style = "padding-left: 3%;" class=" control-label">Branch</label>
                            <div class="col-lg-12">
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
                            </div>
                            <div class="col-md-4">
                                 <div class="form-group">
                            <label for="inputStandard" style = "padding-left: 3%;" class=" control-label">Subject Name</label>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="txt_subject_name" id="" class="form-control" value="<?php echo isset($row->SubjectName)?$row->SubjectName:""; ?>" placeholder="Name">
                                <?php echo form_error('txt_subject_name'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-4">
                                 <div class="form-group">
                            <div class="row" style = "margin-left: 9%;margin-top: 8%;">
                           <div class="col-md-6" style = "float:;">
                            <input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" >
                        </div>
                        <div class="col-md-6" style = "float:;">
                           <button class="btn btn-hover btn-danger btn-block" type="button" onclick="history.go(-1)">Cancel</button>
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
