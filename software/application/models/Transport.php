<?php
class Transport extends MY_Model{
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['TransportName']) and !empty($cond['TransportName'])){
                $this->db->where('transports.TransportName', $cond['TransportName']);
            }
            if(isset($cond['RouteId']) and !empty($cond['RouteId'])){
                $this->db->where('transports.RouteId', $cond['RouteId']);
            }
            if(isset($cond['TransportNumber']) and !empty($cond['TransportNumber'])){
                $this->db->where('transports.TransportNumber', $cond['TransportNumber']);
            }
        }
        $this->db->select('transports.*');
        $this->db->from('transports');
        $this->db->order_by('transports.TransportId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }

    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['TransportName']) and !empty($cond['TransportName'])){
                $this->db->where('transports.TransportName', $cond['TransportName']);
            }
            if(isset($cond['RouteId']) and !empty($cond['RouteId'])){
                $this->db->where('transports.RouteId', $cond['RouteId']);
            }
            if(isset($cond['TransportNumber']) and !empty($cond['TransportNumber'])){
                $this->db->where('transports.TransportNumber', $cond['TransportNumber']);
            }
        }
        $this->db->select('transports.*');
        return $this->db->count_all_results('transports');
    }
    function read($id){
        return $this->db->get_where('transports',array('TransportId'=>$id))->row();
    }
    function add($data)
    {
        return $this->db->insert('transports',$data);
    }
    function edit($data){
        return $this->db->update('transports', $data, array('TransportId'=> $data['TransportId']));
    }
    function delete($id)
    {
        $this->db->where('TransportId',$id);
        $this->db->delete('transports');
        return true;
    }
}
?>