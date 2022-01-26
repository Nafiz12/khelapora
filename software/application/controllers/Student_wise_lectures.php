<?php
class Student_wise_lectures extends MY_Controller{
    public function __construct()
	      {
	        parent::__construct();
	        $this->load->model(array('Report_student_due','Branch','Manage_library_book','Config_class','Student','Config_section','Organization'));
	        $this->load->helper('form');
	        $this->load->helper('security');
	        $this->load->helper('html');
	     }
    public function index()
	    {

	        $data['academic_year_list']=$this->get_academic_year();
			$data['branch_list']=$this->Branch->get_all_location_list();
	        $data['headline'] = 'Student Wise Lectures';
	        $data['title'] = 'Student Wise Lectures';
	        // echo "<pre>";print_r($data);die;
	        $this->layout->view('reports/student_wise_lectures/index',$data);
	    }

	public function view($id = null)
	    {  

	        $data=$this->_load_combo_data();
	        $data['info'] = $this->_get_posted_data();
	        
	        if(empty($id))
		        {
		        	$id = $data['info']['StudentId'];
		        }
		     
	        // echo "<pre>";print_r($id);die;
	        $data['organization_info'] = $this->Organization->read(1);
	        $data['headline'] = 'Student Wise Lectures Information';
	        $data['title'] = 'Student Wise Lectures Information';
	        if (empty($id)) {
	            $this->session->set_flashdata('fail', 'Student ID is not provided');
	            redirect('student_wise_lectures/index/', 'refresh');
	        } else {
	            $data['row'] = $this->Student->get_student_information_for_payment_report($id);
	             $data['lecture_details'] = $this->get_student_wise_lecture_info($id,$data['info']['BranchId']);

	             // echo "ss<pre>";print_r($data);die;
	            $this->layout->view('reports/student_wise_lectures/view', $data);
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
	      
	        $data['branch_list']=$this->Branch->get_all_location_list();
	        $data['academic_year_list']=$this->get_academic_year();
	        $data['shift_list']=$this->get_shift();
	        $data['medium_list']=$this->get_medium();
	        
	        $data['blood_group_list']=$this->get_blood_group();
	        $data['religion_list']=$this->get_religion();
	        $data['get_month_list'] = $this->get_month_list();
	        return $data;
	    }

     function get_student_wise_lecture_info($student_id,$branch_id) {
       $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $student_id = $student_id;
       
        $BranchId= $branch_id;

        $callback_message['status'] = 'failure';
        if (empty($student_id)) {
            $callback_message['message'] = 'Something went Wrong';
        }
        else
        {
           
            $lecture_info = $this->Manage_library_book->get_student_wise_lectures($student_id,$BranchId);

            // echo "<pre>";print_r($lecture_info);die;
            return $lecture_info;
        }
      
    }



}
?>