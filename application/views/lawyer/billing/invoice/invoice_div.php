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
                <div class="row">
                    <div class="table-responsive">
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Activity</th>
                                        <th>Time Entry Notes</th>
                                        <th>Rate</th>
                                        <th>Hours</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myadd">
                                    <?php $i = 0; $sum = 0; foreach ($time_entries as $time){?>
                                    <input type="hidden" id="case_id" class="form-control"  value="<?php echo $time['case_id'];?>">
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control datepicker"  value="<?php echo $time['EntryDate'];?>">
                                        </td>
                                        <td>
                                            <select class="form-control select2" onchange="get_rate(this.value,'<?php echo $i;?>')">
                                                <?php foreach ($all_staff as $staff){?>
                                                <option value="<?php echo $staff['id'];?>" <?php if($time['user_id'] == $staff['id']){echo 'selected';}?>>
                                                    <?php echo $staff['FirstName']. ' ' .$staff['LastName'];?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select2">
                                                <?php foreach ($all_activity as $activity){?>
                                                <option value="<?php echo $activity['id'];?>" <?php if($time['activity_id'] == $activity['id']){echo 'selected';}?>>
                                                    <?php echo $activity['activity_name'];?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="debit" class="form-control get_debit" value="<?php echo $time['description'];?>">
                                        </td>
                                        <td>
                                            <input id="rate<?php echo $i;?>" onkeyup="docal()" type="text" name="rate<?php echo $i;?>" class="form-control" value="<?php echo $time['amount'];?>">
                                        </td>
                                        <td>
                                            <input type="text" name="hour<?php echo $i;?>" onkeyup="docal()" value="<?php echo $time['duration'];?>" class="form-control" style="width: 50%;float: left;">
                                            <select class="form-control select2" style="width: 50%;">
                                                <option value="1" <?php if($time['rate_type'] == 1){echo 'selected';}?>>/hr.</option>
                                                <option value="2" <?php if($time['rate_type'] == 2){echo 'selected';}?>>flat</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input id="" readonly="" type="text" name="line_total" class="form-control get_credit" 
                                                   value="<?php 
                                                        if($time['rate_type'] == 2){
                                                            echo $time['amount'];
                                                        }if($time['rate_type'] == 1){
                                                            echo ($time['duration']/60) * $time['amount'];
                                                        }
                                                        ?>" class="form-control">
                                            <?php $sum = $sum + ($time['duration']/60) * $time['amount'];?>
                                        </td>
                                        <td><a class="deleteRow"> x </a></td>
                                    </tr>
                                    <?php $i++;}?>
                                </tbody>                                        
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2">
                                        <button type="button" id="add_row" class="btn btn-success btn-xs">Add row</button>
                                    </td>
                                    <td colspan="4">
                                        Time Entries Totals
                                    </td>
<!--                                    <td>
                                        <input readonly type="text" id="total_credit" name="total_credit" class="form-control total_credit" value="0" class="form-control">
                                    </td>-->
                                    <td>
                                        <input readonly id="subtotal" name="grandtotal" type="text" class="form-control grandtotal" value="<?php echo $sum;?>" class="form-control" style="text-align: right;">
                                    </td>
                                    <td></td>
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
                <div class="row">
                    
                    <div class="table-responsive">
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="expenseTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <thead>
                                    <tr role="row">
                                        <th>Date</th>
                                        <th>Employee</th>
                                        <th>Expense</th>
                                        <th>Expense Description</th>
                                        <th>Cost</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myadd">
                                    <?php $i = 0; $sum = 0; foreach ($expenses as $expense){?>
                                    <input type="hidden" id="case_id" class="form-control"  value="<?php echo $expense['case_id'];?>">
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control datepicker"  value="<?php echo $expense['EntryDate'];?>">
                                        </td>
                                        <td>
                                            <select class="form-control select2" onchange="get_rate(this.value,'<?php echo $i;?>')">
                                                <?php foreach ($all_staff as $staff){?>
                                                <option value="<?php echo $staff['id'];?>" <?php if($expense['UserId'] == $staff['id']){echo 'selected';}?>>
                                                    <?php echo $staff['FirstName']. ' ' .$staff['LastName'];?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select2">
                                                <?php foreach ($all_activity as $activity){?>
                                                <option value="<?php echo $activity['id'];?>" <?php if($expense['activity_id'] == $activity['id']){echo 'selected';}?>>
                                                    <?php echo $activity['activity_name'];?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="debit" class="form-control get_debit" value="<?php echo $expense['Comments'];?>">
                                        </td>
                                        <td>
                                            <input id="expense<?php echo $i;?>" onkeyup="doExpenseCal()" type="text" name="expense<?php echo $i;?>" class="form-control" value="<?php echo $expense['ExpenseAmount'];?>">
                                        </td>
                                        <td>
                                            <input type="text" name="qty<?php echo $i;?>" onkeyup="doExpenseCal()" value="<?php echo $expense['qty'];?>" class="form-control">
                                        </td>
                                        <td>
                                            <input id="" readonly="" type="text" name="line_total" class="form-control get_credit" 
                                                   value="<?php echo $expense['ExpenseAmount'] * $expense['qty'];
                                                        ?>" class="form-control">
                                            <?php $sum = $sum + ($expense['ExpenseAmount'] * $expense['qty']);?>
                                        </td>
                                        <td><a class="deleteExpenseRow"> x </a></td>
                                    </tr>
                                    <?php $i++;}?>
                                </tbody>                                        
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="2">
                                        <button type="button" id="add_expenses_row" class="btn btn-success btn-xs">Add row</button>
                                    </td>
                                    <td colspan="4">
                                        Expenses Totals
                                    </td>
<!--                                    <td>
                                        <input readonly type="text" id="total_credit" name="total_credit" class="form-control total_credit" value="0" class="form-control">
                                    </td>-->
                                    <td>
                                        <input readonly id="expenses_sub_total" name="grandtotal" type="text" class="form-control grandtotal" value="<?php echo $sum;?>" class="form-control" style="text-align: right;">
                                    </td>
                                    <td></td>
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
            <h5 class="panel-title">Invoice Totals</h5>					                        
        </div>
        <div class="panel-body">

            <div class="contact-form">
                <div class="row">
                    <div class="table-responsive">
                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                            <table id="expenseTable" class="table table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                                <tr>
                                    <td>Flat Fees Sub-Total</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>Time Entries Sub-Total</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>Expenses Sub-Total</td>
                                    <td>12</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function get_rate(staff_id,unique_id){
//        alert(unique_id);
        var case_id = $("#case_id").val();
        $.ajax({
                url: '<?php echo site_url('billing/get_time_entry_by_staff_id'); ?>',
                type: 'POST',
                data: {
                    staff_id: staff_id,
                    case_id:case_id
                },
                success: function (data) {
                    var res = jQuery.parseJSON(data);
                    $("#rate"+unique_id).val(res.time_entries);
                    docal();
                }
            });
    }
</script>

<script>
    $(function(){
        $( '.datepicker' ).pickadate({
            format: 'yyyy/mm/dd',
            formatSubmit: 'yyyy/mm/dd'
        });
    });
</script>


<!--          #####  For Time Entries Table  ######           -->


<script>
        $(document).ready(function () {
            var counter = 1;
//            $(document).on('click','#add_row',function(e){
            $("#add_row").on("click", function () {
                counter++;
//                alert(counter);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="text" class="form-control datepicker" name="' + counter + '"/></td>';
                cols += '<td><select class="form-control select2" onchange="get_rate(this.value,'+ counter +')">';
                <?php foreach ($all_staff as $staff){?>
                cols += '<option value="<?php echo $staff['id'];?>"><?php echo $staff['FirstName']. ' ' .$staff['LastName'];?></option>';
                <?php }?>
                cols += '</select/></td>';
                cols += '<td><select class="form-control select2">';
                <?php foreach ($all_activity as $activity){?>
                cols += '<option value="<?php echo $activity['id'];?>"><?php echo $activity['activity_name'];?></option>';
                <?php }?>
                cols += '</select/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" onkeyup="docal()" class="form-control" name="rate' + counter + '" id="rate' + counter + '"/></td>';
                cols += '<td>\n\
                        <input type="text" onkeyup="docal()" name="hour' + counter + '" value="" class="form-control" style="width: 50%;float: left;">\n\
                        <select class="form-control select2" style="width: 50%;">\n\
                            <option value="1" <?php if($time['rate_type'] == 1){echo 'selected';}?>>/hr.</option>\n\
                            <option value="2" <?php if($time['rate_type'] == 2){echo 'selected';}?>>flat</option>\n\
                        </select>\n\
                        </td>';
                cols += '<td><input id="" type="text" name="line_total" class="form-control get_credit"></td>';
                cols += '<td><a class="deleteRow"> x </a></td>';
                newRow.append(cols);
                
                $("table#myTable").append(newRow);
                $( '.datepicker' ).pickadate({
                    format: 'yyyy/mm/dd'
                });
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
            
            debit = parseFloat(debit) + tmpD;
            
            credit = parseFloat(credit) +tmpC;
            
            $(this).find('td:nth-child(7) input').val(tmpD * (tmpC/60));
            
            total = parseFloat(total) + (tmpD * (tmpC/60));
            
            document.getElementById('subtotal').value=total;
            
            
      }
  }); 
}
        
</script>
<!--          #####  End Time Entries Table  ######           -->


<!--          #####  For Expenses Table  ######           -->

<script>
        $(document).ready(function () {
            var counter = 1;
//            $(document).on('click','#add_row',function(e){
            $("#add_expenses_row").on("click", function () {
                counter++;
//                alert(counter);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="text" class="form-control datepicker" name="' + counter + '"/></td>';
                cols += '<td><select class="form-control select2" onchange="get_rate(this.value,'+ counter +')">';
                <?php foreach ($all_staff as $staff){?>
                cols += '<option value="<?php echo $staff['id'];?>"><?php echo $staff['FirstName']. ' ' .$staff['LastName'];?></option>';
                <?php }?>
                cols += '</select/></td>';
                cols += '<td><select class="form-control select2">';
                <?php foreach ($all_activity as $activity){?>
                cols += '<option value="<?php echo $activity['id'];?>"><?php echo $activity['activity_name'];?></option>';
                <?php }?>
                cols += '</select/></td>';
                cols += '<td><input type="text" class="form-control" name="description' + counter + '"/></td>';
                cols += '<td><input type="text" onkeyup="doExpenseCal()" class="form-control" name="rate' + counter + '" id="rate' + counter + '"/></td>';
                cols += '<td>\n\
                        <input type="text" onkeyup="doExpenseCal()" name="qty' + counter + '" value="" class="form-control" style="width: 50%;float: left;">\n\
                        </td>';
                cols += '<td><input id="" type="text" name="line_total" class="form-control get_credit"></td>';
                cols += '<td><a class="deleteExpenseRow"> x </a></td>';
                newRow.append(cols);
                
                $("table#expenseTable").append(newRow);
                $( '.datepicker' ).pickadate({
                    format: 'yyyy/mm/dd'
                });
//                $(".select2").select2();
            });
            
            $("table#expenseTable").on("click", "a.deleteExpenseRow", function (event) {
                $(this).closest("tr").remove();
                docal();
               // calculateGrandTotal();
            });
            
        });
        
        
        function doExpenseCal(){
        var debit=0;
        var credit=0;
        var total=0;
        $('#expenseTable tr').each(function(i,v){
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
            
            debit = parseFloat(debit) + tmpD;
            
            credit = parseFloat(credit) +tmpC;
            
            $(this).find('td:nth-child(7) input').val(tmpD *tmpC);
            
            total = parseFloat(total) + (tmpD * tmpC);
            
            document.getElementById('expenses_sub_total').value=total;
            
            
      }
  }); 
}
        
</script>

<!--          #####  End Expenses Table  ######           -->
