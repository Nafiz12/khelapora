<?php
class Leave_authorization extends CI_Model{

	
	public function get_list($limit = null, $offset = null,$cond=null){

		if(is_array($cond)){
			if(isset($cond['Name']) and !empty($cond['Name'])){
				$this->db->where('leave_applies.Name', $cond['Name']);
			}
           
		}

		$this->db->select('leave_applies.*,leave_categories.Name');
		$this->db->from('leave_applies');
                $this->db->join('leave_categories', 'leave_applies.LeaveCategoriesId = leave_categories.LeaveCategoryId');
		$this->db->order_by('leave_applies.LeaveApplicationId','DESC');
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
            if(isset($cond['LocationId']) and !empty($cond['LocationId'])){
                $this->db->where('user.LocationId', $cond['LocationId']);
            }
		}
		$this->db->select('user.*');
		return $this->db->count_all_results('user');
	}

	 public function approved($data)
		{
              $query=$this->db->query("UPDATE leave_applies SET IsApproved =1 WHERE LeaveApplicationId=$data");

		   return $query;
		}
                
                 public function reject($data)
		{
              $query=$this->db->query("UPDATE leave_applies SET IsApproved =2 WHERE LeaveApplicationId=$data");

		   return $query;
		}

    public function read($id) {
        return $this->db->get_where('leave_applies', array('LeaveApplicationId' => $id))->row();
    }
   public function get_leave_categories() {
        $query = $this->db->query("SELECT LeaveCategoryId,Name FROM leave_categories")->result_array();
        return $query;
    }
}
