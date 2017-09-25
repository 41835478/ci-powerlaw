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
                    <h5 class="panel-title">Add User</h5>
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
                                <form id="form-signup" class="form-horizontal" action="<?php echo base_url()?>insertpermission" method="post" role="form">               
                                    <div class="form-group field-adduser-role">
                                        <label class="control-label col-sm-3" for="adduser-role">Select User</label>
                                        <div class="col-sm-6">
                                            <select id="adduser-role" class="form-control" name="userid">
                                                <option value="">Select User</option>
                                                <?php foreach($alladminstaff as $adminstaff) { ?>
                                                <option value="<?php echo $adminstaff['id'];?>"><?php echo $adminstaff['username'];?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block help-block-error "></div>
                                        </div>
                                    </div>  
                                    
                                    <div class="form-group field-adduser-role">
                                        <label class="control-label col-sm-3" for="adduser-role">Set Permission</label>
                                        <div class="col-sm-9">
                                             <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="task">Task
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="contact">Contact
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="calender">Calender
                                            </label><label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="cases">Cases
                                            </label><label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="document">Document
                                            </label><label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="billing">Billing
                                            </label><label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="report">Report
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="message">Message
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="comment">Comment
                                            </label>
                                            <div class=""><button></button></div>
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


