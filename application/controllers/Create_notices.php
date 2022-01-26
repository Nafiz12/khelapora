<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Create_notices extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model(array('Create_notice','Welcome','Student_admission','Create_notice'));

    }
    public function index()
    {
        $data['notice_list'] = $this->Create_notice->show_notice_list();
         $this->layout->view('Create_notices/index',$data);
    }

    public function view($notice_id){
        $data['config_list'] = $this->Welcome->show_config_list();
        $data['notice_list'] = $this->Welcome->get_notice_list();
        $data['notice'] = $notice_id;
         $this->layout->view('Notice_boards/view',$data);
    }

    public function add()
    {

        if (!empty($_POST)) {
            $data = $this->security->xss_clean($this->input->post());
            $admin_id = $this->session->userdata('user_id');
            if (!empty($data['id'])) {
                $dataNew["id"] = $data['id'];
            } else {
                $dataNew["id"] = '';
            }
            if ($data['fileName'] = $this->do_upload($data['field'], $data['allowed_type'])) {

                $dataNew["title"] = $data["title"];
                $dataNew["description"] = $data["fileName"];
                $dataNew["created_by"] = $admin_id;
                $dataNew["updated_by"] = '';
                $dataNew["created_on"] = date("Y-m-d H:i:s");

                if ($this->Notice_board->add($dataNew)) {
                    $output = array('uploaded' => $this->session->set_flashdata('success_message', ADD_MESSAGE));
//                    $output = array('uploaded' => 'OK' );

                } else {
                    $output = array('uploaded' => 'ERROR');
                }
                echo json_encode($output);
            } else {
                echo json_encode(array('error' => $this->upload->display_errors()));
            }
        } else {
            $data['organization_data'] = $this->Student_admission->get_org_data();
            foreach ($data['organization_data'] as $org_info) {
                $organization_info['title'] = $org_info->title;
                $organization_info['organization_name'] = $org_info->organization_name;
                $organization_info['address'] = $org_info->address;
                $organization_info['image'] = $org_info->image;
                $data['organization_info'] = $organization_info;

            }
            $data['holiday_data'] = $this->Create_notice->get_holiday_list();
            $this->layout->view('Create_notices/add', $data);
        }
    }

    public function edit($id = null){


        $data = $this->security->xss_clean($this->input->post());
        if($_POST){
            $notice_id = $id;
            $data['fileName'] = $this->do_upload($data['field'], $data['allowed_type']);

            $admin_id = $this->session->userdata('user_id');
            if($data['fileName'] ){

                $dataNew["title"] = $data["title"];
                $dataNew["description"] = $data["fileName"];
                $dataNew["updated_by"] = $admin_id;
                $dataNew["updated_on"] = date("Y-m-d H:i:s");

            }

            if(empty($data['fileName']) ){
                $dataNew["title"] = $data["title"];

                $dataNew["updated_by"] = $admin_id;
                $dataNew["updated_on"] = date("Y-m-d H:i:s");
            }
            if ($this->Notice_board->edit($dataNew,$notice_id)) {

                $output = array('uploaded' => $this->session->set_flashdata('success_message', EDIT_MESSAGE) );


            }else {
                $output = array('uploaded' => 'ERROR' );
            }
            echo json_encode($output);

        }

        else{
            $data['row'] = $this->Notice_board->get_notice_data($id);
             $this->layout->view('Notice_boards/add', $data);
        }

    }

    /**
     * Upload a file.
     *
     * @param $field
     * @param string $allowed_types
     * @return bool
     */
    public function do_upload($field, $allowed_types = 'jpg|png|gif')
    {
        $config['upload_path']          = "lib/images";
        $config['allowed_types']        = $allowed_types;
        $config['max_size']             = 50000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($field))
        {
            return FALSE;
        }
        else
        {
            $data = $this->upload->data();

            return $data["file_name"];
        }
    }


    private function prepare_validation(){

        $this->form_validation->set_rules('title', 'title', 'trim|required');
//        $this->form_validation->set_rules('image', 'image', 'trim|required');
    }

    public function delete($id){
        $this->Notice_board->delete($id);
        $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        redirect('index.php/Notice_boards');
    }

    function ajax_for_get_holiday_list() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $holiday_id = $this->input->post('holiday');

        $callback_message['status'] = 'failure';
        if (empty($holiday_id)) {
            $callback_message['message'] = 'Select a holiday';
        }
        else
        {
            $hoilday_info = $this->Create_notice->get_date_data($holiday_id);
//            echo "<pre>";print_r($student_info);die;
            foreach ($hoilday_info as $row) {

                $callback_message['status'] = 'success';
                $callback_message['date_from'][] = $row['date_from'];
                $callback_message['date_to'][] = $row['date_to'];
                $callback_message['id'][] = $row['id'];
            }
        }
        echo json_encode($callback_message);
    }
}
