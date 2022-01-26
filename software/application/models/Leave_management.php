<?php
class Leave_management extends CI_Model{

	public function get_list($limit = null, $offset = null,$cond=null){

		if(is_array($cond)){
			if(isset($cond['Name']) and !empty($cond['Name'])){
				$this->db->where('leave_categories.Name', $cond['Name']);
			}
            
		}

		$this->db->select('leave_categories. LeaveCategoryId,leave_categories.Name');
		$this->db->from('leave_categories');
		$this->db->order_by('leave_categories.LeaveCategoryId','ASC');
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
			$query=$this->db->insert('leave_categories',$data);
			return $query;
		}
                
                public function edit($data)
		{
	       $this->db->where('LeaveCategoryId',$data['LeaveCategoryId']);
		   $query=$this->db->update('leave_categories',$data);
		   return $query;
		}
                
                public function read($id) {
        return $this->db->get_where('leave_categories', array('LeaveCategoryId' => $id))->row();
    }
                
	public function delete($id)
		{
			$this->db->where('LeaveCategoryId',$id);
			return $this->db->delete('leave_categories');
		}
}
