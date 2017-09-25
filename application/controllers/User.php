<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('AccountModel');
        $this->load->model('SiteModel');
    }

    public function index() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/user/all_user');
        $this->load->view('admin_template/footerlink');
    }

    public function addUser() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/user/add_user');
        $this->load->view('admin_template/footerlink');
    }

}
