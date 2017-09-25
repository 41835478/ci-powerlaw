<style>
    .dataTables_filter {
        width: 50%;
        float: right;
        text-align: right;
    }
</style>
<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>company">Company</a></li>
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
                    <h5 class="panel-title">Companies</h5>
                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissable" style="width: 1000px; background: #D9EDF7">
                            <i class="fa fa-check-square-o"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php }
                    ?>

                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissable" style="width: 1000px;">
                            <i class="fa fa-check-square-o"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>

                    <?php }
                    ?>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <?php if ($_SESSION['permissionsession']['clients'] == '1') { ?>
                                    <a href="company/addCompany"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                            <?php } ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url() ?>companyexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url() ?>companypdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div class="row form-inline" style="background-color: #2787c5; color: #fff; font-weight: bold; margin-top: 10px; margin-bottom: 10px; height: 50px; border: 1px solid blue; border-radius: 4px; padding: 6px;">
                        <div class="col-md-9 input-group">
                            <span><button class="btn btn-default" style='width: 72px; border-radius: 6px; font-size: 17px; padding: 0px; margin-right:10px' onclick="getactivecompany()">Active</button></span>
                            <span><button class="btn btn-default" style='width: 72px; border-radius: 6px; font-size: 17px; padding: 0px;' onclick="getarchivecompany()">Archive</button></span>
                        </div>
                        <div class="col-md-3" style="float: right">
                        </div>
                    </div>

                    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">    
                        <div id="w1" class="grid-view">
                            <div class="company-div">
                                <table id="all-company-table" class="table table-striped table-bordered companydatatables"><thead>
                                        <tr>
                                            <th></th>
                                            <th>Company Name</th>
                                            <th>Linked Cases</th>
                                            <th>Linked Contacts</th>
                                            <th>Details</th>
                                            <th class="action-column">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($all_company) { ?>

                                            <?php foreach ($all_company as $a_company) { ?>
                                                <tr id="w1-filters" class="filters">
                                                    <td><img src="<?php echo base_url() ?>assets/image/small/default_company.png"></td>
                                                    <td><a href="<?php echo base_url() . 'company/companyDetails/' . $a_company->CompanyId ?>"><?php echo $a_company->CompanyName ?></a></td>
                                                    <td><?php
                                                        $matchFound = FALSE;
                                                        foreach ($all_cases as $a_cases) {

                                                            if ($a_company->CompanyId == $a_cases->CompanyId) {
                                                                $matchFound = TRUE;
                                                                ?>
                                                                <a href="<?php echo base_url() . 'cases/viewCase/' . base64_encode($a_cases->CaseId); ?>"><?php echo $a_cases->CaseName . '</br>'; ?></a>
                                                                <?php
                                                            }
                                                        }if ($matchFound == FALSE) {
                                                            echo"Not Found";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $match = FALSE;
                                                        foreach ($all_contact as $a_contact) {

                                                            if ($a_company->CompanyId == $a_contact->CompanyId) {
                                                                $match = TRUE;
                                                                if ($a_contact) {
                                                                    ?>

                                                                    <a href="<?php echo base_url() . 'company/contactDetails/' . base64_encode($a_contact->ContactId) ?>"><?php
                                                                        echo $a_contact->FirstName . ' ' . $a_contact->LastName;
                                                                        foreach ($all_group as $a_group) {
                                                                            if ($a_group->GroupId == $a_contact->ContactGroup) {
                                                                                echo '(' . $a_group->GroupName . ')';
                                                                            }
                                                                        }
                                                                        ?><?php echo '</br>' ?></a>

                                                                    <?php
                                                                }
                                                            }
                                                        }if ($match == FALSE) {
                                                            echo "Not Found";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>Added
                                                        <?php
                                                        if ($a_company->CreatedOn) {
                                                            echo" on ";
                                                            $timestamp = strtotime($a_company->CreatedOn);
                                                            echo date("jS F Y", $timestamp);
                                                        }
                                                        ?>
                                                        by 
                                                        <?php $getuserinfo = $this->CompanyModel->getcompanycreatedinfo($a_company->CreatedBy); 
                                                        $user = $getuserinfo->fullname;
                                                           if(!empty($getuserinfo)) {?>
                                                        <a href="<?php echo base_url()?>contacts/users/<?php echo base64_encode($getuserinfo->id); ?>"><?php echo $user;?></a>
                                                           <?php }?>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'company/companyDetails/' . $a_company->CompanyId ?>" title="View" aria-label="View" data-pjax="0">
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                        </a>
                                                        <?php if ($_SESSION['permissionsession']['clients'] != '2') { ?>
                                                            <a href="<?php echo base_url() . 'company/update/' . base64_encode($a_company->CompanyId) ?>" title="Update" aria-label="Update" data-pjax="0">
                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                            </a> 
                                                            <a href="<?php echo base_url() . 'company/delete/' . base64_encode($a_company->CompanyId) ?>" title="Delete" aria-label="Delete" data-method="post" data-pjax="0" class="confirmation">
                                                                <span class="glyphicon glyphicon-trash" onClick="doconfirm();"></span>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>  
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr><td colspan="5"><div class="empty">No results found.</div></td></tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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

        $('.companydatatables').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });
</script>
<script>
    $('.confirmation').click(function (e) {
        var href = $(this).attr('href');

        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = href;
                    }
                });

        return false;
    });

    function getactivecompany() {
        $.ajax({
            url: "<?php echo site_url('getactivecompany'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                console.log(msg);
                $('.company-div').html('');
                $('.company-div').html(msg.contactdiv);
            }
        });
    }

    function getarchivecompany() {
        $.ajax({
            url: "<?php echo site_url('getarchivecompany'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.company-div').html('');
                $('.company-div').html(msg.archivecompany);
            }
        });
    }
</script>
