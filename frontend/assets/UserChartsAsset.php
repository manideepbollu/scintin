<?php
/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 22/12/14
 * Time: 1:15 PM
 */
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Bollu <always.bollu@gmail.com>
 */

class UserChartsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/flot/jquery.flot.js',
        'plugins/flot/jquery.flot.pie.js',
        'plugins/easy-pie-chart/jquery.easypiechart.js',
        'js/user-charts.js',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}