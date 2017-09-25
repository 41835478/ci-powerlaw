<!-- Page container -->
<div class="page-container">
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
    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Create Country</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="/lcadmin/country/index"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">

                    <style type="text/css">
                        legend{
                            font-weight: bold;
                        }
                    </style>
                    <div class="country-form">

                        <form id="w0" action="<?php echo base_url()?>createcountry" method="post">
                           <fieldset>
                                <legend>Country Information:</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Country Code</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="CountryCode" maxlength="20">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-countryname required">
                                            <label class="control-label" for="country-countryname">Country Name</label>
                                            <input type="text" id="country-countryname" class="form-control" name="CountryName" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Currency Information:</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-currencyname required">
                                            <label class="control-label" for="country-currencyname">Currency Name</label>
                                            <input type="text" id="country-currencyname" class="form-control" name="CurrencyName" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-currencycode required">
                                            <label class="control-label" for="country-currencycode">Currency Code</label>
                                            <input type="text" id="country-currencycode" class="form-control" name="CurrencyCode" maxlength="20">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-currencysymbol required">
                                            <label class="control-label" for="country-currencysymbol">Currency Symbol</label>
                                            <input type="text" id="country-currencysymbol" class="form-control" name="CurrencySymbol" maxlength="20">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Contact Information:</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-phonecode required">
                                            <label class="control-label" for="country-phonecode">Phone Code</label>
                                            <input type="text" id="country-phonecode" class="form-control" name="PhoneCode" maxlength="5">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-supportphone required">
                                            <label class="control-label" for="country-supportphone">Support Phone</label>
                                            <input type="text" id="country-supportphone" class="form-control" name="SupportPhone" maxlength="20" data-mask="999-999-9999">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-supportemail required">
                                            <label class="control-label" for="country-supportemail">Support Email</label>
                                            <input type="text" id="country-supportemail" class="form-control" name="SupportEmail" maxlength="256">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-streetaddress required">
                                            <label class="control-label" for="country-streetaddress">Street Address</label>
                                            <input type="text" id="country-streetaddress" class="form-control" name="StreetAddress" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-suite">
                                            <label class="control-label" for="country-suite">Suite</label>
                                            <input type="text" id="country-suite" class="form-control" name="Suite" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-city required">
                                            <label class="control-label" for="country-city">City</label>
                                            <input type="text" id="country-city" class="form-control" name="City" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-state required">
                                            <label class="control-label" for="country-state">State</label>
                                            <input type="text" id="country-state" class="form-control" name="State" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-country-zipcode">
                                            <label class="control-label" for="country-zipcode">Zip Code</label>
                                            <input type="text" id="country-zipcode" class="form-control" name="ZipCode" maxlength="255">

                                            <div class="help-block"></div>
                                        </div>            </div>
                                </div>
                            </fieldset>

                            <div class="row">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>    </div>

                        </form>
                    </div>
                </div>
            </div>
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


