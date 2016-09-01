<?php
/**
 * Created for Scintin.
 * Date: 09/12/14
 * Time: 9:30 PM
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Bollu <always.bollu@gmail.com>
 */

class CountToAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/count-to/jquery.countTo.js',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}