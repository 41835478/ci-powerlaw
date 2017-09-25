<?php

class Comment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('user_id') == null) {
            redirect('/');
        }
        $this->load->helper('rspowerlaw_helper');
        $check = is_comment();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->model('CommentModel');
        $this->load->model('SiteModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
    }

    public function allcomment() {
        $logged_id = $this->session->userdata('user_id');
        $data['logged_id'] = $logged_id;
        $data['astaff'] = $this->CommentModel->astaff($logged_id);

        $data['allCases'] = $this->CommentModel->allCases();
        $data['allComment'] = $this->CommentModel->allCommentget($logged_id);
        // $data['allReply'] = $this->CommentModel->allReply($logged_id,$logged_id);

        $data['pagetitle'] = 'All Comment';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/Comment/all_comment', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function get_comment_details() {
        $commentid = $this->input->post('commentid');
        $data['aComment'] = $this->CommentModel->aCommentget($commentid);
        $this->CommentModel->aCommentstatus($commentid);
        $user_id = $data['aComment']->user_id;
        $case_id = $data['aComment']->case_id;
        $data['astaff'] = $this->CommentModel->astaff($user_id);
        // print_r($data['astaff']); die();
        $data['acase'] = $this->CommentModel->acase($case_id);
        $casename = $data['acase']->CaseName;
        $data['allreply'] = $this->CommentModel->allreply($user_id, $commentid);
        $json['mycom'] = $this->load->view('lawyer/comment/comment_with_reply', $data);
        echo json_encode($json);
    }

    public function get_comment_details_with_reply() {
        $commentid = $this->input->post('commentid');
        $data['comment'] = $this->input->post('reply');
        $data['case_id'] = $this->input->post('caseid');
        $data['user_id'] = $this->input->post('userid');
        $data['group_by'] = $this->input->post('commentid');
        $this->CommentModel->insertreply($data);
        $insert_id = $this->db->insert_id();
        $this->get_comment_details($data, TRUE);
    }

    public function unreadcomment() {
        $logged_id = $this->session->userdata('user_id');
        $data['logged_id'] = $logged_id;
        $data['astaff'] = $this->CommentModel->astaff($logged_id);

        $data['allCases'] = $this->CommentModel->allCases();
        $data['allUnreadComment'] = $this->CommentModel->allUnreadCommentget($logged_id);
        // $data['allReply'] = $this->CommentModel->allReply($logged_id,$logged_id);
        $data['pagetitle'] = 'All Unread Comment';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/comment/all_unread_comment', $data);
        $this->load->view('admin_template/footerlink');
    }

    public function get_unread_comment_details() {
        $commentid = $this->input->post('commentid');
        $data['aComment'] = $this->CommentModel->aCommentget($commentid);
        $this->CommentModel->aCommentstatus($commentid);
        $user_id = $data['aComment']->user_id;
        $case_id = $data['aComment']->case_id;
        $data['astaff'] = $this->CommentModel->astaff($user_id);
        // print_r($data['astaff']); die();
        $data['acase'] = $this->CommentModel->acase($case_id);
        $casename = $data['acase']->CaseName;
        $data['allreply'] = $this->CommentModel->allreply($user_id, $commentid);
        $json['mycom'] = $this->load->view('lawyer/comment/comment_with_reply', $data);
        echo json_encode($json);
    }

}
