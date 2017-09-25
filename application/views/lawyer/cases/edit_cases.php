<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="page-container">
                <!-- Page content -->
                <div class="page-content">
                    <!-- Main content -->
                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">
                                                <div class="col-md-8">
                                                <h5 class="panel-title">Edit Cases</h5>
                                                <input type="hidden" name="hidden_attorney" id="hidden_attorney_id" value="<?php if($acase->AttoernyId){echo $acase->AttoernyId;}?>">
                                                <input type="hidden" name="hidden_company" id="hidden_company_id" value="<?php if($acase->CompanyId){echo $acase->CompanyId;}?>">
                                                <input type="hidden" name="hidden_contact" id="hidden_contact_id" value="<?php if($acase->ContactId){echo $acase->ContactId;}?>">
                                                <input type="hidden" name="hidden_billing_contact" id="hidden_billing_contact_id" value="<?php if($acase->BillingContactPerson){echo $acase->BillingContactPerson;}?>">
                                                <div>
                                                
                                            </legend>
                                        </fieldset>
                                        <div class="success">
                                              
                                               
                                            <?php if($this->session->flashdata('already have')){?>
                                            <p style="color: red"><?php echo $this->session->flashdata('already have')?><p>
                                                   <?php }?> 
                                             
                                                   <?php if($this->session->flashdata('insertsuccess')){?>
                                            <p style="color: green"><?php echo $this->session->flashdata('insertsuccess')?><p>
                                                   <?php }?> 
                                                </div>
                                    </div>
                                    <div class="panel-body">

                                        <div class="cases-form">

                                            <form id="w0"  onsubmit="return(validate());" name="f1" action="<?php echo base_url(),'cases/updated'?>" method="post">
                                                <input type="hidden" name="_csrf" value="WlBMdk9KcWkKFgUPBSMSURM6IwYmBigvDhUlM38wIzpjPgEiYnw2Xg==">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-casename required">
                                                            <label class="control-label" for="cases-casename">Case Name</label>
                                                            <span id="comment1" style="color: red;"></span>
                                                            <input type="text" id="cases-casename" class="form-control" name="CaseName" maxlength="255" value="<?php echo $acase->CaseName; ?>">
                                                            <input type="hidden"  name="CaseId" value="<?php echo $acase->CaseId; ?>">
                                                            <input type="hidden"  name="pagelink" value="<?php echo $checkpage; ?>">
                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-casenumber required">
                                                            <label class="control-label" for="cases-casenumber">Case Number</label>
                                                            <span id="commentCaseCode" style="color: red;"></span>
                                                            <input type="text" id="cases-casenumber" class="form-control" name="CaseNumber" maxlength="255" value="<?php if($acase->CaseNumber){echo $acase->CaseNumber;} ?>">

                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-caseemail required">
                                                            <label class="control-label" for="cases-caseemail">Case Email</label>
                                                            <span id="comment2" style="color: red;"></span>
                                                            <input type="text" id="cases-caseemail" class="form-control" name="CaseEmail" maxlength="255" value="<?php if($acase->CaseEmail){echo $acase->CaseEmail; }?>">

                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-4">
                                                         <div class="form-group field-contact-Dateopen">
                                                                 <label class="control-label" for="cases-dateopen">Date Open</label>
                                                                <div class="input-group col-sm-12">
                                                                         <span class="input-group-addon">
                                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                                         </span>
                                                                        
                                                                         <input type="text" id="cases-dateopen" class="pickadate form-control" value="<?php if($acase->DateOpen){ $timestamp = strtotime($acase->DateOpen);print date("jS F Y", $timestamp);} ?>">
                                                                </div>
                                                                <div class="help-block"></div>

                                                         </div> 
                                                           
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-practicearea required">
                                                            <label class="control-label" for="cases-practicearea">Practice Area</label>
                                                            <select id="cases-practicearea" class="select-search form-control" name="PracticeArea">
                                                                <option value="" >Select Practice Area</option>
                                                                <?php  foreach($all_practice_area as $a_practice_area){?>
                                                                <option value="<?php echo $a_practice_area->PracticeAreaId; ?>"<?php if($acase->PracticeArea){if($acase->PracticeArea==$a_practice_area->PracticeAreaId){echo "selected";}} ?>><?php echo $a_practice_area->PracticeArea;?></option>
                                                                <?php }?>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-description required">
                                                            <label class="control-label" for="cases-description">Description</label>
                                                            <textarea id="cases-description" class="form-control" name="Description" rows="1"><?php if($acase->Description){echo $acase->Description;} ?></textarea>

                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                          <div class="form-group field-cases-statuteoflimitations required">
                                                                 <label class="control-label" for="cases-statuteoflimitations">Statute Of Limitations</label>
                                                                <div class="input-group col-sm-12">
                                                                         <span class="input-group-addon">
                                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                                         </span>
                                                                        
                                                                          <input type="text" id="cases-statuteoflimitations" class="pickadate form-control" name="StatuteOfLimitations" value="<?php if($acase->StatuteOfLimitations){ $timestamp = strtotime($acase->StatuteOfLimitations);print date("jS F Y", $timestamp);} ?>">
                                                                </div>
                                                                <div class="help-block"></div>

                                                         </div> 
                                                               
                                                    </div>
                                                    <div class="col-sm-4">
                                                         <div class="form-group field-contact-ReminderSOL">
                                                                <label class="control-label" for="cases-remindersol">Reminder Sol</label>
                                                                <div class="input-group col-sm-12">
                                                                         <span class="input-group-addon">
                                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                                         </span>
                                                                        
                                                                          <input type="text" id="cases-remindersol" class="pickadate form-control" name="ReminderSOL" value="<?php if($acase->ReminderSOL){$timestamp = strtotime($acase->ReminderSOL);print date("jS F Y", $timestamp);} ?>">
                                                                </div>
                                                                <div class="help-block"></div>

                                                         </div> 
                                                        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-firmid required">
                                                            <label class="control-label" for="cases-firmid">Firm ID</label>
                                                            <select id="cases-firmid" class="select-search form-control" name="FirmId">
                                                                <option value="">Select Firm</option>
                                                                <?php foreach($all_farm as $a_farm){?>
                                                                <option value="<?php echo $a_farm->FirmId?>"<?php if($acase->FirmId){if($acase->FirmId==$a_farm->FirmId){echo "selected";}} ?>><?php echo $a_farm->FirmName?></option>
                                                                <?php }?>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-companyid required">
                                                            <label class="control-label" for="">Attorney ID</label>
                                                            <select name="AttoernyId" id="cases-attoernyid" class="form-control">
                                                                
                                                                <option value="">---</option>                                    
                                                            </select>


                                                            <div class="help-block"></div>
                                                        </div>      

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-billingrate required">
                                                            <label class="control-label" for="cases-billingrate">Billing Rate</label>
                                                            <span id="commentBillingCode" style="color: red;"></span>

                                                            <input type="text" id="cases-billingrate" class="form-control" name="BillingRate" value="<?php if($acase->BillingRate){ echo $acase->BillingRate; }?>">
                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group field-cases-companyid required">
                                                            <label class="control-label" for="">Company ID</label>
                                                            <select name="CompanyId" id="cases-companyid" class="form-control">
                                                                <option value="">---</option>                                    
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>        
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
   
                                                        
                                                        <div class="form-group field-cases-companyid required">
                                                            <label class="control-label" for="">Contact ID</label>
                                                            <select name="ContactId" id="contact" class="form-control">
                                                                <option value="">---</option>                                    
                                                            </select>


                                                            <div class="help-block"></div>
                                                        </div>    
                                                    </div>
                                                    <div class="col-sm-4">
                                                         <div class="form-group field-cases-companyid required">
                                                            <label class="control-label" for="">Billing Contact ID</label>
                                                            <select name="BillingContactId" id="billing_contact" class="form-control">
                                                                <option value="">---</option>                                    
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>    
     

                                                    </div>
                                                    <div class="col-sm-4">
                                                   
                                                        
                                                         <div class="form-group field-cases-billingtype required">
                                                            <label class="control-label" for="cases-billingtype"> Billing Type</label>
                                                            <span id="comment3" style="color: red;"></span>
                                                            <select id="cases-billingtype" class="select-search form-control" name="BillingType">
                                                             <option value="">Select Billing Type</option>
                                                             <?php foreach ($all_billing_type as $a_all_billing_type){?>
                                                             <option value="<?php echo $a_all_billing_type->BillingTypeId?>"<?php echo set_select('BillingType', $a_all_billing_type->BillingTypeId, False); ?>><?php echo $a_all_billing_type->BillingType?></option>
                                                             <?php }?>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>  
                                                    </div>
                                                   
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Update</button>    </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <!-- /main charts -->


                    </div>
                    <!-- /main content -->
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


<script>
       $(function(){ 
        $('#cases-firmid').change(function () {
            var x = document.getElementById("billing_contact");
            x.remove(x.selectedIndex);
             var y = document.getElementById("contact");
            y.remove(y.selectedIndex);
          
           bill=$('#billing_contact').val('');
           $('#contact').val('');
          
            
            var firm_id = $('#cases-firmid').val();
//            alert(firm_id);
            $.ajax({
                url: '<?php echo site_url('cases/get_compnay_by_firm'); ?>',
                type: 'POST',
                data: {
                    firm_id: firm_id
                },
                success: function (data) {
                  
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#cases-companyid').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['CompanyId'] + '">' + value['CompanyName'] + '</option>';
                        //console.log(option_val);
                        $('#cases-companyid').append(option_val);
//                        showDiv();
                    });
                }
            });
            
            
            
            
            
            
              var firm_id = $('#cases-firmid').val();
//            alert(firm_id);
            $.ajax({
                url: '<?php echo site_url('cases/get_attorny_by_firm'); ?>',
                type: 'POST',
                data: {
                    firm_id: firm_id
                },
                success: function (data) {
                  
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#cases-attoernyid').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['AttorneyId'] + '">' + value['FirstName']+' '+ value['LastName']+ '</option>';
                        //console.log(option_val);
                        $('#cases-attoernyid').append(option_val);
//                        showDiv();
                    });
                }
            });
  
        });
        

        });
</script>


<script type="text/javascript">

// Form validation code will come here.
function validate()
{
    

    if (isNaN(document.f1.CaseNumber.value))
      {  
     commentCaseCode="Case Number should be a number!";
     document.getElementById('commentCaseCode').innerHTML=commentCaseCode;
     document.f1.CaseNumber.focus() ;
     return false;
     }  
      if (isNaN(document.f1.BillingRate.value))
      {  
     commentisNaN="Billing Rate should be a number!";
    document.getElementById('commentBillingCode').innerHTML=commentisNaN;
     document.f1.BillingRate.focus() ;
     return false;
      }  
   if( document.f1.CaseName.value == "" )
   {
   
     comment="Please provide your Case Name!";
    document.getElementById('comment1').innerHTML=comment;
     document.f1.CaseName.focus() ;
     return false;
   }
   
   
     if( document.f1.CaseName.value == "" )
   {
   
     comment="Please provide your Case Name!";
    document.getElementById('comment1').innerHTML=comment;
     document.f1.CaseName.focus() ;
     return false;
   }
   
   
   
   
   
   
   
   if( document.f1.CaseEmail.value == "" )
   {
    
     comment2="Please provide your Case Email!";
     document.getElementById('comment2').innerHTML=comment2;
     document.f1.CaseEmail.focus() ;
     return false;
   }
   var x = document.f1.CaseEmail.value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        comment3="Not a valid e-mail address !";
        document.getElementById('comment2').innerHTML=comment3;
     document.f1.CaseEmail.focus() ;
        return false;
    }
   if( document.f1.BillingRate.value == "" )
   {
     
      comment3="Please provide Billing Rate!";
     document.getElementById('commentBillingCode').innerHTML=comment3;
     document.f1.BillingType.focus() ;
     return false;
   }

   return( true );
   
   
   
  
 
}
//
</script>





<!--<script>
       $(function(){ 
        $('#cases-firmid').change(function () {
             var option_val = '<option value="">' + 'gvchff'+ '</option>';
                        //console.log(option_val);
                        $('#contact').append(option_val);
  
  
  
            var firm_id = $('#cases-firmid').val();
//            alert(firm_id);
            $.ajax({
                url: '<?php echo site_url('cases/get_attorny_by_firm'); ?>',
                type: 'POST',
                data: {
                    firm_id: firm_id
                },
                success: function (data) {
                  
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#cases-attoernyid').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['AttorneyId'] + '">' + value['FirstName']+' '+ value['LastName']+ '</option>';
                        //console.log(option_val);
                        $('#cases-attoernyid').append(option_val);
//                        showDiv();
                    });
                }
            });
        });
        

        });
</script>-->





<script>
       $(function(){ 
        $('#cases-companyid').change(function () {
            var companyid = $('#cases-companyid').val();
//            alert(firm_id);
            $.ajax({
                url: '<?php echo site_url('cases/get_contact_by_company'); ?>',
                type: 'POST',
                data: {
                    companyid: companyid
                },
                success: function (data) {
                 
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#contact').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['ContactId'] + '">' + value['FirstName']+' '+value['LastName'] + '</option>';
                        //console.log(option_val);
                        $('#contact').append(option_val);
//                        showDiv();
                    });
                }
            });
        });
        

        });
</script>






<script>
       $(function(){ 
        $('#cases-companyid').change(function () {
            var companyid = $('#cases-companyid').val();
//            alert(firm_id);
            $.ajax({
                url: '<?php echo site_url('cases/get_contact_by_company'); ?>',
                type: 'POST',
                data: {
                    companyid: companyid
                },
                success: function (data) {
                  
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#billing_contact').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['ContactId'] + '">' + value['FirstName']+' '+value['LastName'] + '</option>';
                        //console.log(option_val);
                        $('#billing_contact').append(option_val);
//                        showDiv();
                    });
                }
            });
        });
        

        });
</script>


















<script>
    $( document ).ready(function() {
    v=$('#hidden_billing_contact_id').val();
   // alert(v);
     $.ajax({
                url: '<?php echo site_url('cases/get_contact_by_contact'); ?>',
                type: 'POST',
                data: {
                    contactid: v
                },
                success: function (data) {
                 // alert(data);
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#billing_contact').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['ContactId'] + '"'+'selected'+'>' + value['FirstName']+' '+value['LastName'] + '</option>';
                      // alert(option_val);
                        $('#billing_contact').append(option_val);
//                        showDiv();
                    });
    
    
    
}})});

</script>


<script>
    $( document ).ready(function() {
    v=$('#hidden_contact_id').val();
   // alert(v);
     $.ajax({
                url: '<?php echo site_url('cases/get_contact_by_contact'); ?>',
                type: 'POST',
                data: {
                    contactid: v
                },
                success: function (data) {
                 // alert(data);
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#contact').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['ContactId'] + '"'+'selected'+'>' + value['FirstName']+' '+value['LastName'] + '</option>';
                     //  alert(option_val);
                        $('#contact').append(option_val);
//                        showDiv();
                    });
    
    
    
}})});

</script>







<script>
    $( document ).ready(function() {
    v=$('#hidden_company_id').val();
  //  alert(v);
     $.ajax({
                url: '<?php echo site_url('cases/get_company_by_company'); ?>',
                type: 'POST',
                data: {
                    contactid: v
                },
                success: function (data) {
                 // alert(data);
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#cases-companyid').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['CompanyId'] + '"'+'selected'+'>' + value['CompanyName']+'</option>';
                     //  alert(option_val);
                        $('#cases-companyid').append(option_val);
//                        showDiv();
                    });
    
    
    
}})});

</script>



















