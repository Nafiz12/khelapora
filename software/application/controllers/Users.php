<?php
class Users extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('captcha');
        $this->load->library('pagination');
        $this->load->helper('html');
        //$this->load->library('encrypt');
        $this->load->model(array('Config_general','User','user_role','Branch'));
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
            $cond['role_id'] = isset($session_data['role_id']) ? $session_data['role_id'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }

        $this->load->library('pagination');
        $total = $this->User->row_count($cond);
        //Initializing Pagination
        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/users/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 50;
        $this->pagination->initialize($config);

        $data['list'] = $this->User->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        //echo '<pre>'; echo $this->db->last_query(); die;
        $data['user_roles']=$this->user_role->get_list();
        $data['session_data'] = $session_data;
        $data['headline'] = 'List Of Users';
        $data['title'] = 'User List';
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $this->layout->view('users/index',$data);
    }
    function add()
    {
        if($_POST)
        {
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['id'] = NULL;
                if ($this->User->add($data)) {
                    $this->session->set_flashdata('success', ' New User has been added successfully');
                    redirect('users/index', 'refresh');
                }
            }
            else{
                $data['row'] = $data;
            }
        }
        $data['user_roles']=$this->user_role->get_list();
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $data['title']="Add New User";
        $this->layout->view("users/add",$data);
    }
    function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['id'] = $this->input->post('id');
                $user_information = $this->User->read($id);
                // if($user_information->password != $data['password']){
                //     $data['password']=md5($data['password']);
                // }
                if ($this->User->edit($data)) {
                    $this->session->set_flashdata('success', 'User has been updated successfully');
                    redirect('users/index', 'refresh');
                }
            }else{
                echo'<pre>'; print_r(validation_errors()); die;
            }
        }
        $data['headline'] = 'Edit User';
        $data['title'] = 'Edit User Entry';
        $data['row'] = $this->User->read($id);
        $data['user_roles']=$this->user_role->get_list();
        $data['branch_list'] = $this->Branch->get_all_location_list();
        $this->layout->view('users/add', $data);
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
            redirect('users/index/', 'refresh');
        }
        else{
            $this->User->delete($id);
            $this->session->set_flashdata('success', 'The Information Is Successfully Deleted');
            redirect('users/index/', 'refresh');
        }
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
            $this->form_validation->set_rules('user_name','User Name','trim|required|callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password_length');
            $this->form_validation->set_rules('passconf', 'Password Confirmation','required|matches[password]');
        }
    }
    function check_password_length(){
        $password = $this->input->post('password');
        if(strlen($password) < 8){
            $this->form_validation->set_message('check_password_length', "Password must be at least 8 characters long.");
            return FALSE;
        }
        return TRUE;
    }
    public function username_check($str)
    {
        $r=$this->User->check_unique_user_name($str);
        if($r)
        {
            $this->form_validation->set_message('username_check', 'This User Name is already being used.');
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
                $user_data = $this->User->read($id);
                if($user_data->password == md5($_POST['old_password'])){
                    $r=$this->User->update_password($id,$_POST['password']);
                    if($r){
                        $this->session->set_flashdata('success', 'Your Password is successfully changed.');
                        redirect('home/index/', 'refresh');
                    }
                }
                else{
                    $this->session->set_flashdata('fail', 'Your Old password does not correct.');
                    redirect('users/change_password/', 'refresh');
                }
            }
        }
        $data['title']="Change User Password";
        $this->layout->view("users/change_password",$data);
    }
    function _get_posted_data() {
        $data = array();
        $data['password'] = $this->input->post('password');
        $data['BranchId'] = $this->input->post('cbo_branch');
        $data['passconf'] = $this->input->post('passconf');
        $data['role_id'] = $this->input->post('role_id');
        $data['name'] = $this->input->post('txt_name');
        $data['reg_date'] = date("Y-m-d", strtotime($this->input->post('reg_date')));
        $data['status'] = $this->input->post('status');
        $data['user_name'] = $this->input->post('user_name');
        $data['IsAdmin'] = $this->input->post('IsAdmin');
        return $data;
    }
}
?>
