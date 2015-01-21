<?php

namespace frontend\controllers;

use common\models\SubjectsSearch;
use Yii;
use common\models\Batches;
use common\models\BatchesSearch;
use common\models\Courses;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BatchesController implements the CRUD actions for Batches model.
 */
class BatchesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['create-batch'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['view-batch'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Batches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BatchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Batches model.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->can('view-batch', ['model' => $model])) {

            $searchModel = new SubjectsSearch();
            $dataProvider = $searchModel->searchWithOrFilter([
                'SubjectsSearch' => [
                    'isactive' => 'Active',
                    'course_id' => $model->course_id,
                    'batch_id' => $id,
                ]
            ]);

            return $this->render('view', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            throw new ForbiddenHttpException('You are not authorized to perform this action.');
        }
    }

    /**
     * Creates a new Batches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param integer $id - Takes the course id and presents a pre-filled create form
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        $model = new Batches();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if($id)
                $model->course_id = $id;
            $courseList = Courses::getSpecificCourses(['isactive' => 'Active']);
            //Checks if there are any active courses available before creating a batch
            if($courseList !== null)
                return $this->render('create', [
                    'model' => $model,
                    'courseList' => $courseList,
                ]);
            Yii::$app->session->setFlash('danger', 'There must be atleast one <b>active course</b> registered in the database before creating a batch');
            return Yii::$app->response->redirect(['courses/overview']);
        }
    }

    /**
     * Updates an existing Batches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->can('update-batch', ['model' => $model]))
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $courseList = Courses::getSpecificCourses(['isactive' => 'Active']);
                if($courseList !== null)
                    return $this->render('update', [
                        'model' => $model,
                        'courseList' => $courseList,
                    ]);
                Yii::$app->session->setFlash('danger', 'There must be atleast one <b>active course</b> registered in the database before creating a batch');
                return Yii::$app->response->redirect(['courses/overview']);
            }
        }else
        {
            throw new ForbiddenHttpException('You are not authorized to perform this action.');
        }
    }

    /**
     * Deletes an existing Batches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can('delete-batch', ['model' => $model])) {
            $model->delete();
            return $this->redirect(['index']);
        }else {
            throw new ForbiddenHttpException('You are not authorized to perform this action.');
        }
    }

    /**
     * Finds the Batches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Batches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Batches::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
