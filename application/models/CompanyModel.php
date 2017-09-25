<?php

class CompanyModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function addCompany($data) {
        $this->db->insert('tbl_company', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function allCompany() {

        $this->db->select('*');
        $this->db->from('tbl_company');
        $query = $this->db->get();
        $all_company = $query->result();
        return $all_company;
    }

    public function allCompanyforuser($id) {

        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CreatedBy', $id);
        $this->db->where('status', '1');
        $query = $this->db->get();
        $all_company = $query->result();
        return $all_company;
    }

    public function firmid($id) {

        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('UserId=', $id);
        $query = $this->db->get();
        $firmid = $query->row();
        return $firmid;
    }

    public function linkedContacts() {

        $this->db->select('*');
        $this->db->from('tbl_contact');
        $query = $this->db->get();
        $all_contact = $query->result();
        return $all_contact;
    }

    public function all_group() {

        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $query = $this->db->get();
        $all_group = $query->result();
        return $all_group;
    }

    public function allCases($login_id) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $login_id);
        $query = $this->db->get();
        $allCases = $query->result();
        return $allCases;
    }
    
    public function allContactCase($id){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('ContactId', $id);
        $query = $this->db->get();
        return $query->result_array();
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
        $this->db->where('CompanyId=', $id);
        $this->db->delete('tbl_company');
    }

    public function all_info_for_update($id) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId=', $id);
        $query = $this->db->get();
        $all_info_for_update = $query->row();
        return $all_info_for_update;
    }

    public function checkexist($companyName, $id) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId!=', $id);
        $this->db->where('CompanyName=', $companyName);
        $query = $this->db->get();
        $checkexist = $query->result();
        return $checkexist;
    }

    public function update($data, $id) {
        $this->db->where('CompanyId', $id);
        $this->db->update("tbl_company", $data);
    }

    public function contactInfo($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId=', $id);
        $query = $this->db->get();
        $contactInfo = $query->row();
        return $contactInfo;
    }

    public function selectCompany($id) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId=', $id);
        $query = $this->db->get();
        $selectCompany = $query->row();
        return $selectCompany;
    }

    public function selectGroup($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $this->db->where('GroupId=', $id);
        $query = $this->db->get();
        $selectGroup = $query->row();
        return $selectGroup;
    }

//    public function loggedUserInfo($id) {
//        $this->db->select('*');
//        $this->db->from('tbl_contact_group');
//        $this->db->where('GroupId=', $id);
//         $query = $this->db->get();
//        $selectGroup = $query->row();
//        return $selectGroup;
//   
//    }
    public function allUser() {
        $this->db->select('*');
        $this->db->from('user');

        $query = $this->db->get();
        $allUser = $query->result();
        return $allUser;
    }

    public function allCase($id) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('ContactId=', $id);
        $query = $this->db->get();
        $allCase = $query->result();
        return $allCase;
    }

    public function updaterate($data, $id) {
        $this->db->where('CaseId', $id);
        $this->db->update("tbl_case", $data);
    }

    public function checkexisturl($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId=', $id);
        $query = $this->db->get();
        $checkexisturl = $query->row();
        return $checkexisturl;
    }

    public function getfirminfo($FirmId) {
        $this->db->select('FirmName');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallcountry() {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallstate() {
        $this->db->select('*');
        $this->db->from('tbl_state');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcountrynamebyid($country) {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $this->db->where('CountryId', $country);
        $query = $this->db->get();
        return $query->row();
    }

    public function selectcontactbyid($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('CompanyId', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function selectcasebyid($id) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CompanyId', $id);
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        return $query->result_array();
    }

    public function getcaseinfobycaseid($ContactId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('ContactId', $ContactId);
        $query = $this->db->get();
        //echo $this->db->last_query(); 
        return $query->result_array();
    }

    public function getallactivecompanyforsearch($userid) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CreatedBy', $userid);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallarchivecompanyforsearch($userid) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CreatedBy', $userid);
        $this->db->where('status', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcompanynoteinfo($id) {
        $this->db->select('*');
        $this->db->from('tbl_notes');
        $this->db->where('RelatedTo', 'Company');
        $this->db->where('CompanyId', $id);
        $this->db->where('UserId', $_SESSION['user_id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getnotecreatedby($UserId) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $UserId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getnoteforedit($noteid, $companyId) {
        $this->db->select('*');
        $this->db->from('tbl_notes');
        $this->db->where('NoteId', $noteid);
        $this->db->where('CompanyId', $companyId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcompanyinvoiceinfo($id) {
        $this->db->select('*');
        $this->db->from('tbl_invoice');
        $this->db->where('CompanyId', $id);
        $this->db->where('created_by', $_SESSION['user_id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getturstaccountinfo($id){
        $this->db->select('*');
        $this->db->from('tbl_trust_account');
        $this->db->where('company_id', $id);
          $query = $this->db->get();
             return $query->row();
    }
    
    public function getpaymentmethodinfo(){
        $this->db->select('*');
        $this->db->from('tbl_payment_method');
           $query = $this->db->get();
             return $query->result_array();
    }
    
    public function getfirminfobycompanyid($CompanyId){
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->join('tbl_company','tbl_company.FirmId = tbl_firm.FirmId');
         $this->db->where('tbl_company.CompanyId', $CompanyId);
           $query = $this->db->get();
             return $query->row();
    }
    
    public function gettrustdatabyid($trustid){
        $this->db->select('amount');
        $this->db->from('tbl_trust_account');
        $this->db->where('id', $trustid);
          $query = $this->db->get();
             return $query->row();
    }
    
    public function getcompanycreatedinfo($CreatedBy){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $CreatedBy);
          $query = $this->db->get();
            return $query->row();
    }
    
    public function getcontacttrustinfo($id){
        $this->db->select('*');
        $this->db->from('tbl_trust_account');
        $this->db->where('contact_id', $id);
          $query = $this->db->get();
             return $query->row();
    }
}