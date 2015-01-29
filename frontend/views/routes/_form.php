<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//AssetBundle specific to RouteStop selection is loaded
$this->registerAssetBundle('app\assets\RoutesFormAsset');
$this->registerCssFile('plugins\chosen\chosen.min.css');

/* @var $this yii\web\View */
/* @var $model common\models\Routes */
/* @var $form yii\bootstrap\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'labelOptions' => [
                    'class' => 'col-md-2 control-label',
                    ],
                    'template' => '{label}<div class="col-md-8">{input}</div>{error}',
                ],
            ]); ?>

    <?= $form->field($model, 'route_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'destination_id')->dropDownList(\common\models\Busstops::getSpecificBusstops(['isactive' => 'Active']), [
        'data-placeholder' => 'Your Favorite Football Team',
    'class' => 'chosen',
    'style' => 'width: 100%',
    ]) ?>

    <?= $form->field($model, 'stops')->listBox(\common\models\Busstops::getSpecificBusstops(['isactive' => 'Active']), [
    'class' => 'chosen',
    'style' => 'width: 100%',
    'multiple' => 'multiple',
    ]); ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isactive')->textInput(['maxlength' => 255]) ?>

<div class="form-group">
    <div class="col-md-2 control-label"></div>
    <div class="col-md-8">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>