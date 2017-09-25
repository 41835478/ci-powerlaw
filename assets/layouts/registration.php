<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/favicon.ico" type="image/ico"/>
	<!-- /global stylesheets -->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?= Yii::getAlias('@web'); ?>/"><img src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile" style="display:none;">
			<ul class="nav navbar-nav navbar-right" style="display:none;">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<?= $content; ?>
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			&copy; <?= date('Y'); ?>. <a href="#">myPowerLaw</a> All rights reserved.
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/nicescroll.min.js"></script>
	<!--<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/drilldown.js"></script> -->
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>

<!--	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/jasny_bootstrap.min.js"></script> -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/handlebars.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/inputs/passy.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/inputs/maxlength.min.js"></script>


<!--	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/login.js"></script> -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/form_controls_extended.js"></script>
	<!-- /theme JS files -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
