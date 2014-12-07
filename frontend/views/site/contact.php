<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

<!-- B - New Division -->
<div class="row">
    <div class="col-lg-8">
        <?php if (Yii::$app->session->hasFlash('success')): ?>

            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>

        <?php elseif (Yii::$app->session->hasFlash('error')): ?>

            <div class="alert alert-warning">
                There was an internal problem while processing your request. Please try again later.
            </div>

        <?php else: ?>
        <section class="panel">
            <header class="panel-heading">
                <h1 style="margin-top: 0px"><?= Html::encode($this->title) ?></h1>
                If you have business inquiries or other questions, please fill out the following form to contact us.
            </header>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                ]); ?>

                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject') ?>
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-5">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', [
                        'class' => 'btn btn-primary',
                        'name' => 'login-button',
                        'type' => 'submit',
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </section>
        <?php endif; ?>
    </div>
</div>
