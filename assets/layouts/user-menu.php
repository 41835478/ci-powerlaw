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

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-pencil7 position-left"></i>
						Documents
					</a>
				</li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-coins position-left"></i>
						Billing
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/cases"><i class="icon-user-lock"></i> Billing Dashboard</a></li>
						<li><a href="#"><i class="icon-statistics"></i> All Invoices</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Unpaid Invoices</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Paid Invoices</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Overdue Invoices</a></li>
						<li><a href="#"><i class="icon-statistics"></i> Forwarded Invoices</a></li>
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
