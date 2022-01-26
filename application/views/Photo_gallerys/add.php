<?php $this->load->view('Layouts/admin_header'); ?>

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
            <?php echo form_error('title', '<div class="error">', '</div>'); ?>
            <label for="exampleInputEmail1">title</label>
            <?php echo form_input(array('type' => 'text', 'name' => 'title', 'class' => 'form-control', 'value' => set_value('title', (isset($row->title) ? $row->title : "")), 'placeholder' => 'Enter title', 'id' => 'title')); ?>


        </div>

        <div class="form-group"><label for="exampleInputEmail1">Upload Files ( Min: 1 and Max: 5 ) </label></div>


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