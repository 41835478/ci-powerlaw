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
                                <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE); ?>
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
                            <?php //echo '<pre>'; print_r($allfirminfo);?>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Firm Settings</h3>
                                    <h6>Contact Information</h6>
                                    <p>Update your firm's contact information.</p>
                                </div>
                                <div class="col-md-6" style="background: #fff">
                                    <div id="editdiv" style="margin: 20px;">
                                        <form method="post" action="<?php echo base_url() ?>updateuseracc/<?php //echo $userinfo->id;?>" id="useraccountform">
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Firm Name : </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="fullname" id="fullname" value="<?php echo $allfirminfo->FirmName; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Address :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="Phone" id="Phone" value="<?php echo $allfirminfo->Address1; ?>">
                                                    </div>
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="Phone" id="Phone" value="<?php echo $allfirminfo->City; ?>">
                                                    </div> 
                                                    <div class="form-control-static">
                                                        <?php 
                                                        $stateinfo = $this->AccountModel->getstate($allfirminfo->State);
                                                         if(!empty($stateinfo)){
                                                        $state = $stateinfo->StateName; 
														 }
                                                        ?>
                                                        <input readonly class="form-control" type="text" name="Phone" id="Phone" value="<?php if(isset($state) && $state !='') { echo $state; } ?>">
                                                    </div> 
                                                    <div class="form-control-static">
                                                        <?php
                                                        $countryinfo = $this->AccountModel->getcountry($allfirminfo->Country);
                                             if(!empty($countryinfo)){
                                                        $country = $countryinfo->CountryName;
											 }
                                                        ?>
                                                        <input readonly class="form-control" type="text" name="Phone" id="Phone" value="<?php  if(isset($country) && $country !='') { echo $country;  } ?>">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Mobile :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="Phone" id="Phone" value="<?php echo $allfirminfo->Mobile; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Email :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" readonly type="text" name="Mobile" id="Mobile" value="<?php echo $allfirminfo->Email; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Website  :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input readonly class="form-control" type="text" name="Address1" id="Address1" value="<?php echo $allfirminfo->Website; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="button" style="border-radius: 4px;" class="btn btn-primary edit-contact-info" id="firmeditbtn">Edit Contact Information</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!------------------------------EDIT FORM--------------------------------------->

                                    <div id="updatediv" style="margin: 20px; display:none">
                                        <form method="post" action="<?php echo base_url() ?>updatefirmsettings/<?php echo $allfirminfo->FirmId; ?>" id="useraccountform">
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Firm Name : </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="FirmName" id="fullname" value="<?php echo $allfirminfo->FirmName; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Address :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="Address1" id="Phone" value="<?php echo $allfirminfo->Address1; ?>">
                                                    </div>
                                                    <div class="form-control-static">
                                                        <input class="form-control" placeholder="City" type="text" name="City" id="Phone" value="<?php echo $allfirminfo->City; ?>">
                                                    </div>
                                                    <div class="form-control-static">
                                                        <label class="control-label" for="state-statename">State</label>
                                                        <select id="firm-state" class="select-search form-control" name="State">
                                                            <option value="">Select State</option>
                                                            <?php foreach ($allstate as $state) { ?>
                                                                <option value="<?php echo $state['StateId']; ?>" <?php
                                                                if ($state['StateId'] == $allfirminfo->State) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $state['StateName']; ?></option>
                                                                    <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-control-static">
                                                        <label class="control-label" for="state-statename">Country</label>
                                                        <select id="firm-country" class="select-search form-control" name="Country">
                                                            <option value="">Select Country</option>
                                                            <?php foreach ($allcountry as $country) { ?>
                                                                <option value="<?php echo $country['CountryId']; ?>" <?php
                                                                if ($country['CountryId'] == $allfirminfo->Country) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $country['CountryName']; ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Mobile :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" placeholder="Mobile" name="Mobile" id="Phone" value="<?php echo $allfirminfo->Mobile; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Email :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" placeholder="Email" type="text" name="Email" id="Mobile" value="<?php echo $allfirminfo->Email; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Website  :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" placeholder="website" type="text" name="Website" id="Address1" value="<?php echo $allfirminfo->Website; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" style="border-radius: 4px;" class="btn btn-primary edit-contact-info" id="accountupdatesubid">Update Firm Information</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <hr>
                            <!---------------------------CHANGE EMAIL--------------------------->
                            <div class="row">
                                <div class="col-md-4">
                                    <h6>Firm Preferences</h6>
                                    <p>Update the preferences for your firm.</p>
                                </div>
                                <div class="col-md-6" style="background: #fff">
                                    <div id="firmpreferrencediv" style="margin: 20px;">

                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Client Portal Access : </label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <input readonly class="form-control" type="text" name="fullname" id="fullname" value="<?php if(isset($creditinfo->client_portal_access) && $creditinfo->client_portal_access !=''){ echo $creditinfo->client_portal_access; } ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Client Welcome Message :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <textarea class="form-control" rows="6" cols="50" readonly><?php if(isset($creditinfo->client_welcome_message) && $creditinfo->client_welcome_message !='') { echo $creditinfo->client_welcome_message; }?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Event Reminder :</label>
                                            </div>
                                            <?php 
                                            if(isset($creditinfo->event_reminder) && $creditinfo->event_reminder !=''){
                                            $reminderinfo = $this->AccountModel->getreminder($creditinfo->event_reminder);
                                           
                                             if(!empty($reminderinfo)){
                                         echo $reminder = $reminderinfo->type;
                                             }					 }
                                            ?>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <input readonly class="form-control" type="text" name="Phone" id="Phone" value="<?php if(isset($reminder) && $reminder !='') { echo $reminder; } ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Statute of Limitations :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <input readonly class="form-control" readonly type="text" name="Mobile" id="Mobile" value="<?php if(isset($creditinfo->statute_of_limitations) && $creditinfo->statute_of_limitations !='') { echo $creditinfo->statute_of_limitations; } ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Statute of Limitations Reminder  :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <textarea class="form-control" rows="6" cols="50" readonly>Automatically log me out after 60 minutes of inactivity. Do not automatically log me out if I have a timer running. Note: You will always be logged out when you close your web browser.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Firm Logo  :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <?php if (isset($allfirminfo->FirmLogo) && $allfirminfo->FirmLogo != '') { ?>
                                                        <img class="rounded-circle" src="<?php echo base_url() ?>upload/firmimage/<?php echo $allfirminfo->FirmLogo; ?>" alt="Default avatar 64" width="50" height="50">
                                                    <?php } else { ?>
                                                        <img class="rounded-circle" src="<?php echo base_url() ?>upload/firmimage/default_firm_logo.jpg" alt="Default avatar 64" width="80" height="80">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="button" style="border-radius: 4px;" class="btn btn-primary edit-contact-info" id="preferrenceupdate">Edit Contact Information</button>
                                        </div>
                                    </div>

                                    <div id="firmpreferrenceupdatediv" style="margin: 20px; display:none">
                                        <form method="post" action="<?php echo base_url() ?>updatefirmpreferences/<?php echo $allfirminfo->FirmId; ?>" id="useraccountform" enctype="multipart/form-data">
                                            <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Client Portal Access : </label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <label><input name="client_portal_access" type="checkbox" value="<?php if (isset($creditinfo->client_portal_access)) { echo $creditinfo->client_portal_access; } ?>" <?php if ($creditinfo->client_portal_access == "Enabled") { echo "checked"; }?>><?php echo $creditinfo->client_portal_access ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Client Welcome Message :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <textarea class="form-control" rows="6" cols="50" name="client_welcome_message"><?php if (isset($creditinfo->client_portal_access)) { echo $creditinfo->client_welcome_message; } ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Event Reminder :</label>
                                            </div>
                                            <?php //echo '<pre>'; print_r($allreminderinfo); ?>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                        <select id="firm-country" class="select-search form-control" name="event_reminder">
                                                            <option value="">Event Reminder</option>
                                                            <?php foreach ($allreminderinfo as $reminder) { ?>
                                                                <option value="<?php echo $reminder['id']; ?>" <?php
                                                                if ($reminder['id'] == $creditinfo->event_reminder) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $reminder['type']; ?></option>
                                                                    <?php } ?>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Statute of Limitations :</label>
                                            </div>
                                            <?php //echo $creditinfo->statute_of_limitations; exit; ?>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
                                                    <label><input name="statute_of_limitations" type="checkbox" value="<?php if(isset($creditinfo->statute_of_limitations) && $creditinfo->statute_of_limitations !=''){ echo $creditinfo->statute_of_limitations; } ?>" <?php if(isset($creditinfo->statute_of_limitations) && $creditinfo->statute_of_limitations !=''){ if ($creditinfo->statute_of_limitations == "Enabled") { echo "checked"; } }?>><?php if(isset($creditinfo->statute_of_limitations) && $creditinfo->statute_of_limitations !=''){ echo $creditinfo->statute_of_limitations; } ?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-form-label">
                                                <label>Default Statute of Limitations Reminder  :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-control-static">
<!--                                                    <textarea class="form-control" rows="6" cols="50"></textarea>-->
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Firm Logo  :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    
                                                    <input type="file" name="filename" onchange="readURL(this)" id="filename" class="form-control-static"><br><br>
                                                    <div class="form-control-static">
                                                        <?php if (isset($allfirminfo->FirmLogo) && $allfirminfo->FirmLogo != '') { ?>
                                                            <img class="rounded-circle" id="blah" src="<?php echo base_url() ?>upload/firmimage/<?php echo $allfirminfo->FirmLogo; ?>" alt="Default avatar 64" width="50" height="50">
                                                        <?php } else { ?>
                                                            <img class="rounded-circle" id="blah" src="<?php echo base_url() ?>upload/firmimage/default_firm_logo.jpg" alt="Default avatar 64" width="80" height="80">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" style="border-radius: 4px;" class="btn btn-primary edit-contact-info" id="accountupdatesubid">Update Firm Settings</button>
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

                                        <h2>My Payment Information</h2>
                                        <p>Update the credit card information we have on file.</p>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="alert alert-danger alert-dismissable">
                                                    <i class="fa fa-check-square-o"></i>
                                                    <p>We do not currently have any payment information on file for your account! Please enter your payment information to prevent any interruption in your service.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="alert alert-info">
                                                    <i class="fa fa-check-square-o"></i>
                                                    <h4>Billing Cycle</h4>
                                                    <p>Your account will be charged on the 30th of every month.</p>
                                                    <h4>Subscription Rate</h4>
                                                    <p>Currently you have 9 active users on your account. Your next payment will be $351.00.</p>
                                                    <h4>Have a question about billing?</h4>
                                                    <p>We are here to assist you. Contact us by email at support@mycase.com, or by phone at (800) 571-8062.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button style="border-radius: 4px;" id="paypalbtn" class="btn btn-primary" type="button">Edit Paypal Information</button>
                                            <button style="border-radius: 4px;" id="creditbtn" class="btn btn-primary" type="button">Edit Credit Card Information</button>
                                        </div>
                                        <?php //echo '<pre>'; print_r($creditinfo); exit; echo $creditinfo->FirmId; exit;?>
                                        <div class="row" id="creditcadrinfo" style="display:none">
                                            <form id="updateaccountemail" method="post" action="<?php echo base_url() ?>updatecreditcardinfo/<?php echo $creditinfo->FirmId; ?>">
                                                <h3>Credit Card Information</h3>
                                                <div class="row">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="card_holder_name" id="Address1" value="<?php if (isset($creditinfo->card_holder_name)) { echo $creditinfo->card_holder_name; }?>" placeholder="Card Holder Name">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-casename">
                                                            <input type="text" id="cases-casename" class="form-control" name="card_number" maxlength="255" value="<?php if (isset($creditinfo->card_number)) { echo $creditinfo->card_number;} ?>" placeholder="Card Number">
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="form-group field-cases-casenumber">
                                                            <input type="text" id="cases-casenumber" class="form-control" name="cvv" maxlength="255" value="<?php if (isset($creditinfo->cvv)) { echo $creditinfo->cvv; }?>" placeholder="CVV">
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-casenumber">
                                                            <select id="firm-state" class="select-search form-control" name="month">
                                                                <option value="">Month</option>
                                                                <option value="1" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (1 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>January</option>
                                                                <option value="2" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (2 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>February</option>
                                                                <option value="3" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                        if (3 == $creditinfo->month) {
                                                                            echo "selected";
                                                                        }
                                                                }
                                                                        ?>>March</option>
                                                                <option value="4" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (4 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>April</option>
                                                                <option value="5" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (5 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>May</option>
                                                                <option value="6" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                        if (6 == $creditinfo->month) {
                                                                            echo "selected";
                                                                        }
                                                                }
                                                                        ?>>June</option>
                                                                <option value="7" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (7 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>July</option>
                                                                <option value="8" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (8 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>August</option>
                                                                <option value="9" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (9 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>September</option>
                                                                <option value="10" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                if (10 == $creditinfo->month) {
                                                                    echo "selected";
                                                                }
                                                                }
                                                                ?>>October</option>
                                                                <option value="11" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                        if (11 == $creditinfo->month) {
                                                                            echo "selected";
                                                                        }
                                                                }
                                                                        ?>>November</option>
                                                                <option value="12" <?php
                                                                if(isset($creditinfo->month) && $creditinfo->month!=''){
                                                                        if (12 == $creditinfo->month) {
                                                                            echo "selected";
                                                                        }
                                                                }
                                                                        ?>>December</option>
                                                            </select>
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group field-cases-caseemail">
                                                            <select id="firm-state" class="select-search form-control" name="year">
<?php
$starting_year = date('Y');
$ending_year = date('Y', strtotime('+10 year'));
$current_year = date('Y');
for ($starting_year; $starting_year <= $ending_year; $starting_year++) {
    ?>
                                                                    <option value="<?php echo $starting_year; ?>" <?php
   if(isset($creditinfo->year) && $creditinfo->year!=''){ if ($starting_year == $creditinfo->year) {
        echo "selected";
    }
   }
    ?>><?php echo $starting_year; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>        
                                                    </div>
                                                </div>
                                                <h3>Billing Address</h3>
                                                <div class="row">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="address1" id="Address1" value="<?php if(isset($creditinfo->address1) && $creditinfo->address1 !='') { echo $creditinfo->address1; } ?>" placeholder="Address 1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="address2" id="Address1" value="<?php if(isset($creditinfo->address2) && $creditinfo->address2 !='') { echo $creditinfo->address2; } ?>" placeholder="Address 2">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="form-group field-cases-casename">
                                                            <input type="text" id="cases-casename" class="form-control" name="city" maxlength="255" value="<?php if(isset($creditinfo->city) && $creditinfo->city !='') { echo $creditinfo->city; } ?>" placeholder="City">
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group field-cases-casenumber">
                                                            <select id="firm-state" class="select-search form-control" name="state">
                                                                <option value="">Select State</option>
                                                                    <?php foreach ($allstate as $state) { ?>
                                                                    <option value="<?php echo $state['StateId']; ?>" <?php
                                                                  if(isset($creditinfo->state) && $creditinfo->state !=''){
                                                                      if ($state['StateId'] == $creditinfo->state) {
                                                                  }
                                                                        echo "selected";
                                                                    }
                                                                    
                                                                    ?>><?php echo $state['StateName']; ?></option>
<?php } ?>

                                                            </select>
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group field-cases-caseemail">
                                                            <input type="text" id="cases-caseemail" class="form-control" name="zip" maxlength="255" value="<?php if(isset($creditinfo->zip) && $creditinfo->zip !='') { echo $creditinfo->zip; } ?>" placeholder="Zip">
                                                        </div>        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-control-static">
                                                        <select id="firm-country" class="select-search form-control" name="country">
                                                            <option value="">Select Country</option>
<?php foreach ($allcountry as $country) { ?>
                                                                <option value="<?php echo $country['CountryId']; ?>" <?php
   if(isset($creditinfo->country) && $creditinfo->country !=''){ if ($country['CountryId'] == $creditinfo->country ) {
        echo "selected";
    }
   }
    ?>><?php echo $country['CountryName']; ?></option>
<?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p>By entering your payment information, you assert that you have read and accepted our Terms of Service.</p>
                                                <button class="btn btn-success" type="submit">Save</button>
                                            </form>
                                        </div>



                                        <div class="row" id="paypalinfo" style="display:none">
                                            <form method="post" action="<?php echo base_url() ?>updatepaypalemailinfo/<?php echo $creditinfo->FirmId; ?>" name="paypallinfoform">
                                                <h3>Paypal Information</h3>
                                                <div class="row">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="email" name="paypal_email" id="Address1" value="<?php if(isset($creditinfo->paypal_email) && $creditinfo->paypal_email !='') { echo $creditinfo->paypal_email; }?>" placeholder="Paypal Email">
                                                    </div>
                                                </div>
                                                <button class="btn btn-success" type="submit">Save</button>
                                            </form>
                                        </div>

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
<script>
    $('#firmeditbtn').click(function () {
        $('#editdiv').hide();
        $('#updatediv').show();
    });

    $('#creditbtn').click(function () {
        $('#creditcadrinfo').toggle();
    });

    $('#paypalbtn').click(function () {
        $('#paypalinfo').toggle();
    });

    $('#preferrenceupdate').click(function () {
        $('#firmpreferrencediv').hide();
        $('#firmpreferrenceupdatediv').show();
    });
</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>