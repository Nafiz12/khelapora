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
          <form class="form-horizontal" action="<?php echo site_url('user_roles/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputStandard" class="col-lg-3 control-label">Role Name</label>
              <div class="col-lg-8">
                <input type="text" required="required" name="role_name" id="" class="form-control" value="<?php echo isset($row->role_name)?$row->role_name:''; ?>" placeholder="Name">
                <?php
                    if($action == 'edit') {
                        ?>
                        <input type="hidden" name="id" value="<?php echo isset($row->id)?$row->id:'';?>"/>
                    <?php
                    }
                ?>
                  <?php echo form_error('role_name'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="inputStandard" class="col-lg-3 control-label">Description</label>
              <div class="col-lg-8">
                <textarea id="textArea2" class="form-control" rows="2" name="role_description"><?php echo isset($row->role_description)?$row->role_description:""; ?></textarea>
                <?php echo form_error('txt_category_description'); ?>
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

