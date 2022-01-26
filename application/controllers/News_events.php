<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_events extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model(array('News_event','Organization_configuration'), '', TRUE);

    }

    public function index()
    {
            $data['events_list'] = $this->News_event->show_events_list();
           // echo "<pre>";print_r($data);die;
             $this->layout->view('News_events/index',$data);
             

    }

    public function add()
    {
        $admin_id = $this->session->userdata('user_id');
        if(!empty($_POST)){
            $this->prepare_validation();

            if ($this->form_validation->run() == TRUE) {
                $events_data = array(
                    'headline' => $this->input->post('headline'),
                    'title' => $this->input->post('title'),
                    'is_welcome_message' => $this->input->post('is_welcome_message'),
                    'details' => htmlspecialchars($this->input->post('details')),
                    'created_on' => date("Y-m-d "),
                    'created_by' => $admin_id,
                    'updated_on' => '',
                    'updated_by' => '',
                    'image' => $this->do_upload()
                        );
                if ($this->News_event->add($events_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/News_events');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !',                        'class' => 'success'));

                    redirect('index.php/News_events');
                }

            }
            else{
                 $this->layout->view('News_events/add');
            }
        }

        else{
             $this->layout->view('News_events/add');
        }


    }




    public function edit($id = null){
        $admin_id = $this->session->userdata('user_id');
        if($_POST){

            $events_id =$_POST['events_id'];
            $check_admin_image = $this->do_upload();
            if(empty($check_admin_image)){
                $events_data = array(
                    'headline' => $this->input->post('headline'),
                    'title' => $this->input->post('title'),
                    'is_welcome_message' => $this->input->post('is_welcome_message'),
                    'details' => $this->input->post('details'),
                    'updated_on' => date("Y-m-d "),
                    'updated_by' => $admin_id
                );
            }else{
                $events_data = array(
                    'headline' => $this->input->post('headline'),
                    'title' => $this->input->post('title'),
                    'is_welcome_message' => $this->input->post('is_welcome_message'),
                    'details' => $this->input->post('details'),
                    'updated_on' => date("Y-m-d "),
                    'updated_by' => $admin_id,
                    'image' => $check_admin_image,
                );
            }

            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $this->News_event->edit($events_data,$events_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/News_events');
            }
            else{
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/News_events');
            }

        }

        else{
            $data['row'] = $this->News_event->get_events_data($id);
//        echo "<pre>";print_r($data);die;
             $this->layout->view('News_events/add', $data);
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

        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('details', 'details', 'trim|required');
    }

    public function permission($id){
        $data['row'] = $this->Admin->get_admin_data($id);
         $this->layout->view('Admins/permission',$data);
    }

    public function delete($id)
    {

        if ($this->News_event->delete($id) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/News_events');
    }












}
