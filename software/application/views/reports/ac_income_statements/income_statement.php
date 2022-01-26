<title><?php echo $title; ?></title>
<style type="text/css">
    th {
        color: #292929;
        font-family: TrebuchetMS, Verdana, Arial, Helvetica, sans-serif;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
    }

    td {
        font-size: 12px;
    }

    .report_header {
        margin: 0 auto;
        width: 900px;
        border: 0;
    }

    .report_class {
        margin: 0 auto;
        width: 900px;
        border: 1px solid;
    }

    .report_class tr {
        background: none repeat scroll 0 0 #FFFFFF;
    }

    .report_class th {
        border-style: solid;
        color: #292929;
        font-family: TrebuchetMS, Verdana, Arial, Helvetica, sans-serif;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .fontStyle {
        color: #292929;
        font-family: TrebuchetMS, Verdana, Arial, Helvetica, sans-serif;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .report_class td {
        font-family: TrebuchetMS, Verdana, Arial, Helvetica, sans-serif;
        font-size: 12px;
        border-bottom: 1px solid;
        padding: 7px 3px;
    }

    .fontSize_10 td, h3 {
        font-size: 10px;
    }

    .fontSize_11 td, h3 {
        font-size: 11px;
    }

    .fontSize_12 td, h3 {
        font-size: 12px;
    }

    .fontSize_13 td, h3 {
        font-size: 13px;
    }

    .fontSize_14 td, h3 {
        font-size: 14px;
    }

    .fontSize_15 td, h3 {
        font-size: 15px;
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

    @media print {
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
        <div class="panel-header-menu pull-right mr10">
            <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5"> <i
                        class="fa fa-print fs13"></i> </a>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item">
        <div class="row mb30">
            <div align="center" class="col-md-12">
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
            <div class="col-md-12" style="margin-bottom: 1%;">
                <table class="" border="0" cellspacing="" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="70%">&nbsp;</td>
                        <td width="10%"><b>Print Date:</b></td>
                        <td width="10%"><?php echo date('Y-m-d'); ?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-6" style="padding-right: 2px">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td colspan="3" align="center"><b>Income</b></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Particular</b></td>
                        <td align="center"><b>This Month</b></td>
                        <td align="center"><b>Till Date</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $income_total_this_month_amount = 0;
                    $income_total_till_date_amount = 0;
                    foreach ($income_data as $row) {
                        //echo "<pre>";print_r($row);echo "</pre>";
                        $income_total_this_month_amount = $income_total_this_month_amount + $row['ThisMonthIncome'];
                        $income_total_till_date_amount = $income_total_till_date_amount + $row['TillDateIncome'];
                        ?>
                        <tr>
                            <td><?php echo $row['DebitLedgerName']; ?></td>
                            <td align="center"><?php echo $row['ThisMonthIncome']; ?></td>
                            <td align="center"><?php echo $row['TillDateIncome']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    <tr>
                        <td align="left">Total</b></td>
                        <td align="right"><?php echo number_format($income_total_this_month_amount, 2); ?></td>
                        <td align="right"><?php echo number_format($income_total_till_date_amount, 2); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6" style="padding-left: 0px;">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td colspan="3" align="center"><b>Expense</b></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Particular</b></td>
                        <td align="center"><b>This Month</b></td>
                        <td align="center"><b>Till Date</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $expense_total_this_month_amount = 0;
                    $expense_total_till_date_amount = 0;
                    foreach ($expense_data as $row) {
                        //echo "<pre>";print_r($row);echo "</pre>";
                        $expense_total_this_month_amount = $expense_total_this_month_amount + $row['ThisMonthIncome'];
                        $expense_total_till_date_amount = $expense_total_till_date_amount + $row['TillDateIncome'];
                        ?>
                        <tr>
                            <td><?php echo $row['CreditLedgerName']; ?></td>
                            <td align="center"><?php echo $row['ThisMonthIncome']; ?></td>
                            <td align="center"><?php echo $row['TillDateIncome']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    <tr>
                        <td align="left">Total</td>
                        <td align="right"><?php echo number_format($expense_total_this_month_amount, 2); ?></td>
                        <td align="right"><?php echo number_format($expense_total_till_date_amount, 2); ?></td>
                    </tr>
                    <tr>
                        <td align="left"><b>Surplus/Deficit</b></td>
                        <td align="right">
                            <b><?php echo number_format($income_total_this_month_amount - $expense_total_this_month_amount, 2); ?></b>
                        </td>
                        <td align="right">
                            <b><?php echo number_format($income_total_till_date_amount - $expense_total_till_date_amount, 2); ?></b>
                        </td>
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
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i
                            class="fa fa-print pr5"></i> Print Report</a>
            </div>
        </div>

    </div>
</div>