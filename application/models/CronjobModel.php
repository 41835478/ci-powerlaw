<?php

class CronjobModel extends CI_Model {

    public function insertInfo($table, $data) {
        $this->db->insert($table, $data);
    }
    
    public function getactivatelog($type, $tbl){
        $today = date("Y-m-d H:i:s");
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where('type', $type);
        $this->db->where('notification_status', '0');
        $this->db->where('notification_time >', $today);
        $query = $this->db->get();
        return $query->result_array();
    }

    
    public function getuserinfo($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcaseinfo($case_id) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId', $case_id);
        $query = $this->db->get();
        return $query->row();
    }


    public function getfirminfo($FirmId){
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $FirmId);
          $query = $this->db->get();
            return $query->row();
    }
   
    public function getcontactinfo($contact_id){
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $contact_id);
          $query = $this->db->get();
            return $query->row();
    }

}