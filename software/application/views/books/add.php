<title><?php echo $title;?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //$('#book_information').hide();
        $( "#NumberOfBooks" ).change(function() {
            //get_details_list();
        });
    });
    function get_details_list(){
        $('#book_information').empty();
        var selected_number=parseFloat($("#NumberOfBooks").val());
        if(selected_number <= 0){
            alert('please give a number');
            return false;
        }else{
            tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 68%">'
            +'<tr>'
            +'<th colspan="2">Book Details Information</th>'
            +'</tr>'
            +'<tr>'
            +'<th width="15%">SL</th>'
            +'<th width="85%">Book Identification Number</th>'
            +'</tr>'
                var j=1
                for(var i = 1; i <= selected_number; i++)
                {
                    tansaction_info +='<tr>'
                    +'<td align="right">'+ i +'</td>'
                    +'<td>'+'<input type="text" name="IdentificationNumber[]" id="IdentificationNumber'+i+'" class="custom_checkbox" required="required" placeholder="Type Identification Number '+i+'" />'+'</td>'
                    +'</tr>'
                    j++
                }
            tansaction_info += '</table>'
            $('#book_information').empty();
            $('#book_information').append(tansaction_info);
            $('#book_information').show();
        }
    }
</script>
<?php
$action = $this->uri->segment(2);
$book_type_options = array('' => "---- Select Type ----");
foreach ($book_type_list as $row1) {
    $book_type_options[$row1['TypeId']] = ($row1['TypeName']);
}

$subject_options = array('' => "------ Select Subject ------");
foreach ($subject_list as $row1) {
   $subject_options[$row1->SubjectId] = ($row1->SubjectName);
}

$author_options = array('' => "---- Select Author ----");
foreach ($author_list as $row1) {
    $author_options[$row1['AuthorId']] = ($row1['AuthorName']);
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
                    <form class="form-horizontal" action="<?php echo site_url('books/'.$action); ?>" role="form" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-2">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Subject</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('SubjectId', $subject_options, set_value('SubjectId', (isset($row->SubjectId)?$row->SubjectId : "")), 'id="SubjectId", required="required" class="custom_checkbox " '); ?>
                                <?php echo form_error('SubjectId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Lecture On</label><br>
                            <?php
                                if($action == "edit"){
                            ?>
                                    <input type="hidden" name="BookId" value="<?php echo isset($row->BookId)?$row->BookId:''; ?>">
                            <?php
                                }
                            ?>

                            <div class="col-lg-12">
                                <input type="text" name="BookName" id="BookName" class="form-control" required="required" value="<?php echo isset($row->BookName)?$row->BookName:''; ?>" placeholder="Book Name">
                                <?php echo form_error('BookName'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left">Author</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('AuthorId', $author_options, set_value('AuthorId', (isset($row->AuthorId)?$row->AuthorId : "")), 'id="AuthorId", required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('AuthorId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                            <label for="inputStandard" class="col-lg-12 control-label text-left"> Type</label><br>
                            <div class="col-lg-12">
                                <?php echo form_dropdown('TypeId', $book_type_options, set_value('TypeId', (isset($row->TypeId)?$row->TypeId : "")), 'id="TypeId", required="required" class="custom_checkbox" '); ?>
                                <?php echo form_error('TypeId'); ?>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-2">
                                 <div class="form-group" style="margin-top:20%;">
                            <div style="float: right;" class="col-xs-6"><button class="btn btn-hover btn-danger btn-block" type="button" onclick="javascript:history.go(-1)">Cancel</button></div>
                            <div style="float: right;" class="col-xs-6"><input type="submit" class="btn btn-hover btn-alert btn-block" value="Save" ></div>
                        </div>
                            </div>
                            
                        </div>

                       
                        <div class="form-group">
                            <div class="table-responsive" id="book_information">
                                <?php
                                if(!empty($book_details) && $action='edit'){
                                    ?>
                                    <table align="center" class="table table-bordered mbn" style="width: 68%">
                                        <tr>
                                            <th width="15%">SL</th>
                                            <th width="85%">Identification Number</th>
                                        </tr>
                                        <?php
                                        $i=0;
                                        foreach($book_details as $row1){
                                            ?>
                                            <tr>
                                                <td align="right"> <?php echo $i; ?></td>
                                                <td><input type="text" name="IdentificationNumber[]" class="form-control" value="<?php echo $row1['IdentificationNumber']; ?>"/></td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                        ?>
                                    </table>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                       
                </div>
                </form>
            </div>
        </div>