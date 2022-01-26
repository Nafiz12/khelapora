<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_event extends CI_Model
{

   public function show_events_list()
   {
       $query = $this->db->get('news_events')->result();
       //echo "<pre>";print_r($this->db->last_query());die;
       return $query;
   }

    

   public function add($events_data)
   {
       $query = $this->db->insert('news_events',$events_data);
       if($query){
           return true;
       }
       else{
           return false;
       }
   }

   public function get_events_data($id){
       $data = array('id' =>$id);
       $query = $this->db->get_where('news_events ',$data);
       return $query->row();

   }

   public function edit($events_data,$events_id){

       return $this->db->update('news_events', $events_data, array('id' => $events_id));
   }

    public function delete($id,$name){
        
            return $this->db->delete('news_events', array('id' => $id));
       

    }

   





}
