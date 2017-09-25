<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>tasks">Task</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->

<style>
    div.calendar_date {
        background: url('<?php echo base_url() ?>assets/image/calendar_date.png') top left no-repeat;
        width: 38px;
        height: 40px;
    }
    #incombtn:active { 
        background-color: #00B3CA;
        color:#fff
    }

    #combtn:active { 
        background-color: #00B3CA;

    }
</style>
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
            <style type="text/css">
                p{
                    margin: 15px;
                }
            </style>
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <div class="heading-elements">

                            </div>
                            <div class="navbar navbar-default" id="navbar-second">
                                <div class="navbar-collapse collapse" id="navbar-second-toggle">
                                    <h5>Tasks</h5>
                                    <button class="btn btn-primary btn-block" style="color:#fff">Showing My Tasks</button>
                                    <h5>Show Tasks Assigned To:</h5>
                                    <select class="form-control" name="fullname" id="userdropdown">
                                        <option>Everyone Else</option>
                                        <?php foreach ($getalluser as $user) { ?>
                                            <option value="<?php echo $user['id']; ?>"><?php echo $user['fullname']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <hr>
                                    <h5>Completion Status: </h5>
                                    <span class="btn btn-info btn-lg" id="incombtn" style="width: 120px;" onclick="showtaskwithincom('2')">Incomplete</span>
                                    <span class="btn btn-primary btn-lg" id="combtn" style="width: 120px;" onclick="showtaskwithincom('1')">Complete</span>
                                    <h5>Group Tasks By: </h5>
                                    <select class="form-control" name="fullname" id="groupbydropdown">
                                        <option>Select Option</option>
                                        <option value="1">Due Date</option>
                                        <option value="2">Firm</option>
                                        <option value="3">Priority</option>
                                    </select>
                                    <h5>Filter By Case: </h5>
                                    <div class="form-inline"><input style="width: 230px;margin-right: 5px;" type="text" name="searchcase" value="" class="form-control"><img onclick="getallcase()" src="<?php echo base_url() ?>assets/image/smlbtn.png"></div>
                                    <div id="caseresult"></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            <hr><br>
                            <!--                            <button class="btn btn-default btn-block" style="color:red">Close Firm</button>-->
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive"> 
                                <ul class="icons-list" style="float:right">
                                    <li>
                                          <?php if ($_SESSION['permissionsession']['events'] == '1') { ?>
                                        <a href="<?php echo base_url() ?>taskaddform"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                                          <?php } ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-cog3"></i>
                                            <span class="visible-xs-inline-block position-right">Share</span>
                                            <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo base_url() ?>taskexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                            <li><a href="<?php echo base_url() ?>taskpdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div id="showtaskdiv">
                                    <table class="table table-bordered" id="taskdatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Task Name</th>
                                                <th>Priority</th>
                                                <th>Due Date</th>
                                                <th>Case Link</th>
                                                <th>Assigned To</th>
                                                <th>Firm Name</th>
                                                <th class="action-column">Action</th></tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($taskinfo as $task) { ?>
                                                <tr>
                                                    <?php
                                                    if ($task['priority'] == '0') {
                                                        $priority = 'No Priority';
                                                    } else if ($task['priority'] == '1') {
                                                        $priority = 'High';
                                                    } else if ($task['priority'] == '2') {
                                                        $priority = 'Medium';
                                                    } else if ($task['priority'] == '3') {
                                                        $priority = 'Low';
                                                    }
                                                    ?>
                                                    <td><?php echo $task['TaskId']; ?></td>
                                                    <td><?php echo $task['TaskName']; ?></td>
                                                    <td><?php echo $priority; ?></td>
                                                    <td><?php echo date('d F, Y', strtotime($task['DueDate'])); ?></td>
                                                    <td><?php echo $task['CaseName']; ?></td>
                                                    <td>
                                                        <?php
                                                        $userinfo = $this->TaskSystemModel->getassigneduser($task['AssignedTo']);
                                                        echo $uname = $userinfo->fullname;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $firminfo = $this->TaskSystemModel->getassignedfirm($task['FirmId']);
                                                        echo $firmname = $firminfo->FirmName;
                                                        ?>
                                                    </td>
                                                    <td>
                                                         <?php if ($_SESSION['permissionsession']['events'] == '2') { ?>
                                                        <a href="<?php echo base_url() ?>viewlawyertask/<?php echo $task['TaskId']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                         <?php } if ($_SESSION['permissionsession']['events'] == '1') { ?>
                                                        <a href="<?php echo base_url() ?>viewlawyertask/<?php echo base64_encode($task['TaskId']); ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                        <a href="<?php echo base_url() ?>editfronttask/<?php echo base64_encode($task['TaskId']); ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> 
                                                        <a class="alertForDelete" href="<?php echo base_url() ?>deletelaywertask/<?php echo base64_encode($task['TaskId']); ?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                                         <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

    function getallcase() {

        $.ajax({
            url: "<?php echo site_url('getfrontallsitecaseinfo'); ?>",
            type: "post",
            success: function (msg) {
                var hhh = JSON.parse(msg);
                $('#caseresult').html(hhh.casediv);
                $('#case_select').attr('size', 4);
            }
        });
    }

    function gettaskbycaseid(case_id) {


        $.ajax({
            url: "<?php echo site_url('getalltaskbycaseinfo'); ?>",
            type: "post",
            data: {
                case_id: case_id,
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                $('#showtaskdiv').html('');
                $('#showtaskdiv').html(hhh.taskdiv);
            }
        });
    }

    function showtaskwithincom(criteria) {
        $.ajax({
            url: "<?php echo site_url('getfrontalltaskbycriteria'); ?>",
            type: "post",
            data: {
                criteria: criteria,
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                console.log(hhh.taskdiv);
                $('#showtaskdiv').html('');
                $('#showtaskdiv').html(hhh.taskdiv);
            }
        });
    }

    $(document).ready(function () {
        $('#taskdatatables').DataTable({
        });
    });


    $('#userdropdown').change(function () {
        var userid = $("#userdropdown option:selected").val();
        $.ajax({
            url: "<?php echo site_url('getfrontalltaskbyuserid'); ?>",
            type: "post",
            data: {
                userid: userid,
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                console.log(hhh.taskdiv);
                $('#showtaskdiv').html('');
                $('#showtaskdiv').html(hhh.taskdiv);
            }
        });

    });


    $('#groupbydropdown').change(function () {
        var groupby = $("#groupbydropdown option:selected").val();
        $.ajax({
            url: "<?php echo site_url('getfrontalltaskbygroupby'); ?>",
            type: "post",
            data: {
                groupby: groupby,
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                console.log(hhh.taskdiv);
                $('#showtaskdiv').html('');
                $('#showtaskdiv').html(hhh.taskdiv);
            }
        });
    });
</script>

<script>
    $('body').delegate('.alertForDelete', 'click', function () {
        var href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Deleted!", "Task has been deleted.", "success");
                            window.location.href = href;
                        } else {
                            swal("Cancelled", "Task is safe :)", "error");
                        }
                    });
        }

        return false;
    });
</script>
