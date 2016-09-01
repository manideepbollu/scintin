<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerAssetBundle('app\assets\UserManagementAsset');

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */

$session = Yii::$app->session;
$session->remove('model');
$session->remove('role');
$session->set('model', $model);
$session->set('role', $model->name);
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

<?= $form->field($model, 'name')->textInput([
    'maxlength' => 64,
    'disabled' => 'true',
]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<!-- Begin - Permission allocation table -->
<div class="row" id="permission-table">
<?= $this->render('_permissiontable'); ?>
</div>
<!-- Ends - Permission allocation table -->

<div class="form-group">
    <p>
        <?= Html::submitButton('Update', [
            'class' => 'btn btn-primary pull-right mr25 ml5',
            'type' => 'submit',
        ]) ?>
        <?= Html::a('+ Copy from an existing role', 'javascript:;', [
            'class' => 'btn btn-default pull-right',
            'id' => 'copy-button',
        ]) ?>
    </p>
</div>

<?php ActiveForm::end(); ?>
