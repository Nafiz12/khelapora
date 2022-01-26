<title><?php echo $title;?></title>
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
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h4 class="mn" style="text-decoration: underline;"><?php echo $title; ?>  </h4>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="70%">&nbsp;</td>
                        <td width="10%"><b>Print Date:</b></td>
                        <td width="10%"><?php echo date('Y-m-d');?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row " id="invoice-table" >
            <div class="col-md-12 ">
                <div class="row" >
                    <div class="col-md-6 text-left"> <h3><b>Particulars</b></h3></div>
                    <div class="col-md-6 text-right"> <h3><b>BDT</b></h3></div>
                </div>
                <div class="row" >
                    <div class="col-md-6 text-left"> <h3>Income: (A)</h3></div>
                    <div class="col-md-6 text-right"> <h3><?php echo number_format($total_income,2); ?></h3></div>
                </div>
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>
                    <?php
                    $i=1;
                    $expense_total_this_month_amount=0;
                    $expense_total_till_date_amount=0;
                    foreach($income_data as $key => $value){

                        $sum = 0;
                        foreach($value as $rows){
                            $sum = $sum+$rows['TillDateIncome'];
                        }
                        //echo "<pre>";print_r($row);echo "</pre>";
                        // $expense_total_this_month_amount= $expense_total_this_month_amount+$row['ThisMonthIncome'];
                        // $expense_total_till_date_amount= $expense_total_till_date_amount+$row['TillDateIncome'];
                        ?>
                        <tr>
                            <td style = "font-size: 13px;font-weight: bold;" width="74%"><?php echo $key; ?></td>
                            <td align="right" style = "font-size: 13px;font-weight: bold"><?php echo number_format($sum,2) ; ?></td>

                        </tr>

                        <?php foreach($value as $row){
                            // $expense_total_this_month_amount= $expense_total_this_month_amount+$row['ThisMonthIncome'];
                            $expense_total_till_date_amount= $expense_total_till_date_amount+$row['TillDateIncome'];
                            ?>
                            <tr>
                                <td><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['DebitLedgerName']; ?></td>
                                <td align="right"><?php echo number_format($row['TillDateIncome'],2); ?></td>
                                <!-- <td align="right"><?php// echo number_format($row['ThisMonthIncome']); ?></td> -->

                            </tr>
                        <?php  } ?>
                        <?php
                        $i++;
                    }
                    ?>


                    </tbody>
                </table>
            </div>

        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 text-left"> <h3>Expense: (B)</h3></div>
                    <div class="col-md-6 text-right"> <h3><?php echo number_format($total_expense,2); ?></h3></div>
                </div>
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>


                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    $expense_total_this_month_amount=0;
                    $expense_total_till_date_amount=0;
                    foreach($expense_data as $key => $value){

                        $sum = 0;
                        foreach($value as $rows){
                            $sum = $sum+$rows['TillDateIncome'];
                        }
                        //echo "<pre>";print_r($row);echo "</pre>";
                        // $expense_total_this_month_amount= $expense_total_this_month_amount+$row['ThisMonthIncome'];
                        // $expense_total_till_date_amount= $expense_total_till_date_amount+$row['TillDateIncome'];
                        ?>
                        <tr>
                            <td style = "font-size: 13px;font-weight: bold" width="74%"><?php echo $key; ?></td>
                            <td align="right" style = "font-size: 13px;font-weight: bold"><?php echo number_format($sum,2) ; ?></td>

                        </tr>

                        <?php foreach($value as $row){
                            // $expense_total_this_month_amount= $expense_total_this_month_amount+$row['ThisMonthIncome'];
                            $expense_total_till_date_amount= $expense_total_till_date_amount+$row['TillDateIncome'];
                            ?>
                            <tr>
                                <td><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['CreditLedgerName']; ?></td>
                                <td align="right"><?php echo number_format($row['TillDateIncome'],2); ?></td>
                                <!-- <td align="right"><?php// echo number_format($row['ThisMonthIncome']); ?></td> -->

                            </tr>
                        <?php  } ?>
                        <?php
                        $i++;
                    }
                    ?>

                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <td> <h3><b>Net Profite: ( A-B )</b></h3></td>
                        <td align="right"> <h3><b><?php echo number_format(($total_income - $total_expense),2);?></b></h3></td>
                    </tr>
                </table>
            </div>




            <div class="row" id="invoice-footer" style="margin-top: 10%;margin-left: 15px;margin-right: 15px">
                <div class="col-md-12" >
                    <table class="scale_footer" style="margin-top: 1%" cellspacing="0" width="100%" cellpadding="6" align="center">
                        <tbody>
                        <tr>
                            <td class="text-left"><b>Prepared By:</b> </td>
                            <td class="text-center"><b>Varified By:</b> </td>
                            <td class="text-right"><b>Approved By:</b> </td>
                        </tr>
                        <tr>
                            <td class="text-left"><b>Signature:</b> </td>
                            <td class="text-center"><b>Signature:</b> </td>
                            <td class="text-right"><b>Signature:</b> </td>
                        </tr>
                        <tr >
                            <td class="text-left"><b>Designation:</b> </td>
                            <td class="text-center"><b>Designation:</b> </td>
                            <td class="text-right"><b>Designation:</b> </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>




            <!-- </div> -->
        </div>