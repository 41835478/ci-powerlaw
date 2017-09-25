<!--------------------sweet alert------------------->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/sweetalert.css">  
<script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>

<!-----------------------------------------JQUERY UI----------------------------------->
<link href="<?php echo base_url() ?>assets/jQueryautocomplete/jquery-ui.css" rel="stylesheet" type="text/css" />
<!-----------------------------------------JQUERY UI----------------------------------->
<style>
    ul.ui-autocomplete {
        z-index: 1100;
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

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h3 class="panel-title">Messages</h3><br>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a data-toggle="modal" data-target="#insertmsgmodal"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
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
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h5>Only Shows: </h5>
                                    <span class="btn btn-default btn-lg" id="incombtn" style="width: 120px; background: #B3D7F0" onclick="showtaskwithincom('2')">Messages</span>
                                    <span class="btn btn-default btn-lg" id="combtn" style="width: 120px; background: #E7E7E7" onclick="showtaskwithincom('1')">Forward Emails</span>

                                    <h5>Filter By Case: </h5>
                                    <div class="form-inline"><input style="width: 230px;margin-right: 5px;" type="text" name="searchcase" value="" class="form-control"><img onclick="getallcase()" src="<?php echo base_url() ?>assets/image/smlbtn.png"></div>
                                    <div id="caseresult"></div>
                                    <div class="media" id="openclosediv1">
                                        <div class="media-body">
                                            <h3 class="active"><strong><a href="#inbox" data-toggle="tab">Inbox</a></strong></h3>
                                            <hr>
                                            <h3><strong><a href="#sent" data-toggle="tab">Sent</a></strong></h3>
                                            <hr>
                                            <h3><strong><a href="#draft" data-toggle="tab">Draft</a></strong></h3>
                                            <hr>
                                            <h3><strong><a href="#archive" data-toggle="tab">Archive</a></strong></h3>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="media" id="openclosediv2" style="display: none">
                                        <h5>Filter By Type: </h5>
                                        <span class="btn btn-default btn-lg" id="incofffmbtn" style="width: 60px; background: #5F7A8D" onclick="showtaskwithincom('2')">All</span>
                                        <span class="btn btn-default btn-lg" id="comfffbtn" style="width: 95px; background: #B3D7F0" onclick="showtaskwithincom('1')">Unresolved</span>
                                        <span class="btn btn-default btn-lg" id="comfffbtn" style="width: 90px; background: #E7E7E7" onclick="showtaskwithincom('1')">Resolved</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">

                                        <!----------------------Inbox Panel START----------------------->
                                        <div class="tab-pane active" id="inbox" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive showmsgdiv"> 
                                            <h2>Inbox Messages : </h2>
                                            <table class="table table-bordered" id="countrydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Message From</th>
                                                        <th>Message To</th>
                                                        <th>Subject</th>
                                                        <th>Case Name</th>
                                                        <th>Date</th>
                                                        <th class="action-column">Action</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($messageInbox as $inbox) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($inbox['MessageFrom']);
                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php echo $inbox['MessageTo']; 
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($inbox['MessageTo']);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $inbox['MessageId']; ?>"><?php echo $inbox['Subject']; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $inbox['CaseId']; ?>"><?php echo $inbox['CaseName']; ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($inbox['SentOn'])); ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $inbox['MessageId']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!----------------------Inbox Panel END----------------------->


                                        <!----------------------Sent Panel START----------------------->
                                        <div class="tab-pane" id="sent">
                                            <h2>Sent Messages : </h2>
                                            <table class="table table-bordered" id="countrydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Message From</th>
                                                        <th>Message To</th>
                                                        <th>Subject</th>
                                                        <th>Case Name</th>
                                                        <th>Date</th>
                                                        <th class="action-column">Action</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($messageInbox as $inbox) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($inbox['MessageFrom']);
                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($inbox['MessageTo']);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $inbox['MessageId']; ?>"><?php echo $inbox['Subject']; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $inbox['CaseId']; ?>"><?php echo $inbox['CaseName']; ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($inbox['SentOn'])); ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $inbox['MessageId']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>

                                        <!----------------------SENT Panel END----------------------->

                                        <!----------------------DRAFT Panel START----------------------->
                                        <div class="tab-pane" id="draft">

                                            <h2>Draft Messages : </h2>
                                            <table class="table table-bordered" id="countrydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Message From</th>
                                                        <th>Message To</th>
                                                        <th>Subject</th>
                                                        <th>Case Name</th>
                                                        <th>Date</th>
                                                        <th class="action-column">Action</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($messageDraft as $draft) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($draft['MessageFrom']);
                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($draft['MessageTo']);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $draft['MessageId']; ?>"><?php echo $draft['Subject']; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $draft['CaseId']; ?>"><?php echo $draft['CaseName']; ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($draft['SentOn'])); ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $draft['MessageId']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!----------------------DRAFT Panel END----------------------->
                                        <!----------------------ARCHIVE Panel START----------------------->
                                        <div class="tab-pane" id="archive">

                                            <h2>Archive Messages : </h2>
                                            <table class="table table-bordered" id="countrydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Message From</th>
                                                        <th>Message To</th>
                                                        <th>Subject</th>
                                                        <th>Case Name</th>
                                                        <th>Date</th>
                                                        <th class="action-column">Action</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($messageArchive as $archive) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($archive['MessageFrom']);
                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($archive['MessageTo']);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $archive['MessageId']; ?>"><?php echo $archive['Subject']; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $archive['CaseId']; ?>"><?php echo $archive['CaseName']; ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($archive['SentOn'])); ?></td>
                                                            <td><a href="<?php echo base_url() ?>viewmsg/<?php echo $archive['MessageId']; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!----------------------ARCHIVE Panel END----------------------->

                                    </div><!---------end tab content--->
                                </div>
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


<!-------------------------------MESSAGE INSERT MODAL----------------------->

<!-- Modal -->
<div class="modal fade" id="insertmsgmodal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    New Message
                </h4>
            </div>
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>insertnewmessage">
                <!-- Modal Body -->
                <div class="modal-body">
                    <h5>Send To</h5>
                    <div class="form-group">
                        <div class="col-sm-9" id="sendtodiv1">
                            <input type="text" class="form-control" name="sent_to" id="SentToEmail" placeholder="Select User"/>
                        </div>
                        <div class="col-sm-3">
                            <input id="checkboxid" type="checkbox"> <span class="control-label">Send a global To</span> 
                            <div id="sendtodiv4" style="display:none; background: #F3F3F3; padding: 6px; border: 1px solid #ddd; width: 220px;"> <input id="checkboxid" type="checkbox">All Contacts <input id="checkboxid" type="checkbox">All Firm Users</div>
                        </div>
                    </div>
                    <hr style="border-top: dotted 1px;" />
                    <div class="form-group" id="sendtodiv2">
                        <p>Replies</p>
                        <input type="radio" name="replies"> Replies are sent to everyone <br>
                        <input type="radio" name="replies"> Replies are sent only to me (private message)	
                    </div>
                    <div class="form-group" id="sendtodiv3">
                        <label for="exampleInputEmail1">Case Link</label>
                        <input type="text" class="form-control" placeholder="Case Link" id="caseLink" name="case_link">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subject</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter subject" name="subject">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control FETextInput user-text" id="newmsgtext" name="msgContent"></textarea>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
        <!-------------------------------MESSAGE INSERT MODAL----------------------->





        <script>
            $(document).ready(function () {
                $('#firmdatatables').DataTable({
                });

                $('#combtn').click(function () {
                    $('#openclosediv1').hide();
                    $('#openclosediv2').show();
                });

                $('#incombtn').click(function () {
                    $('#openclosediv2').hide();
                    $('#openclosediv1').show();
                });
            });

            function getallcase() {

                $.ajax({
                    url: "<?php echo site_url('getallsitecaseinfoformsg'); ?>",
                    type: "post",
                    success: function (msg) {
                        var hhh = JSON.parse(msg);
                        $('#caseresult').html(hhh.casediv);
                        $('#case_select').attr('size', 4);
                    }
                });
            }


            function getmessagebycaseid(case_id) {
                alert(case_id);
                $.ajax({
                    url: "<?php echo site_url('getallmessagebycaseinfo'); ?>",
                    type: "post",
                    data: {
                        case_id: case_id,
                    },
                    success: function (msg) {
                        var hhh = JSON.parse(msg);
                        console.log(hhh);
                        $('#inbox').html('');
                        $('#inbox').html(hhh.msgdiv);
                    }
                });
            }
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

            function insertnewmessage() {
                alert('fouziaaaaaaaa');
            }

            tinymce.init({
                selector: '#newmsgtext',
                height: 100,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_css: '//www.tinymce.com/css/codepen.min.css'
            });


            $('#checkboxid').click(function () {
                if ($(this).is(':checked')) {
                    $("#sendtodiv1").hide();
                    $("#sendtodiv2").hide();
                    $("#sendtodiv3").hide();
                    $("#sendtodiv4").show();
                } else {
                    $("#sendtodiv1").show();
                    $("#sendtodiv2").show();
                    $("#sendtodiv3").show();
                    $("#sendtodiv4").hide();
                }
            });

            $(function () {
                $("#caseLink").autocomplete({
                    source: "<?php echo base_url() ?>caseLinkAutocomplete"

                });

                $('#SentToEmail').autocomplete({
                    source: "<?php echo base_url() ?>sentToEmailAutocomplete"
                });
            });
        </script>