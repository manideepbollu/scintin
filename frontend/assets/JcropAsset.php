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

class JcropAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins\Jcrop\css\jquery.Jcrop.min.css',
    ];
    public $js = [
        'plugins\Jcrop\js\jquery.Jcrop.min.js',
        'js\jcrop-trigger.js',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}