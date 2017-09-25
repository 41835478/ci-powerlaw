
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <div class="panel panel-flat">



                    <div class="hold-transition skin-blue sidebar-mini">
                        <div class="wrapper">
                            <!--<div class="content-wrapper">-->
                                <!-- Content Header (Page header) -->
                                

                                <!-- Main content -->
                                <section class="content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            
                                            <section class="content-header">
                                                <h1>
                                                    Mailbox
                                                    <small>13 new messages</small>
                                                </h1>
                                                <ol class="breadcrumb">
                                                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                                    <li class="active">Mailbox</li>
                                                </ol>
                                            </section>
                                            <div class="box box-solid">
                                                <div class="box-header with-border">
                                                    <a href="messaging/compose" class="btn btn-primary btn-block margin-bottom" style="margin: 10px 0px">Compose</a>
<!--                                                    <h3 class="box-title">Folders</h3>
                                                    
                                                    <div class="box-tools">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>-->
                                                </div>
                                            <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="<?php echo base_url().'messageing/inbox'?>"><i class="fa fa-inbox"></i> Inbox
                                                  </a></li>
                                            <li><a href="<?php echo base_url().'messageing/compose'?>"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                            <li><a href="<?php echo base_url().'messageing/draft'?>"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                                            <li><a href="<?php echo base_url().'messageing/archived'?>"><i class="fa fa-filter"></i> Archived </a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                                <!-- /.box-body -->
                                            </div>
                                            
                                        </div>
                                        
                                        <!-- /.col -->
                                          <div class="col-md-9 newstyle" style="border-left: 1px solid #B2B2B2">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Inbox</h3>
                                                    <p style="color: green"><?php if( $this->session->flashdata('insertsuccess')){echo $this->session->flashdata('insertsuccess');}?></p>
                                                    <div class="box-tools pull-right">

                                                    </div>
                                                    <!-- /.box-tools -->
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body no-padding">
                                                    <div class="mailbox-controls">


                                                        <!--<button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>-->
                                                        <div class="pull-right">
                                                            1-50/200

                                                        </div>
                                                        <!-- /.pull-right -->
                                                    </div>
                                                    <div class="table-responsive mailbox-messages" style="width: 100%">
                                                        <table class="table table-striped" id="inboxtable">
                                                            <tbody>
                                                              <?php if($messageList){?>  
                                                                    
                                                             <?php foreach ($messageList as $amessageList) {?>
                                                                    
                                                                
                                                                <tr>
                                                                    
                                                                    <td class="mailbox-star"><a href="<?php echo base_url().'message/details/'.$amessageList->MessageId;?>"><i class="glyphicon glyphicon-eye-open"></i></a><a style="margin-left: 10px; " href="<?php echo base_url().'message/delete/'.$amessageList->MessageId;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                                    <td class="mailbox-name"><a href="<?php echo base_url().'message/details/'.$amessageList->MessageId;?>"><strong><?php if($amessageList->Subject){echo $amessageList->Subject;}?></strong></a></td>
                                                                    <td class="mailbox-subject"><?php if($amessageList->Content){echo $amessageList->Content;}?>
                                                                    </td>
                                                                 
                                                                    <td class="mailbox-date"><?php if($amessageList->SentOn){$post_date= strtotime($amessageList->SentOn);$now = time();$units = 2;echo timespan($post_date, $now, $units);}?></td>
                                                                </tr>
                                                              
                                                         <?php }?>
                                                              <?php }else{?>
                                                                 <tr><td colspan="5"><div class="empty">No results found.</div></td></tr>
                                                                  <?php }?>
                                                            </tbody>
                                                        </table>
                                                        <!-- /.table -->
                                                    </div>
                                                    <!-- /.mail-box-messages -->
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer no-padding">
                                                    <div class="mailbox-controls">
                                                        
                                                        <div class="pull-right">
                                                            1-50/200
<!--                                                         
                                                        </div>
                                                        <!-- /.pull-right -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /. box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </section>
                                <!-- /.content -->
                            <!--</div>-->
                            <!-- /.content-wrapper -->
                            


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

        </div>
    </div>
    

<style>
        .nav-tabs-dropdown {
        display: none;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        }

        .nav-tabs-dropdown:before {
        content: "\e114";
        font-family: 'Glyphicons Halflings';
        position: absolute;
        right: 30px;
        }

        @media screen and (min-width: 769px) {
        #nav-tabs-wrapper {
        display: block!important;
        }
        }
        @media screen and (max-width: 768px) {
        .nav-tabs-dropdown {
        display: block;
        }
        #nav-tabs-wrapper {
        display: none;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        text-align: center;
        }
        .nav-tabs-horizontal {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
        }
        .nav-tabs-horizontal  > li {
        float: none;
        }
        .nav-tabs-horizontal  > li + li {
        margin-left: 2px;
        }
        .nav-tabs-horizontal > li,
        .nav-tabs-horizontal > li > a {
        background: transparent;
        width: 100%;
        } 
        .nav-tabs-horizontal  > li > a {
        border-radius: 4px;
        }
        .nav-tabs-horizontal  > li.active > a,
        .nav-tabs-horizontal  > li.active > a:hover,
        .nav-tabs-horizontal  > li.active > a:focus {
        color: #ffffff;
        background-color: #428bca;
        }
        }

</style>

            


<script src="../../dist/js/demo.js"></script>
<script>
    $(function () {

        $('#inboxtable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false

        });
    });
</script>