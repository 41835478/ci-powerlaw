<?php

class CalenderSystem extends CI_Controller {

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
        $this->load->model('CalenderSystemModel');
        $this->load->model('TaskSystemModel');
        $this->load->model('ManageuserSystemModel');
        $this->load->model('CountrySystemModel');
        $this->load->model('StateSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function daycalendar() {
        if ($_SESSION['admin_id'] != '') {
            if ($_SESSION['type'] == '1') {
                $userId = $_SESSION['admin_id'];
                $userinfo = $this->ManageuserSystemModel->getuserinfobyid($userId);
                $data['useremail'] = urlencode($userinfo->email);
                // echo  urlencode($data['useremail']); exit;
                $data['title'] = 'Day Calendar';
                $this->load->view('powerlawadmin/admin_template/headerlink', $data);
                $this->load->view('powerlawadmin/admin_template/header');
                $this->load->view('powerlawadmin/admin/calendar/daycalendar', $data);
                $this->load->view('powerlawadmin/admin_template/footerlink');
            } else {
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    }

    public function managelocation() {
        if ($_SESSION['admin_id'] != '') {
            if ($_SESSION['type'] == '1') {
                $userId = $_SESSION['admin_id'];
                $data['locationinfo'] = $this->CalenderSystemModel->getalllocation();
                $data['title'] = 'Manage Location';
                $this->load->view('powerlawadmin/admin_template/headerlink', $data);
                $this->load->view('powerlawadmin/admin_template/header');
                $this->load->view('powerlawadmin/admin/calendar/managelocation', $data);
                $this->load->view('powerlawadmin/admin_template/footerlink');
            } else {
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    }

    public function addNewLocation() {
        if ($_SESSION['admin_id'] != '') {
            if ($_SESSION['type'] == '1') {
                $userId = $_SESSION['admin_id'];
                $data['title'] = 'Add Location';
                $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
                $data['allstate'] = $this->StateSystemModel->getallstateinfo();
                $this->load->view('powerlawadmin/admin_template/headerlink', $data);
                $this->load->view('powerlawadmin/admin_template/header');
                $this->load->view('powerlawadmin/admin/calendar/addlocation', $data);
                $this->load->view('powerlawadmin/admin_template/footerlink');
            } else {
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    }

    public function createlocation() {
        if ($_SESSION['admin_id'] != '') {
            if ($_SESSION['type'] == '1') {
                $userId = $_SESSION['admin_id'];
                $data['title'] = 'Add Location';
                $this->form_validation->set_rules('location_name', 'Location Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('country', 'Country', 'required');

                if ($this->form_validation->run() === FALSE) {
                    redirect('addNewLocation');
                } else {
                    $data = array();
                    $dateNow = date('Y-m-d H:i');
                    $formattedAddr = str_replace(' ', '+', $this->input->post('address'));
                    $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddr . '&sensor=false');
                    $output = json_decode($geocodeFromAddr);
                    $latitude = $output->results[0]->geometry->location->lat;
                    $longitude = $output->results[0]->geometry->location->lng;
//echo '<pre>'; print_r($output); exit; 

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
                        redirect('managelocation');
                    } else {
                        $this->session->set_flashdata('error', 'Location Insert is not Complete. Re try again');
                        redirect('addNewLocation');
                    }
                }
            }
        }
    }

    public function deletelocation() {
        $location_id = $this->uri->segment('2');
        $delete = $this->CalenderSystemModel->deletelocationbyid($location_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'location Delete Successfully');
            redirect('managelocation');
        } else {
            $this->session->set_flashdata('error', 'Location Delete is not Complete. Re try again');
            redirect('managelocation');
        }
    }

    public function editlocation() {
        if ($_SESSION['admin_id'] != '') {
            if ($_SESSION['type'] == '1') {
                $userId = $_SESSION['admin_id'];
                $data['title'] = 'Edit Location';
                $location_id = $this->uri->segment('2');
                $data['locationeditinfo'] = $this->CalenderSystemModel->getlocationforedit($location_id);
                $data['allcountry'] = $this->CountrySystemModel->getallcountryinfo();
                $data['allstate'] = $this->StateSystemModel->getallstateinfo();
                $this->load->view('powerlawadmin/admin_template/headerlink', $data);
                $this->load->view('powerlawadmin/admin_template/header');
                $this->load->view('powerlawadmin/admin/calendar/editlocation', $data);
                $this->load->view('powerlawadmin/admin_template/footerlink');
            } else {
                redirect('admin');
            }
        } else {
            redirect('admin');
        }
    }

    public function updatelocation() {

        if ($_SESSION['admin_id'] != '') {
            if ($_SESSION['type'] == '1') {
                $userId = $_SESSION['admin_id'];
                $location_id = $this->uri->segment('2');
                $data['title'] = 'Update Location';
                $this->form_validation->set_rules('location_name', 'Location Name', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('country', 'Country', 'required');

                if ($this->form_validation->run() === FALSE) {
                    redirect('addNewLocation');
                } else {
                    $data = array();
                    $dateNow = date('Y-m-d H:i');
                    $formattedAddr = str_replace(' ', '+', $this->input->post('address'));
                    $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddr . '&sensor=false');
                    $output = json_decode($geocodeFromAddr);
                    $latitude = $output->results[0]->geometry->location->lat;
                    $longitude = $output->results[0]->geometry->location->lng;
//echo '<pre>'; print_r($output); exit; 

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
                    $updateloc = $this->CalenderSystemModel->updatelocationbylocationid($data,$location_id);
                    if ($updateloc) {
                        $this->session->set_flashdata('success', 'location Update Successfully');
                        redirect('managelocation');
                    } else {
                        $this->session->set_flashdata('error', 'Location Update is not Complete. Re try again');
                        redirect('addNewLocation');
                    }
                }
            }
        }
    }

}
