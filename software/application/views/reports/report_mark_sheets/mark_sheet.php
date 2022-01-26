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
                        <?php $info = $student_info->StudentName.' - '.$student_info->StudentCode;?>

                        <td colspan="2" width="70%"><b><?php echo $info; ?></b></td>
                        <td width="10%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                    </tr>
                    <tr>
                        <?php $info1 = ' Class '.$class_info->ClassName.' | '.$section_info->SectionName.' ( '.$FromDate. ' to '.$ToDate.' )';?>
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
                        <td>Subject</td>
                        <?php
                        foreach($exam_list as $row){
                            echo '<td>'.$row['ExamName'];'</td>';
                        }
                        ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($subject_list as $key=>$row) {
                        ?>
                        <tr>
                            <td><label><?php echo $row['SubjectName']; ?></label></td>
                            <?php
                            foreach($exam_list as $key1=>$row1){
                                if(isset($mark_sheet_data[$key][$key1])){
                                    echo '<td style="text-align: center">'.$mark_sheet_data[$key][$key1]['TotalMark'].'</td>';
                                }
                                else{
                                    echo'<td>'.'&nbsp'.'</td>';
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td><label><?php echo 'Total'; ?></label></td>
                        <?php
                        foreach($exam_list as $key1=>$row1){
                            if(isset($mark_sheet_exam_wise_total_data[$key1])){
                                echo '<td style="text-align: center">'.$mark_sheet_exam_wise_total_data[$key1]['TotalMark'].'</td>';
                            }

                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row no-print" id="invoice-footer" style="margin-top: 3%;">
            <div class="clearfix"></div>
            <div class="col-lg-2 ">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Sheet</a>
            </div>
        </div>

    </div>
</div>