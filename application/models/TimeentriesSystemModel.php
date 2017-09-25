<?php

class TimeentriesSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalltimeentries() {
        $this->db->select('*');
        $this->db->from('tbl_timer');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_timer.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_timer.FirmId');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getuserinfobyuserid($UserId){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $UserId);
        $query = $this->db->get();
          return $query->row(); 
    }
   
}
