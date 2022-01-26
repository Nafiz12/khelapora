<?php
class Leave_authorizations extends MY_Controller{

   public function __construct()
   {
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('captcha');
		$this->load->library('pagination');
	   	$this->load->helper('html');
		$this->load->model(array('config_general','User','Leave_authorization','user_role'));
		
		
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
		$total = $this->Leave_authorization->row_count($cond);

		//Initializing Pagination

		$config['enable_query_string']=TRUE;
		$config['suffix']="?".  http_build_query($session_data,"&amp;");
		$config['base_url'] = site_url('/leave_authorizations/index');
		$config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$this->pagination->initialize($config);

		$data['list'] = $this->Leave_authorization->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

		$data['headline'] = 'List Of Leave';
		$data['title'] = 'Leaves List';

		$this->layout->view('leave_authorizations/index',$data);
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
                if ($this->Leave_authorization->approved($id)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('leave_authorizations/index', 'refresh');
                }
     
    }
    
     public function delete($id = null) {  
                if ($this->Leave_authorization->reject($id)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('leave_authorizations/index', 'refresh');
                }
     
    }

  public function _load_combo_data()
		{	
			$data['leave_category'] = $this->Leave_authorization->get_leave_categories();
			return $data;
		}	
	
}
?>
