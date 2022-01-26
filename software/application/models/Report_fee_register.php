<?php
class Report_fee_register extends CI_Model{
    function get_onetime_fee_data($data){
        $BranchId = $data['BranchId'];
        $Year = $data['Year'];
        $classId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $fee_list = implode(",",array_keys($data['onetime_fee_list']));
        $query = "SELECT fee_details.*,StudentName,StudentCode,ContactNumber,RollNo,SectionName FROM `fee_details`
                    JOIN students ON fee_details.StudentId= students.StudentId
                    JOIN `config_sections` ON students.SectionId = config_sections.SectionId
                    WHERE fee_details.BranchId=$BranchId
                    AND fee_details.Year='$Year'
                    AND fee_details.classId=$classId
                    AND students.SectionId=$SectionId
                    AND fee_details.TypeId IN ($fee_list)";
        $result = $this->db->query($query)->result_array();
        $report_data = array();
        foreach($result as $row){
            $report_data[$row['StudentId']][$row['TypeId']]['StudentName'] = $row['StudentName'];
            $report_data[$row['StudentId']][$row['TypeId']]['StudentCode'] = $row['StudentCode'];
            $report_data[$row['StudentId']][$row['TypeId']]['ContactNumber'] = $row['ContactNumber'];
            $report_data[$row['StudentId']][$row['TypeId']]['RollNo'] = $row['RollNo'];
            $report_data[$row['StudentId']][$row['TypeId']]['SectionName'] = $row['SectionName'];
            $report_data[$row['StudentId']][$row['TypeId']]['Amount'] = $row['Amount'];
            $report_data[$row['StudentId']][$row['TypeId']]['WaiverAmount'] = $row['WaiverAmount'];
        }
        return $report_data;
    }
    function get_monthly_fee_data($data){
        $BranchId = $data['BranchId'];
        $Year = $data['Year'];
        $classId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $fee_list = implode(",",array_keys($data['monthly_fee_list']));
        $query = "SELECT fee_details.FeeDetailsId,fee_details.StudentId,fee_details.TypeId,SUM(`fee_details`.Amount) AS Amount,SUM(`fee_details`.WaiverAmount) AS WaiverAmount,StudentName,
                    StudentCode,ContactNumber,RollNo,SectionName FROM `fee_details`
                    JOIN students ON fee_details.StudentId= students.StudentId
                    JOIN `config_sections` ON students.SectionId = config_sections.SectionId
                    WHERE fee_details.BranchId=$BranchId
                    AND fee_details.Year='$Year'
                    AND fee_details.classId=$classId
                    AND students.SectionId=$SectionId
                    AND fee_details.TypeId IN ($fee_list)
                    GROUP BY fee_details.StudentId, fee_details.TypeId";
        $result = $this->db->query($query)->result_array();
        $report_data = array();
        foreach($result as $row){
            $report_data[$row['StudentId']][$row['TypeId']]['StudentName'] = $row['StudentName'];
            $report_data[$row['StudentId']][$row['TypeId']]['StudentCode'] = $row['StudentCode'];
            $report_data[$row['StudentId']][$row['TypeId']]['ContactNumber'] = $row['ContactNumber'];
            $report_data[$row['StudentId']][$row['TypeId']]['RollNo'] = $row['RollNo'];
            $report_data[$row['StudentId']][$row['TypeId']]['SectionName'] = $row['SectionName'];
            $report_data[$row['StudentId']][$row['TypeId']]['Amount'] = $row['Amount'];
            $report_data[$row['StudentId']][$row['TypeId']]['WaiverAmount'] = $row['WaiverAmount'];
        }
        return $report_data;
    }
    function get_other_fee_data($data){
        $BranchId = $data['BranchId'];
        $Year = $data['Year'];
        $classId = $data['ClassId'];
        $SectionId = $data['SectionId'];
        $DateFrom = $data['DateFrom'];
        $DateTo = $data['DateTo'];
        $fee_list = implode(",",array_keys($data['other_fee_list']));
        $query = "SELECT fee_details.FeeDetailsId,fee_details.TypeId,fee_details.StudentId,SUM(Amount) AS Amount,SUM(WaiverAmount) AS WaiverAmount,
                    StudentName,StudentCode,ContactNumber,RollNo,SectionName FROM `fee_details`
                    JOIN students ON fee_details.StudentId= students.StudentId
                    JOIN `config_sections` ON students.SectionId = config_sections.SectionId
                    WHERE fee_details.BranchId=$BranchId
                    AND fee_details.Year='$Year'
                    AND fee_details.classId=$classId
                    AND students.SectionId=$SectionId
                    AND fee_details.TransactionDate BETWEEN '$DateFrom' AND '$DateTo'
                    AND fee_details.TypeId IN ($fee_list)
                    GROUP BY fee_details.TypeId";
        $result = $this->db->query($query)->result_array();
        $report_data = array();
        foreach($result as $row){
            $report_data[$row['StudentId']][$row['TypeId']]['StudentName'] = $row['StudentName'];
            $report_data[$row['StudentId']][$row['TypeId']]['StudentCode'] = $row['StudentCode'];
            $report_data[$row['StudentId']][$row['TypeId']]['ContactNumber'] = $row['ContactNumber'];
            $report_data[$row['StudentId']][$row['TypeId']]['RollNo'] = $row['RollNo'];
            $report_data[$row['StudentId']][$row['TypeId']]['SectionName'] = $row['SectionName'];
            $report_data[$row['StudentId']][$row['TypeId']]['Amount'] = $row['Amount'];
            $report_data[$row['StudentId']][$row['TypeId']]['WaiverAmount'] = $row['WaiverAmount'];
        }
        return $report_data;
    }
}
?>