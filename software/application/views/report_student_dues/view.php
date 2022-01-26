<title><?php echo $title;?></title>
<style type="text/css">
    .scale {
        border: 1px solid #F1EAEA;
    }
    .scale tr {
        border: 1px solid #F1EAEA;
        height: 30px;
    }
    .scale tr td {
        border: 1px solid #F1EAEA;
        padding-left: 10px;
        padding-right: 10px;
    }
    .scale2 {
        border: 1px solid #F1EAEA;
    }
    .scale2 tr {
        border: 1px solid #F1EAEA;
        height: 30px;
    }
    .scale2 tr td {
        border: 1px solid #F1EAEA;
        padding-left: 10px;
        padding-right: 10px;
    }
    td,th{
            padding-left: 7px;
        }
    @media print
    {
        .no-print {
            display: none !important;
        }
        .scale {
            float: left;
            width: 45%;
            border: 1px solid #F1EAEA;
        }
        .scale tr {
            border: 1px solid #F1EAEA;
        }
        .scale tr td {
            border: 1px solid #F1EAEA;
        }

        .scale2 {
            float: left;
            width: 45%;
            margin-left: 5%;
            border: 1px solid #F1EAEA;
        }
        .scale2 tr {
            border: 1px solid #F1EAEA;
        }
        .scale2 tr td {
            border: 1px solid #F1EAEA;
        }
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }

    }
</style>
<div class="panel invoice-panel">
    <div class="panel-heading">
    <span class="panel-title">
        <span class="glyphicon glyphicon-print"></span> <?php echo $title; ?></span>
        <div id="editor" class="btn-group profile-settings-btn" style="float: right; width: 111px;" id="editor">
            <button style="padding: 9px 10px;" type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print Information </button>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item">
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h3 class="lh10 mt10"> <img height="80" src="<?php echo base_url() . 'media/branch_pictures/' .$organization_info->Logo; ?>" /></h3>
                <h3 class="lh10 mt10"> <?php echo $organization_info->OrganizationName; ?> </h3>
                <h5 class="mn"><?php echo $organization_info->OrganizationAddress_1; ?>  </h5>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tr>
                        <?php
                        if(isset($row->Image)) {
                        ?>
                        <td width="17%">
                                <img width="150" height="170" src="<?php  echo base_url() . 'media/student_pictures/'.$row->Image;   ?>" class="responsive">
                        </td>
                            <?php
                        }else {
                            if($row->Gender =='M') {
                                ?>

                                <td width="17%">
                                    <img width="150" height="170"
                                         src="<?php echo base_url() . 'media/assets/img/avatars/2.png'; ?>"
                                         class="responsive">
                                </td>
                                <?php
                            }else{
                                ?>
                                <td width="17%">
                                    <img width="150" height="170"
                                         src="<?php echo base_url() . 'media/assets/img/avatars/index.jpg'; ?>"
                                         class="responsive">
                                </td>
                        <?php
                            }
                        }
                        ?>
                        <td style="vertical-align: top">
                           <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                               <tr>
                                   <td >&nbsp;</td>
                                   <td>&nbsp;</td>
                               </tr
                               <tr>
                                   <td colspan="2">Student Name : <b><?php echo $row->StudentName;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Class : <b><?php echo $row->CourseName;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Section/Batch : <b><?php echo $row->BatchName;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Code : <b><?php echo $row->StudentCode;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Roll : <b><?php echo $row->RollNo;  ?></b></td>
                               </tr><tr>
                                   <td colspan="2">Admission Date : <b><?php echo $row->AdmissionDate;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Status : <b><?php echo $row->Status == '1'?'Active':'Inactive';  ?></b></td>
                               </tr>
                           </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-7">
                <table class="scale" cellspacing="0" width="100%" align="center">
                    <thead>
                         <tr>
                        <td colspan="5"><b>Payment Information</b></td>
                        </tr>
                        <tr>
                            <th> Student Name </th>
                           
                            <th> Transaction Date</th>
                            <th> Paid Amount</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                        if(isset($fee_details) && !empty($fee_details)){
                            foreach($fee_details as $fee){ 
// echo "<pre>";print_r($fee); 
                                ?>
                             <tr>
                                 <td ><?php echo $fee['StudentName'].' '.'('.$fee['StudentCode'].')';  ?></td>
                            
                                
                                 <td ><?php echo $fee['TransactionDate'];  ?></td>
                                 <td ><?php echo $fee['TotalAmount'];  ?></td>
                                
                                
                             </tr>

                                <!-- echo "<pre>";print_r($fee); -->
                        <?php   }
                        }  ?>
                      
                   
                    
                    
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <table class="scale2 table table-border table-stripped" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                         <tr>
                        <td colspan="2"><b>Payment Summary</b></td>
                        </tr>
                        <tr>
                            <th> Payable Amount </th>
                            <th> Paid Amount</th>
                            <th> Payment Status</th>
                            
                            
                        </tr>
                    </thead>

                    <tbody>
                    
                    <?php foreach ($payment_history as $payment) { ?>
                           <tr>
                            <th> <?php echo $payment['ActualAmount'];?> </th>
                            <th> <?php echo $payment['PaidAmount'];?> </th>
                                <?php  
                                    if($payment['ActualAmount'] - $payment['PaidAmount'] == 0){ 
                                             $status = "Paid";
                                         }elseif($payment['ActualAmount'] - $payment['PaidAmount'] >0){
                                            $status = 'Due'.' ('. ($payment['ActualAmount'] - $payment['PaidAmount']).')';
                                         }
                                         elseif($payment['ActualAmount'] - $payment['PaidAmount'] < 0){
                                            $status = 'Advanced'.' ('. ($payment['PaidAmount'] - $payment['ActualAmount']).')';
                                         }
                                  ?>
                           
                             <th> <?php echo $status;?> </th>
                            
                        </tr>
                      <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
