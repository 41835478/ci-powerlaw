<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 style="text-align:center"><img align="center" id="blah" alt="" style="height: 80px;width: 320px;" class="msg-img" src="<?php base_url() ?>themes/ladmin/layouts/assets/images/logo_light.png"/> </h1>
        </div>
        <div class="col-lg-6">
            <h1 style="text-align:center">My Power Law</h1>

        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-stats"></i><h3 style="text-align:center"> All State</h3>                            
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <div class="">
                        <table class="table table-bordered table-hover table-striped text-centered" id="assetsdata" style=" border-radius: 5px;width: 50%;margin: 0px auto;float: none;">
                            <thead>
                                <tr>
                                    <th style="text-align:center; vertical-align:middle; border: 2px solid #808080; padding: 10px; width: 220px">Country Namw</th>
                                    <th style="text-align:center; vertical-align:middle; border: 2px solid #808080; padding: 10px; width: 220px">State Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allstateinfo as $state) { ?>						
                                    <tr>
                                        <td style="text-align:center; vertical-align:middle; border: 1px solid #808080; padding: 5px; width: 220px"><?php echo $state['CountryName']; ?></td>
                                        <td style="text-align:center; vertical-align:middle; border: 1px solid #808080; padding: 5px; width: 220px"><?php echo $state['StateName']; ?></td>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>


        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<style type="text/css">
    html, body { height:100%; background: #F5F5F5; border: 2px dotted #172E62;}
    #page-wrapper { padding-left: 25px; }
    .table th { text-align:center;}
</style>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                        .attr('src', e.target.result)
                        .width(110)
                        .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>