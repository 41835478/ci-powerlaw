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
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <div class="panel panel-default">
                    <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i>Update User Group:  admin </h6></div>
                    <div class="panel-body">
                        <div class="auth-item-form">
                            <form id="w0" action="<?php echo base_url()?>updateusergroup/<?php echo $editusergroup->name; ?>" method="post" role="form">
                                <input type="hidden" name="_csrf" value="MVUzZnVaLVVVIwJUAC5CO2RlAidHaFpnVhReNxpvXB5GMHITPzlaLQ==">	
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group field-authitem-name required">
                                            <label class="control-label" for="authitem-name">Name</label>
                                            <input type="text" id="authitem-name" class="form-control" name="name" value="<?php echo $editusergroup->name; ?>" maxlength="64">
                                            <p class="help-block help-block-error"></p>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Accsess</label>
                                        <div class="form-group field-authitem-child">

                                            <div id="authitem-child"></div>

                                            <p class="help-block help-block-error"></p>
                                        </div>		   </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>    </div>

                        </form>
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


