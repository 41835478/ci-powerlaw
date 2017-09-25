<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>editfronttask/<?php echo $this->uri->segment('2');?>">Edit Task</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
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
                    <h5 class="panel-title">Edit Task</h5>
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

                        <form id="w0" action="<?php echo base_url() ?>updatelawyertask/<?php echo $this->uri->segment('2');?>" method="post">
                            <fieldset>
                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Task Name</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="TaskName" maxlength="20"  value="<?php echo $edittask->TaskName; ?>">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countryname required">
                                            <label class="control-label" for="country-countryname">Description</label>
                                            <textarea rows="4" cols="50" type="text" id="state-statename" class="form-control" name="description" placeholder="Task Description"><?php if($edittask->description){echo $edittask->description;} ?></textarea>
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
                                                <input type="text" id="cases-dateopen" class="pickadate-editable form-control" name="DueDate" data-provide="datepicker" value="<?php  if($edittask->DueDate){if($edittask->DueDate=='1970-01-01 00:00:00'){echo '';}else{$timestamp = strtotime($edittask->DueDate);
                                                       print date("jS F Y", $timestamp); }}; ?>" >

                                            </div>
                                            <div class="help-block"></div>
                                        </div>             
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Select Case</label>
                                            <select id="casedrop" class="select-search form-control" name="CaseId" onchange="getComboA(this)">
                                                <option>Select Case</option>
                                                    <?php if ($_SESSION['permissionsession']['accessable_case'] == 1){?>
                                                        <?php if($allcase){foreach($allcase as $acase){?>
                                                    <option value="<?php echo $acase->CaseId;?>"<?php if($edittask->CaseId==$acase->CaseId){echo "selected";}?>><?php echo $acase->CaseName;?></option>
                                                        <?php }}?>
                                                        
                                                    <?php }else{?>
                                                        <?php if($ownFopenC){foreach($ownFopenC as $aownFopenC){foreach($allcase as $acase){if($aownFopenC->caseId==$acase->CaseId){?>
                                                            <option value="<?php echo $acase->CaseId;?>"<?php if($edittask->CaseId==$acase->CaseId){echo "selected";}?>><?php echo $acase->CaseName;?></option>
                                                        <?php }}}}?>
                                                   <?php  }?>
                        
                                            </select>
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                          <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Assigned To</label>
                                            <select class="js-example-basic-multiple" id="assign2" name="AssignedTo[]" multiple="multiple">
                                                <option>Assigned User</option>
                                                <?php if($edittask->AssignedTo){$id=explode(",",$edittask->AssignedTo);foreach($id as $a_id){?>
                                                <option value="<?php echo $a_id?>"<?php foreach($username as $ausername){if($a_id==$ausername['id']){echo "selected";}}?>><?php foreach($username as $ausername){if($a_id==$ausername['id']){echo $ausername['FirstName'].' '.$ausername['LastName'];}}?></option>
                                                <?php }}?>
                                               
                                            </select>
                                              <span id="comment2" style="color: red;"></span>
                                            <div class="help-block"></div>
                                        </div> 
                                           
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Firm Name</label>
                                            <input type="text" id="firmname" class="form-control" name="firmname" maxlength="20" readonly value="<?php echo $firmname->FirmName?>">
                                            <input type="hidden" id="firmid" class="form-control" name="firmid" value="<?php echo $firmname->FirmId?>">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                Is Billed ? <input type="checkbox" name="IsBilled" class="form-check-input" <?php if($edittask->IsBilled=='Yes'){echo 'checked';}?>>
                                            </label>
                                        </div>           
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                          <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Priority</label>
                                            <select class="select form-control" id="priorityid" name="priority">
                                                <option value="0" <?php if($edittask->priority==0){echo 'selected';}?>>No Priority</option>
                                                <option value="3" <?php if($edittask->priority==3){echo 'selected';}?>>Low</option>
                                                    <option value="2" <?php if($edittask->priority==2){echo 'selected';}?>>Medium</option>
                                                   <option value="1" <?php if($edittask->priority==1){echo 'selected';}?>>High</option>
                                            </select>
                                              <span id="comment2" style="color: red;"></span>
                                            <div class="help-block"></div>
                                        </div> 
                                           
                                    </div>
                                </div> 
                                  <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Reminder</label><br>
                                            <div class="row" id="reminderparentdivnewfor">
                                             <?php $allreminder = $this->TaskModel->allreminder($edittask->TaskId);?>
                                            <?php foreach($allreminder as $areminder){?>
                                            
                                                <div id="<?php echo 'reminder_'.$areminder->id;?>">
                                               
                                                <div class="col-md-3">
                                                <select name="remainder_type[]" id="remainder_type" class="form-control">
                                                    <option value="email" <?php if($allreminder){if($edittask->TaskId==$areminder->remainder_for_id && $areminder->remainder_type=='email'){echo "selected";}} ?>>email</option>
                                                    <option value="popup" <?php if($allreminder){if($edittask->TaskId==$areminder->remainder_for_id && $areminder->remainder_type=='popup'){echo "selected";}}?>>popup</option>
                                                </select>
                                                </div>
                                                <div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="<?php if($allreminder){if($edittask->TaskId==$areminder->remainder_for_id){echo $areminder->remainder_duration;}}?>" class="reminder_input form-control"></div>
                                            <div class="col-md-4">
                                                <select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control">
                                                    <option value="day" <?php if($allreminder){if($edittask->TaskId==$areminder->remainder_for_id && $areminder->remainder_duration_type=='day'){echo "selected";}}?>>days</option>
                                                    <option value="week" <?php if($allreminder){if($edittask->TaskId==$areminder->remainder_for_id && $areminder->remainder_duration_type=='week'){echo "selected";}}?>>weeks</option>
                                                </select>
                                            </div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskremindernew(<?php echo $areminder->id;?>)"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div><br><br>
                                          </div>
                                         <?php  }?></div>
                                            
                                        </div>            
                                    </div>
                                      </div>
                            </fieldset>

                            <div class="row">
                                <div class="row" id="reminderparentdiv">
                                            </div>
                                            <span class="loadingimg" style="display:none"><img src="<?php echo base_url() ?>assets/image/loadingimage.gif"></span>
                                            <p><i class="glyphicon glyphicon-plus" style="color: #48A64C;"></i> <a class="remindcls"> Add a reminder</a></p>
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


    function removetaskreminder(i) {
        $('.rem_' + i).remove();
    }
 function removetaskremindernew(i) {
        $('#reminder_' + i).remove();
    }
</script>
<script>
      $('#assign2').select2();
</script>
<script>
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
        $('.rem_' + i).remove();
    }

</script>