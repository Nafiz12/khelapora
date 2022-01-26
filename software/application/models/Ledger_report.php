<?php

/**
 * Location Model Class.
 * @pupose        Manage Location information
 *
 * @filesource    ./system/application/models/location.php
 * @package        asif
 * @version      $Revision: 1 $
 * @author       $Author: S. Asif Raihan $
 * @lastmodified $Date: 2014-20-11 $
 */
class Ledger_report extends MY_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        //$this->load->database();
    }

    function get_report_data($data)
    {
        $condition = "";
        $date_from = $data['DateFrom'];
        $date_to = $data['DateTo'];
        $date_to = $data['DateTo'];
        $BranchId = $data['BranchId'];
        $ledger_id = array();
        $ids =array();
        
        $is_head = $data['ledger_info']->IsGroupHead;
        if($is_head == 1){
           $ledger_id = $this->Ac_ledger->getAllChildGroup($data['ledger_id']);
           if(!empty($ledger_id)){
               foreach ($ledger_id as $id){
                   //echo "<pre>";print_r($id['LedgerId']);
                   array_push($ids,$id['LedgerId']);
               }
           }else{
               $ledger_id = $data['ledger_id'];
               array_push($ids,$ledger_id);
           }
        }
        else{
            $ledger_id = $data['ledger_id'];
            array_push($ids,$ledger_id);
        }
        $ids = join(',', $ids);
        if (isset($date_from) && isset($date_to) && $date_from != '1970-01-01' && $date_to != '1970-01-01') {
            $condition .= " AND acc_vouchers.`VoucherDate` BETWEEN '$date_from' AND '$date_to'";
        }
        if(isset($BranchId) and !empty($BranchId)){
            $condition .= " AND acc_vouchers.`BranchId` = $BranchId";
        }
        if($data['voucher_type'] != -1){
            $voucher_type = $data['voucher_type'];
            $condition .= " AND acc_vouchers.`IsAutoVoucher` = $voucher_type";
        }
        $query = $this->db->query("SELECT acc_voucher_details.*,acc_vouchers.`VoucherCode`,acc_vouchers.`VoucherDate`,acc_vouchers.`VoucherType`
                                    FROM `acc_voucher_details`
                                    JOIN `acc_vouchers` ON acc_voucher_details.`VoucherId` = acc_vouchers.`VoucherId`
                                    WHERE (acc_voucher_details.`CreditLedgerId` IN ($ids) OR acc_voucher_details.`DebitLedgerId` IN($ids))
                                    $condition");
        $voucher_details = $query->result_array();
//echo '<pre>'; print_r($voucher_details); die;
        return $voucher_details;
    }

    function get_balance_before_date($ledger_id, $date_from, $BranchId,$voucher_type)
    {
        $condition = "";
        $ledger_id = $ledger_id;
        $BranchId = $BranchId;
        if($voucher_type!=-1){
            $condition .= "AND acc_vouchers.`IsAutoVoucher` = $voucher_type";
        }
        // Income
        $income = $this->db->query("SELECT IFNULL(SUM(`acc_voucher_details`.`Amount`),00.0) AS Amount
                                    FROM `acc_voucher_details`
                                    JOIN `acc_vouchers` ON acc_voucher_details.`VoucherId` = acc_vouchers.`VoucherId`
                                    WHERE acc_voucher_details.`BranchId` = $BranchId
                                    AND `CreditLedgerId` = $ledger_id
                                    AND acc_vouchers.`VoucherDate`<'$date_from'
                                    $condition");
        $income = $income->row()->Amount;


        $expense = $this->db->query("SELECT IFNULL(SUM(`acc_voucher_details`.`Amount`),00.0) AS Amount
                                    FROM `acc_voucher_details`
                                    JOIN `acc_vouchers` ON acc_voucher_details.`VoucherId` = acc_vouchers.`VoucherId`
                                    WHERE acc_voucher_details.`BranchId` = $BranchId
                                    AND `DebitLedgerId` = $ledger_id
                                    AND acc_vouchers.`VoucherDate`<'$date_from'
                                    $condition");
        $expense = $expense->row()->Amount;

        $balance = $income - $expense;

        return $balance;
    }
}

