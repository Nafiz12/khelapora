
    <style>
        row{
            margin-right:0px;
        }
    </style>
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('employee_id'=>$row->id);}else{$hidden_input = '';}
$options = array();
if(isset($designation_list)){
    foreach($designation_list as $designation_list)
    {
        $options[$designation_list->id]=$designation_list->designation_name;
    }


}
$gender = array( 'M' => 'Male',  'F' => 'Female' );


?>
<?php echo form_open_multipart("index.php/Employees/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>
    <div class="row" id = "con"  >
        <div class="col-sm-4 text-center" style = "padding-top:3%;">
            <div class="kv-avatar">
                <img class="blah" <?php if(isset($row->image)){?> src="<?php echo base_url();?>lib/images/<?php echo $row->image;?>"<?php } else{ ?> src="<?php echo base_url();?>lib/images/admin_default.png" <?php } ?>  alt="your image"  width = "100px" height = "100px" style = "margin-left: -70%; border:1px solid black;"/>
                <input type='file' name = "upload[]" class="imgInp" />


            </div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('employee_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputEmail1">Employee Name</label>
                        <?php echo form_input(array('type' => 'text','required'=>'required','name' => 'employee_name[]','class' =>'form-control','value' => set_value('employee_name',(isset($row->employee_name)?$row->employee_name:"") ), 'placeholder' => 'Enter employee_name','id'=>'employee_name')) ;?>


                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('employee_designation', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Employee Designation</label>
                        <?php echo form_dropdown('employee_designation[]', $options,isset($row->id)?$row->id:'',array('class'=>'form-control','required'=>'required')); ?>
                        <!--                        --><?php //echo form_input(array('type' => 'text','name' => 'class[]','class' =>'form-control','value' => set_value('class',(isset($row->class)?$row->class:"")),'placeholder' => 'Enter class','id'=>'class')) ;?>


                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group">
                        <?php echo form_error('dob', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Date of Birth</label>
                        <?php echo form_input(array('type' => 'text','required'=>'required','name' => 'dob[]','class' =>'datepicker form-control','value' => set_value('dob',(isset($row->dob)?$row->dob:"")),'placeholder' => 'Enter dob','id'=>'')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>

              



            </div>
            <div class="row">

               
                <div class="col-sm-12">
                    <div class="form-group">
                        <?php echo form_error('employee_address', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Employee_Address</label>
                        <textarea class="form-control" name = "employee_address[]" id= "employee_address[]" rows="1" placeholder="Enter Employee Address">
                            <?php echo isset($row->employee_address)?$row->employee_address:"";?>
                        </textarea>
                       



                      <!--   <?php echo form_input(array('type' => 'text','name' => 'employee_address[]','class' =>'form-control','value' => set_value('employee_address',(isset($row->employee_address)?$row->employee_address:"")),'placeholder' => 'Enter employee_address','id'=>'employee_address')) ;?>  -->
                        


                    </div>
                </div>


                

               


                </div>


                <div class="row">

                    <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('contact_no', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Contact No</label>
                        <?php echo form_input(array('type' => 'text','required'=>'required','name' => 'contact_no[]','class' =>'form-control','value' => set_value('contact_no',(isset($row->contact_no)?$row->contact_no:"")),'placeholder' => 'Enter contact no','id'=>'contact_no')) ;?>


                    </div>
                </div>
                     <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Email as username</label>
                        <?php echo form_input(array('type' => 'email','required'=>'required','name' => 'email[]','class' =>'form-control','value' => set_value('email',(isset($row->email)?$row->email:"")),'placeholder' => 'Enter email','id'=>'email')) ;?>


                    </div>
                </div>



                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('gender', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Gender</label>
                        <?php echo form_dropdown('gender[]', $gender,isset($row->id)?$row->id:'',array('class'=>'form-control')); ?>
                      
                    </div>
                </div>
                </div>

                <div class="row">
                     <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Password</label>
                        <?php echo form_input(array('type' => 'password','required'=>'required', 'name' => 'password[]','class' =>'form-control','value' => set_value('password',(isset($row->password)?$row->password:"")),'placeholder' => 'Enter password','id'=>'password')) ;?>


                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="form-group">

                        <?php echo form_error('social_link', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Social media link ( facebook/twitter )</label>
                        <?php echo form_input(array('type' => 'social_link','name' => 'social_link[]','class' =>'form-control','value' => set_value('social_link',(isset($row->social_link)?$row->social_link:"")),'placeholder' => 'Enter social media link','id'=>'social_link')) ;?>


                    </div>
                </div>

                </div>


        </div>

    <div class="form-group" style = "margin-top:5%;">

        <div class="text-center">
            <div class="footer">
                <?php
                    echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit'));
                   echo form_button(array( 'onclick'=>'javascript:history.go(-1)','id' => 'button', 'type' => 'button', 'class' => 'btn btn-hover btn-danger  ', 'content' => 'Cancel'));
                   ?>


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