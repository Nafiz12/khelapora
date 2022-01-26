
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('designation_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Employee_designations/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
        <div class="col-sm-3 ">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <?php echo form_error('designation_name', '<div class="error">', '</div>'); ?>
                            <?php echo form_input(array('type' => 'text','name' => 'designation_name','class' =>'form-control','value' => set_value('designation_name',(isset($row->designation_name)?$row->designation_name:"") ), 'placeholder' => 'Enter Designation Name','id'=>'designation_name')) ;?>

                    </div>
                </div>
            </div>

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
                            <th>Designation Name </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($designation_list) && !empty($designation_list)) { foreach($designation_list as $designation){ ?>
                            <tr>
                                <td><?php echo $designation->id;?></td>
                                <td><?php echo $designation->designation_name;?></td>

                                <td class="text-center">

                                    <?php
//                                    echo anchor('index.php/Admins/view/' . $admin->id, img(array('src' => base_url() . 'lib/images/view.png', 'border' => '0', 'alt' => 'view')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                    echo anchor('index.php/Employee_designations/edit/' . $designation->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                                    echo anchor('index.php/Employee_designations/delete/' . $designation->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


                                    ?>

                                </td>
                            </tr>

                        <?php }  } ?>


                        </tbody>
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