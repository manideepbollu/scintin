<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 19/12/14
 * Time: 6:26 PM
 */

class GoogleMapsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'http://maps.googleapis.com/maps/api/js?key=AIzaSyBe3EOEPeo1SIBz9wVoTryWab8pd88KiD0&libraries=places,geometry',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}