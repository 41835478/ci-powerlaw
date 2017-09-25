
<script src="assets/b05c5bed/yii.js"></script>
<script src="assets/b05c5bed/yii.gridView.js"></script>
<script src="/assets/b05c5bed/yii.validation.js"></script>
<script src="/assets/b05c5bed/yii.activeForm.js"></script>

<script src="themes/ladmin/layouts/assets/js/core/libraries/jasny_bootstrap.min.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/forms/inputs/autosize.min.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/handlebars.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/forms/inputs/maxlength.min.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="themes/ladmin/layouts/assets/js/pages/picker_date.js">
</script><script src="themes/ladmin/layouts/assets/js/jquery-ui.min.js"></script>	
<!--

select is not work
<script src="assets/b6c7423e/jquery.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/core/libraries/bootstrap.min.js"></script>
 -->
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/loaders/blockui.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/ui/nicescroll.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/ui/drilldown.js"></script>
<!-- /core JS files -->
<!-- Editable -->
<script src="assets/bower_components/jsgrid/db.js"></script>
<script type="text/javascript" src="assets/bower_components/jsgrid/dist/jsgrid.min.js"></script>
<script src="assets/js/jsgrid-init.js"></script>
<!-- Theme JS files -->
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/forms/styling/switch.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js"></script>

<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/pickers/anytime.min.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/legacy.js"></script>


<!--	<script type="text/javascript" src="themes/ladmin/layouts/assets/js/pages/form_checkboxes_radios.js"></script> -->
<script type="text/javascript" src="themes/ladmin/layouts/assets/js/core/app.js"></script>

<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/notifications/pnotify.min.js"></script>

<script type="text/javascript" src="themes/ladmin/layouts/assets/js/pages/components_notifications_pnotify.js"></script>


<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/notifications/sweet_alert.min.js"></script>

<script type="text/javascript" src="themes/ladmin/layouts/assets/js/plugins/notifications/bootbox.min.js"></script>

<script type="text/javascript" src="themes/ladmin/layouts/assets/js/pages/components_modals.js"></script>

<script type="text/javascript">
    $("[class='switch']").bootstrapSwitch(); //initialized somewhere
    // Solid success
    /*    $(window).load(function () {
     new PNotify({
     title: 'Success notice',
     text: 'Check me out! I\'m a notice.',
     addclass: 'bg-success'
     });
     });
     */
</script>
<script>
    $('body').delegate('.alertForDelete', 'click', function () {
        var href = jQuery(this).attr('href');
        var makeChange = true;


        if (makeChange) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: true
            },
    
                    function (isConfirm) {

                        if (isConfirm) {

                            swal("Deleted!", "State has been deleted.", "success");
                            window.location.href = href;
                        } else {
                             swal("Cancelled", "State is safe :)", "error");
                        }
                    });
        }

        return false;
    });
</script>
<style type="text/css">
    .ui-pnotify-title{
        text-transform: capitalize;
    }
</style>
</body>
</html>