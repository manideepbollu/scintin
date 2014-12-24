<?php

namespace frontend\controllers;

use common\models\Batches;
use common\models\Courses;
use common\models\ElectiveGroups;
use Yii;
use common\models\Subjects;
use common\models\SubjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectsController implements the CRUD actions for Subjects model.
 */
class SubjectsController extends Controller
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
     * Lists all Subjects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subjects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subjects();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            //filters - { Must be active }
            $filter = [
                'isactive' => 'Active'
            ];

            if(!($activeElectiveGroups = ElectiveGroups::getSpecificElectiveGroups($filter)))
                $activeElectiveGroups = ['Not available' => 'No options available'];
            if(!($activeCourses = Courses::getSpecificCourses($filter)))
                $activeCourses = ['Not available' => 'No options available'];
            if(!($activeBatches = Batches::getSpecificBatches([],$filter)))
                $activeBatches = ['Not available' => 'No options available'];
            if(!($activeSubjects = Subjects::getSpecificSubjects($filter)))
                $activeSubjects = [];

            if($activeCourses === ['Not available' => 'No options available']) {
                Yii::$app->session->setFlash('danger', 'There must be atleast one <b>active course</b> registered in the database before creating a Subject');
                return Yii::$app->response->redirect(['courses/overview']);
            }
            else
                return $this->render('create', [
                    'model' => $model,
                    'activeElectiveGroups' => $activeElectiveGroups,
                    'activeCourses' => $activeCourses,
                    'activeBatches' => $activeBatches,
                    'activeSubjects' => $activeSubjects,
                ]);
        }
    }

    /**
     * Updates an existing Subjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            //filters - { Must be active }
            $filter = [
                'isactive' => 'Active'
            ];

            if(!($activeElectiveGroups = ElectiveGroups::getSpecificElectiveGroups($filter)))
                $activeElectiveGroups = ['Not available' => 'No options available'];
            if(!($activeCourses = Courses::getSpecificCourses($filter)))
                $activeCourses = ['Not available' => 'No options available'];
            else
                $parentOptions['Course'] = 'Course';
            if(!($activeBatches = Batches::getSpecificBatches([],$filter)))
                $activeBatches = ['Not available' => 'No options available'];
            else
                $parentOptions['Batch'] = 'Batch';
            if(!($activeSubjects = Subjects::getSpecificSubjects($filter)))
                $activeSubjects = [];
            if(!isset($parentOptions)) {
                Yii::$app->session->setFlash('danger', 'There must be atleast one <b>active course</b> registered in the database before creating a Subject');
                return Yii::$app->response->redirect(['courses/overview']);
            }
            else
                return $this->render('update', [
                    'model' => $model,
                    'activeElectiveGroups' => $activeElectiveGroups,
                    'parentOptions' => $parentOptions,
                    'activeCourses' => $activeCourses,
                    'activeBatches' => $activeBatches,
                    'activeSubjects' => $activeSubjects,
                ]);
        }
    }

    /**
     * Deletes an existing Subjects model.
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
     * Finds the Subjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subjects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
