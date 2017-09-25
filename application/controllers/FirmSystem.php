<?php

class FirmSystem extends CI_Controller {

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
        $this->load->model('FirmSystemModel');
        $this->load->model('StateSystemModel');
        $this->load->model('CountrySystemModel');
        $this->load->model('TimezoneSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function managefirm() {
        $data['allfirminfo'] = $this->FirmSystemModel->getallfirminfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/firm/managefirm', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewfirm() {
        $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
        $data['allstate'] = $this->StateSystemModel->getallstateinfo();
        $data['alltimezone'] = $this->TimezoneSystemModel->getalltimezoneinfo();
        $data['allphonecode'] = $this->FirmSystemModel->getallphonecodeinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header', $data);
        $this->load->view('powerlawadmin/admin/firm/addfirm', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createfirm() {
        $this->form_validation->set_rules('FirmName', 'Firm Name', 'required');
        $this->form_validation->set_rules('SubDomain', 'Sub Domain', 'required');
        $this->form_validation->set_rules('ContactFName', 'Contact First Name', 'required');
        $this->form_validation->set_rules('ContactLName', 'Contact Last Name', 'required');
        $this->form_validation->set_rules('Phone', 'Phone', 'required');
        $this->form_validation->set_rules('Fax', 'Fax', 'required');
        $this->form_validation->set_rules('Website', 'Website', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'required');
        $this->form_validation->set_rules('Country', 'Country', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
        $this->form_validation->set_rules('Strength', 'Strength', 'required');
        $this->form_validation->set_rules('Notification', 'Notification', 'required');
        $this->form_validation->set_rules('NFrequencey', 'NFrequencey', 'required');
        $this->form_validation->set_rules('TimeZoneId', 'TimeZoneId', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewfirm');
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            $data['FirmName'] = $this->input->post('FirmName');
            $data['SubDomain'] = $this->input->post('SubDomain');
            $data['ContactFName'] = $this->input->post('ContactFName');
            $data['ContactLName'] = $this->input->post('ContactLName');
            $data['Phone'] = $this->input->post('Phone');
            $data['Fax'] = $this->input->post('Fax');
            $data['Website'] = $this->input->post('Website');
            $data['Email'] = $this->input->post('Email');
            $data['Address1'] = $this->input->post('Address1');
            $data['Address2'] = $this->input->post('Address2');
            $data['Country'] = $this->input->post('Country');
            $data['State'] = $this->input->post('State');
            $data['City'] = $this->input->post('City');
            $data['ZipCode'] = $this->input->post('ZipCode');
            $data['Strength'] = $this->input->post('Strength');
            $data['Notification'] = $this->input->post('Notification');
            $data['NFrequencey'] = $this->input->post('NFrequencey');
            $data['TimeZoneId'] = $this->input->post('TimeZoneId');
            $data['MemberType'] = 'Free';
            $data['CreatedOn'] = $dateNow;
            $data['IpAddress'] = $ip;
            $data['LastUpdated'] = $dateNow;
            $data['UpdatedIp'] = $ip;
            $data['CCodeM'] = $this->input->post('CCodeM');
            $data['CCodeP'] = $this->input->post('CCodeP');
            $data['CCodeF'] = $this->input->post('CCodeF');
            //echo '<pre>'; print_r($data); exit;
            $this->db->insert('tbl_firm', $data);
            $firm_id = $this->db->insert_id();
            if ($firm_id) {
                $this->session->set_flashdata('success', 'Firm Inserted Successfully');
                redirect('managefirm');
            } else {
                $this->session->set_flashdata('error', 'Firm Insert is not Complete. Re try again');
                redirect('addNewfirm');
            }
        }
    }

    public function editfirm() {
        $data['firm_id'] = $this->uri->segment('2');
        $data['firmeditinfo'] = $this->FirmSystemModel->getfirminfobyid($data['firm_id']);
        $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
        $data['allstate'] = $this->StateSystemModel->getallstateinfo();
        $data['alltimezone'] = $this->TimezoneSystemModel->getalltimezoneinfo();
        $data['allphonecode'] = $this->FirmSystemModel->getallphonecodeinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/firm/editfirm', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewfirm() {
        $data['firm_id'] = $this->uri->segment('2');
        $data['firmeditinfo'] = $this->FirmSystemModel->getfirminfobyid($data['firm_id']);
        $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
        $data['allstate'] = $this->StateSystemModel->getallstateinfo();
        $data['alltimezone'] = $this->TimezoneSystemModel->getalltimezoneinfo();
        $data['allphonecode'] = $this->FirmSystemModel->getallphonecodeinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/firm/firmview', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updatefirm() {
        $firm_id = $this->uri->segment('2');
        $this->form_validation->set_rules('FirmName', 'Firm Name', 'required');
        $this->form_validation->set_rules('SubDomain', 'Sub Domain', 'required');
        $this->form_validation->set_rules('ContactFName', 'Contact First Name', 'required');
        $this->form_validation->set_rules('ContactLName', 'Contact Last Name', 'required');
        $this->form_validation->set_rules('Phone', 'Phone', 'required');
        $this->form_validation->set_rules('Fax', 'Fax', 'required');
        $this->form_validation->set_rules('Website', 'Website', 'required');
        $this->form_validation->set_rules('Email', 'Email', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'required');
        $this->form_validation->set_rules('Country', 'Country', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
        $this->form_validation->set_rules('Strength', 'Strength', 'required');
        $this->form_validation->set_rules('Notification', 'Notification', 'required');
        $this->form_validation->set_rules('NFrequencey', 'NFrequencey', 'required');
        $this->form_validation->set_rules('TimeZoneId', 'TimeZoneId', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('editfirm/' . $firm_id);
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            $data['FirmName'] = $this->input->post('FirmName');
            $data['SubDomain'] = $this->input->post('SubDomain');
            $data['ContactFName'] = $this->input->post('ContactFName');
            $data['ContactLName'] = $this->input->post('ContactLName');
            $data['Phone'] = $this->input->post('Phone');
            $data['Fax'] = $this->input->post('Fax');
            $data['Website'] = $this->input->post('Website');
            $data['Email'] = $this->input->post('Email');
            $data['Address1'] = $this->input->post('Address1');
            $data['Address2'] = $this->input->post('Address2');
            $data['Country'] = $this->input->post('Country');
            $data['State'] = $this->input->post('State');
            $data['City'] = $this->input->post('City');
            $data['ZipCode'] = $this->input->post('ZipCode');
            $data['Strength'] = $this->input->post('Strength');
            $data['Notification'] = $this->input->post('Notification');
            $data['NFrequencey'] = $this->input->post('NFrequencey');
            $data['TimeZoneId'] = $this->input->post('TimeZoneId');
            $data['MemberType'] = 'Free';
            $data['CreatedOn'] = $dateNow;
            $data['IpAddress'] = $ip;
            $data['LastUpdated'] = $dateNow;
            $data['UpdatedIp'] = $ip;
            $data['CCodeM'] = $this->input->post('CCodeM');
            $data['CCodeP'] = $this->input->post('CCodeP');
            $data['CCodeF'] = $this->input->post('CCodeF');

            $update = $this->FirmSystemModel->updatefirminfo($data, $firm_id);
            if ($update) {
                $this->session->set_flashdata('success', 'Package Updated Successfully');
                redirect('managefirm');
            } else {
                $this->session->set_flashdata('error', 'Package update is not Complete. Re try again');
                redirect('editfirm/' . $firm_id);
            }
        }
    }

    public function deletefirm() {
        $firm_id = $this->uri->segment('2');
        $delete = $this->FirmSystemModel->deletefirm($firm_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Package Delete Successfully');
            redirect('managefirm');
        } else {
            $this->session->set_flashdata('error', 'Package deletes is not Complete. Re try again');
            redirect('managefirm');
        }
    }

    public function firmlogoupload() {
        $FirmId = $this->uri->segment('2');

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $newsImage = $_FILES['image']['name'];
            $icon = $newsImage;
            $ext = pathinfo($icon, PATHINFO_EXTENSION);
            $rand = rand(0, 100000);
            $imagename = 'firm_' . $rand . '.' . $ext;
            $config['upload_path'] = './upload/firmimage';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $type = $config['allowed_types'];
            $config['max_size'] = '500000';
            $size = $config['max_size'];
            $config['file_name'] = $imagename;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $status = 'error';
            } else {
                $fileinfo = $this->upload->data();
                //print_r($fileinfo); exit; 
                $info['FirmLogo'] = $fileinfo['file_name'];
                $up = $this->db->update('tbl_firm', $info, array('FirmId' => $FirmId));
                if ($up) {
                    redirect('viewfirm/' . $FirmId);
                }
            }
        }
    }

    public function firmpdfreportgenerate() {
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('admin');
        } else {
            $data['allfirminfo'] = $this->FirmSystemModel->getallfirminfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/firm_pdf', $data, TRUE);
            $name = "Firm.pdf";
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

    public function firmexlreportgenerate() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Firm.csv";
        $query = "SELECT tbl_firm.FirmName, tbl_firm.SubDomain, tbl_firm.ContactFName, tbl_firm.Mobile, tbl_firm.Email,tbl_state.StateName, tbl_country.CountryName FROM tbl_firm INNER JOIN tbl_state ON tbl_state.StateId=tbl_firm.State INNER JOIN tbl_country ON tbl_country.CountryId=tbl_firm.Country";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

}
