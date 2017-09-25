<?php

class PackageSystem extends CI_Controller {

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
        $this->load->model('PackageSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function managepackage() {
        $data['allpackageinfo'] = $this->PackageSystemModel->getallpackageinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/package/managepackage', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewpackage() {
        //print_r($_SESSION); exit;
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/package/addpackage');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createpackage() {
        $this->form_validation->set_rules('PackageName', 'Package Name', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');
        $this->form_validation->set_rules('Amount', 'Amount', 'required');
        $this->form_validation->set_rules('FreeTrial', 'Free Trial', 'required');
        $this->form_validation->set_rules('TrialDuration', 'Trial Duration', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewpackage');
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            $data['PackageName'] = $this->input->post('PackageName');
            $data['Description'] = $this->input->post('Description');
            $data['Amount'] = $this->input->post('Amount');
            $data['FreeTrial'] = $this->input->post('FreeTrial');
            $data['TrialDuration'] = $this->input->post('TrialDuration');
            $data['Status'] = 'Active';
            $data['LastUpdated'] = $dateNow;
            $data['LastUpdateBy'] = $_SESSION['admin_id'];
            //$data['UpdateIp'] = $this->input->post('TrialDuration');
            $this->db->insert('tbl_package', $data);
            $package_id = $this->db->insert_id();
            if ($package_id) {
                $this->session->set_flashdata('success', 'Package Inserted Successfully');
                redirect('managepackage');
            } else {
                $this->session->set_flashdata('error', 'Package Insert is not Complete. Re try again');
                redirect('addNewpackage');
            }
        }
    }

    public function editpackage() {
        $data['package_id'] = $this->uri->segment('2');
        $data['packageeditinfo'] = $this->PackageSystemModel->getpackageinfobyid($data['package_id']);
        //echo '<pre>'; print_r($data['packageeditinfo']); exit;
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/package/editpackage', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updatepackage() {
        $package_id = $this->uri->segment('2');
        $this->form_validation->set_rules('PackageName', 'Package Name', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');
        $this->form_validation->set_rules('Amount', 'Amount', 'required');
        $this->form_validation->set_rules('FreeTrial', 'Free Trial', 'required');
        $this->form_validation->set_rules('TrialDuration', 'Trial Duration', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('editpackage/' . $package_id);
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            $data['PackageName'] = $this->input->post('PackageName');
            $data['Description'] = $this->input->post('Description');
            $data['Amount'] = $this->input->post('Amount');
            $data['FreeTrial'] = $this->input->post('FreeTrial');
            $data['TrialDuration'] = $this->input->post('TrialDuration');
            $data['Status'] = 'Active';
            $data['LastUpdated'] = $dateNow;
            $data['LastUpdateBy'] = $_SESSION['admin_id'];

            $update = $this->PackageSystemModel->updatepackageinfo($data, $package_id);
            if ($update) {
                $this->session->set_flashdata('success', 'Package Updated Successfully');
                redirect('managepackage');
            } else {
                $this->session->set_flashdata('error', 'Package update is not Complete. Re try again');
                redirect('editpackage/' . $package_id);
            }
        }
    }

    public function deletepackage() {
        $package_id = $this->uri->segment('2');
        $delete = $this->PackageSystemModel->deletepackage($package_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Package Delete Successfully');
            redirect('managepackage');
        } else {
            $this->session->set_flashdata('error', 'Package deletes is not Complete. Re try again');
            redirect('managepackage');
        }
    }
    
    
     public function packagepdfreportgenerate(){
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
           redirect('admin');
        } else {  
            $data['allpackageinfo'] = $this->PackageSystemModel->getallpackageinfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/package_pdf', $data, TRUE);
            $name = "Package.pdf";
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
    
    public function packageexlreportgenerate(){
         $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Package.csv";
        $query = "SELECT * FROM tbl_package";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

}
