<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectures extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Lecture');

    }

    public function index()
    {
            $data['achievements_list'] = $this->Lecture->show_lectures_list();
             $this->layout->view('Lectures/index',$data);

    }

    public function add()
    {
        $admin_id = $this->session->userdata('user_id');
        if(!empty($_POST)){
            // echo "<pre>";print_r($_POST);die;
            $this->prepare_validation();

            if ($this->form_validation->run() == TRUE) {
                $achievements_data = array(
                    'LectureTitle' => $this->input->post('LectureTitle'),
                    'SubjectId' => $this->input->post('SubjectId'),
                    'LectureLink' => $this->input->post('LectureLink'),
                    'LectureDetails' => $this->input->post('LectureDetails'),
                    
                    'LectureVideo' => $this->do_upload()
                        );

                // echo "<pre>";print_r($achievements_data);die;
                if ($this->Lecture->add($achievements_data)) {
                    $this->session->set_flashdata('success_message', ADD_MESSAGE);

                    redirect('index.php/Lectures');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !',                        'class' => 'success'));

                    redirect('index.php/Lectures');
                }

            }
            else{
                 $this->layout->view('Lectures/add');
            }
        }

        else{
            $cond = array();

             $data['subject_list'] = $this->Lecture->get_subject_list();
             // echo "<pre>";print_r($data);die;
             $this->layout->view('Lectures/add',$data);
        }


    }




    public function edit($id = null){
        $admin_id = $this->session->userdata('user_id');
        if($_POST){

            $achievements_id =$_POST['achievements_id'];
            $check_admin_image = $this->do_upload();
            if(empty($check_admin_image)){
                $achievements_data = array(
                    'LectureTitle' => $this->input->post('LectureTitle'),
                    'SubjectId' => $this->input->post('SubjectId'),
                    'LectureLink' => $this->input->post('LectureLink'),
                    'LectureDetails' => $this->input->post('LectureDetails')
                );
            }else{
                $achievements_data = array(
                     'LectureTitle' => $this->input->post('LectureTitle'),
                    'SubjectId' => $this->input->post('SubjectId'),
                    'LectureLink' => $this->input->post('LectureLink'),
                    'LectureDetails' => $this->input->post('LectureDetails'),
                    
                    'LectureVideo' => $check_admin_image
                    
                );
            }

            $this->prepare_validation();
            if ($this->form_validation->run() == TRUE) {
                $this->Lecture->edit($achievements_data,$achievements_id);
                $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                redirect('index.php/Lectures');
            }
            else{
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Lectures');
            }

        }

        else{
            $data['subject_list'] = $this->Lecture->get_subject_list();
            $data['row'] = $this->Lecture->get_lectures_data($id);
//        echo "<pre>";print_r($data);die;
             $this->layout->view('Lectures/add', $data);
        }

    }

    public function do_upload()
    {
        $type=explode('.',$_FILES['image']['name']);
        $type=$type[count($type)-1];
        $url="lib/images/".uniqid(rand()).'.'.$type;
        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf','mp4','MP4','WEMB')))
        {
             // echo "ddd<pre>";print_r($url);
            if(move_uploaded_file($_FILES['image']['tmp_name'],$url))
            {
                // echo "dd0d<pre>";print_r($url);die;
                return $url;
            }

        }

    }


        // public function upload_file()
        // {
        //         $config['upload_path']          = 'lib/images/';
        //         $config['allowed_types']        = 'gif|jpg|png|pdf|doc|mp4|MP4';
        //         $config['max_size']             = 10000;
               
        //         $this->load->library('upload', $config);
        //         if ( ! $this->upload->do_upload('image'))
        //         {
                        
        //             $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        //             $error = array('error' => $this->upload->display_errors());
        //             echo "<pre>";print_r($error);die;
        //             $this->load->view('upload', $error);
        //         }
        //         else
        //         {
        //             $data = array('upload_data' => $this->upload->data());
        //             $this->load->view('success', $data);
        //         }
        // }

    private function prepare_validation(){

        $this->form_validation->set_rules('LectureTitle', 'LectureTitle', 'trim|required');
        
    }

    public function permission($id){
        $data['row'] = $this->Admin->get_admin_data($id);
         $this->layout->view('Admins/permission',$data);
    }

    public function delete($id)
    {
          
        if ($this->Lecture->delete($id) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Lectures');
    }












}
