<style>
    .bootstrap-switch{ height: 36px !important}
</style>
<!-- Page container -->
<div class="page-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page container -->
            <div class="page-container">
                <!-- Page content -->
                <div class="page-content">
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-fixed">
                            <div class="sidebar-content">

                                <!-- Title -->
                                <div class="category-title h6" style="display:none;">
                                    <span>Components</span>
                                    <ul class="icons-list">
                                        <li><a href="#"><i class="icon-gear"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /title -->
                                <?php echo $this->load->view('lawyer/account/accountsidebar', '', TRUE); ?>

                            </div>
                        </div>
                    </div>			<!-- /main sidebar -->


                    <!-- Main content -->
                    <div class="content-wrapper">
                        <div class="container-fluid">
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
                            <div class="row">
                                <h3>Custom Fields</h3>
                                <div class="col-md-12" style="background: #fff">
                                    <div id="info_page" style="margin: 20px;">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab1">Cases / Matters</a></li>
                                            <li><a data-toggle="tab" href="#tab2">Contacts</a></li>
                                            <li><a data-toggle="tab" href="#tab3">Companies</a></li>
                                            <li><a data-toggle="tab" href="#tab4">Time & Expense</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <!------------CASE CUSTOM FIELD TAB--------------->
                                            <div id="tab1" class="tab-pane fade in active">
                                                <div class="row" style="float: right">
                                                    <h2>Manage Case / Matter Custom Fields</h2>
                                                    <p>This is where you can add, edit, delete, and sort Case / Matter custom fields. The fields created here will be available when creating or editing Cases / Matters in MyPowerLaw. To manage the behavior of fields for a particular practice area, select the practice area from the dropdown.</p>
                                                </div><br><br>
                                                <div class="row">
                                                    <div class="col-md-2"><label for="exampleSelect1">Select practice area:</label></div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <select class="form-control" id="pareaSelect">
                                                                <option value="0">-------Global Settings--------</option>
                                                                <?php foreach ($allpracticearea as $parea) { ?>
                                                                    <option value="<?php echo $parea['PracticeAreaId']; ?>"><?php echo $parea['PracticeArea']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button id="addcustomeid" class="btn btn-primary" style="background: #337AB7; border:1px solid #ddd; border-radius: 6px; float:right" data-toggle="modal" data-target="#globalcusfield"> Add Custom Field</button>
                                                </div>
                                                <div class="row" id="fieldshowdiv">
                                                    <?php foreach ($getallcustomfield as $custom) { //echo '<pre>'; print_r($custom); ?>
                                                        <div class="movehand" draggable="true" style="padding: 5px 10px; margin-bottom: 8px; position: relative; background-color: rgb(247, 247, 247); border: 1px solid rgb(221, 221, 221);">
                                                            <i class="drag-handle" style="float: left; width: 20px; margin: -10px 10px 0px 0px;"></i>
                                                            <div style="float: right; margin: 10px 0px 0px 10px;">
                                                                <div>
                                                                    <a class="edit-properties-button" target="" title="Edit Properties" style="margin-right: 3px;"  onclick="editcusfield('<?php echo $custom['id']; ?>')"><span class="glyphicon glyphicon-pencil"></span></a>
                                                                    <a class="alertForDelete" href="<?php echo base_url() ?>deletecustomfield/<?php echo $custom['id']; ?>" title="Delete" aria-label="Close Case" data-confirm="Are you sure you want to Delete this Practice Area?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="customFieldName" style="font-size: 1.15em; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $custom['field_name']; ?></div>
                                                            <div class="customFieldType">
                                                                <span><span class="listType"><?php echo $custom['method']; ?> </span>
    <!--                                                                - <span class="tooltip-wrapper" style="position: relative;">
                                                                        <span style="color: rgb(38, 138, 190);">
                                                                            <span class="listTooltip">2 Options</span>
                                                                        </span>
                                                                    </span>-->
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!------------CASE CUSTOM FIELD TAB--------------->
                                            <!------------CONTACT CUSTOM FIELD TAB--------------->
                                            <div id="tab2" class="tab-pane fade in">
                                                <div class="row" style="float: right">
                                                    <h2>Manage Contact Custom Fields</h2>
                                                    <p>This is where you can add, edit, delete, and sort Contact custom fields. The fields created here will be available when creating or editing Contacts in MyCase.</p>
                                                </div><br><br>
                                                <div class="row">
                                                    <button id="addcustomeid" class="btn btn-primary" style="background: #337AB7; border:1px solid #ddd; border-radius: 6px; float:right" data-toggle="modal" data-target="#contactcusfield"> Add Contact Custom Field</button>
                                                </div><br>
                                                <div class="row" id="contactfieldshowdiv">
                                                    <?php foreach ($contactcustomfield as $contact) { ?>
                                                        <div class="movehand" draggable="true" style="padding: 5px 10px; margin-bottom: 8px; position: relative; background-color: rgb(247, 247, 247); border: 1px solid rgb(221, 221, 221);">
                                                            <i class="drag-handle" style="float: left; width: 20px; margin: -10px 10px 0px 0px;"></i>
                                                            <div style="float: right; margin: 10px 0px 0px 10px;">
                                                                <div>
                                                                    <a class="edit-properties-button" target="" title="Edit Properties" style="margin-right: 3px;"  onclick="editcontactfield('<?php echo $contact['id']; ?>')"><span class="glyphicon glyphicon-pencil"></span></a>
                                                                    <a class="alertForDelete" href="<?php echo base_url() ?>deletecontactcustomfield/<?php echo $contact['id']; ?>" title="Delete" aria-label="Close Case" data-confirm="Are you sure you want to Delete this Practice Area?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="customFieldName" style="font-size: 1.15em; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $contact['field_name']; ?></div>
                                                            <div class="customFieldType">
                                                                <span><span class="listType"><?php echo $contact['method']; ?> </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!------------CONTACT CUSTOM FIELD TAB--------------->
                                            <!------------COMPANY CUSTOM FIELD TAB--------------->
                                            <div id="tab3" class="tab-pane fade in">
                                                <div class="row" style="float: right">
                                                    <h2>Manage Company Custom Fields</h2>
                                                    <p>This is where you can add, edit, delete, and sort Company custom fields. The fields created here will be available when creating or editing Companies in MyPowerLaw.</p>
                                                </div><br><br>
                                                <div class="row">
                                                    <button id="addcustomeid" class="btn btn-primary" style="background: #337AB7; border:1px solid #ddd; border-radius: 6px; float:right" data-toggle="modal" data-target="#companycusfield"> Add Company Custom Field</button>
                                                </div><br>
                                                <div class="row" id="contactfieldshowdiv">
                                                    <?php foreach ($companycustomfield as $company) { ?>
                                                        <div class="movehand" draggable="true" style="padding: 5px 10px; margin-bottom: 8px; position: relative; background-color: rgb(247, 247, 247); border: 1px solid rgb(221, 221, 221);">
                                                            <i class="drag-handle" style="float: left; width: 20px; margin: -10px 10px 0px 0px;"></i>
                                                            <div style="float: right; margin: 10px 0px 0px 10px;">
                                                                <div>
                                                                    <a class="edit-properties-button" target="" title="Edit Properties" style="margin-right: 3px;"  onclick="editcompanycusfield('<?php echo $company['id']; ?>')"><span class="glyphicon glyphicon-pencil"></span></a>
                                                                    <a class="alertForDelete" href="<?php echo base_url() ?>deletecompanycustomfield/<?php echo $company['id']; ?>" title="Delete" aria-label="Close Case" data-confirm="Are you sure you want to Delete this Practice Area?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="customFieldName" style="font-size: 1.15em; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $company['field_name']; ?></div>
                                                            <div class="customFieldType">
                                                                <span><span class="listType"><?php echo $company['method']; ?> </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            
                                            <!------------COMPANY CUSTOM FIELD TAB--------------->
                                            <!------------TIME CUSTOM FIELD TAB--------------->
                                            
                                            <div id="tab4" class="tab-pane fade in">
                                                <div class="row" style="float: right">
                                                    <h2>Manage Time Entry / Expense Custom Fields</h2>
                                                    <p>This is where you can add, edit, delete, and sort Time Entry / Expense custom fields. The fields created here will be available when creating or editing Time Entries / Expenses in MyCase.</p>
                                                </div><br><br>
                                                <div class="row">
                                                    <button id="addcustomeid" class="btn btn-primary" style="background: #337AB7; border:1px solid #ddd; border-radius: 6px; float:right" data-toggle="modal" data-target="#timecusfield"> Add Time Custom Field</button>
                                                </div><br>
                                                <div class="row" id="contactfieldshowdiv">
                                                    <?php foreach ($timecustomfield as $time) { ?>
                                                        <div class="movehand" draggable="true" style="padding: 5px 10px; margin-bottom: 8px; position: relative; background-color: rgb(247, 247, 247); border: 1px solid rgb(221, 221, 221);">
                                                            <i class="drag-handle" style="float: left; width: 20px; margin: -10px 10px 0px 0px;"></i>
                                                            <div style="float: right; margin: 10px 0px 0px 10px;">
                                                                <div>
                                                                    <a class="edit-properties-button" target="" title="Edit Properties" style="margin-right: 3px;"  onclick="edittimecusfield('<?php echo $time['id']; ?>')"><span class="glyphicon glyphicon-pencil"></span></a>
                                                                    <a class="alertForDelete" href="<?php echo base_url() ?>deletetimecustomfield/<?php echo $time['id']; ?>" title="Delete" aria-label="Close Case" data-confirm="Are you sure you want to Delete this Practice Area?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="customFieldName" style="font-size: 1.15em; font-weight: bold; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $time['field_name']; ?></div>
                                                            <?php if($time['type'] == 'time'){ 
                                                                 $type = 'Time Entries';
                                                            } else if($time['type'] == 'expense'){
                                                                $type = 'Expenses';
                                                            } else {
                                                                $type = 'Both Time And Expenses';
                                                            }
?>
                                                            <div class="customFieldType">
                                                                <span><span class="listType"><?php echo $time['method']; ?> </span> - <span>Applies To : <?php echo $type; ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            
                                            <!------------TIME CUSTOM FIELD TAB--------------->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <!---------------------------MODAL START--------------------------->

                            <!-- Modal 1 CASE CUSTOME FIELD ADD FORM-->
                            <div class="modal fade" id="globalcusfield" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>addcustomefield">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" id="pareamethod" name="method">
                                                            <option value="Text(Short)">Text(Short)</option>
                                                            <option value="Text(Long)">Text(Long)</option>
                                                            <option value="True / False">True / False</option>
                                                            <option value="Number">Number</option>
                                                            <option value="List">List</option>
                                                            <option value="Date">Date</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-form-label">
                                                        <label>Enable for all practice areas</label>
                                                    </div>

                                                    <div class="form-group field-notifications-closecase">
                                                        <label><input name="enable_for_all_custome_area" style="height: 36px;" type="checkbox" id="notifications-closecase" class="switch" name="" value="1" maxlength data-on-color="success" data-off-color="danger"></label>
                                                    </div>   
                                                </div>

                                                <div class="row" id="methodtextdiv" style="display:none">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>List Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="col">
                                                            <ol style="margin: 0px; padding: 0px; list-style: none;">
                                                                <li style="line-height: 30px; background-color: rgb(230, 230, 230); border: 1px solid rgb(221, 221, 221); margin: 2px; padding: 4px 0px 4px 24px;">
                                                                    <input type="text" value="" placeholder="Add list option" name="value" style="padding: 6px 4px; width: 83%;">
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 1-->
                            <!-- EDIT Modal 2 CASE CUSTOME FIELD EDIT FORM-->
                            <div class="modal fade" id="editcusfield" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>updatecustomefield">
                                        <input type="hidden" name="cusfdid" value="" id="cusfdid">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" id="editfieldname" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <span id="editfieldtype"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 2-->
                            <!-- Modal 3 (CONTACT CUSTOME FIELD ADD FORM)-->
                            <div class="modal fade" id="contactcusfield" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>addcontactcustomefield">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" id="contactpareamethod" name="method">
                                                            <option value="Text(Short)">Text(Short)</option>
                                                            <option value="Text(Long)">Text(Long)</option>
                                                            <option value="True / False">True / False</option>
                                                            <option value="Number">Number</option>
                                                            <option value="List">List</option>
                                                            <option value="Date">Date</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row" id="conmethodtextdiv" style="display:none">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>List Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="col">
                                                            <ol style="margin: 0px; padding: 0px; list-style: none;">
                                                                <li style="line-height: 30px; background-color: rgb(230, 230, 230); border: 1px solid rgb(221, 221, 221); margin: 2px; padding: 4px 0px 4px 24px;">
                                                                    <input type="text" value="" placeholder="Add list option" name="value" style="padding: 6px 4px; width: 83%;">
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 3-->
                            <!-- Modal 4 CONTACT CUSTOME FIELD EDIT FORM-->
                            <div class="modal fade" id="editconcusfield" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>updatecontactcustomefield">
                                        <input type="hidden" name="cusfdid" value="" id="concusfdid">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" id="editconfieldname" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <span id="editconfieldtype"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 4-->
                            <!-- Modal 5 (COMPANY CUSTOME FIELD EDIT FORM)-->
                            <div class="modal fade" id="companycusfield" role="dialog">
                                 <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>addcompanycustomefield">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" id="contactpareamethod" name="method">
                                                            <option value="Text(Short)">Text(Short)</option>
                                                            <option value="Text(Long)">Text(Long)</option>
                                                            <option value="True / False">True / False</option>
                                                            <option value="Number">Number</option>
                                                            <option value="List">List</option>
                                                            <option value="Date">Date</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row" id="conmethodtextdiv" style="display:none">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>List Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="col">
                                                            <ol style="margin: 0px; padding: 0px; list-style: none;">
                                                                <li style="line-height: 30px; background-color: rgb(230, 230, 230); border: 1px solid rgb(221, 221, 221); margin: 2px; padding: 4px 0px 4px 24px;">
                                                                    <input type="text" value="" placeholder="Add list option" name="value" style="padding: 6px 4px; width: 83%;">
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!----------COMPANY CUSTOME FIELD ADD FORM------------->
                            
                             <!-- Modal 6 COMPANY CUSTOME FIELD EDIT FORM-->
                            <div class="modal fade" id="editcompanycusfield" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>updatecompanycustomefield">
                                        <input type="hidden" name="cusfdid" value="" id="compcusfdid">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" id="editcompfieldname" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <span id="editcompfieldtype"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 5-->
                            
                            <!-- Modal 6 (TIME CUSTOME FIELD EDIT FORM)-->
                            <div class="modal fade" id="timecusfield" role="dialog">
                                 <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>addtimecustomefield">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Applies To</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" id="contactpareamethod" name="entriesoption">
                                                            <option value="1">Both Time Entries and Expenses</option>
                                                            <option value="2">Time Entries Only</option>
                                                            <option value="3">Expenses Only</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" id="contactpareamethod" name="method">
                                                            <option value="Text(Short)">Text(Short)</option>
                                                            <option value="Text(Long)">Text(Long)</option>
                                                            <option value="True/False">True / False</option>
                                                            <option value="Number">Number</option>
                                                            <option value="List">List</option>
                                                            <option value="Date">Date</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row" id="conmethodtextdiv" style="display:none">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>List Options</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="col">
                                                            <ol style="margin: 0px; padding: 0px; list-style: none;">
                                                                <li style="line-height: 30px; background-color: rgb(230, 230, 230); border: 1px solid rgb(221, 221, 221); margin: 2px; padding: 4px 0px 4px 24px;">
                                                                    <input type="text" value="" placeholder="Add list option" name="value" style="padding: 6px 4px; width: 83%;">
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!----------Time CUSTOME FIELD ADD FORM------------->
                            
                             <!-- Modal 7 TIME CUSTOME FIELD EDIT FORM-->
                            <div class="modal fade" id="edittimefieldtype" role="dialog">
                                <div class="modal-dialog">
                                    <form method="post" action="<?php echo base_url() ?>updatetimecustomefield">
                                        <input type="hidden" name="cusfdid" value="" id="timecusfdid">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Custom Field</h4>
                                            </div>
                                            <hr>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" id="edittimefieldname" class="form-control" name="field_name" placeholder="Custom Field Name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Applies To</label>
                                                    </div>
                                                    <div class="col-md-10" id="timeeditselect">
<!--                                                        <select class="form-control" id="contactpareamethod" name="entriesoption">
                                                            <option value="1">Both Time Entries and Expenses</option>
                                                            <option value="2">Time Entries Only</option>
                                                            <option value="3">Expenses Only</option>
                                                        </select>-->
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-md-2 col-form-label">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <span id="edittimetype"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add Custom Field</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Modal 5-->
                            
                        </div>
                    </div>
                    <!-- /main content -->
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
    $('#pareaSelect').on('change', function () {
        var pid = this.value;
        alert(pid);
        var url = '<?php echo base_url() ?>showcustomefielddata';
        if (pid != '0') {
            $('#addcustomeid').hide();

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    pid: pid,
                },
                success: function (data)
                {
                    var hhh = JSON.parse(data);
                    console.log(hhh);
                    //console.log(hhh.getallcustomfield);
                    $('#fieldshowdiv').html("");
                    $('#fieldshowdiv').html(hhh.getallcustomfield);
                }
            });

        } else {
            ////
        }
    });

    $('#pareamethod').on('change', function () {
        var methodid = this.value;
        alert(methodid);
        if (methodid == '5') {
            $('#methodtextdiv').show();
        }
    });

    $('#contactpareamethod').on('change', function () {
        alert('fouzia');
        var conmethod = this.value;
        alert(conmethod);
        if (conmethod == 'List') {
            $('#conmethodtextdiv').show();
        }
    });

    function editcusfield(customid) {
        var url = '<?php echo base_url() ?>editcustomedatawithid';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                customid: customid,
            },
            success: function (data)
            {
                var hhh = JSON.parse(data);
                $('#editfieldname').val(hhh.field_name);
                $('#editfieldtype').text(hhh.method);
                $('#cusfdid').val(hhh.cusfdid);
                $("#editcusfield").modal('show');
            }
        });
    }

    function editcontactfield(customid) {
        alert('diyamoni');
        var url = '<?php echo base_url() ?>editcontactfielddatawithid';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                customid: customid,
            },
            success: function (data)
            {
                var hhh = JSON.parse(data);
                console.log(hhh);
                $('#editconfieldname').val(hhh.field_name);
                $('#editconfieldtype').text(hhh.method);
                $('#concusfdid').val(hhh.cusfdid);
                $("#editconcusfield").modal('show');
            }
        });
    }

function editcompanycusfield(customid){
        var url = '<?php echo base_url() ?>editcompanyfielddatawithid';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                customid: customid,
            },
            success: function (data)
            {
                var hhh = JSON.parse(data);
                console.log(hhh);
                $('#editcompfieldname').val(hhh.field_name);
                $('#editcompfieldtype').text(hhh.method);
                $('#compcusfdid').val(hhh.cusfdid);
                $("#editcompanycusfield").modal('show');
            }
        });
}
    $('body').delegate('.alertForDelete', 'click', function () {
        var href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: true
            },
                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Deleted!", "Practice Area has been Delete.", "success");
                            window.location.href = href;
                        } else {
                            swal("Cancelled", "Practice Area is safe :)", "error");
                        }
                    });
        }

        return false;
    });

    $('.make-switch').on('switch-change', function (e, data) {

    });
    
    function edittimecusfield(customid){
        alert(customid);
        var url = '<?php echo base_url() ?>edittimefielddatawithid';
        $.ajax({
            type: "POST",
            url: url,
            data: {
                customid: customid,
            },
            success: function (data)
            {
                var hhh = JSON.parse(data);
                console.log(hhh);
                $('#edittimefieldname').val(hhh.field_name);
                $('#edittimetype').text(hhh.method);
                $('#timecusfdid').val(hhh.cusfdid);
                $('#timeeditselect').html(hhh.typedata);
                $("#edittimefieldtype").modal('show');
            }
        });
    }
</script>