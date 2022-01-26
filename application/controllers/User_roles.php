<?php 
class User_roles extends CI_Controller{
	public function __construct()
    {
		//$this->output->enable_profiler(TRUE);	
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		//$this->load->helper('captcha');
		$this->load->library('pagination');
		$this->load->library('layout');
		//$this->load->library('encrypt');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->model(array('Config_general','user_role'));
		$this->load->helper('html');
	}
	public function index()
	{ 
		$cond=null;
		if($_POST)
		{
			$data['search']=$_POST['search'];
			$name=$_POST['search'];
			$cond=" role_name like '%$name%' ";
		}
		$this->load->library('pagination');

		$config['base_url'] = base_url()."index.php/user_roles/index";
		$config['total_rows'] = $this->Config_general->get_total_rows('user_roles');
		$config['per_page'] = 3;
		$this->pagination->initialize($config);
		$data['user_roles'] = $this->user_role->get_list($cond,3, (int) $this->uri->segment(3));
		$data['user_roles']=$this->user_role->get_list();
		$data['title']="User Roles";
		$this->layout->view("user_roles/index",$data);
	}
	function add()
	{
		if($_POST)
		{
			$data['pd']=$this->input->post();
			$this->_prepare_validation();
			if ($this->form_validation->run() === TRUE) {
				// echo "<pre>";print_r($data);die;
				$result=$this->user_role->add($_POST);
				if($result)
				{
					$this->session->set_flashdata('success', 'New User Roles Is Successfully Added');
					redirect('index.php/user_roles/index/', 'refresh');
				}
			}
		}
		//$data['form_data']=$this->config_general->load_config_form_data('user_roles');
		$data['title']="Add User Roles";
		$this->layout->view("user_roles/add",$data);
	}
	function edit($id = null)
	{
		if($_POST)
		{
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
			if ($this->form_validation->run() === TRUE) {
                $data['id'] = $this->input->post('id');
                if ($this->user_role->edit($data)) {
                    $this->session->set_flashdata('message', 'Data has been updated successfully');
                    redirect('index.php/user_roles/index', 'refresh');
                }
			}
		}
        $data['title']="Edit User Roles";
        $data['row']=$this->user_role->read($id);
		$this->layout->view("user_roles/add",$data);
	}
	function _prepare_validation()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
		$this->form_validation->set_rules('role_name','Role Name','trim|xss_clean|required');
		$this->form_validation->set_rules('role_description','Role Description','trim|xss_clean');

	}
	function delete($id)
	{
        if(empty($id)){
            return false;
        }

        // echo"<pre>";print_r($id);die;
        $user_dependency_found = $this->Config_general->is_dependency_found('user', array('role_id' => $id));

        if($user_dependency_found){
            $this->session->set_flashdata('fail','Dependent Data Found');
            redirect('index.php/users/index/', 'refresh');
        }
        else{
            $this->user_role->delete($id);
            $this->session->set_flashdata('success', 'The Information Is Successfully Deleted');
            redirect('index.php/users/index/', 'refresh');
        }
		
	}
	function user_role_wise_privillige($role_id)
	{
		if(empty($role_id)){
			return false;
		}
		if($_POST)
		{
//			echo "<pre>"; print_r($this->input->post());die;
//			$dat = $this->input->post();
//			echo "<pre>";print_r($dat);die;
			$this->user_role->save_user_user_role_wise_privileges($this->input->post(),$role_id);
			$this->session->set_flashdata('success', 'The Information Is Successfully Saved');
					//redirect(current_url(), 'refresh');
			redirect('index.php/user_roles/index/', 'refresh');
		}
		
		$this->load->library('user_role_wise_privilliages');
		$data['saved_data']=$this->user_role->get_user_user_role_wise_privileges($role_id);
		$data['items']=$this->user_role_wise_privilliages->generate_role_data();
		//echo "<pre>"; print_r($a);
		$data['title']="User Role Wise Previllige";
		$this->layout->view("user_roles/user_role_wise_privillige",$data);
	}
    function _get_posted_data() {
        $data = array();
        $data['role_name'] = $this->input->post('role_name');
        $data['role_description'] = $this->input->post('role_description');
        return $data;
    }
}
?>
