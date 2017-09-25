<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>                                                 
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
<style>
    #myInput {
        background-image: url('/css/searchicon.png'); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }

    #myTable {
        border-collapse: collapse; /* Collapse borders */
        width: 100%; /* Full-width */
        border: 1px solid #ddd; /* Add a grey border */
        font-size: 18px; /* Increase font-size */
    }

    #myTable th, #myTable td {
        text-align: left; /* Left-align text */
        padding: 12px; /* Add padding */
    }

    #myTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd; 
    }

    #myTable tr.header, #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #f1f1f1;
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
                                    <h5>Filter By Case: </h5>
                                    <?php if (isset($allCASE) && (!empty($allCASE))) { ?>
                                        <div class="form-inline"><input style="width: 230px;margin-right: 5px;" id="myInput" onkeyup="myFunction()" type="text" name="searchcase" value="" class="form-control"><img onclick="getallcase()" src="<?php echo base_url() ?>assets/image/smlbtn.png"></div>
                                        <div id="caseresult"></div>
                                    <?php } else { ?>
                                        <p style='font-size: 16px;color: red;font-weight: bold;'>You Don't have any case. At first create some case to use this option</p>
                                        <div class="form-inline"><input style="width: 230px;margin-right: 5px;" id="" type="text" name="searchcase" value="" class="form-control"><img src="<?php echo base_url() ?>assets/image/smlbtn.png"></div>
                                        <div id="caseresult"></div>
                                    <?php } ?>
                                    <div class="media" id="openclosediv1">
                                        <div class="media-body msgtab">
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
                                            <table class="table table-bordered" id="myTable" style="border: 1px solid #ddd;  word-wrap:break-word;">
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
                                                    <?php foreach ($messageList as $inbox) { ?>

                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
//                                                            foreach($alluser as $auser){if($inbox->MessageFrom){}}
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($inbox->MessageFrom);

                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($inbox->MessageTo);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $inbox->MessageId; ?>"><?php echo $inbox->Subject; ?></a></td>
                                                            <td><?php
                                                                $casename = $this->MessageModel->getFirm($inbox->CaseId);
                                                                echo $casename->CaseName;
                                                                ?></td>
                                                            <td><?php echo date('d F, Y', strtotime($inbox->SentOn)); ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url() ?>atviewmsg/<?php echo $inbox->MessageId; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                                <a href="<?php echo base_url() . 'message/delete/' . $inbox->MessageId; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!----------------------Inbox Panel END----------------------->


                                        <!----------------------Sent Panel START----------------------->
                                        <div class="tab-pane" id="sent">
                                            <h2>Sent Messages : </h2>
                                            <table class="table table-bordered" id="countrydatatablessent" style="border: 1px solid #ddd;  word-wrap:break-word;">
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
                                                    <?php foreach ($sentlist as $asentlist) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($asentlist->MessageFrom);
                                                                if ($usereditinfo->fullname) {
                                                                    echo $usereditinfo->fullname;
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($asentlist->MessageTo);

                                                                if ($usereditinfo) {
                                                                    if ($usereditinfo->fullname) {
                                                                        echo $usereditinfo->fullname;
                                                                    }
                                                                }
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $asentlist->MessageId; ?>"><?php echo $asentlist->Subject; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $asentlist->CaseId; ?>"><?php
                                                                    $casename = $this->MessageModel->getFirm($asentlist->CaseId);
                                                                    if ($casename) {
                                                                        if ($casename->CaseName) {
                                                                            echo $casename->CaseName;
                                                                        }
                                                                    }
                                                                    ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($asentlist->SentOn)); ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $asentlist->MessageId; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
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

                                                    <?php foreach ($messageListdraft as $draft) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($draft->MessageFrom);
                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($draft->MessageTo);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $draft->MessageId; ?>"><?php echo $draft->Subject; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $draft->CaseId; ?>"><?php
                                                                    $casename = $this->MessageModel->getFirm($draft->CaseId);
                                                                    echo $casename->CaseName;
                                                                    ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($draft->SentOn)); ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $draft->MessageId; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!----------------------DRAFT Panel END----------------------->
                                        <!----------------------ARCHIVE Panel START----------------------->
                                        <div class="tab-pane" id="archive">

                                            <h2>Archive Messages : </h2>
                                            <table class="table table-bordered" id="countrydatatablesarc" style="border: 1px solid #ddd;  word-wrap:break-word;">
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

                                                    <?php foreach ($getarchived as $archive) { ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>assets/image/msg.png"></td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($archive->MessageFrom);
                                                                echo $usereditinfo->fullname;
                                                                ?>
                                                            </td>
                                                            <td><?php
                                                                $usereditinfo = $this->MessageModel->getuserinfobyid($archive->MessageTo);
                                                                echo $usereditinfo->fullname;
                                                                ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $archive->MessageId; ?>"><?php echo $archive->Subject; ?></a></td>
                                                            <td><a href="<?php echo base_url() ?>viewcaseadmin/<?php echo $archive->CaseId; ?>"><?php
                                                                    $casename = $this->MessageModel->getFirm($archive->CaseId);
                                                                    echo $casename->CaseName;
                                                                    ?></a></td>
                                                            <td><?php echo date('d F, Y', strtotime($archive->SentOn)); ?></td>
                                                            <td><a href="<?php echo base_url() ?>atviewmsg/<?php echo $archive->MessageId; ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
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
            <form class="form-horizontal" onsubmit="return(validate());" name="newform" role="form" method="post" action="<?php echo base_url() ?>atinsertnewmessage">
                <!-- Modal Body -->
                <div class="modal-body">
                    <h5>Send To</h5>
                    <?php //print_r($allUser); ?>
                    <?php if (!empty($allUser)) { ?>
                        <div class="form-group">
                            <div class="col-sm-9" id="sendtodiv1">
                                <div class="form-group">

                                    <span id="comments1" style="color: red"><?php echo form_error('toEmail'); ?></span>
                                    <span id="commentto" style="color: red;"></span>
                                    <span id="commentsenttoblank" style="color: red;"></span>

                                    <select class="js-example-basic-single form-control" placeholder="Select a To Message" id="userid" name="toEmail[]" onchange="myFunction()" multiple="">
                                        <optgroup>
                                            <?php
                                            if ($allUser) {
                                                foreach ($allUser as $aUser) {
                                                    ?>
                                                    <option value="<?php echo $aUser->id ?>"><?php echo $aUser->fullname ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </optgroup>
                                        <optgroup label="Contact.........."<>
                                        <?php
                                        if ($allcontact) {
                                            foreach ($allcontact as $acontact) {
                                                ?>
                                                          <option value="<?php echo $acontact->ContactId ?>"><?php
                                                                  if ($acontact->FirstName) {
                                                                      echo $acontact->FirstName;
                                                                  }
                                                                  ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </optgroup>

                                    </select>
                                </div>
    <!--                            <input type="text" class="form-control" name="sent_to" id="SentToEmail" placeholder="Select User"/>-->
                            </div>
                            <div class="col-sm-3">
                                <input id="checkboxid" type="checkbox"> <span class="control-label">Send a global To</span> 
                                <div id="sendtodiv4" style="display:none; background: #F3F3F3; padding: 6px; border: 1px solid #ddd; width: 220px;">
                                    <input id="checkboxidfirm" type="checkbox" name="contest" value="1">All Contacts

                                    <input id="checkboxidcon" type="checkbox" name="firmtest" value="2">All Firm Users</div>

                            </div>
                        </div>
                    <?php } else { ?>
                        <p style='font-size: 16px; color: red; font-weight: bold;'>You have no contact. At first create some user for your firm to sand message.</p>
                    <?php } ?>
                    <hr style="border-top: dotted 1px;" />
                    <div class="form-group" id="sendtodiv2">
                        <div class="col-md-12 col-sm-12">
                            <p>Replies</p>
                            <input type="radio" name="replies"> Replies are sent to everyone <br>
                            <input type="radio" name="replies"> Replies are sent only to me (private message)	
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12" id="newinsert">
                            <label class="control-label" for="">Case Link</label><select id="case_select" name="caseid" class="form-control">
                                <option value="">Select a Case
                                </option>
                                <?php foreach ($allCASE as $aCASE) { ?>
                                    <option value="<?php echo $aCASE->CaseId; ?>"><?php echo $aCASE->CaseName; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <label for="exampleInputEmail1">Subject</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter subject" name="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <textarea class="form-control FETextInput user-text" id="newmsgtext" name="msgContent"></textarea>
                        </div>
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
    </div>
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
        // alert('fouzia');

        $.ajax({
            url: "<?php echo site_url('getallcasebyuserid'); ?>",
            type: "post",
            success: function (msg) {
                var hhh = JSON.parse(msg);
                $('#caseresult').html(hhh.casediv);
                $('#case_select').attr('size', 4);
            }
        });
    }


    function getmessagebycaseid(case_id) {
        $.ajax({
            url: "<?php echo site_url('getallmessagebycaseinfobyuserid'); ?>",
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
<script>
    function myFunction() {
        // Declare variables 
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[4];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>    
<script>
    $(function () {

        $('#myTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
        $('#countrydatatables').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
        $('#countrydatatablesarc').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
        $('#countrydatatablessent').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });
</script>


<script>
    $("#userid").select2();
</script>   
<script>
    function validate()
    {

        if (document.newform.subject.value == "")
        {

            comment2 = "Subject can't be blank";
            document.getElementById('commentsubblank').innerHTML = comment2;
            document.newform.subject.focus();
            return false;
        }
        if (document.newform.msgContent.value == "")
        {

            comment22 = "Initial message can't be blank";
            document.getElementById('commentbodyblank').innerHTML = comment22;
            document.newform.msgContent.focus();
            return false;
        }
        v = $('#userid').val();
        alert(v);
        if (v == " " || v == 0 || v == 'null')
        {

            comment222 = "Send To can't be blank";
            document.getElementById('commentsenttoblank').innerHTML = comment222;
            return false;
        }

        return(true);
    }
	
	$(document).ready(function () {
        if (window.location.hash) {
            var type = window.location.hash.substr(1);
            if (type == 'sent') {
                $('.msgtab a[href="#' + type + '"]').tab('show');
            } else if (type == 'draft') {
                $('.msgtab a[href="#' + type + '"]').tab('show');
            } else if (type == 'archive') {
                $('.msgtab a[href="#' + type + '"]').tab('show');
            }
        } else {
            //alert('falseeeeee');  
        }
    });
</script>
