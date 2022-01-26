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
            <button style="padding: 9px 10px;" type="button" class="btn btn-danger btn-sm" onclick="javascript:window.print()">Print Report </button>
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
                <h4 class="mn" style="text-decoration: underline;"><?php echo $title; ?>  </h4>
            </div>
        </div>
        <div class="row" id="invoice-table">
            <div class="col-md-12">
                <table class="scale" cellspacing="0" width="100%" cellpadding="6" align="center">
                    <thead>
                    <tr>
                        <td style="text-align: center" ><label>SI. No.</label></td>
                        <td style="text-align: center" ><label>Employee Name</label></td>
                        <td style="text-align: center" ><label>Employee Code</label></td>
                        <td style="text-align: center" ><label>Joining Date</label></td>
                        <td style="text-align: center" ><label>Designation</label></td>
                        <td style="text-align: center" ><label>Father Name</label></td>
                        <td style="text-align: center" ><label>Current Salary</label></td>
                        <td style="text-align: center" ><label>Contact No.</label></td>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $color = "black";
                    foreach ($employee_info as $key=>$row) {
                        ?>
                        <tr>
                            <td style="text-align:center"><?php echo $i; ?></td>
                            <td style="text-align:right"><?php echo anchor('employees/view/' .$row['EmployeeId'],$row['EmployeeName'], array('title' => 'view', 'class' => 'view')).'&nbsp' ?>;   </td>
                            <td style="text-align:right"><?php echo $row['EmployeeCode']; ?></td>
                            <td style="text-align:right"><?php echo $row['DateOfJoining']; ?></td>
                            <td style="text-align:right"><?php echo $row['DesignationName']; ?></td>
                            <td style="text-align:right"><?php echo $row['FathersName']; ?></td>
                            <td style="text-align:right"><?php echo $row['CurrentSalary']; ?></td>
                            <td style="text-align:right"><?php echo $row['ContactNumber']; ?></td>

                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row no-print" id="invoice-footer" style="margin-top: 3%;">
            <div class="clearfix"></div>
            <div class="col-lg-2 ">
                <a href="javascript:window.print()" class="btn active btn-alert btn-block"><i class="fa fa-print pr5"></i> Print Report</a>
            </div>
        </div>

    </div>
</div>