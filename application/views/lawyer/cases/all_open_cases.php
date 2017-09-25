<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>allCases">Open Cases</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Cases</h5>
                    <?php if ($this->session->flashdata('updatesuccess')) { ?>
                        <p style="color: green"><?php echo $this->session->flashdata('updatesuccess') ?><p>
                        <?php } ?> 

                        <?php if ($this->session->flashdata('insertsuccess')) { ?>
                        <p style="color: green"><?php echo $this->session->flashdata('insertsuccess') ?><p>
                        <?php } ?> 
                        <?php if ($this->session->flashdata('error')) { ?>
                        <p style="color: red"><?php echo $this->session->flashdata('error') ?><p>
                        <?php } ?> 

                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <?php if ($_SESSION['permissionsession']['cases'] == '1') { ?>
                                    <a href="cases"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>   
                                <?php } ?>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url() ?>opencaseexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url() ?>opencasePdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div class="row form-inline" style="background-color: #2787c5; color: #fff; font-weight: bold; margin-top: 10px; margin-bottom: 10px; height: 50px; border: 1px solid blue; border-radius: 4px; padding: 6px;">
                        <div class="col-md-9 input-group">
                            <span><button class="btn btn-default" style="border-radius: 3px; margin-right:5px; height: 30px;" onclick="getopencases()"> <strong>OPEN</strong></button></span>
                            <span><button class="btn btn-default" style="border-radius: 3px; height: 30px;" onclick="getclosecases()"><strong>CLOSE</strong></button></span>
                            <span style="margin-left:50px"> <lavel>Practice Area: </lavel></span>
                            <span><div class="form-group">
                                    <select class="form-control" name="" style="height: 30px;" id="parea">
                                        <option>Show All Practice Area</option>
                                        <?php foreach ($all_practiceArea as $practice) { ?>
                                            <option value="<?php echo $practice->PracticeAreaId; ?>"><?php echo $practice->PracticeArea; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </span>
                        </div>
                        <div class="col-md-3" style="float: right">
                            <span><button class="btn btn-default" style="border-radius: 3px; margin-right:5px; height: 30px;" onclick="getmycases()"> <strong>My Cases</strong></button></span>
                            <span><button class="btn btn-default" style="border-radius: 3px; height: 30px;" onclick="getfirmcases()"><strong>All Firm Cases</strong></button></span>
                        </div>
                    </div>

                    <div class="caseshowdiv" id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">    
                        <table class="table table-striped table-bordered" id="all-cases-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Case</th>
                                    <th>Case Number</th>
                                    <th>Practice Area</th>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Attorney</th>
                                    <th>Details</th>
                                    <th class="action-column">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($all_open_cases) {
                                    $i = 1;
                                    foreach ($all_open_cases as $a_open_cases) {
                                        ?>
                                        <tr data-key="1">
                                            <td><?php echo $i++ ?></td>
                                            <td><a href="<?php echo base_url() . 'cases/viewCase/' . base64_encode($a_open_cases->CaseId) ?>"><?php
                                                    if ($a_open_cases->CaseName) {
                                                        echo $a_open_cases->CaseName;
                                                    } else {
                                                        echo "Not Set";
                                                    }
                                                    ?></a></td>
                                            <td><?php
                                                if ($a_open_cases->CaseNumber) {
                                                    echo $a_open_cases->CaseNumber;
                                                } else {
                                                    echo "Not Set";
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($a_open_cases->PracticeArea) {
                                                    $checkmatch = false;
                                                    foreach ($all_practiceArea as $a_practiceArea) {
                                                        if ($a_open_cases->PracticeArea == $a_practiceArea->PracticeAreaId) {
                                                            $checkmatch = true;
                                                            echo $a_practiceArea->PracticeArea;
                                                        }
                                                    }if ($checkmatch == false) {
                                                        echo 'Not Set';
                                                    }
                                                } else {
                                                    echo "Not Set";
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($a_open_cases->CompanyId == 0 || $a_open_cases->CompanyId == '' || $a_open_cases->CompanyId == NULL) {
                                                    echo "Not Set";
                                                } else {
                                                    $checkmatch = false;
                                                    foreach ($all_company as $a_company) {
                                                        if ($a_company->CompanyId == $a_open_cases->CompanyId) {
                                                            $checkmatch = true;
                                                            echo $a_company->CompanyName;
                                                        }
                                                    }if ($checkmatch == false) {
                                                        echo "Not set";
                                                    }
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($a_open_cases->ContactId == 0 || $a_open_cases->ContactId == '' || $a_open_cases->ContactId == NULL) {
                                                    echo "Not Set";
                                                } else {
                                                    $checkmatch = false;
                                                    foreach ($all_contact as $a_contact) {
                                                        if ($a_contact->ContactId == $a_open_cases->ContactId) {
                                                            $checkmatch = true;
                                                            echo $a_contact->FirstName . ' ' . $a_contact->LastName;
                                                        }
                                                    }if ($checkmatch == false) {
                                                        echo "Not set";
                                                    }
                                                }
                                                ?></td>
                                            <td><?php
                                                if ($a_open_cases->AttoernyId == 0 || $a_open_cases->AttoernyId == '' || $a_open_cases->AttoernyId == NULL) {
                                                    echo "Not Set";
                                                } else {
                                                    $testmatch = FALSE;
                                                    foreach ($all_attorney as $a_attorney) {
                                                        if ($a_attorney->AttorneyId == $a_open_cases->AttoernyId) {
                                                            $testmatch = TRUE;
                                                            echo $a_attorney->FirstName . ' ' . $a_attorney->LastName;
                                                        }
                                                    }if ($testmatch == FALSE) {
                                                        echo "Not Set";
                                                    }
                                                }
                                                ?></td>
                                            <td>Added <?php
                                                if ($a_open_cases->DateOpen) {
                                                    echo 'on ';
                                                    $timestamp = strtotime($a_open_cases->DateOpen);
                                                    print date("jS F Y", $timestamp);
                                                }
                                                ?><br /> 
                                                <?php if ($a_open_cases->userId) { ?><a href="<?php
                                                    if ($a_open_cases->userId == $a_user->id) {
                                                        echo base_url() . 'contacts/users/' . base64_encode($a_user->id);
                                                    }
                                                    ?>" title="Contact Details"><?php echo '(' . $a_user->fullname . ')' ?></a><?php } ?></td>
                                            <td>
                                                <?php if ($_SESSION['permissionsession']['cases'] == '1') { ?>
                                                    <a href="<?php echo base_url() . 'cases/update/' . base64_encode($a_open_cases->CaseId) ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> 
                                                <?php } ?>
                                                <?php if ($_SESSION['permissionsession']['cases'] == '1' || $_SESSION['permissionsession']['cases'] == '2') { ?>
                                                    <a href="<?php echo base_url() . 'cases/viewCase/' . base64_encode($a_open_cases->CaseId) ?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <?php
                                    }$i++;
                                } else {
                                    ?>  <tr><td colspan="9"><div class="empty">No results found.</div></td></tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
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
    $(function () {

        $('#all-cases-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });

    function getmycases() {
        $.ajax({
            url: "<?php echo site_url('searchmycases'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.caseshowdiv').html('');
                $('.caseshowdiv').html(msg.casediv);
            }
        });
    }

    function getfirmcases() {
        $.ajax({
            url: "<?php echo site_url('searchmyfirmcases'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.caseshowdiv').html('');
                $('.caseshowdiv').html(msg.casediv);
            }
        });
    }

    function getopencases() {
        $.ajax({
            url: "<?php echo site_url('searchopencases'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.caseshowdiv').html('');
                $('.caseshowdiv').html(msg.casediv);
            }
        });
    }

    function getclosecases() {
        $.ajax({
            url: "<?php echo site_url('searchclosecases'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.caseshowdiv').html('');
                $('.caseshowdiv').html(msg.casediv);
            }
        });
    }

    $("#parea").change(function () {
        var pid = $(this).val();
        $.ajax({
            url: "<?php echo site_url('searchcasesbypracticearea'); ?>",
            type: "post",
            dataType: "json",
            data: {
                PracticeAreaId: pid,
            },
            success: function (msg) {
                $('.caseshowdiv').html('');
                $('.caseshowdiv').html(msg.casediv);
            }
        });
    });
</script>