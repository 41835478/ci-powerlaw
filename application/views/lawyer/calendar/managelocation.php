<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>frontlocation">Location</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAxRmOpJkt7x3s6l_82O2o5G7X5Pqe8Z8s&callback=initialize"></script>
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
                    <h5 class="panel-title">Countries</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="<?php echo base_url() ?>addfrontLocation"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url() ?>locationexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url() ?>locationPdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
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
                                    <th></th>
                                    <th>Location Name</th>
                                    <th>Address</th>
                                    <th>Location Details</th>
                                    <th class="action-column">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach ($locationinfo as $location) { ?>
                                    <tr>
                                        <td><img src="<?php echo base_url() ?>assets/image/location.png"></td>
                                        <td><a target="_blank" href="https://www.google.com.jm/maps/place/<?php echo $location['address']; ?>/@<?php echo $location['latitude']; ?>/@<?php echo $location['longitude']; ?>,6z?hl=en"><?php echo $location['location_name']; ?></a></td>
                                        <td><?php echo $location['address']; ?></td>
                                        <td>
                                            <p>Added on <?php echo date('d F Y', strtotime($location['created_date'])); ?></p>
                                            <p>by <a href="<?php echo base_url()?>contacts/users/<?php echo base64_encode($location['created_by']);?>">
                                                    <?php
                                                    if ($location['created_by'] == 1) {
                                                        $userinfo = $this->ManageuserSystemModel->adminstaffbyid($location['created_by']);
                                                        echo $username = $userinfo->fullname;
                                                    } else {
                                                        $userinfo = $this->ManageuserSystemModel->getuserinfobyid($location['created_by']);
                                                        echo $username = $userinfo->fullname;
                                                    }
                                                    ?>
                                                </a></p>
                                        </td>

                                        <td><a target="_blank" href="https://www.google.com.jm/maps/place/<?php echo $location['address']; ?>/@<?php echo $location['latitude']; ?>/@<?php echo $location['longitude']; ?>,6z?hl=en" title="Update" aria-label="Update" data-pjax="0"><img src='<?php echo base_url() ?>assets/image/map.png'></a>
                                            <a href="<?php echo base_url() ?>editfrontlocation/<?php echo $location['location_id']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> 
                                            <a class="alertForDelete" href="<?php echo base_url() ?>deletefrontlocation/<?php echo $location['location_id']; ?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td>
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

                            swal("Deleted!", "Location has been deleted.", "success");
                            window.location.href = href;
                        } else {
                            swal("Cancelled", "Location is safe :)", "error");
                        }
                    });
        }

        return false;
    });
</script>