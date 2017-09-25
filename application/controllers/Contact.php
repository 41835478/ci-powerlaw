<?php

class Contact extends CI_Controller {

    public function __construct() {


        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $login = is_login();
        if ($login) {
            
        } else {
            redirect('permission_error');
        }
        if ($this->session->userdata('user_id') == null) {
            redirect('/');
        }
        $this->load->model('ContactModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('SiteModel');
        $this->load->model('BillingModel');
        $this->load->library('encryption');
    }

    public function index() {
        $UserId = $this->session->userdata('user_id');
        $data['all_contact'] = $this->ContactModel->allContact($UserId);
        $data['allContactGroup'] = $this->ContactModel->allContactGroup();
        $data['all_user'] = $this->ContactModel->allUser();

        $data['allcases'] = $this->ContactModel->allcases($UserId);
        $data['pagetitle'] = 'All Contact';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/contact/all_contact', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function addContact() {
        $data['all_company'] = $this->ContactModel->all_company();
        $data['all_group'] = $this->ContactModel->all_group();
        $data['all_country_mobile_code'] = $this->ContactModel->all_country_mobile_code();
        $data['pagetitle'] = 'All Contact';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/contact/add_contact', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function create() {
        $this->form_validation->set_rules('FirstName', 'First Name', 'required', array('required' => 'Please provide your Fist Name')
        );
        $this->form_validation->set_rules('ZipCode', 'Zip Code', 'numeric');
        $this->form_validation->set_rules('LicenceNumber', 'Licence Number', 'numeric');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required', array('required' => 'Please provide your Last Name')
        );
        $this->form_validation->set_rules('Email', 'Email', 'required|is_unique[tbl_contact.Email]', array('required' => 'Please provide your Email',
            'is_unique' => 'This email already registred'
                )
        );
        $this->form_validation->set_rules('CCodeM', 'CCodeM', 'callback_mobile_check[' . $this->input->post('Mobile') . ']'
        );
        $this->form_validation->set_rules('CCodeP', 'CCodeP', 'callback_phone_check[' . $this->input->post('Phone') . ']'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->addContact();
        } else {
                $userid = $this->session->userdata('user_id');
            $getfirminfo = $this->BillingModel->getuserfirmid($userid);
            $FirmId = $getfirminfo->FirmId;
            
            $data['UserId'] = $this->session->userdata('user_id');

            $data['FirstName'] = $this->input->post('FirstName');
            $data['FirmId'] = $FirmId;
            $data['MiddleName'] = $this->input->post('MiddleName');
            $data['LastName'] = $this->input->post('LastName');
            $data['ContactGroup'] = $this->input->post('ContactGroup');
            $data['CompanyId'] = $this->input->post('CompanyId');
            $data['JobTitle'] = $this->input->post('JobTitle');
            $data['Email'] = $this->input->post('Email');
            $data['CCodeM'] = $this->input->post('CCodeM');
            $data['Mobile'] = $this->input->post('Mobile');
            $data['CCodeP'] = $this->input->post('CCodeP');
            $data['Phone'] = $this->input->post('Phone');
            $data['Address'] = $this->input->post('Address');
            $data['Address2'] = $this->input->post('Address2');
            $data['Country'] = $this->input->post('Country');
            $data['State'] = $this->input->post('State');
            $data['City'] = $this->input->post('City');
            $data['ZipCode'] = $this->input->post('ZipCode');
            $data['AllowPortalAccess'] = $this->input->post('AllowPortalAccess');
            $data['Website'] = $this->input->post('Website');
            $DateOfBirth = $this->input->post('DateOfBirth');
            $DateOfAnniversary = $this->input->post('DateOfAnniversary');
            $data['LicenceNumber'] = $this->input->post('LicenceNumber');
            $data['LicenceState'] = $this->input->post('LicenceState');
            $data['WelcomeMessage'] = $this->input->post('WelcomeMessage');
            $data['PrivateNote'] = $this->input->post('PrivateNote');
            $data['CreatedOn'] = date('Y-m-d H:i:s');
            $data['LastUpdatedOn'] = date('Y-m-d H:i:s');
           
            $data['status'] = 1;
            $this->ContactModel->addContact($data);
            $contactid = $this->db->insert_id();

            //INSERT INTO LOG TABLE
            $logdata = array();
            $userid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));


            $logdata['contact_id'] = $contactid;
            $logdata['created_by'] = $userid;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'contact-add';
            $this->db->insert('tbl_contact_log', $logdata);
            $contactid = $this->db->insert_id();
            
            //INSERT INTO TRUST ACCOUNT TABLE
            $depositon = strtotime(date('Y-m-d'));
            $trust = array();
            $trust['contact_id'] = $contactid;
            $trust['firm_id'] = $FirmId;
            $trust['payment_method'] = 2;
            $trust['amount'] = 0;
            $trust['deposit_on'] = $depositon;
            $trust['deposit_by'] = $userid;

           // $this->db->insert('tbl_trust_account', $trust);

            $this->session->set_flashdata('insertsuccess', 'New Contact Successfully Added');
            redirect(base_url() . 'contact');
        }
    }

    public function delete() {
        $id = base64_decode($this->uri->segment(3));
        $this->ContactModel->delete($id);
        $this->session->set_flashdata('deletesuccess', 'Contact Successfully Delete!');
        redirect(base_url() . 'contact');
    }

    public function updateForm() {
        $loginId = $this->session->userdata('user_id');
        $id = base64_decode($this->uri->segment(3));
        $chekauth = $this->ContactModel->all_info_for_update($id);
        $chekauthid = $chekauth->UserId;
        if ($loginId == $chekauthid) {
            $data['all_info_for_update'] = $this->ContactModel->all_info_for_update($id);
            $data['all_company'] = $this->ContactModel->all_company();
            $data['all_group'] = $this->ContactModel->all_group();
            $data['all_country_mobile_code'] = $this->ContactModel->all_country_mobile_code();
            $data['pagetitle'] = 'Edit Contact';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/contact/update_contact', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    function mobile_check($CCodeM_field, $mobile_field) {
        if (($CCodeM_field == '' && $mobile_field != '') || ($CCodeM_field != '' && $mobile_field == '')) {
            $this->form_validation->set_message('mobile_check', 'Please provide your country code and mobile number also!"');
            return false;
        } else {
            return true;
        }
    }

    function phone_check($CCodeP_field, $phone_field) {

        if (($CCodeP_field == '' && $phone_field != '') || ($CCodeP_field != '' && $phone_field == '')) {
            $this->form_validation->set_message('phone_check', 'Please provide your country code and phone number also!"');
            return false;
        } else {
            return true;
        }
    }

    public function updated() {

        $data['UserId'] = $this->session->userdata('user_id');
        $data['FirstName'] = $this->input->post('FirstName');
        $data['MiddleName'] = $this->input->post('MiddleName');
        $data['LastName'] = $this->input->post('LastName');
        $data['ContactGroup'] = $this->input->post('ContactGroup');
        $data['CompanyId'] = $this->input->post('CompanyId');
        $data['JobTitle'] = $this->input->post('JobTitle');
        $data['Email'] = $this->input->post('Email');
        $data['CCodeM'] = $this->input->post('CCodeM');
        $data['Mobile'] = $this->input->post('Mobile');
        $data['CCodeP'] = $this->input->post('CCodeP');
        $data['Phone'] = $this->input->post('Phone');
        $data['Address'] = $this->input->post('Address');
        $data['Address2'] = $this->input->post('Address2');
        $data['Country'] = $this->input->post('Country');
        $data['State'] = $this->input->post('State');
        $data['City'] = $this->input->post('City');
        $data['ZipCode'] = $this->input->post('ZipCode');
        $data['AllowPortalAccess'] = $this->input->post('AllowPortalAccess');
        $data['Website'] = $this->input->post('Website');
        $DateOfBirth = $this->input->post('DateOfBirth');
        $DateOfAnniversary = $this->input->post('DateOfAnniversary');
        $data['LicenceNumber'] = $this->input->post('LicenceNumber');
        $data['LicenceState'] = $this->input->post('LicenceState');
        $data['WelcomeMessage'] = $this->input->post('WelcomeMessage');
        $data['PrivateNote'] = $this->input->post('PrivateNote');

        $data['LastUpdatedOn'] = date('Y-m-d H:i:s');
        $data['DateOfBirth'] = date("Y-m-d", strtotime($DateOfBirth));
        $data['DateOfAnniversary'] = date("Y-m-d", strtotime($DateOfAnniversary));
        $this->form_validation->set_rules('ZipCode', 'Zip Code', 'numeric');
        $this->form_validation->set_rules('LicenceNumber', 'Licence Number', 'numeric');
        $this->form_validation->set_rules('FirstName', 'First Name', 'required', array('required' => 'Please provide your Fist Name')
        );
        $this->form_validation->set_rules('LastName', 'Last Name', 'required', array('required' => 'Please provide your Last Name')
        );
        $this->form_validation->set_rules('Email', 'Email', 'required', array('required' => 'Please provide your Email',
            'is_unique' => 'This email already registred'
                )
        );
        $this->form_validation->set_rules('CCodeM', 'CCodeM', 'callback_mobile_check[' . $this->input->post('Mobile') . ']'
        );
        $this->form_validation->set_rules('CCodeP', 'CCodeP', 'callback_phone_check[' . $this->input->post('Phone') . ']'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->updateForm();
        } else {
            $id = base64_decode($this->uri->segment(3));
            $checkexist = $this->ContactModel->checkexist($data['Email'], $id);
            if ($checkexist) {
                $this->updateForm();
            } else {
                $this->ContactModel->updateall($data, $id);
                $this->session->set_flashdata('updatesuccess', 'Contact Successfully Updated!');
                redirect(base_url() . 'contact');
            }
        }
    }

    public function userDetail() {
        $loginid = $this->session->userdata('user_id');
        $id = base64_decode($this->uri->segment(3));
        $checkurl = $this->ContactModel->userDetail($id);
        if ($checkurl) {
            if ($checkurl->id == $loginid) {
                $data['auserDetail'] = $this->ContactModel->userDetail($id);
                $data['allCase'] = $this->ContactModel->allCase($id);

                $data['pagetitle'] = 'User Details';
                $this->load->view('admin_template/headerlink', $data);
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/contact/user_details', $data);
                $this->load->view('admin_template/footerlink');
            } else {
                $this->load->view('error/clean404/errorindex');
            }
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    public function caseLink() {
        $id = $this->uri->segment(3);
        $data['auserDetail'] = $this->ContactModel->userDetail($id);
        $data['allCase'] = $this->ContactModel->allCase($id);
        //echo '<pre>'; print_r($data['allCase']); exit;
        $data['pagetitle'] = 'Case link';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/contact/link_details', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function removecaseLink() {
        $userid = $this->uri->segment(2);
        $id = $this->uri->segment(4);
        $this->ContactModel->removecaseLink($id);
        redirect(base_url() . 'users/caseLink/' . $userid);
    }

    public function rateUpdate() {
        $data['BillingRate'] = $this->input->post('rate');
        $CaseId = $this->input->post('id');
        $userid = $this->input->post('userid');
        $this->ContactModel->updaterate($data, $CaseId);
        redirect(base_url() . 'users/caseLink/' . $userid);
    }

    public function AddcontactImage() {
        $id = $this->uri->segment(3);
        $imagename = $_FILES['userImage']['name'];
        $fieldename = 'image';
        $image = $imagename;
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rand = rand(0, 100000);
        $imagename = $rand . '.' . $ext;
        $config['upload_path'] = './upload/contact/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '52428800';
        $config['detect_mime'] = FALSE;
        $config['file_name'] = $imagename;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userImage')) {
            $error = array('error' => $this->upload->display_errors());
        } else {

            $id = $this->uri->segment(3);
            array('upload_data' => $this->upload->data());

            $data['Picture'] = $imagename;

            $this->ContactModel->updateimg($id, $data);

            echo base_url() . 'upload/' . $imagename;
        }
    }

    public function contactPdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['all_contact'] = $this->ContactModel->allContact($userId);
            // echo '<pre>'; print_r($data['all_contact']);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/contact_pdf', $data, TRUE);
            $name = "Contact.pdf";
            $search = array("<div class=\"row\">", "<div class=\"col-lg-12\">", "<div class=\"col-md-5\">", "<div class=\"col-md-5 col-md-offset-2\">");
            $replace = array("<div style='width: 100%;'>", "<div style='width: 90%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");

            $html = str_replace($search, $replace, $html);
            $html = str_replace($search, $replace, $html);
            //print_r($html); exit;
            $mpdf->WriteHTML($html);
            $mpdf->Output($name, 'D');
            exit;
        }
    }

    public function contactexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Contact.csv";
        $userid = $_SESSION['user_id'];
        $query = "SELECT tbl_contact.FirstName, tbl_contact.Email, tbl_contact.Mobile, tbl_contact_group.GroupName FROM tbl_contact INNER JOIN tbl_contact_group ON tbl_contact_group.GroupId=tbl_contact.ContactGroup WHERE tbl_contact.UserId = '" . $userid . "'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function contactdel() {
        $contactid = $this->uri->segment('2');
        $this->db->where('ContactId', $contactid);
        $delete = $this->db->delete('tbl_contact');
        if ($delete) {
            $this->session->set_flashdata('success', 'Contact Delete Successfully');
            redirect('contact');
        } else {
            $this->session->set_flashdata('error', 'Contact Delete is not Complete. Re try again');
            redirect('contact');
        }
    }

    public function contactarchive() {
        $contactid = $this->uri->segment('2');
        $this->db->set('status', '0');
        $this->db->where('ContactId', $contactid);
        $update = $this->db->update('tbl_contact');
        if ($update) {
            $this->session->set_flashdata('success', 'Contact Archive Successfully');
            redirect('contact');
        } else {
            $this->session->set_flashdata('error', 'Contact Archive is not Complete. Re try again');
            redirect('contact');
        }
    }

    public function getcontactbygroupid() {
        $userid = $_SESSION['user_id'];
        $groupid = $this->input->post('group_id');
        $contactinfo = $this->ContactModel->getallcontactbygroup($groupid, $userid);
        $i = 0;
        $allcases = $this->ContactModel->allcases($userid);
        foreach ($allcases as $aCase) {
            $caselink[] = $aCase->ContactId;
        }
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Name</th><th>Email</th><th>Mobile</th><th>Contact Group</th><th>Linked Cases</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($contactinfo)) {
            foreach ($contactinfo as $con) {
                $baseUrl = base_url();
                $groupinfo = $this->ContactModel->groupinfobyid($con['ContactGroup']);
                $group = $groupinfo->GroupName;
                $timestamp = strtotime($con['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $userinfo = $this->ContactModel->userinfobyid($con['UserId']);
                $addedby = $userinfo->fullname;
                $html .= "<tr><td>" . ++$i . "</td><td>" . $con['FirstName'] . $con['LastName'] . "</td>";
                $html .= "<td>" . $con['Email'] . "</td><td>" . $con['Mobile'] . "</td>";
                $html .= "<td>" . $group . "</td>";
                if (in_array($con['ContactId'], $caselink)) {
                    $caseinfo = $this->ContactModel->getcasebycontactid($con['ContactId']);
                    $html .= "<td>";
                    foreach ($caseinfo as $casecon) {
                        $html .= "<a href='" . $baseUrl . "cases/viewCase/" . base64_encode($casecon['CaseId']) . ">" . $casecon['CaseName'] . "</br></a>";
                    }
                    $html .= "</td>";
                } else {
                    $html .= "<td></td>";
                }
                $html .= "<td><p>Added On " . $condate . "by " . $addedby . "</p></td>";
                $html .= "<td><a href='" . $baseUrl . "'company/contactDetails/" . base64_encode($con['ContactId']) . "title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "'contact/update/" . base64_encode($con['ContactId']) . "title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a href='" . $baseUrl . "'contact/delete/" . base64_encode($con['ContactId']) . "title='Delete' aria-label='Delete' data-pjax='0'><span class='glyphicon glyphicon-trash' onClick='doconfirm();'></span></a>";
                $html .= "</td></tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['contactdiv'] = $html;
        echo json_encode($json);
    }

    public function getactivecontact() {
        $userid = $_SESSION['user_id'];
        $contactinfo = $this->ContactModel->getallactivecontactforsearch($userid);
        $i = 0;
        $allcases = $this->ContactModel->allcases($userid);
        foreach ($allcases as $aCase) {
            $caselink[] = $aCase->ContactId;
        }
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Name</th><th>Email</th><th>Mobile</th><th>Contact Group</th><th>Linked Cases</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($contactinfo)) {
            foreach ($contactinfo as $con) {
                $baseUrl = base_url();
                $groupinfo = $this->ContactModel->groupinfobyid($con['ContactGroup']);
                $group = $groupinfo->GroupName;
                $timestamp = strtotime($con['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $userinfo = $this->ContactModel->userinfobyid($con['UserId']);
                $addedby = $userinfo->fullname;
                $html .= "<tr><td>" . ++$i . "</td><td>" . $con['FirstName'] . $con['LastName'] . "</td>";
                $html .= "<td>" . $con['Email'] . "</td><td>" . $con['Mobile'] . "</td>";
                $html .= "<td>" . $group . "</td>";
                if (in_array($con['ContactId'], $caselink)) {
                    $caseinfo = $this->ContactModel->getcasebycontactid($con['ContactId']);
                    $html .= "<td>";
                    foreach ($caseinfo as $casecon) {
                        $html .= "<a href='" . $baseUrl . "cases/viewCase/" . base64_encode($casecon['CaseId']) . ">" . $casecon['CaseName'] . "</br></a>";
                    }
                    $html .= "</td>";
                } else {
                    $html .= "<td></td>";
                }
                $html .= "<td><p>Added On " . $condate . "by " . $addedby . "</p></td>";
                $html .= "<td><a href='" . $baseUrl . "'company/contactDetails/" . base64_encode($con['ContactId']) . "title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "'contact/update/" . base64_encode($con['ContactId']) . "title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a href='" . $baseUrl . "'contact/delete/" . base64_encode($con['ContactId']) . "title='Delete' aria-label='Delete' data-pjax='0'><span class='glyphicon glyphicon-trash' onClick='doconfirm();'></span></a>";
                $html .= "</td></tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['contactdiv'] = $html;
        echo json_encode($json);
    }

    public function getarchivecontact() {
        $userid = $_SESSION['user_id'];
        $contactinfo = $this->ContactModel->getallarchivecontactforsearch($userid);
        $i = 0;
        $allcases = $this->ContactModel->allcases($userid);
        foreach ($allcases as $aCase) {
            $caselink[] = $aCase->ContactId;
        }
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Name</th><th>Email</th><th>Mobile</th><th>Contact Group</th><th>Linked Cases</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($contactinfo)) {
            foreach ($contactinfo as $con) {
                $baseUrl = base_url();
                $groupinfo = $this->ContactModel->groupinfobyid($con['ContactGroup']);
                $group = $groupinfo->GroupName;
                $timestamp = strtotime($con['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $userinfo = $this->ContactModel->userinfobyid($con['UserId']);
                $addedby = $userinfo->fullname;
                $html .= "<tr><td>" . ++$i . "</td><td>" . $con['FirstName'] . $con['LastName'] . "</td>";
                $html .= "<td>" . $con['Email'] . "</td><td>" . $con['Mobile'] . "</td>";
                $html .= "<td>" . $group . "</td>";
                if (in_array($con['ContactId'], $caselink)) {
                    $caseinfo = $this->ContactModel->getcasebycontactid($con['ContactId']);
                    $html .= "<td>";
                    foreach ($caseinfo as $casecon) {
                        $html .= "<a href='" . $baseUrl . "cases/viewCase/" . base64_encode($casecon['CaseId']) . ">" . $casecon['CaseName'] . "</br></a>";
                    }
                    $html .= "</td>";
                } else {
                    $html .= "<td></td>";
                }
                $html .= "<td><p>Added On " . $condate . "by " . $addedby . "</p></td>";
                $html .= "<td><a href='" . $baseUrl . "'company/contactDetails/" . base64_encode($con['ContactId']) . "title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "'contact/update/" . base64_encode($con['ContactId']) . "title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a href='" . $baseUrl . "'contact/delete/" . base64_encode($con['ContactId']) . "title='Delete' aria-label='Delete' data-pjax='0'><span class='glyphicon glyphicon-trash' onClick='doconfirm();'></span></a>";
                $html .= "</td></tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['contactdiv'] = $html;
        echo json_encode($json);
    }

}
