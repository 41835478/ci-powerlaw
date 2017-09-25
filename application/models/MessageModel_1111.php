<?php
class MessageModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }


  function getInbox($user){
		
	$this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageTo=', $user);
        $this->db->where('Status=', 1);
      
        $query = $this->db->get();
        $getInbox = $query->result();
       
        return $getInbox;
	}
         function details($id){
		
	$this->db->select('*');
        $this->db->from('tbl_message');
         $this->db->where('MessageId=', $id);
       
        $query = $this->db->get();
        $details = $query->row();
        return $details;
	}
        function Casedetails($id){
		
	$this->db->select('*');
        $this->db->from('tbl_case');
         $this->db->where('CaseId=', $id);
       
        $query = $this->db->get();
        $details = $query->row();
        return $details;
	}
         function allCses(){
		
	$this->db->select('*');
        $this->db->from('tbl_case');
       
       
        $query = $this->db->get();
        $details = $query->result();
        return $details;
	}
         public function addmessage($data) {
        $this->db->insert('tbl_message', $data);
    }
    //28
      public function draftmessage($data) {
        $this->db->insert('tbl_message', $data);
    }
    //28
       function allUser($id){
		
	$this->db->select('*');
        $this->db->from('user');
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        $details = $query->result();
        return $details;
	}
         function UserDetail($id){
		
	$this->db->select('*');
        $this->db->from('user');
         $this->db->where('id=', $id);
        $query = $this->db->get();
        $details = $query->row();
        return $details;
	}
        function reply($id,$login_id){
		
	$this->db->select('*');
        $this->db->from('tbl_message');
             $this->db->where('MessageFrom=', $login_id);
         $this->db->where('group_by=', $id);
       
        $query = $this->db->get();
        $details = $query->result();
        return $details;
	}
        
        function getarchived($user){
		
	$this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageTo=', $user);
       // $this->db->or_where('group_by=', $user);
        $this->db->where('Status=', 3);
        $query = $this->db->get();
        $getarchived = $query->result();
        return $getarchived;
	}
         function delete($id){	
     
	$this->db->set('Status', 3);
        $this->db->where('MessageId=', $id);
         $this->db->or_where('group_by=', $id);
       //  $this->db->where('group_by=', $id);
         $this->db->update('tbl_message');
	}
        //28
        function getDraft($user){
		
	$this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageFrom=', $user);
        $this->db->where('Status=', 2);
      
        $query = $this->db->get();
        $getDraft = $query->result();
       
        return $getDraft;
	}
        function checkexisturl($id){
		
	$this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageId=', $id);
        $query = $this->db->get();
        $checkexist = $query->row();
        return $checkexist;
	}
        //28
         public function updatemessagedraft($data,$id) {
        $this->db->where('MessageId', $id);
        $this->db->update("tbl_message", $data);
   
    }
    //28
    function getFirm($id){
		
	$this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId=', $id);
        $query = $this->db->get();
        $getFirm = $query->row();
        return $getFirm;
	}
    
        
}
