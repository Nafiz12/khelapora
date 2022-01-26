<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_admission extends CI_Model
{

    function get_list($limit = null, $offset = null,$cond=null){
//        echo "<pre>";print_r($cond);die;
        if(is_array($cond)){
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('student_admission.class', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('student_admission.section', $cond['SectionId']);
            }
            if(isset($cond['RollNo']) and !empty($cond['RollNo'])){
                $this->db->where('student_admission.roll_no', $cond['RollNo']);
            }

        }




        $this->db->select('student_admission.student_name,student_admission.image,student_admission.id,student_admission.roll_no,student_admission.contact_no,student_admission.form_no,class.class_name,config_section.section_name,config_section.id AS section_id');
        $this->db->from('student_admission');
        $this->db->join('class', 'student_admission.class = class.id');
        $this->db->join('config_section', 'student_admission.section = config_section.id');

        $this->db->order_by('student_admission.class', 'DESC ');
        $this->db->order_by('student_admission.id', 'ASC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
//        $test = $this->db->get()->result();

//        echo "<pre>";echo $this->db->last_query();die;
        return $this->db->get()->result();

    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('student_admission.class', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('student_admission.section', $cond['SectionId']);
            }
            if(isset($cond['RollNo']) and !empty($cond['RollNo'])){
                $this->db->where('student_admission.roll_no', $cond['RollNo']);
            }

        }
        $this->db->select('student_admission.*');
        return $this->db->count_all_results('student_admission');
    }


   public function show_student_list()
   {
       $this->db->order_by('class', 'DESC ');
       $this->db->order_by('id', 'ASC');
       $query = $this->db->get('student_admission');
       $results = $query->result();

//      echo $this->db->last_query();die;
       return $results;
   }

   public function add($student_info,$due_check,$history_data)
   {
//       $this->db->trans_start();

       $query = $this->db->insert('student_admission',$student_info);
//       $insert_id = $this->db->insert_id();
       if($query){
           $insert_into_due_table = $this->db->insert('due_register',$due_check);
           $insert_into_history_table = $this->db->insert('history',$history_data);
           return  true;

       }
       else{
           return false;
       }
//       $this->db->trans_complete();
   }

    public function get_student_data($id,$section_id,$roll_id){

        $data = array('id' =>$id,'section'=>$section_id,'roll_no'=>$roll_id);
        $query = $this->db->get_where('student_admission',$data);
//        $test =  $query->row();
//
//        echo "<pre>";echo $this->db->last_query();die;
        return $query->row();

    }

    public function get_student_data_for_edit($id){

        $data = array('id' =>$id);
        $query = $this->db->get_where('student_admission',$data);
        return $query->row();

    }

   public function edit($student_info,$student_id){

       return $this->db->update('student_admission', $student_info, array('id' => $student_id));
   }

//   public function upadte_status($student_id,$activation_check){
//       $update_data = array('active'=> $activation_check);
//
//       return $this->db->update('student_admission', $update_data, array('id' => $student_id));
//   }

    public function delete($id,$image){
        if( is_readable("lib/images/".$image) && unlink("lib/images/".$image))
        {
            return $this->db->delete('student_admission', array('id' => $id));
        }else{
            return null;
        }

    }

    function get_combo_data()
    {
        $this->db->select('id AS id, class_name AS class_name');
        $this->db->order_by('id', 'ASC');
        $student_info = $this->db->get_where('class')->result();
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



    function get_student_list($class_id,$section_id = null,$sub_id=null){
        $condition = "";
        if(!empty($class_id) && empty($sub_id)) {
            $condition = " WHERE subject_marks.class_id = '$class_id' ";

        }
        if(!empty($sub_id)) {
            $condition = " WHERE subject_marks.class_id = '$class_id' AND subject_marks.subject_id = '$sub_id' ";
        }
        $q = "SELECT subject_marks.obj_marks,subject_marks.pra_marks,student_admission.id,subjects.subject_name,student_admission.student_name,student_admission.roll_no,subject_marks.sub_marks,subject_marks.total_marks,subject_marks.pass_mark FROM subject_marks 
JOIN student_admission ON subject_marks.class_id = student_admission.class JOIN subjects  ON subject_marks.subject_id = subjects.id $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach($results as $row){
            $sub_pass_mark = ($row['sub_marks']*$row['pass_mark'])/100;
            $obj_pass_mark = ($row['obj_marks']*$row['pass_mark'])/100;
            if($row['pra_marks'] == 0){
                $pra_pass_mark = "Practical mark is not needed ";
            }else{
                $pra_pass_mark = ($row['pra_marks']*$row['pass_mark'])/100;
            }

            $students[$row['id']]['StudentId'] = $row['id'];
            $students[$row['id']]['StudentName'] = $row['student_name'].' - '.$row['roll_no'];
            $students[$row['id']]['RollNo'] = $row['roll_no'];
            $students[$row['id']]['total_marks'] = $row['total_marks'];
            $students[$row['id']]['pass_mark'] = $row['pass_mark'];
            $students[$row['id']]['sub_mark'] = $sub_pass_mark;
            $students[$row['id']]['obj_mark'] = $obj_pass_mark;
            $students[$row['id']]['pra_mark'] = $pra_pass_mark;
            $students[$row['id']]['obj_marks'] = $row['obj_marks'];
            $students[$row['id']]['sub_marks'] = $row['sub_marks'];
            $students[$row['id']]['pra_marks'] = $row['pra_marks'];
            $students[$row['id']]['subject_name'] = $row['subject_name'];

        }

//        echo "<pre>";print_r($students);die;
        return $students;
    }

    function get_roll_list($class_id,$section_id = null){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " WHERE class = '$class_id' ";
        }
        if(!empty($section_id)) {
            $condition = " WHERE section = '$section_id' ";
        }
        $q = "SELECT id,student_name,roll_no FROM student_admission $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach($results as $row){
//            $students[$row['id']]['StudentId'] = $row['id'];
//            $students[$row['id']]['StudentName'] = $row['student_name'];
            $students[$row['id']]['Roll'] = $row['roll_no'];
            $students[$row['id']]['RollNo'] = $row['roll_no'];

        }
        return $students;
    }

    function read($id){
        return $this->db->get_where('student_admission',array('id'=>$id))->row();
    }

    function previous_payment_info($id){
        $currentMonth = date('F');
        $previous_month =  Date('F', strtotime($currentMonth . " last month"));
        $current_year =  date("Y");

        $query = $this->db->query("SELECT MONTH,YEAR,balance,student_id,mode_of_payment FROM payment WHERE student_id = $id AND MONTH = '$previous_month' AND YEAR = $current_year ")->result_array();
        if(!empty($query)){
            return true;
        }else{

               $data = array();
//               $data['mode_of_payment'] = 0;
               $data['balance'] = 0;
               $data['fee_due'] = 1900;
               $data['month'] = $previous_month;
               $data['year'] = $current_year;

            }
            return $data;
        }


    function get_student_code($class_id,$section_id){
        $q = "SELECT roll_no
                FROM student_admission
                WHERE student_admission.class=$class_id
                AND student_admission.section = $section_id
                ORDER BY student_admission.id DESC LIMIT 0,1";
        $results = $this->db->query($q);
        $results = $results->row();

//        echo "<pre>";print_r($results);die;
        $next_roll = 1;
        if(isset($results)){
            $next_roll = $results->roll_no+1;
        }
//        $organization_info = $this->Organization->read(1);
        $prefix = "st";
//        if(isset($organization_info->StudentCodePrefix)){
//            $prefix = $organization_info->StudentCodePrefix;
//        }
        $class_info = $this->Create_class->read($class_id);
//        echo "<pre>";print_r($class_info);
        $section_info = $this->Config_section->read($section_id);
//        echo "<pre>";print_r($section_info);die;

        $student_code = $prefix.$class_info->class_name.$section_info->section_name.sprintf("%03d", $next_roll);
//        echo "<pre>";print_r($student_code);die;
        return $student_code;
    }

    function get_student_roll($class_id,$section_id){
        $q = "SELECT roll_no
                FROM student_admission
                WHERE student_admission.class=$class_id
                AND student_admission.section = $section_id
                ORDER BY student_admission.id DESC LIMIT 0,1";
        $results = $this->db->query($q);
        $results = $results->row();
        $next_roll = 1;
        if(isset($results)){
            $next_roll = $results->roll_no+1;
        }
        return $next_roll;
    }





}
