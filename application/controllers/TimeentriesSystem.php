<?php

class TimeentriesSystem extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $admin = is_admin();
        if ($admin) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('TimeentriesSystemModel');
        $this->load->model('SystemAdministratorModel');
    }

    public function viewalltimeentries() {
        if($_SESSION['admin_id'] !=''){
        $data['alltimeentriesinfo'] = $this->TimeentriesSystemModel->getalltimeentries();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/timeentries/managetimeentries', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    } else {
        redirect('admin');
    }
    }

}
