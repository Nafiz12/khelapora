
<?php 
$for_slideshow = array('0' => "Select for Slideshow",'1'=>'Select For Gallery');
 ?>
    <!-- /.box-header -->
    <div class="box-body pad">
        <?php
        $action = $this->uri->segment(2);
        if (isset($row->id)) {
            $hidden_input = array('notice_id' => $row->id);
        } else {
            $hidden_input = '';
        }

        ?>
        <?php echo form_open_multipart("index.php/Feature_slideshows/$action", '', $hidden_input); ?>

        <div class="form-group">
            <div class="row">
                <div class="col-md-9">
                    <?php echo form_error('title', '<div class="error">', '</div>'); ?>
            <label for="exampleInputEmail1">Caption</label>
            <?php echo form_input(array('type' => 'text', 'name' => 'title', 'class' => 'form-control', 'value' => set_value('title', (isset($row->title) ? $row->title : "")), 'placeholder' => 'Enter title', 'id' => 'title')); ?>
                </div>
                <div class="col-md-3">
                     <div class="form-group">
                            <?php echo form_error('for_slideshow', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Select Where to Insert</label>
                            <?php echo form_dropdown('for_slideshow', $for_slideshow, set_value('for_slideshow', (isset($row->for_slideshow) ? $row->for_slideshow : "")), 'id="for_slideshow" class="form-control"'); ?>
                                        <i class="arrow double"></i>
                                        <?php echo form_error('for_slideshow'); ?>
                    
                        </div>
                </div>
                
                 <?php echo form_input(array('type' => 'hidden', 'name' => 'group_id', 'class' => 'form-control', 'value' => set_value('group_id', (isset($row->group_id) ? $row->group_id : rand())), 'id' => 'group_id')); ?>
            </div>
            


        </div>

        <div class="form-group"><label for="exampleInputEmail1">Upload Files ( Min: 1 and Max: 5 ) ( Image resolution must be width : 1910px and height : 500px )</label></div>


        <div class="file-loading">
            <input id="feature_image" name="upload[]" type="file" multiple>
        </div>

        <!--                    </textarea>-->
        <?php echo form_close(); ?>
    </div>

    <!-- /.box -->


    </div>
    <!-- /.col-->
    </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php $this->load->view('Layouts/admin_footer'); ?>