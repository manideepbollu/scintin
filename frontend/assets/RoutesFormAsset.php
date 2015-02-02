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

class RoutesFormAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'plugins/chosen/chosen.jquery.min.js',
        'js/chosen-trigger.js',
    ];
    public $depends = [
        'app\assets\GoogleMapsAsset',
        'app\assets\CoreAsset',
        'yii\widgets\ActiveFormAsset',
    ];
}