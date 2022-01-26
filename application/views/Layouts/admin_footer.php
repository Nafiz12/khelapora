<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="#">4sventure</a>.</strong> All rights
    reserved.
</footer>


<!-- jQuery 3 -->
<script src="<?php echo base_url();?>lib/bower_components/jquery/dist/jquery.min.js"></script>

<script>
    $("document").ready(function(e) {
        var html =
            '<div class="row" id = "con" style = "margin-right:0px;">'+
            '<div class="col-sm-4 text-center" style = "padding-top:3%;">'+
            '<div class="kv-avatar">'+
            '<img class="blah" src="<?php echo base_url();?>lib/images/admin_default.png" alt="your image"  width = "100px" height = "100px" style = "margin-left: -70%; border:1px solid black;"/>'+
            ' <input type="file" name = "upload[]"  class="imgInp"/>'+

            '</div>'+
            '</div>'+

            '<div class="col-sm-8">'+
            '<div class="row">'+
            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Form No</label>'+
            '<input type = "text" class = "form-control" name ="form_no[]" id ="form_no" placeholder = "Enter form no" />'+
            '</div>'+
            '</div>'+

            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Class</label>'+

           ' <select name = "class[]" class = "form-control">'+
            '<option value="1">One</option>'+
            '<option value="2">Two</option>'+
            '<option value="3">Three</option>'+
            '<option value="4">Four</option>'+
            '<option value="5">Five</option>'+
            '<option value="6">Six</option>'+
            '<option value="7">Seven</option>'+
            '<option value="8">Eight</option>'+
            '<option value="9">Nine</option>'+
            '<option value="10">Ten</option>'+
            '</select> '+


            '</div>'+
            '</div>'+
            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Section</label>'+
            ' <select name = "section[]" class = "form-control">'+
            '<option value="A">A</option>'+
            '<option value="B">B</option>'+
            '<option value="C">C</option>'+
            '</select> '+

            '</div>'+
            '</div>'+

            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Roll No</label>'+
            '<input type = "text" class = "form-control" name ="roll_no[]" id ="roll_no" placeholder = "Enter roll no" />'+
            '</div>'+
            '</div>'+

            '</div>'+

            '<div class="row">'+
            ' <div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">student_name</label>'+
            '<input type = "text" class = "form-control" name ="student_name[]" id ="student_name" placeholder = "Enter student name" />'+
            '</div>'+
            '</div>'+

            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Contact No</label>'+
            '<input type = "text" class = "form-control" name ="contact_no[]" id ="contact_no"  placeholder = "Enter contact no" />'+
            '</div>'+
            '</div>'+
            ' <div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">Father Name</label>'+
            '<input type = "text" class = "form-control" name ="father_name[]" id ="father_name" placeholder = "Enter father name" />'+
            '</div>'+
            '</div>'+
            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Mother Name</label>'+
            '<input type = "text" class = "form-control" name ="mother_name[]" id ="mother_name" placeholder = "Enter mother name" />'+
            '</div>'+
            '</div>'+


            '</div>'+

            '<div class="row">'+
            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Date of Birth</label>'+
            '<input type = "text" class = "datepicker form-control" name ="dob[]" id ="" placeholder = "Enter dob" />'+
            '</div>'+
            '</div>'+

            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Address</label>'+
            '<input type = "text" class = "form-control" name ="address[]" id ="address" placeholder = "Enter address" />'+
            '</div>'+
            '</div>'+
            ' <div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">Father Occupation</label>'+
            '<input type = "text" class = "form-control" name ="father_occupation[]" id ="father_occupation"  placeholder = "Enter father_occupation"/>'+
            '</div>'+
            '</div>'+
            '<div class="col-sm-3">'+
            '<div class="form-group">'+
            '<label for="exampleInputPassword1">Mother Occupation</label>'+
            '<input type = "text" class = "form-control" name ="mother_occupation[]" id ="mother_occupation" placeholder = "Enter mother_occupation"/>'+
            '</div>'+
            '</div>'+


            '</div>'+
            '</div>'+

            ' <a  class = "btn btn-danger" style="margin-left: 7%;margin-top: -9%;" href = "#" id = "remove">Delete</a>';


        $("#add_button").click(function (e) {
            $("#con").append(html);

        });

        $("#con").on('click','#remove',function(e){
            $(this).parent('div').remove();

        });


    });
</script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>lib/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>lib/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>lib/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>lib/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>lib/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>lib/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>lib/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url();?>lib/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>lib/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>lib/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>lib/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>lib/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>lib/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>lib/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>lib/bower_components/fastclick/lib/fastclick.js"></script>
<!-- ck editor -->
<script src="<?php echo base_url();?>lib/bower_components/ckeditor/ckeditor.js"></script>
<!-- timepicker -->
<script src ="<?php echo base_url(); ?>lib/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>


<!-- AdminLTE App -->
<script src="<?php echo base_url();?>lib/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>lib/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>lib/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>lib/js/test.js"></script>


<script src="<?php echo base_url();?>lib/js/krajee/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="<?php echo base_url();?>lib/js/krajee/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="<?php echo base_url();?>lib/js/krajee/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
   3.3.x versions without popper.min.js. -->
<script src="<?php echo base_url();?>lib/js/krajee/popper.min.js"></script>


<script src="<?php echo base_url();?>lib/js/krajee/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="<?php echo base_url();?>lib/js/krajee/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/(lang).js"></script>-->




<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('spech');
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
    $(function() {
        //$( 'input[name^="dob[]"]' ).datepicker({ dateFormat: "yy-mm-dd" });
    });

//    $(".datepicker").each(function() {
//        if($(this).attr("name") == "dob[]") {
//            $(this).datepicker();
//        }
//    });

    //Date picker
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,//this option for allowing user to select month
                changeYear: true, //this option for allowing user to select from year range
                dateFormat: 'yy-mm-dd'
            })

    $('#datepicker1').datepicker({
        autoclose: true,
        changeMonth: true,//this option for allowing user to select month
        changeYear: true, //this option for allowing user to select from year range
        dateFormat: 'yy-mm-dd'
    })
    $('#PaymentDate1').datepicker({
        autoclose: true,
        changeMonth: true,//this option for allowing user to select month
        changeYear: true, //this option for allowing user to select from year range
        dateFormat: 'yy-mm-dd'
    })
    $('#PaymentDate2').datepicker({
        autoclose: true,
        changeMonth: true,//this option for allowing user to select month
        changeYear: true, //this option for allowing user to select from year range
        dateFormat: 'yy-mm-dd'
    })
</script>

<script>


    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })

    // initialize with defaults
    $("#input-id").fileinput();
    // with plugin options
    $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
</script>
<script>
    //    var id = '<?php //$this->uri->segment(3);?>//',
    //        alert(id);
    //    var path = "<?//= site_url("index.php/Notice_boards/".$this->uri->segment(2)."/".$this->uri->segment(3).""); ?>//";
    //        alert(path);

    jQuery("#image").fileinput({
        showUpload:true,
        uploadUrl: "<?= site_url("index.php/Notice_boards/".$this->uri->segment(2)."/".$this->uri->segment(3).""); ?>",
        uploadAsync: true,
        //maxFileCount: 1,
//        deleteUrl:'<?php //echo base_url();?>//lib/images/<?php //echo $row->description;?>//',
        showBrowse: false,
        browseOnZoneClick: true,
        showRemove: true,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'pdf','text'],
        maxFileSize: 100000,
        /*minImageWidth: 50,
         minImageHeight: 50,
         maxImageWidth: 250,
         maxImageHeight: 250,*/
        initialPreviewAsData: true,
        overwriteInitial: true,

        <?php
        if ( isset($row->description) && !empty($row->description)) {
            echo "initialPreview: [
                                            '" . base_url("lib/images/") . $row->description . "'
                                          ],\n";
            echo "initialPreviewConfig: [
                                                    {type: 'pdf',  showDelete: false, showUpload: false},
                                                ],\n";
        }

        ?>
        uploadExtraData: function () {
            return {

                field: "image",
                title: jQuery("#title").val(),
                allowed_type: "jpg|png|gif|pdf"
            }
        }
    }).on('fileuploaded', function(event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
//        alert (extra.field + " " +  response.uploaded);
        window.location = "<?= base_url('index.php/Notice_boards'); ?>";
    });


</script>


<script>
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>';
    $("#avatar-1").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500000000,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseOnZoneClick: true,
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<?php  if(isset($row->image)){?> <img class = "img-responsive " src = "<?php echo base_url();?><?php echo $row->image;?>" > <?php } else{ ?><img class = "img-responsive" src="<?php echo base_url();?>lib/images/NoImageSelected.png" alt="Your Avatar"> <?php }?>',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg","jpeg","bmp", "png","PNG", "gif","pdf","mp4","MP4"]
    });
</script>


<script>
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>';
    $("#avatar-3").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500000000,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseOnZoneClick: true,
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<?php  if(isset($row->LectureVideo)){?> <img class = "img-responsive " src = "<?php echo base_url();?><?php echo $row->LectureVideo;?>" > <?php } else{ ?><img class = "img-responsive" src="<?php echo base_url();?>lib/images/NoImageSelected.png" alt="Your Avatar"> <?php }?>',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg","jpeg","bmp", "png","PNG", "gif","pdf","mp4","MP4"]
    });
</script>


<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
//        var sham = '<?php //echo base_url();?>//index.php/Dashboards/data';
//        alert(sham);


        $.ajax({
            url:'<?php echo base_url();?>index.php/Dashboards/data',
            dataType : " JSON ",
            success:function (result) {
                google.charts.load('current',{
                   'packages':['corechart']
                });

                google.charts.setOnLoadCallback(function(){
                   drawChart(result);
                });
            }
        });

        function drawChart(result){
            var data = new google.visualization.DataTable();
            data.addColumn('string','class_name');
            data.addColumn('number','total_student');
            var dataArray = [];
            $.each(result,function (i,obj) {
                dataArray.push([obj.class_name,parseInt(obj.total_student)]);

            });

            data.addRows(dataArray);
            var piechart_options = {
                title : 'pie chart: Class Wise Total Student',
                width:400,
                height:300
            };

            var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
            piechart.draw(data,piechart_options);

            var barchart_options = {
                title : 'Bar chart: Class Wise Total Student',
                width:400,
                height:300,
                legend:'none'

            };

            var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));

            barchart.draw(data,barchart_options);


        }

    });

</script>


<script>

    $("#feature_image").fileinput({
        uploadUrl: "<?= site_url("index.php/Feature_slideshows/".$this->uri->segment(2)."/".$this->uri->segment(3).""); ?>",
        uploadAsync: true,
        minFileCount: 1,
        maxFileCount: 4,
        showBrowse:false,
        overwriteInitial: false,
        browseOnZoneClick: true,
        initialPreviewAsData: true,
        <?php
        if ( isset($row->name) && !empty($row->name)) {
            echo "initialPreview: [
                                            '" . base_url("lib/images/") . $row->name . "'
                                          ],\n";
            echo "initialPreviewConfig: [
                                                    { type: 'pdf', showDelete: true, showUpload: false},
                                                ],\n";
        }

        ?>

        uploadExtraData: function () {
            return {


                title: jQuery("#title").val(),
                for_slideshow: jQuery("#for_slideshow").val(),
                group_id: jQuery("#group_id").val(),
                allowed_type: "jpg|png|gif|jpeg|PNG|JPEG|JPG"
            }
        }
    }).on('fileuploaded', function(event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
        // alert (  response.uploaded);
        window.location = "<?= base_url('index.php/Feature_slideshows'); ?>";
    });

</script>

<script>
    $( document ).ready(function() {

        var action = '<?= $this->uri->segment(2);?>';
//        alert(action);
        if(action == 'edit') {
//            alert(action);
            $(".file-caption-icon, .file-input-ajax-new .fileinput-remove-button, .file-input-ajax-new .fileinput-upload-button, .file-input-ajax-new .no-browse .input-group-btn, .file-input-new .close, .file-input-new .file-preview, .file-input-new .fileinput-remove-button, .file-input-new .fileinput-upload-button, .file-input-new .glyphicon-file, .file-input-new .no-browse .input-group-btn, .file-zoom-dialog .modal-header:after, .file-zoom-dialog .modal-header:before, .hide-content .kv-file-content, .kv-hidden").show();

        }

    });


</script>

<script>
    $( document ).ready(function() {

        var action = '<?= $this->uri->segment(2);?>';
        var controller = '<?= $this->uri->segment(1);?>';
//        alert(action);
        if(controller == 'Notice_boards' && action == 'edit' ) {
            $(".fileinput-upload-button").click(function(){
                alert(" you are on the way . click ok to complete");
                window.location = "<?= base_url('index.php/Notice_boards'); ?>";
            });
//            alert(action);

        }
    });


</script>

<script>
    $( document ).ready(function() {

        var controller = '<?php echo  $this->uri->segment(1);?>';
        var method = '<?php echo  $this->uri->segment(2);?>';
        if(controller == 'Feature_slideshows' && ( method == 'add' || method == 'edit' ) {
            $(".fileinput-upload-button").click(function(){

                alert(" you are on the way . click ok to complete");
                window.location = "<?= base_url('index.php/Feature_slideshows'); ?>";
            });
//            alert(action);

        }
    });


</script>


<script>

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(input).prev().attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("body").on("change", '.imgInp', function() {
        readURL(this);
    });

    function datepicker(input){
        $( 'input[name^="dob[]"]' ).datepicker({ dateFormat: "yy-mm-dd",autoclose: true });

    }
    $("body").on("mouseenter", '.datepicker', function() {
        datepicker(this);
    });

</script>


<script>
    $(document).ready(function(){
        var controller = '<?php echo  $this->uri->segment(1);?>';
        var method = '<?php echo  $this->uri->segment(2);?>';
        if(controller == 'Manage_marks' &&  (method == 'edit' || method == 'add'  )) {
            get_section_list_for_marks();
        }
        else if(controller == 'Class_routines' &&  (method == 'edit' || method == 'add'  )) {
            get_section_list_for_class_routine();
            
          
       
        }
        else if(controller == 'Student_attendances' &&  (method == 'edit' || method == 'add'  )) {
            get_section_list_for_attendance();
            
           
        }
        else{
            get_section_list();
        }




//            $( "#datepicker" ).datepicker();
        $("#ClassId").change(function(){
            get_section_list();
        });
        $("#class_to").change(function(){
            get_section_list_to();
        });
        
         
        $("#SectionId").change(function(){
            if(controller == 'Student_attendances' &&  (method == 'edit' || method == 'add'  )) {
          get_student_list();
         }
         else {
                get_student_list();
            get_roll_list();
     }
           
        });


        $("#SectionId").change(function(){
            if(controller == 'Report_mark_sheets' &&  (method == 'edit' || method == 'add'  )) {
                get_student_list_for_marksheet_report();
            }


        });

        $("#SubjectId").change(function(){
            if(controller == 'Manage_marks' &&  (method == 'edit' || method == 'add'  )) {
                subject_info();
                get_student_list_for_marks();
            }


        });
        $("#ClassIddd").change(function(){
                    if(controller == 'Manage_marks' &&  (method == 'edit' || method == 'add'  )) {
                        get_section_list_for_manage_marks();
                    }


                });

        
         $("#year").change(function(){
           
          get_student_list_for_migration();
        
          
        });

         $("#class").change(function(){

          get_student_list_for_payment();
          get_catagory_list_for_payment();


        });

         $("#student").change(function(){

             get_payment_list_for();
             get_admission_last_paid_due_info();


        });




        $("#holiday_id").change(function(){
           get_date_info();
        });
    
         
    });

    function get_date_info(){
        var selected_holiday_id=$("#holiday_id").val();

        $.post("<?php echo base_url('index.php/Create_notices/ajax_for_get_holiday_list') ?>", {holiday:selected_holiday_id},
            function(data){

                $('#status').html("");
                $('#date_from').empty();
                $('#date_to').empty();
                var selected_SectionId = "<?php echo isset($row->section)?$row->section:''?>";
                if( data.status == 'failure' ){

                    //$('#admission').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    //$('#admission').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.date_from.length; i++){
                        if(selected_SectionId==data.date_from[i]){
//                           // $('#admission').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.admission_date[i] + '</option>');
                        }else {
                            $('#date_from').append('<option value = \"' + data.date_from[i] + '\">' + data.date_from[i] + '</option>');
                            $('#date_to').append('<option value = \"' + data.date_to[i] + '\">' + data.date_to[i] + '</option>');

                        }
                    }
                }
            }, "json");
    }


    function subject_info(){
        // alert (count);

        $('#mark_informationn').empty();
        var selected_class_id=$("#ClassIdd").val();
        var selected_sub_id=$("#SubjectId").val();
        // var selected_student_id=$("#student").val();

        //var SectionId=$("#SectionId").val();
        //var selected_year=$("#year").val();
        if(selected_class_id != '' ){
            $.post("<?php echo base_url('index.php/Manage_marks/ajax_for_get_student_list_by_class_and_subject') ?>", {class: selected_class_id,sub:selected_sub_id},
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        // $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{
                        tansaction_infos = '<table align="center" class="table table-bordered mbn" style="width: 90%">'
                            +'<tr align="center">'
                            +'<th colspan="3" align="right">Student Payment Information</th>'
                            +'</tr>'
                            +'<tr>'
                            +'<th>Particulars</th>'
                            +'<th>Payable Amount</th>'
                            +'<th>Amount</th>'
                            +'</tr>'


                        if(data.id){
                            var j=1


                            for(var i = 0; i < data.id.length; i++)
                            {
                                tansaction_infos +='<tr>'
                                    +'<td>'+ data.subject_name[i] +'</td>'
                                    +'<td><input type="hidden" name="payable_amount[]" value="'+data.sub_marks[i]+'"/>'+ data.sub_marks[i] +'</td>'

                                    +'<td>'+'<input type="checkbox" class="amount " id = "amount" style="width: 38%;" checked="checked" name="amount[]" value="'+data.amount[i]+'">'+'</td>'

                                    +'</tr>'
                                j++




                            }


                        }
                        else{
                            tansaction_infos +='<tr>'
                                +'<td colspan="3">'+ "There is no Student in this class !" +'</td>'
                                +'</tr>'
                        }

                        tansaction_infos += '</table>'
                        $('#mark_informationn').empty();
                        $('#mark_informationn').append(tansaction_infos);
                    }
                }, "json");
        }else{
            $('#mark_informationn').empty();
        }
    }








    function get_student_list_for_marks(){
        $('#mark_information').empty();
        var selected_class_id=$("#ClassIddd").val();
        var selected_section_id=$("#SectionIddd").val();
        var year=$("#Year").val();
        var examId=$("#ExamId").val();
        var subjectId=$("#SubjectId").val();

        $.post("<?php echo base_url('index.php/Manage_marks/ajax_for_check_duplicate_entry') ?>", {class_id: selected_class_id, section_id: selected_section_id, year:year,examId:examId,subjectId:subjectId},
            function(data){
                $('#status').html("");
                $('#cbo_student').empty();
                if( data.status == 'failure' ){
                }
                else{
                    if(data.mark == 0){
                        if(selected_class_id != '' && selected_section_id!=''){
                            $.post("<?php echo base_url('index.php/Student_admissions/ajax_for_get_student_list_by_class_and_section') ?>", {class_id: selected_class_id, section_id: selected_section_id,sub:subjectId},
                                function(data){
                                    $('#status').html("");
                                    $('#cbo_student').empty();
                                    if( data.status == 'failure' ){
                                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                                    }
                                    else{

                                        tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 90%">'
                                        if(data.total_marks) {

                                            tansaction_info += '<tr>'
                                                +'<th width="10%">Subject</th>'
                                                +'<th width="15%">Total Marks</th>'
                                                +'<th width="15%">Sub Pass Mark</th>'
                                                +'<th width="15%">Obj Pass Mark</th>'
                                                +'<th width="15%">Pra Pass Mark</th>'
                                                +'<th width="15%">Pass Percentage</th>'

                                                +'</tr>'

                                            tansaction_info += '<tr>'
                                                + '<td align="left" id = "subject_name">' + data.subject_name + '</td>'
                                                + '<td align="left">' + data.total_marks + '</td>'
                                                + '<td align="left">' + data.sub_mark +'  '+ 'total marks'+' '+'('+data.sub_total_mark+')'+'</td>'
                                                + '<td align="left">' + data.obj_mark +'  '+ 'total marks'+' '+'('+data.obj_total_mark+')'+ '</td>'
                                                + '<td align="left">' + data.pra_mark +'  '+ 'total marks'+' '+'('+data.pra_total_mark+')'+ '</td>'
                                                + '<td align="left">' + data.pass_mark +'%'+'</td>'

                                                + '</tr>'
                                        }

                                        tansaction_info += '</table>'
                                        tansaction_info += '<table align="center" class="table table-bordered mbn" style="width: 90%">'

                                            +'<tr>'
                                            +'<th width="5%">Student Roll</th>'
                                            +'<th width="1%">Student Name</th>'
                                            +'<th width="10%">Subjective</th>'
                                            +'<th width="10%">Grade</th>'
                                            +'<th width="10%">Objective</th>'
                                            +'<th width="10%">Grade</th>'
                                            +'<th width="10%">Practical</th>'
                                            +'<th width="10%">Grade</th>'
                                            +'<th width="10%">Total</th>'
                                            +'<th width="10%">Point</th>'
                                            +'<th width="10%">Grade</th>'

                                            +'</tr>'
                                        if(data.StudentId){
                                            var j=1

                                            for(var i = 0; i < data.StudentId.length; i++)
                                            {


                                                tansaction_info +='<tr>'
                                                    +'<td align="right">'+ data.RollNo[i] +'</td>'
                                                    +'<td><input type="hidden" name="student_id[]" value="'+data.StudentId[i]+'"/>'+ data.StudentName[i] +'</td>'
                                                    +'<td>'+'<input type="text" name="sba_mark[]" id="sba_mark'+j+'" class="form-control" value="0" onchange="calculate_total_number('+j+')" />'+'</td>'
                                                    +'<td>'+'<input type="text" name="sub_grade[]" id="sub_grade'+j+'" class="form-control" value="" onchange="calculate_total_number('+j+')" />'+'</td>'
                                                    +'<input type="text" name="sub_pass_mark[]" id="sub_pass_mark'+j+'" style = "display:none;" class="form-control" value="'+data.sub_mark+'" />'
                                                    +'<input type="text" name="sub_mark_total[]" id="sub_mark_total'+j+'" style = "display:none;" class="form-control" value="'+data.sub_total_mark+'" />'

                                                    +'<td>'+'<input type="text" name="objective_mark[]" id="objective_mark'+j+'" class="form-control" value="0" onchange="calculate_total_number('+j+')" />'+'</td>'
                                                    +'<td>'+'<input type="text" name="obj_grade[]" id="obj_grade'+j+'" class="form-control" value="" onchange="calculate_total_number('+j+')" />'+'</td>'
                                                    +'<input type="text" name="obj_pass_mark[]" id="obj_pass_mark'+j+'" style = "display:none;" class="form-control" value="'+data.obj_mark+'" />'
                                                    +'<input type="text" name="obj_mark_total[]" id="obj_mark_total'+j+'" style = "display:none;" class="form-control" value="'+data.obj_total_mark+'" />'


                                                    +'<td>'+'<input type="text" name="subjective_mark[]" id="subjective_mark'+j+'"  class="form-control" value="0" onchange="calculate_total_number('+j+')" />'+'</td>'
                                                    +'<td>'+'<input type="text" name="pra_grade[]" id="pra_grade'+j+'" class="form-control" value="" onchange="calculate_total_number('+j+')" />'+'</td>'
                                                    +'<input type="text" name="pra_pass_mark[]" id="pra_pass_mark'+j+'" style = "display:none;" class="form-control" value="'+data.pra_mark+'" />'
                                                    +'<input type="text" name="pra_mark_total[]" id="pra_mark_total'+j+'" style = "display:none;" class="form-control" value="'+data.pra_total_mark+'" />'

                                                    +'<td>'+'<input type="text" name="total_mark[]" id="total_mark'+j+'" class="form-control" value="0"/>'+'</td>'
                                                    +'<td>'+'<input type="text" name="point[]" id="point'+j+'" class="form-control" value="0"/>'+'</td>'
                                                    +'<td>'+'<input type="text" name="grade[]" id="grade'+j+'" class="form-control" value="0"/>'+'</td>'
                                                    +'</tr>'
                                                j++
                                            }
                                        }
                                        else{
                                            tansaction_info +='<tr>'
                                                +'<td colspan="3">'+ "There is no Student in this Section !" +'</td>'
                                                +'</tr>'
                                        }
                                        tansaction_info += '</table>'
                                        $('#mark_information').empty();
                                        $('#mark_information').append(tansaction_info);
                                    }
                                }, "json");
                        }else{
                            $('#mark_information').empty();
                        }
                    }
                    else{
                        $('#mark_information').empty();
                        tansaction_info='<p style="color: red;">You have already entered marks for this class</p>';
                        $('#mark_information').append(tansaction_info);
                    }
                }
            }, "json");
    }


    function get_section_list(){
        var selected_class_id=$("#ClassId").val();
        $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($row->section)?$row->section:''?>";
                if( data.status == 'failure' ){

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.id.length; i++){
                        if(selected_SectionId==data.id[i]){
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }

    function get_section_list_for_manage_marks(){
        var selected_class_id=$("#ClassIddd").val();
        $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#SectionIddd').empty();
                var selected_SectionId = "<?php echo isset($row->section)?$row->section:''?>";
                if( data.status == 'failure' ){

                    $('#SectionIddd').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    $('#SectionIddd').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.id.length; i++){
                        if(selected_SectionId==data.id[i]){
                            $('#SectionIddd').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                        }else {
                            $('#SectionIddd').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
    function get_admission_last_paid_due_info(){
        var selected_student_id=$("#student").val();
        var selected_class_id=$("#class").val();
        $.post("<?php echo base_url('index.php/Payments/ajax_for_get_admission_last_paid_due_info_by_student') ?>", {class:selected_class_id,student: selected_student_id},
            function(data){

                $('#status').html("");
                $('#admission').empty();
                $('#last_paid_date').empty();
                $('#due_amount').empty();
                var selected_SectionId = "<?php echo isset($row->section)?$row->section:''?>";
                if( data.status == 'failure' ){

                    //$('#admission').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    //$('#admission').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.admission_date.length; i++){
                        if(selected_SectionId==data.admission_date[i]){
//                           // $('#admission').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.admission_date[i] + '</option>');
                        }else {
                            $('#admission').append('<option value = \"' + data.admission_date[i] + '\">' + data.admission_date[i] + '</option>');
                            $('#last_paid_date').append('<option value = \"' + data.last_paid_date[i] + '\">' + data.last_paid_date[i] + '</option>');
                            $('#due_amount').append('<option value = \"' + data.due_amount[i] + '\">' + data.due_amount[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }


    function get_student_list_for_payment(){
        var selected_class_id=$("#class").val();
       // var selected_section_id=$("#SectionId").val();
        $.post("<?php echo base_url('index.php/Payments/ajax_for_get_student_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#student').empty();
                var selected_StudentId = "<?php echo isset($row->StudentId)?$row->StudentId:''?>";

                if( data.status == 'failure' ){
                    $('#student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                }
                else	{
                    $('#student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    for(var i = 0; i < data.StudentId.length; i++){
                        if(selected_StudentId==data.StudentId[i]){
                            $('#student').append('<option value = \"' + data.StudentId[i] + '\" selected="selected">' + data.StudentName[i] + '</option>');
                        }else {
                            $('#student').append('<option value = \"' + data.StudentId[i] + '\">' + data.StudentName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }

    function get_catagory_list_for_payment(){
        var selected_class_id=$("#class").val();
        // var selected_section_id=$("#SectionId").val();
        $.post("<?php echo base_url('index.php/Payments/ajax_for_get_catagory_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#catagory').empty();
                var selected_CatId = "<?php echo isset($row->StudentId)?$row->StudentId:''?>";

                if( data.status == 'failure' ){
                    $('#catagory').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                }
                else	{
                    $('#catagory').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    for(var i = 0; i < data.CatId.length; i++){
                        if(selected_CatId==data.CatId[i]){
                            $('#catagory').append('<option value = \"' + data.CatId[i] + '\" selected="selected">' + data.CatName[i] + '</option>');
                        }else {
                            $('#catagory').append('<option value = \"' + data.CatId[i] + '\">' + data.CatName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }


    function get_student_list_for_marksheet_report(){
        var selected_class_id=$("#ClassId").val();
        var selected_section_id=$("#SectionId").val();
        $.post("<?php echo base_url('index.php/Student_admissions/ajax_for_get_student_list_by_class_and_section') ?>", {class_id: selected_class_id, section_id: selected_section_id},
            function(data){

                $('#status').html("");
                $('#StudentId').empty();
                var selected_StudentId = "<?php echo isset($row->StudentId)?$row->StudentId:''?>";
//                  alert(selected_StudentId);
                if( data.status == 'failure' ){
                    $('#StudentId').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                }
                else	{
                    $('#StudentId').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    for(var i = 0; i < data.StudentId.length; i++){
                        if(selected_StudentId==data.StudentId[i]){
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\" selected="selected">' + data.StudentName[i] + '</option>');
                        }else {
                            $('#StudentId').append('<option value = \"' + data.StudentId[i] + '\">' + data.StudentName[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }
    function get_payment_list_for(count=1){
       // alert (count);

        $('#fee_information').empty();
        var selected_class_id=$("#class").val();
        var selected_cat_id=$("#catagory").val();
        var selected_student_id=$("#student").val();

        //var SectionId=$("#SectionId").val();
        //var selected_year=$("#year").val();
        if(selected_class_id != '' ){
            $.post("<?php echo base_url('index.php/Payments/ajax_for_get_payment_list_by_class_and_cat') ?>", {class: selected_class_id,cat:selected_cat_id,student:selected_student_id},
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{
                        tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 90%">'
                            +'<tr align="center">'
                            +'<th colspan="3" align="right">Student Payment Information</th>'
                            +'</tr>'
                            +'<tr>'
                            +'<th>Particulars</th>'
                            +'<th>Payable Amount</th>'
                            +'<th>Amount</th>'
                            +'</tr>'


                        if(data.id){
                            var j=1
                            var sum = 0;
                            var due_amount = 0;

                            for(var i = 0; i < data.id.length; i++)
                            {
                                tansaction_info +='<tr>'
                                    +'<td>'+ data.particulars[i] +'</td>'
                                    +'<td><input type="hidden" name="payable_amount[]" value="'+data.amount[i]+'"/>'+ data.amount[i]*count +'</td>'

                                    +'<td>'+'<input type="checkbox" class="amount " id = "amount" style="width: 38%;" checked="checked" name="amount[]" value="'+data.amount[i]+'">'+'</td>'

                                    +'</tr>'
                                j++

                                due_amount += +data.due_amount[i] ;
                                sum += +data.amount[i]*count+due_amount ;


                            }

                            tansaction_info +='<tr>'
                                +'<td class="text-left" colspan="1">'+ "Previous Due " +'</td>'
                                +'<td>'+ due_amount +'</td>'

                                +'<td>'+'<input type="text" class=" form-control " id = "total_amount" style="width: 38%;" name="total_amount" readonly value=" '+ sum + '">'+'</td>'

                                +'</tr>'


                            tansaction_info +='<tr>'
                                +'<td class="text-left" colspan="1">'+ "total" +'</td>'

                                +'<td>'+'<input type="text" class=" form-control" id = "total_payable_amount" readonly style="width: 38%;" name="total_payable_amount" value=" '+ sum + '">'+'</td>'

                                +'<td>'+'<input type="text" class=" form-control" id = "total_amount" style="width: 38%;" name="total_amount" value=" '+ sum + '">'+'</td>'

                                +'</tr>'

                        }
                        else{
                            tansaction_info +='<tr>'
                                +'<td colspan="3">'+ "There is no Student in this class !" +'</td>'
                                +'</tr>'
                        }

                        tansaction_info += '</table>'
                        $('#fee_information').empty();
                        $('#fee_information').append(tansaction_info);
                    }
                }, "json");
        }else{
            $('#fee_information').empty();
        }
    }

    function get_section_list_to(){
        var selected_class_id=$("#class_to").val();
        $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#section_to').empty();
                var selected_SectionId = "<?php echo isset($row->section)?$row->section:''?>";
                if( data.status == 'failure' ){

                    $('#section_to').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    $('#section_to').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.id.length; i++){
                        if(selected_SectionId==data.id[i]){
                            $('#section_to').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                        }else {
                            $('#section_to').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }


    function get_section_list_for_marks(){
        var selected_class_id=$("#ClassIdd").val();
        $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($result['mark_data']['SectionId'])?$result['mark_data']['SectionId']:''?>";
                if( data.status == 'failure' ){

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.id.length; i++){
                        if(selected_SectionId==data.id[i]){
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }

    function get_section_list_for_class_routine(){
        var selected_class_id=$("#ClassIddd").val();
        $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($row->section_id)?$row->section_id:''?>";
                if( data.status == 'failure' ){

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.id.length; i++){
                        if(selected_SectionId==data.id[i]){
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }

    function get_section_list_for_attendance(){
        var selected_class_id=$("#Class_Id").val();
        $.post("<?php echo base_url('index.php/Config_sections/ajax_for_get_section_list_by_class') ?>", {class: selected_class_id},
            function(data){

                $('#status').html("");
                $('#SectionId').empty();
                var selected_SectionId = "<?php echo isset($attendance_info->SectionId)?$attendance_info->SectionId:''?>";
                if( data.status == 'failure' ){

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                }
                else	{

                    $('#SectionId').append('<option value = \"' + '' + '\">' + '------Select Section------' + '</option>');
                    for(var i = 0; i < data.id.length; i++){
                        if(selected_SectionId==data.id[i]){
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\" selected="selected">' + data.section_name[i] + '</option>');
                        }else {
                            $('#SectionId').append('<option value = \"' + data.id[i] + '\">' + data.section_name[i] + '</option>');
                        }
                    }
                }
            }, "json");
    }

    function get_roll_list(){
        var selected_class_id=$("#ClassId").val();
        var selected_section_id=$("#SectionId").val();
        $.post("<?php echo base_url('index.php/Student_admissions/ajax_for_get_roll_list_by_section') ?>", {class: selected_class_id,section:selected_section_id},
            function(data){

                $('#status').html("");
                $('#RollId').empty();
                if( data.status == 'failure' ){
                    $('#RollId').append('<option value = \"' + '' + '\">' + '------Select Roll------' + '</option>');
                }
                else	{

                    $('#RollId').append('<option value = \"' + '' + '\">' + '------Select Roll------' + '</option>');
                    for(var i = 0; i < data.Roll.length; i++){
                        $('#RollId').append('<option value = \"' + data.Roll[i] + '\">' + data.RollNo[i] + '</option>');
                    }
                }
            }, "json");
    }
    
    
        function get_student_list(){
        $('#fee_information').empty();
        var selected_class_id=$("#Class_Id").val();
        var selected_section_id=$("#SectionId").val();
       
        if(selected_class_id != '' && selected_section_id!=''){
            $.post("<?php echo base_url('index.php/Student_admissions/ajax_for_get_student_list_by_class_and_section') ?>", {class_id: selected_class_id, section_id: selected_section_id},
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{
                        tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 90%">'
                            +'<tr align="center">'
                            +'<th colspan="3" align="right">Student Attendances Information</th>'
                            +'</tr>'
                            +'<tr>'
                            +'<th>Student Roll</th>'
                            +'<th>Student Name</th>'
                            +'<th>Attendance</th>'
                            +'</tr>'
                        if(data.StudentId){
                            var j=1
                            for(var i = 0; i < data.StudentId.length; i++)
                            {
                                tansaction_info +='<tr>'
                                    +'<td>'+ data.RollNo[i] +'</td>'
                                    +'<td><input type="hidden" name="student_id[]" value="'+data.StudentId[i]+'"/>'+ data.StudentName[i] +'</td>'
                                    +'<td>'+'<select class="form-control attendant_list" style="width: 38%;" name="attendant_list[]"><option value="P">Present</option><option value="A">Absent</option><select>'+'</td>'
                                    +'</tr>'
                                j++
                            }
                        }
                        else{
                            tansaction_info +='<tr>'
                                +'<td colspan="3">'+ "There is no Student in this Section !" +'</td>'
                                +'</tr>'
                        }
                        tansaction_info += '</table>'
                        $('#fee_information').empty();
                        $('#fee_information').append(tansaction_info);
                    }
                }, "json");
        }else{
            $('#fee_information').empty();
        }
    }
    
    
       function get_student_list_for_migration(){
        $('#fee_information').empty();
        var selected_class_id=$("#ClassId").val();
        var SectionId=$("#SectionId").val();
        var selected_year=$("#year").val();
        if(selected_class_id != '' && selected_year!=''){
            $.post("<?php echo base_url('index.php/Migrations/ajax_for_get_student_list_by_class_and_year') ?>", {class: selected_class_id,section:SectionId, year: selected_year},
                function(data){
                    $('#status').html("");
                    $('#cbo_student').empty();
                    if( data.status == 'failure' ){
                        $('#cbo_student').append('<option value = \"' + '' + '\">' + '------Select Student------' + '</option>');
                    }
                    else{
                        tansaction_info = '<table align="center" class="table table-bordered mbn" style="width: 90%">'
                            +'<tr align="center">'
                            +'<th colspan="3" align="right">Student Migration Information</th>'
                            +'</tr>'
                            +'<tr>'
                            +'<th>Student Roll</th>'
                            +'<th>Student Name</th>'
                            +'<th>Result</th>'
                            +'<th>Promoted Class</th>'
                            +'</tr>'
                        if(data.StudentId){
                            var j=1
                            for(var i = 0; i < data.StudentId.length; i++)
                            {
                                tansaction_info +='<tr>'
                                    +'<td>'+ data.RollNo[i] +'</td>'
                                    +'<td><input type="hidden" name="student_id[]" value="'+data.StudentId[i]+'"/>'+ data.StudentName[i] +'</td>'
                                    +'<td>'+data.grade[i]+'</td>'
                                    +'<td>'+'<input type="checkbox" class=" promoted_student" id = "promoted_student" style="width: 38%;" name="promoted_student[]" value="'+data.StudentId[i]+'">'+'</td>'

                                    +'</tr>'
                                j++
                            }
                        }
                        else{
                            tansaction_info +='<tr>'
                                +'<td colspan="3">'+ "There is no Student in this class !" +'</td>'
                                +'</tr>'
                        }
                        tansaction_info += '</table>'
                        $('#fee_information').empty();
                        $('#fee_information').append(tansaction_info);
                    }
                }, "json");
        }else{
            $('#fee_information').empty();
        }
    }



</script>


<script type="text/javascript">

    $(document).ready(function(){

        $('input[value ="monthly_purpose"]').click(function(){

             if($(this).is(":not(:checked)")){

                 //$('input[name ="monthly"]').hide();
                 var value = $('input[id ="monthly_purpose"]').val();
                 var total = $('input[id ="total"]').val();
                 var dif = total-value;
                 $('input[id  ="monthly_purpose"]').val(0);
                 $('input[name ="balance"]').val(dif);
                 $('input[id  ="monthly_purpose"]').attr('disabled','disabled');



            }
            else{
                 location.reload(true);
//                 $(this).is(":checked"){
//
//                 }
             }

        });

        $('input[value ="admission_purpose"]').click(function(){

            if($(this).is(":not(:checked)")){

                //$('input[name ="monthly"]').hide();
                var value = $('input[id ="admission_purpose"]').val();
                var total = $('input[id ="total"]').val();
                var dif = total-value;
                $('input[id  ="admission_purpose"]').val(0);
                $('input[name ="balance"]').val(dif);
                $('input[id  ="admission_purpose"]').attr('disabled','disabled');




            }
            else{
                location.reload(true);
//                 $(this).is(":checked"){
//
//                 }
            }

        });

        $('input[value ="session_purpose"]').click(function(){

            if($(this).is(":not(:checked)")){

                //$('input[name ="monthly"]').hide();
                var value = $('input[id ="session_purpose"]').val();
                var total = $('input[id ="total"]').val();
                var dif = total-value;
                $('input[id  ="session_purpose"]').val(0);
                $('input[name ="balance"]').val(dif);
                $('input[id  ="session_purpose"]').attr('disabled','disabled');



            }
            else{
                location.reload(true);
            }

        });


        $('input[value ="yearly_purpose"]').click(function(){

            if($(this).is(":not(:checked)")){

                //$('input[name ="monthly"]').hide();
                var value = $('input[id ="yearly_purpose"]').val();
                var total = $('input[id ="total"]').val();
                var dif = total-value;
                $('input[id  ="yearly_purpose"]').val(0);
                $('input[name ="balance"]').val(dif);
                $('input[id  ="yearly_purpose"]').attr('disabled','disabled');




            }
            else{
                location.reload(true);
//                 $(this).is(":checked"){
//
//                 }
            }

        });
//        $('input[type=checkbox]').click(function(){
//
//        $("input:checkbox:not(:checked)").each(function () {
//           var c = $("input:checkbox:not(:checked)").length;
//           alert(c);
//            alert("Id: " + $(this).attr("id") + " Value: " + $(this).val());
//        });
        //alert(jQuery.add(2, 3));


//    });


        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })

    });

</script>

<script type="text/javascript">
    $("#btnPrint").live("click", function () {
        var divContents = $("#dvContainer").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>DIV Contents</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
</script>

<script>
//    jQuery(document).ready(function(){
//        jQuery('a[href="' + window.location.href + '"]').each(function() {
//            jQuery(this).parents().addClass("active");
//        });
//    });
</script>




</body>
</html>


