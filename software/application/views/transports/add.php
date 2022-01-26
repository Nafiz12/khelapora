<title><?php echo $title;?></title>
<?php
//echo "<pre>";pirnt_r($row);die;
$action = $this->uri->segment(2);
$route_options = array('' => "---- Select Route ----");
foreach ($route_list as $row1) {
    $route_options[$row1['RouteId']] = ($row1['RouteName']);
}
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
                    <form class="form-horizontal" action="<?php echo site_url('transports/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>

                            <input type="hidden" name="TransportId" value="<?php echo isset($row->TransportId)?$row->TransportId:""?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-5">
                                <input type="text" name="TransportName" id="TransportName" class="form-control" required="required" value="<?php echo isset($row->TransportName)?$row->TransportName:''; ?>" placeholder="Transport Name">
                                <?php echo form_error('TransportName'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Transport Number</label>
                            <div class="col-lg-5">
                                <input type="text" name="TransportNumber" id="TransportNumber" class="form-control" value="<?php echo isset($row->TransportNumber)?$row->TransportNumber:''; ?>" placeholder="Transport Number">
                                <?php echo form_error('TransportNumber'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Route</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('RouteId', $route_options, set_value('RouteId', (isset($row->RouteId) ? $row->RouteId : "")), 'id="RouteId", class="custom_checkbox" '); ?>
                                <?php echo form_error('RouteId'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Transport Type</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('Type', $type_list, set_value('Type', (isset($row->Type) ? $row->Type : "")), 'id="Type", class="custom_checkbox" '); ?>
                                <?php echo form_error('Type'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Capacity</label>
                            <div class="col-lg-5">
                                <input type="text" name="Capacity" id="Capacity" class="form-control" value="<?php echo isset($row->Capacity)?$row->Capacity:''; ?>" placeholder="Capacity">
                                <?php echo form_error('Capacity'); ?>
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
