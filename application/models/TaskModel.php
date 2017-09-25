<?php

class TaskModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function allstaff($id_for_all_staff) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('ContactGroup=', $id_for_all_staff);
        $query = $this->db->get();
        $all_staff = $query->result();
        return $all_staff;
    }

    public function selectallopencase() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $this->db->where('caseStatus !=', '0');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function alluserinfofortaskfirm($firm) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('FirmId =', $firm);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function alltask($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->where('AssignedBy', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function alltasknew($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->like('AssignedBy', $user_id);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getalltaskdatabycriteria($criteria, $user_id) {
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.AssignedBy', $user_id);
        if ($criteria == '1') {
            $this->db->where('tbl_task.DueDate <=', $date);
        } else {
            $this->db->where('tbl_task.DueDate >=', $date);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getassigneduser($AssignedTo) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $AssignedTo);
        $query = $this->db->get();
        return $query->row();
    }

    public function getassignedfirm($FirmId) {
        $this->db->select('*');
        $this->db->from('tbl_firm');
        $this->db->where('FirmId', $FirmId);
        $query = $this->db->get();
        return $query->row();
    }

    public function alluserinfofortask($user_id) {
        $this->db->select('tbl_task.*,user.fullname,user.id');
        $this->db->from('user');
        $this->db->join('tbl_task', 'tbl_task.AssignedTo = user.id');
        $this->db->where('user.id !=', '1');
        $this->db->where('tbl_task.AssignedBy', $user_id);
        $this->db->group_by('tbl_task.TaskId');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }

    public function getfirmdatabyuserid($searchuserid, $user_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.AssignedTo', $searchuserid);
        $this->db->where('tbl_task.AssignedBy', $user_id);
        $query = $this->db->get();
        //echo $this->db->last_query(); exit; 
        return $query->result_array();
    }

    public function gettestdatabyduedate($user_id) {
        $date = date('Y-m-d h:m:s');
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.DueDate >', $date);
        $this->db->where('tbl_task.AssignedBy', $user_id);
        $this->db->order_by('tbl_task.DueDate', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettestdatabyfirm($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.AssignedBy', $user_id);
        $this->db->order_by('tbl_task.FirmId', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function gettestdatabypriority($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.AssignedBy', $user_id);
        $this->db->order_by('tbl_task.priority', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallcasedata() {
        $this->db->select('*');
        $this->db->from('tbl_case');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getedittaskinfo($task_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->where('tbl_task.TaskId', $task_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getedittaskinfonew($task_id) {
        $this->db->select('*');
        $this->db->from('tbl_task');
        $this->db->join('tbl_case', 'tbl_case.CaseId = tbl_task.CaseId');
        $this->db->join('tbl_firm', 'tbl_firm.FirmId = tbl_task.FirmId');
        $this->db->where('tbl_task.TaskId', $task_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatelaywertaskinfo($data, $task_id) {
        $this->db->set('TaskName', $data['TaskName']);
        $this->db->set('description', $data['description']);
        $this->db->set('DueDate', $data['DueDate']);
        $this->db->set('AssignedTo', $data['AssignedTo']);
        $this->db->set('AssignedBy', $data['AssignedBy']);
        $this->db->set('CaseId', $data['CaseId']);
        $this->db->set('IsBilled', $data['IsBilled']);
        $this->db->set('AssignedOn', $data['AssignedOn']);
        $this->db->set('FirmId', $data['FirmId']);
        $this->db->where('TaskId', $task_id);
        $update = $this->db->update('tbl_task');
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deletetask($task_id) {
        $this->db->where('TaskId', $task_id);
        $delete = $this->db->delete('tbl_task');
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public function getedittaskreminderinfo($task_id) {
        $this->db->select('*');
        $this->db->from('tbl_remainder');
        $this->db->where('remainder_for', 'task');
        $this->db->where('remainder_for_id', $task_id);
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallstaffforthiscase($case_id) {
        $this->db->select('*');
        $this->db->from('tbl_assign_staff');
        $this->db->where('caseId', $case_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function alluserforassigntask() {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function allreminder($id) {
        $this->db->select('*');
        $this->db->from('tbl_remainder');
        $this->db->where('remainder_for_id', $id);
        $this->db->where('remainder_for', 'task');
        $query = $this->db->get();
        $selectallreminder = $query->result();
        return $selectallreminder;
    }

    public function deletereminderfoeupdate($id) {
        $this->db->where('remainder_for_id=', $id);
        $this->db->delete('tbl_remainder');
    }

    public function addTaskReminder($data) {
        $this->db->insert('tbl_remainder', $data);
    }

    public function gettaskreminderinfo($task_id) {
        $this->db->select('*');
        $this->db->from('tbl_remainder');
        $this->db->where('remainder_for', 'task');
        $this->db->where('remainder_for_id', $task_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function gettaskcommentinfo($task_id){
        $this->db->select('*');
        $this->db->from('tb_task_comment');
        $this->db->where('taskid', $task_id);
        $this->db->where('comment_activity', '1');
          $query = $this->db->get();
            return $query->result_array();
    }

}
