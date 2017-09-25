<?php

class FirmModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getallfirminfo() {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallphonecodeinfo() {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getfirminfobyid($firm_id) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $firm_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getfirminfobyfirmid($user_id, $firmid) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('UserId', $user_id);
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatefirminfo($data, $firm_id) {
        $this->db->set('FirmName', $data['FirmName']);
        $this->db->set('SubDomain', $data['SubDomain']);
        $this->db->set('ContactFName', $data['ContactFName']);
        $this->db->set('ContactLName', $data['ContactLName']);
        $this->db->set('Phone', $data['Phone']);
        $this->db->set('Fax', $data['Fax']);
        $this->db->set('Website', $data['Website']);
        $this->db->set('Email', $data['Email']);
        $this->db->set('Address1', $data['Address1']);
        $this->db->set('Address2', $data['Address2']);
        $this->db->set('Country', $data['Country']);
        $this->db->set('State', $data['State']);
        $this->db->set('City', $data['City']);
        $this->db->set('ZipCode', $data['ZipCode']);
        $this->db->set('Strength', $data['Strength']);
        $this->db->set('Notification', $data['Notification']);
        $this->db->set('NFrequencey', $data['NFrequencey']);
        $this->db->set('TimeZoneId', $data['TimeZoneId']);
        $this->db->set('MemberType', $data['MemberType']);
        $this->db->set('CreatedOn', $data['CreatedOn']);
        $this->db->set('IpAddress', $data['IpAddress']);
        $this->db->set('LastUpdated', $data['LastUpdated']);
        $this->db->set('UpdatedIp', $data['UpdatedIp']);
        $this->db->set('CCodeM', $data['CCodeM']);
        $this->db->set('CCodeP', $data['CCodeP']);
        $this->db->set('CCodeF', $data['CCodeF']);
        $this->db->where('FirmId', $firm_id);
        $update = $this->db->update('tbl_firm');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletefirm($firm_id) {
        $this->db->where('FirmId', $firm_id);
        $delete = $this->db->delete('tbl_firm');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public function getuserinfo($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallfirmuser($user_id, $firmid) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $this->db->or_where('created_by', $user_id);
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit; 
        return $query->result_array();
    }

    public function getuserauthinfo($id) {
        $this->db->select('item_name');
        $this->db->from('auth_assignment');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getusercaseinfo($id) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getuserpermissionbyid($id) {
        $this->db->select('*');
        $this->db->from('tbl_permission');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcountryinfo() {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getstateinfo() {
        $this->db->select('*');
        $this->db->from('tbl_state');
        $query = $this->db->get();
        return $query->result_array();
    }

    function addfirmuser($data) {
        $this->db->insert('user', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function getcaseinfo($firmId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('FirmId', $firmId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getfirmcase($FirmId) {
        $this->db->select('CaseId');
        $this->db->from('tbl_case');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getfirminfo($FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatepasswordInfo($data, $id) {
        $this->db->set('password_hash', $data['password_hash']);
        $this->db->where('id', $id);
        $update = $this->db->update('user');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function getcreditinfo($firmid) {
        $this->db->select('*');
        $this->db->from('firm_settings_tbl');
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        return $query->row();
    }

    public function getreminderinfo() {
        $this->db->select('*');
        $this->db->from('tbl_event_reminder_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countfirmuser($user_id, $firmid){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->or_where('created_by', $user_id);
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}
