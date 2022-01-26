<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Notice_boards extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        // if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
        //     redirect('index.php/Logins/index');
        // }
        $this->load->model(array('Notice_board','Welcome','Organization_configuration'));

    }
    public function index()
    {
        $data['notice_list'] = $this->Notice_board->show_notice_list();
//	    echo "<pre>";print_r('dss');die;
        
         $this->layout->view('Notice_boards/index',$data);
    }

    public function view($notice_id){
        $data['config_list'] = $this->Welcome->show_config_list();
        $data['notice_list'] = $this->Welcome->get_notice_list();
        $data['notice'] = $notice_id;
        $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
        $this->load->view('Notice_boards/view',$data);
    }

     public function view_software($notice_id){
        $data['config_list'] = $this->Welcome->show_config_list();
        $data['notice_list'] = $this->Welcome->get_notice_list();
        $data['notice'] = $notice_id;
        $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
        $this->layout->view('Notice_boards/view_software',$data);
    }

    public function add()
    {

        if(!empty($_POST)) {
            $data = $this->security->xss_clean($this->input->post());
            $admin_id = $this->session->userdata('user_id');
            if(!empty($data['id'])){ $dataNew["id"] = $data['id']; }else{$dataNew["id"]='';}
            if($data['fileName'] = $this->do_upload($data['field'], $data['allowed_type'])){

                $dataNew["title"] = $data["title"];
                $dataNew["description"] = $data["fileName"];
                $dataNew["created_by"] = $admin_id;
                $dataNew["updated_by"] = '';
                $dataNew["created_on"] = date("Y-m-d H:i:s");

                if ($this->Notice_board->add($dataNew)) {
                    $output = array('uploaded' => $this->session->set_flashdata('success_message', ADD_MESSAGE) );
//                    $output = array('uploaded' => 'OK' );

                }else {
                    $output = array('uploaded' => 'ERROR' );
                }
                echo json_encode($output);
            }
            else {
                echo json_encode(array('error' => $this->upload->display_errors()));
            }
        }else

             $this->layout->view('Notice_boards/add');
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
}
