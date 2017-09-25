<?php

class TimezoneSystem extends CI_Controller {

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
        $this->load->model('TimezoneSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function managetimezone() {
        $data['alltimezoneinfo'] = $this->TimezoneSystemModel->getalltimezoneinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/timezone/managetimezone', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewtimezone() {
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/timezone/addtimezone');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createtimezone() {
        $this->form_validation->set_rules('TimezoneName', 'Timezone Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewtimezone');
        } else {
            $data = array();
            $data['TimezoneName'] = $this->input->post('TimezoneName');
            $this->db->insert('tbl_timezone', $data);
            $timezone_id = $this->db->insert_id();
            if ($timezone_id) {
                $this->session->set_flashdata('success', 'Timezone Inserted Successfully');
                redirect('managetimezones');
            } else {
                $this->session->set_flashdata('error', 'Timezone Insert is not Complete. Re try again');
                redirect('addNewtimezone');
            }
        }
    }

    public function edittimezone() {
        $data['timezone_id'] = $this->uri->segment('2');
        $data['timezoneeditinfo'] = $this->TimezoneSystemModel->gettimezoneinfobyid($data['timezone_id']);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/timezone/edittimezone', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updatetimezone() {
        $timezone_id = $this->uri->segment('2');
        $this->form_validation->set_rules('TimezoneName', 'Timezone Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('edittimezone/' . $timezone_id);
        } else {
            $data = array();
            $data['TimezoneName'] = $this->input->post('TimezoneName');

            $update = $this->TimezoneSystemModel->updatetimezoneinfo($data, $timezone_id);
            if ($update) {
                $this->session->set_flashdata('success', 'Timezone Updated Successfully');
                redirect('managetimezones');
            } else {
                $this->session->set_flashdata('error', 'Timezone update is not Complete. Re try again');
                redirect('edittimezone/' . $timezone_id);
            }
        }
    }

    public function deletetimezone() {
        $timezone_id = $this->uri->segment('2');
        $delete = $this->TimezoneSystemModel->deletetimezone($timezone_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Timezone Delete Successfully');
            redirect('managetimezones');
        } else {
            $this->session->set_flashdata('error', 'Timezone deletes is not Complete. Re try again');
            redirect('managetimezones');
        }
    }
    
    
     public function timezonepdfreportgenerate() {
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('admin');
        } else {
            $data['alltimezoneinfo'] = $this->TimezoneSystemModel->getalltimezoneinfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/timezone_pdf', $data, TRUE);
            $name = "Timezone.pdf";
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

    public function timezoneexlreportgenerate() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Timezone.csv";
        $query = "SELECT * FROM tbl_timezone";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

}
