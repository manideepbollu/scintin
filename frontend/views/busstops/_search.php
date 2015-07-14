<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BusstopsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="busstops-search">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => '{input}',
        ],
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="input-group mb15">
    <?= $form->field($model, 'stop_name')->textInput([
        'class' => 'form-control',
        'placeholder' => 'Search for specific Bus Stops',
    ]) ?>
        <span class="input-group-btn">
                <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-default bordered grey-hover']) ?>
            </span>
    </div>

    <?php ActiveForm::end(); ?>

</div>
