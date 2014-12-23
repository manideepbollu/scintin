<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Data';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- New version -->
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">

        <p><?= Html::a('Admit new Student', ['create'], ['class' => 'btn btn-success']) ?></p>

        <div class="table-responsive">
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'admission_id',
                'roll_number',
                'first_name',
                // 'middle_name',
                'last_name',
                'admission_date',
                // 'student_category',
                // 'father_name',
                // 'mother_name',
                'date_of_birth',
                'gender',
                // 'marital_status',
                // 'blood_group',
                // 'birth_place',
                // 'nationality_id',
                // 'language',
                // 'religion',
                // 'address_line1',
                // 'address_line2',
                // 'city',
                // 'state',
                // 'country_id',
                // 'phone1',
                // 'phone2',
                // 'email:email',
                // 'issms_enabled',
                // 'photo_file_name',
                // 'photo_file_type',
                // 'photo_element_data',
                // 'description:ntext',
                'isactive',
                // 'created_at',
                // 'created_by',
                // 'updated_at',
                // 'updated_by',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        </div>
    </div>
</section>
