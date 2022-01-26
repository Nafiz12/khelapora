<?php
class Employee_designations extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Employee','Employee_designation','Config_class','Config_section'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    /**
     *
     */
    public function index()
   {
        $cond = array();
        $session_data = $this->input->get(); 
        if (is_array($session_data)) {
            $cond['EmployeeDesignation'] = isset($session_data['cbo_designation']) ? $session_data['cbo_designation'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Employee->row_count($cond);
        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/employee_designations/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        //$data=$this->_load_combo_data();
        //echo "<pre>";print_r($data);die;
        $data['list'] = $this->Employee_designation->get_designation_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;

        $data['headline'] = 'List Of Designation';
        $data['title'] = 'Disignation List';

        $this->layout->view('employee_designations/index',$data);
    }
    
        function add(){
            $data['designation_list']=$this->Employee->get_employee_designation();
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            // $this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');

            if ($this->form_validation->run() === TRUE)
            {
                $result=$this->Employee_designation->add($data['row']);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is succcessfully saved');
                    redirect('employee_designations/index', 'refresh');
                }
            }
        }
        $this->layout->view('employee_designations/add',$data);
    }

    function edit($id = null){
        // echo "<pre>";print_r($id);die;
        if($_POST)
        {
            $id = $this->input->post('DesignationId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['DesignationId'] = $this->input->post('DesignationId');
                if ($this->Employee_designation->edit($data['row'])) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('employee_designations/index', 'refresh');
                }
            }
        }

        $data['designation_list']=$this->Employee->get_employee_designation();
        $data['row']=$this->Employee_designation->read($id);
        $data['headline'] = 'Edit Designation';
        $data['title'] = 'Edit Designation';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('employee_designations/add',$data);
    }
    
        function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('employee_designations/index', 'refresh');
        }
        $result=$this->Employee_designation->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('employee_designations/index', 'refresh');
        }
    }
    
        function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: #ff3d92;">', '</div>');
        $this->form_validation->set_rules('txt_designation','EmployeeDesignation','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['DesignationName']=$this->input->post('txt_designation');
        return $data;
    }
}