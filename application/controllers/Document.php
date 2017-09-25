<?php

class Document extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_document();
        $login = is_login();
        if($check && $login){
            
        } else {
            redirect('permission_error');
        }
        $this->load->model('TaskModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('TaskSystemModel');
        $this->load->model('DocumentModel');
        $this->load->model('SiteModel');
    }

    public function frontdocumentblankpage() { 
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $data['caselink'] = $this->DocumentModel->getcaselinkbyuserid($user_id);
            $this->load->view('powerlawadmin/admin_template/headerlink');
            // $this->load->view('admin_template/header');
            $this->load->view('lawyer/document/blankpage', $data);
            // $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function savetemplate() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $docdate = date('Y-m-d');
            if ($_POST['savetype'] == '2') {
                $data = array();
                $data['DocName'] = $_POST['documentname'];
                $data['Description'] = $_POST['description'];
                $data['SaveType'] = $_POST['savetype'];
                $data['TemplateData'] = $_POST['Content'];
                $data['CreatedBy'] = $user_id;
                $data['CreatedDate'] = $docdate;
                $data['EditedDate'] = $docdate;
                $data['Status'] = '1';

                $insert = $this->db->insert('tbl_document_template', $data);
            } else if ($_POST['savetype'] == '1') {
                $docname = $_POST['documentname'];
                //create pdf
                $data['TemplateData'] = $_POST['Content'];
                $this->load->library('MPDF/mpdf');
                $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
                $mpdf->useOnlyCoreFonts = true;    // false is default
                $mpdf->SetProtection(array('print'));
                $mpdf->SetTitle('My Power Law');
                $mpdf->SetAuthor('fouzia');
                $mpdf->SetDisplayMode('fullpage');
                $html .= $this->load->view('lawyer/document/blankpdf.php', $data, TRUE);
                $name = $docname . ".pdf";
                $search = array("<div class=\"row\">", "<div class=\"col-lg-12\">", "<div class=\"col-md-5\">", "<div class=\"col-md-5 col-md-offset-2\">");
                $replace = array("<div style='width: 100%;'>", "<div style='width: 90%; float: left;'>", "<div style='width: 40%; float: left;'>", "<div style='width: 40%; float: right;'>");

                $html = str_replace($search, $replace, $html);
                $html = str_replace($search, $replace, $html);
                $mpdf->WriteHTML($html);
                ob_clean();
                $finalpdf = $mpdf->Output('upload/document/' . $name, 'F');
                //$finalpdf = $mpdf->Output($name, 'D');


                 $DocumentPath = 'upload/document/' . $name;
                $data1 = array();
                $data1['OriginalName'] = $name;
                $data1['DocumentName'] = $_POST['documentname'];
                $data1['CaseId'] = $_POST['casename'];
                $data1['Template'] = 'Yes';
                $data1['DocumentPath'] = $DocumentPath;
                $data1['UploadMethod'] = 'Upload';
                $data1['UploadedBy'] = $user_id;
                $data1['UploadedOn'] = $docdate;
                $data1['read_status'] = '0';
                $insert = $this->db->insert('tbl_document', $data1);
            }
            if ($insert) {
                $this->session->set_flashdata('success', 'Document Inserted Successfully');
                redirect('casedoc');
            } else {
                $this->session->set_flashdata('error', 'Document Insert is not Complete. Re try again');
                redirect('casedoc');
            }
        } else {
            redirect('loginform');
        }
    }

    public function casedoc() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $data['alldocinfo'] = $this->DocumentModel->getalldocinfobyuserid($user_id);
            $data['allassignedcases'] = $this->DocumentModel->allassignedcases($user_id);
            $this->load->view('powerlawadmin/admin_template/headerlink');
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/document/docsview', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }
//17
    public function unreaddocument() { 
           $user_id = $_SESSION['user_id'];
        $data['allunreaddocinfo'] = $this->DocumentModel->getfirmdocinfonew($user_id);
       // print_r($data['allunreaddocinfo']); die();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/document/unread_document', $data);
        $this->load->view('admin_template/footerlink');
       
    }
    public function editdoc() { 
        echo 'not ready';
       
    }
    public function viewdocs() { 
        $doc_id=$this->uri->segment(2) ;
        $useid=$_SESSION['user_id'];
        $data['forview'] = $this->DocumentModel->forview($doc_id);
      //  print_r($data['forview']->DocumentId);        print_r($doc_id);die();
        if($data['forview']->DocumentId==$doc_id){
            $accessto=$data['forview']->AccessTo;
            $accesstoid=explode(",",$accessto);
          // if(in_array($useid, $accesstoid)){
               $caseid= $data['forview']->CaseId;
               $userid= $data['forview']->UploadedBy;
                $data['casedetail'] = $this->DocumentModel->casedetail($caseid);
                $data['userdetail'] = $this->DocumentModel->userdetail($userid);
                $docid= $data['forview']->DocumentId;
                  $data['commentall'] = $this->DocumentModel->commentall($docid);
                   $data['alluser'] = $this->DocumentModel->alluser();
                $this->load->view('powerlawadmin/admin_template/headerlink');
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/document/document_details',$data);
                $this->load->view('admin_template/footerlink');
          // }else{
          //     $this->load->view('error/clean404/errorindex');
          //}
        }else{
             $this->load->view('error/clean404/errorindex');
        }
       
    }
     public function savecomment() {
        $useid = $_SESSION['user_id'];
        $data['case_id'] = $_POST['caseid'];
        $data['firmid'] = $_POST['firmid'];
        $data['documentId'] = $_POST['documentid'];
        $data['comment'] = $_POST['content'];
        $data['user_id'] = $useid;
        $data['status'] = 1;
        $now = new DateTime();
        $data['createdDate'] =$now->format('Y-m-d H:i:s'); 
        $this->DocumentModel->insertdoccomment($data);
        //$doc_id = $this->uri->segment(2);
        $useid = $_SESSION['user_id'];
        $data['forview'] = $this->DocumentModel->forview($data['documentId']);
        $caseid = $data['forview']->CaseId;
        $userid = $data['forview']->UploadedBy;
        $data['casedetail'] = $this->DocumentModel->casedetail($caseid);
        $data['userdetail'] = $this->DocumentModel->userdetail($userid);
        $docid = $data['forview']->DocumentId;
        $data['commentall'] = $this->DocumentModel->commentall($docid);
        $data['alluser'] = $this->DocumentModel->alluser();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/document/document_details', $data);
        $this->load->view('admin_template/footerlink');
    }
    public function firmdocument() { 
      
        $useid = $_SESSION['user_id'];
        $forfirm=$this->DocumentModel->forfirm($useid);
        $firmid=$forfirm->FirmId;
        $data['allfirmdoc'] = $this->DocumentModel->allfirmdoc($useid,$firmid);
        $data['alluser'] = $this->DocumentModel->alluser();
        $data['allcase'] = $this->DocumentModel->allcase();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/document/firmdocs',$data);
        $this->load->view('admin_template/footerlink');
    }
     public function blankDocuments() { 
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/document/blankpage');
         $this->load->view('admin_template/footerlink');
    }
    public function template() { 
       $useid = $_SESSION['user_id'];
        $forfirm=$this->DocumentModel->forfirm($useid);
        $firmid=$forfirm->FirmId;
        $data['alltemplate'] = $this->DocumentModel->alltemplate($useid);
        //print_r($data['alltemplate']); 
        $data['alluser'] = $this->DocumentModel->alluser();
        $data['allcase'] = $this->DocumentModel->allcase();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('admin_template/header');
        $this->load->view('lawyer/document/template',$data);
        $this->load->view('admin_template/footerlink');
    }
    
    
        public function get_assigned_stuff() { 
       $caseid = $this->input->post('caseid');
        $assigneduser = $this->DocumentModel->assigneduser($caseid);
        $assigneduserid = $this->DocumentModel->assigneduserid($caseid);
         $items = array();
       foreach($assigneduserid as $username) {
      $items[] = $username->staffId;
 }
$totalid= implode(",",$items);
        $html='<p>This item will be automatically shared with all firm users linked to dfgfgfg.</p><ul>';
        foreach($assigneduser as $a_assigneduser){
           $html.='<li>'.$a_assigneduser->fullname.'</li>' ;
           $html.='<input type="hidden" name="assignedstaff[]" value="';
           $html.=$a_assigneduser->id;
           $html.='">';
        }
        $html.='</ul>' ;
        $html.='<input type="hidden" name="assignedstaffinonefield" id="newstaffall" value="';
        $html.=$totalid;
        $html.='">';
        echo $html;
    }
    
    
    
    
    
    
 
    
    
public function tryupload() { 
    $userid=$_SESSION['user_id'];
    $foldername=$this->input->post('hhh');
     $assignedstaff=$this->input->post('assignstaffid');
     $docname=$this->input->post('docnameid');
     $caseid=$this->input->post('caseidhi');

     
    $FirmIdfromuser=$this->DocumentModel->FirmIdfromuser($userid);
    $firmid=$FirmIdfromuser->FirmId;
  
     $folderdirectory="D:"."/Xampp/htdocs/mypowerLaw/upload/document".'/'.$foldername;
     if (!file_exists($folderdirectory)) {
    mkdir($folderdirectory, 0777, true);
    }
    foreach ($_FILES as $a_FILES) {
 $total=count($a_FILES['name']);
        for($i=0;$i<$total;$i++){
           $imgname= $a_FILES['name'][$i];
           $tmp_name= $a_FILES['tmp_name'][$i];
           $newpath=$folderdirectory.'/'.$imgname;
           move_uploaded_file($tmp_name,$newpath);
          $docpath='upload/document/'.$foldername.'/'.$imgname;
           $data['DocumentFor']='case';
           $data['read_status']='0';
           $data['UploadedOn']=date("Y-m-d H:i:s");
           $data['UploadedBy']=$userid;
           $data['AccessTo']=$assignedstaff;
           $data['UploadMethod']='Upload';
           $data['DocumentPath']=$docpath;
           $data['Template']='No';
           $data['CaseId']=$caseid;
           $data['FirmId']=$firmid;
           $data['DocumentName']=$docname;
           $data['OriginalName']=$imgname;
           $this->DocumentModel->insertdoc($data);

        }  
    }
    }
    
    


}
