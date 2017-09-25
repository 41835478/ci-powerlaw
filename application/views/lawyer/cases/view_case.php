<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">



            <div class="page-container">

                <!-- Page content -->
                <div class="page-content">
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-fixed">
                            <div class="sidebar-content">

                                <!-- Task navigation -->
                                <div class="sidebar-category sidebar-category-visible">
                                    <div class="category-title">
                                        <span>Case Information</span>
                                        <ul class="icons-list">
                                            <li><a href="#" data-action="collapse"></a></li>
                                        </ul>
                                    </div>

                                    <div class="category-content no-padding">
                                        <div class="col-xs-12 case-view-sidebar">
                                            <div class="col-xs-12">
                                                <h6>Case Name</h6>
                                                <p><?php if($case_details){ if($case_details->CaseName){echo $case_details->CaseName;}else{echo "Not Set";}}?></p>
                                            </div>
                                            <div class="col-xs-12">
                                                <h6>Case Number</h6>
                                                <p><?php if($case_details){if($case_details->CaseNumber){echo $case_details->CaseNumber;}else{echo "Not Set";}}?></p>
                                            </div>
                                            <div class="col-xs-12">
                                                <h6>Date Opened</h6>
                                                <p><?php if($case_details){if($case_details->DateOpen){$timestamp = strtotime($case_details->DateOpen); echo date("jS F Y", $timestamp);}else{echo "Not Set";}}?></p>
                                            </div>
                                            <div class="col-xs-12">
                                                <h6>Practice Area</h6>
                                                <p><?php if($case_details){if($practice_area){echo $practice_area->PracticeArea;}else{echo "Not Set";}}?></p>
                                            </div>
                                            <div class="col-xs-12">
                                                <h6>Contact Link</h6>
                                                <p><?php if($case_details->ContactId){if($contact_Person){echo $contact_Person->FirstName.' '.$contact_Person->LastName;}else{echo "Not Set";}}?></p>
                                            </div>
                                            <div class="col-xs-12">
                                                <h6>Staff Link</h6>
                                                <p><?php if($case_details){ if($a_User){echo $a_User->fullname;if($contact_group){echo '('.$contact_group->GroupName.')';}}else{echo "Not Set";}?><?php if($contact_group){echo '('.$contact_group->GroupName.')';}}?></p>
                                            </div>
                                            <?php if($case_details->caseStatus == '1'){?>
                                             <a href="<?php echo base_url()?>closeCase/<?php echo $this->uri->segment('3'); ?>"><button class="btn btn-info" style="margin: 5px auto">Close Case</button></a>
                                            <?php } else { ?>
                                             <a href="<?php echo base_url()?>reopenCase/<?php echo $this->uri->segment('3'); ?>"><button class="btn btn-info" style="margin: 5px auto">Reopen Case</button></a>
                                            <?php } ?>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <!-- /task navigation -->
                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">

                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">
                                                <ul class="list-unstyled list-inline">
                                                    <li><button class="btn btn-info" onclick="showItem(1)">Items & Info</button></li>
                                                    <li><button class="btn btn-info" onclick="showItem(2)">Time & Billing</button></li>
                                                    <li><button class="btn btn-info" onclick="showItem(3)">Contact & Staff Link</button></li>
                                                </ul>
                                                <!--<h5 class="panel-title">Create Cases</h5>-->
                                            </legend>
                                        </fieldset>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-xs-12" id="items" style="display: block;">
                                            <div class="col-xs-6">
                                                <h5>Case Information</h5>
                                                <table class="table table-responsive">
                                                    <tr style="border-top: none !important;">
                                                        <td>Name</td>
                                                        <td><?php if($case_details){ if($case_details->CaseName){echo $case_details->CaseName;}else{echo "Not Set";}}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Case Number</td>
                                                        <td><?php if($case_details){  if($case_details->CaseNumber){echo $case_details->CaseNumber;}else{echo "Not Set";}}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Practice Area</td>
                                                        <td><?php if($case_details){if($practice_area){echo $practice_area->PracticeArea;}else{echo "Not Set";}}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td><?php if($case_details){if($case_details->Description){echo $case_details->Description;}else{echo "Not Set";}}?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-xs-6">
                                                <h5>Important Dates</h5>
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td>Date Opened</td>
                                                        <td><?php if($case_details){if($case_details->DateOpen){$timestamp = strtotime($case_details->DateOpen); echo date("jS F Y", $timestamp);}else{echo "Not Set";}}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date Closed</td>
                                                        <td>05/05/2017(not ready)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Statue Limitation</td>
                                                        <td><?php if($case_details){if($case_details->StatuteOfLimitations){$timestamp = strtotime($case_details->StatuteOfLimitations); echo date("jS F Y", $timestamp);}else{echo "Not Set";}}?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-xs-12" id="time" style="display: none;">
                                            <div class="col-xs-8">
                                                <h5>Case Billing Information</h5>
                                                <table class="table table-responsive">
                                                    <tr style="border-top: none !important;">
                                                        <td>Fee Structure</td>
                                                        <td><?php if($case_details){ if($billing_type){ if($billing_type->BillingType){echo $billing_type->BillingType;}else{echo "Not Set";}}}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Billing Contact</td>
                                                        <td><?php if($case_details){ if($billing_Contact){ if($billing_Contact->FirstName||$billing_Contact->LastName){echo $billing_Contact->FirstName.' '.$billing_Contact->LastName;}else{echo "Not Set";}}}?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-xs-4">
                                                
                                            </div>
                                            <div class="col-xs-8">
                                                <h5>Un-Invoiced Balances</h5>
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td>Time Entries</td>
                                                        <td>0.00(not ready)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Expenses</td>
                                                        <td>0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Balance</td>
                                                        <td>0.00 (not ready)</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-xs-4">
                                                
                                            </div>
                                            <div class="col-xs-8">
                                                <h5>Un-Invoiced Balances</h5>
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td>Available Balance</td>
                                                        <td>0.00 (not ready)</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-xs-4">
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-xs-12" id="contact" style="display: none;">
                                            <div class="col-xs-6">
                                                <h5>Contact Link</h5>
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td>
                                                            <?php if($case_details){ if($contact_Person){ ?>
                                                            <a href=""><?php echo $contact_Person->FirstName.' '.$contact_Person->LastName; ?><?php if($contact_group){echo '('.$contact_group->GroupName.')';}?></a>
                                                            <?php } else { ?>
                                                            <?php echo "Not Set";?>
                                                            <?php } }?>
                                                        </td>
                                                      
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                            <div class="col-xs-6">
                                                <h5>Staff Link</h5>
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td><a href="<?php if($case_details) echo base_url().'edituserprofile/'.$a_User->id?>"><?php if($case_details){ if($a_User){echo $a_User->fullname;}}?></a></td>
                                                        <td><a href=""><?php if($case_details){if($case_details->BillingRate){echo $case_details->BillingRate.'/hr';}else{echo "Not Set";}}?></a></td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
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
     function showItem(val){
         if(val == 1){
             document.getElementById('items').style.display = "block";
             document.getElementById('time').style.display = "none";
             document.getElementById('contact').style.display = "none";
         }
         if(val == 2){
             document.getElementById('items').style.display = "none";
             document.getElementById('time').style.display = "block";
             document.getElementById('contact').style.display = "none";
         }
         if(val == 3){
             document.getElementById('items').style.display = "none";
             document.getElementById('time').style.display = "none";
             document.getElementById('contact').style.display = "block";
         }
     }
</script>