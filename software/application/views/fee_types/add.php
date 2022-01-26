<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<?php
$action = $this->uri->segment(2);
$yes_no_option = array(1=>"Yes",0=>"No");
$fee_category_options = array('' => "- Select Fee Category -");

foreach ($category_list as $row2) {
    $fee_category_options[$row2->CategoryId] = $row2->CategoryName.' - '.$row2->LedgerCode;
}
?>
<!-- Begin: Content -->
<div id="content" class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-tasks"></span><span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('fee_types/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="text_type_id" value="<?php echo isset($row->TypeId)?$row->TypeId:""?>">
                            <?php
                            //echo '<pre>'; print_r($row); die;
                        }
                        ?>

                        <div class="row">

                            <div class="col-md-8">
                                <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Type Name<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="txt_type_name" id="" class="form-control" value="<?php echo isset($row->TypeName) ? $row->TypeName:""; ?>" placeholder="Name">
                                <?php echo form_error('txt_type_name'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Fee Type Category</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('cbo_fee_type_category', $fee_category_options, set_value('cbo_fee_type_category', (isset($row->CategoryId) ? $row->CategoryId : "")), 'id="cbo_fee_type_category", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_fee_type_category'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Is Monthly Fee?<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('cbo_is_monthly_fee', $yes_no_option, set_value('cbo_is_waiver_applicable', (isset($row->IsMonthlyFee) ? $row->IsMonthlyFee : 0)), 'id="cbo_is_monthly_fee" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_is_monthly_fee'); ?>
                            </div>
                        </div>
                            </div>

                            
                        </div>
                        <div class="row">
                            
                            <div class="col-md-4">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Is Waiver Applicable?<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('cbo_is_waiver_applicable', $yes_no_option, set_value('cbo_is_waiver_applicable', (isset($row->IsWaiverApplicable) ? $row->IsWaiverApplicable : "")), 'id="cbo_is_waiver_applicable" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_is_waiver_applicable'); ?>
                            </div>
                        </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Is One Time Fee?<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('cbo_is_onetime_fee', $yes_no_option, set_value('cbo_is_onetime_fee', (isset($row->IsOneTimeFee) ? $row->IsOneTimeFee : 0)), 'id="cbo_is_onetime_fee" required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_is_onetime_fee'); ?>
                            </div>
                        </div>
                            </div>

                            
                        </div>
                           
                        </div>
                         <div class="col-md-4" style="border-left:1px solid black;">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Description</label><br>
                            <div class="col-lg-12">
                                <textarea id="textArea2" class="form-control" rows="2" name="txt_description"><?php echo isset($row->Description)?$row->Description:""; ?></textarea>
                            </div>
                        </div>
                    </div>
                            </div>
                            <div class="row text-right" style="float:right;">
                                 <div class="col-md-6 col-xs-6"><input type="submit" style = " " class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                            <div class="col-md-6 col-xs-6">
                                <button class="btn btn-hover btn-danger btn-block" style = "" type="button" onclick="javascript:history.go(-1)">Cancel</button>
                            </div>
                            </div>
                        </div>
                        




                      
                </div>
                </form>
            </div>
        </div>
