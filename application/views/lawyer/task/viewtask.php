<div class="page-header">
    <div class="page-header-content" style="background: #C8C8C8">
        <ol class="breadcrumb" style="padding-bottom: 10px;">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>lawyerdashboard">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>viewlawyertask/<?php echo $this->uri->segment('2'); ?>">View Task</a></li>
        </ol>
    </div>
</div>
<!-- /page header -->
<style>
    div.calendar_date {
        background: url('<?php echo base_url() ?>assets/image/calendar_date.png') top left no-repeat;
        width: 38px;
        height: 40px;
    }
    #incombtn:active { 
        background-color: #00B3CA;
        color:#fff
    }

    #combtn:active { 
        background-color: #00B3CA;

    }
</style>
<script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
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
                            <div class="heading-elements">

                            </div>
                            <div class="navbar navbar-default" id="navbar-second">
                                <div class="navbar-collapse collapse" id="navbar-second-toggle">
                                    <h5>Tasks</h5>
                                    <button class="btn btn-primary btn-block" style="color:#fff">Showing My Tasks</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            <hr><br>
                            <!--                            <button class="btn btn-default btn-block" style="color:red">Close Firm</button>-->
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive"> 
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="details_padding">
                                            <h2 class="details_header">
                                                <div class="row" style="margin-left: 5px; margin-bottom: 10px;">
                                                    <a href="<?php echo base_url() ?>editfronttask/<?php echo $this->uri->segment('2'); ?>" title="Update" aria-label="Update" data-pjax="0"><button class="btn btn-default" style="background: #C8C8C8; border: 1px solid #000; border-radius: 5px;"><span class="glyphicon glyphicon-pencil"></span> Edit</button></a> 
                                                    <a class="alertForDelete" href="<?php echo base_url() ?>deletelaywertask/<?php echo $this->uri->segment('2'); ?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><button class="btn btn-default" style="background: #C8C8C8; border: 1px solid #000; border-radius: 5px;"><span class="glyphicon glyphicon-trash"></span> Delete </button></a>
                                                </div>
                                                <table >
                                                    <tbody><tr>
                                                            <td class="task"></td>
                                                            <td id="task_details_name">
                                                                <img src="<?php echo base_url() ?>assets/image/add-task.svg" alt="Task" width="42" height="42">
                                                                <?php echo $edittask->TaskName; ?>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                            </h2>

                                            <table style="background: #b0d3fe;text-shadow: none;">
                                                <tbody><tr style="border-bottom:none;background-color: #e8f1f7; min-width: 544px; padding-bottom: 40px; border: 1px solid #b8b8b8;">
                                                        <td>
                                                            <div style="cursor:pointer;float: left; vertical-align: middle; margin-top: 5px; padding-left: 6px;"></div>
                                                            <input onclick="taskcomplete()" id="comtask" type="checkbox" style='margin-left: 10px;'>
                                                        </td>
                                                        <td style="width:100%; padding-bottom: 10px;">
                                                            <span style="float: left;margin-top: 16px; margin-left: 5px;">
                                                                <span style="cursor: pointer;">Mark Task Complete</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            <?php
                                            $date1 = strtotime($edittask->DueDate);
                                            $date2 = strtotime(date('Y-m-d'));
                                            $diff = $date1 - $date2;
                                            $datedue = floor($diff / (60 * 60 * 24));
                                            ?>
                                            <table class="table table-bordered" style="margin-top:20px">
                                                <tbody><tr>
                                                        <th>Due Date</th>
                                                        <td>
                                                            <span id="task-details-due-date" data-past-due-date="true" class="task_overdue">
                                                                <?php echo date('Y:m:d', strtotime($edittask->DueDate)); ?>
                                                                <span id="task-details-overdue" style=""><?php echo $datedue; ?> Days Overdue</span>
                                                            </span>
                                                        </td>

                                                    </tr><tr>
                                                        <th>Description</th>
                                                        <td>
                                                            <p> <?php echo $edittask->description; ?></p>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Priority</th>
                                                        <td>
                                                            <span style="color:orange"> 
                                                                <?php
                                                                if ($edittask->priority == '0') {
                                                                    echo $priority = 'No Priority';
                                                                } else if ($edittask->priority == '1') {
                                                                    echo $priority = 'High';
                                                                } else if ($edittask->priority == '2') {
                                                                    echo $priority = 'Medium';
                                                                } else if ($edittask->priority == '3') {
                                                                    echo $priority = 'Low';
                                                                }
                                                                ?>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Case Link</th>
                                                        <td>
                                                            <?php // print_r($edittask); exit; ?>
                                                            <a href="<?php echo base_url() ?>cases/viewCase/<?php echo base64_encode($edittask->CaseId); ?>"> <?php echo $edittask->CaseName; ?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>

                                                            <?php
                                                            $firminfo = $this->TaskSystemModel->getassignedfirm($edittask->FirmId);
                                                            echo $firmname = $firminfo->FirmName;
                                                            ?>

                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <th>Assigned To</th>
                                                        <td>
                                                            <a href="<?php echo base_url() ?>contacts/users/<?php echo base64_encode($edittask->AssignedTo); ?>">
                                                                <?php
                                                                $userinfo = $this->TaskSystemModel->getassigneduser($edittask->AssignedTo);
                                                                echo $uname = $userinfo->fullname;
                                                                ?>
                                                            </a><br>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Reminders</th>
                                                        <td id="reminder_info">
                                                            <?php
                                                            if (!empty($taskreminder)) {
                                                                //echo '<pre>'; print_r($taskreminder); 
                                                                ?>
                                                                <?php foreach ($taskreminder as $reminder) { ?>
                                                                    <div>
                                                                        <?php
                                                                        $retype = $reminder['remainder_type'];
                                                                        $recount = $reminder['remainder_duration'];
                                                                        $reoption = $reminder['remainder_duration_type'];
                                                                        ?>
                                                                        <p><span><?php echo $retype; ?> <?php echo $recount; ?> <?php echo $reoption; ?>s </span> before due date.</p>
                                                                    </div>
                                                                <?php } ?>
                                                                <a data-toggle="modal" data-target="#editremindermodal">Edit Reminders</a>
                                                            <?php } else { ?>
                                                                <p>None</p>
                                                                <a data-toggle="modal" data-target="#remindersetmodal">Add Reminders</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row" style="background-color: #f6fbff;min-height: 70px;padding: 15px;">
                                            <?php foreach($taskcomment as $tcom){ 
                                                $userinfo = $this->TaskSystemModel->getassigneduser($tcom['created_by']);
                                                 $uname = $userinfo->fullname; 
                                                
                                                ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div style="border: 1px solid #222222;border-radius: 0px;width: 56px;height: 56px;padding: 0px;display: inline-block;overflow: hidden;box-shadow: 0px 0px 4px #222222;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56"></div>
                                                </div>
                                                <div class="col-md-10">
                                                    <p>
                                                        <span><?php echo $uname?></span> - <span><?php echo date('d F, Y', $tcom['created_date']); ?></span>
                                                    </p>
                                                    <p><?php echo $tcom['comment']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php } ?>
                                            <div class="col-md-2">
                                                <div style="border: 1px solid #222222;border-radius: 0px;width: 56px;height: 56px;padding: 0px;display: inline-block;overflow: hidden;box-shadow: 0px 0px 4px #222222;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56"></div>
                                            </div>
                                            <div class="col-md-10">
                                                <form id="comment_form" action="<?php echo base_url() ?>addtaskcomment/<?php echo $this->uri->segment('2'); ?>" accept-charset="UTF-8" data-remote="true" method="post">
                                                    <textarea class="form-control FETextInput user-text" id="lawyertasktext" name="comment" placeholder="Type your comment here..."></textarea>
                                                    <button type="submit" class="btn btn-default" style="float: right; margin-top: 10px; background: #EEEEEE; border: 1px solid #ddd;"><a id="comment_submit" href="#" class="gray_button">
                                                            <span><img src="https://assets.mycase.com/assets/commenting-6612312aea43905365e8356910e3241437dbb3fd60898746105100578dc39d24.png" alt="Commenting">Post Reply</span>
                                                        </a></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
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

<!----------------------------------------   REMINDER MODAL   -------------------------------------------->

<div class="modal fade product_view" id="remindersetmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Set Reminder</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="form-horizontal" action="<?php echo base_url() ?>savetaskreminder/<?php echo $this->uri->segment('2'); ?>" method="post">
                        <input type="hidden" name='remainder_for' value="task">
                        <div id="reminderparentdiv">
                            <div class="rem_1">
                                <div class="col-md-3">
                                    <select name="remainder_type[]" id="remainder_type" class="form-control">
                                        <option value="email">email</option>
                                        <option selected="selected" value="popup">popup</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control">
                                </div>
                                <div class="col-md-4">
                                    <select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control">
                                        <option value="day">days</option>
                                        <option value="week">weeks</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-control-static">before due date</div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-control-static">
                                        <a onClick="removetaskreminder(1)"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <br>
                        <span class="loadingimg" style="display:none"><img src="<?php echo base_url() ?>assets/image/loadingimage.gif"></span>
                        <p><i class="glyphicon glyphicon-plus" style="color: #48A64C;"></i> <a class="remindcls"> Add a reminder</a></p>

                        <div class="btn-ground">
                            <a><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Set Reminder</button></a>
                            <a href="#" data-dismiss="modal" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancle</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!----------------------------------------   REMINDER MODAL   -------------------------------------------->

<!----------------------------------------   EDIT REMINDER MODAL   -------------------------------------------->

<div class="modal fade product_view" id="editremindermodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Set Task Reminder</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p>Set your reminders for this task: </p>
                    <form class="form-horizontal" action="<?php echo base_url() ?>edittaskreminder/<?php echo $this->uri->segment('2'); ?>" method="post">
                        <input type="hidden" name='remainder_for' value="task">
                        <div id="remindereditdiv">
                            <?php
                            $k = 1;
                            foreach ($taskreminder as $reminder) {
                                ?>
                                <div class="rem_<?php echo $k; ?>">
                                    <div class="col-md-3">
                                        <select name="remainder_type[]" id="remainder_type" class="form-control">
                                            <option value="email" <?php
                                            if ($reminder['remainder_type'] == 'email') {
                                                echo 'selected';
                                            }
                                            ?>>email</option>
                                            <option value="popup" <?php
                                            if ($reminder['remainder_type'] == 'popup') {
                                                echo 'selected';
                                            }
                                            ?>>popup</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="remainder_duration[]" id="remainder_duration" value="<?php echo $reminder['remainder_duration']; ?>" class="reminder_input form-control">
                                    </div>
                                    <div class="col-md-4">	
                                        <select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control">
                                            <option value="day" <?php
                                            if ($reminder['remainder_duration_type'] == 'day') {
                                                echo 'selected';
                                            }
                                            ?>>days</option>
                                            <option value="week" <?php
                                            if ($reminder['remainder_duration_type'] == 'week') {
                                                echo 'selected';
                                            }
                                            ?>>weeks</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-control-static">before due date</div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-control-static">
                                            <a onClick="removetaskreminder(<?php echo $k; ?>)"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $k++;
                            }
                            ?>
                            <br><br>
                        </div>
                        <br><br>
                        <div class="row" style='margin-top:40px'>
                            <p class="loadingimg" style="display:none"><img src="<?php echo base_url() ?>assets/image/loadingimage.gif"></p>
                            <p><i class="glyphicon glyphicon-plus" style="color: #48A64C;"></i> <a class="editremindcls" > Add a reminder</a></p>
                        </div>
                        <div class="btn-ground">
                            <a><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Set Reminder</button></a>
                            <a href="#" data-dismiss="modal" ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancle</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!----------------------------------------   EDIT REMINDER MODAL   -------------------------------------------->

<script type="text/javascript">
    tinymce.init({
        selector: '#lawyertasktext',
        height: 100,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });

    $(document).ready(function () {
        var i = 2;
        $('.remindcls').click(function () {
            $('.loadingimg').show();
            setTimeout(function () {
                $('.loadingimg').hide();
                $('#reminderparentdiv').append('<div class="rem_' + i + '"><div class="col-md-3"><select name="remainder_type[]" id="remainder_type" class="form-control"><option value="email">email</option><option selected="selected" value="popup">popup</option></select></div><div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control"></div><div class="col-md-4"><select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control"><option value="day">days</option><option value="week">weeks</option></select></div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskreminder(' + i + ')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div></div><br><br><br><br>');
                i++;
            }, 3000);


        });


    });


    $(document).ready(function () {
        var total = '<?php echo count($taskreminder); ?>';
        var count = parseInt(total) + 1;
        $('.editremindcls').click(function () {
            $('.loadingimg').show();
            setTimeout(function () {
                $('.loadingimg').hide();
                $('#remindereditdiv').append('<div class="rem_' + count + '"><div class="col-md-3"><select name="remainder_type[]" id="remainder_type" class="form-control"><option value="email">email</option><option selected="selected" value="popup">popup</option></select></div><div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control"></div><div class="col-md-4"><select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control"><option value="day">days</option><option value="week">weeks</option></select></div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskreminder(' + count + ')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div></div><br><br><br><br>');
                count++;
            }, 3000);
        });

    });

    function removetaskreminder(i) {
        $('.rem_' + i).remove();
    }

    function taskcomplete() {
        if ($('#textbox1').val($(this).is(':checked'))) {
            alert('fouzia');
            var taskid = '<?php echo $this->uri->segment('2'); ?>';

            $.ajax({
                url: "<?php echo site_url('marktaskascomplete'); ?>",
                type: "post",
                dataType: "json",
                data: {
                    taskid: taskid,
                },
                success: function (msg) {
                    location.href = "<?php echo base_url() ?>tasks";
                }
            });
        }
    }

</script> 