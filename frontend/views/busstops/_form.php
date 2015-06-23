<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerJsFile(Yii::$app->urlManager->baseUrl.'/js/gmaps-busstop.js', ['depends' => 'app\assets\googleMapsAsset']);
$this->registerJs("
    var jsonDataUrl = '".Yii::$app->urlManager->createUrl('busstops/json-data')."';
    var schoolIcon = '".Yii::$app->urlManager->baseUrl."/img/university.png';
    ", \yii\web\View::POS_HEAD, 'declare Javascript Variables');
if(!$model->isNewRecord)
    $this->registerJs("var stopId = $model->id", \yii\web\View::POS_HEAD, 'declare stopId Variable');

/* @var $this yii\web\View */
/* @var $model common\models\Busstops */
/* @var $form yii\bootstrap\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stop_name')->textInput([
        'maxlength' => 255,
        'onkeydown' => "if(event.keyCode == 13) return false;",
    ]) ?>

    <?= $form->field($model, 'stop_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'lat_coords')->textInput(['readonly' => 'readonly',]) ?>

    <?= $form->field($model, 'lon_coords')->textInput(['readonly' => 'readonly',]) ?>

    <?= $form->field($model, 'distance')->textInput(['readonly' => 'readonly',]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isactive')->dropDownList($model->statusOptions); ?>

<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

    <?php ActiveForm::end(); ?>
