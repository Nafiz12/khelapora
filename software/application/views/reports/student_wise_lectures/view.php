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
    td,th{
            padding-left: 7px;
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
                        <?php
                        if(isset($row->Image)) {
                        ?>
                        <td width="17%">
                                <img width="150" height="170" src="<?php  echo base_url() . 'media/student_pictures/'.$row->Image;   ?>" class="responsive">
                        </td>
                            <?php
                        }else {
                            
                                ?>

                                <td width="17%">
                                    <img width="150" height="170"
                                         src="<?php echo base_url() . 'media/assets/img/avatars/2.png'; ?>"
                                         class="responsive">
                                </td>
                                <?php
                            
                       
                        }
                        ?>
                        <td style="vertical-align: top">
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
                                   <td colspan="2">Section/Batch : <b><?php echo $row->BatchName;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Code : <b><?php echo $row->StudentCode;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Roll : <b><?php echo $row->RollNo;  ?></b></td>
                               </tr><tr>
                                   <td colspan="2">Admission Date : <b><?php echo $row->AdmissionDate;  ?></b></td>
                               </tr>
                               <tr>
                                   <td colspan="2">Status : <b><?php echo $row->Status == '1'?'Active':'Inactive';  ?></b></td>
                               </tr>
                           </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" align="center">
                    <thead>
                         <tr>
                        <td colspan="5"><b>Provided Lecture  Information Student Wise</b></td>
                        </tr>
                        <tr>
                            <th> Student Name </th>
                           
                            <th> Course</th>
                            <th> Subject</th>
                            <th> Lecture Type</th>
                            <th> Number of Lecture </th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php 

                        if(isset($lecture_details) && !empty($lecture_details)){
                            foreach($lecture_details as $lecture){ 
// echo "<pre>";print_r($fee); 
                                ?>
                             <tr>
                                 <td ><?php echo $lecture['StudentName'].' '.'('.$lecture['StudentCode'].')';  ?></td>
                            
                                
                                 <td ><?php echo $lecture['ClassName'];  ?></td>
                                 <td ><?php echo $lecture['SubjectName'];  ?></td>
                                 <td ><?php echo $lecture['TypeName'];  ?></td>
                                 <td ><?php echo $lecture['total_lecture'];  ?></td>
                                
                                
                             </tr>

                                <!-- echo "<pre>";print_r($fee); -->
                        <?php   }
                        }  ?>
                      
                   
                    
                    
                    </tbody>
                </table>
            </div>
        
        </div>

    </div>
</div>
