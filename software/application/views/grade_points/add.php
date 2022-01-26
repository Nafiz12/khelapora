<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

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
                    <form class="form-horizontal" action="<?php echo site_url('grade_points/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="GradeId" value="<?php echo isset($row->GradeId)?$row->GradeId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label"> Grade Name</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_name" id="txt_name" class="form-control" required="required" value="<?php echo isset($row->GradeName)?$row->GradeName:''; ?>" placeholder="Grade Name">
                                <?php echo form_error('txt_name'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Grade point</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_point" id="txt_point" class="form-control" required="required" value="<?php echo isset($row->GradePoint)?$row->GradePoint:''; ?>" placeholder="Grade point">
                                <?php echo form_error('txt_point'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Desription</label>
                            <div class="col-lg-8">
                                <textarea id="textArea2" required="required" class="form-control" rows="2" name="txt_description"><?php echo isset($row->GradeDescription)?$row->GradeDescription:""; ?></textarea>
                                <?php echo form_error('txt_description'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Mark From</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_mark_from" id="txt_mark_from" class="form-control" required="required" value="<?php echo isset($row->MarkFrom)?$row->MarkFrom:''; ?>" placeholder="">
                                <?php echo form_error('txt_mark_from'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Mark To</label>
                            <div class="col-lg-8">
                                <input type="text" name="txt_mark_to" id="txt_mark_to" class="form-control" required="required" value="<?php echo isset($row->MarkTo)?$row->MarkTo:''; ?>" placeholder="">
                                <?php echo form_error('txt_mark_to'); ?>
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