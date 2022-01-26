<?php
class user_role extends CI_Model{
	function get_list($cond=null,$row_per_page=null,$start_from=null)
	{

		$query=" select * from user_roles ";
		$query .=(!empty($cond))?" where $cond ":" ";
		$query .=" order by id asc ";
		if(!empty($row_per_page)){ $query .=" limit $start_from,$row_per_page"; }
		//echo $query;  die;
		$q=$this->db->query($query);
		$data=array();
		foreach($q->result_array() as $r)
		{
			$data[$r['id']]=$r;
		}
		return $data;
	}
	function add($data)
	{
		$q=$this->db->insert('user_roles',$data);
		return $q;
	}
	function edit($data)
	{
		$this->db->where('id',$data['id']);
		$q=$this->db->update('user_roles',$data);
		return $q;
	}
	function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('user_roles');
	}
	function save_user_user_role_wise_privileges($data,$role_id)
	{
//		echo "<pre>";print_r($data.$role_id);die;
		if(empty($data))
		{
			return false;
		}
		$save=array();
		//echo "<pre>"; print_r($data); 
		$i=0;
		unset($data['submit']);
		foreach ($data as $r) 
		{	
			foreach ($r as $controller=> $r2) 
			{	//echo $function;
				foreach ($r2 as $function=> $r3) 
				{
                    $save[$i]['controller']=$controller;
                    $save[$i]['action']=$function;
                    $save[$i]['role_id']=$role_id;
                    if($function == "index"){
                        $i++;
                        $save[$i]['controller']=$controller;
                        $save[$i]['action']='view';
                        $save[$i]['role_id']=$role_id;
                    }
                    $i++;
				}
			}
		}

		$this->db->where('role_id',$role_id);
		$this->db->delete('user_role_wise_privileges');
		$q=$this->db->insert_batch('user_role_wise_privileges',$save);
		return $q;
	}
	function get_user_user_role_wise_privileges($role_id)
	{
		$this->db->where('role_id',$role_id);
		$q=$this->db->get('user_role_wise_privileges')->result();
		$data=array();
		foreach ($q as $r) {
			$data[$r->controller][$r->action]=1;
		}
		//echo "<pre>"; print_r($data);
		return $data;	
	}
    function read($id){
        return $this->db->get_where('user_roles',array('id'=>$id))->row();
    }
}
?>
