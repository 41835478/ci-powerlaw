<?php

class ReportsModel extends CI_Model {

    public function insertInfo($table, $data) {
        $this->db->insert($table, $data);
    }

    public function sumoftodayebill($userid){
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $this->db->where('created_by', $userid);
        $this->db->where('InvoiceDate', $date);
        $query = $this->db->get(); 
          //echo $this->db->last_query(); exit; 
           return $query->result_array(); 
    }
    
    public function sumoftodayeexp($userid){
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_expense');
        $this->db->where('UserId', $userid);
        $this->db->where('EntryDate', $date);
        $query = $this->db->get();
           return $query->result_array();
    }
    
    public function getcasedatabyid($case_id){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId', $case_id);
          $query = $this->db->get();
            return $query->row(); 
    }
    
    public function getactivitydatabyid($activity_id){
        $this->db->select('*');
        $this->db->from('tbl_activity');
        $this->db->where('id', $activity_id);
          $query = $this->db->get();
             return $query->row();
    }
    
    public function gettimeentriesdata($userid){
        $this->db->select('*');
        $this->db->from('time_entry_expense');
        $this->db->where('user_id', $userid);
          $query = $this->db->get();
          //echo $this->db->last_query(); 
           return $query->result_array();
    }
    
}