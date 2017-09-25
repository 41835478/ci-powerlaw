<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dropzone extends CI_Controller {
  
    public function __construct() {
       parent::__construct();
       $this->load->helper(array('url','html','form'));
         $this->load->library('form_validation');
        $this->load->library("pagination");
    $this->load->helper(array('form', 'url')); 
        $this->load->library('encryption');
         $this->load->library('session'); 
         $this->load->helper('form'); 
         $this->load->library('email');
         $this->load->library('upload');
    }
 
    public function index() {
        $this->load->view('dropzone_view');
    }
    
    public function upload() {
        
        $data['toEmail']=$this->input->post('toEmail');
        
          $this->form_validation->set_rules('toEmail','toEmail', 'required', array(
            'required' => "To Email Is Required",
                )
        );
        
         if ($this->form_validation->run() == true) {
        
        if (!empty($_FILES)) {
        
           $total= count($_FILES['fields']['name']); 
         for ($i=0; $i<$total; $i++) {
        
          $tempFile= $_FILES['fields']['tmp_name'][$i];
          $fileName= $_FILES['fields']['name'][$i];
           $targetPath = getcwd() . '/uploads/';
             $targetFile = $targetPath . $fileName ;
              move_uploaded_file($tempFile, $targetFile);  
             $this->email->attach($targetFile);
    }
         $toEmail=$this->input->post('toEmail');
        $mailSubject=$this->input->post('mailSubject');
        $mailBody=$this->input->post('mailBody');
        $mailAttachment=$this->input->post('fields');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'iubat.sathy@gmail.com';
        $config['smtp_pass']    = 'sabinayesmin';
        $config['charset']    = 'iso-8859-1';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validate'] = TRUE;  
         $this->email->initialize($config);
      $this->email->from('iubat.sathy45@gmail.com', 'myname');
        $this->email->to($toEmail); 

        $this->email->subject($mailSubject);
        $this->email->message($mailBody);  
         

        $this->email->send();
        if($this->email->print_debugger()){
        echo $this->email->print_debugger();
        }
        $this->session->set_flashdata('val_success', "Your Message has been sent");
        redirect(base_url() . 'compose');
        }
         }else{
              $this->session->set_flashdata('val_error', validation_errors());
               redirect(base_url() . 'compose');
         }
    }
}


