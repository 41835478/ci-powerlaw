<?php

class DocumentModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }
//     public function getalldocinfobyuserid($id){
//      $this->db->select('*');
//      $this->db->from('tbl_document');
//      $this->db->where("((AccessTo LIKE '%$id%') OR (UploadedBy=$id)) AND (DocumentFor='case')");
//      $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
//       $this->db->join('user','user.id = tbl_document.UploadedBy');
//      $query1 = $this->db->get();
//      return $query1->result_array();
//   }
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
          $this->db->where('UploadedBy', '0');
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
    
//17

     public function getfirmdocinfonew($id){
      $this->db->select('*');
      $this->db->from('tbl_document');
      $this->db->where("((AccessTo LIKE '%$id%')) AND (read_status='0') AND (DocumentFor='case')");
      $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
       $this->db->join('user','user.id = tbl_document.UploadedBy');
      $query1 = $this->db->get();
      return $query1->result_array();
   }
   public function forview($id){
      $this->db->select('*');
      $this->db->from('tbl_document');
       $this->db->where('DocumentId', $id);
      $query1 = $this->db->get();
      return $query1->row();
   }
   public function casedetail($caseid){
      $this->db->select('*');
      $this->db->from('tbl_case');
       $this->db->where('CaseId', $caseid);
      $query1 = $this->db->get();
      return $query1->row();
   }
    public function userdetail($userid){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id', $userid);
      $query1 = $this->db->get();
      return $query1->row();
   }
    public function insertdoccomment($data){
    $this->db->insert('tbl_document_comment', $data);
   }
    public function commentall($docid){
      $this->db->select('*');
      $this->db->from('tbl_document_comment');
      $this->db->where('documentId', $docid);
      $query1 = $this->db->get();
      return $query1->result();
   }
   public function alluser(){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('account_activity', 1);
      $query1 = $this->db->get();
      return $query1->result();
   }
   //replace
    public function getalldocinfobyuserid($id){
      $this->db->select('*');
      $this->db->from('tbl_document');
      $this->db->where("((AccessTo LIKE '%$id%') OR (UploadedBy=$id)) AND (DocumentFor='case')");
      $this->db->join('tbl_case','tbl_case.CaseId = tbl_document.CaseId');
       $this->db->join('user','user.id = tbl_document.UploadedBy');
      $query1 = $this->db->get();
      return $query1->result_array();
   }
   public function allfirmdoc($id,$firmid){
      $this->db->select('*');
      $this->db->from('tbl_document');
      $this->db->where("(((AccessTo LIKE '%$id%') OR (UploadedBy=$id)) AND (DocumentFor='firm')) AND(FirmId=$firmid)");
      $query1 = $this->db->get();
      return $query1->result_array();
   }
   public function forfirm($id){
      $this->db->select('*');
      $this->db->from('user');
       $this->db->where('id', $id);
      $query1 = $this->db->get();
      return $query1->row();
   }
    public function allcase(){
      $this->db->select('*');
      $this->db->from('tbl_case');
       $this->db->where('caseStatus', 1);
      $query1 = $this->db->get();
      return $query1->result();
   }
   public function alltemplate($id){
      $this->db->select('*');
      $this->db->from('tbl_document_template');
      $this->db->where('CreatedBy', $id);
      $this->db->where('Status', '1');
      $query1 = $this->db->get();
      return $query1->result_array();
   }
   public function insertFile($data){
    $this->db->insert('tbl_document', $data);
   }
    public function allassignedcases($id){
      $this->db->select('*');
      $this->db->from('tbl_assign_staff');
      $this->db->where('staffId', $id);
      $this->db->join('tbl_case','tbl_case.CaseId = tbl_assign_staff.caseId');
      $this->db->join('user','user.id = tbl_assign_staff.staffId');
      $query1 = $this->db->get();
      return $query1->result_array();
   }
    public function assigneduser($caseid){
      $this->db->select('*');
      $this->db->from('tbl_assign_staff');
      $this->db->where('tbl_assign_staff.caseId', $caseid);
      $this->db->join('tbl_case','tbl_case.CaseId = tbl_assign_staff.caseId');
      $this->db->join('user','user.id = tbl_assign_staff.staffId');
      $query1 = $this->db->get();
      return $query1->result();
   }
   public function assigneduserid($caseid){
      $this->db->select('staffId');
      $this->db->from('tbl_assign_staff');
      $this->db->where('tbl_assign_staff.caseId', $caseid);
      $this->db->join('tbl_case','tbl_case.CaseId = tbl_assign_staff.caseId');
      $this->db->join('user','user.id = tbl_assign_staff.staffId');
      $query1 = $this->db->get();
      return $query1->result();
   }
   
   
   public function FirmIdfromuser($userid){
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id', $userid);
      $query1 = $this->db->get();
      return $query1->row();
   }
   
   
    public function insertdoc($data){
    $this->db->insert('tbl_document', $data);
   }
  
    
}
