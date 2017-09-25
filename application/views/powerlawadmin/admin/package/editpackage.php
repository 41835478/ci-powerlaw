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
                    <h5 class="panel-title">Create Package</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="/lcadmin/country/index"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">

                    <style type="text/css">
                        legend{
                            font-weight: bold;
                        }
                    </style>
                    <div class="country-form">

                        <form id="w0" action="<?php echo base_url() ?>updatepackage/<?php echo $packageeditinfo->PackageId; ?>" method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Package Name</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="PackageName" maxlength="20" value="<?php echo $packageeditinfo->PackageName; ?>">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countryname required">
                                            <label class="control-label" for="country-countryname">Description (Keep one feature in one line.)</label>
                                           <textarea rows="4" cols="50" type="text" id="state-statename" class="form-control" name="Description" placeholder="Time Zone"><?php echo $packageeditinfo->Description; ?></textarea>
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Amount</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="Amount" maxlength="20" value="<?php echo $packageeditinfo->Amount; ?>">

                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Free Trial</label>
                                            <select id="state-countryid" class="select-search" name="FreeTrial" value="<?php echo $packageeditinfo->FreeTrial; ?>">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-country-countrycode required">
                                            <label class="control-label" for="country-countrycode">Trial Duration (In days)</label>
                                            <input type="text" id="country-countrycode" class="form-control" name="TrialDuration" maxlength="20" value="<?php echo $packageeditinfo->TrialDuration; ?>">
                                            <div class="help-block"></div>
                                        </div>            
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>    </div>

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


