<?php

class LawyerAdmin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $login = is_login();
        if ($login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->model('SiteModel');
        $this->load->model('FirmModel');
    }

    public function index() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $data['taskinfo'] = $this->SiteModel->getrecenttaskbyuser($user_id);
            $userinfo = $this->FirmModel->getuserinfo($user_id);
            $firmid = $userinfo->FirmId;
            $data['allfirmuser'] = $this->FirmModel->countfirmuser($user_id, $firmid);
            $casename = $this->SiteModel->getcasenamebyuserid($user_id);
            //array_unshift($casename,"Cases");
            //echo '<pre>'; print_r($data['casename']);
            //$companyname = $this->SiteModel->getcompanynamebyuserid($firmid);
            //array_unshift($companyname,"Companies");
            // $data['comcase'] = array_merge($companyname,$casename); 
            //echo '<pre>'; print_r($data['comcase']); 
            $data['casename'] = $casename;
            $data['firmid'] = $firmid;
            $data['pagetitle'] = 'Dashboard';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/dashboard', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function savenotes() {

        $data = array();
        $data['RelatedId'] = $this->input->post('RelatedId');
        $data['NoteSubject'] = $this->input->post('NoteSubject');
        $data['NoteContent'] = $this->input->post('NoteContent');
        $data['RelatedTo'] = 'Case';
        $data['DueDate'] = date("Y-m-d", strtotime($this->input->post('DueDate')));
        $data['UserId'] = $_SESSION['user_id'];
        $data['FirmId'] = $this->input->post('firmid');
        $data['CreatedOn'] = date('Y-m-d');
        $insert = $this->db->insert('tbl_notes', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Note Inserted Successfully');
            redirect('lawyerdashboard');
        } else {
            $this->session->set_flashdata('error', 'Note Insert is not Complete. Re try again');
            redirect('lawyerdashboard');
        }
    }

    public function contact() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/contact');
        $this->load->view('admin_template/footerlink');
    }

    public function addContact() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/add_contact');
        $this->load->view('admin_template/footerlink');
    }

    public function company() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/company');
        $this->load->view('admin_template/footerlink');
    }

    public function addCompnay() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/add_company');
        $this->load->view('admin_template/footerlink');
    }

    public function contactGroup() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/group');
        $this->load->view('admin_template/footerlink');
    }

    public function addContactGroup() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/add_group');
        $this->load->view('admin_template/footerlink');
    }

    public function addCases() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/add_cases');
        $this->load->view('admin_template/footerlink');
    }

    public function accountSettings() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account_settings');
        $this->load->view('admin_template/footerlink');
    }

    public function accountNotification() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account_notification');
        $this->load->view('admin_template/footerlink');
    }

    public function accountPicture() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account_picture');
        $this->load->view('admin_template/footerlink');
    }

    public function changePassword() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/change_password');
        $this->load->view('admin_template/footerlink');
    }

    public function firmSettings() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/firm_settings');
        $this->load->view('admin_template/footerlink');
    }

}
