<?php $this->load->view('Layouts/admin_header'); ?>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Manage_menus/add" class="btn btn-primary" style = "text-decoration: none;">Manage Menus</a> </div>
                            <table id="example1" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Main Menu </th>
                                    <th>Sub Menu</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;if(isset($menu_list) && !empty($menu_list)) { foreach($menu_list as $key => $menu){ ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $key;?></td>
                                    <td><table class="table table-bordered"><?php foreach ($menu as $value){ ?><tr><td><?php echo $value['id'];?></td><td><?php echo $value['submenu_name'];?></td></tr><?php }  ?></table></td>


                                    <td class="text-center">

<!--                                        <a href = "--><?php //echo base_url();?><!--index.php/Admins/edit/--><?php //echo $admin->id;?><!--" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>-->
<!--                                           <a href = "--><?php //echo base_url();?><!--index.php/Admins/permission/--><?php //echo $admin->id;?><!--" style = "border-radius:50px;" class="btn btn-info btn-sm">Permission</a>-->
<!--                                        <a onclick="return confirm('are you sure you want to delete this user ?');"-->
<!--                                           href="--><?php //echo base_url();?><!--index.php/Admins/delete/--><?php //echo $admin->id;?><!--" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>-->

                                    </td>
                                </tr>

                                    <?php $i++;}  } ?>


                                </tbody>
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