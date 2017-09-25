<?php

class PackageSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getallpackageinfo() {
        $this->db->select('*');
        $this->db->from('tbl_package');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getpackageinfobyid($package_id) {
        $this->db->select('*');
        $this->db->from('tbl_package');
        $this->db->where('PackageId', $package_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatepackageinfo($data, $package_id) {
        $this->db->set('PackageName', $data['PackageName']);
        $this->db->set('Description', $data['Description']);
        $this->db->set('LastUpdated', $data['LastUpdated']);
        $this->db->set('LastUpdateBy', $data['LastUpdateBy']);
        $this->db->set('Amount', $data['Amount']);
        $this->db->set('FreeTrial', $data['FreeTrial']);
        $this->db->set('TrialDuration', $data['TrialDuration']);
        $this->db->where('PackageId', $package_id);
        $update = $this->db->update('tbl_package');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletepackage($package_id) {
        $this->db->where('PackageId', $package_id);
        $delete = $this->db->delete('tbl_package');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

}
