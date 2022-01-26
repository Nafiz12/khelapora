
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('config_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Organization_configurations/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
        <div class="col-sm-4 text-center">
            <div class="kv-avatar">
                <div class="file-loading">
                    <input id="avatar-1" name="image" type="file" >
                </div>
            </div>
            <div class="kv-avatar-hint"><small>Select logo </small></div>
        </div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('Org_title', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputEmail1">Organization Title</label>
                        <?php echo form_input(array('type' => 'text','name' => 'Org_title','class' =>'form-control','value' => set_value('Org_title',(isset($row->title)?$row->title:"") ), 'placeholder' => 'Enter Org title','id'=>'Org_title')) ;?>


                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <?php echo form_error('Org_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Organization Name</label>
                        <?php echo form_input(array('type' => 'text','name' => 'Org_name','class' =>'form-control','value' => set_value('Org_name',(isset($row->organization_name)?$row->organization_name:"")),'placeholder' => 'Enter Org name','id'=>'Org_name')) ;?>
                        <!--                                    <input type="text" name = "fullname" class="form-control" id="fullname" placeholder="Enter Fullname">-->
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('Establishment_year', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Eshtablishment Year</label>
                        <?php echo form_input(array('type' => 'text','name' => 'year','class' =>'form-control','value' => set_value('year',(isset($row->year)?$row->year:"")),'placeholder' => 'Enter Establishment Year','id'=>'Org_slogan')) ;?>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('Org_slogan', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Organization Slogan</label>
                        <?php echo form_input(array('type' => 'text','name' => 'Org_slogan','class' =>'form-control','value' => set_value('Org_slogan',(isset($row->organization_slogan)?$row->organization_slogan:"")),'placeholder' => 'Enter Org_slogan','id'=>'Org_slogan')) ;?>


                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('eiin_no', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Eiin No.</label>
                        <?php echo form_input(array('type' => 'text','name' => 'eiin_no','class' =>'form-control','value' => set_value('eiin_no',(isset($row->eiin_no)?$row->eiin_no:"")),'placeholder' => 'Enter EIIN No','id'=>'Org_slogan')) ;?>


                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('address', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Address.</label>
                        <?php echo form_input(array('type' => 'text','name' => 'address','class' =>'form-control','value' => set_value('address',(isset($row->address)?$row->address:"")),'placeholder' => 'Enter Address','id'=>'Org_slogan')) ;?>


                    </div>
                </div>




            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('org_email', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Organization Email</label>
                        <?php echo form_input(array('type' => 'email','name' => 'org_email','class' =>'form-control','value' => set_value('org_email',(isset($row->org_email)?$row->org_email:"")),'placeholder' => 'Enter Email Address','id'=>'org_email')) ;?>


                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">

                        <?php echo form_error('org_contact', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1"> Organization Contact</label>
                        <?php echo form_input(array('type' => 'text','name' => 'org_contact','class' =>'form-control','value' => set_value('org_contact',(isset($row->org_contact)?$row->org_contact:"")),'placeholder' => 'Enter Organization Contact','id'=>'org_contact')) ;?>


                    </div>
                </div>


                
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">

                        <div class="text-center">
                            <div class="footer">
                                <?php echo form_button(array('style'=>'margin-top: 27px;','name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>
                                <?php echo form_button(array( 'onclick'=>'javascript:history.go(-1)','style'=>'margin-top: 27px;','id' => 'button', 'type' => 'button', 'class' => 'btn btn-hover btn-danger  ', 'content' => 'Cancel')); ?>

                                <!--                                <button type="submit" class="btn btn-primary">Submit</button>-->
                            </div>

                        </div>
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