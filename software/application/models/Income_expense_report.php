<?php

/**
 * Location Model Class.
 * @pupose		Manage Location information
 *
 * @filesource	./system/application/models/location.php
 * @package		asif
 * @version      $Revision: 1 $
 * @author       $Author: S. Asif Raihan $
 * @lastmodified $Date: 2014-20-11 $
 */
class Income_expense_report extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
    }
    function get_income_information($data){
        $condition="";
        $first_date_of_month =$data['from_date'];
        $last_date_of_month =$data['to_date'];
        $BranchId= $data['BranchId'];
        $voucher_type = 'R';
        $query = $this->db->query("SELECT vd.`DebitLedgerId`,SUM(vd.`Amount`) AS Amount,al.LedgerName,al.LedgerCode,al.GroupHeadId
                                    FROM `acc_voucher_details` AS vd
                                    JOIN `acc_vouchers` AS v ON vd.`VoucherId` = v.`VoucherId`
                                     JOIN `acc_ledgers` AS al ON vd.DebitLedgerId = al.LedgerId
                                    WHERE v.`VoucherType`='R'
                                    $condition
                                    AND v.BranchId=$BranchId
                                    AND v.`VoucherDate` >= '$first_date_of_month' AND  v.`VoucherDate` <= '$last_date_of_month'
                                    GROUP BY vd.`DebitLedgerId`
                                    ");
        $income_details = $query->result_array();
        $income_details_array = array();

        foreach($income_details as $row){
            if($row['GroupHeadId']!=0){
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['DebitLedgerId']]['DebitLedgerId'] = $row['DebitLedgerId'];
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['DebitLedgerId']]['GroupHeadId'] = $row['GroupHeadId'];
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['DebitLedgerId']]['DebitLedgerName'] = $row['LedgerCode'].'-'.$row['LedgerName'];
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['DebitLedgerId']]['TillDateIncome'] = $row['Amount'];
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['DebitLedgerId']]['ThisMonthIncome'] = $this->get_between_date_amount_by_ledger_id($BranchId,$row['DebitLedgerId'],$first_date_of_month,$last_date_of_month,$voucher_type);
            }
            else{
                $income_details_array[$row['LedgerName']][$row['DebitLedgerId']]['DebitLedgerId'] = $row['DebitLedgerId'];
                $income_details_array[$row['LedgerName']][$row['DebitLedgerId']]['GroupHeadId'] = $row['GroupHeadId'];
                $income_details_array[$row['LedgerName']][$row['DebitLedgerId']]['DebitLedgerName'] = $row['LedgerCode'].'-'.$row['LedgerName'];
                $income_details_array[$row['LedgerName']][$row['DebitLedgerId']]['TillDateIncome'] = $row['Amount'];
                $income_details_array[$row['LedgerName']][$row['DebitLedgerId']]['ThisMonthIncome'] = $this->get_between_date_amount_by_ledger_id($BranchId,$row['DebitLedgerId'],$first_date_of_month,$last_date_of_month,$voucher_type);
            }


        }
        // echo "<pre>";print_r($income_details_array);die;
        return $income_details_array;
    }
    function get_expense_information($data){
        $condition="";
        $BranchId= $data['BranchId'];
        $voucher_type = 'P';

        // echo $voucher_type ; die;
        $first_date_of_month =$data['from_date'];
        $last_date_of_month =$data['to_date'];

        $query = $this->db->query("SELECT vd.`CreditLedgerId`,SUM(vd.`Amount`) AS Amount,al.LedgerName,al.LedgerCode,al.GroupHeadId
                                    FROM `acc_voucher_details` AS vd
                                    JOIN `acc_vouchers` AS v ON vd.`VoucherId` = v.`VoucherId`
                                    JOIN `acc_ledgers` AS al ON vd.CreditLedgerId = al.LedgerId
                                    WHERE v.`VoucherType`='P'
                                    $condition
                                    AND v.BranchId=$BranchId
                                    AND v.`VoucherDate` >= '$first_date_of_month' AND v.`VoucherDate` <= '$last_date_of_month'
                                    GROUP BY vd.`CreditLedgerId`
                                    ");
        $income_details = $query->result_array();


        // echo "<pre>";print_r($income_details);die;
        $income_details_array = array();

        foreach($income_details as $row){



            if($row['GroupHeadId']!=0){
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['CreditLedgerId']]['CreditLedgerId'] = $row['CreditLedgerId'];

                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['CreditLedgerId']]['GroupHeadId'] = $row['GroupHeadId'];

                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['CreditLedgerId']]['CreditLedgerName'] = $row['LedgerCode'].'-'.$row['LedgerName'];
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['CreditLedgerId']]['TillDateIncome'] = $row['Amount'];
                $income_details_array[$this->get_group_head($row['GroupHeadId'])][$row['CreditLedgerId']]['ThisMonthIncome'] = $this->get_between_date_amount_by_ledger_id($BranchId,$row['CreditLedgerId'],$first_date_of_month,$last_date_of_month,'P');
            }
            else{


                $income_details_array[$row['LedgerName']][$row['CreditLedgerId']]['CreditLedgerId'] = $row['CreditLedgerId'];

                $income_details_array[$row['LedgerName']][$row['CreditLedgerId']]['GroupHeadId'] = $row['CreditLedgerId'];

                $income_details_array[$row['LedgerName']][$row['CreditLedgerId']]['CreditLedgerName'] = $row['LedgerCode'].'-'.$row['LedgerName'];
                $income_details_array[$row['LedgerName']][$row['CreditLedgerId']]['TillDateIncome'] = $row['Amount'];
                $income_details_array[$row['LedgerName']][$row['CreditLedgerId']]['ThisMonthIncome'] = $this->get_between_date_amount_by_ledger_id($BranchId,$row['CreditLedgerId'],$first_date_of_month,$last_date_of_month,$voucher_type);
            }



        }
        // echo "<pre>";print_r($income_details_array);die;

        return $income_details_array;
    }

    public function get_group_head($head){
        $get_head_query = $this->db->query("SELECT acc_ledgers.`LedgerName` FROM acc_ledgers WHERE acc_ledgers.`LedgerId` = $head ")->result();
        return $get_head_query[0]->LedgerName;
    }
    public function get_between_date_amount_by_ledger_id($BranchId,$LedgerId,$first_date_of_month,$Date,$voucher_type){
        $condition="";

        // echo "<pre>";print_r($voucher_type.'=='.$LedgerId);die;
        if($voucher_type == 'R'){
            $condition .= "AND vd.`DebitLedgerId`='$LedgerId'";
        }
        if($voucher_type == 'P'){
            $condition .= "AND vd.`CreditLedgerId`='$LedgerId'";
        }
        $query = $this->db->query("SELECT IFNULL(SUM(vd.`Amount`),0.00) AS Amount
                                    FROM `acc_voucher_details` AS vd
                                    JOIN `acc_vouchers` AS v ON vd.`VoucherId` = v.`VoucherId`
                                    WHERE v.`VoucherDate` BETWEEN '$first_date_of_month' AND '$Date'
                                    AND v.BranchId=$BranchId
                                    $condition");
        return $query->row()->Amount;
    }
}

