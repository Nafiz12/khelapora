<footer class="no-print">
    <div class="container">
        <div class="row">
           

                    <?php if(isset($config_list)){foreach($config_list as $config){ 
                                // echo "<pre>";print_r($config);
                                ?>
                                 <div class="col-md-4 col-sm-4">
                <div class="widget">
                    <h5 class="widgetheading">যোগাযোগ</h5>
                        <address>
                            <strong><?php echo $config->organization_name;?></strong><br>

                        <?php echo $config->address;?><br>
                    </address>

                    <p>
                        <i class="icon-phone"></i> <?php echo $config->org_contact;?> <br>
                        <i class="icon-envelope-alt"></i> <?php echo $config->org_email;?>
                    </p>

                </div>
            </div>



            <div class="col-md-4 col-sm-4">
                <div class="widget">
               
                    <a style = "paddng:50px;" class="navbar-brand" href="<?php echo base_url();?>"><img class="img-responsive  footer_logo" src="<?php echo base_url();?><?php echo $config->image;?>" style="width: 70%;margin-left: 10%;" alt="logo"/></a>

              
            </div>
            </div>



                            <?php } }?>




            
            <div class="col-md-4 col-sm-4">
                <div class="widget">
                    <h5 class="widgetheading">গুরুত্বপূর্ণ লিঙ্ক</h5>
                    <ul class="link-list">
                       
<?php if(isset($imp_link_list)){foreach($imp_link_list as $imp_link){ 
                                // echo "<pre>";print_r($imp_link);
                                ?>
              <li><a href="<?php echo $imp_link['link'];?>"><?php echo $imp_link['title'];?></a></li>                   

                                <?php } }?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div id="sub-footer" >
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6">
                    <div class="copyright">
                        <p>
                            <span>&copy;  All right reserved by <Strong>4sventure</Strong> </span><a href="" target="_blank"></a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        <li style = "border-radius:50px;"><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li style = "border-radius:50px;"><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li style = "border-radius:50px;"><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li style = "border-radius:50px;"><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li style = "border-radius:50px;"><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<a href="#" class="scrollup" style = "border-radius: 50px;"><i class="fa fa-angle-up active" ></i></a>

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>lib/js/jquery.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>lib/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery.fancybox-media.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url();?>lib/js/animate.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>lib/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!--<script src="--><?php //echo base_url();?><!--lib/js/test_menu.js"></script>-->
<!-- Vendor Scripts -->
<script src="<?php echo base_url();?>lib/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url();?>lib/js/animate.js"></script>
<script src="<?php echo base_url();?>lib/js/custom.js"></script>
<script src="<?php echo base_url();?>lib/js/image_gallery_plugin/jquery.picEyes.js"></script>
<script src="<?php echo base_url();?>lib/js/jquery-gallery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/(lang).js"></script>

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
    $(function(){
//        picturesEyes($('li'));
        $('.gallery').picEyes();
    });
</script>

<script>
    /* Demo Scripts for Bootstrap Carousel and Animate.css article
* on SitePoint by Maria Antonietta Perna
*/
    (function( $ ) {

        //Function to animate slider captions
        function doAnimations( elems ) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $myCarousel = $('#carousel-example-generic'),
            $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

        //Initialize carousel
        $myCarousel.carousel();

        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);

        //Pause carousel
        $myCarousel.carousel('pause');


        //Other slides to be animated on carousel slide event
        $myCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });

    })(jQuery);
</script>
<script>
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>';
    $("#avatar-2").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        showBrowse: false,
        browseOnZoneClick: true,
        removeLabel: '',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-2',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
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


    jQuery("document").ready(function($){


        $("#BranchId").change(function () {
           
            // get_student_roll();
            get_course_combo();
        });

         $("#CourseId").change(function () {
            get_batch_list();
        });
         $("#BatchId").change(function () {
            get_student_roll_and_code_list();
        });
         

        var nav = $('.nav-container');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 136) {
                // $("p").css("background-color", "yellow");
                $('.navbar-collapse').css("width", "103%");
                nav.addClass("f-nav");
            } else {
                nav.removeClass("f-nav");
                $('.navbar-collapse').css("width", "100%");
            }
        });

    });
</script>


<script>
    $(document).jquerygallery({

// displays a thumbnails navigation
        'coverImgOverlay' : true,

// CSS classes
        'imgActive' : "imgActive",
        'thumbnail' : "coverImgOverlay",
        'overlay' : "overlay",

// the height of the thumbnails
        'thumbnailHeight' : 120,

// custom navigation controls.
// requires Font Awesome
        'imgNext' : "<i class='fa fa-angle-right'></i>",
        'imgPrev' : "<i class='fa fa-angle-left'></i>",
        'imgClose' : "<i class='fa fa-times'></i>",

// animation speed
        'speed' : 300

    });
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

<script type="text/javascript">
   

         function get_student_roll_and_code_list() {
        var selected_branch_id = $("#BranchId").val();
        var selected_course_id = $("#CourseId").val();
        var selected_batch_id = $("#BatchId").val();

        $.post("<?php echo site_url('index.php/welcomes/ajax_for_get_student_code') ?>", {
                
                BranchId: selected_branch_id,CourseId: selected_course_id,BatchId: selected_batch_id,
            },
            function (data) {
                $('#status').html("");
                $('#StudentCode').empty();
                $('#RollNo').empty();
                if (data.status == 'failure') {
                    $('#txt_code').empty();
                    $('#txt_roll').empty();
                }
                else {
                    $('#StudentCode').val(data.StudentCode);
                    $('#RollNo').val(data.StudentRoll);
                }
            }, "json");
    }

 function get_course_combo() {
        var selected_branch_id = $("#BranchId").val();

        $.post("<?php echo site_url('index.php/welcomes/ajax_for_get_course_info') ?>", {
                
                BranchId: selected_branch_id,
            },
            function (data) {
                $('#status').html("");
                $('#RegNo').empty();
                $('#RollNo').empty();
                if (data.status == 'failure') {
                    $('#txt_code').empty();
                    $('#txt_roll').empty();
                }
                else {
                    $('#RegNo').val(data.StudentCode);
                    $('#RollNo').val(data.StudentRoll);
                }
            }, "json");
    }


        function get_course_combo(){
       var selected_branch_id = $("#BranchId").val();

        $.post("<?php echo site_url('index.php/welcomes/ajax_for_get_course_info') ?>", {
                
                BranchId: selected_branch_id,
            },
            function(data){
                $('#status').html("");
                $('#CourseId').empty();
             
                if( data.status == 'failure' ){
                    $('#CourseId').append('<option value = \"' + '' + '\">' + '---Select Course---' + '</option>');
                }
                else    {
                    $('#CourseId').append('<option value = \"' + '' + '\">' + '---Select Course---' + '</option>');
                    for(var i = 0; i < data.ClassId.length; i++){
                       
                            $('#CourseId').append('<option value = \"' + data.ClassId[i] + '\">' + data.ClassName[i] + '</option>');
                      
                    }
                }
            }, "json");
    }

      function get_batch_list(){
       var selected_branch_id = $("#BranchId").val();
       var selected_course_id = $("#CourseId").val();

        $.post("<?php echo site_url('index.php/welcomes/ajax_for_get_batch_info') ?>", {
                
                BranchId: selected_branch_id,
                CourseId: selected_course_id,
            },
            function(data){
                $('#status').html("");
                $('#BatchId').empty();
             
                if( data.status == 'failure' ){
                    $('#BatchId').append('<option value = \"' + '' + '\">' + '---Select Batch---' + '</option>');
                }
                else    {
                    $('#BatchId').append('<option value = \"' + '' + '\">' + '---Select Batch---' + '</option>');
                    for(var i = 0; i < data.BatchId.length; i++){
                       
                            $('#BatchId').append('<option value = \"' + data.BatchId[i] + '\">' + data.BatchName[i] +' ('+data.StartTime[i]+ '-'+ data.EndTime[i]+')'+ '</option>');
                      
                    }
                }
            }, "json");
    }


        </script>
        
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/css/jquery-ui.css">
<!--<script type="text/javascript" src="<?php echo base_url(); ?>lib/js/jquery-1.10.2.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>lib/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker1" ).datepicker();
    });
</script>


</body>
</html>