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
					<a href="#">
						<i class="icon-home position-left"></i>
						Dashboard
					</a>
				</li>


				<li class="dropdown">
					<a href="#">
						<i class="icon-calendar position-left"></i>
						Calendar
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user-lock"></i> Day</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Week</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Month</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Agenda</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Locations</a></li>
					</ul>
				</li>

				<li>
					<a href="#">
						<i class="icon-task position-left"></i>
						Tasks
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-user position-left"></i>
						Contacts
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/contact"><i class="icon-user-lock"></i> Contacts</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/company"><i class="icon-statistics"></i> Companies</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/contact-group"><i class="icon-statistics"></i> Contact Groups</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-dice position-left"></i>
						Cases
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/cases/create"><i class="icon-user-lock"></i> Create Case</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/cases"><i class="icon-user-lock"></i> My Open Casses</a></li>
						<li><a href="#"><i class="icon-statistics"></i> My Closed Cases</a></li>
						<li><a href="#"><i class="icon-statistics"></i> All Firm Open Cases</a></li>
						<li><a href="#"><i class="icon-statistics"></i> All Firm Closed Cases</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Pratice Areas</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-pencil7 position-left"></i>
						Documents
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/cases"><i class="icon-user-lock"></i> Case Documents</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Unread Case Documents</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Firm Documents</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Templates</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-coins position-left"></i>
						Billing
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/cases"><i class="icon-user-lock"></i> Billing Dashboard</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Time Entries</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Expenses Head</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Expenses</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Invoices</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Saved Activities</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Account Activity</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Trust Accounting</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-book position-left"></i>
						Reporting
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user-lock"></i> My Time & Expenses Today</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> My Time & Expenses This Week</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> My Time & Expenses This Month</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Firm Time & Expenses Today</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Firm Time & Expenses This Week</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Firm Time & Expenses This Month</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Aging Invoices</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Accounts Receivable</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles7 position-left"></i>
						Messaging
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user-lock"></i> Inbox</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Sent</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Draft</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Archived</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4 position-left"></i>
						Comments
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user-lock"></i> All Comments</a></li>
						<li><a href="#"><i class="icon-user-lock"></i> Unread Comments</a></li>
					</ul>
				</li>



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
