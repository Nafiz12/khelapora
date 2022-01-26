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
                <h3 class="lh10 mt10"> <img height="80" src="<?php echo base_url() . 'media/branch_pictures/' .$organization_info->Logo; ?>" /></h3>
                <h3 class="lh10 mt10"> <?php echo $organization_info->OrganizationName; ?> </h3>
                <h5 class="mn"><?php echo $organization_info->OrganizationAddress_1; ?>  </h5>
            </div>
        </div>
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h4 class="mn" style="text-decoration: underline;"><?php echo 'Mark Distribution of '.$exam_info->ExamName; ?>  </h4>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table style="float: left" class="" border="0" cellspacing="0" width="50%" cellpadding="6" align="left">
                    <tr>
                        <td >&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr
                    <tr>
                        <td colspan="2">Class: <b><?php echo $marks_info->ClassName;  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Section/Batch : <b><?php echo $marks_info->SectionName;  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">Subject : <b><?php echo $marks_info->SubjectName;  ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="2">ExamDate : <b><?php echo $marks_info->ExamDate;  ?></b></td>
                    </tr>
                </table>
                <table style="float: right" class="" border="0" cellspacing="0" width="30%" cellpadding="6" align="right">
                    <tr><td width="50%">&nbsp;</td><td>&nbsp;</td></tr>
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
                        <td align="left" width="25%"><label>Name Of Student</label></td>
                        <td align="center" width="12%"><label>Code</label></td>
                        <td align="center" width="5%"><label>Roll</label></td>
                        <?php
                        $sbj_width = "10%";
                        $sbj_def_width = "10%";
                            if($exam_info->HasSba == 1) {
                                ?>
                                <td align="center" width="10%"><label>SBA</label></td>
                                <td align="center" width="10%"><label>Full Mark</label></td>
                                <?php
                            }else{
                                $sbj_width = "15%";
                                $sbj_def_width = "15%";
                            }
                        if($exam_info->HasObjective == 1) {
                            ?>
                            <td align="center" width="10%"><label>Objective</label></td>
                            <td align="center" width="10%"><label>Full Mark</label></td>
                            <?php
                        }else{
                            $sbj_width = "20%";
                            $sbj_def_width = "20%";
                        }
                        ?>
                        <td align="center" width="<?= $sbj_width; ?>"><label>Subjective</label></td>
                        <td align="center" width="<?= $sbj_def_width; ?>"><label>Full Mark</label></td>
                        <td><label>Total</label></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($marks_details_info as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td align="left"><?php echo $row['StudentName']; ?></td>
                            <td align="center"><?php echo $row['StudentCode']; ?></td>
                            <td align="center" ><?php echo $row['RollNo']; ?></td>
                            <?php
                            if($exam_info->HasSba == 1) {
                                ?>
                                <td align="center"><?php echo $row['SbaMark']; ?></td>
                                <td style="background-color: #f2f2f2;" align="center">
                                    <label><?php echo $row['SbaDeafault']; ?></td>
                                <?php
                            }
                            if($exam_info->HasObjective == 1) {
                                ?>
                                <td align="center"><?php echo $row['ObjectiveMark']; ?></td>
                                <td style="background-color: #f2f2f2;" align="center">
                                    <?php echo $row['ObjectiveDefault']; ?></td>
                                <?php
                            }
                            ?>
                            <td align="center"><?php echo $row['SubjectiveMark']; ?></td>
                            <td style="background-color: #f2f2f2;" align="center"><?php echo $row['SubjectiveDefault']; ?></td>
                            <?php
                            $color = 'black';
                            if($row['TotalMark']<32){
                                $color='red';
                            }
                            ?>
                            <td align="center" style="color: <?php echo $color;?>"><?php echo $row['TotalMark']; ?></td>
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