<?php
class Employee_departments extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Employee_department'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    public function index()
    {
        $data['headline'] = 'List Of Department';
        $data['title'] = 'Department List';
        $data['list'] = $this->Employee_department->get_list();
        $this->layout->view('employee_departments/index',$data);
    }

    function add(){
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            // $this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');

            if ($this->form_validation->run() === TRUE)
            {
                $result=$this->Employee_department->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('employee_departments/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'List Of Department';
        $data['title'] = 'Department List';
        $this->layout->view('employee_departments/add',$data);
    }

    function edit($id = null){
        // echo "<pre>";print_r($id);die;
        if($_POST)
        {
            $id = $this->input->post('DepartmentId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['DepartmentId'] = $this->input->post('DepartmentId');
                if ($this->Employee_department->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('employee_departments/index', 'refresh');
                }
            }
        }
        $data['row']=$this->Employee_department->read($id);


        $data['headline'] = 'Edit Department';
        $data['title'] = 'Edit Department';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('employee_departments/add',$data);
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('employee_departments/index', 'refresh');
        }
        $result=$this->Employee_department->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('employee_departments/index', 'refresh');
        }
    }

    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: #ff3d92;">', '</div>');
        $this->form_validation->set_rules('txt_department','Employee Department','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['DepartmentName']=$this->input->post('txt_department');
        return $data;
    }
}