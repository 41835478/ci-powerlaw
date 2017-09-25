<!--------------------sweet alert------------------->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/sweetalert.css">  
<script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
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
                    <h5 class="panel-title">Users Permission</h5>
                    <h5 class="panel-title">Staff Name :  <?php if(isset($adminstaffpermission) && !empty($adminstaffpermission)) { echo $adminstaffpermission->username; } ?></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="/lcadmin/permission/create"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="#"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div id="w0" class="grid-view">
                       
                        <table class="table table-striped table-bordered"><thead>
                                <tr>
                                    <th>Permission Sector</th>
                                    <th class="action-column">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if(isset($adminstaffpermission) && !empty($adminstaffpermission)) { ?>
                                    <tr>
                                        <td>Task</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox taskcls" id="taskactive" type="checkbox" value="1" taskattr="active" name="task" <?php if($adminstaffpermission->task == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox taskcls" id="taskinactive" type="checkbox" value="0" taskattr="inactive" name="task" <?php if($adminstaffpermission->task == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="conactive" type="checkbox" value="1" taskattr="active" name="contact" <?php if($adminstaffpermission->contact == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="coninactive" type="checkbox" value="0" name="contact" <?php if($adminstaffpermission->contact == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Calender</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="calactive" type="checkbox" value="1" taskattr="active" name="calenders" <?php if($adminstaffpermission->calender == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="calinactive" type="checkbox" value="0" name="calender" <?php if($adminstaffpermission->calender == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cases</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="caseactive" type="checkbox" value="1" name="cases" <?php if($adminstaffpermission->cases == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="caseinactive" type="checkbox" value="0" name="cases" <?php if($adminstaffpermission->cases == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Document</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="docactive" type="checkbox" value="1" name="document" <?php if($adminstaffpermission->document == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="docinactive" type="checkbox" value="0" name="document" <?php if($adminstaffpermission->document == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Billing</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="billactive" type="checkbox" value="1" name="billing" <?php if($adminstaffpermission->billing == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="billinactive" type="checkbox" value="0" name="billing" <?php if($adminstaffpermission->billing == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Report</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="reactive" type="checkbox" value="1" name="report" <?php if($adminstaffpermission->report == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="reinactive" type="checkbox" value="0" name="report" <?php if($adminstaffpermission->report == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="msgactive" type="checkbox" value="1" name="message" <?php if($adminstaffpermission->message == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="msginactive" type="checkbox" value="0" name="message" <?php if($adminstaffpermission->message == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Comment</td>
                                        <td><label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="comactive" type="checkbox" value="1" name="comment" <?php if($adminstaffpermission->comment == '1'){ echo 'Checked';}?>>Active
                                            </label>
                                            <label class="checkbox-inline">
                                                <input class="permissioncheckbox" id="cominactive" type="checkbox" value="0" name="comment" <?php if($adminstaffpermission->comment == '0'){ echo 'Checked';}?>>Inactive
                                            </label>
                                        </td>
                                    </tr>
                            <input type="hidden" value="<?php echo $user_id; ?>" name="userid" id="userid">
                                    <?php } else { ?>
                                <tr>
                                    <td colspan="4"><div class="empty">No results found.</div></td>
                                </tr>
                                    <?php } ?>
                            </tbody></table>
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
    $(document).ready(function(){
        $('.permissioncheckbox').click(function(){
            var value = $(this).val();
            var user_id = $('#userid').val();
            var permissionName = $(this).attr('name');
            if(permissionName == 'task'){
                if(value == '1'){
                    $('#taskinactive').attr('checked', false);
                } else {
                    $('#taskactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'contact'){
                if(value == '1'){
                    $('#coninactive').attr('checked', false);
                } else {
                    $('#conactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'calenders'){
                if(value == '1'){
                    $('#calinactive').attr('checked', false);
                } else {
                    $('#calactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'document'){
                if(value == '1'){
                    $('#docinactive').attr('checked', false);
                } else {
                    $('#docactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'billing'){
                if(value == '1'){
                    $('#billinactive').attr('checked', false);
                } else {
                    $('#billactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'report'){
                if(value == '1'){
                    $('#reinactive').attr('checked', false);
                } else {
                    $('#reactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'comment'){
                if(value == '1'){
                    $('#cominactive').attr('checked', false);
                } else {
                    $('#comactive').attr('checked', false);
                }
            }
            
            if(permissionName == 'message'){
                if(value == '1'){
                    $('#msginactive').attr('checked', false);
                } else {
                    $('#msgactive').attr('checked', false);
                }
            }
            
            $('#myCheckbox').attr('checked', false);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>updateadminuserpermission',
                data: {
                    'value' : value,
                    'user_id' :user_id,
                    'permissionName' :permissionName
                     },
                success: function (result) {
                    var hhh = JSON.parse(result);
                    if(hhh.permission == 1){
                          $.growl.notice({message: "Permission Update Successfully" , location: 'tc'});
                        setTimeout(function(){ 
                            location.reload();
                        }, 3000);
                        
                    }
                    
                }
            });
            
        });
    });
</script>