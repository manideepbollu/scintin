<?php
namespace common\models;

use frontend\models\SignupRequestForm;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
* This is the model class for table "user".
 *
 * @property integer $id
* @property string $username
* @property string $auth_key
* @property string $password_hash
* @property string $password_reset_token
* @property string $email
* @property integer $role
* @property integer $status
* @property string $created_at
* @property string $updated_at
* @property string $sid
* @property string $user_role
* @property string $work_email
* @property string $photo_file_name
* @property string $photo_file_type
* @property integer $photo_file_size
* @property string $photo_element_data
* @property integer $created_by
* @property integer $updated_by
*
 * @property Batches[] $batches
* @property Courses[] $courses
* @property ElectiveGroups[] $electiveGroups
* @property Subjects[] $subjects
* @property User $createdBy
* @property User $updatedBy
*/
class User extends GeneralRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_ADMIN = 10;
    const ROLE_EMPLOYEE = 20;
    const ROLE_STUDENT = 30;
    const ROLE_GUARDIAN = 40;

    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($params)
    {
        if ($this->file = UploadedFile::getInstance($this, 'file')){
            if ($this->validate()) {
                $this->photo_file_name = $this->file->name;
                $this->photo_file_type = $this->file->type;
                $this->photo_file_size = $this->file->size;
                $this->photo_element_data = file_get_contents($this->file->tempName);
            }
            else{
                Yii::$app->session->setFlash('danger', 'There was a <b>problem while uploading the photo</b>, please check the file and try again. (Please note: Uploading file should be less than 4MB in size');
                return false;
            }
        }

        return parent::beforeSave($params);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['role', 'status', 'photo_file_size', 'created_by', 'updated_by'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'sid', 'user_role', 'work_email', 'photo_file_name', 'photo_file_type'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            ['role', 'default', 'value' => self::ROLE_STUDENT],
            ['role', 'in', 'range' => [self::ROLE_ADMIN, self::ROLE_EMPLOYEE, self::ROLE_STUDENT, self::ROLE_GUARDIAN]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'role' => 'Type',
            'sid' => 'SID',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Validates and sets the user types
     * @param string $userType
     */
    public function setUserType($userType)
    {
        switch ($userType){
            case self::ROLE_ADMIN:
                $this->role = self::ROLE_ADMIN;
                break;
            case SignupRequestForm::EMPLOYEE:
                $this->role = self::ROLE_EMPLOYEE;
                break;
            case SignupRequestForm::STUDENT:
                $this->role = self::ROLE_STUDENT;
                break;
            case SignupRequestForm::GUARDIAN:
                $this->role = self::ROLE_GUARDIAN;
                break;
        }
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Assign a specific role to a user
     */
    public function assignUserRole($role_name = null)
    {
        $rbac = Yii::$app->authManager;
        if($role_name){
            if($role = $rbac->getRole($role_name)){

                $currentRoles = $rbac->getAssignments($this->id);
                foreach($currentRoles as $currentRole){
                    $roleObject = $rbac->getRole($currentRole->roleName);
                    $rbac->revoke($roleObject, $this->id);
                }

                return $rbac->assign($role, $this->id);

            }else{
                Yii::$app->session->setFlash('danger', 'There was a problem with role allocation. Please verify your role management or contact Scintin for more assistance.');
                return $this->redirect(['index']);
            }
        }else{
            Yii::$app->session->setFlash('danger', 'There was a problem with role allocation. Please verify your role management or contact Scintin for more assistance.');
            return $this->redirect(['index']);
        }

    }

    /**
     * Begin relation based methods
     */

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getBatches()
    {
        return $this->hasMany(Batches::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectiveGroups()
    {
        return $this->hasMany(ElectiveGroups::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(self::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(self::className(), ['id' => 'updated_by']);
    }

}
