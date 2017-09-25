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

                                                        <form id="form-signup" action="<?php echo base_url() ?>insertfirmuser" method="post" role="form">
                                                            <input type="hidden" name="_csrf" value="WGNZYkNNYy4IJRAbCSQAFhEJNhIqATpoDCYwJ3M3MX1hDRQ2bnskGQ==">                
                                                            <div id="firstStep">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-username required">
                                                                            <label class="control-label" for="user-username">Username</label>
                                                                            <input type="text" id="user-username" class="form-control" name="username" placeholder="Enter Your User Name">

                                                                            <p class="help-block help-block-error"></p>
                                                                        </div>                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-email required">
                                                                            <label class="control-label" for="user-email">Email</label>
                                                                            <input type="email" id="user-email" class="form-control" name="email" placeholder="Enter Your Email">

                                                                            <p class="help-block help-block-error"></p>
                                                                        </div>                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-firstname">
                                                                            <label class="control-label" for="user-firstname">First Name</label>
                                                                            <input type="text" id="user-firstname" class="form-control" name="FirstName" placeholder="Enter Your First Name">

                                                                            <p class="help-block help-block-error"></p>
                                                                        </div>                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-lastname">
                                                                            <label class="control-label" for="user-lastname">Last Name</label>
                                                                            <input type="text" id="user-lastname" class="form-control" name="LastName" placeholder="Enter Your Last Name">

                                                                            <p class="help-block help-block-error"></p>
                                                                        </div>                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-firstname">
                                                                            <label class="control-label" for="user-firstname">User Type</label>
                                                                            <select id="user-country" class="select-search form-control" name="user_type">
                                                                                <option value="">Select Country</option>
                                                                                <option value="attorney">Attorney</option>
                                                                                <option value="paralegal">Paralegal</option>
                                                                                <option value="staff">Staff</option>

                                                                            </select>
                                                                        </div>                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-lastname">
                                                                            <label class="control-label" for="user-lastname">Default Rate</label>
                                                                            <div class="input-group"><span class="input-group-addon">$</span><input type="number" id="default_rate" name="default_rate" class="form-control text-right" placeholder="" value=""><span class="input-group-addon">/hr</span></div>
                                                                        </div>                    </div>
                                                                </div>
                                                                <hr>
                                                                <button type="button" class="btn btn-default" onclick="addaddress()">Add Address</button>
                                                                <button type="button" class="btn btn-default" onclick="addphone()">Add Phone</button>
                                                                <div class="row" id="phonediv" style="display:none">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-mobile">
                                                                            <label class="control-label" for="user-mobile">Mobile</label>
                                                                            <input type="text" id="user-mobile" class="form-control" name="Mobile" placeholder="Enter Your Mobile Number" data-mask="999-999-9999">

                                                                            <p class="help-block help-block-error"></p>
                                                                        </div>                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-phone">
                                                                            <label class="control-label" for="user-phone">Phone</label>
                                                                            <input type="text" id="user-phone" class="form-control" name="Phone" placeholder="Enter Your Phone Number" data-mask="999-999-9999">
                                                                        </div>                    </div>
                                                                </div>

                                                                <div id="addressdiv" style="display:none">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group field-user-address1">
                                                                                <label class="control-label" for="user-address1">Address1</label>
                                                                                <input type="text" id="user-address1" class="form-control" name="Address1" placeholder="Enter Your Address Line 1">

                                                                                <p class="help-block help-block-error"></p>
                                                                            </div>                    </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group field-user-address2">
                                                                                <label class="control-label" for="user-address2">Address2</label>
                                                                                <input type="text" id="user-address2" class="form-control" name="Address2" placeholder="Enter Your Address Line 2">

                                                                                <p class="help-block help-block-error"></p>
                                                                            </div>                    </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group field-user-country">
                                                                                <label class="control-label" for="user-country">Country</label>
                                                                                <select id="user-country" class="select-search form-control" name="Country">
                                                                                    <option value="">Select Country</option>
                                                                                    <?php foreach ($country as $con) { ?>
                                                                                        <option value="<?php echo $con['CountryId'] ?>"><?php echo $con['CountryName'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>

                                                                                <p class="help-block help-block-error"></p>
                                                                            </div>                    </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group field-user-state">
                                                                                <label class="control-label" for="user-state">State</label>
                                                                                <select id="user-state" class="select-search form-control" name="State">
                                                                                    <option value="">Select State</option>
                                                                                    <?php foreach ($state as $stat) { ?>
                                                                                        <option value="<?php echo $stat['StateId'] ?>"><?php echo $stat['StateName'] ?></option>
                                                                                    <?php } ?>
                                                                                </select>

                                                                                <p class="help-block help-block-error"></p>
                                                                            </div>                    </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group field-user-city">
                                                                                <label class="control-label" for="user-city">City</label>
                                                                                <input type="text" id="user-city" class="form-control" name="City" placeholder="Enter Your City">

                                                                                <p class="help-block help-block-error"></p>
                                                                            </div>                    </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group field-user-zipcode">
                                                                                <label class="control-label" for="user-zipcode">Zip Code</label>
                                                                                <input type="text" id="user-zipcode" class="form-control" name="ZipCode" placeholder="Enter Your Zip Code">

                                                                                <p class="help-block help-block-error"></p>
                                                                            </div>                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" style="margin-left:13px">
                                                                    <div class="col-md-offset-3">
                                                                        <button type="button" class="btn btn-primary" onclick="firstpart()">Next</button>                    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-------------------SECOND PART START------------------------>
                                                            <div id="secondStep" style="display:none">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-username required">
                                                                            <label class="control-label" for="user-username">Link User Rate</label>
                                                                            <div class="radio">
                                                                                <label><input type="radio" name="caseradio" value="1">No cases</label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label><input type="radio" name="caseradio" value="2">All active cases</label>
                                                                            </div>
                                                                            <div class="radio">
                                                                                <label><input type="radio" name="caseradio" value="3">A specific case</label> 
                                                                                <span class="form-group">
                                                                                    <select class="form-control" style="width: 127px;">
                                                                                        <option>Case Link:</option>
                                                                                        <?php foreach ($case as $cas) { ?>
                                                                                            <option value="<?php echo $cas['CaseId'] ?>"><?php echo $cas['CaseName'] ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </span>
                                                                            </div>
                                                                        </div>                    
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group field-user-lastname">
                                                                            <label class="control-label" for="user-lastname">Case Rate</label>
                                                                            <div class="input-group"><span class="input-group-addon">$</span><input type="number" id="default_rate" name="case_rate" class="form-control text-right" placeholder="" value=""><span class="input-group-addon">/hr</span></div>
                                                                        </div>                    
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="form-group" style="margin-left:13px">
                                                                    <div class="col-md-offset-3">
                                                                        <button type="button" class="btn btn-primary" onclick="secondpart()">Next</button>                    
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-------------THIRD PART START------------------------>
                                                            <div id="thirdStep" style="display:none">
                                                                <div class="row">
                                                                    <table class="permission_details table table-bordered">
                                                                        <tbody><tr>
                                                                                <td colspan="5" class="other-permission-headers"><span>Should </span> <span>be able to...</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="permission-details-text">Access data from every case in the system or only those he/she is linked to?</td>
                                                                                <td class="permission-details-yes">
                                                                                    <input type="radio" value="1"  name="accessable_case">
                                                                                </td>
                                                                                <td class="permission-details-yes-label">
                                                                                    <label>All firm cases</label>
                                                                                </td>
                                                                                <td class="permission-details-no">
                                                                                    <input type="radio" value="2"  name="accessable_case">
                                                                                </td>
                                                                                <td class="permission-details-no-label">
                                                                                    <label>Only linked cases</label>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="permission-details-text">Add new attorneys, paralegals, and support staff to your firm's MyCase account?</td>
                                                                                <td class="permission-details-yes">
                                                                                    <input type="radio" value="1"  name="add_firm_user">
                                                                                </td>
                                                                                <td class="permission-details-yes-label">
                                                                                    <label>Yes</label>
                                                                                </td>
                                                                                <td class="permission-details-no">
                                                                                    <input type="radio" value="2"  name="add_firm_user">
                                                                                </td>
                                                                                <td class="permission-details-no-label">
                                                                                    <label>No</label>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="permission-details-text">Edit user permission settings?</td>
                                                                                <td class="permission-details-yes">
                                                                                    <input type="radio" value="1"  name="edit_user_permission">
                                                                                </td>
                                                                                <td class="permission-details-yes-label">
                                                                                    <label>Yes</label>
                                                                                </td>
                                                                                <td class="permission-details-no">
                                                                                    <input type="radio" value="2"  name="edit_user_permission">
                                                                                </td>
                                                                                <td class="permission-details-no-label">
                                                                                    <label>No</label>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="permission-details-text">Delete items (events, documents, etc.) from MyCase?</td>
                                                                                <td class="permission-details-yes">
                                                                                    <input type="radio" value="1"  name="delete_item">
                                                                                </td>
                                                                                <td class="permission-details-yes-label">
                                                                                    <label>Yes</label>
                                                                                </td>
                                                                                <td class="permission-details-no">
                                                                                    <input type="radio" value="2"  name="delete_item">
                                                                                </td>
                                                                                <td class="permission-details-no-label">
                                                                                    <label>No</label>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td class="permission-details-text">Manage your firm's preferences, billing, and payment options?</td>
                                                                                <td class="permission-details-yes">
                                                                                    <input id="firm_manager_183428_true" type="radio" value="1"  name="manage_billing_payment">
                                                                                </td>
                                                                                <td class="permission-details-yes-label">
                                                                                    <label for="firm_manager_183428_true">Yes</label>
                                                                                </td>
                                                                                <td class="permission-details-no">
                                                                                    <input id="firm_manager_183428_false" type="radio" value="2" name="manage_billing_payment">
                                                                                </td>
                                                                                <td class="permission-details-no-label">
                                                                                    <label for="firm_manager_183428_false">No</label>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>

                                                                </div>
                                                                <hr>
                                                                <div class="form-group" style="margin-left:13px">
                                                                    <div class="col-md-offset-3">
                                                                        <button type="button" class="btn btn-primary" onclick="thirdpart()">Next</button>                    
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-------------FORTH PART START------------------------>
                                                            <div id="forthStep" style="display:none">
                                                                <div class="row">
                                                                    <div class="rscont" style="padding: 16px;">
                                                                        <table class="permissions table table-bordered">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Add & Edit</th>
                                                                                    <th>View Only</th>
                                                                                    <th>Hidden</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <img src="<?php echo base_url() ?>assets/image/small/contact.svg" alt="Contact"> Clients</td>
                                                                                    <td><input type="radio" value="1" name="clients"></td>
                                                                                    <td><input type="radio" value="2" name="clients"></td>
                                                                                    <td>  &nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <img src="<?php echo base_url() ?>assets/image/small/court.svg" alt="Court case"> Cases</td>
                                                                                    <td><input type="radio" value="1" name="cases"></td>
                                                                                    <td> <input type="radio" value="2" name="cases"></td>
                                                                                    <td>&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><img src="<?php echo base_url() ?>assets/image/small/calendar.svg" alt="Calendar"> Events</td>
                                                                                    <td> <input type="radio" value="1" name="events"></td>
                                                                                    <td> <input type="radio" value="2" name="events"></td>
                                                                                    <td><input type="radio" value="3" name="events"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <img src="<?php echo base_url() ?>assets/image/small/document.svg" alt="Document  sm"> Documents</td>
                                                                                    <td><input type="radio" value="1"  name="documents"></td>
                                                                                    <td> <input type="radio" value="2"  name="documents"></td>
                                                                                    <td><input type="radio" value="3"  name="documents"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><img src="<?php echo base_url() ?>assets/image/small/commenting.png" alt="Commenting"> Commenting</td>
                                                                                    <td><input type="radio" value="1" name="commenting"></td>
                                                                                    <td> <input type="radio" value="2" name="commenting"></td>
                                                                                    <td> <input type="radio" value="3"  name="commenting"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><img src="<?php echo base_url() ?>assets/image/small/message.svg" alt="Message"> Messaging</td>
                                                                                    <td> <input type="radio" value="1"  name="messaging"></td>
                                                                                    <td>&nbsp;</td>
                                                                                    <td> <input type="radio" value="3" name="messaging"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <img src="<?php echo base_url() ?>assets/image/small/billing.svg" alt="Billing"> Billing</td>
                                                                                    <td><input type="radio" value="1" name="billing"></td>
                                                                                    <td><input type="radio" value="2" name="billing"></td>
                                                                                    <td> <input type="radio" value="3" name="billing"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="attorney-permissions-object-name" colspan="4">
                                                                            <label class="time-entries-expenses-label">
                                                                                <input class="time-entries-expenses-checkbox"  name="time_entries_expense" type="checkbox" value="0">
                                                                                Restrict to Time Entries &amp; Expenses Only
                                                                            </label>
                                                                        </div>

                                                                        <table class="permissions table table-bordered">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <th>Entire Firm</th>
                                                                                    <th>Personal Only</th>
                                                                                    <th>Hidden</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td> <img src="<?php echo base_url() ?>assets/image/small/reporting.svg" alt="Contact"> Reporting</td>
                                                                                    <td class="attorney-permissions-object-choice"><input type="radio" value="4"  name="Reporting"></td>
                                                                                    <td class="attorney-permissions-object-choice"><input type="radio" value="5"  name="Reporting"></td>
                                                                                    <td class="attorney-permissions-object-choice"><input type="radio" value="6"  name="Reporting"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><br><br>
                                                                    </div>

                                                                </div>
                                                                <hr>
                                                                <div class="form-group" style="margin-left:13px">
                                                                    <div class="col-md-offset-3">
                                                                        <button type="submit" class="btn btn-primary">Submit</button>                    
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                        <!-- /main charts -->
                            </div>
                            <br>
                            <hr>
                        </div>
                    <!-- /main content -->
    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->

<script>
    function addphone() {
        $('#phonediv').toggle();
    }

    function addaddress() {
        $('#addressdiv').toggle();
    }

    function firstpart() {
        $('#firstStep').hide();
        $('#secondStep').show();
    }

    function secondpart() {
        $('#secondStep').hide();
        $('#thirdStep').show();
    }

    function thirdpart() {
        $('#thirdStep').hide();
        $('#forthStep').show();
    }
</script>
