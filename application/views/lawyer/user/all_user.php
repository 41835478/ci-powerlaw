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


                    <!-- Task navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-title">
                            <span>My Profile</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">
                                <li><a href="lawyeradmin/accountSettings"><i class="icon-googleplus5"></i> <span>Contact Information</span></a></li>
                                <li><a href="lawyeradmin/accountNotification"><i class="icon-compose"></i> <span>Notifications</span></a></li>
                                <li><a href="lawyeradmin/accountPicture"><i class="icon-user-plus"></i> <span>Profile Picture</span></a></li>
                                <li><a href="lawyeradmin/changePassword"><i class="icon-collaboration"></i> <span>Change Password</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /task navigation -->


                    <!-- Task navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-title category-collapsed">
                            <span>Custom Fields</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding" style="display: none;">
                            <ul class="navigation navigation-main navigation-accordion">
                                <li><a href="#"><i class="icon-googleplus5"></i> <span>Cases/ Matters</span></a></li>
                                <li><a href="#"><i class="icon-portfolio"></i> <span>Contacts</span></a></li>
                                <li><a href="#"><i class="icon-compose"></i> <span>Companies</span></a></li>
                                <li><a href="#"><i class="icon-user-plus"></i> <span>Time & Expenses</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /task navigation -->


                    <!-- Task navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-title category-collapsed">
                            <span>Firm Settings</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding" style="display: none;">
                            <ul class="navigation navigation-main navigation-accordion">
                                <li><a href="lawyeradmin/firmSettings"><i class="icon-googleplus5"></i> <span>Firm Contact Information</span></a></li>
                                <li><a href="lawyeradmin/firmPreferences"><i class="icon-portfolio"></i> <span>Firm Preferences</span></a></li>
                                <li><a href="lawyeradmin/firmNotification"><i class="icon-portfolio"></i> <span>Firm Notifications</span></a></li>
                                <!--
                                <li><a href="#"><i class="icon-compose"></i> <span>Setup Online Payments</span></a></li>
                                <li><a href="#"><i class="icon-user-plus"></i> <span>My Payment Information</span></a></li>
                                -->
                            </ul>
                        </div>
                    </div>
                    <!-- /task navigation -->

                    <!-- Task navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-title category-collapsed">
                            <span>Firm Users</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding" style="display: none;">
                            <ul class="navigation navigation-main navigation-accordion">
                                <li><a href="user"><i class="icon-users"></i> <span>Attorney & Staff</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /task navigation -->



                    <!-- Task navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-title category-collapsed">
                            <span>Import/ Export</span>
                            <ul class="icons-list">
                                <li><a href="#" data-action="collapse"></a></li>
                            </ul>
                        </div>

                        <div class="category-content no-padding" style="display: none;">
                            <ul class="navigation navigation-main navigation-accordion">
                                <li><a href="#"><i class="icon-user-plus"></i> <span>Contacts & Companies</span></a></li>
                                <li><a href="#"><i class="icon-user-plus"></i> <span>Cases/ Matters</span></a></li>
                                <li><a href="#"><i class="icon-user-plus"></i> <span>Full Backup</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /task navigation -->


                </div>
            </div>
        </div>      <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Main charts -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Users</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li>
                                        <a href="user/addUser"><span class="label label-success label-icon"><i class="glyphicon glyphicon-plus"></i></span></a>                                </li>
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
                            <div id="w0" class="grid-view">
                                <table class="table table-striped table-bordered"><thead>
                                        <tr><th><a href="/user/index?sort=status" data-sort="status">User Name</a></th><th><a href="/user/index?sort=FirstName" data-sort="FirstName">Full Name</a></th><th><a href="/user/index?sort=id" data-sort="id">User Group</a></th><th><a href="/user/index?sort=email" data-sort="email">Email</a></th><th class="action-column">&nbsp;</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr data-key="98"><td>mikelaw</td><td>Mike Jones</td><td>attorney</td><td><a href="mailto:mikej@mypowerlaw.com">mikej@mypowerlaw.com</a></td><td><a href="/user/view?id=98" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="/user/update?id=98" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> <a href="/user/delete?id=98" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a></td></tr>
                                    </tbody></table>
                            </div>              </div>
                    </div>


                </div>

            </div>
            <!-- /main charts -->


        </div>
        <!-- /main content -->
    </div>
</div>















<style>
    td{
        padding:15px !important;
    }
</style>			</div>
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