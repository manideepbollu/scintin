<?php
/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 23/12/14
 * Time: 8:40 AM
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Bollu <always.bollu@gmail.com>
 */

class FormWizardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/fuelux/wizard.js',
        'js/form-wizard.js',
        'js/employees-module.js'
    ];
    public $depends = [
        'app\assets\CoreAsset',
        'yii\widgets\ActiveFormAsset',
    ];
}