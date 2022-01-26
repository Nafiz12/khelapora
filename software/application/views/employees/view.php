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
    @page {
        size: A4;
        margin: 0;
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
                <img width="80" height="80" src="<?php  echo base_url() . 'media/branch_pictures/'.$organization_info->Logo;   ?>" class="responsive">
            </div>
            <div align="center" class="col-md-12">
                <h3 class="lh10 mt10"> <?php echo $organization_info->OrganizationName; ?> </h3>
                <h5 class="mn"><?php echo $organization_info->OrganizationAddress_1; ?>  </h5>
                <h5 class="mn"><?php echo $organization_info->ContactNumber; ?>  </h5>
            </div>
        </div>
        <div>
            <div class="col-md-12" style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tr>
                        <td width="17%">
                            <?php
                            if(isset($row->Image)) {
                                ?>
                                <img width="150" height="170" src="<?php  echo base_url() . 'media/employee_pictures/'.$row->Image;   ?>" class="responsive">
                                <?php
                            }
                            ?>
                        </td>
                        <td style="vertical-align: top">
                            <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                                <tr>
                                    <td >&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr
                                <tr>
                                    <td colspan="2">Employee Name : <b><?php echo $row->EmployeeName;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Branch : <b><?php echo $row->BranchName;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Code : <b><?php echo $row->EmployeeCode;  ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Designation : <b><?php echo $row->DesignationName;  ?></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-5">
                <table class="scale" cellspacing="0" width="100%" align="center">
                    <tbody>
                    <tr>
                        <td colspan="2"><b>Basic Information</b></td>
                    </tr>
                    <tr>
                        <td >Is Teacher?:</td>
                        <td ><?php echo $row->IsTeacher == '1'?'Yes':'No';  ?></td>
                    </tr>
                    <tr>
                        <td >Status:</td>
                        <td ><?php
                            if($row->Status =='A'){
                                echo 'Active';
                            }
                            if($row->Status =='I'){
                                echo 'Inactive';
                            }
                            if($row->Status =='R'){
                                echo 'Resigned';
                            }
                            if($row->Status =='T'){
                                echo 'Terminated';
                            } ?></td>
                    </tr>
                    <tr>
                        <td >Date of Birth:</td>
                        <td ><?php echo $row->DateOfBirth; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $row->Email;  ?></td>
                    </tr>
                    <tr>
                        <td >National Id:</td>
                        <td ><?php echo $row->Nid;  ?></td>
                    </tr>
                    <tr>
                        <td >Current Salary:</td>
                        <td ><?php echo $row->CurrentSalary;  ?></td>
                    </tr>
                    <tr>
                        <td >Gender:</td>
                        <td ><?php echo $row->Gender == 'M'?'Male':'Female';  ?></td>
                    </tr>
                    <tr>
                        <td >Blood Group:</td>
                        <td ><?php echo $blood_group_list[$row->BloodGroup]; ?></td>
                    </tr>
                    <tr>
                        <td >Last Achieved Degree:</td>
                        <td ><?php echo $degree_list[$row->DegreeId]; ?></td>
                    </tr>
                    <tr>
                        <td >Reference 1:</td>
                        <td ><?php echo $row->Ref1;  ?></td>
                    </tr>
                    <tr>
                        <td >Reference 1 Contact No:</td>
                        <td ><?php echo $row->RefContactNumber;  ?></td>
                    </tr>
                    <tr>
                        <td >Reference 2:</td>
                        <td ><?php echo $row->Ref2;  ?></td>
                    </tr>
                    <tr>
                        <td >Reference 2 Contact No:</td>
                        <td ><?php echo $row->Ref2ContactNumber;  ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Personal Information</b></td>
                    </tr>
                    <tr>
                        <td >Father's Name:</td>
                        <td ><?php echo $row->FathersName;  ?></td>
                    </tr>
                    <tr>
                        <td >Mother's Name:</td>
                        <td ><?php echo $row->MothersName;  ?></td>
                    </tr>
                    <tr>
                        <td >Spouse Name:</td>
                        <td ><?php echo $row->SpouseName;  ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="scale2" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tbody>
                    <tr>
                        <td colspan="2"><b>Contact Information</b></td>
                    </tr>
                    <tr>
                        <td >Contact Number:</td>
                        <td ><?php echo $row->ContactNumber;  ?></td>
                    </tr>
                    <tr>
                        <td width="45%">Present Address:</td>
                        <td ><?php echo $row->PresentAddress;  ?></td>
                    </tr>
                    <tr>
                        <td >Permanent Address:</td>
                        <td ><?php echo $row->PermanentAddress;  ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>