<?php

class Fee extends MY_Model
{
    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('fees.BranchId', $cond['BranchId']);
            }
            if (isset($cond['ClassId']) and !empty($cond['ClassId'])) {
                $this->db->where('fees.ClassId', $cond['ClassId']);
            }
            if (isset($cond['SectionId']) and !empty($cond['SectionId'])) {
                $this->db->where('fees.SectionId', $cond['SectionId']);
            }
            if (isset($cond['StudentId']) and !empty($cond['StudentId'])) {
                $this->db->where('fees.StudentId', $cond['StudentId']);
            }
        }
        $this->db->select('fees.*');
        return $this->db->count_all_results('fees');
    }

    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if (isset($cond['BranchId']) and !empty($cond['BranchId'])) {
                $this->db->where('fees.BranchId', $cond['BranchId']);
            }
            if (isset($cond['ClassId']) and !empty($cond['ClassId'])) {
                $this->db->where('fees.ClassId', $cond['ClassId']);
            }
            if (isset($cond['SectionId']) and !empty($cond['SectionId'])) {
                $this->db->where('fees.SectionId', $cond['SectionId']);
            }
            if (isset($cond['StudentId']) and !empty($cond['StudentId'])) {
                $this->db->where('fees.StudentId', $cond['StudentId']);
            }
        }
        $this->db->select('fees.*,students.StudentName, StudentCode');
        $this->db->from('fees');
        $this->db->join('students', 'fees.StudentId = students.StudentId');
        $this->db->order_by('fees.FeeId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }

    function read($id)
    {
        return $this->db->get_where('fees', array('FeeId' => $id))->row();
    }

    function add($data)
    {
        return $this->db->insert('fees', $data);
    }
    function add_fee_details($data) {
        return $this->db->insert_batch('fee_details', $data);
    }

    function edit($data)
    {
        return $this->db->update('fees', $data, array('FeeId' => $data['FeeId']));
    }

    function delete($id)
    {
        $this->db->where('FeeId', $id);
        $this->db->delete('fees');

        $this->db->where('FeeId', $id);
        $this->db->delete('fee_details');
        return true;
    }

    function get_student_list($class_id, $section_id)
    {
        $condition = "";
        if (!empty($class_id)) {
            $condition = " WHERE ClassId = '$class_id' ";
        }
        if (!empty($section_id)) {
            $condition = " WHERE SectionId = '$section_id' ";
        }
        $q = "SELECT StudentId,StudentName,StudentCode FROM students $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $students = array();
        foreach ($results as $row) {
            $students[$row['StudentId']]['StudentId'] = $row['StudentId'];
            $students[$row['StudentId']]['StudentName'] = $row['StudentName'] . ' - ' . $row['StudentCode'];
        }
        //echo "<pre>";print_r($students);die;
        return $students;
    }
    function get_fee_information($id){
        $query= "SELECT fees.*,students.*,config_classes.`ClassName` FROM `fees`
                JOIN students ON fees.`StudentId` = students.`StudentId`
                JOIN `config_classes` ON students.`CourseId` = config_classes.`ClassId`
                
                WHERE FeeId=$id";
        $query=$this->db->query($query);
        return $query->row();
    }
    function get_fee_details_information($id){
        $query= "SELECT `fee_details`.*,fee_types.`TypeName`
                FROM `fee_details` 
                JOIN `fee_types` ON fee_details.`TypeId` = fee_types.`TypeId`
                WHERE fee_details.`FeeId`=$id";
        $query=$this->db->query($query);
        return $query->result_array();
    }

    function get_monthly_fee($class_id, $fee_id)
    {

        $condition = "";
        if (!empty($class_id)) {
            $condition = " WHERE ClassId = '$class_id' ";
        }
        if (!empty($fee_id)) {
            $condition = " WHERE TypeId = '$fee_id' ";
        }
        $q = "SELECT FeeConfigId,Amount FROM fee_configurations $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();
        $amount = array();
        foreach ($results as $row) {
            $amount['FeeConfigId'] = $row['FeeConfigId'];
            $amount['Amount'] = $row['Amount'];
        }
        //print_r($amount);die;
        return $amount;
    }
    function get_this_month_collection_amount($BranchId){
        $current_date = date('Y-m-d');
        $first_date_of_month = date('Y-m-01', strtotime($current_date));
        $last_date_of_month = date('Y-m-t', strtotime($current_date));
        $condition = "";
        if (isset($BranchId) && !empty($BranchId) && $BranchId!=1) {
            $condition = " WHERE fees.BranchId = '$BranchId' AND fees.`TransactionDate` BETWEEN '$first_date_of_month' AND '$last_date_of_month' ";
        }else{
            $condition = "WHERE fees.`TransactionDate` BETWEEN '$first_date_of_month' AND '$last_date_of_month'";
        }
        $q = "SELECT SUM(fees.`TotalAmount`) AS TotalAmount FROM `fees` $condition";
        $results = $this->db->query($q);
        $results = $results->row()->TotalAmount;
        return $results;

    }
    function get_memo_number($BranchId){
        $branch_info = $this->Branch->read($BranchId);
        $q = "SELECT IFNULL(MAX(fees.`FeeId`),0) AS FeeId
                FROM fees
                WHERE BranchId=$BranchId";
        $results = $this->db->query($q);
        $results = $results->row()->FeeId;
        $next_code=$results+1;
        $memo_number = $branch_info->BranchCode.sprintf("%03d", $next_code);
        return $memo_number;
    }
}

?>