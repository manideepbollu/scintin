<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- B - New Division -->
<div class="row">
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                <h1 style="margin-top: 0px"><?= Html::encode($this->title) ?></h1>
                Please fill in the below fields to signup
            </header>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username', [
                    'inputOptions' => [
                        'placeholder' => 'Enter Username',
                    ],
                ]) ?>

                <?= $form->field($model, 'email', [
                    'inputOptions' => [
                        'placeholder' => 'Enter email',
                    ],
                ]) ?>

                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => 'Enter Password',
                    ],
                ])->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', [
                        'class' => 'btn btn-default',
                        'name' => 'signup-button',
                        'type' => 'submit',
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </section>
    </div>
</div>
