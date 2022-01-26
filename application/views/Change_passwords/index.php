


<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-md-8">
                    <!-- form start -->
                    <?php echo form_open_multipart("index.php/Change_passwords/change_admin_password");?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo form_error('old_password', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputEmail1">Old Password</label>
                            <?php echo form_input(array('type' => 'text','name' => 'old_password','class' =>'form-control','value' => set_value('old_password' ), 'placeholder' => 'Enter old_password','id'=>'old_password')) ;?>


                        </div>
                            </div>
                            <div class="col-sm-6">
                        <div class="form-group">
                            <?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">New Password</label>
                            <?php echo form_input(array('type' => 'text','name' => 'new_password','class' =>'form-control','value' => set_value('new_password'),'placeholder' => 'Enter new_password','id'=>'new_password')) ;?>
                            <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                        </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">

                        <div class="form-group">
                            <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <?php echo form_input(array('type' => 'text','name' => 'confirm_password','class' =>'form-control','value' => set_value('confirm_password'),'placeholder' => 'Enter confirm_password','id'=>'confirm_password')) ;?>
                            <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                        </div>
                            </div>





                    <!-- /.box-body -->
                        <div class="col-sm-6">
                    <div class="form-group">
                        <?php echo form_button(array('style'=>'margin-top: 7%;width: 42%;margin-left: 26%;','name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>
                        <!--                                <button type="submit" class="btn btn-primary">Submit</button>-->
                    </div>
                        </div>
                        </div>
                    <?php echo form_close();?>
    </div>
    </div>
    </div>

                </div>
            </div>
            <!-- /.box -->

            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



<?php $this->load->view('Layouts/admin_footer'); ?>