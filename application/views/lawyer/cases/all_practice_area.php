<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>allPracticeArea">Practice Area</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <span><div align="center" style="color: green;"><h4><?php if( $this->session->flashdata('insertsuccess')){echo  $this->session->flashdata('insertsuccess');}?></h4></div></span>
                    <h5 class="panel-title">All Practice Area</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                              <?php if ($_SESSION['permissionsession']['cases'] == '1') { ?>
                            <li>
                                <a data-toggle="modal" data-target="#myModal">
                                    <span class="label label-success label-icon">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </span>
                                </a>                                
                            </li>
                              <?php } ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url()?>practiceAreaexl"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url()?>practiceAreapdf"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                        
                        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Practice Areas</h4>
                        </div>
                        <form  name="myForm"   method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputuname">Practice Areas Name</label>
                                     <span id="comment1" style="color: red;"></span>
                                    
                                     <span id="pacticeArea" style="color: green;"></span>
                                     
                                    <input type="text" name="practice_area" id="practice_area_id" multiple class="form-control" value="">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="newone()" id="iii" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
    
             <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update Practice Areas</h4>
                        </div>
                        <form  name="myForm1" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group" id="tryupdate">
                                    <label for="exampleInputuname">Practice Areas Name</label>
                                    
                                       <span id="successedit" style="color: green;"></span>
                                    <span id="comment3" style="color: red;"></span>
                                     <span id="pacticeAreaforupdate" style="color: green;"></span>
                                     
                                    <input type="text" name="practice_area1" id="practice_area_id" multiple class="form-control" value="">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="form_submit()" id="iii" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <!--Modal End-->
                        
                        
                    </div>					                        
                </div>
                <div class="panel-body">


                    
    
    


                    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">   
                            <table id="all-contact-table" class="table table-striped table-bordered" name="new_table" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Practice Areas</th>
                                        <th># of Active Cases</th>
                                        <th>Created By</th>
                                        <th class="action-column">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php if($allpracticearea){$j=1;foreach($allpracticearea as $apracticearea){?>
                                    <tr data-key="1">
                                        <td><?php echo $j++;?>
                                          
                                        </td>
                                        <td><?php if($apracticearea){if($apracticearea->PracticeArea){echo $apracticearea->PracticeArea;}else{echo "Not Set";}}?></td>
                                        <td> <?php if($apracticearea){if($allcases){$i=0;foreach($allcases as $acase){if($apracticearea->PracticeAreaId==$acase->PracticeArea){$i++;}}echo $i;}}?></td>
                                        <td><?php if($apracticearea){if($apracticearea->DefinedBy){echo $apracticearea->DefinedBy;}}?></td>
                                        <td>
                                  
                                          <button type="button" onclick="foredit(<?php echo $apracticearea->PracticeAreaId ?>);" id="iii" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></button>
                                            
<!--                                            <a href="<?php echo base_url().'cases/aPracticeArea/'. base64_encode($apracticearea->PracticeAreaId) ?>" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>-->
                                        </td>
                                    </tr>
                                    <?php }}else{?> <tr><td colspan="9"><div class="empty">No results found.</div></td></tr><?php }?>
                                </tbody>
                            </table>
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
<script type="text/javascript">

// Form validation code will come here.
function validate()
{
   if( document.myForm.practice_area.value == "" )
   {
     comment="Practice Area Name is Required !";
    document.getElementById('comment1').innerHTML=comment;
     document.myForm.practice_area.focus() ;
     return false;
   }
 return true;
 
 
 
 
}
//
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







<script type="text/javascript">

// Form validation code will come here.
function newone()
{
  if( validate()==true){
       $('#comment1').html(''); 
     var practice_area_id = $('#practice_area_id').val();
  
     var baseurl = "<?php echo base_url(); ?>";
     
     
     
 $.ajax({
       type: "get",
       url:  baseurl+"Cases/AddPracticeArea",
       data: {
            practice_area_id: practice_area_id
        },     
        success: function( r) {
       $('#practice_area_id').val('');
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
    function foredit(id)
{
   
     var baseurl = "<?php echo base_url(); ?>";
     
     
     
      $.ajax({
      
       datatype:"json",
       url:  baseurl+"Cases/editPracticeArea/"+id,
      
         success: function( r) {
         

    $('#tryupdate').html('');  
   $('#tryupdate').html(r);  
   $('#myModal2').modal('show');

   }
    });
    
     
    }
 
</script>
<script>
function form_submit(){
    //alert('dsfrs');
       name=$('#practice_area_id1multiple').val(); 
       id=$('#practice_area_id_updatemultiple').val(); 
  
//  
     var baseurl = "<?php echo base_url(); ?>";
       $.ajax({
       type: "get",
       url:  baseurl+"Cases/validationUpdate/"+name+id,
       data: {
            practice_area_id: name,
            practice_area_id_update: id
        },     
        success: function( r) {
         
           // alert(pacticeAreaforupdate);
             $('#practice_area1').val('');
            $('#comment3').html(''); 
       $('#successedit').html("<p> Task successfully updated!</p>");
        window.setTimeout(function(){location.reload()},1000)  

   }
    });
     
     
  
    
    
    
}


</script>
<!--<script>
$('#myModal2').on('hidden.bs.modal', function () {
  window.location.reload(true);
})
</script>-->