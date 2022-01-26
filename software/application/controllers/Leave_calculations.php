<?php
class Leave_calculations extends MY_Controller{

   public function __construct()
   {
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->helper('captcha');
		$this->load->library('pagination');
	   	$this->load->helper('html');
		$this->load->model(array('config_general','User','Leave_calculation','user_role'));
		
		
	}

	/**
	
	* 
	* @uses    To view doctor list page
	* @access  public
	* @param   void
	* @return  void
	* @author  Md.Sujon
	*/

	public function index()
	{
		$cond = array();
		$session_data = $this->input->get(); 
		//echo"a<pre>"; print_r($session_data); //die;
		if (is_array($session_data)) {
			$cond['Year'] = isset($session_data['Year']) ? $session_data['Year'] : '';
	
                }

		$this->load->library('pagination');
		$total = $this->Leave_calculation->row_count($cond);

		//Initializing Pagination

		$config['enable_query_string']=TRUE;
		$config['suffix']="?".  http_build_query($session_data,"&amp;");
		$config['base_url'] = site_url('/leave_calculations/index');
		$config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$this->pagination->initialize($config);

		$data['list'] = $this->Leave_calculation->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

		$data['headline'] = 'List Of Leave Calculation';
		$data['title'] = 'List Of Leave Calculation';

		$this->layout->view('leave_calculations/index',$data);
	}

        
	public function add()
	{

		$data = array();
		if($_POST)
		{

            $this->_prepare_validation();
            $data = $this->_get_posted_data();
             // echo"a<pre>"; print_r($data); die;
            
            if ($this->form_validation->run()) {
                if ($this->Leave_calculation->add($data)) {
                    $this->session->set_flashdata('success', ' Data added successfully');
                    redirect('leave_calculations/index', 'refresh');
                }
            }
            else{
            	
                $data['row'] = $data;
            }
		}
		$data['title']="Add New Leave Category";

		$this->layout->view("leave_calculations/add",$data);
	}
 
    public function edit($id = null) {
        if ($_POST) {
            $id = $this->input->post('LeaveCalculationId');
            $this->_prepare_validation();
            $data = $this->_get_posted_data();
            if ($this->form_validation->run()) {
                $data['LeaveCalculationId'] = $this->input->post('LeaveCalculationId');
          
                if ($this->Leave_calculation->edit($data)) {
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('leave_calculations/index', 'refresh');
                }
            }else{
            	$data['row'] = $data;
                
            }
        }
        $data['headline'] = 'Edit Leave Category';
        $data['title'] = 'Edit Leave Category';
        $data['row'] = $this->Leave_calculation->read($id);
        
        $this->layout->view('leave_calculations/add', $data);
    }
        
        
        public function delete($id)
	{
		if(empty($id))
		{
			return false;
		}
                        $r=$this->Leave_calculation->delete($id);
			$this->session->set_flashdata('success', 'The Information Is Successfully Deleted');
			redirect('leave_calculations/index/', 'refresh');
		
	}
	
	public function _prepare_validation()
	{	
		$this->load->library('form_validation');
               $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
		
			$this->form_validation->set_rules('Year','Year','trim|required');
                        $this->form_validation->set_rules('SickLeave','SickLeave','trim|required');
                         $this->form_validation->set_rules('EarnLeave','EarnLeave','trim|required');
			
		
	}
	
	/**
	
	* 
	* @uses    To get all input data
	* @access  public
	* @param   void
	* @return  $data
	* @author  Md.Sujon
	*/

    public function _get_posted_data() {
        $data = array();
        $data['Year'] = $this->input->post('Year');
        $data['SickLeave'] = $this->input->post('SickLeave');
        $data['EarnLeave'] = $this->input->post('EarnLeave');

 
        return $data;
    }

	
}
?>
