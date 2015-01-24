<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Guardians */

$this->title = 'Create Guardians';
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['usermanagement/index']];
$this->params['breadcrumbs'][] = ['label' => 'Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guardians-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'task' => 'creation',
    ]) ?>

</div>
