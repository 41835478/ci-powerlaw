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
         



    </style>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <div class="content-wrapper">
                <div class="panel panel-flat">
                    <div class="container-fluid">
                        <h1><?php if($auserDetail){echo $auserDetail->fullname;}?></h1>
                        <div class="row">
                            <div class="col-sm-12 col-md-3 left_box"  >
                                <div class="header"  style="height:55px; padding-top: 15px; background-color: #0063dc;">
                                  
                                       <h4 class="pull-left " style="margin-top:-2px; margin-left: 9px; color: white">Personal Information</h4>
                                       <a href="<?php echo base_url()?>edituserprofile/<?php echo $auserDetail->id; ?>" style="width: 50px; margin-right: 10px " class="btn btn-primary btn-block margin-bottom pull-right"><span class="glyphicon glyphicon-edit">Edit</span></a>
                                
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header1 with-border">
                                        <?php if($auserDetail){if($auserDetail->Picture){ ?>
                                         <img class="noimg" src="<?php echo base_url()?>upload/user/<?php echo $auserDetail->Picture; ?>">  
                                        <?php }else{?>
                                        <img class="noimg" src="<?php echo base_url() . 'themes/ladmin/layouts/assets/images/noimage.jpg' ?>">  
                                        <?php }}?>

                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li style="margin-top: 10px"><strong> Name</strong>
                                                <p style="margin-left: 15px;margin-top: 15px"><?php if($auserDetail){ if($auserDetail->FirstName){echo $auserDetail->FirstName .' ' . $auserDetail->LastName;}}?></p>
                                            </li>
                                            <li><strong>Case Link</strong>
                                                <?php if($allCase){?>
                                                <a href="<?php echo base_url()?>cases/viewCase/<?php foreach($allCase as $acase){echo base64_encode($acase->CaseId);} ?>"> <span style="color:blue"><?php foreach($allCase as $acase){echo $acase->CaseName;}?></span>
                                            </a>
                                                <?php }  else {?>
                                              <p style="margin-left: 15px;margin-top: 15px"> <?php echo 'No case';?></p>
                                               <?php }?></li>
                                           <!--  <li style="margin-top: 10px"><strong>Default Rate</strong>
                                                <p style="margin-left: 15px;margin-top: 15px"></p>
                                            </li>
                                           <li style="margin-top: 10px"><strong>Last Login</strong>
                                                <p style="margin-left: 15px;margin-top: 15px"></p>
                                            </li>-->
                                            <hr>
                                            <li style="margin-top: 10px">
                                                <strong>Originally Created: </strong>
                                                <p style="margin-top: 10px"><?php if($auserDetail->created_at){ echo date('d F, Y', $auserDetail->created_at); }?></p>
                                            </li>
                                            <hr>
<!--                                            <li><a href="#" class="btn btn-prinmary" style="border: 1px solid #3399ff" > <strong>Share All Firm Documents  </strong></a></li>
                                            <li><a href="#" class="btn btn-prinmary" style="border: 1px solid #3399ff; margin-top: 15px"><strong> Share All Templates</strong></a></li>-->
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
                                    <a href="<?php if($auserDetail){ echo base_url().'contacts/users/'.base64_encode($auserDetail->id);}?>" class="btn btn-md btn-hover btn-default ">Contact Info</a>
                                    <a href="<?php if($auserDetail){echo base_url().'users/caseLink/'.$auserDetail->id;}?>" class="btn btn-md btn-hover btn-primary ">Case Link</a> 
                                    
                                </div>
                                <div class="box box-solid info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Contact Information</h3>


                                    </div>
                                    <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">

                                            <li style="margin-bottom: 10px"><i class="fa fa-envelope-o "></i> <strong style="margin-right: 20px">Name:</strong><?php if($auserDetail){ if($auserDetail->fullname){echo $auserDetail->fullname;}}?></li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Email Address:</strong> <?php if($auserDetail){ if($auserDetail->email){echo $auserDetail->email;}}?></li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-file-text-o "></i> <strong style="margin-right: 20px">Address:</strong> <?php if($auserDetail){ if($auserDetail->Address1||$auserDetail->Address2){ $auserDetail->Address1.' '.$auserDetail->Address2;}}?></li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Phone:</strong><?php if($auserDetail){if($auserDetail->Phone){ echo $auserDetail->Phone;}}?> </li>
                                            <li style="margin-bottom: 10px"><i class="fa fa-filter "></i> <strong style="margin-right: 20px">Mobile:</strong><?php if($auserDetail){ if($auserDetail->Mobile){ echo $auserDetail->Mobile;}}?> </li>
                                            

                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
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

