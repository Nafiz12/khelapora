<?php
class Students extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student','Config_class','Config_section','Organization','Student_parent','User','Dormitory','Student_dormitory'));
//        parent::__construct();
//        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
//            redirect('index.php/Logins/index');
//        }
//        $this->load->model(array('Ac_ledger','Ac_voucher'), '', TRUE);
//
    }
    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if (is_array($session_data)) {
            $cond['ClassId'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
            $cond['SectionId'] = isset($session_data['cbo_section']) ? $session_data['cbo_section'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Student->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/students/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['list'] = $this->Student->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'List Of Students';
        $data['title'] = 'Students List';
         $this->layout->view('students/index',$data);
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {
            $data['row']=$this->_get_posted_data();
            $data['row']['StudentId'] = $this->Student->get_new_id('students', 'StudentId');
            $user_id = $this->Student->get_new_id('user', 'id');

            $parents_array = array();
            $user_array = array();
            $dormitory_array = array();

            //Parents Array
            $parents_array['StudentId'] =$data['row']['StudentId'];
            $parents_array['ParentName'] =$data['row']['FathersName'];
            $parents_array['ContactNumber'] =$data['row']['ContactNumber'];
            $parents_array['UserId'] =$user_id;

            //Users Array
            $user_array['id'] = $user_id;
            $user_array['password'] = md5($data['row']['ContactNumber']);
            $user_array['role_id'] = $this->Student_parent->get_parent_role_id();
            $user_array['reg_date'] = date('Y-m-d');
            $user_array['name'] = $data['row']['FathersName'];
            $user_array['status'] = 1;
            $user_array['user_name'] =$data['row']['ContactNumber'];
            $user_array['is_parents'] =1;
            //echo"<pre>"; print_r($user_array); die;

            $this->_prepare_validation();
            $this->form_validation->set_rules('txt_code','Code','trim|required|is_unique[students.StudentCode]');
            $this->form_validation->set_rules('txt_roll','Roll','trim|required|callback_check_duplicate_roll_number');
            if ($this->form_validation->run() === TRUE)
            {
                $result=$this->Student->add($data['row']);
                if($result){
                    if($data['row']['IsResidential'] == 1 ){
                        //Dormitory Array
                        $dormitory_array['StudentId'] =$data['row']['StudentId'];
                        $dormitory_array['DormitoryId'] =$this->input->post('cbo_dormitory');
                        $dormitory_array['RoomNumber'] =$this->input->post('txt_room_number');
                        $this->Student_dormitory->add($dormitory_array);

                        $this->Student_parent->add($parents_array);
                        $this->User->user_add($user_array);
                    }
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('students/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add New Student';
        $data['title'] = 'Add New Student';
         $this->layout->view('students/add_updated',$data);
    }
    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('students/index', 'refresh');
        }
        $result=$this->Student->delete($id);
        if($result)
        {
            $this->session->set_flashdata('success', 'Data has been deleted successfully.');
            redirect('students/index', 'refresh');
        }
    }
    function edit($id = null){
        if($_POST)
        {
            $id = $this->input->post('StudentId');
            $data['row']=$this->_get_posted_data();
            $this->_prepare_validation();
            if ($this->form_validation->run() === TRUE)
            {
                $data['row']['StudentId'] = $this->input->post('StudentId');
                if ($this->Student->edit($data['row'])) {
                    //Parents Array
                    $parent_info = $this->Student_parent->get_student_parent_information($data['row']['StudentId']);
                    $parents_array['ParentId'] =$parent_info->ParentId;
                    $parents_array['StudentId'] =$data['row']['StudentId'];
                    $parents_array['ParentName'] =$data['row']['FathersName'];
                    $parents_array['ContactNumber'] =$data['row']['ContactNumber'];
                    $this->Student_parent->edit($parents_array);

                    //Users Array
                    $user_info = $this->User->read($parent_info->UserId);
                    $user_array['id'] = $parent_info->UserId;
                    $user_array['password'] = md5($data['row']['ContactNumber']);
                    $user_array['role_id'] = $user_info->role_id;
                    $user_array['name'] = $data['row']['FathersName'];
                    $user_array['status'] = 1;
                    $user_array['user_name'] =$data['row']['ContactNumber'];
                    $user_array['is_parents'] =1;
                    $this->User->edit_user($user_array);

                    if($data['row']['IsResidential'] == 1 ){
                        //Dormitory Array
                        $dormitory_info = $this->Student_dormitory->get_dormitory_info_by_student($data['row']['StudentId']);
                        $dormitory_array['StudentDormitoryId'] =$dormitory_info->StudentDormitoryId;
                        $dormitory_array['StudentId'] =$data['row']['StudentId'];
                        $dormitory_array['DormitoryId'] =$this->input->post('cbo_dormitory');
                        $dormitory_array['RoomNumber'] =$this->input->post('txt_room_number');
                        $this->Student_dormitory->edit($dormitory_array);
                    }
                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('students/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $student_info =$this->Student->read($id);
        if($student_info->IsResidential == 1){
            $dormitory_info = $this->Student_dormitory->get_dormitory_info_by_student($student_info->StudentId);
            $student_info->DormitoryId = $dormitory_info->DormitoryId;
            $student_info->RoomNo = $dormitory_info->RoomNumber;
        }
        $data['row'] = $student_info;

        $data['headline'] = 'Edit Student';
        $data['title'] = 'Edit Student';
         $this->layout->view('students/add',$data);
    }
    function _load_combo_data() {
        $data = array();
        $data['class_list'] = $this->Config_class->get_list();
        $data['section_list']=$this->Config_section->get_list();
        $data['dormitory_list']=$this->Dormitory->get_dormitory_list();
        //echo"<pre>"; print_r($data); die;
        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        $this->form_validation->set_rules('txt_name','Name','trim|required');
        $this->form_validation->set_rules('cbo_class','Class','trim|required');
        $this->form_validation->set_rules('cbo_section','Section','trim|required');
        $this->form_validation->set_rules('txt_code','Code','trim|required');
        $this->form_validation->set_rules('txt_fathers_name','Fathers Name','trim|required');
        $this->form_validation->set_rules('txt_mothers_name','Mothers Name','trim|required');
        $this->form_validation->set_rules('txt_number','Contact Number','trim|required');
        $is_residential = $this->input->post('cbo_residential');
        if($is_residential == 1){
            $this->form_validation->set_rules('cbo_dormitory','Dormitory','trim|required');
            $this->form_validation->set_rules('txt_room_number','Room Number','trim|required');
        }

    }
    function check_duplicate_roll_number(){
        $class_id = $this->input->post('cbo_class');
        $section_id = $this->input->post('cbo_section');
        $roll_no = $this->input->post('txt_roll');
        $is_duplicate_entry = $this->Student->check_for_duplicate_entry($class_id,$section_id,$roll_no);
        if(!empty($is_duplicate_entry)){
            $this->form_validation->set_message('check_duplicate_roll_number', "This Roll is already assigned to another student !");
            return FALSE;
        }
        return true;
    }
    function _get_posted_data()
    {
        $data=array();
        $data['StudentName']=$this->input->post('txt_name');
        $data['StudentCode']=$this->input->post('txt_code');
        $data['ClassId']=$this->input->post('cbo_class');
        $data['SectionId']=$this->input->post('cbo_section');
        $data['RollNo']=$this->input->post('txt_roll');
        $data['Address']=$this->input->post('txt_address');
        $data['DateOfBirth']=date("Y-m-d", strtotime($this->input->post('txt_date_of_birth')));
        $data['FathersName']=$this->input->post('txt_fathers_name');
        $data['MothersName']=$this->input->post('txt_mothers_name');
        $data['ContactNumber']=$this->input->post('txt_number');
        $data['StudentEmail']=$this->input->post('txt_email');
        $data['Gender']=$this->input->post('cbo_gender');
        $data['IsResidential']=$this->input->post('cbo_residential');

        return $data;
    }
    
    
    function ajax_for_get_student_code_and_roll() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $student_id = $this->input->post('student_id');
        $callback_message['status'] = 'failure';
        if (empty($student_id)) {
            $callback_message['message'] = 'Select a Student';
        }
            else
         {
            $student_info = $this->Student->read($student_id);
                $callback_message['status'] = 'success';
                $callback_message['StudentId'] = $student_info->StudentId;
                $callback_message['StudentName'] = $student_info->StudentName;
                $callback_message['StudentCode'] = $student_info->StudentCode;
                $callback_message['StudentRoll'] = $student_info->RollNo;
        }
        echo json_encode($callback_message);
    }
    function ajax_for_get_student_list_by_class_and_section() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        //echo "<pre>";print_r($class_id);die;
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_info = $this->Student->get_student_list($class_id,$section_id);
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
                $callback_message['RollNo'][] = $row['RollNo'];
            }
        }
        echo json_encode($callback_message);
    }
    function ajax_for_get_student_code() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        if (empty($class_id)||empty($section_id)) {
            $callback_message['status'] = 'failure';
            $callback_message['message'] = 'Select a Class and Section';
        }
        else{
                $callback_message['status'] = 'success';
                $callback_message['StudentCode'] = $this->Student->get_student_code($class_id,$section_id);
                $callback_message['StudentRoll'] = $this->Student->get_student_roll($class_id,$section_id);
        }
        echo json_encode($callback_message);
    }
}
?>