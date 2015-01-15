<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup Request';
/* @var $this->params['login', 'signup'] - Manually introduced variables to toggle "Active class" between
 * login and Signup pages at layout.*/
$this->params = [
    'login' => '',
    'signup' => 'active',
];
?>

<!-- B - New Division -->
<?php $form = ActiveForm::begin([
    'id' => 'form-signup',
    'fieldConfig' => [
    'template' => '{input}<div class="help-block help-block-error main-login-help">{error}</div>',
    ],
]); ?>

<?= $form->field($model, 'userType', [
    'inputOptions' => [
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
])->dropDownList($model->userTypeOptions); ?>

<?= $form->field($model, 'sid', [
    'inputOptions' => [
        'placeholder' => 'Please enter your SID (Admission ID / Employee ID)',
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
]) ?>

<?= Html::submitButton('Submit', [
    'class' => 'btn btn-primary btn-lg btn-block',
    'name' => 'login-button',
    'type' => 'submit',
]) ?>

<?php ActiveForm::end(); ?>
