<?php

class DocumentSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalldocinfo() {
        $this->db->select('*');
        $this->db->from('tbl_document');
        $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
        $this->db->join('user','user.id = tbl_document.UploadedBy');
        $query = $this->db->get();
        return $query->result_array();
    }

   public function getunreaddocinfo(){
        $this->db->select('*');
        $this->db->from('tbl_document');
        $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
        $this->db->join('user','user.id = tbl_document.UploadedBy');
        $this->db->where('read_status', '0');
        $query = $this->db->get();
        return $query->result_array();
   }
   
   public function getfirmdocinfo(){
       $this->db->select('*');
        $this->db->from('tbl_document');
        $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
        $this->db->join('user','user.id = tbl_document.UploadedBy');
        $this->db->join('tbl_firm','tbl_firm.FirmId = tbl_document.FirmId');
        $query = $this->db->get();
        return $query->result_array();
   }

}
