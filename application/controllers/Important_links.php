<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Important_links extends CI_Controller
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
            $data['title'] = "Manage Important links";
            $data['headline'] = "Important links";
            $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();

           // echo "<pre>";print_r($data);die;
            $this->layout->view('Important_links/index',$data);

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
                    'imp_link1' => $this->input->post('imp_link1'),
                    'imp_link2' => $this->input->post('imp_link2'),
                    'imp_link3' => $this->input->post('imp_link3'),
                    'imp_link4' => $this->input->post('imp_link4'),
                    'imp_link5' => $this->input->post('imp_link5'),
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

            $link_id = $_POST['link_id'];
            
                $link_data = array(
                    'title' => $this->input->post('link_title'),
                    'link' => $this->input->post('link'),
                    
                );
          
                
          

            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {

               // echo "<pre>";print_r($config_data);die;
                $this->Organization_configuration->edit_links($link_data,$link_id);

                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Important_links');
            }
            else{
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Important_links');
            }

        }

        else{
            $data['title'] = "Edit";
            $data['headline'] = "Edit Important links";
            $data['row'] = $this->Organization_configuration->get_link_data($id);
       // echo "<pre>";print_r($data);die;
            $this->layout->view('Important_links/add', $data);
        }

    }

    
    private function prepare_validation(){

        $this->form_validation->set_rules('link_title', 'link_title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');
        
    }



    public function delete($id, $name)
    {
        if ($this->Organization_configuration->delete($id, $name) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Organization_configurations');
    }












}
