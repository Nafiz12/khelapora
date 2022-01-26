<?php
class Report_student_dues extends MY_Controller{
    public function __construct()
	      {
	        parent::__construct();
	        $this->load->model(array('Report_student_due','Branch','Config_class','Student','Config_section','Organization'));
	        $this->load->helper('form');
	        $this->load->helper('security');
	        $this->load->helper('html');
	     }
    public function index()
	    {

	        $data['academic_year_list']=$this->get_academic_year();
			$data['branch_list']=$this->Branch->get_all_location_list();
	        $data['headline'] = 'Monthly Fee Schedule';
	        $data['title'] = 'Monthly Fee Schedule';
	        // echo "<pre>";print_r($data);die;
	        $this->layout->view('report_student_dues/index',$data);
	    }

	public function view($id = null)
	    {  

	        $data=$this->_load_combo_data();
	        $data['info'] = $this->_get_posted_data();
	        if(empty($id))
		        {
		        	$id = $data['info']['StudentId'];
		        }
	        // echo "<pre>";print_r($data);die;
	        $data['organization_info'] = $this->Organization->read(1);
	        $data['headline'] = 'Student Information';
	        $data['title'] = 'Student Information';
	        if (empty($id)) {
	            $this->session->set_flashdata('fail', 'Student ID is not provided');
	            redirect('report_student_dues/index/', 'refresh');
	        } else {
	            $data['row'] = $this->Student->get_student_information_for_payment_report($id);

	            $data['check_fee_configuration'] = $this->Report_student_due->fee_configuration_check($data['row']->BranchId,$data['row']->CourseId);

	            // echo "<pre>";print_r($data['check_fee_configuration']);die;
	            if( empty($data['info']['StudentId'] ) && empty($data['check_fee_configuration'])){
	            	$this->session->set_flashdata('fail', 'Please configure fee first !');
                    redirect('students/index', 'refresh');
	             // echo "<pre>";print_r($data);die;
	            }

	            if( !empty($data['info']['StudentId'] ) && empty($data['check_fee_configuration'])){
	            	$this->session->set_flashdata('fail', 'Please configure fee first !');
                    redirect('report_student_dues/index', 'refresh');
	             // echo "<pre>";print_r($data);die;
	            }

	            $data['payment_history'] = $this->get_student_list_by_class_and_section_payment($id,$data['row']->BranchId);

	             $data['fee_details'] = $this->Report_student_due->fee_details($id,$data['row']->BranchId);

	             // echo "ss<pre>";print_r($data);die;
	            $this->layout->view('report_student_dues/view', $data);
	        }
	    }

   


    public function _prepare_validation()
	    {
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
	        $this->form_validation->set_rules('BranchId','BranchId','trim|required');
	        $this->form_validation->set_rules('StudentId', 'StudentId', 'trim|required');
	    }
    
    public function _get_posted_data()
	    {
	        $data=array();
	        $data['BranchId']=$this->input->post('BranchId');
	        $data['StudentId']=$this->input->post('StudentId');

	        return $data;
	    }

    public function _load_combo_data() 
	    {
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
	        $data['get_month_list'] = $this->get_month_list();
	        return $data;
	    }

     function get_student_list_by_class_and_section_payment($student_id,$branch_id) {
       $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $student_id;
       
        $BranchId= $branch_id;

        $callback_message['status'] = 'failure';
        if (empty($class_id)) {
            $callback_message['message'] = 'Something went Wrong';
        }
        else
        {
           
            $payment_info = $this->Student->get_student_list_payment($class_id,$BranchId);
            return $payment_info;
        }
      
    }



}
?>