<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>cases">Case</a></li>
        </ol>
    </div>
</div>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
    table.dataTable.select tbody tr,
table.dataTable thead th:first-child {
  cursor: pointer;
}
</style>

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
                                                    <h5 class="panel-title">Create Cases</h5>
                                                    <div>

                                                        </legend>
                                                        </fieldset>
                                                        <div class="success">
                                                            <?php if ($this->session->flashdata('insertsuccess')) { ?>
                                                                <p style="color: green"><?php echo $this->session->flashdata('insertsuccess') ?><p>
                                                                <?php } ?> 
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">

                                                        <div class="cases-form">

                                                           <form id="w0"  onsubmit="return(validate());" name="f1" action="<?php echo base_url(),'cases/AddCase'?>" method="post">
                                                                <input type="hidden" name="_csrf" value="WlBMdk9KcWkKFgUPBSMSURM6IwYmBigvDhUlM38wIzpjPgEiYnw2Xg==">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-casename required">
                                                                            <label class="control-label" for="cases-casename">Case Name</label>
                                                                            <span id="comment1" style="color: red;"></span>
                                                                            <input type="text" id="cases-casename" class="form-control" name="CaseName" maxlength="255" value="<?php echo set_value('CaseName'); ?>">

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-casenumber required">
                                                                            <label class="control-label" for="cases-casenumber">Case Number</label>
                                                                            <span id="commentCaseCode" style="color: red;"></span>
                                                                            <input type="text" id="cases-casenumber" class="form-control" name="CaseNumber" maxlength="255" value="<?php echo set_value('CaseNumber'); ?>">

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-caseemail required">
                                                                            <label class="control-label" for="cases-caseemail">Case Email</label>
                                                                            <span id="comment2" style="color: red;"></span>
                                                                            <input type="text" id="cases-caseemail" class="form-control" name="CaseEmail" maxlength="255" value="<?php echo set_value('CaseEmail'); ?>">

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
                                                                                <input type="text" id="cases-dateopen" class="pickadate-editable form-control" name="DateOpen" data-provide="datepicker" vlaue="<?php echo set_value('DateOpen'); ?>">

                                                                            </div>
                                                                            <div class="help-block"></div>

                                                                        </div> 

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-practicearea required">
                                                                            <label class="control-label" for="cases-practicearea">Practice Area</label>
                                                                            <select id="cases-practicearea" class="select-search form-control" name="PracticeArea">
                                                                                <option value="" >Select Practice Area</option>
                                                                                <?php foreach ($all_practice_area as $a_practice_area) { ?>
                                                                                    <option value="<?php echo $a_practice_area->PracticeAreaId; ?>"<?php echo set_select('PracticeArea', $a_practice_area->PracticeAreaId, False); ?>><?php echo $a_practice_area->PracticeArea; ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-description required">
                                                                            <label class="control-label" for="cases-description">Description</label>
                                                                            <textarea id="cases-description" class="form-control" name="Description" rows="1"><?php echo set_value('Description'); ?></textarea>

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
                                                                                <input type="text" id="cases-statuteoflimitations" class="pickadate-editable form-control" name="StatuteOfLimitations" data-provide="datepicker" vlaue="<?php echo set_value('StatuteOfLimitations'); ?>">

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
                                                                                <input type="text" id="cases-remindersol" class="pickadate-editable form-control" name="ReminderSOL" data-provide="datepicker" vlaue="<?php echo set_value('ReminderSOL'); ?>">

                                                                            </div>
                                                                            <div class="help-block"></div>

                                                                        </div> 

                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-firmid required">
                                                                            <label class="control-label" for="cases-firmid">Firm ID</label>
                                                                            <input type="text" id="cases-firmid" class="form-control"  maxlength="255"  name="FirmId" value="<?php if($a_farm){echo $a_farm->FirmName;} ?>" readonly="">
                                                                            <input type="hidden" id="cases-firm" class="form-control"  name="Firm" value="<?php if($a_farm){echo $a_farm->FirmId;} ?>">

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                </div>
                                                                <div class="row" id="staffdiv" style="display:none; margin: 20px; background: #ddd; padding: 20px;">

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group field-cases-companyid required" id="companydiv">
                                                                            <label class="control-label" for="">Company ID</label>
                                                                            <select name="CompanyId" id="cases-companyid" class="form-control">
                                                                                
                                                                                <option value="">---</option>  
                                                                                <?php if($company){foreach($company as $acompany){?>
                                                                                <option value="<?php echo $acompany->CompanyId;?>"><?php echo $acompany->CompanyName;?></option>       
                                                                                <?php }}?>
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>        
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <button onclick="addnewcompany()"  type="button" style="margin-top: 25px;" class="btn btn-default">Add New Company</button>
                                                                      
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-4">


                                                                        <div class="form-group field-cases-companyid required">
                                                                            <label class="control-label" for="">Contact ID</label>
                                                                            <select name="ContactId" id="contact" class="form-control">
                                                                                <option value="">Select Contact</option>
                                                                                <?php foreach ($all_contact as $contact) { ?>
                                                                                    <option value="<?php echo $contact['ContactId'] ?>"><?php echo $contact['FirstName'] ?><?php echo $contact['LastName'] ?></option>
                                                                                <?php } ?>
                                                                            </select>




                                                                            <div class="help-block"></div>
                                                                        </div>    
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <button onclick="return(addnewcontact());" style="margin-top: 25px;" class="btn btn-default" type="button">Add New Contact</button>
                                                                         <span id="addcomfirst" style="color: red;"></span>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                    </div>

                                                                </div>
                                                                <div class="row">
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
                                                                                <?php foreach ($all_billing_type as $a_all_billing_type) { ?>
                                                                                    <option value="<?php echo $a_all_billing_type->BillingTypeId ?>"<?php echo set_select('BillingType', $a_all_billing_type->BillingTypeId, False); ?>><?php echo $a_all_billing_type->BillingType ?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                            <div class="help-block"></div>
                                                                        </div>  
                                                               
                                                                    </div>
                                                                     <div class="col-sm-4">
                                                         
                                                    </div>
                                                                </div>

                                                                <!---------------------------------ADD ASSIGN STAFF---------------------------------------->


                                                                <div class="row" id="staff">


                                                                    <div class="col-md-12">
                                                                        <h4>Staff Link</h4>
                                                                        <?php if($all_staff){?>
                                                                    
                                                                        <div class="table-responsive">
                                                                            

                                                                            <table id="mytable" class="table table-bordred table-striped">

                                                                                <thead>

                                                                                <th></th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>User Type</th>
                                                                             
                                                                                <th>Billing Rate</th>

                                                                                
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><input type="checkbox" extra="extra"  class="selectall" id="checkall" value="<?php $all_staff;?>"/></td>
                                                                               
                                                                                <td>Select All Firm Users</td>

                                                                                </tr>
                                                                                
                                                                                <?php $i=1;foreach($all_staff as $a_staff_for_assign){?>
                                                                                <tr id="firsttr">
                                                                                    
                                                                                    <td><div id="checkboxlist"><input type="checkbox" class="checkthis" id="checkfield" extra="<?php echo 'extra'.$i++?>" value="<?php echo $a_staff_for_assign['id'].','.$a_staff_for_assign['DefaultRate'];?>" />   </div></td>
                                                                                        <td id="firsttd"><?php echo $a_staff_for_assign['FirstName']?></td>
                                                                                        <td><?php echo $a_staff_for_assign['LastName']?><input type="hidden" name="lastname[]" id="lastname" value="<?php echo $a_staff_for_assign['LastName']?>"></td>
                                                                                        <td><?php if($a_staff_for_assign['status']==1){echo 'Attorney';}elseif($a_staff_for_assign['status']==2){echo 'Paralegal';}elseif($a_staff_for_assign['status']==3){echo'Staff';}?></td>
                                                                                        <td><input type="text" id="checkeddis" name="BillingRate[]" value="<?php echo $a_staff_for_assign['DefaultRate'];?>" ><span id="commentBillingCode" style="color: red;"></span></td>
                                                                              
                                                                                
                                                                                                                 
                                                                                
                                                                                
                                                                                
                                                                                <div id="firstN"></div>
                                                                                <div id="lastN"></div>
                                                                                <div id="status"></div>
                                                                                    </tr>
                                                                                <?php }?>
                                                                                   
                                                                                 
                                                                                </tbody>

                                                                            </table>
                                                                            

                                                                            <div class="clearfix"></div>
                                                                           
                                                                        </div>
                                                                        <?php }else{?><p style="color: red">There are no Staff to show</p><?php }?>
                                                                    </div>
                                                                </div>



                                           


                                                
                                                <div id="try">
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Create</button>    </div>

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
                                               

                                               
                                                <!-- /main content -->
                                                <div class="footer text-muted">
                                                    &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
                                                </div>
                                                </div>
                                                <!-- /page content -->

                                                <!-- Footer -->

                                                <!-- /footer -->

                                                </div>
                                                <!-- /page container -->

                                                <!---------------------------------ADD NEW CONTACT MODAL---------------------------------------->
                                                <!-- Modal -->
                                                <div id="contactmodal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Client & Contact Link</h4>
                                                            </div>
                                                            <form id="contactform" name="f2" method="post">
                                                                <div class="modal-body">
                                                                    <p>Add New Client or Contact to this case </p>
                                                                     <span id="commentexist" style="color: red;"></span>
                                                                       <span id="commentsuccess" style="color: green;"></span>
                                                                    <div class="form-group field-cases-casename required">
                                                                         
                                                                        
                                                                        <label class="control-label" for="cases-casename">First Name</label>
                                                                       <span id="comment1stname" style="color: red;"></span>
                                                                        <input type="text" id="firstname" class="form-control" name="firstName" maxlength="255" value="">

                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Last Name</label>
                                                                         <span id="commentlastName" style="color: red;"></span>
                                                                        <input type="text" id="lastName" class="form-control" name="lastName" maxlength="255" value="">

                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Email</label>
                                                                         <span id="commentemail" style="color: red;"></span>
                                                                        <input type="text" id="email" class="form-control" name="email" maxlength="255" value="">
                                                                         <input type="hidden" id="companyidcon" name="companyforcontact" value="">
                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Group</label>
                                                                        <select id="cases-practicearea" class="select-search form-control" name="GroupName">
                                                                            <option value="" >Select Group</option>
                                                                            <?php foreach ($contactgroup as $group) { ?>
                                                                                <option value="<?php echo $group['GroupId']; ?>"><?php echo $group['GroupName']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div> 
                                                                    <input type="hidden" name="firmid" value="<?php if($a_farm){echo $a_farm->FirmId;} ?>" id="firmid">
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">MyCase Client Portal Access</label><br>
                                                                        <input id="portalaccess" name="status" class="form-control" type="checkbox" checked data-toggle="toggle" data-on="ENABLED" data-off="DISABLED" data-onstyle="success" data-offstyle="danger" data-width="30%">

                                                                        <p id="activediv"> Securely communicate and share documents, invoices, and messages with this client. Clients will only have access to items that you explicitly share. This access can be changed at any time. What will my client see?</p>
                                                                        <p id="inactivediv" style="display: none"> SYou will not be able to communicate or share items (including invoices for online payments) with this client via the portal.</p>
                                                                    </div> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" onclick="addcontactval()" class="btn btn-success" id="submitcontactbtn">Add Contact & Close</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>

                                               <!-- company modal -->
                                              <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                     <div class="modal-content">
                                                      <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Client & Contact Link</h4>
                                                            </div>
                                                
                                                       
                                                                <form id="companyform" name="f3" method="post">
                                                                <div class="modal-body">
                                                                    <p>Add New Company to this case </p>
                                                                     
                                                                       <span id="commentsuccesscompany" style="color: green;"></span>
      
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Company Name</label>
                                                                         <span id="commentcompanyName" style="color: red;"></span>
                                                                        <input type="text" id="companyname" class="form-control" name="companyName" maxlength="255" value="">

                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                    <div class="form-group field-cases-casename required">
                                                                        <label class="control-label" for="cases-casename">Company Email</label>
                                                                         <span id="commentemailcompany" style="color: red;"></span>
                                                                          <span id="commentemailcompanyreq" style="color: red;"></span>
                                                                           <span id="commentexistcompany" style="color: red;"></span>
                                                                         
                                                                        <input type="text" id="companyemail" class="form-control" name="companyEmail" maxlength="255" value="">
                                                                        <input type="hidden" name="FirmId"  value="<?php if($a_farm){echo $a_farm->FirmId;} ?>">
                                                                        <div class="help-block"></div>
                                                                    </div> 
                                                                   
                                                                  
                                                                <div class="modal-footer">
                                                                    <button type="button" onclick="addcompanyval()" class="btn btn-success" id="submitcontactbtn">Add Contact & Close</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                                       </div>
                                                            </form>
                                          
                                               
                                             </div>
                                            </div>
                                                  </div>
                                        
                                              
                                                
                                                
                                                
                                                
                                                <script type="text/javascript">
                                                    $('#cases-firmid').change(function () {
                                                        var firm_id = $('#cases-firmid').val();
                                                      //  alert(firm_id);
                                                        $.ajax({
                                                            url: '<?php echo site_url('getstaffnamebyfirmid'); ?>',
                                                            type: 'POST',
                                                            data: {
                                                                firm_id: firm_id
                                                            },
                                                            success: function (data) {
                                                                var hhh = JSON.parse(data);
                                                                console.log(hhh);
                                                                $('#staffdiv').html(hhh.staffdiv);
                                                                $('#staffdiv').show();
                                                                $('#companydiv').html('');
                                                                $('#companydiv').html(hhh.companydiv);

                                                            }
                                                        });
                                                    });

                                                    function addnewcontact() {
                                                    company=$('#cases-companyid').val();
                                                   if(company!=''){
                                                        var firm_id = $('#cases-firmid').val();
                                                          $('#companyidcon').val(company);  
                                                      //  alert('fouzia');
                                                      //  alert(firm_id);
                                                        $('#firmid').val(firm_id);
                                                        $('#contactmodal').modal('show');
                                                   }else{
                                                      addcomfirst = "Plese select a Company,for new contact!";
                                                      document.getElementById('addcomfirst').innerHTML = addcomfirst;
                                                   }
                                                       

                                                    }
                                                     function addnewcompany() {
                                                        $('#myModal').modal('show');

                                                    }
                                                    


                                                    $("#portalaccess").change(function () {
                                                        if ($(this).prop("checked") == true) {
                                                            $('#activediv').show();
                                                            $('#inactivediv').hide();
                                                        } else {
                                                            $('#activediv').hide();
                                                            $('#inactivediv').show();
                                                        }
                                                    });

//                                                    $('#submitcontactbtn').click(function () {
//                                                        var form = $("#contactform").serialize();
//                                                        //alert(form);
//                                                        $.ajax({
//                                                            url: '<?php echo base_url() ?>submitnewcontact',
//                                                            type: 'POST',
//                                                            data: {
//                                                                data: form,
//                                                            },
//                                                            dataType: "json",
//                                                            success: function (data) {
//                                                                console.log(data);
//                                                               // $('#staffdiv').html(hhh.staffdiv);
//                                                               // $('#staffdiv').show();
//                                                              //  $('#companydiv').html('');
//                                                               // $('#companydiv').html(hhh.companydiv);
//
//                                                            }
//                                                        });
//
//                                                    });
                                                </script>


                                                <script type="text/javascript">

                                                    // Form validation code will come here.
                                                    function validate()
                                                    {


                                                        if (isNaN(document.f1.CaseNumber.value))
                                                        {
                                                            commentCaseCode = "Case Number should be a number!";
                                                            document.getElementById('commentCaseCode').innerHTML = commentCaseCode;
                                                            document.f1.CaseNumber.focus();
                                                            return false;
                                                        }
//                                                        if (isNaN(document.f1.BillingRate.value))
//                                                        {
//                                                            commentisNaN = "Billing Rate should be a number!";
//                                                            document.getElementById('commentBillingCode').innerHTML = commentisNaN;
//                                                            document.f1.BillingRate.focus();
//                                                            return false;
//                                                        }
                                                        if (document.f1.CaseName.value == "")
                                                        {

                                                            comment = "Please provide your Case Name!";
                                                            document.getElementById('comment1').innerHTML = comment;
                                                            document.f1.CaseName.focus();
                                                            return false;
                                                        }


                                                        if (document.f1.CaseEmail.value == "")
                                                        {

                                                            comment2 = "Please provide your Case Email!";
                                                            document.getElementById('comment2').innerHTML = comment2;
                                                            document.f1.CaseEmail.focus();
                                                            return false;
                                                        }
                                                        var x = document.f1.CaseEmail.value;
                                                        var atpos = x.indexOf("@");
                                                        var dotpos = x.lastIndexOf(".");
                                                        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
                                                            comment3 = "Not a valid e-mail address !";
                                                            document.getElementById('comment2').innerHTML = comment3;
                                                            document.f1.CaseEmail.focus();
                                                            return false;
                                                        }
//                                                        if (document.f1.BillingRate.value == "")
//                                                        {
//
//                                                            comment3 = "Please provide Billing Rate!";
//                                                            document.getElementById('commentBillingCode').innerHTML = comment3;
//                                                            document.f1.BillingType.focus();
//                                                            return false;
//                                                        }






if (document.f1.CaseEmail.value != "")
                                                        {

                                                           a=document.f1.CaseEmail.value;

                                                            $.ajax({
                url: '<?php echo site_url('cases/check_email'); ?>',
                type: 'POST',
           
               
                    CaseEmail: a,
             
                success: function (data) {
                    if(data=='TRUE1'){
                       comment4 = "This mail already have !";
                                                            document.getElementById('comment2').innerHTML = '';
                                                             document.getElementById('comment2').innerHTML = comment4;
                                                            document.f1.CaseEmail.focus();
                                                             return(false);
                    }else{
                         return(true);
                    }
                  
              

                       }
            });
                                                       
                                                           
                                                        }
                                                            



                                                        
                                                        return(true);





                                                    }
                                                    //
                                                </script>





                                                <script>
                                                    $(function () {
                                                        $('#cases-firmid').change(function () {
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
                                                                        var option_val = '<option value="' + value['AttorneyId'] + '">' + value['FirstName'] + ' ' + value['LastName'] + '</option>';
                                                                        //console.log(option_val);
                                                                        $('#cases-attoernyid').append(option_val);
                                                                        //                        showDiv();
                                                                    });
                                                                }
                                                            });
                                                        });


                                                    });
                                                </script>





                                                <script>
                                                    $(function () {
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
                                                                        var option_val = '<option value="' + value['ContactId'] + '">' + value['FirstName'] + ' ' + value['LastName'] + '</option>';
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
                                                    $(function () {
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
                                                                        var option_val = '<option value="' + value['ContactId'] + '">' + value['FirstName'] + ' ' + value['LastName'] + '</option>';
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
                                                    i=1;
                                              
$('#checkboxlist input[type="checkbox"]'). click(function(){
   
alert('ewr');
    var newArray = [];
if($(this). prop("checked") == true){

  
    
 $("#checkeddis").removeAttr('disabled');
 var value =$(this).val(); 
 
 newArray.push(value);


if($(this).attr('extra')){

 t='<input '+'name'+'='+'"'+'newname[]'+'"'+'type'+'='+'"'+'text'+'" '+'id'+'='+'"'+'extra'+i++ +'"'+'value'+'='+newArray+'>'
  //$("#staff").after(t);
  $(this).after(t); 

}}else{
 var value =$(this).attr('extra'); 

hh=$('#'+value).remove();


 
 


}


})
                                                 
                                                </script>
                                                <script>
                                                    function validation(){
                                                      //  alert('jfdhgbnvu');
                                                        firstname=$('#firstname').val();
                                                         lastName=$('#lastName').val();
                                                          email=$('#email').val();
                                                     
                                                     if (firstname== "")
                                                        {

                                                            comment = "	First name can't be blank";
                                                            document.getElementById('comment1stname').innerHTML = comment;
                                                            document.f2.firstName.focus();
                                                            return false;
                                                        }
                                                     if (lastName== "")
                                                        {

                                                            comment = "	Last name can't be blank";
                                                            document.getElementById('commentlastName').innerHTML = comment;
                                                            document.f2.lastName.focus();
                                                            return false;
                                                        }
                                                        if (email== "")
                                                        {

                                                            comment = "	Email is required";
                                                            document.getElementById('commentemail').innerHTML = comment;
                                                            document.f2.email.focus();
                                                            return false;
                                                        }
                                                        
                                                        
                                                        var atpos = email.indexOf("@");
                                                        var dotpos = email.lastIndexOf(".");
                                                        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                                                            commentemail = "Not a valid e-mail address !";
                                                            document.getElementById('commentemail').innerHTML = '';
                                                             document.getElementById('commentemail').innerHTML = commentemail;
                                                            document.f2.email.focus();
                                                            return false;
                                                        }
   
                                                       
                                                       return(true); 
                                                     
                                                        //alert(form);
                                                 

//                                                    });
                                                       
                                                       
                                                    }
                                                
                                                </script>
                                                 <script>
                                                   function addcontactval(){
                                                       gg=validation();
                                                  
                                                     if(gg==true){
                                                         if(firstname && lastName !=''){
                                                   
                                                           $.ajax({
                                                            url: '<?php echo base_url() ?>Cases/checkcontact',
                                                            type: 'POST',
                                                            data: {
                                                                firstname: firstname,
                                                                lastName: lastName,
                                                            },
                                                            dataType: "json",
                                                            success: function (data) {
                                                              // alert(data);
                                                               if(data==2){
                                                                   commentcheck = "A contact already exists with that name";
                                                            document.getElementById('commentexist').innerHTML = '';
                                                             document.getElementById('commentexist').innerHTML = commentcheck;
                                                            document.f2.email.focus();
                                                            return false;
                                                        }
//                                                               else{
                                                                  document.getElementById('commentexist').innerHTML = '';
                                                          addcontact(); 
//                                                                
//                                                               }
                                                              
                                                               
                                                            }
                                                        });
                                                         
                                                        }
                                  
                                            }  
                                           // return true;
                                           }     
                                               </script>
                                                

                                                
                                                
                                                
                                               <script>
                                                   function addcontact(){
                       
                                                      var form = $('#contactform').serialize();
                                                     //  alert(form);
                                                        $.ajax({
                                                            url: '<?php echo base_url() ?>Cases/addcontact',
                                                            type: 'POST',
                                                           
                                                            data: form,
                                                            //dataType: "json",
                                                            
                                                            success: function (dataa) {
                                                               
                                                              //  alert(dataa);
                                                                
                                                                  document.getElementById('commentsuccess').innerHTML = dataa;
                                                                
                                                                
                                                                  window.setTimeout(function(){location.reload()},1000)
                                                                
                                                                
//                                                               
                                                          }
                                                       });

                                                     }
                                                   
                                                   
                                               </script>
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               
                                               //company
                                               
                                               
                                                     <script>
                                                    function validation2(){
                                                        companyname=$('#companyname').val();
                                                        companyemail=$('#companyemail').val();
                                                     if (companyname== "")
                                                        {
                                                            comment = "	Company name can't be blank";
                                                            document.getElementById('commentcompanyName').innerHTML = comment;
                                                            document.f3.companyName.focus();
                                                            return false;
                                                        }
                                                        if (companyemail== "")
                                                        {
                                                            comment = "	Company email can't be blank";
                                                            document.getElementById('commentemailcompanyreq').innerHTML = comment;
                                                            document.f3.companyemail.focus();
                                                            return false;
                                                        }
                                                        
                                                        if(companyemail){
                                                          var atpos = companyemail.indexOf("@");
                                                        var dotpos = companyemail.lastIndexOf(".");
                                                        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= companyemail.length) {
                                                            commentemail = "Not a valid e-mail address !";
                                                            document.getElementById('commentemailcompany').innerHTML = '';
                                                             document.getElementById('commentemailcompanyreq').innerHTML = '';
                                                             document.getElementById('commentemailcompany').innerHTML = commentemail;
                                                            document.f3.companyemail.focus();
                                                            return false;
                                                        }
      
                                                            
                                                        }
                                                         document.getElementById('commentcompanyName').innerHTML ='';
                                                          document.getElementById('commentemailcompanyreq').innerHTML = '';
                                                          document.getElementById('commentemailcompany').innerHTML = '';
                                                       return(true);  
                                                    }
                                                
                                                </script>
                                                 <script>
                                                   function addcompanyval(){
                                                     gg=validation2();
                                                      if(gg==true){
                                                          if(companyemail){
                                                               $.ajax({
                                                            url: '<?php echo base_url() ?>Cases/companyexist',
                                                            type: 'POST',
                                                           
                                                            data: {
                                                                companyemail: companyemail,
                                                              
                                                            },
                                                            //dataType: "json",
                                                            
                                                            success: function (data) {                                       
                                                                  if(data==2){
                                                                   commentcheckcompany = "Email has already been taken";
                                                            document.getElementById('commentexistcompany').innerHTML = '';
                                                             document.getElementById('commentexistcompany').innerHTML = commentcheckcompany;
                                                            document.f3.companyEmail.focus();
                                                            return false;
                                                        } else{
                                                           addcompany();
                                                        }     
                                                          }
                                                       });
 
                                                          }
                                                       
                                                      }
                                            }  
                                           // return true;
                                            
                                               </script>
                                                

                                                
                                                
                                                
                                               <script>
                                                   function addcompany(){
                                                      
                                                      var form = $('#companyform').serialize();
                                                     
                                                        $.ajax({
                                                            url: '<?php echo base_url() ?>Cases/addcompany',
                                                            type: 'POST',
                                                           
                                                            data: form,
                                                            //dataType: "json",
                                                            
                                                            success: function (dataa) {
                                                               
                                                               // alert(dataa);
                                                                
                                                                  document.getElementById('commentsuccesscompany').innerHTML = dataa;
                                                                
                                                                
                                                                  window.setTimeout(function(){location.reload()},1000)
                                                                
                                                                
//                                                               
                                                          }
                                                       });

                                                     }
                                                   
                                                   
                                               </script>
                                               <script>
                                                   
                                                   
                                                   
                                                   
                                               $('#checkall').click(function() {
                                                   //alert('dfhgfh');
                                                    var checkboxesChecked = [];
                                                 if ($(this).is(':checked')) {
                                                      $('#checkboxlist input[type="checkbox"]').prop('checked', true);
                                                     $('#checkboxlist input[type="checkbox"]').each(function(){
                                                        checkboxesChecked.push($(this).val());
                                                         t='<input '+'name'+'='+'"'+'newname[]'+'"'+'type'+'='+'"'+'hidden'+'" '+'id'+'='+'"'+'extra'+'"'+'value'+'='+checkboxesChecked+'>'
});                                                        $(this).after(t); 
                                                       } else {
                                                           $('#checkboxlist input[type="checkbox"]').prop('checked', false);
                                                            var value =$(this).attr('extra'); 

                                                            hh=$('#'+value).remove();

                                                  }
                                                 });</script>