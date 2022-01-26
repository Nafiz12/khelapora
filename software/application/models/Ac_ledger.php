<?php
class Ac_ledger extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->like('acc_ledgers.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('acc_ledgers.*');
        $this->db->from('acc_ledgers');
        $this->db->order_by('acc_ledgers.LedgerId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }
    function get_acc_ledger_list($limit = null, $offset = null,$cond=null){
        $type_id=null;
        if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
            $type_id = $cond['TypeId'];
        }
        $ledger_list = $this->fetchCategoryTree_index($parent = 0, $spacing = '', $user_tree_array = '',$type_id);
        $ledger_array = array();
        foreach ($ledger_list as $row){
            $ledger_array[$row['LedgerId']]['LedgerId'] = $row['LedgerId'];
            $ledger_array[$row['LedgerId']]['LedgerName'] = $row['LedgerName'];
            $ledger_array[$row['LedgerId']]['LedgerCode'] = $row['LedgerCode'];
            $ledger_array[$row['LedgerId']]['TypeId'] = $row['TypeId'];
            $ledger_array[$row['LedgerId']]['TypeName'] = $this->get_type_name($row['TypeId']);
            $ledger_array[$row['LedgerId']]['IsDeletable'] = $row['IsDeletable'];
            $ledger_array[$row['LedgerId']]['IsGroupHead'] = $row['IsGroupHead'];
            $ledger_array[$row['LedgerId']]['GroupHeadId'] = $row['GroupHeadId'];
            if($row['IsDeletable'] == 1 && $row['IsGroupHead'] == 1){
                $check_sub_head = $this->check_sub_head($row['LedgerId']);
                //echo '<pre>'; print_r($check_sub_head); die;
                if($check_sub_head == 1){
                    $ledger_array[$row['LedgerId']]['IsDeletable'] =0;
                }
            }

        }
        //echo '<pre>'; print_r($ledger_array); die;
        return $ledger_array;

    }
    function check_sub_head($ledger_id){
        $value = 0;
        $result = $this->db->query("SELECT LedgerId AS LedgerId FROM `acc_ledgers` WHERE GroupHeadId=$ledger_id")->result();
        if(is_array($result) && !empty($result)){
            $value = 1;
        }
        return $value;
    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->like('acc_ledgers.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('acc_ledgers.*');
        return $this->db->count_all_results('acc_ledgers');
    }

    function add($data) {
        //echo"In <pre>"; print_r($data); die;
        return $this->db->insert('acc_ledgers', $data);
    }

    function read($id) {
        return $this->db->get_where('acc_ledgers', array('LedgerId' => $id))->row();
    }

    function edit($data) {
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('acc_ledgers', $data, array('LedgerId' => $data['LedgerId']));
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('acc_ledgers', array('LedgerId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_ledger_account_type_list(){
        $account_types = $this->db->query("SELECT * FROM acc_account_types WHERE TypeId IN (10,11,20,30,40,52) ORDER BY Name");
        $query = $account_types->result();
        $type_array = array();
        foreach($query as $row){
            $type_array[$row->TypeId]['TypeId'] = $row->TypeId;
            $type_array[$row->TypeId]['Name'] = $row->Name;
            $type_array[$row->TypeId]['Type'] = $row->Type;
        }
        return $type_array;
    }
    function get_all_ledger_account_type_list(){
        $account_types = $this->db->query("SELECT * FROM acc_account_types ORDER BY Name");
        $query = $account_types->result();
        $type_array = array();
        foreach($query as $row){
            $type_array[$row->TypeId]['TypeId'] = $row->TypeId;
            $type_array[$row->TypeId]['Name'] = $row->Name;
            $type_array[$row->TypeId]['Type'] = $row->Type;
        }
        return $type_array;
    }
    function get_ledger_by_code($code){
        $account_types = $this->db->query("SELECT LedgerId FROM acc_ledgers WHERE LedgerCode='$code'");
        return $account_types->row()->LedgerId;
    }
    function get_type_name($id){
        $account_types = $this->db->query("SELECT Name FROM acc_account_types WHERE TypeId='$id'");
        return $account_types->row()->Name;
    }
    function read_by_code($code) {
        return $this->db->get_where('acc_ledgers', array('LedgerCode' => $code))->row();
    }
    function get_group_heads(){
        $account_types = $this->db->query("SELECT * 
                            FROM acc_ledgers 
                            WHERE acc_ledgers.IsGroupHead=1
                            ORDER BY TypeId ASC");
        $query = $account_types->result();
        $type_array = array();
        foreach($query as $row){
            $type_array[$row->LedgerId]['LedgerId'] = $row->LedgerId;
            $type_array[$row->LedgerId]['LedgerName'] = $row->LedgerName;
            $type_array[$row->LedgerId]['TypeId'] = $row->TypeId;
        }
        return $type_array;
    }

    function fetchCategoryTree_index($parent = 0, $spacing = '', $user_tree_array = '',$type_id=null) {
        $cond="";
        if(isset($type_id) && !empty($type_id) && $type_id!=null){
            $cond .="AND TypeId =$type_id";
        }
        if (!is_array($user_tree_array))
            $user_tree_array = array();

        $query2 = "SELECT * FROM `acc_ledgers` WHERE 1 AND `GroupHeadId` = '$parent' $cond ORDER BY TypeId ASC";
        $query2 = $this->db->query($query2);
        $data = $query2->result();
        $spacing = "&nbsp;&nbsp;&nbsp;&nbsp;".$spacing;

        foreach($data as $row){
            $user_tree_array[] = array("LedgerId" => $row->LedgerId,"LedgerCode" => $row->LedgerCode, "LedgerName" => (($row->IsGroupHead!=1)?$spacing. ' ':'') . $row->LedgerName,"TypeId" => $row->TypeId,"IsDeletable"=>$row->IsDeletable,"IsGroupHead"=>$row->IsGroupHead,"GroupHeadId"=>$row->GroupHeadId);

            $user_tree_array = $this->fetchCategoryTree_index($row->LedgerId, $spacing, $user_tree_array,$type_id);
        }
        return $user_tree_array;
    }
    
    function isGroupHeadCheck($id){
        $account_types = $this->db->query("SELECT isgrouphead AS head FROM acc_ledgers WHERE ledgerId = $id");
        return $account_types->row()->head;
    }
    
    function getAllChildGroup($id){
        $account_types = $this->db->query("SELECT ledgerId AS LedgerId FROM acc_ledgers WHERE groupheadid = $id");
        return $account_types->result_array();
    }

}
