<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>

<!--<script type="text/javascript"> $(window).load(function() {-->
<!--    $('#txt_from_date').glDatePicker({ dateFormat: 'yy-mm-dd' });-->
<!--    $('#txt_to_date').glDatePicker({ dateFormat: 'yy-mm-dd' });-->
<!--}); </script>-->

<script type="text/javascript">
    $(document).ready(function(){
        get_section_list();
        $( "#FromDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( "#ToDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
        $("#ClassId").change(function(){
            get_section_list();
        });
    });
    function get_section_list(){
        var selected_class_id=$("#ClassId").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($result['mark_data']['SectionId'])?$result['mark_data']['SectionId']:''?>";
                if( data.status == 'failure' ){
                    $('#SectionId').append('<option value = \"' + '' + '\">' + 'Select Section' + '</option>');
                }
                else	{
                    $('#SectionId').append('<option value = \"' + '' + '\">' + 'Select Section' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "Select Class");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$exam_options = array('' => "Select Exam");
foreach ($exam_list as $row1) {
    $exam_options[$row1->ExamId] = ($row1->ExamName);
}

$section_options= array(''=>'Select Section');
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
                    <form class="form-horizontal" target="_blank" action="<?php echo site_url('report_tabulation_sheets/ajax_get_tabulation_sheet'); ?>" role="form" method="POST" enctype="multipart/form-data">
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
                                                    <?php echo form_dropdown('SectionId', $section_options, set_value('SectionId', (isset($row->SectionId) ? $row->SectionId : "")), 'id="SectionId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('SectionId'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <label class="field select">
                                                    <?php echo form_dropdown('ExamId', $exam_options, set_value('ExamId', (isset($row->ExamId) ? $row->ExamId : "")), 'id="ExamId" required="required"'); ?>
                                                    <i class="arrow double"></i>
                                                    <?php echo form_error('ExamId'); ?>
                                                </label>
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="text" id="FromDate" placeholder="From Date" required="required" class="form-control" name="FromDate" value="<?php echo isset($row->FromDate)?$row->FromDate:''; ?>">
                                            </div>
                                            <div class="col-xs-2">
                                                <input type="text" id="ToDate" placeholder="To Date" required="required" class="form-control" name="ToDate" value="<?php echo isset($row->ToDate)?$row->ToDate:''; ?>">
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