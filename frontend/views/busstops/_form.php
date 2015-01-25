<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJsFile(Yii::$app->urlManager->baseUrl.'/js/gmaps-busstop.js', ['depends' => 'app\assets\googleMapsAsset']);

/* @var $this yii\web\View */
/* @var $model common\models\Busstops */
/* @var $form yii\bootstrap\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stop_name')->textInput([
        'maxlength' => 255,
        'onkeydown' => "if(event.keyCode == 13) return false;",
    ]) ?>

    <?= $form->field($model, 'lat_coords')->textInput(['readonly' => 'readonly',]) ?>

    <?= $form->field($model, 'lon_coords')->textInput(['readonly' => 'readonly',]) ?>

    <?= $form->field($model, 'distance')->textInput(['readonly' => 'readonly',]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isactive')->textInput(['maxlength' => 255]) ?>

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>
