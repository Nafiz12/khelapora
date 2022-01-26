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

        <span class="glyphicon glyphicon-print"></span> <?php if(isset($language) && $language == 'B'){echo isset($language_list[$title])?$language_list[$title]:$title;}else{echo $title;} ?></span>
        <div class="panel-header-menu pull-right mr10">
            <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5"> <i class="fa fa-print fs13"></i> </a>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item">
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h4  class="mn" style="text-decoration: underline;"><?php if(isset($language) && $language == 'B'){echo isset($language_list[$title])?$language_list[$title]:$title;}else{echo $title;} ?> </h4>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="88%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td  width="20%">Reporting Date:</td>
                        <td width="60%"><?php echo $DateFrom.' - '.$DateTo; ?></td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="20%">Branch Name & Code: </td>
                        <td width="60%"><?php echo $branch_info->BranchName.'('.$branch_info->BranchCode.')'; ?>
                        </td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td  width="20%">Branch Address:</td>
                        <td width="60%"><?php echo $branch_info->BranchAddress; ?></td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tr>
                        <td>Voucher Date</td>
                        <td>Voucher Code</td>
                        <td>Voucher Type</td>
                        <td>Acount Head</td>
                        <td>Particular</td>
                        <td>Debit Amount</td>
                        <td>Credit Amount</td>
                    </tr>
                    <tbody>
                    <?php
                    $i=1;
                    $total_debit_amount = 0.00;
                    $total_credit_amount = 0.00;
                   // $total_cuum_amount = $opening_balance+$balance_before_date;
                    if(!empty($daily_transaction)){
                        foreach($daily_transaction as $row){
                        $total_debit_amount+=$row['debit'];
                        $total_credit_amount+=$row['credit'];
                        ?>
                        <tr>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['code']; ?></td>
                            
                            <td align="center"><?php echo $row['type'];  ?></td>
                            <td align="center"><?php echo $row['acc_head'];  ?></td>
                            <td align="left"><?php echo $row['particulars']; ?></td>
                            <td align="center"><?php echo number_format($row['debit'],'2');  ?></td>
                            <td align="center"><?php echo number_format($row['credit'],'2');  ?></td>
                            
                        </tr>
                        <?php
                        $i++;
                    }
                    }
                    ?>
                    <tr>
                        <td  align="center" colspan="5"><b>Total</b></td>
                        <td align="center"><?php echo number_format($total_debit_amount,'2'); ?></td>
                        <td align="center"><?php echo number_format($total_credit_amount,'2'); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-footer" style="margin-left: 4%;">
            <div class="col-md-12" style="margin-bottom: 5%;">
                <div class="pull-left mt20 fs15 text-primary"> Thank you for your business.</div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-2 no-print">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Report</a>
            </div>
        </div>

    </div>
</div>