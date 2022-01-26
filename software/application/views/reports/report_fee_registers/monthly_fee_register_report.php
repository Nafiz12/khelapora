<title><?php echo $title;?></title>
<?php $order_total_amount = 0; ?>
<style type="text/css">
    .scale {
        border: 1px solid #000033;
    }
    .scale tr {
        border: 1px solid #000033;
        height: 25px;
    }
    .scale tr td {
        border: 1px solid #000033;
        padding-left: 10px;
        padding-right: 10px;
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
<div class="panel invoice-panel">
    <div class="panel-heading">
    <span class="panel-title">
        <span class="glyphicon glyphicon-print"></span> <?php echo $title; ?></span>
        <div id="editor" class="btn-group profile-settings-btn" style="float: right; width: 111px;" id="editor">
            <button style="padding: 9px 10px;" type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print Report </button>
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
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h4 class="mn" style="text-decoration: underline;"><?php echo $title; ?>  </h4>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="88%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <?php $info =""?>
                        <td colspan="2" width="70%"><?php echo $info; ?></td>
                        <td width="20%"><b>Print Date:</b></td>
                        <td width="10%"><?php echo date('Y-m-d');?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td style="text-align: center" ><label>Student Name</label></td>
                        <td style="text-align: center" ><label>Code</label></td>
                        <td style="text-align: center" ><label>Roll</label></td>
                        <td style="text-align: center" ><label>Fathers Name</label></td>
                        <td style="text-align: center" ><label>Contact Number</label></td>
                        <?php
                        foreach($monthly_fee_list_with_recoverable as $row){
                            echo '<td colspan="2" style="text-align: center" ><label>'.$row['TypeName'];'</label></td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                        <?php
                        foreach($monthly_fee_list_with_recoverable as $row){
                            echo '<td style="text-align: center" ><label>Amount</label></td>';
                            echo '<td style="text-align: center" ><label>Status</label></td>';
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $color = "black";
                    $status="Fuck u";
                    foreach ($student_list as $key=>$student) {
                        ?>
                        <tr>
                            <td><?php echo $student['StudentName']; ?></td>
                            <td><?php echo $student['StudentCode']; ?></td>
                            <td><?php echo $student['RollNo']; ?></td>
                            <td><?php echo $student['FathersName']; ?></td>
                            <td><?php echo $student['ContactNumber']; ?></td>
                            <?php
                            foreach($monthly_fee_list_with_recoverable as $key1=>$row1){
                                $payable_amount = $row1['RecoverableAmount'];
                                if(isset($report_data[$key][$key1]['Amount'])){
                                    $paid_amount = $report_data[$key][$key1]['Amount']+$report_data[$key][$key1]['WaiverAmount'];
                                    if($paid_amount>0 && $paid_amount<$payable_amount){
                                        $color="red";
                                        $status="Partially Paid";
                                    }
                                    if($paid_amount==$payable_amount){
                                        $color="green";
                                        $status="Paid";
                                    }
                                    if($paid_amount>$payable_amount){
                                        $color="green";
                                        $status="Advance";
                                    }
                                    echo '<td style="text-align: center">'.$report_data[$key][$key1]['Amount'].'</td>';
                                    echo '<td style="text-align: center; color:'.$color.'">'.$status.'</td>';
                                }
                                else{
                                    echo'<td style="text-align: center">'.'0.00'.'</td>';
                                    echo'<td style="text-align: center; color: red;">'.'Due'.'</td>';
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row no-print" id="invoice-footer" style="margin-top: 3%;">
            <div class="clearfix"></div>
            <div class="col-lg-2 ">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Report</a>
            </div>
        </div>

    </div>
</div>