<?php
class GroupModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function addGroup($data) {
        $this->db->insert('tbl_contact_group', $data);
    }
    public function allGroup() {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $query = $this->db->get();
        $all_group = $query->result();
        return $all_group;
   
    }
    public function all_info_for_update($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $this->db->where('GroupId=', $id);
         $query = $this->db->get();
        $all_info_for_update = $query->row();
        return $all_info_for_update;
    }
    public function checkexist($groupName,$id) {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $this->db->where('GroupId!=', $id);
        $this->db->where('GroupName=', $groupName);
         $query = $this->db->get();
        $checkexist = $query->result();
        return $checkexist;
    }
    public function update($data,$id) {
        $this->db->where('GroupId', $id);
        $this->db->update("tbl_contact_group", $data);
   
    }
    public function delete($id) {
        $this->db->where('GroupId=', $id);
        $this->db->delete('tbl_contact_group');
   
    }
    public function deletecon($id) {
        $this->db->where('ContactGroup=', $id);
        $this->db->delete('tbl_contact');
   
    }
    
    
}
