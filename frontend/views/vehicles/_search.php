<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VehiclesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vehicle_number') ?>

    <?= $form->field($model, 'vehicle_code') ?>

    <?= $form->field($model, 'vehicle_type') ?>

    <?= $form->field($model, 'vehicle_category') ?>

    <?php // echo $form->field($model, 'date_of_registration') ?>

    <?php // echo $form->field($model, 'expiry_date') ?>

    <?php // echo $form->field($model, 'insurance_renewal_date') ?>

    <?php // echo $form->field($model, 'assigned_driver') ?>

    <?php // echo $form->field($model, 'capacity') ?>

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
