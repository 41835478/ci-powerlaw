<style>

    .dp-cur, .chip dt, .te, .te-t, .te-rev-s, .rb-n, .rb-i, .agenda, .event-title{
        white-space:normal !important;
    }

</style>
<script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.css" />

<script src="<?php echo base_url() ?>assets/Datepair/lib/pikaday.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Datepair/lib/pikaday.css" />

<script src="<?php echo base_url() ?>assets/Datepair/lib/jquery.ptTimeSelect.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/Datepair/lib/jquery.ptTimeSelect.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

<script src="<?php echo base_url() ?>assets/Datepair/lib/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/Datepair/lib/site.js"></script>
<link rel="stylesheet" type="text/css" href="<?php //echo base_url() ?>assets/Datepair/lib/site.css" />

<script src="<?php echo base_url() ?>assets/Datepair/dist/datepair.js"></script>
<script src="<?php echo base_url() ?>assets/Datepair/dist/jquery.datepair.js"></script>
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

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Case</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li>
                                <a href="<?php echo base_url() ?>addNewPracticeArea"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog3"></i>
                                    <span class="visible-xs-inline-block position-right">Share</span>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo base_url() ?>caseEXLReport"><i class="icon-file-excel"></i> Export to Excel</a></li>
                                    <li><a href="<?php echo base_url() ?>casePDFReport"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>					                        
                </div>
                <div class="panel-body">
                    <div id="w0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000" class="table-responsive"> 
                        <div class="responsive-iframe-container big-container">
                            <button data-toggle="modal" data-target="#addeventmodal" class="btn btn-default" style="float:right; margin-bottom:10px; margin-top: 10px"><i class="glyphicon glyphicon-plus" style="color:green"></i>Add Event</button>
                            <iframe src="https://calendar.google.com/calendar/embed?title=PowerLaw%20Calendar&amp;mode=DAY&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=fouzia%40sahajjo.com&amp;color=%231B887A&amp;ctz=Asia%2FDhaka" style="border:solid 1px #777" width="1250" height="600" frameborder="0" scrolling="no"></iframe>
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

<!-------------------------------CALENDAR EVENT ADD MODAL----------------------->

<!-- Modal -->
<div class="modal fade" id="addeventmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color: #222222;">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Add Event
                </h4>
            </div>
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>insertnewmessage">
                <!-- Modal Body -->
                <div class="modal-body">
                    <h5>Case Link</h5>
                    <div class="form-group">
                        <div class="col-sm-9" id="sendtodiv1">
                            <input type="text" class="form-control" name="casename" id="casenameid" placeholder="Select User" value="">
                            <input type="hidden" id="caseiddiv" value="" name="caseid">
                            <div id="caseresult"></div>
                        </div>
                        <div class="col-sm-3">
                            <img onclick="getallcase()" src="<?php echo base_url() ?>assets/image/smlbtn.png">
                        </div>

                    </div>
                    <hr style="border-top: dotted 1px;" />

                    <div class="form-group" id="sendtodiv3">
                        <label for="exampleInputEmail1">Event Name</label>
                        <input type="text" class="form-control" placeholder="Case Link" id="caseLink" name="case_link">
                    </div>
                    <div class="form-group" id="sendtodiv3">
                        <label for="exampleInputEmail1">Date And Time</label>
                        <p id="basicExample">
                            <input type="text" class="date start" />
                            <input type="text" class="time start" /> to
                            <input type="text" class="time end" />
                            <input type="text" class="date end" />
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter subject" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control FETextInput user-text" id="newmsgtext" name="msgContent"></textarea>
                    </div>
                    <div class="form-group field-country-countrycode">
                        <label class="control-label" for="country-countrycode">Reminder</label><br>
                        <div class="row" id="reminderparentdiv">
                        </div>
                        <span class="loadingimg" style="display:none"><img src="<?php echo base_url() ?>assets/image/loadingimage.gif"></span>
                        <p><i class="glyphicon glyphicon-plus" style="color: #48A64C;"></i> <a class="remindcls"> Add a reminder</a></p>
                    </div> 

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-------------------------------Calender EVENT MODAL----------------------->

<script type="text/javascript">
    $(document).ready(function () {
        var i = 1;
        $('.remindcls').click(function () {
            $('.loadingimg').show();
            setTimeout(function () {
                $('.loadingimg').hide();
                $('#reminderparentdiv').append('<div class="rem_' + i + '"><div class="col-md-3"><select name="remainder_type[]" id="remainder_type" class="form-control"><option value="email">email</option><option selected="selected" value="popup">popup</option></select></div><div class="col-md-2"><input type="text" name="remainder_duration[]" id="remainder_duration" value="" class="reminder_input form-control"></div><div class="col-md-4"><select name="remainder_duration_type[]" id="task_reminders__duration" class="form-control"><option value="day">days</option><option value="week">weeks</option></select></div><div class="col-md-2"><div class="form-control-static">before due date</div></div><div class="col-md-1"><div class="form-control-static"><a onClick="removetaskreminder(' + i + ')"><i class="glyphicon glyphicon-remove" style="color: red;"></i></i></a></div></div></div><br><br>');
                i++;
            }, 3000);
        });


    });

    function removetaskreminder(i) {
        alert(i);
        $('.rem_' + i).remove();
    }

    function getallcase() {

        $.ajax({
            url: "<?php echo site_url('getallsitecaseinfoforcal'); ?>",
            type: "post",
            success: function (msg) {
                var hhh = JSON.parse(msg);
                //console.log(hhh);
                $('#caseresult').html(hhh.casediv);
                $('#case_select').attr('size', 4);
            }
        });
    }

    function getcasename(caseid) {
        alert('fouzia');
        alert(caseid);
        $.ajax({
            url: "<?php echo site_url('getcasenamebyid'); ?>",
            type: "post",
            data: {
                caseid: caseid,
            },
            success: function (msg) {
                var hhh = JSON.parse(msg);
                console.log(hhh);
                $('#casenameid').val(hhh.casename);
                $('#caseiddiv').val(hhh.caseid);
                $('#case_select').hide();
            }
        });
    }
</script>

<script>
                $('#basicExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                $('#basicExample .date').datepicker({
                    'format': 'm/d/yyyy',
                    'autoclose': true,
                    'defaultDate': '05/24/2017',
                });

                var basicExampleEl = document.getElementById('basicExample');
                var datepair = new Datepair(basicExampleEl);
</script>