<style> 

    .btn3d {
        position:relative;
        top: -6px;
        border:0;
        transition: all 40ms linear;
        margin-top:10px;
        margin-bottom:10px;
        margin-left:2px;
        margin-right:2px;
    }
    .btn3d:active:focus,
    .btn3d:focus:hover,
    .btn3d:focus {
        -moz-outline-style:none;
        outline:medium none;
    }
    .btn3d:active, .btn3d.active {
        top:2px;
    }
    .btn3d.btn-white {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #f5f5f5, 0 8px 8px 1px rgba(0,0,0,.2);
        background-color:#fff;
    }
    .btn3d.btn-white:active, .btn3d.btn-white.active {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
        background-color:#fff;
    }
    .btn3d.btn-default {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #BEBEBE, 0 8px 8px 1px rgba(0,0,0,.2);
        background-color:#f9f9f9;
    }
    .btn3d.btn-default:active, .btn3d.btn-default.active {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
        background-color:#f9f9f9;
    }
    .btn3d.btn-primary {
        box-shadow:0 0 0 1px #417fbd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4D5BBE, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#4274D7;
    }
    .btn3d.btn-primary:active, .btn3d.btn-primary.active {
        box-shadow:0 0 0 1px #417fbd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color:#4274D7;
    }
    .btn3d.btn-success {
        box-shadow:0 0 0 1px #31c300 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #5eb924, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#78d739;
    }
    .btn3d.btn-success:active, .btn3d.btn-success.active {
        box-shadow:0 0 0 1px #30cd00 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #78d739;
    }
    .btn3d.btn-info {
        box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #348FD2, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#39B3D7;
    }
    .btn3d.btn-info:active, .btn3d.btn-info.active {
        box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #39B3D7;
    }
    .btn3d.btn-warning {
        box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #D79A34, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#FEAF20;
    }
    .btn3d.btn-warning:active, .btn3d.btn-warning.active {
        box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #FEAF20;
    }
    .btn3d.btn-danger {
        box-shadow:0 0 0 1px #b93802 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #AA0000, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#D73814;
    }
    .btn3d.btn-danger:active, .btn3d.btn-danger.active {
        box-shadow:0 0 0 1px #b93802 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #D73814;
    }
    .btn3d.btn-magick {
        color: #fff;
        box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #9823d5, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#bb39d7;
    }
    .btn3d.btn-magick:active, .btn3d.btn-magick.active {
        box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #bb39d7;
    }

</style>
<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>company">Company</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>company/companyDetails/<?php $this->uri->segment('2'); ?>">Company Details</a></li>
        </ol>
    </div>
</div>
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <div class="content-wrapper">
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
            <div class="panel panel-flat">
                <div class="container-fluid">
                    <h1><img src="<?php echo base_url() ?>assets/image/small/default_company.png" style="border: 1px solid #000;"> <?php echo $company->CompanyName; ?></h1>
                    <div class="row">
                        <div class="col-sm-12 col-md-3 left_box" style="margin-top: -6px;">
                            <h4  class="btn btn-primary btn-block margin-bottom"><strong>Company Details</strong></h4>

                            <div class="box box-solid">
                                <div class="box-header1 with-border" style="margin-top: 10px; margin-left: 17px;">
                                    <img id="imgid" class="noimg" src="<?php echo base_url() ?>assets/image/default_company.png" style="border:5px solid #ddd">  
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li style="margin-top: 20px; margin-left:10px"><span style="font-size: 20px;font-weight: bold;color: #526699;">Contacts</span>
                                            <?php foreach ($contactinfo as $contact) { ?>
                                                <p><a href="<?php echo base_url() ?>company/contactDetails/<?php echo base64_encode($contact['ContactId']); ?>"><?php echo $contact['FirstName']; ?> <?php echo $contact['LastName']; ?></a></p>
                                            <?php } ?>
                                        </li>
                                        <hr>
                                        <li style="margin-top: 20px; margin-left:10px"><span style="font-size: 20px;font-weight: bold;color: #526699;">Case Link</span>
                                            <?php foreach ($caseinfo as $case) { ?>
                                                <p><a href="<?php echo base_url() ?>cases/viewCase/<?php echo base64_encode($case['CaseId']); ?>"><?php echo $case['CaseName']; ?> </a></p>
                                            <?php } ?>
                                        </li>
                                        <hr>
                                        <li style="margin-top: 20px; margin-left:10px"><span style="font-size: 20px;font-weight: bold;color: #526699;">Trust Account Balance</span>
                                            <p style="margin-left: 15px;margin-top: 15px">$ <?php  if(isset($turstaccountinfo->amount) && $turstaccountinfo->amount !='') {  echo $turstaccountinfo->amount; } ?></p>
                                        </li>
                                        <hr>
                                        <li style="margin-top: 20px; margin-left:10px"><span style="font-size: 20px;font-weight: bold;color: #526699;">Minimum Trust Balance</span><br>
                                            <input type="text" value="$ <?php if(isset($turstaccountinfo->amount) && $turstaccountinfo->amount !='') { echo $turstaccountinfo->amount; }  ?>" name="">
                                        </li> 

                                        <hr>
                                        <li>
                                            <p>Originally Created:
                                                May 31, 2017 by Sumaya Yesmin (Attorney)
                                                Company ID: 7318988</p>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>companyarchive/<?php echo $this->uri->segment('3'); ?>" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Archive Company </strong></a></li>
                                        <li><a href="<?php echo base_url() ?>company/delete/<?php echo base64_encode($this->uri->segment('3')); ?>" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Delete Company </strong></a>
                                        </li>
                                        <input type="text" name="idcontact" id="contactid" value="<?php //echo $contactInfo->ContactId;                                          ?>">
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
                            <div style="background-color: #3399ff;height: 50px;margin-top: 3px; padding-top: 7px; padding-left: 10px;">
                                <a data-toggle="tab" href="#tab1" class="btn btn-md btn-hover btn-default active" style="margin-right: 4px; border-radius: 5px;">Company Info</a>
                                <a data-toggle="tab" href="#tab2" class="btn btn-md btn-hover btn-default" style="margin-right: 4px; border-radius: 5px;">Contacts</a>
                                <a data-toggle="tab" href="#tab3" class="btn btn-md btn-hover btn-default" style="margin-right: 4px; border-radius: 5px;">Case Link</a> 
                                <a data-toggle="tab" href="#tab4" class="btn btn-md btn-hover btn-default" style="margin-right: 4px; border-radius: 5px;">Notes</a>
                                <a data-toggle="tab" href="#tab5" class="btn btn-md btn-hover btn-default" style="margin-right: 4px; border-radius: 5px;">Billing</a>
                                <a data-toggle="tab" href="#tab6" class="btn btn-md btn-hover btn-default" style="margin-right: 4px; border-radius: 5px;">Email</a>
                            </div>
                            <div class="box box-solid info">
                                <div class="tab-content">
                                    <div id="tab1" class="tab-pane fade in active">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Contact Information</h3>
                                        </div>
                                        <div class="box-body no-padding">
                                            <ul class="nav nav-pills nav-stacked">
                                                <li style="margin-bottom: 10px"><i class="fa fa-envelope-o "></i> <strong style="margin-right: 20px">Name:</strong><?php
                                                    if (isset($company->CompanyName) && $company->CompanyName != '') {
                                                        echo $company->CompanyName;
                                                    }
                                                    ?></li>
                                                <li style="margin-bottom: 10px"><i class="fa fa-file-text-o "></i> <strong style="margin-right: 20px">Email:</strong><?php
                                                    if (isset($company->CompanyEmail) && $company->CompanyEmail != '') {
                                                        echo $company->CompanyEmail;
                                                    }
                                                    ?></li>
                                                <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Website:</strong><?php
                                                    if (isset($company->website) && $company->website != '') {
                                                        echo $company->website;
                                                    }
                                                    ?></li>
                                                <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Address:</strong><?php
                                                    if (isset($company->address) && $company->address != '') {
                                                        echo $company->address;
                                                    }
                                                    ?></li>
                                                <?php
                                                if (isset($company->country) && $company->country != '') {
                                                    $countryinfo = $this->CompanyModel->getcountrynamebyid($company->country);
                                                    if (!empty($countryinfo)) {
                                                        $country = $countryinfo->CountryName;
                                                    }
                                                }
                                                ?>
                                                <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Country:</strong><?php
                                                    if (isset($company->country) && $company->country != '') {
                                                        if (!empty($countryinfo)) {
                                                            echo $country;
                                                        }
                                                    }
                                                    ?></li>

                                            </ul>
                                        </div>
                                        <!-- /.box-body -->
                                        <!--                                    </div>-->
                                        <hr>
                                        <!-- /. box -->
                                        <div class="box box-solid info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Phone Number</h3>


                                            </div>
                                            <div class="box-body no-padding">
                                                <ul class="nav nav-pills nav-stacked">


                                                    <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Mobile:</strong><?php
                                                        if (isset($company->mobile) && $company->mobile != '') {
                                                            echo $company->mobile;
                                                        }
                                                        ?></li>
                                                    <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Phone:</strong><?php
                                                        if (isset($company->phone) && $company->phone != '') {
                                                            echo $company->phone;
                                                        }
                                                        ?></li>

                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <hr>
                                        <div class="box box-solid info">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Private Notes</h3>
                                            </div>
                                            <div class="box-body no-padding">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Mobile:</strong><?php
                                                        if (isset($company->note) && $company->note != '') {
                                                            echo $company->note;
                                                        }
                                                        ?></li>
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                    <!-------------END TAB 1------------>
                                    <!-------------START TAB 2---------->
                                    <div id="tab2" class="tab-pane fade in">
                                        <div class="box-header with-border">
                                            <span><h3 class="box-title">Contacts</h3></span>
                                            <span><a href="<?php echo base_url() ?>contact/addContact"><button type="button" class="btn3d btn btn-default btn-lg" style="float: right; border: 1px solid #ddd; color: #006699; font-size: 12px;"><span class="glyphicon glyphicon-plus"></span>Add Contact</button></a></span>
                                        </div>
                                        <div class="box-body no-padding">
                                            <table class="table table-bordered companydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Case Link</th>
                                                        <th class="action-column">Action</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($contactinfo as $con) { ?>
                                                        <tr>
                                                            <?php if ($con['Picture'] != '') { ?>
                                                                <td><img style="width: 64px; height: 64px;" src="<?php echo base_url() ?>upload/contact/<?php echo $con['Picture']; ?>"></td>
                                                            <?php } else { ?>
                                                                <td><img src="<?php echo base_url() ?>upload/contact/default_user.png"></td>
                                                            <?php } ?>
                                                            <td><?php echo $con['FirstName'] ?> <?php echo $con['LastName'] ?></td>
                                                            <td><?php echo $con['Email'] ?></td>
                                                            <?php
                                                            $caseinfo = $this->CompanyModel->getcaseinfobycaseid($con['ContactId']);
                                                            //print_r($caseinfo); 
                                                            if (!empty($caseinfo)) {
                                                                foreach ($caseinfo as $cinfo) {
                                                                    ?>

                                                                    <td><a href="<?php echo base_url() ?>cases/viewCase/<?php echo base64_encode($cinfo['CaseId']); ?>"><?php echo $cinfo['CaseName']; ?></a></td>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <td></td>
                                                            <?php } ?>
                                                            <td><a class="alertForDelete" href="<?php echo base_url() ?>archivecase/<?php echo $con['ContactId']; ?>" title="Close Case" aria-label="Close Case" data-confirm="Are you sure you want to Close this Case?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-------------END TAB 2---------->

                                    <!-------------START TAB 3---------->
                                    <div id="tab3" class="tab-pane fade in">
                                        <div class="box-header with-border">
                                            <span><h3 class="box-title">Case Link</h3></span>
                                            <span><button type="button" class="btn3d btn btn-default btn-lg" style="float: right; border: 1px solid #ddd; color: #006699; font-size: 12px;" data-toggle="modal" data-target="#caselinkModal"><span class="glyphicon glyphicon-plus"></span>Add Case Link</button></span>
                                        </div>
                                        <div class="box-body no-padding">
                                            <table class="table table-bordered companydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Case Name</th>
                                                        <th>Status</th>
                                                        <th>Remove Case Link</th>
                                                        <th class="action-column">Action</th></tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $caseinfo = $this->CompanyModel->selectcasebyid($this->uri->segment('3'));
                                                    //print_r($caseinfo); exit;
                                                    foreach ($caseinfo as $clink) {
                                                        ?>
                                                        <tr>
                                                            <td><img src="<?php echo base_url() ?>upload/contact/default_user.png"></td>
                                                            <td><?php echo $clink['CaseName'] ?></td>
                                                            <td><?php
                                                                if ($clink['caseStatus'] == '1') {
                                                                    echo 'Active';
                                                                } else {
                                                                    echo 'In Active';
                                                                }
                                                                ?></td>
                                                            <?php
                                                            //print_r($con); exit;
                                                            $caseinfo = $this->CompanyModel->getcaseinfobycaseid($con['ContactId']);
                                                            if (!empty($caseinfo)) {
                                                                foreach ($caseinfo as $cinfo) {
                                                                    ?>

                                                                    <td><a href="<?php echo base_url() ?>cases/viewCase/<?php echo base64_encode($cinfo['CaseId']); ?>"><?php echo $cinfo['CaseName']; ?></a></td>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <td><a onclick="removecasecompanylink('<?php echo $cinfo['CaseId']; ?>')">Remove Case Link</a></td>
                                                            <?php } ?>
                                                            <td><a class="alertForDelete" href="<?php echo base_url() ?>archivecase/<?php echo $con['ContactId']; ?>" title="Close Case" aria-label="Close Case" data-confirm="Are you sure you want to Close this Case?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-------------END TAB 3---------->

                                    <!-------------START TAB 4---------->
                                    <div id="tab4" class="tab-pane fade in">
                                        <div class="box-header with-border">
                                            <span><h3 class="box-title">Notes</h3></span>
                                            <button type="button" class="btn3d btn btn-default btn-lg" style="float: right; border: 1px solid #ddd; color: #006699; font-size: 17px;" data-toggle="modal" data-target="#notemodal"><span class="glyphicon glyphicon-check">Add Note</span></button>
<!--                                            <span><button class="btn btn-default" style='float: right; margin-bottom: 20px; margin-top: -47px; background: #F8F7F3; border: 1px solid #3399FF' data-toggle="modal" data-target="#notemodal"><span class="glyphicon glyphicon-check"> Add Note</span></button></span>-->
                                        </div>
                                        <div class="box-body no-padding">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <?php foreach ($noteinfo as $note) { ?>
                                                        <div class="notediv">
                                                            <div class="panel-body">
                                                                <p><?php echo $note['NoteSubject']; ?></p>
                                                                <p style="float: right"><?php echo $note['DueDate']; ?></p>
                                                                <p><?php echo $note['NoteContent']; ?></p>
                                                                <a data-toggle="collapse" href="#collapse_<?php echo $note['NoteId'] ?>"><img src="<?php echo base_url() ?>assets/image/arrow_down.png">Read More</a>
                                                                <div id="collapse_<?php echo $note['NoteId'] ?>" class="panel-collapse collapse">
                                                                    <hr>
                                                                    <?php
                                                                    $notecreatedinfo = $this->CompanyModel->getnotecreatedby($note['UserId']);
                                                                    $username = $notecreatedinfo->fullname;
                                                                    if ($notecreatedinfo->status == '1') {
                                                                        $designation = 'Attorney';
                                                                    } else if ($notecreatedinfo->status == '2') {
                                                                        $designation = 'Paralegal';
                                                                    } else if ($notecreatedinfo->status == '3') {
                                                                        $designation = 'Staff';
                                                                    } else {
                                                                        $designation = 'Client';
                                                                    }
                                                                    ?>
                                                                    <p>Note Added: <span><?php echo $note['DueDate']; ?></span>, by <span><?php echo $username; ?> (<?php
                                                                            if (isset($designation) && $designation != '') {
                                                                                echo $designation;
                                                                            }
                                                                            ?>)</span> </p>
                                                                    <hr>
                                                                    <span><a data-toggle="collapse" href="#collapse_<?php echo $note['NoteId'] ?>"><img src="<?php echo base_url() ?>assets/image/arrow_up.png">Hide Details</a></span>
                                                                    <span><a onclick="openeditnotemodal('<?php echo $note['NoteId']; ?>')"><span class="glyphicon glyphicon-pencil"></span> Edit Note</a></span>
                                                                    <span><a href='<?php echo base_url() ?>deletenote/<?php echo $note['NoteId'] ?>/<?php echo $this->uri->segment('3'); ?>' class="confirmation"><span class="glyphicon glyphicon-trash"></span> Delete Note</a></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-------------END TAB 4---------->

                                    <!-------------START TAB 5---------->
                                    <div id="tab5" class="tab-pane fade in">
                                        <br>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">Invoices</a></li>
                                            <li><a data-toggle="tab" href="#menu1">Trust Activity</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <span><h3 class="box-title">Invoice</h3></span>
                                                <span><a href="<?php echo base_url() ?>billing/newInvoices">  <button type="button" class="btn3d btn btn-default btn-lg" style="float: right; border: 1px solid #ddd; color: #006699; font-size: 12px;"><span class="glyphicon glyphicon-plus"></span> Add Invoice</button></a></span>
                                                <div class="box-body no-padding">
                                                    <table class="table table-bordered companydatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                        <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Total</th>
                                                                <th>Paid</th>
                                                                <th>Amount Due</th>
                                                                <th>Due Date</th>
                                                                <th>Created Date</th>
                                                                <th>Status</th>
                                                                <th>Sharing</th>
                                                                <th class="action-column">Action</th></tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($invoiceinfo as $invoice) { //echo '<pre>'; print_r($invoice); exit;
                                                                ?>
                                                                <tr>
                                                                    <td><img src="<?php echo base_url() ?>upload/contact/default_user.png"></td>
                                                                    <td><?php echo $invoice['TotalAmount'] ?></td>
                                                                    <td><?php echo $invoice['CaseName'] ?></td>
                                                                    <td><?php echo $invoice['CaseName'] ?></td>
                                                                    <td><?php echo $invoice['CaseName'] ?></td>
                                                                    <td><?php echo $invoice['CreatedOn'] ?></td>
                                                                    <td><?php echo $invoice['InvoiceStatus'] ?></td>
                                                                    <td><?php echo $invoice['CaseName'] ?></td>
                                                                    <td><a class="alertForDelete" href="<?php echo base_url() ?>archivecase/<?php echo $con['ContactId']; ?>" title="Close Case" aria-label="Close Case" data-confirm="Are you sure you want to Close this Case?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                <span><h3 class="box-title">Trust History</h3></span>
                                                <span> <button type="button" class="btn3d btn btn-default btn-lg" style="float: right; border: 1px solid #ddd; color: #006699; font-size: 12px;" data-toggle="modal" data-target="#deposittrust"><span class="glyphicon glyphicon-plus"></span> Deposit Into Trust</button></span>
                                                <span>  <button type="button" class="btn3d btn btn-default btn-lg" style="float: right; border: 1px solid #ddd; color: #006699; font-size: 12px;" data-toggle="modal" data-target="#withdrawtrust"><span class="glyphicon glyphicon-plus"></span> WIthdraw From Trust</button></span>
                                                <table class="table table-bordered companydatatables"  style="border: 1px solid #ddd;  word-wrap:break-word;">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Total</th>
                                                            <th>Paid</th>
                                                            <th>Amount Due</th>
                                                            <th>Due Date</th>
                                                            <th>Created Date</th>
                                                            <th>Status</th>
                                                            <th>Sharing</th>
                                                            <th class="action-column">Action</th></tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($invoiceinfo as $invoice) { //echo '<pre>'; print_r($invoice); exit;
                                                            ?>
                                                            <tr>
                                                                <td><img src="<?php echo base_url() ?>upload/contact/default_user.png"></td>
                                                                <td><?php echo $invoice['TotalAmount'] ?></td>
                                                                <td><?php echo $invoice['CaseName'] ?></td>
                                                                <td><?php echo $invoice['CaseName'] ?></td>
                                                                <td><?php echo $invoice['CaseName'] ?></td>
                                                                <td><?php echo $invoice['CreatedOn'] ?></td>
                                                                <td><?php echo $invoice['InvoiceStatus'] ?></td>
                                                                <td><?php echo $invoice['CaseName'] ?></td>
                                                                <td><a class="alertForDelete" href="<?php echo base_url() ?>archivecase/<?php echo $con['ContactId']; ?>" title="Close Case" aria-label="Close Case" data-confirm="Are you sure you want to Close this Case?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-------------END TAB 5---------->

                                    <!-------------START TAB 6---------->
                                    <div id="tab6" class="tab-pane fade in">
                                        FFFFFFFFF 6
                                    </div>

                                    <!-------------END TAB 6---------->
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

<!--------------------------REMOVE CASE LINK MODAL------------------------>
<div class="modal fade" id="removelinkModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <form method="post" action="<?php echo base_url() ?>removecaselink">
            <input type="hidden" name="caseid" value="" id="caseid">
            <input type="hidden" name="companyid" value="" id="companyid">
            <div class="modal-content">
                <div class="modal-header" style="background: #72A9D3; color:#fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Remove Contact</h4>
                </div>
                <div class="modal-body">
                    <p>By performing this action, this case will no longer have any linked firm users.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" style="border: 1px solid #72A9D3;">Remove Contact</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="border: 1px solid #72A9D3;">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--------------------------REMOVE CASE LINK MODAL------------------------>

<!--------------------------CASE LINK MODAL------------------------>
<div class="modal fade" id="caselinkModal" role="dialog">
    <div class="modal-dialog modal-md">
        <form method="post" action="<?php echo base_url() ?>removecaselink">
            <input type="hidden" name="caseid" value="" id="caseid">
            <input type="hidden" name="companyid" value="" id="companyid">
            <div class="modal-content">
                <div class="modal-header" style="background: #72A9D3; color:#fff">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Case Link</h4>
                </div>
                <div class="modal-body row">
                    <h5>Would you like to add a new or existing court case?</h5>
                    <div class="col-md-6" style="border: 1px solid #ddd;text-align: center;height: 89px;width: 28%;margin-left: 18px;">
                        <a class="select-button" href="<?php echo base_url() ?>cases"><img src="https://assets.mycase.com/assets/svg/icons/court_case_add-115d23ccda72e23d9dc6b79d4dd443d91fa8d55fdf63f4c4b2e7e8d8d608a717.svg" alt="Court case add" width="60" height="60">New Case</a>
                    </div>
                    <div class="col-md-6" style="border: 1px solid #ddd;text-align: center;height: 89px;width: 28%;margin-left: 18px;">
                        <a class="select-button" href="#existingcaselinkModal" data-toggle="modal" data-dismiss="modal" ><img src="https://assets.mycase.com/assets/svg/icons/existing_case-bf6be057778b624903023fcd42a9b07095481e81d20d23dcead25f7c95dccee0.svg" alt="Existing case" width="60" height="60">Existing Case</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--------------------------CASE LINK MODAL------------------------>

<!--------------------------Existing CASE LINK MODAL------------------------>
<div class="modal fade" id="existingcaselinkModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background: #72A9D3; color:#fff">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Existing Case</h4>
            </div>
            <form method="post" action="<?php echo base_url() ?>existingcasecontactlink">
                <div class="modal-body row">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Case Link:</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <?php $caseinfo = $this->CompanyModel->selectcasebyid($this->uri->segment('3')); ?>
                                <select class="form-control" id="sel1" name="CaseId">
                                    <option>Select Case Link</option>
                                    <?php foreach ($caseinfo as $cs) { ?>
                                        <option value="<?php echo $cs['CaseId']; ?>"><?php echo $cs['CaseName']; ?> </option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Select the contacts at <span style="color: green; font-size: 20px; font-weight: bold;"><?php echo $company->CompanyName; ?></span> Company that should be linked to this case:</p>
                        <label class="control-label col-sm-3" for="email">Company Contact Link:</label>
                        <div class="col-sm-9">
                            <?php foreach ($contactinfo as $contact) { ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="ContactId[]" value="<?php echo $contact['ContactId']; ?>"><?php echo $contact['FirstName']; ?> <?php echo $contact['LastName']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Sharing:</label>
                        <div class="col-sm-9">
                            <div class="checkbox">
                                <label><input type="checkbox" name="sharing" value="1">Share all existing case events and documents with selected contacts </label>
                            </div>
                            <!--                            <div class="checkbox">
                                                            <label><input type="checkbox" value="">Automatically mark all items as read</label>
                                                        </div>-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" style="border: 1px solid #72A9D3;">Add Case Link</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!--------------------------Existing CASE LINK MODAL------------------------>

<!----------------------------------------   NOTE MODAL   -------------------------------------------->

<div class="modal fade product_view" id="notemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Add Notes</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 product_img">
                        <img src="<?php echo base_url() ?>assets/image/notes.png" class="img-responsive">
                    </div>
                    <div class="col-md-9 notecontent">
                        <form class="form-horizontal" action="<?php echo base_url() ?>savecompanynotes/<?php echo $this->uri->segment('3'); ?>" method="post">
                            <input type="hidden" name="CompanyId" value="<?php echo $this->uri->segment('3'); ?>">
                            <input type="hidden" name="RelatedTo" value="Company">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Case/Contact :</label>
                                <div class="col-sm-9">
                                    <h5><?php echo $company->CompanyName; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="pwd">Date:</label>
                                <div class="input-group col-sm-9">  
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control pickadate-editable" id="duedate" placeholder="Enter Date" name="DueDate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="pwd">Subject:</label>
                                <div class="col-sm-9">          
                                    <input type="text" class="form-control" id="pwd" placeholder="Enter Subject" name="NoteSubject">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="comment">Note:</label>
                                <div class="col-sm-9"> 
                                    <textarea name="NoteContent" class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </div>

                            <div class="btn-ground">
                                <a><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Add Note</button></a>
                                <a href="#" data-dismiss="modal" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancle</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!----------------------------------------   NOTE MODAL   -------------------------------------------->

<!----------------------------------------   DEPOSIT TRUST MODAL   -------------------------------------------->

<div class="modal fade product_view" id="deposittrust">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Deposit Trust Funds for <?php echo $company->CompanyName; ?> Company</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p>Contact : <?php echo $company->CompanyName; ?></p>
                    <p>Current Balance : $ <?php  if(isset($turstaccountinfo->amount) && $turstaccountinfo->amount !='') {  echo $turstaccountinfo->amount;  } ?></p>
                    
                </div>
                <div class="row">
                    <form class="form-horizontal" action="<?php echo base_url() ?>savetrustdeposit" method="post">
                        <input type="hidden" name="CompanyId" value="<?php echo $this->uri->segment('3'); ?>">
                        <input type="hidden" name="trustid" value="<?php  if(isset($turstaccountinfo->id) && $turstaccountinfo->id!='') {  echo $turstaccountinfo->id;  } ?>">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Payment Method :</label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" id="sel1" name="pymenttype">
                                        <option>Select Payment Method</option>
                                        <?php foreach ($paymentmethodinfo as $payment) { ?>
                                            <option value="<?php echo $payment['id']; ?>"><?php echo $payment['method_name']; ?> </option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Date:</label>
                            <div class="input-group col-sm-9">  
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-calendar"></i>
                                </span>
                                <input type="text" class="form-control pickadate-editable" id="duedate" placeholder="Enter Date" name="DueDate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Amount:</label>
                            <div class="col-sm-9">          
                                <input type="text" class="form-control" id="pwd" placeholder="Enter Amount" name="amount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="comment">Note:</label>
                            <div class="col-sm-9"> 
                                <textarea name="notes" class="form-control" rows="5" id="comment"></textarea>
                            </div>
                        </div>

                        <div class="btn-ground">
                            <a><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Deposit Funds</button></a>
                            <a href="#" data-dismiss="modal" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancle</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!----------------------------------------   DEPOSIT TRUST MODAL   -------------------------------------------->

<!----------------------------------------   WITHDRAW TRUST MODAL   -------------------------------------------->

<div class="modal fade product_view" id="notemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Add Notes</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 product_img">
                        <img src="<?php echo base_url() ?>assets/image/notes.png" class="img-responsive">
                    </div>
                    <div class="col-md-9 notecontent">
                        <form class="form-horizontal" action="<?php echo base_url() ?>savecompanynotes/<?php echo $this->uri->segment('3'); ?>" method="post">
                            <input type="hidden" name="CompanyId" value="<?php echo $this->uri->segment('3'); ?>">
                            <input type="hidden" name="RelatedTo" value="Company">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Case/Contact :</label>
                                <div class="col-sm-9">
                                    <h5><?php echo $company->CompanyName; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="pwd">Date:</label>
                                <div class="input-group col-sm-9">  
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control pickadate-editable" id="duedate" placeholder="Enter Date" name="DueDate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="pwd">Subject:</label>
                                <div class="col-sm-9">          
                                    <input type="text" class="form-control" id="pwd" placeholder="Enter Subject" name="NoteSubject">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="comment">Note:</label>
                                <div class="col-sm-9"> 
                                    <textarea name="NoteContent" class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </div>

                            <div class="btn-ground">
                                <a><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Add Note</button></a>
                                <a href="#" data-dismiss="modal" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancle</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!----------------------------------------   WITHDRAW TRUST MODAL   -------------------------------------------->
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
    function removecasecompanylink(ccc) {
        alert('fouzia');
        alert('ccc');
        var caseid = ccc;
        var companyid = '<?php echo $this->uri->segment('3'); ?>';
        $('#companyid').val(companyid);
        $('#caseid').val(caseid);
        $('#removelinkModal').modal('show');
    }

    function existingcaseinfo() {
        alert('mahi');
        $('#removelinkModal').modal('hide');
        $('#existingcaselinkModal').modal('show');
    }

    function openeditnotemodal(noteid) {
        var companyId = "<?php echo $this->uri->segment('3'); ?>";
        var companyname = "<?php echo $company->CompanyName; ?>";
        alert('go baby go');
        $.ajax({
            url: "<?php echo site_url('getnotebyid'); ?>",
            type: "post",
            dataType: "json",
            data: {
                noteid: noteid,
                companyId: companyId,
                companyname: companyname,
            },
            success: function (msg) {
                console.log(msg);
                $('.notecontent').html('');
                $('.notecontent').html(msg.companynote);
                $('#notemodal').modal('show');
                $('.pickadate-editable').pickadate({
                    editable: true
                });
            }
        });
    }

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

