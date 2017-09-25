<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>contactGroup">Contact Group</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>contactGroup/update/<?php echo $this->uri->segment('3');?>">Update Group</a></li>
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
            <div class="panel panel-flat col-sm-6">
                <div class="panel-heading">
                    <h5 class="panel-title">Update Contact Group</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="contactGroup"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">


                    <div class="contact-group-form">

                        <form id="w0" name="f1" action="<?php if($all_info_for_update){ echo base_url().'contactGroup/updated/'.$all_info_for_update->GroupId;}?>" method="post">
                            <input type="hidden" name="_csrf" value="Tmk4YmxwcXceL3EbJhkSTwcDVxIFPCgxGixRJ1wKIyR3B3U2QUY2QA==">
                            <div class="form-group field-contactgroup-groupname required">
                                <label class="control-label" for="contactgroup-groupname">Group Name</label>
                                  <span id="comments1" style="color: red"><?php echo form_error('GroupName');?></span>
                                  <input type="text" id="contactgroup-groupname" class="form-control" name="GroupName" maxlength="255" value="<?php if($all_info_for_update){echo $all_info_for_update->GroupName;}?>">

                                <div class="help-block"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button></div>

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
<script type="text/javascript">
<!--
// Form validation code will come here.
function validateForm()
{
 
   var x = document.forms["f1"]["GroupName"].value;
    if (x == "") {
    comment="Please provide your Group Name!";
    document.getElementById('comments1').innerHTML=comment;

    return false;
    } 
  
}
//-->
</script>