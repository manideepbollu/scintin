<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//AssetBundle specific to RouteStop selection is loaded
$this->registerAssetBundle('app\assets\RoutesFormAsset');
$this->registerCssFile('plugins\chosen\chosen.min.css');
$this->registerJsFile(Yii::$app->urlManager->baseUrl.'/js/gmaps-routes.js', ['depends' => 'app\assets\googleMapsAsset']);
$this->registerJs("
    var jsonDataUrl = '".Yii::$app->urlManager->createUrl('busstops/point-json-data')."';
    var schoolIcon = '".Yii::$app->urlManager->baseUrl."/img/university.png';
    var subscribeButton = '".Html::a('Subscribe', 'javascript:;', ['class' => 'btn btn-primary'])."'
    ", \yii\web\View::POS_HEAD, 'declare Javascript Variables');
if(!$model->isNewRecord)
    $this->registerJs("var stopId = $model->id", \yii\web\View::POS_HEAD, 'declare stopId Variable');

/* @var $this yii\web\View */
/* @var $model common\models\Routes */
/* @var $form yii\bootstrap\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'destination_id')->dropDownList(\common\models\Busstops::getSpecificBusstops(['isactive' => 'Active']), [
        'data-placeholder' => 'Your Favorite Football Team',
        'id' => 'destination-select',
        'class' => 'chosen chosen-field-width',
    ]) ?>

    <?= $form->field($model, 'stops')->listBox(\common\models\Busstops::getSpecificBusstops(['isactive' => 'Active']), [
        'class' => 'chosen chosen-field-width',
        'id' => 'stops-multiselect',
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