<?php
class Users extends CI_Controller{



    public function __construct()
    {
        parent::__construct();
         date_default_timezone_set('Asia/Dhaka');
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model(array('Config_general','User','User_role'));

    }


    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if (is_array($session_data)) {
            $cond['role_id'] = isset($session_data['role_id']) ? $session_data['role_id'] : '';
            $cond['LocationId'] = isset($session_data['LocationId']) ? $session_data['LocationId'] : '';
        }

        $this->load->library('pagination');
        $total = $this->User->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/users/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);

        $data['list'] = $this->User->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
        $data['user_roles']=$this->User_role->get_list();
        $data['session_data'] = $session_data;

        $data['headline'] = 'List Of Users';
        $data['title'] = 'User List';
        //$data['location_infos'] = $this->Location->get_all_location_list();
        $this->layout->view('Users/index',$data);
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
                    redirect('index.php/Users/index', 'refresh');
                }
            }
            else{
                $data['row'] = $data;
            }
        }
        $data['user_roles']=$this->User_role->get_list();
        //$data['location_infos'] = $this->Location->get_all_location_list();
        $data['title']="Add New User";
        $this->layout->view("Users/add",$data);
    }
    function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['id'] = $this->input->post('id');
                unset($data['password']);
                //echo '<pre>'; print_r($data); die;
                if ($this->User->edit($data)) {
                    $this->session->set_flashdata('success', 'User has been updated successfully');
                    redirect('index.php/Users/index', 'refresh');
                }
            }else{
                echo'<pre>'; print_r(validation_errors()); die;
            }
        }
        $data['headline'] = 'Edit User';
        $data['title'] = 'Edit User Entry';
        //$data['location_infos'] = $this->Location->get_all_location_list();
        $data['row'] = $this->User->read($id);
        $data['user_roles']=$this->User_role->get_list();
        $this->layout->view('Users/add', $data);
    }

    function delete($id)
    {
        if(empty($id)){
            return false;
        }
       
        // $fee_dependency_found = $this->Config_general->is_dependency_found('fees', array('EntryBy' => $id));
        // $student_dependency_found = $this->Config_general->is_dependency_found('students', array('EntryBy' => $id));

        // if( $fee_dependency_found || $student_dependency_found)
        // {
        //     $this->session->set_flashdata('fail','Dependent Data Found');
        //     redirect('index.php/Users/index/', 'refresh');
        // }
        //else{
            $this->User->delete($id);
            $this->session->set_flashdata('success', 'The Information Is Successfully Deleted');
            redirect('index.php/Users/index/', 'refresh');
       // }
    }
    function _prepare_validation()
    {
               // echo "<pre>";print_r($this->uri->segment(2));die;
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('status','Status','trim|required');
        $this->form_validation->set_rules('role_id','Role','trim|required');
        //$this->form_validation->set_rules('cbo_location','Location','trim|required');
        if($this->uri->segment(2) == 'add')
        {
            $this->form_validation->set_rules('user_name','User Name','trim|required|callback_username_check');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation','required|matches[password]');
        }
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
  // echo "wsWw<pre>";print_r( $r);die;
                    if($r){
                        $this->session->set_flashdata('success', 'Your Password is successfully changed.');
                        redirect('index.php/Dashboards/', 'refresh');
                    }
                }
                else{
                    $this->session->set_flashdata('fail', 'Your Old password does not correct.');
                    redirect('index.php/Users/change_password/', 'refresh');
                }
            }
        }
        $data['title']="Change User Password";
        $this->layout->view("Users/change_password",$data);
    }
    function _get_posted_data() {
        $data = array();
        $data['password'] = $this->input->post('password');
        $data['passconf'] = $this->input->post('passconf');
        $data['role_id'] = $this->input->post('role_id');
        $data['name'] = $this->input->post('txt_name');
        $data['reg_date'] = date("Y-m-d", strtotime($this->input->post('reg_date')));
        $data['status'] = $this->input->post('status');
        $data['user_name'] = $this->input->post('user_name');
        return $data;
    }
}
?>
