<?php
class User extends CI_Model{
    function add($data)
    {
        unset($data['passconf']);
        $data['password']=md5($data['password']);
        $data['reg_date']=date('Y-m-d');
        //
        $query=$this->db->insert('user',$data);
        return $query;
    }
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['role_id']) and !empty($cond['role_id'])){
                $this->db->where('user.role_id', $cond['role_id']);
            }
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])  and $cond['BranchId'] != 1){
                $this->db->where('user.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('user.*, user_roles.role_name,branches.BranchName');
        $this->db->from('user');
        $this->db->join('user_roles', 'user.role_id = user_roles.id');
        $this->db->join('branches', 'user.BranchId = branches.BranchId');
        $this->db->where('user.is_parents', '0');
        $this->db->order_by('user.id','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['role_id']) and !empty($cond['role_id'])){
                $this->db->where('user.role_id', $cond['role_id']);
            }
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])  and $cond['BranchId'] != 1){
                $this->db->where('user.BranchId', $cond['BranchId']);
            }
        }
        $this->db->select('user.*');
        $this->db->where('user.is_parents', '0');
        return $this->db->count_all_results('user');
    }
   function edit($data)
    {
         unset($data['passconf']);
         unset($data['password']);
         
         
        $this->db->where('id',$data['id']);
        $r=$this->db->update('user',$data);
        return $r;
    }
    function delete($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('user');
    }
    function check_unique_user_name($un)
    {
        $this->db->where('user_name',$un);
        $q=$this->db->get('user')->result_array();
        if(!empty($q))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function update_password($id,$password)
    {
        $data['password']=md5($password);
        $this->db->where('id',$id);
        return $this->db->update('user',$data);
    }
    function read($id) {
        return $this->db->get_where('user', array('id' => $id))->row();
    }
    function user_add($data)
    {
        $query=$this->db->insert('user',$data);
        return $query;
    }
    function edit_user($data){
        return $this->db->update('user', $data, array('id'=> $data['id']));
    }
}
