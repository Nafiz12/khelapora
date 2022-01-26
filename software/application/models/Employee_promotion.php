<?php

class Employee_promotion extends MY_Model
{

    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('employee_promotions.BranchId', $cond['BranchId']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $where = "(employees.EmployeeCode LIKE '%{$cond['EmployeeName']}%' OR employees.EmployeeName LIKE '%{$cond['EmployeeName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('employee_promotions.*,employees.*,old.DesignationName AS OldDesignationName, new.DesignationName AS NewDesignationName');
        $this->db->from('employee_promotions');
        $this->db->join('employees', 'employee_promotions.EmployeeId = employees.EmployeeId');
        $this->db->join('employee_designations AS old', 'employee_promotions.OldDesignationId = old.DesignationId');
        $this->db->join('employee_designations AS new', 'employee_promotions.NewDesignationId = new.DesignationId');
        $this->db->order_by('PromotionId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }

    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('employee_promotions.BranchId', $cond['BranchId']);
            }
            if(isset($cond['EmployeeName']) and !empty($cond['EmployeeName'])){
                $where = "(employees.EmployeeCode LIKE '%{$cond['EmployeeName']}%' OR employees.EmployeeName LIKE '%{$cond['EmployeeName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('employee_promotions.*');
        $this->db->join('employees', 'employee_promotions.EmployeeId = employees.EmployeeId');
        return $this->db->count_all_results('employee_promotions');
    }

    function read($id)
    {
        return $this->db->get_where('employee_promotions', array('PromotionId' => $id))->row();
    }

    function add($data)
    {
        return $this->db->insert('employee_promotions', $data);
    }

    function edit($data)
    {
        return $this->db->update('employee_promotions', $data, array('PromotionId' => $data['PromotionId']));
    }

    function delete($id)
    {
        $this->db->where('PromotionId', $id);
        $this->db->delete('employee_promotions');
        return true;
    }

}

?>
