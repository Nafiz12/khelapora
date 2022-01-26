<?php
class Batch_students extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student','Config_class','Config_section','Branch'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $student_data=$this->_get_posted_data();
            $student_array = array();
            $i=1;
            foreach($student_data['StudentName'] as $row){
                $student_array[$i]['BranchId'] = $student_data['BranchId'];
                $student_array[$i]['Shift'] = $student_data['Shift'];
                $student_array[$i]['Year'] = $student_data['Year'];
                $student_array[$i]['Medium'] = $student_data['Medium'];
                $student_array[$i]['ClassId'] = $student_data['ClassId'];
                $student_array[$i]['SectionId'] = $student_data['SectionId'];
                $student_array[$i]['StudentName'] = $student_data['StudentName'][$i];
                $student_array[$i]['StudentCode'] = $student_data['StudentCode'][$i];
                $student_array[$i]['RollNo'] = $student_data['RollNo'][$i];
                $student_array[$i]['FathersName'] = $student_data['FathersName'][$i];
                $student_array[$i]['MothersName'] = $student_data['MothersName'][$i];
                $student_array[$i]['ContactNumber'] = $student_data['ContactNumber'][$i];
                $student_array[$i]['Gender'] = $student_data['Gender'][$i];
                $student_array[$i]['AdmissionDate']= $student_data['AdmissionDate'][$i];
                $student_array[$i]['StudentStatus']='A';
                $student_array[$i]['EntryBy']=$this->session->userdata('user_id');
                $student_array[$i]['EntryDate']=date('Y-m-d');
                $i++;
            }
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $result=$this->Student->add_batch($student_array);
                if($result)
                {
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('students/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add Students';
        $data['title'] = 'Add Students';
        $this->layout->view('students/add_bulk_students',$data);
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
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('cbo_class','Class','trim|required');
        $this->form_validation->set_rules('cbo_section','Section','trim|required');
    }
    function _get_posted_data()
    {
        $data=array();

        $data['BranchId']=$this->input->post('BranchId');
        $data['ClassId']=$this->input->post('cbo_class');
        $data['SectionId']=$this->input->post('cbo_section');
        $data['Shift']=$this->input->post('Shift');
        $data['Year']=$this->input->post('Year');
        $data['Medium']=$this->input->post('Medium');

        $data['StudentName']=$this->input->post('StudentName');
        $data['StudentCode']=$this->input->post('StudentCode');
        $data['RollNo']=$this->input->post('StudentRoll');
        $data['FathersName']=$this->input->post('FathersName');
        $data['MothersName']=$this->input->post('MothersName');
        $data['ContactNumber']=$this->input->post('ContactNumber');
        $data['Gender']=$this->input->post('cbo_gender');
        $data['AdmissionDate']=date("Y-m-d", strtotime($this->input->post('txt_date_of_admission')));

        return $data;
    }
}
?>