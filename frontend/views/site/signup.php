<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
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

<?= $form->field($model, 'username', [
    'inputOptions' => [
        'placeholder' => 'Choose a username',
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
]) ?>

<?= $form->field($model, 'email', [
    'inputOptions' => [
        'placeholder' => 'Enter your email',
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
]) ?>

<?= $form->field($model, 'password', [
    'inputOptions' => [
        'placeholder' => 'Choose a Password',
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
])->passwordInput() ?>

<?= $form->field($model, 'password_repeat', [
    'inputOptions' => [
        'placeholder' => 'Repeat your Password',
        'class' => 'form-control input-lg mb25 mb25-scintin',
    ],
])->passwordInput() ?>

<?= Html::submitButton('Login', [
    'class' => 'btn btn-primary btn-lg btn-block',
    'name' => 'login-button',
    'type' => 'submit',
]) ?>

<?php ActiveForm::end(); ?>
