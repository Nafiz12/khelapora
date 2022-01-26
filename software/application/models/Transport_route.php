<?php
class Transport_route extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list() {
        $this->db->order_by('RouteId');
        $this->db->select('*');
        $this->db->from('transport_routes');
        $query = $this->db->get();
        return $query->result();
    }
    function add($data) {
        $this->db->insert('transport_routes', $data);
        return $this->db->insert_id();
    }
    function read($id){
        return $this->db->get_where('transport_routes',array('RouteId'=>$id))->row();
    }
    function edit($data){
        return $this->db->update('transport_routes', $data, array('RouteId'=> $data['RouteId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('transport_routes', array('RouteId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_route_list(){
        $this->db->order_by('RouteId');
        $this->db->select('*');
        $this->db->from('transport_routes');
        $query = $this->db->get();
        $query =  $query->result_array();
        $route_array= array();
        foreach($query as $row){
            $route_array[$row['RouteId']]['RouteId'] =$row['RouteId'];
            $route_array[$row['RouteId']]['RouteName'] =$row['RouteName'];
        }
        return $route_array;
    }
}
