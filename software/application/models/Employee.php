<?php

class Employee extends MY_Model{
    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('employees.BranchId', $cond['BranchId']);
            }
            if (isset($cond['DesignationId']) and !empty($cond['DesignationId'])) {
                $this->db->where('employees.DesignationId', $cond['DesignationId']);
            }
            if (isset($cond['EmployeeId']) and !empty($cond['EmployeeId'])) {
                $this->db->where('employees.EmployeeId', $cond['EmployeeId']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $where = "(employees.EmployeeCode LIKE '%{$cond['EmployeeName']}%' OR employees.EmployeeName LIKE '%{$cond['EmployeeName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('employees.*,employee_designations.DesignationName');
        $this->db->from('employees');
        $this->db->join('employee_designations', 'employees.DesignationId = employee_designations.DesignationId');
        $this->db->order_by('EmployeeId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }

    function get_teacher_list($BranchId = null)
    {
        if(isset($BranchId) && !empty($BranchId)){
            $this->db->where('employees.BranchId', $BranchId);
        }
        if (isset($cond['EmployeeId']) and !empty($cond['EmployeeId'])) {
            $this->db->where('employees.EmployeeId', $cond['EmployeeId']);
        }
        $this->db->select('employees.*,employee_designations.DesignationName');
        $this->db->from('employees');
        $this->db->join('employee_designations', 'employees.DesignationId = employee_designations.DesignationId');
        $this->db->where('employees.IsTeacher', 1);
        $this->db->order_by('EmployeeId', 'DESC');
        return $this->db->get()->result();
    }

    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('employees.BranchId', $cond['BranchId']);
            }
            if (isset($cond['DesignationId']) and !empty($cond['DesignationId'])) {
                $this->db->where('employees.DesignationId', $cond['DesignationId']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $where = "(employees.EmployeeCode LIKE '%{$cond['EmployeeName']}%' OR employees.EmployeeName LIKE '%{$cond['EmployeeName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('employees.*');
        return $this->db->count_all_results('employees');
    }

    function read($id)
    {
        return $this->db->get_where('employees', array('EmployeeId' => $id))->row();
    }

    function add($data)
    {
        return $this->db->insert('employees', $data);
    }

    function edit($data)
    {
        return $this->db->update('employees', $data, array('EmployeeId' => $data['EmployeeId']));
    }

    function delete($id)
    {
        $this->db->where('EmployeeId', $id);
        $this->db->delete('employees');
        return true;
    }

    function get_employee_designation()
    {
        $this->db->order_by('DesignationId');
        $this->db->select('*');
        $this->db->from('employee_designations');
        $query = $this->db->get();
        return $query->result();
    }

    function is_teacher_available_in_given_period($Day, $PeriodId, $EmployeeId)
    {
        $query = "SELECT EmployeeId FROM `config_class_routines`
                    WHERE DAY='$Day'
                    AND PeriodId = $PeriodId
                    AND EmployeeId = $EmployeeId";
        return $this->db->query($query)->row();
    }

    function get_employee_information($id)
    {
        $query = "SELECT employees.*, `branches`.`BranchName`, employee_designations.`DesignationName`
                    FROM employees
                    JOIN branches ON employees.BranchId = branches.`BranchId`
                    JOIN `employee_designations` ON employees.`DesignationId` = employee_designations.`DesignationId`
                    WHERE employees.`EmployeeId`=$id";
        $query = $this->db->query($query);
        $employee_info = $query->row();
        return $employee_info;
    }
    function get_branch_wise_employee_list($BranchId = null,$Type=null){

        $branch_info = $this->Branch->read($BranchId);
        if(!empty($BranchId) && $branch_info->IsHeadOffice == 0) {
            $this->db->where('employees.BranchId', $BranchId);
        }
//        if (isset($BranchId)) {
//            $this->db->where('employees.BranchId', $BranchId);
//        }
        if (isset($Type) && $Type='Teacher') {
            $this->db->where('employees.IsTeacher', 1);
        }
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->order_by('EmployeeId', 'DESC');
        return $this->db->get()->result();
    }
    function get_designation_wise_employee($BranchId){
        $condition = "";

        $branch_info = $this->Branch->read($BranchId);
        if(!empty($BranchId) && $branch_info->IsHeadOffice ==0) {
            $condition = " WHERE employees.`BranchId`=$BranchId";
        }
        $q = "SELECT employee_designations.`DesignationName` AS label, COUNT(`employees`.`EmployeeId`) AS y
                FROM `employees`
                JOIN `employee_designations` ON employees.`DesignationId` = employee_designations.`DesignationId`
                $condition
                GROUP BY employees.`DesignationId`";
        $results = $this->db->query($q);
        $results = $results->result_array();
        return $results;
    }
    function get_employee_code(){
        $q = "SELECT IFNULL(MAX(`EmployeeId`),0) AS EmployeeId FROM `employees`";
        $results = $this->db->query($q);
        $results = $results->row()->EmployeeId;
        $results = $results+1;
        return sprintf("%03d", $results);
    }
    function get_role_id($Type){
        $condition ="";
        if($Type =='T'){
            $condition .="WHERE user_roles.`role_name` ='Teacher'";
        }
        if($Type == 'E'){
            $condition .="WHERE user_roles.`role_name` ='Payroll' AND is_payroll=1";
        }
        $q = "SELECT `user_roles`.`id`
                FROM user_roles
                $condition";
        $results = $this->db->query($q)->row();
        $role_array = array();
        if(empty($results)){
            $role_id = $this->get_new_id('user_roles', 'id');
            $role_array['id'] = $role_id;
            if($Type =='T'){
                $role_array['role_name'] = 'Teacher';
                $role_array['role_description'] = 'Teacher';
            }
            if($Type == 'E'){
                $role_array['role_name'] = 'Payroll';
                $role_array['role_description'] = 'Payroll';
            }
            $role_array['is_editable'] = 0;
            $this->db->insert('user_roles',$role_array);
        }
        else{
            $role_id = $results->id;
        }
        return $role_id;
    }
}

?>
