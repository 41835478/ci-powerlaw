<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>taskaddform">Add Task</a></li>
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
                    <h5 class="panel-title">Create Task</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <?php if ($_SESSION['permissionsession']['events'] == '1') { ?>
                                    <a href="/lcadmin/country/index"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                            <?php } ?>
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

                        <form id="w0" onsubmit="return validate();" action="<?php echo base_url() ?>insertnewtask" method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Task Name</label>
                                             <span id="comments1" style="color: red;"></span>
                                            <input type="text" id="taskname" class="form-control" name="TaskName" maxlength="20" placeholder="Task Name">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countryname required">
                                            <label class="control-label" for="country-countryname">Description</label>
                                            <textarea rows="4" cols="50" type="text" id="state-statename" class="form-control" name="description" placeholder="Task Description"></textarea>
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
                                                <input type="text" id="cases-dateopen" class="pickadate-editable form-control" name="DueDate" data-provide="datepicker" vlaue="<?php echo set_value('DateOpen'); ?>" placeholder="Due Date">

                                            </div>
                                            <div class="help-block"></div>
                                        </div>             
                                    </div>
                                </div>
                                      
                                
                                
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Select Case</label>
                                            <select id="casedrop" class="select-search form-control" name="CaseId" onchange="getComboA()">
                                                <option>Select Case</option>

                                                    <?php if ($_SESSION['permissionsession']['accessable_case'] == 1){?>
                                                        <?php if($allcase){foreach($allcase as $acase){?>
                                                    <option value="<?php echo $acase->CaseId;?>"><?php echo $acase->CaseName;?></option>
                                                        <?php }}?>
                                                        
                                                    <?php }else{?>
                                                        <?php if($ownFopenC){foreach($ownFopenC as $aownFopenC){foreach($allcase as $acase){if($aownFopenC->caseId==$acase->CaseId){?>
                                                            <option value="<?php echo $acase->CaseId;?>"><?php echo $acase->CaseName;?></option>
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
                                                Is Billed ? <input type="checkbox" name="IsBilled" class="form-check-input">
                                            </label>
                                        </div>           
                                    </div>
                                </div>
                            <div class="row">
                                    <div class="col-sm-12">
                                          <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Priority</label>
                                            <select class="select form-control" id="priorityid" name="priority">
                                                <option value="0">No Priority</option>
                                                <option value="3">Low</option>
                                                    <option value="2">Medium</option>
                                                   <option value="1">High</option>
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
                                <button type="submit" class="btn btn-success">Create</button></div>

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
<script type="text/javascript">
 function validate(){
     x=$('#taskname').val();
     
if (x == "")
{
 comment = "Name can't be blank";
document.getElementById('comments1').innerHTML = comment;
$('#taskname').focus();
return false;
}

document.getElementById('comment1').innerHTML = '';
document.getElementById('comment2').innerHTML = '';
 return(true);
}

</script>
<script type="text/javascript">
 
</script>


<script type="text/javascript">
$(".js-example-basic-multiple").select2({placeholder: "Select a staff",
  allowClear: true, minimumResultsForSearch: Infinity});
</script>
<script>
    function getComboA(){
  
     
       v= $('#casedrop').val();
     
              $.ajax({
                     url: '<?php echo site_url('Task/getassignstaff'); ?>',
                     type: 'POST',
                    data: {
                    case_id: v
                    },
                    success: function (data) {

                     $('#assign2').html(data);

                    }
                    });
                     $('#assign').select2();
                     
    }
    
</script>