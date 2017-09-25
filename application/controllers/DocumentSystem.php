<?php

class DocumentSystem extends CI_Controller {

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
        $this->load->model('DocumentSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function managedocument() {
        $data['alldocinfo'] = $this->DocumentSystemModel->getalldocinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/document/docsview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function unreadcasedocument(){
        $data['allunreaddocinfo'] = $this->DocumentSystemModel->getunreaddocinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/document/unreaddocsview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function firmdocuments(){
         $data['allfirmdocinfo'] = $this->DocumentSystemModel->getfirmdocinfo();
        // echo '<pre>'; print_r($data['allfirmdocinfo']);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/document/firmdocsview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }
}
