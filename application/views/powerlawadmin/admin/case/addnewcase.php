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
            <!-- Main charts -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <fieldset class="content-group">
                                <legend class="text-bold">
                                    <div class="col-md-8">
                                        <h5 class="panel-title">Create Cases</h5>
                                    </div>
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
                                <form id="w0" name="f1" action="<?php echo base_url(); ?>submitcase" method="post">
                                    <h3>Case Information</h3>
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
                                            <?php //echo '<pre>'; print_r($allpracticearea); ?>
                                            <div class="form-group field-cases-practicearea required">
                                                <label class="control-label" for="cases-practicearea">Practice Area</label>
                                                <select id="cases-practicearea" class="select-search" name="PracticeArea">
                                                    <option value="" >Select Practice Area</option>
                                                    <?php foreach ($allpracticearea as $practicearea) { ?>
                                                        <option value="<?php echo $practicearea['PracticeAreaId']; ?>"<?php echo set_select('PracticeArea', $practicearea['PracticeAreaId'], False); ?>><?php echo $practicearea['PracticeArea']; ?></option>
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
                                            <span class="loadingimg" style="display:none"><img src="<?php echo base_url() ?>assets/image/loadingimage.gif"></span>
                                            <label class="control-label" for="country-countrycode">Reminder</label><br>
                                            <div class="row reminderparentdiv" style="display:none">
                                                <p><i class="glyphicon glyphicon-plus" style="color: #48A64C;"></i> <a class="remindcls"> Add a reminder</a></p>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <!---------------------------------PART 2--------------------------------->
                                    <h3>Staff Link</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-firmid required">
                                                <label class="control-label" for="cases-firmid">Firm ID</label>
                                                <select id="cases-firmid" class="select-search casesfirmid" name="FirmId" onchange="myFunctionFirm()">
                                                    <option value="">Select Firm</option>
                                                    <?php foreach ($allfirm as $farm) { ?>
                                                        <option value="<?php echo $farm['FirmId'] ?>"<?php echo set_select('FirmId', $farm['FirmId'], False); ?>><?php echo $farm['FirmName'] ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="help-block"></div>
                                            </div>        
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-companyid required" id="companydiv">
                                                <label class="control-label" for="cases-companyid">Company ID</label>
                                                <select id="cases-companyid" class="select-search" name="CompanyId">
                                                    <option value="">Select Company</option>

                                                </select>

                                                <div class="help-block"></div>
                                            </div>        
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-attoernyid required" id="attornydiv">
                                                <label class="control-label" for="cases-attoernyid">Attorney ID</label>
                                                <input type="text" id="cases-attoernyid" class="form-control" name="AttoernyId">

                                                <div class="help-block"></div>
                                            </div>        
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-billingrate required">
                                                <label class="control-label" for="cases-billingrate">Billing Rate</label>
                                                <span id="commentBillingCode" style="color: red;"></span>
                                                <input type="text" id="cases-billingrate" class="form-control" name="BillingRate" vlaue="<?php echo set_value('BillingRate'); ?>">

                                                <div class="help-block"></div>
                                            </div>        
                                        </div>
                                    </div>
                                    <hr>
                                    <!------------------------------PART 3---------------------------->
                                    <h3>Client & Contact Link</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-contactid required" id="contactdiv">
                                                <label class="control-label" for="cases-contactid">Contact ID</label>
                                                <select id="contact" class="select-search" name="ContactId">
                                                    <option value="">Select a Contact</option> 
                                                </select>

                                                <div class="help-block"></div>
                                            </div>        
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>Billing Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-contactid" id="billingcontactdiv">
                                                <label class="control-label" for="cases-contactid"> Billing Contact Person</label>
                                                <select id="billing_contact" class="select-search" name="BillingContactId">

                                                </select>

                                                <div class="help-block"></div>
                                            </div>          </div>
                                        <div class="col-sm-4">
                                            <div class="form-group field-cases-billingtype required">
                                                <label class="control-label" for="cases-billingtype"> Billing Type</label>
                                                <span id="comment3" style="color: red;"></span>
                                                <select id="cases-billingtype" class="select-search" name="BillingType">
                                                    <option value="">Select Billing Type</option>
                                                    <?php foreach ($allbillingtype as $billingtype) { ?>
                                                        <option value="<?php echo $billingtype['BillingTypeId'] ?>"<?php echo set_select('BillingType', $billingtype['BillingTypeId'], False); ?>><?php echo $billingtype['BillingType'] ?></option>
                                                    <?php } ?>
                                                </select>

                                                <div class="help-block"></div>
                                            </div>  
                                        </div>
                                    </div>
<!--                                    <hr>
                                    <div class="row">
                                        <h3>Case Summary</h3>
                                    </div>-->
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
    <!-- /page content -->

    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->

<script>
    $(document).ready(function () {
        var i = 1;
        $("#cases-statuteoflimitations").on("change", function () {
            var selected = $(this).val();
            //alert(selected);
            if (selected != '') {
                $('.loadingimg').show();
                setTimeout(function () {
                    $('.loadingimg').hide();
                    $('.reminderparentdiv').append('<div class="rem_' + i + '"><div class="col-md-3"><select name="remainder_type[]" id="remainder_type" class="form-control"><option value="email">email</option><option selected="selected" value="popup">popup</option></select></div><div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control"></div><div class="col-md-4"><select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control"><option value="day">days</option><option value="week">weeks</option></select></div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskreminder(' + i + ')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div></div><br><br>');
                    $('.reminderparentdiv').show();
                    i++;
                }, 3000);
            }
            $('.remindcls').click(function () {
                $('.loadingimg').show();
                setTimeout(function () {
                    $('.loadingimg').hide();
                    $('.reminderparentdiv').append('<div class="rem_' + i + '"><div class="col-md-3"><select name="remainder_type[]" id="remainder_type" class="form-control"><option value="email">email</option><option selected="selected" value="popup">popup</option></select></div><div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control"></div><div class="col-md-4"><select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control"><option value="day">days</option><option value="week">weeks</option></select></div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskreminder(' + i + ')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div></div><br><br>');
                    i++;
                }, 3000);
            });

        });
    });

    function removetaskreminder(i) {
        //alert(i);
        $('.rem_' + i).remove();
    }

    //FORM VALIDATION
    jQuery().ready(function () {
        var v = jQuery("#useraccountform").validate({
            rules: {
                CaseName: {
                    required: true
                },
                CaseNumber: {
                    required: true,
                },
                CaseEmail: {
                    required: true,
                },
                Mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            errorElement: "span",
            errorClass: "help-inline-error",
        });

        $("#accountupdatesubid").click(function () {
            if (v.form()) {
                $("#useraccountform").submit();
                return false;
            }
        });
    });



    function myFunctionFirm() {
        var firmid = $("#cases-firmid option:selected").val();
        //alert(firmid);
        $.ajax({
            url: "<?php echo site_url('getalldatabyfirmid'); ?>",
            type: "post",
            data: {
                firmid: firmid,
            },
            success: function (result) {
                var hhh = JSON.parse(result);
                //console.log(hhh);
                $('#companydiv').html('');
                $('#companydiv').append(hhh.companydiv);
                $('#attornydiv').html('');
                $('#attornydiv').append(hhh.attornydiv);
                $('#contactdiv').html('');
                $('#contactdiv').append(hhh.contactdiv);
                 $('#billingcontactdiv').html('');
                $('#billingcontactdiv').append(hhh.billingcontactdiv);

            }
        });

    }
</script>
