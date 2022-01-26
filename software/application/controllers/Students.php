<?php
class Students extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Student','Config_class','Config_section','Organization','Student_parent','User','Dormitory','Student_dormitory','Branch','Config_general','Config_class_period'));
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('html');
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
            $cond['BatchId'] = isset($session_data['BatchId']) ? $session_data['BatchId'] : '';
            $cond['CourseId'] = isset($session_data['CourseId']) ? $session_data['CourseId'] : '';
            $cond['StudentName'] = isset($session_data['StudentName']) ? $session_data['StudentName'] : '';
            $cond['Contact'] = isset($session_data['Contact']) ? $session_data['Contact'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
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
        // echo "<pre>";print_r($data);die;
        $this->layout->view('students/index',$data);
    }
    function add(){
        $data=$this->_load_combo_data();
        if($_POST)
        {

            $data['row']=$this->_get_posted_data();
            // echo "<pre>";print_r($data);die;
            $data['row']['StudentId'] = $this->Student->get_new_id('students', 'StudentId');
            $user_id = $this->Student->get_new_id('user', 'id');

            $parents_array = array();
            $user_array = array();
            $dormitory_array = array();

            //Parents Array
            $parents_array['StudentId'] =$data['row']['StudentId'];
            $parents_array['BranchId'] = $data['row']['BranchId'];
            $parents_array['ParentName'] =$data['row']['FathersName'];
            $parents_array['ContactNumber'] =$data['row']['GuardianContactNumber'];
            $parents_array['UserId'] =$user_id;

            //Users Array
            $user_array['id'] = $user_id;
            $user_array['password'] = md5($data['row']['GuardianContactNumber']);
            $user_array['BranchId'] = $data['row']['BranchId'];
            $user_array['role_id'] = $this->Student_parent->get_parent_role_id();
            $user_array['reg_date'] = date('Y-m-d');
            $user_array['name'] = $data['row']['FathersName'];
            $user_array['status'] = 1;
            $user_array['user_name'] =$data['row']['GuardianContactNumber'];
            $user_array['is_parents'] =1;

            $this->_prepare_validation();
            $this->form_validation->set_rules('StudentCode','Code','trim|required|is_unique[students.StudentCode]');
            $this->form_validation->set_rules('RollNo','RollNo','trim|required|callback_check_duplicate_roll_number');
            if ($this->form_validation->run() === TRUE)
            {
                // echo "<pre>";print_r('dd');die;
                $result=$this->Student->add($data['row']);
                if($result){
                  // echo "<pre>";print_r($result);die;

                    $image_name = $this->do_upload();

                    $this->Student_parent->add($parents_array);
                    $this->User->user_add($user_array);

                    $student_image['StudentId'] = $data['row']['StudentId'];
                    $student_image['Image'] = $image_name;
                    $this->Student->edit($student_image);
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('students/index', 'refresh');
                }
            }
        }
        $data['headline'] = 'Add New Student';
        $data['title'] = 'Add New Student';
        //$this->layout->view('students/add_updated',$data);
        $this->layout->view('students/add_new',$data);
        //$this->layout->view('students/add',$data);
    }
    function delete($id){
        if(empty($id) || $id == "")
        {
            $this->session->set_flashdata('warning', 'Id is not provided');
            redirect('students/index', 'refresh');
        }

        $fee_dependency_found = $this->Config_general->is_dependency_found('fees', array('StudentId' => $id));
        $mark_dependency_found = $this->Config_general->is_dependency_found('mark_details', array('StudentId' => $id));
        if($fee_dependency_found || $mark_dependency_found)
        {
            $this->session->set_flashdata('fail','Dependent Data Found');
            redirect('students/index/', 'refresh');
        }


        $prent_info = $this->Student->read_parent($id);
        $student_info = $this->Student->read($id);
        $result=$this->Student->delete($id);
        if($result)
        {
            $student_image =$student_info->Image;
            if(isset($student_image)){
                $url="media/student_pictures/".$student_image;
                unlink($url);
            }

            $this->User->delete($prent_info->UserId);
            $this->Student->delete_parents($prent_info->StudentId);
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
                if($_FILES['image']['name'] != ''){
                    $student_info = $this->Student->read($data['row']['StudentId']);
                    if($student_info->Image != ''){
                        $url="media/student_pictures/".$student_info->Image;
                        unlink($url);
                    }
                    $image_name = $this->do_upload();
                    $data['row']['Image'] = $image_name;
                }else{
                    unset($data['row']['Image'] );
                }
                
               
                 
                 
                 unset($data['row']['Status']);
                //  echo '<pre>'; print_r($data['row']); die;

                if ($this->Student->edit($data['row'])) {

//                    $image_name = $this->do_upload();
                    //Parents Array
                    $parent_info = $this->Student_parent->get_student_parent_information($data['row']['StudentId']);
                    if(isset($parent_info) && !empty($parent_info)){
                        $parents_array['ParentId'] =$parent_info->ParentId;
                        $parents_array['StudentId'] =$data['row']['StudentId'];
                        $parents_array['ParentName'] =$data['row']['FathersName'];
                        $parents_array['ContactNumber'] =$data['row']['Contact'];
                        $this->Student_parent->edit($parents_array);

                        //Users Array
                        $user_info = $this->User->read($parent_info->UserId);
                        $user_array['id'] = $parent_info->UserId;
                        $user_array['password'] = md5($data['row']['Contact']);
                        $user_array['role_id'] = $user_info->role_id;
                        $user_array['name'] = $data['row']['FathersName'];
                        $user_array['status'] = 1;
                        $user_array['user_name'] =$data['row']['Contact'];
                        $user_array['is_parents'] =1;
                        $this->User->edit_user($user_array);
                    }else{
                        $user_id = $this->Student->get_new_id('user', 'id');
                        $parents_array = array();
                        $user_array = array();
                        //Parents Array
                        $parents_array['StudentId'] =$data['row']['StudentId'];
                        $parents_array['BranchId'] = $data['row']['BranchId'];
                        $parents_array['ParentName'] =$data['row']['FathersName'];
                        $parents_array['ContactNumber'] =$data['row']['Contact'];
                        $parents_array['UserId'] =$user_id;

                        //Users Array
                        $user_array['id'] = $user_id;
                        $user_array['password'] = md5($data['row']['Contact']);
                        $user_array['BranchId'] = $data['row']['BranchId'];
                        $user_array['role_id'] = $this->Student_parent->get_parent_role_id();
                        $user_array['reg_date'] = date('Y-m-d');
                        $user_array['name'] = $data['row']['FathersName'];
                        $user_array['status'] = 1;
                        $user_array['user_name'] =$data['row']['Contact'];
                        $user_array['is_parents'] =1;
                        $this->Student_parent->add($parents_array);
                        $this->User->user_add($user_array);
                    }
                    $student_image['StudentId'] = $data['row']['StudentId'];
                    //$student_image['Image'] = $image_name;
                    $this->Student->edit($student_image);

                    $this->session->set_flashdata('success', 'Data has been updated successfully');
                    redirect('students/index', 'refresh');
                }
            }
        }
        $data=$this->_load_combo_data();
        $student_info =$this->Student->read($id);

        $data['row'] = $student_info;

        $data['headline'] = 'Edit Student';
        $data['title'] = 'Edit Student';
        $this->layout->view('students/add_new',$data);
    }
    function view($id = null){
        $data=$this->_load_combo_data();
        $data['organization_info'] = $this->Organization->read(1);
        $data['headline'] = 'Student Information';
        $data['title'] = 'Student Information';
        if (empty($id)) {
            $this->session->set_flashdata('fail', 'Student ID is not provided');
            redirect('students/index/', 'refresh');
        } else {
            $data['row'] = $this->Student->get_student_information($id);
            $this->layout->view('students/view', $data);
        }
    }
    function _load_combo_data() {
        $data = array();

        $cond['BranchId']=  $this->get_location_id();
        $data['batch_list']=$this->Config_class_period->get_list();
        $data['class_list'] = $this->Config_class->get_list(null,null,$cond);
        $data['branch_list']=$this->Branch->get_all_location_list();
        $data['academic_year_list']=$this->get_academic_year();
        $data['blood_group_list']=$this->get_blood_group();
        $data['occupation_list']=$this->get_occupation_list();

        return $data;
    }
    function _prepare_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        // $this->form_validation->set_rules('txt_name','Name','trim|required');
        // $this->form_validation->set_rules('cbo_class','Class','trim|required');
        // $this->form_validation->set_rules('cbo_section','Section','trim|required');
        // $this->form_validation->set_rules('txt_code','Code','trim|required');
        // $this->form_validation->set_rules('txt_fathers_name','Fathers Name','trim|required');
        // $this->form_validation->set_rules('txt_mothers_name','Mothers Name','trim|required');

        $this->form_validation->set_rules('BranchId','Branch','trim|required');
    
        $this->form_validation->set_rules('Year','Year','trim|required');
      
        $this->form_validation->set_rules('BloodGroup','Blood Group','trim|required');
    

    }
    function check_duplicate_roll_number(){
        $CourseId = $this->input->post('CourseId');
        $roll_no = $this->input->post('RollNo');
        $BranchId= $this->input->post('BranchId');
        $BatchId= $this->input->post('BatchId');
        $is_duplicate_entry = $this->Student->check_for_duplicate_entry($CourseId,$roll_no,$BranchId,$BatchId);
        if(!empty($is_duplicate_entry)){
            $this->form_validation->set_message('check_duplicate_roll_number', "This Roll is already assigned to another student !");
            return FALSE;
        }
        return true;
    }
    function _get_posted_data()
    {
        $data=array();
        $data['BranchId']=$this->input->post('BranchId');

        $data['StudentName']=$this->input->post('StudentName');
        $data['StudentCode']=$this->input->post('StudentCode');

        $data['RollNo']=$this->input->post('RollNo');
        $data['PresentAddress']=$this->input->post('PresentAddress');
        $data['PermanentAddress']=$this->input->post('PermanentAddress');

        $data['DateOfBirth']=date("Y-m-d", strtotime($this->input->post('DateOfBirth')));
        $data['AdmissionDate']=date("Y-m-d", strtotime($this->input->post('AdmissionDate')));

        $data['FathersName']=$this->input->post('FathersName');
        $data['MothersName']=$this->input->post('MothersName');
        $data['GuardianContactNumber']=$this->input->post('GuardianContactNumber');

        $data['StudentEmail']=$this->input->post('StudentEmail');
        $data['Occupation']=$this->input->post('Occupation');

        $data['Year']=$this->input->post('Year');
        $data['Contact']=$this->input->post('Contact');

        $data['SSC']=$this->input->post('SSC');
        $data['SSCYear']=$this->input->post('SSCYear');
        $data['SSCBoard']=$this->input->post('SSCBoard');
        $data['SSCSubject']=$this->input->post('SSCSubject');
        $data['SSCResult']=$this->input->post('SSCResult');

        $data['HSC']=$this->input->post('HSC');
        $data['HSCYear']=$this->input->post('HSCYear');
        $data['HSCBoard']=$this->input->post('HSCBoard');
        $data['HSCSubject']=$this->input->post('HSCSubject');
        $data['HSCResult']=$this->input->post('HSCResult');

        $data['Graduation']=$this->input->post('Graduation');
        $data['GraduationYear']=$this->input->post('GraduationYear');
        $data['GraduationBoard']=$this->input->post('GraduationBoard');
        $data['GraduationSubject']=$this->input->post('GraduationSubject');
        $data['GraduationResult']=$this->input->post('GraduationResult');

        $data['PostGraduation']=$this->input->post('PostGraduation');
        $data['PostGraduationYear']=$this->input->post('PostGraduationYear');
        $data['PostGraduationBoard']=$this->input->post('PostGraduationBoard');
        $data['PostGraduationSubject']=$this->input->post('PostGraduationSubject');
        $data['PostGraduationResult']=$this->input->post('PostGraduationResult');


        $data['BloodGroup']=$this->input->post('BloodGroup');
        $data['BatchId']=$this->input->post('BatchId');
        $data['CourseId']=$this->input->post('CourseId');
        $data['Status']=0;

        return $data;
    }
    private function do_upload()
    {
        $type=explode('.',$_FILES['image']['name']);
        $type=$type[count($type)-1];
        $image_name = uniqid(rand()).'.'.$type;
        $url="media/student_pictures/".$image_name;
        if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf')))
        {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$url))
            {
                return $image_name;
            }
        }
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
        $BranchId= $this->input->post('BranchId');
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_info = $this->Student->get_student_list($class_id,$section_id,$BranchId);
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
                $callback_message['StudentCode'][] = $row['StudentCode'];
                $callback_message['RollNo'][] = $row['RollNo'];
                $callback_message['FathersName'][] = $row['FathersName'];
                $callback_message['ContactNumber'][] = $row['ContactNumber'];
            }
        }
        echo json_encode($callback_message);
    }


     function ajax_for_get_student_list_by_class_and_section_payment() {
       $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
       
        $BranchId= $this->input->post('BranchId');

        $callback_message['status'] = 'failure';
        if (empty($class_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            // echo "<pre>";print_r($BranchId);die;

            $student_info = $this->Student->get_student_list_payment($class_id,$BranchId);
            // echo "<pre>";print_r($student_info);die;
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                
                 $callback_message['StudentId'] = $row['StudentId'];
            $callback_message['TransactionDate'] = $row['TransactionDate'];
            $callback_message['CourseId'] = $row['CourseId'];
            $callback_message['TypeName'] = $row['TypeName'];
            $callback_message['PaidAmount'] = $row['PaidAmount'];
            $callback_message['ActualAmount'] = $row['ActualAmount'];
            $callback_message['DueDate'] = $row['DueDate'];


            $current_balance = ($row['ActualAmount']-$row['PaidAmount']);
           
                $callback_message['balance'] = $current_balance;
           
            }
        }
        // echo "<pre>";print_r($callback_message);die;
        echo json_encode($callback_message);
    }



    function ajax_for_get_student_list_by_class_and_section_attendance() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
       
        $BranchId= $this->input->post('BranchId');

        $callback_message['status'] = 'failure';
        if (empty($class_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_info = $this->Student->get_student_list_sham($class_id,$BranchId);
            // echo "<pre>";print_r($student_info);die;
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
                $callback_message['StudentCode'][] = $row['StudentCode'];
                $callback_message['RollNo'][] = $row['RollNo'];
                $callback_message['FathersName'][] = $row['FathersName'];
                $callback_message['CourseId'][] = $row['CourseId'];
                $callback_message['Contact'][] = $row['Contact'];
            }
        }
        echo json_encode($callback_message);
    }


        function ajax_for_get_student_list_for_manage_marks() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $BranchId= $this->input->post('BranchId');
        $SubjectId= $this->input->post('subjectId');
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_info = $this->Student->get_student_list_for_marks($class_id,$section_id,$BranchId,$SubjectId);
            // echo "<pre>";print_r($student_info);die;
            foreach ($student_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
                $callback_message['StudentCode'][] = $row['StudentCode'];
                $callback_message['RollNo'][] = $row['RollNo'];
                
                $callback_message['TotalMark'] = $row['TotalMark'];
                $callback_message['PassMark'] = $row['PassMark'];
                $callback_message['sub_mark'] = $row['sub_mark'];

                $callback_message['obj_mark'] = $row['obj_mark'];
                $callback_message['pra_mark'] = $row['pra_mark'];
                $callback_message['SubjectName'] = $row['SubjectName'];
                $callback_message['SubMark'] = $row['SubMark'];
                $callback_message['ObjMark'] = $row['ObjMark'];
                $callback_message['PraMark'] = $row['PraMark'];
            }
        }
        echo json_encode($callback_message);
    }



    //     function ajax_for_get_student_code_and_roll() {
    //     $this->output->enable_profiler(FALSE);
    //     $callback_message = array();
    //     $student_id = $this->input->post('student_id');
    //     $callback_message['status'] = 'failure';
    //     if (empty($student_id)) {
    //         $callback_message['message'] = 'Select a Student';
    //     }
    //     else
    //     {
    //         $student_info = $this->Student->read($student_id);
    //         $callback_message['status'] = 'success';
    //         $callback_message['StudentId'] = $student_info->StudentId;
    //         $callback_message['StudentName'] = $student_info->StudentName;
    //         $callback_message['StudentCode'] = $student_info->StudentCode;
    //         $callback_message['StudentRoll'] = $student_info->RollNo;
    //     }
    //     echo json_encode($callback_message);
    // }

    function ajax_for_get_student_code() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
    
        $batch_id = $this->input->post('batch_id');
        $BranchId= $this->input->post('BranchId');


        if (empty($batch_id)||empty($BranchId)) {
            $callback_message['status'] = 'failure';
            $callback_message['message'] = 'Select a Batch ';
        }
        else{
            $callback_message['status'] = 'success';
            $callback_message['StudentCode'] = $this->Student->get_student_code($batch_id,$BranchId);
            $callback_message['StudentRoll'] = $this->Student->get_student_roll($batch_id,$BranchId);
        }
        echo json_encode($callback_message);
    }

    function ajax_for_get_student_code_version2() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $BranchId= $this->input->post('BranchId');
        $Shift= $this->input->post('Shift');
        $Medium= $this->input->post('Medium');

        if (empty($class_id)||empty($section_id)||empty($BranchId)) {
            $callback_message['status'] = 'failure';
            $callback_message['message'] = 'Select a Class and Section';
        }
        else{
            $callback_message['status'] = 'success';
            $callback_message['StudentCode'] = $this->Student->get_student_code($class_id,$section_id,$BranchId,$Shift,$Medium);
            $StudentRoll= $this->Student->get_student_roll($class_id,$section_id,$BranchId,$Shift,$Medium);
            $callback_message['StudentRoll'] =$StudentRoll;

            $callback_message['NextRoll']=$StudentRoll+1;
            $callback_message['NextCode']=$this->Student->get_student_code_by_roll($class_id,$section_id,$BranchId,$StudentRoll+1);


        }
        echo json_encode($callback_message);
    }

    function ajax_get_student_list(){
        $data = array();
        $branch_data=$this->session->userdata('system.branch');
        $branch_id= $branch_data['BranchId'];
        $data = $this->Student->get_student_list_auto($this->input->post('q'),$branch_id);
        foreach ($data as $row) {
            $row->BranchId = str_replace(',', ' ', $row->BranchId);
            $row->StudentId = str_replace(',', ' ', $row->StudentId);
            $row->StudentName = str_replace(',', ' ', $row->StudentName);
            $row->FathersName = str_replace(',', ' ', $row->FathersName);
            
            $row->BatchName = str_replace(',', ' ', $row->BatchName);
            $row->CourseName = str_replace(',', ' ', $row->CourseName);
            $row->Contact = str_replace(',', ' ', $row->Contact);
            $row->StudentCode = str_replace(',', ' ', $row->StudentCode);
            $row->RollNo = str_replace(',', ' ', $row->RollNo);
           
            echo $row->StudentId . ',' . $row->StudentName  . ',' . $row->FathersName . ',' . $row->BatchName.',' . $row->Contact.',' . $row->StudentCode.',' . $row->RollNo.',' . $row->BranchId.',' .$row->CourseName . ','.$row->CourseId . ','."\n";
        }
        $this->output->enable_profiler(FALSE);
    }
    function ajax_for_get_student_code_by_roll(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $roll = $this->input->post('roll');
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $BranchId= $this->input->post('BranchId');

        if (empty($roll)) {
            $callback_message['status'] = 'failure';
            $callback_message['message'] = 'Select a Roll';
        }
        else{
            $callback_message['status'] = 'success';
            $callback_message['StudentRoll'] = $roll;
            $callback_message['StudentCode'] = $this->Student->get_student_code_by_roll($class_id,$section_id,$BranchId,$roll);
        }
        echo json_encode($callback_message);
    }


        public function ajax_for_get_batch_info(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $BranchId = $this->input->post('BranchId');
        $CourseId = $this->input->post('CourseId');
        $callback_message['status'] = 'failure';
        if (empty($BranchId) || empty($CourseId)) {
            $callback_message['message'] = 'Select a Branch or Course';
        }

        else{
           
            $batch_info = $this->Student->get_batch_info($BranchId,$CourseId);
            // echo "<pre>";print_r($batch_info);die;
             foreach ($batch_info as $row) {
                $callback_message['status'] = 'success';
                $callback_message['BatchId'][] = $row['BatchId'];
                $callback_message['BatchName'][] = $row['BatchName'];
            }
           
        }

        // echo "<pre>";print_r($callback_message);die;
        echo json_encode($callback_message);



    }


    public function ajax_for_get_student_code_new(){
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $BranchId = $this->input->post('BranchId');
        $CourseId = $this->input->post('CourseId');
        $BatchId = $this->input->post('BatchId');
        $callback_message['status'] = 'failure';
        if (empty($BranchId) || empty($CourseId) || empty($BatchId)) {
            $callback_message['message'] = 'Select a Branch or CourseId or BatchId';
        }

        else{
            $callback_message['status'] = 'success';
            $callback_message['StudentCode'] = $this->Student->get_student_code_new($BranchId,$CourseId,$BatchId);
            $callback_message['StudentRoll'] = $this->Student->get_student_roll_new($BranchId,$CourseId,$BatchId);
        }
        echo json_encode($callback_message);



    }
    
     public function ajax_pending_students()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if(empty($session_data)){
            $session_data['BranchId']=  $this->get_location_id();
        }
        if (is_array($session_data)) {
            $cond['BatchId'] = isset($session_data['BatchId']) ? $session_data['BatchId'] : '';
            $cond['CourseId'] = isset($session_data['CourseId']) ? $session_data['CourseId'] : '';
            $cond['StudentName'] = isset($session_data['StudentName']) ? $session_data['StudentName'] : '';
            $cond['Contact'] = isset($session_data['Contact']) ? $session_data['Contact'] : '';
            $cond['BranchId'] = isset($session_data['BranchId']) ? $session_data['BranchId'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Student->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('/students/pending_student_list');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 20;
        $this->pagination->initialize($config);


        $data=$this->_load_combo_data();
        $data['list'] = $this->Student->get_pending_student_list($config['per_page'], (int) $this->uri->segment(3),$cond);

        $data['session_data'] = $session_data;

        $data['headline'] = 'List Of Students';
        $data['title'] = 'Students List';
        // echo "<pre>";print_r($data);die;
        $this->layout->view('students/pending_student_list',$data);
    }

    
}
?>