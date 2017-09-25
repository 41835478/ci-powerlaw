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
                                <ul class="icons-list" style="float:right">
                                    <li>
                                        <?php if ($_SESSION['permissionsession']['events'] == '1') { ?>
                                            <a href="<?php echo base_url() ?>taskaddform"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                                    <?php } ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-cog3"></i>
                                            <span class="visible-xs-inline-block position-right">Share</span>
                                            <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="<?php echo base_url() ?>taskEXLReport"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                            <li><a href="<?php echo base_url() ?>taskPDFReport"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="details_padding">
                                            <h2 class="details_header">
                                                <table >
                                                    <tbody><tr>
                                                            <td class="task"></td>
                                                            <td id="task_details_name">
                                                                <img src="https://assets.mycase.com/assets/svg/icons/task-6e57e31fa0e8f503f80742a3f1d94e1d72d35888d2f6070077cac998b37bdbba.svg" alt="Task" width="42" height="42">
                                                                Today's task
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                            </h2>

                                            <table style="background: #b0d3fe;text-shadow: none;">
                                                <tbody><tr style="border-bottom:none;background-color: #e8f1f7; min-width: 544px; padding-bottom: 40px; border: 1px solid #b8b8b8;">
                                                        <td>
                                                            <div style="cursor:pointer;float: left; vertical-align: middle; margin-top: 5px; padding-left: 6px;"></div>
                                                            <input type="checkbox">
                                                        </td>
                                                        <td style="width:100%; padding-bottom: 10px;">
                                                            <span style="float: left;margin-top: 10px;">
                                                                <span style="cursor: pointer;">Mark Task Complete</span>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    <tr style="border-top: none;">
                                                        <td style="vertical-align: middle;">
                                                            <span style="float:left; margin-left: 10px; font-weight: bold;">0%</span>
                                                        </td>
                                                        <td style="padding: 10px 0px 10px 10px;">
                                                            <div style="width:100%; float:right; margin-right: 5px;" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="ui-progressbar-value ui-widget-header ui-corner-left" style="width: 0%;"></div></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border: 1px solid #b8b8b8; vertical-align: middle; background-color: white;padding-left: 4px; padding: 7px;">
                                                            <div style="cursor:pointer;float: left;"></div>
                                                            <input type="checkbox" onclick="">
                                                        </td>
                                                        <td style="vertical-align: middle; border: 1px solid #b8b8b8; width: 100%; padding-left: 8px; background-color: white; padding: 7px;">
                                                            Check data
                                                            <div>
                                                                <span style="font-size: 11px;">
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="checklist-item-details">
                                                        <td style="border: 1px solid #b8b8b8; vertical-align: middle; background-color: white;padding-left: 4px; padding: 7px;">
                                                            <div style="cursor:pointer;float: left;"></div>
                                                            <input type="checkbox"   value="1" onclick="">
                                                        </td>
                                                        <td class="checklist-item-name-details" style="vertical-align: middle; border: 1px solid #b8b8b8; width: 100%; padding-left: 8px; background-color: white; padding: 7px;">
                                                            Make group with data
                                                            <div>
                                                                <span style="font-size: 11px;">
                                                                </span>
                                                            </div>
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
                                                            <a> <?php echo $edittask->CaseName; ?></a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>
                                                            <a>
                                                                <?php
                                                                $firminfo = $this->TaskSystemModel->getassignedfirm($edittask->FirmId);
                                                                echo $firmname = $firminfo->FirmName;
                                                                ?>
                                                            </a>
                                                        </td>
                                                    </tr>


                                                    <tr>
                                                        <th>Assigned To</th>
                                                        <td>
                                                            <a>
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
                                                            <div>
                                                                Popup 1 day before due date.<br>
                                                            </div>
                                                            <a href="#" onclick="">Edit Reminders</a>

                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row" style="background-color: #f6fbff;min-height: 70px;padding: 15px;">
                                            <div class="col-md-2">
                                                <div style="border: 1px solid #222222;border-radius: 0px;width: 56px;height: 56px;padding: 0px;display: inline-block;overflow: hidden;box-shadow: 0px 0px 4px #222222;"><img class="" src="https://assets.mycase.com/assets/default_avatar_64-cf6eefb2df3e39a44a4096a28a402a59acb3f4fc24e950cc450fd3aa71dbda35.png" alt="Default avatar 64" width="56" height="56"></div>
                                            </div>
                                            <div class="col-md-10">
                                                <form id="comment_form" action="<?php echo base_url() ?>addgroupbymsg/<?php //echo $messageview->MessageId;         ?>" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="put">
                                                    <input type="hidden" name="CaseId" id="new_message_user_id" value="<?php //echo $messageview->CaseId;         ?>">
                                                    <input type="hidden" name="FirmId" id="new_message_user_id" value="<?php //echo $messageview->FirmId;         ?>">
                                                    <input type="hidden" name="Subject" id="new_message_user_id" value="<?php //echo $messageview->Subject;         ?>">
                                                    <input type="hidden" name="MessageTo" id="new_message_user_id" value="<?php //echo $messageview->MessageTo;         ?>">
                                                    <textarea class="form-control FETextInput user-text" id="lawyertasktext" name="Content" placeholder="Type your comment here..."></textarea>
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
</script> 