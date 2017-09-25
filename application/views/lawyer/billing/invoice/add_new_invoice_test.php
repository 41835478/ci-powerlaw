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
                                            <label for="exampleInputuname">User</label>
                                            <select class="form-control select2" id="user_id" name="UserId">
                                                <option value="0">Choose User</option>
                                                <?php foreach ($all_users as $users) { ?>
                                                    <option value="<?php echo $users['ContactId'] ?>"><?php echo $users['FirstName'] . ' ' . $users['LastName'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputuname">Case Link</label>
                                            <select name="case_id" id="case_id" class="form-control">
                                                <option value="">---</option>                                    
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputuname">Description</label>
                                            <textarea class="form-control" rows="5" name="Comments" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Date" class="control-label">Invoice</label>
                                            <input type="text" name="EntryDate" class="form-control" placeholder="Date"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Date" class="control-label">Invoice Date</label>
                                            <input type="text" name="EntryDate" class="form-control datepicker" placeholder="Date"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputuname">Payment Type</label>
                                            <select class="form-control select2" name="case_id">
                                                <option value="0">Choose Case</option>
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
                
                <div class="content-wrapper" style="display: block;">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Flat Fees</h5>					                        
                        </div>
                        <div class="panel-body">

                            <div class="contact-form">
                                <hr />
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="content-wrapper" style="display: block;">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Time Entries</h5>					                        
                        </div>
                        <div class="panel-body">

                            <div class="contact-form">
                                <hr />
                                <div class="row">
                                    <div class="table-responsive">
                                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                                            <table id="myTable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Date</th>
                                                        <th>Employee</th>
                                                        <th>Activity</th>
                                                        <th>Time Entry Notes </th>
                                                        <th>Debit</th>
                                                        <th>Credit</th>
                                                        <th>Line Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myadd">
                                                    <tr>
                                                        <td>
                                                            <select class="form-control select2">
                                                                <option>Select</option>
                                                                <option value="">Alaska</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control">
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2">
                                                                <option>Select</option>
                                                                <option value="">Alaska</option>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control">
                                                        </td>
                                                        <td style="width:130px;">
                                                            <input  onkeyup="docal()" type="text" name="debit" class="form-control get_debit" class="form-control">
                                                        </td>
                                                        <td style="width:130px;">
                                                            <input onkeyup="docal()" type="text" name="credit" class="form-control get_credit" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="line" class="form-control">
                                                        </td>
                                                        <td><a class="deleteRow"> x </a></td>
                                                    </tr>

                                                </tbody>                                        
                                            </table>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="button" onclick="add_tt()" id="add_row" class="btn btn-success btn-xs">Add row</button>
                                                    </td>
                                                    <td style="width:130px;">
                                                        <input readonly type="text" id="total_debit" name="total_debit" class="form-control total_debit" value="0" class="form-control">
                                                    </td>
                                                    <td style="width:130px;">
                                                        <input readonly type="text" id="total_credit" name="total_credit" class="form-control total_credit" value="0" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input readonly id="grandtotal" name="grandtotal" type="text" class="form-control grandtotal" value="0" class="form-control">
                                                    </td>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="content-wrapper" style="display: block;">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Expenses</h5>					                        
                        </div>
                        <div class="panel-body">

                            <div class="contact-form">
                                <hr />
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
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
        
        $(document).ready(function () {
            var counter = 1;

            $("#add_row").on("click", function () {
                counter++;

                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><select class="form-control select2">';
                <?php for($i = 1;$i < 3;$i++){?>
                cols += '<option>1</option>';
                <?php }?>
                cols += '</select/></td>';
                cols += '<td><input type="text" class="form-control"></td>';
                cols += '<td><input type="text" class="form-control"></td>';
                cols += '<td><input type="text" class="form-control" name="' + counter + '"/></td>';
                cols += '<td><input onkeyup="docal()"  type="text" class="form-control" name="debit' + counter + '"/></td>';
                cols += '<td><input onkeyup="docal()" type="text" class="form-control" name="credit' + counter + '"/></td>';
                cols += '<td><input type="text" name="line' + counter + '" class="form-control"></td>';
                cols += '<td><a class="deleteRow"> x </a></td>';
                newRow.append(cols);
                
                $("table#myTable").append(newRow);
//                $(".select2").select2();
            });

            $("table#myTable").on("click", "a.deleteRow", function (event) {
                $(this).closest("tr").remove();
                docal();
               // calculateGrandTotal();
            });
        });
		
    function docal(){
        var debit=0;
        var credit=0;
        var total=0;
        $('#myTable tr').each(function(i,v){
          if(i==0){

          }else{
          
            var tmpD = parseFloat($(this).find('td:nth-child(5) input').val());
            var tmpC = parseFloat($(this).find('td:nth-child(6) input').val());
            if(isNaN(tmpD)){
                tmpD=0;
            }
              if(isNaN(tmpC)){
                tmpC=0;
            }
            
            debit=parseFloat(debit) + tmpD;
            
            credit=parseFloat(credit) +tmpC;
            
            total= parseFloat(total) + (tmpD - tmpC);
            $(this).find('td:nth-child(7) input').val(tmpD+tmpC);
            
            console.log(debit);
            console.log(credit);
            console.log(total);
            
            document.getElementById('total_debit').value=debit;
            document.getElementById('total_credit').value=credit;
            document.getElementById('grandtotal').value=total;
            
            
      }
  }); 
}
        
    </script>
    
    <script>
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
//                        alert(data);
                    console.log(data);
                    var data1 = $.parseJSON(data);

                    $('#case_id').find("option:gt(0)").remove();
                    $.each(data1['res'], function (index, value) {
                        var option_val = '<option value="' + value['CaseId'] + '">' + value['CaseName'] + '</option>';
                        //console.log(option_val);
                        $('#case_id').append(option_val);
                    });
                }
            });
        });


        $('#case_id').change(function () {
            var case_id = $('#case_id').val();
            $.ajax({
                url: '<?php echo site_url('billing/get_all_info_by_case_id'); ?>',
                type: 'POST',
                data: {
                    case_id: case_id
                },
                success: function (data) {
//                        alert(data);
                }
            });
        });
    </script>

