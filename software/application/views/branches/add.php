<title><?php echo $title;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-ui.js"></script>
<script type="text/javascript"> $(window).load(function() { $('#txt_date_of_open').glDatePicker({ dateFormat: 'yy-mm-dd' }); }); </script>
<?php
$action = $this->uri->segment(2);
if($action == 'edit'){
    // $MediumArray = array();
    // $ShiftArray = array();
    // $Shift = explode(',',$row->Shift);
    // $Medium = explode(',',$row->Medium);
    // foreach ($Medium as $item){
    //     $MediumArray[] = $item;
    // }
    // foreach ($Shift as $item){
    //     $ShiftArray[] = $item;
    // }
    //echo '<pre>'; print_r($Medium); die;
}
$yes_no_option = array(1=>"Yes",0=>"No");
$session_data=$this->session->userdata('system.user');
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
                    <form class="form-horizontal" action="<?php echo site_url('branches/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <?php
                        if ($action == "edit") {
                            ?>
                            <input type="hidden" name="txt_branch_id" value="<?php echo isset($row->BranchId)?$row->BranchId:""?>">
                            <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Logo</label>
                            <div class=" col-md-12 fileupload fileupload-new admin-form" data-provides="fileupload">
                                <div class="fileupload-preview thumbnail mb15">
                                    <img height="200" width="200" <?php if (isset($row->Logo)) { ?> src="<?php echo base_url() . 'media/branch_pictures/' . $row->Logo ?>" <?php } else { ?> data-src="holder.js/100%x147" <?php } ?>
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
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Branch Name</label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="txt_branch_name" id="" class="form-control" value="<?php echo isset($row->BranchName)?$row->BranchName:""; ?>" placeholder="Name">
                                <?php echo form_error('txt_branch_name'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Branch Code</label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="txt_branch_code" id="" readonly="readonly" class="form-control" value="<?php echo isset($row->BranchCode)?$row->BranchCode:$branch_code; ?>" placeholder="Code">
                                <?php echo form_error('txt_branch_code'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Contact Number</label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="txt_contact_number" id="txt_contact_number" class="form-control" value="<?php echo isset($row->ContactNumber)?$row->ContactNumber:""; ?>" placeholder="Phone Number">
                                <?php echo form_error('txt_contact_number'); ?>
                            </div>
                        </div>
                            </div>

                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Is Head Office</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('cbo_is_head_office', $yes_no_option, set_value('cbo_is_head_office', (isset($row->IsHeadOffice) ? $row->IsHeadOffice : "")), 'id="cbo_is_head_office" class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_is_head_office'); ?>
                            </div>
                        </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Address</label><br>
                            <div class="col-lg-12">
                                <textarea id="textArea2" class="form-control" rows="2" name="BranchAddress"><?php echo isset($row->BranchAddress)?$row->BranchAddress:""; ?></textarea>
                                <?php echo form_error('BranchAddress'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Mobile Number</label><br>
                            <div class="col-lg-12">
                                <input type="text" required="required" name="txt_mobile_number" id="txt_mobile_number" class="form-control" value="<?php echo isset($row->Mobile)?$row->Mobile:""; ?>" placeholder="Mobile Number">
                                <?php echo form_error('txt_mobile_number'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Land Phone</label><br>
                            <div class="col-lg-12">
                                <input type="text"  name="txt_land_pohone" id="txt_land_pohone" class="form-control" value="<?php echo isset($row->LandPhone)?$row->LandPhone:""; ?>" placeholder="Land Phone">
                                <?php echo form_error('txt_land_pohone'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Fax</label><br>
                            <div class="col-lg-12">
                                <input type="text" name="txt_fax" id="txt_fax" class="form-control" value="<?php echo isset($row->Fax)?$row->Fax:""; ?>" placeholder="Fax">
                                <?php echo form_error('txt_fax'); ?>
                            </div>
                        </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left  control-label">Email</label><br>
                            <div class="col-lg-12">
                                <input type="text" name="txt_email" required="required" id="txt_email" class="form-control" value="<?php echo isset($row->Email)?$row->Email:""; ?>" placeholder="Email">
                                <?php echo form_error('txt_email'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12  text-left control-label">Branch Opening Date</label><br>
                            <div class="tab-content pn br-n admin-form">
                                <div class="col-xs-12">
                                    <label for="filter-datepicker" class="field prepend-picker-icon">
                                        <?php echo form_input(array('name' => 'txt_date_of_open','id' => 'txt_date_of_open','type'=>'text','maxlength'=>'100','required'=>'required','placeholder'=>'Branch Opening Date','class'=>'event-name gui-input br-light light'),set_value('txt_date_of_open',isset($row->BranchOpeningDate)?$row->BranchOpeningDate:""));?><button type="button" class="ui-datepicker-trigger"><i class="fa fa-calendar-o"></i></button>
                                        <?php echo form_error('txt_date_of_open'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                            </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 text-left control-label">Current Academic Year <span style="color: red" >*</span></label>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('Year', $academic_year_list, set_value('Year', (isset($row->Year) ? $row->Year : '')), 'id="Year", class="custom_checkbox" '); ?>
                                <?php echo form_error('Year'); ?>
                            </div>
                        </div>
                            </div>
                            
                           
                           
                            </div>
                        </div>

                        <div class="row">
                           
                             <div class="form-group text-center" style="marign-right:10%; margin-top:20px;">
                            <div style="float: right;" class="col-xs-3"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-3"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                            
                        </div>
                        
                        
               
                        
                        
                       

                    </form>
               
            </div>
        </div>
    </div>
</div>
