
<link rel="stylesheet" media="screen" href="https://assets.mycase.com/assets/application-f75f1b391309fc6e99dbf97cd7d0001fbc88018ad146d8bb6865e1cdfd360ce5.css" />
<link rel="stylesheet" media="screen" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
<link rel="stylesheet" media="print" href="https://assets.mycase.com/assets/mycase_print-51e45db5a727f5c98c67aa2ec96f5130385da083bc5d4cae86a7abd46dd5fea0.css" />
<style>
    div.message_details_header {

    }
</style>
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>

<div class='red_bar old_browser noprint'>
    You are using an old, unsupported browser.
    <a href="https://help.mycase.com/s/article/What-web-browser-should-I-use-for-running-MyCase">Learn More</a>
</div>


<div id='user_block_menu' style='top: -5000px; left: -5000px;' class='noprint'>
    <a href="/account/dashboard">Settings</a>
    <a href="/account#profile_picture">Update Profile Picture</a>
    <a href="https://rs-software4.mycase.com/apps">App Bar</a>
    <hr/>
    <a href='#' class='logout-link'>Logout</a>
    <div style='display:none;'>
        <form id="switch_account_form" action="/user_sessions/switch_account" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="bkV1HampBql78JXEYSnYKYX60TDd7cqJskAHEFZOj4mrgA4twvbb0ITM4rbe+OEPb7UZj3kSWHs8KEdIIPFUcQ==" />
        </form>    <form id="logout_form" action="/logout" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="delete" /><input type="hidden" name="authenticity_token" value="r8ogrTwgXMzI/rqz6Qv4gsItck5Oi0OY3bjU8ypSbiJqD1udV3+BtTfCzcFW2sGkKGK68ep00WpT0JSrXO212g==" />
            <input type="hidden" name="logout_type" id="logout_type" value="manual" />
        </form>  </div>
</div>


<div id='subbar' class='clearfix'>

    <div class='separator'></div>
    <div class="">
        <a href="https://rs-software4.mycase.com/documents">List View</a>
    </div>

    <div class='separator'></div>
    <div class="selected">
        <a href="/documents/23441714">Document Details</a>
    </div>

    <div class='separator'></div>

</div>

<div id='main_content'>
    <link rel="stylesheet" media="screen" href="https://assets.mycase.com/assets/notifications/activity_item-d76ca9d8d347cdde7e04328895b03ba92c664e264ec29344d1bb3ae25d891e56.css" />




    <div id='unarchive_dialog' style='display: none;' >
        Are you sure you want to unarchive this document?<br/><br/>


        <form id="unarchive_form" action="https://rs-software4.mycase.com/documents/23441714/unarchive" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="put" />
        </form>
        <div style='height: 30px; position: relative;'>
            &nbsp;
            <div id='unarchive_loading' style='position: absolute; right: 8px; bottom: -7px; display: none;'>
                <img style="vertical-align: middle;" class="retina" src="https://assets.mycase.com/assets/retina/ajax_arrows-a4ab2b6f20f4a4b63367e1819c2c072798f52ed372c3f56c3002332c3ff331ae.gif" alt="Ajax arrows" width="16" height="16" /> Working
            </div>
        </div>
    </div>

    <div id='archive_dialog' style='display: none;' >
        Are you sure you want to archive this document?<br/><br/>


        <form id="archive_form" action="https://rs-software4.mycase.com/documents/23441714/archive" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="delete" />
        </form>
        <div style='height: 30px; position: relative;'>
            &nbsp;
            <div id='archive_loading' style='position: absolute; right: 8px; bottom: -7px; display: none;'>
                <img style="vertical-align: middle;" class="retina" src="https://assets.mycase.com/assets/retina/ajax_arrows-a4ab2b6f20f4a4b63367e1819c2c072798f52ed372c3f56c3002332c3ff331ae.gif" alt="Ajax arrows" width="16" height="16" /> Working
            </div>
        </div>
    </div>

    <div class='page_header'>
        <div style='float: left;'>
            <img height="30" src="https://assets.mycase.com/assets/svg/icons/document-5bfc777cf38da204becf1c88afa9a0dfd52036b5af20f88daad3d3cd16bc3a06.svg" alt="Document" />
        </div>
        <div style='float: left; margin-left: 10px; margin-top: 5px;'>
            <h2 id='document_title'><?php if ($forview) {
    if ($forview->DocumentName) {
        echo $forview->DocumentName;
    }
} ?></h2>
        </div>
    </div>
    <div class='right_page_button'>
        <a id="gear_button" class="" href="#" onclick="show_gear_menu();
                return false;">&nbsp;</a>
    </div>
    <div style='clear: both;'></div>

    <table class='show_contents'>
        <tr>
            <td class='left'>
                <div class='show_left_content'>
                    <div class='show_details_bar '>
                        <div style='float: left; padding-left: 10px;'>
                            Document Information
                        </div>
                        <div style='float: right; padding-right: 10px; margin-top: 5px;'>
                            <a class="gray_button document-edit-button" data-document-id="23441714" href="#"><span><img src="https://assets.mycase.com/assets/edit-152f6eb5544ec0d20267fb4755b7260798ccd97c768a197cdb8742bbbc2a1e38.png" alt="Edit" /> Edit</span></a>
                        </div>
                    </div>
                    <div id='document_left_details' class='show_left_details'>


                        <div style='padding: 20px 10px 0px 10px;'>

                            <strong>Document Name</strong><br/>
                            <span class='text-wrap'><?php if ($forview) {
    if ($forview->DocumentName) {
        echo $forview->DocumentName;
    }
} ?></span><br/>
                            <br/>

                            <strong>Case Link</strong><br/>
                            <a href="/court_cases/3769691"><?php if ($casedetail) {
    if ($casedetail->CaseName) {
        echo $casedetail->CaseName;
    }
} ?></a>
                            <br/><br/>


                            <strong>Tags</strong><br/>
                            <em>No tags</em>
                            <br/><br/>

                            <strong>Versions</strong><br/>
                            There is 1 version of this document<br/>

                            Latest: <a class="text-wrap mark-as-read-on-click" data-document-id="23441714" data-version-id="34048549" href="https://rs-software4.mycase.com/documents/34048549/download">mypowerlawnew__8_.sql</a><br/>
                            <br/>

                            <strong>Description</strong><br/>
                            <p></p><br/>

                        </div>

                        <hr/>

                        <div class='small_details'>
                            Originally Created:<br/>
<?php if ($forview) {
    if ($forview->UploadedOn) {
        $timestamp = strtotime($forview->UploadedOn);
        print date("jS F Y", $timestamp);
    }
} ?>
<?php if ($userdetail) {
    if ($userdetail->fullname) {
        echo $userdetail->fullname;
    } if ($userdetail->status) {
        echo'(';
        if ($userdetail->status == 1) {
            echo "Attorney";
        } elseif ($userdetail->status == 2) {
            echo "Paralegal";
        } elseif ($userdetail->status == 3) {
            echo "Staff";
        } else {
            echo "Client";
        }echo ')';
    }
} ?><?php ?>

                        </div>

                        <hr/>



         


                    </div>
                </div>
            </td>
            <td class='right'>

                <div class='show_right_content show_right_content_comments'>
                    <div class='show_details_bar show_details_bar_right '>
                        <div style='float:left; margin-left: 10px; margin-top: 5px; position: relative;' class='selected_button'>
                            <a onclick="show_page(this, 'comments_page');
                                    return false;" class="gray_button selected" href="#"><span>Comments</span></a>
                        </div>
                        <div style='float:left; margin-left: 10px; margin-top: 5px; position: relative;'>
                            <a onclick="show_page(this, 'versions_page');
                                    return false;" class="gray_button" href="#version" data-toggle="tab"><span>Versions</span></a>

                        </div>
                        <div style='float:left; margin-left: 10px; margin-top: 5px;'>
                            <a onclick="show_page(this, 'sharing_page');
                                    return false;" class="gray_button" href="#"><span>Sharing</span></a>
                        </div>
                        <div style='float:left; margin-left: 10px; margin-top: 5px;'>
                            <a onclick="show_page(this, 'history_page');
                                    return false;" class="gray_button" href="#"><span>History</span></a>
                        </div>
                    </div>

                    <div style='clear:both; height: 20px;'></div>

                    <div id='comments_page' class='padded_page' style=''>
                        <div id='comments_list'>



                            <div style=''>
<?php if ($commentall) {
    foreach ($commentall as $acomment) { ?>
                                        <div id='comment_9038772' class='comment_row'>
                                            <div class='comment_padding'>
                                                <table style='width: 100%;'>

                                                    <tr>
                                                        <td style='width: 76px; vertical-align: top;'>
                                                            <div style="border: 1px solid #d6d6d6;border-radius: 0px;width: 56px;height: 56px;padding: 2px;display: inline-block;overflow: hidden;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56" /></div>
                                                        </td>

                                                        <td>
                                                            <div style='font-weight: bold;'>
                                                                <a href=""><?php if ($acomment->user_id) {
            if ($alluser) {
                foreach ($alluser as $auser) {
                    if ($acomment->user_id == $auser->id) {
                        echo $auser->fullname;
                    }
                }
            }
        } ?></a>

        <?php if ($acomment->createdDate) {
            echo "-";
            $newdate = strtotime($acomment->createdDate);
            echo date('d F h:i A', strtotime($acomment->createdDate));
        } ?>
                                                            </div>

                                                            <div class='comment-text-formatted wrap-long-words'><p><?php if ($acomment->comment) {
            echo $acomment->comment;
        } ?></p>
                                                            </div>
                                                        </td>

                                                    </tr>

                                                </table>

                                            </div>
                                        </div>
    <?php }
} ?>

                                <div id='comment_entry' class='comment_row'>
                                    <div class='comment_padding'>
                                        <table style='width: 100%;'>
                                            <tr>
                                                <td style='width: 76px; vertical-align: top;'>
                                                    <div style="border: 1px solid #d6d6d6;border-radius: 0px;width: 56px;height: 56px;padding: 2px;display: inline-block;overflow: hidden;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56" /></div>
                                                </td>
                                                <td>
                                                    <form id="comment_form" action="<?php echo base_url() . 'savecomment' ?>" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="put" /><input type="hidden" name="authenticity_token" value="XCNxxN+II0Q2tGnZUtDohcx8bauNaBOosYX04NM59KKZ5gr0tNf+PcmIHqvtAdGjJjOlFCmXgVo/7bS4pYYvWg==" />
                                                        <input type="hidden" name="caseid" value=" <?php if ($casedetail) {
    if ($casedetail->CaseId) {
        echo $casedetail->CaseId;
    }
} ?>">
                                                        <input type="hidden" name="firmid" value=" <?php if ($casedetail) {
    if ($casedetail->FirmId) {
        echo $casedetail->FirmId;
    }
} ?>">
                                                        <input type="hidden" name="documentid" value=" <?php if ($forview) {
    if ($forview->DocumentId) {
        echo $forview->DocumentId;
    }
} ?>">
                                                        <textarea name="content" id="rsmsgtext"></textarea>

                                                        <div id='comments_button' style='margin-top: 10px; float: right;'>
                                                            <button type="submit">
                                                                <span>
                                                                    <img src="https://assets.mycase.com/assets/commenting-6612312aea43905365e8356910e3241437dbb3fd60898746105100578dc39d24.png" alt="Commenting" /> Post Comment
                                                                </span>
                                                            </button>
                                                        </div>




                                                    </form>              </td>
                                            </tr>
                                        </table>

                                        <div style='clear:both;'></div>
                                    </div>
                                </div>
                            </div>
                            <div>


                            </div>
                        </div>
                    </div>
            </td>
        </tr>
    </table>

    
    <script type="text/javascript">
        tinymce.init({
            selector: '#rsmsgtext',
            height: 100,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
    </script>
    <script>
        function show_page(link, page) {
            var element = $(link);

            $('comments_page').hide();
            $('versions_page').hide();
            $('sharing_page').hide();
            $('history_page').hide();
            $(page).show();

            var unreadComments = $('unread_comments');
            if (unreadComments && unreadComments.visible()) {
                unreadComments.hide();
                new Ajax.Request('https://rs-software4.mycase.com/documents/23441714/reload_show?comments_only=true', {asynchronous: true, evalScripts: true, parameters: 'authenticity_token=' + encodeURIComponent('7XXHroTnEqkk/LJP67RJqE/Eu87x03jbO68zffdAI7tk+F+4ztw+K392cVaqNxmrurg8e8OYno5UE9MKPcXI6w==')})
            }

            $$('a.gray_button.selected').each(function (item) {
                item.removeClassName('selected');
            });
            $$('div.selected_button').each(function (item) {
                item.removeClassName('selected_button');
            })

            element.addClassName('selected');
            element.up().addClassName('selected_button');

            right_div = element.up('div.show_right_content');

            if (page == 'comments_page') {
                right_div.addClassName('show_right_content_comments');
            }
            else {
                right_div.removeClassName('show_right_content_comments');
            }
        }

    </script>
    
    
    
    
    
    
    
    
    
    
 
<script type="text/javascript" charset="utf-8">
  window['writer_open_callback'] = function writer_open_callback() {
    jQuery.facebox.close();
  }

  function open_writer() {
    var writer = window.open('https://rs-software4.mycase.com/documents/writer');
  }

  MyCase.loadInternalScript('documents/form.js');
  MyCase.loadInternalScript('documents/batch_upload_form.js');
</script>






