<?php

class BillingModel extends CI_Model {

    public function insertInfo($table, $data) {
        $this->db->insert($table, $data);
    }

    public function get_all_info($table) {
        $this->db->select('*');
        $this->db->from($table);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_open_time_entries($table) {
        $this->db->select($table . '.*,user.FirstName,LastName,tbl_activity.activity_name,tbl_case.CaseName');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.user_id', 'left');
        $this->db->join('tbl_activity', 'tbl_activity.id = ' . $table . '.activity_id', 'left');
        $this->db->join('tbl_case', 'tbl_case.CaseId = ' . $table . '.case_id', 'left');

        $this->db->where($table . '.status', 2);
        $this->db->order_by("time_entry_id", "desc");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_invoice_time_entries($table) {
        $this->db->select($table . '.*,user.FirstName,LastName,tbl_activity.activity_name,tbl_case.CaseName');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.user_id', 'left');
        $this->db->join('tbl_activity', 'tbl_activity.id = ' . $table . '.activity_id', 'left');
        $this->db->join('tbl_case', 'tbl_case.CaseId = ' . $table . '.case_id', 'left');

        $this->db->where($table . '.status', 1);
        $this->db->order_by("time_entry_id", "desc");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_time_entries($table) {
        $this->db->select($table . '.*,user.FirstName,LastName,tbl_activity.activity_name,tbl_case.CaseName');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.user_id', 'left');
        $this->db->join('tbl_activity', 'tbl_activity.id = ' . $table . '.activity_id', 'left');
        $this->db->join('tbl_case', 'tbl_case.CaseId = ' . $table . '.case_id', 'left');

        $this->db->order_by("time_entry_id", "desc");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_open_expense($table) {
        $this->db->select($table . '.*,user.FirstName,LastName,tbl_activity.activity_name,tbl_case.CaseName');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.UserId', 'left');
        $this->db->join('tbl_activity', 'tbl_activity.id = ' . $table . '.activity_id', 'left');
        $this->db->join('tbl_case', 'tbl_case.CaseId = ' . $table . '.case_id', 'left');

        $this->db->where($table . '.status', 2);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_invoice_expense($table) {
        $this->db->select($table . '.*,user.FirstName,LastName,tbl_activity.activity_name,tbl_case.CaseName');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.UserId', 'left');
        $this->db->join('tbl_activity', 'tbl_activity.id = ' . $table . '.activity_id', 'left');
        $this->db->join('tbl_case', 'tbl_case.CaseId = ' . $table . '.case_id', 'left');

        $this->db->where($table . '.status', 1);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_expense($table) {
        $this->db->select($table . '.*,user.FirstName,LastName,tbl_activity.activity_name,tbl_case.CaseName');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.UserId', 'left');
        $this->db->join('tbl_activity', 'tbl_activity.id = ' . $table . '.activity_id', 'left');
        $this->db->join('tbl_case', 'tbl_case.CaseId = ' . $table . '.case_id', 'left');

        $this->db->order_by("ExpenseId", "desc");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_activity($table) {
        $this->db->select($table . '.*,user.FirstName,LastName');
//        $this->db->select($table.'*,user.*');
        $this->db->from($table);

        $this->db->join('user', 'user.id = ' . $table . '.user_id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateInfo($columnName, $columnVal, $tableName, $data) {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }

    public function deleteInfo($tableName, $columnName, $id) {
        $this->db->where($columnName, $id);
        $this->db->delete($tableName);
    }

    public function getexpensecusinfo($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'expense');
        $this->db->or_where('type', 'timeexpense');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallinvoiceinfo($userid) {
        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $this->db->where('created_by', $userid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getuserfirmid($userid) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcompanyinfobyfirm($FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcontactinfobyfirm($FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcasesbycontact($type, $contactid) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        if ($type == 'con') {
            $this->db->where('ContactId', $contactid);
        } else if ($type == 'com') {
            $this->db->where('CompanyId', $contactid);
        }
        $this->db->where('caseStatus', 1);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    public function getlastinvoiceinfo(){
        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $this->db->order_by('InvoiceId','desc');
        $this->db->limit(1);
          $query = $this->db->get();
            return $query->row();
    }
    
     public function get_time_entries_by_case($table,$case_id) {
        $this->db->select($table.'.*,user.FirstName,LastName');
        $this->db->from($table);
        
        $this->db->join('user','user.id = '.$table.'.user_id','left');
        $this->db->join('tbl_activity','tbl_activity.id = '.$table.'.activity_id','left');
        
        $this->db->where($table.'.status',2);
        $this->db->where($table.'.case_id',$case_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
     public function get_expenses_by_case($table,$case_id) {
        $this->db->select($table.'.*,user.FirstName,LastName');
        $this->db->from($table);
        
        $this->db->join('user','user.id = '.$table.'.UserId','left');
        $this->db->join('tbl_activity','tbl_activity.id = '.$table.'.activity_id','left');
        
        $this->db->where($table.'.status',2);
        $this->db->where($table.'.case_id',$case_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_staff_info($table) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('status !=',4);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_time_entries_by_staff_id($table,$staff_id,$case_id) {
        $this->db->select('*');
        $this->db->from($table);
        
        $this->db->where('user_id',$staff_id);
        $this->db->where('case_id',$case_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getinvoicepayment($InvoiceId){
         $this->db->select('*');
         $this->db->from('tbl_payment');
         $this->db->where('InvoiceId', $InvoiceId);
          $query = $this->db->get();
             return $query->result_array();
    }
    
    public function getindividualinvoicebyid($invoiceid){
        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $this->db->join('tbl_case','tbl_case.CaseId = tbl_invoice.CaseId');
        $this->db->where('InvoiceId', $invoiceid);
          $query = $this->db->get();
            return $query->row();
    }
    
    public function getallpaymentmethod(){
        $this->db->select('*');
        $this->db->from('tbl_payment_method');
         $query = $this->db->get();
           return $query->result_array(); 
    }
    
    public function getinvoicecompanybyid($CompanyId){
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId', $CompanyId);
          $query = $this->db->get();
            return $query->row();
    }
    
    public function getinvoicecontactbyid($ContactId){
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $ContactId);
          $query = $this->db->get();
            return $query->row();
    }
	
	
	public function getspecificinvoicepayment($invoiceid){
        $this->db->select('*');
        $this->db->from('tbl_payment');
        $this->db->where('InvoiceId', $invoiceid);
          $query = $this->db->get();
            return $query->row();
    }
    
    public function getspecificfirmdata($FirmId){
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $FirmId);
          $query = $this->db->get();
             return $query->row(); 
    }
}