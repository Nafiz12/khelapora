<title><?php echo $title;?></title>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "- Select Class -");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
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
                    <form class="form-horizontal" action="<?php echo site_url('config_sections/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="text_section_id" value="<?php echo isset($row->SectionId)?$row->SectionId:""?>">
                        <?php
                        }
                        ?>
                        <input type="hidden" name="BranchId" value="<?php echo isset($row->BranchId)?$row->BranchId:$location_data['BranchId']; ?>">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Class<span style="color: red;">*</span></label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_class'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Section/Batch Name<span style="color: red;">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" required="required" name="txt_section_name" id="" class="form-control" value="<?php echo isset($row->SectionName)?$row->SectionName:""; ?>" placeholder="Name">
                                <?php echo form_error('txt_section_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Section/Batch Code<span style="color: red;">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" required="required" name="txt_section_code" id="" class="form-control" value="<?php echo isset($row->SectionCode)?$row->SectionCode:""; ?>" placeholder="Code">
                                <?php echo form_error('txt_section_code'); ?>
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
