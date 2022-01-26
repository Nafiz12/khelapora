<?php
class Employees extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Employee','Config_class','Config_section','Branch','Organization','User'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }

    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        $employee_data=$this->session->userdata('system.employee');
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['DesignationId'] = isset($session_data['cbo_designation']) ? $session_data['cbo_designation'] : '';
            $cond['EmployeeName'] = isset($session_data['EmployeeName']) ? $session_data['EmployeeName'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
            if(!empty($employee_data) && isset($employee_data)){
                $cond['EmployeeId'] = isset($session_data['EmployeeId']) ? $session_data['EmployeeId'] : $employee_data['EmployeeId'];
            }
        }

        $this->load->library('pagination');
        $total = $this->Employee->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/employees/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['designation_list']=$this->Employee->get_employee_designation();
        $data['list'] = $this->Employee->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'List Of Employees';
        $data['title'] = 'Employee List';

        $this->layout->view('employees/index',$data);
    }

    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            //echo '<pre>'; print_r($data); die;
            $data['row']['EmployeeId'] = $this->Employee->get_new_id('employees', 'EmployeeId');
            $this->_prepare_validation();
            $this->form_validation->set_rules('txt_code','Employee Code','trim|required|is_unique[employees.EmployeeCode]');
            if ($this->form_validation->run() === TRUE) {
                if($this->Employee->add($data['row']))
                {
                    //Users Array
                    $user_array['id'] = $this->Employee->get_new_id('user', 'id');
                    $user_array['BranchId'] = $data['row']['BranchId'];
                    if($data['row']['IsTeacher']){
                        $user_array['role_id'] = $this->Employee->get_role_id('T');
                    }else{
                        $user_array['role_id'] = $this->Employee->get_role_id('E');
                    }
                    $user_array['reg_date'] = date('Y-m-d');
                    $user_array['name'] = $data['row']['EmployeeName'];
                    $user_array['status'] = 1;
                    $user_array['user_name'] =$data['row']['ContactNumber'];
                    $user_array['password'] = md5($data['row']['ContactNumber']);
                    $user_array['is_parents'] =0;
                    $user_array['is_employee'] =1;
                    $this->User->user_add($user_array);

                    $image_name = $this->do_upload();
                    $employee_image['EmployeeId'] = $data['row']['EmployeeId'];
                    $employee_image['Image'] = $image_name;
                    $employee_image['UserId'] = $user_array['id'];
                    $this->Employee->edit($employee_image);

                    $this->session->set_flashdata('success', 'Data successfully saved');
                    redirect('employees/index', 'refresh');
                }
            }else{
                echo '<pre>'; echo validation_errors(); die;
                $this->session->set_flashdata('fail', 'Something is wrong.Please Try again');
                redirect('employees/index', 'refresh');
            }
        }
        $data['employee_code']=$this->Employee->get_employee_code();
        $data['headline'] = 'Add New Employee';
        $data['title'] = 'Add New Employee';
        $this->layout->view('employees/add',$data);
    }
    function view($id = null){
        $data=$this->_load_combo_data();
        $data['organization_info'] = $this->Organization->read(1);
        $data['headline'] = 'Employee Information';
        $data['title'] = 'Employee Information';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'Employee ID is not provided');
            redirect('employees/index/', 'refresh');
        } else {
            $data['row'] = $this->Employee->get_employee_information($id);
            $this->layout->view('employees/view', $data);
        }
    }

    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('employees/index', 'refresh');
        }
        $employee_info = $this->Employee->read($id);
        if($employee_info->Image != ''){
            $url="media/employee_pictures/".$employee_info->Image;
            unlink($url);
        }

        $result=$this->Employee->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('employees/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['EmployeeId'] = $this->input->post('EmployeeId');
                // echo '<pre>'; print_r($_FILES); //die;
                if($_FILES['image']['name'] != ''){
                    $employee_info = $this->Employee->read($data['row']['EmployeeId']);
                    if($employee_info->Image != ''){
                        $url="media/employee_pictures/".$employee_info->Image;
                        unlink($url);
                    }
                    $image_name = $this->do_upload();
                    $data['row']['Image'] = $image_name;
                }else{
                    unset($data['row']['Image']);
                }
                if ($this->Employee->edit($data['row'])) {
                    $employee_info = $this->Employee->read($data['row']['EmployeeId']);
                    $user_array['id'] = $employee_info->UserId;
                    $user_array['password'] = md5($data['row']['ContactNumber']);
                    $user_array['name'] = $data['row']['EmployeeName'];
                    $user_array['user_name'] =$data['row']['ContactNumber'];
                    $this->User->edit_user($user_array);

                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('employees/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $data['row']=$this->Employee->read($id);
        $data['headline'] = 'Edit Employee';
        $data['title'] = 'Edit Employee';
        //echo "<pre>";print_r($data);die;
        $this->layout->view('employees/add',$data);
    }
    private function do_upload()
    {
        $type=explode('.',$_FILES['image']['name']);
        $type=$type[count($type)-1];

        $image_name = uniqid(rand()).'.'.$type;

        $url="media/employee_pictures/".$image_name;
        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf')))
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$url))
            {
                return $image_name;
            }
        }
    }

    function _load_combo_data() {
        $data = array();
        $data['designation_list']=$this->Employee->get_employee_designation();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['blood_group_list']=$this->get_blood_group();
        $data['degree_list']=$this->get_last_achieved_degree();

        //echo"<pre>"; print_r($data); die;
        return $data;
    }

    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: #ff3d92;">', '</div>');
        $this->form_validation->set_rules('txt_name','Employee Name','trim|required');
        $this->form_validation->set_rules('BranchId','Branch','trim|required');
        $this->form_validation->set_rules('txt_code','Employee Code','trim|required');
        $this->form_validation->set_rules('txt_date_of_birth','DateOfBirth','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchId']=$this->input->post('BranchId');
        $data['EmployeeName']=$this->input->post('txt_name');
        $data['EmployeeCode']=$this->input->post('txt_code');
        $data['DateOfBirth']=date("Y-m-d", strtotime($this->input->post('txt_date_of_birth')));
        $data['Email']=$this->input->post('txt_email');
        $data['Nid']=$this->input->post('txt_nid');
        $data['ContactNumber']=$this->input->post('txt_number');
        $data['AltContactNumber']=$this->input->post('txt_alt_number');
        $data['Gender']=$this->input->post('cbo_gender');
        $data['BloodGroup']=$this->input->post('BloodGroup');
        $data['FathersName']=$this->input->post('txt_fathers_name');
        $data['MothersName']=$this->input->post('txt_mothers_name');
        $data['SpouseName']=$this->input->post('txt_spouse_name');
        $data['PresentAddress']=$this->input->post('PresentAddress');
        $data['PermanentAddress']=$this->input->post('PermanentAddress');
        $data['DateOfJoining']=date("Y-m-d", strtotime($this->input->post('txt_date_of_joining')));
        $data['DesignationId']=$this->input->post('DesignationId');
        $data['CurrentSalary']=$this->input->post('txt_current_salary');
        $data['Ref1']=$this->input->post('txt_ref1');
        $data['RefContactNumber']=$this->input->post('txt_ref_number');
        $data['Ref2']=$this->input->post('txt_ref2');
        $data['Ref2ContactNumber']=$this->input->post('txt_ref2_number');
        $data['Status']=$this->input->post('cbo_status');
        $data['DegreeId']=$this->input->post('DegreeId');
        $data['IsTeacher']=$this->input->post('IsTeacher');
        if($data['Status'] =='T' ||  $data['Status'] =='R'){
            $data['Reason']=$this->input->post('txt_reason');
        }

        return $data;
    }

}
?>
