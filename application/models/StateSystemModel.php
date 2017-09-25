<?php

class StateSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getallstateinfo() {
        $this->db->select('*');
        $this->db->from('tbl_state');
        $this->db->join('tbl_country','tbl_country.CountryId = tbl_state.CountryId');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getstateinfobyid($state_id) {
        $this->db->select('*');
        $this->db->from('tbl_state');
        $this->db->where('StateId', $state_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function getallcountryname(){
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        return $query->result_array();
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

}
