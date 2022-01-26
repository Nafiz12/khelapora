<?php
class Student extends CI_Model{
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('students.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('students.SectionId', $cond['SectionId']);
            }
        }
        $this->db->select('students.*, config_classes.ClassName,config_sections.SectionName');
        $this->db->from('students');
        $this->db->join('config_classes', 'students.ClassId = config_classes.ClassId');
        $this->db->join('config_sections', 'students.SectionId = config_sections.SectionId');
        $this->db->order_by('students.StudentId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('students.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('students.SectionId', $cond['SectionId']);
            }
        }
        $this->db->select('students.*');
        return $this->db->count_all_results('students');
    }
    function read($id){
        return $this->db->get_where('students',array('StudentId'=>$id))->row();
    }
    function add($data)
    {
        $data['AdmissionDate']=date('Y-m-d');
        $data['StudentStatus']='A';
        $data['EntryBy']=$this->session->userdata('user_id');
        $data['EntryDate']=date('Y-m-d');
        return $this->db->insert('students',$data);
    }
    function add_batch($data)
    {
        return $this->db->insert_batch('students', $data);
    }
    function edit($data){
        return $this->db->update('students', $data, array('StudentId'=> $data['StudentId']));
    }
    function delete($id)
    {
        $this->db->where('StudentId',$id);
        $this->db->delete('students');
        return true;
    }
    function get_student_list($class_id,$section_id){
        $condition = "";
        if(!empty($class_id)) {
            $condition = " WHERE ClassId = '$class_id' ";
        }
        if(!empty($section_id)) {
            $condition = " WHERE SectionId = '$section_id' ";
        }
        $q = "SELECT StudentId,StudentName,StudentCode,RollNo FROM students $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach($results as $row){
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['StudentName'] = $row['StudentName'].' - '.$row['StudentCode'];
            $students[$row['StudentId']]['RollNo'] = $row['RollNo'];
            $students[$row['StudentId']]['StudentCode'] = $row['StudentCode'];
        }
        return $students;
    }
    function get_student_code($class_id,$section_id){
        $q = "SELECT RollNo
                FROM students
                WHERE students.ClassId=$class_id
                AND students.SectionId = $section_id
                ORDER BY students.StudentId DESC LIMIT 0,1";
        $results = $this->db->query($q);
        $results = $results->row();
        $next_roll = 1;
        if(isset($results)){
            $next_roll = $results->RollNo+1;
        }
        $organization_info = $this->Organization->read(1);
        $prefix = "ST";
        if(isset($organization_info->StudentCodePrefix)){
            $prefix = $organization_info->StudentCodePrefix;
        }
        $class_info = $this->Config_class->read($class_id);
        $section_info = $this->Config_section->read($section_id);

        $student_code = $prefix.$class_info->ClassName.$section_info->SectionName.sprintf("%03d", $next_roll);
        return $student_code;
    }
    function get_student_roll($class_id,$section_id){
        $q = "SELECT RollNo
                FROM students
                WHERE students.ClassId=$class_id
                AND students.SectionId = $section_id
                ORDER BY students.StudentId DESC LIMIT 0,1";
        $results = $this->db->query($q);
        $results = $results->row();
        $next_roll = 1;
        if(isset($results)){
            $next_roll = $results->RollNo+1;
        }
        return $next_roll;
    }
    function check_for_duplicate_entry($class_id,$section_id,$roll_no){
        $q = "SELECT StudentId
                FROM students
                WHERE students.ClassId=$class_id
                AND students.SectionId = $section_id
                AND students.RollNo = $roll_no";
        $results = $this->db->query($q);
        $results = $results->row();
        return $results;
    }
}
?>