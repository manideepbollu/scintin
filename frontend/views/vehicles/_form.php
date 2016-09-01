<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vehicles */
/* @var $form yii\widgets\ActiveForm */

$this->registerAssetBundle('app\assets\DatePickerAsset');
?>

<!-- New version -->

<!-- Form -->
<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'labelOptions' => [
            'class' => 'col-md-2 control-label',
        ],
        'template' => '{label}<div class="col-md-8">{input}</div>{error}',
    ],
]); ?>

    <?= $form->field($model, 'vehicle_number')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'vehicle_code')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'vehicle_type')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'vehicle_category')->textInput() ?>

    <?= $form->field($model, 'date_of_registration', [
        'inputOptions' => [
            'class' => 'form-control datepicker',
        ],
    ])->textInput() ?>

    <?= $form->field($model, 'expiry_date', [
        'inputOptions' => [
            'class' => 'form-control datepicker',
        ],
    ])->textInput() ?>

    <?= $form->field($model, 'insurance_renewal_date', [
        'inputOptions' => [
            'class' => 'form-control datepicker',
        ],
    ])->textInput() ?>

    <?= $form->field($model, 'assigned_driver')->textInput() ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isactive')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <div class="col-md-2 control-label"></div>
        <div class="col-md-8">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', [
                'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                'type' => 'submit',
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

