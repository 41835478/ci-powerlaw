<?php

class MessageSystem extends CI_Controller {

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
        $this->load->model('MessageSystemModel');
        $this->load->model('SystemAdministratorModel');
        $this->load->model('ManageuserSystemModel');
        $this->load->model('TaskSystemModel');
    }

    public function inboxshow() {
        $data['messageInbox'] = $this->MessageSystemModel->getallinboxmsg();
        $data['messageDraft'] = $this->MessageSystemModel->getalldraftmsg();
        $data['messageArchive'] = $this->MessageSystemModel->getallarchivemsg();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/message/inbox', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function viewmsg() {
        $message_id = $this->uri->segment('2');
        $data['messageview'] = $this->MessageSystemModel->getmsgbyid($message_id);
        $data['allmessageview'] = $this->MessageSystemModel->getallmsgbyid($message_id);
        //echo '<pre>'; print_r($data['messageview']); exit; 
        $data['messageDraft'] = $this->MessageSystemModel->getalldraftmsg();
        $data['messageArchive'] = $this->MessageSystemModel->getallarchivemsg();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/message/viewmsg', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function getallsitecaseinfoformsg() {
        $caseinfo = $this->TaskSystemModel->getallcasedata();
        $html = '<div class="controls"><select id="case_select" class="form-control" style="width: 229px;" open>';
        foreach ($caseinfo as $case) {
            $html .= "<option onclick='getmessagebycaseid(" . $case['CaseId'] . ")' value=" . $case['CaseId'] . ">" . $case['CaseName'] . "</option>";
        }
        $html .= '</select></div>';
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function getallmessagebycaseinfo() {
        //print_r($_POST); 
        $case_id = $_POST['case_id'];
        $msginfo = $this->MessageSystemModel->getallmessagedatabycaseid($case_id);
       // echo '<pre>'; print_r($msginfo);  exit;
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Message From</th><th>Message To</th><th>Subject</th><th>Case Name</th><th>Date</th><th class='action-column'>Action</th></tr></thead><tbody>";
        
        foreach ($msginfo as $msg) {
            $date = date('d F, Y', strtotime($msg['SentOn']));
            $baseUrl = base_url();
            $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($msg['MessageFrom']);
            $user1 = $usereditinfo->fullname;
            $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($msg['MessageTo']);
            $user2 = $usereditinfo->fullname;
            $date = date('d F, Y', strtotime($msg['SentOn']));
            $msglogo = 'http://localhost/mypowerLaw/assets/image/msg.png';


            $html .="<tr><td><img src='" . $msglogo . "'></td><td>" . $user1 . "</td>";
            $html .="<td>" . $user2 . "</td>";
            $html .="<td><a href='" . $baseUrl . "'viewmsg/" . $msg['MessageId'] . ">" . $msg['Subject'] . "</a></td>";
            $html .="<td><a href='" . $baseUrl . "'viewcaseadmin/" . $msg['CaseId'] . $msg['CaseName'] . "</a></td>";
            $html .="<td>" . $date . "</td>";
            $html .="<td><a href='" . $baseUrl . "'viewmsg/" . $msg['MessageId'] . "title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
            $html .="</td></tr>";
        }
        
        $html .="</tbody></table>";

        $json = array();
        $json['msgdiv'] = $html;
        echo json_encode($json);
    }

    public function addgroupbymsg() {
        $msg_id = $this->uri->segment('2');
        $message = $_POST['Content'];
        $data = array();
        $date = date('Y-m-d h:m:s');
        $data['MessageFrom'] = $_SESSION['admin_id'];
        $data['MessageTo'] = $_POST['MessageTo'];
        $data['Subject'] = $_POST['Subject'];
        $data['Content'] = $message;
        $data['CaseId'] = $_POST['CaseId'];
        $data['SentOn'] = $date;
        $data['Status'] = '1';
        $data['FirmId'] = $_POST['FirmId'];
        $data['group_by'] = $msg_id;
        $insert = $this->db->insert('tbl_message', $data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Message Sent Successfully');
            redirect('viewmsg/' . $msg_id);
        } else {
            $this->session->set_flashdata('error', 'Message Sent is not Complete. Re try again');
            redirect('viewmsg/' . $msg_id);
        }
    }

    public function caseLinkAutocomplete() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $tags_info = $this->MessageSystemModel->getallcaseForAutocomplete($q);
            $json = array();
            echo json_encode($tags_info);
        }
    }

    public function sentToEmailAutocomplete() {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $tags_info = $this->MessageSystemModel->getalluserForAutocomplete($q);
            $json = array();
            echo json_encode($tags_info);
        }
    }

    public function insertnewmessage() {
        //echo '<pre>'; print_r($_POST);
        //$msg_id = $this->uri->segment('2');
        $message = $_POST['msgContent'];
        $sentuserdata = $this->MessageSystemModel->getsentuserdata($_POST['sent_to']);
        $messageTo = $sentuserdata->id;

        $casedata = $this->MessageSystemModel->getcasedata($_POST['case_link']);
        $caseId = $casedata->CaseId;
        $FirmId = $casedata->FirmId;

        $data = array();
        $date = date('Y-m-d h:m:s');
        $data['MessageFrom'] = $_SESSION['admin_id'];
        $data['MessageTo'] = $messageTo;
        $data['Subject'] = $_POST['subject'];
        $data['Content'] = $message;
        $data['CaseId'] = $caseId;
        $data['SentOn'] = $date;
        $data['Status'] = '1';
        $data['FirmId'] = $FirmId;
        //$data['group_by'] = $msg_id;
        //print_r($data); exit; 
        $this->db->insert('tbl_message', $data);
        $message_id = $this->db->insert_id();
        if ($message_id) {
            $this->db->set('group_by', $message_id);
            $this->db->where('MessageId', $message_id);
            $update = $this->db->update('tbl_message');
            if ($update) {
                $this->session->set_flashdata('success', 'Message Insert Successfully');
                redirect('inboxmsg');
            } else {
                $this->session->set_flashdata('error', 'Message Insert is not Complete. Re try again');
                redirect('inboxmsg');
            }
        } else {
            $this->session->set_flashdata('error', 'Message Insert is not Complete. Re try again');
           redirect('inboxmsg');
        }
    }

}
