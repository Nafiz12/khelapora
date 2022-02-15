<style>
    body {
        background-image:url("../lib/images/backgroupImage.png");
        background-size:500px ;
        background-repeat: repeat;
        background-color: #cccccc;
    }
</style>
<?php $this->load->view('Layouts/header');?>


    <section id="content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about-logo">
                         <p class="text-center">আপনি কোন প্রশ্নের জন্য আমাদের সাথে যোগাযোগ করতে পারেন বা সরাসরি আমাদের অফিসে আসতে পারেন</p>
                            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  
                       
                     
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   

                    <!-- Form itself -->
                    
                    <form name="sentMessage" id="contactForm"  novalidate>
                       
                       <p><h5>যোগাযোগ</h5></p>
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control"
                                       placeholder="Full Name" id="name" required
                                       data-validation-required-message="Please enter your name" />
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="email" class="form-control" placeholder="Email"
                                       id="email" required
                                       data-validation-required-message="Please enter your email" />
                            </div>
                        </div><br>

                        <div class="control-group">
                            <div class="controls">
				 <textarea rows="10" cols="100" class="form-control"
                           placeholder="Message" id="message" required
                           data-validation-required-message="Please enter your message" minlength="5"
                           data-validation-minlength-message="Min 5 characters"
                           maxlength="999" style="resize:none"></textarea>
                            </div>
                        </div>
                        <br>
                        <div id="success"> </div> <!-- For success/fail messages -->
                        <button type="submit" class="btn btn-primary text-center" style="margin-left:30%;">Send</button><br />
                    </form>
                </div>
                <div class="col-md-6">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d912.9246847735945!2d90.38615460462952!3d23.758120119797265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a68a3ff813%3A0x327f4fc00ffe5157!2s2nd+Floor%2C+27+Indira+Rd%2C+Dhaka+1215!5e0!3m2!1sen!2sbd!4v1558318102546!5m2!1sen!2sbd" width="600" height="300" frameborder="0" style="border:0;margin-top:50px;" allowfullscreen></iframe>
                    <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAXFfsi40zrKww4N-BUui5INlqWGfjzoFM&callback=initMap"></script><div style="overflow:hidden;height:500px;width:600px;"><div id="gmap_canvas" style="height:500px;width:600px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(23.876263,90.379631),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(23.876263, 90.379631)});infowindow = new google.maps.InfoWindow({content:"<b>Uttara</b><br/>My SweetHome<br/> " });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
                </div>
            </div>
        </div>

    </section>


<?php $this->load->view('Layouts/footer');?>