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

class DatePickerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/datepicker/datepicker.css',
    ];
    public $js = [
        'plugins/datepicker/bootstrap-datepicker.js',
    ];
    public $depends = [
        'app\assets\CoreAsset',
    ];
}