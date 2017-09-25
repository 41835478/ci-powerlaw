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

    /********* SIDE NAV BAR ***********/
    a {
        color:#000;
    }

    li {
        list-style:none;
    } 

    .panel-default>.panel-heading {
        color: #fff;
        background-color: #00436a;
        border-color: #ddd;
    }

    .panel-group .panel+.panel {
        margin-top: 0px;
    }

    .panel-collapse {
        background-color:rgba(220, 213, 172, 0.5);
    }

    .glyphicon { 
        margin-right:10px; 
    }


    ul.list-group {
        margin:0px;
    }

    ul.bulletlist li {
        list-style:disc;
    }


    ul.list-group  li a {
        display:block;
        padding:5px 0px 5px 15px;
        text-decoration:none;
    }

    ul.list-group li {
        border-bottom: 1px dotted rgba(0,0,0,0.2);
    }


    ul.list-group  li a:hover, ul li a:focus {
        color:#fff;
        background-color: #00436a;
    }

    .panel-title a:hover,
    .panel-title a:active,
    .panel-title a:focus,
    .panel-title .open a:hover,
    .panel-title .open a:active,
    .panel-title .open a:focus
    {
        text-decoration:none;
        color:#fff;
    }

    .panel-title>.small, .panel-title>.small>a, .panel-title>a, .panel-title>small, .panel-title>small>a {
        display: block;
    }

    @media (min-width: 768px){
        .navbar-collapse.collapse 
        {
            display: block!important;
            height: auto!important;
            padding-bottom: 0;
            overflow: visible!important;
            padding-left:0px; 
        }
    }

    @media (min-width: 992px){
        .menu-hide {
            display: none;
        }

    }
    .menu-hide .panel-default>.panel-heading {
        color: #fff;
        background-color: #8e8c8c;
        border-color: #ddd;
    }

    /********** END SIDEBAR *************/

    /********** NAVBAR TOGGLE *************/

    .navbar-toggle .icon-bar {
        background-color: #fff;
    }
    .navbar-toggle {
        padding: 11px 10px;
        margin-top: 8px;
        margin-right: 15px;
        margin-bottom: 8px;
        background-color: #a32638;
        border-radius: 0px;
    }

    /********** END NAVBAR TOGGLE *************/

</style>
<!-- Page container -->
<div class="page-container">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page container -->
        <div class="page-container">
            <!-- Page content -->
            <div class="page-content">
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
                        <!-- Main charts -->
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="height: 38px;"></div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->load->view('lawyer/reports/report_sidebar', '', TRUE); ?>
                                </div>
                                <div class="col-lg-9">
                                    <div class="panel-body">
                                        <div class="reportshowingdiv">
                                            <div class="row">
                                                <span><img src="<?php echo base_url() ?>assets/image/reporting.svg"></span>
                                                <span style="font-size: 25px;">My Time & Expenses - Today <span><?php echo date('m/d/Y'); ?></span>
                                                </span>
                                            </div>
                                            <hr style="border-style: dotted;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4 form-group">
                                                            <label for="email">Start Date :</label>
                                                            <input type="text" class="pickadate-editable form-control" id="email" data-provide="datepicker" placeholder="Start Date">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="email">End Date :</label>
                                                            <input type="text" class="pickadate-editable form-control" id="email" data-provide="datepicker" placeholder="End Date">
                                                        </div>
                                                        <div class="col-md-4 form-group">
                                                            <label for="email">Show Data for User :</label>
                                                            <select class="form-control" id="sel1">
                                                                <?php foreach ($userlist as $user) { ?>
                                                                    <option value="<?php echo $user['id']; ?>"><?php echo $user['fullname']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                        <label><input type="checkbox" value=""> Include entry descriptions</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" style="float:right">
                                                        <button class="btn btn-default" style="background: #FFCB00"> <img src="<?php echo base_url() ?>assets/image/small/run_arrow.png"> Run Report </button>
                                                        <button class="btn btn-default">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">

                                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                        <span class="visible-xs-inline-block position-right">Share</span>
                                                                        Export Report <span class="caret"></span>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                                        <li><a href="http://localhost/mypowerLaw/locationexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                                                        <li><a href="http://localhost/mypowerLaw/locationPdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border-style: dotted;">
                                            <div class="row table-responsive">
                                                <table class="table reporttable" style="word-wrap:break-word; background: #EBF5FA">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>User</th>
                                                            <th>Billable Hours</th>
                                                            <th>Total Billable Amount</th>
                                                            <th>Billable Expenses</th>
                                                            <th>Non-Billable Expenses</th>
                                                            <th>Non-Billable Hours</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php if (isset($loginuser->Picture) && $loginuser->Picture != '') { ?>
                                                                <td><img style="width: 28px;" src="<?php echo base_url() ?>upload/user/<?php echo $loginuser->Picture; ?>"></td>
                                                            <?php } else { ?>
                                                                <td><img style="width: 28px;" src="<?php echo base_url() ?>upload/user/default_user.png"></td>
                                                            <?php } ?>
                                                            <td><?php echo $loginuser->fullname; ?></td>
                                                            <td>0.0 hours</td>
                                                            <td>$ <span><?php echo $billableamount; ?></span></td>
                                                            <td>$ <span><?php echo $expenseamount; ?></span></td>
                                                            <td>0.0 hours</td>
                                                            <td>0.0 hours</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <hr style="border-style: dotted;">
                                            <h4>Time Entries</h4>
                                            <div class="row table-responsive">
                                                <table class="table reporttable">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Activity</th>
                                                            <th>Rate</th>
                                                            <th>Duration</th>
                                                            <th>Total</th>
                                                            <th>Billable</th>
                                                            <th>Case Link</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($timeentriesdata as $timeent) {
                                                            //echo '<pre>';
                                                            //print_r($timeent);
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $timeent['EntryDate']; ?></td>

                                                                <?php
                                                                if (isset($timeent['activity_id']) && $timeent['activity_id'] != '') {
                                                                    $activityinfo = $this->ReportsModel->getactivitydatabyid($timeent['activity_id']);
                                                                    //echo "<pre>"; print_r($activityinfo); echo $activityinfo['ctivity_name']; ?>
                                                                    <td><?php echo $activityinfo->activity_name; ?></td>
                                                                <?php } else {
                                                                    ?>
                                                                    <td></td>
                                                                <?php } ?>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <hr style="border-style: dotted;">
                                            <h4>Expenses</h4>
                                            <div class="row table-responsive">
                                                <table class="table reporttable">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Activity</th>
                                                            <th>Rate</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                            <th>Billable</th>
                                                            <th>Case Link</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($getexpensedata as $exp) {
                                                            //echo '<pre>'; print_r($exp); 
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $exp['EntryDate']; ?></td>
                                                                <?php
                                                                if (isset($exp['activity_id']) && $exp['activity_id'] != '') {
                                                                    $activityinfo = $this->ReportsModel->getactivitydatabyid($exp['activity_id']);
                                                                    ?>
                                                                    <td><?php echo $activityinfo->activity_name; ?></td>
                                                                <?php }
                                                                ?>


                                                                <td></td>
                                                                <td><?php echo $exp['qty']; ?></td>
                                                                <td><?php echo $exp['ExpenseAmount']; ?></td>
                                                                <?php if (isset($exp['is_billable']) && $exp['is_billable'] == '1') { ?>
                                                                    <td>Yes</td>
                                                                <?php } else { ?>
                                                                    <td>No</td>
                                                                <?php } ?>
                                                                <?php
                                                                if (isset($exp['case_id']) && $exp['case_id'] != '') {
                                                                    $getcaseinfo = $this->ReportsModel->getcasedatabyid($exp['case_id']);
                                                                    ?>
                                                                    <td><a href="<?php echo base_url() ?>cases/viewCase/<?php echo base64_encode($getcaseinfo->CaseId); ?>"><?php echo $getcaseinfo->CaseName; ?></a></td>
                                                                    <?php
                                                                }
                                                                ?>

                                                                <?php if (isset($exp['status']) && $exp['status'] == '1') { ?>
                                                                    <td>Invoice</td>
                                                                <?php } else { ?>
                                                                    <td>Open</td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /main charts -->




                    </div>
                </div>
            </div>
            <!-- /main content -->
        </div>
    </div>			
    <!-- /main content -->
</div>
<!-- /page content -->
<br><br>
<!-- Footer -->
<div class="footer text-muted">
    &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
</div>
<!-- /footer -->

</div>
<!-- /page container -->

<script>
    $(function () {
        $('.reporttable').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false
        });
    });
</script>