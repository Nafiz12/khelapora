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
                <h4 style="margin-top: 1%" ><?php echo 'Admit Card for '.$exam_info->ExamName; ?>  </h4>
            </div>
        </div>
<!--        <div style="margin-left:-20px; margin-right: -20px" class="panel-heading">-->
<!--             --><?php //echo 'ADMIT CARD'; ?>
<!--        </div>-->
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tr>
                        <?php
                        if(isset($student_info->Image)) {
                            ?>
                            <td  width="17%" style="border: none; vertical-align: top">
                                <img width="150" height="170" src="<?php  echo base_url() . 'media/student_pictures/'.$student_info->Image;   ?>" class="responsive">
                            </td>
                            <?php
                        }else {
                            if($student_info->Gender =='M') {
                                ?>

                                <td width="17%" style="border: none; vertical-align: top">
                                    <img width="150" height="170"
                                         src="<?php echo base_url() . 'media/assets/img/avatars/2.png'; ?>"
                                         class="responsive">
                                </td>
                                <?php
                            }else{
                                ?>
                                <td width="17%" style="border: none; vertical-align: top">
                                    <img width="150" height="170"
                                         src="<?php echo base_url() . 'media/assets/img/avatars/index.jpg'; ?>"
                                         class="responsive">
                                </td>
                                <?php
                            }
                        }
                        ?>
                        <td style="vertical-align: top">
                            <table class="scale" style="float: left" border="0" cellspacing="0" width="50%" cellpadding="6" align="left">
                                <tr>
                                    <td colspan="2">Student Name : <b><?php echo $student_info->StudentName;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Class : <b><?php echo $class_info->ClassName;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Section/Batch : <b><?php echo $section_info->SectionName;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Code : <b><?php echo $student_info->StudentCode;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Roll : <b><?php echo $student_info->RollNo;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Status : <b><?php echo $student_info->StudentStatus == 'A'?'Active':'Inactive';  ?></b></td>
                                </tr>
                            </table>
                            <table class="scale" cellspacing="0" width="40%" align="center">
                                <tbody>
                                <tr>
                                    <td colspan="2"><b>Exam Schedule</b></td>
                                </tr>
                                <tr>
                                    <td width="45%">Exam Date</td>
                                    <td>Subject</td>
                                </tr>
                                <tr>
                                    <td >2018-09-12</td>
                                    <td >Bangla 1st</td>
                                </tr>
                                <tr>
                                    <td >2018-09-12</td>
                                    <td >Bangla 1st</td>
                                </tr>
                                <tr>
                                    <td >2018-09-12</td>
                                    <td >Bangla 1st</td>
                                </tr>
                                <tr>
                                    <td >2018-09-12</td>
                                    <td >Bangla 1st</td>
                                </tr>
                                <tr>
                                    <td >2018-09-12</td>
                                    <td >Bangla 1st</td>
                                </tr>
                                <tr>
                                    <td >2018-09-12</td>
                                    <td >Bangla 1st</td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-8">
                <b>Note: No one is allowed to sit in the exam hall with out admit card</b>
            </div>
        </div>

    </div>
</div>