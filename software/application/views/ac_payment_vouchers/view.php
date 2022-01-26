<title><?php echo $title;?></title>
<?php
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}
?>
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
<?php $order_total_amount = 0; ?>
<div class="panel invoice-panel">
    <div class="panel-heading">
    <span class="panel-title">
        <span class="glyphicon glyphicon-print"></span> <?php echo $title; ?></span>
        <div class="panel-header-menu pull-right mr10">
            <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5"> <i class="fa fa-print fs13"></i> </a>
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
                <h4 class="mn" style="text-decoration: underline;"><?php if($voucher_info->VoucherType == 'P'){ echo 'Payment Voucher'; }else{ echo 'Receipt Voucher';} ?>  </h4>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: " >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="70%">&nbsp;</td>
                        <td width="10%"><b>Print Date:</b></td>
                        <td width="10%"><?php echo date('Y-m-d');?></td>
                    </tr>
                    <tr>
                        <td width="10%"><b>Voucher Code:</b></td>
                        <td width="70%"><?php echo $voucher_info->VoucherCode;?></td>
                        <td width="10%"><b>Voucher Date:</b></td>
                        <td width="10%"><?php echo $voucher_info->VoucherDate;?></td>
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
                        <td>#</td>
                        <td align="center" width="25%">Ledger Name</td>
                        <td align="center" width="10%">Code</td>
                        <td align="right" width="15%">Debit Amount</td>
                        <td align="right" width="15%">Credit Amount</td>
                        <td>Line Note</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $total_dr_amount = 0;
                    $total_cr_amount = 0;
                    foreach ($voucher_details_data as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['LedgerName']; ?></td>
                            <td align="center"><?php echo $row['LedgerCode']; ?></td>
<!--                            <td align="right">--><?php //echo number_format($row['dr_amount'],2,'.',','); ?><!--</td>-->
<!--                            <td align="right">--><?php //echo number_format($row['cr_amount'],2,'.',','); ?><!--</td>-->
                            <td align="right"><?php
                                if($row['dr_amount']==0){
                                    echo '-';
                                }else {
                                    echo number_format($row['dr_amount'], 2, '.', ',');
                                }
                                ?>

                            </td>

                            <td align="right">
                                <?php
                                if($row['cr_amount']==0){
                                    echo '-';
                                }else {
                                    echo number_format($row['cr_amount'], 2, '.', ',');
                                }
                                //echo number_format($row['cr_amount'],2,'.',',');
                                ?>
                            </td>

                            <td><?php echo $row['particulars']; ?></td>
                        </tr>
                        <?php
                        $total_dr_amount = $total_dr_amount+$row['dr_amount'];
                        $total_cr_amount = $total_cr_amount+$row['cr_amount'];
                        $i ++;
                    }
                    ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td><?php echo number_format($total_dr_amount,2,'.',','); ?></td>
                            <td><?php echo number_format($total_cr_amount,2,'.',','); ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6">In Words : <?php echo convertNumberToWord($total_dr_amount);?> Taka Only </td>
                        </tr>
                    </tbody>
                </table>
                <table class="scale" style="margin-top: 1%" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>
                    <tr style="height: 50px; vertical-align: top">
                        <td colspan="6"><b>Narration: <?php
                                if($voucher_info->IsAutoVoucher == 1){
                                    echo '[auto voucher]';
                                }else{
                                    echo $voucher_info->Particulars;
                                }?>
                            </b>
                        </td>
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
                        <td><b>Prepared By:</b> </td>
                        <td><b>Varified By:</b> </td>
                        <td><b>Approved By:</b> </td>
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