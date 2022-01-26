<?php
class Ac_voucher extends MY_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function get_list($limit = null, $offset = null,$cond=null,$type=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('acc_vouchers.BranchId', $cond['BranchId']);
            }
            if(isset($cond['PaymentDate1']) and !empty($cond['PaymentDate1'])){
                $date1 = date("Y-m-d", strtotime($cond['PaymentDate1']));
                $this->db->where('acc_vouchers.VoucherDate >=', $date1);
            }
            if(isset($cond['PaymentDate2']) and !empty($cond['PaymentDate2'])){
                $date2 = date("Y-m-d", strtotime($cond['PaymentDate2']));
                $this->db->where('acc_vouchers.VoucherDate <=', $date2);
            }
            if(isset($cond['VoucherCode']) and !empty($cond['VoucherCode'])){
                $this->db->like('acc_vouchers.VoucherCode', $cond['VoucherCode']);
            }
            if(isset($cond['VoucherType']) and !empty($cond['VoucherType'])){
                $this->db->where('acc_vouchers.VoucherType', $cond['VoucherType']);
            }
        }
        if($type != ''){
            $this->db->where('acc_vouchers.VoucherType', $type);
        }
        $this->db->select('acc_vouchers.*');
        $this->db->from('acc_vouchers');
        $this->db->order_by('acc_vouchers.VoucherId','DESC');
        if(isset($limit)&& $limit>0){
            $this->db->limit($limit,$offset);
        }
        return $this->db->get()->result();

    }
    function row_count($cond=null,$type=null){
        if(is_array($cond)){
            if(isset($cond['BranchId']) and !empty($cond['BranchId'])){
                $this->db->where('acc_vouchers.BranchId', $cond['BranchId']);
            }
            if(isset($cond['PaymentDate1']) and !empty($cond['PaymentDate1'])){
                $date1 = date("Y-m-d", strtotime($cond['PaymentDate1']));
                $this->db->where('acc_vouchers.VoucherDate >=', $date1);
            }
            if(isset($cond['PaymentDate2']) and !empty($cond['PaymentDate2'])){
                $date2 = date("Y-m-d", strtotime($cond['PaymentDate2']));
                $this->db->where('acc_vouchers.VoucherDate <=', $date2);
            }
            if(isset($cond['VoucherCode']) and !empty($cond['VoucherCode'])){
                $this->db->like('acc_vouchers.VoucherCode', $cond['VoucherCode']);
            }
            if(isset($cond['VoucherType']) and !empty($cond['VoucherType'])){
                $this->db->where('acc_vouchers.VoucherType', $cond['VoucherType']);
            }
        }
        if($type != ''){
            $this->db->where('acc_vouchers.VoucherType', $type);
        }
        $this->db->select('acc_vouchers.*');
        return $this->db->count_all_results('acc_vouchers');
    }

    function add($data) {
        return $this->db->insert('acc_vouchers', $data);
    }
    function add_voucher_details($data) {
        return $this->db->insert_batch('acc_voucher_details', $data);
    }

    function read($id) {
        return $this->db->get_where('acc_vouchers', array('VoucherId' => $id))->row();
    }
    function get_voucher_details_data($id){
        $this->db->select('*');
        $this->db->from('acc_voucher_details');
        $this->db->where('VoucherId', $id);
        $query = $this->db->get();
        $data =  $query->result_array();
        $i=0;
        $data_array = array();
        foreach($data as $row){
            $data_array[$i]['VoucherDetailsId'] = $row['VoucherDetailsId'];
            $data_array[$i]['VoucherId'] = $row['VoucherId'];
            $data_array[$i]['CheckNumber'] = $row['CheckNumber'];
            $credit_ledger_info = $this->Ac_ledger->read($row['CreditLedgerId']);
            $data_array[$i]['CreditLedgerId'] = $row['CreditLedgerId'];
            $data_array[$i]['CreditLedgerName'] = $credit_ledger_info->LedgerCode.' - '.$credit_ledger_info->LedgerName;
            $debit_ledger_info = $this->Ac_ledger->read($row['DebitLedgerId']);
            $data_array[$i]['DebitLedgerId'] = $row['DebitLedgerId'];
            $data_array[$i]['DebitLedgerName'] = $debit_ledger_info->LedgerCode.' - '.$debit_ledger_info->LedgerName;
            $data_array[$i]['Particulars'] = $row['Particulars'];
            $data_array[$i]['Amount'] = $row['Amount'];
            $i++;
        }
        return $data_array;
    }
    function get_voucher_details_data_or_view($id){
        $this->db->select('*');
        $this->db->from('acc_voucher_details');
        $this->db->where('VoucherId', $id);
        $query = $this->db->get();
        $data =  $query->result_array();

        $voucher_info = $this->read($id);
        $i=0;
        $data_array = array();
        foreach($data as $row){
            $credit_ledger_info = $this->Ac_ledger->read($row['CreditLedgerId']);
            $debit_ledger_info = $this->Ac_ledger->read($row['DebitLedgerId']);
            $data_array[$i]['LedgerName'] = $credit_ledger_info->LedgerName;
            $data_array[$i]['LedgerCode'] = $credit_ledger_info->LedgerCode;
            $data_array[$i]['cr_amount'] = $row['Amount'];
            $data_array[$i]['dr_amount'] = '0';
            if($voucher_info->VoucherType == 'P'){
                $data_array[$i]['particulars'] = '';
            }
            if($voucher_info->VoucherType == 'R'){
                $data_array[$i]['particulars'] = $row['Particulars'];
            }
            $i++;
            $data_array[$i]['LedgerName'] = $debit_ledger_info->LedgerName;
            $data_array[$i]['LedgerCode'] = $debit_ledger_info->LedgerCode;
            $data_array[$i]['cr_amount'] ='0';
            $data_array[$i]['dr_amount'] = $row['Amount'];
            if($voucher_info->VoucherType == 'P'){
                $data_array[$i]['particulars'] = $row['Particulars'];
            }
            if($voucher_info->VoucherType == 'R'){
                $data_array[$i]['particulars'] = '';
            }

            $i++;
        }
        return $data_array;
    }
    function get_voucher_details_data_for_receipt($id){
        $this->db->select('DebitLedgerId,SUM(`Amount`) AS Amount,`Particulars`');
        $this->db->from('acc_voucher_details');
        $this->db->where('VoucherId', $id);
        $this->db->group_by('DebitLedgerId');
        $query = $this->db->get();
        $debit_ledger_array =  $query->result_array();

        $voucher_info = $this->read($id);
        $i=0;
        $data_array = array();
        foreach($debit_ledger_array as $row){
            $debit_ledger_info = $this->Ac_ledger->read($row['DebitLedgerId']);
            $data_array[$i]['LedgerName'] = $debit_ledger_info->LedgerName;
            $data_array[$i]['LedgerCode'] = $debit_ledger_info->LedgerCode;
            $data_array[$i]['cr_amount'] ='0';
            $data_array[$i]['dr_amount'] = $row['Amount'];
            $data_array[$i]['particulars'] = '';
            $i++;
        }

        $this->db->select('CreditLedgerId,SUM(`Amount`) AS Amount,`Particulars`');
        $this->db->from('acc_voucher_details');
        $this->db->where('VoucherId', $id);
        $this->db->group_by('CreditLedgerId');
        $query = $this->db->get();
        $credit_ledger_array =  $query->result_array();

        foreach($credit_ledger_array as $row){
            $credit_ledger_info = $this->Ac_ledger->read($row['CreditLedgerId']);
            $data_array[$i]['LedgerName'] = $credit_ledger_info->LedgerName;
            $data_array[$i]['LedgerCode'] = $credit_ledger_info->LedgerCode;
            $data_array[$i]['cr_amount'] = $row['Amount'];
            $data_array[$i]['dr_amount'] = '0';
            $data_array[$i]['particulars'] = $row['Particulars'];
            $i++;
        }
        return $data_array;
    }

    function edit($data) {
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('acc_vouchers', $data, array('VoucherId' => $data['VoucherId']));
    }
    function edit_details($data) {
        //echo"<pre>"; print_r($data); die;
        return $this->db->update('acc_voucher_details', $data, array('VoucherId' => $data['VoucherId']));
    }
    function edit_voucher_details($voucher_details) {

        $this->db->trans_start();

        foreach ($voucher_details as $row) {
            if ($row['VoucherDetailsId'] == 0) {
                $this->db->insert('acc_voucher_details', $row);
            } else {
                $this->db->where('VoucherDetailsId', $row['VoucherDetailsId']);
                $this->db->update('acc_voucher_details', $row);
            }
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function delete($id) {
        $this->db->trans_start();
        $this->db->delete('acc_vouchers', array('VoucherId' => $id));
        $this->db->delete('acc_voucher_details', array('VoucherId' => $id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    function get_voucher_code($BranchId,$VoucherType){
        $query = $this->db->query("SELECT IFNULL(MAX(VoucherId),0) AS voucher_code FROM `acc_vouchers`
                                   WHERE acc_vouchers.`VoucherType`='$VoucherType' AND BranchId=$BranchId;");
        $voucher_code = $query->row()->voucher_code;

        $formatted_value = sprintf("%03d", $voucher_code+1);

        if($VoucherType == 'P'){
            $voucher_code = 'PV-'.$formatted_value;
        }
        if($VoucherType == 'R'){
            $voucher_code = 'RV-'.$formatted_value;
        }
        return $voucher_code;
    }
    function get_credit_account_list($VoucherType){
        if($VoucherType == 'R'){
            $account_list = $this->get_bank_and_cash_accounts();
        }
        elseif($VoucherType = 'P'){
            $account_list = $this->get_expense_account_list();
        }
        return $account_list;
    }
    function get_debit_account_list($VoucherType){
        if($VoucherType == 'R'){
            $account_list = $this->get_income_account_list();
        }
        elseif($VoucherType = 'P'){
            $account_list = $this->get_bank_and_cash_accounts();
        }
        return $account_list;
    }
    function get_bank_and_cash_accounts()
    {
        $sql = "SELECT LedgerId,LedgerCode,LedgerName FROM acc_ledgers WHERE (TypeId BETWEEN ".CASH_TYPE_ID." AND ".BANK_TYPE_ID.")";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_income_account_list(){
        $sql = "SELECT LedgerId,LedgerCode,LedgerName
                FROM acc_ledgers
                WHERE acc_ledgers.`IsDeletable`=1
                AND acc_ledgers.`TypeId` = 30
                AND acc_ledgers.IsGroupHead !=1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function get_expense_account_list(){
        $sql = "SELECT LedgerId,LedgerCode,LedgerName
                FROM acc_ledgers
                WHERE acc_ledgers.`IsDeletable`=1
                AND acc_ledgers.`TypeId` = 40
                AND acc_ledgers.IsGroupHead !=1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function delete_voucher_list_by_fee_id($id){
        $groups = $this->db->query("SELECT VoucherId
                                    FROM `fees`
                                    WHERE fees.`FeeId`=$id");
        $groups = $groups->result();
        $voucher_id_array = array();
        foreach($groups as $row){
            $voucher_id_array[$row->VoucherId] = $row->VoucherId;
        }
        //Delete Voucher Details
        $this->db->where_in('VoucherId', $voucher_id_array);
        $this->db->delete('acc_voucher_details');


        //Delete Voucher
        $this->db->where_in('VoucherId', $voucher_id_array);
        return $this->db->delete('acc_vouchers');

    }
    function delete_voucher_list_by_purchase_id($id){
        $groups = $this->db->query("SELECT VoucherId
                                    FROM `purchase_payments`
                                    WHERE purchase_payments.`PurchaseId`=$id");
        $groups = $groups->result();
        $voucher_id_array = array();
        foreach($groups as $row){
            $voucher_id_array[$row->VoucherId] = $row->VoucherId;
        }
        //Delete Voucher Details
        $this->db->where_in('VoucherId', $voucher_id_array);
        $this->db->delete('acc_voucher_details');


        //Delete Voucher
        $this->db->where_in('VoucherId', $voucher_id_array);
        return $this->db->delete('acc_vouchers');

    }
}
