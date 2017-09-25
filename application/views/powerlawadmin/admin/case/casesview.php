<style>
    div.calendar_date {
    background: url('<?php echo base_url()?>assets/image/calendar_date.png') top left no-repeat;
    width: 38px;
    height: 40px;
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
                            <div class="navbar navbar-default" id="navbar-second">
                                <div class="navbar-collapse collapse" id="navbar-second-toggle">
                                    <h5>
                                        Case Info
                                        <a href="/cases/update?id=1" class="btn btn-success pull-right">
                                            <i class="icon-pencil5 pull-right"> Edit</i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p style="margin-top: 25px;"><label>Case Name:</label><br /> <?php echo $caseinfo->CaseName; ?></p>
                            <p><label>Case Number:</label><br /> <?php echo $caseinfo->CaseNumber; ?></p>
                            <p><label>Date Opened:</label><br /> <?php echo date('d F Y', strtotime($caseinfo->DateOpen)); ?></p>
                            <p><label>Practice Area:</label><br /><?php echo $practicearea; ?></p>
                            <p><label>Contact Linked:</label><br /> <a><?php echo $contact; ?> (Client)</a></p>
                            <p><label>Staff Linked:</label><br /> <a><?php echo $attoerny; ?> (Attorney)</a></p>
                            <p><label>Description:</label><br /> <?php echo $caseinfo->Description; ?></p>
                            <p><label>Originally Created:</label><br /> <?php echo date('d F Y', strtotime($caseinfo->CreatedOn)); ?><br /></p>
                            <hr>
                            <br>
                            <button class="btn btn-default btn-block" style="color:red">Close Case</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="panel panel-flat">
                        <div class="panel-heading">

                            <div class="tabbable" id="myTabs">
                                <ul class="nav nav-tabs nav-tabs-top" role="tablist"> 
                                    <li class="active">
                                        <a href="#icononlytab1" aria-controls="icononlytab1" role="tab" data-toggle="tab">
                                            <i class="icon-menu7"></i> Case Info
                                            <span class="visible-xs-inline-block position-right">Active</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#icononlytab2" aria-controls="icononlytab2" role="tab" data-toggle="tab">
                                            <i class="icon-calendar"></i> Calendar
                                            <span class="visible-xs-inline-block position-right">Inactive</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#icon-only-tab3" aria-controls="icon-only-tab3" role="tab" data-toggle="tab">
                                            <i class="icon-pencil7"></i> Documents
                                            <span class="visible-xs-inline-block position-right">Documents</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#icon-only-tab3" aria-controls="icon-only-tab3" role="tab" data-toggle="tab">
                                            <i class="icon-task"></i> Tasks
                                            <span class="visible-xs-inline-block position-right">Documents</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#icon-only-tab4" aria-controls="icon-only-tab4" role="tab" data-toggle="tab">
                                            <i class="icon-bubbles7"></i> Messages
                                            <span class="visible-xs-inline-block position-right">Documents</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#icon-only-tab5" aria-controls="icon-only-tab5" role="tab" data-toggle="tab">
                                            <i class="icon-pencil5"></i> Notes
                                            <span class="visible-xs-inline-block position-right">Documents</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="#icon-only-tab7" aria-controls="icon-only-tab7" role="tab" data-toggle="tab">
                                            <i class="icon-bars-alt"></i> Workflows
                                            <span class="visible-xs-inline-block position-right">Documents</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="icononlytab1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg">
                                                <tbody>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Case Name</label></td>
                                                        <td class="col-sm-5"><?php echo $caseinfo->CaseName; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Case Number</label></td>
                                                        <td class="col-sm-5"><?php echo $caseinfo->CaseNumber; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Date Opened</label></td>
                                                        <td class="col-sm-5"><?php echo date('d F Y', strtotime($caseinfo->DateOpen)); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Practice Area</label></td>
                                                        <td class="col-sm-5"><?php echo $practicearea; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Contact Linked</label></td>
                                                        <td class="col-sm-5"><a><?php echo $contact; ?> (Client)</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Staff Linked</label></td>
                                                        <td class="col-sm-5"><a><?php echo $attoerny; ?> (Attorney)</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Description</label></td>
                                                        <td class="col-sm-5"><?php echo $caseinfo->Description; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Originally Created</label></td>
                                                        <td class="col-sm-5"><?php echo date('d F Y', strtotime($caseinfo->CreatedOn)); ?><br /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="icononlytab2" role="tabpanel">
                                        <div class='show_filter'>
                                            <div class="row">
                                            <div class="calendar_date" style="margin-left: 5px;">
                                                <div class="calendar_date_month">
                                                    May.
                                                </div>
                                                <div class="calendar_date_day">
                                                    31
                                                </div>
                                            </div>
                                           <img class="sol_gavel" src="<?php echo base_url()?>assets/image/sol_gavel.png" alt="Sol gavel">
                                            </div>

                                            <div class='right_page_button' style='margin-right: 5px;'>
                                                <a class="gray_button add-event case-details-add-event" onclick="" rel="fb-addlinks" href="https://rsuser.mycase.com/appointment_rules/new?court_case=3642730"><span><img src="https://assets.mycase.com/assets/add_gray_button-a1e233ded3bc8a120e2e2169b4f6f5463abbe3bb935e056b75c018ac7d9254c7.png" alt="Add gray button" /> Add Event</span></a>
                                            </div>
                                            <div class='right_page_button' style='margin-right: 5px;'>
                                                <a class="gray_button" href="#" onclick=""><span>Show Past Events</span></a>
                                            </div>
                                            <div style='clear: both;'></div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="icon-only-tab3" role="tabpanel">
                                        DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg whatever.
                                    </div>

                                    <div class="tab-pane" id="icon-only-tab4" role="tabpanel">
                                        Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
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
    $(document).ready(function () {
        $('#countrydatatables').DataTable({
            "autoWidth": false,
            "columns": [
                {"width": "10px", "targets": 0},
                {"width": "40px", "targets": 1},
                {"width": "100px", "targets": 2},
                {"width": "70px", "targets": 3},
                {"width": "30px", "targets": 4},
                {"width": "30px", "targets": 5},
                {"width": "70px", "targets": 6},
                {"width": "70px", "targets": 7},
                {"width": "70px", "targets": 8},
                {"width": "70px", "targets": 9}
            ],
        });
    });
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show');
    })
</script>