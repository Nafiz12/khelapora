
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('holiday_id'=>$row->id);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Holiday_configs/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>

    <div class="row">
        <div class="col-sm-4 ">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label> Holiday name</label>
                        <?php echo form_error('holiday_name', '<div class="error">', '</div>'); ?>
                            <?php echo form_input(array('type' => 'text','name' => 'holiday_name','class' =>'form-control','value' => set_value('holiday_name',(isset($row->holiday_name)?$row->holiday_name:"") ), 'placeholder' => 'Enter Holiday_name','id'=>'holiday_name')) ;?>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label> From Date</label>
                        <?php echo form_error('date_from', '<div class="error">', '</div>'); ?>
                        <?php echo form_input(array('name' => 'date_from','class' =>'form-control','value' => set_value('date_from',(isset($row->date_from)?$row->date_from:"") ), 'placeholder' => 'Enter date','id'=>'datepicker')) ;?>

                    </div>
                </div>


                <div class="col-sm-6 text-right">
                    <div class="form-group">
                        <label> To Date</label>
                        <?php echo form_error('date_to', '<div class="error">', '</div>'); ?>
                        <?php echo form_input(array('name' => 'date_to','class' =>'form-control','value' => set_value('date_to',(isset($row->date_to)?$row->date_to:"") ), 'placeholder' => 'Enter date','id'=>'datepicker1')) ;?>

                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label> Occation</label>
                        <?php echo form_error('occation', '<div class="error">', '</div>'); ?>
                        <?php echo form_textarea(array('name' => 'occation','cols'=>'4', 'rows'=>'5','class' =>'form-control','value' => set_value('occation',(isset($row->occation)?$row->occation:"") ), 'placeholder' => 'Enter Holiday_occation','id'=>'occation')) ;?>

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
        
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Holiday Name </th>
                            <th>From Date </th>
                            <th>To Date </th>
                            <th>Holiday Occation </th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($holiday_list) && !empty($holiday_list)) { foreach($holiday_list as $holiday){ ?>
                            <tr>
                                <td><?php echo $holiday->id;?></td>
                                <td><?php echo $holiday->holiday_name;?></td>
                                <td><?php echo $holiday->date_from;?></td>
                                <td><?php echo $holiday->date_to;?></td>
                                <td><?php echo $holiday->occation;?></td>

                                <td class="text-center">
                                    
                                     
                                    <?php
                      
                        echo anchor('index.php/Holiday_configs/edit/' . $holiday->id, img(array('src' => base_url() . 'lib/images/editt.png', 'border' => '0', 'alt' => 'editt')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/Holiday_configs/delete/' . $holiday->id, img(array('src' => base_url() . 'lib/images/delete.png', 'border' => '0', 'alt' => 'delete')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This ?')"));


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