<?php

class Employee_branch_transfer extends MY_Model
{

    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('employee_branch_transfers.OldBranchId', $cond['BranchId']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $where = "(employees.EmployeeCode LIKE '%{$cond['EmployeeName']}%' OR employees.EmployeeName LIKE '%{$cond['EmployeeName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('employee_branch_transfers.*,employees.*,old.BranchName AS OldBranch,new.BranchName AS NewBranch');
        $this->db->from('employee_branch_transfers');
        $this->db->join('employees', 'employee_branch_transfers.EmployeeId = employees.EmployeeId');
        $this->db->join('branches AS old', 'employee_branch_transfers.OldBranchId = old.BranchId');
        $this->db->join('branches AS new', 'employee_branch_transfers.NewBranchId = new.BranchId');
        $this->db->order_by('TransferId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }
    
    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('employee_branch_transfers.OldBranchId', $cond['BranchId']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $where = "(employees.EmployeeCode LIKE '%{$cond['EmployeeName']}%' OR employees.EmployeeName LIKE '%{$cond['EmployeeName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('employee_branch_transfers.*');
        $this->db->join('employees', 'employee_branch_transfers.EmployeeId = employees.EmployeeId');
        return $this->db->count_all_results('employee_branch_transfers');
    }

    function read($id)
    {
        return $this->db->get_where('employee_branch_transfers', array('TransferId' => $id))->row();
    }

    function add($data)
    {
        return $this->db->insert('employee_branch_transfers', $data);
    }

    function edit($data)
    {
        return $this->db->update('employee_branch_transfers', $data, array('TransferId' => $data['TransferId']));
    }

    function delete($id)
    {
        $this->db->where('TransferId', $id);
        $this->db->delete('employee_branch_transfers');
        return true;
    }

}

?>
