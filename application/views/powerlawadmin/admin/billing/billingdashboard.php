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
            <!-- Support tickets -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"></h6>
                    <div class="heading-elements">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-xlg text-nowrap" style="background: #F0EFEF;text-shadow: none;">
                        <tbody>
                            <tr>
                                <td class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="dashboard add-invoice billing-dashboard-add-invoice" href="https://rsuser.mycase.com/bills/open?open_from=billing_dashboard"><img src="https://assets.mycase.com/assets/bill_new_larger-49b12a96e35801fb1a17d82b3c88e380634880699f7aa503501129be375833a0.png" alt="Bill new larger">Create An Invoice</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="dashboard dashboard-make-payment" rel="facebox" href="https://rsuser.mycase.com/bills/make_payment"><img src="https://assets.mycase.com/assets/payment_larger-28f96ae43139abbae8cb4b79f343fae47d1d855af346079b0cb34b287a1a4b26.png" alt="Payment larger">Make Invoice Payment</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="dashboard dashboard-trust-deposit" rel="facebox" href="https://rsuser.mycase.com/bills/trust_deposit"><img src="https://assets.mycase.com/assets/safe_larger-6afb5338a22bc7d621038630d9feb58758dd22859065d72e27603cc702873ca4.png" alt="Safe larger">Deposit Into Trust</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="dashboard add-time-entry billing-dashboard-add-time-entry" rel="facebox" onclick="MyCase.Analytics.Helper.setEventSource('time_entry', 'billing dashboard')" href="https://rsuser.mycase.com/time_entries/new"><img src="https://assets.mycase.com/assets/time_larger-869edf37babde8c50581ff66c2657095bfa6bdd3c015acc5053bc2924d5e4071.png" alt="Time larger">Add Time Entry</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="dashboard add-expense billing-dashboard-add-expense" rel="facebox" href="https://rsuser.mycase.com/expenses/new"><img src="https://assets.mycase.com/assets/expense_larger-1bcb6c84abc91348ee434d730f9f600cdb9989e913912c6bc75a62fcc58a3cca.png" alt="Expense larger">Add Expense</a>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <div class="gray_sidebox" style="margin-top: 10px; background-color: #f6f6f6; width: 100%; border-radius: 5px; border: 1px solid #ddd;margin-bottom: 23px;">
                                        <div id="trust-detail-bar-container" data-details-bar="" data-title="Trust Account Overview"><div data-reactroot="" class="details-bar inline" style="background-color: #2787c5;border: 1px solid #636c72;color: #fff;font-size: 14px;height: 40px;line-height: 40px;"><div class="details-bar-title" style="padding-left: 6px;">Trust Account Overview</div><ul class="details-bar-options" style="float: right;line-height: 40px;list-style: none; margin: 0 10px; padding: 0;"></ul></div></div>
                                        <div id="trust_overview" class="dashboard_right_details" style="min-height: 65px; padding: 10px;"><table class="billing_dashboard_stats" style="width: 100%;">
                                                <tbody><tr>
                                                        <td style="text-align: right;">
                                                            Incoming
                                                            <div class="smaller">
                                                                May. 2017
                                                            </div>
                                                            <div class="alt" id="incoming-trust-balance">
                                                                <a href="https://rsuser.mycase.com/bills/activity?trust=true">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Outgoing
                                                            <div class="smaller">
                                                                May. 2017
                                                            </div>
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills/activity?trust=true">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Account Balance
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills/activity?trust=true">$0.00</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-right col-md-6">
                                    <div class="gray_sidebox" style="margin-top: 10px; background-color: #f6f6f6; width: 100%; border-radius: 5px; border: 1px solid #ddd;margin-bottom: 23px;">
                                        <div id="trust-detail-bar-container" data-details-bar="" data-title="Trust Account Overview"><div data-reactroot="" class="details-bar inline" style="background-color: #2787c5;border: 1px solid #636c72;color: #fff;font-size: 14px;height: 40px;line-height: 40px;"><div class="details-bar-title" style="text-align: left; padding-left: 6px;">Trust Account Overview</div><ul class="details-bar-options" style="float: right;line-height: 40px;list-style: none; margin: 0 10px; padding: 0;"></ul></div></div>
                                        <div id="trust_overview" class="dashboard_right_details" style="min-height: 65px; padding: 10px;"><table class="billing_dashboard_stats" style="width: 100%;">
                                                <tbody><tr>
                                                        <td style="text-align: right;">
                                                            Incoming
                                                            <div class="smaller">
                                                                May. 2017
                                                            </div>
                                                            <div class="alt" id="incoming-trust-balance">
                                                                <a href="https://rsuser.mycase.com/bills/activity?trust=true">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Outgoing
                                                            <div class="smaller">
                                                                May. 2017
                                                            </div>
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills/activity?trust=true">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Account Balance
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills/activity?trust=true">$0.00</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </div>

                                    <div class="gray_sidebox" style="margin-top: 10px; background-color: #f6f6f6; width: 100%; border-radius: 5px; border: 1px solid #ddd;margin-bottom: 23px;">
                                        <div id="invoice-detail-bar-container" data-details-bar="" data-title="Invoice Overview" style="background-color: #2787c5;border: 1px solid #636c72;color: #fff;font-size: 14px;height: 40px;line-height: 40px;"><div data-reactroot="" class="details-bar inline"><div class="details-bar-title" style="text-align: left; padding-left: 6px;">Invoice Overview</div><ul class="details-bar-options"></ul></div></div>
                                        <div id="invoice_overview" class="dashboard_right_details" style="min-height: 55px; padding: 10px;"><table class="billing_dashboard_stats" style="width: 100%;">
                                                <tbody><tr>
                                                        <td style="text-align: right;">
                                                            Unsent
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills?show=unsent">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Sent
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills?show=sent">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Overdue
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills?show=overdue">$0.00</a>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: right;">
                                                            Paid
                                                            <div class="alt">
                                                                <a href="https://rsuser.mycase.com/bills?show=paid">$0.00</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </div>

                                    <div class="gray_sidebox" style="margin-top: 10px; background-color: #f6f6f6; width: 100%; border-radius: 5px;border: 1px solid #ddd;margin-bottom: 23px;">
                                        <div id="timesheet-detail-bar-container" data-details-bar="" data-title="My Timesheet" style="background-color: #2787c5;border: 1px solid #636c72;color: #fff;font-size: 14px;height: 40px;line-height: 40px;"><div data-reactroot="" class="details-bar inline"><div class="details-bar-title" style="text-align: left; padding-left: 6px;">My Timesheet</div><ul class="details-bar-options"></ul></div></div>
                                        <div id="timesheet_overview" class="dashboard_right_details" style="padding: 10px;"><table class="billing_dashboard_stats" style="width: 100%;">
                                                <tbody><tr>
                                                        <td style="text-align: left;" colspan="4">
                                                            Time Entries
                                                        </td>
                                                    </tr>
                                                    <tr class="billing_stats_info">
                                                        <th style="width: 25%;">&nbsp;</th>
                                                        <th style="width: 25%;">Billable</th>
                                                        <th style="width: 25%;">Non-billable</th>
                                                        <th style="width: 25%;">Total</th>
                                                    </tr>
                                                    <tr class="billing_stats_info">
                                                        <th style="text-align:left;">Today</th>
                                                        <td style="text-align: right;">0.0</td>
                                                        <td style="text-align: right;">0.0</td>
                                                        <td style="text-align: right;">$0.00</td>
                                                    </tr>
                                                    <tr class="billing_stats_info">
                                                        <th style="text-align:left;">This week</th>
                                                        <td style="text-align: right;">0.0</td>
                                                        <td style="text-align: right;">0.0</td>
                                                        <td style="text-align: right;">$0.00</td>
                                                    </tr>
                                                    <tr class="billing_stats_info">
                                                        <th style="text-align:left;">This month</th>
                                                        <td style="text-align: right;">0.0</td>
                                                        <td style="text-align: right;">0.0</td>
                                                        <td style="text-align: right;">$0.00</td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>	
                </div>
            </div>
            <!-- /support tickets -->
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
        $('#uploadid').click(function () {
            $('#myModal').modal('hide');
            // $('#documentupload').modal('show');
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

                            swal("Deleted!", "State has been deleted.", "success");
                            window.location.href = href;
                        } else {
                            swal("Cancelled", "State is safe :)", "error");
                        }
                    });
        }

        return false;
    });
</script>