<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use hail812\adminlte3\assets\BaseAsset;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/files/assets';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'files/assets/css/component.css',
        'files/assets/pages/waves/css/waves.min.css',
        'files/assets/icon/feather/css/feather.css',
        'files/assets/css/font-awesome-n.min.css',
        'files/bower_components/chartist/css/chartist.css',
        'files/assets/css/widget.css',
        'files/assets/css/style.css',
    ];
    public $js = [
        'files/bower_components/jquery-ui/js/jquery-ui.min.js',
        'files/bower_components/bootstrap/js/bootstrap.bundle.js',
        'files/bower_components/popper.js/js/popper.min.js',
        'files/assets/pages/waves/js/waves.min.js',
        'files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
        'files/assets/pages/chart/float/jquery.flot.js',
        'files/assets/pages/chart/float/jquery.flot.categories.js',
        'files/assets/pages/chart/float/curvedLines.js',
        'files/assets/pages/chart/float/jquery.flot.tooltip.min.js',
        'files/bower_components/chartist/js/chartist.js',
        'files/assets/pages/widget/amchart/amcharts.js',
        'files/assets/pages/widget/amchart/serial.js',
        'files/assets/pages/widget/amchart/light.js',
        'files/assets/js/pcoded.min.js',
        'files/assets/js/vertical/vertical-layout.min.js',
        'files/assets/pages/dashboard/custom-dashboard.js',
        'files/assets/js/script.min.js',
    ];

    public $depends = [
//        BaseAsset::class
    ];
}
