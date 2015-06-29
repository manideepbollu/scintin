<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Students */

$this->title = $model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['user-management/index']];
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">


</div>

<div class="row">
    <div class="col-lg-12">
        <section class="panel no-b">
            <div class="panel-body p25">
                <div class="col-md-3">
                    <?php if($model->photo_file_name) {
                        $model->imgPath = Yii::$app->urlManager->createUrl(['students/load-image', 'id' => $model->id]);
                    }
                    else
                        $model->imgPath = Yii::$app->urlManager->baseUrl.'/img/default_'.$model->gender.'.jpg';
                    ?>
                    <a href="javascript:;" class="show text-center">
                        <img src="<?= $model->imgPath  ?>" class="avatar avatar-lg img-circle" alt="">
                    </a>

                    <div class="show mt15 text-center">
                        <div class="h5"><b><?= $model->first_name .' '. $model->middle_name .' '. $model->last_name ?></b>
                        </div>
                        <p class="mb25">Adm ID: <b><?= $model->admission_id ?></b></p>
                    </div>
                </div>
                <div class="col-md-6 table-responsive text-center">
                    <table class="table">
                        <tr>
                            <td class="no-b">Batch:</td><td class="no-b">Grade 7 A 2014</td>
                        </tr>
                        <tr>
                            <td>Age:</td><td>24 (DOB: <?= $model->date_of_birth ?> )</td>
                        </tr>
                        <tr>
                            <td>Category:</td><td>SC / ST</td>
                        </tr>
                        <tr>
                            <td>Transport:</td><td>Not subscribed</td>
                        </tr>
                        <tr>
                            <td>Hostel:</td><td>Not subscribed</td>
                        </tr>
                    </table>
                    <label class="bg-default p5 b-radius5 ml10 mb10 pull-left"><i class="fa fa-check"></i> Enrolled on <b>Scintin</b></label>
                    <label class="bg-default p5 b-radius5 ml10 mb10 pull-left"><i class="fa fa-check"></i> No Fee <b>Dues</b></label>
                </div>
                <div class="col-md-3 pull-right">
                    <p>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger pull-right',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary pull-right mr10']) ?>
                    </p>
                </div>

            </div>
            <div class="col-md-12 bg-white">
                <h2 class="mt5">More details</h2>
                <div class="table-responsive">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => [
                            'class' => 'table col-md-6 view-table'
                        ],
                        'attributes' => [
                            'roll_number',
                            'admission_date',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'isactive',
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
                            'description:ntext',
                            'created_at',
                            'createdBy.username',
                            'updated_at',
                            'updatedBy.username',
                        ],
                    ]) ?>
                </div>
            </div>
        </section>
    </div>
</div>
