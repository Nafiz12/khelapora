<?php $this->load->view('Layouts/admin_header'); ?>
<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/admin-tools/admin-forms/css/admin-forms.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $(".dormitory_area").hide();
        $( "#datepicker" ).datepicker();
        get_section_list();
        set_dormitory();
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $("#cbo_section").change(function(){
            get_student_code();
        });
        $("#cbo_residential").change(function(){
            set_dormitory();
        });
    });

    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        $.post("<?php echo base_url('index.php/config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                var selected_SectionId = "<?php echo isset($row->SectionId)?$row->SectionId:''?>";
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
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
    function get_student_code(){
        var selected_class_id=$("#cbo_class").val();
        var selected_section_id=$("#cbo_section").val();
        $.post("<?php echo base_url('index.php/students/ajax_for_get_student_code') ?>", {class_id: selected_class_id,section_id: selected_section_id},
            function(data){
                $('#status').html("");
                $('#txt_code').empty();
                $('#txt_roll').empty();
                if( data.status == 'failure' ){
                    $('#txt_code').empty();
                    $('#txt_roll').empty();
                }
                else{
                    $('#txt_code').val(data.StudentCode);
                    $('#txt_roll').val(data.StudentRoll);
                }
            }, "json");
    }
    function set_dormitory(){
        var is_residential = $("#cbo_residential").val();
        if(is_residential == 0){
            $(".dormitory_area").hide();
        }
        if(is_residential == 1){
            $(".dormitory_area").show();
        }
    }
</script>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "Select Class..");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$dormitory_options = array('' => "- Select Dormitory -");
foreach ($dormitory_list as $row1) {
    $dormitory_options[$row1['DormitoryId']] = ($row1['DormitoryName']);
}
$section_options= array(''=>'------Select Section------');
?>
<section id="content" class="animated fadeIn">
    <div class="row">
        <div class="col-md-12 center-block">
            <div class="admin-form theme-primary">
                <div class="panel">
                    <form class="form-horizontal" id="admin-form" action="<?php echo site_url('students/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="section-divider mb40 mt20"><span> <?php echo 'Student Basic Information';?> </span></div><!-- .section-divider -->
                        <div class="section row">
                            <div class="col-md-6">
                                <label class="field select">
                                    <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class" '); ?>
                                    <?php echo form_error('cbo_class'); ?>
                                </label>
                            </div><!-- end section -->

                            <div class="col-md-6">
                                <label class="field select">
                                    <?php echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', (isset($row->SectionId)?$row->SectionId : "")), 'id="cbo_section" '); ?>
                                    <?php echo form_error('cbo_section'); ?>
                                </label>
                            </div><!-- end section -->
                        </div><!-- end section -->
                        <div class="section row">
                            <div class="col-md-4">
                                <label for="txt_name" class="field prepend-icon">
                                    <input type="text" name="txt_name" id="txt_name" class="gui-input" required="required" value="<?php echo isset($row->StudentName)?$row->StudentName:''; ?>" placeholder="Student Name">
                                    <label for="txt_name" class="field-icon"><i class="fa fa-user"></i></label>
                                    <?php echo form_error('txt_name'); ?>
                                </label>
                            </div><!-- end section -->

                            <div class="col-md-4">
                                <label for="txt_code" class="field prepend-icon">
                                    <input type="text" name="txt_code" id="txt_code" class="gui-input" readonly="readonly" required="required" value="<?php echo isset($row->StudentCode)?$row->StudentCode:''; ?>" placeholder="Student Code">
                                    <label for="txt_code" class="field-icon"><i class="fa fa-user"></i></label>
                                    <?php echo form_error('txt_code'); ?>
                                </label>
                            </div><!-- end section -->
                            <div class="col-md-4">
                                <label for="txt_roll" class="field prepend-icon">
                                    <input type="text" name="txt_roll" id="txt_roll" class="gui-input" readonly="readonly" required="required" value="<?php echo isset($row->RollNo)?$row->RollNo:''; ?>" placeholder="Student Roll">
                                    <label for="txt_roll" class="field-icon"><i class="fa fa-user"></i></label>
                                    <?php echo form_error('txt_roll'); ?>
                                </label>
                            </div><!-- end section -->
                        </div><!-- end .section row section -->

                        <div class="section row">
                            <div class="col-md-4">
                                <label for="txt_date_of_birth" class="field prepend-icon">
                                    <input type="text" id="datepicker" required="required" class="gui-input" name="txt_date_of_birth" value="<?php echo isset($row->DateOfBirth)?$row->DateOfBirth:""; ?>" placeholder="Date Of Birth">
                                    <label for="txt_date_of_birth" class="field-icon"><i class="fa fa-male"></i></label>
                                    <?php echo form_error('txt_date_of_birth'); ?>
                                </label>
                            </div><!-- end section -->

                            <div class="col-md-4">
                                <label for="txt_email" class="field prepend-icon">
                                    <input type="email" name="txt_email" id="txt_email" class="gui-input" value="<?php echo isset($row->StudentEmail)?$row->StudentEmail:''; ?>" placeholder="Student Email (Optional)">
                                    <label for="txt_email" class="field-icon"><i class="fa fa-envelope"></i></label>
                                    <?php echo form_error('txt_email'); ?>
                                </label>
                            </div><!-- end section -->
                            <div class="col-md-4">
                                <label class="field select">
                                    <?php echo form_dropdown('cbo_gender',array('M'=>"Male",'F'=>"Female"),isset($row->Gender)?$row->Gender:'M','id="cbo_gender" required="required"');
                                    echo form_error('cbo_gender'); ?>
                                </label>
                            </div><!-- end section -->
                        </div><!-- end .section row section -->

                        <div class="section">
                            <label for="comment" class="field prepend-icon">
                                <textarea id="textArea2" required="required" class="gui-textarea" rows="1" name="txt_address" placeholder="Student Address"><?php echo isset($row->Address)?$row->Address:""; ?></textarea>
                                <label for="comment" class="field-icon"><i class="fa fa-comments"></i></label>
                                <?php echo form_error('txt_address'); ?>
                            </label>
                        </div><!-- end section -->

                    <div class="section-divider mv40"><span> Parent's Information </span></div><!-- .section-divider -->
                    <div class="section row">
                        <div class="col-md-6">
                            <label for="txt_fathers_name" class="field prepend-icon">
                                <input type="text" name="txt_fathers_name" id="txt_fathers_name" class="gui-input" required="required" value="<?php echo isset($row->FathersName)?$row->FathersName:''; ?>" placeholder="Father's Name">
                                <label for="txt_fathers_name" class="field-icon"><i class="fa fa-user"></i></label>
                                <?php echo form_error('txt_fathers_name'); ?>
                            </label>
                        </div><!-- end section -->
                        <div class="col-md-6">
                            <label for="txt_mothers_name" class="field prepend-icon">
                                <input type="text" name="txt_mothers_name" id="txt_mothers_name" class="gui-input" required="required" value="<?php echo isset($row->MothersName)?$row->MothersName:''; ?>" placeholder="Mother's Name">
                                <label for="txt_mothers_name" class="field-icon"><i class="fa fa-user"></i></label>
                                <?php echo form_error('txt_mothers_name'); ?>
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .section row section -->
                    <div class="section row">
                        <div class="col-md-6">
                            <label for="txt_number" class="field prepend-icon">
                                <input type="tel" name="txt_number" id="mobile_phone" class="gui-input phone-group" placeholder="Mobile number">
                                <label for="mobile_phone" class="field-icon"><i class="fa fa-mobile-phone"></i></label>
                                <?php echo form_error('txt_number'); ?>
                            </label>
                        </div><!-- end section -->

                        <div class="col-md-6">
                            <label for="home_phone" class="field prepend-icon">
                                <input type="tel" name="home_phone" id="home_phone" class="gui-input phone-group" placeholder="Home number">
                                <label for="home_phone" class="field-icon"><i class="fa fa-phone"></i></label>
                            </label>
                        </div><!-- end section -->
                    </div><!-- end .section row section -->
                    <div class="section-divider mv40"><span> Dormitory Information </span></div><!-- .section-divider -->
                    <div class="section row">
                        <div class="col-md-12">
                            <label class="field select">
                                <?php echo form_dropdown('cbo_residential',array(0=>"Non Residential",1=>"Residential"),isset($row->IsResidential)?$row->IsResidential:0,'id="cbo_residential" required="required"');
                                echo form_error('cbo_residential'); ?>
                            </label>
                        </div><!-- end section -->
                    </div>
                    <div class="section row dormitory_area">
                        <div class="col-md-6">
                            <label class="field select">
                                <?php echo form_dropdown('cbo_dormitory', $dormitory_options, set_value('cbo_section', (isset($row->DormitoryId)? $row->DormitoryId : "")), 'id="cbo_dormitory"'); ?>
                                <?php echo form_error('cbo_dormitory'); ?>
                            </label>
                        </div><!-- end section -->
                        <div class="col-md-6">
                            <label for="txt_room_number" class="field prepend-icon">
                                <input type="text" name="txt_room_number" id="txt_room_number" class="gui-input" required="required" value="<?php echo isset($row->RoomNo)?$row->RoomNo:''; ?>" placeholder="Room number"/>
                                <label for="txt_room_number" class="field-icon"><i class="fa fa-credit-card"></i></label>
                                <?php echo form_error('txt_room_number'); ?>
                            </label>
                        </div><!-- end section -->
                    </div>
                    <div class="panel-footer text-right">
                        <button type="submit" class="button btn-primary">Save </button>
                        <button type="reset" class="button"> Cancel </button>
                    </div><!-- end .form-footer section -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('Layouts/admin_footer'); ?>