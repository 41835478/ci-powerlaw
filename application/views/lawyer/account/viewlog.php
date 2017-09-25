
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-4">
                <h2>Contacts Import Report</h2>
                <h6>Imported: <?php echo date('F d Y, h m A', $loginfo->created_date); ?></h6>
                <h6>Filename: <?php echo $loginfo->filename; ?></h6>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>File Name</th>
                            <th>Errors / Warnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php if ($loginfo->status == '1') { ?>
                                    <span style="color:green; font-weight: bold"> <?php echo 'Success'; ?></span>
                                    <?php
                                } else {
                                    ?>
                                    <span style="color:red; font-weight: bold"> <?php echo 'Failed'; ?></span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td><?php echo $loginfo->filename; ?></td>
                            <td><?php echo $loginfo->error_text; ?></td>
                        </tr>
                    </tbody>
                </table>
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