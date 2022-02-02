<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_configurations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Organization_configuration');

    }

    public function index()
    {
            $data['title'] = "Manage Organization";
            $data['headline'] = "Organization";
            $data['org_config_list'] = $this->Organization_configuration->show_config_list();

           // echo "<pre>";print_r($data);die;
            $this->layout->view('Organization_configurations/index',$data);

    }

    public function add()
    {
        if(!empty($_POST)){
            $this->prepare_validation();

            if ($this->form_validation->run() == TRUE) {
                $config_data = array(
                    'title' => $this->input->post('Org_title'),
                    'organization_name' => $this->input->post('Org_name'),
                    'year' => $this->input->post('year'),
                    'organization_slogan' => $this->input->post('Org_slogan'),
                    'eiin_no' => $this->input->post('eiin_no'),
                    'org_email' => $this->input->post('org_email'),
                    'org_contact' => $this->input->post('org_contact'),
                    'image' => $this->do_upload(),
                    'address' => $this->input->post('address'),
                   
                        );
                if ($this->Organization_configuration->add($config_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Organization_configurations');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !',                        'class' => 'success'));

                    redirect('index.php/Organization_configurations');
                }

            }
            else{
                $data['title'] = "Add";
                $data['headline'] = "Add Organization";
                $this->layout->view('Organization_configurations/add',$data);
            }
        }

        else{
            $data['title'] = "Add";
            $data['headline'] = "Add Organization";
            $this->layout->view('Organization_configurations/add',$data);
        }


    }




    public function edit($id = null){
        if($_POST){

            $config_id = $_POST['config_id'];
            $check_org_image = $this->do_upload();
            // echo "<pre>";print_r($check_org_image);die;
            if(empty($check_org_image)){
                $config_data = array(
                    'title' => $this->input->post('Org_title'),
                    'organization_name' => $this->input->post('Org_name'),
                    'year' => $this->input->post('year'),
                    'organization_slogan' => $this->input->post('Org_slogan'),
                    'eiin_no' => $this->input->post('eiin_no'),
                    'org_email' => $this->input->post('org_email'),
                    'org_contact' => $this->input->post('org_contact'),
                    'address' => $this->input->post('address'),
                    

                );
            }else{
                $config_data = array(
                    'title' => $this->input->post('Org_title'),
                    'organization_name' => $this->input->post('Org_name'),
                    'year' => $this->input->post('year'),
                    'organization_slogan' => $this->input->post('Org_slogan'),
                    'eiin_no' => $this->input->post('eiin_no'),
                    'org_email' => $this->input->post('org_email'),
                    'org_contact' => $this->input->post('org_contact'),
                    'image' => $check_org_image,
                    'address' => $this->input->post('address'),
                    
                );
            }

            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {

               // echo "<pre>";print_r($config_data);die;
                $this->Organization_configuration->edit($config_data,$config_id);

                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Organization_configurations');
            }
            else{
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Organization_configurations');
            }

        }

        else{
            $data['title'] = "Edit";
            $data['headline'] = "Edit Organization";
            $data['row'] = $this->Organization_configuration->get_config_data($id);
//        echo "<pre>";print_r($data);die;
            $this->layout->view('Organization_configurations/add', $data);
        }

    }

    private function do_upload()
    {
        
        $type=explode('.',$_FILES['image']['name']);
        $type=$type[count($type)-1];
        $url="lib/images/".uniqid(rand()).'.'.$type;
        
        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf','gif','GIF')))
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$url))
            {

                return $url;
            }

        }

    }

    private function prepare_validation(){

        $this->form_validation->set_rules('Org_title', 'Org_title', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('Org_name', 'Org_name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('Org_slogan', 'Org_slogan');
    }



    public function delete($id)
    {
        
        if ($this->Organization_configuration->delete($id) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Organization_configurations');
    }












}
