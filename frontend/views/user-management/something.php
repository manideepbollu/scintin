<?php

$this->registerAssetBundle('app\assets\UserManagementAsset');

$this->title = 'Role Management';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Begin - Role allocation table -->
<div class="row">
<div class="col-lg-12">
<section class="panel no-b">
<div class="panel-heading no-b">
    <h5>Basic <b>Table</b></h5>
</div>

<div class="panel-body" style="overflow: hidden">
<form>
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
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<!-- |- Academics children -->
<tr class="academics-child" id="courses-overview" data-fill="js-determined" hidden="hidden">
    <td>
        <span class="mr20"></span>
        <a class="treehead mr5 fa fa-caret-right" href="javascript:;"></a>
        <label class="control-label">Courses Overview</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<!-- |- |- Courses children -->
<tr class="academics-child courses-overview-child" hidden="hidden">
    <td>
        <span class="mr25 ml25"></span>
        <label class="control-label">Courses</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create" checked>
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<tr class="academics-child courses-overview-child" hidden="hidden">
    <td>
        <span class="mr25 ml25"></span>
        <label class="control-label">Batches</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create" checked>
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<tr class="academics-child courses-overview-child" hidden="hidden">
    <td>
        <span class="mr25 ml25"></span>
        <label class="control-label">Subjects</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create" checked>
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update" checked>
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<tr class="academics-child courses-overview-child" hidden="hidden">
    <td>
        <span class="mr25 ml25"></span>
        <label class="control-label">Elective groups</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create" checked>
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<!-- |- |- End of Courses children -->
<tr class="academics-child" id="attendance" hidden="hidden">
    <td>
        <span class="mr20"></span>
        <label class="control-label">Attendance</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create" checked>
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<!-- Academics begins -->
<!-- Transport begins -->
<!-- Transport main Parent -->
<tr id="transport" data-fill="js-determined">
    <td>
        <a class="treehead mr5 fa fa-caret-right" href="javascript:;"></a>
        <label class="control-label">Transport</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<!-- |- Transport children -->
<tr class="transport-child" hidden="hidden">
    <td>
        <span class="mr20"></span>
        <label class="control-label">Vehicles</label>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-create">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-view-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-update-own">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete">
        </div>
    </td>
    <td class="text-center">
        <div class="icheck">
            <input type="checkbox" class="checkbox-delete-own">
        </div>
    </td>
</tr>
<!-- End of Transport children -->
<!-- Transport ends -->
</tbody>
</table>
</div>
</form>
</div>
</section>
</div>
</div>
<!-- Ends - Role allocation table -->