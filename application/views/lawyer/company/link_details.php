<body>
    <style>
        .box-body
        {
            margin-top:15px;
            margin-left: 15px;
        }

        .info
        {
            padding-left: 15px;
        }
        .common
        {
            margin-bottom: 15px;
        }
        .form-control {width:300px;}
        .popover {max-width:400px;}


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

        .left_box
        {
            border: 1px solid #D0D0D0;
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
                                    <?php //echo '<pre>'; print_r($contactInfo); ?>
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
											<?php //print_r($allCase); exit; ?>
                                            <li><strong>Case Link</strong> <?php if (!empty($allCase)) { ?><a style="color:blue" href="/company/index?sort=CompanyName"><?php
                                                     if(!empty($allCase))  { foreach ($allCase as $aCase) {  
                                                            echo $aCase['CaseName']; 
                                                        } }
                                                        ?></a><?php } ?>
                                                </li>
                                            <li style="margin-top: 10px"><strong>Trust Account Balance</strong>
                                                <p style="margin-left: 15px;margin-top: 15px">$ <?php
                                                    if (!empty($trustaccountinfo)) {
                                                        echo $trustaccountinfo->amount;
                                                    }
                                                    ?></p>
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
                                            <li><a href="<?php echo base_url() . 'contact/delete/' ?>" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Delete Contact </strong></a>
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


                                            <table id="all-contact-table" class="table table-striped table-bordered" style= "margin-right: 10px; width: 700px">
                                                <thead>
                                                    <tr>
                                                        <th >Case Name</th>
                                                        <th>Status</th>
                                                        <th>Case Rate</th>
                                                        <th>Remove Case Link</th>

                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php if (isset($allCase) && (!empty($allCase))) { ?>
                                                        <?php foreach ($allCase as $aCase) { ?>
                                                            <tr>

                                                                <td ><input type="hidden" name="caseid" id="caseid" value="<?php echo $aCase['CaseId'] ?>"><?php
                                                                    if ($aCase['CaseName']) {
                                                                        echo $aCase['CaseName'];
                                                                    };
                                                                    ?></td>
                                                                <td><?php if ($aCase['caseStatus'] == 1) { ?><p style="color:<?php
                                                                        if ($aCase['caseStatus'] == 1) {
                                                                            echo"green";
                                                                        }
                                                                        ?>"><?php
                                                                                                                      echo "Active Case";
                                                                                                                  } else {
                                                                                                                      echo "Inactive Case";
                                                                                                                  }
                                                                                                                  ?></p></td>
                                                                <td><?php if ($aCase['BillingRate']) { ?><a data-placement="bottom" data-toggle="popover" data-title="Case Rate" data-container="body" type="button" onclick="myFunction(<?php echo $aCase['CaseId'] ?>)" data-html="true" id="login"><?php
                                                                            echo $aCase['BillingRate'] . '/hr';
                                                                        } else {
                                                                            echo 'Not set';
                                                                        }
                                                                        ?></a></td>
                                                                <td><a href="<?php echo base_url() . 'company/' . $contactInfo->ContactId . '/removecaseLink/' . $aCase['CaseId']; ?>">Remove Case Link</a></td>

                                                            </tr> 

                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <tr><td colspan="5"><div class="empty">No results found.</div></td></tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                    </div>

                                </div>

                                <hr>
                                <!-- /. box -->
                                <div id="popover-content" class="hide">
                                    <form class="form-inline" role="form" method="post" action="<?php echo base_url() . 'company/updateRate' ?>">
                                        <div class="form-group">

                                            <input type="text" placeholder="Case Rate" class="form-control" maxlength="5" name="caserate">
                                            <input type="hidden" name="popid" id="popid" value="">
                                            <input type="hidden" name="userid" id="userid" value="<?php echo $contactInfo->ContactId; ?>">
                                            <button type="submit" class="btn btn-primary">Update »</button>        

                                        </div>
                                    </form>
                                </div>



                            </div>
                            <div class="container">


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
<script>
    $("[data-toggle=popover]").popover({
        html: true,
        content: function () {
            return $('#popover-content').html();

        }
    });
</script>
<script>
    function myFunction(v) {
        //alert(v);
        $("#popid").attr("value", v);
    }
</script>


<script type="text/javascript">

    $('#login').click(function () {
        v = $("#caseid").val();

    });


</script>




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

                }
            });



        }

    }

</script>