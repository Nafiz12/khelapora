<title><?php echo $title;?></title>
<style>
    #spy7 {
        margin-bottom: 0px;
    }
    #paging {
        background: #ccc url("<?php echo base_url(); ?>media/silk/ui-bg_highlight-soft_75_cccccc_1x100.png") repeat-x scroll 50% 50%;
        border: 1px solid #aaa;
        border-radius: 0 0 4px 4px;
        float: left;
        font-family: verdana;
        font-size: 12px;
        height: 47px;
        padding: 12px 20px 0 10px;
        text-align: left;
        width: 100%;
    }
    #paging strong {
        background: #ccc none repeat scroll 0 0;
        border: 1px solid #fff;
        border-radius: 0 6px;
        color: #4d4a4a;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        font-weight: bolder;
        padding: 2px 5px 5px;
        text-decoration: none;
    }

    #paging a {
        background: #fbfbfb none repeat scroll 0 0;
        border: 1px solid #b0b0b0;
        border-radius: 0 6px;
        color: #212121;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        padding: 2px 5px 5px;
        text-decoration: none;
    }
    #paging a:hover {
        background: #bbb none repeat scroll 0 0;
        border: 1px solid #dedede;
        color: #000;
    }
    .filter input {
        border: 1px solid #cecece;
        border-radius: 0 0 8px;
        font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        margin: 0 0 0 10px;
        padding: 1px 6px 1px 2px;
        width: 120px;
        height: 24px;
    }
    .filter select {
        border: 1px solid #cecece;
        border-radius: 0 0 8px;
        font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif;
        font-size: 11px;
        margin: 0 0 0 10px;
        padding: 1px 6px 1px 2px;
        width: 120px;
        height: 24px;
    }
</style>
<?php
$course_options = array('' => "- Select Course -");
foreach ($class_list as $row) {
    $course_options[$row->ClassId] = ($row->ClassName);
}

$fee_options = array('' => "- Select Fee Type -");
foreach ($type_list as $row) {
    $fee_options[$row->TypeId] = ($row->TypeName);
}
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$location_data=$this->session->userdata('system.branch');
$counter=$this->uri->segment(3);
if(!isset($counter) || $counter==''){
    $counter=0;
}
?>
<div class="panel" id="spy7">
    <div class="panel-heading1">
        <?php echo form_open('fee_configurations/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
        <table class="filter" style="width: 100%">
            <tr>
                <td width="10%">
                    
                </td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="60%"></td>
                <td width="10%"></td>
            </tr>
        </table>

        <div class="row" style="margin: 0px; padding:0px;">
            <div class="col-md-2">
                <?php
                    if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                        echo form_dropdown('BranchId', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:""),'id="BranchId" class ="form-control"');
                    }else {
                        echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId" class ="form-control"');
                        echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'class'=>'form-control','maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                    }
                    ?>
            </div>
            <div class="col-md-2">
                <?php  echo form_dropdown('CourseId', $course_options, set_value('CourseId', isset($session_data['CourseId'])?$session_data['CourseId']:""),'id="CourseId" class ="form-control"'); ?>
            </div>
            <div class="col-md-2">
                <?php  echo form_dropdown('cbo_type', $fee_options, set_value('cbo_type', isset($session_data['cbo_type'])?$session_data['cbo_type']:""),'id="cbo_type" class ="form-control"'); ?>
            </div>
            <div class="col-md-2">
                <input id="submit" class="filter_search_buttons form-control" type="submit" value="Search" name="submit">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <button class="btn active btn-alert btn-block" id="add_new_function" type="button">Add New &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
            </div>
        </div>
        <?php echo form_close();?>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                
                <th>Course</th>
                <th>Fee Type</th>
                <th>Amount</th>
                <th>Waiver Amount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $a=$counter+1;
            foreach($config_list as $r){
                ?>
                
                <tr>
                    <td><?php echo $a; ?></td>
                    
                    <td><?php echo $r->CourseName; ?></td>
                    <td><?php echo $r->TypeName; ?></td>
                    <td><?php echo $r->Amount; ?></td>
                    <td><?php echo $r->WaiverAmount; ?></td>
                    <td>
                        <?php
                        echo anchor('fee_configurations/edit/' . $r->FeeConfigId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('fee_configurations/delete/' . $r->FeeConfigId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')"));
                        ?>
                    </td>
                </tr>
                <?php
                $a++;
            }

            ?>
            </tbody>
        </table>
    </div>
</div>
<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>