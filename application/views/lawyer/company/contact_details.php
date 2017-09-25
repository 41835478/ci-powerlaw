
<body>
    <style type="text/css">
        #image-preview {
            width: 500px;
            height: 500px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
        }
        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }
        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 400px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>

    <style>
        .btn-hover {
            font-weight: normal;
            color:#ffffff;
            cursor: pointer;
            background-color: inherit;
            border-color: transparent;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 20px;
        }

        .btn-hover-alt {
            font-weight: normal;
            color: #ffffff;
            cursor: pointer;
            background-color: inherit;
            border-color: transparent;
        }
        .box-header1
        {
            height:230px;
            width: 180px;
            border: 2px solid #D0D0D0;
            margin-top:15px;
            margin-bottom: 25px;
            margin-left: 30px;
            margin-right: 20px;


        }
        .noimg
        {
            height:150px;
            width: 150px;
            margin-top:15px;
            margin-bottom: 15px;
            margin-left: 15px;
            margin-right: 15px;


        }
        .box-body
        {
            margin-top:15px;
            margin-left: 15px;
        }
        .left_box
        {
            border: 1px solid #D0D0D0;
        }
        .info
        {
            padding-left: 15px;
        }
        .common
        {
            margin-bottom: 15px;
        }



    </style>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <div class="content-wrapper">
                <div class="panel panel-flat">
                    <div class="container-fluid">
                        <h1><?php
                            echo $contactInfo->FirstName . ' ' . $contactInfo->LastName;
                            if ($group) {
                                echo '(' . $group->GroupName . ')';
                            };
                            ?></h1>
                        <div class="row">
                            <div class="col-sm-12 col-md-3 left_box" >
                                <h4  class="btn btn-primary btn-block margin-bottom"><strong>Contact Details</strong></h4>

                                <div class="box box-solid">


                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
                                                    <span id="successedit" style="color: green;"></span>
                                                </div>
                                                <form  name="myForm" id="myFormid"  method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">

                                                            <div id="image-preview">
                                                                <label for="image-upload" id="image-label">Choose File</label>
                                                                <input type="file" name="userImage" id="image-upload" />

                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="upload()" id="iii" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>


                                    <div class="box-header1 with-border">
                                        <img id="imgid" class="noimg" src="<?php
                                        if ($contactInfo->Picture == '' || $contactInfo->Picture == 0 || $contactInfo->Picture == NULL) {
                                            echo base_url() . 'themes/ladmin/layouts/assets/images/noimage.jpg';
                                        } else {
                                            echo base_url() . 'upload/contact/' . $contactInfo->Picture;
                                        }
                                        ?>">  

                                        <a data-toggle="modal" data-target="#myModal" >
                                            <span class="label label-success label-icon">
                                                <i class="fa_icon icon-upload-alt " style="width:160px">Upload File</i>
                                            </span>
                                        </a>  
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><strong>Case Link</strong> <?php if ($allCase) { ?><a style="color:blue" href="/company/index?sort=CompanyName"><?php
                                                        foreach ($allCase as $aCase) {
                                                            echo $aCase->CaseName;
                                                        }
                                                        ?></a><?php } ?>
                                                </a></li>
                                            <li style="margin-top: 10px"><strong>Trust Account Balance</strong>
                                                <p style="margin-left: 15px;margin-top: 15px">$ <?php if (!empty($trustaccountinfo)) {
                                                        echo $trustaccountinfo->amount;
                                                    } ?></p>
                                            </li>
                                            <hr>

                                            <li style="margin-top: 10px">
                                                <strong>Originally Created: </strong>
                                                <p style="margin-top: 10px"><?php
                                                    if ($contactInfo->CreatedOn) {
                                                        $timestamp = strtotime($contactInfo->CreatedOn);
                                                        print date("jS F Y", $timestamp);
                                                    }
                                                    ?>
                                                    <?php
                                                    foreach ($createdBy as $acreatedBy) {
                                                        if ($contactInfo->UserId == $acreatedBy->id) {
                                                            if ($acreatedBy->fullname) {
                                                                echo 'by' . ' ' . $acreatedBy->fullname;
                                                                if ($group) {
                                                                    echo '(' . $group->GroupName . ')';
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>

                                                </p>
                                            </li>
                                            <hr>
                                            <li><a href="<?php echo base_url() ?>contactarchive/<?php echo $contactInfo->ContactId; ?>" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Archive Contact </strong></a></li>
                                            <li><a href="<?php echo base_url() ?>contactdel/<?php echo $contactInfo->ContactId; ?>" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Delete Contact </strong></a>
                                            </li>
                                            <input type="text" name="idcontact" id="contactid" value="<?php echo $contactInfo->ContactId; ?>">
                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /. box -->
                                <div class="box box-solid">
                                    <div class="box-header with-border">



                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9 right_box">
                                <div style="background-color: #3399ff">
                                    <a href="<?php echo base_url() . 'company/contactDetails/' . base64_encode($contactInfo->ContactId); ?>" class="btn btn-md btn-hover btn-default ">Contact Info</a>
                                    <a href="<?php echo base_url() . 'company/contactcaseLink/' . $contactInfo->ContactId; ?>" class="btn btn-md btn-hover btn-primary ">Case Link</a> 
                                    <!--                                    <a href="#" class="btn btn-md btn-hover btn-primary ">Contact Activity</a> 
                                                                        <a href="#" class="btn btn-md btn-hover btn-prinmary ">Notes</a>
                                                                        <a href="#" class="btn btn-md btn-hover btn-primary ">Billing</a>
                                                                        <a href="#" class="btn btn-md btn-hover btn-primary ">Messages</a>-->
                                </div>
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Contact Information</h3>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                            <li style="margin-bottom: 10px"><i class="fa fa-envelope-o "></i> <strong style="margin-right: 20px">Name:</strong><?php echo $contactInfo->FirstName . ' ' . $contactInfo->LastName; ?></li>

                                            <li style="margin-bottom: 10px"><i class="fa fa-file-text-o "></i> <strong style="margin-right: 20px">Company:</strong><?php
                                                if ($company) {
                                                    echo $company->CompanyName;
                                                } else {
                                                    
                                                }
                                                ?></li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Job Title:</strong><?php
                                                if ($contactInfo->JobTitle) {
                                                    echo $contactInfo->JobTitle;
                                                }
                                                ?> </li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Group:</strong><?php
                                                if ($group) {
                                                    echo $group->GroupName;
                                                }
                                                ?> </li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Email Address:</strong><?php
                                                if ($contactInfo->Email) {
                                                    echo $contactInfo->Email;
                                                }
                                                ?> </li>

                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <hr>
                                <!-- /. box -->
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Phone Number</h3>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li style="margin-bottom: 10px"><i class="fa fa-file-text-o "></i> <strong style="margin-right: 20px">Mobile:</strong><?php
                                                if ($contactInfo->Mobile) {
                                                    echo '(' . $contactInfo->CCodeM . ')' . $contactInfo->Mobile;
                                                }
                                                ?></li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Phone:</strong><?php
                                                if ($contactInfo->Phone) {
                                                    echo '(' . $contactInfo->CCodeP . ')' . $contactInfo->Phone;
                                                }
                                                ?> </li>

                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <hr>
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Other Information</h3>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                            <li style="margin-bottom: 10px"><i class="fa fa-envelope-o "></i> <strong style="margin-right: 20px">Birthday:</strong><?php
                                                if ($contactInfo->DateOfBirth !='') {
                                                    $timestamp = strtotime($contactInfo->DateOfBirth);
                                                    print date("jS F Y", $timestamp);
                                                }
                                                ?></li>

                                            <li style="margin-bottom: 10px"><i class="fa fa-file-text-o "></i> <strong style="margin-right: 20px">License:</strong><?php
                                                if ($contactInfo->LicenceNumber) {
                                                    echo $contactInfo->LicenceNumber;
                                                }
                                                ?></li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Website:</strong><?php
                                                if ($contactInfo->Website) {
                                                    echo $contactInfo->Website;
                                                }
                                                ?> </li>


                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <hr>
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Welcome Message</h3>
                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                            <li style="margin-bottom: 10px"><i class="fa fa-envelope-o "></i><?php
                                                if ($contactInfo->WelcomeMessage) {
                                                    echo $contactInfo->WelcomeMessage;
                                                }
                                                ?></li>
                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Private Notes</h3>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                            <li style="margin-bottom: 10px"><i class="fa fa-envelope-o "></i><?php
                                                if ($contactInfo->PrivateNote) {
                                                    echo $contactInfo->PrivateNote;
                                                }
                                                ?></li>




                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer text-muted">
            &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
        </div>
    </div>
</div>


<style>
    .entry:not(:first-of-type)
    {
        margin-top: 10px;
    }

    .glyphicon
    {
        font-size: 12px;
    }


</style>

<script type="text/javascript">
    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "Choose File",
            label_selected: "Change File",
            no_label: false
        });
    });
</script>
<script>
    function upload() {

        var image = $('#image-upload').val();
        if (image == '') {
            sweetAlert("Oops...", "No Image Found!", "error");

        } else {
            var data = new FormData($("#myFormid")[0]);
            var id = $("#contactid").val();



            var baseurl = "<?php echo base_url(); ?>";
            $.ajax({
                type: "POST",
                url: baseurl + "Contact/AddcontactImage/" + id,
                data: data,
                processData: false,
                contentType: false,
                success: function (r) {
                    $("#imgid").attr("src", '');
                    $("#imgid").attr("src", r);
                    $('#successedit').html("<p> Image successfully uploaded!</p>");
                    location.reload();

                }
            });
















        }

    }

</script>