<style>
    tr.invoice_info_row td {
        border: 1px solid black;
        padding: 5px;
    }
    div.invoice, div.invoice td, div.invoice th {
        color: black;
        font-size: 12px;
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
                    <h5 class="panel-title">Invoice</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="/lcadmin/country/index"><span class="label label-success label-icon"><i class="glyphicon glyphicon-search"></i></span></a>                                </li>
                        </ul>
                    </div>					                        
                </div><hr>
                <div class="panel-body">

                    <style type="text/css">
                        legend{
                            font-weight: bold;
                        }
                    </style>
                    <div class="country-form">

                        <div style="padding: 30px 50px;">
                            <div class="invoice invoice_page" style="padding: 0px;    background-color: white;
                                 border: 1px solid #333333;
                                 padding: 20px;
                                 min-height: 600px;
                                 box-shadow: 0px 0px 4px #333333;">
                                <table style="width: 100%; margin: 0; padding: 0;" class="invoice">
                                    <tbody style="margin: 0; padding: 0;">
                                        <tr>
                                            <td style="width: 130px; padding: 0px !important; vertical-align: top;" rowspan="4">
                                                <?php  if (isset($invoice->PaymentStatus) && $invoice->PaymentStatus == '1') { ?>
                                                <img src="<?php echo base_url()?>assets/image/bill/invoice_paid.png" alt="Invoice banner sent">
                                                <?php } else { ?>
                                                 <img src="<?php echo base_url()?>assets/image/bill/invoice_partial.png" alt="Invoice banner sent">
                                                <?php } ?>
                                            </td>
                                            <td style="vertical-align: top; white-space: nowrap; width: 250px;" rowspan="2">
                                                <?php
                                                if (isset($firmdata->FirmName) && $firmdata->FirmName != '') {
                                                    echo $firmdata->FirmName;
                                                }
                                                ?><br>
                                                <?php
                                                if (isset($firmdata->Country) && $firmdata->Country != '') {
                                                    $country = $this->CountrySystemModel->getcountryinfobyid($firmdata->Country);
                                                    ?>
                                                    <?php
                                                    if (isset($country->CountryName) && $country->CountryName != '') {
                                                        echo $country->CountryName;
                                                    }
                                                    ?><br>
                                                <?php }
                                                ?>
                                                <?php
                                                if (isset($firmdata->Mobile) && $firmdata->Mobile != '') {
                                                    echo $firmdata->Mobile;
                                                }
                                                ?>
                                            </td>
                                            <td rowspan="4">
                                                &nbsp;
                                            </td>
                                            <td style="vertical-align: top; white-space: nowrap; width: 320px; padding-right: 20px; text-align: right;" rowspan="1">
                                                <span class="bill_firm_name" style="font-size: 24px;"><?php
                                                    if (isset($firmdata->FirmName) && $firmdata->FirmName != '') {
                                                        echo $firmdata->FirmName;
                                                    }
                                                    ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top; white-space: nowrap; width: 320px; padding-right: 20px;" rowspan="3">

                                                <table style="width: 100%; border-collapse: collapse;">
                                                    <tbody><tr>
                                                            <td style="padding-top: 0px !important; width: 45%">&nbsp;</td>
                                                            <td style="text-align: right; font-size: 20px; font-weight: bold; padding: 5px; padding-top: 0px;">
                                                                Invoice
                                                            </td>
                                                        </tr>
                                                        <tr class="invoice_info_row">
                                                            <td class="invoice_info_bg" style="white-space: nowrap;">Invoice #</td>
                                                            <td style="text-align: right;"> <?php
                                                                if (isset($invoice->InvoiceNumber) && $invoice->InvoiceNumber != '') {
                                                                    echo $invoice->InvoiceNumber;
                                                                }
                                                                ?></td>
                                                        </tr>
                                                        <tr class="invoice_info_row">
                                                            <td class="invoice_info_bg" style="white-space: nowrap;">Invoice Date</td>
                                                            <td style="text-align: right;"><?php
                                                                if (isset($invoice->CreatedOn) && $invoice->CreatedOn != '') {
                                                                    echo date('d F, Y', strtotime($invoice->CreatedOn));
                                                                }
                                                                ?></td>
                                                        </tr>
                                                        <tr class="invoice_info_row">
                                                            <td class="invoice_info_bg" style="white-space: nowrap;">Due Date</td>
                                                            <td style="text-align: right;"><?php
                                                                if (isset($invoice->DueDate) && $invoice->DueDate != '') {
                                                                    echo date('d F, Y', strtotime($invoice->DueDate));
                                                                }
                                                                ?></td>
                                                        </tr>
                                                        <tr class="invoice_info_row">
                                                            <td class="invoice_info_bg" style="white-space: nowrap; vertical-align: top;">Balance Due</td>
                                                            <?php
                                                            $getinvoicepaymentinfo = $this->BillingModel->getinvoicepayment($invoice->InvoiceId);
                                                            $totalamount = 0;
                                                            foreach ($getinvoicepaymentinfo as $key => $payment) {
                                                                $totalamount += $payment['Amount'];
                                                            }
                                                            ?>
                                                            <td style="text-align: right;">
                                                                <?php echo ($invoice->TotalAmount - $totalamount); ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="invoice_info_row">
                                                            <td class="invoice_info_bg" style="white-space: nowrap;">Payment Terms</td>
                                                            <td style="text-align: right;"></td>
                                                        </tr>
                                                        <tr class="invoice_info_row">
                                                            <td class="invoice_info_bg" style="white-space: nowrap;">Case / Matter</td>
                                                            <td style="text-align: right; white-space: normal">
                                                                <a class="bill-court-case-link" href="/court_cases/3642730"><?php  if (isset($invoice->CaseName) && $invoice->CaseName != '') {
                                                                    echo $invoice->CaseName;
                                                                }?></a>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top; white-space: nowrap; width: 250px;" rowspan="2">
                                                <a href="/contacts/clients/7193472"><?php echo $companyinfo->CompanyName; ?></a><br>
                                                <p></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div style="padding: 20px;">
                                    <hr>


                                    <h3>Time Entries</h3>

                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody><tr class="invoice_info_row">
                                                <td class="invoice_info_bg" style="width: 80px;">
                                                    Date
                                                </td>
                                                <td class="invoice_info_bg" style="width: 40px;">
                                                    EE
                                                </td>
                                                <td class="invoice_info_bg" style="width: 140px;">
                                                    Activity
                                                </td>
                                                <td class="invoice_info_bg" style="width: 300px;">
                                                    Description
                                                </td>
                                                <td class="invoice_info_bg" style="width: 65px; text-align: right;">
                                                    Rate
                                                </td>
                                                <td class="invoice_info_bg" style="width: 65px; text-align: right;">
                                                    Hours
                                                </td>
                                                <td class="invoice_info_bg" style="width: 85px; text-align: right;">
                                                    Line Total
                                                </td>
                                            </tr>

                                            <tr class="invoice_info_row ">
                                                <td style="vertical-align: top;">
                                                    05/16/2017
                                                </td>
                                                <td style="vertical-align: top;">
                                                    RU
                                                </td>
                                                <td style="vertical-align: top;">
                                                    rs invoice
                                                </td>
                                                <td style="vertical-align: top;">
                                                    &nbsp;
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    100.00
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    6.0
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    600.00
                                                </td>
                                            </tr>



                                            <tr>
                                                <td colspan="5" class="total-summary-column">
                                                    Totals:
                                                </td>
                                                <td class="total-entries-total-hours total-data-column">
                                                    6.0
                                                </td>
                                                <td class="total-data-column">
                                                    $600.00
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    <h3>Expenses</h3>

                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody><tr class="invoice_info_row">
                                                <td class="invoice_info_bg" style="width: 80px;">
                                                    Date
                                                </td>
                                                <td class="invoice_info_bg" style="width: 40px;">
                                                    EE
                                                </td>
                                                <td class="invoice_info_bg" style="width: 140px;">
                                                    Activity
                                                </td>
                                                <td class="invoice_info_bg" style="width: 300px;">
                                                    Description
                                                </td>
                                                <td class="invoice_info_bg" style="width: 65px; text-align: right;">
                                                    Cost
                                                </td>
                                                <td class="invoice_info_bg" style="width: 65px; text-align: right;">
                                                    Quantity
                                                </td>
                                                <td class="invoice_info_bg" style="width: 85px; text-align: right;">
                                                    Line Total
                                                </td>
                                            </tr>

                                            <tr class="invoice_info_row ">
                                                <td style="vertical-align: top;">
                                                    05/16/2017
                                                </td>
                                                <td style="vertical-align: top;">
                                                    RU
                                                </td>
                                                <td style="vertical-align: top;">
                                                    rs invoice
                                                </td>
                                                <td style="vertical-align: top;">
                                                    &nbsp;
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    50.00
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    5.0
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    250.00
                                                </td>
                                            </tr>



                                            <tr>
                                                <td colspan="6" style="text-align: right; padding-top: 5px;">
                                                    Expense Total:
                                                </td>
                                                <td style="text-align: right; padding-top: 5px; padding-right: 3px; font-weight: bold;">
                                                    $250.00
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    <h3>Adjustments</h3>

                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody><tr class="invoice_info_row">
                                                <td class="invoice_info_bg" style="width: 85px;">
                                                    Item
                                                </td>
                                                <td class="invoice_info_bg" style="width: 85px;">
                                                    Applied To
                                                </td>
                                                <td class="invoice_info_bg" style="width: 90px;">
                                                    Type
                                                </td>
                                                <td class="invoice_info_bg" style="width: 300px;">
                                                    Description
                                                </td>
                                                <td class="invoice_info_bg" style="width: 65px; text-align: right;">
                                                    Basis
                                                </td>
                                                <td class="invoice_info_bg" style="width: 65px; text-align: right;">
                                                    Percent
                                                </td>
                                                <td class="invoice_info_bg" style="width: 85px; text-align: right;">
                                                    Line Total
                                                </td>
                                            </tr>

                                            <tr class="invoice_info_row">
                                                <td style="vertical-align: top;">
                                                    Tax
                                                </td>
                                                <td style="vertical-align: top;">
                                                    Sub-Total
                                                </td>
                                                <td style="vertical-align: top;">
                                                    $ - Amount
                                                </td>
                                                <td style="vertical-align: top;">
                                                    &nbsp;
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    &nbsp;
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    &nbsp;
                                                </td>
                                                <td style="vertical-align: top; text-align: right;" class="nonbillable">
                                                    100.00
                                                </td>
                                            </tr>


                                            <tr>
                                                <td colspan="6" style="text-align: right; padding-top: 5px;">
                                                    Addition Total:
                                                </td>
                                                <td style="text-align: right; padding-top: 5px; padding-right: 3px; font-weight: bold;">
                                                    $100.00
                                                </td>
                                            </tr>
                                        </tbody></table>


                                </div>

                                <div style="padding: 20px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tbody><tr class="invoice_info_row">
                                                <td style="width: 580px; vertical-align: top; border: none;">
                                                </td>
                                                <td style="width: 10px; border: none;" rowspan="1">
                                                    &nbsp;
                                                </td>
                                                <td style="text-align: right; border-right: none; vertical-align: top; width: 140px; line-height: 1.8;" rowspan="1">
                                                    Time Entry Sub-Total:<br>
                                                    Expense Sub-Total:<br>
                                                    <span style="font-weight: bold;">Sub-Total:</span><br>
                                                    <br>
                                                    <span class="bill-preview-additions-label">Additions:</span><br>
                                                    <br>

                                                    <span style="font-weight:bold;">Total:</span><br>
                                                    <span style="font-weight:bold;">Amount Paid:</span><br>
                                                </td>
                                                <td style="text-align: right; border-left: none; vertical-align: top; width: 85px; line-height: 1.8;" rowspan="1">
                                                    600.00<br>
                                                    250.00<br>
                                                    850.00<br>
                                                    <br>
                                                    <span class="bill-preview-additions-value">100.00</span><br>
                                                    <br>

                                                    950.00<br>
                                                    0.00
                                                </td>
                                            </tr>


                                            <tr class="invoice_info_row">
                                                <td style="border: none;">
                                                    &nbsp;
                                                </td>
                                                <td style="border: none;">
                                                    &nbsp;
                                                </td>
                                                <td class="invoice_info_bg" style="text-align: right; border-right: none; vertical-align: top; font-weight: bold; ">
                                                    Balance Due:
                                                </td>
                                                <td class="invoice_info_bg" id="invoice-balance-due" style="text-align: right; border-left: none; vertical-align: top; font-weight: bold; ">
                                                    $950.00
                                                </td>
                                            </tr>

                                        </tbody></table>

                                </div>

                                <div style="padding: 0px 20px;">
                                    <div id="bill-payment-history-container"></div>
                                    <script type="text/javascript">
                                        MyCase.Bills.Show.loadPaymentHistoryForBill(
                                                jQuery('#bill-payment-history-container'),
                                                3383253
                                                );
                                    </script>
                                </div>

                                <div style="padding: 20px;">

                                </div>

                            </div>
                        </div>
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


