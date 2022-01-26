<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script>
    $(function() {
        // $( "#datepicker" ).datepicker();
    });
</script>
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
</style>
<?php
$action = $this->uri->segment(2);

$credit_amount_options = array('' => "---- Select ----");
$debit_amount_options = array('' => "---- Select ----");
$location_data=$this->session->userdata('system.branch');
?>

<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('ac_receipt_vouchers/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data" onsubmit="return validate_form();">
                        <input type="hidden" name="BranchId" value="<?php echo isset($Voucher_data->BranchId)?$Voucher_data->BranchId:$location_data['BranchId']; ?>">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="VoucherId" value="<?php echo isset($Voucher_data->VoucherId)?$Voucher_data->VoucherId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Voucher Type</label>
                            <div class="col-lg-6">
                                <?php echo form_dropdown('VoucherTypeName', $voucher_type_list, set_value('VoucherType', (isset($Voucher_data->VoucherType) ? $Voucher_data->VoucherType : $VoucherType)), 'id="VoucherType", class="custom_checkbox", disabled '); ?>
                                <input type="hidden" name="VoucherType" id="VoucherType" value="<?php echo isset($Voucher_data->VoucherType) ? $Voucher_data->VoucherType : $VoucherType; ?>"/>
                                <?php echo form_error('VoucherType'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="maskedDate" class="col-lg-3 control-label">Transaction Date</label>
                            <div class="col-lg-6">
                                <?php
                                $current_date = date("Y-m-d");
                                ?>
                                <input type="text" id="datepicker" required="required" class="form-control" name="VoucherDate" value="<?php echo isset($Voucher_data->VoucherDate)?$Voucher_data->VoucherDate:$current_date; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Voucher Code</label>
                            <div class="col-lg-6">
                                <input type="text" name="VoucherCode" readonly="readonly" id="VoucherCode" class="form-control" required="required" value="<?php echo isset($row->VoucherCode)?$row->VoucherCode:''; ?>" placeholder="Voucher Code">
                                <?php echo form_error('VoucherCode'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Credit Account</label>
                            <div class="col-lg-6">
                                <?php echo form_dropdown('cbo_credit', $credit_amount_options, set_value('cbo_credit', (isset($Voucher_data->VoucherType) ? $Voucher_data->VoucherType : "")), 'id="cbo_credit", required="required", class="custom_checkbox" '); ?>
                                <input type="hidden" id="hidden_credit_name" value=""/>
                                <?php echo form_error('cbo_credit'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Debit Account</label>
                            <div class="col-lg-6">
                                <?php echo form_dropdown('cbo_debit', $debit_amount_options, set_value('cbo_debit', (isset($Voucher_data->VoucherType) ? $Voucher_data->VoucherType : "")), 'id="cbo_debit", required="required", class="custom_checkbox" '); ?>
                                <input type="hidden" id="hidden_debit_name" value=""/>
                                <?php echo form_error('cbo_debit'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Amount</label>
                            <div class="col-lg-6">
                                <input type="text" name="amount" id="amount" class="form-control" required="required" value="<?php echo isset($row->tmp_amount)?$row->tmp_amount:''; ?>" placeholder="Amount">
                                <?php echo form_error('tmp_amount'); ?>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <label for="inputStandard" class="col-lg-3 control-label">Particulars</label>
                            <div class="col-lg-6">
                                <input type="text" name="Particulars" id="Particulars" class="form-control" required="required" value="<?php echo isset($row->Particulars)?$row->Particulars:''; ?>" placeholder="Note">
                                <?php echo form_error('Particulars'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"></label>
                            <div class="col-lg-2">
                                <button style="align: center" class="btn active btn-alert btn-block" id="add_new_voucher" type="button">Add &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table align="center" class="table table-bordered mbn" style="width: 90%" id="voucher_details_info">
                                    <thead>
                                    <tr>
                                        <th width="5%"><b>#</b></th>
                                        <th width="15%"><b>Credit Amount</b></th>
                                        <th width="15%"><b>Debit Amount</b></th>
                                        <th width="15%"><b>Amount</b></th>
                                        <th width="15%"><b>Narration/Cheque Details</b></th>
                                        <th width="5%"><b>Action</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $index = 1;
                                    if($action == "edit"){
                                        $index = 1;
                                        //echo "A<pre>";$row['ProductSize'];
                                        $length=count($Voucher_details_data);
                                        foreach($Voucher_details_data as $row){
                                            //echo "A<pre>";echo $row['SizeName'];
                                            ?>
                                            <tr id="table_row<?php echo $index;?>">
                                                <td><?php echo $index; ?></td>
                                                <td>
                                                    <input type="hidden" name="txt_credit_id[<?php echo $index; ?>]" id="txt_credit_id<?php echo $index; ?>" value="<?php echo $row['CreditLedgerId']; ?>" />
                                                    <input type="hidden" name="txt_voucher_details_id[<?php echo $index; ?>]" id="txt_voucher_details_id<?php echo $index; ?>" value="<?php echo $row['VoucherDetailsId']; ?>" />
                                                    <label><?php echo $row['CreditLedgerName']; ?></label>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="txt_debit_id[<?php echo $index; ?>]" id="txt_debit_id<?php echo $index; ?>" value="<?php echo $row['DebitLedgerId']; ?>" />
                                                    <label><?php echo $row['DebitLedgerName']; ?></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="customized_input_box" readonly="readonly" name="txt_amount[<?php echo $index; ?>]" id="txt_amount<?php echo $index; ?>" value="<?php echo $row['Amount']; ?>" autocomplete="off"/>
                                                </td>
                                                <td>
                                                    <input type="text" class="customized_input_box" name="txt_particulars[<?php echo $index; ?>]" id="txt_particulars<?php echo $index; ?>" value="<?php echo $row['Particulars']; ?>" autocomplete="off"/>
                                                </td>
                                                <td id="delete_icon_<?php echo $index; ?>"><?php if($index==$length){?><a href="#" onclick="delete_row(<?php echo $index; ?>)" title="Delete Product" ><img src="<?php echo base_url();?>media/assets/img/icons/delete1.gif" /></a><?php }?></td>
                                            </tr>
                                            <?php
                                            $index++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Total Amount</label>
                            <div class="col-lg-6">
                                <input type="text" name="VoucherAmount" id="VoucherAmount" readonly="readonly" class="form-control" required="required" value="<?php echo isset($Voucher_data->VoucherAmount)?$Voucher_data->VoucherAmount:0; ?>" placeholder="Amount">
                                <input type="hidden" id="counter" value="<?php echo $index;?>"/>
                                <?php echo form_error('VoucherAmount'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Global Particular</label>
                            <div class="col-lg-6">
                                <input type="text" name="Particulars" id="Particulars" class="form-control" required="required" value="<?php echo isset($Voucher_data->Particulars)?$Voucher_data->Particulars:''; ?>" placeholder="Particulars">
                                <?php echo form_error('Particulars'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript">
    var ledgerName;
    $(document).ready(function() {
        get_ledger_accounts();
        $("#add_new_voucher").click(function(){
            var index = $("#counter").val();
            var credit_ledger_id = $("#cbo_credit").val();
            var credit_ledger_name = $("#hidden_credit_name").val();
            var debit_ledger_id = $("#cbo_debit").val();
            var debit_ledger_name = $("#hidden_debit_name").val();
            var amount = parseFloat($("#amount").val());
            var particulars = $("#Particulars").val();

            var table_data = '<tr id="table_row'+index+'">'+
                '<td>' + index +' .</td>'+
                '<td><input type="hidden" name="txt_credit_id['+index+']" id="txt_credit_id'+index+'" value='+ credit_ledger_id +' /><label>' + credit_ledger_name + '</label></td>'+
                '<td><input type="hidden" name="txt_debit_id['+index+']" id="txt_debit_id'+index+'" value='+ debit_ledger_id +' /><label>' + debit_ledger_name + '</label></td>'+
                '<td><input type="text" readonly="readonly" class="customized_input_box" name="txt_amount['+index+']" id="txt_amount'+index+'" value="'+ amount +'" autocomplete="off" /></td>'+
                '<td><input type="text" readonly="readonly" class="customized_input_box" name="txt_particulars['+index+']" id="txt_particulars'+index+'" value="'+ particulars +'" autocomplete="off" /></td>'+
                '<td id="delete_icon_'+index+'"><a href="#" onclick="delete_row('+index+')" title="Delete Product" ><img src="<?php echo base_url();?>media/assets/img/icons/delete1.gif" /></a></td>'+
                '</tr>';
            $("#voucher_details_info").append(table_data);
            index++;
            calculate_grand_total(amount);
            $("#counter").val(index);
        });
        $("#cbo_credit").change(function(){
            var credit_ledger_id = $("#cbo_credit").val();
            $.post('<?php echo site_url("ac_vouchers/ajax_get_voucher_name/")?>', {ledgerId: credit_ledger_id },
                function(data){
                    if(data.status == 'failure' ){

                    }else{
                        $("#hidden_credit_name").val(data.ledger_name);
                    }
                },"json");
        });
        $("#cbo_debit").change(function(){
            var credit_ledger_id = $("#cbo_debit").val();
            $.post('<?php echo site_url("ac_vouchers/ajax_get_voucher_name/")?>', {ledgerId: credit_ledger_id },
                function(data){
                    if(data.status == 'failure' ){

                    }else{
                        $("#hidden_debit_name").val(data.ledger_name);
                    }
                },"json");
        });
//        $("#VoucherType").change(function(){
//
//
//        });
    });
    function get_ledger_accounts(){
        var VoucherType = $("#VoucherType").val();
        if(VoucherType !=''){
            // Start Voucher Code
            $.post('<?php echo site_url("ac_vouchers/ajax_get_voucher_code/")?>', {VoucherType: VoucherType },
                function(data){
                    if(data.status == 'failure' ){

                    }else{
                        $("#VoucherCode").val(data.voucher_code);
                    }
                },"json");
            // End Voucher Code
            //Start Crdeit Account Combo Box
            $.post('<?php echo site_url("ac_vouchers/ajax_get_credit_account_list/")?>', {VoucherType: VoucherType},
                function(data){
                    if(data.status == 'failure' ){
                        $('#cbo_credit').append('<option value = \"' + '' + '\">' + '------Select------' + '</option>');
                    }else{
                        $("#cbo_credit").empty();
                        for(var i = 0; i < data.credit_ledger_id.length; i++){
                            $('#cbo_credit').append('<option value = \"' + data.credit_ledger_id[i] + '\">' + data.credit_ledger_name[i] + '</option>');
                        }
                    }
                },"json");
            //End Credit Account Combo Box
            //Start Debit Account Combo Box
            $.post('<?php echo site_url("ac_vouchers/ajax_get_debit_account_list/")?>', {VoucherType: VoucherType},
                function(data){
                    if(data.status == 'failure' ){
                        $('#cbo_debit').append('<option value = \"' + '' + '\">' + '------Select------' + '</option>');
                    }else{
                        $("#cbo_debit").empty();
                        for(var i = 0; i < data.debit_ledger_id.length; i++){
                            $('#cbo_debit').append('<option value = \"' + data.debit_ledger_id[i] + '\">' + data.debit_ledger_name[i] + '</option>');
                        }
                    }
                },"json");
            //End Credit Account Combo Box
        }else {
            $("#VoucherCode").val('');
        }
    }
    function calculate_grand_total(amount){
        var voucher_total_price=parseFloat($("#VoucherAmount").val());
        var single_voucher_amount = amount;
        $("#VoucherAmount").val(voucher_total_price+single_voucher_amount);
    }
    function delete_row(index){
        if(confirm('Are you sure to delete?')){
            var voucher_price = parseFloat($("#txt_amount"+index).val());
            calculate_voucher_total(voucher_price,0);
            $("#table_row"+index).remove();
        }
    }
    function calculate_voucher_total(previous_total_price,total_price){
        var voucher_total_price=parseFloat($("#VoucherAmount").val());
        $("#VoucherAmount").val(voucher_total_price - previous_total_price + total_price);

    }
    function validate_form(){
        var result = true;
        var order_total_amount = parseFloat($("#txt_order_total").val());
        var discount_amount = parseFloat($("#txt_discount").val());
        var paid_amount = parseFloat($("#txt_payment_amount").val());
        if(discount_amount>order_total_amount){
            $("#txt_discount").css('border-color','red');
            $("#discount_amount_error").show();
            result = false;
        }
        return result;
    }

</script>
