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
/*        .info
        {
            margin-top:15px;
            border: 3px solid #D0D0D0;
            padding-left: 15px;
        }*/
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
                    <h1><?php if ($auserDetail->fullname) { echo $auserDetail->fullname;} ?></h1>
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

                                <a href="<?php echo base_url() . 'contacts/users/' . base64_encode($auserDetail->id); ?>" class="btn btn-md btn-hover btn-default ">Contact Info</a>
                                <a href="<?php echo base_url() . 'users/caseLink/' . $auserDetail->id; ?>" class="btn btn-md btn-hover btn-primary ">Case Link</a> 

                            </div>
                            <div class="box box-solid info">
                                <div class="box-header with-border">
                                    <button class="pull-right"><a href="<?php echo base_url().'cases'?>"><span class="label label-success label-icon pull-right"><i class="glyphicon glyphicon-plus"> Add Case</i></span></a></button>
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
                                            <?php if ($allCase) { ?>
                                                <?php foreach ($allCase as $aCase) { ?>
                                                    <tr>
                                                        <td><?php if ($aCase->CaseName) { ?><a href="<?php echo base_url() . 'cases/viewCase/' . base64_encode($aCase->CaseId) ?>"><?php echo $aCase->CaseName; ?></a><?php } ?></td>
                                                        <td><?php if ($aCase->caseStatus == 1) { ?><p style="color:<?php if ($aCase->caseStatus == 1) { echo"green";} ?>"><?php echo "Active Case";} else { echo "Inactive Case"; } ?></p></td>
                                                        <td><?php if ($aCase->BillingRate) { ?> <a data-placement="bottom" data-toggle="popover" data-title="Case Rate" data-container="body" type="button" data-html="true" id="login"><?php echo $aCase->BillingRate . '/hr'; } else { echo 'Not set';} ?></a></td>
                                                        <td><a href="<?php echo base_url() . 'users/' . $auserDetail->id . '/removecaseLink/' . $aCase->CaseId; ?>">Remove Case Link</a></td>
                                                    </tr>  
                                                <?php } ?>
                                            <?php } else { ?>
                                                <tr><td colspan="5"><div class="empty">No results found.</div></td></tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="popover-content" class="hide">
                                    <form id="formsubmit" name="form" class="form-inline" role="form" method="post" action="<?php echo base_url() . 'contact/caseLink/rateUpdate' ?>">
                                        <div class="form-group">
                                            <label class="control-label" for="rate">Rate</label>
                                            <input type="text" placeholder="rate" class="form-control" maxlength="20" name="rate" id="rate" value="">
                                            <input type="text"  name="id" value="<?php echo $aCase->CaseId; ?>">
                                            <input type="hidden"  name="userid" value="<?php echo $auserDetail->id; ?>">
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
<script>
    $("[data-toggle=popover]").popover({
        html: true,
        content: function () {
            return $('#popover-content').html();

        }
    });
</script>
