<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = 'Create Students';
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['user-management/index']];
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Begin flash messages if any -->
<?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    echo '<div class="alert alert-'. $key .'">' . $message . '</div>';
}
?>
<!-- End flash messages -->

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'task' => 'admission',
    ]) ?>
