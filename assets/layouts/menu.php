
	<!-- Second navbar -->
	<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?= Yii::getAlias('@web'); ?>/">
						<i class="icon-display4 position-left"></i>
						Dashboard
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3 position-left"></i>
						Masters
					</a>

					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/country"><i class="icon-user-lock"></i> Manage Country</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/state"><i class="icon-statistics"></i> Manage State</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/timezones"><i class="icon-statistics"></i> Manage Timezone</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="<?= Yii::getAlias('@web'); ?>/lcadmin/package">
						<i class="icon-cog3 position-left"></i>
						Package Management
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3 position-left"></i>
						User Management
					</a>

					<ul class="dropdown-menu">
						<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/user"><i class="icon-user-lock"></i> Manage User</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/user-group"><i class="icon-statistics"></i> Manage User Group</a></li>
						<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/permission"><i class="icon-statistics"></i> Manage User Permission</a></li>
					</ul>
				</li>

				<li><a href="<?= Yii::getAlias('@web'); ?>/lcadmin/firm"><i class="icon-user-lock"></i> Manage Firm</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-history position-left"></i>
						Changelog
						<span class="label label-inline position-right bg-success-400">1.2.1</span>
					</a>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right">Share</span>
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
