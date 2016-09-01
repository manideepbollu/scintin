<?php
namespace frontend\controllers;

use common\models\AuthItem;
use common\models\Employees;
use common\models\Students;
use common\models\User;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * User Management controller
 */
class UserManagementController extends Controller
{
    public function actionIndex()
    {
        $studentCount = Students::getSpecificCount(['isactive' => 'Active']);
        $employeeCount = Employees::getSpecificCount(['isactive' => 'Active']);
        $peopleCount = $studentCount + $employeeCount;
        $userCount = User::getSpecificCount(['status' => User::STATUS_ACTIVE]);
        $enrollmentRatio = ($userCount / $peopleCount) * 100;
        $roleCount = count(AuthItem::getAllRoles());

        return $this->render('index',[
            'enrollmentRatio' => $enrollmentRatio,
            'userCount' => $userCount,
            'studentCount' => $studentCount,
            'employeeCount' => $employeeCount,
            'roleCount' => $roleCount,
        ]);
    }

    public function actionSomething()
    {
        return $this->render('something');
    }

}
