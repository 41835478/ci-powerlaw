<?php

class MessageModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function getInbox($user) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageTo=', $user);
        $this->db->where('Status=', 1);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit; 
        $getInbox = $query->result();
        return $getInbox;
    }

    function details($id) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageId=', $id);

        $query = $this->db->get();
        $details = $query->row();
        return $details;
    }

    function Casedetails($id) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId=', $id);

        $query = $this->db->get();
        $details = $query->row();
        return $details;
    }

    function allCses() {

        $this->db->select('*');
        $this->db->from('tbl_case');


        $query = $this->db->get();
        $details = $query->result();
        return $details;
    }

    public function addmessage($data) {
        $this->db->insert('tbl_message', $data);
    }

    public function draftmessage($data) {
        $this->db->insert('tbl_message', $data);
    }


    function allUser($id, $firmid) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id!=', $id);
        $query = $this->db->get();
        $details = $query->result();
        return $details;
    }

    function UserDetail($id) {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id=', $id);
        $query = $this->db->get();
        $details = $query->row();
        return $details;
    }

    function reply($id, $login_id) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageFrom=', $login_id);
        $this->db->where('group_by=', $id);

        $query = $this->db->get();
        $details = $query->result();
        return $details;
    }

    function getarchived($user) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageTo=', $user);
        // $this->db->or_where('group_by=', $user);
        $this->db->where('Status=', 3);
        $query = $this->db->get();
        $getarchived = $query->result();
        return $getarchived;
    }

    function delete($id) {

        $this->db->set('Status', 3);
        $this->db->where('MessageId=', $id);
        $this->db->or_where('group_by=', $id);
        //  $this->db->where('group_by=', $id);
        $this->db->update('tbl_message');
    }

    //28
    function getDraft($user) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageFrom=', $user);
        $this->db->where('Status=', 2);

        $query = $this->db->get();
        $getDraft = $query->result();

        return $getDraft;
    }

    function checkexisturl($id) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageId=', $id);
        $query = $this->db->get();
        $checkexist = $query->row();
        return $checkexist;
    }

    //28
    public function updatemessagedraft($data, $id) {
        $this->db->where('MessageId', $id);
        $this->db->update("tbl_message", $data);
    }

    //28
    function getFirm($id) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId=', $id);
        $query = $this->db->get();
        $getFirm = $query->row();
        return $getFirm;
    }

    //15
    public function getuserinfobyid($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getmsgbyid($message_id) {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('MessageId', $message_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallmsgbyid($message_id) {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('group_by', $message_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getalldraftmsg() {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('Status', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallarchivemsg() {
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('Status', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getsentuserdata($sent_to) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('fullname', $sent_to);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcasedata($case_link) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseName', $case_link);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcases($userid) {
        $this->db->select('*');
        $this->db->from('tbl_assign_staff');
        $this->db->where('staffId', $userid);
        $query = $this->db->get();
        return $query->result();
    }

    public function forfirmid($userid) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        return $query->row();
    }

    function allUsermodi($id, $firmid) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id!=', $id);
        $this->db->where('FirmId=', $firmid);
        $query = $this->db->get();
        $details = $query->result();
        return $details;
    }

    function allcaseopen() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus=', 1);
        $query = $this->db->get();
        $details = $query->result();
        return $details;
    }

    function getSENT($user) {

        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->where('MessageFrom=', $user);
        $this->db->where('Status=', 1);
        $query = $this->db->get();
        $getInbox = $query->result();
        return $getInbox;
    }

    function allCASE($user) {

        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId=', $user);
        $this->db->where('caseStatus=', 1);
        $query = $this->db->get();
        $getInbox = $query->result();
        return $getInbox;
    }

    function contactandfirm($id) {

        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('UserId=', $id);
        $this->db->where('status=', 1);
        $query = $this->db->get();
        $getInbox = $query->result();
        return $getInbox;
    }

    function firmcontact($firmid) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('FirmId=', $firmid);
        $query = $this->db->get();
        $details = $query->result();
        return $details;
    }

    public function getallcasedata($userid) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $userid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallmessagedatabycaseid($case_id){
        $this->db->select('*');
        $this->db->from('tbl_message');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_message.CaseId');
        $this->db->where('tbl_message.CaseId', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function allContact($id){
       $this->db->select('*');
       $this->db->from('tbl_contact');
       $this->db->or_where('tbl_contact.UserId=', $id);
        $query = $this->db->get();
         $details = $query->result();
        return $details;
 
   }
}
