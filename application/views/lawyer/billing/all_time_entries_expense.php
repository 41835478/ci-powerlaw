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
                        <li><a href="billing/timeEntries/1"><button class="btn btn-info">Open</button></a></li>
                        <li><a href="billing/timeEntries/2"><button class="btn btn-success">Invoiced</button></a></li>
                        <li><a href="billing/timeEntries"><button class="btn btn-primary">All Entries</button></a></li>
                    </ul>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a data-toggle="modal" data-target="#myModal">
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
                                        <form action="billing/saveTimeEntries" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>">
                                            <input type="hidden" name="status_id" value="<?php echo $status_id;?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Case Link</label>
                                                    <select class="form-control select2 case" name="case_id" id="case">
                                                        <option value="0">Choose Case</option>
                                                        <?php foreach ($all_cases as $cases){?>
                                                        <option value="<?php echo $cases['CaseId']?>"><?php echo $cases['CaseName']?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputuname">User</label>
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
                                                            <label for="Cost" class="control-label">Rate</label>
                                                            <input type="text" name="amount" id="rate" class="form-control rate" placeholder="Cost"/>
                                                            <select name="rate_type">
                                                                <option value="1">/hr.</option>
                                                                <option value="2">Flat</option>
                                                            </select>
                                                        </div>      
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Quantity" class="control-label">Duration</label>
                                                            <input type="text" name="duration" class="form-control" placeholder="Minutes"/>
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
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Activity</th>
                                    <th style="text-align: center;">Quantity</th>
                                    <th style="text-align: center;">Cost</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">User</th>
                                    <th style="text-align: center;">Case Link</th>
                                    <th class="action-column">&nbsp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($all_time_entries)){ foreach ($all_time_entries as $row){?>
                                <tr style="text-align: center;">
                                    <td><?php echo $row['EntryDate']?></td>
                                    <td><?php echo $row['activity_name']?></td>
                                    <td><?php echo $row['duration']?></td>
                                    <td><?php echo $row['amount']?></td>
                                    <td><?php echo (($row['duration'])/60) * $row['amount']?></td>
                                    <td>
                                        <?php if($row['status'] == 2){echo 'Open';}?>
                                        <?php if($row['status'] == 1){echo 'Invoiced';}?>
                                    </td>
                                    <td><?php echo $row['FirstName'] . ' ' . $row['LastName']?></td>
                                    <td><?php echo $row['CaseName']?></td>
                                    <td>
                                        <?php if($row['status'] == 2){?>
                                        <a data-toggle="modal" data-target="#editLink<?php echo $row['time_entry_id'];?>" style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top" title="Edit Category" class="glyphicon glyphicon-edit"></span>
                                        </a>&nbsp;
                                        <a href="billing/deleteTimeEntries/<?php echo $row['time_entry_id'];?>" onclick="return chkDelete()">
                                            <span data-toggle="tooltip" data-placement="top" title="Remove" class="glyphicon glyphicon-remove"></span>
                                        </a>
                                        <?php }?>
                                    </td>
                                    
                                    <!-- Modal -->
                                        <div class="modal fade" id="editLink<?php echo $row['time_entry_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Add Activity</h4>
                                                    </div>
                                                    <form action="billing/editTimeEntries" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="status_id" value="<?php echo $status_id; ?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputuname">Case Link</label>
                                                                <select class="form-control select2 case" name="case_id" id="case">
                                                                    <option value="0">Choose Case</option>
                                                                    <?php foreach ($all_cases as $cases) { ?>
                                                                        <option value="<?php echo $cases['CaseId'];?>"  <?php if($row['case_id'] == $cases['CaseId']){echo 'selected';}?>>
                                                                            <?php echo $cases['CaseName'];?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputuname">User</label>
                                                                <select class="form-control select2" name="UserId">
                                                                    <option value="0">Choose User</option>
                                                                    <?php foreach ($all_users as $users) { ?>
                                                                        <option value="<?php echo $users['id'] ?>" <?php if($row['user_id'] == $users['id']){echo 'selected';}?>>
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
                                                                <textarea class="form-control" name="Comments" style="resize: none;"><?php echo $row['description']; ?></textarea>
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
                                                                        <label for="Cost" class="control-label">Rate</label>
                                                                        <input type="text" name="amount" id="rate" class="rate form-control" value="<?php echo $row['amount']; ?>" placeholder="Cost"/>
                                                                        <select name="rate_type">
                                                                            <option value="1" <?php if($row['rate_type'] == 1){echo 'selected';}?>>/hr.</option>
                                                                            <option value="2">Flat</option>
                                                                        </select>
                                                                    </div>      
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="Quantity" class="control-label">Duration</label>
                                                                        <input type="text" name="duration" class="form-control" value="<?php echo $row['duration']; ?>" placeholder="Minutes"/>
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


<script>
    
    $('.case').change(function () {
        var case_id = $('.case').val();
//        alert(case_id);
        $.ajax({
            url: '<?php echo site_url('billing/get_rate_by_case'); ?>',
            type: 'POST',
            data: {
                case_id: case_id
            },
            success: function (data) {
//                alert(data);
                console.log(data);
                var data1 = $.parseJSON(data);

                $('.rate').find("option:gt(0)").remove();
                $.each(data1['res'], function (index, value) {
                    var option_val =  value['BillingRate'];
                    if(option_val != ''){
                        $('.rate').val(option_val);
                    }
                    if(option_val == ''){
                        option_val = 0;
                        $('.rate').val(option_val);
                    }
//                    if(option_val == null){
//                        $(this).next("#rate").val() = 0;
//                    }
//                    
                });
            }
        });
    });
    
</script>

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