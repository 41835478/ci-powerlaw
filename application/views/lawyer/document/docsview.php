 <link type="text/css" rel="stylesheet" href="<?php echo base_url().'themes/ladmin/layouts/dropzone/dropzone.css'?>" />
<script src="<?php echo base_url().'themes/ladmin/layouts/dropzone/dropzone.js'?>"></script>

<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>casedoc">Case Document</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->

<!--------------------sweet alert------------------->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/sweetalert.css">  
<script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
<!-- Page container -->
<div class="page-container">
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check-square-o"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }
    ?>

    <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-check-square-o"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>

    <?php }
    ?>
    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Documents</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <?php if ($_SESSION['permissionsession']['documents'] == '1') { ?>
                                <a data-toggle="modal" data-target="#myModal"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>       
                                <?php } ?></li>
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
                    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive"> 
                        <table class="table table-bordered" id="firmdatatables" style="border: 1px solid #ddd;  word-wrap:break-word;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Document Title</th>
                                    <th>Case Link</th>
                                    <th>Last Updated</th>
                                    <th class="action-column">Action</th></tr>
                            </thead>
                            <tbody>
                                <?php $i=1;foreach ($alldocinfo as $doc) {  ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><a><?php echo $doc['OriginalName']; ?></a><p><?php echo $doc['OriginalName']; ?></p></td>
                                        <td><a><?php echo $doc['CaseName']; ?></a></td>
                                        <td>Updated On <?php echo date('d F, Y', strtotime($doc['UploadedOn'])); ?><p>By <a><?php echo $doc['fullname']; ?></a></p></td>
                                        <td>
                                            <?php if ($_SESSION['permissionsession']['documents'] == '2' ||$_SESSION['permissionsession']['documents'] == '1') { ?>
                                            <a href="<?php echo base_url() ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <?php }?>
                                            <?php if ($_SESSION['permissionsession']['documents'] == '1') { ?>
                                            <a href="<?php echo base_url() ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-comment"></span></a>
                                            <a href="<?php echo base_url() ?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="alertForDelete" href="<?php //echo base_url()?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                        <?php }?>
                                        </td>
                                    </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>	
            </div>			
        </div>
        <!-- /main content -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="width: 700px; height: 400px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Add Document</h3>
                    </div>
                    <div class="modal-body" style="background:#F6F6F6; height: 300px;">
                        <h3 style="text-align: center;">How would you like to add your document?</h3><br>
                        <div class="row">
                            <div class="col-md-4" style="background: #E3F4FF; height: 150px; border: 1px solid #B7B7B7; border-radius: 18px; width: 25%; margin-right: 10px; text-align: center; margin-left: 36px;">
                                <a href="" id="uploadid" data-toggle="modal" data-target="#documentupload"><div style="margin-top: 28px;"><img src="<?php echo base_url() ?>assets/image/document_new_upload.png"><p>Upload Document(s)</p></div></a>
                            </div>
                            <div class="col-md-4" style="background: #E3F4FF; height: 150px; border: 1px solid #B7B7B7; border-radius: 18px; width: 25%; margin-right: 10px; text-align: center; margin-left: 34px;">
                                <a href="" data-toggle="modal" data-target="#margetemplete"><div style="margin-top: 28px;"><img src="<?php echo base_url() ?>assets/image/document_new_template.png"><p>Marge Template</p></div></a>
                            </div>
                            <div class="col-md-4" style="background: #E3F4FF; height: 150px; border: 1px solid #B7B7B7; border-radius: 18px; width: 25%; margin-right: 40px; text-align: center; float: right;">
                                <a href="<?php echo base_url().'documents/blankDocuments'?>" target="blank"><div style="margin-top: 28px;"><img src="<?php echo base_url() ?>assets/image/document_new_blank.png"><p>Blank page</p></div></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->

        <!----------------------------------------   1st MODAL   -------------------------------------------->

        <!-- Modal -->
        <div id="documentupload" class="modal fade" role="dialog" style="width: 1400px;">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Document</h4>
      </div>
    <div class="modal-body newmodal">
   <div class="row" style="border-top: 1px dotted; border-bottom: 1px dotted; ">
   <div class="col-sm-7 col-md-7" style="margin-right: 10px;border-right: 1px dotted; padding-top: 15px;padding-right: 25px;">
   <div class="form-group">
  <label for="sel1">Case Link:</label>
  <select class="form-control" id="sel1" onchange="myFunction()">
    <option>Select a Case</option>
    <?php if($allassignedcases){foreach($allassignedcases as $assignedcases){?>
    <option value="<?php if($assignedcases['caseId']){echo $assignedcases['caseId'];}?>" id="<?php echo'caseid'.$assignedcases['caseId']?>" extraattr="<?php if($assignedcases['CaseName']){echo $assignedcases['CaseName'];}?>"><?php if($assignedcases['CaseName']){echo $assignedcases['CaseName'];}?></option>
 <?php }}?>
  </select>
  
</div>
           <div class="form-group">
               <p id="foldername"><strong>Folder Name :</strong> No case selected</p>
     
    </div>
           <div class="form-group">
      <label for="usr">Doc. Name:</label>
      <input type="text" class="form-control" id="docname">
    </div>
            <div class="form-group">
           <label for="usr">Source</label>
          <form class="dropzone" id="my-dropzone" method="" enctype="multipart/form-data">
              
              <input type="hidden" value="" id="foldernamehidden" name="hhh">
           <input type="hidden" value="" id="assignstaffhidden" name="assignstaffid">
             <input type="hidden" value="" id="caseidhidden" name="caseidhi">
         
             <input type="hidden" value="" id="docnamehidden" name="docnameid">
          </form>
          </div>
      <div class="form-group">
    <label for="exampleTextarea">Description</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
      </div>
       <div class="col-md-4 col-sm-4" style="padding-top: 15px; padding-left: 15px">
           <div id="assigneddiv">
           <p>Select a Case Link to configure sharing</p>
           </div>
       </div>
          

  </div>
                  <div>
                      <div class="modal-footer" style="padding-top: 15px">
                           <button id="submit-all" class="float-right">Upload New Document</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
    <!-- /page content -->
</div>
    </div>
            </div>
        </div>
    <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    <!-- /footer -->

</div>
<!-- /page container -->

<script>
    $(document).ready(function () {
        $('#uploadid').click(function () {
            $('#myModal').modal('hide');
            // $('#documentupload').modal('show');
        });
    });
</script>

<script>
    $('body').delegate('.alertForDelete', 'click', function () {
        var href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Deleted!", "State has been deleted.", "success");
                            window.location.href = href;
                        } else {
                            swal("Cancelled", "State is safe :)", "error");
                        }
                    });
        }

        return false;
    });
</script>
<script>
function myFunction() {
    var x = document.getElementById("sel1").value;
    var text = getSelectedText('sel1');
      document.getElementById("foldernamehidden").value =text;
      document.getElementById("caseidhidden").value =x;
      
     
   al='themes\ladmin\layouts\assets\images\folder.jpg';
   href="<?php echo base_url().'themes\ladmin\layouts\assets\images\folder.jpg'?>";
    document.getElementById("foldername").innerHTML = "<strong>Folder Name:</strong><img src="+"> " + text;
    $.ajax({
            url: '<?php echo site_url('Document/get_assigned_stuff'); ?>',
            type: 'POST',
            data: {
                caseid: x
            },
            success: function (data) {  
               $('#assigneddiv').html(data);
               
               
                assignid=document.getElementById("newstaffall").value;
      
      document.getElementById("assignstaffhidden").value =assignid;
            }});
}
function getSelectedText(sel1) {
    var elt = document.getElementById(sel1);
    if (elt.selectedIndex == -1)
        return null;
    return elt.options[elt.selectedIndex].text;
}


</script>

<script>
    Dropzone.options.myDropzone = {
         url: '<?php echo site_url('Document/tryupload'); ?>',
    
      uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            addRemoveLinks: true,
  autoProcessQueue: false,
  init: function() {
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure
    submitButton.addEventListener("click", function() {
        z=document.getElementById("docname").value;
        document.getElementById("docnamehidden").value =z;
      
        x=document.getElementById("sel1").value;
        text=document.getElementById("foldernamehidden").value;
   y=document.getElementById("exampleTextarea").value;
    
     
      myDropzone.processQueue(); 
//      $.ajax({
//            url: '<?php echo site_url('Document/tryuploadnew'); ?>',
//            type: 'POST',
//            data: {
//                caseid: x,
//                foldername: text,
//                textarea: y,
//                docname: z,
//                allstaff: v,
//            },
//            success: function (data) {  
//                alert(data);
//               //$('#assigneddiv').html(data);
//            }});

    });
    this.on("addedfile", function() {
    });
  }
};
</script>
<style>
.newmodal {
    max-height: calc(120vh - 212px);
    overflow-y: auto;
}
</style>
<script>
    $(function () {

        $('#firmdatatables').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });
</script>

