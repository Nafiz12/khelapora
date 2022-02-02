<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_speches extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Manage_spech');

    }

    public function index()
    {
            $data['spech_list'] = $this->Manage_spech->show_spech_list();
             $this->layout->view('Manage_speches/index',$data);

    }

    public function add()
    {
        $admin_id = $this->session->userdata('user_id');
        if(!empty($_POST)){
            $this->prepare_validation();

            if ($this->form_validation->run() == TRUE) {
                $spech_data = array(
                    'name' => $this->input->post('name'),
                    'headline' => $this->input->post('headline'),
                    'designation' => $this->input->post('designation'),
                    'spech' => $this->input->post('spech'),
                    'created_on' => date("Y-m-d H:i:s"),
                    'created_by' => $admin_id,
                    'updated_on' => '',
                    'updated_by' => '',
                    'image' => $this->do_upload()
                        );
                if ($this->Manage_spech->add($spech_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Manage_speches');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !',                        'class' => 'success'));

                    redirect('index.php/Manage_speches');
                }

            }
            else{
                 $this->layout->view('Manage_speches/add');
            }
        }

        else{
             $this->layout->view('Manage_speches/add');
        }


    }




    public function edit($id = null){
        $admin_id = $this->session->userdata('user_id');
        if($_POST){

            $spech_id=$_POST['spech_id'];
            $check_admin_image = $this->do_upload();
            if(empty($check_admin_image)){
                $spech_data = array(
                    'name' => $this->input->post('name'),
                    'headline' => $this->input->post('headline'),
                    'designation' => $this->input->post('designation'),
                    'spech' => $this->input->post('spech'),
                    'updated_on' => date("Y-m-d H:i:s"),
                    'updated_by' => $admin_id
                );
            }else{
                $spech_data = array(
                    'name' => $this->input->post('name'),
                    'headline' => $this->input->post('headline'),
                    'designation' => $this->input->post('designation'),
                    'spech' => $this->input->post('spech'),
                    'updated_on' => date("Y-m-d H:i:s"),
                    'updated_by' => $admin_id,
                    'image' => $check_admin_image,
                );
            }

            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $this->Manage_spech->edit($spech_data,$spech_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Manage_speches');
            }
            else{
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Manage_speches');
            }

        }

        else{
            $data['row'] = $this->Manage_spech->get_spech_data($id);
//        echo "<pre>";print_r($data);die;
             $this->layout->view('Manage_speches/add', $data);
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

        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required');
        $this->form_validation->set_rules('spech', 'spech', 'trim|required');
        $this->form_validation->set_rules('headline', 'headline', 'trim|required');
    }

    public function permission($id){
        $data['row'] = $this->Admin->get_admin_data($id);
         $this->layout->view('Admins/permission',$data);
    }

    public function delete($id)
    {

        if ($this->Manage_spech->delete($id) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Manage_speches');
    }












}
