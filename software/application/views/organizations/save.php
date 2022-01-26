<title><?php echo $title;?></title>
<?php
$action = $this->uri->segment(2);
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
                    <form class="form-horizontal" action="<?php echo site_url('organizations/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="txt_organization_id" value="<?php echo isset($row->OrganizationId)?$row->OrganizationId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-6 control-label">Logo</label>
                            <div class=" col-md-6 fileupload fileupload-new admin-form" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail mb15">
                                    <img height="200" width="200" <?php if (isset($row->Logo)) { ?> src="<?php echo base_url() . 'media/branch_pictures/' . $row->Org_Logo ?>" <?php } else { ?> data-src="holder.js/100%x147" <?php } ?>
                                         alt="holder"/>
                                </div>
                                <span class="button btn-system btn-file btn-block ph5">
                                    <span class="fileupload-new">Picture</span>
                                    <span class="fileupload-exists">Change</span>
                                    <input type="file" name="Logo">
                                    <?php echo form_error('Logo', '<div class="error">', '</div>'); ?>
                                </span>
                            </div>
                        </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Organization Name</label>
                            <div class="col-lg-8">
                                <input type="text" required="required" name="txt_organization_name" id="txt_organization_name" class="form-control" value="<?php echo isset($row->OrganizationName)?$row->OrganizationName:""; ?>" placeholder="Name">
                                <?php echo form_error('txt_organization_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-8">
                                <textarea id="textArea2" class="form-control" rows="2" name="txt_OrganizationAddress_1"><?php echo isset($row->OrganizationAddress_1)?$row->OrganizationAddress_1:""; ?></textarea>
                                <?php echo form_error('txt_category_description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Expense Memo Prefix</label>
                            <div class="col-lg-8">
                                <input type="text" required="required" name="txt_purchase_memo_prefix" id="txt_purchase_memo_prefix" class="form-control" value="<?php echo isset($row->MemoPrfix)?$row->MemoPrfix:""; ?>" placeholder="Memo">
                                <?php echo form_error('txt_purchase_memo_prefix'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Income Memo Prefix</label>
                            <div class="col-lg-8">
                                <input type="text" required="required" name="txt_cash_memo_prefix" id="txt_cash_memo_prefix" class="form-control" value="<?php echo isset($row->CashMemoPrefix)?$row->CashMemoPrefix:""; ?>" placeholder="Memo">
                                <?php echo form_error('txt_cash_memo_prefix'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Student Code Prefix</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_code_prefix" id="txt_code_prefix" class="form-control" value="<?php echo isset($row->StudentCodePrefix)?$row->StudentCodePrefix:""; ?>" placeholder="Student Code">
                                <?php echo form_error('txt_code_prefix'); ?>
                            </div>
                        </div>
                       
                        <div class="form-group text-center" style = "margin-right:10%">
                            <div style="float: right;" class="col-xs-4"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-4"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
