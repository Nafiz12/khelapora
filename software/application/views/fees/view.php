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
                        <td style="vertical-align: top">
                            <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                                <tr>
                                    <td >&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr
                                <tr>
                                    <td colspan="2">Student Name : <b><?php echo $fee_info->StudentName;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Course : <b><?php echo $fee_info->ClassName;  ?></b></td>
                                </tr>
                               
                                <tr>
                                    <td colspan="2">Code : <b><?php echo $fee_info->StudentCode;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Roll : <b><?php echo $fee_info->RollNo;  ?></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-5">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>

                    <tr>
                        <td colspan="2"><b>Fee Information</b></td>
                    </tr>
                    <tr>
                        <td width="45%">Transaction Date:</td>
                        <td ><?php echo $fee_info->TransactionDate;  ?></td>
                    </tr>
                    <tr>
                        <td width="45%">Memo Number :</td>
                        <td ><?php echo $fee_info->MemoNo;  ?></td>
                    </tr>
                    <tr>
                        <td >Total Amount :</td>
                        <td ><?php echo $fee_info->TotalAmount;  ?></td>
                    </tr>
                    <tr>
                        <td >Total Waiver Amount :</td>
                        <td ><?php echo $fee_info->TotalWaiverAmount;  ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="scale2" cellspacing="0" width="100%" align="center">
                    <tbody>
                    <tr>
                        <td colspan="3"><b>Detail Information</b></td>
                    </tr>
                    <tr>
                        <td width="45%">Fee Type</td>
                        <td>Amount</td>
                        <td>Waiver Amount</td>
                    </tr>
                    <?php
                    foreach ($fee_details_info as $row) {
                        ?>
                        <tr>
                            <td width="45%"><?= $row['TypeName'] ?></td>
                            <td><?= $row['Amount'] ?></td>
                            <td><?= $row['WaiverAmount'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>