<?php $order_total_amount = 0; ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<style type="text/css">

    input {
        outline: 0;
        border-width: 0 0 2px;
        border-color: black;
    }

    select {

        border-width: 0 0 2px;

    }


    @media print
    {
        .no-print {
            display: none !important;
        }
        .scale {
            border: 1px solid #000;
        }
        .scale tr {
            border: 1px solid #000;
        }
        .scale tr td {
            border: 1px solid #000;
        }
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    }
</style>
<?php
$action=$this->uri->segment(2);
if(isset($row->id)){ $hidden_input=array('config_id'=>$row->id);}else{$hidden_input = '';}
$options = array('-select --');
$date_from = array('--- select-----');
if(isset($holiday_data )){
    foreach($holiday_data as $holiday_data)
    {
        $options[$holiday_data->id]=$holiday_data->holiday_name;
    }


}
//        $year = array();
//        $year['2018'] = 2018;
//        $year['2019'] = 2019;
//        $year['2020'] = 2020;
//        $year['2021'] = 2021;
//        $data['year_list']=$year;



?>
<div class="panel invoice-panel">
    <div class="panel-heading">
    <span class="panel-title">
        <div class="panel-header-menu pull-right mr10">
            <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5"> <i class="fa fa-print fs13"></i> </a>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item">

        <div class="row mb30">
            <div align="center" class="col-md-10">
                <h3 class="lh10 mt10"> <?php echo $organization_info['organization_name']; ?> </h3>
                <h5 class="mn"><?php echo $organization_info['address']; ?>  </h5>
            </div>
        </div>

        <div>
            <div class="col-md-10" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>

                        <td width="70%"><b><?php echo 'Date :'.' '. date('Y-m-d');?></b></td>
                        <td width="30%" class="text-right"><?php echo 'Print Date :'.' '. date('Y-m-d');?></td>

                    </tr>

                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">This is to inform all the students of <?php echo $organization_info['organization_name']; ?> .  Due to</div>
                    <div class="col-md-2" style ="margin-left:-4%;"><?php echo form_dropdown('holiday_id', $options,isset($row->student)?$row->student:'',array('id'=>'holiday_id')); ?></div>
                    <div class="col-md-3" style ="margin-left:-2%;">Whole institute remain on leave from</div>
                </div>

                <div class="row">
                    <div class="col-md-2"><?php echo form_dropdown('date_from', $date_from,isset($row->student)?$row->student:'',array('id'=>'date_from','style'=>'width:70%%;')); ?> </div>
                    <div class="col-md-1" style ="margin-left:-5%;"> to </div>
                    <div class="col-md-2" style ="margin-left:-5%;"><?php echo form_dropdown('date_to', $date_from,isset($row->student)?$row->student:'',array('id'=>'date_to')); ?></div>
                    <div class="col-md-7" style ="margin-left:-6%;">The institution will be open from &nbsp;&nbsp; &nbsp;<input type = "text" id="datepicker" ></div>
                </div>
            </div>

        </div>



                <div class="row" style = "padding-top:10%;">
                    <div class="col-md-5 text-left">
                        Order by -
                        Head Teacher<br>
                        Md.XXXXXXXXXX
                    </div>
                    <div class="col-md-5 text-right">
                        Order by -
                           Head Teacher<br>
                        Md.XXXXXXXXXX
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-print" id="invoice-footer" style="margin-top: 3%;">
            <div class="clearfix"></div>
            <div class="col-lg-2 ">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Notice</a>
            </div>
        </div>

    </div>
</div>
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('Layouts/admin_footer'); ?>