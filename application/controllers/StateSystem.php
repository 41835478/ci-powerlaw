<?php

class StateSystem extends CI_Controller {

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
        $this->load->model('StateSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function managestate() {
        $data['allstateinfo'] = $this->StateSystemModel->getallstateinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/state/managestate', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewState() {
        $data['countryData'] = $this->StateSystemModel->getallcountryname();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header', $data);
        $this->load->view('powerlawadmin/admin/state/addstate', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createstate() {
        $this->form_validation->set_rules('CountryId', 'Country Id', 'required');
        $this->form_validation->set_rules('StateName', 'State Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewCountry');
        } else {
            $data = array();
            $data['CountryId'] = $this->input->post('CountryId');
            $data['StateName'] = $this->input->post('StateName');
            $this->db->insert('tbl_state', $data);
            $state_id = $this->db->insert_id();
            if ($state_id) {
                $this->session->set_flashdata('success', 'State Inserted Successfully');
                redirect('managestate');
            } else {
                $this->session->set_flashdata('error', 'State Insert is not Complete. Re try again');
                redirect('addNewState');
            }
        }
    }

    public function editstate() {
        $data['state_id'] = $this->uri->segment('2');
        $data['stateeditinfo'] = $this->StateSystemModel->getstateinfobyid($data['state_id']);
        $data['countryData'] = $this->StateSystemModel->getallcountryname();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/state/editstate', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updatestate() {
        $state_id = $this->uri->segment('2');
       $this->form_validation->set_rules('CountryId', 'Country Id', 'required');
        $this->form_validation->set_rules('StateName', 'State Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('editstate/' . $country_id);
        } else {
            $data = array();
            $data['CountryId'] = $this->input->post('CountryId');
            $data['StateName'] = $this->input->post('StateName');

            $update = $this->StateSystemModel->updatestateinfo($data, $state_id);
            if ($update) {
                $this->session->set_flashdata('success', 'State Updated Successfully');
                redirect('managestate');
            } else {
                $this->session->set_flashdata('error', 'State update is not Complete. Re try again');
                redirect('editcountry/' . $country_id);
            }
        }
    }

    public function deletestate() {
        $state_id = $this->uri->segment('2');
        $delete = $this->StateSystemModel->deletestate($state_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'State Delete Successfully');
            redirect('managestate');
        } else {
            $this->session->set_flashdata('error', 'State deletes is not Complete. Re try again');
            redirect('managestate');
        }
    }
    
     public function statepdfreportgenerate(){
     $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
           redirect('admin');
        } else {  
            $data['allstateinfo'] = $this->StateSystemModel->getallstateinfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/state_pdf', $data, TRUE);
            $name = "State.pdf";
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
    
    public function stateexlreportgenerate(){
         $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "State.csv";
        $query = "SELECT * FROM tbl_state";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

}
