<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="/"><img src="themes/ladmin/layouts/assets/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="themes/ladmin/layouts/assets/images/flags/gb.png" class="position-left" alt="">
                    English
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a class="deutsch"><img src="themes/ladmin/layouts/assets/images/flags/de.png" alt=""> Deutsch</a></li>
                    <li><a class="ukrainian"><img src="themes/ladmin/layouts/assets/images/flags/ua.png" alt=""> Українська</a></li>
                    <li><a class="english"><img src="themes/ladmin/layouts/assets/images/flags/gb.png" alt=""> English</a></li>
                    <li><a class="espana"><img src="themes/ladmin/layouts/assets/images/flags/es.png" alt=""> España</a></li>
                    <li><a class="russian"><img src="themes/ladmin/layouts/assets/images/flags/ru.png" alt=""> Русский</a></li>
                </ul>
            </li>

            <?php
            $userinfo = $this->SiteModel->getuserinfobysessionid($_SESSION['user_id']);
            $username = $userinfo->fullname;
            $userimage = $userinfo->Picture;
            ?>
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <?php if (isset($userimage) && $userimage != '') { ?>
                        <img src="<?php echo base_url() ?>upload/user/<?php echo $userimage; ?>" alt="">
                    <?php } else { ?>
                        <img src="<?php echo base_url() ?>upload/user/default_user.png" alt="">
                    <?php } ?>
                    <span><?php
                        if (isset($username)) {
                            echo $username;
                        }
                        ?></span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="<?php echo base_url() ?>accountSettings/<?php echo $_SESSION['user_id']; ?>"><i class="icon-cog5"></i> Account settings</a></li>
                    <li><a href="<?php echo base_url() ?>edituserprofile/<?php echo $_SESSION['user_id']; ?>"><i class="icon-cog5"></i> Update Profile Picture</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url() ?>userlogout/<?php echo base64_encode($_SESSION['user_id']); ?>"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
<style type="text/css">
    ul.nav li.dropdown:hover ul.dropdown-menu{ display: block; }
    .nav .dropdown-toggle .caret { display:none; }
</style>

<!-- Second navbar -->
<div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="<?php echo base_url() ?>lawyerdashboard">
                    <i class="icon-home position-left"></i>
                    Dashboard
                </a>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-calendar position-left"></i>
                    Calendar
                </a>
                <ul class="dropdown-menu">
<!--                    <li><a href="#"><i class="icon-user-lock"></i> Day</a></li>
                    <li><a href="#"><i class="icon-user-lock"></i> Week</a></li>
                    <li><a href="#"><i class="icon-user-lock"></i> Month</a></li>
                    <li><a href="#"><i class="icon-user-lock"></i> Agenda</a></li>-->
                    <li><a href="<?php echo base_url() ?>frontlocation"><i class="icon-user-lock"></i> Locations</a></li>
                </ul>
            </li>

            <?php if ($_SESSION['permissionsession']['events'] != '3') { ?>
                <li>
                    <a href="<?php echo base_url() ?>tasks">
                        <i class="icon-task position-left"></i>
                        Tasks
                    </a>
                </li>
            <?php } ?>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user position-left"></i>
                    Contacts
                </a>
                <ul class="dropdown-menu">
                    <li><a href="contact"><i class="icon-user-lock"></i> Contacts</a></li>
                    <li><a href="company"><i class="icon-statistics"></i> Companies</a></li>
                    <li><a href="contactGroup"><i class="icon-statistics"></i> Contact Groups</a></li>
                </ul>
            </li>
<?php //echo '<pre>'; print_r($_SESSION); ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-dice position-left"></i>
                    Cases
                </a>
                <ul class="dropdown-menu">
                      <?php if ($_SESSION['permissionsession']['cases'] == '1') { ?>
                    <li><a href="cases"><i class="icon-user-lock"></i> Create Case</a></li>
                      <?php } ?>
                    <li><a href="allCases"><i class="icon-user-lock"></i> My Open Casses</a></li>
                    <li><a href="allClosedCases"><i class="icon-statistics"></i> My Closed Cases</a></li>
                     <?php if ($_SESSION['permissionsession']['accessable_case'] == '1') { ?>
                    <li><a href="allFirmOpenCases"><i class="icon-statistics"></i> All Firm Open Cases</a></li>
                    <li><a href="cases/allFirmClosedCases"><i class="icon-statistics"></i> All Firm Closed Cases</a></li>
                     <?php } ?>
                    <li><a href="allPracticeArea"><i class="icon-statistics"></i> Practice Areas</a></li>
                </ul>
            </li>
<?php if ($_SESSION['permissionsession']['documents'] != '3') { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-pencil7 position-left"></i>
                        Documents
                    </a>
                    <ul class="dropdown-menu">
                        <?php if ($_SESSION['permissionsession']['documents'] == '1') { ?>
                        <li><a href="<?php echo base_url() ?>casedoc"><i class="icon-user-lock"></i> Case Documents</a></li>
                        <?php } ?>
                        <li><a href="<?php echo base_url() . 'document/unreaddocument' ?>"><i class="icon-statistics"></i> Unread Case Documents</a></li>
                        <li><a href="<?php echo base_url() . 'document/firmdocument' ?>"><i class="icon-statistics"></i> Firm Documents</a></li>
                        <li><a href="<?php echo base_url() . 'document/template' ?>"><i class="icon-statistics"></i> Templates</a></li>
                    </ul>
                </li>
            <?php } ?>

<?php if ($_SESSION['permissionsession']['billing'] != '3') { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-coins position-left"></i>
                        Billing
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="billing"><i class="icon-user-lock"></i> Billing Dashboard</a></li>
                        <li><a href="billing/timeEntries"><i class="icon-statistics"></i> Time Entries</a></li>
                        <!--<li><a href="#"><i class="icon-statistics"></i> Expenses Head</a></li>-->
                        <li><a href="billing/expense"><i class="icon-statistics"></i> Expenses</a></li>
                        <li><a href="invoices"><i class="icon-statistics"></i> Invoices</a></li>
                        <li><a href="billing/activity"><i class="icon-statistics"></i> Saved Activities</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Account Activity</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Trust Accounting</a></li>
                    </ul>
                </li>

            <?php } ?>

<?php if ($_SESSION['permissionsession']['Reporting'] != '6') { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-book position-left"></i>
                        Reporting
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>timeexptoday"><i class="icon-user-lock"></i> My Time & Expenses Today</a></li>
                        <li><a href="#"><i class="icon-user-lock"></i> My Time & Expenses This Week</a></li>
                        <li><a href="#"><i class="icon-user-lock"></i> My Time & Expenses This Month</a></li>
                        <li><a href="#"><i class="icon-user-lock"></i> Firm Time & Expenses Today</a></li>
                        <li><a href="#"><i class="icon-user-lock"></i> Firm Time & Expenses This Week</a></li>
                        <li><a href="#"><i class="icon-user-lock"></i> Firm Time & Expenses This Month</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Aging Invoices</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Accounts Receivable</a></li>
                    </ul>
                </li>
            <?php } ?>

<?php if ($_SESSION['permissionsession']['messaging'] != '3') { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles7 position-left"></i>
                        Messaging
                    </a>
<!--                    <ul class="dropdown-menu">

                        <li><a href="<?php echo base_url() . 'messageing/inbox' ?>"><i class="icon-user-lock"></i> Inbox</a></li>
                        <li><a href="<?php echo base_url() . 'messageing/compose' ?>"><i class="icon-user-lock"></i> Sent</a></li>
                        <li><a href="<?php echo base_url() . 'messageing/draft' ?>"><i class="icon-user-lock"></i> Draft</a></li>
                        <li><a href="<?php echo base_url() . 'messageing/archived' ?>"><i class="icon-user-lock"></i> Archived</a></li>
                    </ul>-->
                   <ul class="dropdown-menu">
                        <li><a onclick="getmessagetab('inbox')"><i class="icon-user-lock"></i> Inbox</a></li>
                        <li><a onclick="getmessagetab('sent')"><i class="icon-user-lock"></i> Sent</a></li>
                        <li><a onclick="getmessagetab('draft')"><i class="icon-user-lock"></i> Draft</a></li>
                        <li><a onclick="getmessagetab('archive')"><i class="icon-user-lock"></i> Archive</a></li>
                    </ul>
                </li>
            <?php } ?>

<?php if ($_SESSION['permissionsession']['commenting'] != '3') { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4 position-left"></i>
                        Comments
                    </a>
                    <ul class="dropdown-menu">

                        <li><a href="<?php echo base_url() . 'Comment/allcomment' ?>"><i class="icon-user-lock"></i> All Comments</a></li>
                        <li><a href="<?php echo base_url() . 'Comment/unreadcomment' ?>"><i class="icon-user-lock"></i> Unread Comments</a></li>
                    </ul>
                </li>
<?php } ?>


        </ul>

        <ul class="nav navbar-nav navbar-right" style="display: none;">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog3"></i>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /second navbar -->

<script>
    function getmessagetab(tab) {
        if (tab == 'inbox') {
            var url = '<?php echo base_url() ?>messageing/inbox';
            window.location.href = url;
        } else {
            var url = '<?php echo base_url() ?>messageing/inbox#' + tab;
            window.location.href = url;
            location.reload();
        }
    }
</script>