 <?php $this->load->view('Layouts/header');?>

<style type="text/css">
    .scale {
        border: 1px solid #F1EAEA;
    }

   /* header{
        display:none;
    }
    footer{display: none;}*/
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
        .made_space{
            padding-left:20px;
        }
        #invoice-item{
            margin-top:-80px;
        }
        .lh10{
            font-weight: normal;
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


<div class="panel invoice-panel" id="invoiceitem">
    <div class="panel-heading">
    <span class="panel-title">
        <span class="glyphicon glyphicon-print no-print"></span> <?php echo $title; ?></span>
        <div id="editor" class="btn-group profile-settings-btn no-print" style="float: right; width: 111px;" >
            <button style="padding: 9px 10px;" type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print Information </button>
        </div>
    </div>
    <div class="panel-body p20" id="invoice-item">
        <div class="row mb30">
            <div align="center" class="col-md-12">
                <h3 class="lh10 mt10"> <img height="80" src="<?php echo 'http://poricroma.com/software/media/branch_pictures/' .$organization_info->Logo; ?>" /></h3>
                <h3 class="lh10 mt10"> <?php echo $organization_info->OrganizationName; ?> </h3>
                <h5 class="mn"><?php echo $organization_info->OrganizationAddress_1; ?>  </h5>
            </div>
        </div>
        <div>
            <div class="col-md-10 " style="margin-bottom: 1%;" >
                <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <tr>
                        <?php
                        if(isset($row->Image)) {
                        ?>
                        <td width="17%">
                                <img width="150" height="170" src="<?php echo 'http://poricroma.com/software/media/student_pictures/'.$row->Image;   ?>" class="responsive">
                        </td>
                            <?php
                        }else { ?>
                            

                                <td width="17%">
                                    <img width="150" height="170"
                                         src="http://poricroma.com/software/media/assets/img/avatars/2.png"
                                         class="responsive">
                                </td>
                               
                     <?php   }
                        ?>
                        <td style="vertical-align: top" class="made_space">
                           <table class="" border="0" cellspacing="0" width="100%" cellpadding="6" align="center">
                               <tr>
                                   <td >&nbsp;</td>
                                   <td>&nbsp;</td>
                               </tr
                               <tr>
                                   <td colspan="2">Student Name : <b><?php echo $row->StudentName;  ?></b></td>
                               </tr>
                               
                               <tr>
                                   <td colspan="2">Course : <b><?php echo $row->CourseName;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Batch : <b><?php echo $row->BatchName;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Code : <b><?php echo $row->StudentCode;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Roll : <b><?php echo $row->RollNo;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Status : <b><?php echo $row->Status == 'A'?'Active':'Inactive';  ?></b></td>
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
                        <td colspan="2"><b>Personal Information</b></td>
                    </tr>
                    <tr>
                        <td width="45%">Branch:</td>
                        <td ><?php echo $row->BranchName;  ?></td>
                    </tr>
                    <tr>
                        <td>Admission Date:</td>
                        <td ><?php echo $row->AdmissionDate;  ?></td>
                    </tr>
                    <tr>
                        <td>Academic Year:</td>
                        <td><?php echo $academic_year_list[$row->Year];  ?></td>
                     </tr>
                    
                    <tr>
                        <td >Date of Birth:</td>
                        <td ><?php echo $row->DateOfBirth; ?></td>
                    </tr>
                    <tr>
                        <td >Student Email:</td>
                        <td  colspan="3"><?php echo $row->StudentEmail; ?></td>
                    </tr>
                    <tr>
                        <td >Blood Group:</td>
                        <td ><?php echo $blood_group_list[$row->BloodGroup]; ?></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><b>Parent Information</b></td>
                    </tr>
                    <tr>
                        <td >Father's Name:</td>
                        <td ><?php echo $row->FathersName;  ?></td>
                    </tr>
                    
                  
                    <tr>
                        <td >Mother's Name:</td>
                        <td ><?php echo $row->MothersName;  ?></td>
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
                        <td width="45%">Contact Number:</td>
                        <td ><?php echo $row->Contact;  ?></td>
                    </tr>
                    <tr>
                        <td width="45%">Present Address:</td>
                        <td ><?php echo $row->PresentAddress;  ?></td>
                    </tr>
                    <tr>
                        <td >Permanent Address:</td>
                        <td ><?php echo $row->PermanentAddress;  ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Emergency Contact </b></td>
                    </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<?php $this->load->view('Layouts/footer');?>