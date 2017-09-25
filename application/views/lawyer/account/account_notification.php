<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page container -->
            <div class="page-container">

                <!-- Page content -->
                <div class="page-content">
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-fixed">
                            <div class="sidebar-content">
                                <!-- Title -->
                                <div class="category-title h6" style="display:none;">
                                    <span>Components</span>
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-gear"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /title -->
                                <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE); ?>

                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">
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
                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <fieldset class="content-group">
                                            <legend class="text-bold">Notification Settings</legend>
                                        </fieldset>
                                    </div>
                                    <div class="panel-body">
                                        <style type="text/css">
                                            label{
                                                font-weight:bold;
                                            }

                                            .form-group label{
                                                color: #FFF;
                                            }

                                        </style>
                                        <div class="notifications-form">

                                            <form id="w0" action="<?php echo base_url()?>updatenotificationinfo" method="post">
                                                <input type="hidden" name="_csrf" value="dDlIbEJiN3gkfwEVCAtUQD1TJxwrLm4.IHwhKXIYZStNVwU4b1RwTw==">
                                                <div class="row">
                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-4">
                                                        <label>
                                                            Email Notification Frequency
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4" style="margin-left: -70px;">
                                                        <div class="form-group field-notifications-notificationfrequency required">

                                                            <select id="notifications-notificationfrequency" class="select-search form-control" name="NotificationFrequency">
                                                                <option value="5" <?php if(isset($usernotification) && $usernotification->NotificationFrequency == '5'){ echo 'Selected' ;}?> >Send Every 5 minutes</option>
                                                                <option value="15" <?php if(isset($usernotification) && $usernotification->NotificationFrequency == '15'){ echo 'Selected' ;}?> >Every 15 minutes</option>
                                                                <option value="30" <?php if(isset($usernotification) && $usernotification->NotificationFrequency == '30'){ echo 'Selected' ;}?> >Every 30 minutes</option>
                                                                <option value="60" <?php if(isset($usernotification) && $usernotification->NotificationFrequency == '60'){ echo 'Selected' ;}?> >Send Every hours</option>
                                                                <option value="1440" <?php if(isset($usernotification) && $usernotification->NotificationFrequency == '1440'){ echo 'Selected' ;}?> >Send Once a Day</option>
                                                            </select>

                                                            <div class="help-block"></div>
                                                        </div>        </div>
                                                </div>

                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Cases</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A new case is added to the system</td>
                                                                <td><input name="NewCase" type="checkbox" <?php if (isset($usernotification->NewCase)){ if($usernotification->NewCase == '1' || $usernotification->NewCase == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NewCase1" type="checkbox" <?php if (isset($usernotification->NewCase)){ if($usernotification->NewCase == '2' || $usernotification->NewCase == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing case is updated</td>
                                                                <td><input name="CaseUpdate" type="checkbox" <?php if (isset($usernotification->CaseUpdate)){ if($usernotification->CaseUpdate == '1' || $usernotification->CaseUpdate == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="CaseUpdate1" type="checkbox" <?php if (isset($usernotification->CaseUpdate)){ if($usernotification->CaseUpdate == '2' || $usernotification->CaseUpdate == '3'){ echo 'Checked' ;} }?> ></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An open case is closed</td>
                                                                <td><input name="CloseCase" type="checkbox" <?php if (isset($usernotification->CloseCase)){ if($usernotification->CloseCase == '1' || $usernotification->CloseCase == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="CloseCase1" type="checkbox" <?php if (isset($usernotification->CloseCase)){ if($usernotification->CloseCase == '2' || $usernotification->CloseCase == '3'){ echo 'Checked' ;} }?> ></td>
                                                            </tr>
                                                            <tr>
                                                                <td> A closed case is reopened</td>
                                                                <td><input name="ReopenCase" type="checkbox" <?php if (isset($usernotification->ReopenCase)){ if($usernotification->ReopenCase == '1' || $usernotification->ReopenCase == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="ReopenCase1" type="checkbox" <?php if (isset($usernotification->ReopenCase)){ if($usernotification->ReopenCase == '2' || $usernotification->ReopenCase == '3'){ echo 'Checked' ;} }?> ></td>
                                                            </tr>
                                                            <tr>
                                                                <td> A closed case is deleted</td>
                                                                <td><input name="DeleteCase" type="checkbox" <?php if (isset($usernotification->DeleteCase)){ if($usernotification->DeleteCase == '1' || $usernotification->DeleteCase == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DeleteCase1" type="checkbox" <?php if (isset($usernotification->DeleteCase)){ if($usernotification->DeleteCase == '2' || $usernotification->DeleteCase == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A new note is added, edited, or deleted on a case you're linked to</td>
                                                                <td><input name="NoteActivity" type="checkbox" <?php if (isset($usernotification->NoteActivity)){ if($usernotification->NoteActivity == '1' || $usernotification->NoteActivity == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NoteActivity1" type="checkbox" <?php if (isset($usernotification->NoteActivity)){ if($usernotification->NoteActivity == '2' || $usernotification->NoteActivity == '3'){ echo 'Checked' ;} }?> ></td>
                                                            </tr>
                                                            <tr>
                                                                <td>You are added or removed from a case</td>
                                                                <td><input name="AssignedCase" type="checkbox" <?php if (isset($usernotification->AssignedCase)){ if($usernotification->AssignedCase == '1' || $usernotification->AssignedCase == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="AssignedCase1" type="checkbox" <?php if (isset($usernotification->AssignedCase)){ if($usernotification->AssignedCase == '2' || $usernotification->AssignedCase == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td> A contact / company is added or removed from a case you're linked to</td>
                                                                <td><input name="CaseContact" type="checkbox" <?php if (isset($usernotification->CaseContact)){ if($usernotification->CaseContact == '1' || $usernotification->CaseContact == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="CaseContact1" type="checkbox" <?php if (isset($usernotification->CaseContact)){ if($usernotification->CaseContact == '2' || $usernotification->CaseContact == '3'){ echo 'Checked' ;} }?> ></td>
                                                            </tr>
                                                            <tr>
                                                                <td> A firm user is added or removed from a case you're linked to</td>
                                                                <td><input name="CaseUser" type="checkbox" <?php if (isset($usernotification->CaseUser)){ if($usernotification->CaseUser == '1' || $usernotification->CaseUser == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="CaseUser1" type="checkbox" <?php if (isset($usernotification->CaseUser)){ if($usernotification->CaseUser == '2' || $usernotification->CaseUser == '3'){ echo 'Checked' ;} }?> ></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Calendar</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A new event is added to the system</td>
                                                                <td><input name="NewEvent" type="checkbox" <?php if (isset($usernotification->NewEvent)){ if($usernotification->NewEvent == '1' || $usernotification->NewEvent == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="NewEvent1" type="checkbox" <?php if (isset($usernotification->NewEvent)){ if($usernotification->NewEvent == '2' || $usernotification->NewEvent == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing event is updated</td>
                                                                <td><input name="UpdateEvent" type="checkbox" <?php if (isset($usernotification->UpdateEvent)){ if($usernotification->UpdateEvent == '1' || $usernotification->UpdateEvent == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="UpdateEvent1" type="checkbox" <?php if (isset($usernotification->UpdateEvent)){ if($usernotification->UpdateEvent == '2' || $usernotification->UpdateEvent == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone deletes an event</td>
                                                                <td><input name="DeleteEvent" type="checkbox" <?php if (isset($usernotification->DeleteEvent)){ if($usernotification->DeleteEvent == '1' || $usernotification->DeleteEvent == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="DeleteEvent1" type="checkbox" <?php if (isset($usernotification->DeleteEvent)){ if($usernotification->DeleteEvent == '2' || $usernotification->DeleteEvent == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone comments on an event</td>
                                                                <td><input name="EventComment" type="checkbox" <?php if (isset($usernotification->EventComment)){ if($usernotification->EventComment == '1' || $usernotification->EventComment == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="EventComment1" type="checkbox" <?php if (isset($usernotification->EventComment)){ if($usernotification->EventComment == '2' || $usernotification->EventComment == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A contact views an event</td>
                                                                <td><input name="EventView" type="checkbox" <?php if (isset($usernotification->EventView)){ if($usernotification->EventView == '1' || $usernotification->EventView == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="EventView1" type="checkbox" <?php if (isset($usernotification->EventView)){ if($usernotification->EventView == '2' || $usernotification->EventView == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Documents</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A new document is uploaded in the system</td>
                                                                <td><input name="NewDocument" type="checkbox" <?php if (isset($usernotification->NewDocument)){ if($usernotification->NewDocument == '1' || $usernotification->NewDocument == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NewDocument1" type="checkbox" <?php if (isset($usernotification->NewDocument)){ if($usernotification->NewDocument == '2' || $usernotification->NewDocument == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing document is updated</td>
                                                                <td><input name="UpdateDocument" type="checkbox" <?php if (isset($usernotification->UpdateDocument)){ if($usernotification->UpdateDocument == '1' || $usernotification->UpdateDocument == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="UpdateDocument1" type="checkbox" <?php if (isset($usernotification->UpdateDocument)){ if($usernotification->UpdateDocument == '2' || $usernotification->UpdateDocument == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone deletes a document</td>
                                                                <td><input name="DeleteDocument" type="checkbox" <?php if (isset($usernotification->DeleteDocument)){ if($usernotification->DeleteDocument == '1' || $usernotification->DeleteDocument == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DeleteDocument1" type="checkbox" <?php if (isset($usernotification->DeleteDocument)){ if($usernotification->DeleteDocument == '2' || $usernotification->DeleteDocument == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone comments on a document</td>
                                                                <td><input name="DocumentComment" type="checkbox" <?php if (isset($usernotification->DocumentComment)){ if($usernotification->DocumentComment == '1' || $usernotification->DocumentComment == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DocumentComment1" type="checkbox" <?php if (isset($usernotification->DocumentComment)){ if($usernotification->DocumentComment == '2' || $usernotification->DocumentComment == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A contact views a document</td>
                                                                <td><input name="DocumentView" type="checkbox" <?php if (isset($usernotification->DocumentView)){ if($usernotification->DocumentView == '1' || $usernotification->DocumentView == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DocumentView1" type="checkbox" <?php if (isset($usernotification->DocumentView)){ if($usernotification->DocumentView == '2' || $usernotification->DocumentView == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Tasks</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A new task is added</td>
                                                                <td><input name="NewTask" type="checkbox" <?php if (isset($usernotification->NewTask)){ if($usernotification->NewTask == '1' || $usernotification->NewTask == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NewTask1" type="checkbox" <?php if (isset($usernotification->NewTask)){ if($usernotification->NewTask == '2' || $usernotification->NewTask == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing task is updated</td>
                                                                <td><input name="UpdateTask" type="checkbox" <?php if (isset($usernotification->UpdateTask)){ if($usernotification->UpdateTask == '1' || $usernotification->UpdateTask == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="UpdateTask1" type="checkbox" <?php if (isset($usernotification->UpdateTask)){ if($usernotification->UpdateTask == '2' || $usernotification->UpdateTask == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone deletes a task</td>
                                                                <td><input name="DeleteTask" type="checkbox" <?php if (isset($usernotification->DeleteTask)){ if($usernotification->DeleteTask == '1' || $usernotification->DeleteTask == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DeleteTask1" type="checkbox" <?php if (isset($usernotification->DeleteTask)){ if($usernotification->DeleteTask == '2' || $usernotification->DeleteTask == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A task is completed</td>
                                                                <td><input name="CompleteTask" type="checkbox" <?php if (isset($usernotification->CompleteTask)){ if($usernotification->CompleteTask == '1' || $usernotification->CompleteTask == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="CompleteTask1" type="checkbox" <?php if (isset($usernotification->CompleteTask)){ if($usernotification->CompleteTask == '2' || $usernotification->CompleteTask == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A completed task is marked incomplete</td>
                                                                <td><input name="IncompleteTask" type="checkbox" <?php if (isset($usernotification->IncompleteTask)){ if($usernotification->IncompleteTask == '1' || $usernotification->IncompleteTask == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="IncompleteTask1" type="checkbox" <?php if (isset($usernotification->IncompleteTask)){ if($usernotification->IncompleteTask == '2' || $usernotification->IncompleteTask == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Time & Billing</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A new time entry / expense is added</td>
                                                                <td><input name="NewExpense" type="checkbox" <?php if (isset($usernotification->NewExpense)){ if($usernotification->NewExpense == '1' || $usernotification->NewExpense == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NewExpense1" type="checkbox" <?php if (isset($usernotification->NewExpense)){ if($usernotification->NewExpense == '2' || $usernotification->NewExpense == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing time entry / expense is updated</td>
                                                                <td><input name="UpdateExpense" type="checkbox" <?php if (isset($usernotification->UpdateExpense)){ if($usernotification->UpdateExpense == '1' || $usernotification->UpdateExpense == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="UpdateExpense1" type="checkbox" <?php if (isset($usernotification->UpdateExpense)){ if($usernotification->UpdateExpense == '2' || $usernotification->UpdateExpense == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone deletes a time entry / expense</td>
                                                                <td><input name="DeleteExpense" type="checkbox" <?php if (isset($usernotification->DeleteExpense)){ if($usernotification->DeleteExpense == '1' || $usernotification->DeleteExpense == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DeleteExpense1" type="checkbox" <?php if (isset($usernotification->DeleteExpense)){ if($usernotification->DeleteExpense == '2' || $usernotification->DeleteExpense == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A new invoice is added to a case you're linked to</td>
                                                                <td><input name="NewInvoice" type="checkbox" <?php if (isset($usernotification->NewInvoice)){ if($usernotification->NewInvoice == '1' || $usernotification->NewInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NewInvoice1" type="checkbox" <?php if (isset($usernotification->NewInvoice)){ if($usernotification->NewInvoice == '2' || $usernotification->NewInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing invoice is updated on a case you're linked to</td>
                                                                <td><input name="UpdateInvoice" type="checkbox" <?php if (isset($usernotification->UpdateInvoice)){ if($usernotification->UpdateInvoice == '1' || $usernotification->UpdateInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="UpdateInvoice1" type="checkbox" <?php if (isset($usernotification->UpdateInvoice)){ if($usernotification->UpdateInvoice == '2' || $usernotification->UpdateInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A contact views an invoice</td>
                                                                <td><input name="ViewInvoice" type="checkbox" <?php if (isset($usernotification->ViewInvoice)){ if($usernotification->ViewInvoice == '1' || $usernotification->ViewInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="ViewInvoice1" type="checkbox" <?php if (isset($usernotification->ViewInvoice)){ if($usernotification->ViewInvoice == '2' || $usernotification->ViewInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone deletes an invoice on a case you're linked to</td>
                                                                <td><input name="DeleteInvoice" type="checkbox" <?php if (isset($usernotification->DeleteInvoice)){ if($usernotification->DeleteInvoice == '1' || $usernotification->DeleteInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DeleteInvoice1" type="checkbox" <?php if (isset($usernotification->DeleteInvoice)){ if($usernotification->DeleteInvoice == '2' || $usernotification->DeleteInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A payment is made on an invoice on a case you're linked to</td>
                                                                <td><input name="InvoicePayment" type="checkbox" <?php if (isset($usernotification->InvoicePayment)){ if($usernotification->InvoicePayment == '1' || $usernotification->InvoicePayment == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="InvoicePayment1" type="checkbox" <?php if (isset($usernotification->InvoicePayment)){ if($usernotification->InvoicePayment == '2' || $usernotification->InvoicePayment == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A payment is refunded on an invoice on a case you're linked to</td>
                                                                <td><input name="RefundInvoice" type="checkbox" <?php if (isset($usernotification->RefundInvoice)){ if($usernotification->RefundInvoice == '1' || $usernotification->RefundInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="RefundInvoice1" type="checkbox" <?php if (isset($usernotification->RefundInvoice)){ if($usernotification->RefundInvoice == '2' || $usernotification->RefundInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone shares an invoice on a case you're linked to</td>
                                                                <td><input name="ShareInvoice" type="checkbox" <?php if (isset($usernotification->ShareInvoice)){ if($usernotification->ShareInvoice == '1' || $usernotification->ShareInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="ShareInvoice1" type="checkbox" <?php if (isset($usernotification->ShareInvoice)){ if($usernotification->ShareInvoice == '2' || $usernotification->ShareInvoice == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone sends a reminder on a case you're linked to</td>
                                                                <td><input name="CaseReminder" type="checkbox" <?php if (isset($usernotification->CaseReminder)){ if($usernotification->CaseReminder == '1' || $usernotification->CaseReminder == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="CaseReminder1" type="checkbox" <?php if (isset($usernotification->CaseReminder)){ if($usernotification->CaseReminder == '2' || $usernotification->CaseReminder == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Contacts & Companies</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> A new contact/company is added to the system</td>
                                                                <td><input name="NewContact" type="checkbox" <?php if (isset($usernotification->NewContact)){ if($usernotification->NewContact == '1' || $usernotification->NewContact == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="NewContact1" type="checkbox" <?php if (isset($usernotification->NewContact)){ if($usernotification->NewContact == '2' || $usernotification->NewContact == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>An existing contact/company is updated</td>
                                                                <td><input name="UpdateContact" type="checkbox" <?php if (isset($usernotification->UpdateContact)){ if($usernotification->UpdateContact == '1' || $usernotification->UpdateContact == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="UpdateContact1" type="checkbox" <?php if (isset($usernotification->UpdateContact)){ if($usernotification->UpdateContact == '2' || $usernotification->UpdateContact == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone archives a contact/company</td>
                                                                <td><input name="ArchiveContact" type="checkbox" <?php if (isset($usernotification->ArchiveContact)){ if($usernotification->ArchiveContact == '1' || $usernotification->ArchiveContact == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="ArchiveContact1" type="checkbox" <?php if (isset($usernotification->ArchiveContact)){ if($usernotification->ArchiveContact == '2' || $usernotification->ArchiveContact == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone unarchives a contact/company</td>
                                                                <td><input name="UnarchiveContact" type="checkbox" <?php if (isset($usernotification->UnarchiveContact)){ if($usernotification->UnarchiveContact == '1' || $usernotification->UnarchiveContact == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="UnarchiveContact1" type="checkbox" <?php if (isset($usernotification->UnarchiveContact)){ if($usernotification->UnarchiveContact == '2' || $usernotification->UnarchiveContact == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Someone deletes a company</td>
                                                                <td><input name="DeleteContact" type="checkbox" <?php if (isset($usernotification->DeleteContact)){ if($usernotification->DeleteContact == '1' || $usernotification->DeleteContact == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="DeleteContact1" type="checkbox" <?php if (isset($usernotification->DeleteContact)){ if($usernotification->DeleteContact == '2' || $usernotification->DeleteContact == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A contact logs in to myPowerLaw</td>
                                                                <td><input name="ContactLogin" type="checkbox" <?php if (isset($usernotification->ContactLogin)){ if($usernotification->ContactLogin == '1' || $usernotification->ContactLogin == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="ContactLogin1" type="checkbox" <?php if (isset($usernotification->ContactLogin)){ if($usernotification->ContactLogin == '2' || $usernotification->ContactLogin == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A new note is added, edited, or deleted on a contact</td>
                                                                <td><input name="AddContact" type="checkbox" <?php if (isset($usernotification->AddContact)){ if($usernotification->AddContact == '1' || $usernotification->AddContact == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="AddContact1" type="checkbox" <?php if (isset($usernotification->AddContact)){ if($usernotification->AddContact == '2' || $usernotification->AddContact == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Firm Administration</th>
                                                                <th>Send An Email</th>
                                                                <th>In Activity Feed</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>A new firm user is added</td>
                                                                <td><input name="AddFirmUser" type="checkbox" <?php if (isset($usernotification->AddFirmUser)){ if($usernotification->AddFirmUser == '1' || $usernotification->AddFirmUser == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="AddFirmUser1" type="checkbox" <?php if (isset($usernotification->AddFirmUser)){ if($usernotification->AddFirmUser == '2' || $usernotification->AddFirmUser == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Firm user contact information is updated</td>
                                                                <td><input name="UpdateFirmUser" type="checkbox" <?php if (isset($usernotification->UpdateFirmUser)){ if($usernotification->UpdateFirmUser == '1' || $usernotification->UpdateFirmUser == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="UpdateFirmUser1" type="checkbox" <?php if (isset($usernotification->UpdateFirmUser)){ if($usernotification->UpdateFirmUser == '2' || $usernotification->UpdateFirmUser == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>A firm user is deactivated or reactivated</td>
                                                                <td><input name="DeactiveFirmUser" type="checkbox" <?php if (isset($usernotification->DeactiveFirmUser)){ if($usernotification->DeactiveFirmUser == '1' || $usernotification->DeactiveFirmUser == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="DeactiveFirmUser1" type="checkbox" <?php if (isset($usernotification->DeactiveFirmUser)){ if($usernotification->DeactiveFirmUser == '2' || $usernotification->DeactiveFirmUser == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Firm user permissions are changed</td>
                                                                <td><input name="ChangeFirmPermission" type="checkbox" <?php if (isset($usernotification->ChangeFirmPermission)){ if($usernotification->ChangeFirmPermission == '1' || $usernotification->ChangeFirmPermission == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="ChangeFirmPermission1" type="checkbox" <?php if (isset($usernotification->ChangeFirmPermission)){ if($usernotification->ChangeFirmPermission == '2' || $usernotification->ChangeFirmPermission == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Items are imported into MyPowerLaw</td>
                                                                <td><input name="ImportedMyPowerLaw" type="checkbox" <?php if (isset($usernotification->ImportedMyPowerLaw)){ if($usernotification->ImportedMyPowerLaw == '1' || $usernotification->ImportedMyPowerLaw == '3'){ echo 'Checked' ;} }?>></td>
                                                                <td><input name="ImportedMyPowerLaw1" type="checkbox" <?php if (isset($usernotification->ImportedMyPowerLaw)){ if($usernotification->ImportedMyPowerLaw == '2' || $usernotification->ImportedMyPowerLaw == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Firm information is updated</td>
                                                                <td><input name="UpdateFirm" type="checkbox" <?php if (isset($usernotification->UpdateFirm)){ if($usernotification->UpdateFirm == '1' || $usernotification->UpdateFirm == '3'){ echo 'Checked' ;} }?> ></td>
                                                                <td><input name="UpdateFirm1" type="checkbox" <?php if (isset($usernotification->UpdateFirm)){ if($usernotification->UpdateFirm == '2' || $usernotification->UpdateFirm == '3'){ echo 'Checked' ;} }?>></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><br>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success">Create</button>    
                                                </div>
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
            </div>			</div>
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