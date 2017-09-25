<?php

class CaseSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getallcaseinfo() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        //$this->db->where('caseStatus','1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function caseinfobyid($case_id) {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('CaseId', $case_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getpracticearea($practice_id) {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeAreaId', $practice_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getattoernyinfo($attoerny_id) {
        $this->db->select('*');
        $this->db->from('tbl_attorney');
        $this->db->where('AttorneyId', $attoerny_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getcontactinfo($contact_id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $contact_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatestateinfo($data, $state_id) {
        $this->db->set('CountryId', $data['CountryId']);
        $this->db->set('StateName', $data['StateName']);
        $this->db->where('StateId', $state_id);
        $update = $this->db->update('tbl_state');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletestate($state_id) {
        $this->db->where('StateId', $state_id);
        $delete = $this->db->delete('tbl_state');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public function gepractisearea($PracticeArea) {
        $this->db->select('PracticeArea');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeAreaId', $PracticeArea);
        $query = $this->db->get();
        return $query->row();
    }

    public function gecontact($ContactId) {
        $this->db->select('FirstName,LastName');
        $this->db->from('tbl_contact');
        $this->db->where('ContactId', $ContactId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getattoerny($AttoernyId) {
        $this->db->select('FirstName');
        $this->db->from('tbl_attorney');
        $this->db->where('AttorneyId', $AttoernyId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getallopencaseinfo() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallclosecaseinfo() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallpracticearea() {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallfirm() {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcompanybyfirmid($firmid) {
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getattornybyfirmid($firmid) {
        $this->db->select('*');
        $this->db->from('tbl_attorney');
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcontactbyfirmid($firmid) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('FirmId', $firmid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallbillingtype() {
        $this->db->select('*');
        $this->db->from('tbl_billing_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deletecasebyid($case_id) {
        
    }

    public function archivecasebyid($case_id) {
        $this->db->set('caseStatus', '0');
        $this->db->where('CaseId', $case_id);
        $update = $this->db->update('tbl_case');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function getallpracticeareainfo() {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getpracticeareabyid($practicearea_id) {
        $this->db->select('*');
        $this->db->from('tbl_practice_area');
        $this->db->where('PracticeAreaId', $practicearea_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatepracticeareabyid($data, $practicearea_id) {
        $this->db->set('PracticeArea', $data['PracticeArea']);
        $this->db->where('PracticeAreaId', $practicearea_id);
        $update = $this->db->update('tbl_practice_area');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletepracticeareabyid($practicearea_id) {
        $this->db->where('PracticeAreaId', $practicearea_id);
        $delete = $this->db->delete('tbl_practice_area');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

}
