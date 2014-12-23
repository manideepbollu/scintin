<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'admission_id',
            'roll_number',
            'admission_date',
            'student_category',
            'first_name',
            'middle_name',
            'last_name',
            'father_name',
            'mother_name',
            'date_of_birth',
            'gender',
            'marital_status',
            'blood_group',
            'birth_place',
            'nationality_id',
            'language',
            'religion',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'country_id',
            'phone1',
            'phone2',
            'email:email',
            'issms_enabled',
            'photo_file_name',
            'photo_file_type',
            'photo_element_data',
            'description:ntext',
            'isactive',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
