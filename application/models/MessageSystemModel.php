<?php

class MessageSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getallinboxmsg() {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('Status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getalldraftmsg() {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('Status', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallarchivemsg() {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('Status', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getmsgbyid($message_id) {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('MessageId', $message_id);
        $query = $this->db->get();
        return $query->row();
    }

     public function getallmsgbyid($message_id) {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('group_by', $message_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getallmessagedatabycaseid($case_id) {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('tbl_message.CaseId', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function getallcaseForAutocomplete($q){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->like('CaseName', $q);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['label'] = htmlentities(stripslashes($row['CaseName']));
                $new_row['value'] = htmlentities(stripslashes($row['CaseName']));
                $row_set[] = $new_row;
            }
              return $row_set;
        }
    }
    
    
    public function getalluserForAutocomplete($q){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->like('fullname', $q);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['label'] = htmlentities(stripslashes($row['fullname']));
                $new_row['value'] = htmlentities(stripslashes($row['fullname']));
                $row_set[] = $new_row;
            }
              return $row_set;
        }
    }
    
    
    public function getsentuserdata($sent_to){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('fullname', $sent_to);
        $query = $this->db->get();
          return $query->row();
    }
    
    public function getcasedata($case_link){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseName',$case_link);
         $query = $this->db->get(); 
           return $query->row();
    }

}
