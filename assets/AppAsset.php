<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
    ];
    public $js = [
    	'themes/ladmin/layouts/assets/js/core/libraries/jasny_bootstrap.min.js',
    	'themes/ladmin/layouts/assets/js/plugins/forms/inputs/autosize.min.js',
//    	'themes/ladmin/layouts/assets/js/plugins/forms/inputs/formatter.min.js',
    	'themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js',
    	'themes/ladmin/layouts/assets/js/plugins/forms/inputs/typeahead/handlebars.js',
//    	'themes/ladmin/layouts/assets/js/plugins/forms/inputs/formatter.passy.js',
    	'themes/ladmin/layouts/assets/js/plugins/forms/inputs/maxlength.min.js',
        'themes/ladmin/layouts/assets/js/plugins/ui/moment/moment.min.js',
        'themes/ladmin/layouts/assets/js/plugins/pickers/daterangepicker.js',
        'themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.js',
        'themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.date.js',
        'themes/ladmin/layouts/assets/js/plugins/pickers/pickadate/picker.time.js',
        //'themes/ladmin/layouts/assets/js/plugins/forms/inputs/formatter.passy.js',
        'themes/ladmin/layouts/assets/js/pages/picker_date.js',
    ];
    public $depends = [
/*        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
