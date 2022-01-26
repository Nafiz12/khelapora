<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{

   public function show_admin_list()
   {
       $query = $this->db->get('admin');
       $results = $query->result();
       return $results;
   }

   public function add($admin_data)
   {
       $query = $this->db->insert('admin',$admin_data);
       if($query){
           return true;
       }
       else{
           return false;
       }
   }

   public function get_admin_data($id){
       $data = array('id' =>$id);
       $query = $this->db->get_where('admin',$data);
       return $query->row();

   }

   public function edit($admin_data,$admin_id){

       return $this->db->update('admin', $admin_data, array('id' => $admin_id));
   }

   public function delete($id){
       return $this->db->delete('admin', array('id' => $id));
   }





}
