<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GuardiansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guardians-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'child_admission_id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'relation') ?>

    <?php // echo $form->field($model, 'date_of_birth') ?>

    <?php // echo $form->field($model, 'occupation') ?>

    <?php // echo $form->field($model, 'income') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'office_phone') ?>

    <?php // echo $form->field($model, 'residence_phone') ?>

    <?php // echo $form->field($model, 'mobile_phone') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'office_address_line1') ?>

    <?php // echo $form->field($model, 'office_address_line2') ?>

    <?php // echo $form->field($model, 'office_city') ?>

    <?php // echo $form->field($model, 'office_state') ?>

    <?php // echo $form->field($model, 'office_country_id') ?>

    <?php // echo $form->field($model, 'Residence_address_line1') ?>

    <?php // echo $form->field($model, 'Residence_address_line2') ?>

    <?php // echo $form->field($model, 'Residence_city') ?>

    <?php // echo $form->field($model, 'Residence_state') ?>

    <?php // echo $form->field($model, 'Residence_country_id') ?>

    <?php // echo $form->field($model, 'description') ?>

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
