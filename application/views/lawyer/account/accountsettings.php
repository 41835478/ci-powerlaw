<!-- Page header -->
<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>accountSettings/<?php echo $_SESSION['user_id']; ?>">Account Settings</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
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

                                <!-- Task navigation -->
                                <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE);?>
                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->

                    <!-- Main content -->
                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-8">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Common Settings</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url()?>addFirmuser">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url()?>assets/image/add-user.svg">
                                                        <div class="mt-1">Add a New User</div>
                                                    </a>
                                                </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url()?>firmuser">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url()?>assets/image/edit-permissions.svg">
                                                        <div class="mt-1">Edit User Permissions</div>
                                                    </a>          </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url()?>setworkflow">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url()?>assets/image/workflows.svg">
                                                        <div class="mt-1">Set Up Workflows</div>
                                                    </a>          </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="https://rsuser.mycase.com/custom_fields?group=court_case">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url()?>assets/image/custom-fields.svg">
                                                        <div class="mt-1">Set Up Custom Fields</div>
                                                    </a>          </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="https://rsuser.mycase.com/firms/rsuser#online_payments">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url()?>assets/image/online-payments.svg">
                                                        <div class="mt-1">Accept Client Payments Online</div>
                                                    </a>            </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url()?>firmsettings">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url()?>assets/image/settings.svg">
                                                        <div class="mt-1">Edit Firm Info &amp; Settings</div>
                                                    </a>          </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Active Firm Users</div>
                                        <div class="panel-body">
                                            <table class="table mb-0">
                                                <thead class="table-active">
                                                    <tr><th></th>
                                                        <th>Name</th>
                                                        <th>Account Created</th>
                                                    </tr></thead>
                                                <tbody>
                                                    <?php foreach($allfirmuser as $firmuser){ //echo '<pre>'; print_r($firmuser); ?>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <?php if($firmuser['Picture'] !=''){ ?>
                                                            <img class="rounded-circle" src="<?php echo base_url()?>upload/user/<?php echo $firmuser['Picture']; ?>" alt="Default avatar 64" width="32" height="32">
                                                            <?php } else { ?>
                                                            <img class="rounded-circle" src="<?php echo base_url()?>upload/user/default_user.png" alt="Default avatar 64" width="32" height="32">
                                                              <?php } ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="https://rsuser.mycase.com/contacts/attorneys/7191698"><?php echo $firmuser['fullname']; ?></a>
                                                            <br>
                                                            <?php if($firmuser['status'] == '1') { echo 'Attorney'; } else if ($firmuser['status'] == '2') { echo 'Paralegal';} else if ($firmuser['status'] == '3') { echo 'Staff';} else { echo 'Client'; }?>
                                                        </td>
                                                        <td class="align-middle">
                                                          <?php echo date('d F Y',$firmuser['created_at']); ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <h4 style="text-align: center"><a href="<?php echo base_url()?>firmuser">View</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4"> 
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Profile Summary</div>
                                        <div class="panel-body">
                                            <div class="card-block">
                                                <div class="row no-gutters d-flex align-items-center">
                                                    <div class="col-3 col-md-auto">
                                                        <?php if(isset($userinfo->Picture) && $userinfo->Picture !=''){?>
                                                        <img class="rounded-circle" src="<?php echo base_url()?>upload/user/<?php echo $userinfo->Picture; ?>" alt="Default avatar 64" width="50" height="50">
                                                        <?php } else { ?>
                                                        <img class="rounded-circle" src="<?php echo base_url()?>upload/user/default_user.png" alt="Default avatar 64" width="50" height="50">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col pl-3">
                                                        <span class="h6">Welcome, <?php echo $userinfo->fullname?></span>
                                                        <br>
                                                        <a href="<?php echo base_url()?>edituserprofile/<?php echo $this->uri->segment('2');?>">Edit Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Account Summary</div>
                                        <div class="panel-body">
                                            <div class="card-block">
                                                <div class="mb-3">
                                                   <?php echo count($allfirmuser);?> Active firm users
                                                    <br>
                                                    <a href="<?php echo base_url()?>firmuser">Update users</a>
                                                </div>
                                                <div>
                                                    Next billing date: June 05, 2017
                                                    <br>
                                                    Next bill amount: $78.00
                                                    <br>
                                                    <a href="<?php echo base_url()?>firmsettings">Update account billing</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Integrations</div>
                                        <div class="panel-body">
                                            <div class="card-block">
                                                <div>
                                                    <div class="row no-gutters d-flex align-items-center">
                                                        <div class="col-3 col-md-auto">
                                                            <img src="https://assets.mycase.com/assets/apps/email_96-d8aaca17d6754727d7f9dfa869a983b4d864182cabbd313c530990c80f7b1398.png" alt="Email 96" width="50" height="50">
                                                        </div>
                                                        <div class="col pl-3">
                                                            <span class="h6">Email Integration</span>
                                                            <br>
                                                            MyCase, Inc.
                                                        </div>
                                                    </div>
                                                    <div class="row no-gutters mt-2">
                                                        Forward your emails into MyCase and associate them with contacts and cases.
                                                        <br>
                                                        <a href="https://rsuser.mycase.com/apps#app_email_integration">Learn More</a>
                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="row no-gutters d-flex align-items-center">
                                                        <div class="col-3 col-md-auto">
                                                            <img src="https://assets.mycase.com/assets/apps/QuickBooks_Icon_lg-8b24323d99ce573d046aff1d77fc70106eb2034daf8cd56b815ec27afd022666.png" alt="Quickbooks icon lg" width="50" height="50">
                                                        </div>
                                                        <div class="col pl-3">
                                                            <span class="h6">Quickbooks Sync</span>
                                                            <br>
                                                            MyCase, Inc.
                                                        </div>
                                                    </div>
                                                    <div class="row no-gutters mt-2">
                                                        Sync MyCase with your QuickBooks account to export data to your QuickBooks online account.
                                                        <br>
                                                        <a href="https://rsuser.mycase.com/apps#app_quickbooks_sync">Learn More</a>
                                                    </div>
                                                </div>

                                                <div class="pt-4">
                                                    <div class="row no-gutters d-flex align-items-center">
                                                        <div class="col-3 col-md-auto">
                                                            <img src="https://assets.mycase.com/assets/apps/google_96-a9b619c47165aa7d882577388fb3f2e61c0976a967414d5477e393da99e31786.png" alt="Google 96" width="50" height="50">
                                                        </div>
                                                        <div class="col pl-3">
                                                            <span class="h6">Google Sync</span>
                                                            <br>
                                                            MyCase, Inc.
                                                        </div>
                                                    </div>
                                                    <div class="row no-gutters mt-2">
                                                        Sync MyCase with your Google account to enjoy 2-way synchronization of calendars.
                                                        <br>
                                                        <a href="https://rsuser.mycase.com/apps#app_google_sync">Learn More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /main charts -->
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