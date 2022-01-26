<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "Select Class");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
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
                    <form class="form-horizontal" target="_blank" action="<?php echo site_url('day_wise_class_routines/ajax_get_class_routine'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <div class="tab-content pn br-n admin-form">
                            <div id="tab1_1" class="tab-pane active">
                                <div class="section row mbn">
                                    <div class="col-md-12 pl15">
                                        <div class="section row mb15">
                                            <div class="col-xs-2">
                                                <label class="field select">
                                                    <?php echo form_dropdown('ClassId', $class_options, set_value('ClassId', (isset($row->ClassId) ? $row->ClassId : "")), 'id="ClassId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <input type="hidden" name="BranchId" value="<?php echo $location_data['BranchId']; ?>">
                                                    <?php echo form_error('ClassId'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <label class="field select">
                                                    <?php echo form_dropdown('Shift', $shift_list, set_value('Shift', (isset($row->Shift) ? $row->Shift : "")), 'id="Shift" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('Shift'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <label class="field select">
                                                    <?php echo form_dropdown('Day', $day_list, set_value('Day', (isset($row->Day) ? $row->Day : "")), 'id="Day" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('Day'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <p class="text-right" style="width: 100%">
                                                    <input style="width: 100%" class="btn btn-primary" value="Submit" type="submit">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>