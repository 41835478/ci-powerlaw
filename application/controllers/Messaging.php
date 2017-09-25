<?php

class Messaging extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_message();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->helper(array('form', 'url'));
        $this->load->library('encryption');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('email');
        $this->load->library('upload');
        $this->load->model('MessageModel');
        $this->load->model('SiteModel');
    }

    public function compose() {
        $id = $this->session->userdata('user_id');
        $data['allUser'] = $this->MessageModel->allUser($id);
        $data['allCses'] = $this->MessageModel->allCses();
        $this->load->view('admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/composeform', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function inbox() {

        $login_id = $this->session->userdata('user_id');
        $forfirmid = $this->MessageModel->forfirmid($login_id);
        $firmid = $forfirmid->FirmId;
        $data['messageList'] = $this->MessageModel->getInbox($login_id);
        $data['getarchived'] = $this->MessageModel->getarchived($login_id);
        $data['allUsermessageList'] = $this->MessageModel->allUsermodi($login_id, $firmid);
        $data['messageListdraft'] = $this->MessageModel->getDraft($login_id);
        $data['sentlist'] = $this->MessageModel->getSENT($login_id);
        $data['allCASE'] = $this->MessageModel->allCASE($login_id);
        $data['allUser'] = $this->MessageModel->allUsermodi($login_id,$firmid);
        //echo '<pre>'; print_r($data['messageList']);
       // die();
        // $data['alluser'] = $this->MessageModel->getuserinfobyid();
        $data['pagetitle'] = 'Inbox';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/inbox', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function getallcasebyuserid() {
        $userid = $_SESSION['user_id'];
        $caseinfo = $this->MessageModel->getallcasedata($userid);
        $html = '<div class="controls"><select id="case_select" class="form-control" style="width: 229px;" open>';
        foreach ($caseinfo as $case) {
            $html .= "<option onclick='getmessagebycaseid(" . $case['CaseId'] . ")' value=" . $case['CaseId'] . ">" . $case['CaseName'] . "</option>";
        }
        $html .= '</select></div>';
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function getallmessagebycaseinfobyuserid() {
        //print_r($_POST); 
        $case_id = $_POST['case_id'];
        $msginfo = $this->MessageModel->getallmessagedatabycaseid($case_id);
        //print_r($msginfo);
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th></th><th>Message From</th><th>Message To</th><th>Subject</th><th>Case Name</th><th>Date</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($msginfo)) {
            foreach ($msginfo as $msg) {
                $date = date('d F, Y', strtotime($msg['SentOn']));
                $baseUrl = base_url();
                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($msg['MessageFrom']);
                $user1 = $usereditinfo->fullname;
                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($msg['MessageTo']);
                $user2 = $usereditinfo->fullname;
                $date = date('d F, Y', strtotime($msg['SentOn']));
                $msglogo = 'http://localhost/mypowerLaw/assets/image/msg.png';


                $html .= "<tr><td><img src='" . $msglogo . "'></td><td>" . $user1 . "</td>";
                $html .= "<td>" . $user2 . "</td>";
                $html .= "<td><a href='" . $baseUrl . "'viewmsg/" . $msg['MessageId'] . ">" . $msg['Subject'] . "</a></td>";
                $html .= "<td><a href='" . $baseUrl . "'viewcaseadmin/" . $msg['CaseId'] . $msg['CaseName'] . "</a></td>";
                $html .= "<td>" . $date . "</td>";
                $html .= "<td><a href='" . $baseUrl . "'viewmsg/" . $msg['MessageId'] . "title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "</td></tr>";
            }
        } else {
            $html .= "<tr><td colspan='7'><p>There are no data according your criteria</p></td></tr>";
        }
        $html .= "</tbody></table>";

        $json = array();
        $json['msgdiv'] = $html;
        echo json_encode($json);
    }

    public function inboxshow() {
        $login_id = $this->session->userdata('user_id');
        $forfirmid = $this->MessageModel->forfirmid($login_id);
        $firmid = $forfirmid->FirmId;
        $data['messageList'] = $this->MessageModel->getInbox($login_id);
        $data['getarchived'] = $this->MessageModel->getarchived($login_id);
        $data['allUser'] = $this->MessageModel->allUsermodi($login_id, $firmid);
        $data['messageListdraft'] = $this->MessageModel->getDraft($login_id);
        $data['sentlist'] = $this->MessageModel->getSENT($login_id);
        $data['allCASE'] = $this->MessageModel->allCASE($login_id);
        $data['pagetitle'] = 'Show Inbox';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/inbox', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function viewmsg() {
        $message_id = $this->uri->segment('2');
        $data['messageview'] = $this->MessageModel->getmsgbyid($message_id);
        $data['allmessageview'] = $this->MessageModel->getallmsgbyid($message_id);
        $data['messageDraft'] = $this->MessageModel->getalldraftmsg();
        $data['messageArchive'] = $this->MessageModel->getallarchivemsg();
        $data['pagetitle'] = 'View Message';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/viewmsg', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function addgroupbymsg() {
        //print_r($_POST); exit; 
        $msg_id = $this->uri->segment('2');
        $message = $_POST['Content'];
        $data = array();
        $date = date('Y-m-d h:m:s');
        $data['MessageFrom'] = $_SESSION['user_id'];
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
            redirect('atviewmsg/' . $msg_id);
        } else {
            $this->session->set_flashdata('error', 'Message Sent is not Complete. Re try again');
            redirect('atviewmsg/' . $msg_id);
        }
    }

    public function insertnewmessage() {
        $login_id = $this->session->userdata('user_id');
        $getuserinfobyid = $this->MessageModel->getuserinfobyid($login_id);
        $firmid = $getuserinfobyid->FirmId;

        $contact = $this->MessageModel->contactandfirm($login_id);
        // print_r($contact); die();
        $firmcontact = $this->MessageModel->firmcontact($firmid);
        if (array_key_exists('contest', $_POST) || array_key_exists('firmtest', $_POST)) {
            if (array_key_exists('contest', $_POST) && array_key_exists('firmtest', $_POST)) {
                foreach ($contact as $acontact) {
                    $message = $_POST['msgContent'];
                    $login_id = $this->session->userdata('user_id');
                    $forfirmid = $this->MessageModel->forfirmid($login_id);
                    $firmid = $forfirmid->FirmId;
                    $data = array();
                    $date = date('Y-m-d h:m:s');
                    $data['MessageFrom'] = $_SESSION['user_id'];
                    $data['MessageTo'] = $acontact->ContactId;
                    $data['Subject'] = $_POST['subject'];
                    $data['Content'] = $message;
                    $data['CaseId'] = $_POST['caseid'];
                    $data['SentOn'] = $date;
                    $data['Status'] = '1';
                    $data['FirmId'] = $firmid;
                    $this->db->insert('tbl_message', $data);
                    $message_id = $this->db->insert_id();
                    if ($message_id) {
                        $this->db->set('group_by', $message_id);
                        $this->db->where('MessageId', $message_id);
                        $update = $this->db->update('tbl_message');
                    }
                }
                foreach ($firmcontact as $afirmcontact) {
                    $message = $_POST['msgContent'];
                    $login_id = $this->session->userdata('user_id');
                    $forfirmid = $this->MessageModel->forfirmid($login_id);
                    $firmid = $forfirmid->FirmId;
                    $data = array();
                    $date = date('Y-m-d h:m:s');
                    $data['MessageFrom'] = $_SESSION['user_id'];
                    $data['MessageTo'] = $afirmcontact->id;
                    $data['Subject'] = $_POST['subject'];
                    $data['Content'] = $message;
                    $data['CaseId'] = $_POST['caseid'];
                    $data['SentOn'] = $date;
                    $data['Status'] = '1';
                    $data['FirmId'] = $firmid;
                    $this->db->insert('tbl_message', $data);
                    $message_id = $this->db->insert_id();
                    if ($message_id) {
                        $this->db->set('group_by', $message_id);
                        $this->db->where('MessageId', $message_id);
                        $update = $this->db->update('tbl_message');
                    }
                }

                $this->session->set_flashdata('success', 'Message Insert Successfully');
                redirect('messageing/inbox');
            } else {
                if (array_key_exists('contest', $_POST)) {
                    foreach ($contact as $acontact) {
                        $message = $_POST['msgContent'];
                        $login_id = $this->session->userdata('user_id');
                        $forfirmid = $this->MessageModel->forfirmid($login_id);
                        $firmid = $forfirmid->FirmId;
                        $data = array();
                        $date = date('Y-m-d h:m:s');
                        $data['MessageFrom'] = $_SESSION['user_id'];
                        $data['MessageTo'] = $acontact->ContactId;
                        $data['Subject'] = $_POST['subject'];
                        $data['Content'] = $message;
                        $data['CaseId'] = $_POST['caseid'];
                        $data['SentOn'] = $date;
                        $data['Status'] = '1';
                        $data['FirmId'] = $firmid;
                        $this->db->insert('tbl_message', $data);
                        $message_id = $this->db->insert_id();
                        if ($message_id) {
                            $this->db->set('group_by', $message_id);
                            $this->db->where('MessageId', $message_id);
                            $update = $this->db->update('tbl_message');
                        }
                    }
                    $this->session->set_flashdata('success', 'Message Insert Successfully');
                    redirect('messageing/inbox');
                } else {
                    foreach ($firmcontact as $afirmcontact) {
                        $message = $_POST['msgContent'];
                        $login_id = $this->session->userdata('user_id');
                        $forfirmid = $this->MessageModel->forfirmid($login_id);
                        $firmid = $forfirmid->FirmId;
                        $data = array();
                        $date = date('Y-m-d h:m:s');
                        $data['MessageFrom'] = $_SESSION['user_id'];
                        $data['MessageTo'] = $afirmcontact->id;
                        $data['Subject'] = $_POST['subject'];
                        $data['Content'] = $message;
                        $data['CaseId'] = $_POST['caseid'];
                        $data['SentOn'] = $date;
                        $data['Status'] = '1';
                        $data['FirmId'] = $firmid;
                        $this->db->insert('tbl_message', $data);
                        $message_id = $this->db->insert_id();
                        if ($message_id) {
                            $this->db->set('group_by', $message_id);
                            $this->db->where('MessageId', $message_id);
                            $update = $this->db->update('tbl_message');
                        }
                    }
                    $this->session->set_flashdata('success', 'Message Insert Successfully');
                    redirect('messageing/inbox');
                }
            }
            
            } else {
            $multi=$_POST['toEmail'];
            foreach($multi as $toemail ){
            $message = $_POST['msgContent'];
            $login_id = $this->session->userdata('user_id');
            $forfirmid = $this->MessageModel->forfirmid($login_id);
            $firmid = $forfirmid->FirmId;
            $data = array();
            $date = date('Y-m-d h:m:s');
            $data['MessageFrom'] = $_SESSION['user_id'];
            $data['MessageTo'] = $toemail;
            $data['Subject'] = $_POST['subject'];
            $data['Content'] = $message;
            $data['CaseId'] = $_POST['caseid'];
            $data['SentOn'] = $date;
            $data['Status'] = '1';
            $data['FirmId'] = $firmid;
            $this->db->insert('tbl_message', $data);
            $message_id = $this->db->insert_id();
            if ($message_id) {
                $this->db->set('group_by', $message_id);
                $this->db->where('MessageId', $message_id);
                $update = $this->db->update('tbl_message');
               
            } 
      }
      $this->session->set_flashdata('success', 'Message Insert Successfully');
                    redirect('messageing/inbox');
            }
            
            
//        } else {
//            $message = $_POST['msgContent'];
//            $login_id = $this->session->userdata('user_id');
//            $forfirmid = $this->MessageModel->forfirmid($login_id);
//            $firmid = $forfirmid->FirmId;
//            $data = array();
//            $date = date('Y-m-d h:m:s');
//            $data['MessageFrom'] = $_SESSION['user_id'];
//            $data['MessageTo'] = $_POST['toEmail'];
//            $data['Subject'] = $_POST['subject'];
//            $data['Content'] = $message;
//            $data['CaseId'] = $_POST['caseid'];
//            $data['SentOn'] = $date;
//            $data['Status'] = '1';
//            $data['FirmId'] = $firmid;
//            $this->db->insert('tbl_message', $data);
//            $message_id = $this->db->insert_id();
//            if ($message_id) {
//                $this->db->set('group_by', $message_id);
//                $this->db->where('MessageId', $message_id);
//                $update = $this->db->update('tbl_message');
//                if ($update) {
//                    $this->session->set_flashdata('success', 'Message Insert Successfully');
//                    redirect('messageing/inbox');
//                } else {
//                    $this->session->set_flashdata('error', 'Message Insert is not Complete. Re try again');
//                    redirect('messageing/inbox');
//                }
//            } else {
//                $this->session->set_flashdata('error', 'Message Insert is not Complete. Re try again');
//                redirect('messageing/inbox');
//            }
//        }
    }

    public function getcases() {
        $userid = $_POST['userid'];
        $casedata = $this->MessageModel->getcases($userid);
        $allcase = $this->MessageModel->allcaseopen();
        $case = '<label class="control-label" for="">Case Link</label><select id="case_select" name="caseid" class="form-control" open>';
        foreach ($casedata as $acasedata) {
            $case .= "<option value=" . $acasedata->caseId . ">";
            foreach ($allcase as $acase) {
                if ($acasedata->caseId == $acase->CaseId) {
                    $case .= $acase->CaseName;
                }
            }
        }
        $case .= "</option>";
        $case .= '</select>';
        echo $case;
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $this->MessageModel->delete($id);
        $this->session->set_flashdata('insertsuccess', 'Message successfully deleted');
        redirect('messageing/inbox');
    }

}
