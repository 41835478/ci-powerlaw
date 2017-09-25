<?php

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('rspowerlaw_helper');
        $check = is_event();
        $login = is_login();
        if ($check && $login) {
            
        } else {
            redirect('permission_error');
        }
        $this->load->model('TaskModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('TaskSystemModel');
        $this->load->model('SiteModel');
        $this->load->model('MessageModel');
    }

    public function index() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $this->load->model('CaseModel');
            $firmidfromuser = $this->CaseModel->foruserfirmid($user_id);
            $firmid = $firmidfromuser->FirmId;
            $data['all_cases'] = $this->CaseModel->ALLFopenC($firmid);
            $data['all_staff'] = $this->TaskModel->allstaff($user_id);
            $data['taskinfo'] = $this->TaskModel->alltasknew($user_id);
            $data['getalluser'] = $this->TaskModel->alluserinfofortask($user_id);
            $data['pagetitle'] = 'Task';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/task/alltask', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function taskaddform() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $this->load->model('CaseModel');
            $user_id = $_SESSION['user_id'];
            $firmidfromuser = $this->CaseModel->foruserfirmid($user_id);
            $firmid = $firmidfromuser->FirmId;
            $data['firmname'] = $this->CaseModel->firmname($firmid);
            $data['allcase'] = $this->CaseModel->ALLFopenC($firmid);
            $data['ownFopenC'] = $this->CaseModel->ownFopenC($user_id);
            $data['username'] = $this->TaskModel->alluserinfofortaskfirm($firmid);
            $data['all_case'] = $this->TaskModel->selectallopencase();
            $data['pagetitle'] = 'Add Task';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/task/addtask', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function insertnewtask() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $this->form_validation->set_rules('TaskName', 'Task Name', 'required');
            if ($this->form_validation->run() === FALSE) {
                redirect('taskaddform');
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
                } else {
                    $Assigned[] = $user_id;
                }
                $AssignedTo = implode(",", $Assigned);
                $data['AssignedTo'] = $AssignedTo;
                $data['AssignedBy'] = $user_id;
                $data['Reminder'] = $Reminder;
                $data['CaseId'] = $this->input->post('CaseId');
                $data['IsBilled'] = $IsBilled;
                $data['AssignedOn'] = $nowdate;
                $data['FirmId'] = $this->input->post('firmid');
                $data['priority'] = $this->input->post('priority');
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
                        $this->db->set('created_by', $user_id);
                        $this->db->insert('tbl_remainder');
                        $remainder_id = $this->db->insert_id();
                    }

                    if ($remainder_id) {
                        $this->session->set_flashdata('success', 'Task Inserted Successfully');
                        redirect('tasks');
                    } else {
                        $this->session->set_flashdata('error', 'Task Insert is not Complete. Re try again');
                        redirect('taskaddform');
                    }
                }
                $this->session->set_flashdata('success', 'Task Inserted Successfully');
                redirect('tasks');
            }
        } else {
            redirect('loginform');
        }
    }

    public function getfrontalltaskbycriteria() {
        $user_id = $_SESSION['user_id'];
        $criteria = $_POST['criteria'];
        $taskinfo = $this->TaskModel->getalltaskdatabycriteria($criteria, $user_id);
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if ($task['priority'] == '0') {
                    $priority = 'No Priority';
                } else if ($task['priority'] == '1') {
                    $priority = 'High';
                } else if ($task['priority'] == '2') {
                    $priority = 'Medium';
                } else if ($task['priority'] == '3') {
                    $priority = 'Low';
                }
                $html .= "<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .= "<td>" . $priority . "</td>";
                $html .= "<td>" . $date . "</td>";
                $html .= "<td>" . $task['CaseName'] . "</td>";
                $html .= "<td>" . $uname . "</td>";
                $html .= "<td>" . $firmname . "</td>";
                $html .= "<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .= "<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .= "</tbody></table>";

        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function getfrontalltaskbyuserid() {
        $user_id = $_SESSION['user_id'];
        $searchuserid = $_POST['userid'];
        $taskinfo = $this->TaskModel->getfirmdatabyuserid($searchuserid, $user_id);
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if ($task['priority'] == '0') {
                    $priority = 'No Priority';
                } else if ($task['priority'] == '1') {
                    $priority = 'High';
                } else if ($task['priority'] == '2') {
                    $priority = 'Medium';
                } else if ($task['priority'] == '3') {
                    $priority = 'Low';
                }
                $html .= "<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .= "<td>" . $priority . "</td>";
                $html .= "<td>" . $date . "</td>";
                $html .= "<td>" . $task['CaseName'] . "</td>";
                $html .= "<td>" . $uname . "</td>";
                $html .= "<td>" . $firmname . "</td>";
                $html .= "<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .= "<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .= "</tbody></table>";
        //echo $html;
        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function getfrontalltaskbygroupby() {
        $user_id = $_SESSION['user_id'];
        $groupby = $_POST['groupby'];
        if ($groupby == '1') {
            $taskinfo = $this->TaskModel->gettestdatabyduedate($user_id);
        } else if ($groupby == '2') {
            $taskinfo = $this->TaskModel->gettestdatabyfirm($user_id);
        } else if ($groupby == '3') {
            $taskinfo = $this->TaskModel->gettestdatabypriority($user_id);
        }
        $html = "<table class='table table-bordered' id='countrydatatables style='border: 1px solid #ddd;  word-wrap:break-word;'><thead><tr><th>#</th><th>Task Name</th><th>Priority</th><th>Due Date</th><th>Case Link</th><th>Assigned To</th><th>Firm Name</th><th class='action-column'>Action</th></tr></thead><tbody>";
        if (!empty($taskinfo)) {
            foreach ($taskinfo as $task) {
                $date = date('d F, Y', strtotime($task['DueDate']));
                $baseUrl = base_url();
                $userinfo = $this->TaskModel->getassigneduser($task['AssignedTo']);
                $uname = $userinfo->fullname;
                $firminfo = $this->TaskModel->getassignedfirm($task['FirmId']);
                $firmname = $firminfo->FirmName;
                if ($task['priority'] == '0') {
                    $priority = 'No Priority';
                } else if ($task['priority'] == '1') {
                    $priority = 'High';
                } else if ($task['priority'] == '2') {
                    $priority = 'Medium';
                } else if ($task['priority'] == '3') {
                    $priority = 'Low';
                }
                $html .= "<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .= "<td>" . $priority . "</td>";
                $html .= "<td>" . $date . "</td>";
                $html .= "<td>" . $task['CaseName'] . "</td>";
                $html .= "<td>" . $uname . "</td>";
                $html .= "<td>" . $firmname . "</td>";
                $html .= "<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .= "<tr><td colspan='7' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }
        $html .= "</tbody></table>";
        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function getfrontallsitecaseinfo() {
        $caseinfo = $this->TaskModel->getallcasedata();
        $html = '<div class="controls"><select id="case_select" class="form-control" style="width: 229px;" open>';
        foreach ($caseinfo as $case) {
            $html .= "<option onclick='gettaskbycaseid(" . $case['CaseId'] . ")' value=" . $case['CaseId'] . ">" . $case['CaseName'] . "</option>";
        }
        $html .= '</select></div>';
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function editfronttask() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $task_id = $this->uri->segment('2');
            $user_id = $_SESSION['user_id'];
            $checkexist = $this->TaskModel->getedittaskinfo($task_id);
            if ($checkexist) {
                $userid = $checkexist->AssignedTo;

                $ddd = strpos($userid, ",");
                $idarray = explode(",", $userid);
                // if (in_array($user_id, $idarray)) {
//            foreach($idarray as $aid){
//                if($aid==$user_id){
                $this->load->model('CaseModel');
                $firmidfromuser = $this->CaseModel->foruserfirmid($user_id);
                $firmid = $firmidfromuser->FirmId;
                $data['firmname'] = $this->CaseModel->firmname($firmid);
                $data['allcase'] = $this->CaseModel->ALLFopenC($firmid);
                $data['ownFopenC'] = $this->CaseModel->ownFopenC($user_id);
                $data['username'] = $this->TaskModel->alluserinfofortaskfirm($firmid);
                $data['all_case'] = $this->TaskModel->selectallopencase();
                $data['edittask'] = $this->TaskModel->getedittaskinfo($task_id);
                $data['pagetitle'] = 'Edit Task';
                $this->load->view('admin_template/headerlink', $data);
                $this->load->view('admin_template/header');
                $this->load->view('lawyer/task/edittask', $data);
                $this->load->view('admin_template/footerlink');
                // } else { echo 22222; exit; 
                // $this->load->view('error/clean404/errorindex');
                // }
                // }
            } else {
                $this->load->view('error/clean404/errorindex');
            }
        } else {
            redirect('loginform');
        }
    }

    public function updatelawyertask() {

        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $task_id = $this->uri->segment('2');

            $this->form_validation->set_rules('TaskName', 'Task Name', 'required');



            if ($this->form_validation->run() === FALSE) {
                $this->session->set_flashdata('error', 'Task Update is not Complete. Re try again');
                redirect('editfronttask/' . $task_id);
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
                $this->TaskModel->deletereminderfoeupdate($task_id);

                $usingreminder = $this->input->post('remainder_type[]');
                //popup
                $remainder_duration_type = $this->input->post('remainder_duration[]');
                //1
                $usingremindermail = $this->input->post('remainder_duration_type[]');

                //day week

                if ($usingreminder != '' || $usingreminder != NULL || $usingreminder != 0) {
                    $total = count($usingreminder);

                    for ($i = 0; $i < $total;) {

                        $test = $usingreminder[$i];
                        $dataa['remainder_type'] = $test;
                        $test2 = $usingremindermail[$i];
                        $dataa['remainder_duration_type'] = $test2;
                        $test3 = $remainder_duration_type[$i];
                        $dataa['remainder_duration'] = $test3;

                        $dataa['remainder_for'] = 'Task';
                        $dataa['created_date'] = date('Y-m-d H:i:s');
                        $dataa['created_by'] = $user_id;
                        $dataa['remainder_for_id'] = $task_id;
                        $this->TaskModel->addTaskReminder($dataa);
                        $i++;
                    }
                }
                $this->session->set_flashdata('success', 'Task Update Successfully');
                redirect('tasks');
            }
        } else {
            redirect('loginform');
        }
    }

    public function deletelaywertask() {
        $task_id = $this->uri->segment('2');
        $delete = $this->TaskModel->deletetask($task_id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Task Delete Successfully');
            redirect('tasks');
        } else {
            $this->session->set_flashdata('error', 'Task Delete is not Complete. Re try again');
            redirect('tasks');
        }
    }

    public function viewlawyertask() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $user_id = $_SESSION['user_id'];
            $this->load->model('CaseModel');
            $task_id = $this->uri->segment('2');
            $data['username'] = $this->TaskSystemModel->alluserinfofortask();
            $data['allcase'] = $this->TaskSystemModel->selectallopencase();
            $data['edittask'] = $this->TaskModel->getedittaskinfonew($task_id);
            $data['taskreminder'] = $this->TaskModel->gettaskreminderinfo($task_id);
            $data['taskcomment'] = $this->TaskModel->gettaskcommentinfo($task_id);
            $data['pagetitle'] = 'View Task';
            $this->load->view('admin_template/headerlink', $data);
            $this->load->view('admin_template/header');
            $this->load->view('lawyer/task/viewtask', $data);
            $this->load->view('admin_template/footerlink');
        } else {
            redirect('loginform');
        }
    }

    public function taskPdf() {
        $userId = $_SESSION['user_id'];
        if (!isset($userId) || $userId != true) {
            echo '<span style="color:red"><h1>You don\'t have permission to access this page.</h1></span>';
            redirect('loginform');
        } else {
            $data['taskinfo'] = $this->TaskModel->alltasknew($userId);
            $this->load->library('MPDF/mpdf');
            $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 16, 60, 5, 5, 'C');
            $mpdf->useOnlyCoreFonts = true;    // false is default
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle('My Power Law');
            $mpdf->SetAuthor('fouzia');
            $mpdf->SetDisplayMode('fullpage');
            $html .= $this->load->view('lawyer/pdfreport/task_pdf', $data, TRUE);
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

    public function taskexl() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "Task.csv";
        $userId = $_SESSION['user_id'];
        $query = "SELECT tbl_task.TaskName, tbl_task.DueDate, user.fullname as AssignedTo, tbl_case.CaseName FROM tbl_task INNER JOIN user ON user.id=tbl_task.AssignedTo INNER JOIN tbl_case ON tbl_case.CaseId=tbl_task.CaseId WHERE tbl_task.AssignedTo = '" . $userId . "'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }

    public function getassignstaff() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
            $case_id = $this->input->post('case_id');
            $getallstaffforthiscase = $this->TaskModel->getallstaffforthiscase($case_id);
            $alluserforassigntask = $this->TaskModel->alluserforassigntask();
            $staff = '<label class="control-label" for="country-countrycode">Assigned To</label><select id="assign" name="AssignedTo[] multiple="multiple" class="form-control" open>';
            foreach ($getallstaffforthiscase as $getastaffforthiscase) {
                foreach ($alluserforassigntask as $auserforassigntask) {
                    if ($getastaffforthiscase['staffId'] == $auserforassigntask['id']) {

                        $staff .= "<option value=" . $getastaffforthiscase['staffId'] . ">" . $auserforassigntask['FirstName'] . " " . $auserforassigntask['LastName'] . "</option>";
                    }
                }
            }

            $staff .= '</select>';
            echo $staff;
        } else {
            redirect('loginform');
        }
    }

    public function getfrontalltaskbycaseinfo() {
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
                if ($task['priority'] == '0') {
                    $priority = 'No Priority';
                } else if ($task['priority'] == '1') {
                    $priority = 'High';
                } else if ($task['priority'] == '2') {
                    $priority = 'Medium';
                } else if ($task['priority'] == '3') {
                    $priority = 'Low';
                }
                $html .= "<tr><td>" . $task['TaskId'] . "</td><td>" . $task['TaskName'] . "</td>";
                $html .= "<td>" . $priority . "</td>";
                $html .= "<td>" . $date . "</td>";
                $html .= "<td>" . $task['CaseName'] . "</td>";
                $html .= "<td>" . $uname . "</td>";
                $html .= "<td>" . $firmname . "</td>";
                $html .= "<td><a href='" . $baseUrl . "viewfirm/" . $task['TaskId'] . "' title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-eye-open'></span></a>";
                $html .= "<a href='" . $baseUrl . "edittimezone/" . $task['TaskId'] . " title='Update' aria-label='Update' data-pjax='0'><span class='glyphicon glyphicon-pencil'></span></a>";
                $html .= "<a class='alertForDelete' href='" . $baseUrl . "deletetimezone/" . $task['TaskId'] . " title='Delete' aria-label='Delete' data-confirm='Are you sure you want to delete this item?' data-method='post' data-pjax='0'><span class='glyphicon glyphicon-trash'></span></a></td></tr>";
            }
        } else {
            $error = "No Data Found With Your Criteria";
            $html .= "<tr><td colspan='8' style='text-align:center; color:green; font-weight:bold; font-size: 40px;'>" . $error . "</td></tr>";
        }

        $html .= "</tbody></table>";

        $json = array();
        $json['taskdiv'] = $html;
        echo json_encode($json);
    }

    public function getacbyuserid() {
        $userid = $_SESSION['user_id'];
        $caseinfo = $this->MessageModel->getallcasedata($userid);
        $html = '<div class="controls"><select id="case_select" class="form-control" style="width: 229px;" open>';
        foreach ($caseinfo as $case) {
            $html .= "<option onclick='gettaskbycaseid(" . $case['CaseId'] . ")' value=" . $case['CaseId'] . ">" . $case['CaseName'] . "</option>";
        }
        $html .= '</select></div>';
        $json = array();
        $json['casediv'] = $html;
        echo json_encode($json);
    }

    public function savetaskreminder() {
        $taskid = $this->uri->segment('2');
        $user_id = $_SESSION['user_id'];
        if ($this->input->post('remainder_type') != '') {
            foreach ($this->input->post('remainder_type') as $key => $row) {
                $this->db->set('remainder_for', 'task');
                $this->db->set('remainder_for_id', $taskid);
                $this->db->set('remainder_type', $this->input->post('remainder_type')[$key]);
                $this->db->set('remainder_duration', $this->input->post('remainder_duration')[$key]);
                $this->db->set('remainder_duration_type', $this->input->post('remainder_duration_type')[$key]);
                $this->db->set('created_date', $nowdate);
                $this->db->set('created_by', $user_id);
                $this->db->insert('tbl_remainder');
                $remainder_id = $this->db->insert_id();
            }

            if ($remainder_id) {
                $this->session->set_flashdata('success', 'Task Inserted Successfully');
                redirect('viewlawyertask/' . $taskid);
            } else {
                $this->session->set_flashdata('error', 'Task Insert is not Complete. Re try again');
                redirect('viewlawyertask/' . $taskid);
            }
        }
    }

    public function edittaskreminder() {
        $taskid = $this->uri->segment('2');
        $user_id = $_SESSION['user_id'];
        $this->db->where('remainder_for', 'task');
        $this->db->where('remainder_for_id', $taskid);
        $this->db->where('created_by', $user_id);
        $this->db->where('status', '1');
        $delete = $this->db->delete('tbl_remainder');


        if ($delete) {
            if ($this->input->post('remainder_type') != '') {
                foreach ($this->input->post('remainder_type') as $key => $row) {
                    $this->db->set('remainder_for', 'task');
                    $this->db->set('remainder_for_id', $taskid);
                    $this->db->set('remainder_type', $this->input->post('remainder_type')[$key]);
                    $this->db->set('remainder_duration', $this->input->post('remainder_duration')[$key]);
                    $this->db->set('remainder_duration_type', $this->input->post('remainder_duration_type')[$key]);
                    $this->db->set('created_date', $nowdate);
                    $this->db->set('created_by', $user_id);
                    $this->db->insert('tbl_remainder');
                    $remainder_id = $this->db->insert_id();
                }

                if ($remainder_id) {
                    $this->session->set_flashdata('success', 'Task Inserted Successfully');
                    redirect('viewlawyertask/' . $taskid);
                } else {
                    $this->session->set_flashdata('error', 'Task Insert is not Complete. Re try again');
                    redirect('viewlawyertask/' . $taskid);
                }
            }
        }
    }

    function marktaskascomplete() {
        $json = array();
        $taskid = $_POST['taskid'];
        $this->db->set('status', '2');
        $this->db->where('TaskId', $taskid);
        $taskupdate = $this->db->update('tbl_task');
        if ($taskupdate) {
            $this->db->set('status', '0');
            $this->db->where('remainder_for', 'task');
            $this->db->where('remainder_for_id', $taskid);
            $update = $this->db->update('tbl_remainder');
            if ($update) {
                $this->session->set_flashdata('success', 'Task Completed Successfully');
                $json['result'] = 1;
            } else {
                $this->session->set_flashdata('error', 'Task is not Complete. Re try again');
                $json['result'] = 0;
            }
            echo json_encode($json);
        }
    }

    public function addtaskcomment() {
        $taskid = $this->uri->segment('2');
        $userid = $_SESSION['user_id'];
        $date = strtotime(date('Y-m-d'));

        $comdata = array();
        $comdata['taskid'] = $taskid;
        $comdata['created_by'] = $userid;
        $comdata['created_date'] = $date;
        $comdata['comment'] = $_POST['comment'];
        $comdata['status'] = '3';
        $comdata['comment_activity'] = '1';
        $insert = $this->db->insert('tb_task_comment', $comdata);
        if ($insert) {
            $this->session->set_flashdata('success', 'Task Comment Insert Successfully');
            redirect('viewlawyertask/' . $taskid);
        } else {
            $this->session->set_flashdata('error', 'Task Comment Insert is not Complete. Re try again');
            redirect('viewlawyertask/' . $taskid);
        }
    }

}
