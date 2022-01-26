
<?php
$action=$this->uri->segment(2);
$subject_options = array('' => "Select Subject");
foreach ($subject_list as $row1) {
    $subject_options[$row1['SubjectId']] = $row1['SubjectName'];
}
if(isset($row->id)){ $hidden_input=array('achievements_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Lectures/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
            <div class="col-sm-4 text-center">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input id="avatar-3" name="image" type="file" >
                    </div>
                </div>
                <!-- <input type="file" name="image"> -->
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">

                                <?php echo form_error('LectureTitle', '<div class="error">', '</div>'); ?>
                                <label for="exampleInputEmail1">Headline</label>
                                <?php echo form_input(array('type' => 'text','name' => 'LectureTitle','class' =>'form-control','value' => set_value('LectureTitle',(isset($row->LectureTitle)?$row->LectureTitle:"") ), 'placeholder' => 'Enter headline here..','id'=>'headline')) ;?>


                        </div>
                    </div>


                     <div class="col-sm-4">
                        <div class="form-group">

                                <?php echo form_error('SubjectId', '<div class="error">', '</div>'); ?>
                                <label for="exampleInputEmail1">Subject</label>
                                <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', isset($row->SubjectId)?$row->SubjectId:''),'  id="SubjectId" class="custom_checkbox form-control"');
                                ?>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                                <?php echo form_error('LectureLink', '<div class="error">', '</div>'); ?>
                                <label for="exampleInputEmail1">Lecture Link</label>
                                <?php echo form_input(array('type' => 'text','name' => 'LectureLink','class' =>'form-control','value' => set_value('LectureLink',(isset($row->LectureLink)?$row->LectureLink:"") ), 'placeholder' => 'Enter Lecture Link here..','id'=>'LectureLink')) ;?>


                        </div>
                    </div>
                </div>

                <div class="row">


                    <div class="col-sm-12">

                            <?php echo form_error('LectureDetails', '<div class="error">', '</div>'); ?>
                            <label for="exampleInputPassword1">Lecture Details</label>
                        <textarea id="LectureDetails" name="LectureDetails" rows="10" cols="80"><?php if (isset($row->LectureDetails)){echo $row->LectureDetails;}?> </textarea>
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