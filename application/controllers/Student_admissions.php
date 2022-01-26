<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_admissions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model(array('Student_admission','Create_class','Config_section'));

    }

    public function index()
    {
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
//        echo"a<pre>"; print_r($session_data); //die;
        if (is_array($session_data)) {
            $cond['ClassId'] = isset($session_data['cbo_class']) ? $session_data['cbo_class'] : '';
            $cond['SectionId'] = isset($session_data['cbo_section']) ? $session_data['cbo_section'] : '';
            $cond['RollNo'] = isset($session_data['cbo_rollno']) ? $session_data['cbo_rollno'] : '';

        }

        $this->load->library('pagination');
        $total = $this->Student_admission->row_count($cond);

        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = base_url('index.php/Student_admissions/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data=$this->_load_combo_data();
        $data['student_list'] = $this->Student_admission->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

//            $data['student_list'] = $this->Student_admission->show_student_list();

//            echo "<pre>";print_r($data);die;
             $this->layout->view('Student_admissions/index',$data);

    }

    function _load_combo_data() {
        $data = array();
        $data['class_list'] = $this->Create_class->get_list();
        $data['section_list']=$this->Config_section->get_list();
//        $data['subject_list']=$this->Subject->get_list();
//        $data['exam_list']=$this->Exam->get_list();
//        $year = array();
//        $year['2016'] = 2016;
//        $year['2017'] = 2017;
//        $data['year_list']=$year;
        //echo"<pre>"; print_r($data); die;
        return $data;
    }

    public function add()
    {

        if(!empty($_POST)) {
            $data = $this->security->xss_clean($this->input->post());
            $admin_id = $this->session->userdata('user_id');
            $year = date("Y");
            $length = count($_FILES["upload"]["name"]);
            for ($i = 0; $i < $length; $i++) {

                $_FILES['userFile']['name'] = $_FILES['upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['upload']['size'][$i];

                if ($this->do_upload('userFile')) {
//                    echo "<pre>";print_r($_FILES['userFile']['name']);die;
    
                    $student_info = array(
                        'form_no' => $data['form_no'][$i],

                        'class' => $data['class'][$i],
                        'section' => $data['section'][$i],
                        'roll_no' => $data['roll_no'][$i],
                        'code' => $data['code'][$i],
                        'student_name' => $data['student_name'][$i],
                        'contact_no' => $data['contact_no'][$i],
                        'father_name' => $data['father_name'][$i],
                        'mother_name' => $data['mother_name'][$i],
                        'dob' => $data['dob'][$i],
                        'address' => $data['address'][$i],
                        'father_occupation' => $data['father_occupation'][$i],
                         'status' => 'active',
                        'image' => $_FILES['userFile']['name'],
                        'created_by' => $admin_id,
                        'created_on' => date("Y-m-d H:i:s"),
                        'year' => $year,
                        'updated_by' => '',
                        'updated_on' => ''
                    );

                    $due_check = array(
                        'student_id' => $data['code'][$i],
                        'class_id' => $data['class'][$i],
                        'section_id' => $data['section'][$i],
                        'name' => $data['student_name'][$i],
                        'monthly_fee' => '',
                        'sessional_fee' => '',
                        'yearly_fee' => '',
                        'admission_fee' => '',
                        
                        'date' => date("Y-m-d "),
                        'month' => '',
                        'year' => '',
                    );

                      $history_data = array(
                        'student_id' => $data['code'][$i],
                        'class_id' => $data['class'][$i],
                        'section_id' => $data['section'][$i],
                    
                        'from_date' => date("Y-m-d "),
                        'to_date' => '',
                         'remark' => 'Admitted'
                    );

//                    echo "jjjj<pre>";print_r($due_check);die;

                    $insertion_check = $this->Student_admission->add($student_info,$due_check,$history_data);


                } else {
                     $this->layout->view('Student_admissions/add');
                }
//                echo "<pre>";print_r($student_info);
            }
            if (!empty($insertion_check)) {
//                echo "<pre>";print_r($insertion_check);die;
//                $get_last_inserted_id =
//                $insert_to_due_register = $this->db->query("INSERT INTO due_register VALUES ('')")
                $this->session->set_flashdata('success_message', ADD_MESSAGE);

                redirect('index.php/Student_admissions');
            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Student_admissions');
            }

        }

        else{
            $data['row_combo'] = $this->Student_admission->get_combo_data();
             $this->layout->view('Student_admissions/add',$data);
        }


    }



    /**
     * Upload a file.
     *
     * @param $field
     * @param string $allowed_types
     * @return bool
     */
    public function do_upload($field, $allowed_types = 'jpg|png|gif|PNG|jpeg|JPG|JPEG')
    {

        $config['upload_path'] = "lib/images";
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = 5000;
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field)) {
//            print_r($this->upload->display_errors());die;
            return FALSE;
        } else {

            $data = $this->upload->data();
            return $data["file_name"];
        }
    }


    public function edit($id = null)
    {
        if ($_POST) {
            $student_id=$_POST['student_id'];

           // echo "<pre>";print_r($student_id);die;
            $data = $this->security->xss_clean($this->input->post());
            $admin_id = $this->session->userdata('user_id');
            $length = count($_FILES["upload"]["name"]);
            for ($i = 0; $i < $length; $i++) {
                $_FILES['userFile']['name'] = $_FILES['upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['upload']['size'][$i];
                if ($_FILES['userFile']['name']) {
                    if ($this->do_upload('userFile')) {

                        $student_info = array(
                            'form_no' => $data['form_no'][$i],

                            'class' => $data['class'][$i],
                            'section' => $data['section'][$i],
                            'code' => $data['code'][$i],
                            'roll_no' => $data['roll_no'][$i],
                            'student_name' => $data['student_name'][$i],
                            'contact_no' => $data['contact_no'][$i],
                            'father_name' => $data['father_name'][$i],
                            'mother_name' => $data['mother_name'][$i],
                            'dob' => $data['dob'][$i],
                            'address' => $data['address'][$i],
                            'father_occupation' => $data['father_occupation'][$i],
                             'status' => 'active',
                            'image' => $_FILES['userFile']['name'],
                            'updated_by' => $admin_id,
                            'updated_on' => date("Y-m-d H:i:s")
                        );
                    }
                }
                    if (empty($_FILES['userFile']['name'])) {
                        $student_info = array(
                            'form_no' => $data['form_no'][$i],

                            'class' => $data['class'][$i],
                            'section' => $data['section'][$i],
                            'code' => $data['code'][$i],
                            'roll_no' => $data['roll_no'][$i],
                            'student_name' => $data['student_name'][$i],
                            'contact_no' => $data['contact_no'][$i],
                            'father_name' => $data['father_name'][$i],
                            'mother_name' => $data['mother_name'][$i],
                            'dob' => $data['dob'][$i],
                            'address' => $data['address'][$i],
                            'father_occupation' => $data['father_occupation'][$i],
                            'status' => 'active',
                            'updated_by' => $admin_id,
                            'updated_on' => date("Y-m-d H:i:s")
                        );
                    }

//                    $update_check = $this->Student_admission->edit($student_info,$student_id);
                    //echo "<pre>";print_r($student_info);die;
                    if ($this->Student_admission->edit($student_info,$student_id)) {


                        $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                        redirect('index.php/Student_admissions');
                    } else {
                        $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                        redirect('index.php/Student_admissions');
                    }

//                } else {
//                     $this->layout->view('Student_admissions/add');
//                }
            }


        } else {
            $data['row_combo'] = $this->Student_admission->get_combo_data();
            $data['row'] = $this->Student_admission->get_student_data_for_edit($id);
             $this->layout->view('Student_admissions/add', $data);

        }

    }

    public function payment($id = null,$section = null,$roll = null){

        $student_id = $id;
        $section_id = $section;
        $roll_id = $roll;
        if($_POST){
            $student_id=$_POST['student_id'];
            $section_id=$_POST['section_id'];
            $data = $this->security->xss_clean($this->input->post());
            $length = count($data['mode_of_payment']);
            $admin_id = $this->session->userdata('user_id');
            $check_to_print = rand();
            for($i=0;$i<$length;$i++){

               $balance[$i] = ($data['library_fee']+$data['scouts']+$data['transportation_fee']+$data['sports']+$data['cultural_fee']+$data['others']+$data['related_purpose'][$i]);

                $admission_payment_info = array(
                    'class_id' => $data['class'],
                    'form_no' => $data['form_no'],
                    'student_id' =>$student_id,
                    'section_id' =>$section_id,
                    'library_fee' => $data['library_fee'],
                    'transportation_fee' => $data['transportation_fee'],
                    'scouts' => $data['scouts'],
                    'sports' => $data['sports'],
                    'cultural_fee' => $data['cultural_fee'],
                    'others' => $data['others'],
                    'related_purpose' => $data['related_purpose'][$i],
                    'balance'=>$balance[$i],
                    //'balance' => 'library_fee'+'scouts'+'transportation_fee'+'sports'+'cultural_fee'+'others'+'related_purpose',
                    'mode_of_payment' => $data['mode_of_payment'][$i],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'check_to_print' => $check_to_print,
                    'paid' => 1,
                    'created_by' => $admin_id,
                    'created_on' => date("Y-m-d H:i:s"),
                    'updated_by' => '',
                    'updated_on' => ''
                );

                $insertion_check = $this->Student_admission->payment_admission_time($admission_payment_info);

//                   echo "<pre>";print_r($admission_payment_info);
            }
//            die;

            if (!empty($insertion_check))
            {



                $get_data['printable_data'] = $this->Student_admission->get_payment_completed_data($student_id,$check_to_print);
                $get_data['org_info'] = $this->Student_admission->get_org_data();
                 $this->layout->view('Student_admissions/print_view',$get_data);
            }
            else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));
                redirect('index.php/Student_admissions');
                }

        }
        else{

            $data['previous_payment_info'] = $this->Student_admission->previous_payment_info($id);


            $data['row'] = $this->Student_admission->get_student_data($id,$section_id,$roll_id);
//            echo "<pre>";print_r($data);die;
            $data['field_of_payment'] = $this->Student_admission->get_payment_field($id);
//            echo "<pre>";print_r($data);die;
             $this->layout->view('Student_admissions/payment',$data);
        }

    }


    private function prepare_validation(){

        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[12]');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
    }

    public function permission($id){
        $data['row'] = $this->Admin->get_admin_data($id);
         $this->layout->view('Admins/permission',$data);
    }

    public function delete($id, $image)
    {
        if ($this->Student_admission->delete($id, $image) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Student_admissions');
    }

    function ajax_for_get_student_list_by_class_and_section() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');

        $section_id = $this->input->post('section_id');
        $sub_id = $this->input->post('sub');
//        echo "<pre>";print_r($class_id);die;
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_info = $this->Student_admission->get_student_list($class_id,$section_id,$sub_id);
//            echo "<pre>";print_r($student_info);die;
            foreach ($student_info as $row) {
                
                $callback_message['status'] = 'success';
                $callback_message['StudentId'][] = $row['StudentId'];
                $callback_message['StudentName'][] = $row['StudentName'];
                $callback_message['RollNo'][] = $row['RollNo'];
                $callback_message['total_marks'] = $row['total_marks'];
                $callback_message['pass_mark'] = $row['pass_mark'];
                $callback_message['sub_mark'] = $row['sub_mark'];

                $callback_message['obj_mark'] = $row['obj_mark'];
                $callback_message['pra_mark'] = $row['pra_mark'];
                $callback_message['subject_name'] = $row['subject_name'];
                $callback_message['sub_total_mark'] = $row['sub_marks'];
                $callback_message['obj_total_mark'] = $row['obj_marks'];
                $callback_message['pra_total_mark'] = $row['pra_marks'];

            }
        }
        echo json_encode($callback_message);
    }


    function ajax_for_get_roll_list_by_section() {
        $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class');

        $section_id = $this->input->post('section');
//        echo "<pre>";print_r($class_id);die;
        $callback_message['status'] = 'failure';
        if (empty($class_id)||empty($section_id)) {
            $callback_message['message'] = 'Select a Class and Section';
        }
        else
        {
            $student_roll_info = $this->Student_admission->get_roll_list($class_id,$section_id);
//            echo "<pre>";print_r($student_info);die;
            foreach ($student_roll_info as $row) {

                $callback_message['status'] = 'success';
                $callback_message['Roll'][] = $row['RollNo'];
                $callback_message['RollNo'][] = $row['RollNo'];
            }
        }
        echo json_encode($callback_message);
    }


    function ajax_for_get_student_code() {
        // $this->output->enable_profiler(FALSE);
        $callback_message = array();
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
         if (empty($class_id)||empty($section_id)) {
             $callback_message['status'] = 'failure';
             $callback_message['message'] = 'Select a Class and Section';
         }
         else{
            $callback_message['status'] = 'success';
            $callback_message['code'] = $this->Student_admission->get_student_code($class_id,$section_id);
            $callback_message['roll_no'] = $this->Student_admission->get_student_roll($class_id,$section_id);
         }
        echo json_encode($callback_message);
    }
    
        function check_duplicate_roll_number(){
        $class_id = $this->input->post('class');
        $section_id = $this->input->post('section');
        $roll_no = $this->input->post('roll_no');
        $is_duplicate_entry = $this->Student_admission->check_for_duplicate_entry($class_id,$section_id,$roll_no);
        if(!empty($is_duplicate_entry)){
            $this->form_validation->set_message('check_duplicate_roll_number', "This Roll is already assigned to another student !");
            return FALSE;
        }
        return true;
    }


}

