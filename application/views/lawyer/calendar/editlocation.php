<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>frontlocation">Location</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>editfrontlocation/<?php echo $this->uri->segment('2');?>">Edit Location</a></li>
        </ol>
    </div>
</div>

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
                    <h5 class="panel-title">Create Location</h5>
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
                    <div class="state-form">

                        <form id="w0" action="<?php echo base_url() ?>updatefrontlocation/<?php echo $this->uri->segment('2');?>" method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">Location Name</label>
                                            <input type="text" id="state-statename" class="form-control" name="location_name" maxlength="255" value="<?php echo $locationeditinfo->location_name; ?>">
                                            <div class="help-block"></div>
                                        </div>        
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">Address</label>
                                            <input type="text" id="state-statename" class="form-control" name="address" maxlength="255" value="<?php echo $locationeditinfo->address; ?>">
                                            <div class="help-block"></div>
                                        </div>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">City</label>
                                            <input type="text" id="state-statename" class="form-control" name="city" maxlength="255" value="<?php echo $locationeditinfo->city; ?>">
                                            <div class="help-block"></div>
                                        </div>        
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">State</label>
                                            <select id="firm-state" class="select-search form-control" name="state">
                                                <option value="">Select State</option>
                                                <?php foreach ($allstate as $state) { ?>
                                                    <option value="<?php echo $state['StateId']; ?>" <?php if ($state['StateId'] == $locationeditinfo->state) { echo "selected"; } ?>><?php echo $state['StateName']; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">Country</label>
                                            <select id="firm-country" class="select-search form-control" name="country">
                                                <option value="">Select Country</option>
                                                <?php foreach ($allcountry as $country) { ?>
                                                    <option value="<?php echo $country['CountryId']; ?>" <?php if ($country['CountryId'] == $locationeditinfo->country) { echo "selected"; } ?>><?php echo $country['CountryName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>        
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">Zip</label>
                                            <input type="text" id="state-statename" class="form-control" name="zip" maxlength="255" value="<?php echo $locationeditinfo->zip; ?>">
                                            <div class="help-block"></div>
                                        </div>        
                                    </div>
                                </div>

                            </fieldset>
                            <div class="row">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create</button>    </div>

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


