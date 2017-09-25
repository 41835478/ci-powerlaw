<?php

class AccountModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getuserinfobyuserid($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
		//echo $this->db->last_query(); exit;
        return $query->row();
    }

    public function getstaffinfobyuserid($id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('status !=', '1');
        $this->db->where('created_by', $id);
        $query = $this->db->get();
		//echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    public function getstate($State) {
        $this->db->select('StateName');
        $this->db->from('tbl_state');
        $this->db->where('StateId', $State);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcountry($Country) {
        $this->db->select('CountryName');
        $this->db->from('tbl_country');
        $this->db->where('CountryId', $Country);
        $query = $this->db->get();
        return $query->row();
    }

    public function getfirmsettingbyid($firmId) {
        $this->db->select('*');
        $this->db->from('firm_settings_tbl');
        $this->db->where('FirmId', $firmId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getreminder($event_reminder) {
        $this->db->select('*');
        $this->db->from('tbl_event_reminder_type');
        $this->db->where('id', $event_reminder);
        $query = $this->db->get();
        return $query->row();
    }

    public function getimportedcontactbyid($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'contact');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getimportedcasebyid($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'case');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getimportfilenameforundo($logid) {
        $this->db->select('filename');
        $this->db->from('tbl_log');
        $this->db->where('log_id', $logid);
        $query = $this->db->get();
        return $query->row();
    }

    public function getimportidbyfilename($file) {
        $this->db->select('id');
        $this->db->from('tbl_import');
        $this->db->where('file_name', $file);
        $query = $this->db->get();
        return $query->row();
    }

    public function getimportcontactid($filename) {
        $this->db->select('contactid');
        $this->db->from('tbl_import');
        $this->db->where('file_name', $filename);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getloginfobylogid($logid) {
        $this->db->select('*');
        $this->db->from('tbl_log');
        $this->db->where('log_id', $logid);
        $query = $this->db->get();
        return $query->row();
    }

    public function getgroupnamebyid($cgroupname) {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $this->db->where('GroupName', $cgroupname);
        $query = $this->db->get();
        return $query->row();
    }

    public function getfirminfobyid($user_id) {
        $this->db->select('FirmId');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insertgroup($grp) {
        $insert = $this->db->insert('tbl_contact_group', $grp);
        $groupid = $this->db->insert_id();
        return $groupid;
    }

    public function getmatchedcontactemail($email) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallpracticearea() {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcustomfield($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'case');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getcontactcustomfield($user_id){
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'contact');
         $query = $this->db->get();
           return $query->result_array(); 
    }

    public function getcusdatabycusid($customid) {
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('id', $customid);
        $this->db->where('type', 'case');
        $query = $this->db->get();
        return $query->row();
    }

    public function getcuscondatabycusid($customid){
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('id', $customid);
        $this->db->where('type', 'contact');
        $query = $this->db->get();
        return $query->row();
    }
    public function practicecfield($pid, $user_id) {
        $this->db->select('*');
        $this->db->from('practice_custome_field');
        $this->db->where('id', $pid);
        $this->db->where('created_by', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getcompanycustomfield($user_id){
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'company');
        $query = $this->db->get(); 
          return $query->result_array(); 
    }

    public function getcuscompanydatabycusid($customid){
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('id', $customid);
        $this->db->where('type', 'company');
          $query = $this->db->get();
           return $query->row(); 
    }
    
    public function gettimecustomfield($user_id){
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('created_by', $user_id);
        $this->db->where('type', 'timeexpense');
        $this->db->or_where('type', 'expense');
        $this->db->or_where('type', 'time');
        $query = $this->db->get();
          return $query->result_array(); 
    }
    
    public function getcustimedatabycusid($customid){
        $this->db->select('*');
        $this->db->from('tbl_global_custom_field');
        $this->db->where('id', $customid);
        //$this->db->where('type', 'timeexpense');
       // $this->db->or_where('type', 'expense');
       // $this->db->or_where('type', 'time');
          $query = $this->db->get();
         // echo $this->db->last_query(); exit; 
           return $query->row(); 
    }
    
    public function getusernotification($user_id){
        $this->db->select('*');
        $this->db->from('tbl_notifications');
        $this->db->where('UserId', $user_id);
          $query = $this->db->get();
            return $query->row(); 
    }
    
    public function getfirmidbyuser($user_id){
        $this->db->select('FirmId');
        $this->db->from('user');
        $this->db->where('id', $user_id);
         $query = $this->db->get();
           return $query->row();
    }
    
    
}
