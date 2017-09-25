<?php

class DocumentAdmin extends CI_Controller {
    
    public function casedocument() {
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('document/casedocument');
        $this->load->view('admin_template/footerlink');
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
