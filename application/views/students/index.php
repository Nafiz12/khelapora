<?php $this->load->view('Layouts/admin_header'); ?>
<title><?php echo $title;?></title>
<script>
    $(document).ready(function(){
        $( "#datepicker" ).datepicker();
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
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '---Select Section---' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '---Select Section---' + '</option>');
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

$section_options= array(''=>'--Select Section --');

?>
<div class="panel" id="spy7">
    <div class="panel-heading1">
        <?php echo form_open('index.php/students/index',array('id'=>'search_form','name'=>'search_form','method'=>"GET")); ?>
        <table class="filter" style="width: 100%">
            <tr>
                <td width="10%"><?php  echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', isset($session_data['cbo_class'])?$session_data['cbo_class']:""),'id="cbo_class"'); ?></td>
                <td width="10%"><?php  echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', isset($session_data['cbo_section'])?$session_data['cbo_section']:""),'id="cbo_section"'); ?></td>
                <td width="60%"><input id="submit" class="filter_search_buttons" type="submit" value="Search" name="submit"></td>
                <div id = "#example1_filter" class="alert alert-primary text-right"><a href="<?php echo base_url();?>index.php/Students/add" class="btn btn-primary" style = "text-decoration: none;">Add New Admin</a> </div>
            </tr>
        </table>
        <?php echo form_close();?>
    </div>
    <div class="panel-body pn">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Student Code</th>
                <th>Class</th>
                <th>Section</th>
                <th>Roll</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $a=1;
            foreach($list as $r){ ?>
                <tr>
                    <td><?php echo $a; ?></td>
                    <td><?php echo $r->StudentName; ?></td>
                    <td><?php echo $r->StudentCode; ?></td>
                    <td><?php echo $r->ClassName; ?></td>
                    <td><?php echo $r->SectionName; ?></td>
                    <td><?php echo $r->RollNo; ?></td>
                    <td><?php echo $r->ContactNumber; ?></td>
                    <td>
                        <?php
                        echo anchor('index.php/students/edit/' . $r->StudentId, img(array('src' => base_url() . 'media/assets/img/icons/edit1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'edit', 'class' => 'edit')).'&nbsp';
                        echo anchor('index.php/students/delete/' . $r->StudentId, img(array('src' => base_url() . 'media/assets/img/icons/delete1.gif', 'border' => '0', 'alt' => 'Payment')), array('title' => 'Delete', 'class' => 'delete','onclick'=>"return confirm('Are You Sure To Delete This Type Information')"));
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
<?php $this->load->view('Layouts/admin_header'); ?>