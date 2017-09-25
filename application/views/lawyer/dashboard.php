<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
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
    .details-bar .details-bar-options a {
        color: #fff;
        display: block;
        line-height: 24px;
        outline: 0;
        padding: 0 15px;
        text-decoration: none;
    }
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
                    <!-- Main content -->
                    <div class="content-wrapper">
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
                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-8">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Add Item</div>
                                        <div class="panel-body">
                                            <div class="row">
<!--                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>contact/addContact">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add_calendar.svg">
                                                        <div class="mt-1">Add Event</div>
                                                    </a>
                                                </div>-->
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url() ?>casedoc">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/document.svg">
                                                        <div class="mt-1">Add Document</div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>taskaddform">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-task.svg">
                                                        <div class="mt-1">Add Task</div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>billing/expense">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-expense.svg">
                                                        <div class="mt-1">Add Expense</div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>billing/invoices">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-invoice.svg">
                                                        <div class="mt-1">Add Invoice</div>
                                                    </a>
                                                </div>


                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>contact/addContact">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-user.svg">
                                                        <div class="mt-1">Add Contact</div>
                                                    </a>
                                                </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url() ?>cases">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/court_case.svg">
                                                        <div class="mt-1">Add Case</div>
                                                    </a>          </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url() ?>messageing/inbox">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/message.svg">
                                                        <div class="mt-1">New Message</div>
                                                    </a>          </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url() ?>billing/timeEntries">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/time_entry.svg">
                                                        <div class="mt-1">Add Time Entry</div>
                                                    </a>          </div>

                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a data-toggle="modal" data-target="#notemodal">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-note.svg">
                                                        <div class="mt-1">Add Note</div>
                                                    </a>            </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading" style="height: 55px;">Recent Activity
                                            <ul class="nav nav-tabs" style="float: right;line-height: 24px;list-style: none;margin: 0 10px;padding: 0;">
                                                <li class="active"><a data-toggle="tab" href="#All" style="color:#000">All</a></li>
                                                <li><a data-toggle="tab" href="#Events" style="color:#000">Events</a></li>
                                                <li><a data-toggle="tab" href="#Documents" style="color:#000">Documents</a></li>
                                                <li><a data-toggle="tab" href="#Tasks" style="color:#000">Tasks</a></li>
                                            </ul>

                                        </div>
                                        <div class="panel-body">
                                            <div data-reactroot="" class="dashboard-activity-container">
                                                <div class="tab-content">
                                                    <div id="Events" class="tab-pane fade">
                                                    </div>
                                                    <div id="Documents" class="tab-pane fade">

                                                    </div>
                                                </div>
                                            </div>

                                            <h4 style="text-align: center"><a>View</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="panel panel-success" >
                                        <div class="panel-heading" style="background: #40BC53">Getting Started in MyCase</div>
                                        <div class="panel-body">
                                            <div id="getting_started_list" class="card-block" style="display: block;">
                                                <p>
                                                    Welcome to MyPowerLaw!  Follow the steps below to learn how to get
                                                    the most from our software and you'll be on your way to becoming a MyCase guru!
                                                </p>

                                                <ul>
                                                    <li>Create an Account</li>

                                                    <li>Invite Your Firm</li>

                                                    <li>Add a Client</li>

                                                    <li>Add a Case</li>

                                                    <li>Create and Share an Event</li>

                                                    <li>Create and Share a Document</li>

                                                    <li><a href="<?php echo base_url() ?>firmsettings">Set Your Firm Preferences</a></li>
                                                </ul>

                                                <div id="getting_started_progress_container" class="clearfix">

                                                    <div id="getting_started_progress" class="step-6-of-6">
                                                    </div>

                                                    <span class="getting_started_progress_label getting_started_progress_beginning">0%</span>
                                                    <span class="getting_started_progress_label getting_started_progress_end">100%</span>
                                                </div>

                                                <hr>
                                                <div id="getting_started_footer">
                                                    <h5>Congratulations!</h5>
                                                    <p>
                                                        You've completed the getting started bar and you're on your way to
                                                        becoming a MyPowerLaw expert!
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Firm Users</div>
                                        <div class="panel-body">
                                            <div class="card-block">
                                                <div class="mb-3">
                                                    <a href="<?php echo base_url() ?>firmuser"><?php echo $allfirmuser; ?> Active firm users</a>
                                                    <br>
                                                    <a href="<?php echo base_url() ?>firmuser">Update users</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Your Upcoming Tasks</div>
                                        <div class="panel-body">
                                            <div class="card-block">
                                                <table class="table">
                                                    <tbody>
                                                        <?php foreach ($taskinfo as $task) { ?>
                                                            <tr>
                                                                <td><?php echo $task['TaskName']; ?></td>
                                                                <?php
                                                                $tdate = strtotime(date("d-m-Y", strtotime($task['DueDate'])));
                                                                $now = strtotime(date('d-m-Y'));
                                                                if ($tdate < $now) {
                                                                    ?>
                                                                    <td style="color:red"><?php echo date("d-m-Y", strtotime($task['DueDate'])); ?></td>
                                                                <?php } else { ?>
                                                                    <td><?php echo date("d-m-Y", strtotime($task['DueDate'])); ?></td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                                <p style="text-align: center;"><a href="<?php echo base_url() ?>tasks">View All Tasks</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /main charts -->
                    </div>
                    <!-- /main content -->
                </div>
            </div>			</div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    <!----------------------------------------   NOTE MODAL   -------------------------------------------->

    <div class="modal fade product_view" id="notemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    <h3 class="modal-title">Add Notes</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 product_img">
                            <img src="<?php echo base_url() ?>assets/image/notes.png" class="img-responsive">
                        </div>
                        <div class="col-md-9 product_content">
                            <form class="form-horizontal" action="<?php echo base_url() ?>savenotes" method="post">
                                <input type="hidden" name="firmid" value="<?php echo $firmid; ?>">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Case/Contact :</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="sel1" name="RelatedId">
                                            <option>Select Case/Contact</option>
                                            <?php foreach ($casename as $case) { ?>
                                                <option value="<?php echo $case['CaseId']; ?>"><?php echo $case['CaseName']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Date:</label>
                                    <div class="input-group col-sm-9">  
                                        <span class="input-group-addon">
                                            <i class="glyphicon glyphicon-calendar"></i>
                                        </span>
                                        <input type="text" class="form-control pickadate-editable" id="duedate" placeholder="Enter Date" name="DueDate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="pwd">Subject:</label>
                                    <div class="col-sm-9">          
                                        <input type="text" class="form-control" id="pwd" placeholder="Enter Subject" name="NoteSubject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="comment">Note:</label>
                                    <div class="col-sm-9"> 
                                        <textarea name="NoteContent" class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                </div>

                                <div class="btn-ground">
                                    <a><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Add Note</button></a>
                                    <a href="#" data-dismiss="modal" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancle</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!----------------------------------------   NOTE MODAL   -------------------------------------------->



    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->