<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $employeeModel common\models\Employees */

$this->title = $employeeModel->first_name;
$this->params['breadcrumbs'][] = ['label' => 'User Management', 'url' => ['usermanagement/index']];
$this->params['breadcrumbs'][] = ['label' => 'Drivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <section class="panel no-b">
            <div class="panel-body p25">
                <div class="col-md-3">
                    <?php if($employeeModel->photo_file_name) {
                        $employeeModel->imgPath = Yii::$app->urlManager->createUrl(['employees/load-image', 'id' => $employeeModel->id]);
                    }
                    else
                        $employeeModel->imgPath = Yii::$app->urlManager->baseUrl.'/img/default_'.$employeeModel->gender.'.jpg';
                    ?>
                    <a href="javascript:;" class="show text-center">
                        <img src="<?= $employeeModel->imgPath  ?>" class="avatar avatar-lg img-circle" alt="">
                    </a>

                    <div class="show mt15 text-center">
                        <div class="h5"><b><?= $employeeModel->first_name .' '. $employeeModel->middle_name .' '. $employeeModel->last_name ?></b>
                        </div>
                        <p class="mb25">Adm ID: <b><?= $employeeModel->employee_id ?></b></p>
                    </div>
                </div>
                <div class="col-md-6 table-responsive text-center">
                    <table class="table">
                        <tr>
                            <td class="no-b">Batch:</td><td class="no-b">Grade 7 A 2014</td>
                        </tr>
                        <tr>
                            <td>Age:</td><td>24 (DOB: <?= $employeeModel->date_of_birth ?> )</td>
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
                        <?= Html::a('Delete', ['delete', 'id' => $employeeModel->id], [
                            'class' => 'btn btn-danger pull-right',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('Update', ['update', 'id' => $employeeModel->id], ['class' => 'btn btn-primary pull-right mr10']) ?>
                    </p>
                </div>

            </div>
            <div class="col-md-12 bg-white">
                <h2 class="mt5">More details</h2>
                <div class="table-responsive">
                    <?= DetailView::widget([
                        'model' => $employeeModel,
                        'options' => [
                            'class' => 'table col-md-6 view-table'
                        ],
                        'attributes' => [
                            // 'id',
                            'employee_id',
                            'joining_date',
                            'employee_category',
                            'first_name',
                            'middle_name',
                            'last_name',
                            'job_title',
                            'employee_position_id',
                            'employee_department_id',
                            'reporting_manager_id',
                            'employee_grade_id',
                            'qualification',
                            'experience_details:ntext',
                            'experience_years',
                            'experience_months',
                            'father_name',
                            'mother_name',
                            'spouse_name',
                            'date_of_birth',
                            'gender',
                            'marital_status',
                            'children_count',
                            'blood_group',
                            'birth_place',
                            'nationality_id',
                            'language',
                            'religion',
                            'present_address_line1',
                            'present_address_line2',
                            'present_city',
                            'present_state',
                            'present_country_id',
                            'present_phone1',
                            'present_phone2',
                            'present_mobile',
                            'email:email',
                            'fax',
                            'permanent_address_line1',
                            'permanent_address_line2',
                            'permanent_city',
                            'permanent_state',
                            'permanent_country_id',
                            'permanent_phone1',
                            'permanent_phone2',
                            'description:ntext',
                            'isactive',
                            'created_at',
                            'createdBy.username',
                            'updated_at',
                            'updatedBy.username',
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="col-md-12 bg-white">
                <h2 class="mt5">Additional driver details</h2>
                <div class="table-responsive">
                    <?= DetailView::widget([
                        'model' => $driverAdditionalDetailsModel,
                        'options' => [
                            'class' => 'table col-md-6 view-table'
                        ],
                        'template' => "<tr><th class='col-xs-5 col-md-3'>{label}</th><td>{value}</td></tr>",
                        'attributes' => [
                            'licence_number',
                            'licence_issue_date',
                            'licence_renewal_date',
                            'insurance_number',
                            'insurance_issue_date',
                            'insurance_renewal_date',
                            //'created_at',
                            //'created_by',
                            //'updated_at',
                            //'updated_by',
                        ],
                    ]) ?>
                </div>
            </div>
        </section>
    </div>
</div>
