<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        get_section_list();
        $("#cbo_class").change(function(){
            get_section_list();
        });
        $("#addRow").click(function(){
            addRow('dataTable');
            $('select').change(function() {
                var ary = new Array();
                $('select option:selected').each(function() {
                    if ($(this).val().length > 0) {
                        ary.push($(this).val());
                    }
                });
                $('select option').each(function() {
                    if ($.inArray($(this).val(), ary) > -1) {
                        $(this).hide();
                    } else {
                        $(this).removeAttr('disabled');
                    }
                });
            });

        });
    });
    function addRow(tableID) {
        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var colCount = table.rows[0].cells.length;
        for(var i=0; i<colCount; i++) {

            var newcell	= row.insertCell(i);

            newcell.innerHTML = table.rows[1].cells[i].innerHTML;
            //alert(newcell.childNodes);
            switch(newcell.childNodes[0].type) {
                case "text":
                    newcell.childNodes[0].value = "";
                    break;
                case "checkbox":
                    newcell.childNodes[0].checked = false;
                    break;

            }
        }
    }
    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        }catch(e) {
            alert(e);
        }
    }
    function get_section_list(){
        var selected_class_id=$("#cbo_class").val();
        $.post("<?php echo site_url('config_sections/ajax_for_get_section_list_by_class') ?>", {class_id: selected_class_id},
            function(data){
                $('#status').html("");
                $('#cbo_section').empty();
                if( data.status == 'failure' ){
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{
                    $('#cbo_section').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.SectionId.length; i++){
                        $('#cbo_section').append('<option value = \"' + data.SectionId[i] + '\">' + data.SectionName[i] + '</option>');
                    }
                }
            }, "json");
    }
</script>
<style>
    .customized_input_box {
        display: block;
        width: 100%;
        height: 33px;
        padding: 9px 12px;
        font-size: 13px;
        line-height: 1.5;
        color: #555555;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #dddddd;
        border-radius: 0px;
        -webkit-transition: border-color ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s;
        transition: border-color ease-in-out .15s;
    }
</style>
<?php
$action = $this->uri->segment(2);
$class_options = array('' => "------ Select Class ------");
foreach ($class_list as $row1) {
    $class_options[$row1->ClassId] = ($row1->ClassName);
}

$section_options= array(''=>'------ Select Section ------');
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
                    <form class="form-horizontal" action="<?php echo site_url('batch_students/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Class</label>
                            <div class="col-lg-8">
                                <?php echo form_dropdown('cbo_class', $class_options, set_value('cbo_class', (isset($row->ClassId) ? $row->ClassId : "")), 'id="cbo_class", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_class'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Section</label>
                            <div class="col-lg-8">
                                <?php
                                //echo"<pre>";print_r($row->SectionId);die;
                                ?>
                                <?php echo form_dropdown('cbo_section', $section_options, set_value('cbo_section', (isset($row->SectionId)?         $row->SectionId : "")), 'id="cbo_section", class="custom_checkbox" '); ?>
                                <?php echo form_error('cbo_section'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table align="center" class="table table-bordered mbn" style="width: 95%" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th width="1%"><b>#</b></th>
                                        <th width="10%"><b>Name</b></th>
                                        <th width="10%"><b>Code</b></th>
                                        <th width="10%"><b>Roll</b></th>
                                        <th width="10%"><b>Father's Name</b></th>
                                        <th width="10%"><b>Mother's Name</b></th>
                                        <th width="10%"><b>Contact Number</b></th>
                                        <th width="10%"><b>Gender</b></th>
                                    </tr>
                                    <tbody>
                                    <tr id="table_row">

                                        <td><input type="checkbox" name="chk[]" style="width:auto;"/></td>
                                        <td>
                                            <input type="text" class="customized_input_box" name="StudentName[]" id="StudentName" value="" autocomplete="off"/>
                                        </td>
                                        <td>
                                            <input type="text" class="customized_input_box" name="StudentCode[]" id="StudentName" value="" autocomplete="off"/>
                                        </td>
                                        <td>
                                            <input type="text" class="customized_input_box" name="StudentRoll[]" id="StudentName" value="" autocomplete="off"/>
                                        </td>
                                        <td>
                                            <input type="text" class="customized_input_box" name="FathersName[]" id="StudentName" value="" autocomplete="off"/>
                                        </td>
                                        <td>
                                            <input type="text" class="customized_input_box" name="MothersName[]" id="StudentName" value="" autocomplete="off"/>
                                        </td>
                                        <td>
                                            <input type="text" class="customized_input_box" name="ContactNumber[]" id="StudentName" value="" autocomplete="off"/>
                                        </td>
                                        <td>
                                            <?php echo form_dropdown('cbo_gender[]',array('M'=>"Male",'F'=>"Female"),isset($row->Gender)?$row->Gender:'F','id="cbo_gender" required="required" class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2">
                                <button style="align: center" class="btn active btn-system btn-block" id="addRow" type="button">Add Row &nbsp; <span class="glyphicons glyphicons-circle_plus"></span></button>
                            </div>
                            <div class="col-lg-2">
                                <button style="align: center" class="btn active btn-danger btn-block" onClick="deleteRow('dataTable')" type="button">Delete Row &nbsp; <span class="glyphicons glyphicons-circle_minus"></span></button>
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