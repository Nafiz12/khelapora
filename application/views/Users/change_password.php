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
                    <span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo base_url('index.php/Users/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo  $this->session->userdata('user_id'); ?>">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Old Password</label>
                            <div class="col-lg-8">
                                <input type="password" name="old_password" id="old_password" class="form-control" required="required" value="" placeholder="Old Password">
                                <?php echo form_error('old_password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">New Password</label>
                            <div class="col-lg-8">
                                <input type="password" name="password" id="password" class="form-control" required="required" value="" placeholder="New Password">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Re-Type New Password</label>
                            <div class="col-lg-8">
                                <input type="password" name="passconf" id="passconf" class="form-control" required="required" value="" placeholder=" Re-type Passowrd">
                                <?php echo form_error('passconf'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="float: right;" class="col-xs-2"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-2"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->




<?php $this->load->view('Layouts/admin_footer'); ?>