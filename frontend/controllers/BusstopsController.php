<?php

namespace frontend\controllers;

use Yii;
use common\models\Busstops;
use common\models\BusstopsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BusstopsController implements the CRUD actions for Busstops model.
 */
class BusstopsController extends Controller
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
     * Lists all Busstops models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'googlemaps';
        $searchModel = new BusstopsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Busstops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'googlemaps';
        $model = new Busstops();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Busstops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'googlemaps';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Busstops model.
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
     * Returns the available Bus stops data in JSON format for Javascript to process
     * @param integer $id
     * @return array Bus Stop data
     */
    public function actionJsonData($id = null)
    {
        $busStops = Busstops::find()
                        ->asArray()
                        ->select(['id', 'stop_name', 'lat_coords', 'lon_coords', 'notes'])
                        ->where($id != null ? "id != $id" : "" )
                        ->all();
        return \yii\helpers\Json::encode($busStops);
    }

    /**
     * Returns the available Bus stops data in JSON format for Javascript to process
     * @param integer $id
     * @return array Bus Stop data
     */
    public function actionPointJsonData($id)
    {
        $busStop = Busstops::find()
            ->asArray()
            ->select(['id', 'stop_name', 'lat_coords', 'lon_coords', 'notes'])
            ->where(['id' => $id])
            ->one();
        return \yii\helpers\Json::encode($busStop);
    }

    /**
     * Finds the Busstops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Busstops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Busstops::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
