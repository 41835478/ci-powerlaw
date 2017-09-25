<?php

class Company extends CI_Controller {

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
        $this->load->model('CompanyModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('SiteModel');
        $this->load->model('ContactModel');
    }

    public function index() {
        $login_id = $this->session->userdata('user_id');
        $data['all_user'] = $this->CompanyModel->allUser();
        $data['all_cases'] = $this->CompanyModel->allCases($login_id);
        $data['all_contact'] = $this->CompanyModel->linkedContacts();
       //echo '<pre>';  print_r($data['all_contact']); 
        $data['all_group'] = $this->CompanyModel->all_group();
        $data['all_company'] = $this->CompanyModel->allCompanyforuser($login_id);

        $data['pagetitle'] = 'All Company';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/company/all_company', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function addCompany() {
        $data['pagetitle'] = 'Add Company';
        $data['allcountry'] = $this->CompanyModel->getallcountry();
        $data['allstate'] = $this->CompanyModel->getallstate();
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/company/add_company');
        $this->load->view('admin_template/footerlink');
    }

    public function add() {
        $this->form_validation->set_rules('CompanyName', 'Company Name', 'required|is_unique[tbl_company.CompanyName]', array('required' => 'Please provide your Company Name',
            'is_unique' => 'This Company already registred'
                )
        );



        if ($this->form_validation->run() == FALSE) {
            $this->addCompany();
        } else {
            $loginid = $this->session->userdata('user_id');
            $firmid = $this->CompanyModel->firmid($loginid);
            if ($firmid) {
                $data['FirmId'] = $firmid->FirmId;
            } else {
                $data['FirmId'] = 0;
            }
//$data['CreatedBy'] = $loginid;
            $data['CreatedBy'] = $loginid;
            $data['CompanyName'] = $this->input->post('CompanyName');
            $data['CompanyEmail'] = $this->input->post('CompanyEmail');
            $data['website'] = $this->input->post('website');
            $data['mobile'] = $this->input->post('mobile');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');
            $data['city'] = $this->input->post('city');
            $data['state'] = $this->input->post('state');
            $data['country'] = $this->input->post('country');
            $data['zip'] = $this->input->post('zip');
            $data['note'] = $this->input->post('note');
            $data['status'] = '1';
            $company_id = $this->CompanyModel->addCompany($data);

//INSERT INTO TRUST ACCOUNT
            $depositon = strtotime(date('Y-m-d'));
            $trust = array();
            $trust['company_id'] = $company_id;
            $trust['firm_id'] = $firmid->FirmId;
            $trust['payment_method'] = 2;
            $trust['amount'] = 0;
            $trust['deposit_on'] = $depositon;
            $trust['deposit_by'] = $loginid;

            $this->db->insert('tbl_trust_account', $trust);
            $this->session->set_flashdata('insertsuccess', 'New Company Successfully Added');
            redirect(base_url() . 'company');
        }
    }

    public function contactDetails() {
        $id = base64_decode($this->uri->segment(3));
        $checkexisturl = $this->CompanyModel->checkexisturl($id);
        if ($checkexisturl) {

            $loginid = $this->session->userdata('user_id');
            if ($loginid == $checkexisturl->UserId) {
// in complete $loggedUserInfo=$this->CompanyModel->loggedUserInfo($loginid);
                $data['createdBy'] = $this->CompanyModel->allUser();
                $data['contactInfo'] = $this->CompanyModel->contactInfo($id);
                $company_id = $data['contactInfo']->CompanyId;
                $group_id = $data['contactInfo']->ContactGroup;
                $data['company'] = $this->CompanyModel->selectCompany($company_id);
                $data['group'] = $this->CompanyModel->selectGroup($group_id);
                $data['allCase'] = $this->CompanyModel->allCase($id);
                $data['trustaccountinfo'] = $this->CompanyModel->getcontacttrustinfo($id);
                $data['pagetitle'] = 'Contact Details';
                $this->load->view('admin_template/headerlink', $data);
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/company/contact_details', $data);
                $this->load->view('admin_template/footerlink');
            } else {
                $this->load->view('error/clean404/errorindex');
            }
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    public function delete() {
        $id = base64_decode($this->uri->segment(3));
        $delete = $this->CompanyModel->delete($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Company Delete Successfully');
            redirect('company');
        } else {
            $this->session->set_flashdata('error', 'Company Delete is not Complete. Re try again');
            redirect('company');
        }
    }

    public function updateForm() {

        $id = base64_decode($this->uri->segment(3));
        $checkurl = $this->CompanyModel->all_info_for_update($id);
        if ($checkurl) {
            if ($checkurl->CreatedBy == $this->session->userdata('user_id')) {
                $data['allcountry'] = $this->CompanyModel->getallcountry();
                $data['allstate'] = $this->CompanyModel->getallstate();
                $data['all_info_for_update'] = $this->CompanyModel->all_info_for_update($id);
//echo '<pre>'; print_r($data['all_info_for_update']); exit;
                $data['pagetitle'] = 'Edit Company';
                $this->load->view('admin_template/headerlink', $data);
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/company/update_company', $data);
                $this->load->view('admin_template/footerlink');
            } else {
                $this->load->view('error/clean404/errorindex');
            }
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    public function updated() {
        $this->form_validation->set_rules('CompanyName', 'Company Name', 'required', array('required' => 'Please provide your Company Name'
                )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->updateForm();
        } else {
            $loginid = $this->session->userdata('user_id');
            $data['CreatedBy'] = $loginid;
            $id = $this->uri->segment(3);
            $this->db->set('CompanyName', $this->input->post('CompanyName'));
            $this->db->set('CompanyEmail', $this->input->post('CompanyEmail'));
            $this->db->set('website', $this->input->post('website'));
            $this->db->set('mobile', $this->input->post('mobile'));
            $this->db->set('phone', $this->input->post('phone'));
            $this->db->set('address', $this->input->post('address'));
            $this->db->set('city', $this->input->post('city'));
            $this->db->set('state', $this->input->post('state'));
            $this->db->set('country', $this->input->post('country'));
            $this->db->set('zip', $this->input->post('zip'));
            $this->db->set('note', $this->input->post('note'));

            $this->db->where('CompanyId', $id);
            $update = $this->db->update('tbl_company');

            if ($update) {
                $this->session->set_flashdata('success', 'Company Update Successfully');
                redirect('company');
            } else {
                $this->session->set_flashdata('error', 'Company Update is not Complete. Re try again');
                redirect('company');
            }
        }
    }

    public function companyDetails() {
        $id = $this->uri->segment(3);
        $loginid = $this->session->userdata('user_id');
// in complete $loggedUserInfo=$this->CompanyModel->loggedUserInfo($loginid);
//$data['companyInfo']=$this->CompanyModel->companyInfo($id);
// $group_id=$data['contactInfo']->ContactGroup;
        $data['company'] = $this->CompanyModel->selectCompany($id);
        $data['contactinfo'] = $this->CompanyModel->selectcontactbyid($id);
        $data['caseinfo'] = $this->CompanyModel->selectcasebyid($id);
        $data['noteinfo'] = $this->CompanyModel->getcompanynoteinfo($id);
        $data['invoiceinfo'] = $this->CompanyModel->getcompanyinvoiceinfo($id);
        $data['turstaccountinfo'] = $this->CompanyModel->getturstaccountinfo($id);
        $data['paymentmethodinfo'] = $this->CompanyModel->getpaymentmethodinfo();
//echo '<pre>'; print_r($data['turstaccountinfo']); exit;
        $data['pagetitle'] = 'Company Details';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/company/company_details', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function caseLink() {
        $id = $this->uri->segment(3);
        $loginid = $this->session->userdata('user_id');
// in complete $loggedUserInfo=$this->CompanyModel->loggedUserInfo($loginid);
        $data['createdBy'] = $this->CompanyModel->allUser();

        $data['contactInfo'] = $this->CompanyModel->contactInfo($id);
        $company_id = $data['contactInfo']->CompanyId;
        $group_id = $data['contactInfo']->ContactGroup;
        $data['company'] = $this->CompanyModel->selectCompany($company_id);

        $data['group'] = $this->CompanyModel->selectGroup($group_id);

        $data['allCase'] = $this->CompanyModel->allCase($id);

        $data['pagetitle'] = 'Case Link';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/company/link_details', $data);
        $this->load->view('admin_template/footerlink');
    }
    
    public function contactcaseLink(){
        $id = $this->uri->segment(3);
        $loginid = $this->session->userdata('user_id');
        $data['createdBy'] = $this->CompanyModel->allUser();
        $data['contactInfo'] = $this->CompanyModel->contactInfo($id);
        $company_id = $data['contactInfo']->CompanyId;
        $group_id = $data['contactInfo']->ContactGroup;
        $data['company'] = $this->CompanyModel->selectCompany($company_id);
        $data['group'] = $this->CompanyModel->selectGroup($group_id);
        $data['allCase'] = $this->CompanyModel->allContactCase($id);
        $data['trustaccountinfo'] = $this->CompanyModel->getcontacttrustinfo($id);
        $data['pagetitle'] = 'Case Link';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/company/link_details', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function removecaseLink() {
        $this->load->model('ContactModel');
        $userid = $this->uri->segment(2);
        $id = $this->uri->segment(4);
        $this->ContactModel->removecaseLink($id);
        redirect(base_url() . 'users/caseLink/' . $userid);
    }

    public function rateUpdate() {
        $this->load->model('ContactModel');
        $data['BillingRate'] = $this->input->post('rate');
        $CaseId = $this->input->post('id');
        $userid = $this->input->post('userid');
        $this->ContactModel->updaterate($data, $CaseId);
        redirect(base_url() . 'users/caseLink/' . $userid);
    }

    public function rateUpdatecase() {
        $this->load->model('ContactModel');
        $id = $this->input->post('popid');
        $data['BillingRate'] = $this->input->post('caserate');
        if (!$data['BillingRate']) {
            $data['BillingRate'] = 0;
        }
        $userid = $this->input->post('userid');
// print_r($data); die();
        $this->ContactModel->updaterate($data, $id);
        redirect(base_url() . 'company/caseLink/' . $userid);
    }

    public function companypdf() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id) || $user_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['allcompanyinfo'] = $this->CompanyModel->allCompanyforuser($user_id);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/company_pdf', $data, TRUE);
            $name = "Company.pdf";
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

    public function companyexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Company.csv";
        $userid = $_SESSION['user_id'];
        $query = "SELECT tbl_company.*, tbl_firm.FirmName FROM tbl_company INNER JOIN tbl_firm ON tbl_firm.FirmId = tbl_company.FirmId WHERE tbl_company.CreatedBy = '" . $userid . "'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function getactivecompany() {
        $userid = $_SESSION['user_id'];
        $companyinfo = $this->CompanyModel->getallactivecompanyforsearch($userid);
        $allcontact = $this->CompanyModel->linkedContacts();
        $allcases = $this->CompanyModel->allCases($userid);
        foreach ($allcases as $aCase) {
            $caselink[] = $aCase->ContactId;
        }
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Company Name</th><th>Link Cases</th><th>Linked Contacts</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($companyinfo)) {
            foreach ($companyinfo as $company) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($company['CreatedBy']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($company['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $html .= "<tr><td><img src='" . $baseUrl . "assets/image/small/default_company.png'></td><td>" . $company['CompanyName'] . "</td>";
                $html .= "<td>";
                foreach ($allcases as $a_cases) {
                    if ($company['CompanyId'] == $a_cases->CompanyId) {
                        $html .= "<a>" . $a_cases->CaseName . "</br></a>";
                    }
                }
                $html .= "</td>";
                $html .= "<td>";
                foreach ($allcontact as $contact) {
                    if ($company['CompanyId'] == $contact->CompanyId) {
                        $html .= "<a>" . $contact->FirstName . ' ' . $contact->LastName . "</br></a>";
                    }
                }
                $html .= "</td>";
                $html .= "<td><p>Added On " . $condate . "by " . $addedby . "</p></td>";
                $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $company['CompanyId'] . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "company/update/" . base64_encode($company['CompanyId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
// $html .= "<a href='" . $baseUrl . "company/delete/" . base64_encode($company['CompanyId']) . "' title='Delete' aria-label='Delete' data-pjax='0'><span class='glyphicon glyphicon-trash' onClick='doconfirm();'></span></a>";
                $html .= "</td></tr>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['contactdiv'] = $html;
        echo json_encode($json);
    }

    public function removecaselinkthroughmodal() {
        $caseid = $this->input->post('caseid');
        $companyid = $this->input->post('companyid');

        $this->db->set('FirmId', 0);
        $this->db->where('CaseId', $caseid);
        $this->db->where('CompanyId', $companyid);
        $update = $this->db->update('tbl_case');
        if ($update) {
            $this->session->set_flashdata('success', 'Case Link Remove Successfully');
            redirect('company/companyDetails/' . $companyid);
        } else {
            $this->session->set_flashdata('error', 'Case Link Remove is not Complete. Re try again');
            redirect('company/companyDetails/' . $companyid);
        }
    }

    public function existingcasecontactlink() {
        $companyid = $this->uri->segment('3');
        $CaseId = $this->input->post('CaseId');
        foreach ($_POST['ContactId'] as $contact) {
            $ContactId[] = $contact;
        }
        $this->db->set('ContactId', $ContactId);
        $this->db->where('CaseId', $CaseId);
        $update = $this->db->update('tbl_case');
        if ($update) {
            $this->session->set_flashdata('success', 'Case Link Set Successfully');
            redirect('company/companyDetails/' . $companyid);
        } else {
            $this->session->set_flashdata('error', 'Case Link Set is not Complete. Re try again');
            redirect('company/companyDetails/' . $companyid);
        }
    }

    public function getarchivecompany() {
        $userid = $_SESSION['user_id'];
        $companyinfo = $this->CompanyModel->getallarchivecompanyforsearch($userid);
        $allcontact = $this->CompanyModel->linkedContacts();
        $allcases = $this->CompanyModel->allCases($userid);
        foreach ($allcases as $aCase) {
            $caselink[] = $aCase->ContactId;
        }
        $html = "<table class='table table-bordered companydatatables' style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Company Name</th><th>Link Cases</th><th>Linked Contacts</th><th>Details</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($companyinfo)) {
            foreach ($companyinfo as $company) {
                $baseUrl = base_url();
                $userinfo = $this->ContactModel->userinfobyid($company['CreatedBy']);
                $addedby = $userinfo->fullname;
                $timestamp = strtotime($company['CreatedOn']);
                $condate = date("jS F Y", $timestamp);
                $html .= "<tr><td><img src='" . $baseUrl . "assets/image/small/default_company.png'></td><td>" . $company['CompanyName'] . "</td>";
                $html .= "<td>";
                foreach ($allcases as $a_cases) {
                    if ($company['CompanyId'] == $a_cases->CompanyId) {
                        $html .= "<a>" . $a_cases->CaseName . "</br></a>";
                    }
                }
                $html .= "</td>";
                $html .= "<td>";
                foreach ($allcontact as $contact) {
                    if ($company['CompanyId'] == $contact->CompanyId) {
                        $html .= "<a>" . $contact->FirstName . ' ' . $contact->LastName . "</br></a>";
                    }
                }
                $html .= "</td>";
                $html .= "<td><p>Added On " . $condate . "by " . $addedby . "</p></td>";
                $html .= "<td><a href='" . $baseUrl . "company/companyDetails/" . $company['CompanyId'] . "' title='View' aria-label='View' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "company/update/" . base64_encode($company['CompanyId']) . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
// $html .= "<a href='" . $baseUrl . "company/delete/" . base64_encode($company['CompanyId']) . "' title='Delete' aria-label='Delete' data-pjax='0'><span class='glyphicon glyphicon-trash' onClick='doconfirm();'></span></a>";
                $html .= "</td></tr>";

                $html .= "</tr>";
            }
        } else {
            $html .= "<tr><td colspan='8'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['archivecompany'] = $html;
        echo json_encode($json);
    }

    public function savecompanynotes() {
        $companyId = $this->uri->segment('2');
        $data = array();
        $data['NoteSubject'] = $this->input->post('NoteSubject');
        $data['NoteContent'] = $this->input->post('NoteContent');
        $data['RelatedTo'] = $this->input->post('RelatedTo');
        $data['DueDate'] = date("Y-m-d", strtotime($this->input->post('DueDate')));
        $data['UserId'] = $_SESSION['user_id'];
        $data['CompanyId'] = $this->input->post('CompanyId');
        $data['CreatedOn'] = date('Y-m-d');
        $insert = $this->db->insert('tbl_notes', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Note Inserted Successfully');
            redirect('company/companyDetails/' . $companyId);
        } else {
            $this->session->set_flashdata('error', 'Note Insert is not Complete. Re try again');
            redirect('company/companyDetails/' . $companyId);
        }
    }

    public function getnotebyid() {
        $noteid = $this->input->post('noteid');
        $companyId = $this->input->post('companyId');
        $companyname = $this->input->post('companyname');
        $noteinfo = $this->CompanyModel->getnoteforedit($noteid, $companyId);
        if (!empty($noteinfo)) {
            $baseUrl = base_url();

            $timestamp = strtotime($noteinfo->DueDate);
            $condate = date("jS F Y", $timestamp);

            $html = "<form class='form-horizontal' action='" . $baseUrl . "updatecompanynotes/" . $noteinfo->NoteId . "' method='post'>";
            $html .= "<input type='hidden' name='CompanyId' value='" . $companyId . "'><input type='hidden' name='RelatedTo' value='Company'>";


            $html .= "<div class='form-group'><label class='control-label col-sm-3' for='email'>Case/Contact :</label><div class='col-sm-9'><h5>" . $companyname . "</h5></div></div>";
            $html .= "<div class='form-group'><label class='control-label col-sm-3' for='pwd'>Date:</label><div class='input-group col-sm-9'>  <span class='input-group-addon'><i class='glyphicon glyphicon-calendar'></i></span><input type='text' class='form-control pickadate-editable' id='duedate' placeholder='Enter Date' name='DueDate' value='" . $condate . "'></div></div>";
            $html .= "<div class='form-group'><label class='control-label col-sm-3' for='pwd'>Subject:</label><div class='col-sm-9'><input type='text' class='form-control' id='pwd' placeholder='Enter Subject' name='NoteSubject' value='" . $noteinfo->NoteSubject . "'></div></div>";
            $html .= "<div class='form-group'><label class='control-label col-sm-3' for='comment'>Note:</label><div class='col-sm-9'><textarea name='NoteContent' class='form-control' rows='5' id='comment'>" . $noteinfo->NoteContent . "</textarea></div></div>";
            $html .= "<div class='btn-ground'><a style='margin-right: 10px;'><button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-list-alt'></span> Add Note</button></a><a href='#' data-dismiss='modal'><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-remove'></span> Cancle</button></a></div>";
            $html .= "</form>";
        } else {
            $html .= "<p>There are no data according your criteria</p>";
        }

        $json = array();
        $json['companynote'] = $html;
        echo json_encode($json);
    }

    public function updatecompanynotes() {
//print_r($_POST); exit; 
        $noteId = $this->uri->segment('2');
        $companyId = $this->input->post('CompanyId');
        $this->db->set('NoteSubject', $this->input->post('NoteSubject'));
        $this->db->set('NoteContent', $this->input->post('NoteContent'));
        $this->db->set('RelatedTo', $this->input->post('RelatedTo'));
        $this->db->set('DueDate', date("Y-m-d", strtotime($this->input->post('DueDate'))));
        $this->db->set('UserId', $_SESSION['user_id']);
        $this->db->set('CompanyId', $companyId);
        $this->db->set('CreatedOn', date('Y-m-d'));
        $this->db->where('NoteId', $noteId);

        $update = $this->db->update('tbl_notes');
        if ($update) {
            $this->session->set_flashdata('success', 'Note Updated Successfully');
            redirect('company/companyDetails/' . $companyId);
        } else {
            $this->session->set_flashdata('error', 'Note Update is not Complete. Re try again');
            redirect('company/companyDetails/' . $companyId);
        }
    }

    public function deletenote() {
        $noteid = $this->uri->segment('2');
        $companyid = $this->uri->segment('3');
        $this->db->where('NoteId', $noteid);
        $delete = $this->db->delete('tbl_notes');
        if ($delete) {
            $this->session->set_flashdata('success', 'Note Deleted Successfully');
            redirect('company/companyDetails/' . $companyid);
        } else {
            $this->session->set_flashdata('error', 'Note Delete is not Complete. Re try again');
            redirect('company/companyDetails/' . $companyid);
        }
    }

    public function savetrustdeposit() {
        //print_r($_POST); exit; 
        $getfirmdata = $this->CompanyModel->getfirminfobycompanyid($_POST['CompanyId']);
        $gettrustdata = $this->CompanyModel->gettrustdatabyid($_POST['trustid']);
        $preamount = $gettrustdata->amount;
        $curamount = $preamount + $_POST['amount'];
        $company_id = $_POST['CompanyId'];
        $FirmId = $getfirmdata->FirmId;
        $loginid = $_SESSION['user_id'];

//INSERT INTO TRUST ACCOUNT
        $depositon = strtotime(date('Y-m-d'));
        $this->db->set('company_id', $company_id);
        $this->db->set('firm_id', $FirmId);
        $this->db->set('payment_method', $_POST['pymenttype']);
        $this->db->set('amount', $curamount);
        $this->db->set('deposit_on', $depositon);
        $this->db->set('deposit_by', $loginid);
        $this->db->set('notes', $_POST['notes']);
        $this->db->where('id', $_POST['trustid']);
        $update = $this->db->update('tbl_trust_account');
        //echo $this->db->last_query(); exit; 
        if ($update) {
            $this->session->set_flashdata('success', 'Trust Account Deposited Successfully');
            redirect('company/companyDetails/' . $company_id);
        } else {
            $this->session->set_flashdata('error', 'Trust Account Deposited is not Complete. Re try again');
            redirect('company/companyDetails/' . $company_id);
        }
    }
    
    public function companyarchive(){
        $companyid = $this->uri->segment('2');
        $this->db->set('status', '0');
        $this->db->where('CompanyId', $companyid);
        $update = $this->db->update('tbl_company');
        if ($update) {
            $this->session->set_flashdata('success', 'Company Archived Successfully');
            redirect('company');
        } else {
            $this->session->set_flashdata('error', 'Company Archived is not Complete. Re try again');
            redirect('company');
        }
    }

}
