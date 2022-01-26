<?php
class Leave_applies extends MY_Controller{

   public function __construct()
   {
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('captcha');
		$this->load->library('pagination');
	   	$this->load->helper('html');
		$this->load->model(array('config_general','User','Leave_apply','user_role'));
		
		
	}

	/*
	* @uses    To view doctor list page
	* @access  public
	* @param   void
	* @return  void
	* @author  Md.Ahatasham
	*/

	public function index()
	{
		$data = $this->_load_combo_data();
		
		$cond = array();
		$session_data = $this->input->get(); 
		//echo"a<pre>"; print_r($session_data); //die;
		if (is_array($session_data)) {
			$cond['Name'] = isset($session_data['Name']) ? $session_data['Name'] : '';
		}

		$this->load->library('pagination');
		$total = $this->Leave_apply->row_count($cond);

		//Initializing Pagination

		$config['enable_query_string']=TRUE;
		$config['suffix']="?".  http_build_query($session_data,"&amp;");
		$config['base_url'] = site_url('/leave_applies/index');
		$config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$this->pagination->initialize($config);

		$data['list'] = $this->Leave_apply->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

		$data['headline'] = 'List Of Leave';
		$data['title'] = 'Leaves List';

		$this->layout->view('leave_applies/index',$data);
	}


	/**
	
	* 
	* @uses    To add doctor info
	* @access  public
	* @param   void
	* @return  void
	* @author  Md.Ahatasham
	*/

	public function add()
	{

		$data = array();
		if($_POST)
		{

            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            //echo"a<pre>"; print_r($data); die;
            
            if ($this->form_validation->run()) {
                
                 // echo "<pre>";print_r($data);die;
                
                if ($this->Leave_apply->add($data)) {
                    $this->session->set_flashdata('success', ' Added successfully');
                    redirect('leave_applies/index', 'refresh');
                }
            }
            else{
            	
                $data['row'] = $data;
            }
		}
                $data = $this->_load_combo_data();
                $user_session=$this->session->userdata('system.user'); 
                $data['leave_info']=$this->Leave_apply->leave_info($user_session['id']);
                //echo"M<pre>";print_r($data);die; 
		
		$data['title']="Add Leave";
                //echo"<pre>";print_r($data);die; 
		$this->layout->view("leave_applies/add",$data);
	}
        
        
      public function _load_combo_data()
		{	
			$data['leave_category'] = $this->Leave_apply->get_leave_categories();
			return $data;
		}

	/**
	
	* 
	* @uses    To edit doctor info
	* @access  public
	* @param   doctor_id $id
	* @return  void
	* @author  Md.Ahatasham
	*/
    public function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('LeaveApplicationId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['LeaveApplicationId'] = $this->input->post('LeaveApplicationId');
          
                if ($this->Leave_apply->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('leave_applies/index', 'refresh');
                }
            }else{
            	$data['row'] = $data;
                
            }
        }
        $data = $this->_load_combo_data();
        $data['headline'] = 'Edit Leave Category';
        $data['title'] = 'Edit Leave Category';
        $data['row'] = $this->Leave_apply->read($id);
        
        
        //echo"<pre>";print_r($data);die;
        $this->layout->view('leave_applies/add', $data);
    }
     /**
	
	* 
	* @uses    To delete doctor info
	* @access  public
	* @param   doctor_id $id
	* @return  void
	* @author  Md.Ahatasham
	*/
       public function delete($id)
	{
		if(empty($id))
		{
			return false;
		}
                        $r=$this->Leave_apply->delete($id);
			$this->session->set_flashdata('success', 'The Information Is Successfully Deleted');
			redirect('leave_applies/index/', 'refresh');
		
	}
 	
 	/**
	
	* 
	* @uses    To check validation
	* @access  public
	* @param   void
	* @return  void
	* @author  Md.Ahatasham
	*/

	public function _prepare_validation()
	{	
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
		
			$this->form_validation->set_rules('LeaveCategoriesId', 'Leave Category','required');
			$this->form_validation->set_rules('Date', 'Date','required');
                        $this->form_validation->set_rules('ToDate', 'To Date','required');
                        $this->form_validation->set_rules('FromDate', 'From Date','required');
		
	}
	
	/**
	
	* 
	* @uses    To get all input data
	* @access  public
	* @param   void
	* @return  $data
	* @author  Md.Ahatasham
	*/

    public function _get_posted_data() {
        $data = array();
        $user_session=$this->session->userdata('system.user');
        $data['LeaveCategoriesId'] = $this->input->post('LeaveCategoriesId');
        $data['Reason'] = $this->input->post('Reason');
        $data['ToDate'] = date('Y-m-d',strtotime($this->input->post('ToDate')));
        $data['FromDate'] = date('Y-m-d',strtotime($this->input->post('FromDate')));
        $data['Date'] = date('Y-m-d',strtotime($this->input->post('Date')));
        $data['IsApproved']=0;
        
        $data['UserId'] = $user_session['id'];
        return $data;
    }
	
}
?>
