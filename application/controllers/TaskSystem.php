<?php

class TaskSystem extends CI_Controller {

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
        $this->load->model('TaskSystemModel');
        $this->load->model('SystemAdministratorModel');
		$this->load->model('TaskModel');
    }

    public function taskmanager() {
        $data['taskinfo'] = $this->TaskSystemModel->getalltask();
        $data['getalluser'] = $this->TaskSystemModel->alluserinfofortask();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/task/managetask', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function getallsitecaseinfo() {
        $caseinfo = $this->TaskSystemModel->getallcasedata();
        $html = '<div class="controls"><select id="case_select" class="form-control" style="width: 229px;" open>';
        foreach ($caseinfo as $case) {
            $html .= "<option onclick='gettaskbycaseid(" . $case['CaseId'] . ")' value=" . $case['CaseId'] . ">" . $case['CaseName'] . "</option>";
        }
        $html .= '</select></div>';
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function getalltaskbycaseinfo() {
        $case_id = $_POST['case_id'];
        $taskinfo = $this->TaskSystemModel->getalltaskdatabycaseid($case_id);

        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskSystemModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskSystemModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if($task['priority'] == '0'){
                    $priority = 'No Priority';
                } else if($task['priority'] == '1'){
                    $priority = 'High';
                } else if($task['priority'] == '2'){
                    $priority = 'Medium';
                } else if($task['priority'] == '3'){
                    $priority = 'Low';
                }
                $html .="<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .="<td>" . $priority . "</td>";
                $html .="<td>" . $date . "</td>";
                $html .="<td>" . $task['CaseName'] . "</td>";
                $html .="<td>" . $uname . "</td>";
                $html .="<td>" . $firmname . "</td>";
                $html .="<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .="<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .="<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .="<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }

        $html .="</tbody></table>";

        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function getalltaskbycriteria() {
        $criteria = $_POST['criteria'];
        $taskinfo = $this->TaskSystemModel->getalltaskdatabycriteria($criteria);
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskSystemModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskSystemModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if($task['priority'] == '0'){
                    $priority = 'No Priority';
                } else if($task['priority'] == '1'){
                    $priority = 'High';
                } else if($task['priority'] == '2'){
                    $priority = 'Medium';
                } else if($task['priority'] == '3'){
                    $priority = 'Low';
                }
                $html .="<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .="<td>" . $priority . "</td>";
                $html .="<td>" . $date . "</td>";
                $html .="<td>" . $task['CaseName'] . "</td>";
                $html .="<td>" . $uname . "</td>";
                $html .="<td>" . $firmname . "</td>";
                $html .="<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .="<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .="<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .="<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .="</tbody></table>";

        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function insertTaskform() {
        $data['username'] = $this->TaskSystemModel->alluserinfofortask();
        $data['allcase'] = $this->TaskSystemModel->selectallopencase();
        $this->load->view('powerlawadmin/admin_template/headerlink');
        $this->load->view('powerlawadmin/admin_template/header');
        $this->load->view('powerlawadmin/admin/task/addtask', $data);
        $this->load->view('powerlawadmin/admin_template/footerlink');
    }

    public function searchfirmnamebycaseid() {
        $caseid = $_POST['caseid'];
        $firminfo = $this->TaskSystemModel->getfirmdatabycaseid($caseid);
        // print_r($firminfo);
        $firmname = $firminfo->FirmName;
        $firmid = $firminfo->FirmId;
        $json = array();
        $json['firmname'] = $firmname;
        $json['firmid'] = $firmid;
        echo json_encode($json);
    }

    public function inserttask() {
        $this->form_validation->set_rules('TaskName', 'Task Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('DueDate', 'Due Date', 'required');
        $this->form_validation->set_rules('CaseId', 'Case Id', 'required');
        $this->form_validation->set_rules('firmid', 'Firm Id', 'required');


        if ($this->form_validation->run() === FALSE) {
            redirect('addTask');
        } else {
            $data = array();
            $data1 = array();
            $nowdate = date('Y-m-d h:m:s');
            if ($this->input->post('IsBilled') == 'on') {
                $IsBilled = 'Yes';
            } else {
                $IsBilled = 'No';
            }

            if ($this->input->post('remainder_type') != '') {
                $Reminder = 'Yes';
            } else {
                $Reminder = 'No';
            }
            $data['TaskName'] = $this->input->post('TaskName');
            $data['description'] = $this->input->post('description');
            $data['DueDate'] = $this->input->post('DueDate');
            if ($this->input->post('AssignedTo')) {
                foreach ($this->input->post('AssignedTo') as $key => $assign) {

                    $Assigned[] = $assign;
                }
            }
            $AssignedTo = implode(",", $Assigned);


            $data['AssignedTo'] = $AssignedTo;
            $data['Reminder'] = $Reminder;
            $data['CaseId'] = $this->input->post('CaseId');
            $data['Rate'] = $this->input->post('Rate');
            $data['IsBilled'] = $IsBilled;
            $data['AssignedOn'] = $nowdate;
            $data['FirmId'] = $this->input->post('firmid');

            $this->db->insert('tbl_task', $data);
            $task_id = $this->db->insert_id();

            if ($this->input->post('remainder_type') != '') {
                foreach ($this->input->post('remainder_type') as $key => $row) {
                    $this->db->set('remainder_for', 'task');
                    $this->db->set('remainder_for_id', $task_id);
                    $this->db->set('remainder_type', $this->input->post('remainder_type')[$key]);
                    $this->db->set('remainder_duration', $this->input->post('remainder_duration')[$key]);
                    $this->db->set('remainder_duration_type', $this->input->post('remainder_duration_type')[$key]);
                    $this->db->set('created_date', $nowdate);
                    $this->db->set('created_by', $_SESSION['admin_id']);
                    $this->db->insert('tbl_remainder');
                    $remainder_id = $this->db->insert_id();
                }

                if ($remainder_id) {
                    $this->session->set_flashdata('success', 'Task Inserted Successfully');
                    redirect('taskmanager');
                } else {
                    $this->session->set_flashdata('error', 'Task Insert is not Complete. Re try again');
                    redirect('addTask');
                }
            }
            $this->session->set_flashdata('success', 'Task Inserted Successfully');
            redirect('taskmanager');
        }
    }

    public function taskpdfreportgenerate() {
        $admin_id = $this->session->userdata('admin_id');
        if (!isset($admin_id) || $admin_id != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('admin');
        } else {
            $data['taskinfo'] = $this->TaskSystemModel->getalltask();
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html.= $this->load->view('powerlawadmin/pdfreport/task_pdf', $data, TRUE);
            $name = "Task.pdf";
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

    public function taskexlreportgenerate() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Task.csv";
        $query = "SELECT tbl_task.TaskName, tbl_task.DueDate, user.fullname as AssignedTo, tbl_case.CaseName FROM tbl_task INNER JOIN user ON user.id=tbl_task.AssignedTo INNER JOIN tbl_case ON tbl_case.CaseId=tbl_task.CaseId";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function getalltaskbyuserid() {
        $userid = $_POST['userid'];
        $taskinfo = $this->TaskSystemModel->getfirmdatabyuserid($userid);
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskSystemModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskSystemModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if($task['priority'] == '0'){
                    $priority = 'No Priority';
                } else if($task['priority'] == '1'){
                    $priority = 'High';
                } else if($task['priority'] == '2'){
                    $priority = 'Medium';
                } else if($task['priority'] == '3'){
                    $priority = 'Low';
                }
                $html .="<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .="<td>" . $priority . "</td>";
                $html .="<td>" . $date . "</td>";
                $html .="<td>" . $task['CaseName'] . "</td>";
                $html .="<td>" . $uname . "</td>";
                $html .="<td>" . $firmname . "</td>";
                $html .="<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .="<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .="<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .="<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .="</tbody></table>";
        //echo $html;
        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function getalltaskbygroupby() {
        $groupby = $_POST['groupby'];
        if ($groupby == '1') {
            $taskinfo = $this->TaskSystemModel->gettestdatabyduedate();
        } else if ($groupby == '2') {
            $taskinfo = $this->TaskSystemModel->gettestdatabyfirm();
        } else if ($groupby == '3') {
            $taskinfo = $this->TaskSystemModel->gettestdatabypriority();
        }
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskSystemModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskSystemModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if($task['priority'] == '0'){
                    $priority = 'No Priority';
                } else if($task['priority'] == '1'){
                    $priority = 'High';
                } else if($task['priority'] == '2'){
                    $priority = 'Medium';
                } else if($task['priority'] == '3'){
                    $priority = 'Low';
                }
                $html .="<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .="<td>" . $priority . "</td>";
                $html .="<td>" . $date . "</td>";
                $html .="<td>" . $task['CaseName'] . "</td>";
                $html .="<td>" . $uname . "</td>";
                $html .="<td>" . $firmname . "</td>";
                $html .="<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .="<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .="<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .="<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .="</tbody></table>";
        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }
	
	 public function edittask() {
        if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != '') {
            $admin_id = $this->session->userdata('admin_id');
            $this->load->model('CaseModel');
            $task_id = $this->uri->segment('2');
            $data['username'] = $this->TaskSystemModel->alluserinfofortask();
            $data['allcase'] = $this->TaskSystemModel->selectallopencase();
            $data['edittask'] = $this->TaskModel->getedittaskinfo($task_id);

            $this->load->view('powerlawadmin/admin_template/headerlink');
            $this->load->view('powerlawadmin/admin_template/header');
            $this->load->view('powerlawadmin/admin/task/edittask', $data);
            $this->load->view('powerlawadmin/admin_template/footerlink');
        } else {
            redirect('admin');
        }
    }

    public function updatetask() {
         if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != '') {
            $admin_id = $this->session->userdata('admin_id');
            $task_id = $this->uri->segment('2');

            $this->form_validation->set_rules('TaskName', 'Task Name', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('DueDate', 'Due Date', 'required');
            $this->form_validation->set_rules('CaseId', 'Case Id', 'required');
            $this->form_validation->set_rules('firmid', 'Firm Id', 'required');


            if ($this->form_validation->run() === FALSE) {echo 66666; exit;
                $this->session->set_flashdata('error', 'Task Update is not Complete. Re try again');
                redirect('edittask/' . $task_id);
            } else {
                $data = array();
                $data1 = array();
                $nowdate = date('Y-m-d h:m:s');
                if ($this->input->post('IsBilled') == 'on') {
                    $IsBilled = 'Yes';
                } else {
                    $IsBilled = 'No';
                }

                if ($this->input->post('remainder_type') != '') {
                    $Reminder = 'Yes';
                } else {
                    $Reminder = 'No';
                }
                $data['TaskName'] = $this->input->post('TaskName');
                $data['description'] = $this->input->post('description');
                $data['DueDate'] = date("Y-m-d", strtotime($this->input->post('DueDate')));
                if ($this->input->post('AssignedTo')) {
                    foreach ($this->input->post('AssignedTo') as $key => $assign) {

                        $Assigned[] = $assign;
                    }
                }
                $AssignedTo = implode(",", $Assigned);


                $data['AssignedTo'] = $AssignedTo;
                $data['AssignedBy'] = $user_id;
                $data['Reminder'] = $Reminder;
                $data['CaseId'] = $this->input->post('CaseId');
                $data['Rate'] = $this->input->post('Rate');
                $data['IsBilled'] = $IsBilled;
                $data['AssignedOn'] = $nowdate;
                $data['FirmId'] = $this->input->post('firmid');

                $update = $this->TaskModel->updatelaywertaskinfo($data, $task_id);

                if ($this->input->post('remainder_type') != '') {
                    foreach ($this->input->post('remainder_type') as $key => $row) {
                        $this->db->set('remainder_for', 'task');
                        $this->db->set('remainder_for_id', $task_id);
                        $this->db->set('remainder_type', $this->input->post('remainder_type')[$key]);
                        $this->db->set('remainder_duration', $this->input->post('remainder_duration')[$key]);
                        $this->db->set('remainder_duration_type', $this->input->post('remainder_duration_type')[$key]);
                        $this->db->set('created_date', $nowdate);
                        $this->db->set('created_by', $user_id);
                        $this->db->insert('tbl_remainder');
                        $remainder_id = $this->db->insert_id();
                    }

                    if ($remainder_id) {
                        $this->session->set_flashdata('success', 'Task Update Successfully');
                        redirect('taskmanager');
                    } else {
                        $this->session->set_flashdata('error', 'Task Update is not Complete. Re try again');
                        redirect('edittask/' . $task_id);
                    }
                }
                $this->session->set_flashdata('success', 'Task Update Successfully');
                redirect('taskmanager');
            }
        } else {
            redirect('admin');
        }
    }

    public function deletetask() {
        $task_id = $this->uri->segment('2');
        $delete = $this->TaskModel->deletetask($task_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Task Delete Successfully');
            redirect('taskmanager');
        } else {
            $this->session->set_flashdata('error', 'Task Delete is not Complete. Re try again');
            redirect('taskmanager');
        }
    }

    public function viewtask() {
        if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] != '') {
            $admin_id = $_SESSION['admin_id'];
            $task_id = $this->uri->segment('2');
            $data['username'] = $this->TaskSystemModel->alluserinfofortask();
            $data['allcase'] = $this->TaskSystemModel->selectallopencase();
            $data['edittask'] = $this->TaskModel->getedittaskinfo($task_id);
            $data['reminder'] = $this->TaskModel->getedittaskreminderinfo($task_id);
            $this->load->view('powerlawadmin/admin_template/headerlink');
            $this->load->view('powerlawadmin/admin_template/header');
            $this->load->view('powerlawadmin/admin/task/viewtask', $data);
            $this->load->view('powerlawadmin/admin_template/footerlink');
            
        } else {
            redirect('admin');
        }
    }

}