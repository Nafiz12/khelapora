<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/circles/circles.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/vendor/plugins/raphael/raphael.js"></script>
<style type="text/css">
    .statistic-box .small {
        font-weight: 600;
        color: #222;
        margin-bottom: 15px;
    }
    .box_link {
        color: #30668C;
        text-decoration: none;
        font-weight: 600;
        font-size: 13px;
        text-align: center;
        font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif;
    }
    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        //border-radius: 10px;
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .panel-bd {
        border: 1px solid #30668C;
    }
    .panel-body::before {
        content: '';
        width: 0;
        height: 0;
        border-top: 12px solid #30668C;
        border-right: 12px solid transparent;
        position: absolute;
        left: 0;
        top: 0;
    }
</style>
<title><?php echo $title; ?></title>

<div class="row mb10">
    <div class="col-md-3">
        <div class="panel bg-alert light of-h mb10">
            <div class="pn pl20 p5">
                <div class="icon-bg"><i class="fa fa-user"></i></div>
                <h2 class="mt15 lh15"><b><?php echo isset($TotalStudents)?$TotalStudents:''; ?></b></h2>
                <h5 class="text-muted">Total Students</h5>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-3">
        <div class="panel bg-info light of-h mb10">
            <div class="pn pl20 p5">
                <div class="icon-bg"><i class="fa fa-user-times"></i></div>
                <h2 class="mt15 lh15"><b><?php echo isset($TotalTeacher)?$TotalTeacher:''; ?></b></h2>
                <h5 class="text-muted">Teachers</h5>
            </div>
        </div>
    </div> -->
    <div class="col-md-3">
        <div class="panel bg-info light of-h mb10">
            <div class="pn pl20 p5">
                <div class="icon-bg"><i class="fa fa-user-times"></i></div>
                <h2 class="mt15 lh15"><b><?php echo isset($Total_Pending_Students)?$Total_Pending_Students:'00'; ?></b></h2>
                <a class="box_link" href="<?php echo base_url(); ?>index.php/students/ajax_pending_students" style = "color:white;"><h5 class="text-muted">Applied for Admission</h5></a>
                
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="panel bg-danger light of-h mb10">
            <div class="pn pl20 p5">
                <div class="icon-bg"><i class="fa fa-users"></i></div>
                <h2 class="mt15 lh15"><b><?php echo isset($TotalStuff)?$TotalStuff:''; ?></b></h2>
                <h5 class="text-muted">Total Stuff</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel bg-warning light of-h mb10">
            <div class="pn pl20 p5">
                <div style="font-size: 40px" class="icon-bg"><i class="fa fa-dollar"></i></div>
                <h2 class="mt15 lh15"><b><?php
                        //echo '-------adfsdfsd---'.$ThisMonthFeeCollection; die;
                        $FeeCollection = 0.00;
                        if(isset($ThisMonthFeeCollection)){
                            $FeeCollection = $ThisMonthFeeCollection;
                        }
                        echo $FeeCollection ?></b></h2>
                <h5 class="text-muted">Fee Collection(This month)</h5>
            </div>
        </div>
    </div>
</div>

<hr/>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd" style="">
            <div class="panel-body" style="padding: 15px;background-color: #ec6f5a !important">
                <div class="statistic-box">
                    <h2 style="margin: 0;font-weight: 700;text-align: center">
                        <span class="slight">
                                <img src="<?php echo base_url() . 'media/assets/img/icons/student_icon.png' ?>" width="40" height="40">
                             </span>
                    </h2>
                    <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;">
                        <a class="box_link" href="<?php echo base_url(); ?>index.php/students/add" style = "color:white;">Add New Student</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd" style="">
            <div class="panel-body" style="padding: 15px; background-color: #f7c65f !important;">
                <div class="statistic-box">
                    <h2 style="margin: 0;font-weight: 700;text-align: center">
                        <span class="slight">
                                <img src="<?php echo base_url() . 'media/assets/img/icons/employee.png' ?>" width="40" height="40">
                             </span>
                    </h2>
                    <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;">
                        <a class="box_link" href="<?php echo base_url(); ?>index.php/employees/add" style = "color:white;">Add Employee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">-->
    <!--    <div class="panel panel-bd" style="">-->
    <!--        <div class="panel-body" style="padding: 15px; background-color: #55badf !important;">-->
    <!--            <div class="statistic-box">-->
    <!--                <h2 style="margin: 0;font-weight: 700;text-align: center">-->
    <!--                    <span class="slight">-->
    <!--                            <img src="<?php echo base_url() . 'media/assets/img/icons/account.png' ?>" width="40" height="40">-->
    <!--                         </span>-->
    <!--                </h2>-->
    <!--                <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;">-->
    <!--                    <a class="box_link" href="<?php echo base_url(); ?>index.php/report_tabulation_sheets" style="color:white;">Tabulation Sheet</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
     <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd" style="">
            <div class="panel-body" style="padding: 15px;background-color: #55badf !important;">
                <div class="statistic-box">
                    <h2 style="margin: 0;font-weight: 700;text-align: center">
                        <span class="slight">
                                <img src="<?php echo base_url() . 'media/assets/img/icons/payment_voucher.png' ?>" width="40" height="40">
                             </span>
                    </h2>
                    <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;">
                        <a class="box_link" href="<?php echo base_url(); ?>index.php/ac_payment_vouchers" style="color:white;">Payment Voucher</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd" style="">
            <div class="panel-body" style="padding: 15px;background-color: #a992e2 !important;">
                <div class="statistic-box">
                    <h2 style="margin: 0;font-weight: 700;text-align: center">
                        <span class="slight">
                                <img src="<?php echo base_url() . 'media/assets/img/icons/fee.png' ?>" width="40" height="40">
                             </span>
                    </h2>
                    <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;">
                        <a class="box_link" href="<?php echo base_url(); ?>index.php/fee_configurations/index" style = "color:white;">Fee Configuration</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class = "row">
   
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd" style="">
            <div class="panel-body" style="padding: 15px;background-color: #a992e2 !important">
                <div class="statistic-box">
                    <h2 style="margin: 0;font-weight: 700;text-align: center">
                        <span class="slight">
                                <img src="<?php echo base_url() . 'media/assets/img/icons/voucher.png' ?>" width="40" height="40">
                             </span>
                    </h2>
                    <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;">
                        <a class="box_link" href="<?php echo base_url(); ?>index.php/ac_receipt_vouchers/index" style="color:white;">Received Voucher</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<hr/>
<div class="admin-panels fade-onload sb-l-o-full">
    <!-- full width widgets -->
    <div class="row">
        <!-- Three panes -->
        <div class="col-md-12 admin-grid">
            <div class="panel sort-disable" id="p0">
                <div class="panel-heading">
                    <span class="panel-title">Student Information</span>
                </div>
                <div class="panel-body mnw700 of-a">
                    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                    <!-- <div id="chartContainer" style="margin-top:4%;height: 300px; width: 100%;"></div> -->
                </div>
                <div style="margin-top: 3%" class="panel-heading">
                    <span class="panel-title">Employee Information</span>
                </div>
                <div class="panel-body mnw700 of-a">
                    <div id="chartContainer3" style="text-align: center;height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        window.onload = function () {
            

            function toggleDataSeries(e){
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                }
                else{
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title:{
                    fontSize: 14,
                    text: "Student Number(Class Wise)"
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($ClassWiseTotalStudent, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart2.render();

            var chart3 = new CanvasJS.Chart("chartContainer3", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    fontSize: 14,
                    text: "Designation Wise Employee"
                },
                data: [{
                    type: "pie",
                    yValueFormatString: "#0.##",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($DesignationWiseEmployee, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart3.render();
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/canvasjs.min.js"></script>