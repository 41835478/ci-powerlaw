<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->model('SiteModel');
    }

    public function index() {
        $this->load->view('admin/site/registration');
    }

    public function saveUser() {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('firm_name', 'Firm Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/site/registration');
        } else {

            if ($this->input->post('item_name') == 'attorney') {
                $status = 1;
            } else if ($this->input->post('item_name') == 'paralegal') {
                $status = 2;
            } else if ($this->input->post('item_name') == 'staff') {
                $status = 3;
            }
            $data['FirstName'] = $this->input->post('first_name');
            $data['LastName'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $data['username'] = $this->input->post('email');
            $data['fullname'] = $this->input->post('firm_name');
            $data['Mobile'] = $this->input->post('mobile');
            $data['status'] = $status;
            $data['created_at'] = strtotime(date('Y-m-d h:m:s'));

            $member_id = $this->SiteModel->insertId('user', $data);

            $data2 = array();
            $data2['user_id'] = $member_id;
            $data2['item_name'] = $this->input->post('item_name');
            $data2['created_at'] = strtotime(date('Y-m-d h:m:s'));
            $this->db->insert('auth_assignment', $data2);

            $firmdata = array();
            $datecreated = date('Y-m-d h:m:s');
            $firmdata['UserId'] = $member_id;
            $firmdata['FirmName'] = $this->input->post('firm_name');
            $firmdata['ContactFName'] = $this->input->post('first_name');
            $firmdata['ContactLName'] = $this->input->post('last_name');
            $firmdata['Mobile'] = $this->input->post('mobile');
            $firmdata['Email'] = $this->input->post('email');
            $firmdata['CreatedOn'] = $datecreated;
            //echo '<pre>'; print_r($firmdata); exit; 
            $this->db->insert('tbl_firm', $firmdata);
            $firmid = $this->db->insert_id();
            $this->SiteModel->updatefirmid($firmid, $member_id);

            //ATTORNEY PERMISSION
            $data3 = array();
            if ($status == '1') {
                $data3['user_id'] = $member_id;
                $data3['clients'] = '1';
                $data3['cases'] = '1';
                $data3['events'] = '1';
                $data3['documents'] = '1';
                $data3['commenting'] = '1';
                $data3['messaging'] = '1';
                $data3['billing'] = '1';
                $data3['Reporting'] = '4';
                $data3['created_date'] = date('Y-m-d');
                $data3['updated_date'] = date('Y-m-d');
                $data3['accessable_case'] = '1';
                $data3['add_firm_user'] = '1';
                $data3['edit_user_permission'] = '1';
                $data3['delete_item'] = '1';
                $data3['manage_billing_payment'] = '1';
                $this->db->insert('tbl_permission', $data3);
            }

            //NOTIFICATION PERMISSION

            $noti = array();

            $noti['NewCase'] = '2';
            $noti['CaseUpdate'] = '2';
            $noti['CloseCase'] = '2';
            $noti['ReopenCase'] = '2';
            $noti['DeleteCase'] = '2';
            $noti['NoteActivity'] = '2';
            $noti['AssignedCase'] = '2';
            $noti['CaseContact'] = '2';
            $noti['CaseUser'] = '2';
            $noti['NewEvent'] = '2';
            $noti['UpdateEvent'] = '2';
            $noti['DeleteEvent'] = '2';
            $noti['EventComment'] = '2';
            $noti['EventView'] = '2';
            $noti['NewDocument'] = '2';
            $noti['UpdateDocument'] = '2';
            $noti['DeleteDocument'] = '2';
            $noti['DocumentComment'] = '2';
            $noti['DocumentView'] = '2';
            $noti['NewTask'] = '2';
            $noti['UpdateTask'] = '2';
            $noti['DeleteTask'] = '2';
            $noti['CompleteTask'] = '2';
            $noti['IncompleteTask'] = '2';
            $noti['NewExpense'] = '2';
            $noti['UpdateExpense'] = '2';
            $noti['DeleteExpense'] = '2';
            $noti['NewInvoice'] = '2';
            $noti['UpdateInvoice'] = '2';
            $noti['ViewInvoice'] = '2';
            $noti['DeleteInvoice'] = '2';
            $noti['InvoicePayment'] = '2';
            $noti['RefundInvoice'] = '2';
            $noti['ShareInvoice'] = '2';
            $noti['CaseReminder'] = '2';
            $noti['NewContact'] = '2';
            $noti['UpdateContact'] = '2';
            $noti['ArchiveContact'] = '2';
            $noti['UnarchiveContact'] = '2';
            $noti['DeleteContact'] = '2';
            $noti['ContactLogin'] = '2';
            $noti['AddContact'] = '2';
            $noti['AddFirmUser'] = '2';
            $noti['UpdateFirmUser'] = '2';
            $noti['DeactiveFirmUser'] = '2';
            $noti['ChangeFirmPermission'] = '2';
            $noti['ImportedMyPowerLaw'] = '2';
            $noti['UpdateFirm'] = '2';
            $noti['NotificationFrequency'] = 1440;
            $noti['UserId'] = $member_id;
            $noti['FirmId'] = $firmid;
            $noti['UpdatedOn'] = strtotime(date('Y-m-d h:m:s'));

            $this->db->insert('tbl_notifications', $noti);




            $actual_link = "http://wc.rssoft.win/mypowerLaw/" . "site/userActivate/" . $member_id;
            $email = $data['email'];
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Create User Conformation Mail";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";




            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<h1 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:400;text-align:center;margin-bottom:0;color:#fff;line-height:1.4;'>" . 'MyPowerLaw' . "</h1></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:16px;font-weight:normal;'><b>Subject: " . $subject . "</b></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #ff7e00; padding: 18px; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom:20px;padding-top:0px;font-size:14px;vertical-align:top;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody><tr><td style = 'border-radius:5px;text-align:center;background-color:#ff7e00'>";
            $msg .= "<h3>Dear User </h3>";
            $msg .= "<p>Please Click the link for activate your account.</p><a href='" . $actual_link . "'> " . $actual_link . "</a> </td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "<p style = 'font-size:16px;font-weight:normal;margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;color:#444;text-align:center;" >
                    $msg .= "</p><div style = 'background-color:#f2dede;border-radius:5px;border-color:#b96766;color:#b96766;padding:10px'><div>For change password and access site, please sign in to your client portal at:</div>";
            $msg .= "<div><a style = 'color:#3498db;text-decoration:underline' target = '_blank'>" . $siteUrl . "</a></div>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            //echo $msg; exit;
            mail($email, $subject, $msg, $headers);

            redirect('site/completeSignUp');
        }
//        print_r($data);die;
    }

    public function userActivate($id) {
        $data['user_id'] = $id;
//        $data['user_info'] = $this->SiteModel->get_info_by_id('user','id',$id);
//        echo '<pre>';print_r($data);die;
        $this->load->view('admin/site/password_form', $data);
    }

    public function completeSignUp() {
        $this->load->view('complete_sign_up');
    }

    public function loginPassword() {
        $id = $this->input->post('user_id');
        $data['password_hash'] = base64_encode(md5($this->input->post('password')));

        $this->SiteModel->updateInfo('id', $id, 'user', $data);
        redirect('loginform');
    }

    public function loginform() {
        $this->load->view('admin/site/loginform');
    }

    public function laywerLogin() {
        $msg = "Login Successfully";
        $error = "Login Error";
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('loginform');
        } else {
            $q = $this->input->post('password');
            $qEncoded = base64_encode(md5($q));
            $data['username'] = $this->input->post('username');
            $data['password'] = $qEncoded;
            $login = $this->SiteModel->userlogin($data);
           
            if ($login == 1) {
                 $user_id = $_SESSION['user_id'];
                $userallpermissioninfo = $this->SiteModel->getuserpermissioninfobyuserid($user_id);
                $userpermissioncase = $this->SiteModel->getuserpermissioncasebyuserid($user_id);

                if (!empty($userpermissioncase)) {
                    $case = array();
                    foreach ($userpermissioncase as $caseper) {
                        $case[] = $caseper['case_id'];
                    }
                }
                //SET PERMISSION INTO SESSION

                $permissionsession = array(
                    'clients' => $userallpermissioninfo->clients,
                    'cases' => $userallpermissioninfo->cases,
                    'events' => $userallpermissioninfo->events,
                    'documents' => $userallpermissioninfo->documents,
                    'commenting' => $userallpermissioninfo->commenting,
                    'messaging' => $userallpermissioninfo->messaging,
                    'billing' => $userallpermissioninfo->billing,
                    'Reporting' => $userallpermissioninfo->Reporting,
                    'accessable_case' => $userallpermissioninfo->accessable_case,
                    'add_firm_user' => $userallpermissioninfo->add_firm_user,
                    'edit_user_permission' => $userallpermissioninfo->edit_user_permission,
                    'delete_item' => $userallpermissioninfo->delete_item,
                    'manage_billing_payment' => $userallpermissioninfo->manage_billing_payment,
                    'time_entries_expense' => $userallpermissioninfo->time_entries_expense,
                );
                $this->session->set_userdata('permissionsession', $permissionsession);
                $this->session->set_userdata('casepermission', $case);

                $this->session->set_flashdata('success', $msg);
                // echo '<pre>'; print_r($_SESSION); exit; 
                redirect('lawyerdashboard');
            } else if ($login == 2) { 
                $this->session->set_flashdata('error', 'You Account is Deactivate from this site');
                redirect('loginform');
            } else {
                $this->session->set_flashdata('error', 'Username and password is not matched');
                redirect('loginform');
            }
        }
    }

    public function userlogout() {
        $this->session->sess_destroy();
        redirect('loginform');
    }

    public function permission_error() {
        $this->load->view('error/clean404/errorindex');
    }

}
