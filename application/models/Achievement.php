<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievement extends CI_Model
{

   public function show_achievements_list()
   {
       $query = $this->db->get('achievements');
       $results = $query->result();
       return $results;
   }

   public function add($achievements_data)
   {
       $query = $this->db->insert('achievements',$achievements_data);
       if($query){
           return true;
       }
       else{
           return false;
       }
   }

   public function get_achievements_data($id){
       $data = array('id' =>$id);
       $query = $this->db->get_where('achievements ',$data);
       return $query->row();

   }

   public function edit($achievements_data,$achievements_id){

       return $this->db->update('achievements', $achievements_data, array('id' => $achievements_id));
   }

    public function delete($id,$name){
       
            return $this->db->delete('achievements', array('id' => $id));
       

    }





}
