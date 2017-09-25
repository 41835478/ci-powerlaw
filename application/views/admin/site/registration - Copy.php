

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
                                        <input type="hidden" name="_csrf" value="LUVoR3pYMFVPEiRyKgFDIFR1JSIwO1gfZQswEAIqVyJdCB0rCRtiZA==">        							<div class="row">
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
                                            <a href="/mypowerlaw/site/login" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</a>
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

