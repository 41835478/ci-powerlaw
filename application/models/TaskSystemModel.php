<?php

class TaskSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalltask() {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function alluserinfofortask() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id !=', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallcasedata() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getalltaskdatabycaseid($case_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.CaseId', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getalltaskdatabycriteria($criteria) {
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        if ($criteria == '1') {
            $this->db->where('tbl_task.DueDate <=', $date);
        } else {
            $this->db->where('tbl_task.DueDate >=', $date);
        }
        $query = $this->db->get();
        // echo $this->db->last_query(); exit; 
        return $query->result_array();
    }

    public function getassigneduser($AssignedTo) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $AssignedTo);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function getassignedfirm($FirmId){
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->row();
    }

    public function selectallopencase() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus !=', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getfirmdatabycaseid($caseid) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->join('tbl_case', 'tbl_case.FirmId = tbl_firm.FirmId');
        $this->db->where('tbl_case.CaseId', $caseid);
        $query = $this->db->get();
        return $query->row();
    }

    public function getfirmdatabyuserid($userid) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.AssignedTo', $userid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettestdatabyduedate() {
        $date = date('Y-m-d h:m:s');
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.DueDate >', $date);
        $this->db->order_by('tbl_task.DueDate', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettestdatabyfirm() {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->order_by('tbl_task.FirmId', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettestdatabypriority() {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->order_by('tbl_task.priority', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

}
