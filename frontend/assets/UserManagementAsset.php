<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 19/12/14
 * Time: 6:26 PM
 */

class UserManagementAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/icheck/icheck.js',
        'js/role-management.js',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}