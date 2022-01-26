<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organizations extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();

        $this->load->model(array('Organization','Branch'), '', TRUE);
        $this->load->helper('form');
        $this->load->helper('html');
    }

    function index() {
        $data = array();
        $data['headline'] = 'List Of Organizations';
        $data['title'] = 'Organizations List';
        $data['results'] = $this->Organization->get_list();
        $this->layout->view('organizations/index', $data);
    }

    function add() {
        $data = array();
        if ($_POST) {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            //echo"<pre>"; print_r($data); die;
            if ($this->form_validation->run()) {
                $data['OrganizationId'] = NULL;
                if ($this->Organization->add($data)) {
                    $this->session->set_flashdata('message', 'Data has been added successfully');
                    redirect('organizations/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Organization Information';
        $data['title'] = 'Organization Entry';
        $this->layout->view('organizations/save', $data);
    }

    function edit($id = null) {
        $data = array();
        if ($_POST) {
            $id = $this->input->post('txt_organization_id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['OrganizationId'] = $this->input->post('txt_organization_id');
                if($_FILES['Logo']['name'] != ''){

                    $branch_info = $this->Organization->read($data['OrganizationId']);
                    if($branch_info->Org_Logo != ''){
                        $url="media/branch_pictures/".$branch_info->Org_Logo;
                        unlink($url);
                    }
                    $image_name = $this->do_upload();
                    $data['Logo'] = $image_name;
                }else{
                    unset($data['Logo'] );
                }

                if ($this->Organization->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('organizations/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Edit Organization';
        $data['title'] = 'Edit Organization Entry';
        $data['row'] = $this->Organization->read($id);
        $this->layout->view('organizations/save', $data);
    }
    private function do_upload()
    {
        $type=explode('.',$_FILES['Logo']['name']);
        $type=$type[count($type)-1];

        $image_name = uniqid(rand()).'.'.$type;
//
//        $branch_id = $this->input->post('txt_branch_id');
//
//        if(!isset($branch_id) && $branch_id==''){
//            $branch_id=$this->Branch->get_new_id('branches', 'BranchId');
//        }
//
//        $image_name = $branch_id.'_'.$image_name[0].'.'.$type;


        $url="media/branch_pictures/".$image_name;


        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf')))
        {
            if(move_uploaded_file($_FILES['Logo']['tmp_name'],$url))
            {
                return $image_name;
            }
        }
    }
    function delete($id = null) {
        if (empty($id)) {
            //$this->session->set_flashdata('warning','Location ID is not provided');
            redirect('customers/index/', 'refresh');
        } else {
            $row = $this->Organization->read($id);
            //echo "<pre>";print_r($row);die;
            if ($this->Organization->delete($id) == true) {
                //$this->session->set_flashdata('message',DELETE_MESSAGE);
                redirect('organizations/index/', 'refresh');
            }
        }
    }

    function _get_posted_data() {
        $data = array();
        $data['OrganizationName'] = $this->input->post('txt_organization_name');
        $data['OrganizationAddress_1'] = $this->input->post('txt_OrganizationAddress_1');
        $data['OrganizationAddress_2'] = $this->input->post('txt_OrganizationAddress_2');
        $data['OrganizationAddress_3'] = $this->input->post('txt_OrganizationAddress_3');
        $data['CashMemoPrefix'] = $this->input->post('txt_cash_memo_prefix');
        $data['MemoPrfix'] = $this->input->post('txt_purchase_memo_prefix');
        $data['StudentCodePrefix'] = $this->input->post('txt_code_prefix');
        $data['Logo'] = $this->input->post('Logo');
        return $data;
    }

    function _prepare_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_organization_name','School Name','trim|required');
    }

}
