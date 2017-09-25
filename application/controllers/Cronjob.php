<?php

class Cronjob extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CronjobModel');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function powerlawaddcase() {
        $type = 'case-add';
        $tbl = 'tbl_case_log';
        $caseloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($caseloginfo as $case) {
            $userinfo = $this->CronjobModel->getuserinfo($case['user_id']);
            $caseinfo = $this->CronjobModel->getcaseinfo($case['case_id']);
            $casename = $caseinfo->CaseName;
            $email = $userinfo->email;
            $name = $userinfo->fullname;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $caselogo = "http://localhost/mypowerLawServer/assets/image/briefcase.png";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $name . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User </h2";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $caselogo . "'>" . $casename . "<button style='margin-left:50px' class='btn btn-success'>New Case</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('case_log_id', $case['case_log_id']);
                $this->db->delete('tbl_case_log');
            }
        }
    }

    public function powerlaweditcase() {
        $type = 'case-edit';
        $tbl = 'tbl_case_log';
        $caseloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($caseloginfo as $case) {
            $userinfo = $this->CronjobModel->getuserinfo($case['user_id']);
            $caseinfo = $this->CronjobModel->getcaseinfo($case['case_id']);
            $casename = $caseinfo->CaseName;
            $email = $userinfo->email;
            $name = $userinfo->fullname;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $caselogo = "http://localhost/mypowerLawServer/assets/image/briefcase.png";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $name . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User </h2";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $caselogo . "'>" . $casename . "<button style='margin-left:50px' class='btn btn-success'>Update Case</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('case_log_id', $case['case_log_id']);
                $this->db->delete('tbl_case_log');
            }
        }
    }

    public function powerlawclosecase() {
        $type = 'firm-user-add';
        $tbl = 'case-close';
        $caseloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($caseloginfo as $case) {
            $userinfo = $this->CronjobModel->getuserinfo($case['user_id']);
            $caseinfo = $this->CronjobModel->getcaseinfo($case['case_id']);
            $casename = $caseinfo->CaseName;
            $email = $userinfo->email;
            $name = $userinfo->fullname;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $caselogo = "http://localhost/mypowerLawServer/assets/image/briefcase.png";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $name . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User </h2";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $caselogo . "'>" . $casename . "<button style='margin-left:50px' class='btn btn-success'>Close Case</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            //echo $msg; exit; 
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('case_log_id', $case['case_log_id']);
                $this->db->delete('tbl_case_log');
            }
        }
    }

    public function powerlawreopencase() {
        $type = 'firm-user-add';
        $tbl = 'case-reopen';
        $caseloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($caseloginfo as $case) {
            $userinfo = $this->CronjobModel->getuserinfo($case['user_id']);
            $caseinfo = $this->CronjobModel->getcaseinfo($case['case_id']);
            $casename = $caseinfo->CaseName;
            $email = $userinfo->email;
            $name = $userinfo->fullname;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $caselogo = "http://localhost/mypowerLawServer/assets/image/briefcase.png";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $name . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User </h2";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $caselogo . "'>" . $casename . "<button style='margin-left:50px' class='btn btn-success'>Reopen Case</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            //echo $msg; exit; 
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('case_log_id', $case['case_log_id']);
                $this->db->delete('tbl_case_log');
            }
        }
    }

    public function powerlawrefirmuseradd() {
        $type = 'firm-user-add';
        $tbl = 'tbl_firm_log';
        $firmuserloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($firmuserloginfo as $fuser) {
            $firmuserinfo = $this->CronjobModel->getuserinfo($fuser['firm_user_id']);

            $firminfo = $this->CronjobModel->getfirminfo($firmuserinfo->FirmId);
            $createduserinfo = $this->CronjobModel->getuserinfo($firminfo->UserId);
            $newusername = $firmuserinfo->fullname;
            $firmname = $firminfo->FirmName;
            $createdusername = $createduserinfo->fullname;
            $email = $createduserinfo->email;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $userlogo = "http://localhost/mypowerLawServer/assets/image/add-user.svg";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $createdusername . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User " . $createdusername . "</h2>";
            $msg .= "<h4 style='text-align:left'>A new firm user is added in you firm " . $firmname . "</h4>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $userlogo . "'>" . $newusername . "<button style='margin-left:50px' class='btn btn-success'>Firm User</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            //echo $msg; exit; 
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('firm_log_id', $fuser['firm_log_id']);
                $this->db->delete('tbl_firm_log');
            }
        }
    }

    public function powerlawrefirmuserdeactive() {
        $type = 'firm-user-deactivate';
        $tbl = 'tbl_firm_log';
        $firmuserloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($firmuserloginfo as $fuser) {
            $firmuserinfo = $this->CronjobModel->getuserinfo($fuser['firm_user_id']);

            $firminfo = $this->CronjobModel->getfirminfo($firmuserinfo->FirmId);
            $createduserinfo = $this->CronjobModel->getuserinfo($firminfo->UserId);
            $newusername = $firmuserinfo->fullname;
            $firmname = $firminfo->FirmName;
            $createdusername = $createduserinfo->fullname;
            $email = $createduserinfo->email;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $userlogo = "http://localhost/mypowerLawServer/assets/image/add-user.svg";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $createdusername . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User " . $createdusername . "</h2>";
            $msg .= "<h4 style='text-align:left'>Firm user " . $newusername . " is deactivate from your firm </h4>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $userlogo . "'>" . $newusername . "<button style='margin-left:50px' class='btn btn-success'>Deactivate User</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            //echo $msg; exit; 
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('firm_log_id', $fuser['firm_log_id']);
                $this->db->delete('tbl_firm_log');
            }
        }
    }

    public function powerlawrefirmuserreactive() {
        $type = 'firm-user-reactivate';
        $tbl = 'tbl_firm_log';
        $firmuserloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($firmuserloginfo as $fuser) {
            $firmuserinfo = $this->CronjobModel->getuserinfo($fuser['firm_user_id']);

            $firminfo = $this->CronjobModel->getfirminfo($firmuserinfo->FirmId);
            $createduserinfo = $this->CronjobModel->getuserinfo($firminfo->UserId);
            $newusername = $firmuserinfo->fullname;
            $firmname = $firminfo->FirmName;
            $createdusername = $createduserinfo->fullname;
            $email = $createduserinfo->email;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $userlogo = "http://localhost/mypowerLawServer/assets/image/add-user.svg";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $createdusername . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h2 style='text-align:left'>Dear User " . $createdusername . "</h2>";
            $msg .= "<h4 style='text-align:left'>Firm user " . $newusername . " is reactivate by your firm </h4>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $userlogo . "'>" . $newusername . "<button style='margin-left:50px' class='btn btn-success'>Reactivate User</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            //echo $msg; exit; 
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('firm_log_id', $fuser['firm_log_id']);
                $this->db->delete('tbl_firm_log');
            }
        }
    }

    public function powerlawrefirmuserpermission() {
        $type = 'firm-user-permission';
        $tbl = 'tbl_firm_log';
        $firmuserloginfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($firmuserloginfo as $fuser) {
            $firmuserinfo = $this->CronjobModel->getuserinfo($fuser['firm_user_id']);

            $firminfo = $this->CronjobModel->getfirminfo($firmuserinfo->FirmId);
            $createduserinfo = $this->CronjobModel->getuserinfo($firminfo->UserId);
            $newusername = $firmuserinfo->fullname;
            $firmname = $firminfo->FirmName;
            $createdusername = $createduserinfo->fullname;
            $email = $createduserinfo->email;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $userlogo = "http://localhost/mypowerLawServer/assets/image/add-user.svg";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $createdusername . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h1 style='text-align:left'>Dear User " . $createdusername . "</h1>";
            $msg .= "<h2 style='text-align:left'>Firm user " . $newusername . " permission is updated by your firm </h2>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $userlogo . "'>" . $newusername . "<button style='margin-left:50px' class='btn btn-success'>Updated User</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            // echo $msg;
            // exit;
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('firm_log_id', $fuser['firm_log_id']);
                $this->db->delete('tbl_firm_log');
            }
        }
    }

    public function powerlawrefirmsetting() {
        $type = 'firm-information';
        $tbl = 'tbl_firm_log';
        $firinfo = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($firinfo as $firm) {
            $firminfo = $this->CronjobModel->getfirminfo($firm['firm_user_id']);
            $createduserinfo = $this->CronjobModel->getuserinfo($firminfo->UserId);
            //$newusername = $firmuserinfo->fullname;
            $firmname = $firminfo->FirmName;
            $createdusername = $createduserinfo->fullname;
            $email = $createduserinfo->email;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $firmlogo = "http://localhost/mypowerLawServer/upload/firmimage/default_firm_logo.jpg";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $createdusername . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h1 style='text-align:left'>Dear User " . $createdusername . "</h1>";
            $msg .= "<h2 style='text-align:left'> " . $firmname . " settings is updated </h2>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $firmlogo . "'>" . $firmname . "<button style='margin-left:50px' class='btn btn-success'>Updated Firm</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            //echo $msg;
            // exit;
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('firm_log_id', $fuser['firm_log_id']);
                $this->db->delete('tbl_firm_log');
            }
        }
    }

    public function powerlawaddcontact() {
        $type = 'contact-add';
        $tbl = 'tbl_contact_log';
        $contactlog = $this->CronjobModel->getactivatelog($type, $tbl);
        foreach ($contactlog as $contact) {

            $contactinfo = $this->CronjobModel->getcontactinfo($contact['contact_id']);
            $createduserinfo = $this->CronjobModel->getuserinfo($contactinfo->UserId);

            $contactname = $contactinfo->FirstName;
            $createdusername = $createduserinfo->fullname;
            $email = $createduserinfo->email;
            $date = date('F, d Y', strtotime(date('Y-m-d')));
            $time = date('h:i A');
            $siteUrl = "http://wc.rssoft.win/mypowerLaw/";
            $subject = "Recent activity Notification in MyPowerLaw";

            $logo = "http://localhost/mypowerLawServer/themes/ladmin/layouts/assets/images/logo_light.png";
            $userlogo = "http://localhost/mypowerLawServer/assets/image/add-user.svg";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <admin@gmail.com>' . "\r\n";

            $msg = "<table style='border-collapse:separate;border-radius:3px;width:100%'><tbody><tr>";
            $msg .= "<td style='font-size:14px;vertical-align:top;box-sizing:border-box;padding:10px;'>";
            $msg .= "<table border='0' cellpadding='0' cellspacing='0' style='border-collapse:separate;width:100%'>";
            $msg .= "<tbody><tr>";
            $msg .= "<td style='vertical-align:top;text-align:center;background-color:#2d7dbc;border-top-left-radius:10px;border-top-right-radius:10px;padding:30px;font-size:14px;'>";
            $msg .= "<image src='" . $logo . "' style='height: 40px; margin:0;margin-bottom:15px;font-size:24px;font-weight:400;float:left;margin-bottom:0;color:#fff;line-height:1.4;'><h2 style = 'margin:0;margin-bottom:15px;font-size:24px;font-weight:200;text-align:right;margin-bottom:0;color:#fff;line-height:1.4;'>" . $subject . "</h2><span style='font-weight:bold; color:#fff; float:right'><b>Prepared for " . $createdusername . "</b></span></td></tr>";
            $msg .= "<tr><td style = 'text-align:center;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:30px;font-size:14px;vertical-align:top;'>";
            $msg .= "<div style = 'color:#444;text-align:center'><p style = 'margin:0;margin-bottom:20px;word-wrap:break-word;word-break:break-word;font-size:18px;font-weight:normal;text-align: left; color:#2D7DBC'><b> " . $date . "</b><span style='margin-left:6px'>" . $time . "</span></p></div>";
            $msg .= "<table border = '0' cellpadding = '0' cellspacing = '0' style = 'border-collapse:separate;box-sizing:border-box;width:100%;background: #E0E0E0; color:#fff'>";
            $msg .= "<tbody>";
            $msg .= "<h1 style='text-align:left'>Dear User " . $createdusername . "</h1>";
            $msg .= "<h2 style='text-align:left'>A new contact " . $contactname . " is added in your firm </h2>";
            $msg .= "<tr><td align = 'center' style = 'padding-bottom: 10px; padding-top: 10px; font-size: 14px; vertical-align: top; text-align: left; padding-left: 12px;'>";
            $msg .= "<table border ='0' cellpadding = '0' cellspacing = '0' style ='border-collapse:separate;width:100%;width:auto'>";
            $msg .= "<tbody style='text-align:left'><tr><td style = 'border-radius:5px;text-align:center;background-color:#E0E0E0'>";
            $msg .= "<p><img style='height: 22px;' src='" . $userlogo . "'>" . $contactname . "<button style='margin-left:50px' class='btn btn-success'>New Contact</button></p></td>";
            $msg .= "</tr></tbody></table></td></tr></tbody></table>";
            $msg .= "</div></td></tr></tbody></table></td></tr></tbody></table >";
            $mail = mail($email, $subject, $msg, $headers);
            echo $msg;
            exit;
            if ($mail) {
                //$this->db->set('notification_status','1');
                $this->db->where('firm_log_id', $fuser['firm_log_id']);
                $this->db->delete('tbl_firm_log');
            }
        }
    }

}
