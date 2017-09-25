
<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>company">Company</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>company/updated/<?php $this->uri->segment('2');?>">Update Details</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Update Company</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="company"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">


                    <div class="company-form">

                        <form id="w0"  onsubmit="return validateForm()" name="f1" method="post" action="<?php echo base_url().'company/updated/'.$all_info_for_update->CompanyId;?>">
                            
                            <h2>Company Info </h2><hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname required">
                                        <label class="control-label" for="company-companyname">Company Name</label>
                                        <span id="comments1" style="color: red"><?php echo form_error('CompanyName'); ?></span>
                                        <input type="text" id="company-companyname" class="form-control" name="CompanyName" maxlength="255" value="<?php echo $all_info_for_update->CompanyName; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Company Email</label>
                                        <span id="comments1" style="color: red"><?php echo form_error('CompanyEmail'); ?></span>
                                        <input type="text" id="company-companyname" class="form-control" name="CompanyEmail" maxlength="255" value="<?php echo $all_info_for_update->CompanyEmail; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Website</label>
                                        <input type="text" id="company-companyname" class="form-control" name="website" maxlength="255" value="<?php echo $all_info_for_update->website; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Mobile</label>
                                        <input type="text" id="company-companyname" class="form-control" name="mobile" maxlength="255" value="<?php echo $all_info_for_update->mobile; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Phone</label>
                                        <input type="text" id="company-companyname" class="form-control" name="phone" maxlength="255" value="<?php echo $all_info_for_update->phone; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                            </div>
                            <hr>
                            <h2>Company Address </h2><hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Address</label>
                                        <textarea class="form-control" rows="5" id="comment" name="address"><?php echo $all_info_for_update->address; ?></textarea>
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">City</label>
                                        <input type="text" id="company-companyname" class="form-control" name="city" maxlength="255" value="<?php echo $all_info_for_update->city; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">State</label>
                                        <div class="form-group">
                                            <select class="form-control" id="sel1" name="state">
                                                <option>Select State</option>
                                                <?php foreach ($allstate as $state) { ?>
                                                <option value="<?php echo $state['StateId']; ?>" <?php if($all_info_for_update->state == $state['StateId']) { echo 'Selected'; } ?>><?php echo $state['StateName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Country</label>
                                        <div class="form-group">
                                            <select class="form-control" id="sel1" name="country">
                                                <option>Select Country</option>
                                                <?php foreach ($allcountry as $country) { ?>
                                                <option value="<?php echo $country['CountryId']; ?>" <?php if($all_info_for_update->country == $country['CountryId']) { echo 'Selected'; } ?>><?php echo $country['CountryName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Zip</label>
                                        <input type="text" id="company-companyname" class="form-control" name="zip" maxlength="255" value="<?php echo $all_info_for_update->zip; ?>">
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                            </div>
                            <hr>
                            <h2>Note </h2><hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group field-company-companyname">
                                        <label class="control-label" for="company-companyname">Note</label>
                                        <textarea class="form-control" rows="5" id="comment" name="note"><?php echo $all_info_for_update->note; ?></textarea>
                                        <div class="help-block"></div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <button style="margin-top: 26px; width: 110px; font-size: 17px; " type="submit" class="btn btn-success">Update</button>    
                                </div>
                            </div>

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /main content -->

    </div>
   
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->

<script type="text/javascript">
<!--
// Form validation code will come here.
function validateForm()
{
 
   var x = document.forms["f1"]["CompanyName"].value;
    if (x == "") {
    comment="Please provide your Company Name!";
    document.getElementById('comments1').innerHTML=comment;

    return false;
    } 
  
}
//-->
</script>