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
                                <div class="col-lg-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>addinvoices">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-invoice.svg">
                                                        <div class="mt-1">Add Invoice</div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url() ?>invoices">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/payment.svg">
                                                        <div class="mt-1">Record Payment</div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url()?>billing">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/deposit.svg">
                                                        <div class="mt-1">Deposit into Trust</div>
                                                    </a>
                                                </div>
                                                 <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a href="<?php echo base_url() ?>billing/timeEntries">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/time_entry.svg">
                                                        <div class="mt-1">Add Time Entry</div>
                                                    </a>          
                                                 </div>
                                                <div class="col-lg-3 text-center common-shortcut p-2">
                                                    <a id="add-new-user-link" href="<?php echo base_url() ?>billing/expense">
                                                        <img class="d-block m-auto" height="40" src="<?php echo base_url() ?>assets/image/add-expense.svg">
                                                        <div class="mt-1">Add Expense</div>
                                                    </a>
                                                </div>
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
                                <div class="col-lg-6">
                                        <!-- Main charts -->
                                        <div class="row">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading"> Trust Account Overview</div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tr style="text-align: center;">
                                                                    <td>Incoming</td>
                                                                    <td>Outgoing</td>
                                                                    <td>Account Balance</td>
                                                                </tr>
                                                                <tr style="text-align: center;">
                                                                    <td>$1</td>
                                                                    <td>$2</td>
                                                                    <td>$3</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="panel panel-primary">
                                                     <div class="panel-heading"> Invoice Overview</div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <tr style="text-align: center;">
                                                                    <td>Unsent</td>
                                                                    <td>Sent</td>
                                                                    <td>Overdue</td>
                                                                    <td>Paid</td>
                                                                </tr>
                                                                <tr style="text-align: center;">
                                                                    <td>$1</td>
                                                                    <td>$2</td>
                                                                    <td>$3</td>
                                                                    <td>$3</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="panel panel-primary">
                                                     <div class="panel-heading"> My Timesheet</div>
                                                    <div class="panel-body">

                                                        <div class="cases-form">


                                                        </div>
                                                    </div>
                                                </div>
                                        </div>




                                        </div>
                                        <!-- /main charts -->




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