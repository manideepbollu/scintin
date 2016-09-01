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
class TransportController extends Controller
{
    public $layout = 'googlemaps';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
