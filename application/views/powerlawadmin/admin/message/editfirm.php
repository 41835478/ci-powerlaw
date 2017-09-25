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
                    <h5 class="panel-title">Create Firm</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="/lcadmin/firm/index"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div class="firm-form">
                        <form id="w0" action="<?php echo base_url()?>updatefirm/<?php echo $firmeditinfo->FirmId; ?>" method="post">
                            <input type="hidden" name="_csrf" value="ekpxTTZmRnEsIBI6Dx4fFiotOwBnBz4HGCQcElgLcC4dJCgIfykPEw==">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group field-firm-firmname required">
                                        <label class="control-label" for="firm-firmname">Firm Name</label>
                                        <input type="text" id="firm-firmname" class="form-control" name="FirmName" maxlength="255" value="<?php echo $firmeditinfo->FirmName; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-3">
                                    <div class="form-group field-firm-subdomain">
                                        <label class="control-label" for="firm-subdomain">Sub Domain</label>
                                        <input type="text" id="firm-subdomain" class="form-control" name="SubDomain" maxlength="255" value="<?php echo $firmeditinfo->SubDomain; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-3">
                                    <div class="form-group field-firm-contactlname required">
                                        <label class="control-label" for="firm-contactlname">First Name</label>
                                        <input type="text" id="firm-contactlname" class="form-control" name="ContactFName" maxlength="255" value="<?php echo $firmeditinfo->ContactFName; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-3">
                                    <div class="form-group field-firm-contactlname required">
                                        <label class="control-label" for="firm-contactlname">Last Name</label>
                                        <input type="text" id="firm-contactlname" class="form-control" name="ContactLName" maxlength="255" value="<?php echo $firmeditinfo->ContactLName; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label style="margin-bottom: -10px;">Mobile Number</label>
                                    <div class="form-group field-firm-ccodem required">

                                        <select id="firm-ccodem" class="form-control" name="CCodeM" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                            <option value="">Select One</option>
                                            <option value="4">AU (+61)</option>
                                            <option value="1">IN (+91)</option>
                                            <option value="5">NG (+234)</option>
                                            <option value="3">UK (+44)</option>
                                            <option value="2">USA (+1)</option>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>            <div class="form-group field-firm-mobile required">

                                        <input type="text" id="firm-mobile" class="form-control" name="Mobile" maxlength="255" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;" value="<?php echo $firmeditinfo->Mobile; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <label style="margin-bottom: -10px;">Phone Number</label>
                                    <div class="form-group field-firm-ccodep">

                                        <select id="firm-ccodep" class="form-control" name="CCodeP" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                            <option value="">Select One</option>
                                            <?php foreach($allphonecode as $phonecode) { ?>
                                            <option value="<?php echo $phonecode['PhoneCode']; ?>" <?php if ($phonecode['PhoneCode'] == $firmeditinfo->Phone) { echo "selected"; } ?>><?php echo $phonecode['CountryCode']; ?> (<?php echo $phonecode['PhoneCode']; ?>)</option>
                                            <?php } ?>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>            <div class="form-group field-firm-phone">

                                        <input type="text" id="firm-phone" class="form-control" name="Phone" maxlength="255" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;" value="<?php echo $firmeditinfo->Phone; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <label style="margin-bottom: -10px;">Fax Number</label>
                                    <div class="form-group field-firm-ccodef">

                                        <select id="firm-ccodef" class="form-control" name="CCodeF" style="width: 37%; float: left; margin-right: 10px;">
                                            <option value="">Select One</option>
                                            <option value="4">AU (+61)</option>
                                            <option value="1">IN (+91)</option>
                                            <option value="5">NG (+234)</option>
                                            <option value="3">UK (+44)</option>
                                            <option value="2">USA (+1)</option>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>            <div class="form-group field-firm-fax">

                                        <input type="text" id="firm-fax" class="form-control" name="Fax" maxlength="20" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;" value="<?php echo $firmeditinfo->Fax; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-website">
                                        <label class="control-label" for="firm-website">Website</label>
                                        <input type="text" id="firm-website" class="form-control" name="Website" maxlength="255" value="<?php echo $firmeditinfo->Website; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-email required">
                                        <label class="control-label" for="firm-email">Email Address</label>
                                        <input type="text" id="firm-email" class="form-control" name="Email" maxlength="50" value="<?php echo $firmeditinfo->Email; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-address1">
                                        <label class="control-label" for="firm-address1">Address</label>
                                        <input type="text" id="firm-address1" class="form-control" name="Address1" maxlength="255" value="<?php echo $firmeditinfo->Address1; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-address2">
                                        <label class="control-label" for="firm-address2">Suite/ Apt/ Building</label>
                                        <input type="text" id="firm-address2" class="form-control" name="Address2" maxlength="255" value="<?php echo $firmeditinfo->Address2; ?>">
                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-country">
                                        <label class="control-label" for="firm-country">Country</label>
                                        <select id="firm-country" class="select-search" name="Country">
                                            <option value="">Select Country</option>
                                            <?php foreach($allcountry as $country){ ?>
                                            <option value="<?php echo $country['CountryId']; ?>" <?php if ($country['CountryId'] == $firmeditinfo->Country) { echo "selected"; } ?>><?php echo $country['CountryName']; ?></option>
                                            <?php } ?>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-state">
                                        <label class="control-label" for="firm-state">State</label>
                                        <select id="firm-state" class="select-search" name="State">
                                            <option value="">Select State</option>
                                             <?php foreach($allstate as $state){ ?>
                                             <option value="<?php echo $state['StateId']; ?>" <?php if ($state['StateId'] == $firmeditinfo->State) { echo "selected"; } ?>><?php echo $state['StateName']; ?></option>
                                             <?php } ?>
                                            
                                        </select>

                                        <div class="help-block"></div>
                                    </div>        </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-city">
                                        <label class="control-label" for="firm-city">City</label>
                                        <input type="text" id="firm-city" class="form-control" name="City" maxlength="255" value="<?php echo $firmeditinfo->City; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-zipcode">
                                        <label class="control-label" for="firm-zipcode">Zip Code</label>
                                        <input type="text" id="firm-zipcode" class="form-control" name="ZipCode" maxlength="20" value="<?php echo $firmeditinfo->ZipCode; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-strength">
                                        <label class="control-label" for="firm-strength">Strength</label>
                                        <input type="text" id="firm-strength" class="form-control" name="Strength" maxlength="20" value="<?php echo $firmeditinfo->Strength; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-notification">
                                        <label class="control-label" for="firm-notification">Notification</label>
                                        <input type="text" id="firm-notification" class="form-control" name="Notification" maxlength="50" value="<?php echo $firmeditinfo->Notification; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-nfrequencey">
                                        <label class="control-label" for="firm-nfrequencey">Notification Frequencey</label>
                                        <input type="text" id="firm-nfrequencey" class="form-control" name="NFrequencey" maxlength="50" value="<?php echo $firmeditinfo->NFrequencey; ?>">

                                        <div class="help-block"></div>
                                    </div>        </div>
                                <div class="col-sm-4">
                                    <div class="form-group field-firm-timezoneid">
                                        <label class="control-label" for="firm-timezoneid">Time Zone ID</label>
                                        <select id="firm-timezoneid" class="select-search" name="TimeZoneId">
                                            <option value="">Select Timezone</option>
                                              <?php foreach($alltimezone as $timezone){ ?>
                                            <option value="<?php echo $timezone['TimezoneId']; ?>" <?php if ($timezone['TimezoneId'] == $firmeditinfo->TimeZoneId) { echo "selected"; } ?>><?php echo $timezone['TimezoneName']; ?></option>
                                              <?php } ?>
                                        </select>

                                        <div class="help-block"></div>
                                    </div>        </div>
                            </div>

                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-success">Update</button>    </div>

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


