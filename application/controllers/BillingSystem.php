<?php

class BillingSystem extends CI_Controller {

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
        $this->load->model('BillingSystemModel');
        $this->load->model('CaseSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function billingDashboard() {
        //$data['alldocinfo'] = $this->DocumentSystemModel->getalldocinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/billing/billingdashboard');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }
    
    public function invoiceslist(){
        $data['allinvoiceinfo'] = $this->BillingSystemModel->getallinvoiceinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/billing/invoicesview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewinvoicedetials(){
        $invoice_id = $this->uri->segment('2');
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/billing/invoicedetials');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

}
