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
                                <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE); ?>

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
                                <h3>Import / Export</h3>
                                <div class="col-md-12" style="background: #fff">
                                    <div id="info_page" style="margin: 20px;">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab1">Contacts & Companies</a></li>
                                            <li><a data-toggle="tab" href="#tab2">Court Cases / Matters</a></li>
                                            <li><a data-toggle="tab" href="#tab3">Full Backup</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab1" class="tab-pane fade in active">

                                                <div class="row" style="float: right">
                                                    <span>Learn how to Import and Export Contacts </span>
                                                    <span><button class="btn btn-default" style="background: #DEDEDE; border:1px solid #ddd" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-plus" style="color: green;"></i> Export Contact</button></span>
                                                    <span><button class="btn btn-default" style="background: #DEDEDE; border:1px solid #ddd" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-plus" style="color: green;"></i> Import Contact</button></span>
                                                </div><br><br>
                                                <div class="row">
                                                    <div class="progress" style="height:40px;margin-top: 15px;">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width:100%; height:100%">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>File</th>
<!--                                                                    <th>Method</th>-->
                                                                    <th>Uploaded</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach ($importedcontactfiles as $importcontact) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $importcontact['filename'] ?></td>
    <!--                                                                        <td><?php //echo $importcase['method']  ?></td>-->
                                                                        <td>
                                                                            <?php echo "Added on " . date('d F Y', $importcontact['created_date']); ?>
                                                                            <?php
                                                                            $userinfo = $this->AccountModel->getuserinfobyuserid($_SESSION['user_id']);
                                                                            $username = $userinfo->fullname;
                                                                            $userrole = $userinfo->status;
                                                                            if ($userrole == '1') {
                                                                                $stauts = 'Attorney';
                                                                            } else if ($userrole == '2') {
                                                                                $stauts = 'Paralegal';
                                                                            } else if ($userrole == '3') {
                                                                                $stauts = 'Staff';
                                                                            } else if ($userrole == '4') {
                                                                                $stauts = 'Client';
                                                                            }
                                                                            ?>
                                                                            <p><a><?php echo " by " . $username . "(" . $stauts . ")" ?></a></p>
                                                                        </td>
                                                                        <td><?php
                                                                            if ($importcontact['status'] == 1) {
                                                                                if ($importcontact['undo_status'] == '0') {
                                                                                    echo "Complete";
                                                                                } else {
                                                                                    ?>
                                                                        <strike><?php echo "Complete"; ?></strike> (Undone)
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo "Error";
                                                                }
                                                                ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() ?>viewlog/<?php echo $importcontact['log_id'] ?>">View Log</a>
                                                                    <?php if ($importcontact['status'] == 1 && $importcontact['undo_status'] == '0') { ?>
                                                                        <p><a href="<?php echo base_url() ?>undoimport/<?php echo $importcontact['log_id'] ?>">Undo Import</a></p>
                                                                <?php } ?>
                                                                </td>
                                                                </tr>
<?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                            </div>
                                            <div id="tab2" class="tab-pane fade in">
                                                <div class="row" style="float: right">
                                                    <span>Learn how to Import and Export Cases </span>
                                                    <span><button class="btn btn-default" style="background: #DEDEDE; border:1px solid #ddd" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-plus" style="color: green;"></i> Export Cases</button></span>
                                                    <span><button class="btn btn-default" style="background: #DEDEDE; border:1px solid #ddd" data-toggle="modal" data-target="#myModal4"><i class="glyphicon glyphicon-plus" style="color: green;"></i> Import Cases</button></span>
                                                </div><br><br>
                                                <div class="row">
                                                    <div class="progress" style="height:40px;margin-top: 15px;">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width:100%; height:100%">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>File</th>
    <!--                                                                    <th>Method</th>-->
                                                                        <th>Uploaded</th>
                                                                        <th>Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($importedcasefiles as $importcase) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $importcase['filename'] ?></td>
    <!--                                                                        <td><?php //echo $importcase['method'] ?></td>-->
                                                                            <td>
                                                                                <?php echo "Added on " . date('d F Y', $importcase['created_date']); ?>
                                                                                <?php
                                                                                $userinfo = $this->AccountModel->getuserinfobyuserid($_SESSION['user_id']);
                                                                                $username = $userinfo->fullname;
                                                                                $userrole = $userinfo->status;
                                                                                if ($userrole == '1') {
                                                                                    $stauts = 'Attorney';
                                                                                } else if ($userrole == '2') {
                                                                                    $stauts = 'Paralegal';
                                                                                } else if ($userrole == '3') {
                                                                                    $stauts = 'Staff';
                                                                                } else if ($userrole == '4') {
                                                                                    $stauts = 'Client';
                                                                                }
                                                                                ?>
                                                                                <p><a><?php echo " by " . $username . "(" . $stauts . ")" ?></a></p>
                                                                            </td>
                                                                            <td><?php
                                                                                if ($importcase['status'] == 1) {
                                                                                    if ($importcase['undo_status'] == '0') {
                                                                                        echo "Complete";
                                                                                    } else {
                                                                                        ?>
                                                                            <strike><?php echo "Complete"; ?></strike> (Undone)
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            echo "Error";
                                                                        }
                                                                        ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() ?>viewlog/<?php echo $importcase['log_id'] ?>">View Log</a>
                                                                    <?php if ($importcase['status'] == 1 && $importcase['undo_status'] == '0') { ?>
                                                                            <p><a href="<?php echo base_url() ?>undoimport/<?php echo $importcase['log_id'] ?>">Undo Import</a></p>
    <?php } ?>
                                                                    </td>
                                                                    </tr>
<?php } ?>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                </div>
                                            </div>
                                            <div id="tab3" class="tab-pane fade in">
                                                <div class="row" style="float: right">
                                                    <span><button class="btn btn-default" style="background: #DEDEDE; border:1px solid #ddd" data-toggle="modal" data-target="#myModal5"><i class="glyphicon glyphicon-plus" style="color: green;"></i> Create Backup</button></span>
                                                </div><br><br>
                                                <div class="row">
                                                    <div class="progress" style="height:40px;margin-top: 15px;">
                                                        <div class="progress-bar" role="progressbar"
                                                             style="width:100%; height:100%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <!---------------------------MODAL START--------------------------->

                            <!-- Modal 1-->
                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>exportcontact">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Export Contacts</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Format</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="radio">
                                                            <label><input type="radio" checked name="expcon" value="1">Outlook CSV</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label><input type="radio" name="expcon" value="2">vCard</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" checked name="company" value="1">Include company contact</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="archive" value="2">Include Archive contact</label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Export Contact</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 1-->
                            <!-- Modal 2-->
                            <div class="modal fade" id="myModal2" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>importcontact" enctype="multipart/form-data">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Import Contacts</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Format</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="radio">
                                                            <label><input type="radio" checked name="importformat" value="1">Outlook CSV</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label><input type="radio" name="importformat" value="2">vCard</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>File</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div id="fileupload-dropzone" style="width: 440px; height: 50px; border:1px dashed #88b3ec" class="selected">
                                                            <input type="file" name="file" id="import_filename">
                                                        </div>
                                                        <br>
                                                        <p>After uploading, your import file will be placed in a queue and processed within a few minutes.</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import Contact</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal 2-->
                            <!-- Modal 3-->
                            <div class="modal fade" id="myModal3" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>exportcase">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Export Contacts</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Format</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>MyCase CSV</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Cases</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="radio">
                                                            <label><input type="radio" checked name="caselink" value="1">Only include cases I'm linked to</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label><input type="radio" name="caselink" value="2">Include all firm cases</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="closed" value="1"> Include closed cases</label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Export Court Cases</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal 3-->
                            <!-- Modal 4-->
                            <div class="modal fade" id="myModal4" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>importcases" enctype="multipart/form-data">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Import Contacts</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Format</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <p>MyCase CSV </p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>File</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div style="width: 440px; height: 50px; border:1px dashed #88b3ec" class="selected">
                                                            <input type="file" name="file" id="">
                                                        </div><br>
                                                        <p>After uploading, your import file will be placed in a queue and processed within a few minutes.</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import Court Cases</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal 4-->
                            <!-- Modal 5-->
                            <div class="modal fade" id="myModal5" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>zipFiles">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Export Contacts</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Format</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="radio">
                                                            <label><input type="radio" checked name="csv" value="1">CSV</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Cases</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="radio">
                                                            <label><input type="radio" checked name="optradio" value="1">Only include cases I'm linked to</label>
                                                        </div>
                                                        <div class="radio">
                                                            <label><input type="radio" name="optradio" value="2">Include all firm cases</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="company" value="1"> Include archived items</label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="archive" value="2"> Send me an email when the backup is finished</label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Create Backup</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 5-->
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