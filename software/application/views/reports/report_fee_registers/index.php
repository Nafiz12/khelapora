<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() { $('#txt_date_from').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<script type="text/javascript"> $(window).load(function() { $('#txt_date_to').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>

<script>
    $(document).ready(function(){
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $(".other_fee_area").show();
        $("#cbo_report_types").change(function(){
            var report_type = $("#cbo_report_types").val();
            if(report_type =='N'){
                $(".other_fee_area").show();
            }else{
                $(".other_fee_area").hide();
            }
        });
    });
    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                var selected_SectionId = "<?php echo isset($row->SectionId)?$row->SectionId:''?>";
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section/Batch------' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section/Batch------' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>

<?php
$action = $this->uri->segment(2);
$class_options = array('' => "- Select Class -");
foreach ($class_list as $row1) {
    //echo "<pre>";print_r($row1);
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$section_options= array(''=>'Section/Batch');
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
                    <form class="form-horizontal" target="_blank" action="<?php echo site_url('report_fee_registers/ajax_get_report'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="FeeConfigId" value="<?php echo isset($result->FeeConfigId)?$result->FeeConfigId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Branch</label>
                            <div class="col-lg-8">
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
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Academic Year</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($result->Year) ? $result->Year : "")), 'id="Year" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('Year'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Class</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($result->ClassId) ? $result->ClassId : "")), 'id="cbo_class" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_class'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Section/Batch</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', (isset($result->SectionId) ? $result->SectionId : "")), 'id="cbo_section" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_section'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Report Type</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_report_types', $report_types, set_value('cbo_report_types', (isset($result->TypeId) ? $result->TypeId : "")), 'id="cbo_report_types" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_report_types'); ?>
                            </div>
                        </div>
                        <div class="form-group other_fee_area">
                            <label for="inputStandard" class="col-lg-3 control-label">From Date</label>
                            <div class="tab-content pn br-n admin-form">
                                <div class="col-xs-5">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_from','autocomplete'=>'off','id' => 'txt_date_from','type'=>'text','maxlength'=>'100','placeholder'=>'Date From','class'=>'event-name gui-input br-light light'),set_value('txt_date_from',isset($row->DateFrom)?$row->DateFrom:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_from'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group other_fee_area">
                            <label for="inputStandard" class="col-lg-3 control-label">To Date</label>
                            <div class="tab-content pn br-n admin-form">
                                <div class="col-xs-5">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_to','autocomplete'=>'off','id' => 'txt_date_to','type'=>'text','maxlength'=>'100','placeholder'=>'Date To','class'=>'event-name gui-input br-light light'),set_value('txt_date_to',isset($row->DateTo)?$row->DateTo:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_to'); ?>
                                    </label>
                                </div>
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