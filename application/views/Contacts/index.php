<style>
    body {
        background-image:url("../lib/images/backgroupImage.png");
        background-size:500px ;
        background-repeat: repeat;
        background-color: #cccccc;
    }

    .Full_container {
        min-width: fit-content;
    }
</style>
<?php $this->load->view('Layouts/header');?>



<section id="content">
    <div class="row">
        <div class="col-md-12 info-blocks text-center" style="min-height:698px;">
            <div class="panel-heading box-title white-bg" style="background-color:#25708b;color:white; padding: 8px 10px 9px 15px;margin-left:-15px;margin-right:-15px;">আপনি কোন প্রশ্নের জন্য আমাদের সাথে যোগাযোগ করতে পারেন বা সরাসরি আমাদের অফিসে আসতে পারেন</div>
        <div class="col-md-12">
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
        </div>
    </div>

</section>


<?php $this->load->view('Layouts/footer');?>