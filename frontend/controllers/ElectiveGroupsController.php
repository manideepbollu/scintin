<?php

namespace frontend\controllers;

use common\models\Batches;
use common\models\Courses;
use common\models\SubjectsSearch;
use Yii;
use common\models\ElectiveGroups;
use common\models\ElectiveGroupsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ElectiveGroupsController implements the CRUD actions for ElectiveGroups model.
 */
class ElectiveGroupsController extends Controller
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
                        'roles' => ['create-electivegroup'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['view-electivegroup'],
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
     * @throws ForbiddenHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->can('view-electivegroup', ['model' => $model])) {

            $searchModel = new SubjectsSearch();
            $dataProvider = $searchModel->search([
                'SubjectsSearch' => [
                    'isactive' => 'Active',
                    'elective_group' => $id,
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
     * @throws ForbiddenHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $parentOptions['Global'] = 'Global';

        if(Yii::$app->user->can('update-electivegroup', ['model' => $model]))
        {
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
        }else
        {
            throw new ForbiddenHttpException('You are not authorized to perform this action.');
        }
    }

    /**
     * Deletes an existing ElectiveGroups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->can('delete-electivegroup', ['model' => $model])) {
            $model->delete();
            return $this->redirect(['index']);
        }else {
            throw new ForbiddenHttpException('You are not authorized to perform this action.');
        }
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
