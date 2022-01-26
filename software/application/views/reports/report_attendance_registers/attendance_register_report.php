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
        <div class="panel-header-menu pull-right mr10">
            <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5"> <i class="fa fa-print fs13"></i> </a>
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
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <?php $info = $student_info->StudentName.' ( '.$student_info->StudentCode.' ) ';?>
                        <td width="70%"><b><?php echo $info; ?></b></td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                        <?php $info1 =  'Class '.$class_info->ClassName.' | '.$section_info->SectionName;?>
                        <td colspan="2" width="70%"><b><?php echo $info1; ?></b></td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                        <?php $info2 =  'Roll No: '.$student_info->RollNo;?>
                        <td colspan="2" width="70%"><b><?php echo $info2; ?></b></td>
                        <td width="10%"><b>Print Date:</b></td>
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
                        <td width="2%">Sl.</td>
                        <td>Date</td>
                        <td>Day</td>
                        <td>Attendance</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    if(!empty($attendance_info)){
                        foreach ($attendance_info as $row) {
                            ?>
                            <tr>
                                <td><label><?php echo $i; ?></label></td>
                                <td><label><?php echo $row['Date']; ?></label></td>
                                <td><label><?php echo  $day_list[date("D", strtotime($row['Date']))]; ?></label></td>
                                <?php if($row['AttendanceType']=='P'){ ?>
                                    <td>
                                        <span class="diff-summary-lozenge aui-lozenge aui-lozenge-subtle aui-lozenge-success" data-module="components/tooltip" data-tooltip-gravity="s" title="Present"> P </span>
                                    </td>
                                <?php }else{ ?>
                                    <td style="color: #ff0000;">
                                        <span class="diff-summary-lozenge aui-lozenge aui-lozenge-subtle aui-lozenge-error" data-module="components/tooltip" data-tooltip-gravity="s" title="Absent"> A </span>

                                    </td>
                                <?php } ?>
                            </tr>
                            <?php
                            $i++;
                        }
                    }else{
                        echo '<tr>';
                            echo '<td colspan="4">';
                                echo '<label>'.'No Dat Found'.'</label>';
                            echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row no-print" id="invoice-footer" style="margin-top: 3%;">
            <div class="clearfix"></div>
            <div class="col-lg-2 ">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Attendance</a>
            </div>
        </div>

    </div>
</div>