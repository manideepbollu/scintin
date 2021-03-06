<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerAssetBundle('app\assets\UserManagementAsset');

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'labelOptions' => [
            'class' => 'col-md-2 control-label',
        ],
        'template' => '{label}<div class="col-md-8">{input}</div>{error}'
    ],
]); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

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
                    <input type="checkbox" class="checkbox-'. $permissionElement .'">
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
                    <input type="checkbox" class="checkbox-'. $permissionElement .'">
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
        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-course" class="checkbox-'. $permissionElement .'">
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
        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-batch" class="checkbox-'. $permissionElement .'">
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
        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-subject" class="checkbox-'. $permissionElement .'">
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
        echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="'. $permissionElement .'-electivegroup" class="checkbox-'. $permissionElement .'">
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

<div class="form-group">
        <p>
            <?= Html::submitButton('Create', [
                'class' => 'btn btn-primary pull-right mr25 ml5',
                'type' => 'submit',
            ]) ?>
            <?= Html::a('+ Copy from an existing role', 'javascript:;', ['class' => 'btn btn-default pull-right']) ?>
        </p>
</div>

<?php ActiveForm::end(); ?>
