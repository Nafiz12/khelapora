
    <style>
        #con{
            margin-right:15px;
            margin-left:15px;
        }

    </style>

<div class="row">
    <?php
    if(isset($previous_payment_info ) && !empty($previous_payment_info)){ ?>

            <div class="col-md-12">
                The student has due taka <?php echo $previous_payment_info['fee_due'];?>
            </div>

   <?php } ?>
    <div class="col-md-12">

    </div>
</div>
<?php

$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('student_id'=>$row->id,'section_id' =>$row->section);}else{$hidden_input = '';}

?>
<?php echo form_open_multipart("index.php/Student_admissions/$action",'',$hidden_input,array('id' => 'uploadForm','class'=>'form form-vertical'));?>
    <div class="row" id = "con"  >
        <div class="col-sm-3 text-center" style = "padding-top:3%;">
            <div class="row">
                <div class="col-sm-12 text-center">
                <div class="kv-avatar pull-right">
                    <img class="blah img-circle" <?php if(isset($row->image)){?> src="<?php echo base_url();?>lib/images/<?php echo $row->image;?>"<?php } else{ ?> src="<?php echo base_url();?>lib/images/admin_default.png" <?php } ?>  alt="your image"  width = "150px" height = "160px" style = "margin-left: -85%; "/>

                </div>
                </div>
           </div><br><br>

            <div class="row">
                <div class="col-sm-12 text-left">
                        <!--                        --><?php //echo form_error('student_name', '<div class="error">', '</div>'); ?>
                        <label for="exampleInputPassword1">Form No : &nbsp;&nbsp;<?php echo isset($row->form_no)?$row->form_no:"" ;?></label> <br>
                        <label for="exampleInputPassword1">Student Name  : &nbsp;&nbsp;<?php echo isset($row->student_name)?$row->student_name:"" ;?></label><br>
                        <label for="exampleInputPassword1">Date of Birth  : &nbsp;&nbsp;<?php echo isset($row->dob)?$row->dob:"" ;?></label><br>
                        <label for="exampleInputPassword1">Father's  Name  : &nbsp;&nbsp;<?php echo isset($row->father_name)?$row->father_name:"" ;?></label><br>
                        <label for="exampleInputPassword1">Mother's  Name  : &nbsp;&nbsp;<?php echo isset($row->mother_name)?$row->mother_name:"" ;?></label><br>
                        <label for="exampleInputPassword1">Address  : &nbsp;&nbsp;<?php echo isset($row->address)?$row->address:"" ;?></label>
<!--                        --><?php //echo form_input(array('type' => 'hidden','name' => 'student_name','class' =>'form-control','value' => set_value('student_name',(isset($row->student_name)?$row->student_name:"")),'placeholder' => 'Enter student name','id'=>'student_name')) ;?>

                </div>
            </div>


        </div>
        <div class="col-md-9">
            <div class="row" style = "margin:0px;padding:0px;">
                <div class="col-sm-12">
                        <?php echo form_input(array('type' => 'hidden','name' => 'form_no','class' =>'form-control','value' => set_value('form_no',(isset($row->form_no)?$row->form_no:"") ), 'placeholder' => 'Enter form no','id'=>'form_no')) ;?>
                        <?php echo form_input(array('type' => 'hidden','name' => 'class','class' =>'form-control','value' => set_value('class',(isset($row->class)?$row->class:"")),'placeholder' => 'Enter class','id'=>'class')) ;?>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-2">

                    <select name = "year" class="form-control ">
                        <option value  = ""> select</option>
                        <option value  = "2016"> 2016</option>
                        <option value  = "2017"> 2017</option>
                        <option value  = "2018"> 2018</option>
                        <option value  = "2019"> 2019</option>
                        <option value  = "2020"> 2020</option>
                        <option value  = "2021"> 2021</option>
                    </select>

                </div>

                <div class="col-md-2">
                    <?php echo form_checkbox('mode_of_payment[]', 'admission_purpose', TRUE);?> &nbsp;&nbsp;Admission Purpose
                </div>

                <div class="col-md-2">
                    <?php echo form_checkbox('mode_of_payment[]', 'monthly_purpose', TRUE);?> &nbsp;&nbsp;Monthly Purpose
                </div>

                <div class="col-md-2">
                    <?php echo form_checkbox('mode_of_payment[]', 'session_purpose', TRUE);?> &nbsp;&nbsp;Sessional Purpose
                </div>

                <div class="col-md-2">
                    <?php echo form_checkbox('mode_of_payment[]', 'yearly_purpose', TRUE);?> &nbsp;&nbsp;Yearly Purpose
                </div>

                <div class="col-md-2">

                    <select name = "month" class="form-control ">
                        <option value  = ""> select</option>
                        <option value  = "January"> January</option>
                        <option value  = "February"> February</option>
                        <option value  = "March"> March</option>
                        <option value  = "April"> April</option>
                        <option value  = "May"> May</option>
                        <option value  = "June"> June</option>
                        <option value  = "July"> July</option>
                        <option value  = "August"> August</option>
                        <option value  = "September"> September</option>
                        <option value  = "October"> October</option>
                        <option value  = "November"> November</option>
                        <option value  = "December"> December</option>
                    </select>

                </div>
            </div>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <thead>

                          <th style = "width:1%;"> SI. NO </th>
                          <th style ="width:70%"> Particulars </th>
                          <th class="text-right"> Amount </th>
                        </thead>
                    </tr>
                    <tbody>
                    <?php
                     $sum = 0;
                    if(isset($field_of_payment) && !empty($field_of_payment)) { foreach($field_of_payment as $payment){ ?>
                      <tr>
                          <?php $field_name = preg_replace('/\s+/', '_', $payment->particulars);

                           ?>
                            <div  id = "hidden_value">
                                <td><?php echo $payment->id;?></td>

                                <td> &nbsp;&nbsp;&nbsp;<?php echo $payment->particulars;?> </td>
                                <?php  if($field_name == 'session_purpose' || $field_name == 'yearly_purpose'|| $field_name == 'admission_purpose' || $field_name == 'monthly_purpose' ){ ?>
                                <td class="text-right" > <input type ="text" class = "form-control text-right" readonly  id = "<?php echo $field_name;?>" name = "related_purpose[]" value = "<?php echo $payment->amount;?>"> </td>
                                <?php } else{  ?>
                                    <td class="text-right" > <input type ="text" class = "form-control text-right" readonly  name = "<?php echo $field_name;?>" value = "<?php echo $payment->amount;?>"> </td>

                                <?php } ?>
                            </div>

                              <?php   $sum = $sum + $payment->amount;   ?>


                              </tr>
                 <?php   }  } ?>


                      <tr>
                          <td>Total </td>
                          <td> <?php  if(!empty($previous_payment_info['fee_due'])){ echo "previous month due has been added " ;} else{}?> </td>
                          <td class="text-right" id = "total_amount"> <input type = "text" class="form-control text-right" id = "total" readonly name = "balance" value = "<?php echo $sum+$previous_payment_info['fee_due'] ;?>"   </td>
                      </tr>
                    </tbody>
                </table>












            </div>



        </div>

    <div class="form-group" >

        <div class="text-center">
            <div class="footer">
                    <?php echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>

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