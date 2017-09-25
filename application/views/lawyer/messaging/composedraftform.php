<style>
    .newstyle{
         border: 2px solid #D0D0D0;
    }
    .buttonRight{
         margin-bottom: 20px;
    }
    
    
</style>
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <div class="content-wrapper">
                <div class="panel panel-flat">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-sm-3">
                               <!-- <h1>Messages</h1>-->
                                <div class="btn btn-primary btn-block margin-bottom new"><h4>Messages</h4></div>
                              <a href="<?php echo base_url() . 'inbox' ?>" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

                                <div class="box box-solid ">
                                    <div class="box-header with-border">
                                        <!--<h3 class="box-title">Folders</h3>-->

                                        
                                    </div>
                                    //28
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
                            
                                  <div class="col-md-9 newstyle" style="border-left: 1px solid #B2B2B2">
                                 <form id="w0"  onsubmit="return(validate());" name="f1" action="<?php echo base_url() . 'messaging/senddrat' ?>" method="post">
                              
                                    <div class="box box-primary ">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Draft Message</h3>
                                        <div style="color: red;font-size: larger">
                                            <span id="comment1" style="color: green"></span>
                                        
                                                <?php
                                                     if ($this->session->flashdata('val_error')) {
                                                            print_r($this->session->flashdata('val_error'));
                                                        }
                                                 ?>  
                                            </div>
                                            <div style="color: green;font-size: larger">
                                            <?php
                                                 if ($this->session->flashdata('val_success')) {
                                                     print_r($this->session->flashdata('val_success'));
                                                 }
                                             ?>
                                            </div>
                                        </div>

                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?php echo validation_errors(); ?>
                                            <div class="form-group">
                                                
                                                
                                                   <span id="comments1" style="color: red"><?php echo form_error('toEmail');?></span>
                                                 <span id="commentto" style="color: red;"></span>
                                                
                                                   <select class="js-example-basic-single" placeholder="Select a Case" name="toEmail">
                                                    <?php if($allUser){foreach($allUser as $aUser){?>
                                                    <option value="<?php echo $aUser->id?>"<?php if($amessage->MessageTo){if($amessage->MessageTo==$aUser->id){echo"selected";}}?>><?php echo $aUser->fullname?></option>
                                                    <?php }}?>
                                                 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                   <span id="comments1" style="color: red"><?php echo form_error('Subject');?></span>
                                                <span id="mailSubject1" style="color: red;"></span>
                                                <input type="text"class="form-control" name="mailSubject" placeholder="Subject:" value="<?php if($amessage->Subject){echo $amessage->Subject;}?>">
                                            <input type="hidden" name="mailid"  value="<?php echo $amessage->MessageId;?>">
                                            </div>
                                            <div class="form-group">
                                                <select class="js-example-basic-single" placeholder="Select a Case" name="cases">
                                                    <?php if($allCses){foreach($allCses as $aCses){?>
                                                    <option value="<?php echo $aCses->CaseId?>"<?php if($amessage->CaseId){if($amessage->CaseId==$aCses->CaseId){echo "selected";}}?>><?php echo $aCses->CaseName?></option>
                                                    <?php }}?>
                                                 
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                   <span id="comments1" style="color: red"><?php echo form_error('messagebody');?></span>
                                                
                                                  <span id="messagebody1" style="color: red;"></span>
                                                  <textarea name="messagebody" id="summernote"><?php if($amessage->Content){echo $amessage->Content;}?></textarea>
                  
                                            </div>
                                           
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <div class="pull-right buttonRight">
                                               
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                                            </div>
                                           
                                        </div>
                                        <!-- /.box-footer -->
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
function validate()
{
   

    if(document.f1.toEmail.value=="")
      {  
     commentto="Send To can't be blank";
    document.getElementById('commentto').innerHTML=commentto;
     document.f1.toEmail.focus() ;
     return false;
      }  
     
    if(document.f1.mailSubject.value=="")
      {  
     commentto="Subject can't be blank";
    document.getElementById('mailSubject1').innerHTML=commentto;
     document.f1.mailSubject.focus() ;
     return false;
      }  
     
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
<script>
   
    
    $(function ()
    {
        $(document).on('click', '.btn-add', function (e)
        {
            e.preventDefault();

            var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function (e)
        {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });
</script>


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
<script type="text/javascript">
$(document).ready(function() {
  $(".js-example-basic-single").select2(
          {    placeholder: "Select a state"}
                );
});
</script>




<script>
   
    
    $(function ()
    {
        $(document).on('click', '#draftid', function ()
        {
          v= $('#w0').serialize();
           var baseurl = "<?php echo base_url(); ?>";
        
          $.ajax({
       type: "POST",
       url:  baseurl+"Messaging/draft",
        
        data : v,  
        
        success: function( r) {        
 $('#comment1').text(''); 
 $('#comment1').text(r); 

     }
    });
          
        })
    });
</script>