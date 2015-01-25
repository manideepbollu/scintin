<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BusstopsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="busstops-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'stop_name') ?>

    <?= $form->field($model, 'lat_coords') ?>

    <?= $form->field($model, 'lon_coords') ?>

    <?= $form->field($model, 'distance') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
