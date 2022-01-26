<title><?php echo $title;?></title>
<script>
    $(document).ready(function(){
        $( "#Date" ).datepicker();
        get_section_list();
        $("#cbo_class").change(function(){
            get_section_list();
        });
    });

    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        var selected_SectionId = "<?php echo isset($session_data['cbo_section'])?$session_data['cbo_section']:''?>";
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '---Select Section/Batch---' + '</option>');
                }
                else    {
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '---Select Section/Batch---' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        if(selected_SectionId==data.SectionId[i]){
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\" selected="selected">' + data.SectionName[i] + '</option>');
                        }else {
                            $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
</script>
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
$class_options = array('' => "---- Select Class ----");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}
$branch_options = array('' => "Select Branch");
foreach ($branch_list as $row1) {
    $branch_options[$row1['BranchId']] = $row1['BranchName'];
}
$location_data=$this->session->userdata('system.branch');
$section_options= array(''=>'--Select Section/Batch --');

?>
<div class="panel" id="spy7">
    <div class="panel-heading1">
        <?php echo form_open('subject_wise_marks/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>


        <div class="row" style="margin:0px;padding:0px;">
            <div class="col-md-2">
                 <?php
                    if(isset($location_data['IsHeadOffice']) && $location_data['IsHeadOffice'] == 1) {
                        echo form_dropdown('BranchId', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:""),'id="BranchId" class="form-control"');
                    }else {
                        echo form_dropdown('BranchId_1', $branch_options, set_value('BranchId', isset($session_data['BranchId'])?$session_data['BranchId']:$location_data['BranchId']),' disabled="disabled" id="BranchId" class="form-control"');
                        echo form_input(array('name' => 'BranchId', 'id' => 'BranchId', 'maxlength' => '4', 'type' => 'hidden'), set_value('BranchId', (isset($session_data['BranchId']) ? $session_data['BranchId'] : $location_data['BranchId'])));
                    }
                    ?>
            </div>
            <div class="col-md-2">
                <?php  echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', isset($session_data['cbo_class'])?$session_data['cbo_class']:""),'id="cbo_class" class="form-control"'); ?>
            </div>
            <div class="col-md-2">
                <input id="submit" class="filter_search_buttons form-control" type="submit" value="Search" name="submit">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <button class="btn active btn-alert btn-block" id="add_new_function" type="button">Add New &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
            </div>
        </div>
        
        <?php echo form_close();?>
    </div>
    <div class="panel-body pn">
        <div class="table table-responsive">
        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>SL</th>
                <th>Branch</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Total Marks</th>
                <th>Pass Marks</th>
                <th>Sub Marks</th>
                <th>Obj Marks</th>
                <th>Pra Marks</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach($list as $row){
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row->BranchName; ?></td>
                    <td><?php echo $row->ClassName; ?></td>
                    <td><?php echo $row->SubjectName; ?></td>
                    <td><?php echo $row->TotalMark; ?></td>
                    <td><?php echo $row->PassMark; ?></td>
                    <td><?php echo $row->SubMark; ?></td>
                    <td><?php echo $row->ObjMark; ?></td>
                    <td><?php echo $row->PraMark; ?></td>
                    <td class="button-column">
                        <?php


                        echo anchor('subject_wise_marks/edit/' . $row->SubMarkId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Edit')), array('title' => 'Edit', 'class' => 'view')).'&nbsp';

                        echo anchor('subject_wise_marks/delete/' . $row->SubMarkId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')"));

                        ?>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<div align="center" id="paging"><?php echo $this->pagination->create_links(); ?></div>