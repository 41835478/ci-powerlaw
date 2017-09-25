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
                    </div>
                    <!-- /main sidebar -->

                    <!-- Main content -->

                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">Update Contact Information</legend>
                                        </fieldset>
                                    </div>
                                    <div class="panel-body">

                                        <div class="firm-form">

                                            <form id="w0" action="/firm" method="post">
                                                <input type="hidden" name="_csrf" value="c2MwaDRHNVAjJXkRfi5WaDoJXxhdC2wWJyZZLQQ9ZwNKDX08GXFyZw==">

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-firmname required">
                                                            <label class="control-label" for="firm-firmname">Firm Name</label>
                                                            <input type="text" id="firm-firmname" class="form-control" name="Firm[FirmName]" value="Jones Law PLLC" readonly="readonly" maxlength="255">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <label style="margin-bottom: -10px;">Mobile Number</label>
                                                        <div class="form-group field-firm-ccodem required">

                                                            <select id="firm-ccodem" class="form-control" name="Firm[CCodeM]" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                                                <option value="">Select One</option>
                                                                <option value="4">AU (+61)</option>
                                                                <option value="1">IN (+91)</option>
                                                                <option value="5">NG (+234)</option>
                                                                <option value="3">UK (+44)</option>
                                                                <option value="2">USA (+1)</option>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>            <div class="form-group field-firm-mobile required">

                                                            <input type="text" id="firm-mobile" class="form-control" name="Firm[Mobile]" value="213-222-1222" maxlength="255" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <label style="margin-bottom: -10px;">Phone Number</label>
                                                        <div class="form-group field-firm-ccodep">

                                                            <select id="firm-ccodep" class="form-control" name="Firm[CCodeP]" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                                                <option value="">Select One</option>
                                                                <option value="4">AU (+61)</option>
                                                                <option value="1">IN (+91)</option>
                                                                <option value="5">NG (+234)</option>
                                                                <option value="3">UK (+44)</option>
                                                                <option value="2">USA (+1)</option>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>            <div class="form-group field-firm-phone">

                                                            <input type="text" id="firm-phone" class="form-control" name="Firm[Phone]" value="" maxlength="255" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label style="margin-bottom: -10px;">Fax Number</label>
                                                        <div class="form-group field-firm-ccodef">

                                                            <select id="firm-ccodef" class="form-control" name="Firm[CCodeF]" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                                                <option value="">Select One</option>
                                                                <option value="4">AU (+61)</option>
                                                                <option value="1">IN (+91)</option>
                                                                <option value="5">NG (+234)</option>
                                                                <option value="3">UK (+44)</option>
                                                                <option value="2">USA (+1)</option>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>            <div class="form-group field-firm-fax">

                                                            <input type="text" id="firm-fax" class="form-control" name="Firm[Fax]" value="" maxlength="20" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-website">
                                                            <label class="control-label" for="firm-website">Website</label>
                                                            <input type="text" id="firm-website" class="form-control" name="Firm[Website]" value="" maxlength="255">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-address1">
                                                            <label class="control-label" for="firm-address1">Address</label>
                                                            <input type="text" id="firm-address1" class="form-control" name="Firm[Address1]" value="" maxlength="255">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-address2">
                                                            <label class="control-label" for="firm-address2">Suite/ Apt/ Building</label>
                                                            <input type="text" id="firm-address2" class="form-control" name="Firm[Address2]" value="" maxlength="255">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-country">
                                                            <label class="control-label" for="firm-country">Country</label>
                                                            <select id="firm-country" class="select-search" name="Firm[Country]" onchange="getState(this.value)">
                                                                <option value="">Select Country</option>
                                                                <option value="4">Australia</option>
                                                                <option value="1">India</option>
                                                                <option value="5">Nigeria</option>
                                                                <option value="3">United Kingdom</option>
                                                                <option value="2">United States of America</option>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-state">
                                                            <label class="control-label" for="firm-state">State</label>
                                                            <select id="firm-state" class="select-search" name="Firm[State]">
                                                                <option value="">Select State</option>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-city">
                                                            <label class="control-label" for="firm-city">City</label>
                                                            <input type="text" id="firm-city" class="form-control" name="Firm[City]" value="" maxlength="255">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-firm-zipcode">
                                                            <label class="control-label" for="firm-zipcode">Zip Code</label>
                                                            <input type="text" id="firm-zipcode" class="form-control" name="Firm[ZipCode]" value="" maxlength="20">

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                </div>



                                                <div class="form-group" align="center">
                                                    <button type="submit" class="btn btn-primary">Update Contact Information</button>    </div>

                                            </form>
                                        </div>

                                        <script type="text/javascript">
                                            function getState(cId)
                                            {
                                                $.post("/account/get-state?cId=" + cId, function (data)
                                                {
                                                    $('#firm-state').html(data);
                                                });
                                            }
                                        </script>                            </div>
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