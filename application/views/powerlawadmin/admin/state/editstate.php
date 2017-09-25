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
                    <h5 class="panel-title">Create Country</h5>
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

                     <form id="w0" action="<?php echo base_url() ?>updatestate/<?php echo $this->uri->segment('2');?>" method="post">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-state-countryid required">
                                            <label class="control-label" for="state-countryid">Country ID</label>
                                            <select id="state-countryid" class="select-search" name="CountryId">
                                                <option value="">Select Country</option>
                                                <?php foreach($countryData as $country){  ?>
                                                <option value="<?php echo $country['CountryId']; ?>" <?php if ($country['CountryId'] == $stateeditinfo->CountryId) { echo "selected"; } ?>><?php echo $country['CountryName']; ?></option>
                                                <?php } ?>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group field-state-statename required">
                                            <label class="control-label" for="state-statename">State Name</label>
                                            <input type="text" id="state-statename" class="form-control" name="StateName" maxlength="255" value="<?php echo $stateeditinfo->StateName; ?>">
                                            <div class="help-block"></div>
                                        </div>        </div>
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


