
<body>


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Documents</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a class="gray_button show-tags" href="#"><span><img src="https://assets.mycase.com/assets/arrow_right-496cf20ac24121cfb770b38fb67e6f5d4a7e06ef03d40acc11b262fc89de4793.png" alt="Arrow right"> Browse By Tags</span></a></li>
                                <li><div style="float:left; overflow: visible;" class="field fieldWithImage">
        <input name="filter_case_name" id="filter_case_name" value="" placeholder="Filter documents by case..." style="width: 305px; background: url(https://assets.mycase.com/assets/search_smaller-3a8c6752b27b810edbc798322cd0b5ff0334b9d8825eca5be239054a295d8561.gif) no-repeat 3px 4px white; padding-left: 22px; color: black;" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" type="text">

        <div id="filter_browse_spinner" style="display: none; position: absolute; top: 5px; right: 5px;">
          <img style="vertical-align: middle;" src="https://assets.mycase.com/assets/retina/ajax_arrows-a4ab2b6f20f4a4b63367e1819c2c072798f52ed372c3f56c3002332c3ff331ae.gif" alt="Ajax arrows">
        </div>
      </div></li>
                                <li>
                                    <a href="LawyerAdmin/addContact"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
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
                    <div class="panel-body">

                        <!--                        <div class="col-lg-12">
                                                    <div class="white-box">
                                                        <h3 class="box-title">Editable with Datatable</h3>
                                                        <div id="basicgrid"></div>
                                                    </div>
                                                </div>-->

                        <div id="w0" class="grid-view">
                            <div class="summary">Showing <b>1-2</b> of <b>2</b> items.</div>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"> <div class="empty-state">
                                <img alt="Document Example" class="thumbnail" srcset="https://assets.mycase.com/assets/empty-state/case-docs-11b66fd5471ea10e3eb7cb5bed23c19d74e2bce619aa086e18c9a3f7cf8a7ba7.png 1x, https://assets.mycase.com/assets/empty-state/case-docs@2x-1bd175c55fde264b500f413851d6eaa7db795a198b36c2b660f99e45c17baa19.png 2x" src="https://assets.mycase.com/assets/empty-state/case-docs-11b66fd5471ea10e3eb7cb5bed23c19d74e2bce619aa086e18c9a3f7cf8a7ba7.png">
                                <div class="text-container">
                                    <h2>Add your first  document</h2>
                                    <ul>
                                        <li> Securely access and organize all of your documents and take advantage of unlimited file storage, with no restriction on file types. </li>
                                        <li> Stay on the same page with your clients by sharing case documents, storing revision history, adding comments and more. </li>
                                    </ul>
                                </div>
                            </div></div>
                                <div class="col-md-4"></div>
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


<!--    <script>
    $(document).ready(function (){
        var data = [
    { Name: "John" },
    { Name: "Jimmy" },
    { Name: "Tom" },
    { Name: "Frank" },
    { Name: "Peter" }
];
        
        $.ajax({  type: "GET",
                     
                     }).done(function(data) {
                  $("#basicgrid").jsGrid({
                        height : "auto",
                        width : "100%",
                       inserting:true,
                        editing: true,
                        filtering: true,
                        sorting : true,
                        paging : true,
                       autoload : true,
                         pageSize : 10,
        fields : [ { type: "text", name: "Name" },
        { type: "text", name: "New Name" }, { type:"control"	} ],
                   controller: {
                       loadData:  function(filter) {
                          return $.grep(data, function(item) {
                                     // client-side filtering below (be sure conditions are correct)
                             return(!filter.Firstname|| item.Firstname.indexOf(filter.Firstname) > -1) 
                                     && (!filter.Lastname|| item.Lastname.indexOf(filter.Lastname) > -1) 
                  });
                  return data;
                  },
                  
               }
              });
           });
    });    
        
    </script>-->