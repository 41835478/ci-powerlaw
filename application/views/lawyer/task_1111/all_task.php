
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Tasks</h5>
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
                                            <h4 class="modal-title" id="myModalLabel">Add Task</h4>
                                        </div>
                                        <form id="myFormId" name="myForm"  method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Case Link</label>
                                                    <span id="comment1" style="color: red;"></span>
                                                     <select class="form-control select2" id="case_link" name="category">
                                                        <option value="0">Choose Link</option>
                                                        <?php if($all_cases){foreach($all_cases as $a_cases){?>
                                                        <option value="<?php echo $a_cases->CaseId;?>"><?php echo $a_cases->CaseName;?></option>
                                                        <?php }};?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Task Name</label>
                                                    <span id="comment2" style="color: red;"></span>
                                                    <input type="text" name="taskname" id="choose_usr_email" class="form-control" value="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputuname">Assign To</label>
                                                    <select class="js-example-basic-multiple" multiple="multiple" name="assignto[]" >
                                                      <?php if($all_staff){foreach($all_staff as $a_staff){?>
                                                        <option value="<?php if($all_staff){echo $a_staff->ContactId;}?>"><?php if($all_staff){if($a_staff->FirstName || $a_staff->LastName){echo $a_staff->FirstName.' '.$a_staff->LastName;} }?></option>
                                                      <?php }}?>
                                                        
                                                    </select>
                                                </div>
                                                


                                                <div class="optionBox1">
                                                    <div class="block1">
                                                        <a><span class="add1" style="margin: 10px 0px;"><span class="glyphicon glyphicon-plus" style="color: green"></span>Add Checklist Item </span></a>
                                                    </div>
                                                    <div class="block1">
                                                        <label for="exampleInputuname">Create Checklist Items</label>
                                                        <input type="text" name="headline[]" id="choose_usr_email" multiple class="form-control" value="">
                                                        <span class="remove1 btn btn-danger" style="margin-bottom: 10px;">Remove</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">

                                                         <div class="form-group field-contact-Dateopen">
                                                                 <label class="control-label" for="DueDate">Due Date</label>
                                                                <div class="input-group col-sm-12">
                                                                         <span class="input-group-addon">
                                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                                         </span>
                                                                         <input type="text" id="DueDate" class="pickadate-editable form-control" name="DueDate" data-provide="datepicker" vlaue="">

                                                                </div>
                                                                <div class="help-block"></div>

                                                         </div> 
                                                    </div> 
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label for="birthday" class="control-label">Priority</label>
                                                            <select class="form-control select2" name="priority">
                                                                <option value="0">Choose Link</option>
                                                                <option value="1">Low</option>
                                                                <option value="2">Medium</option>
                                                                <option value="3">High</option>
                                                            </select>
                                                        </div>      
                                                    </div> 
                                                </div>

                                                 <div class="form-group">
                                                    <label for="rate">Rate</label>
                                                    <span id="commentBillingCode" style="color: red;"></span>
                                                    <input type="text" name="rate" id="id_for_rate" class="form-control" value="">
                                                </div>
                                                
                                                
                                                
                                             
                                                  <div class="form-group checkbox">
                                                      <label for="rate"><label><input type="checkbox" name="is_billed" value="1" >Is Billed</label></label>
                                                   
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Description</label>
                                                    <textarea class="form-control" name="Description" style="resize: none;"></textarea>
                                                </div>
                                                
                                                <div class="optionBox">
                                                    <div class="block">
                                                        <a>
                                                            <span class="add" style="margin: 10px 0px;">
                                                                <span class="glyphicon glyphicon-plus" style="color: green"></span>
                                                                Add a Reminder 
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="block">
                                                        <label for="exampleInputuname">Reminders</label>
                                                        <div class="form-inline">
                                                            <select class="form-control col-xs-4" name="usingreminder[]">
                                                                <option value="1">Popup</option>
                                                                <option value="2">Email</option>
                                                            </select>
                                                            <input type="number" class="form-control col-xs-2" id="exampleInputEmail2" value="1" name="usingremindermail[]">
                                                            <select class="form-control col-xs-6" name="howmanydays[]">
                                                                <option value="1">Days</option>
                                                                <option value="2">Weeks</option>
                                                            </select>
                                                        </div>
                                                        <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="newone()" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!--Modal End-->
                        
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                 <div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Task</h4>
                                        </div>
                                       <form id="myFormIdedit" name="myFormedit"  method="post" enctype="multipart/form-data">
                                            <!--  <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Case Link</label>
                                                    <span id="comment1" style="color: red;"></span>
                                                     <select class="form-control select2" id="case_link_edit" name="categoryedit">
                                                        <option value="0">Choose Link</option>
                                                        <?php if($all_cases){foreach($all_cases as $a_cases){?>
                                                        <option value="<?php echo $a_cases->CaseId;?>"><?php echo $a_cases->CaseName;?></option>
                                                        <?php }};?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Task Name</label>
                                                    <span id="comment2" style="color: red;"></span>
                                                    <input type="text" name="tasknameedit" id="choose_usr_email_edit" class="form-control" value="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputuname">Assign To</label>
                                                    <select class="js-example-basic-multiple" multiple="multiple" name="eassignto[]" >
                                                      <?php if($all_staff){foreach($all_staff as $a_staff){?>
                                                        <option value="<?php if($all_staff){echo $a_staff->ContactId;}?>"><?php if($all_staff){if($a_staff->FirstName || $a_staff->LastName){echo $a_staff->FirstName.' '.$a_staff->LastName;} }?></option>
                                                      <?php }}?>
                                                        
                                                    </select>
                                                </div>
                                                


                                                <div class="optionBox1">
                                                    <div class="block1">
                                                        <a><span class="add1" style="margin: 10px 0px;"><span class="glyphicon glyphicon-plus" style="color: green"></span>Add Checklist Item </span></a>
                                                    </div>
                                                    <div class="block1">
                                                        <label for="exampleInputuname">Create Checklist Items</label>
                                                        <input type="text" name="eheadline[]" id="edit_choose_usr_email" multiple class="form-control" value="">
                                                        <span class="remove1 btn btn-danger" style="margin-bottom: 10px;">Remove</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">

                                                         <div class="form-group field-contact-Dateopen">
                                                                 <label class="control-label" for="DueDate">Due Date</label>
                                                                <div class="input-group col-sm-12">
                                                                         <span class="input-group-addon">
                                                                            <i class="glyphicon glyphicon-calendar"></i>
                                                                         </span>
                                                                         <input type="text" id="DueDateedit" class="pickadate-editable form-control" name="DueDate" data-provide="datepickeredit" vlaue="">

                                                                </div>
                                                                <div class="help-block"></div>

                                                         </div> 
                                                    </div> 
                                                    <div class="col-xs-6">
                                                        <div class="form-group">
                                                            <label for="birthday" class="control-label">Priority</label>
                                                            <select class="form-control select2" name="editpriority">
                                                                <option value="0">Choose Link</option>
                                                                <option value="1">Low</option>
                                                                <option value="2">Medium</option>
                                                                <option value="3">High</option>
                                                            </select>
                                                        </div>      
                                                    </div> 
                                                </div>

                                                 <div class="form-group">
                                                    <label for="rate">Rate</label>
                                                    <span id="commentBillingCode" style="color: red;"></span>
                                                    <input type="text" name="editrate" id="id_for_rate_edit" class="form-control" value="">
                                                </div>
                                                
                                                
                                                
                                             
                                                  <div class="form-group checkbox">
                                                      <label for="rate"><label><input type="checkbox" name="is_billed_edit" value="1" >Is Billed</label></label>
                                                   
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputuname">Description</label>
                                                    <textarea class="form-control" name="editDescription" style="resize: none;"></textarea>
                                                </div>
                                                
                                                <div class="optionBox">
                                                    <div class="block">
                                                        <a>
                                                            <span class="add" style="margin: 10px 0px;">
                                                                <span class="glyphicon glyphicon-plus" style="color: green"></span>
                                                                Add a Reminder 
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="block">
                                                        <label for="exampleInputuname">Reminders</label>
                                                        <div class="form-inline">
                                                            <select class="form-control col-xs-4" name="editusingreminder">
                                                                <option>Popup</option>
                                                                <option>Email</option>
                                                            </select>
                                                            <input type="number" class="form-control col-xs-2" id="editexampleInputEmail2" value="1" name="editusingremindermail">
                                                            <select class="form-control col-xs-6" name="howmanydays">
                                                                <option>Days</option>
                                                                <option>Weeks</option>
                                                            </select>
                                                        </div>
                                                        <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="newone()" class="btn btn-primary">Save</button>
                                            </div>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        
                    </div>					                        
                </div>
                <div class="panel-body">

                    <span id="comment33"></span>

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>

        <!--<p style="text-align: right;color: red;">Search By Name, Email, Fee Paid</p>-->
                                <tr>
                                    <th style="text-align: center;">Task Name</th>
                                    <th style="text-align: center;">Priority</th>
                                    <th style="text-align: center;">Due Date</th>
                                    <th style="text-align: center;">Case Link</th>
                                    <th style="text-align: center;">Assigned To</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($all_task){foreach ($all_task as $a_task){?>
                                
                                    <tr style="text-align: center;">
                                        
                                        <td><?php if($a_task->TaskName){echo $a_task->TaskName;}else{echo "Not Set";}?></td>
                                        <td><?php if($a_task->priority){if($a_task->priority==1){echo"Low";}elseif($a_task->priority==2){echo"Medium";}elseif($a_task->priority==3){echo"High";}else{echo "Not Set";}}else{echo "Not Set";}?></td>
                                        <td><?php if($a_task->DueDate){$timestamp = strtotime($a_task->DueDate);print date("jS F Y", $timestamp);}else{echo "Not Set";}?></td>
                                        <td><?php  if($a_task->CaseId!=NULL||$a_task->CaseId!=""||$a_task->CaseId!=0){$checkmatch=FALSE;foreach ($all_cases as $a_cases){if($a_task->CaseId==$a_cases->CaseId){$checkmatch=TRUE;echo $a_cases->CaseName;}}if($checkmatch==FALSE){echo"Not Set";}}else{echo "Not Set";}?></td>
                                       
                                        <td><?php  if($a_task->AssignedTo){if($a_task->AssignedTo!=NULL||$a_task->AssignedTo!=" "||$a_task->AssignedTo!=0){$str=$a_task->AssignedTo; $newarray=explode(",",$str);foreach($newarray as $anewarray){if($anewarray){$testmatch=FALSE;foreach($all_staff as $a_staff){if($anewarray==$a_staff->ContactId){$testmatch=TRUE;?><a href="<?php echo base_url().'company/contactDetails/'.$a_staff->ContactId?>"><?php echo $a_staff->FirstName.' '.$a_staff->LastName.'</br>';?></a><?php }}if($testmatch==FALSE){echo"Not Set";}}}}else{echo"Not Set";} }else{echo"Not Set";}?></td>
                                    
                                        <td>
                                            <a onclick="foredit(<?php echo $a_task->TaskId ?>);" style="cursor: pointer;">
                                                <span data-toggle="tooltip" data-placement="top" title="Edit Category" class="glyphicon glyphicon-edit"></span>
                                            </a>&nbsp;

                                            
                                            
                                            <a href="<?php echo base_url().'tasks/delete/'.$a_task->TaskId?>"  onClick="doconfirm();" title="Delete" aria-label="Delete" data-method="post" data-pjax="0" class="confirmation">
                                                    <span class="glyphicon glyphicon-remove" onClick="doconfirm();"></span>
                                                </a>
                                        </td>
                                        
                                    </tr>
                                <?php }}else{?> <tr><td colspan="9"><div class="empty">No results found.</div></td></tr><?php }?>
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
    $(document).ready(function (){
       $('#myTable').DataTable(); 
    });
</script>

<script>
        var count = 0;
    $('.add1').click(function() {
        var n = $(".optionBox1 .block1").length;
        console.log(n);
        count++;
    $('.block1:last').after('<div class="block1">\n\
                                <label for="exampleInputuname">Headline Name</label>\n\
                                <input type="text" name="headline[]" id="choose_usr_email" multiple class="form-control" value="">\n\
                                <div id="hiddenDiv'+count+'" class="col-xs-12"></div>\n\
                                <span class="remove1 btn btn-danger" style="margin-bottom: 10px;">Remove Option</span></div>');
    });
    $('.optionBox1').on('click','.remove1',function() {
 	$(this).parent().remove();
    });
</script>

<script>
        var count = 0;
    $('.add').click(function() {
        var n = $(".optionBox .block").length;
        console.log(n);
        count++;
    $('.block:last').after('<div class="block">\n\
                                <label for="exampleInputuname">Reminders</label>\n\
                                <div class="form-inline">\n\
                                    <select class="form-control col-xs-4" name="usingreminder[]">\n\
                                        <option value="1">Popup</option>\n\
                                        <option value="2">Email</option>\n\
                                    </select>\n\
                                    <input type="email" class="form-control col-xs-2" id="exampleInputEmail2" name="usingremindermail[]" value="1">\n\
                                    <select class="form-control col-xs-6" name="howmanydays[]">\n\
                                        <option value="1">Days</option>\n\
                                        <option value="2">Weeks</option>\n\
                                    </select>\n\
                                </div>\n\
                                \n\
                                <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove</span></div>');
    });
    $('.optionBox').on('click','.remove',function() {
 	$(this).parent().remove();
    });
</script>













<script>
        var count = 0;
    $('.addedit').click(function() {
        alert('jfhbvhj');
//        var n = $(".optionBox .block").length;
//        console.log(n);
//        count++;
//    $('.block:last').after('<div class="block">\n\
//                                <label for="exampleInputuname">Reminders</label>\n\
//                                <div class="form-inline">\n\
//                                    <select class="form-control col-xs-4" name="usingreminderedit[]">\n\
//                                        <option value="1">Popup</option>\n\
//                                        <option value="2">Email</option>\n\
//                                    </select>\n\
//                                    <input type="email" class="form-control col-xs-2" id="exampleInputEmail2" name="usingremindermailedit[]" value="1">\n\
//                                    <select class="form-control col-xs-6" name="howmanydaysedit[]">\n\
//                                        <option value="1">Days</option>\n\
//                                        <option value="2">Weeks</option>\n\
//                                    </select>\n\
//                                </div>\n\
//                                \n\
//                                <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove</span></div>');
//    });
//    $('.optionBox').on('click','.remove',function() {
// 	$(this).parent().remove();
    });
</script>


























<script type="text/javascript">

// Form validation code will come here.
function validate()
{
    r=document.getElementById("case_link").value;
   
   
   if(r==''||r==0)
   {
       
     comment="Please choose a case link!";
     document.getElementById('comment1').innerHTML=comment;
     document.myForm.category.focus() ;
    return false;
   }
    if( document.myForm.taskname.value == "")
   {
       
     comment1="Task Name field is required!";
     document.getElementById('comment2').innerHTML=comment1;
     document.myForm.taskname.focus() ;
     return false;
   }
   if (isNaN(document.myForm.rate.value))
      {  
     commentisNaN="Rate should be a number!";
    document.getElementById('commentBillingCode').innerHTML=commentisNaN;
     document.myForm.rate.focus() ;
     return false;
      }  
  document.getElementById('comment1').innerHTML=' ';
  document.getElementById('commentBillingCode').innerHTML=' ';
  document.getElementById('comment2').innerHTML=' '; 
 return true;
}
//
</script>








<script type="text/javascript">

// Form validation code will come here.
function validate2()
{
       r=document.getElementById("case_link_edit").value;
   
   
   if(r==''||r==0)
   {
       
     comment="Please choose a case link!";
     document.getElementById('comment11').innerHTML=comment;
     document.myFormedit.editcategory.focus() ;
    return false;
   }
    if(document.myFormedit.edittaskname.value == "")
   {
       
     comment1="Task Name field is required!";
     document.getElementById('comment2edit').innerHTML=comment1;
     document.myFormedit.edittaskname.focus() ;
     return false;
   }
//   if (isNaN(document.myFormedit.editrate.value))
//      {  
//     commentis="Rate should be a number!";
//    document.getElementById('commentBillingCode1').innerHTML=commentis;
//     document.myFormedit.editrate.focus() ;
//     return false;
//      }  

 return true;
}
//
</script>




















<script type="text/javascript">

// Form validation code will come here.
function newone()
{
  if( validate()==true){
    

v=$('#myFormId').serialize();


  var baseurl = "<?php echo base_url(); ?>";
 $.ajax({
       type: "POST",
       url:  baseurl+"Task/AddTask",
        
        data : $('#myFormId').serialize(),  
        
        success: function( r) {
          
             //  $('#comment1').text(''); 
      // $('#comment1').text(r); 
      document.getElementById("case_link").value='';
      $('#choose_usr_email').val(''); 
      $('#id_for_rate').val(''); 
      $('#DueDate').val(''); 
  
       $('#comment1').html(''); 
       $('#comment1').html(r); 
          window.setTimeout(function(){location.reload()},3000)
        
     }
    });
     
     
  }
 

}
//
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
            cancelButtonText: "No, cancel plx!",
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



<script>
    function foredit(id)
{
   
     var baseurl = "<?php echo base_url(); ?>";
     
     
     
      $.ajax({
      
       datatype:"json",
       url:  baseurl+"Task/editTask/"+id,
      
         success: function( r) {
           

   $('#myFormIdedit').html('');  
   $('#myFormIdedit').html(r);  
   
   $(".js-example-basic-multiple-edit").select2();
   $('#myModaledit').modal('show');
     var count = 0;
    $('.addedit').click(function() {
        alert('jfhbvhj');
        var n = $(".optionBox .block").length;
        console.log(n);
        count++;
    $('.block:last').after('<div class="block">\n\
                                <label for="exampleInputuname">Reminders</label>\n\
                                <div class="form-inline">\n\
                                    <select class="form-control col-xs-4" name="usingreminderedit[]">\n\
                                        <option value="1">Popup</option>\n\
                                        <option value="2">Email</option>\n\
                                    </select>\n\
                                    <input type="email" class="form-control col-xs-2" id="exampleInputEmail2" name="usingremindermailedit[]" value="1">\n\
                                    <select class="form-control col-xs-6" name="howmanydaysedit[]">\n\
                                        <option value="1">Days</option>\n\
                                        <option value="2">Weeks</option>\n\
                                    </select>\n\
                                </div>\n\
                                \n\
                                <span class="remove btn btn-danger" style="margin-bottom: 10px;">Remove</span></div>');
    });
    $('.optionBox').on('click','.remove',function() {
 	$(this).parent().remove();
    });

   }
    });
    
     
    }
 
</script>



<script type="text/javascript">

// Form validation code will come here.
function newone2()
{
   if( validate2()==true){

v=$('#myFormIdedit').serialize();

//alert(v);
  var baseurl = "<?php echo base_url(); ?>";
 $.ajax({
       type: "POST",
       url:  baseurl+"Task/UpdateTask",
        
        data : $('#myFormIdedit').serialize(),  
        
        success: function( r) {
         // alert(r);
         $("#successedit").html("<p> Task successfully added!</p>");
          window.setTimeout(function(){location.reload()},3000)  
             
     }
    });
  }
 

}
//
</script>
<script>
$(document).ready(function(){
    //get it if Status key found
    if(localStorage.getItem("Status"))
    {
        Toaster.show("The record is added");
        localStorage.clear();
    }
});

</script>
<script type="text/javascript">
$(".js-example-basic-multiple").select2();

</script>