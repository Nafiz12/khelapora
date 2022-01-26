<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">

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
                    <form class="form-horizontal" action="<?php echo site_url('fee_categories/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="CategoryId" value="<?php echo isset($row->CategoryId)?$row->CategoryId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Fee Category Name<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="CategoryName" id="" class="form-control" value="<?php echo isset($row->CategoryName)?$row->CategoryName:""; ?>" placeholder="Category Name">
                                <?php echo form_error('CategoryName'); ?>
                            </div>
                        </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Ledger Code<span style="color: red;">*</span></label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="LedgerCode" id="" class="form-control" value="<?php echo isset($row->LedgerCode)?$row->LedgerCode:""; ?>" placeholder="Ledger Code">
                                <?php echo form_error('LedgerCode'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3 ">
                                <input type="submit" class="btn btn-hover btn-alert btn-block" style="width: 40%;margin-top: 10.5%; float:right;" value="Save" >
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-hover btn-danger btn-block"  style="width: 40%;margin-top: 10.5%;" type="button" onclick="javascript:history.go(-1)">Cancel</button>
                            </div>
                            
                        </div>
                        

                        
                      
                </div>
                </form>
            </div>
        </div>
