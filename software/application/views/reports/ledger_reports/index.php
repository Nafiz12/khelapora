<title><?php echo $title;?></title>
<?php
$user_session=$this->session->userdata('system.user');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker1" ).datepicker();
    });
</script>
<?php
$action = $this->uri->segment(2);

foreach ($ledger_infos as $ledger_info) {
    $ledger_options[$ledger_info['LedgerId']] = $ledger_info['LedgerCode'].' - '.$ledger_info['LedgerName'];
}
?>
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form target="_blank" class="form-horizontal" action="<?php echo site_url('ledger_reports/ajax_get_report_information'); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <table class="input_table" style="width:100%; margin-left:1%;">
                            <tr>
                                <td ><label style="font-weight:normal;" class="control-label" for="firstName"> Ledger Account</label></td>
                                <td ><label style="font-weight:normal;" class="control-label" for="firstName"> From Date</label></td>
                                <td ><label style="font-weight:normal;" class="control-label" for="firstName"> Date</label></td>
                                <td ><label style="font-weight:normal;" class="control-label" for="firstName"> Voucher Type</label></td>
                            </tr>
                            <tr>
                                <td width="15%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('cbo_ledger', $ledger_options, set_value('cbo_ledger', (isset($row->SupplierId) ? $row->SupplierId :'')), 'id="cbo_ledger", class="form-control select2" '); ?>
                                        </div>
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <input type="text" id="datepicker" placeholder="Date From" class="form-control" name="txt_from_date" value="<?php echo isset($row->PaymentDate)?$row->PaymentDate:''; ?>">
                                        </div>
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <input type="text" id="datepicker1" placeholder="Date To" class="form-control" name="txt_to_date" value="<?php echo isset($row->PaymentDate)?$row->PaymentDate:''; ?>">
                                        </div>
                                    </div>
                                </td>
                                <td width="15%">
                                    <div class="form-group" >
                                        <div class="col-lg-11">
                                            <?php echo form_dropdown('cbo_voucher_type', $voucher_type, set_value('cbo_voucher_type', (isset($row->VpucherType) ? $row->VpucherType :'')), 'id="cbo_voucher_type", class="form-control" '); ?>
                                        </div>
                                    </div>
                                </td>

                                <td width="20%">
                                    <div class="form-group" >
                                        <div class="col-lg-6">
                                            <input style="font-weight:normal;" type="submit" class="btn btn-hover btn-alert btn-block" value="Submit" >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>