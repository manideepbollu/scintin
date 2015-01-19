<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->registerAssetBundle('app\assets\UserManagementAsset');

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */

$rbac = Yii::$app->authManager;
$role = $rbac->getRole($model->name);

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel panel-default">
    <div class="panel-heading">
        <h1 class="no-m"><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="panel-body">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->name], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    <?= DetailView::widget([
        'model' => $model,
        'template' => "<tr><th class='col-xs-5 col-md-3'>{label}</th><td>{value}</td></tr>",
        'attributes' => [
            'name',
            'description:ntext',
            'created_at',
            'updated_at',
            'createdBy.username',
            'updatedBy.username',
        ],
    ]) ?>

    </div>

    <!-- Begin - Permission allocation table -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel no-b">
                <div class="panel-heading">
                    <h4 class="mb0">Permission <b>Assignment</b></h4>
                </div>
                <div class="panel-body" style="overflow: hidden">
                    <div class="table-responsive">
                        <table class="table no-m">
                            <thead>
                            <tr>
                                <th>Entity
                                </td>
                                <th class="text-center">Create
                                </td>
                                <th class="text-center">View
                                </td>
                                <th class="text-center">View Own
                                </td>
                                <th class="text-center">Update
                                </td>
                                <th class="text-center">Update Own
                                </td>
                                <th class="text-center">Delete
                                </td>
                                <th class="text-center">Delete Own
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Academics begins -->
                            <!-- Academics main parent -->
                            <tr id="academics" data-fill="js-determined">
                                <td>
                                    <a class="treehead mr5 fa fa-caret-right" href="javascript:;"></a>
                                    <label class="control-label">Academics</label>
                                </td>
                                <?php
                                foreach($model->permissionElements as $permissionElement){
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" class="checkbox-'. $permissionElement .'" disabled>
                </div>
            </td>';
                                }
                                ?>
                            </tr>
                            <!-- |- Academics children -->
                            <tr class="academics-child" id="courses-overview" data-fill="js-determined" hidden="hidden">
                                <td>
                                    <span class="mr20"></span>
                                    <a class="treehead mr5 fa fa-caret-right" href="javascript:;"></a>
                                    <label class="control-label">Courses Overview</label>
                                </td>
                                <?php
                                foreach($model->permissionElements as $permissionElement){
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" class="checkbox-'. $permissionElement .'" disabled>
                </div>
            </td>';
                                }
                                ?>
                            </tr>
                            <!-- |- |- Courses children -->
                            <tr class="academics-child courses-overview-child" hidden="hidden">
                                <td>
                                    <span class="mr25 ml25"></span>
                                    <label class="control-label">Courses</label>
                                </td>
                                <?php
                                foreach($model->permissionElements as $permissionElement){
                                    if($rbac->hasChild($role,$rbac->getPermission($permissionElement.'-course')))
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-course" class="checkbox-'. $permissionElement .'" checked disabled>
                </div>
            </td>';
                                    else
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-course" class="checkbox-'. $permissionElement .'" disabled>
                </div>
            </td>';

                                }
                                ?>
                            </tr>
                            <tr class="academics-child courses-overview-child" hidden="hidden">
                                <td>
                                    <span class="mr25 ml25"></span>
                                    <label class="control-label">Batches</label>
                                </td>
                                <?php
                                foreach($model->permissionElements as $permissionElement){
                                    if($rbac->hasChild($role,$rbac->getPermission($permissionElement.'-batch')))
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-batch" class="checkbox-'. $permissionElement .'" checked disabled>
                </div>
            </td>';
                                    else
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-batch" class="checkbox-'. $permissionElement .'" disabled>
                </div>
            </td>';

                                }
                                ?>
                            </tr>
                            <tr class="academics-child courses-overview-child" hidden="hidden">
                                <td>
                                    <span class="mr25 ml25"></span>
                                    <label class="control-label">Subjects</label>
                                </td>
                                <?php
                                foreach($model->permissionElements as $permissionElement){
                                    if($rbac->hasChild($role,$rbac->getPermission($permissionElement.'-subject')))
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-subject" class="checkbox-'. $permissionElement .'" checked disabled>
                </div>
            </td>';
                                    else
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-subject" class="checkbox-'. $permissionElement .'" disabled>
                </div>
            </td>';

                                }
                                ?>
                            </tr>
                            <tr class="academics-child courses-overview-child" hidden="hidden">
                                <td>
                                    <span class="mr25 ml25"></span>
                                    <label class="control-label">Elective groups</label>
                                </td>
                                <?php
                                foreach($model->permissionElements as $permissionElement){
                                    if($rbac->hasChild($role,$rbac->getPermission($permissionElement.'-electivegroup')))
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-electivegroup" class="checkbox-'. $permissionElement .'" checked disabled>
                </div>
            </td>';
                                    else
                                        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-electivegroup" class="checkbox-'. $permissionElement .'" disabled>
                </div>
            </td>';
                                }
                                ?>
                            </tr>
                            <!-- |- |- End of Courses children -->
                            <!-- Academics ends -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Ends - Permission allocation table -->
</section>
