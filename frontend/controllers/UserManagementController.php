<?php
namespace frontend\controllers;

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
        return $this->render('index');
    }

    public function actionSomething()
    {
        return $this->render('something');
    }

}
