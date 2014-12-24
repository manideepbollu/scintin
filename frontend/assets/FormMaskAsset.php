<?php
/**
 * Created for Scintin.
 * Date: 11/12/14
 * Time: 3:30 AM
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Bollu <always.bollu@gmail.com>
 */

class FormMaskAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/jquery.maskedinput.min.js',
        'js/form-masks.js',
    ];
    public $depends = [
        'app\assets\CoreAsset',
        'yii\widgets\ActiveFormAsset',
    ];
}