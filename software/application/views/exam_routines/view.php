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
                <h4 class="mn" style="text-decoration: underline;margin-top: 1%;"><?php echo 'Exam routine of '. $exam_info->ExamName .' ( '.$academic_year_list[$routine_info->Year].' )'; ?>  </h4>
            </div>
        </div>

        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table style="float: left" class="" border="0" cellspacing="0" width="50%" cellpadding="6" align="left">
                    <tr>
                        <td >&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">Academic Year: <b><?php echo $routine_info->Year;  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Shift: <b><?php echo $shift_list[$routine_info->Shift];  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Medium: <b><?php echo $medium_list[$routine_info->Medium];  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Class: <b><?php echo $routine_info->ClassName;  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Exam : <b><?php echo $exam_info->ExamName;  ?></b></td>
                    </tr>
                </table>
                <table style="float: right" class="" border="0" cellspacing="0" width="30%" cellpadding="6" align="right">
                    <tr><td width="50%">&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>Print Date: <b><?php echo date('Y-m-d');?></b></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr style="background-color: #f2f2f2;">
                        <td width="2%"><label>Sl.</label></td>
                        <td align="left" width="25%"><label>Subject</label></td>
                        <td align="center" width="25%"><label>Exam Date</label></td>
                        <td align="center" width="25%"><label>Room Number</label></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($routine_details_info as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td align="left"><?php echo $row['SubjectName']; ?></td>
                            <td align="center"><?php echo $row['ExamDate']; ?></td>
                            <td align="center" ><?php echo $row['RoomNumber']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-footer" style="margin-top: 5%">
            <div class="col-md-12" >
                <table class="scale_footer" style="margin-top: 1%" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>
                    <tr>
                        <td width="75%"><b>Prepared By:</b> </td>
                        <td><b>Varified By:</b> </td>

                    </tr>
                    <tr>
                        <td><b>Signature:</b> </td>
                        <td><b>Signature:</b> </td>

                    </tr>
                    <tr>
                        <td><b>Designation:</b> </td>
                        <td><b>Designation:</b> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>