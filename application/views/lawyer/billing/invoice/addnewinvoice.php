<style>
    optgroup[label="Contact"]
    {

        /*border: 1px solid #4297d7; background: #5c9ccc; */
    }
</style>
<body>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <form name="f1" action="<?php echo base_url() . 'contact/create' ?>" method="post">
                <!-- Main content -->
                <div class="content-wrapper" style="display: block;">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Create a New Invoice</h5>					                        
                        </div>
                        <div class="panel-body">

                            <div class="contact-form">
                                <hr />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Grouped Dropdown</label>
                                            <select id="contactselectdiv" class="from-control" style="width: 100%; height: 36px; padding: 7px 12px; background-color: #fff; border: 1px solid #ddd; border-radius: 3px;">
                                                <option value=""></option>
                                                <optgroup label="Contact">
                                                    <?php foreach ($getcontact as $contact) { ?>
                                                        <option value="con_<?php echo $contact['ContactId']; ?>" ><?php echo $contact['FirstName']; ?> <?php echo $contact['LastName']; ?> (Contact)</option>
                                                    <?php } ?>
                                                </optgroup>
                                                <optgroup label="Company">
                                                    <?php foreach ($getcompany as $company) { ?>
                                                        <option value="com_<?php echo $company['CompanyId']; ?>" ><?php echo $company['CompanyName']; ?> (Company)</option>
                                                    <?php } ?>
                                                </optgroup>
                                            </select>
                                        </div>

                                        <div class="form-group" id="caselinkdiv">
                                            <label for="exampleInputuname">Case Link</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputuname">Address</label>
                                            <textarea class="form-control" rows="5" name="Comments" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Date" class="control-label">Invoice #</label>
                                            <input type="text" readonly name="EntryDate" class="form-control" value="<?php echo $invoicenumber; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Date" class="control-label">Invoice Date</label>
                                            <input id="invoicedate" type="text" name="EntryDate" class="form-control datepicker" placeholder="<?php echo date('Y-m-d');?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputuname">Payment Type</label>
                                            <select class="form-control select2" name="case_id">
                                                <option value="0">Choose Type</option>
                                                <option value="1">Due Date</option>
                                                <option value="2">Due On Receipt</option>
                                                <option value="3">Net 15</option>
                                                <option value="4">Net 30</option>
                                                <option value="5">Net 60</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Date" class="control-label">Due Date</label>
                                            <input type="text" name="EntryDate" class="form-control datepicker" placeholder="Date"/>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">

                                </div>
                            </div>	
                        </div>
                    </div>
                </div>

                <div id="ivoice_info" style="display: none;">

                    <?php $this->load->view('lawyer/billing/invoice/invoice_div'); ?>

                </div>



                <div class="form-group">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success">Create Contact</button>        
                    </div>
                </div>
            </form>
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

//        function get_case(){
//            var user_id = $('#user_id').val();
//            alert(user_id);
//        }
        $(function () {
            $('#user_id').change(function () {
                var user_id = $('#user_id').val();
//            alert(user_id);
                $.ajax({
                    url: '<?php echo site_url('billing/get_case_by_user'); ?>',
                    type: 'POST',
                    data: {
                        user_id: user_id
                    },
                    success: function (data) {
                        console.log(data);
                        var data1 = $.parseJSON(data);
//                    alert(data1);

                        $('#case_id').find("option:gt(0)").remove();
                        $.each(data1['res'], function (index, value) {
                            var option_val = '<option value="' + value['CaseId'] + '">' + value['CaseName'] + '</option>';
                            //console.log(option_val);
                            $('#case_id').append(option_val);
                            showDiv();
                        });
                    }
                });
            });

            function showDiv() {
                var case_id = $('#case_id').val();
//            alert(case_id);
                if (case_id != '') {
                    $("#ivoice_info").show();
                } else {
                    $("#ivoice_info").hide();
                }
            }

            $('#case_id').change(function () {
                var case_id = $('#case_id').val();
//            alert(case_id);
                showDiv();

                $.ajax({
                    url: '<?php echo site_url('billing/get_all_info_by_case_id'); ?>',
                    type: 'POST',
                    data: {
                        case_id: case_id
                    },
                    success: function (data) {
//                    alert(data);
                        var hhh = JSON.parse(data);
                        console.log(hhh);

                        $('#ivoice_info').html(hhh.invoicediv);
//                    $('#ivoice_info').html(data);
//                        alert(data);
                    }
                });
            });
        });

        $("#contactselectdiv").change(function () {
            alert('fouzia');
            var id = $(this).val();
            alert(id);
            var result = id.split('_');
            var type = result[0];
            var contactid = result[1];
            alert(type);
            alert(contactid);
            $.ajax({
            url: "<?php echo site_url('searchcaselink'); ?>",
            type: "post",
            dataType: "json",
            data: {
                type: type,
                contactid: contactid,
            },
            success: function (msg) {
                console.log(msg);
                console.log(msg.caselink);
                $('#caselinkdiv').html('');
                $('#caselinkdiv').html(msg.caselink);
                $('#caselinkdiv').attr('size', 4);
                //$('#ivoice_info').show();
            }
        });
        });
       
       function getallvaluebycase(caseid){ 
       alert('fouzia');
       alert(caseid);
       $.ajax({
            url: "<?php echo site_url('billing/get_all_info_by_case_id'); ?>",
            type: "post",
            dataType: "json",
            data: {
                case_id: caseid,
            },
            success: function (msg) {
                 $('#ivoice_info').show();
                $('#ivoice_info').html(msg.invoicediv);
               
            }
        });
       }
    </script>

