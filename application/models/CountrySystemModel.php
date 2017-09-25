<?php

class CountrySystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getallcountryinfo() {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getcountryinfobyid($country_id) {
        $this->db->select('*');
        $this->db->from('tbl_country');
        $this->db->where('CountryId', $country_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatecountryinfo($data, $country_id) {
        $this->db->set('CountryCode', $data['CountryCode']);
        $this->db->set('CountryName', $data['CountryName']);
        $this->db->set('CurrencyName', $data['CurrencyName']);
        $this->db->set('CurrencyCode', $data['CurrencyCode']);
        $this->db->set('CurrencySymbol', $data['CurrencySymbol']);
        $this->db->set('PhoneCode', $data['PhoneCode']);
        $this->db->set('SupportPhone', $data['SupportPhone']);
        $this->db->set('SupportEmail', $data['SupportEmail']);
        $this->db->set('StreetAddress', $data['StreetAddress']);
        $this->db->set('Suite', $data['Suite']);
        $this->db->set('City', $data['City']);
        $this->db->set('State', $data['State']);
        $this->db->set('ZipCode', $data['ZipCode']);
        $this->db->where('CountryId', $country_id);
        $update = $this->db->update('tbl_country');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletecountry($country_id) {
        $this->db->where('CountryId', $country_id);
        $delete = $this->db->delete('tbl_country');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

}
