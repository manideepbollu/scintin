<?php
namespace frontend\controllers;

use common\rbac\AuthorRule;
use frontend\models\SignupRequestForm;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['signup','login', 'request-password-reset', 'reset-password', 'signup-request'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'login';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success');
            } else {
                Yii::$app->session->setFlash('error');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionSignupRequest()
    {
        $this->layout = 'login';

        $model = new SignupRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to process your signup request.');
            }
        }

        return $this->render('signupRequest', [
            'model' => $model,
        ]);

    }

    public function actionSignup($token, $type)
    {
        $this->layout = 'login';

        try {
            $model = new SignupForm($token, $type);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        $this->layout = 'login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Temporary Method to implement AdHoc RBAC
     */
    public function actionRbac()
    {
        $rbac = Yii::$app->authManager;

        if(!($createBatch = $rbac->getPermission('createBatch')))
        {
            $createBatch = $rbac->createPermission('createBatch');
            $createBatch->description = 'Access to create batches';
            $rbac->add($createBatch);
        }

        if(!($updateBatch = $rbac->getPermission('updateBatch')))
        {
            $updateBatch = $rbac->createPermission('updateBatch');
            $updateBatch->description = 'Access to update batches';
            $rbac->add($updateBatch);
        }

        if(!($updateOwnBatch = $rbac->getPermission('updateOwnBatch')))
        {
            $updateOwnBatch = $rbac->createPermission('updateOwnBatch');
            $updateOwnBatch->description = 'Access to update own batches';
            $rbac->add($updateOwnBatch);
        }


        if(!($viewBatch = $rbac->getPermission('viewBatch')))
        {
            $viewBatch = $rbac->createPermission('viewBatch');
            $viewBatch->description = 'Access to view batches';
            $rbac->add($viewBatch);
        }

        if(!($viewOwnBatch = $rbac->getPermission('viewOwnBatch')))
        {
            $viewOwnBatch = $rbac->createPermission('viewOwnBatch');
            $viewOwnBatch->description = 'Access to view own batches';
            $rbac->add($viewOwnBatch);
        }

        if(!($deleteBatch = $rbac->getPermission('deleteBatch')))
        {
            $deleteBatch = $rbac->createPermission('deleteBatch');
            $deleteBatch->description = 'Access to delete batches';
            $rbac->add($deleteBatch);
        }

        if(!($adminRole = $rbac->getRole('admin')))
        {
            $adminRole = $rbac->createRole('admin');
            $rbac->add($adminRole);
        }

        if(!($teacherRole = $rbac->getRole('teacher')))
        {
            $teacherRole = $rbac->createRole('teacher');
            $rbac->add($teacherRole);
        }

        $rule = new AuthorRule();
        if($rbac->getRule('isAuthor'))
            $rbac->update('isAuthor', $rule);
        else
            $rbac->add($rule);
        $rbac->update('isAuthor', $rule);
        $updateOwnBatch->ruleName = $rule->name;
        $rbac->update('updateOwnBatch', $updateOwnBatch);
        $viewOwnBatch->ruleName = $rule->name;
        $rbac->update('viewOwnBatch', $viewOwnBatch);


        if(!$rbac->hasChild($updateOwnBatch, $updateBatch))
            $rbac->addChild($updateOwnBatch, $updateBatch);

        if(!$rbac->hasChild($viewOwnBatch, $viewBatch))
            $rbac->addChild($viewOwnBatch, $viewBatch);

        if(!$rbac->hasChild($teacherRole, $createBatch))
            $rbac->addChild($teacherRole, $createBatch);
        if(!$rbac->hasChild($teacherRole, $updateOwnBatch))
            $rbac->addChild($teacherRole, $updateOwnBatch);
        if(!$rbac->hasChild($teacherRole, $viewOwnBatch))
            $rbac->addChild($teacherRole, $viewOwnBatch);

        if(!$rbac->hasChild($adminRole, $updateBatch))
            $rbac->addChild($adminRole, $updateBatch);
        if(!$rbac->hasChild($adminRole, $deleteBatch))
            $rbac->addChild($adminRole, $deleteBatch);
        if(!$rbac->hasChild($adminRole, $viewBatch))
            $rbac->addChild($adminRole, $viewBatch);
        if(!$rbac->hasChild($adminRole, $teacherRole))
            $rbac->addChild($adminRole, $teacherRole);

        if(!$rbac->getAssignment('admin', 1))
            $rbac->assign($adminRole, 1);
        if(!$rbac->getAssignment('teacher', Yii::$app->user->identity->getId()))
            $rbac->assign($teacherRole, Yii::$app->user->identity->getId());



    }

    /**
     * Temporary Method to implement AdHoc RBAC
     */
    public function actionMiniRbac()
    {
        $rbac = Yii::$app->authManager;


        //Course Permissions
        if(!($createCourse = $rbac->getPermission('create-course')))
        {
            $createCourse = $rbac->createPermission('create-course');
            $createCourse->description = 'Access to create courses';
            $rbac->add($createCourse);
        }

        if(!($viewCourse = $rbac->getPermission('view-course')))
        {
            $viewCourse = $rbac->createPermission('view-course');
            $viewCourse->description = 'Access to view courses';
            $rbac->add($viewCourse);
        }

        if(!($viewOwnCourse = $rbac->getPermission('view-own-course')))
        {
            $viewOwnCourse = $rbac->createPermission('view-own-course');
            $viewOwnCourse->description = 'Access to view own courses';
            $rbac->add($viewOwnCourse);
        }

        if(!($updateCourse = $rbac->getPermission('update-course')))
        {
            $updateCourse = $rbac->createPermission('update-course');
            $updateCourse->description = 'Access to update courses';
            $rbac->add($updateCourse);
        }

        if(!($updateOwnCourse = $rbac->getPermission('update-own-course')))
        {
            $updateOwnCourse = $rbac->createPermission('update-own-course');
            $updateOwnCourse->description = 'Access to update own courses';
            $rbac->add($updateOwnCourse);
        }

        if(!($deleteCourse = $rbac->getPermission('delete-course')))
        {
            $deleteCourse = $rbac->createPermission('delete-course');
            $deleteCourse->description = 'Access to delete own courses';
            $rbac->add($deleteCourse);
        }

        if(!($deleteOwnCourse = $rbac->getPermission('delete-own-course')))
        {
            $deleteOwnCourse = $rbac->createPermission('delete-own-course');
            $deleteOwnCourse->description = 'Access to delete own courses';
            $rbac->add($deleteOwnCourse);
        }


        //Batch Permissions
        if(!($createBatch = $rbac->getPermission('create-batch')))
        {
            $createBatch = $rbac->createPermission('create-batch');
            $createBatch->description = 'Access to create batches';
            $rbac->add($createBatch);
        }

        if(!($viewBatch = $rbac->getPermission('view-batch')))
        {
            $viewBatch = $rbac->createPermission('view-batch');
            $viewBatch->description = 'Access to view batches';
            $rbac->add($viewBatch);
        }

        if(!($viewOwnBatch = $rbac->getPermission('view-own-batch')))
        {
            $viewOwnBatch = $rbac->createPermission('view-own-batch');
            $viewOwnBatch->description = 'Access to view own batches';
            $rbac->add($viewOwnBatch);
        }

        if(!($updateBatch = $rbac->getPermission('update-batch')))
        {
            $updateBatch = $rbac->createPermission('update-batch');
            $updateBatch->description = 'Access to update batches';
            $rbac->add($updateBatch);
        }

        if(!($updateOwnBatch = $rbac->getPermission('update-own-batch')))
        {
            $updateOwnBatch = $rbac->createPermission('update-own-batch');
            $updateOwnBatch->description = 'Access to update own batches';
            $rbac->add($updateOwnBatch);
        }

        if(!($deleteBatch = $rbac->getPermission('delete-batch')))
        {
            $deleteBatch = $rbac->createPermission('delete-batch');
            $deleteBatch->description = 'Access to delete own batches';
            $rbac->add($deleteBatch);
        }

        if(!($deleteOwnBatch = $rbac->getPermission('delete-own-batch')))
        {
            $deleteOwnBatch = $rbac->createPermission('delete-own-batch');
            $deleteOwnBatch->description = 'Access to delete own batches';
            $rbac->add($deleteOwnBatch);
        }

        //Subject Permissions
        if(!($createSubject = $rbac->getPermission('create-subject')))
        {
            $createSubject = $rbac->createPermission('create-subject');
            $createSubject->description = 'Access to create subjects';
            $rbac->add($createSubject);
        }

        if(!($viewSubject = $rbac->getPermission('view-subject')))
        {
            $viewSubject = $rbac->createPermission('view-subject');
            $viewSubject->description = 'Access to view subjects';
            $rbac->add($viewSubject);
        }

        if(!($viewOwnSubject = $rbac->getPermission('view-own-subject')))
        {
            $viewOwnSubject = $rbac->createPermission('view-own-subject');
            $viewOwnSubject->description = 'Access to view own subjects';
            $rbac->add($viewOwnSubject);
        }

        if(!($updateSubject = $rbac->getPermission('update-subject')))
        {
            $updateSubject = $rbac->createPermission('update-subject');
            $updateSubject->description = 'Access to update subjects';
            $rbac->add($updateSubject);
        }

        if(!($updateOwnSubject = $rbac->getPermission('update-own-subject')))
        {
            $updateOwnSubject = $rbac->createPermission('update-own-subject');
            $updateOwnSubject->description = 'Access to update own subjects';
            $rbac->add($updateOwnSubject);
        }

        if(!($deleteSubject = $rbac->getPermission('delete-subject')))
        {
            $deleteSubject = $rbac->createPermission('delete-subject');
            $deleteSubject->description = 'Access to delete own subjects';
            $rbac->add($deleteSubject);
        }

        if(!($deleteOwnSubject = $rbac->getPermission('delete-own-subject')))
        {
            $deleteOwnSubject = $rbac->createPermission('delete-own-subject');
            $deleteOwnSubject->description = 'Access to delete own subjects';
            $rbac->add($deleteOwnSubject);
        }

        //Electivegroup Permissions
        if(!($createElectivegroup = $rbac->getPermission('create-electivegroup')))
        {
            $createElectivegroup = $rbac->createPermission('create-electivegroup');
            $createElectivegroup->description = 'Access to create electivegroups';
            $rbac->add($createElectivegroup);
        }

        if(!($viewElectivegroup = $rbac->getPermission('view-electivegroup')))
        {
            $viewElectivegroup = $rbac->createPermission('view-electivegroup');
            $viewElectivegroup->description = 'Access to view electivegroups';
            $rbac->add($viewElectivegroup);
        }

        if(!($viewOwnElectivegroup = $rbac->getPermission('view-own-electivegroup')))
        {
            $viewOwnElectivegroup = $rbac->createPermission('view-own-electivegroup');
            $viewOwnElectivegroup->description = 'Access to view own electivegroups';
            $rbac->add($viewOwnElectivegroup);
        }

        if(!($updateElectivegroup = $rbac->getPermission('update-electivegroup')))
        {
            $updateElectivegroup = $rbac->createPermission('update-electivegroup');
            $updateElectivegroup->description = 'Access to update electivegroups';
            $rbac->add($updateElectivegroup);
        }

        if(!($updateOwnElectivegroup = $rbac->getPermission('update-own-electivegroup')))
        {
            $updateOwnElectivegroup = $rbac->createPermission('update-own-electivegroup');
            $updateOwnElectivegroup->description = 'Access to update own electivegroups';
            $rbac->add($updateOwnElectivegroup);
        }

        if(!($deleteElectivegroup = $rbac->getPermission('delete-electivegroup')))
        {
            $deleteElectivegroup = $rbac->createPermission('delete-electivegroup');
            $deleteElectivegroup->description = 'Access to delete own electivegroups';
            $rbac->add($deleteElectivegroup);
        }

        if(!($deleteOwnElectivegroup = $rbac->getPermission('delete-own-electivegroup')))
        {
            $deleteOwnElectivegroup = $rbac->createPermission('delete-own-electivegroup');
            $deleteOwnElectivegroup->description = 'Access to delete own electivegroups';
            $rbac->add($deleteOwnElectivegroup);
        }
    }
}
