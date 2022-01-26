<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('username') == '') {
            redirect('index.php/Logins/index');
        }
        $this->load->model(array('Employee','Employee_designation','Welcome'));

    }

    public function index()
    {

//
        $cond = array();
        $session_data = $this->input->get(); // $this->session->userdata('saving_adjustments.index');
        //echo"a<pre>"; print_r($session_data); //die;
        if (is_array($session_data)) {
            $cond['EmployeeDesignation'] = isset($session_data['cbo_designation']) ? $session_data['cbo_designation'] : '';
            $cond['EmployeeName'] = isset($session_data['cbo_employee_name']) ? $session_data['cbo_employee_name'] : '';
        }

        $this->load->library('pagination');
        $total = $this->Employee->row_count($cond);


        //Initializing Pagination

        $config['enable_query_string']=TRUE;
        $config['suffix']="?".  http_build_query($session_data,"&amp;");
        $config['base_url'] = site_url('index.php/Employees/index');
        $config['first_url'] = $config['base_url']."?".  http_build_query($session_data, "&amp;");
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);

//        echo "<pre>";print_r($cond);die;

        //$data=$this->_load_combo_data();
        $data['designation_list']=$this->Employee_designation->get_designation_list();
        $data['list'] = $this->Employee->get_list($config['per_page'], (int) $this->uri->segment(3),$cond);

//        echo "<pre>";print_r($data);die;

        $data['session_data'] = $session_data;

        $data['headline'] = 'Manage Employee';
        $data['title'] = 'Employee Lists';





//        $data['employee_list'] = $this->Employee->get_employee_list();
         $this->layout->view('Employees/index',$data);

    }




    public function add()
    {

        if(!empty($_POST)) {

            $data = $this->security->xss_clean($this->input->post());
            //$data['JoiningDate'] = date('Y-m-d',strtotime($this->input->post('JoiningDate')));
            $date = date('Y-m-d', strtotime($data['dob'][0]));
            // echo "<pre>";print_r($data);die;
           
            $admin_id = $this->session->userdata('user_id');
            $length = count($_FILES["upload"]["name"]);
            for ($i = 0; $i < $length; $i++) {

                $_FILES['userFile']['name'] = $_FILES['upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['upload']['size'][$i];

                if ($this->do_upload('userFile')) {
                    $employee_info = array(
                        'employee_name' => $data['employee_name'][$i],
                        'employee_designation' => $data['employee_designation'][$i],
                        'dob' => $date,
                        'password' => $data['password'][$i],
                        'social_link' => $data['social_link'][$i],
                        'employee_address' => $data['employee_address'][$i],
                        'contact_no' => $data['contact_no'][$i],
                        'email' => $data['email'][$i],
                        'gender' => $data['gender'][$i],
                        'image' => $_FILES['userFile']['name'],
                        'created_by' => $admin_id,
                        'created_on' => date("Y-m-d H:i:s"),
                        'updated_by' => '',
                        'updated_on' => ''
                    );


  // echo "<pre>";print_r($employee_info);die;
                    $insertion_check = $this->Employee->add($employee_info);


                } else {
                    $data['headline'] = 'Manage Employee';
                    $data['title'] = 'Employee Lists';

                     $this->layout->view('Employees/add',$data);
                }
               // echo "p<pre>";print_r($employee_info);
            }//die;
            if (!empty($insertion_check)) {
                $this->session->set_flashdata('success_message', ADD_MESSAGE);

                redirect('index.php/Employees');
            } else {
                $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                redirect('index.php/Employees');
            }

        }

        else{
            $data['headline'] = 'Manage Employee';
            $data['title'] = 'Employee Lists';

            // $data['row_combo'] = $this->Employee->get_combo_data();
            $data['designation_list'] = $this->Employee->get_designation_list();
             $this->layout->view('Employees/add',$data);
        }


    }



    /**
     * Upload a file.
     *
     * @param $field
     * @param string $allowed_types
     * @return bool
     */
    public function do_upload($field, $allowed_types = 'jpg|png|gif|jpeg')
    {


        $config['upload_path'] = "lib/images";
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = 5000;
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field)) {
//             print_r($this->upload->display_errors());die;
            return FALSE;
        } else {

            $data = $this->upload->data();
//            echo "hh<pre>";print_r($data["file_name"]);die;
            return $data["file_name"];
        }
    }


    public function edit($id = null)
    {
        if ($_POST) {
            $employee_id=$_POST['employee_id'];

            // echo "<pre>";print_r($student_id);die;
            $data = $this->security->xss_clean($this->input->post());
            $date = date('Y-m-d', strtotime($data['dob'][0]));
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

                        $employee_info = array(
                            'employee_name' => $data['employee_name'][$i],
                            'employee_designation' => $data['employee_designation'][$i],
                            'dob' => $date,
                            'password' => $data['password'][$i],
                            'social_link' => $data['social_link'][$i],
                            'employee_address' => $data['employee_address'][$i],
                            'contact_no' => $data['contact_no'][$i],
                            'email' => $data['email'][$i],
                            'gender' => $data['gender'][$i],
                            'image' => $_FILES['userFile']['name'],
                            'updated_by' => $admin_id,
                            'updated_on' => date("Y-m-d H:i:s")
                        );

                    }
                }
                if (empty($_FILES['userFile']['name'])) {
                    $employee_info = array(
                        'employee_name' => $data['employee_name'][$i],
                        'employee_designation' => $data['employee_designation'][$i],
                        'dob' => $date,
                        'password' => $data['password'][$i],
                        'social_link' => $data['social_link'][$i],
                        'employee_address' => $data['employee_address'][$i],
                        'contact_no' => $data['contact_no'][$i],
                        'email' => $data['email'][$i],
                        'gender' => $data['gender'][$i],
                        'updated_by' => $admin_id,
                        'updated_on' => date("Y-m-d H:i:s")
                    );
                }

//                    $update_check = $this->Student_admission->edit($student_info,$student_id);
                //echo "<pre>";print_r($student_info);die;
                if ($this->Employee->edit($employee_info,$employee_id)) {


                    $this->session->set_flashdata('success_message', EDIT_MESSAGE);

                    redirect('index.php/Employees');
                } else {
                    $this->session->set_flashdata('error_message', array('message' => 'Oops! Something went wrong .Please try again !', 'class' => 'success'));

                    redirect('index.php/Employees');
                }

//                } else {
//                     $this->layout->view('Student_admissions/add');
//                }
            }


        } else {
            $data['headline'] = 'Manage Employee';
            $data['title'] = 'Employee Lists';

            $data['designation_list'] = $this->Employee->get_designation_list();
            $data['row'] = $this->Employee->get_employee_data($id);
             $this->layout->view('Employees/add', $data);

        }

    }

    public function payment($id = null){

        $student_id = $id;
        if($_POST){

            $student_id=$_POST['student_id'];
            $activation_check = $_POST['activation_check'];
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

                $this->Student_admission->upadte_status($student_id,$activation_check);
                $get_data['headline'] = 'Manage Employee';
                $get_data['title'] = 'Employee Lists';

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
            $data['headline'] = 'Manage Employee';
            $data['title'] = 'Employee Lists';

            $data['row'] = $this->Student_admission->get_student_data($id);
            $data['field_of_payment'] = $this->Student_admission->get_payment_field($id);
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
        if ($this->Employee->delete($id, $image) != 0) {
            $this->session->set_flashdata('success_message', DELETE_MESSAGE);
        } else {
            $this->session->set_flashdata('error_message', WARNING_MESSAGE);
        }
        redirect('index.php/Employees');
    }


}

