<?php

namespace frontend\controllers;

use Yii;
use common\models\AuthItem;
use common\models\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class AuthItemController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $rbac = Yii::$app->authManager;

        if(Yii::$app->request->post())
        {
            $authItem = Yii::$app->request->post('AuthItem');
            if(!($role = $rbac->getRole($authItem['name']))){
                $role = $rbac->createRole($authItem['name']);
                $role->description = $authItem['description'];
                $rbac->add($role);
                $authItemObject = AuthItem::findOne($role->name);
                $authItemObject->timeAndBlame();
                if($authItemObject->setRolePermissions(Yii::$app->request->post())){
                    return $this->redirect(['view', 'id' => $authItem['name']]);
                }else{
                    $rbac->remove($role);
                    Yii::$app->session->setFlash('danger', 'There seems to be a problem with Permission assignment. Please contact Scintin for more assistance.');
                    return $this->redirect(['index']);
                }
            }else {
                Yii::$app->session->setFlash('danger', 'A user role already exists with the same name.');
                return $this->redirect(['index']);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rbac = Yii::$app->authManager;

        if(Yii::$app->request->post())
        {
            $authItem = Yii::$app->request->post('AuthItem');
            if($role = $rbac->getRole($id)){
                $role->description = $authItem['description'];
                $rbac->update($id, $role);
                $authItemObject = AuthItem::findOne($role->name);
                $authItemObject->timeAndBlame("update");
                if($authItemObject->setRolePermissions(Yii::$app->request->post())){
                    return $this->redirect(['view', 'id' => $id]);
                }else{
                    Yii::$app->session->setFlash('danger', 'There seems to be a problem with Permission assignment. Please contact Scintin for more assistance.');
                    return $this->redirect(['index']);
                }
            }else {
                Yii::$app->session->setFlash('danger', 'Role seems to be invalid. Please check your Role Management or contact Scintin');
                return $this->redirect(['index']);
            }
        }else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $rbac = Yii::$app->authManager;
        $role = $rbac->getRole($id);
        $rbac->remove($role);

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
