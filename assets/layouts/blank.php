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
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/css/colors.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/favicon.ico" type="image/ico"/>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="<?= Yii::getAlias('@web'); ?>/themes/ladmin/layouts/assets/js/core/app.js"></script>
	<!-- /theme JS files -->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

				<!-- Simple login form -->
				<?= $content; ?>
				<!-- /simple login form -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
