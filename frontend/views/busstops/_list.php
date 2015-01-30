<?php
/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 26/01/15
 * Time: 9:27 AM
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="sc-list">
    <?php $split = explode(',', $model->stop_name, 2); ?>
    <b><?= Html::a($split[0], "javascript:onClickBusStop($model->id, $model->lat_coords, $model->lon_coords)") ?></b><br>
    <?php if(isset($split[1])) echo Html::encode($split[1]).'<br>'; ?>
    <?= 'Distance From School: <b>'.HtmlPurifier::process($model->distance).' kms</b>' ?>
    <p class="mt10 pull-right">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn bordered grey-hover']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn bordered grey-hover',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>