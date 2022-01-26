
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('admin_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Admins/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
            <div class="col-sm-4 text-center">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input id="avatar-1" name="image" type="file" >
                    </div>
                </div>
                <div class="kv-avatar-hint"><small>Select file < 1500 KB</small></div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">

                                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                <label for="exampleInputEmail1">Username</label>
                                <?php echo form_input(array('type' => 'text','name' => 'username','class' =>'form-control','value' => set_value('username',(isset($row->username)?$row->username:"") ), 'placeholder' => 'Enter Username','id'=>'username')) ;?>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo form_error('fullname', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Fullname</label>
                            <?php echo form_input(array('type' => 'text','name' => 'fullname','class' =>'form-control','value' => set_value('fullname',(isset($row->fullname)?$row->fullname:"")),'placeholder' => 'Enter Fullname','id'=>'fullname')) ;?>
                            <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">

    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
    <label for="exampleInputPassword1">Password</label>
    <?php echo form_input(array('type' => 'password','name' => 'password','class' =>'form-control','value' => set_value('password',(isset($row->password)?$row->password:"")),'placeholder' => 'Enter password','id'=>'password')) ;?>


                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Email</label>
                            <?php echo form_input(array('type' => 'email','name' => 'email','class' =>'form-control','value' => set_value('email',(isset($row->email)?$row->email:"")),'placeholder' => 'Enter Email','id'=>'email')) ;?>
                            <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                        </div>
                    </div>

                </div>
                <div class="form-group">

                    <div class="text-center">
                        <div class="footer">
                            <?php echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>
                            <?php echo form_button(array( 'onclick'=>'javascript:history.go(-1)','id' => 'button', 'type' => 'button', 'class' => 'btn btn-hover btn-danger  ', 'content' => 'Cancel')); ?>
                            <!--                                <button type="submit" class="btn btn-primary">Submit</button>-->
<!--                            <div><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>-->

                        </div>

                    </div>
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