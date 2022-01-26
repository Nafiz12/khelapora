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
class Ac_income_statement extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
    }
    function get_income_information($data){
        $condition="";
        $first_date_of_month =date('Y-m-01', strtotime($data['date']));
        $last_date_of_month =date('Y-m-t', strtotime($data['date']));
        //echo '<pre>'; print_r($first_date_of_month.'--'.$last_date_of_month); die;

        $BranchId= $data['BranchId'];


        $query = $this->db->query("SELECT vd.`DebitLedgerId`,SUM(vd.`Amount`) AS Amount,al.LedgerName,al.LedgerCode
                                    FROM `acc_voucher_details` AS vd
                                    JOIN `acc_vouchers` AS v ON vd.`VoucherId` = v.`VoucherId`
                                     JOIN `acc_ledgers` AS al ON vd.DebitLedgerId = al.LedgerId
                                    WHERE v.`VoucherType`='R'
                                    $condition
                                    AND v.BranchId=$BranchId
                                    AND v.`VoucherDate` <= '$last_date_of_month'
                                    GROUP BY vd.`DebitLedgerId`
                                    ");
        $income_details = $query->result_array();
        $income_details_array = array();

        foreach($income_details as $row){
            $income_details_array[$row['DebitLedgerId']]['DebitLedgerId'] = $row['DebitLedgerId'];
            $income_details_array[$row['DebitLedgerId']]['DebitLedgerName'] = $row['LedgerCode'].'-'.$row['LedgerName'];
            $income_details_array[$row['DebitLedgerId']]['TillDateIncome'] = $row['Amount'];
            $income_details_array[$row['DebitLedgerId']]['ThisMonthIncome'] = $this->get_between_date_amount_by_ledger_id($BranchId,$row['DebitLedgerId'],$first_date_of_month,$last_date_of_month,'R');
        }
        return $income_details_array;
    }
    function get_expense_information($data){
        $condition="";
        $BranchId= $data['BranchId'];
        $first_date_of_month =date('Y-m-01', strtotime($data['date']));
        $last_date_of_month =date('Y-m-t', strtotime($data['date']));

        $query = $this->db->query("SELECT vd.`CreditLedgerId`,SUM(vd.`Amount`) AS Amount,al.LedgerName,al.LedgerCode
                                    FROM `acc_voucher_details` AS vd
                                    JOIN `acc_vouchers` AS v ON vd.`VoucherId` = v.`VoucherId`
                                    JOIN `acc_ledgers` AS al ON vd.CreditLedgerId = al.LedgerId
                                    WHERE v.`VoucherType`='P'
                                    $condition
                                    AND v.BranchId=$BranchId
                                    AND v.`VoucherDate` <= '$last_date_of_month'
                                    GROUP BY vd.`CreditLedgerId`
                                    ");
        $income_details = $query->result_array();
        $income_details_array = array();

        foreach($income_details as $row){
            $income_details_array[$row['CreditLedgerId']]['CreditLedgerId'] = $row['CreditLedgerId'];
            $income_details_array[$row['CreditLedgerId']]['CreditLedgerName'] = $row['LedgerCode'].'-'.$row['LedgerName'];
            $income_details_array[$row['CreditLedgerId']]['TillDateIncome'] = $row['Amount'];
            $income_details_array[$row['CreditLedgerId']]['ThisMonthIncome'] = $this->get_between_date_amount_by_ledger_id($BranchId,$row['CreditLedgerId'],$first_date_of_month,$last_date_of_month,'P');
        }
        return $income_details_array;
    }
    function get_between_date_amount_by_ledger_id($BranchId,$LedgerId,$first_date_of_month,$Date,$VoucherType){
        $condition="";
        if($VoucherType == 'R'){
            $condition .= " AND v.VoucherType = 'R' AND vd.`DebitLedgerId`='$LedgerId'";
        }
        if($VoucherType == 'P'){
            $condition .= "AND v.VoucherType = 'P' AND vd.`CreditLedgerId`='$LedgerId'";
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

