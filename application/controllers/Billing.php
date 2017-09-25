<?php

class Billing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_billing();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }

        $this->load->model('BillingModel');
        $this->load->model('SiteModel');
        $this->load->model('CompanyModel');
		$this->load->model('CountrySystemModel');
    }

    public function index() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            if ($_SESSION['permissionsession']['billing'] != '3') {
                $data['pagetitle'] = 'Billing Dashboard';
                $this->load->view('admin_template/headerlink', $data);
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/billing/billing_dashboard');
                $this->load->view('admin_template/footerlink');
            } else {
                redirect('loginform');
            }
        } else {
            redirect('loginform');
        }
    }

    public function timeEntries($status_id = NULL) {
        $data['status_id'] = $status_id;
        $data['all_cases'] = $this->BillingModel->get_all_info('tbl_case');
        $data['all_users'] = $this->BillingModel->get_all_info('user');
        $data['all_activity'] = $this->BillingModel->get_all_info('tbl_activity');

        $data['all_time_entries'] = $this->BillingModel->get_all_time_entries('time_entry_expense');
        if ($status_id == 1) {
            $data['all_time_entries'] = $this->BillingModel->get_all_open_time_entries('time_entry_expense');
        }
        if ($status_id == 2) {
            $data['all_time_entries'] = $this->BillingModel->get_all_invoice_time_entries('time_entry_expense');
        }

        $data['pagetitle'] = 'Time Entries';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/billing/all_expense', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function get_rate_by_case() {
        $data['res'] = $this->BillingModel->get_rate_by_case_id($this->input->post('case_id'));
//        print_r($data);die;
        echo json_encode($data);
    }

    public function saveTimeEntries() {
        $status_id = $this->input->post('status_id');
        $data['case_id'] = $this->input->post('case_id');
        $data['user_id'] = $this->input->post('UserId');
        $data['activity_id'] = $this->input->post('id');
        $data['description'] = $this->input->post('Comments');
        $data['EntryDate'] = $this->input->post('EntryDate');
        $data['amount'] = $this->input->post('amount');
        $data['rate_type'] = $this->input->post('rate_type');
        $data['duration'] = $this->input->post('duration');
        $data['status'] = 2;

//        print_r($data);die;
        $this->BillingModel->insertInfo('time_entry_expense', $data);
        redirect('billing/timeEntries/' . $status_id);
    }

    public function editTimeEntries() {
        $time_entry_id = $this->input->post('time_entry_id');
        $status_id = $this->input->post('status_id');

        $data['case_id'] = $this->input->post('case_id');
        $data['user_id'] = $this->input->post('UserId');
        $data['activity_id'] = $this->input->post('id');
        $data['description'] = $this->input->post('Comments');
        $data['EntryDate'] = $this->input->post('EntryDate');
        $data['amount'] = $this->input->post('amount');
        $data['rate_type'] = $this->input->post('rate_type');
        $data['duration'] = $this->input->post('duration');
        $data['status'] = 2;

        $this->BillingModel->updateInfo('time_entry_id', $time_entry_id, 'time_entry_expense', $data);
        redirect('billing/timeEntries/' . $status_id);
    }

    public function deleteTimeEntries($id) {
        $this->BillingModel->deleteInfo('time_entry_expense', 'time_entry_id', $id);
        redirect('billing/timeEntries');
    }

    public function expense($status_id = NULL) {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            // echo $status_id;die;
            $data['status_id'] = $status_id;
            $data['all_cases'] = $this->BillingModel->get_all_info('tbl_case');
            $data['all_users'] = $this->BillingModel->get_all_info('user');
            $data['all_activity'] = $this->BillingModel->get_all_info('tbl_activity');

            $data['all_expense'] = $this->BillingModel->get_all_expense('tbl_expense');
            if ($status_id == 1) {
                $data['all_expense'] = $this->BillingModel->get_all_open_expense('tbl_expense');
            }
            if ($status_id == 2) {
                $data['all_expense'] = $this->BillingModel->get_all_invoice_expense('tbl_expense');
            }
            $data['expensecus'] = $this->BillingModel->getexpensecusinfo($user_id);
            $data['pagetitle'] = 'Expense';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/billing/all_expense', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function saveExpense() {
        $data['case_id'] = $this->input->post('case_id');
        $data['UserId'] = $this->input->post('UserId');
        $data['activity_id'] = $this->input->post('id');
        $data['Comments'] = $this->input->post('Comments');
        $data['EntryDate'] = $this->input->post('EntryDate');
        $data['ExpenseAmount'] = $this->input->post('ExpenseAmount');
        $data['qty'] = $this->input->post('qty');
        $data['status'] = 2;

//        print_r($data);die;
        $this->BillingModel->insertInfo('tbl_expense', $data);
        redirect('billing/expense');
    }

    public function editExpense() {
        $ExpenseId = $this->input->post('ExpenseId');
        $status_id = $this->input->post('status_id');

        $data['case_id'] = $this->input->post('case_id');
        $data['UserId'] = $this->input->post('UserId');
        $data['activity_id'] = $this->input->post('id');
        $data['Comments'] = $this->input->post('Comments');
        $data['EntryDate'] = $this->input->post('EntryDate');
        $data['ExpenseAmount'] = $this->input->post('ExpenseAmount');
        $data['qty'] = $this->input->post('qty');
        $data['status'] = 2;

        $this->BillingModel->updateInfo('ExpenseId', $ExpenseId, 'tbl_expense', $data);
        redirect('billing/expense/' . $status_id);
    }

    public function deleteExpense($id) {
        $this->BillingModel->deleteInfo('tbl_expense', 'id', $id);
        redirect('billing/expense');
    }

    public function invoices($status_id = null) {
        $userid = $_SESSION['user_id'];
        $data['all_cases'] = $this->BillingModel->get_all_info('tbl_case');
        $data['all_users'] = $this->BillingModel->get_all_info('user');
        $data['all_activity'] = $this->BillingModel->get_all_info('tbl_activity');
        $data['allinvoice'] = $this->BillingModel->getallinvoiceinfo($userid);
        $data['allpaymentmethod'] = $this->BillingModel->getallpaymentmethod();
        //echo '<pre>'; print_r($data['allinvoice']); exit; 
        //$data['all_expense'] = $this->BillingModel->get_all_expense('tbl_expense');
        // if ($status_id == 1) {
        // $data['all_expense'] = $this->BillingModel->get_all_open_expense('tbl_expense');
        //}
        //if ($status_id == 2) {
        //$data['all_expense'] = $this->BillingModel->get_all_invoice_expense('tbl_expense');
        //}

        $data['pagetitle'] = 'Invoices';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/billing/invoice/all_invoices', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function addInvoices() {
        $data['pagetitle'] = 'All Invoices';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/billing/invoice/all_invoices_list');
        $this->load->view('admin_template/footerlink');
    }

    public function newInvoices($status_id = NULL) {
        $data['status_id'] = $status_id;
        $userid = $_SESSION['user_id'];
        $getfirminfo = $this->BillingModel->getuserfirmid($userid);
        $FirmId = $getfirminfo->FirmId;
        $data['getcompany'] = $this->BillingModel->getcompanyinfobyfirm($FirmId);
        $data['getcontact'] = $this->BillingModel->getcontactinfobyfirm($FirmId);
        $data['all_cases'] = $this->BillingModel->get_all_info('tbl_case');
        $data['all_users'] = $this->BillingModel->get_all_info('tbl_contact');
        $data['all_activity'] = $this->BillingModel->get_all_info('tbl_activity');
        $lastinvoicenumber = $this->BillingModel->getlastinvoiceinfo();
        //print_r($lastinvoicenumber);
        // echo $lastinvoicenumber->InvoiceNumber; 
        //echo '<br>';
        $invnum = ($lastinvoicenumber->InvoiceNumber + 1);
        $digti = strlen((string) $invnum);
        //echo '-------------------';
        if ($digti == 1) {
            $data['invoicenumber'] = sprintf("%05d", $invnum);
        } else if ($digti == 2) {
            $data['invoicenumber'] = sprintf("%04d", $invnum);
        } else if ($digti == 3) {
            $data['invoicenumber'] = sprintf("%03d", $invnum);
        } else if ($digti == 4) {
            $data['invoicenumber'] = sprintf("%02d", $invnum);
        } else if ($digti == 5) {
            $data['invoicenumber'] = $invnum;
        }
        $data['all_time_entries'] = $this->BillingModel->get_all_time_entries('time_entry_expense');
        if ($status_id == 1) {
            $data['all_time_entries'] = $this->BillingModel->get_all_open_time_entries('time_entry_expense');
        }
        if ($status_id == 2) {
            $data['all_time_entries'] = $this->BillingModel->get_all_invoice_time_entries('time_entry_expense');
        }
        //echo '<pre>'; print_r($data['all_time_entries']); exit;
        $data['pagetitle'] = 'New Invoice';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/billing/invoice/addnewinvoice', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function searchcaselink() {
        $type = $this->input->post('type');
        $contactid = $this->input->post('contactid');
        $caseinfo = $this->BillingModel->getcasesbycontact($type, $contactid);

        $html = '<label class="control-label" for="country-countrycode">Case Link</label><select name="case_id[]" id="case_id" class="form-control" multiple="multiple" class="form-control">';
        foreach ($caseinfo as $case) {
            $html .= "<option value=" . $case['CaseId'] . " onclick=getallvaluebycase(" . $case['CaseId'] . ")>" . $case['CaseName'] . "</option>";
        }

        $html .= '</select>';

        $json = array();
        $json['caselink'] = $html;
        echo json_encode($json);
    }

    public function get_case_by_user() {
        $data['res'] = $this->BillingModel->get_case_by_user_id($this->input->post('user_id'));
//        print_r($data);die;
        echo json_encode($data);
    }

    public function get_all_info_by_case_id() {
        $case_id = $this->input->post('case_id');
        $data['time_entries'] = $this->BillingModel->get_time_entries_by_case('time_entry_expense', $case_id);
        $data['expenses'] = $this->BillingModel->get_expenses_by_case('tbl_expense', $case_id);
        $data['all_cases'] = $this->BillingModel->get_all_info('tbl_case');
        $data['all_staff'] = $this->BillingModel->get_all_staff_info('user');
        //echo '<pre>'; print_r($data['all_staff']);
        $data['all_activity'] = $this->BillingModel->get_all_info('tbl_activity');

//        print_r($data['all_staff']);die;
        $json = array();
        $json['invoicediv'] = $this->load->view('lawyer/billing/invoice/invoice_div', $data, TRUE);
        echo json_encode($json);
    }

    public function get_time_entry_by_staff_id() {
        $staff_id = $this->input->post('staff_id');
        $case_id = $this->input->post('case_id');
        $data['staff_time_entries'] = $this->BillingModel->get_time_entries_by_staff_id('time_entry_expense', $staff_id, $case_id);
//        print_r($data);
        $json = array();
        if ($data['staff_time_entries'] != NULL) {
            $json['time_entries'] = $data['staff_time_entries'][0]['amount'];
        } else {
            $json['time_entries'] = 0.00;
        }
//        print_r($json);die;
        echo json_encode($json);
    }

    public function activity() {

        $data['all_activity'] = $this->BillingModel->get_all_activity('tbl_activity');
        $data['pagetitle'] = 'Activity';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/billing/all_activity', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function saveActivity() {
        $data['activity_name'] = $this->input->post('activity_name');
        $data['user_id'] = $this->input->post('user_id');

        $this->BillingModel->insertInfo('tbl_activity', $data);
        redirect('billing/activity');
//        print_r($data);
    }

    public function editActivity() {
        $id = $this->input->post('id');
        $data['activity_name'] = $this->input->post('activity_name');

        $this->BillingModel->updateInfo('id', $id, 'tbl_activity', $data);

        redirect('billing/activity');
    }

    public function deleteActivity($id) {
        $this->BillingModel->deleteInfo('tbl_activity', 'id', $id);
        redirect('billing/activity');
    }

    public function getinvoiceinfobyid() {
        //print_r($_POST);
        $invoiceid = $_POST['invoiceid'];
        $invoiceinfo = $this->BillingModel->getindividualinvoicebyid($invoiceid);
        $json = array();
        $json['invoice'] = $invoiceinfo;
        echo json_encode($json);
    }

	
    public function offlinepayment() {
        $InvoiceId = $_POST['InvoiceId'];
        $CaseId = $_POST['CaseId'];
        $PayerId = $_POST['PayerId'];
        $CompanyId = $_POST['CompanyId'];
        $payment_method = $_POST['payment_method'];
        $note = $_POST['note'];
        if ($_POST['payment_from'] == 1) {
            $payment_from = 'Opareting Account';
        } else {
            $payment_from = 'Trust Account';
        }
        $Created_date = $_POST['Created_date'];
        $Amount = $_POST['Amount'];

        $data = array();
        $data['InvoiceId'] = $InvoiceId;
        $data['PayerId'] = $PayerId;
        $data['CaseId'] = $CaseId;
        $data['CompanyId'] = $CompanyId;
        $data['payment_method'] = $payment_method;
        $data['Amount'] = $Amount;
        $data['Created_date'] = $Created_date;
        $data['status'] = '1';
        $insert = $this->db->insert('tbl_payment', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Payment Inserted Successfully');
            redirect('invoices');
        } else {
            $this->session->set_flashdata('error', 'Payment Inserted is not Complete. Re try again');
            redirect('invoices');
        }
    }
    
    public function viewinvoice(){
        $invoiceid = $this->uri->segment('2');
        $data['invoice'] = $this->BillingModel->getindividualinvoicebyid($invoiceid);
        $data['paymentinfo'] = $this->BillingModel->getspecificinvoicepayment($invoiceid);
        $FirmId = $data['invoice']->FirmId;
        $CompanyId = $data['invoice']->CompanyId;
        $data['firmdata'] = $this->BillingModel->getspecificfirmdata($FirmId);
        $data['companyinfo'] = $this->BillingModel->getinvoicecompanybyid($CompanyId);
        $data['pagetitle'] = 'Invoices View';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/billing/invoice/invoicedetials', $data);
        $this->load->view('admin_template/footerlink');
    }

}
