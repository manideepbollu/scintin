<?php
namespace frontend\models;

use common\models\Employees;
use common\models\Students;
use common\models\User;
use yii\base\Model;
use Yii;
use yii\base\InvalidParamException;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $userType;

    private $_offUser;

    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $type, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Signup request token cannot be blank.');
        }
        else if (empty($type) || !is_string($type)) {
            throw new InvalidParamException('Signup request type cannot be blank.');
        }

        switch($type){
            case SignupRequestForm::STUDENT:
                $this->_offUser = Students::findBySignupRequestToken($token);
                break;
            case SignupRequestForm::EMPLOYEE:
                $this->_offUser = Employees::findBySignupRequestToken($token);
                break;
        }

        if (!$this->_offUser) {
            throw new InvalidParamException('Wrong password reset token.');
        }

        $this->userType = $type;

        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'filter', 'filter' => 'strToLower'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 8, 'max' => 255],
            [['username'], 'match', 'pattern' => '/^[a-z]\w*$/i'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Signs up the user.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->setPassword($this->password);
            $user->email = $this->_offUser->email;
            $user->generateAuthKey();
            $user->setUserType($this->userType);

            switch($this->userType){
                case SignupRequestForm::STUDENT:
                    $user->sid = $this->_offUser->admission_id;
                    break;
                case SignupRequestForm::EMPLOYEE:
                    $user->sid = $this->_offUser->employee_id;
                    break;
            }

            $user->save();

            $this->_offUser->removeSignupRequestToken();
            $this->_offUser->save();

            return $user;
        }

        return null;
    }
}
