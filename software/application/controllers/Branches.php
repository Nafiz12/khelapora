<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branches extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model(array('Branch','User'), '', TRUE);
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index(){
        $data = array();
        $data['headline']='List of Branch';
        $data['title']='Branch List';
        $location_data=$this->session->userdata('system.branch');
        $data['results']= $this->Branch->get_list($location_data['BranchId'],$location_data['IsHeadOffice']);
        $this->layout->view('branches/index', $data);
    }
    function add() {
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $this->_prepare_validation();
            $this->form_validation->set_rules('txt_branch_code','Code','trim|required|is_unique[branches.BranchCode]');
            $data=$this->_get_posted_data();
            if($this->form_validation->run()){
                $data['BranchId'] = $this->Branch->get_new_id('branches', 'BranchId');
                if($this->Branch->add($data))
                {
                    //Users Array
                    $user_id = $this->Branch->get_new_id('user', 'id');
                    $user_array['id'] = $user_id;
                    $user_array['user_name'] ='sb'.$data['BranchCode'];
                    $user_array['password'] = md5('sb@#2019');
                    $user_array['BranchId'] = $data['BranchId'];
                    $user_array['role_id'] = 1;
                    $user_array['reg_date'] = date('Y-m-d');
                    $user_array['name'] = 'School Book user';
                    $user_array['status'] = 1;
                    $user_array['is_parents'] =0;

                    $this->User->user_add($user_array);

                    $image_name = $this->do_upload();

                    $branch_image['BranchId'] = $data['BranchId'];
                    $branch_image['Logo'] = $image_name;
                    $this->Branch->edit($branch_image);

                    $this->session->set_flashdata('success', 'Branch has been added successfully');
                    redirect('branches/index','refresh');
                }
            }else{
                echo validation_errors(); die;
            }
        }
        $data['branch_code']=$this->Branch->get_branch_code();
        $data['headline']='Branch Information';
        $data['title']='Branch Entry';
        $this->layout->view('branches/add', $data);

    }
    private function do_upload()
    {
        $type=explode('.',$_FILES['Logo']['name']);
        $type=$type[count($type)-1];

        $image_name = uniqid(rand()).'.'.$type;

        $url="media/branch_pictures/".$image_name;


        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf')))
        {
            if(move_uploaded_file($_FILES['Logo']['tmp_name'],$url))
            {
                return $image_name;
            }
        }
    }
    function edit($id=null){
        $data = array();
        if($_POST)
        {
            $id=$this->input->post('txt_branch_id');
            $this->_prepare_validation();
            $data=$this->_get_posted_data();
            if($this->form_validation->run()){
                $data['BranchId'] = $this->input->post('txt_branch_id');

                if($_FILES['Logo']['name'] != ''){
                    $branch_info = $this->Branch->read($data['BranchId']);

                    if($branch_info->Logo != ''){
                        $url="media/branch_pictures/".$branch_info->Logo;
                        unlink($url);
                    }
                    $image_name = $this->do_upload();
                    $data['Logo'] = $image_name;
                }else{
                    unset($data['Logo'] );
                }

                if($this->Branch->edit($data))
                {
                    $this->session->set_flashdata('success', 'Branch has been updated successfully');
                    redirect('branches/index','refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        //echo "<pre>";print_r($data); die;
        $data['headline']='Edit Branch';
        $data['title']='Edit Branch Entry';
        $data['row'] = $this->Branch->read($id);
        //echo "<pre>";print_r($data['row']); die;
        $this->layout->view('branches/add', $data);
    }
    function delete($id=null){
        if(empty($id)){
            //$this->session->set_flashdata('warning','Branch ID is not provided');
            redirect('branches/index/', 'refresh');
        }
        else {
            $row = $this->Branch->read($id);
            $branch_image =$row->Logo;
            $url="media/branch_pictures/".$branch_image;
            unlink($url);

            if($this->Branch->delete($id) == true){
                redirect('branches/index/', 'refresh');
            }
        }
    }
    function ajax_delete_pictures($id){
        if(empty($id)){
            //$this->session->set_flashdata('warning','Branch ID is not provided');
            redirect('branches/index/', 'refresh');
        }
        else {
            $row = $this->Branch->read($id);
            $branch_image['BranchId'] = $row->BranchId;
            $branch_image['Logo'] = NULL;
            $this->Branch->edit($branch_image);

            $image_name =$row->Logo;
            $url="media/branch_pictures/".$image_name;
            unlink($url);

            redirect('branches/edit/'.$id,'refresh');
        }
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchName']=$this->input->post('txt_branch_name');
        $data['BranchCode']=$this->input->post('txt_branch_code');
        $data['ContactNumber']=$this->input->post('txt_contact_number');
        $data['BranchAddress']=$this->input->post('BranchAddress');
        $data['Mobile']=$this->input->post('txt_mobile_number');
        $data['LandPhone']=$this->input->post('txt_land_pohone');
        $data['Fax']=$this->input->post('txt_fax');
        $data['Email']=$this->input->post('txt_email');
        $data['BranchOpeningDate']=date("Y-m-d", strtotime($this->input->post('txt_date_of_open')));
        $data['IsHeadOffice']=$this->input->post('cbo_is_head_office');
        $data['Year']=$this->input->post('Year');
        
        //echo '<pre>'; print_r($data); die;
        return $data;
    }
    function _load_combo_data() {
        $data = array();
        $year = array();
        $year['2019-2020'] ='2019-2020';
        $year['2020-2021'] ='2020-2021';
        $year['2021-2022'] ='2021-2022';
        $year['2022-2023'] ='2022-2023';
        $data['academic_year_list']=$year;

        $Shift = array();
        $Shift['M'] ='Morning';
        $Shift['D'] ='Day';
        $data['ShiftList']=$Shift;

        $Medium = array();
        $Medium['B'] ='Bangla';
        $Medium['E'] ='English';
        $Medium['V'] ='Version';
        $data['MediumList']=$Medium;

        return $data;
    }

    function _prepare_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_branch_name','Branch','required');
        $this->form_validation->set_rules('txt_branch_code','Code','required');
    }
}
