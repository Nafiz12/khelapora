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
    .commit-files-summary .diff-summary-lozenge {
        cursor: default;
        float: left;
        margin: 2px 2px 0;
        padding-left: 0;
        padding-right: 0;
        vertical-align: top;
        width: 20px;
    }
    .aui-lozenge-error.aui-lozenge-subtle {
        background-color: #fff;
        border-color: #e8a29b;
        color: #d04437;
    }
    .aui-lozenge-success.aui-lozenge-subtle {
        background-color: #fff;
        border-color: #60b070;
        color: #14892c;
    }
    .aui-lozenge {
        background: #ccc none repeat scroll 0 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        color: #333;
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        line-height: 99%;
        margin: 0;
        padding: 2px 5px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
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
        <div id="editor" class="btn-group profile-settings-btn" style="float: right;" id="editor">
            <button style="padding: 9px 10px;" type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print Information </button>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item" style="width: 100%;">

        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h3 class="lh10 mt10"> <img height="80" src="<?php echo base_url() . 'media/branch_pictures/' .$organization_info->Logo; ?>" /></h3>
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
                <table class="" border="0" cellspacing="0" width="88%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="70%"><?php echo $class_name; ?></td>
                        <td width="10%"></td>
                        <td width="10%"><b>Print Date:</b></td>
                        <td width="10%"><?php echo date('Y-m-d');?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12 col-xs-12">
                <div class="table-responsive">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td width="2%"><label>Sl.</label></td>
                        <td><label>Student Code</label></td>
                        <td width="10%"><label>Student Roll</label></td>
                        <td><label>Student Name</label></td>
                        <td><label>Father's Name</label></td>
                        <td><label>Contact Number</label></td>
                        <td><label>Attendance</label></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $total_student = 0;
                    $present = 0;
                    $absent = 0;
                    foreach ($attendance_info as $row) {
                        $total_student=$total_student+1;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['StudentCode']; ?></td>
                            <td><?php echo $row['RollNo']; ?></td>
                            <td><?php echo $row['StudentName']; ?></td>
                            <td><?php echo $row['FathersName']; ?></td>
                            <td><?php echo $row['Contact']; ?></td>
                            <?php if($row['AttendanceType']=='P'){
                                $present = $present+1;
                                ?>
                                <td>
                                    <span class="diff-summary-lozenge aui-lozenge aui-lozenge-subtle aui-lozenge-success" data-module="components/tooltip" data-tooltip-gravity="s" title="Present"> P </span>
                                </td>
                            <?php }else{
                                $absent = $absent+1;
                                ?>
                                <td style="color: #ff0000;">
                                    <span class="diff-summary-lozenge aui-lozenge aui-lozenge-subtle aui-lozenge-error" data-module="components/tooltip" data-tooltip-gravity="s" title="Absent"> A </span>

                                </td>
                            <?php } ?>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="col-md-12 col-xs-12" style="margin-top: 2%">
                <table class="scale" cellspacing="0" width="20%" cellpadding="6" align="left">
                    <thead>
                    <tr>
                        <td><label>Total Student</label></td>
                        <td><label><?= $total_student; ?></label></td>
                    </tr>
                    <tr>
                        <td><label>Total Present</label></td>
                        <td><label><?= $present; ?></label></td>
                    </tr>
                    <tr>
                        <td><label>Total Absent</label></td>
                        <td><label><?= $absent; ?></label></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-footer" style="margin-top: 5%">
            <div class="col-md-12" >
                <table class="scale_footer" style="margin-top: 1%" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>
                    <tr>
                        <td width="70%"><b>Varfied By:</b> </td>
                        <td><b>Approved By:</b> </td>
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