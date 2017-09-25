<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>contactGroup">Contact Group</a></li>
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

            <div class="panel panel-flat col-sm-6">
                <div class="panel-heading">
                    <h5 class="panel-title">Contact Groups</h5>
                     <h5 style="color: green"><?php if($this->session->flashdata('insertsuccess')){echo $this->session->flashdata('insertsuccess');}?></h5>
                    <h5 style="color: green"><?php if($this->session->flashdata('updatesuccess')){echo $this->session->flashdata('updatesuccess');}?></h5>
                   <h5 style="color: green"><?php if( $this->session->flashdata('deletesuccess')){echo  $this->session->flashdata('deletesuccess');}?></h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <?php if ($_SESSION['permissionsession']['clients'] == '1') { ?>
                                <a href="contactGroup/addContactGroup"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                                <?php } ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url()?>contactgroupexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url()?>contactgrouppdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">



                    <div id="w0" class="grid-view">
                        <table class="table table-striped table-bordered" id="all-contact-table"><thead>
                                <tr><th>Group Name</th><th class="action-column">&nbsp;</th></tr>
                            </thead>
                            <tbody>
                                <?php if($all_group){?>
                                  
                                       <?php foreach ($all_group as $a_group) {?>
                                             <tr>
                                       <td><?php echo $a_group->GroupName?></td>
                                       <?php if($a_group->GroupName == 'Clients'){?>
                                       <td></td>
                                       <?php } else { ?>
                                        <td>
                                             <?php if ($_SESSION['permissionsession']['clients'] != '2') { ?>
                                            <a href="<?php echo base_url() . 'contactGroup/update/' .base64_encode($a_group->GroupId) ?>" title="Update" aria-label="Update" data-pjax="0">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="<?php echo base_url() . 'contactGroup/delete/' . base64_encode($a_group->GroupId) ?>" title="Delete" aria-label="Delete" data-method="post" data-pjax="0" class="confirmation">
                                                <span class="glyphicon glyphicon-trash" onClick="doconfirm();"></span>
                                            </a>
                                             <?php } ?>
                                        </td>
                                       <?php } ?>
                                   </tr>    
                                          <?php }?>
                                   
                                <?php }else{?>
                                <tr><td colspan="2"><div class="empty">No results found.</div></td></tr>
                                <?php }?>
                            </tbody></table>
                    </div>	</div>
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
</script>