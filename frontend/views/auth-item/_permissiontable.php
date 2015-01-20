<?php
/**
 * Created by PhpStorm.
 * User: alwaysbollu
 * Date: 14/01/15
 * Time: 2:23 PM
 */

$session = Yii::$app->session;
$rbac = Yii::$app->authManager;
$role = $rbac->getRole($session->get('role'));
$model = $session->get('model');

if($role && $model)
{
    $session->remove('model');
    $session->remove('role');
?>
    <!-- Begin - Permission allocation table -->
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
                            foreach ($model->permissionElements as $permissionElement) {
                                echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" class="checkbox-' . $permissionElement . '">
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
                            foreach ($model->permissionElements as $permissionElement) {
                                echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" class="checkbox-' . $permissionElement . '">
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
                            foreach ($model->permissionElements as $permissionElement) {
                                if ($rbac->hasChild($role, $rbac->getPermission($permissionElement . '-course')))
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-course" class="checkbox-' . $permissionElement . '" checked>
                </div>
            </td>';
                                else
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-course" class="checkbox-' . $permissionElement . '">
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
                            foreach ($model->permissionElements as $permissionElement) {
                                if ($rbac->hasChild($role, $rbac->getPermission($permissionElement . '-batch')))
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-batch" class="checkbox-' . $permissionElement . '" checked>
                </div>
            </td>';
                                else
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-batch" class="checkbox-' . $permissionElement . '">
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
                            foreach ($model->permissionElements as $permissionElement) {
                                if ($rbac->hasChild($role, $rbac->getPermission($permissionElement . '-subject')))
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-subject" class="checkbox-' . $permissionElement . '" checked>
                </div>
            </td>';
                                else
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-subject" class="checkbox-' . $permissionElement . '">
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
                            foreach ($model->permissionElements as $permissionElement) {
                                if ($rbac->hasChild($role, $rbac->getPermission($permissionElement . '-electivegroup')))
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-electivegroup" class="checkbox-' . $permissionElement . '" checked>
                </div>
            </td>';
                                else
                                    echo '<td class="text-center">
                <div class="icheck">
                    <input type="checkbox" name="' . $permissionElement . '-electivegroup" class="checkbox-' . $permissionElement . '">
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
    <!-- Ends - Permission allocation table -->
<?php
} else{
    Yii::$app->session->setFlash('danger', 'Invalid usage of Permission table URL');
    return $this->redirect(['index']);
}