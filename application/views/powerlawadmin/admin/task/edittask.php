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
                    <h5 class="panel-title">Create Task</h5>
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

                        <form id="w0" action="<?php echo base_url() ?>updatetask/<?php echo $this->uri->segment('2');?>" method="post">
                            <fieldset>
                                <?php //echo '<pre>'; print_r($edittask); ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Task Name</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="TaskName" maxlength="20" placeholder="Task Name" value="<?php echo $edittask->TaskName; ?>">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countryname required">
                                            <label class="control-label" for="country-countryname">Description</label>
                                            <textarea rows="4" cols="50" type="text" id="state-statename" class="form-control" name="description" placeholder="Task Description"><?php echo $edittask->description; ?></textarea>
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Due Date</label>
                                            <div class="input-group col-sm-12">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                                <input type="text" id="cases-dateopen" class="pickadate-editable form-control" name="DueDate" data-provide="datepicker" value="<?php echo $edittask->DueDate; ?>" placeholder="Due Date">

                                            </div>
                                            <div class="help-block"></div>
                                        </div>             
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Assigned To</label>
                                            <select id="state-countryid" class="select-search" name="AssignedTo[]">
                                                <option>Assigned User</option>
                                                <?php foreach ($username as $user) { ?>
                                                    <option <?php if ($user['id'] == $edittask->AssignedTo) { echo "selected"; } ?> value="<?php echo $user['id']; ?>"><?php echo $user['fullname']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Select Case</label>
                                            <select id="casedrop" class="select-search" name="CaseId">
                                                <option>Select Case</option>
                                                <?php foreach ($allcase as $case) { ?>
                                                    <option <?php if ($case['CaseId'] == $edittask->CaseId) { echo "selected"; } ?> value="<?php echo $case['CaseId']; ?>"><?php echo $case['CaseName']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Firm Name</label>
                                            <input type="text" id="firmname" class="form-control" name="firmname" maxlength="20" readonly value="<?php echo $edittask->FirmName; ?>">
                                            <input type="hidden" id="firmid" class="form-control" name="firmid" value="">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                Is Billed ? <input type="checkbox" name="IsBilled" class="form-check-input">
                                            </label>
                                        </div>           
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Rate</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="Rate" maxlength="20" placeholder="Rate" value="<?php echo $edittask->Rate; ?>">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Reminder</label><br>
                                            <div class="row" id="reminderparentdiv">
                                            </div>
                                            <span class="loadingimg" style="display:none"><img src="<?php echo base_url() ?>assets/image/loadingimage.gif"></span>
                                            <p><i class="glyphicon glyphicon-plus" style="color: #48A64C;"></i> <a class="remindcls"> Add a reminder</a></p>
                                        </div>            
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row">
                            </div>

                            <div class="form-group">
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


<script>
    $("#casedrop").change(function () {
        var caseid = this.value;
        alert(caseid);
        $.ajax({
            url: "<?php echo site_url('searchfirmnamebycaseid'); ?>",
            type: "post",
            data: {
                caseid: caseid
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                console.log(hhh);
                $('#firmname').val(hhh.firmname);
                $('#firmid').val(hhh.firmid);
            }
        });
    });

    $(document).ready(function () {
        var i = 1;
        $('.remindcls').click(function () {
            $('.loadingimg').show();
            setTimeout(function () {
                $('.loadingimg').hide();
                $('#reminderparentdiv').append('<div class="rem_' + i + '"><div class="col-md-3"><select name="remainder_type[]" id="remainder_type" class="form-control"><option value="email">email</option><option selected="selected" value="popup">popup</option></select></div><div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control"></div><div class="col-md-4"><select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control"><option value="day">days</option><option value="week">weeks</option></select></div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskreminder(' + i + ')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div></div><br><br>');
                i++;
            }, 3000);
        });


    });

    function removetaskreminder(i) {
        alert(i);
        $('.rem_' + i).remove();
    }

</script>