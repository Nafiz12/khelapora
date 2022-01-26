


<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-md-8">
                    <!-- form start -->
                    <?php echo form_open_multipart("index.php/Important_links/edit");?>
                    <div class="box-body">
                        <div class="row">

                            <input type = "hidden" name = "link_id" value = "<?php echo $row[0]->id;?>" />
                            <div class="col-sm-5">
                    <div class="form-group">

                        <?php echo form_error('link_title', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Important Links Title</label>
                        <?php echo form_input(array('type' => 'text','name' => 'link_title','class' =>'form-control','value' => set_value('link_title',(isset($row[0]->title)?$row[0]->title:"")),'placeholder' => 'Enter Organization Contact','id'=>'link_title')) ;?>


                    </div>
                </div>


                 <div class="col-sm-5">
                    <div class="form-group">

                        <?php echo form_error('link', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Important Links </label>
                        <?php echo form_input(array('type' => 'text','name' => 'link','class' =>'form-control','value' => set_value('link',(isset($row[0]->link)?$row[0]->link:"")),'placeholder' => 'Enter link','id'=>'link')) ;?>


                    </div>
                </div>
                        <div class="col-sm-2">
                                            <div class="form-group">
                        <?php echo form_button(array('style'=>'margin-top: 25%;margin-left: 26%;','name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>
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