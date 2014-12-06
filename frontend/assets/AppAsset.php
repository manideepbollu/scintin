<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
        //B Page level plugin styles
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',

        //B Core CSS
        'bootstrap/css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/themify-icons.css',
        'css/animate.min.css',

        //B Template Styles
        'css/skins/palette.css',
        'css/fonts/font.css',
        'css/main.css',
    ];
    public $js = [

        //B Core scripts
        'plugins/jquery-1.11.1.min.js',
        'bootstrap/js/bootstrap.js',
        'plugins/jquery.slimscroll.min.js',
        'plugins/jquery.easing.min.js',
        'plugins/appear/jquery.appear.js',
        'plugins/jquery.placeholder.js',
        'plugins/fastclick.js',

        //B Page level scripts
        'plugins/jquery.blockUI.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'plugins/jquery.sparkline.js',
        'plugins/flot/jquery.flot.js',
        'plugins/flot/jquery.flot.resize.js',
        'plugins/count-to/jquery.countTo.js',

        //B Page script
        'js/dashboard.js',

        //B Template scripts
        'js/offscreen.js',
        'js/main.js',
    ];
    public $depends = [

    ];
}
