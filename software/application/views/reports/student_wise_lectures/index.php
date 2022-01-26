<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/assets/js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/assets/css/jquery.autocomplete.css"/>
<script type="text/javascript"> $(window).load(function() { $('#txt_date_of_transaction').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<style>
.ac_results {
    width: 502px;
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
.label_padding{
    padding-left: 3%;
}
</style>
<?php
//echo "<pre>";print_r($row);die;
$action = $this->uri->segment(2);

$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
  $branch_options[$row1['BranchId']] = $row1['BranchName'];
}

$location_data = $this->session->userdata('system.branch');
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
                    <form class="form-horizontal" action="<?php echo site_url('student_wise_lectures/view'); ?>" role="form"
                      method="POST" enctype="multipart/form-data">

                      <div class="col-md-8">
                        <div class="row">

                           <div class="col-xs-6">
                             <label for="inputStandard" class="  control-label label_padding">Branch Name</label><br>
                              <label class="field select">
                                <?php
                                if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                                  echo form_dropdown('BranchId', $branch_options, set_value('BranchId', (isset($row->BranchId) ? $row->BranchId : $location_data['BranchId'])), 'id="BranchId" class="form-control" required="required"');
                                  ?>
                                  <i class="arrow double"></i>
                                  <?php
                                  echo form_error('BranchId');
                              }else {
                                echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId" class="form-control"');
                                  echo form_input(array('name' => 'BranchId', 'id' => 'BranchId','class'=>'form-control', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                              }
                              ?>
                          </label>
                      </div>


                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="inputStandard" class="  control-label label_padding">Type Student Name</label><br>
                        <div class="col-lg-12">
                            <input type="text" id="student_info" class="form-control"
                            placeholder="Type Student Name">
                            <input id="StudentId" name="StudentId" type="hidden"/>
                            <?php echo form_error('StudentId'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="table-responsive">
                            <table align="center" class="table table-bordered mbn" style="width: 90%"
                            id="fee_details_info">
                            <thead>

                            </thead>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <div style="float: left;" class="col-xs-2">
                        <button class="btn btn-hover btn-danger btn-block" type="button"
                        onclick="javascript:history.go(-1)">Cancel
                    </button>
                </div>
                <div style="float: center;" class="col-xs-2"><input type="submit"
                 class="btn btn-hover btn-alert btn-block"
                 value="Save"></div>
             </div>
         </div>
     </div>



 </div>


 <div class="col-md-3">
    <table class="scale" style="margin-top: 0%" width="100%" cellpadding="6" align="center" id="student_details_info">
    </table>
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
<script type="text/javascript" language="javascript">
    $("#student_info").autocomplete('<?php echo site_url("students/ajax_get_student_list/")?>', {
        minChars: 0,
        width: 310,
        matchContains: "word",
        cacheLength: 0,
        highlightItem: true,
        formatItem: function (row, i, max, term) {
            //alert(row);
            var tmp;
            tmp = row[0].split(",");
            return "<strong>" + tmp[1] + "</strong>" + "<br><strong>Contact :" + tmp[4] + "</strong>" + "<br>Roll : " + tmp[6] + "<br />Father's Name : " + tmp[2] + "<br />Course : " + tmp[8] + "</span>";
        },
        formatResult: function (row) {
            var tmp;
            tmp = row[0].split(",");
            return tmp[1];
        }
    }).result(function (e, item) {
        var tmp;
        tmp = item[0].split(",");
        var ClassId = tmp[3];
        var StudentId = tmp[0];
        $("#StudentId").val(StudentId);
        $("#student_details_info").empty('');

        var student_table_data = "";
        student_table_data += '<tr><td colspan="2">Student Name : <b>' + tmp[1] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Roll : <b>' + tmp[6] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Contact : <b>' + tmp[4] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Course : <b>' + tmp[8] + '</b></td></tr>'
        student_table_data += '<tr><td colspan="2">Code : <b>' + tmp[5] + '</b></td></tr>';
        
        
        $("#student_details_info").append(student_table_data);

        $.post('<?php echo site_url("fee_configurations/ajax_get_class_wise_fee_list/")?>', {ClassId: ClassId},
            function (data) {
                if (data.status == 'failure') {

                } else {
                    $("#fee_details_info").empty('');
                    var table_data = '<tr>' +
                    '<th width="5%">#</th>' +
                    '<th width="10%">Select Type</th>' +
                    '<th>Collection Type</th>' +
                    '<th>Collection Amount</th>' +
                    '<th>Waiver Amount</th>' +
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
                                wav_td += '<td><input type="text" readonly="readonly" style="width: 50%" class="customized_input_box" name="WaiverAmount[' + index + ']" id="WaiverAmount' + index + '" value=' + 0 + ' autocomplete="off"/></td>';
                            }
                        }

                        table_data += '<tr id="table_row' + index + '">' +
                        '<td>' + index + ' .</td>' +
                        '<td><input type="checkbox" name="Chk[' + index + ']" value="'+index+'" /></td>' +
                        '<td><input type="hidden" name="FeeConfigId[' + index + ']" id="FeeConfigId' + index + '" value=' + data.FeeConfigId[i] + '><input type="hidden"  name="LedgerCode[' + index + ']" id="LedgerCode' + index + '" value="' + data.LedgerCode[i] + '" /><input type="hidden"  name="TypeId[' + index + ']" id="TypeId' + index + '" value="' + data.TypeId[i] + '" /><label style="font-weight:normal;">' + data.TypeName[i] + '</label></td>' +
                        '<td><input type="text" style="width: 50%" class="customized_input_box" readonly="readonly" name="Amount[' + index + ']" id="Amount' + index + '" value=' + data.Amount[i] + ' autocomplete="off"/></td>';
                        table_data += wav_td;
                        table_data += '</tr>';
                        index++;
                    }
                    $("#fee_details_info").append(table_data);
                }
            }, "json");


    });
</script>
