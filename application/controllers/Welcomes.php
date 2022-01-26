<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->model(array('Welcome', 'Organization_configuration','News_event','Achievement','Employee_designation','Employee','Lecture'), '', TRUE);
        $this->db2 = $this->load->database('another_db', TRUE);

    }
    public function index()
    {


        $data['slideshow_image'] = $this->Welcome->get_slideshow_images();
        $data['config_list'] = $this->Welcome->show_config_list();
        $data['notice_list'] = $this->Welcome->get_notice_list();
        $data['spech_list'] = $this->Welcome->get_spech_list();
        $data['events_lists'] = $this->Welcome->show_events_list();
        $data['events_list'] = $this->News_event->show_events_list();
        $data['achievements_list'] = $this->Welcome->show_achievements_list();
        $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
        $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
        $data['branches'] = $this->Welcome->get_branch();
        // echo "<pre>";print_r($data);die;

        $this->load->view('Welcomes/index',$data);
    }

    public function view_test($notice_id){
     $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();

     $data['branches'] = $this->Welcome->get_branch();
     $data['config_list'] = $this->Welcome->show_config_list();
     $data['notice_list'] = $this->Welcome->get_notice_list();
     $data['notice'] = $notice_id;


        // echo "<pre>";print_r($data);die;
     $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
     $this->load->view('Welcomes/test',$data);
 }

 public function show_spech_details($id = null){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();

    $data['branches'] = $this->Welcome->get_branch();
        //$data['events_list'] = $this->News_event->show_events_list();
       // $data['achievements_list'] = $this->Achievement->show_achievements_list();
//        $data['slideshow_image'] = $this->Welcome->get_slideshow_images();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['get_spech_details'] = $this->Welcome->get_spech_list($id);
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $this->load->view('Welcomes/view',$data);
}

public function show_achievement_details($id = null){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();
        //$data['events_list'] = $this->News_event->show_events_list();
        // $data['achievements_list'] = $this->Achievement->show_achievements_list();
//        $data['slideshow_image'] = $this->Welcome->get_slideshow_images();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['achievement_details'] = $this->Welcome->get_achievement_details($id);
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();

    $this->load->view('Achievements/view',$data);
}


public function show_achievement_details_view(){
    $data['branches'] = $this->Welcome->get_branch();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['achievement_details'] = $this->Welcome->get_achievement_details();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $this->load->view('Achievements/achievement_details',$data);
}

public function show_news_events_details($id = null){
    $data['branches'] = $this->Welcome->get_branch();
        //$data['events_list'] = $this->News_event->show_events_list();
        // $data['achievements_list'] = $this->Achievement->show_achievements_list();
        // $data['slideshow_image'] = $this->Welcome->get_slideshow_images();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['news_events_details'] = $this->Welcome->get_news_events_details($id);
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $this->load->view('News_events/view',$data);
}


public function show_news_events_details_view(){
    $data['branches'] = $this->Welcome->get_branch();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['news_events_details'] = $this->Welcome->get_news_events_details();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
         // echo "<pre>";print_r($data);die;
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $this->load->view('News_events/news_events_details_view',$data);

}



public function show_lecture_details_view(){
    $data['branches'] = $this->Welcome->get_branch();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['news_events_details'] = $this->Welcome->get_news_events_details();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
         // echo "<pre>";print_r($data);die;
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $this->load->view('Lectures/lecture_details',$data);

}



public function employee_info_for_website(){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();
//        echo "<pre>";print_r('jh');die;
    $cond = array();

    $this->load->library('pagination');
    $total = $this->Employee->row_count($cond);


        //Initializing Pagination

    $config['enable_query_string']=TRUE;
    $config['suffix']="?".  http_build_query($cond,"&amp;");
    $config['base_url'] = site_url('index.php/Welcomes/employee_info_for_website');
    $config['first_url'] = $config['base_url']."?".  http_build_query($cond, "&amp;");
    $config['total_rows'] = $total;
    $config['per_page'] = 5;
    $this->pagination->initialize($config);

//        echo "<pre>";print_r($cond);die;
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
        //$data=$this->_load_combo_data();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['designation_list']=$this->Employee_designation->get_designation_list();
    $data['list'] = $this->Employee->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);
    $data['headline'] = 'List Of Classes';
    $data['title'] = 'Class List';

//        $data['employee_list'] = $this->Employee->get_employee_list();
       // echo "<pre>";print_r($data);die;
    $this->load->view('Employees/website_view',$data);
}

public function photo_gallery(){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();

    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['year_list'] = $this->Welcome->get_year_list();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
           // echo "<pre>";print_r($data);die;
    $this->load->view('Photo_gallerys/photo_gallery',$data);
}

public function inside_photo_gallery($id){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['gallery_list'] = $this->Welcome->get_gallery_list($id);
        // echo "<pre>";print_r($data);die;
    $this->load->view('Photo_gallerys/gallery_list',$data);
}
public function inside_inside_photo_gallery($id){
    
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();
    $this->load->library('pagination');
    $cond['group_id'] = $id;

    $offset = (int)$this->uri->segment(4);
    $str = $this->uri->segment(3);

    $config['reuse_query_string'] = TRUE;
    $config['base_url'] = site_url('index.php/welcomes/inside_inside_photo_gallery/') . $str;
    $config['total_rows'] = $this->Welcome->row_count($cond);
    $config['per_page'] = 8;
    $this->pagination->initialize($config);
    $data["image_list"] = $this->Welcome->get_gallery_wise_image_list($cond, $config['per_page'], $offset);
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
// echo "<pre>";print_r($config['total_rows']);die;
    return $this->load->view('Photo_gallerys/image_list',$data);
}
public function get_course_details($id){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    $data['course_data'] = $this->Welcome->course_details($id);
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $this->load->view('Welcomes/course',$data);
}

public function admission(){

    $cond = array();
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branch_list'] = $this->Welcome->get_branch();
    $data['blood_group_list'] = $this->get_blood_group();
    $data['class_list'] = $this->Welcome->get_list(null,null,$cond);
    $data['occupation_list'] = $this->get_occupation_list();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $data['branches'] = $this->Welcome->get_branch();
    $data['academic_year_list']=$this->get_academic_year();

    if($_POST)
    {

        $data['row']=$this->_get_posted_data();
            // echo "<pre>";print_r($data);die;
        $data['row']['StudentId'] = $this->Welcome->get_new_id('students', 'StudentId');
            // $user_id = $this->Student->get_new_id('user', 'id');

            // $parents_array = array();
            // $user_array = array();
            // $dormitory_array = array();

            //Parents Array
            // $parents_array['StudentId'] =$data['row']['StudentId'];
            // $parents_array['BranchId'] = $data['row']['BranchId'];
            // $parents_array['ParentName'] =$data['row']['FathersName'];
            // $parents_array['ContactNumber'] =$data['row']['GuardianContactNumber'];
            // $parents_array['UserId'] =$user_id;

            //Users Array
            // $user_array['id'] = $user_id;
            // $user_array['password'] = md5($data['row']['GuardianContactNumber']);
            // $user_array['BranchId'] = $data['row']['BranchId'];
            // $user_array['role_id'] = $this->Student_parent->get_parent_role_id();
            // $user_array['reg_date'] = date('Y-m-d');
            // $user_array['name'] = $data['row']['FathersName'];
            // $user_array['status'] = 1;
            // $user_array['user_name'] =$data['row']['GuardianContactNumber'];
            // $user_array['is_parents'] =1;

        $this->_prepare_validation();
            //$this->form_validation->set_rules('StudentCode','Code','trim|required|is_unique[students.StudentCode]');
            //$this->form_validation->set_rules('RollNo','RollNo','trim|required|callback_check_duplicate_roll_number');
        if ($this->form_validation->run() === TRUE)
        {
            
            $result=$this->Welcome->add_student($data['row']);
            if($result){
                
                $image_name = $this->do_upload();

                   // $this->Student_parent->add($parents_array);
                    //$this->User->user_add($user_array);
 // echo "<pre>";print_r($image_name);die;

                $student_image['StudentId'] = $data['row']['StudentId'];
                $student_image['Image'] = $image_name;
                     // echo "<pre>";print_r($student_image);die;
                if($this->Welcome->edit_student($student_image)){
                    $this->session->set_flashdata('success', 'Data is successfully saved');
                    redirect('index.php/welcomes/view/'.$data['row']['StudentId'], 'refresh');
                }
                
            }
        }
    }
            // echo "<pre>";print_r($data);die;
            // $data['RollNo'] = $this->Welcome->get_last_roll();


            // $data['RegNo'] = $this->Welcome->get_RegNo();
    $this->load->view('Welcomes/admission_form',$data);
}




public function view($id = null){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $cond = array();

    $data['branch_list'] = $this->Welcome->get_branch();
    $data['blood_group_list'] = $this->get_blood_group();
    $data['class_list'] = $this->Welcome->get_list(null,null,$cond);
    $data['occupation_list'] = $this->get_occupation_list();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $data['branches'] = $this->Welcome->get_branch();
    $data['academic_year_list']=$this->get_academic_year();

        //$data=$this->_load_combo_data();
    $data['organization_info'] = $this->Welcome->read(1,$id);
    $data['headline'] = 'Student Information';
    $data['title'] = 'Student Information';

        // echo "<pre>";print_r($data);die;
    if (empty($id)) {
        $this->session->set_flashdata('fail', 'Student ID is not provided');
        redirect('index.php/welcomes/admission/', 'refresh');
    } else {
        $data['row'] = $this->Welcome->get_student_information($id);

            // echo "<pre>";print_r($data);die;
        $this->load->view('Welcomes/student_profile', $data);
    }
}

public function ajax_for_get_student_code(){
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
        $callback_message['StudentCode'] = $this->Welcome->get_student_code($BranchId,$CourseId,$BatchId);
        $callback_message['StudentRoll'] = $this->Welcome->get_student_roll($BranchId,$CourseId,$BatchId);
    }
    echo json_encode($callback_message);



}

public function ajax_for_get_course_info(){
    $this->output->enable_profiler(FALSE);
    $callback_message = array();
    $BranchId = $this->input->post('BranchId');
    $callback_message['status'] = 'failure';
    if (empty($BranchId)) {
        $callback_message['message'] = 'Select a Branch';
    }

    else{
     
        $course_info = $this->Welcome->get_course_info($BranchId);
        foreach ($course_info as $row) {
            $callback_message['status'] = 'success';
            $callback_message['ClassId'][] = $row['ClassId'];
            $callback_message['ClassName'][] = $row['ClassName'];
        }
        
    }

        // echo "<pre>";print_r($callback_message);die;
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
     
        $batch_info = $this->Welcome->get_batch_info($BranchId,$CourseId);
            // echo "<pre>";print_r($batch_info);die;
        foreach ($batch_info as $row) {
            $callback_message['status'] = 'success';
            $callback_message['BatchId'][] = $row['BatchId'];
            $callback_message['BatchName'][] = $row['BatchName'];
            $callback_message['StartTime'][] = $row['StartTime'];
            $callback_message['EndTime'][] = $row['EndTime'];
        }
        
    }

        // echo "<pre>";print_r($callback_message);die;
    echo json_encode($callback_message);



}

public function branch_info(){
    $data['lecture_list'] = $this->Lecture->show_lectures_list_for_website();
    $data['branches'] = $this->Welcome->get_branch();
    $data['notice_list'] = $this->Welcome->get_notice_list();
    
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    
    $this->load->view('Welcomes/branch_details',$data);
}


public function get_blood_group(){
    $data = array();
    $data[''] ='Select Blood Group';
    $data['A+'] ='A+';
    $data['A-'] ='A-';
    $data['B+'] ='B+';
    $data['B-'] ='B-';
    $data['O+'] ='O+';
    $data['O-'] ='O-';
    $data['AB+'] ='AB+';
    $data['AB-'] ='AB-';
    return $data;
}

public function get_occupation_list(){
    $data = array();
    $data[''] ='Select Occupation';
    $data['Student'] ='Student';
    $data['Service'] ='Service';
    $data['Business'] ='Business';
    $data['Unemployed'] ='Unemployed';
    
    return $data;
}


function get_academic_year(){
    $data = array();
    $data['2019-2020'] = '2019-2020';
    $data['2021-2022'] = '2021-2022';
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

    $url="$_SERVER[DOCUMENT_ROOT]/software/media/student_pictures/".$image_name;
    
    if(in_array($type,array('jpg','JPG','JPEG','jpeg','png','PNG','bmp','BMP','pdf')))
    {
        
        if(move_uploaded_file($_FILES['image']['tmp_name'],$url))
        {
            return $image_name;
        }
    }
}

public function notice_board_list(){
    $data['branches'] = $this->Welcome->get_branch();
    $data['config_list'] = $this->Welcome->show_config_list();
    $data['notice_board_details'] = $this->Welcome->get_notice_board_lists();
    $data['imp_link_list'] = $this->Organization_configuration->show_important_link_list();
    $this->load->view('Notice_boards/all_notice_view_list',$data);
}


}