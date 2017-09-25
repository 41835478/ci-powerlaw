<?php

class CountrySystem extends CI_Controller {

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
        $this->load->model('CountrySystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function managecountry() {
        $data['allcountryinfo'] = $this->CountrySystemModel->getallcountryinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/masters/managecountry', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewCountry() {
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/masters/addcountry');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createcountry() {
        $this->form_validation->set_rules('CountryCode', 'Country Code', 'required');
        $this->form_validation->set_rules('CountryName', 'Country Name', 'required');
        $this->form_validation->set_rules('CurrencyName', 'Currency Name', 'required');
        $this->form_validation->set_rules('CurrencyCode', 'Currency Code', 'required');
        $this->form_validation->set_rules('CurrencySymbol', 'Currency Symbol', 'required');
        $this->form_validation->set_rules('PhoneCode', 'Phone Code', 'required');
        $this->form_validation->set_rules('SupportPhone', 'Support Phone', 'required');
        $this->form_validation->set_rules('SupportEmail', 'Support Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewCountry');
        } else {
            $data = array();
            $data['CountryCode'] = $this->input->post('CountryCode');
            $data['CountryName'] = $this->input->post('CountryName');
            $data['CurrencyName'] = $this->input->post('CurrencyName');
            $data['CurrencyCode'] = $this->input->post('CurrencyCode');
            $data['CurrencySymbol'] = $this->input->post('CurrencySymbol');
            $data['PhoneCode'] = $this->input->post('PhoneCode');
            $data['SupportPhone'] = $this->input->post('SupportPhone');
            $data['SupportEmail'] = $this->input->post('SupportEmail');
            $data['StreetAddress'] = $this->input->post('StreetAddress');
            $data['Suite'] = $this->input->post('Suite');
            $data['City'] = $this->input->post('City');
            $data['State'] = $this->input->post('State');
            $data['ZipCode'] = $this->input->post('ZipCode');
            $this->db->insert('tbl_country', $data);
            $country_id = $this->db->insert_id();
            if ($country_id) {
                $this->session->set_flashdata('success', 'Country Inserted Successfully');
                redirect('managecountry');
            } else {
                $this->session->set_flashdata('error', 'Country Insert is not Complete. Re try again');
                redirect('addNewCountry');
            }
        }
    }

    public function editcountry() {
        $data['country_id'] = $this->uri->segment('2');
        $data['countryeditinfo'] = $this->CountrySystemModel->getcountryinfobyid($data['country_id']);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/masters/editcountry', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updatecountry() {
        $country_id = $this->uri->segment('2');
        $this->form_validation->set_rules('CountryCode', 'Country Code', 'required');
        $this->form_validation->set_rules('CountryName', 'Country Name', 'required');
        $this->form_validation->set_rules('CurrencyName', 'Currency Name', 'required');
        $this->form_validation->set_rules('CurrencyCode', 'Currency Code', 'required');
        $this->form_validation->set_rules('CurrencySymbol', 'Currency Symbol', 'required');
        $this->form_validation->set_rules('PhoneCode', 'Phone Code', 'required');
        $this->form_validation->set_rules('SupportPhone', 'Support Phone', 'required');
        $this->form_validation->set_rules('SupportEmail', 'Support Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('editcountry/' . $country_id);
        } else {
            $data = array();
            $data['CountryCode'] = $this->input->post('CountryCode');
            $data['CountryName'] = $this->input->post('CountryName');
            $data['CurrencyName'] = $this->input->post('CurrencyName');
            $data['CurrencyCode'] = $this->input->post('CurrencyCode');
            $data['CurrencySymbol'] = $this->input->post('CurrencySymbol');
            $data['PhoneCode'] = $this->input->post('PhoneCode');
            $data['SupportPhone'] = $this->input->post('SupportPhone');
            $data['SupportEmail'] = $this->input->post('SupportEmail');
            $data['StreetAddress'] = $this->input->post('StreetAddress');
            $data['Suite'] = $this->input->post('Suite');
            $data['City'] = $this->input->post('City');
            $data['State'] = $this->input->post('State');
            $data['ZipCode'] = $this->input->post('ZipCode');

            $update = $this->CountrySystemModel->updatecountryinfo($data, $country_id);
            if ($update) {
                $this->session->set_flashdata('success', 'Country Updated Successfully');
                redirect('managecountry');
            } else {
                $this->session->set_flashdata('error', 'Country update is not Complete. Re try again');
                redirect('editcountry/' . $country_id);
            }
        }
    }

    public function deletecountry() {
        $country_id = $this->uri->segment('2');
        $delete = $this->CountrySystemModel->deletecountry($country_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Country Delete Successfully');
            redirect('managecountry');
        } else {
            $this->session->set_flashdata('error', 'Country deletes is not Complete. Re try again');
            redirect('editcountry/' . $country_id);
        }
    }

public function pdfreportgenerate(){
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
           redirect('admin');
        } else {  
            $data['allcountryinfo'] = $this->CountrySystemModel->getallcountryinfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/country_pdf', $data, TRUE);
            $name = "Country.pdf";
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
    
    public function exlreportgenerate(){
         $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "country.csv";
        $query = "SELECT * FROM tbl_country";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }
}
