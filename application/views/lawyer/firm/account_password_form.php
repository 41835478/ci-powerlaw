<!DOCTYPE html>
<html lang="en-US">
    <!-- Global stylesheets -->
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>themes/ladmin/layouts/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>themes/ladmin/layouts/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>themes/ladmin/layouts/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>themes/ladmin/layouts/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>themes/ladmin/layouts/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="<?php echo base_url() ?>themes/ladmin/layouts/assets/favicon.ico" type="image/ico"/>
    <!-- /global stylesheets -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-param" content="_csrf">
        <meta name="csrf-token" content="R2tudDhaaE8KKlY7Uwk5eCUeQyJhKAwWBikKAW4TB35wOT9EWWI7NQ==">
        <title>Login</title>
    </head>
    <body>

        <!-- Main navbar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><img src="<?php echo base_url() ?>themes/ladmin/layouts/assets/images/logo_light.png" alt=""></a>

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
                    <div class="site-login">
                        <form id="login-form" action="<?php echo base_url() ?>firmuserPassword" method="post" role="form">
                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                    <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group has-feedback has-feedback-left">
                                                <div class="form-group field-loginform-username required">
                                                    <input type="password" id="loginform-username" class="form-control" name="password" autofocus placeholder="Password">
                                                    <div class="col-lg-12">
                                                        <p class="help-block help-block-error"></p>
                                                    </div>
                                                </div>	
                                                <div class="form-control-feedback">
                                                    <i class="icon-user text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group has-feedback has-feedback-left">
                                                <div class="form-group field-loginform-password required">
                                                    <input type="password" id="loginform-password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                                    <div class="col-lg-12">
                                                        <p class="help-block help-block-error"></p>
                                                    </div>
                                                </div>										
                                                <div class="form-control-feedback">
                                                    <i class="icon-lock2 text-muted"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="login-button">Submit<i class="icon-circle-right2 position-right"></i></button>									
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-11">

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>
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

        <script src="<?php echo base_url() ?>assets/b6c7423e/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/b05c5bed/yii.js"></script>
        <script src="<?php echo base_url() ?>assets/b05c5bed/yii.validation.js"></script>
        <script src="<?php echo base_url() ?>assets/b05c5bed/yii.activeForm.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/core/libraries/jasny_bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/inputs/autosize.min.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/handlebars.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/inputs/maxlength.min.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/pages/picker_date.js"></script>

        <script src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/jquery-ui.min.js"></script>	<script type="text/javascript" src="/themes/ladmin/layouts/assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/loaders/blockui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/ui/nicescroll.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/ui/drilldown.js"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/visualization/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/styling/switchery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/styling/switch.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/anytime.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/legacy.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/forms/selects/select2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/pages/form_select2.js"></script>
<!--	<script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/pages/form_checkboxes_radios.js"></script> -->
        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/core/app.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/notifications/pnotify.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/pages/components_notifications_pnotify.js"></script>


        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/notifications/sweet_alert.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/plugins/notifications/bootbox.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>themes/ladmin/layouts/assets/js/pages/components_modals.js"></script>
    </body>
</html>
