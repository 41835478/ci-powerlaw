<style>
    .details{

        height: 100px;
        background-color:#f6fbff;
        border-bottom: 1px #B2B2B2 dotted;
        margin-bottom: 25px;
    }
    .img-size{
        width: 45px;
        height: 30px;
    }
    .chat {
        width:100%;
    }

    .bubble{
        background-color: #F2F2F2;
        border-radius: 5px;
        box-shadow: 0 0 6px #B2B2B2;
        display: inline-block;
        padding: 10px 18px;
        position: relative;
        vertical-align: top;
    }

    .bubble::before {
        background-color: #F2F2F2;
        content: "\00a0";
        display: block;
        height: 16px;
        position: absolute;
        top: 11px;
        transform:             rotate( 29deg ) skew( -35deg );
        -moz-transform:    rotate( 29deg ) skew( -35deg );
        -ms-transform:     rotate( 29deg ) skew( -35deg );
        -o-transform:      rotate( 29deg ) skew( -35deg );
        -webkit-transform: rotate( 29deg ) skew( -35deg );
        width:  20px;
    }

    .me {
        float: left;   
        margin: 5px 45px 5px 20px;         
    }

    .me::before {
        box-shadow: -2px 2px 2px 0 rgba( 178, 178, 178, .4 );
        left: -9px;           
    }

    .you {
        float: right;    
        margin: 5px 20px 5px 45px;         
    }

    .you::before {
        box-shadow: 2px -2px 2px 0 rgba( 178, 178, 178, .4 );
        right: -9px;    
    }
</style>
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
                                    
                                        </div>
                                        <div class="box-body no-padding">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="<?php echo base_url().'messageing/inbox'?>"><i class="fa fa-inbox"></i> Inbox
                                                    </a></li>
                                            <li><a href="<?php echo base_url().'messageing/compose'?>"><i class="fa fa-envelope-o"></i> Sent</a></li>
                                            <li><a href="<?php echo base_url().'messageing/draft'?>"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                                            <li><a href="<?php echo base_url().'messageing/archived'?>"><i class="fa fa-filter"></i> Archived</a>
                                            </li>
                                        
                                        </ul>
                                    </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /. box -->

                                    <!-- /.box -->
                                </div>

                                <!-- /.col -->
                                <div class="col-md-9" style="border-left: 1px solid #B2B2B2">
                                    <div class="box box-primary" >
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Inbox</h3>
                                              <p style="color: green"><?php if( $this->session->flashdata('insertsuccess')){echo $this->session->flashdata('insertsuccess');}?></p>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body no-padding">

                                            <div class="table-responsive mailbox-messages" style="width: 100%">

                                                <div class="details">
                                                    <img class="img-size" src="<?php echo base_url() . 'themes/ladmin/layouts/assets/images/pic/images.jpg' ?>">

                                                    <strong><?php if ($details->Subject) {echo $details->Subject;} ?></strong>
                                                    <p style="margin-top: 10px;margin-left: 45px"> Case Link: <a href="<?php echo base_url()?>"><?php if($Casedetails){if($Casedetails->CaseName){echo $Casedetails->CaseName;}}?></a></p>
                                                </div>

                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="col-md-12 col-lg-11 col-sm-12 col-xs-12">
                                                    <table>
                                                        <tr>
                                                            <td >
                                                                <div>
                                                                   
                                                                    <div >
                                                                        <img  style="height: 56px; width: 56px" src="<?php if($UserDetail->Picture){echo base_url().'upload/user/'.$UserDetail->Picture;}else{echo base_url().'themes/ladmin/layouts/assets/images/pic/noimage.jpg';}?>">
                                                                    </div>
                                                                    
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="bubble me col-md-8 col-sm-8 col-lg-8" style="width: 370%; " >
                                                    
                                                        <p><strong><?php if ($details->Content) {echo $details->Content;} ?></strong></p> 


                                                    </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                
                                                
                                                
                                                
                                                <?php if($reply){
                                                    foreach ($reply as $areply) {?>
    
                                                 
                                                
                                                <div class="col-md-12 col-lg-11 col-sm-12 col-xs-12">
                                                    <table>
                                                        <tr>
                                                            <td >
                                                                <div>
                                                                   
                                                                    <div >
                                                                        <img  style="height: 56px; width: 56px" src="<?php if($UserDetail->Picture){echo base_url().'upload/user/'.$UserDetail->Picture;}else{echo base_url().'themes/ladmin/layouts/assets/images/pic/noimage.jpg';}?>">
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="bubble me col-md-8 col-sm-8 col-lg-8">
                                                    
                                                        <p><strong><?php if ($areply->Content) {echo $areply->Content;} ?></strong></p> 


                                                    </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
  
                                                <?php }}?>

                                                <div class="chat">
                                                    <div class="bubble me" style="width: 95%;margin-top: 45px;">
                                                        <form id="w0"  onsubmit="return(validate());" name="f1" method="post" action="<?php echo base_url().'Messaging/reply'?>">
                                                         <div class="form-group">
                                                   <span id="comments1" style="color: red; "><?php echo form_error('messagebody');?></span>
                                                
                                                  <span id="messagebody1" style="color: red;"></span>
                                                  <input type="hidden" name="id" value="<?php echo $details->MessageId?>">
                                                  <input type="hidden" name="toEmail" value="<?php echo $details->MessageFrom?>">
                                                  <input type="hidden" name="subject" value="<?php echo $details->Subject?>">
                                                  <input type="hidden" name="caseId" value="<?php echo $details->CaseId?>">
                                                  <textarea name="messagebody" id="summernote"></textarea>
                  
                                            </div> 
                                                            <div class="pull-right buttonRight">
                                                               <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Post Reply</button>
                                                           </div>
                                                        </form>

                                                    </div>

                                                </div>
                                              
                                            </div>
                                            <!-- /.mail-box-messages -->
                                        </div>
                                        <!-- /.box-body -->

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
<script>
    $('.nav-tabs-dropdown').each(function (i, elm) {

        $(elm).text($(elm).next('ul').find('li.active a').text());

    });

    $('.nav-tabs-dropdown').on('click', function (e) {

        e.preventDefault();

        $(e.target).toggleClass('open').next('ul').slideToggle();

    });

    $('#nav-tabs-wrapper a[data-toggle="tab"]').on('click', function (e) {

        e.preventDefault();

        $(e.target).closest('ul').hide().prev('a').removeClass('open').text($(this).text());

    });
</script>


<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    $(document).ready(function() {
       $('#summernote').summernote({
  height: 300,                
  minHeight: null,            
  maxHeight: null,            
  focus: true            
});
    });
  </script>
  <script>
function validate()
{
   
     
      if(document.f1.messagebody.value=="")
      {  
     commentto="Initial message can't be blank";
    document.getElementById('messagebody1').innerHTML=commentto;
     document.f1.messagebody.focus() ;
     return false;
      }  
   return( true );
}

</script>