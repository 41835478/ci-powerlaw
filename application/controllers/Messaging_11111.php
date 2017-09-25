<?php

class Messaging extends CI_Controller {
    function __construct() { 
         parent::__construct(); 
         $this->load->helper('rspowerlaw_helper');
        $check = is_message();
        $login = is_login();
        if($check && $login){
            
        } else {
            redirect('permission_error');
        }
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->helper(array('form', 'url'));
        $this->load->library('encryption');
        $this->load->library('session');
        if ($this->session->userdata('user_id') == null) {
            redirect('/');
        }
        $this->load->helper('form');
        $this->load->library('email');
        $this->load->library('upload');
        $this->load->model('MessageModel');
        $this->load->model('SiteModel');
        
    } 
        public function compose() {
         $id=  $this->session->userdata('user_id');
        $data['allUser'] = $this->MessageModel->allUser($id);
        $data['allCses'] = $this->MessageModel->allCses();
        $data['pagetitle'] = 'Message';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/composeform',$data);
        $this->load->view('admin_template/footerlink');
    }
    public function inbox() {
  
        $login_id=$this->session->userdata('user_id');
	$data['messageList'] = $this->MessageModel->getInbox($login_id);

	$data['pagetitle'] = 'Inbox';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/inbox',$data);
        $this->load->view('admin_template/footerlink');
    
    }
     public function details() {

        $login_id=$this->session->userdata('user_id');
         $id = $this->uri->segment(3);
         $checkurl=$this->MessageModel->details($id);
         if($checkurl){
             if($checkurl->MessageTo==$login_id){
	$data['details'] = $this->MessageModel->details($id);
        $userid=$data['details']->MessageTo;
        $caseid=$data['details']->CaseId;
        $data['Casedetails'] = $this->MessageModel->Casedetails($caseid);
        $data['UserDetail'] = $this->MessageModel->UserDetail($userid);
        //print_r( $data['Casedetails']); die();
         $data['reply'] = $this->MessageModel->reply($id,$login_id);
	$data['pagetitle'] = 'Message Details';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/details',$data);
        $this->load->view('admin_template/footerlink');
         }else{
              $this->load->view('error/clean404/errorindex');
         }}else{
           $this->load->view('error/clean404/errorindex');
    }
    }
   
 public function send() {   
     $loginid=$this->session->userdata('user_id');
           $this->form_validation->set_rules('toEmail', 'To Email', 'required',
             array('required' => "Send To can't be blank") 
            );
            $this->form_validation->set_rules('mailSubject', ' Subject', 'required',
             array('required' => "Subject can't be blank") 
            );
             $this->form_validation->set_rules('messagebody', 'Message Body', 'required',
             array('required' => "Initial message can't be blank") 
            );
       
          if ($this->form_validation->run() == FALSE)
        {
         $this->compose();
        }
        else
        {
        $data['MessageTo']= $this->input->post('toEmail');
        $data['Subject']= $this->input->post('mailSubject');
        $data['Content']= $this->input->post('messagebody');
        $data['CaseId']= $this->input->post('cases');
        //28
        if( $data['CaseId']){
            $caseData= $this->MessageModel->getFirm($data['CaseId']);
        }
        if($caseData->FirmId){
              $data['FirmId']=$caseData->FirmId;
        }else{
             $data['FirmId']='';
        }
        $data['MessageFrom']=$loginid;
        $data['Status']=1;
        $data['group_by']=$loginid;
        
        $data['SentOn']=date('Y-m-d H:i:s');
        //print_r($data); die();
        $this->MessageModel->addmessage($data);
        $this->session->set_flashdata('insertsuccess', 'Your message has been sent!');
         redirect('messageing/inbox');
        }
        }

     public function reply() {   
           $loginid=$this->session->userdata('user_id');
           $id= $this->input->post('id');
             $this->form_validation->set_rules('messagebody', 'Message Body', 'required',
             array('required' => "Initial message can't be blank") 
            );
       
          if ($this->form_validation->run() == FALSE)
        {
         redirect('message/details/'.$id); 
        }
        else
        {
       
        $data['MessageTo']= $this->input->post('toEmail');
        $data['Subject']= $this->input->post('subject');
        $data['Content']= $this->input->post('messagebody');
        $data['CaseId']= $this->input->post('caseId');
        $data['MessageFrom']=$loginid;
        $data['Status']=1;
        $data['group_by']=$this->input->post('id');
        
        $data['SentOn']=date('Y-m-d H:i:s');
        //print_r($data); die();
        $this->MessageModel->addmessage($data);
        $this->session->set_flashdata('insertsuccess', 'Your message has been sent!');
         redirect('message/details/'.$id);

        }

        }
        
        
        
         public function archived() {
        $login_id=$this->session->userdata('user_id');
	$data['getarchived'] = $this->MessageModel->getarchived($login_id);

	$data['pagetitle'] = 'Archived';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/archived',$data);
        $this->load->view('admin_template/footerlink');
    }

     public function delete() {
        $id = $this->uri->segment(3);
	 $this->MessageModel->delete($id);
          $this->session->set_flashdata('insertsuccess', 'Message successfully deleted');
            redirect('messageing/inbox');
    }

     

        public function archivedmessagedetails() {

        $login_id=$this->session->userdata('user_id');
         $id = $this->uri->segment(3);
         $checkurl=$this->MessageModel->details($id);
         if($checkurl){
             if($checkurl->MessageTo==$login_id){
	$data['details'] = $this->MessageModel->details($id);
        $userid=$data['details']->MessageTo;
        $caseid=$data['details']->CaseId;
        $data['Casedetails'] = $this->MessageModel->Casedetails($caseid);
        $data['UserDetail'] = $this->MessageModel->UserDetail($userid);
        //print_r( $data['Casedetails']); die();
         $data['reply'] = $this->MessageModel->reply($id,$login_id);
	$data['pagetitle'] = 'Archive Message details';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/archivedetails',$data);
        $this->load->view('admin_template/footerlink');
         }else{
              $this->load->view('error/clean404/errorindex');
         }}else{
           $this->load->view('error/clean404/errorindex');
    }
    } 
    
    
    public function draft() {   
     $loginid=$this->session->userdata('user_id');
           
        $data['MessageTo']= $this->input->post('toEmail');
        $data['Subject']= $this->input->post('mailSubject');
        $data['Content']= $this->input->post('messagebody');
        $data['CaseId']= $this->input->post('cases');
        $data['MessageFrom']=$loginid;
        $data['Status']=2;
        $data['group_by']=$loginid;
        
        $data['SentOn']=date('Y-m-d H:i:s');
        //print_r($data); die();
        $this->MessageModel->draftmessage($data);
        echo 'Message Successfully Saved';
    
        
        }
        //28
        public function draftshow() {
           
        $login_id=$this->session->userdata('user_id');
	$data['messageList'] = $this->MessageModel->getDraft($login_id);
        $data['pagetitle'] = 'Draft';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/draft',$data);
        $this->load->view('admin_template/footerlink');
    
    }
//28
    
     public function draftsend() {
          $login_id=$this->session->userdata('user_id');
          $id = $this->uri->segment(3);
          $checkurl=$this->MessageModel->checkexisturl($id);
         
          if($checkurl){
              
              if($login_id==$checkurl->MessageFrom){
        
          $data['amessage'] =$checkurl;
        $data['allUser'] = $this->MessageModel->allUser($id);
        $data['allCses'] = $this->MessageModel->allCses();
        $data['pagetitle'] = 'Draft Send';
        $this->load->view('admin_template/headerlink', $data);
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/messaging/composedraftform',$data);
        $this->load->view('admin_template/footerlink');
          }else{
               $this->load->view('error/clean404/errorindex');
          }}else{
                $this->load->view('error/clean404/errorindex');
          }
         
    }
    //28
  
     public function senddrat() {   
     $loginid=$this->session->userdata('user_id');
           $this->form_validation->set_rules('toEmail', 'To Email', 'required',
             array('required' => "Send To can't be blank") 
            );
            $this->form_validation->set_rules('mailSubject', ' Subject', 'required',
             array('required' => "Subject can't be blank") 
            );
             $this->form_validation->set_rules('messagebody', 'Message Body', 'required',
             array('required' => "Initial message can't be blank") 
            );
       
          if ($this->form_validation->run() == FALSE)
        {
         $this->compose();
        }
        else
        {
            $id=$this->input->post('mailid');
        $data['MessageTo']= $this->input->post('toEmail');
        $data['Subject']= $this->input->post('mailSubject');
        $data['Content']= $this->input->post('messagebody');
        $data['CaseId']= $this->input->post('cases');
        $data['MessageFrom']=$loginid;
        $data['Status']=1;
        $data['group_by']=$loginid;
        
        $data['SentOn']=date('Y-m-d H:i:s');
        //print_r($data); die();
        $this->MessageModel->updatemessagedraft($data,$id);
        $this->session->set_flashdata('insertsuccess', 'Your message has been sent!');
         redirect('messageing/draft');
        }
        }
}