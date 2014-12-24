<?php

namespace frontend\controllers;

use common\models\Batches;
use common\models\Courses;
use Yii;
use common\models\ElectiveGroups;
use common\models\ElectiveGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ElectiveGroupsController implements the CRUD actions for ElectiveGroups model.
 */
class ElectiveGroupsController extends Controller
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
     * Lists all ElectiveGroups models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ElectiveGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ElectiveGroups model.
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
     * Creates a new ElectiveGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ElectiveGroups();
        $parentOptions['Global'] = 'Global';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            //Course filters - { Must be active, Must be Elective enabled }
            $filter = [
                'isactive' => 'Active',
                'elective_enabled' => 'Allowed',
            ];

            //Fetching list of courses using defined filters
            if($listCourses = Courses::getSpecificCourses($filter))
                $parentOptions['Course'] = 'Course';
            else
                $listCourses = ['Not available' => 'No options available'];

            //parentOptions are being populated as per the availability of items i.e. Courses / Batches
            //Fetching list of batches using defined parent filters
            if($listBatches = Batches::getSpecificBatches([], $filter))
                $parentOptions['Batch'] = 'Batch';
            else
                $listBatches = ['Not available' => 'No options available'];

            return $this->render('create', [
                'model' => $model,
                'listCourses' => $listCourses,
                'listBatches' => $listBatches,
            ]);
        }
    }

    /**
     * Updates an existing ElectiveGroups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $parentOptions['Global'] = 'Global';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            //Course filters - { Must be active, Must be Elective enabled }
            $filter = [
                'isactive' => 'Active',
                'elective_enabled' => 'Allowed',
            ];

            //Fetching list of courses using defined filters
            if($listCourses = Courses::getSpecificCourses($filter))
                $parentOptions['Course'] = 'Course';
            else
                $listCourses = ['Not available' => 'No options available'];

            //parentOptions are being populated as per the availability of items i.e. Courses / Batches
            //Fetching list of batches using defined parent filters
            if($listBatches = Batches::getSpecificBatches([], $filter))
                $parentOptions['Batch'] = 'Batch';
            else
                $listBatches = ['Not available' => 'No options available'];

            return $this->render('update', [
                'model' => $model,
                'listCourses' => $listCourses,
                'listBatches' => $listBatches,
            ]);
        }
    }

    /**
     * Deletes an existing ElectiveGroups model.
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
     * Finds the ElectiveGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ElectiveGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ElectiveGroups::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
