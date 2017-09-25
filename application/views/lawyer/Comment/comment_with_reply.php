<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url()?>Comment/allcomment">Comments Reply</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<div class="newdiv1">
                        <div>
                           
                        <div class="col-sm-12" id="rightmore">
                            <div class="pull-left">
                                <p>
                                    <img class="caseimg" src="<?php echo base_url().'themes/ladmin/layouts/assets/images/pic/case.jpg'?>">
                                    
                                  <?php if($acase){?><a href="<?php echo base_url().'cases/viewCase/'.$acase->CaseId;?>"><?php echo $acase->CaseName;?></a><?php }?>
                                </p>
                            </div>
                            <div class="pull-right new">
                                <p class="pcase"id="pycase">COMMENTS SHARED WITH</p>
                                <p><?php if($astaff){if($astaff->fullname){?><a href="<?php echo base_url().'users/caseLink/'.$astaff->id;?>"><?php echo $astaff->fullname;?></a><?php }}?></p>
                            </div>

                        </div>
                                     
                        </div>
                            

                            <div class="newdiv">
                                <div class="pull-left">
                                    <table>
                                        <tr>
                                            <td>
                                               <img src="<?php if($astaff->Picture){echo base_url().'upload/user/'.$astaff->Picture;}else{echo base_url().'upload/themes/ladmin/layouts/assets/images/noimage.jpg';}?>" class="pdesign">
                                            </td>
                                            <td>
                                                <p><?php if($astaff){if($astaff->fullname){?><a href="<?php echo base_url().'users/caseLink/'.$astaff->id;?>"><?php echo $astaff->fullname;?></a><?php }}?></p>
                                                <p><?php if($aComment->comment){echo $aComment->comment;}?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php if($allreply){foreach ($allreply as $areply){?>
                            <div class="newdivreply">
                                <table class="try">
                                   
                                    <tr>
                                        <td><img src="<?php if($astaff->Picture){echo base_url().'upload/user/'.$astaff->Picture;}else{echo base_url().'upload/themes/ladmin/layouts/assets/images/noimage.jpg';}?>" class="pdesign"></td>
                                        <td> <p><?php if($astaff){if($astaff->fullname){?><a href="<?php echo base_url().'users/caseLink/'.$astaff->id;?>"><?php echo $astaff->fullname;?></a><?php }}?></p><p><?php if($areply->comment){echo $areply->comment;}?></p></td>
                                       
                                    </tr>
                                   
                                </table>
    
                            </div>
                         <?php }}?>

                        <div class="newform">
                            <form id="newformid" onsubmit="return(newone2())">
                                <input type="hidden" name="caseid" value="<?php if($aComment->case_id){echo $aComment->case_id;}?>">
                                <input type="hidden" name="commentid" value="<?php if($aComment->comment_id){echo $aComment->comment_id;}?>">
                                <input type="hidden" name="userid" value="<?php if($aComment->user_id){echo $aComment->user_id;}?>">
                                <textarea id="summernote" name="reply"></textarea>
                                <button type="button"  class="btn btn-primary">Reply</button>
                            </form>
                        </div>

</div>




 <script>
  function newone2(){
  
     $.ajax({
         type: 'POST',
                url: '<?php echo site_url('Comment/get_comment_details_with_reply'); ?>',
                
               
                   
                    data: $('#newformid').serialize(),
               
                success: function (data) {
                   
                       v= $('#right').html('');
                    $('#right').html(data);
                  
                      $('#summernote').summernote();
                    
                    

                    }});
            
                
  }
  </script>
  
<style>
    
    
    .pdesign{
        
          display: block;
        width: 60px;
        height: 60px;
        margin-right: 10px;
        background: #008697;
    }
    .newdiv1{
        margin-bottom: 20px;
        margin-left: 0px;
        height: 280px;
        margin-right: 0px;
        padding: 10px 20px;
        position: relative;
        position: relative;
    }
    .newdiv{
        border: 1px solid #eee;
        margin-top: 70px;
        margin-bottom: 20px;
        margin-left: 0px;
        height: 100px;
        border: 1px solid #6b6e80;
        margin-right: 0px;
        padding-left: 10px ;
        padding-top: 0px ;
        position: relative;
        -webkit-border-radius: 4px ;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        background:#ffffff;
        //color: #ffffff;
        position: relative;
    }
    .newdivreply{
        border: 1px solid #eee;
        //margin-top: 20px;
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
    
    #rightmore{
       
        margin-bottom: 40px;
    }
    .caseimg{
        width: 60px;
        height: 50px;
        margin-right: 10px;
    }
    
</style>