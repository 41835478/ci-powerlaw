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
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title">
                                        <span>My Profile</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding">
                                        <ul class="navigation navigation-main navigation-accordion">
                                            <li><a href="account"><i class="icon-googleplus5"></i> <span>Contact Information</span></a></li>
                                            <li><a href="account/accountNotification"><i class="icon-compose"></i> <span>Notifications</span></a></li>
                                            <li><a href="account/accountPicture"><i class="icon-user-plus"></i> <span>Profile Picture</span></a></li>
                                            <li><a href="account/changePassword"><i class="icon-collaboration"></i> <span>Change Password</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /task navigation -->


                                <!-- Task navigation -->
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title category-collapsed">
                                        <span>Custom Fields</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding" style="display: none;">
                                        <ul class="navigation navigation-main navigation-accordion">
                                            <li><a href="#"><i class="icon-googleplus5"></i> <span>Cases/ Matters</span></a></li>
                                            <li><a href="#"><i class="icon-portfolio"></i> <span>Contacts</span></a></li>
                                            <li><a href="#"><i class="icon-compose"></i> <span>Companies</span></a></li>
                                            <li><a href="#"><i class="icon-user-plus"></i> <span>Time & Expenses</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /task navigation -->


                                <!-- Task navigation -->
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title category-collapsed">
                                        <span>Firm Settings</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding" style="display: none;">
                                        <ul class="navigation navigation-main navigation-accordion">
                                            <li><a href="firm"><i class="icon-googleplus5"></i> <span>Firm Contact Information</span></a></li>
                                            <li><a href="firm/firmPreferences"><i class="icon-portfolio"></i> <span>Firm Preferences</span></a></li>
                                            <li><a href="firm/firmNotification"><i class="icon-portfolio"></i> <span>Firm Notifications</span></a></li>
                                            <!--
                                            <li><a href="#"><i class="icon-compose"></i> <span>Setup Online Payments</span></a></li>
                                            <li><a href="#"><i class="icon-user-plus"></i> <span>My Payment Information</span></a></li>
                                            -->
                                        </ul>
                                    </div>
                                </div>
                                <!-- /task navigation -->

                                <!-- Task navigation -->
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title category-collapsed">
                                        <span>Firm Users</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding" style="display: none;">
                                        <ul class="navigation navigation-main navigation-accordion">
                                            <li><a href="user"><i class="icon-users"></i> <span>Attorney & Staff</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /task navigation -->



                                <!-- Task navigation -->
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title category-collapsed">
                                        <span>Import/ Export</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding" style="display: none;">
                                        <ul class="navigation navigation-main navigation-accordion">
                                            <li><a href="#"><i class="icon-user-plus"></i> <span>Contacts & Companies</span></a></li>
                                            <li><a href="#"><i class="icon-user-plus"></i> <span>Cases/ Matters</span></a></li>
                                            <li><a href="#"><i class="icon-user-plus"></i> <span>Full Backup</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /task navigation -->


                            </div>
                        </div>
                    </div>      <!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Change Password</h5>
                                        <div class="heading-elements">
                                        </div>                                  
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        <!-- Login Form Starts -->

                                        <form id="w0" class="form-horizontal" action="/user/change-password" method="post" role="form">
                                            <input type="hidden" name="_csrf" value="UVRrZjZYU2gBEiIffDEwUBg.BBZfFAouBRECIwYiATtoOiYyG24UXw==">      

                                            <div class="form-group field-loginform-oldpassword required">
                                                <label class="col-sm-2 control-label" for="loginform-oldpassword">Current Password</label>
                                                <div class="col-sm-3"><input type="password" id="loginform-oldpassword" class="form-control" name="LoginForm[oldpassword]" placeholder="Current Password"></div>
                                                <div class="col-sm-5"><div class="help-block help-block-error "></div></div>
                                            </div>        
                                            <div class="form-group field-loginform-password required">
                                                <label class="col-sm-2 control-label" for="loginform-password">New Password</label>
                                                <div class="col-sm-3"><input type="password" id="loginform-password" class="form-control" name="LoginForm[password]" placeholder="New Password"></div>
                                                <div class="col-sm-5"><div class="help-block help-block-error "></div></div>
                                            </div>        <div class="form-group field-loginform-repeatpassword required">
                                                <label class="col-sm-2 control-label" for="loginform-repeatpassword">Confirm Password</label>
                                                <div class="col-sm-3"><input type="password" id="loginform-repeatpassword" class="form-control" name="LoginForm[repeatpassword]" placeholder="Confirm Password"></div>
                                                <div class="col-sm-5"><div class="help-block help-block-error "></div></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-offset-3 col-md-3">
                                                    <button type="submit" class="btn btn-primary">Change Password</button>        </div>
                                            </div>


                                        </form>

                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- /main charts -->


                    </div>
                    <!-- /main content -->
                </div>
            </div>















            <style>
                td{
                    padding:15px !important;
                }
            </style>












        </div>
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