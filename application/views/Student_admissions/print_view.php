

    <style>
        #con{
            margin-right:15px;
            margin-left:15px;
        }

    </style>



        <?php if(isset($printable_data) && !empty($printable_data)) { foreach($printable_data as $printable){

            //echo "<pre>";print_r($printable);die;
            ?>
<div class="row" id = "con"  >
    <?php
            for($i=0;$i<2;$i++){
            ?>

            <div class="col-sm-6 text-center" id="report_container" style = "padding-top:3%; <?php if($i==1){?>border-left:1px solid black; <?php }?>">
                <div class="row">
                    <?php if(isset($org_info)){foreach($org_info as $org){ ?>
                        <div class="col-md-3 pull-left">
                            <a class="pull-left" href="<?php echo base_url();?>"><img class="img-responsive img-circle site_logo" src="<?php echo base_url();?><?php echo $org->image;?>" alt="logo"/></a>
                        </div>

                        <div class="col-md-9 pull-left">
                            <h5 class="pull-left" style="font-size: 17px;"><?php echo $org->organization_name;?></h5>
                            <h6 class="pull-left" style = "margin-top:-3px;"><?php echo $org->organization_slogan;?></h6>

                        </div>

                    <?php }}?>



                </div>
                <br>
                <br>

                <div class="row">
                    <div class="col-sm-6 pull-left">
                        <div class="pull-left"> Form No :  <?php echo $printable['form_no'];?></div>
                    </div>

                    <div class="col-sm-6 pull-right">
                        <div class="pull-right"> Date : <?php echo $printable['created_on'];?> </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 pull-left">
                        <div class="pull-left">   Student Name : <?php echo $printable['student_name'];?> </div>
                    </div>

                    <div class="col-sm-6 pull-right">
                        <div class="pull-right"> Class : <?php echo $printable['class_name'];?> </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 pull-left">
                        <div class="pull-left"> ID  : <?php echo $printable['student_id'];?> </div>
                    </div>

                    <div class="col-sm-6 pull-right">
                        <div class="pull-right">  Section : </div>
                    </div>
                </div>

                <div class="row" id="report_container">
                    <table class="table table-bordered table-responsive report_total" cellspacing="0" width="100%" border="1" >
                        <tr>
                            <thead>

                            <th> SI. NO </th>
                            <th> Particulars </th>
                            <th class="text-right"> Amount </th>
                            </thead>
                        </tr>
                        <tbody>

                        <tr>
                            <td>02</td>
                            <td> <div class="pull-left"> library_fee </div></td>
                            <td > <div class="text-right"> <?php  echo $printable['library_fee'] ;?> </div> </td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td> <div class="pull-left"> transportation_fee </div></td>
                            <td >  <div class="text-right"> <?php  echo $printable['transportation_fee'];?> </div> </td>
                        </tr>

                        <tr>
                            <td>04</td>
                            <td><div class="pull-left">scouts </div></td>
                            <td > <div class="text-right"><?php echo $printable['scouts'] ;?> </div>  </td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td><div class="pull-left">sports </div></td>
                            <td > <div class="text-right"><?php echo $printable['sports'] ;?> </div>  </td>
                        </tr>
                        <tr>
                            <td>06</td>
                            <td><div class="pull-left">others </div></td>
                            <td > <div class="text-right"><?php echo $printable['others'] ;?> </div>  </td>
                        </tr>


                        <tr>
                            <td>07</td>
                            <td><div class="pull-left">Admission fee </div></td>
                            <td > <div class="text-right"><?php if(isset($printable['admission_purpose'])>0){echo  number_format($printable['admission_purpose'],'2','.',',' ); }else{echo '--';} ;?> </div>  </td>
                        </tr>

                        <tr>
                            <td>08</td>
                            <td><div class="pull-left">Monthly fee </div></td>
                            <td > <div class="text-right"><?php if(isset($printable['monthly_purpose'])>0){echo  number_format($printable['monthly_purpose'],'2','.',',' ); }else{echo '--';} ;?> </div>  </td>
                        </tr>


                        <tr>
                            <td>09</td>
                            <td><div class="pull-left">Sessional fee </div></td>
                            <td > <div class="text-right"><?php if(isset($printable['session_purpose'])>0){echo  number_format($printable['session_purpose'],'2','.',',' ); }else{echo '--';} ;?> </div>  </td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td><div class="pull-left">Yearly fee </div></td>
                            <td > <div class="text-right"><?php if(isset($printable['yearly_purpose'])>0){echo  number_format($printable['yearly_purpose'],'2','.',',' ); }else{echo '--';} ;?> </div>  </td>
                        </tr>




                        <tr>
                            <td>Total </td>
                            <td>   </td>
                            <td class="text-right"> <?php echo number_format( $printable['total_balance'],'2','.',',' );?> </td>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6 pull-left">
                        <div class="pull-left"> Receiver signature:..........</div>
                    </div>

                    <div class="col-md-6 pull-left">
                        <div class="pull-right"> Guardian's signature:........</div>
                    </div>
                </div>


            </div>


                <div class="col-md-2">
                </div>

        <?php } ?>  </div> <?php } } ?>
        <div class="form-group"  style = "margin-top:5px;">

            <div class="text-center">
                <div class="footer">
                    <?php echo form_button(array('name' => 'submit', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary ', 'content' => 'Submit')); ?>

                </div>

            </div>
        </div>

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<div class="navbar-inverse navbar-fixed-bottom " id="global_print_menu"
     style='display:none;z-index:9999;margin-bottom:-4px;padding-top:1px;'>
    <div id="global_print_menu_container">
        <ul id="float_bar_menu">
            <li id="printer">
<!--                <a href="--><?php //echo base_url();?><!--index.php/Reports/show_print_friendly" class="btn btn-default btn-flat">Change Password</a>-->
                <?php echo anchor('index.php/Reports/show_print_friendly', 'Print', array('onclick' => 'show_print_friendly();return false;', 'class' => 'context-links printer', 'alt' => '', 'title' => 'Print')); ?>
            </li>
            <li id="execlsave">
                <?php echo anchor('reports/export_to_excel', 'Export to Execl', array('onclick' => 'export_to_excel();return false;', 'class' => 'context-links execl', 'alt' => '', 'title' => 'Export to Excel')); ?>
            </li>
            <li id="pdfsave">
                <?php echo anchor('reports/export_to_pdf', 'Export to PDF', array('onclick' => 'show_pdf_friendly();return false;', 'class' => 'context-links pdf', 'alt' => '', 'title' => 'Export to PDF', 'target' => "_blank")); ?>
            </li>
            <li id="fullscreener">
                <?php echo anchor('#', 'Full Screen', array('onclick' => 'full_screen();return false;', 'class' => 'context-links full-screen', 'id' => 'link_full_screen')); ?>
            </li>
        </ul>
        <?php echo form_open('reports/show_print_friendly', array('id' => 'print_form', 'target' => '_blank')); ?>
        <input type="hidden" name="report_data" id="report_data" value=""/>
        <?php echo form_close(); ?>
    </div>
</div>


<?php $this->load->view('Layouts/admin_footer'); ?>

<script>

    function show_print_friendly()
    {

        $('#report_data').val($('#report_container').html());
        $("#print_form").attr("action", base_url + "index.php/Reports/show_print_friendly");
        $('#print_form').submit();
    }

    $("document").ready(function(){




            if ($('#report_container').find('table').length)
            {
                is_print_toolbar_shown = true;


            }
            else
            {
                is_print_toolbar_shown = false;


            }




            if(is_print_toolbar_shown = true){

                $("#global_print_menu").fadeIn(500);
            }




    })
</script>
