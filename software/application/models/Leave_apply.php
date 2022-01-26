<?php
class Leave_apply extends CI_Model{

	public function add($data)
		{	
			$query=$this->db->insert('leave_applies',$data);
			return $query;
		}
                
                public function leave_info($data)
		{	
                    $employee_info= $this->db->get_where('employees', array('EmployeeId' => $data))->row();
                    $current_date=  date("Y-m-d");
                    $joining_date=$employee_info->DateOfJoining;
                    $diff = abs(strtotime($current_date) - strtotime($joining_date));
                    $years_diff =4;//floor($diff / (365*60*60*24))-1;
                    //echo"<pre>";print_r($years_diff);die; 
                    $leave_calculation=$this->db->select('leave_calculations.*');
		                       $this->db->from('leave_calculations');
                    $leave_calculations=$this->db->get()->result();
                    $leave_number=  array();
                    $leave_number['approved_leave']=0;
                    foreach ($leave_calculations as $row){
                        //echo"<pre>";print_r($row);die; 
                        if($years_diff==$row->Year || $years_diff>$row->Year){
                            $leave_number['SickLeave']=$row->SickLeave;
                            $leave_number['EarnLeave']=$row->EarnLeave;
                        }  
                    }
                    //echo"<pre>";print_r($data);die; 
                    $approved_leave = $this->db->query("SELECT leave_applies.* FROM leave_applies WHERE leave_applies.UserId=$data AND leave_applies.IsApproved=1")->result();
                    foreach ($approved_leave as $rows){
                       $diff = abs(strtotime($rows->Todate) - strtotime($rows->FromDate));
                       $years = floor($diff / (365*60*60*24));
                       $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                       $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24))+1;
                       $leave_number['approved_leave']+=$days;
                       
                    }
                    
                    //echo"<pre>";print_r($leave_number);die; 
                    return $leave_number;
		}


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

	 public function edit($data)
		{
	       $this->db->where('LeaveApplicationId',$data['LeaveApplicationId']);
		   $query=$this->db->update('leave_applies',$data);
		   return $query;
		}

        public function delete($id)
		{
			$this->db->where('LeaveApplicationId',$id);
			return $this->db->delete('leave_applies');
		}


	
    public function read($id) {
        return $this->db->get_where('leave_applies', array('LeaveApplicationId' => $id))->row();
    }

    public function view($id) {

    	$query = $this->db->query("SELECT leave_applies.*")->row();
        return $query;
    }
    
     public function get_leave_categories() {
        $query = $this->db->query("SELECT LeaveCategoryId,Name FROM leave_categories")->result_array();
        return $query;
    }

}
