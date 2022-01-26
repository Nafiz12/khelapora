<?php
class Config_general extends CI_Model{
//	function load_config_form_data($form_name)
//		{
//			$this->db->where('form_name',$form_name);
//			$q=$this->db->get('form_container');
//			//echo "<pre>"; print_r($q);
//			$data=array();
//			foreach($q->result_array() as $r)
//			{
//				$data[$r['item']]=$r;
//			}
//			return $data;
//		}
	function get_total_rows($table_name)
	{
		if(empty($table_name))
		{
			return false;
		}
		$query=$this->db->query(" select count(id) as noofmember from $table_name ")->result_array();
		return $query[0]['noofmember']; 
	}
	function dependency_table($table_array,$delete_table_id)
	{
		//echo "<pre>"; print_r($table_array);
		$data=array();
		$data['is_deletable']=true;
		foreach($table_array as $table_name=>$r)
		{
			$colume_name=$r['colume'];
			$q=$this->db->query(" SELECT COUNT(*) AS `numrows` FROM $table_name where $colume_name='$delete_table_id' ")->result_array();
			if($q[0]['numrows'] > 0){ 
				$data['is_deletable']=false;
				$data['messege'][]=$r['messege'];
			}
		}
		return $data;
	}
	function is_dependency_found($table_name,$cond='')
	{
		//echo "<pre>";print_r($cond);die;
		if(is_array($cond))
		{
			$this->db->where($cond);
			$this->db->from($table_name);
			$childs = $this->db->count_all_results();
			if($childs > 0)
			{
				return TRUE;
			}
		}
		return FALSE;

	}
}
