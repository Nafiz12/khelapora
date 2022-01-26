<?php
class Student_parents extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
        $this->load->model(array('Config_general','Student_parent','user_role','Branch','Config_class','Config_section'));
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
            $cond['ClassId'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
            $cond['SectionId'] = isset($session_data['cbo_section']) ? $session_data['cbo_section'] : '';
            $cond['StudentName'] = isset($session_data['StudentName']) ? $session_data['StudentName'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Student_parent->row_count($cond);
        //Initializing Pagination
        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/student_parents/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 50;
        $this->pagination->initialize($config);

        $data=$this->_load_combo_data();
        $data['list'] = $this->Student_parent->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Student Parent';
        $data['title'] = 'Student parent List';
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $this->layout->view('student_parents/index',$data);
    }
    function add()
    {
        if($_POST)
        {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['id'] = NULL;
                if ($this->Student_parent->add($data)) {
                    $this->session->set_flashdata('success', ' New Student_parent has been added successfully');
                    redirect('student_parents/index', 'refresh');
                }
            }
            else{
                $data['row'] = $data;
            }
        }
        $data['user_roles']=$this->user_role->get_list();
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $data['title']="Add New Student_parent";
        $this->layout->view("student_parents/add",$data);
    }
    function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['id'] = $this->input->post('id');
                $parent_information = $this->Student_parent->read($id);
                if($parent_information->password != $data['password']){
                    $data['password']=md5($data['password']);
                }
                if ($this->Student_parent->edit_user($data)) {
                    $this->session->set_flashdata('success', 'Student_parent has been updated successfully');
                    redirect('student_parents/index', 'refresh');
                }
            }else{
                echo'<pre>'; print_r(validation_errors()); die;
            }
        }
        $data['headline'] = 'Edit Student_parent';
        $data['title'] = 'Edit Student_parent Entry';
        $data['row'] = $this->Student_parent->read($id);
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $this->layout->view('student_parents/add', $data);
    }

    function delete($id)
    {
        if(empty($id)){
            return false;
        }
        $mark_dependency_found = $this->Config_general->is_dependency_found('mark_details', array('EntryBy' => $id));
        $fee_dependency_found = $this->Config_general->is_dependency_found('fees', array('EntryBy' => $id));
        $student_dependency_found = $this->Config_general->is_dependency_found('students', array('EntryBy' => $id));

        if($mark_dependency_found || $fee_dependency_found || $student_dependency_found)
        {
            $this->session->set_flashdata('fail','Dependent Data Found');
            redirect('student_parents/index/', 'refresh');
        }
        else{
            $this->Student_parent->delete($id);
            $this->session->set_flashdata('success', 'The Information Is Successfully Deleted');
            redirect('student_parents/index/', 'refresh');
        }
    }
    function _load_combo_data() {
        $data = array();

        $cond['BranchId']=  $this->get_location_id();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['section_list']=$this->Config_section->get_list();
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['academic_year_list']=$this->get_academic_year();
        $data['shift_list']=$this->get_shift();
        $data['medium_list']=$this->get_medium();
        $data['father_occupation_list']=$this->get_fathers_occupation();
        $data['mother_occupation_list']=$this->get_mothers_occupation();
        $data['blood_group_list']=$this->get_blood_group();
        $data['religion_list']=$this->get_religion();
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('status','Status','trim|required');
        $this->form_validation->set_rules('role_id','Role','trim|required');
        //$this->form_validation->set_rules('cbo_location','Location','trim|required');
        if($this->uri->segment(2) == 'add')
        {
            $this->form_validation->set_rules('user_name','Student_parent Name','trim|required|callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation','required|matches[password]');
        }
    }
    public function username_check($str)
    {
        $r=$this->Student_parent->check_unique_user_name($str);
        if($r)
        {
            $this->form_validation->set_message('username_check', 'This Student_parent Name is already being used.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    function change_password()
    {

        if($_POST)
        {
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div>&nbsp;</div><div></div><font color="#FF0000">', '</font></div>');
            $this->form_validation->set_rules('old_password','Old Password','trim|required');
            $this->form_validation->set_rules('password', 'New Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation','required|matches[password]');

            if ($this->form_validation->run() === TRUE)
            {
                $id = $this->input->post('id');
                $user_data = $this->Student_parent->read($id);
                if($user_data->password == md5($_POST['old_password'])){
                    $r=$this->Student_parent->update_password($id,$_POST['password']);
                    if($r){
                        $this->session->set_flashdata('success', 'Your Password is successfully changed.');
                        redirect('home/index/', 'refresh');
                    }
                }
                else{
                    $this->session->set_flashdata('fail', 'Your Old password does not correct.');
                    redirect('student_parents/change_password/', 'refresh');
                }
            }
        }
        $data['title']="Change Student_parent Password";
        $this->layout->view("student_parents/change_password",$data);
    }
    function _get_posted_data() {
        $data = array();
        $data['password'] = $this->input->post('password');
        //$data['passconf'] = $this->input->post('passconf');
        $data['role_id'] = $this->input->post('role_id');
        $data['status'] = $this->input->post('status');
        $data['user_name'] = $this->input->post('user_name');
        return $data;
    }
}
?>
