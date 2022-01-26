<?php
class Config_class_period extends CI_Model{
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null, $cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('batches.BranchId', $cond['BranchId']);
            }
            if(isset($cond['BatchName']) and !empty($cond['BatchName'])){
                $this->db->where('batches.BatchName', $cond['BatchName']);
            }
        }
        
        $this->db->select('batches.*,branches.BranchName,config_classes.ClassId,config_classes.ClassName');
        $this->db->from('batches');
         $this->db->join('branches', 'batches.BranchId = branches.BranchId');
         $this->db->join('config_classes', 'batches.CourseId = config_classes.ClassId');

        $this->db->order_by('BatchId', 'DESC');
        if (isset($limit) && $limit > 0) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond = null)
    {
        if (is_array($cond)) {
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('batches.BranchId', $cond['BranchId']);
            }

            if(isset($cond['BatchName']) and !empty($cond['BatchName'])){
                $this->db->where('batches.BatchName', $cond['BatchName']);
            }
        }
        $this->db->select('batches.*');
        return $this->db->count_all_results('batches');
    }
    function add($data) {
        return $this->db->insert('batches', $data);
    }
    function read($id){
        return $this->db->get_where('batches',array('BatchId'=>$id))->row();
    }
    function edit($data){
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('batches', $data, array('BatchId'=> $data['BatchId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('batches', array('BatchId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_period_list() {
        $this->db->select('*');
        $this->db->from('config_class_periods');
        $query = $this->db->get();
        $query = $query->result_array();
        $period_array = array();
        foreach($query as $row){
            $period_array[$row['PeriodId']]['PeriodId'] = $row['PeriodId'];
            $period_array[$row['PeriodId']]['PeriodName'] = $row['PeriodName'];
            $period_array[$row['PeriodId']]['PeriodTime'] = $row['PeriodStartTime'].'-'.$row['PeriodEndTime'];
        }
        return $period_array;
    }
    function get_period_list_by_shift($Shift) {
        $this->db->select('*');
        $this->db->from('config_class_periods');
        $this->db->where('Shift',$Shift);
        $query = $this->db->get();
        $query = $query->result_array();
        $period_array = array();
        foreach($query as $row){
            $period_array[$row['PeriodId']]['PeriodId'] = $row['PeriodId'];
            $period_array[$row['PeriodId']]['PeriodName'] = $row['PeriodName'];
            $period_array[$row['PeriodId']]['PeriodTime'] = $row['PeriodStartTime'].'-'.$row['PeriodEndTime'];
        }
        return $period_array;
    }

    function get_batch_list(){
        $query = $this->db->query("SELECT DISTINCT(BatchName) FROM batches")->result();
        return $query;
    }
}
