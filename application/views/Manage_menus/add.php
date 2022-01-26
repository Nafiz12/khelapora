<?php $this->load->view('Layouts/admin_header'); ?>
<?php
$action=$this->uri->segment(2);
if($action == 'add_submenu'){
    $options = array();
    foreach($row_combo as $row_combo)
    {
        $options[$row_combo->id]=$row_combo->menu_name;
    }
}
if(isset($row->id)){ $hidden_input=array('menu_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Manage_menus/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
        <div class="col-sm-3 ">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?php echo form_error('menu', '<div class="error">', '</div>'); ?>
                        <?php if($action == 'add_submenu'){?>
                            <?php echo form_dropdown('menu', $options,isset($row->id)?$row->id:'',array('class'=>'form-control','readonly' =>'readonly')); ?>
                        <?php } else { ?>
                            <?php echo form_input(array('type' => 'text','name' => 'menu','class' =>'form-control','value' => set_value('menu',(isset($row->menu_name)?$row->menu_name:"") ), 'placeholder' => 'Enter Menu Name','id'=>'menu')) ;?>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <?php if($action == 'add_submenu'){ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php echo form_error('sub_menu', '<div class="error">', '</div>'); ?>
                            <?php echo form_input(array('type' => 'text','name' => 'sub_menu','class' =>'form-control','value' => set_value('sub_menu',(isset($row->submenu_name)?$row->submenu_name:"") ), 'placeholder' => 'Enter Sub menu Name','id'=>'sub_menu')) ;?>


                        </div>
                    </div>
                </div>
            <?php  } ?>


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">

                        <div class="text-center">
                            <div class="footer">
                                <?php echo form_button(array('style' =>'width: 38%;','name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>
                                <!--                                <button type="submit" class="btn btn-primary">Submit</button>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>




        </div>
        
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Menu Name </th>
                            <th>Submenu Name </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; if(isset($menu_list) && !empty($menu_list)) { foreach($menu_list as $key => $menu){ ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $key;?></td>
                                <td><table class="table table-bordered"><?php foreach ($menu as $value){ ?><tr><td><?php echo $value['id'];?></td><td><?php echo $value['submenu_name'];?></td></tr><?php }  ?></table></td>


                                <td class="text-center">

                                    <a href = "<?php echo base_url();?>index.php/Manage_menus/edit/<?php echo $value['id'];?>" style = "border-radius:50px;" class="btn btn-info btn-sm">Edit</a>
                                    <a href = "<?php echo base_url();?>index.php/Manage_menus/add_submenu/<?php echo $value['id'];?>" style = "border-radius:50px;" class="btn btn-info btn-sm">Add Submenu</a>
                                    <a onclick="return confirm('are you sure you want to delete this user ?');"
                                       href="<?php echo base_url();?>index.php/Manage_menus/delete/<?php echo $value['id'];?>" style = "border-radius:50px;" class="btn btn-danger btn-sm">Delete</a>



                                </td>
                            </tr>

                        <?php $i++; } } ?>



                    </table>
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