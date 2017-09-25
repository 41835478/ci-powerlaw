

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
                                            <li><a href="lawyeradmin/user"><i class="icon-users"></i> <span>Attorney & Staff</span></a></li>
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
                    </div>			<!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">Add User</legend>
                                        </fieldset>
                                    </div>
                                    <div class="panel-body">



                                        <style type="text/css">
                                            label{
                                                text-align: left !important;

                                            }
                                        </style>

                                        <form id="form-signup" action="/user/add-user" method="post" role="form">
                                            <input type="hidden" name="_csrf" value="WGNZYkNNYy4IJRAbCSQAFhEJNhIqATpoDCYwJ3M3MX1hDRQ2bnskGQ==">                <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-username required">
                                                        <label class="control-label" for="user-username">Username</label>
                                                        <input type="text" id="user-username" class="form-control" name="User[username]" placeholder="Enter Your User Name">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-email required">
                                                        <label class="control-label" for="user-email">Email</label>
                                                        <input type="text" id="user-email" class="form-control" name="User[email]" placeholder="Enter Your Last Name">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-firstname">
                                                        <label class="control-label" for="user-firstname">First Name</label>
                                                        <input type="text" id="user-firstname" class="form-control" name="User[FirstName]" placeholder="Enter Your First Name">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-lastname">
                                                        <label class="control-label" for="user-lastname">Last Name</label>
                                                        <input type="text" id="user-lastname" class="form-control" name="User[LastName]" placeholder="Enter Your Last Name">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-mobile">
                                                        <label class="control-label" for="user-mobile">Mobile</label>
                                                        <input type="text" id="user-mobile" class="form-control" name="User[Mobile]" placeholder="Enter Your Mobile Number" data-mask="999-999-9999">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-phone">
                                                        <label class="control-label" for="user-phone">Phone</label>
                                                        <input type="text" id="user-phone" class="form-control" name="User[Phone]" placeholder="Enter Your Phone Number" data-mask="999-999-9999">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-fax">
                                                        <label class="control-label" for="user-fax">Fax</label>
                                                        <input type="text" id="user-fax" class="form-control" name="User[Fax]" placeholder="Enter Your Mobile Number" data-mask="999-999-9999">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-website">
                                                        <label class="control-label" for="user-website">Website</label>
                                                        <input type="text" id="user-website" class="form-control" name="User[Website]" placeholder="Enter Your website">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-address1">
                                                        <label class="control-label" for="user-address1">Address1</label>
                                                        <input type="text" id="user-address1" class="form-control" name="User[Address1]" placeholder="Enter Your Address Line 1">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-address2">
                                                        <label class="control-label" for="user-address2">Address2</label>
                                                        <input type="text" id="user-address2" class="form-control" name="User[Address2]" placeholder="Enter Your Address Line 2">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-country">
                                                        <label class="control-label" for="user-country">Country</label>
                                                        <select id="user-country" class="select-search" name="User[Country]" onchange="getState(this.value)">
                                                            <option value="">Select Country</option>
                                                            <option value="4">Australia</option>
                                                            <option value="1">India</option>
                                                            <option value="5">Nigeria</option>
                                                            <option value="3">United Kingdom</option>
                                                            <option value="2">United States of America</option>
                                                        </select>

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-state">
                                                        <label class="control-label" for="user-state">State</label>
                                                        <select id="user-state" class="select-search" name="User[State]">
                                                            <option value="">Select State</option>
                                                        </select>

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-city">
                                                        <label class="control-label" for="user-city">City</label>
                                                        <input type="text" id="user-city" class="form-control" name="User[City]" placeholder="Enter Your City">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group field-user-zipcode">
                                                        <label class="control-label" for="user-zipcode">Zip Code</label>
                                                        <input type="text" id="user-zipcode" class="form-control" name="User[ZipCode]" placeholder="Enter Your Zip Code">

                                                        <p class="help-block help-block-error"></p>
                                                    </div>                    </div>
                                            </div>

                                            <div class="form-group field-user-role">
                                                <label class="control-label" for="user-role">Role</label>
                                                <select id="user-role" class="form-control" name="User[role]">
                                                    <option value="attorney">Attorney</option>
                                                    <option value="member">Staff</option>
                                                </select>

                                                <p class="help-block help-block-error"></p>
                                            </div>                <div class="form-group" style="margin-left:13px">
                                                <div class="col-md-offset-3">
                                                    <button type="submit" class="btn btn-primary" name="signup-button">Save</button>                    
                                                </div>
                                            </div>
                                        </form>
                                        <script type="text/javascript">
                                            function getState(cId)
                                            {
                                                $.post("/account/get-state?cId=" + cId, function (data)
                                                {
                                                    $('#user-state').html(data);
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- /main charts -->


                    </div>
                    <!-- /main content -->
                </div>
           

       
        <!-- /main content -->

    
    <!-- /page content -->

    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->