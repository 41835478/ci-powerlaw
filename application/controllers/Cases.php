<?php

class Cases extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_case();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->model('CaseModel');
        $this->load->model('CaseSystemModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('SiteModel');
        $this->load->model('AccountModel');
        $this->load->model('ContactModel');
    }

    public function index() {

        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $data['all_practise_area'] = $this->CaseModel->allPractiseArea();
            $a_farm = $this->CaseModel->getindividualfirm($user_id);
            if ($a_farm) {
                $data['a_farm'] = $a_farm;
                $FirmId = $data['a_farm']->FirmId;
            } else {
                $data['a_farm'] = '';
                $FirmId = '';
            }
            $company = $this->CaseModel->company($FirmId);
            if ($company) {
                $data['company'] = $company;
            } else {
                $data['company'] = '';
            }
            $data['all_practice_area'] = $this->CaseModel->allPracticeArea();
            $data['all_billing_type'] = $this->CaseModel->allBillingType();
            $all_staff = $this->CaseModel->getindividualstaff($FirmId);

            if ($all_staff) {
                $data['all_staff'] = $all_staff;
            } else {
                $data['all_staff'] = '';
            }

            $data['contactgroup'] = $this->CaseModel->getcontactgroup();
            $data['pagetitle'] = 'Add Case';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');

            $this->load->view('lawyer/cases/add_cases', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function getstaffnamebyfirmid() {
        $firm_id = $_POST['firm_id'];
        $getstaff = $this->CaseModel->getallstaffbyfirm($firm_id);
        $html = "<h3>Staff Link</h3><p>Which firm users should be linked to case? </p>";
        $html .= "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>First Name</th><th>Last Name</th><th>User Type</th><th>Billing Rate</th></tr></thead><tbody>";
        if (!empty($getstaff)) {
            foreach ($getstaff as $staff) {
                if ($staff['status'] == '1') {
                    $type = 'Attorney';
                } else if ($staff['status'] == '2') {
                    $type = 'Paralegal';
                } else if ($staff['status'] == '3') {
                    $type = 'Staff';
                }

                $html .= "<tr><td>" . $staff['fullname'] . "</td>";
                $html .= "<td>" . $staff['fullname'] . "</td>";
                $html .= "<td>" . ($type) . "</td>";
                $html .= "<td><input type='text' name='billingrate'></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .= "<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .= "</tbody></table>";



        $companyinfo = $this->CaseModel->getallcompanydatabyfirm($firm_id);
        $company = '<label class="control-label" for="">Company ID</label><select id="case_select" class="form-control" open>';
        foreach ($companyinfo as $comp) {
            $company .= "<option value=" . $comp['CompanyId'] . ">" . $comp['CompanyName'] . "</option>";
        }
        $company .= '</select>';

        $json = array();
        $json['staffdiv'] = $html;
        $json['companydiv'] = $company;
        echo json_encode($json);
    }

    public function submitnewcontact() {
        $data = array();

        $date = date('Y-m-d h:m:s');
        $data['FirstName'] = $this->input->post('firstName');
        $data['LastName'] = $this->input->post('lastName');
        $data['Email'] = $this->input->post('email');
        $data['ContactGroup'] = $this->input->post('GroupName');
        $data['FirmId'] = $this->input->post('firmid');
        $data['CreatedOn'] = $date;
        $data['LastUpdatedOn'] = $date;

        $insert = $this->db->insert('tbl_contact', $data);
        $json = array();
        if ($insert) {
            $json['result'] = 1;
        } else {
            $json['result'] = 0;
        }
        echo json_encode($json);
    }

    public function insertlawyercase() {
        $this->form_validation->set_rules('CaseNumber', 'Case Number', 'numeric');
        $this->form_validation->set_rules('CaseName', 'Case Name', 'required', array('required' => 'Please provide your Case Name!'));
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            if ($this->input->post('CompanyId') != '') {
                $companyid = $this->input->post('CompanyId');
            } else {
                $companyid = 0;
            }
            $data['userId'] = $this->session->userdata('user_id');
            $data['CaseName'] = $this->input->post('CaseName');
            $data['CaseNumber'] = $this->input->post('CaseNumber');
            $data['CaseEmail'] = $this->input->post('CaseEmail');
            $data['PracticeArea'] = $this->input->post('PracticeArea');
            $data['Description'] = $this->input->post('Description');
            $data['FirmId'] = $this->input->post('FirmId');
            $data['CompanyId'] = $this->input->post('CompanyId');
            $data['ContactId'] = $this->input->post('ContactId');
            $data['BillingContactPerson'] = $this->input->post('BillingContactId');
            $data['BillingType'] = $this->input->post('BillingType');
            $DateOpen = $this->input->post('DateOpen');
            $StatuteOfLimitations = $this->input->post('StatuteOfLimitations');
            $ReminderSOL = $this->input->post('ReminderSOL');

            $BillingRate = $this->input->post('BillingRate');
            $data['BillingRate'] = number_format($BillingRate, 2, '.', '');
            $data['CreatedOn'] = date('Y-m-d H:i:s');
            $data['DateOpen'] = date("Y-m-d", strtotime($DateOpen));
            $data['StatuteOfLimitations'] = date("Y-m-d", strtotime($StatuteOfLimitations));
            $data['ReminderSOL'] = date("Y-m-d", strtotime($ReminderSOL));
            $data['caseStatus'] = 1;
            $insert = $this->CaseModel->insertCase($data);
            if ($insert) {
                $this->session->set_flashdata('insertsuccess', 'New Case Added');
                redirect('cases/allCases');
            } else {
                $this->session->set_flashdata('error', 'New Case is not Added');
                redirect('cases/allCases');
            }
        }
    }

    public function viewCase() {
        $id = base64_decode($this->uri->segment(3));
        $check_exist = $this->CaseModel->caseDetails($id);
        if ($check_exist) {
            $userid = $this->session->userdata('user_id');
//            if ($check_exist->userId == $userid) {
            $data['case_details'] = $this->CaseModel->caseDetails($id);
            if ($data['case_details']) {
                $practice_area_id = $data['case_details']->PracticeArea;
                $ContactId = $data['case_details']->ContactId;
                $UserId = $data['case_details']->userId;
                $FirmId = $data['case_details']->FirmId;
                $billingtype = $data['case_details']->BillingType;
                $billingContact = $data['case_details']->BillingContactPerson;
                $data['billing_Contact'] = $this->CaseModel->billingContact($billingContact);
                $data['billing_type'] = $this->CaseModel->billingtype($billingtype);
                $data['practice_area'] = $this->CaseModel->practiceArea($practice_area_id);
                $data['contact_Person'] = $this->CaseModel->contactPerson($ContactId);

                $data['contact_group'] = $this->CaseModel->contactgroup($FirmId);
                $data['a_User'] = $this->CaseModel->auser($UserId);
            }

            $data['pagetitle'] = 'View Case';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/cases/view_case', $data);
            $this->load->view('admin_template/footerlink');
//            } else {
//                $this->load->view('error/clean404/errorindex');
//            }
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    public function allCases() {
        $userid = $this->session->userdata('user_id');
        $data['all_open_cases'] = $this->CaseModel->allOpenCases($userid);
        $data['all_practiceArea'] = $this->CaseModel->allPractiseArea();
        $data['all_company'] = $this->CaseModel->allCompany();
        $data['all_contact'] = $this->CaseModel->allContact();
        $data['all_attorney'] = $this->CaseModel->allAttorney();
        $data['a_user'] = $this->CaseModel->auser($userid);
        $data['pagetitle'] = 'All Cases';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/cases/all_open_cases', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function allClosedCases() {
        $userid = $this->session->userdata('user_id');
        $data['allPracticeArea'] = $this->CaseModel->allPracticeArea();
        $data['all_close_Cases'] = $this->CaseModel->allClosedCases($userid);
        $data['all_company'] = $this->CaseModel->allCompany();
        $data['all_contact'] = $this->CaseModel->allContact();
        $data['all_attorney'] = $this->CaseModel->allAttorney();
        $data['a_user'] = $this->CaseModel->auser($userid);

        $data['pagetitle'] = 'All Close Case';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/cases/all_closed_cases', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function casedetail() {

        $id = base64_decode($this->uri->segment(2));
        $userid = $this->session->userdata('user_id');
        $data['case_details'] = $this->CaseModel->caseDetails($id);
        $practice_area_id = $data['case_details']->PracticeArea;
        $ContactId = $data['case_details']->ContactId;
        $UserId = $data['case_details']->userId;
        $FirmId = $data['case_details']->FirmId;
        $data['practice_area'] = $this->CaseModel->practiceArea($practice_area_id);
        $data['contact_Person'] = $this->CaseModel->contactPerson($ContactId);
        $data['contact_group'] = $this->CaseModel->contactgroup($FirmId);
        $data['a_User'] = $this->CaseModel->auser($UserId);
        $data['pagetitle'] = 'Case Detail';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/cases/case_details', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function allFirmOpenCases() {
        $userid = $this->session->userdata('user_id');
        $data['ALLCompany'] = $this->CaseModel->allCompany();
        $data['allContact'] = $this->CaseModel->allContact();
        $data['allAttorney'] = $this->CaseModel->allAttorney();
        $getuserinfo = $this->AccountModel->getuserinfobyuserid($userid);
        $data['ALLFopenC'] = $this->CaseModel->ALLFopenC($getuserinfo->FirmId);
        $data['all_user'] = $this->CaseModel->alluser();


        $data['allPracticeArea'] = $this->CaseModel->allPracticeArea();
        $data['pagetitle'] = 'All FIrm Open Case';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/cases/all_firm_open_cases', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function allFirmClosedCases() {
        $userid = $this->session->userdata('user_id');
        $data['ALLCompany'] = $this->CaseModel->allCompany();
        $data['allContact'] = $this->CaseModel->allContact();
        $data['allAttorney'] = $this->CaseModel->allAttorney();
        $getuserinfo = $this->AccountModel->getuserinfobyuserid($userid);
        $data['ALLFclosedC'] = $this->CaseModel->ALLFclosedC($getuserinfo->FirmId);
        $data['all_user'] = $this->CaseModel->alluser();
        $data['allPracticeArea'] = $this->CaseModel->allPracticeArea();
        $data['pagetitle'] = 'All FIrm Close Case';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/cases/all_firm_closed_cases', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function allPracticeArea() {
        $data['allpracticearea'] = $this->CaseModel->allpracticearea();
        if ($data['allpracticearea']) {
            $data['allcases'] = $this->CaseModel->allcases();
        }
        $data['pagetitle'] = 'All Practice Area';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/cases/all_practice_area', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function trydo() {
        $id = $this->input->post('name');
        $all_contact = $this->CaseModel->allContactajx($id);
        echo '<option value="">select</option>';
        foreach ($all_contact as $a_contact) {
            echo'<option value=' . "$a_contact->ContactId" . '>' . "$a_contact->FirstName" . "$a_contact->FirstName" . '</option>';
        }
    }

    public function trydocompany() {
        $id = $this->input->post('name');

        $all_company = $this->CaseModel->allCompanyajx($id);
        echo'<option value="">Select Company</option>';
        foreach ($all_company as $a_company) {
            echo'<option value=' . "$a_company->CompanyId" . '>' . "$a_company->CompanyName" . '</option>';
        }
    }

    public function AddCase() {

        $this->form_validation->set_rules('CaseNumber', 'Case Number', 'numeric');
        $this->form_validation->set_rules('CaseName', 'Case Name', 'required', array('required' => 'Please provide your Case Name!'));

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $data['userId'] = $this->session->userdata('user_id');
            $data['CaseName'] = $this->input->post('CaseName');
            $data['CaseNumber'] = $this->input->post('CaseNumber');

            $data['CaseEmail'] = $this->input->post('CaseEmail');
            $data['PracticeArea'] = $this->input->post('PracticeArea');
            $data['Description'] = $this->input->post('Description');
            $data['FirmId'] = $this->input->post('Firm');
            if ($this->input->post('newname')) {
                $stringarray = $this->input->post('newname');
                //print_r($stringarray);
                $imprate = implode("/", $stringarray);

                $data['BillingRate'] = $imprate;
            } else {
                $data['BillingRate'] = '';
            }

            $data['CompanyId'] = $this->input->post('CompanyId');
            $data['ContactId'] = $this->input->post('ContactId');
            $data['BillingContactPerson'] = $this->input->post('BillingContactId');
            $data['BillingType'] = $this->input->post('BillingType');

            $DateOpen = $this->input->post('DateOpen');
            $StatuteOfLimitations = $this->input->post('StatuteOfLimitations');
            $ReminderSOL = $this->input->post('ReminderSOL');

            $data['CreatedOn'] = date('Y-m-d H:i:s');
            $data['DateOpen'] = date("Y-m-d", strtotime($DateOpen));
            $data['StatuteOfLimitations'] = date("Y-m-d", strtotime($StatuteOfLimitations));
            $data['ReminderSOL'] = date("Y-m-d", strtotime($ReminderSOL));

            $data['caseStatus'] = 1;
            //  print_r($data); 
            $this->CaseModel->insertCase($data);
            $caseid = $this->db->insert_id();

            $logdata = array();
            $userid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            $logdata['case_id'] = $caseid;
            $logdata['user_id'] = $userid;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'case-add';
            $this->db->insert('tbl_case_log', $logdata);
            $this->session->set_flashdata('insertsuccess', 'New Case Added');
            //27
            redirect('cases/allCases');
        }
    }

    public function caseUpdate() {
        $loginId = $this->session->userdata('user_id');
        $data['checkpage'] = $this->uri->segment(1);
        $id = base64_decode($this->uri->segment(3));
        $checkexist = $this->CaseModel->foredit($id);

        if ($checkexist) {
            $checkpermited = $this->CaseModel->foredit($id);
            $data['all_practise_area'] = $this->CaseModel->allPractiseArea();
            $data['all_farm'] = $this->CaseModel->allFarm();
            $data['acase'] = $this->CaseModel->foredit($id);
            $data['all_practice_area'] = $this->CaseModel->allPracticeArea();
            $data['all_billing_type'] = $this->CaseModel->allBillingType();
            $data['all_contact'] = $this->CaseModel->allContact();

            $data['pagetitle'] = 'Edit Case';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/cases/edit_cases', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    public function AddPracticeArea() {
        $practice_area_id = $this->input->get('practice_area_id');
        $areaname = $this->CaseModel->check($practice_area_id);

        if ($areaname) {
            $insertsuccesss = 'The Practice Area Already Have!';
            echo'<span id=' . "comment3" . ' style=' . "color: red;" . '>' . "$insertsuccesss" . '</span>';
        } else {
            $data['PracticeArea'] = $this->input->get('practice_area_id');
            $this->CaseModel->AddPracticeArea($data);
            $insertsuccess = 'New Practice Area Added';
            echo'<span id=' . "comment3" . ' style=' . '"color: green;"' . '>' . "$insertsuccess" . '</span>';
        }
    }

    public function editPracticeArea() {
        $id = $this->uri->segment(3);
        $editpracticearea = $this->CaseModel->editPracticeArea($id);
        echo $editpracticearea->PracticeArea;
        echo '<label for=' . "exampleInputuname" . '>Practice Areas Name</label>' . '<span id=' . "comment11" . ' style=' . "color: red;" . '></span>' . '<input type=' . "text" . ' name=' . "practicearea1" . ' id=' . "practice_area_id1" . 'multiple class=' . "form-control" . ' value=' . "$editpracticearea->PracticeArea" . '>' . '<input type=' . "hidden" . ' name=' . "practiceid1" . ' id=' . "practice_area_id_update" . 'multiple class=' . "form-control" . ' value=' . "$editpracticearea->PracticeAreaId" . '>';
    }

    public function PractiseareaUpdate() {

        $data['PracticeArea'] = $this->input->post('practicearea1');
        $data['Practiceid'] = $this->input->post('practiceid1');
        $this->form_validation->set_rules('practicearea1', 'Practice Area', 'required', array('required' => 'Practice Area IS Required',
                )
        );
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = $this->input->post('practicearea1');
            $id = $this->input->post('practiceid1');
            $edit_practice_area = $this->CaseModel->PractiseareaUpdate($data, $id);
            $this->session->set_flashdata('updatesuccess', 'Update Case successfully');
            $this->allPracticeArea();
        }
    }

    public function validationUpdate() {
        $PracticeArea = $this->input->get('practice_area_id');
        $id = $this->input->get('practice_area_id_update');
        if ($PracticeArea) {
            $existUpdate = $this->CaseModel->existUpdate($PracticeArea, $id);
            if ($existUpdate) {
                $insertsuccesss = 'The Practice Area Already Have!';
                echo'<span id=' . "comment3" . ' style=' . "color: red;" . '>' . "$insertsuccesss" . '</span>';
            } else {
                $id = $this->input->get('practice_area_id_update');
                $data['PracticeArea'] = $this->input->get('practice_area_id');
                $this->CaseModel->UpdatePracticeArea($data, $id);
                $updatesuccess = 'Practice area successfully updated';
                echo'<span id=' . "comment3" . ' style=' . '"color: green;"' . '>' . "$updatesuccess" . '</span>';
            }
        } else {
            $require = 'The Practice Area field is required!';
            echo'<span id=' . "comment3" . ' style=' . "color: red;" . '>' . "$require" . '</span>';
        }
    }

    public function get_compnay_by_firm() {
        $data['res'] = $this->CaseModel->get_case_by_firm_id($this->input->post('firm_id'));
        echo json_encode($data);
    }

    public function get_attorny_by_firm() {
        $data['res'] = $this->CaseModel->get_attorny_by_firm($this->input->post('firm_id'));
        echo json_encode($data);
    }

    public function get_contact_by_company() {
        $data['res'] = $this->CaseModel->get_contact_by_company($this->input->post('companyid'));
        echo json_encode($data);
    }

    public function get_contact_by_contact() {
        $data['res'] = $this->CaseModel->get_contact_by_contact($this->input->post('contactid'));
        echo json_encode($data);
    }

    public function get_company_by_company() {
        $data['res'] = $this->CaseModel->get_company_by_company($this->input->post('contactid'));
        echo json_encode($data);
    }

    public function updated() {
        $CaseId = $this->input->post('CaseId');
        $CaseEmail = $this->input->post('CaseEmail');
        $checkexistEmail = $this->CaseModel->checkexistEmail($CaseEmail, $CaseId);
        if ($checkexistEmail) {
            $this->session->set_flashdata('already have', 'This Email address already have!');
            $this->caseUpdate();
        } else {
            $checkpage = $this->input->post('pagelink');
            $data['userId'] = $this->session->userdata('user_id');
            $data['CaseName'] = $this->input->post('CaseName');
            $data['CaseNumber'] = $this->input->post('CaseNumber');
            $data['CaseEmail'] = $this->input->post('CaseEmail');

            $data['PracticeArea'] = $this->input->post('PracticeArea');
            $data['Description'] = $this->input->post('Description');
            $data['FirmId'] = $this->input->post('FirmId');
            $data['AttoernyId'] = $this->input->post('AttoernyId');
            $data['CompanyId'] = $this->input->post('CompanyId');
            $data['ContactId'] = $this->input->post('ContactId');
            $data['	BillingContactPerson'] = $this->input->post('BillingContactId');
            $data['BillingType'] = $this->input->post('BillingType');
            $DateOpen = $this->input->post('DateOpen');
            $StatuteOfLimitations = $this->input->post('StatuteOfLimitations');
            $ReminderSOL = $this->input->post('ReminderSOL');
            $BillingRate = $this->input->post('BillingRate');
            $data['BillingRate'] = number_format($BillingRate, 2, '.', '');
            $data['CreatedOn'] = date('Y-m-d H:i:s');
            $data['DateOpen'] = date("Y-m-d", strtotime($DateOpen));
            $data['StatuteOfLimitations'] = date("Y-m-d", strtotime($StatuteOfLimitations));
            $data['ReminderSOL'] = date("Y-m-d", strtotime($ReminderSOL));
            if ($checkpage == 'firmclosecases') {
                $data['caseStatus'] = 0;
            } elseif ($checkpage == 'closecases') {
                $data['caseStatus'] = 0;
            } elseif ($checkpage == 'firmopencases') {
                $data['caseStatus'] = 1;
            } else {
                $data['caseStatus'] = 1;
            }

            $this->CaseModel->Updatecase($CaseId, $data);

            $caseid = $CaseId;
            //SET LOG FOR CASE UPDATE
            $logdata = array();
            $userid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            //INSERT INTO LOG TABLE
            $logdata['case_id'] = $caseid;
            $logdata['user_id'] = $userid;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'case-edit';
            $this->db->insert('tbl_case_log', $logdata);


            $this->session->set_flashdata('updatesuccess', 'Case Successfully Updated');

            if ($checkpage == 'firmclosecases') {
                redirect('cases/allFirmClosedCases');
            } elseif ($checkpage == 'closecases') {
                redirect('cases/allClosedCases');
            } elseif ($checkpage == 'firmopencases') {
                redirect('cases/allFirmOpenCases');
            } else {
                redirect('cases/allCases');
            }
        }
    }

    public function check_email() {
        $email = $this->input->post('CaseEmail');
        $checkvalue = $this->CaseModel->check_email($email);
        if ($checkvalue) {
            echo 'TRUE1';
        } else {
            echo 'FALSE1';
        }
    }

    public function checkcontact() {
        $firstname = $this->input->post('firstname');
        $lastName = $this->input->post('lastName');
        $checkvalue = $this->CaseModel->checkcontacthave($firstname, $lastName);

        if ($checkvalue) {
            echo 2;
        } else {
            echo 1;
        }
    }

    public function addcontact() {
        $id = $this->session->userdata('user_id');
        $data['UserId'] = $id;
        $data['CompanyId'] = $this->input->post('companyforcontact');
        $data['FirstName'] = $_POST['firstName'];
        $data['LastName'] = $this->input->post('lastName');
        $data['Email'] = $this->input->post('email');
        $data['ContactGroup'] = $this->input->post('GroupName');
        $data['status'] = $this->input->post('status');
        $data['FirmId'] = $this->input->post('firmid');
        //print_r($data);
        $this->CaseModel->addcontact($data);
        echo 'Contact Successfully Added';
    }

    public function companyexist() {
        $companyemail = $this->input->post('companyemail');

        $checkvalue = $this->CaseModel->checkcompanyhave($companyemail);

        if ($checkvalue) {
            echo 2;
        } else {
            echo 1;
        }
    }

    public function addcompany() {
        $data['CompanyName'] = $this->input->post('companyName');
        $data['CompanyEmail'] = $this->input->post('companyEmail');
        $data['FirmId'] = $this->input->post('FirmId');
        $this->CaseModel->addcompany($data);
        echo 'Company Successfully Added';
    }

    public function closeCase() {
        $case_id = base64_decode($this->uri->segment('2'));
        $this->db->set('caseStatus', '0');
        $this->db->where('CaseId', $case_id);
        $update = $this->db->update('tbl_case');
        if ($update) {

            //ADD CASE INTO LOG TBL

            $logdata = array();
            $userid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            $logdata['case_id'] = $case_id;
            $logdata['user_id'] = $userid;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'case-close';
            $this->db->insert('tbl_case_log', $logdata);


            $this->session->set_flashdata('success', 'Case Close Successfully');
            redirect('allCases');
        } else {
            $this->session->set_flashdata('error', 'Case Close is not Complete. Re try again');
            redirect('allCases');
        }
    }

    public function reopenCase() {
        $case_id = base64_decode($this->uri->segment('2'));
        $this->db->set('caseStatus', '1');
        $this->db->where('CaseId', $case_id);
        $update = $this->db->update('tbl_case');
        if ($update) {

            //ADD CASE INTO LOG TBL

            $logdata = array();
            $userid = $this->session->userdata('user_id');
            $getnotificationinfo = $this->SiteModel->getnotificationbyid($userid);
            $notificationtime = $getnotificationinfo->NotificationFrequency;
            $newTime = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +" . $notificationtime . "minutes"));

            $logdata['case_id'] = $case_id;
            $logdata['user_id'] = $userid;
            $logdata['date'] = date('Y-m-d H:i:s');
            $logdata['notification_time'] = $newTime;

            $logdata['notification_status'] = '0';
            $logdata['type'] = 'case-reopen';
            $this->db->insert('tbl_case_log', $logdata);


            $this->session->set_flashdata('success', 'Case Reopen Successfully');
            redirect('allCases');
        } else {
            $this->session->set_flashdata('error', 'Case Reopen is not Complete. Re try again');
            redirect('allCases');
        }
    }

    public function opencasePdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['allcases'] = $this->CaseModel->allOpenCases($userId);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/case_pdf', $data, TRUE);
            $name = "OpenCase.pdf";
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

    public function closecasePdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['allcases'] = $this->CaseModel->allClosedCases($userId);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/case_pdf', $data, TRUE);
            $name = "Case.pdf";
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

    public function firmopencasePdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $getuserinfo = $this->AccountModel->getuserinfobyuserid($userId);
            $data['allcases'] = $this->CaseModel->ALLFopenC($getuserinfo->FirmId);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/case_pdf', $data, TRUE);
            $name = "Case.pdf";
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

    public function firmclosecasePdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $getuserinfo = $this->AccountModel->getuserinfobyuserid($userId);
            $data['allcases'] = $this->CaseModel->ALLFclosedC($getuserinfo->FirmId);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/case_pdf', $data, TRUE);
            $name = "Case.pdf";
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

    public function practiceAreapdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['allpracticearea'] = $this->CaseModel->allpracticearea();
            // print_r($data['allpracticearea']);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/practiseArea_pdf', $data, TRUE);
            $name = "PractiseArea.pdf";
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

    public function opencaseexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "OpenCase.csv";
        $userid = $_SESSION['user_id'];
        $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea WHERE tbl_case.caseStatus ='1' AND tbl_case.userId = '" . $userid . "'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function closecaseexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Case.csv";
        $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_attorney.FirstName as Attorney, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_attorney ON tbl_attorney.AttorneyId=tbl_case.AttoernyId INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea WHERE caseStatus ='0'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function firmopencaseexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Case.csv";
        $userId = $_SESSION['user_id'];
        $getuserinfo = $this->AccountModel->getuserinfobyuserid($userId);
        $firmid = $getuserinfo->FirmId;
        $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description FROM tbl_case WHERE caseStatus ='1' AND FirmId = '" . $firmid . "'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function firmclosecaseexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Case.csv";
        $userId = $_SESSION['user_id'];
        $getuserinfo = $this->AccountModel->getuserinfobyuserid($userId);
        $firmid = $getuserinfo->FirmId;
        $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description FROM tbl_case WHERE caseStatus ='0' AND FirmId = '" . $firmid . "'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function practiceAreaexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "PractiseArea.csv";
        $query = "SELECT * FROM tbl_practice_area";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function searchmycases() {
        $userid = $_SESSION['user_id'];
        $caseinfo = $this->CaseModel->allOpenCases($userid);

        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case->userId);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case->CreatedOn);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case->AttoernyId);
                $getpracticearea = $this->CaseModel->practiceArea($case->PracticeArea);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case->CompanyId);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case->ContactId);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case->CaseId) . "'>" . $case->CaseName . "</a></td>";
                $html .= "<td>" . $case->CaseNumber . "</td>";
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case->CompanyId . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case->ContactId) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case->userId . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case->CaseId) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case->CaseId) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function searchmyfirmcases() {
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myallFirmCases($userid, $FirmId);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        //echo $html; exit;
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    public function searchopencases(){
        $userid = $_SESSION['user_id'];
        $caseinfo = $this->CaseModel->myallopenCases($userid);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    public function searchclosecases(){
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myallcloseCases($userid);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                 if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                 } else {
                      $html .= "<td><p>Not Set</p></td>";
                 }
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    public function searchcasesbypracticearea(){
        $PracticeAreaId = $this->input->post('PracticeAreaId');
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myCasesWithPArea($userid,$PracticeAreaId);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                 if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                 } else {
                      $html .= "<td><p>Not Set</p></td>";
                 }
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    ///////////////////////////////
    
    
     public function searchmycasesClose() {
        $userid = $_SESSION['user_id'];
        $caseinfo = $this->CaseModel->allOpenCasesClose($userid);

        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case->userId);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case->CreatedOn);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case->AttoernyId);
                $getpracticearea = $this->CaseModel->practiceArea($case->PracticeArea);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case->CompanyId);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case->ContactId);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case->CaseId) . "'>" . $case->CaseName . "</a></td>";
                $html .= "<td>" . $case->CaseNumber . "</td>";
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case->CompanyId . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case->ContactId) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case->userId . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case->CaseId) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case->CaseId) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function searchmyfirmcasesClose() {
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myallFirmCasesClose($userid, $FirmId);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        //echo $html; exit;
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    public function searchopencasesClose(){
        $userid = $_SESSION['user_id'];
        $caseinfo = $this->CaseModel->myallopenCases($userid);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    public function searchclosecasesClose(){
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myallcloseCases($userid);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                 if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                 } else {
                      $html .= "<td><p>Not Set</p></td>";
                 }
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    public function searchcasesbypracticeareaClose(){
        $PracticeAreaId = $this->input->post('PracticeAreaId');
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myCasesWithPAreaClose($userid,$PracticeAreaId);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                 if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                 } else {
                      $html .= "<td><p>Not Set</p></td>";
                 }
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    ///////////////////////////FIRM OPEN///////////////////
   

    public function searchmyfirmopencases() {
        $userid = $_SESSION['user_id'];
        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
        $FirmId = $getuserinfo->FirmId;
        $caseinfo = $this->CaseModel->myallFirmCases($userid, $FirmId);
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($caseinfo)) {
            $i = 1;
            foreach ($caseinfo as $case) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($case['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);

                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
                $html .= "<td>" . $case['CaseNumber'] . "</td>";
                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
                } else {
                    $html .= "<td><p>Not Set</p></td>";
                }

                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        //echo $html; exit;
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }
    
    
//    public function searchopencasesClose(){
//        $userid = $_SESSION['user_id'];
//        $caseinfo = $this->CaseModel->myallopenCases($userid);
//        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
//        if (!empty($caseinfo)) {
//            $i = 1;
//            foreach ($caseinfo as $case) {
//                $baseUrl = base_url();
//                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
//                $addedby = $userinfo->fullname;
//                $timestamp = strtotime($case['CreatedOn']);
//                $condate = date("jS F Y", $timestamp);
//                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
//                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
//                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
//                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);
//
//                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
//                $html .= "<td>" . $case['CaseNumber'] . "</td>";
//                if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
//                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
//                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
//                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
//                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
//                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
//                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
//
//                $html .= "</tr>";
//            }
//        } else {
//            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
//        }
//        $html .= "</tbody></table>";
//        $json = array();
//        $json['casediv'] = $html;
//        echo json_encode($json);
//    }
//    
//    public function searchclosecasesClose(){
//        $userid = $_SESSION['user_id'];
//        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
//        $FirmId = $getuserinfo->FirmId;
//        $caseinfo = $this->CaseModel->myallcloseCases($userid);
//        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
//        if (!empty($caseinfo)) {
//            $i = 1;
//            foreach ($caseinfo as $case) {
//                $baseUrl = base_url();
//                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
//                $addedby = $userinfo->fullname;
//                $timestamp = strtotime($case['CreatedOn']);
//                $condate = date("jS F Y", $timestamp);
//                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
//                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
//                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
//                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);
//
//                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
//                $html .= "<td>" . $case['CaseNumber'] . "</td>";
//                 if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
//                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
//                 } else {
//                      $html .= "<td><p>Not Set</p></td>";
//                 }
//                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
//                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
//                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
//                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
//                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
//                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
//
//                $html .= "</tr>";
//            }
//        } else {
//            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
//        }
//        $html .= "</tbody></table>";
//        $json = array();
//        $json['casediv'] = $html;
//        echo json_encode($json);
//    }
//    
//    public function searchcasesbypracticeareaClose(){
//        $PracticeAreaId = $this->input->post('PracticeAreaId');
//        $userid = $_SESSION['user_id'];
//        $getuserinfo = $this->CaseModel->getindividualfirm($userid);
//        $FirmId = $getuserinfo->FirmId;
//        $caseinfo = $this->CaseModel->myCasesWithPAreaClose($userid,$PracticeAreaId);
//        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Case</th><th>Case Number</th><th>Practice Area</th><th>Company</th><th>Contact</th><th>Attorney</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
//        if (!empty($caseinfo)) {
//            $i = 1;
//            foreach ($caseinfo as $case) {
//                $baseUrl = base_url();
//                $userinfo = $this->ContactModel->userinfobyid($case['userId']);
//                $addedby = $userinfo->fullname;
//                $timestamp = strtotime($case['CreatedOn']);
//                $condate = date("jS F Y", $timestamp);
//                $getattorneyinfo = $this->CaseModel->getsingleattorneybyid($case['AttoernyId']);
//                $getpracticearea = $this->CaseModel->practiceArea($case['PracticeArea']);
//                $getcompanyinfo = $this->CaseModel->getsinglecompanybyid($case['CompanyId']);
//                $getcontactinfo = $this->CaseModel->getsinglecontactbyid($case['ContactId']);
//
//                $html .= "<tr><td>" . $i++ . "</td><td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "'>" . $case['CaseName'] . "</a></td>";
//                $html .= "<td>" . $case['CaseNumber'] . "</td>";
//                 if(isset($getpracticearea->PracticeArea) && $getpracticearea->PracticeArea !='') {
//                $html .= "<td>" . $getpracticearea->PracticeArea . "</td>";
//                 } else {
//                      $html .= "<td><p>Not Set</p></td>";
//                 }
//                if (isset($getcompanyinfo->CompanyName) && $getcompanyinfo->CompanyName != '') {
//                    $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $case['CompanyId'] . "'>" . $getcompanyinfo->CompanyName . "</a></td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                if (isset($getcontactinfo->FirstName) && $getcontactinfo->FirstName != '') {
//                    $html .= "<td><a href='" . $baseUrl . "company/contactDetails/" . base64_encode($case['ContactId']) . "'>" . $getcontactinfo->FirstName . $getcontactinfo->LastName . "</a></td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                if (isset($getattorneyinfo->fullname) && $getattorneyinfo->fullname != '') {
//                    $html .= "<td>" . $getattorneyinfo->fullname . "</td>";
//                } else {
//                    $html .= "<td><p>Not Set</p></td>";
//                }
//
//                $html .= "<td><p>Added On " . $condate . "by <a href='" . $baseUrl . "edituserprofile/" . $case['userId'] . "'>" . $addedby . "</a></p></td>";
//                $html .= "<td><a href='" . $baseUrl . "cases/viewCase/" . base64_encode($case['CaseId']) . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
//                $html .= "<a href='" . $baseUrl . "cases/update/" . base64_encode($case['CaseId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
//
//                $html .= "</tr>";
//            }
//        } else {
//            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
//        }
//        $html .= "</tbody></table>";
//        $json = array();
//        $json['casediv'] = $html;
//        echo json_encode($json);
//    }
}
