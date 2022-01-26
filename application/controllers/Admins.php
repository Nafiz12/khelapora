<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Admin');

    }

    public function index()
    {
            $data['title'] = "Admin";
            $data['headline'] = "List of Admins";
            $data['admin_list'] = $this->Admin->show_admin_list();
             $this->layout->view('Admins/index',$data);

    }

    public function add()
    {
        if(!empty($_POST)){
            $this->prepare_validation();

            if ($this->form_validation->run() == TRUE) {
                $admin_data = array(
                    'username' => $this->input->post('username'),
                    'fullname' => $this->input->post('fullname'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),

                    'image' => $this->do_upload(),
                    'login_time' => '',
                    'active' => 0,
                    'logout_time' => ''
                        );
                if ($this->Admin->add($admin_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Admins');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !',                        'class' => 'success'));

                    redirect('index.php/Admins');
                }

            }
            else{

                $data['title'] = "Add";
                $data['headline'] = "Add Admin";
                 $this->layout->view('Admins/add',$data);
            }
        }

        else{
            $data['title'] = "Add";
            $data['headline'] = "Add Admin";
             $this->layout->view('Admins/add',$data);
        }


    }




    public function edit($id = null){
        if($_POST){

            $admin_id=$_POST['admin_id'];
            $check_admin_image = $this->do_upload();
            if(empty($check_admin_image)){
                $admin_data = array(
                    'username' =>$this->input->post('username'),
                    'fullname' =>$this->input->post('fullname'),
                    'password' =>$this->input->post('password'),
                    'email' =>$this->input->post('email')


                );
            }else{
                $admin_data = array(

                    'username' =>$this->input->post('username'),
                    'fullname' =>$this->input->post('fullname'),
                    'password' =>$this->input->post('password'),
                    'email' =>$this->input->post('email'),
                    'image'    => $check_admin_image

                );
            }

            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $this->Admin->edit($admin_data,$admin_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Admins');
            }
            else{
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Admins');
            }

        }

        else{
            $data['title'] = "Edit ";
            $data['headline'] = "Edit Admin";
            $data['row'] = $this->Admin->get_admin_data($id);
//        echo "<pre>";print_r($data);die;
             $this->layout->view('Admins/add', $data);
        }

    }

    private function do_upload()
    {
        $type=explode('.',$_FILES['image']['name']);
        $type=$type[count($type)-1];
        $url="lib/images/".uniqid(rand()).'.'.$type;
        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf')))
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$url))
            {
                return $url;
            }

        }

    }

    private function prepare_validation(){

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
    }

    public function permission($id){
        $data['row'] = $this->Admin->get_admin_data($id);
         $this->layout->view('Admins/permission',$data);
    }

    public function delete($id){
        $this->Admin->delete($id);
        $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        redirect('index.php/Admins');

    }












}
