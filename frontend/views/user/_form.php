<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'labelOptions' => [
            'class' => 'col-md-2 control-label',
        ],
        'template' => '{label}<div class="col-md-8">{input}</div>{error}'
    ],
]); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'sid')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'user_role')->dropDownList(\common\models\AuthItem::getAllRoles()); ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

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