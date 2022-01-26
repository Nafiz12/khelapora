<?php
class Report_employee_register extends CI_Model{

    function get_designation_list(){

        $this->db->select('*');
        $this->db->from('employee_designations');
        $this->db->order_by('DesignationId','DESC');
        return $this->db->get()->result();

    }

    function get_branch_and_designation_wise_employee($DesignationId,$BranchId){
        $condition="";
        if($DesignationId !='-1'){
            $condition .=" AND employees.`DesignationId`=$DesignationId";
        }
        $q = "SELECT employee_designations.`DesignationName`,employees.*
                FROM `employees`
                JOIN `employee_designations` ON employees.`DesignationId` = employee_designations.`DesignationId`
                WHERE employees.`BranchId`=$BranchId $condition";
        $results = $this->db->query($q);
        $results = $results->result_array();

        $employee = array();
        foreach($results as $row){
            //echo"<pre>";print_r($row);die;
            $employee[$row['EmployeeId']]['EmployeeId'] = $row['EmployeeId'];
            $employee[$row['EmployeeId']]['EmployeeName'] = $row['EmployeeName'];
            $employee[$row['EmployeeId']]['EmployeeCode'] = $row['EmployeeCode'];
            $employee[$row['EmployeeId']]['DesignationName'] = $row['DesignationName'];
            $employee[$row['EmployeeId']]['FathersName'] = $row['FathersName'];
            $employee[$row['EmployeeId']]['CurrentSalary'] = $row['CurrentSalary'];
            $employee[$row['EmployeeId']]['DateOfJoining'] = $row['DateOfJoining'];
            $employee[$row['EmployeeId']]['ContactNumber'] = $row['ContactNumber'];
        }
        return $employee;
    }

}