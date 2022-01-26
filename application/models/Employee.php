<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Model
{
     function __construct(){
        parent::__construct();
            //load our second db and put in $db2

        $this->db2 = $this->load->database('another_db', TRUE);
    }

    function get_designation_list(){

        $this->db->select('*');
        $this->db->from('employee_designations');
        $this->db->order_by('id','ASC');
        return $this->db->get()->result();

    }

    public function get_employee_list()
    {


        $query = $this->db->query("SELECT `employees`.`id`,`employees`.`employee_name`,  `employees`.`image`, `employees`.`contact_no`, `employees`.`email`, `employee_designations`.`designation_name` AS `employee_designation` FROM `employees` 
JOIN `employee_designations` ON `employee_designations`.`id`=`employees`.`employee_designation` ORDER BY `employees`.`id` DESC  ");




        //$query = $this->db->get('employees');
        $results = $query->result();
        return $results;
    }

    function get_teacher_list(){

        $this->db->select('employees.*,employee_designations.designation_name');
        $this->db->from('employees');
        $this->db->join('employee_designations', 'employees.employee_designation = employee_designations.id');
        $this->db->where('employees.employee_designation', 1);
//        $this->db->where('employees.employee_designation', 2);
//        $this->db->where('employees.employee_designation', 3);
//        $this->db->where('employees.employee_designation', 4);
//        $this->db->where('employees.employee_designation', 5);
        $this->db->order_by('id','DESC');
        return $this->db->get()->result();
    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['EmployeeDesignation']) and !empty($cond['EmployeeDesignation'])){
                $this->db2->where('employees.employee_designation', $cond['EmployeeDesignation']);
            }
        }
        $this->db2->select('employees.*');
        return $this->db2->count_all_results('employees');
    }



    function get_list($limit = null, $offset = null,$cond=null){
//        echo "<pre>";print_r($cond);die;
        if(is_array($cond)){
            if(isset($cond['EmployeeDesignation']) and !empty($cond['EmployeeDesignation'])){
                $this->db2->where('employees.DesignationId', $cond['EmployeeDesignation']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $this->db2->where("(employees.EmployeeName LIKE '%".$cond['EmployeeName']."')");
//                $this->db->LIKE('employees.employee_name',  $cond['EmployeeName'],'after');
            }
        }
        $this->db2->select('employees.*,employee_designations.DesignationName');
        $this->db2->from('employees');
        $this->db2->join('employee_designations', 'employees.DesignationId = employee_designations.DesignationId');
        $this->db2->order_by('employees.EmployeeId','ASC');
        if(isset($limit)&& $limit>0){
            $this->db2->limit($limit,$offset);
        }

        return $this->db2->get()->result();

    }



    public function add($employee_info)
    {
        $query = $this->db->insert('employees',$employee_info);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_employee_data($id){
        $data = array('id' =>$id);
        $query = $this->db->get_where('employees',$data);
        return $query->row();

    }

    public function edit($employee_info,$employee_id){

        return $this->db->update('employees', $employee_info, array('id' => $employee_id));
    }

    public function upadte_status($student_id,$activation_check){
        $update_data = array('active'=> $activation_check);

        return $this->db->update('student_admission', $update_data, array('id' => $student_id));
    }

    public function delete($id,$image){
        if( is_readable("lib/images/".$image) && unlink("lib/images/".$image))
        {
            return $this->db->delete('employees', array('id' => $id));
        }else{
            return null;
        }

    }

    function get_combo_data()
    {
        $this->db->select('id AS id, designation_name AS designation_name_name');
        $this->db->order_by('id', 'ASC');
        $student_info = $this->db->get_where('employee_designations')->result();
        return $student_info;

    }

    function payment_admission_time($admission_payment_info){
        $query = $this->db->insert('payment',$admission_payment_info);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    function get_payment_completed_data($student_id,$check_to_print) {

        $query = $this->db->query("SELECT `student_admission`.`form_no`, `student_admission`.`student_name`, `class`.`class_name`, `payment`.`library_fee`,
        `payment`.`transportation_fee`, `payment`.`scouts`,`payment`.`sports`,`payment`.`balance`,`payment`.`cultural_fee`,
        `payment`.`others`,`payment`.`mode_of_payment`,`payment`.`related_purpose`,`payment`.`created_on`,`payment`.`student_id` FROM `payment` JOIN `class`
         ON `class`.`id`=`payment`.`class_id` JOIN `student_admission` ON `student_admission`.`id`=`payment`.`student_id` 
         WHERE `payment`.`student_id` = $student_id AND `payment`.`check_to_print` = $check_to_print ORDER BY `payment`.`id` DESC  ")->result_array();


        $create_data = array();
        $total_balance = 0;
        foreach ($query as $row) {

            $create_data[$row['student_name']]['form_no'] = $row['form_no'];
            $create_data[$row['student_name']]['created_on'] = $row['created_on'];
            $create_data[$row['student_name']]['student_id'] = $row['student_id'];
            $create_data[$row['student_name']]['student_name'] = $row['student_name'];
            $create_data[$row['student_name']]['class_name'] = $row['class_name'];
            $create_data[$row['student_name']]['library_fee'] = $row['library_fee'];
            $create_data[$row['student_name']]['transportation_fee'] = $row['transportation_fee'];
            $create_data[$row['student_name']]['scouts'] = $row['scouts'];
            $create_data[$row['student_name']]['sports'] = $row['sports'];
            $create_data[$row['student_name']]['others'] = $row['others'];
            $create_data[$row['student_name']][$row['mode_of_payment']] = $row['related_purpose'];
            $create_data[$row['student_name']][$row['mode_of_payment'] . '_balance'] = $row['balance'];

            $total_balance = $total_balance + $row['balance'];

        }
        $create_data[$row['student_name']]['total_balance'] = $total_balance;

//        echo "lul<pre>";print_r($create_data);die;
        return $create_data;

    }

    public function get_org_data()
    {
        $query = $this->db->get('organization_configuration');
        $results = $query->result();
        return $results;
    }

    public function get_payment_field($id)
    {
        $query = $this->db->get('field_of_payment');
        $results = $query->result();
        return $results;
    }









}
