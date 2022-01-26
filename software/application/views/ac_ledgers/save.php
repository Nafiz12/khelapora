<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $("#group_head").hide();
        group_head_change_effect();
        $("#cbo_is_group_head").change(function(){
            group_head_change_effect();
        });
    });
    function group_head_change_effect() {
        var isGroupHead =  $("#cbo_is_group_head").val();
        if(isGroupHead == 0){
            $("#group_head").show();
        }else{
            $("#group_head").hide();
        }
    }
</script>
<style type="text/css">
    .custom_input_style {
        background-color: #fff;
        background-image: none !important;
        border: 1px solid #dddddd;
        filter: none !important;
        height: 100% !important;
        line-height: 30px;
        outline: medium none;
        width: 60%;
    }
    .custom_checkbox {
        width: 61.5%;
    }
</style>
<?php
$action = $this->uri->segment(2);
$hidden_input = null;
if ($action == 'edit') {

} else {
    $class_name = 'formular';
}
$acc_types_options = array('' => "---- Select Type ----");
foreach ($acc_types as $acc_type) {
    $acc_types_options[$acc_type['TypeId']] = $acc_type['Name'];
}
$group_head_options = array('' => "---- Select Group Head ----");
foreach ($acc_group_heads as $group_heads) {
    $group_head_options[$group_heads['LedgerId']] = $group_heads['LedgerName'];
}
$yes_no_option = array(1=>"Yes",0=>"No");
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
                    <form class="form-horizontal" action="<?php echo site_url('ac_ledgers/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="LedgerId" value="<?php echo isset($row->LedgerId)?$row->LedgerId:""?>">
                        <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Is Group Head?<span style="color: red;">*</span></label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_is_group_head', $yes_no_option, set_value('cbo_is_group_head', (isset($row->IsGroupHead) ? $row->IsGroupHead : 0)), 'id="cbo_is_group_head" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_is_group_head'); ?>
                            </div>
                        </div>
                        <div class="form-group" id="group_head">
                            <label for="inputStandard" class="col-lg-3 control-label">Mother Head</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_group_head', $group_head_options, set_value('cbo_group_head', (isset($row->GroupHeadId) ? $row->GroupHeadId : "")), 'id="cbo_group_head", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_group_head'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Ledger Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="LedgerName" id="LedgerName" class="form-control" required="required" value="<?php echo isset($row->LedgerName)?$row->LedgerName:''; ?>" placeholder="Ledger Name">
                                <?php echo form_error('LedgerName'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Type</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('TypeId', $acc_types_options, set_value('TypeId', (isset($row->TypeId) ? $row->TypeId : "")), 'id="TypeId", class="custom_checkbox" '); ?>
                                <?php echo form_error('TypeId'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Ledger Code</label>
                            <div class="col-lg-5">
                                <input type="text" name="LedgerCode" id="LedgerCode" class="form-control" required="required" value="<?php echo isset($row->LedgerCode)?$row->LedgerCode:''; ?>" placeholder="Ledger Code">
                                <?php echo form_error('LedgerCode'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-5">
                                <textarea id="textArea2" class="form-control" rows="2" name="LedgerDescription"><?php echo isset($row->LedgerDescription)?$row->LedgerDescription:""; ?></textarea>
                                <?php echo form_error('LedgerDescription'); ?>
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
