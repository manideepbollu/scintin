<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- B - New Division -->
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                <h1 style="margin-top: 0px"><?= Html::encode($this->title) ?></h1>
                Please help us validate your credentials
            </header>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'default',
                ]); ?>

                <?= $form->field($model, 'username', [
                    'inputOptions' => [
                        'placeholder' => 'Enter Username',
                    ],
                ]) ?>

                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => 'Enter Password',
                    ],])->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', [
                        'class' => 'btn btn-default',
                        'name' => 'login-button',
                        'type' => 'submit',
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </section>
    </div>
</div>