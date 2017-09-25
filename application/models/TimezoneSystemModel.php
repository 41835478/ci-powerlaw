<?php

class TimezoneSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalltimezoneinfo() {
        $this->db->select('*');
        $this->db->from('tbl_timezone');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettimezoneinfobyid($timezone_id) {
        $this->db->select('*');
        $this->db->from('tbl_timezone');
        $this->db->where('TimezoneId', $timezone_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatetimezoneinfo($data, $timezone_id) {
        $this->db->set('TimezoneName', $data['TimezoneName']);
        $this->db->where('TimezoneId', $timezone_id);
        $update = $this->db->update('tbl_timezone');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletetimezone($timezone_id) {
        $this->db->where('TimezoneId', $timezone_id);
        $delete = $this->db->delete('tbl_timezone');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

}
