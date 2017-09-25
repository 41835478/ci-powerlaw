<?php

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_billing();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }

        $this->load->model('ReportsModel');
        $this->load->model('SiteModel');
        $this->load->model('CompanyModel');
        $this->load->model('CountrySystemModel');
        $this->load->model('AccountModel');
        $this->load->model('FirmModel');
    }

    public function timeexptoday() {
        //print_r($_SESSION);
        $userid = $_SESSION['user_id'];
        $userinfo = $this->AccountModel->getuserinfobyuserid($userid);
        $firmid = $userinfo->FirmId;
        $data['pagetitle'] = 'Time Expence Today';
        $data['userlist'] = $this->FirmModel->getallfirmuser($userid, $firmid);
        $data['loginuser'] = $userinfo;
        $data['getinvoicedata'] = $this->ReportsModel->sumoftodayebill($userid);
        $billableamount = '';
        foreach($data['getinvoicedata'] as $inv) {
        $billableamount += $inv['InvoiceAmount'];    
        }
        
        $data['getexpensedata'] = $this->ReportsModel->sumoftodayeexp($userid);
        $expenseamount = '';
        foreach($data['getexpensedata'] as $exp) {
        $expenseamount += $exp['ExpenseAmount'];      
        }
        
        $data['billableamount'] = $billableamount;
        $data['expenseamount'] = $expenseamount;
        $data['timeentriesdata'] = $this->ReportsModel->gettimeentriesdata($userid);
        echo '<pre>'; print_r($data['timeentriesdata']); 
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/reports/timeexptoday', $data);
        //$this->load->view('lawyer/reports/report_main', $data);
        $this->load->view('admin_template/footerlink');
    }

}
