<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_passwords extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Change_password');

    }
	public function index()
	{
//	    echo "<pre>";print_r('dss');die;
        $data['title'] = "Manage Password";
        $data['headline'] = "Password";
		 $this->layout->view('Change_passwords/index',$data);
	}

	public function change_admin_password(){

            $this->prepare_validation();
            $admin_id = $this->session->userdata('user_id');



            if ($this->form_validation->run() == TRUE) {
                $old_password = $this->input->post('old_password');
//                echo "<pre>";print_r($old_password);die;
                $admin_data = array(
                    'password' => $this->input->post('new_password'),
                );
                if ($this->Change_password->change_admin_password($admin_data,$admin_id,$old_password)) {

                    $this->session->set_flashdata('change_password', CHANGE_PASSWORD_MESSAGE);

                    redirect('index.php/Admins');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !',                        'class' => 'success'));

                    redirect('index.php/Admins');
                }

            }
            else{
                $data['title'] = "Manage Password";
                $data['headline'] = "Password";
                 $this->layout->view('Change_passwords/index');
            }


    }

    private function prepare_validation(){

        $this->form_validation->set_rules('old_password', 'old_password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'new_password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|required|matches[new_password]');

    }
}
