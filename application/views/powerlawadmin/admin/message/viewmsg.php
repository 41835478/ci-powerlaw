<style>
    div.message_details_header {

    }
</style>
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
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
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h3 class="active"><strong><a href="<?php echo base_url() ?>inboxmsg">Inbox</a></strong></h3>
                                            <hr>
                                            <h3><strong><a href="<?php echo base_url() ?>inboxmsg">Sent</a></strong></h3>
                                            <hr>
                                            <h3><strong><a href="<?php echo base_url() ?>inboxmsg">Draft</a></strong></h3>
                                            <hr>
                                            <h3><strong><a href="<?php echo base_url() ?>inboxmsg">Archive</a></strong></h3>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row" style="background-color: #f6fbff;min-height: 70px;padding: 15px;">
                                <div>
                                    <h2 class="details_header" style="margin-bottom: 0px; padding-bottom: 10px; font-weight: normal;"><img src="https://assets.mycase.com/assets/message_larger-758911e678f867051b5874e50dfd32720af144ef2d5faf437f9133fa4f6972b9.png" alt="Message larger">Hello</h2>
                                    A Private Message Sent To:
                                    <span class="message_user_name">
                                        <a href="https://rsuser.mycase.com/contacts/attorneys/7193473">
                                            <?php    
                                            $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($messageview->MessageTo);
                                            echo $usereditinfo->fullname;
                                            ?>
                                        </a>
                                    </span>
                                    <br>
                                    <div class="clearfix">
                                        <div style="float: left; margin-top: 3px;">
                                            Case Link:
                                        </div>
                                        <div id="case_link_text" style="float: left; margin-left: 5px; margin-top: 3px;">
                                            <a href="<?php echo base_url()?>viewcaseadmin/<?php echo $messageview->CaseId; ?>"><?php echo $messageview->CaseName; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php foreach($allmessageview as $allmsg){ ?>
                            <div class="row" style="background-color: #f6fbff;min-height: 70px;padding: 15px;">
                                <div class="col-md-1">
                                    <div style="border: 1px solid #222222;border-radius: 0px;width: 56px;height: 56px;padding: 0px;display: inline-block;overflow: hidden;box-shadow: 0px 0px 4px #222222;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56"></div>
                                </div>
                                <div class="col-md-11">
                                    <div class="comment_wrapper" style="border: 1px solid #ccd3d9; position: relative; border-radius: 3px;padding: 8px;background: #fff;">
                                        <div class="comment_header clearfix">
                                            <div style="font-weight: bold; float: left;">
                                                <a href="https://rsuser.mycase.com/contacts/attorneys/7191698">
                                                    <?php
                                                        $usereditinfo = $this->ManageuserSystemModel->getuserinfobyid($allmsg['MessageFrom']);
                                                        echo $usereditinfo->fullname;
                                                         ?>
                                                </a>
                                            </div>

                                            <div style="float: right;">
                                               <?php  echo date('d F, Y', strtotime($allmsg['SentOn']));?>
                                            </div>
                                        </div>

                                        <div class="comment_body wrap-long-words">
                                            <p><?php  echo $allmsg['Content'];?></p>

                                        </div>

                                        <b class="border_notch notch"></b>
                                        <b class="notch"></b>
                                    </div>
                                </div>

                            </div>
                            
                            <hr>
                            <?php } ?>
                            <div class="row" style="background-color: #f6fbff;min-height: 70px;padding: 15px;">
                                <div class="col-md-1">
                                    <div style="border: 1px solid #222222;border-radius: 0px;width: 56px;height: 56px;padding: 0px;display: inline-block;overflow: hidden;box-shadow: 0px 0px 4px #222222;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56"></div>
                                </div>
                                <div class="col-md-11">
                                    <form id="comment_form" action="<?php echo base_url()?>addgroupbymsg/<?php echo $messageview->MessageId; ?>" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="put">
                                        <input type="hidden" name="CaseId" id="new_message_user_id" value="<?php echo $messageview->CaseId; ?>">
                                        <input type="hidden" name="FirmId" id="new_message_user_id" value="<?php echo $messageview->FirmId; ?>">
                                        <input type="hidden" name="Subject" id="new_message_user_id" value="<?php echo $messageview->Subject; ?>">
                                        <input type="hidden" name="MessageTo" id="new_message_user_id" value="<?php echo $messageview->MessageTo; ?>">
                                        <textarea class="form-control FETextInput user-text" id="rsmsgtext" name="Content" placeholder="Type your comment here..."></textarea>
                                        <button type="submit" class="btn btn-default" style="float: right; margin-top: 10px; background: #EEEEEE; border: 1px solid #ddd;"><a id="comment_submit" href="#" class="gray_button">
                                        <span><img src="https://assets.mycase.com/assets/commenting-6612312aea43905365e8356910e3241437dbb3fd60898746105100578dc39d24.png" alt="Commenting">Post Reply</span>
                                    </a></button>
                                    </form>
                                </div>

                            </div>




                        </div>
                    </div>
                </div>	  <!-- /PANEL BODY -->
            </div>	  <!-- /PANEL FLAT -->		
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
        $('#firmdatatables').DataTable({
            "autoWidth": false,
            "columns": [
                {"width": "10px", "targets": 0},
                {"width": "40px", "targets": 1},
                {"width": "100px", "targets": 2},
                {"width": "70px", "targets": 3},
                {"width": "30px", "targets": 4},
                {"width": "30px", "targets": 5},
                {"width": "70px", "targets": 6},
                {"width": "70px", "targets": 7},
                {"width": "70px", "targets": 8},
                {"width": "70px", "targets": 9}
            ],
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
<script type="text/javascript">
    tinymce.init({
        selector: '#rsmsgtext',
        height: 100,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });
</script> 