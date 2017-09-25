<?php

class Firm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $login = is_login();
        if ($login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('AccountModel');
        $this->load->model('SiteModel');
        $this->load->model('FirmModel');
    }

    public function index() {
        $data['pagetitle'] = 'All Firm';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/firm/firm_settings');
        $this->load->view('admin_template/footerlink');
    }

    public function allfirmusers() {
        $user_id = $_SESSION['user_id'];
        if (isset($user_id) && $user_id != '') {
            $userinfo = $this->FirmModel->getuserinfo($user_id);
            $firmid = $userinfo->FirmId;
            $data['allfirmuser'] = $this->FirmModel->getallfirmuser($user_id, $firmid);
            $data['pagetitle'] = 'All Firm User';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/firm/allfirmusers', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function addFirmuser() {
        $firmId = $_SESSION['FirmId'];
        $data['country'] = $this->FirmModel->getcountryinfo();
        $data['state'] = $this->FirmModel->getstateinfo();
        $data['case'] = $this->FirmModel->getcaseinfo($firmId);
        $data['pagetitle'] = 'Add Firm User';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/firm/addfirmuser', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function insertfirmuser() {
        //SAVE DATA INTO USER TBL
        $data = array();
        if ($_POST['user_type'] == 'attorney') {
            $status = 1;
        } else if ($_POST['user_type'] == 'paralegal') {
            $status = 2;
        } else if ($_POST['user_type'] == 'staff') {
            $status = 3;
        }
        $data['fullname'] = $_POST['username'];
        $data['username'] = $_POST['email'];
        $data['email'] = $_POST['email'];
        $data['status'] = $status;
        $data['created_by'] = $_SESSION['user_id'];
        $data['created_at'] = strtotime(date('Y-m-d'));
        $data['updated_at'] = strtotime(date('Y-m-d'));
        $data['FirstName'] = $_POST['FirstName'];
        $data['LastName'] = $_POST['LastName'];
        $data['Mobile'] = $_POST['Mobile'];
        $data['Phone'] = $_POST['Phone'];
        $data['DefaultRate'] = $_POST['default_rate'];
        $data['Address1'] = $_POST['Address1'];
        $data['Address2'] = $_POST['Address2'];
        $data['Country'] = $_POST['Country'];
        $data['State'] = $_POST['State'];
        $data['City'] = $_POST['City'];
        $data['ZipCode'] = $_POST['ZipCode'];
        $data['FirmId'] = $_SESSION['FirmId'];

        $member_id = $this->FirmModel->addfirmuser($data);

        //SAVE DATA INTO AUTH PERMISSION TBL

        $data1 = array();
        $data1['user_id'] = $member_id;
        $data1['item_name'] = $this->input->post('user_type');
        $data1['created_at'] = strtotime(date('Y-m-d h:m:s'));
        $this->db->insert('auth_assignment', $data1);

        //SAVE DATA INTO PERMISSION TBL

        $data3 = array();

        $data3['user_id'] = $member_id;
        $data3['clients'] = $_POST['clients'];
        $data3['cases'] = $_POST['cases'];
        $data3['events'] = $_POST['events'];
        $data3['documents'] = $_POST['documents'];
        $data3['commenting'] = $_POST['commenting'];
        $data3['messaging'] = $_POST['messaging'];
        $data3['billing'] = $_POST['billing'];
        $data3['Reporting'] = $_POST['Reporting'];
        $data3['created_date'] = date('Y-m-d');
        $data3['updated_date'] = date('Y-m-d');
        $data3['accessable_case'] = $_POST['accessable_case'];
        $data3['add_firm_user'] = $_POST['add_firm_user'];
        $data3['edit_user_permission'] = $_POST['edit_user_permission'];
        $data3['delete_item'] = $_POST['delete_item'];
        $data3['manage_billing_payment'] = $_POST['manage_billing_payment'];
        $this->db->insert('tbl_permission', $data3);


        //SAVE DATA INTO LINK CASE TBL
        if ($_POST['caseradio'] == 3) {
            $data2 = array();
            $data2['user_id'] = $member_id;
            $data2['case_id'] = $_POST['clients'];
            $data2['user_type'] = $_POST['user_type'];
            $data2['case_rate'] = $_POST['case_rate'];
            $data2['created_date'] = strtotime(date('Y-m-d h:m:s'));
            $this->db->insert('user_link_case', $data2);
        } else if ($_POST['caseradio'] == 2) {
            $getallcaseid = $this->FirmModel->getfirmcase($_SESSION['FirmId']);
            //echo '<pre>';  print_r($getallcaseid); 
            $data4 = array();
            foreach ($getallcaseid as $key => $caseid) {  //echo '<pre>';  print_r($caseid); 
                $data4['user_id'] = $member_id;
                $data4['case_id'] = $caseid['CaseId'];
                $data4['user_type'] = $_POST['user_type'];
                $data4['case_rate'] = $_POST['case_rate'];
                $data4['created_date'] = strtotime(date('Y-m-d h:m:s'));
                $this->db->insert('user_link_case', $data4);
            }
            //exit;
        }


        //SAVE LOG INTO FIRM LOG TBL

        $logdata = array();
        $userid = $this->session->userdata('user_id');
        $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
        $notificationtime = $getnotificationinfo->NotificationFrequency;
        $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

        $logdata['created_by'] = $userid;
        $logdata['firm_user_id'] = $member_id;
        $logdata['date'] = date('Y-m-d H:i:s');
        $logdata['notification_time'] = $newTime;

        $logdata['notification_status'] = '0';
        $logdata['type'] = 'firm-user-add';
        $this->db->insert('tbl_firm_log', $logdata);


        //SEND MAIL TO THE STAFF

        $actual_link = "http://wc.rssoft.win/mypowerLaw/" . "firmuserActivate/" . $member_id;
        $email = $data['email'];
        $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
        $subject = "Invitation for Joining Mypowerlaw";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <admin@gmail.com>' . "\r\n";
        $firminfo = $this->FirmModel->getfirminfo($_SESSION['FirmId']);
        $firmname = $firminfo->FirmName;
        $loginusername = $this->FirmModel->getuserinfo($_SESSION['user_id']);
        $username = $loginusername->fullname;



        $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
        $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
        $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
        $msg .= "<tbody><tr>";
        $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
        $msg .= "<h1 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:400;text-align:center;margin-bottom:0;color:#fff;line-height:1.4;'>" . 'MyPowerLaw' . "</h1></td></tr>";
        $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
        $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:16px;font-weight:normal;'><b>Activate Your Account</b></p></div>";
        $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #ff7e00; padding: 18px; color:#fff'>";
        $msg .= "<tbody>";
        $msg .= "<tr><td align = 'center' style = 'padding-bottom:20px;padding-top:0px;font-size:14px;vertical-align:top;'>";
        $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
        $msg .= "<tbody><tr><td style = 'border-radius:5px;text-align:center;background-color:#ff7e00'>";
        $msg .= "<h3>Dear User </h3>";
        $msg .= "<p>" . $username . "User has created your mypowerlaw account with" . $firmname . "Firm. </p>";
        $msg .= "<p>Please Click the link for activate your account.</p><a href='" . $actual_link . "'> " . $actual_link . "</a> </td>";
        $msg .= "</tr></tbody></table></td></tr></tbody></table>";
        $msg .= "<p style = 'font-size:16px;font-weight:normal;margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;color:#444;text-align:center;" >
                $msg .= "</p><div style = 'background-color:#f2dede;border-radius:5px;border-color:#b96766;color:#b96766;padding:10px'><div>For change password and access site, please sign in to your client portal at:</div>";
        $msg .= "<div><a style = 'color:#3498db;text-decoration:underline' target = '_blank'>" . $siteUrl . "</a></div>";
        $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
        //echo $msg;
        // exit;
        $mail = mail($email, $subject, $msg, $headers);


        if ($mail) {
            redirect('allfirmusers');
        }
    }

    public function firmuserActivate() {
        $data['user_id'] = $this->uri->segment('2');
        $this->load->view('lawyer/firm/account_password_form', $data);
    }

    public function firmuserPassword() {
        $id = $this->input->post('user_id');
        $data['password_hash'] = base64_encode(md5($this->input->post('password')));
        $update = $this->FirmModel->updatepasswordInfo($data, $id);
        if ($update) {
            redirect('loginform');
        }
    }

    public function updatepermission() {
        $userid = $this->uri->segment('2');
        $this->db->set('clients', $_POST['clients']);
        $this->db->set('cases', $_POST['cases']);
        $this->db->set('events', $_POST['events']);
        $this->db->set('documents', $_POST['documents']);
        $this->db->set('commenting', $_POST['commenting']);
        $this->db->set('messaging', $_POST['messaging']);
        $this->db->set('billing', $_POST['billing']);
        $this->db->set('Reporting', $_POST['Reporting']);
        $this->db->set('updated_date', date('Y-m-d'));
        $this->db->set('accessable_case', $_POST['accessable_case']);
        $this->db->set('add_firm_user', $_POST['add_firm_user']);
        $this->db->set('edit_user_permission', $_POST['edit_user_permission']);
        $this->db->set('delete_item', $_POST['delete_item']);
        $this->db->set('manage_billing_payment', $_POST['manage_billing_payment']);

        $this->db->where('user_id', $userid);
        $update = $this->db->update('tbl_permission');
        if ($update) {
            //SAVE LOG INTO FIRM LOG TBL

            $logdata = array();
            $createduserid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($createduserid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            $logdata['created_by'] = $createduserid;
            $logdata['firm_user_id'] = $userid;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'firm-user-permission';
            $loginsert = $this->db->insert('tbl_firm_log', $logdata);

            $this->session->set_flashdata('success', "Firm user permission upgrade successfully");
            redirect('allfirmusers');
        } else {
            $this->session->set_flashdata('error', "There is an error in firm user permission upgrade");
            redirect('allfirmusers');
        }
    }

    public function firmPreferences() {
        
    }

    public function firmNotification() {
        $data['pagetitle'] = 'Firm Notification';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/firm/firm_notification');
        $this->load->view('admin_template/footerlink');
    }

}
