
    <style>
        row{
            margin-right:0px;
        }
    </style>
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('id'=>$row->id);}else{$hidden_input = '';}
$options = array();
if(isset($designation_list)){
    foreach($designation_list as $designation_list)
    {
        $options[$designation_list->id]=$designation_list->designation_name;
    }


}
$status = array('' => "- Select status -",'1'=>"Active",'0'=>"InActive");

$role_options = array('' => "- Select Role -");
foreach ($user_roles as $row1) {
    $role_options[$row1['id']] = ($row1['role_name']);
}
?>


<?php echo form_open_multipart("index.php/Users/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>
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

                        <?php echo form_error('txt_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputEmail1">Name</label>
                        <?php echo form_input(array('type' => 'text','name' => 'txt_name','class' =>'form-control','value' => set_value('txt_name',(isset($row->name)?$row->name:"") ), 'placeholder' => 'Name','id'=>'txt_name')) ;?>

                               

                    </div>
                </div>


              


                <div class="col-sm-4">
                    <div class="form-group">
                        <?php echo form_error('reg_date'); ?>
                        <label for="exampleInputPassword1">Regi Date</label>
                        <?php echo form_input(array('type' => ',text','id'=>"datepicker" ,'required'=>"required", 'class'=>"form-control" ,'name'=>"reg_date",'value' => set_value('reg_date',(isset($row->reg_date)?$row->reg_date:"")),'placeholder' => 'Enter Date')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('user_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">User Name</label>
                        <?php echo form_input(array('type' => 'text','name' => 'user_name','class' =>'form-control','value' => set_value('user_name',(isset($row->user_name)?$row->user_name:"")),'placeholder' => 'Enter User Name','id'=>'user_name')) ;?>


                    </div>
                </div>






            </div>
            <div class="row">


                <div class="col-sm-4">
                    <div class="form-group">
                       
                        <label for="exampleInputPassword1">Role</label>
                        <?php echo form_dropdown('role_id', $role_options, set_value('role_id', (isset($row->role_id) ? $row->role_id : "")), 'id="role_id", class="form-control custom_checkbox" '); ?>
                                <?php echo form_error('role_id'); ?>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group">

                        
                        <label for="exampleInputPassword1">Status</label>
                       <?php echo form_dropdown('status', $status,isset($row->status)?$row->status:'',array('class'=>'form-control')); ?>
                                <?php echo form_error('status'); ?>
                           


                    </div>
                </div>

                 <?php if ($action != "edit") { ?>

                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Password</label>
                        <?php echo form_input(array('type' => 'password','name' => 'password','class' =>'form-control','value' => set_value('password',(isset($row->password)?$row->password:"")),'placeholder' => 'Enter password','id'=>'password')) ;?>


                    </div>
                </div>



                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('passconf', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Confirm Password</label>
                        <?php echo form_input(array('type' => 'password','name' => 'passconf','class' =>'form-control','value' => set_value('passconf',(isset($row->passconf)?$row->passconf:"")),'placeholder' => 'Confirm password','id'=>'passconf')) ;?>


                    </div>
                </div>
                <?php } ?>

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