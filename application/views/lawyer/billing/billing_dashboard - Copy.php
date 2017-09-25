<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">



            <div class="page-container">

                <!-- Page content -->
                <div class="page-content">
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-fixed">
                            <div class="sidebar-content">

                                <!-- Task navigation -->
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title">
                                        <span>Case Menus</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding">
                                        <ul class="navigation navigation-main navigation-accordion">
                                            <li><a href="<?php echo base_url()?>billing/addInvoices"><i class="icon-googleplus5"></i> <span>Create An Invoice</span></a></li>
<!--                                            <li><a href="account/accountNotification"><i class="icon-compose"></i> <span>Make Invoice Payment</span></a></li>
                                            <li><a href="account/accountPicture"><i class="icon-user-plus"></i> <span>Deposit Into Trust</span></a></li>-->
                                            <li><a href="<?php echo base_url()?>billing/timeEntries"><i class="icon-compose"></i> <span>Add Time Entry</span></a></li>
                                            <li><a href="<?php echo base_url()?>expense"><i class="icon-collaboration"></i> <span>Add Expense</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /task navigation -->
                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->


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
                                                    <h5 class="panel-title">Trust Account Overview</h5>
                                                </div>

                                            </legend>
                                        </fieldset>
                                        
                                    </div>
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

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">
                                                <div class="col-md-8">
                                                    <h5 class="panel-title">Invoice Overview</h5>
                                                </div>

                                            </legend>
                                        </fieldset>
                                    </div>
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

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">
                                                <div class="col-md-8">
                                                    <h5 class="panel-title">My Timesheet</h5>
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
