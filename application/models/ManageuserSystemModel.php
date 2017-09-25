<?php

class ManageuserSystemModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function getalluserinfo() {
        $this->db->select('user.*,auth_assignment.item_name');
        $this->db->from('user');
        $this->db->join('auth_assignment', 'auth_assignment.user_id = user.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallauthitem() {
        $this->db->select('*');
        $this->db->from('auth_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getuserinfobyid($user_id) {
        $this->db->select('user.*,auth_assignment.item_name');
        $this->db->from('user');
        $this->db->join('auth_assignment', 'auth_assignment.user_id = user.id');
        $this->db->where('user.id', $user_id);
        $query = $this->db->get(); 
        return $query->row();
    }

    public function updateuserinfo($data, $user_id) {
        $this->db->set('fullname', $data['fullname']);
        $this->db->set('username', $data['username']);
        $this->db->set('email', $data['email']);
        $this->db->where('id', $user_id);
        $update = $this->db->update('user');
        if ($update) {
            $this->db->set('item_name', $data['Role']);
            $this->db->where('user_id', $user_id);
            $updateauth = $this->db->update('auth_assignment');
            if ($updateauth) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteuser($user_id) {
        $this->db->where('id', $user_id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->db->where('user_id', $user_id);
            $deleteauth = $this->db->delete('auth_assignment');
            if ($deleteauth) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getallusergroup() {
        $this->db->select('*');
        $this->db->from('auth_item');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getusergroupsub($name) {
        $this->db->select('*');
        $this->db->from('auth_assignment');
        $this->db->where('item_name', $name);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getusergroupbyname($groupname) {
        $this->db->select('*');
        $this->db->from('auth_item');
        $this->db->where('name', $groupname);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateusergroup($data, $groupname) {
        $this->db->set('name', $data['name']);
        $this->db->where('name', $groupname);
        $update = $this->db->update('auth_item');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function alladminstaff() {
        $this->db->select('*');
        $this->db->from('powerlaw_admin');
        $this->db->where('type !=', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function adminstaffbyid($staf_id) {
        $this->db->select('*');
        $this->db->from('powerlaw_admin');
        $this->db->where('id', $staf_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function updateadminstaffinfo($data, $staf_id){
        $this->db->set('fullname',$data['fullname']);
        $this->db->set('username',$data['username']);
        $this->db->set('email',$data['email']);
        $this->db->set('status',$data['status']);
        $this->db->set('type',$data['type']);
        $this->db->where('id', $staf_id);
         $update = $this->db->update('powerlaw_admin');
         if($update){
             return TRUE;
         } else {
              return FALSE;
         }
    }
    
    public function deleteadminstaff($staf_id){
        $this->db->where('id', $staf_id);
        $delete = $this->db->delete('powerlaw_admin');
        if($delete){
             return TRUE;
         } else {
              return FALSE;
         }
    }

    
    public function getadminstaffpermissionbyid($user_id){
        $this->db->select('powerlaw_permission_table.*,powerlaw_admin.username');
        $this->db->from('powerlaw_permission_table');
        $this->db->join('powerlaw_admin','powerlaw_admin.id = powerlaw_permission_table.powerlaw_staff_id');
        $this->db->where('powerlaw_permission_table.powerlaw_staff_id', $user_id);
         $query = $this->db->get();
         //echo $this->db->last_query(); exit;
           return $query->row();
    }
    
    
    public function setuserpermission($user_id,$value,$permissionName){
        $this->db->set($permissionName,$value);
        $this->db->where('powerlaw_staff_id',$user_id);
        $update = $this->db->update('powerlaw_permission_table');
        //echo $this->db->last_query(); exit; 
        if($update){
            return TRUE;
        } else {
            return FALSE; 
        }
    }
}
