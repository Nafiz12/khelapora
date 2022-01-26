<title><?php echo $title;?></title>
<?php
$user_session=$this->session->userdata('system.user');
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/css/style-metro.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<?php
$action = $this->uri->segment(2);
$hidden_input = null;
$ledger_options = array('' => "---- Select ----");
foreach ($ledger_infos as $ledger_info) {
    $ledger_options[$ledger_info['LedgerId']] = $ledger_info['LedgerName'].'-'.$ledger_info['LedgerCode'];
}
?>
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span   class="panel-title"><?php echo $title; ?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('ac_opening_balances/add'); ?>" role="form" method="POST" enctype="multipart/form-data">
<!--                        <div class="form-group">-->
<!--                            <label style="text-align: center;color: #ff0000;" for="inputStandard" class="col-lg-12 control-label">NB : This Option is only for update Stock of existing product. Do not use this menu after completing migration.</label>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label   for="maskedDate" class="col-lg-3 control-label"><?php if(isset($language) && $language == 'B'){echo isset($language_list['Opening_Date'])?$language_list['Opening_Date']:'Opening Date';}else{echo 'Opening Date';}?></label>
                            <div class="col-lg-6">
                                <?php
                                $current_date = date("Y-m-d");
                                ?>
                                <input type="text" id="datepicker" required="required" class="form-control" name="Date" value="<?php echo isset($results[0]['Date'])?$results[0]['Date']:''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table align="center" class="table table-bordered mbn" style="width: 90%">
                                    <tr>
                                        <th width="5%"></th>
                                        <th  width="35%"><b>Ledger Account</b></th>
                                        <th width="30%"><b> Amount</b></th>
                                    </tr>
                                </table>
                                <table align="center" class="table table-bordered mbn" style="width: 90%" id="dataTable">
                                    <?php
                                    if(!empty($results) && $results!=''){
                                        foreach($results as $result){
                                            ?>
                                            <tr>
                                                <td width="5%"><input type="checkbox" name="chk[]"/></td>
                                                <td width="35%"><?php echo form_dropdown('cbo_ledger[]', $ledger_options, set_value('cbo_ledger', (isset($result['LedgerId']) ? $result['LedgerId'] :'')), 'id="cbo_ledger", class="custom_checkbox" '); ?></td>
                                                <td width="30%"><input type="text" name="Amount[]" id="Amount" class="form-control" required="required" value="<?php echo isset($result['Amount'])?$result['Amount']:''; ?>" placeholder="Amount"></td>
                                            </tr>
                                            <?php
                                        }
                                    }else {
                                        ?>
                                        <tr>
                                            <td width="5%"><input type="checkbox" name="chk[]"/></td>
                                            <td width="35%"><?php echo form_dropdown('cbo_ledger[]', $ledger_options, set_value('cbo_ledger', (isset($row->LedgerId) ? $row->LedgerId : '')), 'id="cbo_ledger", class="custom_checkbox" '); ?></td>
                                            <td width="30%"><input type="text" name="Amount[]" id="Amount"
                                                                   class="form-control" required="required"
                                                                   value="<?php echo isset($row->Amount) ? $row->Amount : ''; ?>"
                                                                   placeholder="Amount"></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"></label>
                            <div class="col-xs-2" style="float: left;width: 14%;"><button style="align: center" class="btn purple" id="add_new_voucher" onclick="addRow('dataTable')" type="button">Add More &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button></div>
                            <div style="float: left;" class="col-xs-2"><button class="btn black" type="button" onclick="deleteRow('dataTable')" >Remove Product &nbsp;<span class="glyphicons glyphicons-circle_minus"></span></button></div>
                        </div>
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)"><?php if(isset($language) && $language == 'B'){echo isset($language_list['Cancel'])?$language_list['Cancel']:'Cancel';}else{echo 'Cancel';} ?></button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="<?php if(isset($language) && $language == 'B'){echo isset($language_list['Save'])?$language_list['Save']:'Save';}else{echo 'Save';} ?>" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var matched, browser;

    jQuery.uaMatch = function( ua ) {
        ua = ua.toLowerCase();

        var match = /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
            /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
            /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
            /(msie) ([\w.]+)/.exec( ua ) ||
            ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
            [];

        return {
            browser: match[ 1 ] || "",
            version: match[ 2 ] || "0"
        };
    };

    matched = jQuery.uaMatch( navigator.userAgent );
    browser = {};

    if ( matched.browser ) {
        browser[ matched.browser ] = true;
        browser.version = matched.version;
    }

    // Chrome is Webkit, but Webkit is also Safari.
    if ( browser.chrome ) {
        browser.webkit = true;
    } else if ( browser.webkit ) {
        browser.safari = true;
    }

    jQuery.browser = browser;

</script>
<script>
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var colCount = table.rows[0].cells.length;
        for(var i=0; i<colCount; i++) {
            var newcell	= row.insertCell(i);
            newcell.innerHTML = table.rows[0].cells[i].innerHTML;
            //alert(newcell.childNodes);
            switch(newcell.childNodes[0].type) {
                case "text":
                    newcell.childNodes[0].value = "";
                    break;
                case "checkbox":
                    newcell.childNodes[0].checked = false;
                    break;
                case "select-one":
                    newcell.childNodes[0].selectedIndex = 0;
                    break;
            }
        }
    }
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        }catch(e) {
            alert(e);
        }
    }
</script>
