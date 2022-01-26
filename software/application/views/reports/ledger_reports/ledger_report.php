<title><?php echo $title;?></title>
<?php
$user_session=$this->session->userdata('system.user');
?>

<style type="text/css">
    th {
        color:  #292929;
        font-family: TrebuchetMS,Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
    }
    td {
        font-size: 12px;
    }
    .report_header  {
        margin: 0 auto;
        width: 900px;
        border: 0;
    }
    .report_class  {
        margin: 0 auto;
        width: 900px;
        border: 1px solid;
    }
    .report_class tr {
        background: none repeat scroll 0 0 #FFFFFF;
    }
    .report_class th {
        border-style: solid;
        color:  #292929;
        font-family: TrebuchetMS,Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .fontStyle {
        color:  #292929;
        font-family: TrebuchetMS,Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .report_class td {
        font-family: TrebuchetMS,Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        border-bottom: 1px solid;
        padding: 7px 3px;
    }
    .fontSize_10 td,h3{
        font-size:10px;
    }
    .fontSize_11 td,h3{
        font-size:11px;
    }
    .fontSize_12 td,h3{
        font-size:12px;
    }
    .fontSize_13 td,h3{
        font-size:13px;
    }
    .fontSize_14 td,h3{
        font-size:14px;
    }
    .fontSize_15 td,h3{
        font-size:15px;
    }
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
<?php $order_total_amount = 0; ?>
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
                <img width="80" height="80" src="<?php  echo base_url() . 'media/branch_pictures/'.$organization_info->Logo;   ?>" class="responsive">
            </div>
            <div align="left" style="text-align: center" class="col-md-12">
                <h3 class="lh10 mt10"> <?php echo $organization_info->OrganizationName; ?> </h3>
                <h5 class="mn"><?php echo $organization_info->OrganizationAddress_1; ?>  </h5>
                <h5 class="mn"><?php echo $organization_info->ContactNumber; ?>  </h5>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="98%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td  width="20%">Ledger Name:</td>
                        <td width="60%"><?php echo $ledger_info->LedgerName.' - '.$ledger_info->LedgerCode; ?></td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="20%"> Opening Balance: </td>
                        <td width="60%"><?php
                            $opening_balance = isset($opening_balance_info->Amount)?$opening_balance_info->Amount:0;
                            echo number_format($opening_balance+$balance_before_date,'2'); ?>
                        </td>
                        <td width="10%"> <?php if(isset($language) && $language == 'B'){echo isset($language_list['Print_Date'])?$language_list['Print_Date']:'Print Date';}else{echo 'Print Date';} ?>:</td>
                        <td width="10%"><?php echo date('Y-m-d');?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tr>
                        <td><label>Voucher Code</label></td>
                        <td><label>Voucher Date</label></td>
                        <td><label>Income</label></td>
                        <td><label>Expense</label></td>
                        <td><label>Cumulative</label></td>
                        <td><label>Particulars</label></td>
                    </tr>
                    <tbody>
                    <?php
                    $i=1;
                    $total_debit_amount = 0.00;
                    $total_credit_amount = 0.00;
                    $total_cuum_amount = $opening_balance+$balance_before_date;
                    foreach($report_details as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['VoucherCode']; ?></td>
                            <td><?php echo $row['VoucherDate']; ?></td>
                            <?php
                            $debit_amount = 0.00;
                            $credit_amount = 0.00;
                            if($row['VoucherType'] == 'P'){
                                $debit_amount =$row['Amount'];
                            }
                            if($row['VoucherType'] == 'R'){
                                $credit_amount =$row['Amount'];
                            }
                            $total_cuum_amount = $total_cuum_amount+$credit_amount-$debit_amount;
                            $total_debit_amount = $total_debit_amount+$debit_amount;
                            $total_credit_amount = $total_credit_amount+$credit_amount;

                            ?>
                            <td align="center"><?php echo number_format($credit_amount,'2');  ?></td>
                            <td align="center"><?php echo number_format($debit_amount,'2');  ?></td>
                            <td align="center"><?php echo number_format($total_cuum_amount,'2');  ?></td>
                            <td align="left"><?php echo $row['Particulars']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    <tr>
                        <td  align="center" colspan="4"><b>Closing Balance</b></td>
                        <td align="center"><?php echo number_format($total_cuum_amount,'2'); ?></td>
                        <td colspan="2"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-footer" style="margin-top: 5%">
            <div class="col-md-12" >
                <table class="scale_footer" style="margin-top: 1%" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>
                    <tr>
                        <td width="35%"><b>Prepared By:</b> </td>
                        <td width="35%"><b>Varified By:</b> </td>
                        <td width="30%"><b>Approved By:</b> </td>
                    </tr>
                    <tr>
                        <td><b>Signature:</b> </td>
                        <td><b>Signature:</b> </td>
                        <td><b>Signature:</b> </td>
                    </tr>
                    <tr>
                        <td><b>Designation:</b> </td>
                        <td><b>Designation:</b> </td>
                        <td><b>Designation:</b> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>