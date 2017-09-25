<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>Comment/unreadcomment">Unread Comments</a></li>
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
                    <h5 class="panel-title">Comments</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <?php if ($_SESSION['permissionsession']['commenting'] == '1') { ?>
                                    <a href="contact/addContact"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                            <?php } ?>
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
                <div class="panel-body" style="height: 300px;">



                    <div class="row" style="background-color: #2787C5; margin-top: 8px;" >
                        <div class="col-md-5">
                            <form class="navbar-form">
                                <div class="form-group" style="display:inline;">
                                    <div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">

                        </div>
                    </div>



                    <div class="row" style="margin-top: 40px; background-color: #DDDDBB">

                        <div class="col-sm-4" id="right">
                            <h3>No Comment Selected</h3>
                        </div>                      
                        <div class="col-sm-8" id="left" >

                            <div class="table-responsive">          
                                <table class="table table-bordered table-hover">
                                    <?php if ($allUnreadComment) { ?>

                                        <?php foreach ($allUnreadComment as $aUnreadComment) { ?>

                                            <tr>



                                                <td onclick="return(newone(<?php echo $aUnreadComment->comment_id ?>))">

                                                    <div><p><span class="glyphicon glyphicon-user"></span><?php if ($astaff->fullname) {
                                        echo' ' . $astaff->fullname;
                                    }
                                            ?> <a class="pull-right"><span class="glyphicon glyphicon-book"></span><?php
                                                                if ($aUnreadComment->case_id) {
                                                                    foreach ($allCases as $aCase) {
                                                                        if ($aUnreadComment->case_id == $aCase->CaseId) {
                                                                            echo' ' . $aCase->CaseName;
                                                                        }
                                                                    }
                                                                }
                                                                ?></a></p>
                                                        <p style="text-align:center"> <span class="glyphicon glyphicon-comment"></span> <?php if ($aUnreadComment->comment) {
                                        echo $aUnreadComment->comment;
                                    } ?></p></div></td>
                                            </tr>
    <?php } ?>
<?php } else { ?>
                                        <p style="color: red;"> You have no unread comments..</p>
<?php } ?>
                                </table>
                            </div>



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


<script>
    function newone(v) {

        $.ajax({
            url: '<?php echo site_url('Comment/get_unread_comment_details'); ?>',
            type: 'POST',
            data: {
                commentid: v
            },
            success: function (data) {


                $('#right').html(data);
                $('#summernote').summernote();




            }});

    }
</script>























<style>

    body, html {
        margin: 0;
        overflow: hidden;
        height:100%;
    }
    #right {

        height:350px;
        background-color: #DDDDBB;
        text-align: center;
    }
    #summernote{
        height: 200px;
        width: 900px;
    }

    @media (min-width: 768px){
        #left {
            position: absolute;
            top: 70px;
            bottom: 0;
            left: 0;
            width: 25%;
            overflow-y: scroll; 
            // overflow-scroll:true;
        }

        #right {
            position: absolute;
            top: 70px;
            bottom: 0;
            right: 0;
            overflow-y: scroll;
            // overflow-scroll:true;
            width: 75%;
        }
    }
    /*    .newdiv{
            border: 1px solid #eee;
            margin-top: 70px;
            margin-bottom: 20px;
            margin-left: 0px;
            height: 90px;
            border: 1px solid #6b6e80;
            margin-right: 0px;
            padding: 10px 20px;
            position: relative;
            -webkit-border-radius: 4px ;
            -moz-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            background: #fff;
            color: #6b6e80;
            position: relative;
        }
        
        
         .newdivreply{
            border: 1px solid #eee;
            margin-top: 70px;
            margin-bottom: 20px;
            margin-left: 0px;
            height: 90px;
            border: 1px solid #6b6e80;
            margin-right: 0px;
            padding: 10px 20px;
            position: relative;
            -webkit-border-radius: 4px ;
            -moz-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            background: #fff;
            color: #6b6e80;
            position: relative;
        }
        
         .newdiv1{
            border: 1px solid #eee;
            //margin-top: 70px;
            margin-bottom: 20px;
            margin-left: 0px;
            height: 280px;
            border: 1px solid #6b6e80;
            margin-right: 0px;
            padding: 10px 20px;
            position: relative;
            -webkit-border-radius: 4px ;
            -moz-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            background: #fff;
            color: #6b6e80;
            position: relative;
        }
        #left {
    
            text-align: center;
            height:350px;
        }
    
    
    
     #replyid{
           width: 720px;
         height: 150px;
              
        }
        #pcase{
            margin-left: 0px;
        }
        #right {
    
            height:350px;
            background-color: #DDDDBB;
            text-align: center;
        }
        #note-editable{
            background-color: red;
            height: 170px;
        }
        .para{
            background-color: #DDDDBB;
        }
    
        .pdesign{
            
              display: block;
            width: 60px;
            height: 60px;
            margin-right: 10px;
            background: #008697;
        }
    
        .table{
            margin:0px 0px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            transition: all 0.2s ease-in-out;
            padding:0px;
        }    */
</style>
