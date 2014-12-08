<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Request password reset';
/* @var $this->params['login', 'signup'] - Manually introduced variables to toggle "Active class" between
 * login and Signup pages at layout.*/
$this->params = [
    'login' => 'active',
    'signup' => '',
];
?>

<!-- New version -->
<p class="text-center mb25">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

<?php $form = ActiveForm::begin([
    'id' => 'request-password-reset-form',
    'fieldConfig' => [
        'template' => '{input}<div class="help-block help-block-error main-login-help">{error}</div>',
    ],
]); ?>

<?= $form->field($model, 'email', [
    'inputOptions' => [
        'placeholder' => 'Email address',
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
]) ?>

<?= Html::submitButton('send', [
    'class' => 'btn btn-primary btn-lg btn-block',
    'name' => 'login-button',
    'type' => 'submit',
]) ?>

<?php ActiveForm::end(); ?>

