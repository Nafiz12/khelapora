<?php
class Report_fee_waiver extends CI_Model{
   

    function get_weaver_fee_data($data){
        $BranchId = $data['BranchId'];
             $classId = $data['ClassId'];
       
        $DateFrom = $data['DateFrom'];
        $DateTo = $data['DateTo'];
        $query = "SELECT fee_details.FeeDetailsId,fee_details.TypeId,fee_details.TransactionDate,fee_details.StudentId,SUM(Amount) AS Amount,SUM(WaiverAmount) AS WaiverAmount
                     FROM `fee_details`
                    WHERE fee_details.BranchId=$BranchId
                    AND fee_details.classId=$classId
                    AND fee_details.TransactionDate BETWEEN '$DateFrom' AND '$DateTo'
                    GROUP BY fee_details.TransactionDate
                     ORDER BY fee_details.TransactionDate";
        $result = $this->db->query($query)->result_array();
        $report_data = array();
        foreach($result as $row){
            $report_data [$row['TransactionDate']]['TransactionDate'] = $row['TransactionDate'];
            $report_data[$row['TransactionDate']]['Amount'] = $row['Amount'];
            $report_data[$row['TransactionDate']]['WaiverAmount'] = $row['WaiverAmount'];
        }
        return $report_data;
    }
    
    function get_weaver_fee_data_all_class($data){
        $BranchId = $data['BranchId'];
       
        $DateFrom = $data['DateFrom'];
        $DateTo = $data['DateTo'];
        $query = "SELECT fee_details.FeeDetailsId,fee_details.ClassId,config_classes.ClassName,fee_details.TypeId,fee_details.TransactionDate,fee_details.StudentId,SUM(Amount) AS Amount,SUM(WaiverAmount) AS WaiverAmount
                     FROM `fee_details`
                     JOIN `config_classes` ON fee_details.ClassId = config_classes.ClassId
                    WHERE fee_details.BranchId=$BranchId
                    AND fee_details.TransactionDate BETWEEN '$DateFrom' AND '$DateTo'
                    GROUP BY fee_details.ClassId
                     ORDER BY fee_details.ClassId";
        $result = $this->db->query($query)->result_array();
        $report_data = array();
        foreach($result as $row){
            $report_data [$row['ClassId']]['ClassName'] = $row['ClassName'];
            $report_data[$row['ClassId']]['Amount'] = $row['Amount'];
            $report_data[$row['ClassId']]['WaiverAmount'] = $row['WaiverAmount'];
        }
        return $report_data;
    }
}
?>