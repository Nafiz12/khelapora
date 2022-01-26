<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_daily_transaction
 *
 * @author Nayan
 */
class Report_daily_transaction extends MY_Model {

    //put your code here

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }
  
    public function getData($fromDate, $ToDate, $BranchId, $voucher_option, $voucher_type){
        $voucherType = '';
        if($voucher_type == '0' && $voucher_option == '0' ){
            $type = 'R';
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId
        AND vouchertype = '$type' AND isautovoucher = '0') ";
        }
        else if($voucher_type == '0' && $voucher_option == '1' ){
            $type = 'R';
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId
        AND vouchertype = '$type' AND isautovoucher = '1') ";
        }
        else if($voucher_type == '0' && $voucher_option == '-1' ){
            $type = 'R';
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId
        AND vouchertype = '$type') ";
        }
        
        
        else if ($voucher_type == '1' && $voucher_option == '0') {
            $type = 'P';
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId
        AND vouchertype = '$type' AND isautovoucher = '0') ";
        }
        else if ($voucher_type == '1' && $voucher_option == '1') {
            $type = 'P';
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId
        AND vouchertype = '$type' AND isautovoucher = '1') ";
        }
        else if ($voucher_type == '1' && $voucher_option == '-1') {
            $type = 'P';
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId
        AND vouchertype = '$type') ";
        }
        
        
        else if($voucher_type == '-1' && $voucher_option == '0'){
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId AND isautovoucher = '1') ";
        }
        else if($voucher_type == '-1' && $voucher_option == '1'){
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId AND isautovoucher = '1') ";
        }
        else if($voucher_type == '-1' && $voucher_option == '-1'){
            $qry = "SELECT `acc_vouchers`.voucherid,`acc_vouchers`.voucherdate,`acc_vouchers`.vouchercode, `acc_vouchers`.vouchertype, `acc_vouchers`.particulars
        , creditledgerid, debitledgerid, amount FROM `acc_voucher_details` 
        JOIN `acc_vouchers` ON `acc_vouchers`.voucherid = `acc_voucher_details`.voucherid 
        WHERE `acc_voucher_details` .voucherid IN(SELECT `acc_vouchers`.voucherid FROM `acc_vouchers` 
        WHERE voucherdate BETWEEN '$fromDate' AND '$ToDate' AND branchid = $BranchId) ";
        }
       
        
        $data['acc_ledger'] = $this->Ac_ledger->get_acc_ledger_list();
        $result = $this->db->query("$qry")->result();
        //echo "<pre>";print_r($this->db->last_query());die;
        // echo "<pre>";print_r($result);die;
        
        $i = 0;
        foreach ($result as $row){
            
            // echo "<pre>";print_r($row);
            $sType = $this->_getVoucherType($row->vouchertype);
            $data['voucher'][$i]['date'] = $row-> voucherdate;
            $data['voucher'][$i]['code'] = $row-> vouchercode;
            $data['voucher'][$i]['type'] = $sType;
            $data['voucher'][$i]['acc_head'] = $data['acc_ledger'][$row-> creditledgerid]['LedgerName'].'['.$data['acc_ledger'][$row-> creditledgerid]['LedgerCode'].']';
            $data['voucher'][$i]['particulars'] = $row-> particulars;
            $data['voucher'][$i]['debit'] = $row-> amount;
            $data['voucher'][$i]['credit'] = '0';
            $i++;        
        }
        //die;
        foreach ($result as $row){
            $sType = $this->_getVoucherType($row->vouchertype);
            $data['voucher'][$i]['date'] = $row-> voucherdate;
            $data['voucher'][$i]['code'] = $row-> vouchercode;
            $data['voucher'][$i]['type'] = $sType;
            $data['voucher'][$i]['acc_head'] = $data['acc_ledger'][$row-> debitledgerid]['LedgerName'].'['.$data['acc_ledger'][$row-> debitledgerid]['LedgerCode'].']';
            $data['voucher'][$i]['particulars'] = $row-> particulars;
            $data['voucher'][$i]['debit'] = '0';
            $data['voucher'][$i]['credit'] = $row-> amount;
            $i++;        
        }
        
         if(empty($result)){
            return $data['voucher'] = null;
        }else{
           return $data['voucher']; 
        }
        
       // echo "<pre>";print_r($data['voucher']);die;
        // return $data['voucher'];
    }
    
    private function _getVoucherType($type){
        $sType = '';
        if($type == 'R') $sType = 'Receipt';
        else if ($type == 'P') $sType = 'Payment';
        
        return $sType;
    }

}
