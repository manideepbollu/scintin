<?php
/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 22/12/14
 * Time: 1:12 PM
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Bollu <always.bollu@gmail.com>
 */

class FlatIconsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/flaticons/flaticon.css',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}