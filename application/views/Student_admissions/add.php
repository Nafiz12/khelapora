
<style>
    row{
        margin-right:0px;
    }
</style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            get_section_list();
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $("#ClassId").change(function(){
                get_section_list();
            });
            $("#SectionId").change(function(){
                get_student_code();
            });


        });

        function get_student_code(){
            var selected_class_id=$("#ClassId").val();
            var selected_section_id=$("#SectionId").val();
            $.post("<?php echo base_url('index.php/Student_admissions/ajax_for_get_student_code') ?>", {class_id: selected_class_id,section_id: selected_section_id},
                function(data){
                    $('#status').html("");
                    $('#code').empty();
                    $('#roll_no').empty();
                    if( data.status == 'failure' ){
                        $('#code').empty();
                        $('#roll_no').empty();
                    }
                    else{
                        $('#code').val(data.code);
                        $('#roll_no').val(data.roll_no);
                    }
                }, "json");
        }

        function get_section_list(){
            var selected_class_id=$("#ClassId").val();
            $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
                function(data){
                    $('#status').html("");
                    $('#SectionId').empty();
                    var selected_SectionId = "<?php echo isset($row->section)?$row->section:''?>";
                    if( data.status == 'failure' ){
                        $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    }
                    else	{
                        $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                        for(var i = 0; i < data.id.length; i++){
                            if(selected_SectionId==data.id[i]){

                                $('#SectionId').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                            }else {

                                $('#SectionId').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                            }
                        }
                    }
                }, "json");
        }

    </script>
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('student_id'=>$row->id);}else{$hidden_input = '';}
$options = array();
foreach($row_combo as $row_combo)
{
    $options[$row_combo->id]=$row_combo->class_name;
}
$section_options= array(''=>'------Select Section------');
?>
<?php echo form_open_multipart("index.php/Student_admissions/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>
    <div class="row" id = "con"  >
        <div class="col-sm-4 text-center" style = "padding-top:3%;">
            <div class="kv-avatar">
                <img class="blah" <?php if(isset($row->image)){?> src="<?php echo base_url();?>lib/images/<?php echo $row->image;?>"<?php } else{ ?> src="<?php echo base_url();?>lib/images/admin_default.png" <?php } ?>  alt="your image"  width = "100px" height = "100px" style = "margin-left: -70%; border:1px solid black;"/>
                <input type='file' name = "upload[]" class="imgInp" />


            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('form_no', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputEmail1">Form No</label>
                        <?php echo form_input(array('type' => 'text','name' => 'form_no[]','class' =>'form-control','value' => set_value('form_no',(isset($row->form_no)?$row->form_no:"") ), 'placeholder' => 'Enter form no','id'=>'form_no')) ;?>


                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('class', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Class</label>

                        <?php echo form_dropdown('class[]', $options,isset($row->class)?$row->class:'',array('class'=>'form-control','id'=>'ClassId')); ?>
<!--                        --><?php //echo form_input(array('type' => 'text','name' => 'class[]','class' =>'form-control','value' => set_value('class',(isset($row->class)?$row->class:"")),'placeholder' => 'Enter class','id'=>'class')) ;?>


                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('section', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Section</label>

                        <?php echo form_dropdown('section[]', $section_options, isset($row->section)?$row->section:'',array('class'=>'form-control','id'=>'SectionId')); ?>
                        <!--                        --><?php //echo form_input(array('type' => 'text','name' => 'class[]','class' =>'form-control','value' => set_value('class',(isset($row->class)?$row->class:"")),'placeholder' => 'Enter class','id'=>'class')) ;?>
<!--                        --><?php //echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', (isset($row->SectionId)? $row->SectionId : "")), 'id="cbo_section", class="custom_checkbox" '); ?>

                    </div>
                </div>


                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('roll_no', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Roll No</label>
                        <?php echo form_input(array('type' => 'text','name' => 'roll_no[]','class' =>'form-control','value' => set_value('roll_no',(isset($row->roll_no)?$row->roll_no:"")),'placeholder' => 'Enter roll no','id'=>'roll_no')) ;?>
<!--                        <input type="text" name="roll_no[]" id="roll_no" class="form-control" required="required" value="--><?php //echo isset($row->roll_no)?$row->roll_no:''; ?><!--" placeholder="Enter roll no">-->

                    </div>
                </div>

            </div>
            <div class="row">


                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('code', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Code</label>
                        <?php echo form_input(array('type' => 'text','name' => 'code[]','class' =>'form-control','value' => set_value('code',(isset($row->code)?$row->code:"")),'placeholder' => 'Enter roll no','id'=>'code')) ;?>


                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo form_error('student_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Student Name</label>
                        <?php echo form_input(array('type' => 'text','name' => 'student_name[]','class' =>'form-control','value' => set_value('student_name',(isset($row->student_name)?$row->student_name:"")),'placeholder' => 'Enter student name','id'=>'student_name')) ;?>

                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('contact_no', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Contact No</label>
                        <?php echo form_input(array('type' => 'text','name' => 'contact_no[]','class' =>'form-control','value' => set_value('contact_no',(isset($row->contact_no)?$row->contact_no:"")),'placeholder' => 'Enter contact no','id'=>'contact_no')) ;?>


                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo form_error('father_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Father's Name</label>
                        <?php echo form_input(array('type' => 'text','name' => 'father_name[]','class' =>'form-control','value' => set_value('father_name',(isset($row->father_name)?$row->father_name:"")),'placeholder' => 'Enter father name','id'=>'father_name')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>





            </div>

            <div class="row">

                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo form_error('mother_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Mother's Name</label>
                        <?php echo form_input(array('type' => 'text','name' => 'mother_name[]','class' =>'form-control','value' => set_value('mother_name',(isset($row->mother_name)?$row->mother_name:"")),'placeholder' => 'Enter mother name','id'=>'mother_name')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo form_error('dob', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Date of Birth</label>
                        <?php echo form_input(array('type' => 'text','name' => 'dob[]','class' =>'datepicker form-control','value' => set_value('dob',(isset($row->dob)?$row->dob:"")),'placeholder' => 'Enter dob','id'=>'')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">

                        <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Address</label>
                        <?php echo form_input(array('type' => 'text','name' => 'address[]','class' =>'form-control','value' => set_value('address',(isset($row->address)?$row->address:"")),'placeholder' => 'Enter address','id'=>'address')) ;?>


                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <?php echo form_error('father_occupation', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Father's Occupation</label>
                        <?php echo form_input(array('type' => 'text','name' => 'father_occupation[]','class' =>'form-control','value' => set_value('father_occupation',(isset($row->father_occupation)?$row->father_occupation:"")),'placeholder' => 'Enter father_occupation','id'=>'father_occupation')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>





            </div>



        </div>
    </div>
    <div class="form-group" style = "margin-top:5%;">

        <div class="text-center">
            <div class="footer">
<?php if($action == 'edit'){
    echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit'));
}else{ ?>
                <a class = "btn btn-info" href = "#" id = "add_button">Add More</a>
    <?php echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); }?>

                      </div>

        </div>
    </div>
<?php echo form_close();?>

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




<?php $this->load->view('Layouts/admin_footer'); ?>