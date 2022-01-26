<?php $this->load->view('Layouts/admin_header'); ?>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Admins/add" class="btn btn-primary" style = "text-decoration: none;">Add New Admin</a> </div>

                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <div class="kv-avatar">
                                        <div class="file-loading">
                                            <div id="avatar-1" name="image" type="file" ></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">

                                                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                                <label for="exampleInputEmail1">Username</label>
                                                <?php echo form_input(array('type' => 'text','name' => 'username','class' =>'form-control','value' => set_value('username',(isset($row->username)?$row->username:"") ), 'placeholder' => 'Enter Username','id'=>'username')) ;?>


                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <?php echo form_error('fullname', '<div class="error">', '</div>'); ?>
                                                <label for="exampleInputPassword1">Fullname</label>
                                                <?php echo form_input(array('type' => 'text','name' => 'fullname','class' =>'form-control','value' => set_value('fullname',(isset($row->fullname)?$row->fullname:"")),'placeholder' => 'Enter Fullname','id'=>'fullname')) ;?>
                                                <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <?php echo form_error('fullname', '<div class="error">', '</div>'); ?>
                                                <label for="exampleInputPassword1">Fullname</label>
                                                <?php echo form_input(array('type' => 'text','name' => 'fullname','class' =>'form-control','value' => set_value('fullname',(isset($row->fullname)?$row->fullname:"")),'placeholder' => 'Enter Fullname','id'=>'fullname')) ;?>
                                                <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                                            </div>
                                        </div>


                                        <div class="col-sm-2">
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
                                                <!--                                <button type="submit" class="btn btn-primary">Submit</button>-->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>





                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image </th>
                                    <th>Username</th>
                                    <th>Fullname</th>

                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($admin_list) && !empty($admin_list)) { foreach($admin_list as $admin){ ?>
                                <tr>
                                    <td><?php echo $admin->id;?></td>
                                    <td><img class="img-circle img-responsive" src="<?php echo base_url();?><?php echo $admin->image;?>" width="100" height="100"></td>
                                    <td><?php echo $admin->username;?></td>
                                    <td> <?php echo $admin->fullname;?></td>

                                    <td class="text-center">
                                       <?php  if($this->session->userdata('user_id') == $admin->id){?>
                                        <a href = "<?php echo base_url();?>index.php/Admins/edit/<?php echo $admin->id;?>" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>
                                           <a href = "<?php echo base_url();?>index.php/Admins/permission/<?php echo $admin->id;?>" style = "border-radius:50px;" class="btn btn-info btn-sm">Permission</a>
                                        <a onclick="return confirm('are you sure you want to delete this user ?');"
                                           href="<?php echo base_url();?>index.php/Admins/delete/<?php echo $admin->id;?>" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>

                                         <?php }else{}?>

                                    </td>
                                </tr>

                                    <?php } } ?>



                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php $this->load->view('Layouts/admin_footer'); ?>