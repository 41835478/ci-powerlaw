<style>
    div.calendar_date {
        background: url('<?php echo base_url() ?>assets/image/calendar_date.png') top left no-repeat;
        width: 38px;
        height: 40px;
    }
</style>
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
            <style type="text/css">
                p{
                    margin: 15px;
                }
            </style>
            <div class="row">
                <div class="col-sm-3">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <div class="navbar navbar-default" id="navbar-second">
                                <div class="navbar-collapse collapse" id="navbar-second-toggle">
                                    <h5>
                                        Firm Info
                                       
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><label>Firm Name:</label> <strong><?php echo $firmeditinfo->FirmName; ?></strong></p>
                            <p style="margin-top: 25px;"><label>Firm Logo:</label></p>
                            <form method="post" action="<?php echo base_url()?>firmlogo/<?php echo $firmeditinfo->FirmId; ?>" enctype="multipart/form-data">
                            <?php if(isset($firmeditinfo->FirmLogo) && $firmeditinfo->FirmLogo !=''){ ?>
                             <img src="<?php echo base_url() ?>upload/firmimage/<?php echo $firmeditinfo->FirmLogo;?>" id="blah" style="width:220px; height:220px">
                            <?php } else { ?>
                             <img src="<?php echo base_url() ?>assets/image/default-logo.jpg" id="blah" style="width:220px; height:220px">
                            <?php } ?>
                            <input id="fileInput" type="file" name="image" onchange="readURL(this)"><br>
                           <button class="btn btn-success"><i class="icon-pencil5 pull-right"> Edit</i></button>
                           </form>
                            <hr><br>
                            <button class="btn btn-default btn-block" style="color:red">Close Firm</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="panel panel-flat">
                        <div class="panel-heading">

                            <div class="tabbable" id="myTabs">
                                <ul class="nav nav-tabs nav-tabs-top" role="tablist"> 
                                    <li class="active">
                                        <a href="#icononlytab1" aria-controls="icononlytab1" role="tab" data-toggle="tab">
                                            <i class="icon-menu7"></i> Firm Info
                                            <span class="visible-xs-inline-block position-right">Active</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="icononlytab1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-lg">
                                                <tbody>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Firm Name</label></td>
                                                        <td class="col-sm-5"><?php echo $firmeditinfo->FirmName; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Contact Name</label></td>
                                                        <td class="col-sm-5"><?php echo $firmeditinfo->ContactFName; ?> <?php echo $firmeditinfo->ContactLName; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Address</label></td>
                                                        <td class="col-sm-5">Address : <?php echo $firmeditinfo->Address1 . ',' . $firmeditinfo->Address2; ?><br>
                                                            City : <?php echo $firmeditinfo->City; ?><br>
                                                            State : <?php echo $firmeditinfo->State; ?><br>
                                                            Country : <?php echo $firmeditinfo->Country; ?><br>
                                                            Zip : <?php echo $firmeditinfo->ZipCode; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Mobile</label></td>
                                                        <td class="col-sm-5"><?php echo $firmeditinfo->Mobile; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Email</label></td>
                                                        <td class="col-sm-5"><a><?php echo $firmeditinfo->Email; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-md-2 col-sm-2 active"><label>Website</label></td>
                                                        <td class="col-sm-5"><a><?php echo $firmeditinfo->Website; ?></a></td>
                                                    </tr>
                                                    <tr><td></td><td class="col-md-5 col-sm-5"> <a href="/cases/update?id=1" class="btn btn-success pull-right"><i class="icon-pencil5 pull-right"> Edit</i></a></td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                        </div>
                    </div>
                </div>
            </div>			</div>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>