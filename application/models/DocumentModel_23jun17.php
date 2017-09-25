<?php

class DocumentModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalldocinfobyuserid($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_document');
        $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
        $this->db->join('user','user.id = tbl_document.UploadedBy');
        $this->db->where('tbl_document.UploadedBy', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcaselinkbyuserid($user_id){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $user_id);
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
