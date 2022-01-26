<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feature_slideshows extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model('Feature_slideshow');

    }

    public function index()
    {
        $data['slideshow_list'] = $this->Feature_slideshow->show_slideshow_list();
         $this->layout->view('Feature_slideshows/index', $data);

    }


    public function add()
    {
        if ($_POST) {
            $data = $this->security->xss_clean($this->input->post());
            $admin_id = $this->session->userdata('user_id');
            $length = count($_FILES["upload"]["name"]);

            for ($i = 0; $i < $length; $i++) {
                $_FILES['userFile']['name'] = rand().$_FILES['upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['upload']['size'][$i];
                if ($this->do_upload('userFile')) {
                   $sham = array(
                        'title' => $data["title"],
                        'name' => $_FILES['userFile']['name'],
                        'for_slideshow' => $data["for_slideshow"],
                        'group_id' => $data["group_id"],
                        'year' => date("Y"),
                        'created_by' => $admin_id,
                        'created_on' => date("Y-m-d"),
                        'updated_by' => '',
                        'updated_on' => ''
                    );

                    if ($this->Feature_slideshow->add($sham)) {
                        $output = array('uploaded' => $this->session->set_flashdata('success_message', ADD_MESSAGE));
//                    $output = array('uploaded' => 'OK' );

                    } else {
                        $output = array('uploaded' => 'ERROR');
                    }
                } else {
                    echo json_encode(array('error' => $this->upload->display_errors()));
                }
            }
            echo json_encode($output);
        } else {
             $this->layout->view('Feature_slideshows/add');
        }

    }


    public function edit($id = null)
    {
        if ($_POST) {
            $slideshow_id = $id;
            $data = $this->security->xss_clean($this->input->post());
            $admin_id = $this->session->userdata('user_id');
            $length = count($_FILES["upload"]["name"]);
            for ($i = 0; $i < $length; $i++) {
                $_FILES['userFile']['name'] = rand().$_FILES['upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['upload']['size'][$i];
                if ($this->do_upload('userFile')) {
                    if ($_FILES['userFile']['name']) {
                         $sham = array(
                            'title' => $data["title"],
                            'name' => $_FILES['userFile']['name'],
                            'for_slideshow' => $data["for_slideshow"],
                            'group_id' => $data["group_id"],
                            
                            'updated_by' => $admin_id,
                            'updated_on' => date("Y-m-d")
                        );
                    }
                    if (empty($_FILES['userFile']['name'])) {
                        $sham = array(
                            'title' => $data["title"],
                            'updated_by' => $admin_id,
                            'updated_on' => date("Y-m-d H:i:s")
                        );
                    }
                    if ($this->Feature_slideshow->edit($sham, $slideshow_id)) {
                        $output = array('uploaded' => $this->session->set_flashdata('success_message', EDIT_MESSAGE));
//                    $output = array('uploaded' => 'OK' );

                    } else {
                        $output = array('uploaded' => 'ERROR');
                    }
                } else {
                    echo json_encode(array('error' => $this->upload->display_errors()));
                }
            }
            echo json_encode($output);
        } else {

            $data['row'] = $this->Feature_slideshow->get_slideshow_data($id);
             $this->layout->view('Feature_slideshows/add', $data);

        }

    }


    /**
     * Upload a file.
     *
     * @param $field
     * @param string $allowed_types
     * @return bool
     */
    public function do_upload($field, $allowed_types = 'jpg|png|gif|jpeg|JPG|JPEG|PNG|GIF')
    {

        $config['upload_path'] = "lib/images";
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = 5000;
        $config['max_width'] = 3024;
        $config['max_height'] = 1024;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($field)) {
            // print_r($this->upload->display_errors());
            return FALSE;
        } else {

            $data = $this->upload->data();
            return $data["file_name"];
        }
    }


    private function prepare_validation()
    {

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
    }

    public function delete($id, $name)
    {
        if ($this->Feature_slideshow->delete($id, $name) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Feature_slideshows');
    }


}
