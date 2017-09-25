<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>contact">Contact</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>contact/addContact">Edit Contact</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<body>


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Update Contact</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li>
                                    <a href="contact"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                            </ul>
                        </div>					                        
                    </div>
                    <div class="panel-body">
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Create Company</h4>
                                        
                                    </div>
                                    <div class="modal-body">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="contact-form">
                            <hr />
                            <form id="w0"  onsubmit="return(validate());" name="f1" action="<?php echo base_url().'contact/updated/'. base64_encode($all_info_for_update->ContactId) ?>" method="post">
                                <input type="hidden" name="_csrf" value="MTZHQ3dZLVJYczNyGGpqN2lcCyUNCHo/fhsCcz8UZhQETy0FPjNMAA=="><h3>Personal Details</h3>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                        <div class="form-group field-contact-firstname required">
    
                                            <label class="control-label" for="contact-firstname">First Name &nbsp; &nbsp;</label>
                                            <span id="comments1" style="color: red;"></span>
                                            <input type="text" id="contact-firstname" class="form-control" name="FirstName" maxlength="255" 
                                                   value="<?php echo $all_info_for_update->FirstName?>">
                                            
                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-middlename">
                                            <label class="control-label" for="contact-middlename">Middle Name</label>
                                            <input type="text" id="contact-middlename" class="form-control" name="MiddleName" maxlength="255"
                                                   value="<?php echo $all_info_for_update->MiddleName?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                      
                                        <div class="form-group field-contact-lastname">
                                           
                                            <label class="control-label" for="contact-lastname">Last Name &nbsp;&nbsp;</label>
                                           
                                           <span id="comments2" style="color: red;"></span>
                                            <input type="text" id="contact-lastname" class="form-control" name="LastName" maxlength="255"
                                                   value="<?php echo $all_info_for_update->LastName?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-contactgroup">
                                            <label class="control-label" for="contact-contactgroup">Contact Group</label>
                                            <select id="contact-contactgroup" class="select-search form-control" name="ContactGroup">
                                                <option value="">Select Group</option>
                                                <?php foreach ($all_group as $a_group) {?>
                                                <option value="<?php echo $a_group->GroupId;?>"<?php if($all_info_for_update->ContactGroup==$a_group->GroupId){echo 'selected';}?>><?php echo $a_group->GroupName;?></option>  
                                                <?php }?>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-companyid">
                                            <label class="control-label" for="contact-companyid">Company Name</label>
                                            <select id="contact-companyid" class="select-search form-control" name="CompanyId" onchange="loadModel(this.value);">
                                                 <option value="">Select Company</option> 
                                                <?php foreach ($all_company as $a_company) {?>
                                                 <option value="<?php echo $a_company->CompanyId;?>" <?php if($all_info_for_update->CompanyId==$a_company->CompanyId){echo 'selected';}?>><?php echo $a_company->CompanyName;?></option> 
                                                <?php }?>
                                                
                                                <option value="9999999">Add New Company</option>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-jobtitle">
                                            <label class="control-label" for="contact-jobtitle">Job Title</label>
                                            <input type="text" id="contact-jobtitle" class="form-control" name="JobTitle" maxlength="255"
                                                   value="<?php echo $all_info_for_update->JobTitle?>" >

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>

                                <h3>Contact Details</h3>
                                
                                
                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                      
                                        <div class="form-group field-contact-email required">
                                           
                                            <label class="control-label" for="contact-email">Email &nbsp;&nbsp;</label>
                                           
                                            <span id="comments3" style="color: red;"></span>
                                            <input type="email" id="contact-email" class="form-control" name="Email" maxlength="255"
                                                   value="<?php $firstname = set_value('Email') == false ? $all_info_for_update->Email : set_value('firstname');?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                  
                                        <label style="margin-bottom: 0px;">Mobile Number &nbsp;&nbsp;</label>
                                            <span id="comments4" style="color: red;"></span>
                                        <div class="form-group field-contact-ccodem">

                                            <select id="contact-ccodem" class="form-control" name="CCodeM" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                                <option value="">Select One</option>
                                                <?php foreach ($all_country_mobile_code as $a_country_mobile_code) {?>
                                                <option value="<?php echo $a_country_mobile_code->PhoneCode?>" <?php if($all_info_for_update->CCodeM==$a_country_mobile_code->PhoneCode){echo 'selected';}?>><?php echo $a_country_mobile_code->CountryCode.'('.$a_country_mobile_code->PhoneCode.')';?></option>
                                                <?php }?>
                                                
                                            </select>

                                            <div class="help-block"></div>
                                        </div>            <div class="form-group field-contact-mobile required">

                                            <input type="text" id="contact-mobile" class="form-control" name="Mobile" maxlength="50" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;"
                                                   value="<?php echo $all_info_for_update->Mobile?>" >

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                         
                                        <label style="margin-bottom: -10px;">Phone Number &nbsp;&nbsp;</label>
                                       <span id="comments5" style="color: red;"></span>
                                        <div class="form-group field-contact-ccodep">

                                            <select id="contact-ccodep" class="form-control" name="CCodeP" onchange="getState(this.value)" style="width: 37%; float: left; margin-right: 10px;">
                                                <option value="">Select One</option>
                                                <?php foreach ($all_country_mobile_code as $a_country_mobile_code) {?>
                                                <option value="<?php echo $a_country_mobile_code->PhoneCode?>" <?php if($all_info_for_update->CCodeP==$a_country_mobile_code->PhoneCode){echo 'selected';}?>><?php echo $a_country_mobile_code->CountryCode.'('.$a_country_mobile_code->PhoneCode.')';?></option>
                                                <?php }?>
                                                
                                            </select>

                                            <div class="help-block"></div>
                                        </div>            <div class="form-group field-contact-phone">

                                            <input type="text" id="contact-phone" class="form-control" name="Phone" maxlength="50" data-mask="999-999-9999" style="width: 59%; margin-top: -13px; float: left;"
                                                   value="<?php echo $all_info_for_update->Phone?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-address">
                                            <label class="control-label" for="contact-address">Address</label>
                                            <input type="text" id="contact-address" class="form-control" name="Address" maxlength="255"
                                                   value="<?php echo $all_info_for_update->Address?>" >

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-address2">
                                            <label class="control-label" for="contact-address2">Suite/ Apt/ Building</label>
                                            <input type="text" id="contact-address2" class="form-control" name="Address2" maxlength="255"
                                                   value="<?php echo $all_info_for_update->Address2?>"  >

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-country required">
                                            <label class="control-label" for="contact-country">Country</label>
                                            <select id="contact-country" class="select-search form-control" name="Country" onchange="getState(this.value)">
                                                <option value="">Select Country</option>
                                                 <?php foreach ($all_country_mobile_code as $a_country_mobile_code) {?>
                                                <option value="<?php echo $a_country_mobile_code->CountryId?>" <?php if($all_info_for_update->Country==$a_country_mobile_code->CountryId){echo 'selected';}?>><?php echo $a_country_mobile_code->CountryName;?></option>
                                                <?php }?>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-state">
                                            <label class="control-label" for="contact-state">State</label>
                                            <select id="contact-state" class="select-search form-control" name="State">
                                                <option value="">Select State</option>
                                                 <?php foreach ($all_country_mobile_code as $a_country_mobile_code) {?>
                                                <option value="<?php echo $a_country_mobile_code->CountryId?>" <?php if($all_info_for_update->State== $a_country_mobile_code->CountryId){echo 'selected';}?>><?php echo $a_country_mobile_code->State;?></option>
                                                <?php }?>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-city">
                                            <label class="control-label" for="contact-city">City</label>
                                            <input type="text" id="contact-city" class="form-control" name="City" maxlength="255"
                                                   value="<?php echo $all_info_for_update->City?>" >

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-zipcode">
                                            <label class="control-label" for="contact-zipcode">Zip Code &nbsp;&nbsp;</label>
                                            <input type="text" id="contact-zipcode" class="form-control" name="ZipCode" maxlength="20"
                                                   value="<?php echo $all_info_for_update->ZipCode?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>
                                <h3>Other Details</h3>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-allowportalaccess required">
                                            <label class="control-label" for="contact-allowportalaccess">Allow Portal Access</label>
                                            <select id="contact-allowportalaccess" class="select-search form-control" name="AllowPortalAccess">
                                                <option value="">Select One</option>
                                                <option value="Yes" <?php if ($all_info_for_update->AllowPortalAccess=='Yes') {echo 'selected';}?>>Yes</option>
                                                <option value="No" <?php if ($all_info_for_update->AllowPortalAccess=='No') {echo 'selected';}?>>No</option>
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-website">
                                            <label class="control-label" for="contact-website">Website</label>
                                            <input type="text" id="contact-website" class="form-control" name="Website" maxlength="255"
                                                   value="<?php echo $all_info_for_update->Website?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-dateofbirth">

                                            <label class="control-label" for="contact-dateofbirth">Date Of Birth</label>
                                            <div class="input-group col-sm-12">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                                <input type="text" id="contact-dateofbirth" class="pickadate-editable form-control" name="DateOfBirth" data-provide="datepicker"
                                                       value="<?php    $timestamp = strtotime($all_info_for_update->DateOfBirth);
                                                       print date("jS F Y", $timestamp);?>">
                                            </div>
                                            <div class="help-block"></div>

                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-dateofanniversary">

                                            <label class="control-label" for="contact-dateofanniversary">Date Of Anniversary</label>
                                            <div class="input-group col-sm-12">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-calendar"></i>
                                                </span>
                                                <input type="text" id="contact-dateofanniversary" class="pickadate-editable form-control" name="DateOfAnniversary" data-provide="datepicker" value="<?php  $timestamp = strtotime($all_info_for_update->DateOfAnniversary);
                                               print date("jS F Y", $timestamp);?>">
                                            </div>
                                            <div class="help-block"></div>

                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-licencenumber">
                                            <label class="control-label" for="contact-licencenumber">License Number &nbsp;&nbsp;</label>
                                            <input type="text" id="contact-licencenumber" class="form-control" name="LicenceNumber" maxlength="255" value="<?php echo $all_info_for_update->LicenceNumber?>">

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-licencestate">
                                            <label class="control-label" for="contact-licencestate">License State</label>
                                            <select id="contact-licencestate" class="select-search form-control" name="LicenceState">
                                                <option value="">Select State</option>
                                               
                                            </select>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-welcomemessage">
                                            <label class="control-label" for="contact-welcomemessage">Welcome Message</label>
                                            <textarea id="contact-welcomemessage" class="form-control" name="WelcomeMessage" rows="1" style="resize: none;"><?php echo $all_info_for_update->WelcomeMessage?></textarea>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                    <div class="col-sm-4">
                                        <div class="form-group field-contact-privatenote">
                                            <label class="control-label" for="contact-privatenote">Private Note</label>
                                            <textarea id="contact-privatenote" class="form-control" name="PrivateNote" rows="1" style="resize: none;"><?php echo $all_info_for_update->PrivateNote?></textarea>

                                            <div class="help-block"></div>
                                        </div>        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-success">Update Contact</button>        </div>
                                </div>

                            </form>
                        </div>



                        <script type="text/javascript">
                            function getState(cId)
                            {
                                $.post("/account/get-state?cId=" + cId, function (data)
                                {
                                    $('#contact-state').html(data);
                                });
                            }

                            function loadModel(val)
                            {
                                if (val == '9999999')
                                {
                                    //   $('#myModal').modal('show');
                                    $('#myModal').modal('show').find('.modal-body').load('/company/create-ajax');

                                }
                            }
                        </script>	</div>
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


<!--<script type="text/javascript">
function validateForm() {
var x=document.forms["f1"]["Contact[FirstName]"].value;

if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

var y=document.forms["f1"]["LastName"].value;
  {
if (y==null || y=="")
  alert("Password name must be filled out");
  return false;
 }
}
</script>-->
<script type="text/javascript">
<!--
// Form validation code will come here.
function validate()
{
      if (isNaN(document.f1.ZipCode.value))
      {  
     commentZipCode="Zip Code Number should be a number!";
    document.getElementById('commentZipCode').innerHTML=commentZipCode;
     document.f1.ZipCode.focus() ;
     return false;
      }  
      if (isNaN(document.f1.LicenceNumber.value))
      {  
     commentisNaN="Licence Number should be a number!";
    document.getElementById('commentlicence').innerHTML=commentisNaN;
     document.f1.LicenceNumber.focus() ;
     return false;
      }  
   if( document.f1.FirstName.value == "" )
   {
   
     comment="Please provide your First Name!";
    document.getElementById('comments1').innerHTML=comment;
     document.f1.FirstName.focus() ;
     return false;
   }
   if( document.f1.LastName.value == "" )
   {
    
     comment2="Please provide your Lastname!";
     document.getElementById('comments2').innerHTML=comment2;
     document.f1.LastName.focus() ;
     return false;
   }
   if( document.f1.Email.value == "" )
   {
     
      comment3="Please provide your Email!";
     document.getElementById('comments3').innerHTML=comment3;
     document.f1.Email.focus() ;
     return false;
   }
    if((document.f1.Mobile.value == "" && document.f1.CCodeM.value != "")||(document.f1.Mobile.value != "" && document.f1.CCodeM.value == ""))
   {
    
      comment4="Please provide your country code and mobile number also!";
     document.getElementById('comments4').innerHTML=comment4;
     document.f1.Email.focus() ;
     return false;
   }
  if((document.f1.CCodeP.value == "" && document.f1.Phone.value != "")||(document.f1.CCodeP.value != "" && document.f1.Phone.value == ""))
   {
    
      comment5="Please provide your country code and phone number also!";
     document.getElementById('comments5').innerHTML=comment5;
     document.f1.Email.focus() ;
     return false;
   }
   return( true );
}
//-->
</script>