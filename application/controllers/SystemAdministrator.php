<?php

class SystemAdministrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('SystemAdministratorModel');
    }

    public function index() {
        $this->load->view('powerlawadmin/login/loginform');
    }

    public function admindashboard() {
        $this->load->helper('rspowerlaw_helper');
        $admin = is_admin();
        if ($admin) {
            $this->load->view('powerlawadmin/admin_template/headerlink');
            $this->load->view('powerlawadmin/admin_template/header');
            $this->load->view('powerlawadmin/admin/admindashboard/dashboard');
            $this->load->view('powerlawadmin/admin_template/footerlink');
        } else {
            redirect('permission_error');
        }
    }

    public function paralegaldashboard() {
        $this->load->helper('rspowerlaw_helper');
        $admin = is_admin();
        if ($admin) {
            $this->load->view('powerlawadmin/admin_template/headerlink');
            $this->load->view('powerlawadmin/admin_template/paralegalheader');
            $this->load->view('powerlawadmin/paralegal/paralegaldashboard');
            $this->load->view('powerlawadmin/admin_template/footerlink');
        } else {
            redirect('permission_error');
        }
    }

    public function staffdashboard() {
        $this->load->helper('rspowerlaw_helper');
        $admin = is_admin();
        if ($admin) {
            $this->load->view('powerlawadmin/admin_template/headerlink');
            $this->load->view('powerlawadmin/admin_template/staffheader');
            $this->load->view('powerlawadmin/staff/staffdashboard');
            $this->load->view('powerlawadmin/admin_template/footerlink');
        } else {
            redirect('permission_error');
        }
    }

    public function employeelogin() {
        $msg = "Login Successfully";
        $error = "Login Error";
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('admin');
        } else {
            $q = $this->input->post('password');
            $qEncoded = base64_encode(md5($q));
            $data['username'] = $this->input->post('username');
            $data['password'] = $qEncoded;
            $login = $this->SystemAdministratorModel->adminlogin($data);
            $admin_id = $_SESSION['admin_id'];
            if ($login == 1) {
                //print_r($_SESSION); exit;
                $this->session->set_flashdata('success', $msg);
                if ($_SESSION['type'] == 1) {
                    redirect('admindashboard');
                } else if ($_SESSION['type'] == 2) {
                    redirect('paralegaldashboard');
                } else if ($_SESSION['type'] == 3) {
                    redirect('staffdashboard');
                }
            } else {
                $this->session->set_flashdata('error', $error);
                redirect('admin');
            }
        }
    }

    public function adminlogout() {
        $this->session->sess_destroy();
        redirect('admin');
    }

    public function employeeregistrationform() {
        $this->load->view('powerlawadmin/login/registration');
    }

}
