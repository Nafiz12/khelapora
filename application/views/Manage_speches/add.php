
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('spech_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Manage_speches/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
            <div class="col-sm-4 text-center">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input id="avatar-1" name="image" type="file" >
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">

                                <?php echo form_error('headline', '<div class="error">', '</div>'); ?>
                                <label for="exampleInputEmail1">Heading</label>
                                <?php echo form_input(array('type' => 'text','name' => 'headline','class' =>'form-control','value' => set_value('headline',(isset($row->headline)?$row->headline:"") ), 'placeholder' => 'Enter headline','id'=>'headline')) ;?>


                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">

                                <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                <label for="exampleInputEmail1">Name</label>
                                <?php echo form_input(array('type' => 'text','name' => 'name','class' =>'form-control','value' => set_value('name',(isset($row->name)?$row->name:"") ), 'placeholder' => 'Enter name','id'=>'name')) ;?>


                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo form_error('designation', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Designation</label>
                            <?php echo form_input(array('type' => 'text','name' => 'designation','class' =>'form-control','value' => set_value('designation',(isset($row->designation)?$row->designation:"")),'placeholder' => 'Enter designation','id'=>'designation')) ;?>
                            <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                        </div>
                    </div>

                    
                </div>
                <div class="row">


                    <div class="col-sm-12">

                            <?php echo form_error('spech', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Spech</label>
                        <textarea id="spech" name="spech" rows="10" cols="80"><?php if (isset($row->spech)){echo $row->spech;}?> </textarea>
                            <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->

                    </div>

                </div>
                <div class="form-group">

                    <div class="text-center">
                        <div class="footer">
                            <?php echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>
                            <?php echo form_button(array( 'onclick'=>'javascript:history.go(-1)','id' => 'button', 'type' => 'button', 'class' => 'btn btn-hover btn-danger  ', 'content' => 'Cancel')); ?>

                            <!--                                <button type="submit" class="btn btn-primary">Submit</button>-->
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