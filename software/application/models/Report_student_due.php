<?php
class Report_student_due extends CI_Model{
	public function __construct() {
        // Call the Model constructor
		parent::__construct();
		$this->load->database();
	}


	public function fee_configuration_check($BranchId,$CourseId){

		$data = array();
		$query = $this->db->query("SELECT fee_types.`TypeId`,fee_configurations.`Amount` FROM  fee_types JOIN fee_configurations ON fee_types.`TypeId` = fee_configurations.`TypeId` WHERE fee_types.`IsOneTimeFee` = 1 AND fee_configurations.`BranchId` = $BranchId AND fee_configurations.`CourseId` = $CourseId ")->result();

		foreach($query as $row)
		{
			$data['payable_amount'] = $row->Amount;
			$data['TypeId'] = $row->TypeId;
		}
		       // echo "<pre>";print_r($data['payable_amount'] = $get_type_details[0]->Amount);die;

		return $data;
	}

	public function fee_details($id,$BranchId)
	{



		$query = $this->db->query("SELECT `fee_details`.`TransactionDate`,`students`.`StudentName`,`students`.`AdmissionDate`,`students`.`StudentCode`,`students`.`Status`,`batches`.`BatchName`,`fee_details`.`Amount` AS `TotalAmount`,`fee_details`.`WaiverAmount` FROM fee_details JOIN students ON fee_details.StudentId = students.StudentId  JOIN batches ON students.BatchId = batches.BatchId
			WHERE  fee_details.StudentId = $id AND  fee_details.BranchId = $BranchId ORDER BY fee_details.TransactionDate ASC ")->result_array();
	      // echo "<pre>";print_r($this->db->last_query());die;


		return $query;
	}




	public function getMonthsInRange($startDate, $endDate) 
	{
		$months = array();
		while (strtotime($startDate) <= strtotime($endDate)) {
			$months[] = array('year' => date('Y', strtotime($startDate)), 'month' => date("F", mktime(0, 0, 0, date('m', strtotime($startDate)), 10)) );
	                // date('m', strtotime($startDate)), );
			$startDate = date('d M Y', strtotime($startDate.
				'+ 1 month'));
		}

		return $months;
	}


}
