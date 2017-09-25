<style>
    table {
        table-layout:fixed;
    }
    td{
        overflow:hidden;
        text-overflow: ellipsis;
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
                    <h5 class="panel-title">Expenses</h5>
                    <ul class="list-unstyled list-inline">
                        <li><a href="billing/expense/1"><button class="btn btn-info">Open</button></a></li>
                        <li><a href="billing/expense/2"><button class="btn btn-success">Invoiced</button></a></li>
                        <li><a href="billing/expense"><button class="btn btn-primary">All Entries</button></a></li>
                    </ul>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="<?php echo base_url()?>addinvoices">
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
                        
                        
                        <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Add Activity</h4>
                                        </div>
                                        <form action="billing/saveExpense" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Case Link</label>
                                                    <select class="form-control select2" name="UserId">
                                                        <option value="0">Choose User</option>
                                                        <?php foreach ($all_users as $users){?>
                                                        <option value="<?php echo $users['id']?>"><?php echo $users['FirstName'] . ' ' . $users['LastName']?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Activity</label>
                                                    <select class="form-control select2" name="id">
                                                        <option value="0">Choose Activity</option>
                                                        <?php foreach ($all_activity as $activity){?>
                                                        <option value="<?php echo $activity['id']?>"><?php echo $activity['activity_name'];?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Description</label>
                                                    <textarea class="form-control" name="Comments" style="resize: none;"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Date" class="control-label">Date</label>
                                                            <input type="text" name="EntryDate" class="form-control datepicker" placeholder="Date"/>
                                                        </div>       
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Cost" class="control-label">Cost</label>
                                                            <input type="text" name="ExpenseAmount" class="form-control" placeholder="Cost"/>
                                                        </div>      
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Quantity" class="control-label">Quantity</label>
                                                            <input type="text" name="qty" class="form-control" placeholder="Quantity"/>
                                                        </div>      
                                                    </div>
                                                </div>
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
                        
                        
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div id="w0" class="grid-view">
                        <div class="summary"></div>
                        <table id="all-contact-table" class="table table-striped table-bordered" style="width: 100%;">
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
                                <?php if(isset($allinvoice)){ 
                                    foreach ($allinvoice as $invoice){ //echo '<pre>'; print_r($invoice); ?>
                                <tr style="text-align: center;">
                                    <td></td>
                                    <td><?php echo $invoice['activity_name']?></td>
                                    <td><?php echo $invoice['qty']?></td>
                                    <td><?php echo $invoice['ExpenseAmount']?></td>
                                    <td><?php echo $invoice['qty'] * $row['ExpenseAmount']?></td>
                                    <td>
                                        <?php if($invoice['status'] == 2){echo 'Open';}?>
                                        <?php if($invoice['status'] == 1){echo 'Invoiced';}?>
                                    </td>
                                    <td><?php echo $invoice['FirstName'] . ' ' . $invoice['LastName']?></td>
                                    <td><?php echo $invoice['CaseName']?></td>
                                    <td>
                                        <?php if($invoice['status'] == 2){?>
                                        <a data-toggle="modal" data-target="#editLink<?php echo $invoice['ExpenseId'];?>" style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top" title="Edit Category" class="glyphicon glyphicon-edit"></span>
                                        </a>&nbsp;
                                        <a href="billing/deleteExpense/<?php echo $invoice['ExpenseId'];?>" onclick="return chkDelete()">
                                            <span data-toggle="tooltip" data-placement="top" title="Remove" class="glyphicon glyphicon-remove"></span>
                                        </a>
                                        <?php } ?>
                                    </td>
                                    
                                    <!-- Modal -->
                                        <div class="modal fade" id="editLink<?php echo $row['ExpenseId'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Add Activity</h4>
                                                    </div>
                                                    <form action="billing/editExpense" name="myForm" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="status_id" value="<?php echo $status_id;?>">
                                                        <input type="hidden" name="ExpenseId" value="<?php echo $row['ExpenseId'];?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputuname">Case Link</label>
                                                                <select class="form-control select2" name="case_id">
                                                                    <option value="0">Choose Case</option>
                                                                    <?php foreach ($all_cases as $cases) { ?>
                                                                        <option value="<?php echo $cases['CaseId'];?>" <?php if($row['case_id'] == $cases['CaseId']){echo 'selected';}?>>
                                                                            <?php echo $cases['CaseName'] ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputuname">User</label>
                                                                <select class="form-control select2" name="UserId">
                                                                    <option value="0">Choose User</option>
                                                                    <?php foreach ($all_users as $users) { ?>
                                                                        <option value="<?php echo $users['id'] ?>" <?php if($row['UserId'] == $users['id']){echo 'selected';}?>>
                                                                            <?php echo $users['FirstName'] . ' ' . $users['LastName'] ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputuname">Activity</label>
                                                                <select class="form-control select2" name="id">
                                                                    <option value="0">Choose Activity</option>
                                                                    <?php foreach ($all_activity as $activity) { ?>
                                                                        <option value="<?php echo $activity['id'] ?>" <?php if($row['activity_id'] == $activity['id']){echo 'selected';}?>>
                                                                            <?php echo $activity['activity_name']; ?>
                                                                        </option>
                                                                    <?php } ?>
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
                                                                        <input type="text" name="EntryDate" class="form-control datepicker" value="<?php echo $row['EntryDate'];?>" placeholder="Date"/>
                                                                    </div>       
                                                                </div> 
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="Cost" class="control-label">Cost</label>
                                                                        <input type="text" name="ExpenseAmount" class="form-control" value="<?php echo $row['ExpenseAmount'];?>" placeholder="Cost"/>
                                                                    </div>      
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="Quantity" class="control-label">Quantity</label>
                                                                        <input type="text" name="qty" class="form-control" value="<?php echo $row['qty'];?>" placeholder="Quantity"/>
                                                                    </div>      
                                                                </div>
                                                            </div>
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
                                    
                                </tr>
                                <?php }}?>
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


<!--    <script>
    $(document).ready(function (){
        var data = [
    { Name: "John" },
    { Name: "Jimmy" },
    { Name: "Tom" },
    { Name: "Frank" },
    { Name: "Peter" }
];
        
        $.ajax({  type: "GET",
                     
                     }).done(function(data) {
                  $("#basicgrid").jsGrid({
                        height : "auto",
                        width : "100%",
                       inserting:true,
                        editing: true,
                        filtering: true,
                        sorting : true,
                        paging : true,
                       autoload : true,
                         pageSize : 10,
        fields : [ { type: "text", name: "Name" },
        { type: "text", name: "New Name" }, { type:"control"	} ],
                   controller: {
                       loadData:  function(filter) {
                          return $.grep(data, function(item) {
                                     // client-side filtering below (be sure conditions are correct)
                             return(!filter.Firstname|| item.Firstname.indexOf(filter.Firstname) > -1) 
                                     && (!filter.Lastname|| item.Lastname.indexOf(filter.Lastname) > -1) 
                  });
                  return data;
                  },
                  
               }
              });
           });
    });    
        
    </script>-->
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
</script>



<script>
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
</script>