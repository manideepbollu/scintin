<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\EmployeesSearch;
use common\models\Employees;
use common\models\DriverAdditionalDetails;

/**
 * DriverAdditionalDetailsController implements the CRUD actions for DriverAdditionalDetails model.
 */
class DriversController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeesSearch();
        $dataProvider = $searchModel->driverSearch(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employees model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'employeeModel' => $this->findModel($id),
            'driverAdditionalDetailsModel' => $this->findDriverAdditionalDetailsModel($id),
        ]);
    }

    /**
     * Creates a new Employees model and DriverAdditionalDetails model, where DriverAdditionalDetails has
     * additional driver specific details which relates to Employees model .
     *
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $employeeModel = new Employees();
        $driverAdditionalDetailsModel = new DriverAdditionalDetails();
        if ($employeeModel->load(Yii::$app->request->post()) && $employeeModel->save()) {
            $driverAdditionalDetailsModel->employee_id = $employeeModel->id;
            if($driverAdditionalDetailsModel->load(Yii::$app->request->post()) && $driverAdditionalDetailsModel->save()) {
                return $this->redirect(['view', 'id' => $employeeModel->id]);
            } else {
                return $this->render('create', [
                    'employeeModel' => $employeeModel,
                    'driverAdditionalDetailsModel' => $driverAdditionalDetailsModel
                ]);
            }
        } else {
            $employeeModel->job_title = 'Driver';
            return $this->render('create', [
                'employeeModel' => $employeeModel,
                'driverAdditionalDetailsModel' => $driverAdditionalDetailsModel
            ]);
        }
    }

    /**
     * Updates Employees model and DriverAdditionalDetails model, where DriverAdditionalDetails has
     * additional driver specific details which relates to Employees model .
     *
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $employeeModel = $this->findModel($id);
        $driverAdditionalDetailsModel = $this->findDriverAdditionalDetailsModel($id);
        if ($employeeModel->load(Yii::$app->request->post()) && $employeeModel->save()) {
            $driverAdditionalDetailsModel->employee_id = $employeeModel->id;
            if($driverAdditionalDetailsModel->load(Yii::$app->request->post()) && $driverAdditionalDetailsModel->save()) {
                return $this->redirect(['view', 'id' => $employeeModel->id]);
            } else {
                return $this->render('update', [
                    'employeeModel' => $employeeModel,
                    'driverAdditionalDetailsModel' => $driverAdditionalDetailsModel
                ]);
            }
        } else {
            return $this->render('update', [
                'employeeModel' => $employeeModel,
                'driverAdditionalDetailsModel' => $driverAdditionalDetailsModel
            ]);
        }
    }

    /**
     * Deletes an existing Employees model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Employees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the DriverAdditionalDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDriverAdditionalDetailsModel($id)
    {
        if ($model = DriverAdditionalDetails::findOne(['employee_id' => $id])) {
            return $model;
        } else {
            throw new NotFoundHttpException('Driver details not found.');
        }
    }

    public function actionLoadImage($id)
    {
        $model = $this->findModel($id);

        header("content-type: " + $model->photo_file_type);
        echo $model->photo_element_data;

    }
}
