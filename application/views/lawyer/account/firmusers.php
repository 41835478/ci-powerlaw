<style>
    .card-block {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
    .mt-2 {
        margin-top: 0.5rem !important;
    }
    .card-block {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
    .help-inline-error{color:red; font-weight: bold}
</style>
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page container -->
            <div class="page-container">
                <!-- Page content -->
                <div class="page-content">
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-fixed">
                            <div class="sidebar-content">

                                <!-- Title -->
                                <div class="category-title h6" style="display:none;">
                                    <span>Components</span>
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-gear"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /title -->
                                <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE); ?>

                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="fa fa-check-square-o"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php }
                            ?>

                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="fa fa-check-square-o"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>

                            <?php }
                            ?> 
                            <div class="row">

                                <!-- Page content -->
                                <div class="page-content">

                                    <!-- Main content -->
                                    <div class="content-wrapper">

                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Manage User</h5>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li>
                                                            <a href="<?php echo base_url() ?>addFirmuser"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <i class="icon-cog3"></i>
                                                                <span class="visible-xs-inline-block position-right">Share</span>
                                                                <span class="caret"></span>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li><a href="<?php echo base_url() ?>manageuserEXLReport"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                                                <li><a href="<?php echo base_url() ?>manageuserPDFReport"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>					                        
                                            </div>
                                            <div class="panel-body">
                                                <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive"> 
                                                    <table class="table table-bordered" id="manageuserdatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Permissions</th>
                                                                <th>Active Case links</th>
                                                                <th>Calender Color</th>
                                                                <th>Default Rate</th>
                                                                <th>Status</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($allfirmuser as $firmuser) {
                                                                // echo '<pre>';
                                                                // print_r($firmuser);
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $firmuser['fullname']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        echo $firmuser['fullname'];
                                                                        if ($firmuser['status'] == '1') {
                                                                            $designation = 'Attorney';
                                                                        } else if ($firmuser['status'] == '2') {
                                                                            $designation = 'Paralegal';
                                                                        } else if ($firmuser['status'] == '3') {
                                                                            $designation = 'Staff';
                                                                        } else {
                                                                            $designation = 'Client';
                                                                        }
                                                                        //$userauthinfo = $this->FirmModel->getuserauthinfo($firmuser['id']);
                                                                        ?>
                                                                        <p>(<?php echo $designation; ?>)</p>
                                                                    </td>
                                                                    <td>
                                                                        <a data-toggle="collapse" data-target="#<?php echo $firmuser['id']; ?>">Edit User Permissions </a>
                                                                        <p>Access - Only linked cases </p>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        $caseinfo = $this->FirmModel->getusercaseinfo($firmuser['id']);
                                                                        echo $caseinfo;
                                                                        ?>
                                                                    </td>
                                                                    <td>Red</td>
                                                                    <td><?php
                                                                    if (isset($firmuser['user_default_rate']) && $firmuser['user_default_rate'] != '') {
                                                                        echo '$' . $firmuser['user_default_rate'] . '.00/hr';
                                                                    } else {
                                                                        echo 'Not set';
                                                                    }
                                                                        ?></td>
                                <!--                                        <td><?php echo $firmuser['fullname']; ?></td>-->
                                                                    <td><?php
                                                                    if ($firmuser['account_activity'] == '1') {
                                                                            ?>
                                                                            <i class="glyphicon glyphicon-unchecked" style="color: green;background: green;"></i>
                                                                            <?php
                                                                            echo "Active";
                                                                        } else {
                                                                            echo "Inactive";
                                                                        }
                                                                        ?></td>
                                                                    <td>
                                                                        <?php if (($firmuser['id'] != $_SESSION['user_id']) && ($firmuser['account_activity'] == '0')) { ?>
                                                                            <a href="<?php echo base_url() ?>activefirmuser/<?php echo $firmuser['id']; ?>"><button class="btn btn-primary">Activate</button></a>
                                                                        <?php } else if (($firmuser['id'] != $_SESSION['user_id']) && ($firmuser['account_activity'] == '1')) { ?>
                                                                            <a href="<?php echo base_url() ?>deactivatefirmuser/<?php echo $firmuser['id']; ?>"><button class="btn btn-warning">De Activate</button></a>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr id="<?php echo $firmuser['id']; ?>" class="collapse">
                                                                    <?php
                                                                    $userpermissioninfo = $this->FirmModel->getuserpermissionbyid($firmuser['id']);
                                                                    //echo '<pre>';  print_r($userpermissioninfo); 
                                                                    ?>
                                                                    <td id="permission_183428_row" colspan="9" class="first_child last_child attorney-permission-row border-top-0" style="padding: 0px;">
                                                                        <div id="permission_183428" style="display: block;" class="permission-holder" data-permission-id="183428">
                                                                            <form class="attorney-permission-form"  action="<?php echo base_url() ?>updatepermission/<?php echo $firmuser['id']; ?>" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="patch"><input type="hidden" name="authenticity_token" value="U+AomoLeGeXtFjy2sa4eooRgQh8FfL75T2Df5Y8b2gFvpPKWzNoKPdmsO949geZ1R2la6Elnz6r0tCT8MvZk+A==">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="rscont" style="padding: 16px;">
                                                                                            <table class="permissions table table-bordered">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th></th>
                                                                                                        <th>Add & Edit</th>
                                                                                                        <th>View Only</th>
                                                                                                        <th>Hidden</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td> <img src="<?php echo base_url() ?>assets/image/small/contact.svg" alt="Contact"> Clients</td>
                                                                                                        <td><input type="radio" value="1" <?php
                                                                if (isset($userpermissioninfo->clients)) {
                                                                    echo ($userpermissioninfo->clients == '1' ? 'checked' : '');
                                                                }
                                                                    ?> name="clients"></td>
                                                                                                        <td><input type="radio" <?php
                                                                                                        if (isset($userpermissioninfo->clients)) {
                                                                                                            echo ($userpermissioninfo->clients == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> value="2" name="clients"></td>
                                                                                                        <td>  &nbsp;</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td> <img src="<?php echo base_url() ?>assets/image/small/court.svg" alt="Court case"> Cases</td>
                                                                                                        <td><input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->cases)) {
                                                                                                            echo ($userpermissioninfo->cases == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="cases"></td>
                                                                                                        <td> <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->cases)) {
                                                                                                            echo ($userpermissioninfo->cases == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="cases"></td>
                                                                                                        <td>&nbsp;</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><img src="<?php echo base_url() ?>assets/image/small/calendar.svg" alt="Calendar"> Events</td>
                                                                                                        <td> <input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->events)) {
                                                                                                            echo ($userpermissioninfo->events == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?>  name="events"></td>
                                                                                                        <td> <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->events)) {
                                                                                                            echo ($userpermissioninfo->events == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="events"></td>
                                                                                                        <td><input type="radio" value="3" <?php
                                                                                                        if (isset($userpermissioninfo->events)) {
                                                                                                            echo ($userpermissioninfo->events == '3' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="events"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td> <img src="<?php echo base_url() ?>assets/image/small/document.svg" alt="Document  sm"> Documents</td>
                                                                                                        <td><input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->documents)) {
                                                                                                            echo ($userpermissioninfo->documents == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="documents"></td>
                                                                                                        <td> <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->documents)) {
                                                                                                            echo ($userpermissioninfo->documents == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="documents"></td>
                                                                                                        <td><input type="radio" value="3" <?php
                                                                                                        if (isset($userpermissioninfo->documents)) {
                                                                                                            echo ($userpermissioninfo->documents == '3' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="documents"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><img src="<?php echo base_url() ?>assets/image/small/commenting.png" alt="Commenting"> Commenting</td>
                                                                                                        <td><input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->commenting)) {
                                                                                                            echo ($userpermissioninfo->commenting == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="commenting"></td>
                                                                                                        <td> <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->commenting)) {
                                                                                                            echo ($userpermissioninfo->commenting == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="commenting"></td>
                                                                                                        <td> <input type="radio" value="3" <?php
                                                                                                        if (isset($userpermissioninfo->commenting)) {
                                                                                                            echo ($userpermissioninfo->commenting == '3' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="commenting"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><img src="<?php echo base_url() ?>assets/image/small/message.svg" alt="Message"> Messaging</td>
                                                                                                        <td> <input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->messaging)) {
                                                                                                            echo ($userpermissioninfo->messaging == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?>  name="messaging"></td>
                                                                                                        <td>&nbsp;</td>
                                                                                                        <td> <input type="radio" value="3" <?php
                                                                                                        if (isset($userpermissioninfo->messaging)) {
                                                                                                            echo ($userpermissioninfo->messaging == '3' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="messaging"></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td> <img src="<?php echo base_url() ?>assets/image/small/billing.svg" alt="Billing"> Billing</td>
                                                                                                        <td><input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->billing)) {
                                                                                                            echo ($userpermissioninfo->billing == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="billing"></td>
                                                                                                        <td><input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->billing)) {
                                                                                                            echo ($userpermissioninfo->billing == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="billing"></td>
                                                                                                        <td> <input type="radio" value="3" <?php
                                                                                                        if (isset($userpermissioninfo->billing)) {
                                                                                                            echo ($userpermissioninfo->billing == '3' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="billing"></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <div class="attorney-permissions-object-name" colspan="4">
                                                                                                <label class="time-entries-expenses-label">
                                                                                                    <input class="time-entries-expenses-checkbox" <?php
                                                                                                        if (isset($userpermissioninfo->time_entries_expense)) {
                                                                                                            echo ($userpermissioninfo->time_entries_expense == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="time_entries_expense" type="checkbox" value="0">
                                                                                                    Restrict to Time Entries &amp; Expenses Only
                                                                                                </label>
                                                                                            </div>

                                                                                            <table class="permissions table table-bordered">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <th></th>
                                                                                                        <th>Entire Firm</th>
                                                                                                        <th>Personal Only</th>
                                                                                                        <th>Hidden</th>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td> <img src="<?php echo base_url() ?>assets/image/small/reporting.svg" alt="Contact"> Reporting</td>
                                                                                                        <td class="attorney-permissions-object-choice"><input type="radio" value="4" <?php
                                                                                                if (isset($userpermissioninfo->Reporting)) {
                                                                                                    echo ($userpermissioninfo->Reporting == '4' ? 'checked' : '');
                                                                                                }
                                                                    ?> name="Reporting"></td>
                                                                                                        <td class="attorney-permissions-object-choice"><input type="radio" value="5" <?php
                                                                                                        if (isset($userpermissioninfo->Reporting)) {
                                                                                                            echo ($userpermissioninfo->Reporting == '5' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="Reporting"></td>
                                                                                                        <td class="attorney-permissions-object-choice"><input type="radio" value="6" <?php
                                                                                                        if (isset($userpermissioninfo->Reporting)) {
                                                                                                            echo ($userpermissioninfo->Reporting == '6' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="Reporting"></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table><br><br>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="rscont">
                                                                                            <table class="permission_details table table-bordered">
                                                                                                <tbody><tr>
                                                                                                        <td colspan="5" class="other-permission-headers"><span>Should </span><?php echo $firmuser['fullname']; ?> <span>be able to...</span></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="permission-details-text">Access data from every case in the system or only those he/she is linked to?</td>
                                                                                                        <td class="permission-details-yes">
                                                                                                            <input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->accessable_case)) {
                                                                                                            echo ($userpermissioninfo->accessable_case == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="accessable_case">
                                                                                                        </td>
                                                                                                        <td class="permission-details-yes-label">
                                                                                                            <label>All firm cases</label>
                                                                                                        </td>
                                                                                                        <td class="permission-details-no">
                                                                                                            <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->accessable_case)) {
                                                                                                            echo ($userpermissioninfo->accessable_case == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="accessable_case">
                                                                                                        </td>
                                                                                                        <td class="permission-details-no-label">
                                                                                                            <label>Only linked cases</label>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="permission-details-text">Add new attorneys, paralegals, and support staff to your firm's MyCase account?</td>
                                                                                                        <td class="permission-details-yes">
                                                                                                            <input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->add_firm_user)) {
                                                                                                            echo ($userpermissioninfo->add_firm_user == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="add_firm_user">
                                                                                                        </td>
                                                                                                        <td class="permission-details-yes-label">
                                                                                                            <label>Yes</label>
                                                                                                        </td>
                                                                                                        <td class="permission-details-no">
                                                                                                            <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->add_firm_user)) {
                                                                                                            echo ($userpermissioninfo->add_firm_user == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="add_firm_user">
                                                                                                        </td>
                                                                                                        <td class="permission-details-no-label">
                                                                                                            <label>No</label>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="permission-details-text">Edit user permission settings?</td>
                                                                                                        <td class="permission-details-yes">
                                                                                                            <input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->edit_user_permission)) {
                                                                                                            echo ($userpermissioninfo->edit_user_permission == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="edit_user_permission">
                                                                                                        </td>
                                                                                                        <td class="permission-details-yes-label">
                                                                                                            <label>Yes</label>
                                                                                                        </td>
                                                                                                        <td class="permission-details-no">
                                                                                                            <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->edit_user_permission)) {
                                                                                                            echo ($userpermissioninfo->edit_user_permission == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?>  name="edit_user_permission">
                                                                                                        </td>
                                                                                                        <td class="permission-details-no-label">
                                                                                                            <label>No</label>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="permission-details-text">Delete items (events, documents, etc.) from MyCase?</td>
                                                                                                        <td class="permission-details-yes">
                                                                                                            <input type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->delete_item)) {
                                                                                                            echo ($userpermissioninfo->delete_item == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="delete_item">
                                                                                                        </td>
                                                                                                        <td class="permission-details-yes-label">
                                                                                                            <label>Yes</label>
                                                                                                        </td>
                                                                                                        <td class="permission-details-no">
                                                                                                            <input type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->delete_item)) {
                                                                                                            echo ($userpermissioninfo->delete_item == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="delete_item">
                                                                                                        </td>
                                                                                                        <td class="permission-details-no-label">
                                                                                                            <label>No</label>
                                                                                                        </td>
                                                                                                    </tr>

                                                                                                    <tr>
                                                                                                        <td class="permission-details-text">Manage your firm's preferences, billing, and payment options?</td>
                                                                                                        <td class="permission-details-yes">
                                                                                                            <input id="firm_manager_183428_true" type="radio" value="1" <?php
                                                                                                        if (isset($userpermissioninfo->manage_billing_payment)) {
                                                                                                            echo ($userpermissioninfo->manage_billing_payment == '1' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="manage_billing_payment">
                                                                                                        </td>
                                                                                                        <td class="permission-details-yes-label">
                                                                                                            <label for="firm_manager_183428_true">Yes</label>
                                                                                                        </td>
                                                                                                        <td class="permission-details-no">
                                                                                                            <input id="firm_manager_183428_false" type="radio" value="2" <?php
                                                                                                        if (isset($userpermissioninfo->manage_billing_payment)) {
                                                                                                            echo ($userpermissioninfo->manage_billing_payment == '2' ? 'checked' : '');
                                                                                                        }
                                                                    ?> name="manage_billing_payment">
                                                                                                        </td>
                                                                                                        <td class="permission-details-no-label">
                                                                                                            <label for="firm_manager_183428_false">No</label>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody></table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>



                                                                                <div id="permissions_save_183428" class="attorney-permission-save" style="float: right">
                                                                                    <button type="submit" class="btn btn-primary">
                                                                                        Save Permissions
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-primary" onclick="canclebtn()">
                                                                                        Cancel Without Saving
                                                                                    </button>
                                                                                </div><br><br>
                                                                            </form></div>

                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>	
                                        </div>			
                                    </div>
                                    <!-- /main content -->

                                </div>
                                <!-- /page content -->
                            </div>
                            <br>
                            <hr>
                        </div>
                    </div>
                    <!-- /main content -->
                </div>
            </div>			</div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->
