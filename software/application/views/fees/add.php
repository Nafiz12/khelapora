<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/css/jquery.autocomplete.css"/>
<script type="text/javascript"> $(window).load(function() { $('#txt_date_of_transaction').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<script type="text/javascript">
    $(window).load(function()
    {
        $('#mydate').glDatePicker({
            dateFormat: 'yy-mm-dd'
        });


    });
</script>

<script>
    $(function() {
        $( "#datepicker1" ).datepicker();
    });
</script>



<style>
    input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"] {
    line-height: 18px;
   
}

    .ac_results {
        width: 502px;
    }
.sham{
    display: none;
}
    .customized_input_box {
        display: block;
        width: 100%;
        height: 33px;
        padding: 9px 12px;
        font-size: 13px;
        line-height: 1.5;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dddddd;
        border-radius: 0px;
        -webkit-transition: border-color ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s;
        transition: border-color ease-in-out .15s;
    }

    .cal_total {
        display: block;
        width: 100%;
        height: 33px;
        padding: 9px 12px;
        font-size: 13px;
        line-height: 1.5;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dddddd;
        border-radius: 0px;
        -webkit-transition: border-color ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s;
        transition: border-color ease-in-out .15s;
    }

    .custom_checkbox {
        background-color: #fff;
        background-image: none !important;
        border: 1px solid #dddddd;
        filter: none !important;
        outline: medium none;
        width: 100%;
        height: 34px !important;
    }

    .ac_input {
        width: 100%;
    }
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
</style>
<?php
//echo "<pre>";print_r($row);die;
$action = $this->uri->segment(2);
$class_options = array('' => "- Select Class -");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

$type_options = array('' => "- Select Fee Type-");
foreach ($type_list as $row) {
    $type_options[$row->TypeId] = ($row->TypeName);
}
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$section_options = array('' => 'Select Section/Batch');

$location_data=$this->session->userdata('system.branch');
$section_options = array('' => '------Select Section------');

$student_options = array('' => '------Select Student------');
//$feetype_options= array(''=>'------Select Student------');
?>
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title; ?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('fees/' . $action); ?>" role="form"
                          method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="FeeId"
                                   value="<?php echo isset($row->FeeId) ? $row->FeeId : "" ?>">
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-lg-12">

                                <?php
                                if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                    echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" class="custom_checkbox"  required="required"');
                                    ?>
                                    <i class="arrow double"></i>
                                    <?php
                                    echo form_error('BranchId');
                                }else {
                                    echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" class="custom_checkbox sham" id="BranchId"');
                                    echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                 <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 control-label text-left">Academic Year <span style="color: red" >*</span></label><br>
                                <div class="col-lg-12">
                                    <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : '')), 'id="Year", class="custom_checkbox" '); ?>
                                    <?php echo form_error('Year'); ?>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 control-label text-left">Type Student Name</label><br>
                                <div class="col-lg-12">
                                    <input type="text" id="student_info" class="form-control"
                                           placeholder="Type Student Name">
                                    <input id="StudentId" name="StudentId" type="hidden"/>
                                    <?php echo form_error('student_info'); ?>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 control-label text-left">Transaction Date</label><br>
                                <div class="tab-content pn br-n admin-form">
                                    <div class="col-xs-12">
                                        <label for="filter-datepicker" class="field prepend-picker-icon">
                                            <?php echo form_input(array('name' => 'txt_date_of_transaction','autocomplete'=>'off','required'=>'required','id' => 'txt_date_of_transaction','type'=>'text','maxlength'=>'100','placeholder'=>'Date Of Transaction','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_transaction',isset($row->TransferDate)?$row->TransferDate:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                            <?php echo form_error('txt_date_of_transaction'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label for="inputStandard" class="col-lg-12 control-label text-left">Memo Number <span style="color: red" >*</span></label><br>
                                <div class="col-lg-12">
                                    <input type="text" id="txt_memo_no" required="required" readonly="readonly" class="form-control" name="txt_memo_no" value="<?php echo isset($Order_data->MemoNo) ? $Order_data->MemoNo:$memo_number; ?>">
                                    <?php echo form_error('txt_memo_no'); ?>
                                </div>
                            </div>
                            </div>
                        </div>
                       
                       <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table align="center" class="table table-bordered mbn" style="width: 90%"
                                           id="fee_details_info">
                                        <thead>

                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class=" row" style="float:center;padding-right:30%;">
                                <div class="col-md-6">
                                    <button class="btn btn-hover btn-danger btn-block" style = "width:30%;float:right" type="button"
                                            onclick="javascript:history.go(-1)">Cancel
                                    </button>
                                </div>
                                <div class="col-xs-6">
                                    <input type="submit" class="btn btn-hover btn-alert btn-block" style = "width:30%;float:left" value="Save">
                                </div>
                            </div>
                        </div>

                         <div class="col-md-3">
                            <table class="scale" style="margin-top: 0%" width="100%" cellpadding="6" align="center" id="student_details_info">
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var matched, browser;

    jQuery.uaMatch = function (ua) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
            /(webkit)[ \/]([\w.]+)/.exec(ua) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
            /(msie) ([\w.]+)/.exec(ua) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) ||
            [];

        return {
            browser: match[1] || "",
            version: match[2] || "0"
        };
    };

    matched = jQuery.uaMatch(navigator.userAgent);
    browser = {};

    if (matched.browser) {
        browser[matched.browser] = true;
        browser.version = matched.version;
    }

    // Chrome is Webkit, but Webkit is also Safari.
    if (browser.chrome) {
        browser.webkit = true;
    } else if (browser.webkit) {
        browser.safari = true;
    }

    jQuery.browser = browser;

</script>

<script>
    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker1" ).datepicker();
    });
</script>
<script type="text/javascript" language="javascript">
    $("#student_info").autocomplete('<?php echo site_url("students/ajax_get_student_list/")?>', {
         
        minChars: 0,
        width: 310,
        matchContains: "word",
        cacheLength: 0,
        highlightItem: true,
        formatItem: function (row, i, max, term) {
            // alert(row);
            var tmp;
            tmp = row[0].split(",");
            return "<strong>Name :" + tmp[1] + "</strong>" + "<br><strong>Course :" + tmp[8] +"<br><strong>Branch :" + tmp[7] + "</strong>" + "<br><strong>Course :" + tmp[7] + "</strong>" + "<br>Batches : " + tmp[3] + "<br />Father's Name : " + tmp[2] + "<br />StudentCode : " + tmp[5] + "<br />Contact : " + tmp[4] + "<br />StudentRoll : " + tmp[6] + "</span>";
        },
        formatResult: function (row) {
            var tmp;
            tmp = row[0].split(",");
            return tmp[1];
        }
    }).result(function (e, item) {
        var tmp;
        tmp = item[0].split(",");
        var BatchId = tmp[3];
        var CourseId = tmp[9];
        var Medium = tmp[12];
        var StudentId = tmp[0];
        $("#StudentId").val(StudentId);
        get_payment_history();
        $("#student_details_info").empty('');

        var student_table_data = "";
        student_table_data += '<tr><td colspan="2">Student Name : <b>' + tmp[1] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Student Code : <b>' + tmp[5] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Student Roll : <b>' + tmp[6] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Branch : <b>' + tmp[7] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Course : <b>' + tmp[8] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Batch : <b>' + tmp[3] + '</b></td></tr>';
        // $("#student_details_info").append(student_table_data);

        $.post('<?php echo site_url("fee_configurations/ajax_get_class_wise_fee_list/")?>', {CourseId: CourseId, Medium: Medium},
            function (data) {
                if (data.status == 'failure') {

                } else {
                    $("#fee_details_info").empty('');
                    var table_data = '<tr>' +
                        '<th width="5%">#</th>' +
                        '<th width="15%">Select Type</th>' +
                        '<th>Collection Type</th>' +
                        '<th>Collection Amount</th>' +
                        '<th>Due Date</th>' +
                        '</tr>';
                    var index = 1;
                    for (var i = 0; i < data.FeeConfigId.length; i++) {
                        var wav_td = '';
                        if(data.IsMonthlyFee[i] ==1){
                            wav_td += '<td><input type="text" style="width: 50%" class="customized_input_box" name="WaiverAmount[' + index + ']" id="WaiverAmount' + index + '" value=' + tmp[11] + ' autocomplete="off"/></td>';
                        }else{
                            if(data.IsWaiverApplicable[i] ==1){
                                wav_td += '<td><input type="text" style="width: 50%" class="customized_input_box" name="WaiverAmount[' + index + ']" id="WaiverAmount' + index + '" value=' + data.WaiverAmount[i] + ' autocomplete="off"/></td>';
                            }else{
                                wav_td += '<td><input type="date"  style="width: 70%" class="customized_input_box " name="due_date" id="datepicker"  autocomplete="off"/></td>';
                                 wav_td += '<td style="display:none;"><input type="hidden" style="width: 50%" class="customized_input_box" name="WaiverAmount[' + index + ']" id="WaiverAmount' + index + '" value=' + data.WaiverAmount[i] + ' autocomplete="off"/></td>';
                            }
                        }

                        table_data += '<tr id="table_row' + index + '">' +
                            '<td>' + index + ' .</td>' +
                            '<td><input type="checkbox" name="Chk[' + index + ']" value="'+index+'" /></td>' +
                            '<td><input type="hidden" name="FeeConfigId[' + index + ']" id="FeeConfigId' + index + '" value=' + data.FeeConfigId[i] + '><input type="hidden"  name="LedgerCode[' + index + ']" id="LedgerCode' + index + '" value="' + data.LedgerCode[i] + '" /><input type="hidden"  name="TypeId[' + index + ']" id="TypeId' + index + '" value="' + data.TypeId[i] + '" /><label style="font-weight:normal;">' + data.TypeName[i] + '</label></td>' +
                            '<td><input type="text" style="width: 50%" class="customized_input_box" name="Amount[' + index + ']" id="Amount' + index + '" value=' + data.Amount[i] + ' autocomplete="off"/></td>';
                        table_data += wav_td;
                        table_data += '</tr>';
                        index++;
                    }
                    $("#fee_details_info").append(table_data);
                }
            }, "json");


    });

    function get_payment_history(){
        $('#payment_info').empty();
        var selected_student_id=$("#StudentId").val();
        var selected_branch_id = $("#BranchId").val();

        // alert(selected_student_id);
        if(selected_student_id != ''){
            $.post("<?php echo site_url('students/ajax_for_get_student_list_by_class_and_section_payment') ?>", {class_id: selected_student_id, BranchId:selected_branch_id },
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{


                        $("#payment_info").empty('');
                        if(data.ActualAmount-data.PaidAmount>0){
                            var DueAmount = "Due"+' ('+data.balance+')';
                        }
                        if(data.ActualAmount-data.PaidAmount==0){
                            var DueAmount = "Paid";
                        }
                        if(data.ActualAmount-data.PaidAmount<0){
                             var advance = data.PaidAmount-data.ActualAmount;
                            var DueAmount = "Advanced"+' ('+advance+')';
                        }

        var student_table_data = "";
        student_table_data += '<tr><td colspan="2">Student Id : <b>' + data.StudentId + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Fee Type : <b>' + data.TypeName + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Payable Amount : <b>' + data.ActualAmount + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Paid Amount : <b>' + data.PaidAmount + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Payment Status : <b>' + DueAmount + '</b></td></tr>';
        student_table_data += '<tr><td colspan="2">Due Date : <b>' + data.DueDate + '</b></td></tr>';
        $("#student_details_info").append(student_table_data);


                      
                    }
                }, "json");
        }else{
            $('#payment_info').empty();
        }
    }
</script>
