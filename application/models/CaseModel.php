<?php

class CaseModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function getindividualfirm($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('UserId', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function company($firm_id) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId', $firm_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getallstaffbyfirm($firm_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('FirmId', $firm_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallcompanydatabyfirm($firm_id) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId', $firm_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getindividualstaff($firm_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('FirmId', $firm_id);
        $this->db->where('status!=', 4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcontactgroup() {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allPractiseArea() {

        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $query = $this->db->get();
        $all_practise_area = $query->result();
        return $all_practise_area;
    }

    public function allFarm() {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $query = $this->db->get();
        $all_farm = $query->result();
        return $all_farm;
    }

    public function allCompany() {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $query = $this->db->get();
        $all_company = $query->result();
        return $all_company;
    }

    public function ALLFopenC($FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus=', 1);
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        $ALLFopenC = $query->result();
        return $ALLFopenC;
    }

    public function ALLFclosedC($FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus=', 0);
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        $ALLFclosedC = $query->result();
        return $ALLFclosedC;
    }

    public function allBillingType() {
        $this->db->select('*');
        $this->db->from('tbl_billing_type');
        $query = $this->db->get();
        $all_billing_ype = $query->result();
        return $all_billing_ype;
    }

    public function allPracticeArea() {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $query = $this->db->get();
        $all_practice_area = $query->result();
        return $all_practice_area;
    }

    public function allContact() {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $query = $this->db->get();
        $all_contact = $query->result();
        return $all_contact;
    }

    public function allAttorney() {
        $this->db->select('*');
        $this->db->from('tbl_attorney');
        $query = $this->db->get();
        $all_contact = $query->result();
        return $all_contact;
    }

    public function allcases() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $query = $this->db->get();
        $allcases = $query->result();
        return $allcases;
    }

    public function auser($auser) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id=', $auser);
        $query = $this->db->get();
        $auser = $query->row();
        return $auser;
    }

    public function alluser() {
        $this->db->select('*');
        $this->db->from('user');

        $query = $this->db->get();
        $auser = $query->result();
        return $auser;
    }

    public function contactgroup($farmid) {
        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $this->db->where('FirmId=', $farmid);
        $query = $this->db->get();
        $farmid = $query->row();
        return $farmid;
    }

    public function billingtype($billingtypeid) {
        $this->db->select('*');
        $this->db->from('tbl_billing_type');
        $this->db->where('BillingTypeId=', $billingtypeid);
        $query = $this->db->get();
        $billingtype = $query->row();
        return $billingtype;
    }

    public function billingContact($billingContactId) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId=', $billingContactId);
        $query = $this->db->get();
        $billingContact = $query->row();
        return $billingContact;
    }

    public function caseDetails($caseId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId=', $caseId);
        $query = $this->db->get();
        $acase = $query->row();
        return $acase;
    }

    public function practiceArea($practiceAreaId) {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeAreaId=', $practiceAreaId);
        $query = $this->db->get();
        $practiceArea = $query->row();
        return $practiceArea;
    }

    public function contactPerson($contactPersonId) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId=', $contactPersonId);
        $query = $this->db->get();
        $contact_Person = $query->row();
        return $contact_Person;
    }

//    public function  aUser($aUser) {
//        $this->db->select('*');
//        $this->db->from('user');
//        $this->db->where('id=', $aUser);
//        $query = $this->db->get();
//        $aUser = $query->row();
//        return $aUser;
//   
//    }



    public function allContactajx($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('CompanyId=', $id);
        $query = $this->db->get();
        $all_contact = $query->result();
        return $all_contact;
    }

    public function allCompanyajx($id) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId=', $id);
        $query = $this->db->get();
        $all_company = $query->result();
        return $all_company;
    }

    public function insertCase($data) {
        $this->db->insert('tbl_case', $data);
    }

    public function AddPracticeArea($data) {
        $this->db->insert('tbl_practice_area', $data);
    }

    public function allOpenCases($userid) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus', 1);
        $this->db->where('userId', $userid);
        $query = $this->db->get();
        $all_Open_Cases = $query->result();
        return $all_Open_Cases;
    }

    public function allClosedCases($userid) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus=', 0);
        $this->db->where('userId=', $userid);
        $query = $this->db->get();
        $all_close_Cases = $query->result();
        return $all_close_Cases;
    }

    public function editPracticeArea($id) {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeAreaId=', $id);
        $query = $this->db->get();
        $edit_practice_area = $query->row();
        return $edit_practice_area;
    }

    public function PractiseareaUpdate($data, $id) {
        $this->db->where('PracticeAreaId', $id);
        $this->db->update("tbl_practice_area", $data);
    }

    public function all_group() {

        $this->db->select('*');
        $this->db->from('tbl_contact_group');
        $query = $this->db->get();
        $all_group = $query->result();
        return $all_group;
    }

    public function check($areaname) {

        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeArea', $areaname);
        $query = $this->db->get();
        $areaname = $query->result();
        return $areaname;
    }

    public function existUpdate($data, $id) {

        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeArea', $data);
        $this->db->where('PracticeAreaId!=', $id);
        $query = $this->db->get();
        $existUpdate = $query->result();
        return $existUpdate;
    }

    public function UpdatePracticeArea($data, $id) {

        $this->db->where('PracticeAreaId', $id);
        $this->db->update("tbl_practice_area", $data);
    }

    public function get_case_by_firm_id($id) {

        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId', $id);

        $query = $this->db->get();
        $getCase = $query->result();
        return $getCase;
    }

    public function get_attorny_by_firm($id) {

        $this->db->select('*');
        $this->db->from('tbl_attorney');
        $this->db->where('FirmId', $id);

        $query = $this->db->get();
        $getAttorney = $query->result();
        return $getAttorney;
    }

    public function get_contact_by_company($id) {

        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('CompanyId', $id);

        $query = $this->db->get();
        $getContact = $query->result();
        return $getContact;
    }

    public function foredit($id) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId', $id);

        $query = $this->db->get();

        $foredit = $query->row();

        return $foredit;
    }

    public function get_contact_by_contact($id) {

        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $id);

        $query = $this->db->get();
        $getContact = $query->result();
        return $getContact;
    }

    public function get_company_by_company($id) {

        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId', $id);

        $query = $this->db->get();
        $getContact = $query->result();
        return $getContact;
    }

    public function checkexistEmail($email, $id) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId!=', $id);
        $this->db->where('CaseEmail', $email);
        $query = $this->db->get();
        $checkexistEmail = $query->row();
        return $checkexistEmail;
    }

    public function Updatecase($id, $data) {

        $this->db->where('CaseId', $id);
        $this->db->update("tbl_case", $data);
    }

    public function check_email($email) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseEmail', $email);
        $query = $this->db->get();
        $checkexistEmail = $query->row();
        return $checkexistEmail;
    }

    public function checkcontacthave($firstname, $lastName) {

        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('FirstName', $firstname);
        $this->db->where('LastName', $lastName);

        $query = $this->db->get();
        $checkexistEmail = $query->row();
        return $checkexistEmail;
    }

    public function addcontact($data) {
        $this->db->insert('tbl_contact', $data);
    }

    public function checkcompanyhave($companyemail) {

        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyEmail', $companyemail);
        $query = $this->db->get();
        $checkexistEmail = $query->row();
        return $checkexistEmail;
    }

    public function addcompany($data) {
        $this->db->insert('tbl_company', $data);
    }

    public function foruserfirmid($id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id=', $id);
        $query = $this->db->get();
        $foruserfirmid = $query->row();
        return $foruserfirmid;
    }

    public function foreditpermision($id) {
        $this->db->select('*');
        $this->db->from('tbl_permission');
        $this->db->where('user_id=', $id);

        $query = $this->db->get();
        $foruserfirmid = $query->row();
        return $foruserfirmid;
    }

    public function firmname($firm_id) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId=', $firm_id);
        $query = $this->db->get();
        $firmname = $query->row();
        return $firmname;
    }

    public function ownFopenC($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_assign_staff');
        $this->db->where('staffId=', $user_id);
        $query = $this->db->get();
        $foruserfirmid = $query->result();
        return $foruserfirmid;
    }

    
    ///////////////////////////
    public function getsinglecompanybyid($CompanyId) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId', $CompanyId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getsinglecontactbyid($ContactId) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $ContactId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getsingleattorneybyid($AttoernyId) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $AttoernyId);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->row();
    }

    public function myallFirmCases($userid, $FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus', 1);
        $this->db->where('userId', $userid);
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function myallopenCases($userid) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $userid);
        $this->db->where('caseStatus', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function myallcloseCases($userid){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $userid);
        $this->db->where('caseStatus', 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function myCasesWithPArea($userid,$PracticeAreaId){
         $this->db->select('*');
         $this->db->from('tbl_case');
         $this->db->where('userId', $userid);
         $this->db->where('caseStatus', 1);
         $this->db->where('PracticeArea', $PracticeAreaId);
           $query = $this->db->get();
             return $query->result_array(); 
        
    }
    
    public function allOpenCasesClose($userid){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus', 0);
        $this->db->where('userId', $userid);
        $query = $this->db->get();
        $all_Open_Cases = $query->result();
        return $all_Open_Cases;
    }
    
    public function myallFirmCasesClose($userid, $FirmId){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus', 0);
        $this->db->where('userId', $userid);
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function myCasesWithPAreaClose($userid,$PracticeAreaId){
        $this->db->select('*');
         $this->db->from('tbl_case');
         $this->db->where('userId', $userid);
         $this->db->where('caseStatus', 0);
         $this->db->where('PracticeArea', $PracticeAreaId);
           $query = $this->db->get();
             return $query->result_array(); 
    }

}
