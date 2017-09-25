<?php

class ManageuserSystem extends CI_Controller {

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
        $this->load->model('ManageuserSystemModel');
        $this->load->model('StateSystemModel');
        $this->load->model('CountrySystemModel');
        $this->load->model('TimezoneSystemModel');
		$this->load->model('SystemAdministratorModel');
    }

    public function manageuser() {
        $data['alluserinfo'] = $this->ManageuserSystemModel->getalluserinfo();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageuser/manageuser', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function addNewuser() {
        $data['auth_item'] = $this->ManageuserSystemModel->getallauthitem();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header', $data);
        $this->load->view('powerlawadmin/admin/manageuser/adduser', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createuser() {
        //print_r($_POST); exit; 
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[repeatpassword]');
        $this->form_validation->set_rules('repeatpassword', 'Repeat Password', 'required');
        $this->form_validation->set_rules('Role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addNewfirm');
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');

            $data['fullname'] = $this->input->post('fullname');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $q = $this->input->post('password');
            $qEncoded = base64_encode(md5($q));
            $data['password_hash'] = $qEncoded;
            $this->db->insert('user', $data);
            $user_id = $this->db->insert_id();
            if ($user_id) {
                $data1['item_name'] = $this->input->post('Role');
                $data1['user_id'] = $user_id;
                $data1['created_at'] = strtotime($dateNow);
                $auth = $this->db->insert('auth_assignment', $data1);
                if ($auth) {
                    //SENT EMAIL TO THE USER
                    $email = $this->input->post('email');
                    $siteUrl = "http://rs2.banglaspeed.com/mypowerLaw/";
                    $username = $this->input->post('username');
                    $password = $q; 
                    $subject = "Create User Conformation Mail"; 
                    $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
                    $msg .= "<td style='font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px'>";
                    $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
                    $msg .= "<tbody><tr>";
                    $msg .= "<td style='font-family:sans - serif;font-size:14px;vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px'>";
                    $msg .= "<h1 style = 'font-family:sans-serif;line-height:1.4;margin:0;margin-bottom:15px;font-size:24px;font-weight:400;text-align:center;margin-bottom:0;color:#fff'>" .'MyPowerLaw'. "</h1></td></tr>";
                    $msg .= "<tr><td style = 'font-family:sans-serif;font-size:14px;vertical-align:top;text-align:center;background:#fff;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px'>";
                    $msg .= "<div style = 'color:#444;text-align:center'><p style = 'font-family:sans-serif;font-size:16px;font-weight:normal;margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word'><b>Subject: ".$subject."</b></p></div>";
                    $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%'>";
                    $msg .= "<tbody>";
                    $msg .= "<tr><td align = 'center' style = 'font-family:sans-serif;font-size:14px;vertical-align:top;padding-bottom:20px;padding-top:0px'>";
                    $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
                    $msg .= "<tbody><tr><td style = 'font-family:sans-serif;font-size:14px;vertical-align:top;background-color:#ffffff;border-radius:5px;text-align:center;background-color:#ff7e00'><a style = 'text-decoration:underline;background-color:#ffffff;border:solid 1px #3498db;border-radius:8px;box-sizing:border-box;color:#3498db;display:inline-block;font-size:20px;margin:0;padding:8px 30px;text-decoration:none;background-color:#ff7e00;border-color:#ff7e00;color:#ffffff">
                    $msg .= "<h4 style = 'text-align: left'>Dear User </h4>";
                    $msg .= "<p>You Are Selected as a Staff of mypowerlaw site by super admin. Here is your username and password.</p><p style ='text-align: left'>User Name : ".$username."</p><p style = 'text-align: left'>Password : ".$password."</p></a> </td>";
                    $msg .= "</tr></tbody></table></td></tr></tbody></table>";
                    $msg .= "<p style = 'font-family:sans-serif;font-size:16px;font-weight:normal;margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;color:#444;text-align:center">
                    $msg .= "</p><div style = 'background-color:#f2dede;border-radius:5px;border-color:#b96766;color:#b96766;padding:10px'><div>For change password and access site, please sign in to your client portal at:</div>";
                    $msg .= "<div><a style = 'color:#3498db;text-decoration:underline' target = '_blank'>".$siteUrl."</a></div>";
                    $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
                    mail($email, $subject, $msg);

                    $this->session->set_flashdata('success', 'User Inserted Successfully');
                    redirect('manageuser');
                } else {
                    $this->session->set_flashdata('error', 'User Insert is not Complete. Re try again');
                    redirect('addNewuser');
                }
            } else {
                $this->session->set_flashdata('error', 'User Insert is not Complete. Re try again');
                redirect('addNewuser');
            }
        }
    }

    public function edituser() {
        $data['user_id'] = $this->uri->segment('2');
        $data['usereditinfo'] = $this->ManageuserSystemModel->getuserinfobyid($data['user_id']);
        $data['auth_item'] = $this->ManageuserSystemModel->getallauthitem();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageuser/edituser', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updateuser() {
        $user_id = $this->uri->segment('2');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('Role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('edituser/' . $user_id);
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            $data['fullname'] = $this->input->post('fullname');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['Role'] = $this->input->post('Role');

            $update = $this->ManageuserSystemModel->updateuserinfo($data, $user_id);
            if ($update) {
                $this->session->set_flashdata('success', 'User Updated Successfully');
                redirect('manageuser');
            } else {
                $this->session->set_flashdata('error', 'User update is not Complete. Re try again');
                redirect('edituser/' . $user_id);
            }
        }
    }

    public function deleteuser() {
        $user_id = $this->uri->segment('2');
        $delete = $this->ManageuserSystemModel->deleteuser($user_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'User Delete Successfully');
            redirect('manageuser');
        } else {
            $this->session->set_flashdata('error', 'User deletes is not Complete. Re try again');
            redirect('manageuser');
        }
    }

    public function manageusergroup() {
        $data['allusergroupinfo'] = $this->ManageuserSystemModel->getallusergroup();
        //echo '<pre>'; print_r($data['allusergroupinfo']);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageusergroup/manageusergroup', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function editusergroup() {
        $groupname = $this->uri->segment('2');
        $data['editusergroup'] = $this->ManageuserSystemModel->getusergroupbyname($groupname);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageusergroup/editusergroup', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updateusergroup() {
        $groupname = $this->uri->segment('2');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('edituser/' . $user_id);
        } else {
            $data = array();
            $data['name'] = $this->input->post('name');

            $update = $this->ManageuserSystemModel->updateusergroup($data, $groupname);
            if ($update) {
                $this->session->set_flashdata('success', 'User Group Updated Successfully');
                redirect('manageusergroup');
            } else {
                $this->session->set_flashdata('error', 'User Group update is not Complete. Re try again');
                redirect('updateusergroup/' . $groupname);
            }
        }
    }

    public function manageadminstaff() {
        $data['alladminstaff'] = $this->ManageuserSystemModel->alladminstaff();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageusergroup/manageadminstaff', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function editadminstaff() {
        $staf_id = $this->uri->segment('2');
        $data['editadminstaff'] = $this->ManageuserSystemModel->adminstaffbyid($staf_id);
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageusergroup/editadminstaff', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function updateadminstaff() {
        $staf_id = $this->uri->segment('2');
        //print_r($_POST); exit; 
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('editadminstaff/' . $staf_id);
        } else {
            $data = array();
            $data['fullname'] = $this->input->post('fullname');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['status'] = $this->input->post('status');
            $data['type'] = $this->input->post('type');

            $update = $this->ManageuserSystemModel->updateadminstaffinfo($data, $staf_id);
            if ($update) {
                $this->session->set_flashdata('success', 'Admin User Updated Successfully');
                redirect('manageadminstaff');
            } else {
                $this->session->set_flashdata('error', 'Admin User update is not Complete. Re try again');
                redirect('editadminstaff/' . $staf_id);
            }
        }
    }

    public function addadminstaff() {
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageusergroup/addadminstaff');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createadminstaff() {
        //print_r($_SESSION);
        //exit;
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[powerlaw_admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[repeatpassword]');
        $this->form_validation->set_rules('repeatpassword', 'Repeat Password', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() === FALSE) {
            redirect('addadminstaff');
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            $data['fullname'] = $this->input->post('fullname');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['type'] = $this->input->post('type');
            $data['created_by'] = $_SESSION['admin_id'];
            $data['created_at'] = strtotime($dateNow);
            $data['updated_at'] = strtotime($dateNow);
            $data['status'] = 1;
            $q = $this->input->post('password');
            $qEncoded = base64_encode(md5($q));
            $data['password_hash'] = $qEncoded;
            $this->db->insert('powerlaw_admin', $data);
            $user_id = $this->db->insert_id();
            if ($user_id) {
                
                //SENT EMAIL TO THE USER
                    $email = $this->input->post('email');
                    $siteUrl = "http://rs2.banglaspeed.com/mypowerLaw/";
                    $username = $this->input->post('username');
                    $password = $q; 
                    $subject = "Create Staff Conformation Mail"; 
                    $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
                    $msg .= "<td style='font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px'>";
                    $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
                    $msg .= "<tbody><tr>";
                    $msg .= "<td style='font-family:sans - serif;font-size:14px;vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px'>";
                    $msg .= "<h1 style = 'font-family:sans-serif;line-height:1.4;margin:0;margin-bottom:15px;font-size:24px;font-weight:400;text-align:center;margin-bottom:0;color:#fff'>" .'MyPowerLaw'. "</h1></td></tr>";
                    $msg .= "<tr><td style = 'font-family:sans-serif;font-size:14px;vertical-align:top;text-align:center;background:#fff;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px'>";
                    $msg .= "<div style = 'color:#444;text-align:center'><p style = 'font-family:sans-serif;font-size:16px;font-weight:normal;margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word'><b>Subject: ".$subject."</b></p></div>";
                    $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%'>";
                    $msg .= "<tbody>";
                    $msg .= "<tr><td align = 'center' style = 'font-family:sans-serif;font-size:14px;vertical-align:top;padding-bottom:20px;padding-top:0px'>";
                    $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
                    $msg .= "<tbody><tr><td style = 'font-family:sans-serif;font-size:14px;vertical-align:top;background-color:#ffffff;border-radius:5px;text-align:center;background-color:#ff7e00'><a style = 'text-decoration:underline;background-color:#ffffff;border:solid 1px #3498db;border-radius:8px;box-sizing:border-box;color:#3498db;display:inline-block;font-size:20px;margin:0;padding:8px 30px;text-decoration:none;background-color:#ff7e00;border-color:#ff7e00;color:#ffffff">
                    $msg .= "<h4 style = 'text-align: left'>Dear User </h4>";
                    $msg .= "<p>You Are Selected as a Staff of mypowerlaw site by super admin. Here is your username and password.</p><p style ='text-align: left'>User Name : ".$username."</p><p style = 'text-align: left'>Password : ".$password."</p></a> </td>";
                    $msg .= "</tr></tbody></table></td></tr></tbody></table>";
                    $msg .= "<p style = 'font-family:sans-serif;font-size:16px;font-weight:normal;margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;color:#444;text-align:center">
                    $msg .= "</p><div style = 'background-color:#f2dede;border-radius:5px;border-color:#b96766;color:#b96766;padding:10px'><div>For change password and access site, please sign in to your client portal at:</div>";
                    $msg .= "<div><a style = 'color:#3498db;text-decoration:underline' target = '_blank'>".$siteUrl."</a></div>";
                    $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
                    mail($email, $subject, $msg);

                
                $this->session->set_flashdata('success', 'Admin Staff Inserted Successfully');
                redirect('manageadminstaff');
            } else {
                $this->session->set_flashdata('error', 'Admin Staff Insert is not Complete. Re try again');
                redirect('addadminstaff');
            }
        }
    }

    public function deleteadminstaff() {
        $staf_id = $this->uri->segment('2');
        $delete = $this->ManageuserSystemModel->deleteadminstaff($staf_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Admin Staff Delete Successfully');
            redirect('manageadminstaff');
        } else {
            $this->session->set_flashdata('error', 'Admin Staff deletes is not Complete. Re try again');
            redirect('manageadminstaff');
        }
    }

    public function manageuserpermission() {
        $data['alladminstaff'] = $this->ManageuserSystemModel->alladminstaff();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageuser/manageuserpermission', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewuserpermission() {
        $data['user_id'] = $this->uri->segment('2');
        $data['adminstaffpermission'] = $this->ManageuserSystemModel->getadminstaffpermissionbyid($data['user_id']);
        // echo '<pre>'; print_r( $data['adminstaffpermission']); 
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageuser/manageuserpermissiondetials', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function createpermission() {
        $data['alladminstaff'] = $this->ManageuserSystemModel->alladminstaff();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageuser/adduserpermission', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function insertpermission() {
        //echo '<pre>';        print_r($_SESSION); exit;
        $this->form_validation->set_rules('userid', 'User Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('createpermission');
        } else {
            $data = array();
            $dateNow = date('Y-m-d H:i');
            $data['powerlaw_staff_id'] = $_POST['userid'];
            $data['task'] = $_POST['task'];
            $data['contact'] = $_POST['contact'];
            $data['calender'] = $_POST['calender'];
            $data['cases'] = $_POST['cases'];
            $data['document'] = $_POST['document'];
            $data['billing'] = $_POST['billing'];
            $data['report'] = $_POST['report'];
            $data['message'] = $_POST['message'];
            $data['comment'] = $_POST['comment'];
            $data['created_by'] = $_SESSION['admin_id'];
            $data['created_date'] = strtotime($dateNow);
            $data['updated_date'] = strtotime($dateNow);
            //print_r($data); exit; 
            $this->db->insert('powerlaw_permission_table', $data);
            $permission_id = $this->db->insert_id();
            if ($permission_id) {
                $this->session->set_flashdata('success', 'Staff Permission set Successfully');
                redirect('manageuserpermission');
            } else {
                $this->session->set_flashdata('error', 'Staff Permission set is not Complete. Re try again');
                redirect('createpermission');
            }
        }
    }

    public function updateadminuserpermission() {
        //print_r($_POST);
        $user_id = $_POST['user_id'];
        $value = $_POST['value'];
        $permissionName = $_POST['permissionName'];
        $updatepermisssion = $this->ManageuserSystemModel->setuserpermission($user_id, $value, $permissionName);
        $json = array();
        if ($updatepermisssion) {
            $json['permission'] = 1;
        } else {
            $json['permission'] = 0;
        }
        echo json_encode($json);
    }

    public function manageuserpdfreportgenerate() {
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('admin');
        } else {
            $data['alluserinfo'] = $this->ManageuserSystemModel->getalluserinfo();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/manageuser_pdf', $data, TRUE);
            $name = "Manageuser.pdf";
            $search = array("<div class=\"row\">", "<div class=\"col-lg-12\">", "<div class=\"col-md-5\">", "<div class=\"col-md-5 col-md-offset-2\">");
            $replace = array("<div style='width: 100%;'>", "<div style='width: 90%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");

            $html = str_replace($search, $replace, $html);
            $html = str_replace($search, $replace, $html);
            $mpdf->WriteHTML($html);
            $mpdf->Output($name, 'D');
            exit;
        }
    }

    public function manageuserexlreportgenerate() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Manageuser.csv";
        $query = "SELECT user.username, user.fullname, auth_assignment.item_name, user.email FROM user INNER JOIN auth_assignment ON auth_assignment.user_id=user.id";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function adminstaffpdfreportgenerate() {
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('admin');
        } else {
            $data['alladminstaff'] = $this->ManageuserSystemModel->alladminstaff();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/adminstaff_pdf', $data, TRUE);
            $name = "AdminStaff.pdf";
            $search = array("<div class=\"row\">", "<div class=\"col-lg-12\">", "<div class=\"col-md-5\">", "<div class=\"col-md-5 col-md-offset-2\">");
            $replace = array("<div style='width: 100%;'>", "<div style='width: 90%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");

            $html = str_replace($search, $replace, $html);
            $html = str_replace($search, $replace, $html);
            $mpdf->WriteHTML($html);
            $mpdf->Output($name, 'D');
            exit;
        }
    }

    public function adminstaffexlreportgenerate() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "AdminStaff.csv";
        $query = "SELECT powerlaw_admin.username,powerlaw_admin.fullname,powerlaw_admin.email,powerlaw_admin.Mobile FROM `powerlaw_admin` WHERE type !='1' ";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function testmail() {
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/manageuser/testmail');
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

}
