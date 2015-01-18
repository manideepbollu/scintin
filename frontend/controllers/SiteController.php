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
            $updateCourse->description = 'Access to update course';
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
    }
}
