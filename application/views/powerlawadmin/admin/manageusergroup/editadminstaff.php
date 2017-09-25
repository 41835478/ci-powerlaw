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
            <div class="panel panel-flat col-sm-6">
                <div class="panel-heading">
                    <h5 class="panel-title">Edit Admin User</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="/lcadmin/user/index"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <style type="text/css">
                        label{
                            text-align: left !important;

                        }
                    </style>
                    <div class="site-signup">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="form-signup" class="form-horizontal" action="<?php echo base_url()?>updateadminstaff/<?php echo $editadminstaff->id;?>" method="post" role="form">
                                    <input type="hidden" name="_csrf" value="dDNyVExVUWQiWREjdS0IAyRUOBkdNCkSFl0fCyI4ZzsTXSsRBRoYBg==">
                                    <div class="form-group field-adduser-fullname">
                                        <label class="control-label col-sm-3" for="adduser-fullname">Full Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="adduser-fullname" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $editadminstaff->fullname; ?>">
                                            <div class="help-block help-block-error "></div>
                                        </div>

                                    </div>               
                                    <div class="form-group field-adduser-username required">
                                        <label class="control-label col-sm-3" for="adduser-username">User Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="adduser-username" class="form-control" name="username" placeholder="Username" value="<?php echo $editadminstaff->username; ?>">
                                            <div class="help-block help-block-error "></div>
                                        </div>
                                    </div>                
                                    <div class="form-group field-adduser-email required">
                                        <label class="control-label col-sm-3" for="adduser-email">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" id="adduser-email" class="form-control" name="email" placeholder="Email" value="<?php echo $editadminstaff->email; ?>">
                                            <div class="help-block help-block-error "></div>
                                        </div>
                                    </div>                                                      
                                    <div class="form-group field-adduser-role">
                                        <label class="control-label col-sm-3" for="adduser-role">Status</label>
                                        <div class="col-sm-6">
                                            <select id="adduser-role" class="form-control" name="status">
                                                <option value="">Select User Group</option>
                                                <option value="1" <?php if ($editadminstaff->status == 1){ echo "Selected"; } ?>>Active</option>
                                                <option value="0" <?php if ($editadminstaff->status == 0){ echo "Selected"; } ?>>Inactive</option>
                                            </select>
                                            <div class="help-block help-block-error "></div>
                                        </div>
                                    </div>    
                                    
                                    <div class="form-group field-adduser-role">
                                        <label class="control-label col-sm-3" for="adduser-role">Type</label>
                                        <div class="col-sm-6">
                                            <select id="adduser-role" class="form-control" name="type">
                                                <option value="">Select User Group</option>
                                                <option value="2" <?php if ($editadminstaff->type == '2'){ echo "Selected"; } ?>>Paralegal</option>
                                                <option value="3" <?php if ($editadminstaff->type == '3'){ echo "Selected"; } ?>>Staff</option>
                                            </select>
                                            <div class="help-block help-block-error "></div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-left:13px">
                                        <div class="col-md-offset-3">
                                            <button type="submit" class="btn btn-primary" name="signup-button">Save</button>                    
                                        </div>
                                    </div>
                                </form>        
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


