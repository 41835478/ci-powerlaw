<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\widgets\Alert;
use app\components\NotifyWidget;

AppAsset::register($this);

$session = Yii::$app->session;
$user	=	User::findOne(Yii::$app->user->getId());
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<!-- Global stylesheets -->
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/css.css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/favicon.ico" type="image/ico"/>
    	<!-- /global stylesheets -->
    <style type="text/css">
		 ul.nav li.dropdown:hover ul.dropdown-menu{ display: block; }
		.nav .dropdown-toggle .caret { display:none; }
	</style>

	<!--<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/dashboard.js"></script>
	 /theme JS files -->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/jquery.min.js"></script>
</head>
<body>
<?php $this->beginBody() ?>


	<?php 
		$roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
		foreach($roles as $role)
		{
			if($role->name == 'admin')
			{
				include "header.php";
				include "menu.php";
			}
			else if($role->name == 'attorney')
			{
				include "firm-header.php";
				include "firm-menu.php";
			}
			else if($role->name == 'contact')
			{
				include "firm-header.php";
				include "user-menu.php";
			}
		}
	?>

	<!-- Page header -->
	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4 style="font-size: 16px;">
					<?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
				</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
				<?= $content; ?>
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
<?php $this->endBody() ?>
<script src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/jquery-ui.min.js"></script>	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/form_select2.js"></script>
<!--	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/form_checkboxes_radios.js"></script> -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/app.js"></script>

	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/notifications/pnotify.min.js"></script>

	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/components_notifications_pnotify.js"></script>


	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/notifications/bootbox.min.js"></script>

	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/pages/components_modals.js"></script>

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
	<style type="text/css">
		.ui-pnotify-title{
			text-transform: capitalize;
		}
	</style>
	<?php

	    $alertTypes = [
	        'error'   => 'bg-danger',
	        'danger'  => 'bg-danger',
	        'success' => 'bg-success',
	        'info'    => 'bg-info',
	        'warning' => 'bg-warning'
	    ];

	$session = \Yii::$app->session;
    $flashes = $session->getAllFlashes();

	foreach ($flashes as $type => $data)
	{
		if (isset($alertTypes[$type]))
		{
                $data = (array)$data;

                foreach ($data as $i => $message)
                {
                    echo "
					<script type='text/javascript'>
						$(window).load(function () {
					        new PNotify({
					            title: '". $type ." Message',
					            text: '". $message ."',
					            addclass: 'bg-success'
					        });
					    });
					</script>";
                }

                $session->removeFlash($type);
		}
	}
	?>
</body>
</html>
<?php $this->endPage() ?>
