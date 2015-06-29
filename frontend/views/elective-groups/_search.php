<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ElectiveGroupsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elective-groups-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'group_name') ?>

    <?= $form->field($model, 'parent_type') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'batch_id') ?>

    <?php // echo $form->field($model, 'max_subjects') ?>

    <?php // echo $form->field($model, 'min_subjects') ?>

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
