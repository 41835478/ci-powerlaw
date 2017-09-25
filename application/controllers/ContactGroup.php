<?php

class ContactGroup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $login = is_login();
        if ($login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->model('GroupModel');
        $this->load->model('SiteModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('CompanyModel');
    }

    public function index() {
        $logged_id = 2;
        $data['logged_id'] = $logged_id;
        $data['all_group'] = $this->GroupModel->allGroup();
        $data['pagetitle'] = 'Contact Group';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/contact_group/all_group', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function addContactGroup() {
        $data['pagetitle'] = 'Add Contact Group';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/contact_group/add_group');
        $this->load->view('admin_template/footerlink');
    }

    public function add() {
        $this->form_validation->set_rules('GroupName', 'Group Name', 'required|is_unique[tbl_contact_group.GroupName]', array('required' => 'Please provide your Group Name',
            'is_unique' => 'This Group already registred'
                )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->addContactGroup();
        } else {
            $data['GroupName'] = $this->input->post('GroupName');
            $this->GroupModel->addGroup($data);
            $this->session->set_flashdata('insertsuccess', 'New Contact Group Successfully Added');
            redirect(base_url() . 'contactGroup');
        }
    }

    public function updateForm() {

        $id = base64_decode($this->uri->segment(3));
        $checkurl = $this->GroupModel->all_info_for_update($id);
        if ($checkurl) {
            $data['all_info_for_update'] = $this->GroupModel->all_info_for_update($id);
            $data['pagetitle'] = 'Edit Contact Group';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/contact_group/update_group', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            $this->load->view('error/clean404/errorindex');
        }
    }

    public function updated() {
        $this->form_validation->set_rules('GroupName', 'Group Name', 'required', array('required' => 'Please provide your Group Name'
                )
        );



        if ($this->form_validation->run() == FALSE) {
            $this->updateForm();
        } else {

            $id = $this->uri->segment(3);
            $data['GroupName'] = $this->input->post('GroupName');
            $checkexist = $this->GroupModel->checkexist($data['GroupName'], $id);
            if ($checkexist) {
                $this->updateForm();
            } else {
                $this->GroupModel->update($data, $id);
                $this->session->set_flashdata('updatesuccess', 'Contact Group Successfully Updated!');
                redirect(base_url() . 'contactGroup');
            }
        }
    }

    public function delete() {
        $id = base64_decode($this->uri->segment(3));
        $this->GroupModel->delete($id);
        $this->GroupModel->deletecon($id);
        $this->session->set_flashdata('deletesuccess', 'Contact Group Successfully Delete!');
        redirect(base_url() . 'contactGroup');
    }

    public function contactgrouppdf() {
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id) || $user_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['allgroupinfo'] = $this->GroupModel->allGroup();
            // print_r($data['allgroupinfo']);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/cgroup_pdf', $data, TRUE);
            $name = "Company.pdf";
            $search = array("<div class=\"row\">", "<div class=\"col-lg-12\">", "<div class=\"col-md-5\">", "<div class=\"col-md-5 col-md-offset-2\">");
            $replace = array("<div style='width: 100%;'>", "<div style='width: 90%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");

            $html = str_replace($search, $replace, $html);
            $html = str_replace($search, $replace, $html);
            $mpdf->WriteHTML($html);
            $mpdf->Output($name, 'D');
            exit;
        }
    }

    public function contactgroupexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Group.csv";
        $query = "SELECT tbl_contact_group.*, tbl_firm.FirmName FROM tbl_contact_group INNER JOIN tbl_firm ON tbl_firm.FirmId = tbl_contact_group.FirmId";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

}
