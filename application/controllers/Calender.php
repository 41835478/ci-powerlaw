<?php

class Calender extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $login = is_login();
        if ($login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('CalenderModel');
//        $this->load->model('TaskSystemModel');
        $this->load->model('ManageuserSystemModel');
        $this->load->model('CountrySystemModel');
        $this->load->model('StateSystemModel');
        $this->load->model('SiteModel');
    }

    public function frontlocation() {
        if ($_SESSION['user_id'] != '') {
            $userId = $_SESSION['user_id'];
            $data['locationinfo'] = $this->CalenderModel->getalllocationbyuser($userId);
            $data['pagetitle'] = 'Manage Location';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/calendar/managelocation', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function addfrontLocation() {
        if ($_SESSION['user_id'] != '') {
            $userId = $_SESSION['user_id'];
            $data['pagetitle'] = 'Add Location';
            $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
            $data['allstate'] = $this->StateSystemModel->getallstateinfo();
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/calendar/addlocation', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function createfrontlocation() {
        if ($_SESSION['user_id'] != '') {
            $userId = $_SESSION['user_id'];
            $data['pagetitle'] = 'Add Location';
            $this->form_validation->set_rules('location_name', 'Location Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');

            if ($this->form_validation->run() === FALSE) {
                redirect('addfrontLocation');
            } else {
                $data = array();
                $dateNow = date('Y-m-d H:i');
                $formattedAddr = str_replace(' ', '+', $this->input->post('address'));
                $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddr . '&sensor=false');
                $output = json_decode($geocodeFromAddr);
                $latitude = $output->results[0]->geometry->location->lat;
                $longitude = $output->results[0]->geometry->location->lng;

                $url = "https://www.google.com.jm/maps/place/" . $this->input->post('address') . "/@" . $latitude . "/@" . $longitude . ",6z?hl=en";

                $data['location_name'] = $this->input->post('location_name');
                $data['address'] = $this->input->post('address');
                $data['country'] = $this->input->post('country');
                $data['city'] = $this->input->post('city');
                $data['state'] = $this->input->post('state');
                $data['zip'] = $this->input->post('zip');
                $data['created_by'] = $userId;
                $data['created_date'] = $dateNow;
                $data['google_map_url'] = $url;
                $data['status'] = '1';
                $data['latitude'] = $latitude;
                $data['longitude'] = $longitude;
                $this->db->insert('tbl_location', $data);
                $location_id = $this->db->insert_id();
                if ($location_id) {
                    $this->session->set_flashdata('success', 'location Inserted Successfully');
                    redirect('frontlocation');
                } else {
                    $this->session->set_flashdata('error', 'Location Insert is not Complete. Re try again');
                    redirect('addfrontLocation');
                }
            }
        }
    }

    public function deletefrontlocation() {
        $location_id = $this->uri->segment('2');
        $delete = $this->CalenderModel->deletelocationbyid($location_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'location Delete Successfully');
            redirect('frontlocation');
        } else {
            $this->session->set_flashdata('error', 'Location Delete is not Complete. Re try again');
            redirect('frontlocation');
        }
    }

    public function editfrontlocation() {
       if ($_SESSION['user_id'] != '') {
            $userId = $_SESSION['user_id'];
                $data['pagetitle'] = 'Edit Location';
                $location_id = $this->uri->segment('2');
                $data['locationeditinfo'] = $this->CalenderModel->getlocationforedit($location_id);
                $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
                $data['allstate'] = $this->StateSystemModel->getallstateinfo();
                $this->load->view('admin_template/headerlink', $data);
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/calendar/editlocation', $data);
                $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function updatefrontlocation() {

         if ($_SESSION['user_id'] != '') {
            $userId = $_SESSION['user_id'];
                $location_id = $this->uri->segment('2');
                $data['pagetitle'] = 'Update Location';
                $this->form_validation->set_rules('location_name', 'Location Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('country', 'Country', 'required');

                if ($this->form_validation->run() === FALSE) {
                    redirect('editfrontlocation');
                } else {
                    $data = array();
                    $dateNow = date('Y-m-d H:i');
                    $formattedAddr = str_replace(' ', '+', $this->input->post('address'));
                    $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddr . '&sensor=false');
                    $output = json_decode($geocodeFromAddr);
                    $latitude = $output->results[0]->geometry->location->lat;
                    $longitude = $output->results[0]->geometry->location->lng;

                    $url = "https://www.google.com.jm/maps/place/" . $this->input->post('address') . "/@" . $latitude . "/@" . $longitude . ",6z?hl=en";

                    $data['location_name'] = $this->input->post('location_name');
                    $data['address'] = $this->input->post('address');
                    $data['country'] = $this->input->post('country');
                    $data['city'] = $this->input->post('city');
                    $data['state'] = $this->input->post('state');
                    $data['zip'] = $this->input->post('zip');
                    $data['created_by'] = $userId;
                    $data['created_date'] = $dateNow;
                    $data['google_map_url'] = $url;
                    $data['status'] = '1';
                    $data['latitude'] = $latitude;
                    $data['longitude'] = $longitude;
                    $updateloc = $this->CalenderModel->updatelocationbylocationid($data, $location_id);
                    if ($updateloc) {
                        $this->session->set_flashdata('success', 'location Update Successfully');
                        redirect('frontlocation');
                    } else {
                        $this->session->set_flashdata('error', 'Location Update is not Complete. Re try again');
                        redirect('editfrontlocation');
                    }
                }
            }
    }
    
    public function locationPdf(){
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['locationinfo'] = $this->CalenderModel->getalllocationbyuser($userId);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('lawyer/pdfreport/location_pdf', $data, TRUE);
            $name = "Location.pdf";
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

    public function locationexl(){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Location.csv";
        $userid = $_SESSION['user_id'];
        $query = "SELECT tbl_location.location_name, tbl_location.address, tbl_location.city, tbl_state.StateName, tbl_country.CountryName, tbl_location.latitude, tbl_location.longitude FROM tbl_location INNER JOIN tbl_state ON tbl_state.StateId=tbl_location.state INNER JOIN tbl_country ON tbl_country.CountryId=tbl_location.country WHERE tbl_location.status = '1' AND tbl_location.created_by = '".$userid."'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }
}
