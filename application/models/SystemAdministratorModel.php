<?php

class SystemAdministratorModel extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function adminlogin($data) {     //echo "SELECT * FROM powerlaw_admin";   print_r($data);   echo "SELECT * FROM user WHERE (`username` = '" . $data['username'] . "' AND `password_hash` = '" . $data['password']."')"; exit;
        $query = $this->db->query("SELECT * FROM powerlaw_admin WHERE (`username` = '" . $data['username'] . "' AND `password_hash` = '" . $data['password'] ."')");
       $var = $query->result();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                //echo '<pre>'; print_r($row);  exit;
                $session = array(
                    'admin_id' => $row->id,
                    'username' => $row->username,
                    'type' => $row->type
                );
            }
            $this->session->set_userdata($session);
            $return = 1;
        } else {
            $return = 0;
        }

        return $return;
    }

   
	public function getuserinfo($admin_id){
       $this->db->select('*');
       $this->db->from('powerlaw_admin');
       $this->db->where('id', $admin_id);
       $query = $this->db->get();
         return $query->row();
   }
    
}
