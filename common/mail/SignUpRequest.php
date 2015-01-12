<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$identifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/signup', 'type' => $requestData->userType, 'token' => $offUser->signup_request_token]);
?>

Hello <?= Html::encode($offUser->first_name) ?>,<br><br>

You have requested to create an account of type <?= $requestData->userType; ?> on <?= Yii::$app->name ?>. Please follow the link below to verify your SID and continue the process:<br>

<?= Html::a(Html::encode($identifyLink), $identifyLink) ?>
