<?php

class ContactModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function addContact($data) {
        $this->db->insert('tbl_contact', $data);
    }

    public function allContact($userId) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('UserId', $userId);
        $this->db->where('status', '1');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit; 
        $all_contact = $query->result();
        return $all_contact;
    }

    public function all_company() {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $query = $this->db->get();
        $all_company = $query->result();
        return $all_company;
    }

    public function allcases($UserId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('UserId', $UserId);
        $query = $this->db->get();
        $all_cases = $query->result();
        return $all_cases;
    }

    public function all_group() {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $query = $this->db->get();
        $all_group = $query->result();
        return $all_group;
    }

    public function all_country_mobile_code() {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        $all_country_mobile_code = $query->result();
        return $all_country_mobile_code;
    }

    public function allContactGroup() {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $query = $this->db->get();
        $allContactGroup = $query->result();
        return $allContactGroup;
    }

    public function delete($id) {
        $this->db->where('ContactId=', $id);
        $this->db->delete('tbl_contact');
    }

    public function all_info_for_update($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId=', $id);
        $query = $this->db->get();
        $all_info_for_update = $query->row();
        return $all_info_for_update;
    }

    public function checkexist($email, $id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId!=', $id);
        $this->db->where('Email=', $email);
        $query = $this->db->get();
        $checkexist = $query->result();
        return $checkexist;
    }

    public function updateall($data, $id) {
        $this->db->where('ContactId', $id);
        $this->db->update("tbl_contact", $data);
    }

    public function allUser() {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        $allUser = $query->result();
        return $allUser;
    }

    public function userDetail($id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $userDetail = $query->row();
        return $userDetail;
    }

    public function allCase($id) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $id);
        $this->db->where('caseStatus', 1);
        $query = $this->db->get();
        $allCase = $query->result();
        return $allCase;
    }

    public function removecaseLink($id) {
        $this->db->set('caseStatus', 0);
        $this->db->where('CaseId', $id);
        $this->db->update('tbl_case');
        //$this->db->delete('tbl_case');
    }

    public function updaterate($data, $id) {
        $this->db->where('CaseId', $id);
        $this->db->update("tbl_case", $data);
    }

    public function checkexistimg($id) {
        $this->db->select('Picture');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $id);
        // $this->db->where('caseStatus', 1);
        $query = $this->db->get();
        $checkexistimg = $query->row();
        return $checkexistimg;
    }

    public function updateimg($id, $data) {
        $this->db->where('ContactId', $id);
        $this->db->update("tbl_contact", $data);
    }

    public function getgroupnamebyid($ContactGroup) {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $this->db->where('GroupId', $ContactGroup);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallcontactbygroup($groupid, $userid) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('UserId', $userid);
        $this->db->where('ContactGroup', $groupid);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function groupinfobyid($ContactGroup) {
        $this->db->select('GroupName');
        $this->db->from('tbl_contact_group');
        $this->db->where('GroupId', $ContactGroup);
        $query = $this->db->get();
        return $query->row();
    }

    public function userinfobyid($UserId) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $UserId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcasebycontactid($ContactId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('ContactId', $ContactId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallactivecontactforsearch($userid) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('UserId', $userid);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getallarchivecontactforsearch($userid){
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('UserId', $userid);
        $this->db->where('status', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

}
