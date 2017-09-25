<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>contact">Contact</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<style>
    table {
        table-layout:fixed;
    }
    td{
        overflow:hidden;
        text-overflow: ellipsis;
    }
    .dataTables_filter {
        width: 50%;
        float: right;
        text-align: right;
    }
</style>
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Contacts</h5>
                    <h5 style="color: green"><?php
                        if ($this->session->flashdata('insertsuccess')) {
                            echo $this->session->flashdata('insertsuccess');
                        }
                        ?></h5>
                    <h5 style="color: green"><?php
                        if ($this->session->flashdata('updatesuccess')) {
                            echo $this->session->flashdata('updatesuccess');
                        }
                        ?></h5>
                    <h5 style="color: green"><?php
                        if ($this->session->flashdata('deletesuccess')) {
                            echo $this->session->flashdata('deletesuccess');
                        }
                        ?></h5>
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

                    <div class="heading-elements">

                        <ul class="icons-list">

                            <li>
                                <?php if ($_SESSION['permissionsession']['clients'] == '1') { ?>
                                    <a href="contact/addContact"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>
                                <?php } ?>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url() ?>contactexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url() ?>contactPdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>					                        
                </div>
                <div class="panel-body">
                    <div class="row form-inline" style="background-color: #2787c5; color: #fff; font-weight: bold; margin-top: 10px; margin-bottom: 10px; height: 50px; border: 1px solid blue; border-radius: 4px; padding: 6px;">
                        <div class="col-md-9 input-group">
                            <span><button class="btn btn-default" style='width: 72px; border-radius: 6px; font-size: 17px; padding: 0px; margin-right:10px' onclick="getactivecontact()">Active</button></span>
                            <span><button class="btn btn-default" style='width: 72px; border-radius: 6px; font-size: 17px; padding: 0px;' onclick="getarchivecontact()">Archive</button></span>
                            <span style="margin-left:50px"> <lavel>Group: </lavel></span>
                            <span><div class="form-group">
                                    <select class="form-control" id="sel1" onchange="contactsearch(this.value);">
                                            <option>Show All Groups</option>
                                            <?php foreach ($allContactGroup as $group) { ?>
                                                <option value="<?php echo $group->GroupId; ?>"><?php echo $group->GroupName; ?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                            </span>
                        </div>
                        <div class="col-md-3" style="float: right">
                        </div>
                    </div>
                    <div id="w0" class="grid-view">
                        <div class="summary"></div>
                        <div class="contact-div">
                            <table id="all-contact-table" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Contact Group</th>
                                        <th>Linked Cases</th>
                                        <th>Details</th>
                                        <th class="action-column">&nbsp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($all_contact) {
                                        $i = 0;
                                        foreach ($all_contact as $a_contact) {
                                            ?>
                                            <tr data-key="23">
                                                <td><?php echo ++$i; ?></td>
                                                <td><?php if ($a_contact->FirstName) { ?><a href="<?php echo base_url() . 'company/contactDetails/' . base64_encode($a_contact->ContactId); ?>"><?php
                                                            echo $a_contact->FirstName;
                                                        }
                                                        ?></a></td>
                                                <td><a href="<?php echo base_url() . 'company/contactDetails/' . base64_encode($a_contact->ContactId); ?>"><?php
                                                        if ($a_contact->Email) {
                                                            echo $a_contact->Email;
                                                        } else {
                                                            echo "Not Set";
                                                        }
                                                        ?></a></td>
                                                <td><?php
                                                    if ($a_contact->Mobile) {
                                                        echo '(' . $a_contact->CCodeM . ')' . $a_contact->Mobile;
                                                    } else {
                                                        echo 'Number not set';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <span class="not-set">

                                                        <?php
                                                        if ($a_contact->ContactGroup == '' || $a_contact->ContactGroup == NULL || $a_contact->ContactGroup == 0) {
                                                            echo 'Not Set';
                                                        } else {
                                                            foreach ($allContactGroup as $aContactGroup) {
                                                                if ($aContactGroup->GroupId == $a_contact->ContactGroup) {
                                                                    echo $aContactGroup->GroupName;
                                                                }
                                                            }
                                                        }
                                                        ?>                           
                                                    </span>
                                                </td>

                                                <td>
                                                    <?php if ($allcases) { ?>
                                                        <?php
                                                        $testmatch = FALSE;
                                                        foreach ($allcases as $aCase) {
                                                            if ($a_contact->ContactId == $aCase->ContactId) {
                                                                $testmatch = TRUE;
                                                                ?><a href="<?php echo base_url() . 'cases/viewCase/' . base64_encode($aCase->CaseId); ?>"><?php echo $aCase->CaseName . '</br>'; ?></a><?php
                                                            }
                                                        }if ($testmatch == FALSE) {
                                                            echo"Not Set";
                                                        }
                                                        ?>
                                                        <?php
                                                    } else {
                                                        echo "Not Set";
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    Added
                                                    <?php if ($a_contact->CreatedOn) { ?>
                                                        On <?php
                                                        $timestamp = strtotime($a_contact->CreatedOn);
                                                        print date("jS F Y", $timestamp);
                                                        ?>

                                                        <br />by  




                                                        <?php
                                                        foreach ($all_user as $a_user) {
                                                            if ($a_user->status == 1) {
                                                                ?>
                                                                <a href="<?php
                                                                if ($a_contact->UserId == $a_user->id) {
                                                                    echo base_url() . 'contacts/users/' . base64_encode($a_user->id);
                                                                }
                                                                ?>"><?php
                                                                       if ($a_contact->UserId == $a_user->id) {
                                                                           echo $a_user->fullname;
                                                                       }
                                                                       ?></a>
                                                                <?php
                                                            } else {
                                                                if ($a_contact->UserId == $a_user->id) {
                                                                    echo ' ' . $a_user->fullname;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                    } else {
                                                        echo ' ';
                                                    }
                                                    ?>

                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'company/contactDetails/' . base64_encode($a_contact->ContactId) ?>" title="View" aria-label="View" data-pjax="0">
                                                        <span class="glyphicon glyphicon-eye-open"></span>
                                                    </a> 
                                                    <?php if ($_SESSION['permissionsession']['clients'] != '2') { ?>
                                                        <a href="<?php echo base_url() . 'contact/update/' . base64_encode($a_contact->ContactId) ?>" title="Update" aria-label="Update" data-pjax="0">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </a> 
                                                        <a href="<?php echo base_url() . 'contact/delete/' . base64_encode($a_contact->ContactId) ?>" title="Delete" aria-label="Delete" data-method="post" data-pjax="0" class="confirmation">
                                                            <span class="glyphicon glyphicon-trash" onClick="doconfirm();"></span>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    <?php } else { ?>      
                                        <tr><td colspan="8"><div class="empty">No results found.</div></td></tr>
                                    <?php } ?>
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

        $('#all-contact-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true

        });
    });


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

    function contactsearch(group) {
        $.ajax({
            url: "<?php echo site_url('getcontactbygroupid'); ?>",
            type: "post",
            data: {
                group_id: group,
            },
            dataType: "json",
            success: function (msg) {
                $('.contact-div').html('');
                $('.contact-div').html(msg.contactdiv);
            }
        });
    }

    function getactivecontact() {
        $.ajax({
            url: "<?php echo site_url('getactivecontact'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.contact-div').html('');
                $('.contact-div').html(msg.contactdiv);
            }
        });
    }

    function getarchivecontact() {
        $.ajax({
            url: "<?php echo site_url('getarchivecontact'); ?>",
            type: "post",
            dataType: "json",
            success: function (msg) {
                $('.contact-div').html('');
                $('.contact-div').html(msg.contactdiv);
            }
        });
    }
</script>