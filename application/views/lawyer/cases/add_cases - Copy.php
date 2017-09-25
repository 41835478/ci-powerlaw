<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>cases">Case</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">



            <div class="page-container">

                <!-- Page content -->
                <div class="page-content">
                    <!-- Main content -->
                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">
                                                <div class="col-md-8">
                                                    <h5 class="panel-title">Create Cases</h5>
                                                    <div>

                                                        </legend>
                                                        </fieldset>
                                                        <div class="success">
                                                            <?php if ($this->session->flashdata('insertsuccess')) { ?>
                                                                <p style="color: green"><?php echo $this->session->flashdata('insertsuccess') ?><p>
                                                                <?php } ?> 
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">

                                                        <div class="cases-form">

                                                            <form id="w0" name="f1" action="<?php echo base_url()?>insertlawyercase" method="post">
                                                                <input type="hidden" name="_csrf" value="WlBMdk9KcWkKFgUPBSMSURM6IwYmBigvDhUlM38wIzpjPgEiYnw2Xg==">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-casename required">
                                                                            <label class="control-label" for="cases-casename">Case Name</label>
                                                                            <span id="comment1" style="color: red;"></span>
                                                                            <input type="text" id="cases-casename" class="form-control" name="CaseName" maxlength="255" value="<?php echo set_value('CaseName'); ?>">

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-casenumber required">
                                                                            <label class="control-label" for="cases-casenumber">Case Number</label>
                                                                            <span id="commentCaseCode" style="color: red;"></span>
                                                                            <input type="text" id="cases-casenumber" class="form-control" name="CaseNumber" maxlength="255" value="<?php echo set_value('CaseNumber'); ?>">

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-caseemail required">
                                                                            <label class="control-label" for="cases-caseemail">Case Email</label>
                                                                            <span id="comment2" style="color: red;"></span>
                                                                            <input type="text" id="cases-caseemail" class="form-control" name="CaseEmail" maxlength="255" value="<?php echo set_value('CaseEmail'); ?>">

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-contact-Dateopen">
                                                                            <label class="control-label" for="cases-dateopen">Date Open</label>
                                                                            <div class="input-group col-sm-12">
                                                                                <span class="input-group-addon">
                                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                                </span>
                                                                                <input type="text" id="cases-dateopen" class="pickadate-editable form-control" name="DateOpen" data-provide="datepicker" vlaue="<?php echo set_value('DateOpen'); ?>">

                                                                            </div>
                                                                            <div class="help-block"></div>

                                                                        </div> 

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-practicearea required">
                                                                            <label class="control-label" for="cases-practicearea">Practice Area</label>
                                                                            <select id="cases-practicearea" class="select-search form-control" name="PracticeArea">
                                                                                <option value="" >Select Practice Area</option>
                                                                                <?php foreach ($all_practice_area as $a_practice_area) { ?>
                                                                                    <option value="<?php echo $a_practice_area->PracticeAreaId; ?>"<?php echo set_select('PracticeArea', $a_practice_area->PracticeAreaId, False); ?>><?php echo $a_practice_area->PracticeArea; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-description required">
                                                                            <label class="control-label" for="cases-description">Description</label>
                                                                            <textarea id="cases-description" class="form-control" name="Description" rows="1"><?php echo set_value('Description'); ?></textarea>

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-statuteoflimitations required">
                                                                            <label class="control-label" for="cases-statuteoflimitations">Statute Of Limitations</label>
                                                                            <div class="input-group col-sm-12">
                                                                                <span class="input-group-addon">
                                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                                </span>
                                                                                <input type="text" id="cases-statuteoflimitations" class="pickadate-editable form-control" name="StatuteOfLimitations" data-provide="datepicker" vlaue="<?php echo set_value('StatuteOfLimitations'); ?>">

                                                                            </div>
                                                                            <div class="help-block"></div>

                                                                        </div> 

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-contact-ReminderSOL">
                                                                            <label class="control-label" for="cases-remindersol">Reminder Sol</label>
                                                                            <div class="input-group col-sm-12">
                                                                                <span class="input-group-addon">
                                                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                                                </span>
                                                                                <input type="text" id="cases-remindersol" class="pickadate-editable form-control" name="ReminderSOL" data-provide="datepicker" vlaue="<?php echo set_value('ReminderSOL'); ?>">

                                                                            </div>
                                                                            <div class="help-block"></div>

                                                                        </div> 

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-firmid required">
                                                                            <label class="control-label" for="cases-firmid">Firm ID</label>
                                                                            <?php //echo '<pre>'; print_r($all_farm); ?>
                                                                            <select id="cases-firmid" class="select-search form-control" name="FirmId">
                                                                                <option value="">Select Firm</option>
                                                                                <?php foreach ($all_farm as $farm) { ?>
                                                                                    <option value="<?php echo $farm['FirmId'] ?>"<?php echo set_select('FirmId', $farm['FirmId'], False); ?>><?php echo $farm['FirmName'] ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                </div>
                                                                <div class="row" id="staffdiv" style="display:none; margin: 20px; background: #ddd; padding: 20px;">

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-companyid required" id="companydiv">
                                                                            <label class="control-label" for="">Company ID</label>
                                                                            <select name="CompanyId" id="cases-companyid" class="form-control">
                                                                                <option value="">---</option>                                    
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <button style="margin-top: 25px;" class="btn btn-default">Add New Company</button>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-4">


                                                                        <div class="form-group field-cases-companyid required">
                                                                            <label class="control-label" for="">Contact ID</label>
                                                                            <select name="ContactId" id="contact" class="form-control">
                                                                                <option value="">Select Contact</option>
                                                                                <?php foreach ($all_contact as $contact) { ?>
                                                                                    <option value="<?php echo $contact['ContactId'] ?>"><?php echo $contact['FirstName'] ?><?php echo $contact['LastName'] ?></option>
                                                                                <?php } ?>
                                                                            </select>




                                                                            <div class="help-block"></div>
                                                                        </div>    
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <button onclick="addnewcontact()" style="margin-top: 25px;" class="btn btn-default" type="button">Add New Contact</button>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-companyid required">
                                                                            <label class="control-label" for="">Billing Contact ID</label>
                                                                            <select name="BillingContactId" id="billing_contact" class="form-control">
                                                                                <option value="">---</option>                                    
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>    


                                                                    </div>
                                                                    <div class="col-sm-4">


                                                                        <div class="form-group field-cases-billingtype required">
                                                                            <label class="control-label" for="cases-billingtype"> Billing Type</label>
                                                                            <span id="comment3" style="color: red;"></span>
                                                                            <select id="cases-billingtype" class="select-search form-control" name="BillingType">
                                                                                <option value="">Select Billing Type</option>
                                                                                <?php foreach ($all_billing_type as $a_all_billing_type) { ?>
                                                                                    <option value="<?php echo $a_all_billing_type->BillingTypeId ?>"<?php echo set_select('BillingType', $a_all_billing_type->BillingTypeId, False); ?>><?php echo $a_all_billing_type->BillingType ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>  
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-success">Create</button>    </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                </div>

                                                </div>
                                                <!-- /main charts -->


                                                </div>
                                                <!-- /main content -->
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

                                                <!---------------------------------ADD NEW CONTACT MODAL---------------------------------------->
                                                <!-- Modal -->
                                                <div id="contactmodal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Client & Contact Link</h4>
                                                            </div>
                                                            <form id="contactform" action="" method="post">
                                                                <div class="modal-body">
                                                                    <p>Add New Client or Contact to this case </p>
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">First Name</label>
                                                                        <input type="text" id="cases-casename" class="form-control" name="firstName" maxlength="255" value="">

                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Last Name</label>
                                                                        <input type="text" id="cases-casename" class="form-control" name="lastName" maxlength="255" value="">

                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Email</label>
                                                                        <input type="text" id="cases-casename" class="form-control" name="email" maxlength="255" value="">

                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Group</label>
                                                                        <select id="cases-practicearea" class="select-search form-control" name="GroupName">
                                                                            <option value="" >Select Group</option>
                                                                            <?php foreach ($contactgroup as $group) { ?>
                                                                                <option value="<?php echo $group['GroupId']; ?>"><?php echo $group['GroupName']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> 
                                                                        <input type="hidden" name="firmid" value="" id="firmid">
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">MyCase Client Portal Access</label><br>
                                                                        <input id="portalaccess" class="form-control" type="checkbox" checked data-toggle="toggle" data-on="ENABLED" data-off="DISABLED" data-onstyle="success" data-offstyle="danger" data-width="30%">

                                                                        <p id="activediv"> Securely communicate and share documents, invoices, and messages with this client. Clients will only have access to items that you explicitly share. This access can be changed at any time. What will my client see?</p>
                                                                        <p id="inactivediv" style="display: none"> SYou will not be able to communicate or share items (including invoices for online payments) with this client via the portal.</p>
                                                                    </div> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success" id="submitcontactbtn">Add Contact</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>


                                                <script type="text/javascript">
                                                    $('#cases-firmid').change(function () {
                                                        var firm_id = $('#cases-firmid').val();
                                                      //  alert(firm_id);
                                                        $.ajax({
                                                            url: '<?php echo site_url('getstaffnamebyfirmid'); ?>',
                                                            type: 'POST',
                                                            data: {
                                                                firm_id: firm_id
                                                            },
                                                            success: function (data) {
                                                                var hhh = JSON.parse(data);
                                                                console.log(hhh);
                                                                $('#staffdiv').html(hhh.staffdiv);
                                                                $('#staffdiv').show();
                                                                $('#companydiv').html('');
                                                                $('#companydiv').html(hhh.companydiv);

                                                            }
                                                        });
                                                    });

                                                    function addnewcontact() {
                                                        var firm_id = $('#cases-firmid').val();
                                                      //  alert('fouzia');
                                                      //  alert(firm_id);
                                                        $('#firmid').val(firm_id);
                                                        $('#contactmodal').modal('show');

                                                    }


                                                    $("#portalaccess").change(function () {
                                                        if ($(this).prop("checked") == true) {
                                                            $('#activediv').show();
                                                            $('#inactivediv').hide();
                                                        } else {
                                                            $('#activediv').hide();
                                                            $('#inactivediv').show();
                                                        }
                                                    });

                                                    $('#submitcontactbtn').click(function () {
                                                        var form = $("#contactform").serialize();
                                                        //alert(form);
                                                        $.ajax({
                                                            url: '<?php echo base_url() ?>submitnewcontact',
                                                            type: 'POST',
                                                            data: {
                                                                data: form,
                                                            },
                                                            dataType: "json",
                                                            success: function (data) {
                                                                console.log(data);
                                                               // $('#staffdiv').html(hhh.staffdiv);
                                                               // $('#staffdiv').show();
                                                              //  $('#companydiv').html('');
                                                               // $('#companydiv').html(hhh.companydiv);

                                                            }
                                                        });

                                                    });
                                                </script>


                                                <script type="text/javascript">

                                                    // Form validation code will come here.
                                                    function validate()
                                                    {


                                                        if (isNaN(document.f1.CaseNumber.value))
                                                        {
                                                            commentCaseCode = "Case Number should be a number!";
                                                            document.getElementById('commentCaseCode').innerHTML = commentCaseCode;
                                                            document.f1.CaseNumber.focus();
                                                            return false;
                                                        }
                                                        if (isNaN(document.f1.BillingRate.value))
                                                        {
                                                            commentisNaN = "Billing Rate should be a number!";
                                                            document.getElementById('commentBillingCode').innerHTML = commentisNaN;
                                                            document.f1.BillingRate.focus();
                                                            return false;
                                                        }
                                                        if (document.f1.CaseName.value == "")
                                                        {

                                                            comment = "Please provide your Case Name!";
                                                            document.getElementById('comment1').innerHTML = comment;
                                                            document.f1.CaseName.focus();
                                                            return false;
                                                        }


                                                        if (document.f1.CaseName.value == "")
                                                        {

                                                            comment = "Please provide your Case Name!";
                                                            document.getElementById('comment1').innerHTML = comment;
                                                            document.f1.CaseName.focus();
                                                            return false;
                                                        }







                                                        if (document.f1.CaseEmail.value == "")
                                                        {

                                                            comment2 = "Please provide your Case Email!";
                                                            document.getElementById('comment2').innerHTML = comment2;
                                                            document.f1.CaseEmail.focus();
                                                            return false;
                                                        }
                                                        var x = document.f1.CaseEmail.value;
                                                        var atpos = x.indexOf("@");
                                                        var dotpos = x.lastIndexOf(".");
                                                        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                                                            comment3 = "Not a valid e-mail address !";
                                                            document.getElementById('comment2').innerHTML = comment3;
                                                            document.f1.CaseEmail.focus();
                                                            return false;
                                                        }
                                                        if (document.f1.BillingRate.value == "")
                                                        {

                                                            comment3 = "Please provide Billing Rate!";
                                                            document.getElementById('commentBillingCode').innerHTML = comment3;
                                                            document.f1.BillingType.focus();
                                                            return false;
                                                        }

                                                        return(true);





                                                    }
                                                    //
                                                </script>





                                                <script>
                                                    $(function () {
                                                        $('#cases-firmid').change(function () {
                                                            var firm_id = $('#cases-firmid').val();
                                                            //            alert(firm_id);
                                                            $.ajax({
                                                                url: '<?php echo site_url('cases/get_attorny_by_firm'); ?>',
                                                                type: 'POST',
                                                                data: {
                                                                    firm_id: firm_id
                                                                },
                                                                success: function (data) {

                                                                    console.log(data);
                                                                    var data1 = $.parseJSON(data);

                                                                    $('#cases-attoernyid').find("option:gt(0)").remove();
                                                                    $.each(data1['res'], function (index, value) {
                                                                        var option_val = '<option value="' + value['AttorneyId'] + '">' + value['FirstName'] + ' ' + value['LastName'] + '</option>';
                                                                        //console.log(option_val);
                                                                        $('#cases-attoernyid').append(option_val);
                                                                        //                        showDiv();
                                                                    });
                                                                }
                                                            });
                                                        });


                                                    });
                                                </script>





                                                <script>
                                                    $(function () {
                                                        $('#cases-companyid').change(function () {
                                                            var companyid = $('#cases-companyid').val();
                                                            //            alert(firm_id);
                                                            $.ajax({
                                                                url: '<?php echo site_url('cases/get_contact_by_company'); ?>',
                                                                type: 'POST',
                                                                data: {
                                                                    companyid: companyid
                                                                },
                                                                success: function (data) {

                                                                    console.log(data);
                                                                    var data1 = $.parseJSON(data);

                                                                    $('#contact').find("option:gt(0)").remove();
                                                                    $.each(data1['res'], function (index, value) {
                                                                        var option_val = '<option value="' + value['ContactId'] + '">' + value['FirstName'] + ' ' + value['LastName'] + '</option>';
                                                                        //console.log(option_val);
                                                                        $('#contact').append(option_val);
                                                                        //                        showDiv();
                                                                    });
                                                                }
                                                            });
                                                        });


                                                    });
                                                </script>






                                                <script>
                                                    $(function () {
                                                        $('#cases-companyid').change(function () {
                                                            var companyid = $('#cases-companyid').val();
                                                            //            alert(firm_id);
                                                            $.ajax({
                                                                url: '<?php echo site_url('cases/get_contact_by_company'); ?>',
                                                                type: 'POST',
                                                                data: {
                                                                    companyid: companyid
                                                                },
                                                                success: function (data) {

                                                                    console.log(data);
                                                                    var data1 = $.parseJSON(data);

                                                                    $('#billing_contact').find("option:gt(0)").remove();
                                                                    $.each(data1['res'], function (index, value) {
                                                                        var option_val = '<option value="' + value['ContactId'] + '">' + value['FirstName'] + ' ' + value['LastName'] + '</option>';
                                                                        //console.log(option_val);
                                                                        $('#billing_contact').append(option_val);
                                                                        //                        showDiv();
                                                                    });
                                                                }
                                                            });
                                                        });


                                                    });
                                                </script>
