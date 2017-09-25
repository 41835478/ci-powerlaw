<?php

class SiteModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function insertInfo($table, $data) {
        $this->db->insert($table, $data);
    }

    public function insertId($table, $data) {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function updateInfo($columnName, $columnVal, $tableName, $data) {
        $this->db->where($columnName, $columnVal);
        $this->db->update($tableName, $data);
    }

    public function userlogin($data) {
        $query = $this->db->query("SELECT * FROM user WHERE (`username` = '" . $data['username'] . "' AND `password_hash` = '" . $data['password'] . "')");
        $var = $query->result();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $session = array(
                    'user_id' => $row->id,
                    'username' => $row->username,
                    'FirmId' => $row->FirmId
                );

                $this->db->select('*');
                $this->db->from('user');
                $this->db->where('id', $row->id);
                $this->db->where('account_activity', '1');
                $res = $this->db->get();
                $logdata = $res->row();
                //echo $this->db->last_query(); 
                //print_r($res->result_array()); exit;
                if (empty($logdata)) {
                    $return = 2;
                } else {
                    $this->session->set_userdata($session);
                    $return = 1;
                }
            }
        } else {
            $return = 0;
        }

        return $return;
    }

    public function updatefirmid($firmid, $member_id) {
        $this->db->set('FirmId', $firmid);
        $this->db->where('id', $member_id);
        $this->db->update('user');
    }

    public function getrecenttaskbyuser($user_id) {
        $days_ago = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d") - 3, date("Y")));
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->where('AssignedBy', $user_id);
        $this->db->where('AssignedOn >=', $days_ago);
        $query = $this->db->get();
        //exit($this->db->last_query());
        //echo $this->db->last_query();
        // print_r($query->result_array());
        return $query->result_array();
    }

    public function getuserinfobysessionid($user_id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getuserpermissioninfobyuserid($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_permission');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getuserpermissioncasebyuserid($user_id) {
        $this->db->select('*');
        $this->db->from('user_link_case');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getnotificationbyid($userid) {
        $this->db->select('*');
        $this->db->from('tbl_notifications');
        $this->db->where('UserId', $userid);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcasenamebyuserid($user_id){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('userId', $user_id);
        $this->db->where('caseStatus', '1');
          $query = $this->db->get();
            return $query->result_array(); 
    }
    
    public function getcompanynamebyuserid($firmid){
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId', $firmid);
          $query = $this->db->get();
            return $query->result_array(); 
    }
	
	 public function commonfunctionforcompany($id){
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('CompanyId', $id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function commonfunctionforcase($id){
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
