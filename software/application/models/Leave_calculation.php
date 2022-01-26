<?php
class Leave_calculation extends CI_Model{

	public function get_list($limit = null, $offset = null,$cond=null){

		if(is_array($cond)){
			if(isset($cond['Year']) and !empty($cond['Year'])){
				$this->db->where('leave_categories.Year', $cond['Year']);
			}
            
		}

		$this->db->select('leave_calculations. LeaveCalculationId,leave_calculations.Year,leave_calculations.SickLeave,leave_calculations.EarnLeave');
		$this->db->from('leave_calculations');
		$this->db->order_by('leave_calculations.LeaveCalculationId','ASC');
		if(isset($limit)&& $limit>0){
			$this->db->limit($limit,$offset);
		}
		return $this->db->get()->result();

	}
        
        	public function row_count($cond=null){
		if(is_array($cond)){
			if(isset($cond['role_id']) and !empty($cond['role_id'])){
				$this->db->where('user.role_id', $cond['role_id']);
			}
            
		}
		$this->db->select('user.*');
		return $this->db->count_all_results('user');
	}
        
        public function add($data)
		{	
			$query=$this->db->insert('leave_calculations',$data);
			return $query;
		}
                
                public function edit($data)
		{
	       $this->db->where('LeaveCalculationId',$data['LeaveCalculationId']);
		   $query=$this->db->update('leave_calculations',$data);
		   return $query;
		}
                
                public function read($id) {
        return $this->db->get_where('leave_calculations', array('LeaveCalculationId' => $id))->row();
    }
                
	public function delete($id)
		{
			$this->db->where('LeaveCalculationId',$id);
			return $this->db->delete('leave_calculations');
		}
}
