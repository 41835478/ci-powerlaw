<?php
class CommentModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }
    
     public function allCommentget($id) {
        
        $this->db->select('*');
        $this->db->from('tbl_comment');
          $this->db->where('user_id', $id);
           $this->db->where('group_by', $id);
           // $this->db->where('status', 0);
        $query = $this->db->get();
        $allComment = $query->result();
        return $allComment;
   
    }
    
    
    
    public function areply($insert_id, $group_by) {
        
        $this->db->select('*');
        $this->db->from('tbl_comment');
          $this->db->where('comment_id', $insert_id);
           $this->db->where('group_by', $group_by);
        $query = $this->db->get();
        $areply = $query->row();
        return $areply;
   
    }
    

     public function allCases() {
        
        $this->db->select('*');
        $this->db->from('tbl_case');
        $query = $this->db->get();
        $allCases = $query->result();
        return $allCases;
   
    }
    public function astaff($id) {
        
        $this->db->select('*');
        $this->db->from('user');
          $this->db->where('id=', $id);
        $query = $this->db->get();
        $astaff = $query->row();
        return $astaff;
   
    }
     public function aCommentget($id) {
        
        $this->db->select('*');
        $this->db->from('tbl_comment');
          $this->db->where('comment_id', $id);
        $query = $this->db->get();
        $aCommentget = $query->row();
        return $aCommentget;
   
    }
       
     public function acase($id) {
        
        $this->db->select('*');
        $this->db->from('tbl_case');
         $this->db->where('CaseId', $id);
        $query = $this->db->get();
        $acase = $query->row();
        return $acase;
   
    }
     public function aCommentstatus($id) {
         $this->db->set('status', 1);
        $this->db->where('comment_id=', $id);   
         $this->db->or_where('group_by=', $id);    
         $this->db->update('tbl_comment');

    }
   
    
    
     public function insertreply($data) {
        $this->db->insert('tbl_comment', $data);
        
    }
     public function allreply($user,$groupid) {
        
        $this->db->select('*');
        $this->db->from('tbl_comment');
         $this->db->where('user_id', $user);
         $this->db->where('group_by', $groupid);
        $query = $this->db->get();
        $allreply = $query->result();
        return $allreply;
   
    }
    
    
    
    
     public function allUnreadCommentget($id) {
        
        $this->db->select('*');
        $this->db->from('tbl_comment');
          $this->db->where('user_id', $id);
           $this->db->where('group_by', $id);
           $this->db->where('status', 0);
        $query = $this->db->get();
        $allUnreadComment = $query->result();
        return $allUnreadComment;
   
    }
    
    


    
 
    
   

}
