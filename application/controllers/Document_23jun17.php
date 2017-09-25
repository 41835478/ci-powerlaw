<?php

class Document extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_document();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->model('TaskModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('TaskSystemModel');
        $this->load->model('DocumentModel');
        $this->load->model('SiteModel');
    }

    public function frontdocumentblankpage() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $data['caselink'] = $this->DocumentModel->getcaselinkbyuserid($user_id);
            $this->load->view('powerlawadmin/admin_template/headerlink');
            // $this->load->view('admin_template/header');
            $this->load->view('lawyer/document/blankpage', $data);
            // $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function savetemplate() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $docdate = date('Y-m-d');
            if ($_POST['savetype'] == '2') {
                $data = array();
                $data['DocName'] = $_POST['documentname'];
                $data['Description'] = $_POST['description'];
                $data['SaveType'] = $_POST['savetype'];
                $data['TemplateData'] = $_POST['Content'];
                $data['CreatedBy'] = $user_id;
                $data['CreatedDate'] = $docdate;
                $data['EditedDate'] = $docdate;
                $data['Status'] = '1';

                $insert = $this->db->insert('tbl_document_template', $data);
            } else if ($_POST['savetype'] == '1') {
                $docname = $_POST['documentname'];
                //create pdf
                $data['TemplateData'] = $_POST['Content'];
                $this->load->library('MPDF/mpdf');
                $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
                $mpdf->useOnlyCoreFonts = true;    // false is default
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle('My Power Law');
                $mpdf->SetAuthor('fouzia');
                $mpdf->SetDisplayMode('fullpage');
                $html .= $this->load->view('lawyer/document/blankpdf.php', $data, TRUE);
                $name = $docname . ".pdf";
                $search = array("<div class=\"row\">", "<div class=\"col-lg-12\">", "<div class=\"col-md-5\">", "<div class=\"col-md-5 col-md-offset-2\">");
                $replace = array("<div style='width: 100%;'>", "<div style='width: 90%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");

                $html = str_replace($search, $replace, $html);
                $html = str_replace($search, $replace, $html);
                $mpdf->WriteHTML($html);
                ob_clean();
                $finalpdf = $mpdf->Output('upload/document/' . $name, 'F');
                //$finalpdf = $mpdf->Output($name, 'D');


                $DocumentPath = 'upload/document/' . $name;
                $data1 = array();
                $data1['OriginalName'] = $name;
                $data1['DocumentName'] = $_POST['documentname'];
                $data1['CaseId'] = $_POST['casename'];
                $data1['Template'] = 'Yes';
                $data1['DocumentPath'] = $DocumentPath;
                $data1['UploadMethod'] = 'Upload';
                $data1['UploadedBy'] = $user_id;
                $data1['UploadedOn'] = $docdate;
                $data1['read_status'] = '0';
                $insert = $this->db->insert('tbl_document', $data1);
            }
            if ($insert) {
                $this->session->set_flashdata('success', 'Document Inserted Successfully');
                redirect('casedoc');
            } else {
                $this->session->set_flashdata('error', 'Document Insert is not Complete. Re try again');
                redirect('casedoc');
            }
        } else {
            redirect('loginform');
        }
    }

    public function casedoc() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $data['alldocinfo'] = $this->DocumentModel->getalldocinfobyuserid($user_id);
            $data['pagetitle'] = 'Document';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/document/docsview', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

}
