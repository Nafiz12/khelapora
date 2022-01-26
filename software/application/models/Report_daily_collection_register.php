<?php
class Report_daily_collection_register extends CI_Model{
    function get_report_data($BranchId,$ClassId,$Year,$TransactionDate){
        $cond="";
        if(!empty($ClassId) ||$ClassId!=null || $ClassId!='-1' ){
            $cond .=" AND fee_details.CourseId=$ClassId";
        }
        $query = "SELECT fee_details.CourseId AS ClassId,fee_details.TypeId,fee_types.`TypeName`,config_classes.`ClassName`,SUM(Amount) AS Amount
                    FROM `fee_details`
                    JOIN fee_types ON fee_details.`TypeId` = fee_types.`TypeId`
                    JOIN `config_classes` ON fee_details.`CourseId` = config_classes.`ClassId`
                    WHERE fee_details.BranchId=$BranchId
                    $cond
                    AND fee_details.`TransactionDate`='$TransactionDate'
                    AND fee_details.`Year`='$Year'
                    GROUP BY fee_details.`CourseId`,fee_details.`TypeId`
                    ";
        $result = $this->db->query($query)->result_array();
        $report_data = array();
        foreach($result as $row){
            $report_data[$row['ClassId']][$row['TypeId']]['ClassId'] = $row['ClassId'];
            $report_data[$row['ClassId']][$row['TypeId']]['TypeId'] = $row['TypeId'];
            $report_data[$row['ClassId']][$row['TypeId']]['TypeName'] = $row['TypeName'];
            $report_data[$row['ClassId']][$row['TypeId']]['ClassName'] = $row['ClassName'];
            $report_data[$row['ClassId']][$row['TypeId']]['Amount'] = $row['Amount'];
        }
     return $report_data;
    }
}
?>