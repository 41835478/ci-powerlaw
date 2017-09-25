<style>
    .card-block {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
    .mt-2 {
        margin-top: 0.5rem !important;
    }
    .card-block {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }
    .help-inline-error{color:red; font-weight: bold}
</style>
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page container -->
            <div class="page-container">
                <!-- Page content -->
                <div class="page-content">
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-fixed">
                            <div class="sidebar-content">

                                <!-- Title -->
                                <div class="category-title h6" style="display:none;">
                                    <span>Components</span>
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-gear"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /title -->
                             <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE);?>

                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">
                        <div class="container-fluid">
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
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>

                                        My Profile


                                    </h3>
                                    <h6>Contact Information</h6>
                                    <p>
                                        This is where you update your contact information.

                                        It will be available to the attorneys in your firm (but nothing other
                                        than your name is visible to clients).
                                    </p>
                                </div>
                                <div class="col-md-6" style="background: #E0E0E0">
                                    <div id="info_page" style="margin: 20px;">
                                        <form method="post" action="<?php echo base_url() ?>updateuseracc/<?php echo $userinfo->id; ?>" id="useraccountform">
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Name : </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo $userinfo->fullname; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Address :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="Address1" id="Address1" value="<?php echo $userinfo->Address1; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Phone :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="Phone" id="Phone" value="<?php echo $userinfo->Phone; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Mobile :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="Mobile" id="Mobile" value="<?php echo $userinfo->Mobile; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Email  :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="text" name="email" id="email" value="<?php echo $userinfo->email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary edit-contact-info" id="accountupdatesubid">Edit Contact Information</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <!---------------------------CHANGE EMAIL--------------------------->


                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Change Email</h3>
                                    <p>This will change the email address that you use
                                        when logging in to MyCase, as well as the email address listed on your contact page..</p>
                                </div>
                                <div class="col-md-6" style="background: #E0E0E0">
                                    <div id="info_page" style="margin: 20px;">
                                        <form id="updateaccountemail" method="post" action="<?php echo base_url() ?>changeaccountemail/<?php echo $userinfo->id; ?>">
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Email : </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" value="<?php echo $userinfo->email; ?>" name="email" id="login_email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Current Password :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="password" name="password" id="login_old_password" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button id="updateemail" class="btn btn-primary" type="submit">Update Email</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>        
                            <br>
                            <hr>

                            <!---------------------------CHANGE PASSWORD--------------------------->


                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Change Password</h3>
                                </div>
                                <div class="col-md-6" style="background: #E0E0E0">
                                    <div id="info_page" style="margin: 20px;">
                                        <form id="passwordchangefrom" method="post" action="<?php echo base_url() ?>changeaccountpassword/<?php echo $userinfo->id; ?>">
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Current Password : </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="password" name="oldpassword" id="oldpassword">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>New Password :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="password" name="newpassword" id="newpassword">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4 col-form-label">
                                                    <label>Confirm Password :</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-control-static">
                                                        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" id="updatepassword" class="btn btn-primary">Update Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>        
                            <br>
                            <hr>

                            <!---------------------------CHANGE PASSWORD--------------------------->


                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Profile Picture</h3>
                                    <p>
                                        Your profile picture is displayed alongside any comments or messages you
                                        post in MyCase including the client portal.
                                    </p>
                                    <p>
                                        You're currently using the default picture.
                                    </p>
                                </div>
                                <div class="col-md-6" style="background: #E0E0E0">
                                    <div id="info_page" style="margin: 20px;">
                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>changeavater/<?php echo $userinfo->id; ?>">
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <p>
                                                        Upload a new image to MyCase:
                                                    </p>
                                                    <input type="file" name="filename" onchange="readURL(this)" id="filename" class="form-control-static"><br><br>
                                                    <button id="upload-picture" class="btn btn-primary">Upload Picture</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-6 text-center">
                                                        <?php if (isset($userinfo->Picture) && $userinfo->Picture != '') { ?>
                                                            <img class="w-100" style="border: 1px solid black; max-width: 217px;" id="blah" src="<?php echo base_url() ?>upload/user/<?php echo $userinfo->Picture; ?>" alt="Default avatar 256">
                                                        <?php } else { ?>
                                                            <img class="w-100" style="border: 1px solid black; max-width: 217px;" id="blah" src="<?php echo base_url() ?>upload/user/default_avatar.png" alt="Default avatar 256">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="adding_box" style="display: none;">
                                                <img style="vertical-align: middle;" class="retina" src="https://assets.mycase.com/assets/retina/ajax_arrows-a4ab2b6f20f4a4b63367e1819c2c072798f52ed372c3f56c3002332c3ff331ae.gif" alt="Ajax arrows" width="16" height="16"> Uploading Image
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>        
                            <br>

                        </div>
                    </div>
                    <!-- /main content -->
                </div>
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


<script type="text/javascript">
    jQuery().ready(function () {
        var v = jQuery("#useraccountform").validate({
            rules: {
                fullname: {
                    required: true
                },
                Address1: {
                    required: true,
                },
                Phone: {
                    required: true,
                },
                Mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            errorElement: "span",
            errorClass: "help-inline-error",
        });

        $("#accountupdatesubid").click(function () {
            if (v.form()) {
                $("#useraccountform").submit();
                return false;
            }
        });
    });

    jQuery().ready(function () {
        var v = jQuery("#updateaccountemail").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                }
            },
            errorElement: "span",
            errorClass: "help-inline-error",
            messages: {
                "confirmpassword": "Password Not Matched",
            }
        });

        $("#updateemail").click(function () {
            alert('fouzia');
            if (v.form()) {
                $("#updateaccountemail").submit();
                return false;
            }
        });
    });


    jQuery().ready(function () {
        var v = jQuery("#passwordchangefrom").validate({
            rules: {
                oldpassword: {
                    required: true
                },
                newpassword: {
                    required: true,
                },
                confirmpassword: {
                    required: true,
                    equalTo: "#newpassword"
                }
            },
            errorElement: "span",
            errorClass: "help-inline-error",
            messages: {
                "confirmpassword": "Password Not Matched",
            }
        });

        $("#updatepassword").click(function () {
            alert('fouzia');
            if (v.form()) {
                $("#passwordchangefrom").submit();
                return false;
            }
        });
    });
</script>  

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>