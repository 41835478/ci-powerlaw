<?php

require_once('/var/www/vhosts/wc.rssoft.win/httpdocs/mypowerLaw/assets/vCard/vCard.php');
require_once('/var/www/vhosts/wc.rssoft.win/httpdocs/mypowerLaw/assets/Contact_Vcard_Parse/Contact_Vcard_Parse.php');
//require_once('file:///E:/xampp/htdocs/mypowerLawServer/assets/vCard/vCard.php');
//require_once('file:///E:/xampp/htdocs/mypowerLawServer/assets/Contact_Vcard_Parse/Contact_Vcard_Parse.php');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_login();
        $login = is_login();
        if ($check && $login) {
            
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
        $this->load->model('CountrySystemModel');
        $this->load->model('StateSystemModel');
    }

    public function index() {
        $data['pagetitle'] = 'Account';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account/account_settings');
        $this->load->view('admin_template/footerlink');
    }

    public function accountNotification() {
        $user_id = $_SESSION['user_id'];
        $data['usernotification'] = $this->AccountModel->getusernotification($user_id);
        $data['pagetitle'] = 'Account Notification';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account/account_notification', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function accountPicture() {
        $data['pagetitle'] = 'Account Picture';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account/account_picture');
        $this->load->view('admin_template/footerlink');
    }

    public function changePassword() {
        $data['pagetitle'] = 'Account Password';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account/change_password');
        $this->load->view('admin_template/footerlink');
    }

    public function accountSettings() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            //$user_id = base64_decode($this->uri->segment('2'));
            $user_id = $this->uri->segment('2');
            $data['userinfo'] = $this->AccountModel->getuserinfobyuserid($user_id);
            if (!empty($data['userinfo'])) {
                $data['staffinfo'] = $this->AccountModel->getstaffinfobyuserid($data['userinfo']->id);
            }

            $userinfo = $this->FirmModel->getuserinfo($user_id);
            $firmid = $data['userinfo']->FirmId;
            $data['allfirmuser'] = $this->FirmModel->getallfirmuser($user_id, $firmid);
            $data['pagetitle'] = 'Account Settings';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/account/accountsettings', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('');
        }
    }

    public function mySettings() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $this->uri->segment('2');
            $data['userinfo'] = $this->AccountModel->getuserinfobyuserid($user_id);
            $data['staffinfo'] = $this->AccountModel->getstaffinfobyuserid($data['userinfo']->id);
            $data['pagetitle'] = 'My Setting';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/account/mysettings', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('');
        }
    }

    public function firmuser() {
        $user_id = $_SESSION['user_id'];
        if (isset($user_id) && $user_id != '') {
            $userinfo = $this->FirmModel->getuserinfo($user_id);
            $firmid = $userinfo->FirmId;
            $data['allfirmuser'] = $this->FirmModel->getallfirmuser($user_id, $firmid);
            $data['pagetitle'] = 'Firm User';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/account/firmusers', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function firmsettings() {
        $user_id = $_SESSION['user_id'];
        if (isset($user_id) && $user_id != '') {
            $userinfo = $this->FirmModel->getuserinfo($user_id);
            $firmid = $userinfo->FirmId;
            $data['allfirminfo'] = $this->FirmModel->getfirminfobyfirmid($user_id, $firmid);
           // print_r($data['allfirminfo']); 
            $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
            $data['allstate'] = $this->StateSystemModel->getallstateinfo();
            $data['creditinfo'] = $this->FirmModel->getcreditinfo($firmid);
            $data['allreminderinfo'] = $this->FirmModel->getreminderinfo();
            $data['pagetitle'] = 'Firm Settings';
            $data['firmid'] = $firmid;
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/account/firmsettings', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function updatefirmsettings() {
        $firmId = $this->uri->segment('2');
//echo $this->input->post('FirmName'); exit;
        $this->db->set('FirmName', $this->input->post('FirmName'));
        $this->db->set('Address1', $this->input->post('Address1'));
        $this->db->set('City', $this->input->post('City'));
        $this->db->set('State', $this->input->post('State'));
        $this->db->set('Country', $this->input->post('Country'));
        $this->db->set('Mobile', $this->input->post('Mobile'));
        $this->db->set('Email', $this->input->post('Email'));
        $this->db->set('Website', $this->input->post('Website'));
        $this->db->where('FirmId', $firmId);
        $update = $this->db->update('tbl_firm');
        if ($update) {
            $logdata = array();
            $createduserid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($createduserid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            $logdata['created_by'] = $createduserid;
            $logdata['firm_user_id'] = $firmId;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'firm-information';
            $loginsert = $this->db->insert('tbl_firm_log', $logdata);
            $this->session->set_flashdata('success', 'Firm Settings update Successfully');
            redirect('firmsettings');
        } else {
            $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
            redirect('firmsettings');
        }
    }

    public function updatecreditcardinfo() {
        $firmId = $this->uri->segment('2');

        $firmsettinginfo = $this->AccountModel->getfirmsettingbyid($firmId);
        if (empty($firmsettinginfo)) {
            $data = array();
            $data['FirmId'] = $firmId;
            $data['paypal_email'] = $this->input->post('paypal_email');
            $data['card_holder_name'] = $this->input->post('card_holder_name');
            $data['card_number'] = $this->input->post('card_number');
            $data['cvv'] = $this->input->post('cvv');
            $data['month'] = $this->input->post('month');
            $data['year'] = $this->input->post('year');
            $data['address1'] = $this->input->post('address1');
            $data['address2'] = $this->input->post('address2');
            $data['city'] = $this->input->post('city');
            $data['state'] = $this->input->post('state');
            $data['country'] = $this->input->post('country');
            $data['zip'] = $this->input->post('zip');
            $data['edited_by'] = $_SESSION['user_id'];
            $data['edited_on'] = strtotime(date('Y-m-d h:m:s'));


            $insert = $this->db->insert('firm_settings_tbl', $data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Firm Settings update Successfully');
                redirect('firmsettings');
            } else {
                $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
                redirect('firmsettings');
            }
        } else {
            $this->db->set('paypal_email', $this->input->post('paypal_email'));
            $this->db->set('card_holder_name', $this->input->post('card_holder_name'));
            $this->db->set('card_number', $this->input->post('card_number'));
            $this->db->set('cvv', $this->input->post('cvv'));
            $this->db->set('month', $this->input->post('month'));
            $this->db->set('year', $this->input->post('year'));
            $this->db->set('address1', $this->input->post('address1'));
            $this->db->set('address2', $this->input->post('address2'));
            $this->db->set('city', $this->input->post('city'));
            $this->db->set('state', $this->input->post('state'));
            $this->db->set('country', $this->input->post('country'));
            $this->db->set('zip', $this->input->post('zip'));
            $this->db->set('edited_by', $_SESSION['user_id']);
            $this->db->set('edited_on', strtotime(date('Y-m-d h:m:s')));
            $this->db->where('FirmId', $firmId);
            $update = $this->db->update('firm_settings_tbl');

            if ($update) {
                $this->session->set_flashdata('success', 'Firm Settings update Successfully');
                redirect('firmsettings');
            } else {
                $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
                redirect('firmsettings');
            }
        }
    }

    public function updatepaypalemailinfo() {
        $firmId = $this->uri->segment('2');

        $firmsettinginfo = $this->AccountModel->getfirmsettingbyid($firmId);
        if (empty($firmsettinginfo)) {
            $data = array();
            $data['FirmId'] = $firmId;
            $data['paypal_email'] = $this->input->post('paypal_email');
            $data['edited_by'] = $_SESSION['user_id'];
            $data['edited_on'] = strtotime(date('Y-m-d h:m:s'));

            $insert = $this->db->insert('firm_settings_tbl', $data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Firm Settings update Successfully');
                redirect('firmsettings');
            } else {
                $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
                redirect('firmsettings');
            }
        } else {
            $this->db->set('paypal_email', $this->input->post('paypal_email'));
            $this->db->set('edited_by', $_SESSION['user_id']);
            $this->db->set('edited_on', strtotime(date('Y-m-d h:m:s')));
            $this->db->where('FirmId', $firmId);
            $update = $this->db->update('firm_settings_tbl');

            if ($update) {
                $this->session->set_flashdata('success', 'Firm Settings update Successfully');
                redirect('firmsettings');
            } else {
                $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
                redirect('firmsettings');
            }
        }
    }

    public function updatefirmpreferences() {
        $firmId = $this->uri->segment('2');
        if ($this->input->post('client_portal_access') == '') {
            $client_portal_access = 'Disabled';
        } else {
            $client_portal_access = 'Enabled';
        }

        if ($this->input->post('statute_of_limitations') == '') {
            $statute_of_limitations = 'Disabled';
        } else {
            $statute_of_limitations = 'Enabled';
        }

        $this->db->set('client_portal_access', $client_portal_access);
        $this->db->set('client_welcome_message', $this->input->post('client_welcome_message'));
        $this->db->set('event_reminder', $this->input->post('event_reminder'));
        $this->db->set('statute_of_limitations', $statute_of_limitations);
        $this->db->set('edited_by', $_SESSION['user_id']);
        $this->db->set('edited_on', strtotime(date('Y-m-d h:m:s')));
        $this->db->where('FirmId', $firmId);
        $update = $this->db->update('firm_settings_tbl');

//FIRM LOGO 
        if ($update) {
            $logdata = array();
            $createduserid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($createduserid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            $logdata['created_by'] = $createduserid;
            $logdata['firm_user_id'] = $firmId;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'firm-information';
            $loginsert = $this->db->insert('tbl_firm_log', $logdata);

            if (isset($_FILES['filename']) && !empty($_FILES['filename']['name'])) {
                $newsImage = $_FILES['filename']['name'];
                $icon = $newsImage;
                $ext = pathinfo($icon, PATHINFO_EXTENSION);
                $rand = rand(0, 100000);
                $imagename = 'firm_' . $rand . '.' . $ext;
                $config['upload_path'] = './upload/firmimage';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $type = $config['allowed_types'];
                $config['max_size'] = '500000';
                $size = $config['max_size'];
                $config['file_name'] = $imagename;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('filename')) {
                    $status = 'error';
                } else {
                    $fileinfo = $this->upload->data();
//print_r($fileinfo); exit; 
                    $info['FirmLogo'] = $fileinfo['file_name'];
                    $up = $this->db->update('tbl_firm', $info, array('FirmId' => $firmId));
                    if ($up) {
                        $this->session->set_flashdata('success', 'Firm Settings update Successfully');
                        redirect('firmsettings');
                    } else {
                        $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
                        redirect('firmsettings');
                    }
                }
            }
            $this->session->set_flashdata('success', 'Firm Settings update Successfully');
            redirect('firmsettings');
        } else {
            $this->session->set_flashdata('error', 'Firm Settings update is not Complete. Re try again');
            redirect('firmsettings');
        }
    }

    public function edituserprofile() {
        $user_id = $this->uri->segment('2');
        $data['userinfo'] = $this->AccountModel->getuserinfobyuserid($user_id);
        $data['pagetitle'] = 'Edit Profile';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account/accountedit', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function updateuseracc() {
        $user_id = $this->uri->segment('2');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('Address1', 'Address', 'required');
        $this->form_validation->set_rules('Phone', 'Phone', 'required');
        $this->form_validation->set_rules('Mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() === FALSE) {
            redirect('edituserprofile/' . $user_id);
        } else {
            $data = array();
            $this->db->set('fullname', $this->input->post('fullname'));
            $this->db->set('Address1', $this->input->post('Address1'));
            $this->db->set('Phone', $this->input->post('Phone'));
            $this->db->set('Mobile', $this->input->post('Mobile'));
            $this->db->set('email', $this->input->post('email'));
            $this->db->where('id', $user_id);
            $update = $this->db->update('user');
            if ($update) {

                $this->session->set_flashdata('success', 'Account Update Successfully');
                redirect('edituserprofile/' . $user_id);
            } else {
                $this->session->set_flashdata('error', 'Account Update is not Complete. Re try again');
                redirect('edituserprofile/' . $user_id);
            }
        }
    }

    public function changeaccountemail() {
        $user_id = $this->uri->segment('2');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() === FALSE) {
            redirect('edituserprofile/' . $user_id);
        } else {
            $data = array();
            $q = $this->input->post('password');
            $qEncoded = base64_encode(md5($q));
            $this->db->set('email', $this->input->post('email'));
            $this->db->where('password_hash', $qEncoded);
            $update = $this->db->update('user');
            if ($update) {
                $this->session->set_flashdata('success', 'Account Email Update Successfully');
                redirect('edituserprofile/' . $user_id);
            } else {
                $this->session->set_flashdata('error', 'Account Email Update is not Complete. Re try again');
                redirect('edituserprofile/' . $user_id);
            }
        }
    }

    public function changeaccountpassword() {
        $user_id = $this->uri->segment('2');
        $this->form_validation->set_rules('oldpassword', 'oldpassword', 'required');
        $this->form_validation->set_rules('newpassword', 'newpassword', 'required');
        $this->form_validation->set_rules('confirmpassword', 'confirmpassword', 'required');


        if ($this->form_validation->run() === FALSE) {
            redirect('edituserprofile/' . $user_id);
        } else {
            $data = array();
            $oldq = $this->input->post('oldpassword');
            $oldpass = base64_encode(md5($oldq));
            $passq = $this->input->post('newpassword');
            $newpass = base64_encode(md5($passq));
            $this->db->set('password_hash', $newpass);
            $this->db->where('id', $user_id);
            $update = $this->db->update('user');
            if ($update) {
                $this->session->set_flashdata('success', 'Account Password Update Successfully');
                redirect('edituserprofile/' . $user_id);
            } else {
                $this->session->set_flashdata('error', 'Account Password Update is not Complete. Re try again');
                redirect('edituserprofile/' . $user_id);
            }
        }
    }

    public function changeavater() {
        $user_id = $this->uri->segment('2');
        if (isset($_FILES['filename']) && !empty($_FILES['filename']['name'])) {
            $newsImage = $_FILES['filename']['name'];
            $icon = $newsImage;
            $ext = pathinfo($icon, PATHINFO_EXTENSION);
            $rand = rand(0, 100000);
            $imagename = 'user_' . $rand . '.' . $ext;
            $config['upload_path'] = './upload/user';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $type = $config['allowed_types'];
            $config['max_size'] = '500000';
            $size = $config['max_size'];
            $config['file_name'] = $imagename;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('filename')) {
                $status = 'error';
            } else {
                $fileinfo = $this->upload->data();
                $info['Picture'] = $fileinfo['file_name'];
                $up = $this->db->update('user', $info, array('id' => $user_id));
                if ($up) {
                    $this->session->set_flashdata('success', 'Account Avater Update Successfully');
                    redirect('edituserprofile/' . $user_id);
                } else {
                    $this->session->set_flashdata('error', 'Account Avater Update is not Complete. Re try again');
                    redirect('edituserprofile/' . $user_id);
                }
            }
        }
    }

    public function importExport() {
        $user_id = $_SESSION['user_id'];
        if (isset($user_id) && $user_id != '') {
            $data['importedcontactfiles'] = $this->AccountModel->getimportedcontactbyid($user_id);
            $data['importedcasefiles'] = $this->AccountModel->getimportedcasebyid($user_id);
            $data['pagetitle'] = 'Import Export';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/account/importexport', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function zipFiles() {
        $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_attorney.FirstName as Attorney, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_attorney ON tbl_attorney.AttorneyId=tbl_case.AttoernyId INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea";
        $result = $this->db->query($query);

        $query1 = "SELECT tbl_location.location_name, tbl_location.address, tbl_location.city, tbl_state.StateName, tbl_country.CountryName, tbl_location.latitude, tbl_location.longitude FROM tbl_location INNER JOIN tbl_state ON tbl_state.StateId=tbl_location.state INNER JOIN tbl_country ON tbl_country.CountryId=tbl_location.country";
        $result1 = $this->db->query($query1);

        $re1 = $result->result_array();
        $re2 = $result1->result_array();

        $headers = array('id', 'name', 'age', 'species');
        $records = array($re1, $re2);


        $zipname = 'file.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);

        for ($i = 0; $i < count($records); $i++) {

// create a temporary file
            $fd = fopen('php://temp/maxmemory:1048576', 'w');
            if (false === $fd) {
                die('Failed to create temporary file');
            }

            foreach ($records as $rr) {

                foreach ($rr as $record) {
                    fputcsv($fd, $record);
                }
            }

            rewind($fd);
            $zip->addFromString('file-' . $i . '.csv', stream_get_contents($fd));
            fclose($fd);
        }

        $zip->close();

        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename=' . $zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);

        unlink($zipname);
    }

    public function exportcontact() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Contact.csv";
        if ($this->input->post('company') != '') {
            $option = $this->input->post('company');
        } else if ($this->input->post('archive') != '') {
            $option = $this->input->post('archive');
        }

        if ($this->input->post('expcon') == 1) {
            if ($option == '1') {
                $query = "SELECT tbl_contact.FirstName, tbl_contact.Email, tbl_contact.Mobile, tbl_contact_group.GroupName FROM tbl_contact INNER JOIN tbl_contact_group ON tbl_contact_group.GroupId=tbl_contact.ContactGroup WHERE status=1";
                $result = $this->db->query($query);
                $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
                force_download($filename, $data);
            } else if ($option == '2') {
                $query = "SELECT tbl_contact.FirstName, tbl_contact.Email, tbl_contact.Mobile, tbl_contact_group.GroupName FROM tbl_contact INNER JOIN tbl_contact_group ON tbl_contact_group.GroupId=tbl_contact.ContactGroup";
                $result = $this->db->query($query);
                $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
                force_download($filename, $data);
            }
        } else {

            $vCard = new vCard('file:///E:/xampp/htdocs/mypowerLawServer/assets/vCard/test.vcf');
            echo count($vCard);
            if (count($vCard) == 1) {
                print_r($vCard->n);
                print_r($vCard->tel);
            }

            $path = "file:///E:/xampp/htdocs/mypowerLawServer/assets/vCard/";
            $file = "test.vcf";

            header("Pragma: public");
            header("Expires: 0"); // set expiration time
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment; filename=" . basename($file) . ";");
            header("Content-Transfer-Encoding: binary");

            @readfile($file);
            exit(0);
        }

        redirect('importExport');
    }

    public function exportcase() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Case.csv";
        $user_id = $_SESSION['user_id'];

        if ($this->input->post('caselink') == 1) {
            if ($this->input->post('closed') != '') {
                $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_attorney.FirstName as Attorney, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_attorney ON tbl_attorney.AttorneyId=tbl_case.AttoernyId INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea WHERE tbl_case.userId = '" . $user_id . "'";
            } else {
                $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea WHERE tbl_case.userId = '" . $user_id . "' AND tbl_case.caseStatus = '1'";
            }
            $result = $this->db->query($query);
            $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
            force_download($filename, $data);
        } else if ($this->input->post('caselink') == 2) {
            if ($this->input->post('closed') != '') {
                $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea";
            } else {
                $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea WHERE tbl_case.caseStatus = '1'";
            }
            $result = $this->db->query($query);
            $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
            force_download($filename, $data);
        }

        redirect('importExport');
    }

    public function importcontact() {
        $date = date('Y-m-d h:m:s');
        $status = 1;

        if ($_POST['importformat'] == 1) {
            $method = 'csv';
        } else if ($_POST['importformat'] == 2) {
            $method = 'vcard';
        }
        $uploaded_by = $_SESSION['user_id'];
        $uploaded_on = strtotime(date('Y-m-d h:m:s'));
        if (isset($_POST['importformat']) && $_POST['importformat'] == 1) {
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    fgetcsv($csvFile);

                    while (($line = fgetcsv($csvFile)) !== FALSE) {
                        $prevQuery = "SELECT ContactId FROM tbl_contact WHERE Email = '" . $line[3] . "'";
                        $prevResult = $this->db->query($prevQuery);
                        if ($prevResult->num_rows() > 0) {
                            $data1 = array();
                            $data1['filename'] = $_FILES['file']['name'];
                            $data1['created_by'] = $uploaded_by;
                            $data1['created_date'] = $uploaded_on;
                            $data1['status'] = '2';
                            $data1['error_text'] = "Duplicate Entry";
                            $data1['type'] = "contact";
                            $this->db->insert('tbl_log', $data1);
                            $this->db->query("UPDATE tbl_contact SET FirstName = '" . $line[0] . "', MiddleName = '" . $line[1] . "', LastName = '" . $line[2] . "', Mobile = '" . $line[4] . "', ContactGroup = '" . $line[5] . "', LastUpdatedOn = '" . $date . "' WHERE Email = '" . $line[3] . "'");
                        } else {
                            $groupQuery = "SELECT GroupId FROM tbl_contact_group WHERE GroupName = '" . $line[5] . "'";
                            $groupResult = $this->db->query($groupQuery);
                            $groupid = $groupResult->result()[0]->GroupId;
                            $insert = $this->db->query("INSERT INTO tbl_contact (FirstName, MiddleName, LastName, Mobile, ContactGroup, Email, CreatedOn, LastUpdatedOn, status, UserId) VALUES ('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $line[4] . "','" . $groupid . "','" . $line[3] . "','" . $date . "','" . $date . "','" . $status . "','" . $uploaded_by . "')");
                            $importstatus = 1;
                            $filename = $_FILES['file']['name'];
                            $contactid = $this->db->insert_id();
                            $contact = 'contact';
                            $this->db->query("INSERT INTO tbl_import (file_name, method, uploaded_by, uploaded_on, status, type, contactid) VALUES ('" . $filename . "','" . $method . "','" . $uploaded_by . "','" . $uploaded_on . "','" . $importstatus . "','" . $contact . "','" . $contactid . "')");
                        }
                    }

                    fclose($csvFile);

                    $qstring = '?status=succ';
                    $getimportid = $this->AccountModel->getimportidbyfilename($_FILES['file']['name']);
                    $data = array();
                    $data['filename'] = $_FILES['file']['name'];
                    $data['created_by'] = $uploaded_by;
                    $data['created_date	'] = $uploaded_on;
                    $data['status'] = '1';
                    $data['error_text'] = "";
                    $data1['type'] = "contact";
                    $data1['import_id'] = $getimportid->id;
                    $this->db->insert('tbl_log', $data);
                } else {
                    $data1 = array();
                    $data1['filename'] = $_FILES['file']['name'];
                    $data1['created_by'] = $uploaded_by;
                    $data1['created_date'] = $uploaded_on;
                    $data1['status'] = '2';
                    $data1['error_text'] = "Field Name is not matched";
                    $data1['type'] = "contact";
                    $this->db->insert('tbl_log', $data1);
                    $qstring = '?status=err';
                }
            } else {
                $data1 = array();
                $data1['filename'] = $_FILES['file']['name'];
                $data1['created_by'] = $uploaded_by;
                $data1['created_date'] = $uploaded_on;
                $data1['status'] = '2';
                $data1['error_text'] = "File is not valid format";
                $data1['type'] = "contact";
                $this->db->insert('tbl_log', $data1);
                $qstring = '?status=invalid_file';
            }
        } else {



            if ($_FILES['file']['tmp_name']) {
                $parse = new Contact_Vcard_Parse();
                $cardinfo = $parse->fromFile($_FILES['file']['tmp_name']);
                foreach ($cardinfo as $card) {
                    $first = $card['N'][0]['value'][0][0];
                    $last = $card['N'][0]['value'][1][0];
                    $email = $card['EMAIL'][0]['value'][0][0];
                    $matchcontactemail = $this->AccountModel->getmatchedcontactemail($email);
                    $mobile = $card['TEL'][0]['value'][0][0];
                    $address = $card['LABEL'][0]['value'][0][0];
                    $city = $card['ADR'][0]['value'][2][4];
                    $cgroupname = $card['TITLE'][0]['value'][0][0];
                    if (empty($matchcontactemail)) {
                        $getgroupname = $this->AccountModel->getgroupnamebyid($cgroupname);
                        if (empty($getgroupname)) {
                            $firmid = $this->AccountModel->getfirminfobyid($_SESSION['user_id']);
                            $grp['GroupName'] = $cgroupname;
                            $grp['FirmId'] = $firmid->FirmId;
                            $groupid = $this->AccountModel->insertgroup($grp);

                            $cgdata = array();
                            $cgdata['FirstName'] = $first;
                            $cgdata['LastName'] = $last;
                            $cgdata['Email'] = $email;
                            $cgdata['Mobile'] = $mobile;
                            $cgdata['ContactGroup'] = $groupid;
                            $cgdata['Address'] = $address;
                            $cgdata['City'] = $city;
                            $cgdata['UserId'] = $_SESSION['user_id'];
                            $cgdata['CreatedOn'] = $uploaded_on;
                            $cgdata['LastUpdatedOn'] = $uploaded_on;

                            $insertsuccess = $this->db->insert('tbl_contact', $cgdata);
                            if ($insertsuccess) {
                                $data1 = array();
                                $data1['filename'] = $_FILES['file']['name'];
                                $data1['created_by'] = $uploaded_by;
                                $data1['created_date'] = $uploaded_on;
                                $data1['status'] = '1';
                                $data1['error_text'] = "";
                                $data1['type'] = "contact";
                                $this->db->insert('tbl_log', $data1);
                            } else {
                                $data1 = array();
                                $data1['filename'] = $_FILES['file']['name'];
                                $data1['created_by'] = $uploaded_by;
                                $data1['created_date'] = $uploaded_on;
                                $data1['status'] = '2';
                                $data1['error_text'] = "File is not import";
                                $data1['type'] = "contact";
                                $this->db->insert('tbl_log', $data1);
                            }
                        }
                        $groupid = $getgroupname->GroupId;
                        $cdata = array();
                        $cdata['FirstName'] = $first;
                        $cdata['LastName'] = $last;
                        $cdata['Email'] = $email;
                        $cdata['Mobile'] = $mobile;
                        $cdata['ContactGroup'] = $groupid;
                        $cdata['Address'] = $address;
                        $cdata['City'] = $city;
                        $cdata['UserId'] = $_SESSION['user_id'];
                        $cdata['CreatedOn'] = $uploaded_on;
                        $cdata['LastUpdatedOn'] = $uploaded_on;

                        $insertsu = $this->db->insert('tbl_contact', $cdata);
                        if ($insertsu) {
                            $data1 = array();
                            $data1['filename'] = $_FILES['file']['name'];
                            $data1['created_by'] = $uploaded_by;
                            $data1['created_date'] = $uploaded_on;
                            $data1['status'] = '1';
                            $data1['error_text'] = "";
                            $data1['type'] = "contact";
                            $this->db->insert('tbl_log', $data1);
                        } else {
                            $data1 = array();
                            $data1['filename'] = $_FILES['file']['name'];
                            $data1['created_by'] = $uploaded_by;
                            $data1['created_date'] = $uploaded_on;
                            $data1['status'] = '2';
                            $data1['error_text'] = "File is not import";
                            $data1['type'] = "contact";
                            $this->db->insert('tbl_log', $data1);
                        }
                    } else {
                        $this->db->query("UPDATE tbl_contact SET FirstName = '" . $first . "', LastName = '" . $last . "', Mobile = '" . $mobile . "', ContactGroup = '" . $groupid . "', LastUpdatedOn = '" . $date . "' WHERE Email = '" . $email . "'");
                    }
                }
            }
        }
        redirect('importExport');
    }

    public function undoimport() {
        $logid = $this->uri->segment('2');

        $this->db->set('undo_status', '1');
        $this->db->where('log_id', $logid);
        $this->db->update('tbl_log');


        $getimportfilename = $this->AccountModel->getimportfilenameforundo($logid);
        if ($getimportfilename->filename != '') {
            $this->db->set('undo_status', '1');
            $this->db->where('file_name', $getimportfilename->filename);
            $this->db->update('tbl_import');
        }
        $getimportcontactid = $this->AccountModel->getimportcontactid($getimportfilename->filename);
        foreach ($getimportcontactid as $impcontactid) {
            foreach ($impcontactid as $ddd) {
                $this->db->where('ContactId', $ddd);
                $this->db->delete('tbl_contact');
            }
        }
        redirect('importExport');
    }

    public function viewlog() {
        $logid = $this->uri->segment('2');
        $data['loginfo'] = $this->AccountModel->getloginfobylogid($logid);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('lawyer/account/viewlog', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function importcases() {

        $date = date('Y-m-d h:m:s');
        $status = 1;

        $uploaded_by = $_SESSION['user_id'];
        $uploaded_on = strtotime(date('Y-m-d h:m:s'));
        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                fgetcsv($csvFile);

                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    $prevQuery = "SELECT CaseId FROM tbl_case WHERE CaseName = '" . $line[0] . "'";
                    $prevResult = $this->db->query($prevQuery);
                    if ($prevResult->num_rows() > 0) {
                        $data1 = array();
                        $data1['filename'] = $_FILES['file']['name'];
                        $data1['created_by'] = $uploaded_by;
                        $data1['created_date'] = $uploaded_on;
                        $data1['status'] = '2';
                        $data1['error_text'] = "Duplicate Entry";
                        $data1['type'] = "case";
                        $this->db->insert('tbl_log', $data1);


                        $this->db->set('CaseName', $line[0]);
                        $this->db->set('CaseNumber', $line[1]);
                        $this->db->set('DateOpen', $line[2]);
                        $this->db->set('PracticeArea', $line[3]);
                        $this->db->set('ContactId', $line[8]);
                        $this->db->set('BillingContactPerson', $line[10]);
                        $this->db->set('BillingType', $line[9]);
                        $this->db->set('CreatedOn', date('Y-m-d'));
                        $this->db->set('userId', $uploaded_by);
                        $this->db->set('userId', '1');
                        $this->db->where('CaseName', $line[0]);
                        $this->db->update('tbl_case');
                    } else {
                        $casedata = array();
                        $casedata['CaseName'] = $line[0];
                        $casedata['CaseNumber'] = $line[1];
                        $casedata['DateOpen'] = $line[2];
                        $casedata['PracticeArea'] = $line[3];
                        $casedata['ContactId'] = $line[8];
                        $casedata['BillingContactPerson'] = $line[10];
                        $casedata['BillingType'] = $line[9];
                        $casedata['CreatedOn'] = date('Y-m-d');
                        $casedata['userId'] = $uploaded_by;
                        $casedata['userId'] = '1';
                        $this->db->insert('tbl_case', $casedata);

                        $filename = $_FILES['file']['name'];
                        $method = 'csv';
                        $contactid = $this->db->insert_id();
                        $contact = 'case';
                        $this->db->query("INSERT INTO tbl_import (file_name, method, uploaded_by, uploaded_on, status, type, contactid) VALUES ('" . $filename . "','" . $method . "','" . $uploaded_by . "','" . $uploaded_on . "','" . $importstatus . "','" . $contact . "','" . $contactid . "')");
                    }
                }

                fclose($csvFile);

                $qstring = '?status=succ';
                $getimportid = $this->AccountModel->getimportidbyfilename($_FILES['file']['name']);
                $data = array();
                $data['filename'] = $_FILES['file']['name'];
                $data['created_by'] = $uploaded_by;
                $data['created_date'] = $uploaded_on;
                $data['status'] = '1';
                $data['error_text'] = "";
                $data1['type'] = "case";
                $data1['import_id'] = $getimportid->id;
                $this->db->insert('tbl_log', $data);
            } else {
                $data1 = array();
                $data1['filename'] = $_FILES['file']['name'];
                $data1['created_by'] = $uploaded_by;
                $data1['created_date'] = $uploaded_on;
                $data1['status'] = '2';
                $data1['error_text'] = "Field Name is not matched";
                $data1['type'] = "case";
                $this->db->insert('tbl_log', $data1);
                $qstring = '?status=err';
            }
        } else {
            $data1 = array();
            $data1['filename'] = $_FILES['file']['name'];
            $data1['created_by'] = $uploaded_by;
            $data1['created_date'] = $uploaded_on;
            $data1['status'] = '2';
            $data1['error_text'] = "File is not valid format";
            $data1['type'] = "case";
            $this->db->insert('tbl_log', $data1);
            $qstring = '?status=invalid_file';
        }

        redirect('importExport');
    }

    public function customfield() {
        $user_id = $_SESSION['user_id'];
        $data['allpracticearea'] = $this->AccountModel->getallpracticearea();
        $data['getallcustomfield'] = $this->AccountModel->getcustomfield($user_id);
        $data['contactcustomfield'] = $this->AccountModel->getcontactcustomfield($user_id);
        $data['companycustomfield'] = $this->AccountModel->getcompanycustomfield($user_id);
        $data['timecustomfield'] = $this->AccountModel->gettimecustomfield($user_id);
        $data['pagetitle'] = 'Custom Field';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/account/customfield', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function addcustomefield() {
        $created_on = strtotime(date('Y-m-d h:m:s'));
        $created_by = $_SESSION['user_id'];

        if ($this->input->post('enable_for_all_custome_area') != '') {
            $enable = '1';
        } else {
            $enable = '0';
        }
        if ($this->input->post('value') != '') {
            $value = $this->input->post('value');
        } else {
            $value = "";
        }
        $data = array();
        $data['field_name'] = $this->input->post('field_name');
        $data['method'] = $this->input->post('method');
        $data['value'] = $value;
        $data['created_by'] = $created_by;
        $data['created_on'] = $created_on;
        $data['enable_for_all_custome_area'] = $enable;
        $data['type'] = 'case';
        $insert = $this->db->insert('tbl_global_custom_field', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Custom Fields Insert Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Custom Fields Insert is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function addcontactcustomefield() {
        $created_on = strtotime(date('Y-m-d h:m:s'));
        $created_by = $_SESSION['user_id'];
        if ($this->input->post('value') != '') {
            $value = $this->input->post('value');
        } else {
            $value = "";
        }
        $data = array();
        $data['field_name'] = $this->input->post('field_name');
        $data['method'] = $this->input->post('method');
        $data['value'] = $value;
        $data['created_by'] = $created_by;
        $data['created_on'] = $created_on;
        $data['type'] = 'contact';
        $insert = $this->db->insert('tbl_global_custom_field', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Custom Fields Insert Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Custom Fields Insert is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function editcustomedatawithid() {
        $customid = $this->input->post('customid');
        $getcustomdata = $this->AccountModel->getcusdatabycusid($customid);
        $json = array();
        $json['cusfdid'] = $getcustomdata->id;
        $json['field_name'] = $getcustomdata->field_name;
        $json['method'] = $getcustomdata->method;
        $json['value'] = $getcustomdata->value;
        $json['enable_for_all_custome_area'] = $getcustomdata->enable_for_all_custome_area;
        echo json_encode($json);
    }

    public function updatecustomefield() {
        $cusfdid = $this->input->post('cusfdid');
        $field_name = $this->input->post('field_name');
        $this->db->set('field_name', $field_name);
        $this->db->where('id', $cusfdid);
        $update = $this->db->update('tbl_global_custom_field');
        if ($update) {
            $this->session->set_flashdata('success', 'Custom Fields Update Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Custom Fields Update is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function deletecustomfield() {
        $cusid = $this->uri->segment('2');
        $this->db->where('id', $cusid);
        $delete = $this->db->delete('tbl_global_custom_field');
        if ($delete) {
            $this->session->set_flashdata('success', 'Custom Fields Delete Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Custom Fields Delete is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function showcustomefielddata() {
        $pid = $this->input->post('pid');
        $user_id = $_SESSION['user_id'];
        $getallcustomfield = $this->AccountModel->getcustomfield($user_id);
        $getpracticecfield = $this->AccountModel->practicecfield($pid, $user_id);
        $json = array();
        $base = base_url();
        $html = "<div>";
        foreach ($getallcustomfield as $custom) {
            $html .= "<div class='movehand' draggable='true' style='padding: 5px 10px; margin-bottom: 8px; position: relative; background-color: rgb(247, 247, 247); border: 1px solid rgb(221, 221, 221);'><i class='drag-handle' style='float: left; width: 20px; margin: -10px 10px 0px 0px;'></i><div style='float: right; margin: 10px 0px 0px 10px;'>";
            $html .= "<div><div class='form-group field-notifications-closecase'><label><input name='enable_for_all_custome_area' style='height: 36px;' type='checkbox' id='make-switch' class='switch' name='' value='1' maxlength data-on-color='success' data-off-color='danger'></label></div> </div></div>";
            $html .= "<div class='customFieldName' style='font-size: 1.15em; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>" . $custom['field_name'] . "</div>";
            $html .= "<div class='customFieldType'><span><span class='listType'>" . $custom['method'] . "</span></span></div></div>";
        }
        $html .= "</div>";
        $json['getallcustomfield'] = $html;
        echo json_encode($json);
    }

    public function editcontactfielddatawithid() {
        $customid = $this->input->post('customid');
        $getcustomdata = $this->AccountModel->getcuscondatabycusid($customid);
        $json = array();
        $json['cusfdid'] = $getcustomdata->id;
        $json['field_name'] = $getcustomdata->field_name;
        $json['method'] = $getcustomdata->method;
        $json['value'] = $getcustomdata->value;
        echo json_encode($json);
    }

    public function updatecontactcustomefield() {
        $cusfdid = $this->input->post('cusfdid');
        $field_name = $this->input->post('field_name');
        $this->db->set('field_name', $field_name);
        $this->db->where('id', $cusfdid);
        $update = $this->db->update('tbl_global_custom_field');
        if ($update) {
            $this->session->set_flashdata('success', 'Contact Custom Fields Update Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Contact Custom Fields Update is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function deletecontactcustomfield() {
        $cusid = $this->uri->segment('2');
        $this->db->where('id', $cusid);
        $delete = $this->db->delete('tbl_global_custom_field');
        if ($delete) {
            $this->session->set_flashdata('success', 'Contact Custom Fields Delete Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Contact Custom Fields Delete is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function addcompanycustomefield() {
        $created_on = strtotime(date('Y-m-d h:m:s'));
        $created_by = $_SESSION['user_id'];
        if ($this->input->post('value') != '') {
            $value = $this->input->post('value');
        } else {
            $value = "";
        }
        $data = array();
        $data['field_name'] = $this->input->post('field_name');
        $data['method'] = $this->input->post('method');
        $data['value'] = $value;
        $data['created_by'] = $created_by;
        $data['created_on'] = $created_on;
        $data['type'] = 'company';
        $insert = $this->db->insert('tbl_global_custom_field', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Company Custom Fields Insert Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Company Custom Fields Insert is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function editcompanyfielddatawithid() {
        $customid = $this->input->post('customid');
        $getcustomdata = $this->AccountModel->getcuscompanydatabycusid($customid);
        $json = array();
        $json['cusfdid'] = $getcustomdata->id;
        $json['field_name'] = $getcustomdata->field_name;
        $json['method'] = $getcustomdata->method;
        $json['value'] = $getcustomdata->value;
        echo json_encode($json);
    }

    public function updatecompanycustomefield() {
        $cusfdid = $this->input->post('cusfdid');
        $field_name = $this->input->post('field_name');
        $this->db->set('field_name', $field_name);
        $this->db->where('id', $cusfdid);
        $update = $this->db->update('tbl_global_custom_field');
        if ($update) {
            $this->session->set_flashdata('success', 'Company Custom Fields Update Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Company Custom Fields Update is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function deletecompanycustomfield() {
        $cusid = $this->uri->segment('2');
        $this->db->where('id', $cusid);
        $delete = $this->db->delete('tbl_global_custom_field');
        if ($delete) {
            $this->session->set_flashdata('success', 'Company Custom Fields Delete Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Company Custom Fields Delete is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function addtimecustomefield() {
        $created_on = strtotime(date('Y-m-d h:m:s'));
        $created_by = $_SESSION['user_id'];
        if ($this->input->post('value') != '') {
            $value = $this->input->post('value');
        } else {
            $value = "";
        }
        if ($this->input->post('entriesoption') == '1') {
            $type = 'timeexpense';
        } else if ($this->input->post('entriesoption') == '2') {
            $type = 'time';
        } else if ($this->input->post('entriesoption') == '3') {
            $type = 'expense';
        }
        $data = array();
        $data['field_name'] = $this->input->post('field_name');
        $data['method'] = $this->input->post('method');
        $data['value'] = $value;
        $data['created_by'] = $created_by;
        $data['created_on'] = $created_on;
        $data['type'] = $type;
        $insert = $this->db->insert('tbl_global_custom_field', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Time Custom Fields Insert Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Time Custom Fields Insert is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function edittimefielddatawithid() {
        $customid = $this->input->post('customid');
        $getcustomdata = $this->AccountModel->getcustimedatabycusid($customid);
        if ($getcustomdata->type == 'expense') {
            $type = 3;
        } if ($getcustomdata->type == 'time') {
            $type = 2;
        } if ($getcustomdata->type == 'timeexpense') {
            $type = 1;
        }

        $html = "<select class='form-control' id='' name='entriesoption'>";
        $html .= "<option value='1' ";
        if (".$type." == 1) {
            echo 'Selected';
        }
        $html .= ">Both Time Entries and Expenses</option>";
        $html .= "<option value='2' ";
        if (".$type." == 2) {
            echo 'Selected';
        }
        $html .= ">Time Entries Only</option>";
        $html .= "<option value='3' ";
        if (".$type." == 3) {
            echo 'Selected';
        }
        $html .= ">Expenses Only</option></select>";
        $json = array();
        $json['cusfdid'] = $getcustomdata->id;
        $json['field_name'] = $getcustomdata->field_name;
        $json['method'] = $getcustomdata->method;
        $json['value'] = $getcustomdata->value;
        $json['typedata'] = $html;

        echo json_encode($json);
    }

    public function updatetimecustomefield() {
        $cusfdid = $this->input->post('cusfdid');
        $field_name = $this->input->post('field_name');
        if ($this->input->post('entriesoption') == '1') {
            $type = 'timeexpense';
        } else if ($this->input->post('entriesoption') == '2') {
            $type = 'time';
        } else if ($this->input->post('entriesoption') == '3') {
            $type = 'expense';
        }
        $this->db->set('field_name', $field_name);
        $this->db->set('type', $type);
        $this->db->where('id', $cusfdid);
        $update = $this->db->update('tbl_global_custom_field');
        if ($update) {
            $this->session->set_flashdata('success', 'Time Custom Fields Update Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Time Custom Fields Update is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function deletetimecustomfield() {
        $cusid = $this->uri->segment('2');
        $this->db->where('id', $cusid);
        $delete = $this->db->delete('tbl_global_custom_field');
        if ($delete) {
            $this->session->set_flashdata('success', 'Time Custom Fields Delete Successfully');
            redirect('customfield');
        } else {
            $this->session->set_flashdata('error', 'Time Custom Fields Delete is not Complete. Re try again');
            redirect('customfield');
        }
    }

    public function updatenotificationinfo() {
        if ($this->input->post('NewCase') != '') {
            $NewCase = '1';
        }
        if ($this->input->post('NewCase1') != '') {
            $NewCase = '2';
        }
        if ($this->input->post('NewCase') && $this->input->post('NewCase1')) {
            $NewCase = '3';
        }

        if ($this->input->post('CaseUpdate') != '') {
            $CaseUpdate = '1';
        }
        if ($this->input->post('CaseUpdate1') != '') {
            $CaseUpdate = '2';
        }
        if ($this->input->post('CaseUpdate') && $this->input->post('CaseUpdate1')) {
            $CaseUpdate = '3';
        }
        if ($this->input->post('CloseCase') != '') {
            $CloseCase = '1';
        }
        if ($this->input->post('CloseCase1') != '') {
            $CloseCase = '2';
        }
        if ($this->input->post('CloseCase') && $this->input->post('CloseCase1')) {
            $CloseCase = '3';
        }
        if ($this->input->post('ReopenCase')) {
            $ReopenCase = '1';
        }
        if ($this->input->post('ReopenCase1')) {
            $ReopenCase = '2';
        }
        if ($this->input->post('ReopenCase') && $this->input->post('ReopenCase1')) {
            $ReopenCase = '3';
        }
        if ($this->input->post('DeleteCase')) {
            $DeleteCase = '1';
        }
        if ($this->input->post('DeleteCase1')) {
            $DeleteCase = '2';
        }
        if ($this->input->post('DeleteCase') && $this->input->post('DeleteCase1')) {
            $DeleteCase = '3';
        }
        if ($this->input->post('NoteActivity')) {
            $NoteActivity = '1';
        }
        if ($this->input->post('NoteActivity1')) {
            $NoteActivity = '2';
        }
        if ($this->input->post('NoteActivity') && $this->input->post('NoteActivity1')) {
            $NoteActivity = '3';
        }
        if ($this->input->post('AssignedCase')) {
            $AssignedCase = '1';
        }
        if ($this->input->post('AssignedCase1')) {
            $AssignedCase = '2';
        }
        if ($this->input->post('AssignedCase') && $this->input->post('AssignedCase1')) {
            $AssignedCase = '3';
        }
        if ($this->input->post('CaseContact')) {
            $CaseContact = '1';
        }
        if ($this->input->post('CaseContact1')) {
            $CaseContact = '2';
        }
        if ($this->input->post('CaseContact') && $this->input->post('CaseContact1')) {
            $CaseContact = '3';
        }
        if ($this->input->post('CaseUser')) {
            $CaseUser = '1';
        }
        if ($this->input->post('CaseUser1')) {
            $CaseUser = '2';
        }
        if ($this->input->post('CaseUser') && $this->input->post('CaseUser1')) {
            $CaseUser = '3';
        }
        if ($this->input->post('NewEvent')) {
            $NewEvent = '1';
        }
        if ($this->input->post('NewEvent1')) {
            $NewEvent = '2';
        }
        if ($this->input->post('NewEvent') && $this->input->post('NewEvent1')) {
            $NewEvent = '3';
        }
        if ($this->input->post('UpdateEvent')) {
            $UpdateEvent = '1';
        }
        if ($this->input->post('UpdateEvent1')) {
            $UpdateEvent = '2';
        }
        if ($this->input->post('UpdateEvent') && $this->input->post('UpdateEvent1')) {
            $UpdateEvent = '3';
        }
        if ($this->input->post('DeleteEvent')) {
            $DeleteEvent = '1';
        }
        if ($this->input->post('DeleteEvent1')) {
            $DeleteEvent = '2';
        }
        if ($this->input->post('DeleteEvent') && $this->input->post('DeleteEvent1')) {
            $DeleteEvent = '3';
        }
        if ($this->input->post('EventComment')) {
            $EventComment = '1';
        }
        if ($this->input->post('EventComment1')) {
            $EventComment = '2';
        }
        if ($this->input->post('EventComment') && $this->input->post('EventComment1')) {
            $EventComment = '3';
        }
        if ($this->input->post('EventView')) {
            $EventView = '1';
        }
        if ($this->input->post('EventView1')) {
            $EventView = '2';
        }
        if ($this->input->post('EventView') && $this->input->post('EventView1')) {
            $EventView = '3';
        }
        if ($this->input->post('NewDocument')) {
            $NewDocument = '1';
        }
        if ($this->input->post('NewDocument1')) {
            $NewDocument = '2';
        }
        if ($this->input->post('NewDocument') && $this->input->post('NewDocument1')) {
            $NewDocument = '3';
        }

        if ($this->input->post('UpdateDocument')) {
            $UpdateDocument = '1';
        }
        if ($this->input->post('UpdateDocument1')) {
            $UpdateDocument = '2';
        }
        if ($this->input->post('UpdateDocument') && $this->input->post('UpdateDocument1')) {
            $UpdateDocument = '3';
        }

        if ($this->input->post('DeleteDocument')) {
            $DeleteDocument = '1';
        }
        if ($this->input->post('DeleteDocument1')) {
            $DeleteDocument = '2';
        }
        if ($this->input->post('DeleteDocument') && $this->input->post('DeleteDocument1')) {
            $DeleteDocument = '3';
        }
        if ($this->input->post('DocumentComment')) {
            $DocumentComment = '1';
        }
        if ($this->input->post('DocumentComment1')) {
            $DocumentComment = '2';
        }
        if ($this->input->post('DocumentComment') && $this->input->post('DocumentComment1')) {
            $DocumentComment = '3';
        }
        if ($this->input->post('DocumentView')) {
            $DocumentView = '1';
        }
        if ($this->input->post('DocumentView1')) {
            $DocumentView = '2';
        }
        if ($this->input->post('DocumentView') && $this->input->post('DocumentView1')) {
            $DocumentView = '3';
        }
        if ($this->input->post('NewTask')) {
            $NewTask = '1';
        }
        if ($this->input->post('NewTask1')) {
            $NewTask = '2';
        }
        if ($this->input->post('NewTask') && $this->input->post('NewTask1')) {
            $NewTask = '3';
        }
        if ($this->input->post('UpdateTask')) {
            $UpdateTask = '1';
        }
        if ($this->input->post('UpdateTask1')) {
            $UpdateTask = '2';
        }
        if ($this->input->post('UpdateTask') && $this->input->post('UpdateTask1')) {
            $UpdateTask = '3';
        }
        if ($this->input->post('DeleteTask')) {
            $DeleteTask = '1';
        }
        if ($this->input->post('DeleteTask1')) {
            $DeleteTask = '2';
        }
        if ($this->input->post('DeleteTask') && $this->input->post('DeleteTask1')) {
            $DeleteTask = '3';
        }
        if ($this->input->post('CompleteTask')) {
            $CompleteTask = '1';
        }
        if ($this->input->post('CompleteTask1')) {
            $CompleteTask = '2';
        }
        if ($this->input->post('CompleteTask') && $this->input->post('CompleteTask1')) {
            $CompleteTask = '3';
        }
        if ($this->input->post('IncompleteTask')) {
            $IncompleteTask = '1';
        }
        if ($this->input->post('IncompleteTask1')) {
            $IncompleteTask = '2';
        }
        if ($this->input->post('IncompleteTask') && $this->input->post('IncompleteTask1')) {
            $IncompleteTask = '3';
        }
        if ($this->input->post('NewExpense')) {
            $NewExpense = '1';
        }
        if ($this->input->post('NewExpense1')) {
            $NewExpense = '2';
        }
        if ($this->input->post('NewExpense') && $this->input->post('NewExpense1')) {
            $NewExpense = '3';
        }
        if ($this->input->post('UpdateExpense')) {
            $UpdateExpense = '1';
        }
        if ($this->input->post('UpdateExpense1')) {
            $UpdateExpense = '2';
        }
        if ($this->input->post('UpdateExpense') && $this->input->post('UpdateExpense1')) {
            $UpdateExpense = '3';
        }

        if ($this->input->post('DeleteExpense')) {
            $DeleteExpense = '1';
        }
        if ($this->input->post('DeleteExpense1')) {
            $DeleteExpense = '2';
        }
        if ($this->input->post('DeleteExpense') && $this->input->post('DeleteExpense1')) {
            $DeleteExpense = '3';
        }

        if ($this->input->post('NewInvoice')) {
            $ViewInvoice = '1';
        }
        if ($this->input->post('NewInvoice1')) {
            $ViewInvoice = '2';
        }
        if ($this->input->post('NewInvoice') && $this->input->post('NewInvoice1')) {
            $ViewInvoice = '3';
        }

        if ($this->input->post('UpdateInvoice')) {
            $UpdateInvoice = '1';
        }
        if ($this->input->post('UpdateInvoice1')) {
            $UpdateInvoice = '2';
        }
        if ($this->input->post('UpdateInvoice') && $this->input->post('UpdateInvoice1')) {
            $UpdateInvoice = '3';
        }

        if ($this->input->post('ViewInvoice')) {
            $ViewInvoice = '1';
        }
        if ($this->input->post('ViewInvoice1')) {
            $ViewInvoice = '2';
        }
        if ($this->input->post('ViewInvoice') && $this->input->post('ViewInvoice1')) {
            $ViewInvoice = '3';
        }

        if ($this->input->post('DeleteInvoice')) {
            $DeleteInvoice = '1';
        }
        if ($this->input->post('DeleteInvoice1')) {
            $DeleteInvoice = '2';
        }
        if ($this->input->post('DeleteInvoice') && $this->input->post('DeleteInvoice1')) {
            $DeleteInvoice = '3';
        }

        if ($this->input->post('InvoicePayment')) {
            $InvoicePayment = '1';
        }
        if ($this->input->post('InvoicePayment1')) {
            $InvoicePayment = '2';
        }
        if ($this->input->post('InvoicePayment') && $this->input->post('InvoicePayment1')) {
            $InvoicePayment = '3';
        }

        if ($this->input->post('RefundInvoice')) {
            $RefundInvoice = '1';
        }
        if ($this->input->post('RefundInvoice1')) {
            $RefundInvoice = '2';
        }
        if ($this->input->post('RefundInvoice') && $this->input->post('RefundInvoice1')) {
            $RefundInvoice = '3';
        }

        if ($this->input->post('ShareInvoice')) {
            $ShareInvoice = '1';
        }
        if ($this->input->post('ShareInvoice1')) {
            $ShareInvoice = '2';
        }
        if ($this->input->post('ShareInvoice') && $this->input->post('ShareInvoice1')) {
            $ShareInvoice = '3';
        }

        if ($this->input->post('CaseReminder')) {
            $CaseReminder = '1';
        }
        if ($this->input->post('CaseReminder1')) {
            $CaseReminder = '2';
        }
        if ($this->input->post('CaseReminder') && $this->input->post('CaseReminder1')) {
            $CaseReminder = '3';
        }

        if ($this->input->post('NewContact')) {
            $NewContact = '1';
        }
        if ($this->input->post('NewContact1')) {
            $NewContact = '2';
        }
        if ($this->input->post('NewContact') && $this->input->post('NewContact1')) {
            $NewContact = '3';
        }

        if ($this->input->post('UpdateContact')) {
            $UpdateContact = '1';
        }
        if ($this->input->post('UpdateContact1')) {
            $UpdateContact = '2';
        }
        if ($this->input->post('UpdateContact') && $this->input->post('UpdateContact1')) {
            $UpdateContact = '3';
        }

        if ($this->input->post('ArchiveContact')) {
            $ArchiveContact = '1';
        }
        if ($this->input->post('ArchiveContact1')) {
            $ArchiveContact = '2';
        }
        if ($this->input->post('ArchiveContact') && $this->input->post('ArchiveContact1')) {
            $ArchiveContact = '3';
        }

        if ($this->input->post('UnarchiveContact')) {
            $UnarchiveContact = '1';
        }
        if ($this->input->post('UnarchiveContact1')) {
            $UnarchiveContact = '2';
        }
        if ($this->input->post('UnarchiveContact') && $this->input->post('UnarchiveContact1')) {
            $UnarchiveContact = '3';
        }

        if ($this->input->post('DeleteContact')) {
            $DeleteContact = '1';
        }
        if ($this->input->post('DeleteContact1')) {
            $DeleteContact = '2';
        }
        if ($this->input->post('DeleteContact') && $this->input->post('DeleteContact1')) {
            $DeleteContact = '3';
        }

        if ($this->input->post('ContactLogin')) {
            $ContactLogin = '1';
        }
        if ($this->input->post('ContactLogin1')) {
            $ContactLogin = '2';
        }
        if ($this->input->post('ContactLogin') && $this->input->post('ContactLogin1')) {
            $ContactLogin = '3';
        }

        if ($this->input->post('AddContact')) {
            $AddContact = '1';
        }
        if ($this->input->post('AddContact1')) {
            $AddContact = '2';
        }
        if ($this->input->post('AddContact') && $this->input->post('AddContact1')) {
            $AddContact = '3';
        }

        if ($this->input->post('AddFirmUser')) {
            $AddFirmUser = '1';
        }
        if ($this->input->post('AddFirmUser1')) {
            $AddFirmUser = '2';
        }
        if ($this->input->post('AddFirmUser') && $this->input->post('AddFirmUser1')) {
            $AddFirmUser = '3';
        }

        if ($this->input->post('UpdateFirmUser')) {
            $UpdateFirmUser = '1';
        }
        if ($this->input->post('UpdateFirmUser1')) {
            $UpdateFirmUser = '2';
        }
        if ($this->input->post('UpdateFirmUser') && $this->input->post('UpdateFirmUser1')) {
            $UpdateFirmUser = '3';
        }

        if ($this->input->post('DeactiveFirmUser')) {
            $DeactiveFirmUser = '1';
        }
        if ($this->input->post('DeactiveFirmUser1')) {
            $DeactiveFirmUser = '2';
        }
        if ($this->input->post('DeactiveFirmUser') && $this->input->post('DeactiveFirmUser1')) {
            $DeactiveFirmUser = '3';
        }

        if ($this->input->post('ChangeFirmPermission')) {
            $ChangeFirmPermission = '1';
        }
        if ($this->input->post('ChangeFirmPermission1')) {
            $ChangeFirmPermission = '2';
        }
        if ($this->input->post('ChangeFirmPermission') && $this->input->post('ChangeFirmPermission1')) {
            $ChangeFirmPermission = '3';
        }

        if ($this->input->post('ImportedMyPowerLaw')) {
            $ImportedMyPowerLaw = '1';
        }
        if ($this->input->post('ImportedMyPowerLaw1')) {
            $ImportedMyPowerLaw = '2';
        }
        if ($this->input->post('ImportedMyPowerLaw') && $this->input->post('ImportedMyPowerLaw1')) {
            $ImportedMyPowerLaw = '3';
        }

        if ($this->input->post('UpdateFirm')) {
            $UpdateFirm = '1';
        }
        if ($this->input->post('UpdateFirm1')) {
            $UpdateFirm = '2';
        }
        if ($this->input->post('UpdateFirm') && $this->input->post('UpdateFirm1')) {
            $UpdateFirm = '3';
        }




        $this->db->set('NewCase', $NewCase);
        $this->db->set('CaseUpdate', $CaseUpdate);
        $this->db->set('CloseCase', $CloseCase);
        $this->db->set('ReopenCase', $ReopenCase);
        $this->db->set('DeleteCase', $DeleteCase);
        $this->db->set('NoteActivity', $NoteActivity);
        $this->db->set('AssignedCase', $AssignedCase);
        $this->db->set('CaseContact', $CaseContact);
        $this->db->set('CaseUser', $CaseUser);
        $this->db->set('NewEvent', $NewEvent);
        $this->db->set('UpdateEvent', $UpdateEvent);
        $this->db->set('DeleteEvent', $DeleteEvent);
        $this->db->set('EventComment', $EventComment);
        $this->db->set('EventView', $EventView);
        $this->db->set('NewDocument', $NewDocument);
        $this->db->set('UpdateDocument', $UpdateDocument);
        $this->db->set('DeleteDocument', $DeleteDocument);
        $this->db->set('DocumentComment', $DocumentComment);
        $this->db->set('DocumentView', $DocumentView);
        $this->db->set('NewTask', $NewTask);
        $this->db->set('UpdateTask', $UpdateTask);
        $this->db->set('DeleteTask', $DeleteTask);
        $this->db->set('CompleteTask', $CompleteTask);
        $this->db->set('IncompleteTask', $IncompleteTask);
        $this->db->set('NewExpense', $NewExpense);
        $this->db->set('UpdateExpense', $UpdateExpense);
        $this->db->set('DeleteExpense', $UpdateExpense);
        $this->db->set('NewInvoice', $UpdateExpense);
        $this->db->set('UpdateInvoice', $UpdateExpense);
        $this->db->set('ViewInvoice', $ViewInvoice);
        $this->db->set('DeleteInvoice', $DeleteInvoice);
        $this->db->set('InvoicePayment', $InvoicePayment);
        $this->db->set('RefundInvoice', $RefundInvoice);
        $this->db->set('ShareInvoice', $ShareInvoice);
        $this->db->set('CaseReminder', $CaseReminder);
        $this->db->set('NewContact', $NewContact);
        $this->db->set('UpdateContact', $UpdateContact);
        $this->db->set('ArchiveContact', $ArchiveContact);
        $this->db->set('UnarchiveContact', $UnarchiveContact);
        $this->db->set('DeleteContact', $DeleteContact);
        $this->db->set('ContactLogin', $ContactLogin);
        $this->db->set('AddContact', $AddContact);
        $this->db->set('AddFirmUser', $AddFirmUser);
        $this->db->set('UpdateFirmUser', $UpdateFirmUser);
        $this->db->set('DeactiveFirmUser', $DeactiveFirmUser);
        $this->db->set('ChangeFirmPermission', $ChangeFirmPermission);
        $this->db->set('ImportedMyPowerLaw', $ImportedMyPowerLaw);
        $this->db->set('UpdateFirm', $UpdateFirm);
        $this->db->set('UpdatedOn', strtotime(date('Y-m-d h:m:s')));


        $this->db->where('UserId', $_SESSION['user_id']);
        $this->db->update('tbl_notifications');
        $this->session->set_flashdata('success', 'Notification Updated Successfully');
        redirect('account/accountNotification');
    }

    public function deactivatefirmuser() {
        $firmuserid = $this->uri->segment('2');
        $this->db->where('id', $firmuserid);
        $this->db->set('account_activity', '0');
        $this->db->update('user');
        //SAVE LOG INTO FIRM LOG TBL

        $logdata = array();
        $userid = $this->session->userdata('user_id');
        $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
        $notificationtime = $getnotificationinfo->NotificationFrequency;
        $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

        $logdata['created_by'] = $userid;
        $logdata['firm_user_id'] = $firmuserid;
        $logdata['date'] = date('Y-m-d H:i:s');
        $logdata['notification_time'] = $newTime;

        $logdata['notification_status'] = '0';
        $logdata['type'] = 'firm-user-deactivate';
        $insert = $this->db->insert('tbl_firm_log', $logdata);
        if ($insert) {
            $this->session->set_flashdata('success', "Firm user Deactivate successfully");
            redirect('firmuser');
        } else {
            $this->session->set_flashdata('error', "There is an error in firm user Deactivate");
            redirect('firmuser');
        }
    }

    public function activefirmuser() {
        $firmuserid = $this->uri->segment('2');
        $this->db->where('id', $firmuserid);
        $this->db->set('account_activity', '1');
        $this->db->update('user');
        //SAVE LOG INTO FIRM LOG TBL

        $logdata = array();
        $userid = $this->session->userdata('user_id');
        $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
        $notificationtime = $getnotificationinfo->NotificationFrequency;
        $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

        $logdata['created_by'] = $userid;
        $logdata['firm_user_id'] = $firmuserid;
        $logdata['date'] = date('Y-m-d H:i:s');
        $logdata['notification_time'] = $newTime;

        $logdata['notification_status'] = '0';
        $logdata['type'] = 'firm-user-reactivate';
        $insert = $this->db->insert('tbl_firm_log', $logdata);
        if ($insert) {
            $this->session->set_flashdata('success', "Firm user Reactivate successfully");
            redirect('firmuser');
        } else {
            $this->session->set_flashdata('error', "There is an error in firm user Reactivate");
            redirect('firmuser');
        }
    }

}
