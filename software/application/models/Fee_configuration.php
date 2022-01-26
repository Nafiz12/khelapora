<?php
class Fee_configuration extends CI_Model{
    function get_list($limit = null, $offset = null,$cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('fee_configurations.BranchId', $cond['BranchId']);
            }
            if(isset($cond['BatchId']) and !empty($cond['BatchId'])){
                $this->db->where('fee_configurations.BatchId', $cond['BatchId']);
            }
            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->where('fee_configurations.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('fee_configurations.*, config_classes.ClassName AS CourseName,fee_types.TypeName');
        $this->db->from('fee_configurations');
        $this->db->join('config_classes', 'fee_configurations.CourseId = config_classes.ClassId');
        $this->db->join('fee_types', 'fee_configurations.TypeId = fee_types.TypeId');
        $this->db->order_by('fee_configurations.FeeConfigId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('fee_configurations.BranchId', $cond['BranchId']);
            }
            if(isset($cond['ClassId']) and !empty($cond['ClassId'])){
                $this->db->where('fee_configurations.ClassId', $cond['ClassId']);
            }
            if(isset($cond['TypeId']) and !empty($cond['TypeId'])){
                $this->db->where('fee_configurations.TypeId', $cond['TypeId']);
            }
        }
        $this->db->select('fee_configurations.*');
        return $this->db->count_all_results('fee_configurations');
    }

    function read($id){
        return $this->db->get_where('fee_configurations',array('FeeConfigId'=>$id))->row();
    }


    function add($data)
    {
//        echo "<pre>";print_r($data);die;
        return $this->db->insert('fee_configurations',$data);
    }


    function edit($data){
        return $this->db->update('fee_configurations', $data, array('FeeConfigId'=> $data['FeeConfigId']));
    }
    function delete($id)
    {
        $this->db->where('FeeConfigId',$id);
        $this->db->delete('fee_configurations');
        return true;
    }
    function get_class_wise_fee_list($CourseId,$BranchId){
        $query = "SELECT fee_configurations.*, fee_types.`TypeName`,fee_types.*,fee_categories.* FROM `fee_configurations` 
        JOIN `fee_types` ON fee_configurations.`TypeId` = fee_types.`TypeId`
        JOIN `fee_categories` ON fee_types.`CategoryId` = fee_categories.`CategoryId`
        WHERE fee_configurations.`CourseId` = $CourseId
        AND fee_configurations.`BranchId` = $BranchId";
        $query = $this->db->query($query);
        // $sham =  $query->result_array();
        // echo '<pre>'; echo $this->db->last_query(); die;
        return $query->result_array();
    }
    function get_class_wise_onetime_fee($ClassId,$BranchId){
        $query = "SELECT fee_configurations.*, fee_types.`TypeName`,fee_types.* FROM `fee_configurations` 
        JOIN `fee_types` ON fee_configurations.`TypeId` = fee_types.`TypeId`
        WHERE `ClassId` = $ClassId
        AND `BranchId` = $BranchId
        AND fee_types.IsMonthlyFee = 0 
        AND fee_types.IsOneTimeFee = 1";
        $query = $this->db->query($query);
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]['TypeName']=$row->TypeName;
            $fee_type[$row->TypeId]['Amount']=$row->Amount;
            $fee_type[$row->TypeId]['WaiverAmount']=$row->WaiverAmount;
        }
        return $fee_type;

    }
    function get_class_wise_monthly_fee($ClassId,$BranchId){
        $query = "SELECT fee_configurations.*, fee_types.`TypeName`,fee_types.* FROM `fee_configurations` 
        JOIN `fee_types` ON fee_configurations.`TypeId` = fee_types.`TypeId`
        WHERE `ClassId` = $ClassId
        AND `BranchId` = $BranchId
        AND fee_types.IsMonthlyFee = 1 
        AND fee_types.IsOneTimeFee = 0";
        $query = $this->db->query($query);
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]['TypeName']=$row->TypeName;
            $fee_type[$row->TypeId]['Amount']=$row->Amount;
            $fee_type[$row->TypeId]['WaiverAmount']=$row->WaiverAmount;
        }
        return $fee_type;

    }
    function get_class_wise_other_fee($ClassId,$BranchId){
        $query = "SELECT fee_configurations.*, fee_types.`TypeName`,fee_types.* FROM `fee_configurations` 
        JOIN `fee_types` ON fee_configurations.`TypeId` = fee_types.`TypeId`
        WHERE `ClassId` = $ClassId
        AND `BranchId` = $BranchId
        AND fee_types.IsMonthlyFee = 0 
        AND fee_types.IsOneTimeFee = 0";
        $query = $this->db->query($query);
        $query = $query->result();
        $fee_type=array();
        foreach($query as $row){
            $fee_type[$row->TypeId]['TypeName']=$row->TypeName;
            $fee_type[$row->TypeId]['Amount']=$row->Amount;
            $fee_type[$row->TypeId]['WaiverAmount']=$row->WaiverAmount;
        }
        return $fee_type;
    }
    function get_recoverable_till_current_date($data){
        $BranchId = $data['BranchId'];
        $classId = $data['ClassId'];
        $Year = explode('-',$data['Year']);
        $start_date = '01-12-'.$Year[0];
        $current_date = date('Y-m-d');
        if(date('Y', strtotime($start_date))!=date('m', strtotime($current_date))){
            $Year = date('Y', strtotime($current_date));
            $start_date = '01-01-'.$Year;
        }
        $startMonth = date('m', strtotime($start_date));
        $endMonth = date('m', strtotime($current_date));
        $months = (int) $endMonth - (int) $startMonth;
        $months=$months+1;
        $fee_list = $data['monthly_fee_list'];

        $fee_details = array();
        foreach ($fee_list as $key=>$row){
            $fee_details[$key]['TypeId']=$key;
            $fee_details[$key]['TypeName']=$row['TypeName'];
            $fee_details[$key]['Amount']=$row['Amount'];
            $fee_details[$key]['RecoverableAmount']=$row['Amount']*$months;
            $fee_details[$key]['WaiverAmount']=$row['WaiverAmount'];
        }
        return $fee_details;
    }
}
?>