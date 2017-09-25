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
                    <h5 class="panel-title">Documents</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                   <?php if ($_SESSION['permissionsession']['documents'] == '1') { ?>
                                <a data-toggle="modal" data-target="#myModal"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                                   <?php }?>
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
                        <table class="table table-bordered" id="firmdatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Document Title</th>
                                    <th>Case Link</th>
                                    <th>Last Updated</th>
                                    <th class="action-column">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($allunreaddocinfo as $unreaddoc) {                                        //print_r($doc); ?>
                                
                                <tr>
                                        <td><?php echo $i++?></td>
                                        <td><a><?php echo $unreaddoc['OriginalName']; ?></a><p><?php echo $unreaddoc['OriginalName']; ?></p></td>
                                        <td><a><?php echo $unreaddoc['CaseName']; ?></a></td>
                                        <td>Updated On <?php echo date('d F, Y', strtotime($unreaddoc['UploadedOn'])); ?><p>By <a><?php echo $unreaddoc['fullname']; ?></a></p></td>
                                        <td>
                                             <?php if ($_SESSION['permissionsession']['documents'] == '2' ||$_SESSION['permissionsession']['documents'] == '1') { ?>
                                            <a href="<?php echo base_url() ?>viewdocs/<?php echo $unreaddoc['DocumentId'];?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <?php }?>
                                             <?php if ($_SESSION['permissionsession']['documents'] == '1') { ?>
                                            <a href="<?php echo base_url() ?>viewdocs/<?php echo $unreaddoc['DocumentId'];?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-comment"></span></a>
                                            <a href="<?php echo base_url() ?>viewdocs/<?php echo $unreaddoc['DocumentId'];?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="alertForDelete" href="<?php //echo base_url()?>deletefirm/<?php?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                             <?php }?>
                                        </td>
                                    </tr>
                       
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>	
            </div>			
        </div>
        <!-- /main content -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 700px; height: 400px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Add Document</h3>
                    </div>
                    <div class="modal-body" style="background:#F6F6F6; height: 300px;">
                        <h3 style="text-align: center;">How would you like to add your document?</h3><br>
                        <div class="row">
                            <div class="col-md-4" style="background: #E3F4FF; height: 150px; border: 1px solid #B7B7B7; border-radius: 18px; width: 25%; margin-right: 10px; text-align: center; margin-left: 36px;">
                                <a href="" id="uploadid" data-toggle="modal" data-target="#documentupload"><div style="margin-top: 28px;"><img src="<?php echo base_url() ?>assets/image/document_new_upload.png"><p>Upload Document(s)</p></div></a>
                            </div>
                            <div class="col-md-4" style="background: #E3F4FF; height: 150px; border: 1px solid #B7B7B7; border-radius: 18px; width: 25%; margin-right: 10px; text-align: center; margin-left: 34px;">
                                <a href="" data-toggle="modal" data-target="#margetemplete"><div style="margin-top: 28px;"><img src="<?php echo base_url() ?>assets/image/document_new_template.png"><p>Marge Template</p></div></a>
                            </div>
                            <div class="col-md-4" style="background: #E3F4FF; height: 150px; border: 1px solid #B7B7B7; border-radius: 18px; width: 25%; margin-right: 40px; text-align: center; float: right;">
                                <a href="" data-toggle="modal" data-target="#blankpage"><div style="margin-top: 28px;"><img src="<?php echo base_url() ?>assets/image/document_new_blank.png"><p>Blank page</p></div></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->

        <!----------------------------------------   1st MODAL   -------------------------------------------->

        <!-- Modal -->
        <div class="modal fade" id="documentupload" role="dialog" style="
   position: absolute;
   top: 10px;
   right: 100px;
   bottom: 0;
   left: 0;
   z-index: 10040;
">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 1000px; height: 1000px; background: #F6F6F6;">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="modal-header" style="">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h3 class="modal-title">Add Document</h3>
                                <span style="float: right;margin-top: -31px;">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item" >
                                            <a style="color: #fff; cursor: default; background-color: #2787c5; border-radius: 0.25rem;">Single Document Upload</a>
                                        </li>
                                        <li class="nav-item">
                                            <a style="color: #fff; cursor: default; background-color: #2787c5; border-radius: 0.25rem;">Batch Document Upload</a>
                                        </li>
                                    </ul>
                                </span>
                            </div><hr>
                            <div class="modal-body" style="background:#F6F6F6; height: 700px;">
                                <div class="panel-group">
                                    <div class="panel panel-default" style="border: 1px solid #266A9B;">
                                        <div class="panel-heading" style="background: #266A9B; color: #fff;">
                                            <span>GETTING STARTED TIPSHIDE TIP</span>
                                            <span style="float: right; margin-top: -6px;">HIDE TIP</span>
                                        </div>
                                        
                              
                                        
                                        <div class="panel-body">
                                            <p>When uploading a document, you first need to select the Case Link, if any. Once you select the case the Sharing options will load on the right side where you can choose which users can view this document.
The Doc. Name is the name that will be used throughout MyCase to identify this document. Click on Source to select the file that you want to upload. There are no restrictions on the types of files you can upload, and all files are encrypted before they're saved. You can also attach Tags (words or phrases) to organize your document and make it easy to find later.
Read more about uploading documents by clicking here.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" style="border-left: 1px dotted #ddd;">
                            <div class="modal-header" style="height: 79px;">
                                <h5 class="modal-title">Sharing</h5>

                            </div><hr>
                            <div class="modal-body" style="height: 700px;">
                                <div id="sharing_list" class="sharing_list">
                                    <span style="font-style: italic;">Select a Case Link to configure sharing</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
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
<script>
    $(function () {

        $('#firmdatatables').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });
</script>