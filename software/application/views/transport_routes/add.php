<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
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
                    <span class="glyphicon glyphicon-tasks"></span><span class="panel-title"><?php echo $title;?></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo site_url('transport_routes/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="RouteId" value="<?php echo isset($row->RouteId)?$row->RouteId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Route Name</label>
                            <div class="col-lg-8">
                                <input type="text" required="required" name="RouteName" id="" class="form-control" value="<?php echo isset($row->RouteName)?$row->RouteName:""; ?>" placeholder="Route Name">
                                <?php echo form_error('RouteName'); ?>
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
