
<body>

    <style>
        .btn-hover {
            font-weight: normal;
            color:#ffffff;
            cursor: pointer;
            background-color: inherit;
            border-color: transparent;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 20px;
        }

        .btn-hover-alt {
            font-weight: normal;
            color: #ffffff;
            cursor: pointer;
            background-color: inherit;
            border-color: transparent;
        }
        .box-header1
        {
            height:180px;
            width: 180px;
            border: 2px solid #D0D0D0;
            margin-top:15px;
            margin-bottom: 25px;
            margin-left: 30px;
            margin-right: 20px;


        }
        .noimg
        {
            height:150px;
            width: 150px;
            margin-top:15px;
            margin-bottom: 15px;
            margin-left: 15px;
            margin-right: 15px;


        }
        .box-body
        {
            margin-top:15px;
            margin-left: 15px;
        }
        .left_box
        {
            border: 1px solid #D0D0D0;
        }
        .info
        {
            margin-top:15px;
            border: 3px solid #D0D0D0;
            padding-left: 15px;
        }
        .common
        {
            margin-bottom: 15px;
        }
  .form-control {width:300px;}
.popover {max-width:400px;}
         
#myModal.modal {
   position: absolute;
   top: 10px;
   right: 100px;
   bottom: 0;
   left: 0;
   z-index: 10040;
   overflow: auto;
   overflow-y: auto;
}



    </style>
  
    </style>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <div class="content-wrapper">
                <div class="panel panel-flat">
                    <div class="container-fluid">
                        
                        <h1><img style="height:50px;width: 50px" src="<?php echo base_url().'themes/ladmin/layouts/assets/images/case.jpg'?>"><?php echo $case_details->CaseName?></h1>
                        <div class="row">
                            <div class="col-sm-12 col-md-3 left_box"  >
                                <div class="header"  style="height:55px; padding-top: 15px; background-color: #0063dc;">
                                  
                                       <h4 class="pull-left " style="margin-top:-2px; margin-left: 9px; color: white">Case Information</h4>
                                    <a href="" style="width: 50px; margin-right: 10px " class="btn btn-primary btn-block margin-bottom pull-right"><span class="glyphicon glyphicon-edit">Edit</span></a>
                                
                                </div>
                                <div class="box box-solid">
                                  
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li style="margin-top: 10px"><strong>Case Name</strong>
                                                <p style="margin-bottom: 19px"><?php if($case_details->CaseName){echo $case_details->CaseName;}else{echo "Not Set";}?></p>
                                            </li>
                                            <li><strong>Case Number</strong>
                                               <p style="margin-bottom: 19px"><?php if($case_details->CaseNumber){echo $case_details->CaseNumber;}else{echo "Not Set";}?></p>
                                            </li>
                                            <li style="margin-top: 10px"><strong>Date Opened</strong>
                                                <p style="margin-bottom: 19px"><?php if($case_details->DateOpen){$timestamp = strtotime($case_details->DateOpen); echo date("jS F Y", $timestamp);}else{echo "Not Set";}?></p>
                                            </li>
                                            <li style="margin-top: 10px"><strong>Practice Area</strong>
                                                <p style="margin-bottom: 19px"><?php if($practice_area){echo $practice_area->PracticeArea;}else{echo "Not Set";}?></p>
                                            </li>
                                            <li style="margin-top: 10px"><strong>Contact Link</strong>
                                                <p style="margin-bottom: 19px"><?php if($practice_area){echo $practice_area->PracticeArea;}else{echo "Not Set";}?></p>
                                            </li>
                                            <li style="margin-top: 10px"><strong>Contact Link</strong>
                                                <p style="margin-bottom: 19px"><?php if($contact_Person){echo $contact_Person->FirstName.' '.$contact_Person->LastName;}else{echo "Not Set";}?></p>
                                            </li>
                                             <li style="margin-top: 10px"><strong>Staff Link</strong>
                                                <p style="margin-bottom: 19px"><?php if($a_User){echo $a_User->fullname;if($contact_group){echo '('.$contact_group->GroupName.')';}}else{echo "Not Set";}?><?php if($contact_group){echo '('.$contact_group->GroupName.')';}?></p>
                                            </li>
                                            <hr>

                                            <li style="margin-top: 10px">
                                                <strong>Originally Created: </strong>
                                                <p style="margin-top: 10px"><?php 
                                        ?></p>
                                            </li>
                                            <hr>
                                            <li><a href="#" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Share All Firm Documents  </strong></a>
                                            </li>
                                            <li><a href="#" class="btn btn-prinmary" style="border: 1px solid #3399ff; margin-top: 15px"><strong> Share All Templates</strong></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /. box -->
                                <div class="box box-solid">
                                    <div class="box-header with-border">



                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9 right_box">
                                <div style="background-color: #3399ff">
                                    
                                    <a href="<?php?>" class="btn btn-md btn-hover btn-default ">Contact Info</a>
                                    <a href="<?php ?>" class="btn btn-md btn-hover btn-primary ">Case Link</a> 
                                    
                                </div>
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <button class="pull-right " data-toggle="modal" data-target="#myModal"><span class="label label-success label-icon pull-right"><i class="glyphicon glyphicon-plus"> Add Case</i></span></button>
                                        
                                        
                                        
                                        <h3 class="box-title">Case Link</h3>
                    

                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="box-header with-border">
                                        

                                    </div>
                                    <div class=" col-sm-12 col-md-9 col-xs-12 box-body no-padding" style="height:600px;">
                                       

                                <table id="all-contact-table" class="table table-striped table-bordered" style= "margin-right: 10px; width: 700px">
                            <thead>
                                <tr>
                                    <th >Case Name</th>
                                    <th>Status</th>
                                    <th>Case Rate</th>
                                    <th>Remove Case Link</th>
                                    
                                </tr>

                            </thead>
                            <tbody>
                               
                                  <tr>
                                    <td ><?php ?></td>
                                    <td><?php ?><p style="color:<?php ?>"><?php ?></p></td>
                                                           
                                    <td><?php ?> <a data-placement="bottom" data-toggle="popover" data-title="Case Rate" data-container="body" type="button" data-html="true" id="login">
                                                                                 
                                                                                 <?php?></a></td>
                                    <td><a href="<?php ?>">Remove Case Link</a></td>
                                    
                                </tr>  
                            
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                           <tr><td colspan="5"><div class="empty">No results found.</div></td></tr>
                                
                            </tbody>
              
   
               
                        </table>

                                      
                                    </div>
                                    <div id="popover-content" class="hide">
                    <form id="formsubmit" name="form" class="form-inline" role="form" method="post" action="<?php ?>">
        <div class="form-group">
            <label class="control-label" for="rate">Rate</label>
            <input type="text" placeholder="rate" class="form-control" maxlength="20" name="rate" id="rate" value="">
            <input type="hidden"  name="id" value="<?php ?>">
             <input type="hidden"  name="userid" value="<?php ?>">
            
             <button type="submit" id="alertbutton" class="btn btn-primary" style="margin-top: 20px">Update</button>                                  
        </div>
      </form>  
    </div>
  
                                </div>
                               
                              
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer text-muted">
        &copy; 2017. <a href="#">myPowerLaw</a> All rights reserved.
    </div>
    </div>
</div>


<style>
    .entry:not(:first-of-type)
    {
        margin-top: 10px;
    }

    .glyphicon
    {
        font-size: 12px;
    }


</style>

<!--<script>
  $('#myModal2').on('show', function() {
  	$('#myModal').css('opacity', .5);
  	$('#myModal').bind();
});
$('#myModal2').on('hidden', function() {
  	$('#myModal').css('opacity', 1);
  	$('#myModal').removeData("modal").modal({});
});





</script>-->
<!--<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>-->
<script>
    $("[data-toggle=popover]").popover({
    html: true, 
	content: function() {
          return $('#popover-content').html();
          
        }
});
</script>
