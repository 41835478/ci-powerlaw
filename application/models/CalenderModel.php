<?php

class CalenderModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalllocationbyuser($userId) {
        $this->db->select('*');
        $this->db->from('tbl_location');
        $this->db->where('status', '1');
        $this->db->where('created_by', $userId);
        $query = $this->db->get();
        return $query->result_array();
    }

    
    public function deletelocationbyid($location_id){
        $this->db->where('location_id', $location_id);
        $delete = $this->db->delete('tbl_location');
        if($delete){
            return true;
        } else {
            return false; 
        }
    }
    
    public function getlocationforedit($location_id){
        $this->db->select('*');
        $this->db->from('tbl_location');
        $this->db->where('location_id', $location_id);
        $query = $this->db->get();
          return $query->row(); 
    }
    
    public function updatelocationbylocationid($data,$location_id){
        $this->db->set('location_name',$data['location_name']);
        $this->db->set('address',$data['address']);
        $this->db->set('country',$data['country']);
        $this->db->set('city',$data['city']);
        $this->db->set('state',$data['state']);
        $this->db->set('zip',$data['zip']);
        $this->db->set('created_by',$data['created_by']);
        $this->db->set('created_date',$data['created_date']);
        $this->db->set('google_map_url',$data['google_map_url']);
        $this->db->set('status',$data['status']);
        $this->db->set('latitude',$data['latitude']);
        $this->db->set('longitude',$data['longitude']);
        $this->db->where('location_id', $location_id);
        $update = $this->db->update('tbl_location');
        if($update){
            return true;
        } else {
            return false; 
        }
    }
    
    public function getstatebyid($state){
        $this->db->select('*');
        $this->db->from('tbl_state');
        $this->db->where('StateId', $state);
        $query = $this->db->get(); 
          return $query->row();
    }
    
    public function getcountrybyid($country){
         $this->db->select('*');
        $this->db->from('tbl_country');
        $this->db->where('CountryId', $country);
        $query = $this->db->get(); 
          return $query->row();
    }
}
