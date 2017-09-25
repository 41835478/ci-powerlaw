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
                    <h5 class="panel-title">Activity</h5>
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
                                        <form action="billing/saveActivity" name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id');?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Activity Name</label>
                                                    <input type="text" name="activity_name" id="choose_usr_email" class="form-control" value="">
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
                                    <th style="text-align: center;">Activity</th>
                                    <th style="text-align: center;">Time Entries</th>
                                    <th style="text-align: center;">Expenses</th>
                                    <th style="text-align: center;">Total Hours</th>
                                    <th style="text-align: center;">Created By</th>
                                    <th class="action-column">&nbsp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($all_activity as $row){?>
                                <tr style="text-align: center;">
                                    <td><?php echo $row['activity_name'];?></td> 
                                    <td>0</td> 
                                    <td>0</td> 
                                    <td>0</td> 
                                    <td><?php echo $row['FirstName'] . ' ' . $row['LastName'];?></td> 
                                    <td>
                                        <a data-toggle="modal" data-target="#editLink<?php echo $row['id'];?>" style="cursor: pointer;">
                                            <span data-toggle="tooltip" data-placement="top" title="Edit Category" class="glyphicon glyphicon-edit"></span>
                                        </a>&nbsp;
                                        <a href="billing/deleteActivity/<?php echo $row['id'];?>" class="confirmation">
                                            <span data-toggle="tooltip" data-placement="top" title="Remove" class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                    
                                    <!-- Modal -->
                                        <div class="modal fade" id="editLink<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Add Activity</h4>
                                                    </div>
                                                    <form action="billing/editActivity" name="myForm" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputuname">Activity Name</label>
                                                                <input type="text" name="activity_name" id="choose_usr_email" class="form-control" value="<?php echo $row['activity_name'];?>">
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
                                <?php }?>
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