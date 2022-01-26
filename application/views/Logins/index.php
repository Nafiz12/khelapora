<?php $this->load->view('Layouts/admin_login_page_header'); ?>


    <div class="login-box" style = "padding-top: 10%;
background-repeat: no-repeat;margin:0% auto;">

        <?php
        if ($this->session->flashdata('error_message')) {
            $message = $this->session->flashdata('error_message');
            ?>
            <div class="alert alert-warning text-center"><?php echo $message['message']; ?></div>
        <?php } ?>


        
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?php
            echo form_open('index.php/Logins/validate');
            ?>

            <div class="form-group has-feedback">
                <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                <?php echo form_input(array('type' => 'text', 'name' => 'username',  'class' => "form-control",'placeholder' => "username", 'id' => 'username',)); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            </div>
            <div class="form-group has-feedback">
                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                <?php echo form_input(array('type' => 'password', 'name' => 'password',  'class' => "form-control", 'placeholder' => "password", 'id' => 'password',)); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>


            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <?php echo form_checkbox(array('name' => 'remember', 'id' => 'remember', 'value' => 'accept', 'checked' => FALSE)); ?>
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <?php echo form_button(array('name' => 'button', 'id' => 'button', 'type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat', 'content' => 'Sign In')); ?>
                </div>
                <!-- /.col -->
            </div>

            <?php
            echo form_close();

            ?>

            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


<?php $this->load->view('Layouts/admin_login_page_footer'); ?>