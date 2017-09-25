
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
                    <h5 class="panel-title">Case</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="<?php echo base_url() ?>addNewCase"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url() ?>caseEXLReport"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url() ?>casePDFReport"><i class="icon-file-pdf"></i> Export to PDF</a></li>
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
                                    <th>Case Name</th>
                                    <th>Numbers</th>
                                    <th>Practice Area</th>
                                    <th>Contact Link</th>
                                    <th>Attorneys</th>
                                    <th>Case Details</th>
                                    <th>Status</th>
                                    <th class="action-column">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allcaseinfo as $case) { //echo '<pre>'; print_r($case);?>
                                    <tr>
                                        <td><img src="<?php echo base_url() ?>assets/image/briefcase.png"></td>
                                        <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $case['CaseId']; ?>"><?php echo $case['CaseName']; ?></a></td>
                                        <td><?php echo $case['CaseNumber']; ?></td>
                                        <td>
                                            <?php
                                            $practiseareainfo = $this->CaseSystemModel->gepractisearea($case['PracticeArea']);
                                            echo $parea = $practiseareainfo->PracticeArea;
                                            ?></td>
                                        <td>
                                            <?php
                                            $contactinfo = $this->CaseSystemModel->gecontact($case['ContactId']);
                                            echo $contactinfo->FirstName;
                                            echo $contactinfo->LastName;
                                            ?></td>
                                        <td>
                                            <?php
                                            $attoernyinfo = $this->CaseSystemModel->getattoerny($case['AttoernyId']);
                                            echo $attoernyinfo->FirstName;
                                            ?></td>
                                        <td><?php echo $case['Description']; ?></td>
                                        <td><?php if($case['caseStatus'] == '1') {?>
                                        <span class="label label-success">Open</span>
                                        <?php } else { ?>
                                        <span class="label label-warning">Close</span>
                                        <?php } ?>
                                        </td>
                                        <td><a href="<?php echo base_url() ?>editcase/<?php echo $case['CaseId']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a class="alertForDelete" href="<?php echo base_url() ?>archivecase/<?php echo $case['CaseId']; ?>" title="Close Case" aria-label="Close Case" data-confirm="Are you sure you want to Close this Case?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-off"></span></a></td>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#countrydatatables').DataTable({
        });
    });

    $('body').delegate('.alertForDelete', 'click', function () {
        var href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this case file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Close it!",
                closeOnConfirm: true
            },
                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Deleted!", "Case has been Close.", "success");
                            window.location.href = href;
                        } else {
                            swal("Cancelled", "Case is safe :)", "error");
                        }
                    });
        }

        return false;
    });
</script>