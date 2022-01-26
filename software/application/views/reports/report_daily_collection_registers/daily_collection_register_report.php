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
                        <td>Class</td>
                        <?php
                        foreach($fee_types as $row){
                            echo '<td>'.$row;'</td>';
                        }
                        ?>
                        <td><label><?php echo 'Total'; ?></label></td
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $grand_total=0;
                    foreach ($class_list as $key=>$class_name) {
                        $total_amount = 0;
                        ?>
                        <tr>
                            <td><label><?php echo $class_name; ?></label></td>
                            <?php
                            foreach($fee_types as $key1=>$row1){
                                if(isset($report_data[$key][$key1])){
                                    $total_amount=$total_amount+$report_data[$key][$key1]['Amount'];
                                    echo '<td style="text-align: center">'.$report_data[$key][$key1]['Amount'];
                                }
                                else{
                                    echo'<td>'.'&nbsp'.'</td>';
                                }
                            }
                            ?>
                            <td><label><?php
                                    $grand_total = $grand_total+$total_amount;
                                    echo $total_amount; ?></label></td
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    <tr>
                        <?php
                        $colspan=0;
                        foreach($fee_types as $key1=>$row1){
                            $colspan = $colspan+1;
                        }
                        ?>
                        <td align="center" colspan="<?= $colspan+1; ?>"><?php echo 'Grand Total'; ?></td>
                        <td><label><?php echo $grand_total; ?></label></td
                    </tr>
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