<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $( "#datepicker" ).datepicker();

    });
</script>
<?php
$action = $this->uri->segment(2);
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
                    <form class="form-horizontal" action="<?php echo site_url('dormitories/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="DormitoryId" value="<?php echo isset($row->DormitoryId)?$row->DormitoryId:""?>">
                            <?php
                        }
                        ?>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Dormitory Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_name" id="txt_name" class="form-control" required="required" value="<?php echo isset($row->DormitoryName)?$row->DormitoryName:''; ?>" placeholder="Dormitory Name">
                                <?php echo form_error('txt_name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Number Of Rooms</label>
                            <div class="col-lg-5">
                                <input type="text" name="txt_number" id="txt_number" class="form-control" required="required" value="<?php echo isset($row->NoOfRooms)?$row->NoOfRooms:''; ?>" placeholder="No. Of Rooms">
                                <?php echo form_error('txt_number'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-5">
                                <textarea id="textArea2" required="required" class="form-control" rows="2" name="txt_description"><?php echo isset($row->Description)?$row->Description:""; ?></textarea>
                                <?php echo form_error('txt_description'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                </div>
                </form>
            </div>
        </div>