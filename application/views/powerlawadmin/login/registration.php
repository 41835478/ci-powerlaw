
<!DOCTYPE html>
<html lang="en-US">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/mypowerlaw/themes/ladmin/layouts/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/mypowerlaw/themes/ladmin/layouts/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/mypowerlaw/themes/ladmin/layouts/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/mypowerlaw/themes/ladmin/layouts/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/mypowerlaw/themes/ladmin/layouts/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/mypowerlaw/themes/ladmin/layouts/assets/favicon.ico" type="image/ico"/>
    <!-- /global stylesheets -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-param" content="_csrf">
        <meta name="csrf-token" content="VDNnRndvNzE2ZCtzJzZERC0DKiM9DF97HH0/EQ8dUEYkfhIqBCxlAA==">
        <title>Welcome to myPowerLaw</title>
    </head>
    <body>

        <!-- Main navbar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="/mypowerlaw/"><img src="/mypowerlaw/themes/ladmin/layouts/assets/images/logo_light.png" alt=""></a>

                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile" style="display:none;">
                <ul class="nav navbar-nav navbar-right" style="display:none;">
                    <li>
                        <a href="#">
                            <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog3"></i>
                            <span class="visible-xs-inline-block position-right"> Options</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container login-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Simple login form -->

                    <!-- Registration form -->
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4">
                            <div class="panel registration-form">
                                <div class="panel-body">
                                    <div class="text-center">
                                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                        <h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
                                    </div>

                                    <form id="form-signup" action="/mypowerlaw/" method="post" role="form">
                                        <input type="hidden" name="_csrf" value="VDNnRndvNzE2ZCtzJzZERC0DKiM9DF97HH0/EQ8dUEYkfhIqBCxlAA==">        							<div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group field-firm-contactfname required">

                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-check text-muted"></i>
                                                    </div>
                                                    <input type="text" id="firm-contactfname" class="form-control" name="Firm[ContactFName]" placeholder="First Name">
                                                    <p class="help-block help-block-error"></p>

                                                </div>			            				</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group field-firm-contactlname required">

                                                    <div class="form-control-feedback">
                                                        <i class="icon-user-check text-muted"></i>
                                                    </div>
                                                    <input type="text" id="firm-contactlname" class="form-control" name="Firm[ContactLName]" placeholder="Last Name">
                                                    <p class="help-block help-block-error"></p>

                                                </div>			            				</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group field-firm-email required">

                                                    <div class="form-control-feedback">
                                                        <i class="icon-mention text-muted"></i>
                                                    </div>
                                                    <input type="text" id="firm-email" class="form-control" name="Firm[Email]" placeholder="Email Address">
                                                    <p class="help-block help-block-error"></p>

                                                </div>			            				</div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group field-firm-firmname required">

                                                    <div class="form-control-feedback">
                                                        <i class="icon-office text-muted"></i>
                                                    </div>
                                                    <input type="text" id="firm-firmname" class="form-control" name="Firm[FirmName]" placeholder="Firm Name">
                                                    <p class="help-block help-block-error"></p>

                                                </div>			            				</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4" style="padding-right: 0px;">
                                                <div class="form-group field-firm-ccodem required">

                                                    <select id="firm-ccodem" class="form-control" name="Firm[CCodeM]" onchange="getState(this.value)">
                                                        <option value="4">AU (+61)</option>
                                                        <option value="1">IN (+91)</option>
                                                        <option value="5">NG (+234)</option>
                                                        <option value="3">UK (+44)</option>
                                                        <option value="2" Selected>USA (+1)</option>
                                                    </select>

                                                    <p class="help-block help-block-error"></p>
                                                </div>        								</div>
                                            <div class="col-sm-8">
                                                <div class="form-group field-firm-mobile required">

                                                    <div class="form-control-feedback">
                                                        <i class="icon-mobile text-muted"></i>
                                                    </div>
                                                    <input type="text" id="firm-mobile" class="form-control" name="Firm[Mobile]" placeholder="Mobile Number" data-mask="999-999-9999">
                                                    <p class="help-block help-block-error"></p>

                                                </div>			            				</div>
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="styled" checked="checked">
                                                    Subscribe to monthly newsletter
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="styled" checked="checked">
                                                    Accept <a href="#">terms of service</a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <a href="<?php echo base_url()?>admin" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
                                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10" name="signup-button">Signup <b><i class="icon-plus3"></i></button>										<button style="display: none;" type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                                        </div>
                                        <div style="color:#666;margin:1em 0">
                                            <i>*We will send you an email with account activation link.</i>
                                        </div>
                                </div>

                                </form>							</div>
                        </div>
                    </div>
                    <!-- /registration form -->

                    <!-- /simple login form -->

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

        <!-- Core JS files -->
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/loaders/pace.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/loaders/blockui.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/ui/nicescroll.min.js"></script>
        <!--<script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/ui/drilldown.js"></script> -->
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>

<!--	<script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/core/libraries/jasny_bootstrap.min.js"></script> -->
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/autosize.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/formatter.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/handlebars.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/passy.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/maxlength.min.js"></script>


<!--	<script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/core/app.js"></script>
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/pages/login.js"></script> -->
        <script type="text/javascript" src="/mypowerlaw/themes/ladmin/layouts/assets/js/pages/form_controls_extended.js"></script>
        <!-- /theme JS files -->

        <script src="/mypowerlaw/assets/a1b7d7e6/jquery.js"></script>
        <script src="/mypowerlaw/assets/6fd43fe0/yii.js"></script>
        <script src="/mypowerlaw/assets/6fd43fe0/yii.validation.js"></script>
        <script src="/mypowerlaw/assets/6fd43fe0/yii.activeForm.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/core/libraries/jasny_bootstrap.min.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/autosize.min.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/handlebars.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/forms/inputs/maxlength.min.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
        <script src="/mypowerlaw/themes/ladmin/layouts/assets/js/pages/picker_date.js"></script>
        <script type="text/javascript">jQuery(document).ready(function () {
                                                            jQuery('#form-signup').yiiActiveForm([{"id": "firm-contactfname", "name": "ContactFName", "container": ".field-firm-contactfname", "input": "#firm-contactfname", "error": ".help-block.help-block-error", "validate": function (attribute, value, messages, deferred, $form) {
                                                                        yii.validation.required(value, messages, {"message": "First Name cannot be blank."});
                                                                        yii.validation.string(value, messages, {"message": "First Name must be a string.", "max": 255, "tooLong": "First Name should contain at most 255 characters.", "skipOnEmpty": 1});
                                                                    }}, {"id": "firm-contactlname", "name": "ContactLName", "container": ".field-firm-contactlname", "input": "#firm-contactlname", "error": ".help-block.help-block-error", "validate": function (attribute, value, messages, deferred, $form) {
                                                                        yii.validation.required(value, messages, {"message": "Last Name cannot be blank."});
                                                                        yii.validation.string(value, messages, {"message": "Last Name must be a string.", "max": 255, "tooLong": "Last Name should contain at most 255 characters.", "skipOnEmpty": 1});
                                                                    }}, {"id": "firm-email", "name": "Email", "container": ".field-firm-email", "input": "#firm-email", "error": ".help-block.help-block-error", "validate": function (attribute, value, messages, deferred, $form) {
                                                                        yii.validation.required(value, messages, {"message": "Email Address cannot be blank."});
                                                                        yii.validation.string(value, messages, {"message": "Email Address must be a string.", "max": 50, "tooLong": "Email Address should contain at most 50 characters.", "skipOnEmpty": 1});
                                                                        yii.validation.email(value, messages, {"pattern": /^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/, "fullPattern": /^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/, "allowName": false, "message": "Email Address is not a valid email address.", "enableIDN": false, "skipOnEmpty": 1});
                                                                    }}, {"id": "firm-firmname", "name": "FirmName", "container": ".field-firm-firmname", "input": "#firm-firmname", "error": ".help-block.help-block-error", "validate": function (attribute, value, messages, deferred, $form) {
                                                                        yii.validation.required(value, messages, {"message": "Firm Name cannot be blank."});
                                                                        yii.validation.string(value, messages, {"message": "Firm Name must be a string.", "max": 255, "tooLong": "Firm Name should contain at most 255 characters.", "skipOnEmpty": 1});
                                                                    }}, {"id": "firm-ccodem", "name": "CCodeM", "container": ".field-firm-ccodem", "input": "#firm-ccodem", "error": ".help-block.help-block-error", "validate": function (attribute, value, messages, deferred, $form) {
                                                                        yii.validation.required(value, messages, {"message": "Ccode M cannot be blank."});
                                                                        yii.validation.number(value, messages, {"pattern": /^\s*[+-]?\d+\s*$/, "message": "Ccode M must be an integer.", "skipOnEmpty": 1});
                                                                    }}, {"id": "firm-mobile", "name": "Mobile", "container": ".field-firm-mobile", "input": "#firm-mobile", "error": ".help-block.help-block-error", "validate": function (attribute, value, messages, deferred, $form) {
                                                                        yii.validation.required(value, messages, {"message": "Mobile Number cannot be blank."});
                                                                        yii.validation.string(value, messages, {"message": "Mobile Number must be a string.", "max": 255, "tooLong": "Mobile Number should contain at most 255 characters.", "skipOnEmpty": 1});
                                                                        yii.validation.string(value, messages, {"message": "Mobile Number must be a string.", "min": 10, "tooShort": "Mobile Number should contain at least 10 characters.", "max": 12, "tooLong": "Mobile Number should contain at most 12 characters.", "skipOnEmpty": 1});
                                                                    }}], []);
                                                        });</script></body>
</html>
