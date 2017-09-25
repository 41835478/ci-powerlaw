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
                    <h5 class="panel-title">Time Entries</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="<?php echo base_url() ?>addNewtimezone"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
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
                    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive"> 
                        <table class="table table-bordered" id="countrydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Firm Name</th>
                                    <th>Case Name</th>
                                    <th>User Name</th>
                                    <th>Contact Name</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th class="action-column">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alltimeentriesinfo as $timeentries) {  //echo '<pre>'; print_r($timeentries);?>
                                    <tr>
                                        <td><?php echo $timeentries['TimeId']; ?></td>
                                        <td><a href="<?php echo base_url()?>viewfirm/<?php echo $timeentries['FirmId']; ?>"><?php echo $timeentries['FirmName']; ?></a></td>
                                        <td><a href="<?php echo base_url()?>"><?php echo $timeentries['CaseName']; ?></a></td>
                                        <?php $userinfo = $this->TimeentriesSystemModel->getuserinfobyuserid($timeentries['UserId']); 
                                        $user = $userinfo->fullname; ?>
                                        <td><a href="<?php echo base_url()?>edituser/<?php echo $userinfo->id; ?>"><?php echo $user; ?></a></td>
                                        <td><a href="<?php echo base_url()?>"><?php echo $timeentries['ContactFName'] . ' ' . $timeentries['ContactLName']; ?></a></td>
                                        <td><?php echo date('d F, Y', strtotime($timeentries['StartOn'])); ?></td>
                                        <td><?php echo date('d F, Y', strtotime($timeentries['StopOn'])); ?></td>
                                        <td><a href="<?php //echo base_url()?>edittimezone/<?php //echo $timezone['TimezoneId'];?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="alertForDelete" href="<?php echo base_url()?>deletetimezone/<?php //echo $timezone['TimezoneId'];?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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