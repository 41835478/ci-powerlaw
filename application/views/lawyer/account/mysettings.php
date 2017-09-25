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
                             <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE);?>

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
                                <div class="col-md-4">
                                    <h3>My Settings</h3>
                                    <h6>Account Preferences</h6>
                                    <p>Edit your account preferences. These preferences only affect your account.</p>
                                </div>
                                <div class="col-md-6" style="background: #fff">
                                    <div id="info_page" style="margin: 20px;">
                                        <form method="post" action="<?php echo base_url() ?>updateuseracc/<?php echo $userinfo->id; ?>" id="useraccountform">
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Default Event Reminders : </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="fullname" id="fullname" value="None">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Default Task Reminders :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="Address1" id="Address1" value="None">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Time Zone :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="Phone" id="Phone" value="Dhaka">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Getting Started Tips :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" readonly type="text" name="Mobile" id="Mobile" value="On The getting started checklist is visible.">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Automatic Logout  :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <textarea class="form-control" rows="6" cols="50" readonly>Automatically log me out after 60 minutes of inactivity. Do not automatically log me out if I have a timer running. Note: You will always be logged out when you close your web browser.</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>MyCase Dock  :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="email" value="The MyCase dock is visible.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" style="border-radius: 4px;" class="btn btn-primary edit-contact-info" id="accountupdatesubid">Edit Contact Information</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <!---------------------------CHANGE EMAIL--------------------------->


                            <div class="row">
                                <div class="col-md-12" style="background: #fff">
                                    <div id="info_page" style="margin: 20px;">
                                        <form id="updateaccountemail" method="post" action="<?php echo base_url() ?>changeaccountemail/<?php echo $userinfo->id; ?>">
                                            <h3>Two-Factor Authentication</h3>
                                            <p>Increase the security of your MyCase account by enabling Two-Factor Authentication.</p>
                                            <p>To get started, click the "Enable Two-Factor Authentication" button, then follow the on-screen instructions.</p>
                                            <p>Please Note: You will need a smartphone to enable this feature.</p>
                                            <div>
                                                <button style="border-radius: 4px;" id="updateemail" class="btn btn-primary" type="submit">Enable Two-Factor Authentication</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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