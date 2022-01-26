<?php
class Student_parent extends MY_Model{

    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])  and $cond['BranchId'] != 1){
                $this->db->where('user.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('students.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('students.SectionId', $cond['SectionId']);
            }
            if(isset($cond['StudentName']) and !empty($cond['StudentName'])){
                $where = "(students.StudentCode LIKE '%{$cond['StudentName']}%' OR students.StudentName LIKE '%{$cond['StudentName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('user.*, branches.BranchName,students.StudentName,students.StudentCode,students.ContactNumber');
        $this->db->from('user');
        $this->db->join('branches', 'user.BranchId = branches.BranchId');
        $this->db->join('parents', 'user.id = parents.userId');
        $this->db->join('students', 'parents.StudentId = students.StudentId');
        $this->db->where('user.is_parents', '1');
        $this->db->order_by('user.id','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])  and $cond['BranchId'] != 1){
                $this->db->where('user.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('students.ClassId', $cond['ClassId']);
            }
            if(isset($cond['SectionId']) and !empty($cond['SectionId'])){
                $this->db->where('students.SectionId', $cond['SectionId']);
            }
            if(isset($cond['StudentName']) and !empty($cond['StudentName'])){
                $where = "(students.StudentCode LIKE '%{$cond['StudentName']}%' OR students.StudentName LIKE '%{$cond['StudentName']}%')";
                $this->db->where($where);
            }
        }
        $this->db->select('user.*');
        $this->db->join('branches', 'user.BranchId = branches.BranchId');
        $this->db->join('parents', 'user.id = parents.userId');
        $this->db->join('students', 'parents.StudentId = students.StudentId');
        $this->db->where('user.is_parents', '1');
        return $this->db->count_all_results('user');
    }


    function add($data){
        return $this->db->insert('parents',$data);
    }
    function get_student_parent_information($id){
        return $this->db->get_where('parents',array('StudentId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('parents', $data, array('ParentId'=> $data['ParentId']));
    }
    function delete($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('user');
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
        $data['password']=md5($data['password']);
        return $this->db->update('user', $data, array('id'=> $data['id']));
    }
    function get_parent_role_id(){
        $q = "SELECT `user_roles`.`id`
                FROM user_roles
                WHERE user_roles.`role_name`='Parent'";
        $results = $this->db->query($q)->row();
        $parent_role_array = array();
        if(empty($results)){
            $role_id = $this->get_new_id('user_roles', 'id');
            $parent_role_array['id'] = $role_id;
            $parent_role_array['role_name'] = 'Parent';
            $parent_role_array['role_description'] = 'Student Parent';
            $parent_role_array['is_editable'] = 0;
            $this->db->insert('user_roles',$parent_role_array);
        }
        else{
            $role_id = $results->id;
        }
        return $role_id;
    }
}
?>