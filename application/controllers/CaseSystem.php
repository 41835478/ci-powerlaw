<?php

class CaseSystem extends CI_Controller {

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
        $this->load->model('CaseSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function viewallcases() {
        $data['allcaseinfo'] = $this->CaseSystemModel->getallcaseinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/staffheader');
        $this->load->view('powerlawadmin/staff/case/allcases', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewcase() {
        $case_id = $this->uri->segment('2');
        $data['caseinfo'] = $this->CaseSystemModel->caseinfobyid($case_id);
        $practice_id = $data['caseinfo']->PracticeArea;
        $data['practiceareainfo'] = $this->CaseSystemModel->getpracticearea($practice_id);
        $data['practicearea'] = $data['practiceareainfo']->PracticeArea;
        //for attorney
        if ($data['caseinfo']->AttoernyId != '') {
            $attoerny_id = $data['caseinfo']->AttoernyId;
            $data['attoernyinfo'] = $this->CaseSystemModel->getattoernyinfo($attoerny_id);
            $data['attoerny'] = $data['attoernyinfo']->FirstName;
        }

        //for contact client
        if ($data['caseinfo']->ContactId != '') {
            $contact_id = $data['caseinfo']->ContactId;
            $data['contactinfo'] = $this->CaseSystemModel->getcontactinfo($contact_id);
            $data['contact'] = $data['contactinfo']->FirstName;
            $data['contactuserid'] = $data['contactinfo']->UserId;
        }
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/staffheader');
        $this->load->view('powerlawadmin/staff/case/casesview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewallcasesadmin() {
        $data['allcaseinfo'] = $this->CaseSystemModel->getallcaseinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/allcases', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewcaseadmin() {
        $case_id = $this->uri->segment('2');
        $data['caseinfo'] = $this->CaseSystemModel->caseinfobyid($case_id);
        $practice_id = $data['caseinfo']->PracticeArea;
        $data['practiceareainfo'] = $this->CaseSystemModel->getpracticearea($practice_id);
        $data['practicearea'] = $data['practiceareainfo']->PracticeArea;
        //for attorney
        if ($data['caseinfo']->AttoernyId != '') {
            $attoerny_id = $data['caseinfo']->AttoernyId;
            $data['attoernyinfo'] = $this->CaseSystemModel->getattoernyinfo($attoerny_id);
            $data['attoerny'] = $data['attoernyinfo']->FirstName;
        }

        //for contact client
        if ($data['caseinfo']->ContactId != '') {
            $contact_id = $data['caseinfo']->ContactId;
            $data['contactinfo'] = $this->CaseSystemModel->getcontactinfo($contact_id);
            $data['contact'] = $data['contactinfo']->FirstName;
            $data['contactuserid'] = $data['contactinfo']->UserId;
        }
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/casesview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function casepdfreportgenerate() {
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('admin');
        } else {
            $data['allcaseinfo'] = $this->CaseSystemModel->getallcaseinfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/case_pdf', $data, TRUE);
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

    public function caseexlreportgenerate() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Case.csv";
        $query = "SELECT tbl_case.CaseName, tbl_case.CaseNumber, tbl_case.Description, tbl_attorney.FirstName as Attorney, tbl_contact.FirstName as Contact, tbl_practice_area.PracticeArea FROM tbl_case INNER JOIN tbl_attorney ON tbl_attorney.AttorneyId=tbl_case.AttoernyId INNER JOIN tbl_contact ON tbl_contact.ContactId=tbl_case.ContactId INNER JOIN tbl_practice_area ON tbl_practice_area.PracticeAreaId=tbl_case.PracticeArea";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function viewallopencasesadmin() {
        $data['allopencaseinfo'] = $this->CaseSystemModel->getallopencaseinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/allopencases', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewallclosecasesadmin() {
        $data['allclosecaseinfo'] = $this->CaseSystemModel->getallclosecaseinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/allclosecases', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function editcase() {
        $case_id = $this->uri->segment('2');
        $data['alleditcaseinfo'] = $this->CaseSystemModel->caseinfobyid($case_id);
        $data['allpracticearea'] = $this->CaseSystemModel->getallpracticearea();
        //echo '<pre>'; print_r($data['allclosecaseinfo']);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/editcases', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewCase() {
        $data['allpracticearea'] = $this->CaseSystemModel->getallpracticearea();
        $data['allfirm'] = $this->CaseSystemModel->getallfirm();
        $data['allbillingtype'] = $this->CaseSystemModel->getallbillingtype();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/addnewcase', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function submitcase() {
        $this->form_validation->set_rules('CaseName', 'Case Name', 'required');
        $this->form_validation->set_rules('CaseNumber', 'Case Number', 'required');
        $this->form_validation->set_rules('CaseEmail', 'Case Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewCase');
        } else {
            $data = array();
            $data1 = array();
            $nowdate = date('Y-m-d h:m:s');
            if ($this->input->post('StatuteOfLimitations') != '') {
                $ReminderSOL = '1';
            } else {
                $ReminderSOL = '0';
            }

            $data['CaseName'] = $this->input->post('CaseName');
            $data['CaseNumber'] = $this->input->post('CaseNumber');
            $data['CaseEmail'] = $this->input->post('CaseEmail');
            $data['DateOpen'] = date("Y-m-d", strtotime($_POST['DateOpen']));
            $data['PracticeArea'] = $this->input->post('PracticeArea');
            $data['Description'] = $this->input->post('Description');
            $data['StatuteOfLimitations'] = date("Y-m-d", strtotime($_POST['StatuteOfLimitations']));
            $data['ReminderSOL'] = $ReminderSOL;
            $data['FirmId'] = $this->input->post('FirmId');
            $data['AttoernyId'] = $this->input->post('AttoernyId');
            $data['CompanyId'] = $this->input->post('CompanyId');
            $data['ContactId'] = $this->input->post('ContactId');
            $data['BillingContactPerson'] = $this->input->post('BillingContactPerson');
            $data['CreatedOn'] = $nowdate;
            $data['BillingRate'] = $this->input->post('BillingRate');
            $data['BillingType'] = $this->input->post('BillingType');
            $data['userId'] = $_SESSION['admin_id'];
            $data['caseStatus'] = '1';

            $this->db->insert('tbl_case', $data);
            $case_id = $this->db->insert_id();

            if ($this->input->post('remainder_type') != '') {
                foreach ($this->input->post('remainder_type') as $key => $row) {
                    $this->db->set('remainder_for', 'case');
                    $this->db->set('remainder_for_id', $case_id);
                    $this->db->set('remainder_type', $this->input->post('remainder_type')[$key]);
                    $this->db->set('remainder_duration', $this->input->post('remainder_duration')[$key]);
                    $this->db->set('remainder_duration_type', $this->input->post('remainder_duration_type')[$key]);
                    $this->db->set('created_date', $nowdate);
                    $this->db->set('created_by', $_SESSION['admin_id']);
                    $this->db->insert('tbl_remainder');
                    $remainder_id = $this->db->insert_id();
                }

                if ($remainder_id) {
                    $this->session->set_flashdata('success', 'Case Inserted Successfully');
                    redirect('viewallcasesadmin');
                } else {
                    $this->session->set_flashdata('error', 'Case Insert is not Complete. Re try again');
                    redirect('addNewCase');
                }
            }
            $this->session->set_flashdata('success', 'Case Inserted Successfully');
            redirect('viewallcasesadmin');
        }
    }

    public function updatecase() {
        $case_id = $this->uri->segment('2');
        $this->form_validation->set_rules('CaseName', 'Case Name', 'required');
        $this->form_validation->set_rules('CaseNumber', 'Case Number', 'required');
        $this->form_validation->set_rules('CaseEmail', 'Case Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('editcase/' . $case_id);
        } else {
            $data = array();
            $data1 = array();
            $nowdate = date('Y-m-d h:m:s');
            if ($this->input->post('StatuteOfLimitations') != '') {
                $ReminderSOL = '1';
            } else {
                $ReminderSOL = '0';
            }

            $this->db->set('CaseName', $this->input->post('CaseName'));
            $this->db->set('CaseNumber', $this->input->post('CaseNumber'));
            $this->db->set('CaseEmail', $this->input->post('CaseEmail'));
            $this->db->set('DateOpen', date("Y-m-d", strtotime($_POST['DateOpen'])));
            $this->db->set('PracticeArea', $this->input->post('PracticeArea'));
            $this->db->set('Description', $this->input->post('Description'));
            $this->db->set('StatuteOfLimitations', date("Y-m-d", strtotime($_POST['StatuteOfLimitations'])));
            $this->db->set('ReminderSOL', $ReminderSOL);
            $this->db->where('CaseId', $case_id);
            $update = $this->db->update('tbl_case');
            if ($this->input->post('remainder_type') != '') {
                foreach ($this->input->post('remainder_type') as $key => $row) {
                    $this->db->set('remainder_for', 'case');
                    $this->db->set('remainder_for_id', $case_id);
                    $this->db->set('remainder_type', $this->input->post('remainder_type')[$key]);
                    $this->db->set('remainder_duration', $this->input->post('remainder_duration')[$key]);
                    $this->db->set('remainder_duration_type', $this->input->post('remainder_duration_type')[$key]);
                    $this->db->set('created_date', $nowdate);
                    $this->db->set('created_by', $_SESSION['admin_id']);
                    $this->db->where('remainder_for_id', $case_id);
                    $update = $this->db->update('tbl_remainder');
                }

                if ($update) {
                    $this->session->set_flashdata('success', 'Case Update Successfully');
                    redirect('viewallcasesadmin');
                } else {
                    $this->session->set_flashdata('error', 'Case Update is not Complete. Re try again');
                    redirect('editcase/' . $case_id);
                }
            }
            $this->session->set_flashdata('success', 'Case Update Successfully');
            redirect('viewallcasesadmin');
        }
    }

    public function deletecase() {
        $case_id = $this->uri->segment('2');
        $delete = $this->CaseSystemModel->deletecasebyid($case_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Case Delete Successfully');
            redirect('viewallcasesadmin');
        } else {
            $this->session->set_flashdata('error', 'Case Delete is not Complete. Re try again');
            redirect('viewallcasesadmin');
        }
    }

    public function archivecase() {
        $case_id = $this->uri->segment('2');
        $archive = $this->CaseSystemModel->archivecasebyid($case_id);
        if ($archive == 1) {
            $this->session->set_flashdata('success', 'Case Close Successfully');
            redirect('viewallcasesadmin');
        } else {
            $this->session->set_flashdata('error', 'Case Close is not Complete. Re try again');
            redirect('viewallcasesadmin');
        }
    }

    public function showcasesummery() {
        $data['showcaseinfo'] = $_POST;
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/showcasesummery', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function getalldatabyfirmid() {
        $firmid = $_POST['firmid'];
        $companyinfo = $this->CaseSystemModel->getcompanybyfirmid($firmid);
        $html = "<label class='control-label' for='cases-companyid'>Company ID</label>";
        $html .= "<select class='form-control' id='sel1' name='CompanyId'>";
        if (!empty($companyinfo)) {
            $html .="<option value=''>Select Company</option>";
            foreach ($companyinfo as $company) {
                $html .="<option value='" . $company['CompanyId'] . "'>" . $company['CompanyName'] . "</option>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .="<option value=''><p style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</p></option>";
        }
        $html .="</select>";
        //ATTORNY

        $attornyinfo = $this->CaseSystemModel->getattornybyfirmid($firmid);
        $attornehtml = "<label class='control-label' for='cases-companyid'>Attorney ID</label>";
        $attornehtml .= "<select class='form-control' id='sel1' name='AttoernyId'>";
        if (!empty($attornyinfo)) {
            $attornehtml .="<option value=''>Select Company</option>";
            foreach ($attornyinfo as $attor) {
                $attornehtml .="<option value='" . $attor['AttorneyId'] . "'>" . $attor['FirstName'] . '' . $attor['LastName'] . "</option>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $attornehtml .="<option value=''><p style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</p></option>";
        }
        $attornehtml .="</select>";


        //CONTACT LIST
        $contactinfo = $this->CaseSystemModel->getcontactbyfirmid($firmid);
        $contacthtml = "<label class='control-label' for='cases-companyid'>Contact ID</label>";
        $contacthtml .= "<select class='form-control' id='sel1' name='ContactId'>";
        if (!empty($contactinfo)) {
            $contacthtml .="<option value=''>Select Contact</option>";
            foreach ($contactinfo as $contact) {
                $contacthtml .="<option value='" . $contact['ContactId'] . "'>" . $contact['FirstName'] . '' . $contact['LastName'] . "</option>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $contacthtml .="<option value=''><p style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</p></option>";
        }
        $contacthtml .="</select>";

        //BILLING LIST

        $billingcontactinfo = $this->CaseSystemModel->getcontactbyfirmid($firmid);
        $billinghtml = "<label class='control-label' for='cases-companyid'>Billing Contact Person </label>";
        $billinghtml .= "<select class='form-control' id='sel1' name='BillingContactPerson'>";
        if (!empty($contactinfo)) {
            $billinghtml .="<option value=''>Select BIlling Contact</option>";
            foreach ($contactinfo as $contact) {
                $billinghtml .="<option value='" . $contact['ContactId'] . "'>" . $contact['FirstName'] . '' . $contact['LastName'] . "</option>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $billinghtml .="<option value=''><p style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</p></option>";
        }
        $billinghtml .="</select>";


        $json = array();
        $json['companydiv'] = $html;
        $json['attornydiv'] = $attornehtml;
        $json['contactdiv'] = $contacthtml;
        $json['billingcontactdiv'] = $billinghtml;
        echo json_encode($json);
    }

    public function allpracticearea() {
        $data['allpracticeareainfo'] = $this->CaseSystemModel->getallpracticeareainfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/viewpracticearea', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewPracticeArea() {
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/addpracticearea');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createpracticearea() {
        $this->form_validation->set_rules('PracticeArea', 'Practice Area', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('addNewPracticeArea');
        } else {
            $data = array();
            $data['PracticeArea'] = $this->input->post('PracticeArea');
            $data['DefinedBy'] = 'System';
            $this->db->insert('tbl_practice_area', $data);
            $PracticeAreaId = $this->db->insert_id();
            if ($PracticeAreaId) {
                $this->session->set_flashdata('success', 'Practice Area Inserted Successfully');
                redirect('practicearea');
            } else {
                $this->session->set_flashdata('error', 'Practice Area Insert is not Complete. Re try again');
                redirect('addNewPracticeArea');
            }
        }
        $this->session->set_flashdata('success', 'Practice Area Inserted Successfully');
        redirect('practicearea');
    }

    public function editpracticearea() {
        $practicearea_id = $this->uri->segment('2');
        $data['practicearea'] = $this->CaseSystemModel->getpracticeareabyid($practicearea_id);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/case/editpracticearea', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updatepracticearea() {
        $practicearea_id = $this->uri->segment('2');
        $this->form_validation->set_rules('PracticeArea', 'Practice Area', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('editpracticearea/' . $practicearea_id);
        } else {
            $data['PracticeArea'] = $this->input->post('PracticeArea');
            $update = $this->CaseSystemModel->updatepracticeareabyid($data, $practicearea_id);
            if ($update) {
                $this->session->set_flashdata('success', 'Practice Area Update Successfully');
                redirect('practicearea');
            } else {
                $this->session->set_flashdata('error', 'Practice Area Update is not Complete. Re try again');
                redirect('editpracticearea/' . $practicearea_id);
            }
        }
        $this->session->set_flashdata('success', 'Practice Area Update Successfully');
        redirect('practicearea');
    }

    public function deletepractice() {
        $practicearea_id = $this->uri->segment('2');
        $delete = $this->CaseSystemModel->deletepracticeareabyid($practicearea_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Practice Area Delete Successfully');
            redirect('practicearea');
        } else {
            $this->session->set_flashdata('error', 'Practice Area Delete is not Complete. Re try again');
            redirect('practicearea');
        }
    }

}
