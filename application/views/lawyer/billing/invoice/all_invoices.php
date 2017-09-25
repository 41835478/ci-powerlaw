<style>
    table {
        table-layout:fixed;
    }
    td{
        overflow:hidden;
        text-overflow: ellipsis;
    }
    /*Panel tabs*/
    .panel-tabs {
        position: relative;
        bottom: 9px;
        clear:both;
        border-bottom: 1px solid transparent;
    }

    .panel-tabs > li {
        float: left;
        margin-bottom: -1px;
    }

    .panel-tabs > li > a {
        margin-right: 2px;
        margin-top: 4px;
        line-height: .85;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
        color: #ffffff;
    }

    .panel-tabs > li > a:hover {
        border-color: transparent;
        color: #ffffff;
        background-color: transparent;
    }

    .panel-tabs > li.active > a,
    .panel-tabs > li.active > a:hover,
    .panel-tabs > li.active > a:focus {
        color: #fff;
        cursor: default;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        background-color: rgba(255,255,255, .23);
        border-bottom-color: transparent;
    }
</style>

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Invoices</h5>
                    <ul class="list-unstyled list-inline">
                        <li><a href="<?php echo base_url()?>invoices"><button class="btn btn-info">All</button></a></li>
                        <li><a href="billing/expense/2"><button class="btn btn-success">Unsent</button></a></li>
                        <li><a href="billing/expense"><button class="btn btn-primary">Sent</button></a></li>
                        <li><a href="billing/expense"><button class="btn btn-success">Paid</button></a></li>
                        <li><a href="billing/expense"><button class="btn btn-primary">Partial</button></a></li>
                        <li><a href="billing/expense"><button class="btn btn-success">Overdue</button></a></li>
                        <li><a href="billing/expense"><button class="btn btn-primary">Forwarded</button></a></li>
                    </ul>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="<?php echo base_url() ?>addinvoices">
                                    <span class="label label-success label-icon">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </span>
                                </a>                                
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="#"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div id="w0" class="grid-view">
                        <div class="summary"></div>
                        <table id="all-contact-table" class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Item</th>
                                    <th style="text-align: center;">Contact</th>
                                    <th style="text-align: center;">Case Link</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Paid</th>
                                    <th style="text-align: center;">Amount Due</th>
                                    <th style="text-align: center;">Due Date</th>
                                    <th style="text-align: center;">Created Date</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Sharing</th>
                                    <th class="action-column">&nbsp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($allinvoice)) {
                                    foreach ($allinvoice as $invoice) { //echo '<pre>'; print_r($invoice);  echo $invoice['CompanyId']; 
                                        ?>
                                        <tr style="text-align: center;">
                                            <td><a href="<?php echo base_url()?>viewinvoice/<?php echo $invoice['InvoiceId']; ?>"><button class="btn btn-primary" style="border-radius: 12px;">
                                                    <span>View Invoice</span><br>
                                                    <span>#<?php echo $invoice['InvoiceNumber']; ?></span>
												</button></a></td>
                                            <td>
                                                <?php
                                                $companyinfo = $this->SiteModel->commonfunctionforcompany($invoice['CompanyId']);
                                                echo $companyinfo->CompanyName;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $caseinfo = $this->SiteModel->commonfunctionforcase($invoice['CaseId']);
                                                echo $caseinfo->CaseName;
                                                ?>
                                            </td>
                                            <td><?php echo $invoice['TotalAmount'] ?></td>
                                            <td>
                                                <?php
                                                $getinvoicepaymentinfo = $this->BillingModel->getinvoicepayment($invoice['InvoiceId']);
                                                $totalamount = 0;
                                                foreach ($getinvoicepaymentinfo as $key => $payment) {
                                                    $totalamount += $payment['Amount'];
                                                }
                                                echo $totalamount;
                                                ?>
                                            </td>
                                            <td><?php echo ($invoice['TotalAmount'] - $totalamount); ?></td>
											<td><?php echo date('d F, Y', strtotime($invoice['DueDate'])); ?></td>
                                            <td><?php echo date('d F, Y', strtotime($invoice['CreatedOn'])); ?></td>
                                            <td><?php
                                                if ($invoice['InvoiceStatus'] == 2) {
                                                    echo 'Open';
                                                }
                                                ?>
                                                <?php
                                                if ($invoice['InvoiceStatus'] == 1) {
                                                    echo 'Invoiced';
                                                }
                                                ?>
                                            </td>
                                            <td><?php //echo $invoice['CaseName']                        ?></td>
                                            <td>
                                                <?php if ($invoice['InvoiceStatus'] == 2) { ?>
                                                    <a data-toggle="modal" data-target="#editLink<?php echo $invoice['InvoiceId']; ?>" style="cursor: pointer;">
                                                        <span data-toggle="tooltip" data-placement="top" title="Edit Category" class="glyphicon glyphicon-edit"></span>
                                                    </a>&nbsp;
                                                    <a href="billing/deleteExpense/<?php echo $invoice['InvoiceId']; ?>" onclick="return chkDelete()">
                                                        <span data-toggle="tooltip" data-placement="top" title="Remove" class="glyphicon glyphicon-remove"></span>
                                                    </a>
                                                <?php } if ($invoice['PaymentStatus'] == '0') { ?>
                                                    <a onclick="paymentrecord('<?php echo $invoice['InvoiceId']; ?>')" style="cursor: pointer;">
                                                        <img data-toggle="tooltip" data-placement="top" title="Edit Category" src="<?php echo base_url() ?>assets/image/small/invoicepayment.svg"></span>
                                                    </a>&nbsp;
                                                    <a href="billing/deleteExpense/<?php echo $invoice['InvoiceId']; ?>" onclick="return chkDelete()">
                                                        <span data-toggle="tooltip" data-placement="top" title="Remove" class="glyphicon glyphicon-remove"></span>
                                                    </a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                        <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="recordpayment_<?php echo $invoice['InvoiceId']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Record Payment</h4>
                                                </div>

                                                <?php
                                                $getinvoicepaymentinfo = $this->BillingModel->getinvoicepayment($invoice['InvoiceId']);
                                                $totalamount = 0;
                                                foreach ($getinvoicepaymentinfo as $key => $payment) {
                                                    $totalamount += $payment['Amount'];
                                                }
                                                $leftamount = $invoice['TotalAmount'] - $totalamount;
                                                
                                                $getcontact = $this->BillingModel->getinvoicecontactbyid($invoice['ContactId']);
                                                //echo '<pre>'; print_r($getcontact);
                                                $getcompany = $this->BillingModel->getinvoicecompanybyid($invoice['CompanyId']);
                                                //echo '<pre>'; print_r($getcompany);
                                                ?>
                                                <div class="modal-body" style="background:#F8F7F3">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-6">Invoice Number: </div>
                                                                <div class="col-md-6" id="invoicenumber"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">Matter: </div>
                                                                <div class="col-md-6" id="caselink"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4">
                                                            <div class="row">
                                                                <div class="col-md-6">Invoice Amount: </div>
                                                                <div class="col-md-6" id="invoiceamount"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">Amount Paid: </div>
                                                                <div class="col-md-6" id="amountpaid">$ <?php echo $totalamount; ?></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">Outstanding Amount: </div>
                                                                <div class="col-md-6" id="leftamount">$ <?php echo $leftamount; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="panel">
                                                            <div class="panel-heading">
                                                                <ul class="nav panel-tabs">
                                                                    <li style="background:#1F8EE7"><a href="#tab1" data-toggle="tab"><span><img style="height: 20px;" src="<?php echo base_url() ?>assets/image/small/payment-online.svg"> Online Payment</span></a></li>
                                                                    <li style="background:#1F8EE7" class="active"><a href="#tab2" data-toggle="tab"><span><img style="height: 20px;" src="<?php echo base_url() ?>assets/image/small/payment_offline.png"> Offline Payment</span></a></li>
                                                                    <li style="background:#1F8EE7"><a href="#tab3" data-toggle="tab"><span><img style="height: 20px;" src="<?php echo base_url() ?>assets/image/small/trust.svg"> From Trust Account</span></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="panel-body" style="border: 2px solid #1F8EE7;">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane" id="tab1">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <img style="height: 120px;width: 130px;" src="<?php echo base_url() ?>assets/image/money_graph.png">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <h2>Start Accepting Online Payments!</h2>
                                                                                <p> Get paid faster by letting your clients pay online </p>
                                                                                <p>Access from your MyCase account, no 3rd party </p>
                                                                                <p>Save money with free eCheck payments and competitive credit card fees</p>
                                                                            </div>
                                                                            <button style="float: right;" class="btn btn-primary">Get Started Now</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane active" id="tab2">
                                                                        <form action="billing/editExpense" name="myForm" method="post" enctype="multipart/form-data">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="Date" class="control-label">Payment Method</label>
                                                                                        <select class="form-control select2" name="UserId">
                                                                                            <option value="0">Select Payment Method</option>
                                                                                            <?php foreach ($allpaymentmethod as $payment) { ?>
                                                                                                <option value="<?php echo $payment['id']; ?>"><?php echo $payment['method_name']; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>  
                                                                                    <div class="form-group">
                                                                                        <label for="Date" class="control-label">Note</label>
                                                                                        <input type="text" name="EntryDate" class="form-control datepicker" value="" placeholder="Date"/>
                                                                                    </div>  
                                                                                    <div class="form-group">
                                                                                        <label for="Date" class="control-label">Deposit Into</label>
                                                                                        <select class="form-control select2" name="UserId">
                                                                                            <option value="1">Operating Account</option>
                                                                                            <option value="2">Trust Account</option>
                                                                                        </select>
                                                                                    </div>  
                                                                                </div> 

                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="Date" class="control-label">Date</label>
                                                                                        <input type="text" name="EntryDate" class="form-control datepicker" value="" placeholder="Date"/>
                                                                                    </div> 
                                                                                    <div class="form-group">
                                                                                        <label for="Cost" class="control-label">Amount</label>
                                                                                        <input type="text" name="ExpenseAmount" class="form-control" value="" placeholder="Cost"/>
                                                                                    </div> 
                                                                                    <div class="form-group">
                                                                                        <div class="checkbox">
                                                                                            <label><input type="checkbox" value="">Pay in Full</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div >
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                                                                        <button type="submit" class="btn btn-primary">Record Payment</button>
                                                                                    </div>
                                                                                </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="tab3">
                                                                    <form action="billing/editExpense" name="myForm" method="post" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="Date" class="control-label">Select Account</label>
                                                                                    <select id="contactselectdiv" class="from-control" style="width: 100%; height: 36px; padding: 7px 12px; background-color: #fff; border: 1px solid #ddd; border-radius: 3px;">
                                                                                        <option value=""></option>
                                                                                        <optgroup label="Contact">
                                                                                                <option value="con_<?php echo $getcontact->ContactId; ?>" ><?php echo $getcontact->FirstName; ?> <?php echo $getcontact->LastName; ?> (Contact)</option>
                                                                                        </optgroup>
                                                                                        <optgroup label="Company">
                                                                                                <option value="com_<?php echo $getcompany->CompanyId; ?>" ><?php echo $getcompany->CompanyName; ?> (Company)</option>
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>  
                                                                                <div class="form-group">
                                                                                    <label for="Date" class="control-label">Note</label>
                                                                                    <input type="text" name="EntryDate" class="form-control datepicker" value="" placeholder="Date"/>
                                                                                </div>   
                                                                            </div> 

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="Date" class="control-label">Date</label>
                                                                                    <input type="text" name="EntryDate" class="form-control datepicker" value="" placeholder="Date"/>
                                                                                </div> 
                                                                                <div class="form-group">
                                                                                    <label for="Cost" class="control-label">Amount</label>
                                                                                    <input type="text" name="ExpenseAmount" class="form-control" value="" placeholder="Cost"/>
                                                                                </div> 
                                                                                <div class="form-group">
                                                                                    <div class="checkbox">
                                                                                        <label><input type="checkbox" value="">Pay in Full</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div >
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
                                                                                    <button type="submit" class="btn btn-primary">Record Payment</button>
                                                                                </div>
                                                                            </div>
                                                                    </form>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--                    <div class="form-group">
                                                                    <label for="exampleInputuname">Case Link</label>
                                                                    <select class="form-control select2" name="case_id">
                                                                        <option value="0">Choose Case</option>
                                            <?php //foreach ($all_cases as $cases) { ?>
                                                                        <option value="<?php echo $cases['CaseId']; ?>" <?php
                                            // if ($row['case_id'] == $cases['CaseId']) {
                                            // echo 'selected';
                                            // }
                                            ?>>
                                            <?php //echo $cases['CaseName'] ?>
                                                                        </option>
                                            <?php //} ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputuname">User</label>
                                                                    <select class="form-control select2" name="UserId">
                                                                        <option value="0">Choose User</option>
                                            <?php //foreach ($all_users as $users) { ?>
                                                                        <option value="<?php //echo $users['id']              ?>" <?php
                                            //  if ($row['UserId'] == $users['id']) {
                                            // echo 'selected';
                                            //  }
                                            ?>>
                                            <?php //echo $users['FirstName'] . ' ' . $users['LastName'] ?>
                                                                        </option>
                                            <?php //} ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputuname">Activity</label>
                                                                    <select class="form-control select2" name="id">
                                                                        <option value="0">Choose Activity</option>
                                            <?php //foreach ($all_activity as $activity) { ?>
                                                                        <option value="<?php echo $activity['id'] ?>" <?php
                                            //if ($row['activity_id'] == $activity['id']) {
                                            //echo 'selected';
                                            //}
                                            ?>>
                                            <?php //echo $activity['activity_name']; ?>
                                                                        </option>
                                            <?php //} ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputuname">Description</label>
                                                                    <textarea class="form-control" name="Comments" style="resize: none;"><?php echo $row['Comments'] ?></textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Date" class="control-label">Date</label>
                                                                            <input type="text" name="EntryDate" class="form-control datepicker" value="<?php echo $row['EntryDate']; ?>" placeholder="Date"/>
                                                                        </div>       
                                                                    </div> 
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Cost" class="control-label">Cost</label>
                                                                            <input type="text" name="ExpenseAmount" class="form-control" value="<?php echo $row['ExpenseAmount']; ?>" placeholder="Cost"/>
                                                                        </div>      
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="Quantity" class="control-label">Quantity</label>
                                                                            <input type="text" name="qty" class="form-control" value="<?php echo $row['qty']; ?>" placeholder="Quantity"/>
                                                                        </div>      
                                                                    </div>
                                                                </div>-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                            </div>
                        </div>


                        <!--Modal End-->
                        <?php
                    }
                }
                ?>
                </tbody>
                </table>
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



<script>
    $(function () {

        $('#all-contact-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true

        });
    });

    $('.confirmation').click(function (e) {
        var href = $(this).attr('href');

        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = href;
                    }
                });

        return false;
    });

    function paymentrecord(invoice) {
        event.preventDefault();
        var invoiceid = invoice;
		
        $.ajax({
            url: "<?php echo site_url('getinvoiceinfobyid'); ?>",
            type: "post",
            dataType: "json",
            data: {
                invoiceid: invoiceid,
            },
            success: function (msg) {
                console.log(msg.invoice);
                var invoicenumber = msg.invoice.InvoiceNumber;
                var casename = msg.invoice.CaseName;
                var invoiceamount = msg.invoice.TotalAmount;
                var amountpaid = msg.invoice.TotalAmount;
                var leftamount = invoiceamount - amountpaid;
                $('#invoicenumber').html(invoicenumber);
                $('#caselink').html(casename);
                $('#invoiceamount').html(invoiceamount);
                //$('#amountpaid').html(amountpaid);
                // $('#leftamount').html(leftamount);
                $('#recordpayment_' + invoiceid).modal('show');

            }
        });
    }
</script>