<?php
namespace frontend\models;

use common\models\Employees;
use common\models\Students;
use common\models\User;
use yii\base\Model;

/**
 * Signup request form
 */
class SignupRequestForm extends Model
{
    const EMPLOYEE = 'Employee';
    const STUDENT = 'Student';
    const GUARDIAN = 'Guardian';

    public $sid;
    public $userType;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sid', 'userType'], 'required'],
            ['sid', 'exist',
                'targetClass' => '\common\models\Students',
                'targetAttribute' => 'admission_id',
                'filter' => ['isactive' => 'Active'],
                'message' => 'Invalid Admission ID. Please contact your Administrator',
                'when' => function($model){
                    return $model->userType === self::STUDENT;
                },
            ],
            ['sid', 'exist',
                'targetClass' => '\common\models\Students',
                'targetAttribute' => 'admission_id',
                'filter' => ['isactive' => 'Active'],
                'message' => 'Invalid Admission ID. Please contact your Administrator',
                'when' => function($model){
                    return $model->userType === self::GUARDIAN;
                },
            ],
            ['sid', 'exist',
                'targetClass' => '\common\models\Employees',
                'targetAttribute' => 'employee_id',
                'filter' => ['isactive' => 'Active'],
                'message' => 'Invalid Employee ID. Please contact your Administrator',
                'when' => function($model){
                    return $model->userType === self::EMPLOYEE;
                },
            ],
            ['sid', 'unique',
                'targetClass' => '\common\models\User',
                'message' => 'A user has already been created for this SID',
            ],
        ];
    }

    public function getUserTypeOptions()
    {
        return [
            self::EMPLOYEE => 'Employee',
            self::STUDENT => 'Student',
        ];
    }

    /**
     * Sends an email with a link, for accessing the sign up screen.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        switch($this->userType){
            case self::EMPLOYEE:
                $offUser = Employees::findOne([
                    'isactive' => 'Active',
                    'employee_id' => $this->sid,
                ]);
                break;

            case self::STUDENT:
                $offUser = Students::findOne([
                    'isactive' => 'Active',
                    'admission_id' => $this->sid,
                ]);
                break;
        }

        if (isset($offUser)) {
            $offUser->generateSignupRequestToken();
            if ($offUser->save()) {
                return \Yii::$app->mailer->compose('signUpRequest', ['offUser' => $offUser, 'requestData' => $this])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($offUser->email)
                    ->setSubject('Signup request on ' . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }
}
